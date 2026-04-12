<?php
/**
 * API REST para gestión de futbolistas.
 * Autor: José Roberto Corona Ramírez
 * Materia: Desarrollo de API REST en PHP
 */

// Indica que la respuesta será en formato JSON
header("Content-Type: application/json; charset=UTF-8");

// Permite peticiones desde cualquier origen (útil para pruebas)
header("Access-Control-Allow-Origin: *");

// Métodos HTTP permitidos
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Encabezados permitidos
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Responde correctamente a solicitudes OPTIONS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once("../config/Database.php");
require_once("../models/Futbolista.php");

// Crear conexión
$database = new Database();
$db = $database->getConnection();

// Validar conexión
if (!$db) {
    http_response_code(500);
    echo json_encode([
        "status" => false,
        "message" => "No se pudo establecer la conexión con la base de datos."
    ]);
    exit();
}

// Crear objeto modelo
$futbolista = new Futbolista($db);

// Obtener método y URI
$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

// Obtener ruta relativa
$base_path = "/desarrollo-web-avanzado-fimaz-uas/parcial-4-api-rest/evaluacion-api-rest-futbol/api";
$path = str_replace($base_path, "", parse_url($request_uri, PHP_URL_PATH));
$path = trim($path, "/");

// Separar segmentos
$segments = explode("/", $path);

/**
 * Función para responder en formato JSON.
 */
function responseJson($statusCode, $data) {
    http_response_code($statusCode);
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();
}

/**
 * Función para validar datos de futbolista.
 */
function validarDatos($data) {
    if (
        !isset($data->nombre) || empty(trim($data->nombre)) ||
        !isset($data->posicion) || empty(trim($data->posicion)) ||
        !isset($data->numero) ||
        !isset($data->edad) ||
        !isset($data->equipo) || empty(trim($data->equipo))
    ) {
        return "Todos los campos son obligatorios.";
    }

    if (!is_numeric($data->edad) || $data->edad < 0) {
        return "La edad debe ser un número mayor o igual a 0.";
    }

    if (!is_numeric($data->numero) || $data->numero <= 0) {
        return "El número del jugador debe ser mayor que 0.";
    }

    return true;
}

// Validar que la ruta comience con futbolistas
if ($segments[0] !== "futbolistas") {
    responseJson(404, [
        "status" => false,
        "message" => "Endpoint no encontrado."
    ]);
}

// GET /futbolistas
if ($method === "GET" && count($segments) === 1) {
    $stmt = $futbolista->getAll();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    responseJson(200, [
        "status" => true,
        "message" => "Lista de futbolistas obtenida correctamente.",
        "data" => $rows
    ]);
}

// GET /futbolistas/{id}
if ($method === "GET" && count($segments) === 2) {
    $futbolista->id = (int)$segments[1];
    $stmt = $futbolista->getById();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        responseJson(200, [
            "status" => true,
            "message" => "Futbolista encontrado.",
            "data" => $row
        ]);
    } else {
        responseJson(404, [
            "status" => false,
            "message" => "Futbolista no encontrado."
        ]);
    }
}

// POST /futbolistas
if ($method === "POST" && count($segments) === 1) {
    $data = json_decode(file_get_contents("php://input"));

    if (!$data) {
        responseJson(400, [
            "status" => false,
            "message" => "JSON inválido o vacío."
        ]);
    }

    $validacion = validarDatos($data);
    if ($validacion !== true) {
        responseJson(400, [
            "status" => false,
            "message" => $validacion
        ]);
    }

    $futbolista->nombre = $data->nombre;
    $futbolista->posicion = $data->posicion;
    $futbolista->numero = $data->numero;
    $futbolista->edad = $data->edad;
    $futbolista->equipo = $data->equipo;

    if ($futbolista->create()) {
        responseJson(201, [
            "status" => true,
            "message" => "Futbolista creado correctamente."
        ]);
    } else {
        responseJson(500, [
            "status" => false,
            "message" => "No se pudo crear el futbolista."
        ]);
    }
}

// PUT /futbolistas/{id}
if ($method === "PUT" && count($segments) === 2) {
    $futbolista->id = (int)$segments[1];
    $data = json_decode(file_get_contents("php://input"));

    if (!$data) {
        responseJson(400, [
            "status" => false,
            "message" => "JSON inválido o vacío."
        ]);
    }

    $validacion = validarDatos($data);
    if ($validacion !== true) {
        responseJson(400, [
            "status" => false,
            "message" => $validacion
        ]);
    }

    // Verificar si existe
    $stmt = $futbolista->getById();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        responseJson(404, [
            "status" => false,
            "message" => "No se puede actualizar. El futbolista no existe."
        ]);
    }

    $futbolista->nombre = $data->nombre;
    $futbolista->posicion = $data->posicion;
    $futbolista->numero = $data->numero;
    $futbolista->edad = $data->edad;
    $futbolista->equipo = $data->equipo;

    if ($futbolista->update()) {
        responseJson(200, [
            "status" => true,
            "message" => "Futbolista actualizado correctamente."
        ]);
    } else {
        responseJson(500, [
            "status" => false,
            "message" => "No se pudo actualizar el futbolista."
        ]);
    }
}

// DELETE /futbolistas/{id}
if ($method === "DELETE" && count($segments) === 2) {
    $futbolista->id = (int)$segments[1];

    // Verificar si existe
    $stmt = $futbolista->getById();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        responseJson(404, [
            "status" => false,
            "message" => "No se puede eliminar. El futbolista no existe."
        ]);
    }

    if ($futbolista->delete()) {
        responseJson(200, [
            "status" => true,
            "message" => "Futbolista eliminado correctamente."
        ]);
    } else {
        responseJson(500, [
            "status" => false,
            "message" => "No se pudo eliminar el futbolista."
        ]);
    }
}

// Si no coincide con ninguna ruta válida
responseJson(404, [
    "status" => false,
    "message" => "Ruta no válida o método no permitido."
]);
?>
<?php
/*
-------------------------------------------------------
Alumno: José Roberto Corona Ramírez
Materia: Desarrollo Web Avanzado
Actividad: U2 ATC 2
Archivo: index.php
Descripción: Archivo principal del proyecto. Aquí se
cargan las clases, se procesa el formulario y se
muestran los resultados de la transacción.
-------------------------------------------------------
*/

// Se cargan los archivos de clases necesarios para usar la conexión,
// la entidad Alumno y la lógica de acceso a datos
require_once __DIR__ . "/clases/Conexion.php";
require_once __DIR__ . "/clases/Alumno.php";
require_once __DIR__ . "/clases/AlumnoDAO.php";

// Se crea un objeto de la clase Conexion
$conexion = new Conexion();

// Se obtiene la conexión activa a la base de datos con PDO
$pdo = $conexion->conectar();

// Se crea el objeto DAO que se encargará de guardar y consultar alumnos
$alumnoDAO = new AlumnoDAO($pdo);

// Variables para mostrar mensajes en pantalla
$mensaje = "";
$detalle = "";

// Se verifica si el formulario fue enviado con método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Se obtienen y limpian los datos enviados desde el formulario
    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo = trim($_POST["correo"] ?? "");

    // Se revisa si el usuario marcó la casilla para simular error
    $simularError = isset($_POST["simular_error"]);

    // Se valida que los campos no estén vacíos
    if ($nombre === "" || $apellido === "" || $correo === "") {
        $mensaje = "⚠️ Todos los campos son obligatorios.";
    } else {

        // Se crea un objeto Alumno con los datos capturados
        $alumno = new Alumno($nombre, $apellido, $correo);

        // Se llama al método del DAO que registra al alumno y el log
        // usando transacciones, commit o rollback
        $resultado = $alumnoDAO->registrarAlumnoConLog($alumno, $simularError);

        // Se guarda el mensaje principal del resultado
        $mensaje = $resultado["mensaje"];

        // Si hubo error, se guarda también el detalle
        $detalle = $resultado["detalle"] ?? "";
    }
}

// Se consultan todos los alumnos para mostrarlos en la tabla
$alumnos = $alumnoDAO->obtenerAlumnos();

// Se consultan todos los logs para mostrarlos en la tabla
$logs = $alumnoDAO->obtenerLogs();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">

<!-- Título que aparece en la pestaña del navegador -->
<title>Práctica PDO: José Roberto Corona Ramírez</title>

<style>
/* Estilo general de toda la página */
body{
    font-family: Arial, sans-serif;
    background:#f5f5f5;
    margin:20px;
    color:#222;
}

/* Estilo del título principal */
h2{
    color:#1f4e79;
    margin-bottom:10px;
}

/* Estilo de cada sección o tarjeta visual */
.card{
    background:#fff;
    border:1px solid #dcdcdc;
    border-radius:6px;
    padding:16px;
    margin-bottom:16px;
}

/* Contenedor en fila para acomodar los campos del formulario */
.row{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}

/* Contenedor individual para cada campo del formulario */
.campo{
    display:flex;
    flex-direction:column;
}

/* Estilo de las etiquetas de los campos */
label{
    font-weight:bold;
    margin-bottom:6px;
}

/* Estilo de cajas de texto y correo */
input[type="text"],
input[type="email"]{
    width:240px;
    padding:8px;
    border:1px solid #ccc;
    border-radius:4px;
}

/* Estilo del botón principal */
.btn{
    background:#2d7ff9;
    color:white;
    border:none;
    padding:10px 16px;
    border-radius:4px;
    cursor:pointer;
}

/* Cambio de color al pasar el mouse sobre el botón */
.btn:hover{
    background:#1f6fe5;
}

/* Estilo del mensaje de éxito cuando hay COMMIT */
.msg-ok{
    background:#dff0d8;
    color:#3c763d;
    padding:12px;
    border-radius:4px;
    border:1px solid #c3e6cb;
}

/* Estilo del mensaje de error cuando hay ROLLBACK */
.msg-error{
    background:#f2dede;
    color:#a94442;
    padding:12px;
    border-radius:4px;
    border:1px solid #ebccd1;
}

/* Texto pequeño de ayuda o notas */
.small{
    font-size:12px;
    color:#666;
}

/* Color especial para mostrar detalles de error */
.danger{
    color:#b30000;
    font-size:12px;
}

/* Estilo general de las tablas */
table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

/* Bordes y espacio interno de celdas */
th, td{
    border:1px solid #ddd;
    padding:10px;
}

/* Fondo gris claro para encabezados de tabla */
th{
    background:#f0f0f0;
}
</style>

</head>
<body>

<!-- Título principal visible del sistema -->
<h2>Práctica: try/catch y transacciones (PDO + MySQL)</h2>

<!-- Nombre del alumno mostrado en pantalla -->
<p><strong>Alumno:</strong> José Roberto Corona Ramírez</p>

<!-- Tarjeta principal que contiene el formulario -->
<div class="card">
<form method="POST">

<!-- Fila que agrupa los tres campos del formulario -->
<div class="row">

    <!-- Campo para capturar el nombre -->
    <div class="campo">
        <label>Nombre</label>
        <input type="text" name="nombre"
        value="<?= htmlspecialchars($_POST['nombre'] ?? 'José Roberto') ?>">
    </div>

    <!-- Campo para capturar el apellido -->
    <div class="campo">
        <label>Apellido</label>
        <input type="text" name="apellido"
        value="<?= htmlspecialchars($_POST['apellido'] ?? 'Corona Ramírez') ?>">
    </div>

    <!-- Campo para capturar el correo -->
    <div class="campo">
        <label>Correo</label>
        <input type="email" name="correo"
        value="<?= htmlspecialchars($_POST['correo'] ?? 'jose.roberto@ejemplo.com') ?>">
    </div>

</div>

<!-- Casilla que permite provocar un error intencional -->
<p style="margin-top:10px;">
<label style="font-weight:normal;">
<input type="checkbox" name="simular_error"
<?= isset($_POST['simular_error']) ? 'checked' : '' ?>>
Simular error para forzar ROLLBACK.
</label>
</p>

<!-- Texto de ayuda para explicar la función de la casilla -->
<p class="small">(Actívalo para comprobar que no se guarda nada si ocurre un error)</p>

<!-- Botón que envía el formulario -->
<button class="btn">Registrar alumno</button>

</form>
</div>

<!-- Si existe un mensaje, se muestra el resultado de la operación -->
<?php if ($mensaje): ?>
<div class="card">

    <!-- Si el mensaje contiene la palabra COMMIT, se usa estilo verde;
         de lo contrario se usa estilo rojo -->
    <div class="<?= str_contains($mensaje, 'COMMIT') ? 'msg-ok' : 'msg-error' ?>">
        <?= htmlspecialchars($mensaje) ?>
    </div>

    <!-- Si hay detalle de error, se muestra debajo del mensaje -->
    <?php if ($detalle): ?>
    <p class="danger">Detalle: <?= htmlspecialchars($detalle) ?></p>
    <?php endif; ?>

</div>
<?php endif; ?>

<!-- Tarjeta que muestra la tabla de alumnos -->
<div class="card">
<h3>Tabla alumnos</h3>

<?php if (!$alumnos): ?>
    <!-- Mensaje si aún no existen registros -->
    <p class="small">Sin registros.</p>
<?php else: ?>

<table>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Correo</th>
</tr>

<!-- Se recorren todos los alumnos obtenidos de la base de datos -->
<?php foreach ($alumnos as $a): ?>
<tr>
    <td><?= $a['idAlumno'] ?></td>
    <td><?= $a['nombre'] ?></td>
    <td><?= $a['apellido'] ?></td>
    <td><?= $a['correo'] ?></td>
</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>
</div>

<!-- Tarjeta que muestra la tabla de logs -->
<div class="card">
<h3>Tabla logs_alumnos</h3>

<?php if (!$logs): ?>
    <!-- Mensaje si no existen logs registrados -->
    <p class="small">Sin registros.</p>
<?php else: ?>

<table>
<tr>
    <th>ID Log</th>
    <th>ID Alumno</th>
    <th>Acción</th>
    <th>Fecha</th>
</tr>

<!-- Se recorren todos los logs obtenidos de la base de datos -->
<?php foreach ($logs as $l): ?>
<tr>
    <td><?= $l['idLog'] ?></td>
    <td><?= $l['idAlumno'] ?></td>
    <td><?= $l['accion'] ?></td>
    <td><?= $l['fecha'] ?></td>
</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>
</div>

<!-- Nota final que indica cómo hacer las pruebas principales -->
<p class="small">
Prueba recomendada: 1) Registrar sin simular error (COMMIT).  
2) Activar “Simular error” y registrar (ROLLBACK).
</p>

</body>
</html>
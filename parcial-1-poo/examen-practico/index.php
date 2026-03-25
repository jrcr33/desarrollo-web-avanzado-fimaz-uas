<?php

// Se importan las clases necesarias para crear los objetos.
require_once "clases/Admin.php";
require_once "clases/Alumno.php";
require_once "clases/Invitado.php";

// Arreglo donde se guardarán los usuarios válidos.
$usuarios = [];

// Variable para guardar el mensaje del error controlado.
$mensajeError = "";

// Se usa try/catch para evitar que el programa se detenga por un error fatal.
try {
    // Se crea un administrador válido y se agrega al arreglo.
    $usuarios[] = new Admin("José Roberto Corona Ramírez", "jose.roberto@correo.com");

    // Se crea un alumno válido y se agrega al arreglo.
    $usuarios[] = new Alumno("Ana López", "ana.lopez@correo.com", "20231234");

    // Se crea un invitado válido y se agrega al arreglo.
    $usuarios[] = new Invitado("Carlos Méndez", "carlos.mendez@empresa.com", "Tech Solutions");

    // Se crea un registro inválido para comprobar el manejo de excepciones.
    // Este correo está mal escrito a propósito.
    $usuarios[] = new Alumno("Usuario Inválido", "correo-invalido", "20239999");

} catch (Exception $e) {
    // Se captura la excepción y se guarda un mensaje controlado.
    $mensajeError = "Error controlado: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4 - POO en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 30px;
        }

        h1 {
            color: #1f3c88;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #1f3c88;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .error {
            margin-top: 20px;
            padding: 12px;
            background-color: #ffe0e0;
            color: #b30000;
            border: 1px solid #ffb3b3;
        }
    </style>
</head>
<body>

    <h1>Práctica 4: Integración POO + Herencia + Validaciones + Excepciones</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Matrícula</th>
                <th>Empresa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->getNombre(); ?></td>
                    <td><?php echo $usuario->getCorreo(); ?></td>
                    <td><?php echo $usuario->getRol(); ?></td>
                    <td>
                        <?php
                        // Si el objeto tiene getMatricula(), se muestra; si no, se pone un guion.
                        echo method_exists($usuario, 'getMatricula') ? $usuario->getMatricula() : "—";
                        ?>
                    </td>
                    <td>
                        <?php
                        // Si el objeto tiene getEmpresa(), se muestra; si no, se pone un guion.
                        echo method_exists($usuario, 'getEmpresa') ? $usuario->getEmpresa() : "—";
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!empty($mensajeError)): ?>
        <div class="error">
            <?php echo $mensajeError; ?>
        </div>
    <?php endif; ?>

</body>
</html>
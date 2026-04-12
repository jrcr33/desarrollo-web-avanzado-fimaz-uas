<?php

// Se carga el controlador para poder usar las operaciones CRUD
require_once 'controllers/ProductoController.php';

// Se crea un objeto del controlador
$controller = new ProductoController();

// Variable para mostrar mensajes al usuario
$mensaje = "";

// Variable para guardar el producto que se va a editar
$productoEditar = null;

// Si en la URL viene el parámetro eliminar, se elimina el producto
if (isset($_GET['eliminar'])) {

    // Se obtiene el id que viene por la URL y se convierte a entero
    $idEliminar = (int) $_GET['eliminar'];

    // Se intenta eliminar el producto usando el controlador
    if ($controller->eliminar($idEliminar)) {
        $mensaje = "Producto eliminado correctamente.";
    } else {
        $mensaje = "Error al eliminar el producto.";
    }
}

// Si en la URL viene el parámetro editar, se cargan los datos del producto
if (isset($_GET['editar'])) {

    // Se obtiene el id que viene por la URL y se convierte a entero
    $idEditar = (int) $_GET['editar'];

    // Se consulta el producto por su id para mostrarlo en el formulario
    $productoEditar = $controller->obtenerPorId($idEditar);
}

// Si el formulario fue enviado por método POST, se procesan los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Se obtiene el id oculto del formulario, si existe
    $id = !empty($_POST['id']) ? (int) $_POST['id'] : null;

    // Se obtienen y limpian los datos enviados desde el formulario
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $existencia = (int) $_POST['existencia'];
    $precio = (float) $_POST['precio'];

    // Se crea un nuevo objeto Producto
    $producto = new Producto();

    // Se asignan los valores al objeto usando setters
    $producto->setNombre($nombre);
    $producto->setDescripcion($descripcion);
    $producto->setExistencia($existencia);
    $producto->setPrecio($precio);

    // Si existe un id, significa que se va a actualizar un registro
    if ($id) {

        // Se asigna el id al objeto producto
        $producto->setId($id);

        // Se intenta actualizar el producto
        if ($controller->actualizar($producto)) {
            $mensaje = "Producto actualizado correctamente.";
        } else {
            $mensaje = "Error al actualizar el producto.";
        }

    } else {

        // Si no hay id, se crea un nuevo producto
        if ($controller->crear($producto)) {
            $mensaje = "Producto agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el producto.";
        }
    }
}

// Se obtienen todos los productos para mostrarlos en la tabla
$productos = $controller->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Permite mostrar caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Hace el diseño adaptable -->
    <title>CRUD de Productos con PHP, PDO y POO</title> <!-- Título de la página -->

    <!-- Se enlaza Bootstrap para dar estilo a la interfaz -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Contenedor principal de la página -->
<div class="container mt-5">

    <!-- Título principal -->
    <h1 class="text-center mb-4">CRUD de Productos con PHP, PDO y POO</h1>

    <!-- Si hay mensaje, se muestra en pantalla -->
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>

    <!-- Tarjeta del formulario -->
    <div class="card mb-4">

        <!-- Encabezado del formulario -->
        <div class="card-header bg-primary text-white">

            <!-- Si hay un producto en edición cambia el texto -->
            <?php echo $productoEditar ? "Editar producto" : "Agregar producto"; ?>
        </div>

        <div class="card-body">

            <!-- Formulario para guardar o actualizar -->
            <form method="POST" action="">

                <!-- Campo oculto para guardar el id del producto en edición -->
                <input type="hidden" name="id" value="<?php echo $productoEditar['id'] ?? ''; ?>">

                <div class="row">

                    <!-- Campo nombre -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                               value="<?php echo $productoEditar['nombre'] ?? ''; ?>" required>
                    </div>

                    <!-- Campo descripción -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control"
                               value="<?php echo $productoEditar['descripcion'] ?? ''; ?>" required>
                    </div>

                    <!-- Campo existencia -->
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Existencia</label>
                        <input type="number" name="existencia" class="form-control"
                               value="<?php echo $productoEditar['existencia'] ?? ''; ?>" required>
                    </div>

                    <!-- Campo precio -->
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control"
                               value="<?php echo $productoEditar['precio'] ?? ''; ?>" required>
                    </div>

                    <!-- Botón para guardar o actualizar -->
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            <?php echo $productoEditar ? "Actualizar" : "Guardar"; ?>
                        </button>
                    </div>
                </div>

                <!-- Botón para cancelar edición -->
                <?php if ($productoEditar): ?>
                    <a href="index.php" class="btn btn-secondary">Cancelar edición</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- Tarjeta de la tabla -->
    <div class="card">
        <div class="card-header bg-dark text-white">
            Lista de productos
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">

                <!-- Encabezado de la tabla -->
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Existencia</th>
                        <th>Precio</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- Si hay productos, se recorren y se muestran -->
                    <?php if (count($productos) > 0): ?>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($producto['id']); ?></td>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                                <td><?php echo htmlspecialchars($producto['existencia']); ?></td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td>

                                    <!-- Botón para editar -->
                                    <a href="index.php?editar=<?php echo $producto['id']; ?>" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <!-- Botón para eliminar -->
                                    <a href="index.php?eliminar=<?php echo $producto['id']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Seguro que deseas eliminar este producto?');">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>

                        <!-- Mensaje si no hay productos registrados -->
                        <tr>
                            <td colspan="6" class="text-center">No hay productos registrados.</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
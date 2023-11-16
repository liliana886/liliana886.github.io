<?php
include 'conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>

<body>
    <h1>Editar Producto</h1>
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $producto = mysqli_fetch_assoc($resultado);
            ?>
            <form action="procesar_editar_producto.php" method="post">
                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                <label for="nombre_producto">Nombre del Producto:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" required><br>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required><br>
                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" value="<?php echo $producto['categoria']; ?>" required><br>
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" value="<?php echo $producto['precio']; ?>" required><br>
                <label for="inventario">Inventario:</label>
                <input type="number" id="inventario" name="inventario" value="<?php echo $producto['inventario']; ?>" required><br>
                <label for="fecha_creacion">Fecha de Creación:</label>
                <input type="text" id="fecha_creacion" name="fecha_creacion" value="<?php echo $producto['fecha_creacion']; ?>" required><br>
                <label for="nueva_imagen">Nueva Imagen:</label>
                <input type="file" name="nueva_imagen">
                <button type="submit" name="editar">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Producto no encontrado.";
        }
    } else {
        echo "ID de producto no válido.";
    }
    ?>
    <a href="admin.php">Volver al Panel de Administrador</a>
</body>

</html>

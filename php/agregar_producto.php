<?php
session_start();
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    $nombre_producto = $_POST['nombre_producto'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $inventario = $_POST['inventario'];

    // Procesar la imagen
    $ruta_carpeta = '../img/';
    $nombre_temporal = $_FILES['imagen']['tmp_name'];
    $nombre_original = $_FILES['imagen']['name'];
    $ruta_destino = $ruta_carpeta . $nombre_original;

    if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
        // La imagen se ha subido correctamente

        // Insertar producto en la base de datos con la columna 'imagen'
        $insertar_producto = "INSERT INTO productos (nombre_producto, precio, descripcion, categoria, inventario, fecha_creacion, imagen) VALUES ('$nombre_producto', $precio, '$descripcion', '$categoria', $inventario, NOW(), '$nombre_original')";

        if (mysqli_query($conexion, $insertar_producto)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error al agregar el producto: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>

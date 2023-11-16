<?php
session_start();
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $inventario = $_POST['inventario'];

    // Procesar la nueva imagen si se proporciona
    if ($_FILES['nueva_imagen']['name']) {
        $ruta_destino = "carpeta_destino/";
        $imagen_nombre = $_FILES['nueva_imagen']['name'];
        $ruta_imagen = $ruta_destino . $imagen_nombre;

        move_uploaded_file($_FILES['nueva_imagen']['tmp_name'], $ruta_imagen);

        // Aquí puedes guardar la ruta de la nueva imagen en la base de datos
        // Asegúrate de actualizar la consulta SQL en consecuencia
        $actualizar_producto = "UPDATE productos SET nombre_producto='$nombre_producto', precio=$precio, descripcion='$descripcion', categoria='$categoria', inventario=$inventario, imagen='$ruta_imagen' WHERE id=$id";
    } else {
        // Si no se proporciona una nueva imagen, actualizar sin cambios en la imagen
        $actualizar_producto = "UPDATE productos SET nombre_producto='$nombre_producto', precio=$precio, descripcion='$descripcion', categoria='$categoria', inventario=$inventario WHERE id=$id";
    }

    if (mysqli_query($conexion, $actualizar_producto)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }
}
?>

<?php
// procesar_agregar_producto.php

// Otros procesos y validaciones

// Ruta de la carpeta donde se guardarán las imágenes
$ruta_carpeta = '../img/';

// Nombre temporal y nombre original de la imagen
$nombre_temporal = $_FILES['imagen']['tmp_name'];
$nombre_original = $_FILES['imagen']['name'];

// Mover la imagen a la carpeta de destino
$ruta_destino = $ruta_carpeta . $nombre_original;

if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
    // La imagen se ha subido correctamente
    // Guardar la ruta en la base de datos
    $ruta_imagen_bd = 'img/' . $nombre_original;

    // Insertar la ruta en la base de datos junto con otros datos del producto
    $consulta_insertar = "INSERT INTO productos (nombre_producto, precio, descripcion, categoria, inventario, fecha_creacion, imagen) VALUES ('$nombre_producto', $precio, '$descripcion', '$categoria', $inventario, CURRENT_TIMESTAMP, '$ruta_imagen_bd')";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conexion, $consulta_insertar)) {
        // Éxito: redirigir al administrador a la página de productos
        header("Location: admin.php");
        exit();
    } else {
        // Error en la consulta
        echo "Error al agregar el producto: " . mysqli_error($conexion);
    }
} else {
    // Error al mover la imagen
    echo "Error al subir la imagen.";
}
?>

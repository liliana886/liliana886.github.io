<?php
session_start();
include('conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $eliminar_producto = "DELETE FROM productos WHERE id=$id";

    if (mysqli_query($conexion, $eliminar_producto)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }
} else {
    echo "ID de producto no proporcionado.";
}
?>

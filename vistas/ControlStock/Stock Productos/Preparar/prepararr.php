<?php
require('../conexion/conexion.php');

if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    // Consulta para actualizar la cantidad en la tabla stock_productos
    $sql = "UPDATE stock_productos SET cantidad = cantidad + $cantidad WHERE id_producto = $id_producto";

    // Ejecuta la consulta
    if ($mysqli->query($sql)) {
        // Éxito al actualizar la cantidad
        echo "<script> alert('Stock Actualizado');location.href='../ControlStock.php'; </script>";
    } else {
        // Error al actualizar la cantidad
        echo "Error al preparar el producto: " . $mysqli->error;
    }
} else {
    echo "No se proporcionaron los datos necesarios.";
}
?>

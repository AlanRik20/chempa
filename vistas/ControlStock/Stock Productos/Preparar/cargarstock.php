<?php
require('../conexion/conexion.php');

if (isset($_POST['preparar'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    // Consulta para agregar un nuevo registro en la tabla stock_productos
    $sql = "INSERT INTO stock_productos (id_producto, cantidad) VALUES ($id_producto, $cantidad)";

    // Ejecuta la consulta
    if ($mysqli->query($sql)) {
        // Éxito al agregar el registro
        echo "El producto se ha preparado y se ha agregado al stock.";
    } else {
        // Error al agregar el registro
        echo "Error al preparar el producto: " . $mysqli->error;
    }
}
?>

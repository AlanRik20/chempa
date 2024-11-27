<?php
// obtener_detalles_pedido.php

// Conectar a la base de datos
require('conexion/conexion.php');

$id_pedido = $_GET['id_pedido']; // Obtener el ID del pedido desde la solicitud GET

// Consulta para obtener los detalles del pedido con el nombre del producto
$consulta = mysqli_query($mysqli, "SELECT detalle_pedidos.*, productos.nombre_pro 
                                   FROM detalle_pedidos 
                                   LEFT JOIN productos ON detalle_pedidos.id_producto = productos.id_producto 
                                   WHERE id_pedido = $id_pedido");

// Construir la lista de detalles
$detalles = "";
while ($detalle = mysqli_fetch_assoc($consulta)) {
    $detalles .= "Producto: " . $detalle['nombre_pro'] . ", Cantidad: " . $detalle['cantidad'] . "<br>";
}

echo $detalles;
?>

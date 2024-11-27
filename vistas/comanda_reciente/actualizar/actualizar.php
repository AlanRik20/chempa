<?php
require('../conexion/conexion.php');
$id_pedido=$_POST['actualizar'];

$sql="UPDATE pedidos SET id_estado_pedido= 2 WHERE  id_pedido = $id_pedido ";
$resultado=mysqli_query($mysqli,$sql);

header("Location: ../index.php ");
?>
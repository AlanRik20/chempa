<?php
require('../conexion/conexion.php');
    $query = "DELETE FROM compra_ficticia";
    $sentencia = mysqli_prepare($mysqli, $query);
    
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado> 1) {
        echo "<script> alert('Se elimino correctamente');location.href='MostrarCompra.php'; </script>";

    } else {
        echo "<script> alert('No se elimino correctamente :( ');location.href='MostrarCompra.php'; </script>";
        

    }
?>
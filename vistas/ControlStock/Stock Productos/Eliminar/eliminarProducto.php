<?php
require('conexion.php');

if (isset($_POST["eliminar"])) {



    $id_producto = $_POST["id_producto"];

    $query = "DELETE FROM detalle_productos WHERE id_producto=$id_producto";
    $sentencia = mysqli_prepare($mysqli, $query);

    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado >= 1) {
        $query = "DELETE FROM stock_productos WHERE id_producto=$id_producto";
        $sentencia = mysqli_prepare($mysqli, $query);
        mysqli_stmt_execute($sentencia);
        $afectado = mysqli_stmt_affected_rows($sentencia);
        if ($afectado >= 1) {
            $query = "DELETE FROM productos WHERE id_producto=$id_producto";
            $sentencia = mysqli_prepare($mysqli, $query);
            mysqli_stmt_execute($sentencia);
            $afectado = mysqli_stmt_affected_rows($sentencia);
            echo "<script> alert('Se elimino el producto correctamente');location.href='../ControlStock.php'; </script>";
        } else {
            echo "<script> alert('No se elimino correctamente :( ');location.href='../ControlStock.php'; </script>";
            
    
        }
        
    } else {
        echo "<script> alert('No se elimino correctamente :( ');location.href='../ControlStock.php'; </script>";
        

    }
}
?>
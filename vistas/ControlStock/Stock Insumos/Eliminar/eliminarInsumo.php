<?php
require('conexion.php');

if (isset($_POST["eliminar"])) {
    $id_insumo = $_POST["id_insumo"];

    $query = "DELETE FROM `detalle_productos` WHERE `detalle_productos`.`id_insumo` = $id_insumo";
    $sentencia = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado >= 1) {
        $query = "DELETE FROM insumos WHERE id_insumo=$id_insumo";
        $sentencia = mysqli_prepare($mysqli, $query);
        mysqli_stmt_execute($sentencia);
        $afectado = mysqli_stmt_affected_rows($sentencia);
        echo "<script> alert('Se elimino correctamente');location.href='../ControlStock.php'; </script>";

    } else {
        $query = "DELETE FROM insumos WHERE id_insumo=$id_insumo";
        $sentencia = mysqli_prepare($mysqli, $query);
        mysqli_stmt_execute($sentencia);
        $afectado = mysqli_stmt_affected_rows($sentencia);
        echo "<script> alert('Se elimino correctamente');location.href='../ControlStock.php'; </script>";

    }
}
?>
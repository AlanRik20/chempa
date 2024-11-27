<?php
require('conexion.php');

if (isset($_POST["eliminar"])) {
    $cod_prv = $_POST["cod_Proveedor"];

    $query = "DELETE FROM proveedores WHERE cod_Proveedor=?";
    $sentencia = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($sentencia, "i", $cod_prv);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El proveedor se elimino correctamente');location.href='../proveedores.php'; </script>";

    } else {
        echo "<script> alert('El proveedor no elimino correctamente :( '); location.href='../proveedores.php';</script>";
    }
}
?>
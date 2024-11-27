<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
    require('../conexion/conexion.php');
    $id_persona = $_POST['id_persona'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cuit = $_POST['cuit'];
    $tipo_proveedor = $_POST['id_tipo_proveedor'];
    $proveedor = $_POST['id_proveedor'];
    $fecha_nac = $_POST['fecha_nac'];

    $sql = "UPDATE `personas` SET `nombre_per` = '$nombre', `apellido` = '$apellido', `fecha_nac` = '$fecha_nac' WHERE `id_persona` = $id_persona;";
    $resultado = $mysqli->query($sql);
    if (!$resultado) {
        echo "<script> alert('El registo no se agregó correctamente'); location.href='../Inicio.php'; </script>";
    } else {
        $sql = "UPDATE `proveedores` SET `cuit` = '$cuit', `id_tipo_proveedor` = '$tipo_proveedor' WHERE `proveedores`.`id_proveedor` = $proveedor;";
        $resultado = $mysqli->query($sql);
        echo "<script> alert('Se modificó el registro correctamente'); location.href='../Inicio.php'; </script>";
    }
    ?>
</body>
</html>

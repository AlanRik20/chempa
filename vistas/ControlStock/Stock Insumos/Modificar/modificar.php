<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('../conexion/conexion.php');
    $insumo=$_POST['id_insumo'];
    $nombre=$_POST['descripcion'];
    $cantidad=$_POST['cantidad'];
    $tipo_medida=$_POST['id_tipo_medida'];
    $proveedor=$_POST['id_proveedor'];
    $tipo_insumo=$_POST['id_tipo_producto'];

    $sql = "UPDATE `insumos` SET `id_proveedor` = '$proveedor', `id_tipo_insumo` = '$tipo_insumo', `descripcion` = '$nombre',`cantidad` = '$cantidad', `id_tipo_medida` = '$tipo_medida' WHERE `insumos`.`id_insumo` = $insumo;";
    $resultado= $mysqli->query($sql);
    if(!$resultado){
        echo "<script> alert('El registo no se agregó correctamente'); location.href='../ControlStock.php'; </script>";
    }
    else{
        
        echo "<script> alert('Se modificó el registro correctamente'); location.href='../ControlStock.php'; </script>";

    }
   
    
    ?>
</body>
</html>
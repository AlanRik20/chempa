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
    require('conexion.php');
    $cod_Proveedor=$_POST['cod_Proveedor'];
    $Nombre=$_POST['nvnombre'];
    $sql = "UPDATE `proveedores` SET `provedor` = '$Nombre' WHERE `proveedores`.`cod_Proveedor` = $cod_Proveedor";
    $resultado= $mysqli->query($sql);
    if(!$resultado){
        echo "<script> alert('No se modificó el nombre.');location.href='../proveedores.php'; </script>";
        
    }
    else{
        echo "<script> alert('El nombre se modificó correctamente.');location.href='../proveedores.php'; </script>";

    }
    
    ?>
</body>
</html>
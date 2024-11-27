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
    $nombre_prov=$_POST['nombre'];
    $telefono_prov=$_POST['telefono'];
    $direccion_prov=$_POST['direccion'];
    $email_prov=$_POST['email'];

    $sql = "INSERT INTO `proveedores` (`cod_Proveedor`, `provedor`, `direccion`, `telefono`, `email`) VALUES (NULL, '$nombre_prov', '$direccion_prov', '$telefono_prov', '$email_prov');";
    $resultado= $mysqli->query($sql);
    if(!$resultado){
        echo"No se agrego el registro";
    }
    else{
        echo "<script> alert('El proveedor [$nombre_prov] se agregó correctamente'); location.href='agregar_proveedor.html'; </script>";
    }
    
    ?>
</body>
</html>
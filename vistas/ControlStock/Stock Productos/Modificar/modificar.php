<?php
require('../conexion/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $sql = "UPDATE `productos` SET `nombre_pro` = '$nombre_producto', `precio` = '$precio', `descripcion` = '$descripcion' WHERE `productos`.`id_producto` = $id_producto;";
    $resultado = $mysqli->query($sql);

    if (!$resultado) {
        echo "<script> alert('El registro no se modificó correctamente'); location.href='../ControlStock.php'; </script>";
    } else {
        echo "<script> alert('El producto se modifico correctamente'); location.href='../ControlStock.php'; </script>";
        $sql = "UPDATE `stock_productos` SET `cantidad` = '$cantidad' WHERE `stock_productos`.`id_producto` = $id_producto;";
            $resultado2 = $mysqli->query($sql);
        if(isset($_FILES['nueva_img']) && $_FILES['nueva_img']['error']===UPLOAD_ERR_OK) {
            $nombreimg = $_FILES['nueva_img']['name'];
            $ruta = '../img/' . $nombreimg; // Ajusta la ruta donde se guardará la img
            move_uploaded_file($_FILES['nueva_img']['tmp_name'], $ruta);

            $sql_img = "UPDATE `productos` SET `img` = '$nombreimg' WHERE `productos`.`id_producto` = $id_producto;";
            $resultado_img = $mysqli->query($sql_img);
            if (!$resultado_img) {
                echo "<script> alert('El registro no se agregó correctamente'); location.href='../ControlStock.php'; </script>";
            } else {
                echo "<script> alert('El registro se agregó correctamente'); location.href='../ControlStock.php'; </script>";
                
                }
        }
    }
}else{
    echo "<script> alert('Sin modificaciones'); location.href='../ControlStock.php'; </script>";
}

?>

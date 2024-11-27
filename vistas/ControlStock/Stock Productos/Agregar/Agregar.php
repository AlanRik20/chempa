<?php
require('../conexion/conexion.php');

if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['descripcion']) && isset($_POST['id_medida_producto'])) {
    $nombre_producto = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    
    // Agregar nuevo producto
    $sql = "INSERT INTO `productos` (`id_producto`, `nombre_pro`, `precio`, `descripcion`,`img`) VALUES (NULL, '$nombre_producto', '$precio', '$descripcion','Sin Imagen');";
    $resultado = $mysqli->query($sql);

    if ($resultado) {
        
        $id_producto = $mysqli->insert_id;
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

        // Insertar en detalle_productos (cantidad de insumos)
        $insumosSelect = $_POST['insumosSelect'];
        $cantidadInsumos = $_POST['cantidadInsumo'];

        if (is_array($insumosSelect) && is_array($cantidadInsumos) && count($insumosSelect) === count($cantidadInsumos)) {
            foreach ($insumosSelect as $index => $id_insumo) {
                $cantidadInsumo = $cantidadInsumos[$index]/12;
                
                // Aquí inserta la cantidad de insumos y la asociación al producto
                $sqlDetalle = "INSERT INTO `detalle_productos` (`id_detalle_producto`, `id_producto`, `id_insumo`, `cantidad`) VALUES (NULL, '$id_producto', '$id_insumo', '$cantidadInsumo');";
                $resultadoDetalle = $mysqli->query($sqlDetalle);

                if (!$resultadoDetalle) {
                    echo "Hubo un error al procesar los insumos y cantidades";
                    exit;
                }
            }
        } else {
            echo "Hubo un error al procesar los insumos y cantidades";
            exit;
        }

        // Insertar en la tabla stock_productos
        $sqlStock = "INSERT INTO `stock_productos` (`id_stock_producto`, `id_producto`, `cantidad`) VALUES (NULL, '$id_producto', '$cantidadInsumos[0]');";
        $resultadoStock = $mysqli->query($sqlStock);

        if (!$resultadoStock) {
            echo "Hubo un error al procesar la cantidad en stock";
            exit;
        }

        echo "<script> alert('El producto agregó correctamente'); location.href='../ControlStock.php'; </script>";
    } else {
        echo "El registro no se agregó correctamente";
    }
} else {
    echo "Faltan datos del formulario";
}
?>

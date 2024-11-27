
    <?php
    require('../conexion/conexion.php');
    $nombre_insumo=$_POST['Nombre'];
    $tipo_insumo=$_POST['id_tipo_insumo'];
    $cantidad=$_POST['cantidad'];
    $tipo_medida=$_POST['id_tipo_medida'];
    $proveedor=$_POST['id_proveedor'];

    $sql = "INSERT INTO `insumos` (`id_insumo`, `id_proveedor`, `id_tipo_insumo`, `descripcion`, `cantidad`, `id_tipo_medida`) VALUES (NULL, '$proveedor', '$tipo_insumo', '$nombre_insumo','$cantidad', '$tipo_medida');";
    $resultado= $mysqli->query($sql);
    if(!$resultado){
        echo "<script> alert('El registo no se agregó correctamente'); location.href='../ControlStock.php'; </script>";
    }
    else{

        echo "<script> alert('[$nombre_insumo] se agregó correctamente'); location.href='../ControlStock.php'; </script>";

    }
    
    ?>

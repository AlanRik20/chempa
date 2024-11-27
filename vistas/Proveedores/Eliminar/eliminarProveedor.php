<?php
require('conexion.php');

if (isset($_POST["eliminar"])) {
    $id_proveedor = $_POST['id_proveedor'];
    $id_persona = $_POST['id_persona'];

    echo" $id_proveedor $id_persona";

    $query = "DELETE FROM `contactos` WHERE `contactos`.`id_persona`=$id_persona";
    $resultado = $mysqli->query($query);

        if (!$resultado) {
            echo"contacto no eliminado";
            
        } else {
          
            $query = "UPDATE `insumos` SET `id_proveedor` = NULL WHERE `insumos`.`id_proveedor`=$id_proveedor";
            $resultado2 = $mysqli->query($query);
            if($resultado2){
                $query = "DELETE FROM `proveedores` WHERE `proveedores`.`id_proveedor` =$id_proveedor";
                $resultado3 = $mysqli->query($query);
            echo "<script> alert('Se elimino el proveedor'); location.href='../Index.php'; </script>";

            }else{
            echo "<script> alert('Error al eliminar proveedor'); location.href='../Index.php'; </script>";
            }
        }
    
}
?>

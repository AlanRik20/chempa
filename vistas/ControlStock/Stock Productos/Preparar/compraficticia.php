<?php
require('../conexion/conexion.php');
var_dump($_POST);

if (isset($_POST['id_producto'], $_POST['cantidad'], $_POST['ingredientesJSON'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $ingredientesJSON = $_POST['ingredientesJSON'];

    $ingredientesArray = json_decode($_POST['ingredientesJSON'], true);

    
    echo "id_producto: $id_producto<br>";
    echo "cantidad: $cantidad<br>";
    echo "ingredientesArray: ";
   
    
        // Inserta en la tabla compra_ficticia
        $insertCompra = "INSERT INTO compra_ficticia (id_compra_ficticia,id_producto, cantidad_pcto) VALUES (NULL, $id_producto, $cantidad)";
        $resultCompra = $mysqli->query($insertCompra);

        if ($resultCompra) {
            $mysqli->commit();
            echo "<script> alert('Se agregó correctamente'); location.href='MostrarCompra.php'; </script>";
            session_start(); // Inicia la sesión si aún no lo has hecho
            $_SESSION['cantidad'] = $cantidad;
            // Redirige a MostrarCompra.php
            header("Location: MostrarCompra.php");
            
        } else {
            // Si ocurre un error en la inserción de compra_ficticia, realiza un rollback de la transacción
            $mysqli->rollback();
            die("Error en la inserción de compra_ficticia: " . mysqli_error($mysqli));
        }
    
} else {
    echo "No se proporcionaron los datos necesarios.";
}
?>

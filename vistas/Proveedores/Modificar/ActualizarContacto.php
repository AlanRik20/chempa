<?php
require('../conexion/conexion.php');

if (isset($_POST['id_persona']) && isset($_POST['id_contacto']) && isset($_POST['contacto'])) {
    $id_persona = $_POST['id_persona'];
    $id_contactos = $_POST['id_contacto'];
    $nuevos_contactos = $_POST['contacto'];

    foreach ($id_contactos as $index => $id_contacto) {
        $nuevo_contacto = mysqli_real_escape_string($mysqli, $nuevos_contactos[$index]);
        $sql = "UPDATE contactos SET valor = '$nuevo_contacto' WHERE id_contacto = '$id_contacto'";
        mysqli_query($mysqli, $sql);
    }
    
    echo "<script> alert('El contacto se actualizó correctamente'); location.href='../Inicio.php'; </script>";
    exit();
} else {
    echo "Error: No se proporcionaron los datos necesarios para actualizar el contacto.";
}
?>

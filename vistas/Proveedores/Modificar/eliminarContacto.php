<?php
require('../conexion/conexion.php');

if (isset($_POST['eliminar_contacto'])) {
    $id_contacto = $_POST['eliminar_contacto'];

    $sql = "DELETE FROM contactos WHERE id_contacto = '$id_contacto'";
    $resultado = $mysqli->query($sql);

    if ($resultado) {
        echo "<script>alert('Contacto eliminado correctamente.'); location.href='ModificarCont.php?id_persona=$id_persona';</script>";
    } else {
        echo "<script>alert('Error al eliminar el contacto.'); location.href='ModificarCont.php?id_persona=$id_persona';</script>";
    }
}
?>

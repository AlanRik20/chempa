<?php
require('../conexion/conexion.php');

$id_tipo_contacto = $_POST['id_tipo_contacto'];
$valor = $_POST['valor'];
$id_persona = $_POST['id_persona'];


$sql = "INSERT INTO `contactos` (`id_contacto`, `id_persona`, `id_tipo_contacto`, `valor`) VALUES (NULL, '$id_persona', '$id_tipo_contacto', '$valor');";
$resultado = $mysqli->query($sql);
if (!$resultado) {
    echo "<script> alert('El contacto no se agregó correctamente');location.href='../index.php'; </script>";
} else {
    echo "<script> alert('El contacto se agregó correctamente');location.href='../index.php'; </script>";
}

?>

<?php
// esto verifica que haya iniciado sesion
//tenes que copiar en todos las pantallas que va a tener el cliente
// en el else if, cambiale $rol_usuario == 1, porque si es administrador y quiere entrar a cliente, que lo mande a pantalla de inicio admin
// tambien en el else if cambiale el header a inicio admin
session_start();
$usuario = $_SESSION['usuario'];
$rol_usuario = $_SESSION['rol'];
if (!isset($usuario)) {
  header("location:login\index.php");
} else if ($rol_usuario != 1) {
  header("location:menuusuario.html");
} 

?>
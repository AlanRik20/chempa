<?php
include("php/conexion.php");
session_start();
// $c = new conectar();
// $conn = $c->conexion();

if (!empty($_POST['enviar_login'])) {

    $usuario_login = $_POST['usuario_login'];
    $password_login = $_POST['password_login'];

    $consulta = "SELECT id_cargo,nombre,contraseña FROM empleados e INNER JOIN usuarios u ON u.id_usuario = e.id_usuario WHERE nombre='$usuario_login' AND contraseña='$password_login'"; //consulta si existe el usuario
    $existente = mysqli_query($conn, $consulta); //realiza la consulta
    $filas = mysqli_num_rows($existente); //cuenta la cantidad de filas en la consulta, si existe el usuario devolverá 1

    if ($filas > 0) {
        $consulta2 = "SELECT id_cargo,nombre,contraseña FROM empleados e INNER JOIN usuarios u ON u.id_usuario = e.id_usuario WHERE nombre='$usuario_login' AND contraseña='$password_login'"; //consulta si existe el usuario
        $existente2 = mysqli_query($conn, $consulta); //realiza la consulta

        $row = mysqli_fetch_array($existente2);
        $_SESSION['usuario'] = $row['nombre'];
        $_SESSION['rol'] = $row['id_cargo'];
        $tipo_rol = $row['id_cargo'];

        if ($tipo_rol == 1) {
            header("location:vistas/menuusuario.html");
        } else if ($tipo_rol == 2) {
            // header("location:google.com");
            header("location:modificarusuario.html");
        } else if ($tipo_rol == 3) {
            header("location:vistas/Gerente/MenuGerente.html");
        } else if ($tipo_rol == 4) {
            header("location:vistas/pedidos/index.html");
        } else if ($tipo_rol == 6) {
            header("location:vistas/comanda_reciente/index.php");
        }
    } else {
        echo '<div class="alerta_login">Usuario o contraseñas incorrectas</div>';
    }
}

?>
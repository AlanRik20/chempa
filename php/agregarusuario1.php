<?php

include("conexion.php");
date_default_timezone_set('America/Buenos_Aires');
$fecha = date('y-m-d');
if (!empty($_POST['enviar'])) {
    $nombre_persona = $_POST["nombre-persona"];
    $apellido_persona = $_POST["apellido-persona"];
    $fecha_nac = $_POST['fecha_nac'];

    $sql1 = "SELECT * FROM personas WHERE nombre_per = '$nombre_persona' and apellido ='$apellido_persona'";
    $ejec1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_num_rows($ejec1);

    // busca en la tabla personas si el nombre y apellido de esa persona ya esta cargado en la bd

    if ($row1 == 0) {

        $nombre_usuario = $_POST["nombre-usuario"];
        $sql2 = "SELECT * FROM usuarios WHERE nombre = '$nombre_usuario'";
        $ejec2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_num_rows($ejec2);

        // busca en la tabla de usuarios si ese nombre de usuario ya esta cargado

        if ($row2 == 0) {
            $cuil = $_POST["cuil"];
            $sql3 = "SELECT * FROM empleados WHERE cuil = '$cuil'";
            $ejec3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_num_rows($ejec3);

            // busca en la tabla de empleados algun empleado que concida con el cuil cargado

            if ($row3 == 0) {
                $sql4 = "INSERT INTO personas (nombre_per,apellido,fecha_nac) VALUES ('$nombre_persona','$apellido_persona','$fecha_nac')";
                $ejec4 = mysqli_query($conn, $sql4);

                // hace la carga de la persona en la tabla personas
                // despues tengo que seleccionar a esa persona con una consulta sql
                // seleccionando el id mas alto de la tabla personas
                // obteniendo ese id puedo hacer la carga en las tablas de empleado, direcciones y contactos

                if ($ejec4) {
                    $sql5 = "SELECT MAX(id_persona) AS id_persona FROM personas";
                    $ejec5 = mysqli_query($conn, $sql5);
                    $row4 = mysqli_fetch_assoc($ejec5);
                    $id_persona = $row4['id_persona'];

                    $contacto = $_POST['contacto'];
                    $id_tipo_contacto = $_POST['tipo-contacto'];

                    $sql6 = "INSERT INTO contactos (id_persona, id_tipo_contacto, valor) VALUES ('$id_persona', '$id_tipo_contacto', '$contacto' )";
                    $ejec6 = mysqli_query($conn, $sql6);

                    if ($ejec6) {
                        $tipo_direccion = 1;
                        $barrio = $_POST['barrio'];
                        $localidad = 10;
                        $provincia = 1;

                        $sql7 = "INSERT INTO direcciones (id_tipo_direccion, id_barrio, id_persona, id_localidad, id_provincia) 
                        VALUES ('$tipo_direccion', '$barrio', '$id_persona', '$localidad', '$provincia' )";
                        $ejec7 = mysqli_query($conn, $sql7);

                        if ($ejec7) {
                            $nombre_usuario = $_POST['nombre-usuario'];
                            $password = $_POST['password'];
                            $fecha = date('y-m-d');

                            $sql8 = "INSERT INTO usuarios (nombre, contraseña, f_registro) VALUES ('$nombre_usuario', '$password', '$fecha')";
                            $ejec8 = mysqli_query($conn, $sql8);

                            if ($ejec8) {

                                // luego de cargar todo en las tablas uno por uno 
                                // selecciono el id mayor de cada tabla para 
                                // cargarlo en la tabla empleados

                                $sql9 = "SELECT MAX(id_usuario) AS id_usuario FROM usuarios";
                                $ejec9 = mysqli_query($conn, $sql9);
                                $row5 = mysqli_fetch_assoc($ejec9);

                                $id_usuario = $row5['id_usuario'];


                                $sql10 = "SELECT MAX(id_contacto) AS id_contacto FROM contactos";
                                $ejec10 = mysqli_query($conn, $sql10);
                                $row6 = mysqli_fetch_assoc($ejec10);

                                $id_contacto = $row6['id_contacto'];


                                $sql11 = "SELECT MAX(id_direccion) AS id_direccion FROM direcciones";
                                $ejec11 = mysqli_query($conn, $sql11);
                                $row7 = mysqli_fetch_assoc($ejec11);

                                $id_direccion = $row7['id_direccion'];

                                $cargo = $_POST['cargo'];
                                $cuil = $_POST["cuil"];


                                // carga al empleado


                                $sql12 = "INSERT INTO empleados (id_persona, id_cargo, id_contacto, id_direccion, cuil, id_usuario) 
                                        VALUES ('$id_persona', '$cargo', '$id_contacto', '$id_direccion', '$cuil', '$id_usuario'  ) ";
                                $ejec12 = mysqli_query($conn, $sql12);

                                if ($ejec12) {
                                    echo "<div class='alerta exito'>Empleado cargado</div>";
                                    // por favor anda
                                } else {
                                    echo '<div class="alerta error">Error al cargar el empleado</div>';
                                }
                            } else {
                                echo '<div class="alerta error">Error al cargar el usuario</div>';
                            }
                        } else {
                            echo '<div class="alerta error">Error al cargar la direccion</div>';
                        }
                    } else {
                        echo '<div class="alerta error">Error al cargar el contacto</div>';
                    }
                }
            } else {
                echo '<div class="alerta error">CUIL ya cargado</div>';
            }
        } else {
            echo '<div class="alerta error">Nombre de usuario ya cargado</div>';
        }
    } else {
        echo '<div class="alerta error">Persona ya cargada</div>';
    }
}
?>
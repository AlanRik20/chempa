<?php

include("conexion.php");
date_default_timezone_set('America/Buenos_Aires');
$fecha = date('y-m-d');
if (!empty($_POST['enviar'])) {

    $id_persona = $_POST['id-persona'];
    $nombre_persona = $_POST["nombre-persona"];
    $apellido_persona = $_POST["apellido-persona"];
    $fecha_nac = $_POST['fecha-nacimiento'];

    // $sql4 = "INSERT INTO personas (nombre_per,apellido,fecha_nac) VALUES ('$nombre_persona','$apellido_persona','$fecha_nac')";
    $sql4 = "UPDATE personas SET nombre_per='$nombre_persona',apellido='$apellido_persona',fecha_nac='$fecha_nac' WHERE id_persona = '$id_persona'";
    $ejec4 = mysqli_query($conn, $sql4);

    // hace la modificacion de la persona en la tabla personas

    if ($ejec4) {
        // // $sql5 = "SELECT MAX(id_persona) AS id_persona FROM personas";
        // // $ejec5 = mysqli_query($conn, $sql5);
        // // $row4 = mysqli_fetch_assoc($ejec5);
        // // $id_persona = $row4['id_persona'];

        $id_contacto = $_POST['id-contacto'];

        $contacto = $_POST['contacto'];
        $id_tipo_contacto = $_POST['tipo-contacto'];

        $sql6 = "UPDATE contactos SET id_tipo_contacto='$id_tipo_contacto', valor='$contacto' WHERE id_contacto = '$id_contacto' ";
        $ejec6 = mysqli_query($conn, $sql6);

        if ($ejec6) {

            $id_direccion = $_POST['id-direccion'];
            $barrio = $_POST['barrio'];
            $localidad = $_POST['localidad'];

            // $sql7 = "INSERT INTO direcciones (id_tipo_direccion, id_barrio, id_persona, id_localidad, id_provincia) 
            // VALUES ('$tipo_direccion', '$barrio', '$id_persona', '$localidad', '$provincia' )";

            $sql7 = "UPDATE direcciones SET  id_barrio='$barrio',id_localidad='$localidad' WHERE id_direccion='$id_direccion'";
            $ejec7 = mysqli_query($conn, $sql7);

            if ($ejec7) {
                $id_empleado = $_POST['id-empleado'];
                $cargo = $_POST['cargo'];
                $cuil = $_POST['cuil'];
                // Elimina cualquier carácter que no sea un dígito
                $cuil = preg_replace("/[^0-9]/", "", $cuil);

                $cuil_formateado = substr($cuil, 0, 2) . '-' . substr($cuil, 2, 8) . '-' . substr($cuil, 10, 1);

                $sql8 = "UPDATE empleados SET id_cargo='$cargo',cuil='$cuil_formateado' WHERE id_empleado='$id_empleado'";
                $ejec8 = mysqli_query($conn, $sql8);

                if ($ejec8) {
                    echo "<br>";
                    echo "<div class='alerta exito alerta-empleado-modificado'>Empleado Modificado</div>";
                    echo "<br>";
                    // por favor anda
                } else {
                    echo '<div class="alerta error">Error al modoficar el empleado</div>';
                }
            } else {
                echo '<div class="alerta error">Error al modoficar la direccion</div>';
            }
        } else {
            echo '<div class="alerta error">Error al modificar el contacto</div>';
        }
    } else {
        echo '<div class="alerta error">Error al modificar la persona</div>';
    }
}

?>
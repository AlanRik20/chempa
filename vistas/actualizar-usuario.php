<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/chempa/config/estilo.css" type="text/css">
    <title>Detalle Usuario</title>
</head>

<body>
    <?php
    include("../php/conexion.php");
    include("nav.php");
    ?>
    <div class="opciones">
        <div>Seccion Modificar Usuario</div>
    </div>

    <form method="post">
        <?php
        include("../php/actualizar-usuario.php");


        ?>
        <div class="contenedor-general contenedor-detalle-usuario">
            <div class="titulo-general titulo-detalle-usuario">Modificar Usuario</div>
            <?php
            $id = $_GET['id'];
            $usuarios = "SELECT e.id_empleado, 
        -- datos de la tabla persona
        e.id_persona, nombre_per, apellido, fecha_nac,
        -- datos de la tabla cargos
        e.id_cargo, c.descripcion,
        -- datos de la tabla contactos
        e.id_contacto, con.valor,
        con.id_tipo_contacto, tc.descripcion AS tipoContacto,
        -- datos de la tabla direccion
        e.id_direccion,
        d.id_barrio, b.nombre AS barrio,
        d.id_localidad, l.descripcion AS localidad, l.codigo_telefonico,
        d.id_provincia, prov.descripcion AS provincia, prov.codigo_postal,
        d.id_tipo_direccion, td.descripcion AS tipoDireccion,

        cuil,
        -- datos de la tabla usuarios
        e.id_usuario, u.nombre AS nombreUsuario, u.contraseña, u.f_registro
            
         FROM empleados e
         INNER JOIN personas p ON p.id_persona=e.id_persona 
         INNER JOIN cargos c ON c.id_cargo=e.id_cargo
         INNER JOIN contactos con ON con.id_contacto = e.id_contacto
         INNER JOIN direcciones d ON d.id_direccion = e.id_direccion
         INNER JOIN usuarios u ON u.id_usuario = e.id_usuario
         INNER JOIN tipo_contactos tc ON tc.id_tipo_contacto = con.id_tipo_contacto 
         INNER JOIN tipo_direcciones td ON td.id_tipo_direccion = d.id_tipo_direccion
         INNER JOIN barrios b ON b.id_barrio = d.id_barrio
         INNER JOIN localidades l ON l.id_localidad = d.id_localidad
         INNER JOIN provincias prov ON prov.id_provincia = d.id_provincia 
         
          WHERE e.id_usuario='$id' ";
            $resultado = mysqli_query($conn, $usuarios);
            while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <!-- datos necesarios para modificar -->
                <input type="hidden" type="number" name="id-empleado" value="<?php echo $row['id_empleado'] ?>">
                <input type="hidden" type="number" name="id-persona" value="<?php echo $row['id_persona'] ?>">
                <input type="hidden" type="number" name="id-contacto" value="<?php echo $row['id_contacto'] ?>">
                <input type="hidden" type="number" name="id-direccion" value="<?php echo $row['id_direccion'] ?>">
                <!-- datos necesarios para modificar -->

                <div class="header-general">ID Empleado</div>
                <div class="item-tabla">
                    <?php echo $row['id_empleado'] ?>
                </div>

                <div class="header-general">Nombre</div>
                <div class="item-tabla">
                    <input style="width:100%;height:100%;text-align:center;" type="text" name="nombre-persona"
                        value="<?php echo $row['nombre_per'] ?>">
                </div>
                <div class="header-general">Apellido</div>
                <div class="item-tabla">

                    <input style="width:100%;height:100%;text-align:center;" type="text" name="apellido-persona"
                        value="<?php echo $row['apellido'] ?>">
                </div>
                <div class="header-general">Fecha de Nacimiento</div>
                <div class="item-tabla">
                    <input style="width:100%;height:100%;text-align:center;" type="date" name="fecha-nacimiento"
                        value="<?php echo $row['fecha_nac'] ?>">
                </div>
                <div class="header-general">Cuil</div>
                <div class="item-tabla">
                    <input style="width:100%;height:100%;text-align:center;" type="text" name="cuil"
                        value="<?php echo $row['cuil'] ?>">
                </div>
                <div class="header-general">Nombre de Usuario</div>
                <div class="item-tabla">
                    <?php echo $row['nombreUsuario'] ?>
                </div>
                <div class="header-general">Contraseña</div>
                <div class="item-tabla">
                    <?php echo $row['contraseña'] ?>
                </div>
                <div class="header-general">Fecha de Registro</div>
                <div class="item-tabla">
                    <?php echo $row['f_registro'] ?>
                </div>
                <div class="header-general">Cargo</div>
                <div class="item-tabla">
                    <?php //echo $row['descripcion'] ?>
                    <select class="" style="width:100%;height:100%;text-align:center;" name="cargo" required>
                        <option value="" disabled selected>Seleccione un Cargo</option>
                        <?php
                        // imprimo en una lista los clientes
                        $cargos = "SELECT * FROM cargos";
                        $resultado2 = mysqli_query($conn, $cargos);
                        while ($row2 = mysqli_fetch_assoc($resultado2)) { ?>
                            <option value="<?php echo $row2['id_cargo']; ?>">
                                <?php echo $row2['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="header-general">Contacto</div>
                <div class="item-tabla">
                    <?php //echo $row['valor'] ?>
                    <input style="width:100%;height:100%;text-align:center;" type="text" name="contacto"
                        value="<?php echo $row['valor'] ?>">
                </div>
                <div class="header-general">Tipo Contacto</div>
                <div class="item-tabla">
                    <?php //echo $row['tipoContacto'] ?>
                    <select class="" style="width:100%;height:100%;text-align:center;" name="tipo-contacto" required>
                        <option value="" disabled selected>Tipo Contacto</option>
                        <?php
                        // imprimo en una lista los clientes
                        $tipo_contacto = "SELECT * FROM tipo_contactos";
                        $resultado1 = mysqli_query($conn, $tipo_contacto);
                        while ($row1 = mysqli_fetch_assoc($resultado1)) { ?>
                            <option value="<?php echo $row1['id_tipo_contacto']; ?>">
                                <?php echo $row1['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <!-- <div class="header-general">Tipo Direccion</div>
                <div class="item-tabla">
                    <?php //echo $row['tipoDireccion'] ?>
                    <select class="" style="width:100%;height:100%;text-align:center;" name="tipo-direccion" required>
                        <option value="" disabled selected>Seleccione su tipo dirección</option>
                        <?php
                        // imprimo en una lista los clientes
                        $tipos_direcciones = "SELECT * FROM tipo_direcciones";
                        $resultado3 = mysqli_query($conn, $tipos_direcciones);
                        while ($row3 = mysqli_fetch_assoc($resultado3)) { ?>
                            <option value="<?php echo $row3['id_tipo_direccion']; ?>">
                                <?php echo $row3['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div> -->

                <div class="header-general">Provincia</div>
                <div class="item-tabla">
                    <?php echo $row['provincia'] ?>
                    <!-- <select class="" style="width:100%;height:100%;text-align:center;" name="provincia" required>
                        <option value="" disabled selected>Seleccione su Provincia</option>
                        <?php
                        // imprimo en una lista los clientes
                        $provincia = "SELECT * FROM provincias";
                        $resultado4 = mysqli_query($conn, $provincia);
                        while ($row4 = mysqli_fetch_assoc($resultado4)) { ?>
                            <option value="<?php echo $row4['id_provincia']; ?>">
                                <?php echo $row4['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select> -->
                </div>

                <div class="header-general">Localidad</div>
                <div class="item-tabla">
                    <?php //echo $row['localidad'] ?>
                    <select class="" style="width:100%;height:100%;text-align:center;" name="localidad" required>
                        <option value="" disabled selected>Seleccione su localidad</option>
                        <?php
                        // imprimo en una lista los clientes
                        $localidad = "SELECT * FROM localidades";
                        $resultado5 = mysqli_query($conn, $localidad);
                        while ($row5 = mysqli_fetch_assoc($resultado5)) { ?>
                            <option value="<?php echo $row5['id_localidad']; ?>">
                                <?php echo $row5['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="header-general">Barrio</div>
                <div class="item-tabla">
                    <?php //echo $row['barrio'] ?>
                    <select class="" style="width:100%;height:100%;text-align:center;" name="barrio" required>
                        <option value="" disabled selected>Seleccione su barrio</option>
                        <?php
                        // imprimo en una lista los clientes
                        $barrios = "SELECT * FROM barrios";
                        $resultado6 = mysqli_query($conn, $barrios);
                        while ($row6 = mysqli_fetch_assoc($resultado6)) { ?>
                            <option value="<?php echo $row6['id_barrio']; ?>">
                                <?php echo $row6['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <input class="titulo-detalle-usuario"
                    style="background:blue; color:white; border:none; font-size:20px; cursor: pointer;" type="submit"
                    name="enviar" value="Modificar Usuario">

            <?php } ?>


        </div>
    </form>
    <br>



</body>

</html>
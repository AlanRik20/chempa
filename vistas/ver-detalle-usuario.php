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
        <div>Seccion Ver Detalle del Usuario</div>
    </div>

    <div class="contenedor-general contenedor-detalle-usuario">
        <div class="titulo-general titulo-detalle-usuario">Detalle Usuario</div>
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

            <div class="header-general">ID Empleado</div>
            <div class="item-tabla">
                <?php echo $row['id_empleado'] ?>
            </div>

            <div class="header-general">Nombre</div>
            <div class="item-tabla">
                <?php echo $row['nombre_per'] ?>
            </div>
            <div class="header-general">Apellido</div>
            <div class="item-tabla">
                <?php echo $row['apellido'] ?>
            </div>
            <div class="header-general">Fecha de Nacimiento</div>
            <div class="item-tabla">
                <?php echo $row['fecha_nac'] ?>
            </div>
            <div class="header-general">Cuil</div>
            <div class="item-tabla">
                <?php echo $row['cuil'] ?>
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
                <?php echo $row['descripcion'] ?>
            </div>
            <div class="header-general">Contacto</div>
            <div class="item-tabla">
                <?php echo $row['valor'] ?>
            </div>
            <div class="header-general">Tipo Contacto</div>
            <div class="item-tabla">
                <?php echo $row['tipoContacto'] ?>
            </div>
            <div class="header-general">Tipo Direccion</div>
            <div class="item-tabla">
                <?php echo $row['tipoDireccion'] ?>
            </div>
            <div class="header-general">Provincia</div>
            <div class="item-tabla">
                <?php echo $row['provincia'] ?>
            </div>
            <div class="header-general">Localidad</div>
            <div class="item-tabla">
                <?php echo $row['localidad'] ?>
            </div>
            <div class="header-general">Barrio</div>
            <div class="item-tabla">
                <?php echo $row['barrio'] ?>
            </div>
           
          


    
            <!-- <div class="header-general">Ver Detalle Completo</div>
            <div class="header-general">Modificar</div>
            <div class="header-general">Eliminar</div>



            <div class="item-tabla">
                <?php //echo $row['contraseña'] ?>
            </div>
            <div class="item-tabla">
                <?php //echo $row['f_registro'] ?>
            </div>

            <div class="item-tabla">
                <a style="color:blue;" href="ver-detalle-usuario.php?id=<?php echo $row['id_usuario'] ?>">Ver</a>
            </div>
            <div class="item-tabla">
                <a style="color:blue;" href="actualizar-usuario.php?id=<?php echo $row['id_usuario'] ?>">Modificar</a>
            </div>
            <div class="item-tabla">
                <a style="color:red;" href="eliminar-usuario.php?id=<?php echo $row['id_usuario'] ?>">Eliminar</a>
            </div> -->
        <?php } ?>
    </div>
    <br>



</body>

</html>
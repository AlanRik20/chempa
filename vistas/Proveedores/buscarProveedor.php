<?php
require('conexion/conexion.php');
$busqueda=$_POST['busqueda'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
    <script>
        function confirmacion() {
            var respuesta = confirm("¿Realmente desea borrar el registro?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <link rel="stylesheet" href="css/estiloInicio.css" type="text/css">
</head>
<body class="fondo">
<style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.navegador {
    background-color: #000000; /* Color de fondo del navegador */
    color: white; /* Color del texto en el navegador */
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
}

.imagen-circular {
    width: 70px;
    height: 70px;
    border-radius: 50%; /* Crea una imagen circular */
    background-image: url('../usuarioVentas/images.png'); /* Ruta de tu imagen circular */
    background-size: cover;
    background-position: center;
}

.titulo {
    margin: 0;
    margin-left: 80px;
    font-size: 40px;
}

.cerrar-sesion {
    text-decoration: none;
    color: black;
    background-color: rgba(255, 255, 47);
    margin-left: 10px;
    padding: 8px 25px;
    border-radius: 5px;
}

.otro-titulo {
    background-color: rgba(255, 255, 47); /* Cambia el color de fondo del segundo título */
    padding: 3px;
    text-align: center;
}

.otro-titulo h2 {
    margin: 0;
    font-size: 20px;
}

    </style>
    <nav class="navegador">
        <div class="imagen-circular"></div>
        <h1 class="titulo">Chempanada</h1>
        <a href="#" class="cerrar-sesion">Cerrar Sesión</a>
    </nav>
    <div class="otro-titulo">
    <h2>Proveedores</h2>
</div>
    <center>
    <div class="contPag">
        
        <div class="input-estilo">
        <form action="Index.php" method="POST">
        <button style='background-color:black;margin-right:10px;
                color: white;font-size:20px;
                padding: 7px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;' name='editar' value=''>&#8592</button></form>
            <form action="buscarProveedor.php" method="POST">
            <input class="" name="busqueda" style="width:450px;display:flex;" value="" type="search" placeholder="Buscar..."></input>
           </form>
           <form action="Agregar/AgregarProveedor.php">
            <input type="hidden"><button style="margin-left:340px;border:none;background-color:rgba(0, 0, 0, 0) cursor: pointer;"><img style="width:34px" src='img/añadir.png'></button>
           </form>
        </div>
        
        <table class="tabla1">
            <thead>
                <tr>
                <th>Nombre</th>
                <th>Cuit</th>
                <th colspan="1">Contacto</th>
                
                <th>Tipo de Proveedor</th>
                <th>Insumos</th>
                <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $mostrar = mysqli_query($mysqli, "SELECT *, personas.id_persona, tipos_de_proveedores.descripcion AS descripcion_proveedor
            FROM `proveedores`
            INNER JOIN personas ON proveedores.id_persona = personas.id_persona
            LEFT JOIN contactos ON proveedores.id_persona = contactos.id_persona
            INNER JOIN tipos_de_proveedores ON proveedores.id_tipo_proveedor = tipos_de_proveedores.id_tipo_proveedor
            INNER JOIN tipo_contactos ON contactos.id_tipo_contacto = tipo_contactos.id_tipo_contacto WHERE personas.nombre_per LIKE '%$busqueda%'
            OR personas.apellido LIKE '%$busqueda%'
            OR CONCAT(personas.nombre_per, ' ', personas.apellido) LIKE '%$busqueda%'
            OR CONCAT(personas.apellido, ' ', personas.nombre_per) LIKE '%$busqueda%'
              ORDER BY personas.apellido ASC ;
            ");

            $proveedores_contactos = array();
        if ($mostrar->num_rows> 0){

            while ($resultado = mysqli_fetch_assoc($mostrar)) {
                $id_proveedor = $resultado['id_proveedor'];

                // Se agrega el proveedor al array y su contacto
                if (!isset($proveedores_contactos[$id_proveedor])) {
                    $proveedores_contactos[$id_proveedor] = array(
                        'nombre' => $resultado['nombre_per'],
                        'apellido' => $resultado['apellido'],
                        'cuit' => $resultado['cuit'],
                        'descripcion_proveedor' => $resultado['descripcion_proveedor'],
                        'contactos' => array($resultado['valor']),
                        'id_persona' => $resultado['id_persona']
                    );
                } else {
                    $proveedores_contactos[$id_proveedor]['contactos'][] = $resultado['valor'];
                }
            }

            foreach ($proveedores_contactos as $id_proveedor => $proveedor) {
                echo "<tr>";
                echo "<td>", $proveedor['apellido'] . ' ' . $proveedor['nombre'], "</td>";
                echo "<td>", $proveedor['cuit'], "</td>";
                echo "<td style='font-size:16px;'>";
                
                echo implode("<p> ", $proveedor['contactos']);
                echo "</td>";
                
                
                
                echo "<td> ", $proveedor['descripcion_proveedor'], "</td>";
                echo"<td>
                <form action='Mostrar/ControlStock.php' method='POST'>
                <input type='hidden' name='id_proveedor' value='".$id_proveedor."'>
                <input type='hidden' name='id_persona' value='".$proveedor['id_persona']."'>
                <button style='cursor:pointer;border:none;margin-top:5px;background-color:rgba(0, 0, 0, 0)' name='editar' value=''><img src='img/caja.png' style='width:30px;'/></button>
                 </form>
                </td>";
                echo"<td>
                <form action='Modificar/ModificarProveedor.php' method='POST'>
                <input type='hidden' name='id_proveedor' value='".$id_proveedor."'>
                <input type='hidden' name='id_persona' value='".$proveedor['id_persona']."'>
                <button style='cursor:pointer;border:none;margin-top:5px;background-color:rgba(0, 0, 0, 0)' name='editar' value=''><img src='img/editar.png' style='width:20px;'/></button>
                 </form>
                </td>";
                echo"<td>
                <form action='Eliminar/eliminarProveedor.php' method='POST'>
                <input type='hidden' name='id_proveedor' value='".$id_proveedor."'>
                <input type='hidden' name='id_persona' value='".$proveedor['id_persona']."'>
                <button style='cursor:pointer;border:none;margin-top:5px;background-color:rgba(0, 0, 0, 0)' type='submit' name='eliminar' value='' onclick='return confirmacion()'><img src='img/delete.png' style='width:20px;'/></button>
                 </form>
                </td>";
                echo "</tr>";
            }
        }else{
            echo "<td colspan='5'>No hay proveedores cargados</td>";
            echo"<td colspan='2'>
            <form action='ControlStock.php' method='POST'>
            <button style='background-color: black;
            color: white;font-size:15px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;' name='editar' value=''>Volver</button>
             </form>
            </td>";
        }
            ?>
        </tbody>
        </table>
    </div>
</center>
</body>
</html>
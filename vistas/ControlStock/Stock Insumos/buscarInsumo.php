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
    background-image: url('img/images.png'); /* Ruta de tu imagen circular */
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
        <a href="../../index.php" class="cerrar-sesion">Cerrar Sesión</a>
    </nav>
    <div class="otro-titulo">
    <h2>Proveedores</h2>
</div>
    <center>
    <div class="contPag">
        
        <div class="input-estilo">
        <form action="ControlStock.php" method="POST">
        <button style='background-color:black;margin-right:10px;
                color: white;font-size:20px;
                padding: 7px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;' name='editar' value=''>&#8592</button></form>
            
           <form action="Agregar/AgregarInsumo.php">
            <input type="hidden"><button style="margin-left:790px;border:none;background-color:rgba(0, 0, 0, 0) cursor: pointer;"><img style="width:34px" src='img/añadir.png'></button>
           </form>
          </div>
        
    
                        
        <table class="tabla1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Tipo de Insumo</th>
                    <th>Proveedor</th>
                    
                    <th colspan="2">Opciones</th>
                    

                </tr>
            </thead>
            <tbody>
            <?php
            $mostrar=mysqli_query($mysqli,"SELECT i.*, ti.descripcion AS nombre_tipo_insumo, p.nombre_per AS Nombre, p.apellido AS Apellido, i.cantidad AS cantidad, tm.Medida AS Medida
            FROM insumos i
            INNER JOIN tipos_insumos ti ON i.id_tipo_insumo = ti.id_tipo_insumo
            INNER JOIN proveedores pr ON i.id_proveedor = pr.id_proveedor
            INNER JOIN personas p ON pr.id_persona = p.id_persona
            LEFT JOIN stock_insumos si ON i.id_insumo = si.id_insumo
            LEFT JOIN tipo_medida tm ON i.id_tipo_medida = tm.id_tipo_medida WHERE i.descripcion LIKE '%$busqueda%'
             ORDER BY i.descripcion ASC");
        if ($mostrar->num_rows> 0){

            while($resultado = mysqli_fetch_assoc($mostrar)){ 
                
                echo "<tr>";

                echo "<td>",$resultado['descripcion'],"</td>";
                echo "<td>",$resultado['cantidad'].' '.$resultado['Medida']."</td>";
                echo "<td>",$resultado['nombre_tipo_insumo'],"</td>";
                echo "<td>",$resultado['Nombre'].' '.$resultado['Apellido']."</td>";
                echo"<td>
                <form action='Modificar/ModificarInsumo.php' method='POST'>
                <input type='hidden' name='id_insumo' value='".$resultado['id_insumo']."'>
                <button style='cursor:pointer;border:none;margin-top:5px;background-color:rgba(0, 0, 0, 0)' name='editar' value=''><img src='img/editar.png' style='width:20px;'/></button>
                 </form>
                </td>";
                echo"<td>
                <form action='Eliminar/eliminarInsumo.php' method='POST'>
                <input type='hidden' name='id_insumo' value='".$resultado['id_insumo']."'>
                <button style='cursor:pointer;border:none;margin-top:5px;background-color:rgba(0, 0, 0, 0)' type='submit' name='eliminar' value='' onclick='return confirmacion()'><img src='img/delete.png' style='width:20px;'/></button>
                 </form>
                </td>";
                

    
            }
        }else{
            echo "<td colspan='5'>No se encontraron Insumos</td>";
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
        }?>
            </tbody>
        </table>
    </div>
</center>
</body>
</html>
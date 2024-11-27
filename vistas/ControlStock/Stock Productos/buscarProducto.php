<?php
require('conexion/conexion.php');
$buscador=$_POST['busqueda'];

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
    <link rel="stylesheet" href="css/css.css" type="text/css">
    
</head>
<body>

    
</div>
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
    background-image: url('./img/images.png'); /* Ruta de tu imagen circular */
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
        <h2>Productos</h2>
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
                margin-left:-20px;
                cursor: pointer;' name='editar' value=''>&#8592</button></form>
            <form action="buscarProducto.php" method="POST">
            <input class="" name="busqueda" style="width:450px;display:flex;" value="" type="search" placeholder="Buscar..."></input>
           </form>
           <form action="Agregar/AgregarProducto.php">
            <input type="hidden"><button style="margin-left:265px;border:none;background-color:rgba(0, 0, 0, 0) cursor: pointer;"><img style="width:34px" src='img/añadir.png'></button>
           </form>
           <form action="Preparar/Preparar.php">
            <input type="hidden"><button style="background-color:black;
                color: white;font-size:18px;
                padding: 7px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;">Preparar</button>
           </form>
          </div>
        
    
                        
        <table class="tabla1">
            <thead>
                <tr>
                <th>IMG</th>
                    
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Ingredientes</th>
                    <th colspan="2">Opciones</th>
                    

                </tr>
            </thead>
            <tbody>
                
            <?php
            $mostrar=mysqli_query($mysqli,"SELECT productos.img, productos.id_producto, productos.nombre_pro, productos.precio, stock_productos.cantidad, GROUP_CONCAT(insumos.descripcion SEPARATOR ', ') AS insumos_relacionados FROM productos INNER JOIN stock_productos ON productos.id_producto = stock_productos.id_producto INNER JOIN detalle_productos ON productos.id_producto = detalle_productos.id_producto INNER JOIN insumos ON detalle_productos.id_insumo = insumos.id_insumo WHERE productos.nombre_pro LIKE '%$buscador%' GROUP BY productos.id_producto");
           if ($mostrar->num_rows> 0){
            while($resultado = mysqli_fetch_assoc($mostrar)){ 
                
                echo "<tr>";
                
                echo "<td><img style='height:55px;width:55px;object-fit:cover' src='img/" . $resultado['img'] . "' alt=''></td>";
                echo "<td>",$resultado['nombre_pro'],"</td>";
                echo "<td>",$resultado['precio'],"</td>";
                echo "<td>",$resultado['cantidad']."</td>";
                
                echo "<td>", $resultado['insumos_relacionados'], "</td>";
                ?>
            <input type="hidden" value="<?php echo $resultado['id_producto']?>">

                <?php
                echo"<td>
                <form action='Modificar/ModificarProducto.php' method='POST'>
                <input type='hidden' name='id_producto' value='".$resultado['id_producto']."'>
                <button style='cursor:pointer;border:none;margin-top:5px;background-color:rgba(0, 0, 0, 0)' name='editar' value=''><img src='img/editar.png' style='width:20px;'/></button>
                 </form>
                </td>";
                echo"<td>
                <form action='Eliminar/eliminarProducto.php' method='POST'>
                <input type='hidden' name='id_producto' value='".$resultado['id_producto']."'>
                <button style='cursor:pointer;border:none;margin-top:5px;background-color:rgba(0, 0, 0, 0)' type='submit' name='eliminar' value='' onclick='return confirmacion()'><img src='img/delete.png' style='width:20px;'/></button>
                 </form>
                </td>";
                

    
            }
        }else{
            echo "<td colspan='5'>No se han encontrado articulos</td>";
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
            <input type="hidden" value="<?php echo $resultado['id_producto']?>">
        </table>
    </div>
</center>
</body>
</html>
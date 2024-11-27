<?php
require('conexion/conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="../../menu/estilo.css" type="text/css">

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
    
</head>
<body class="fondo">
<div class="circulo">
    
</div>
    <div class="tit-base">
        <div class="div-logo">
            <a href="../../index.php"><input type="submit" value="Cerrar sesion" class="CerrarS" style="position: fixed;"></a>

            <img src="../../menu/imagenes/logo.png" width="100px" style="margin-top: -5px; margin-left:-58%">
        </div>
        Chempanadas
    </div>
    <div class="opciones">
        <div>Historial</div>
    </div>

    <!-- boton volver -->
    <div class="volver">
        <a href="historial.php"><img src="../../comandas/imagenes/flecha1.png"
            height="50px" width="50px" 
            alt="Botón"></a>

    </div>

    <?php
    $busqueda=$_POST['busqueda'];
    ?>
    
    <center>
    <div class="contPag">
        
        <div class="input-estilo">
       
            <form action="buscarInsumo.php" method="POST">
            <input class="" name="busqueda" 
            style="width:450px;display:flex;margin-top: -35%; " value="<?php echo $busqueda;?>" type="search" placeholder="Buscar..."></input>
           </form>
           
        
    
                        
        <table class="tabla1" style="margin-top:-10%; margin-left:-50%">
            <thead>
                <tr>
                    <th>Id_pedido</th>
                    <th>Producto</th>
                    <th>Nombre</th>
                    <th>Modo de pago</th>
                    <th>Tipo pedido </th>
                    <th>Estado pedido</th>
                    <th>Cantidad</th>
                    <th>precio</th>
    

                </tr>
            </thead>
            <tbody>
            <?php
                    // CONSULTA QUE TRAE LOS DATOS DE LA TABLA DETALLE PEDIDO
                    $mostrar = mysqli_query($mysqli, "SELECT * FROM detalle_pedidos detp
                        INNER JOIN pedidos pe ON detp.id_pedido = pe.id_pedido
                        INNER JOIN productos pro ON detp.id_producto = pro.id_producto
                        WHERE pro.nombre_pro LIKE '%$busqueda%'
                        ORDER BY detp.id_pedido ASC");

                    // CONSULTA QUE TRAE LOS DATOS DE LA TABLA PEDIDOS
                    $mostrar1 = mysqli_query($mysqli, "SELECT * FROM pedidos pe
                        INNER JOIN clientes c ON pe.id_clientes = c.id_clientes
                        INNER JOIN personas p ON p.id_persona = c.id_persona
                        INNER JOIN metodo_de_pago met ON pe.id_metodo_pago = met.id_metodo_pago
                        INNER JOIN tipos_de_pedidos tip ON tip.id_tipo_pedido = pe.id_tipo_de_pedido
                        INNER JOIN estado_pedidos est ON est.id_estado_pedido = pe.id_estado_pedido
                        
                        ORDER BY pe.id_pedido ASC");
            
            if ($mostrar->num_rows> 0){
                    // ESTE CÓDIGO TRAE DATOS RELEVANTES EN FORMA DE ARRAY DE LA TABLA
                    // DETALLE PEDIDO
                    $detalle_pedidos_data = array();
                    while ($detalle_pedido = $mostrar->fetch_array()) {
                        $detalle_pedidos_data[] = $detalle_pedido;
                    }

                    // ESTE CÓDIGO TRAE DATOS RELEVANTES EN FORMA DE ARRAY DE LA TABLA
                    // PEDIDO
                    
                    $pedidos_data = array();
                    while ($pedido = $mostrar1->fetch_array()) {
                        $pedidos_data[] = $pedido;
                    }

                    // INICIA UN BUCLE QUE RECORRE CADA FILA EN LA TABLA PEDIDOS
                    foreach ($pedidos_data as $resultado1) {
                        echo "<tr>";

                        // RESULTADOS TRAIDOS DE LA TABLA PEDIDO
                        echo "<td>", $resultado1['id_pedido'];
                        echo "<td>", $resultado1['nombre_per'];
                        echo "<td>", $resultado1['descripcion_met'];
                        echo "<td>", $resultado1['descripcion_pe'];
                        echo "<td>", $resultado1['descripcion_est'];

                        // Find the matching data from the $detalle_pedidos_data array
                        foreach ($detalle_pedidos_data as $detalle_pedido) {
                            if ($detalle_pedido['id_pedido'] == $resultado1['id_pedido']) {
                                // RESULTADOS TRAIDOS DE LA TABLA DETALLE PEDIDO
                                echo "<td>", $detalle_pedido['nombre_pro'];
                                echo "<td>", $detalle_pedido['cantidad'];
                                echo "<td>", $detalle_pedido['precio'];
                            }
                        }

                    }

    
            
            }else{
                echo "<td colspan='4'>No se han encontrado articulos con ese nombre</td>";
                echo"<td colspan='2'>
                <form action='historial.php' method='POST'>
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


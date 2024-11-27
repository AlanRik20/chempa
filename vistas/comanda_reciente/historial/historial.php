<?php
require('conexion/conexion.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>historial</title>
    <link rel="stylesheet" href="../../menu/estilo.css" type="text/css">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">


</head>

<body class="fondo">
    <div class="circulo">

    </div>
    <div class="tit-base">
        <div class="div-logo">
            <a href="../../index.php"><input type="submit" value="Cerrar sesion" class="CerrarS"
                    style="position: fixed;"></a>

            <img src="../img/logo.png " width="100px" style="margin-top: -5px; margin-left: -53%;">
        </div>
        Chempanadas
    </div>
    <div class="opciones">
        <div>Historial de comandas</div>
    </div>

    <!-- boton volver -->
    <div class="volver">
        <a href="../index.php"><img src="../img/flecha1.png" height="50px" width="50px"
                alt="Botón"></a>

    </div>

    <center>
        <div class="contPag">

        



            <table class="tabla1" style="margin-top:2%; margin-right:5%">
                <thead>
                    <tr>
                        <th>Id_pedido</th>
                        <th>Nombre</th>
                        <th>Modo de pago</th>
                        <th>Tipo pedido </th>
                        <th>Estado pedido</th>
                        <th>Producto</th>
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
                        ORDER BY detp.id_pedido ASC");

                    // CONSULTA QUE TRAE LOS DATOS DE LA TABLA PEDIDOS
                    $mostrar1 = mysqli_query($mysqli, "SELECT * FROM pedidos pe
                        INNER JOIN clientes c ON pe.id_cliente   = c.id_clientes
                        INNER JOIN personas p ON p.id_persona = c.id_persona
                        INNER JOIN metodo_de_pago met ON pe.id_metodo_pago = met.id_metodo_pago
                        INNER JOIN tipos_de_pedidos tip ON tip.id_tipo_pedido = pe.id_tipo_de_pedido
                        INNER JOIN estado_pedidos est ON est.id_estado_pedido = pe.id_estado_pedido
                        ORDER BY pe.id_pedido ASC");

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

                        echo "</tr>";

                            // CAMBIOS REALIZADOS EN LA BASE:
                            // DESCRIPCION DE LA TABLA METODO PAGO: descripcion_met
                            // DESCRIPCION DE LA TABLA TIPO PEDIDO: desripcion_pe
                            // DESCRIPCION DE LA TABLA ESTADO PEDIDO: descripcion_est
                            // NOMBRE DE LA PERSONA EN LA TABLA PERSONA: nombre_per
                            // NOMBRE DE PRODUCTO EN LA TABLA PRODUCTOS: nombre_pro

                    }

                    ?>
                </tbody>
            </table>
        </div>
    </center>
</body>
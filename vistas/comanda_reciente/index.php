<?php
session_start();
require('conexion/conexion.php');

$ActualizarDespuesDe =5;

header('Refresh: ' . $ActualizarDespuesDe);


?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css_chempa/estilo.css">

    <title>Historial</title>

</head>

<div class="tit-base">
    <div class="div-logo">
        <a href="../../index.php"><input type="submit" value="Cerrar sesion" class="CerrarS"
                style="position: fixed;"></a>

        <img src="img/logo.png" width="100px" style="margin-top: -5px; margin-left: 45%;">
    </div>
    Chempanadas
</div>
<div class="opciones">
    <div>Comandas recientes</div>
</div>
<br>
<br><br>

<body>

    <!-- boton de historial  -->
    <div>
        <a href="./historial/historial.php" class="textoOpciones">
            <img src="img/time-past.png" alt="" style="width: 35px;
            margin-left: 90%; margin-top:-4%;">
        </a>
    </div>

    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-left: 50%;">
                    <div class="card-body p-0">
                            <div class="row">
                                <form action="buscarproveedor.php" method="POST">
                                    <i class="fa fa-search"></i>
                                </form>
                            </div>
                        </div>
                        <div class="invoice-body">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-left:-150px">
                                    <div class="table-responsive" >
                                        <table class="table custom-table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Num Pedido</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Estado del pedido</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $buscardor = mysqli_query($mysqli, "SELECT *,
                                            pedidos.id_pedido,
                                            personas.id_persona,
                                            personas.nombre_per,
                                            personas.apellido,
                                            estado_pedidos.descripcion_est
                                        FROM
                                            pedidos
                                        LEFT JOIN
                                            clientes ON pedidos.id_cliente = clientes.id_clientes
                                        LEFT JOIN
                                            personas ON clientes.id_persona = personas.id_persona
                                        LEFT JOIN
                                            estado_pedidos ON estado_pedidos.id_estado_pedido = pedidos.id_estado_pedido
                                        WHERE
                                            estado_pedidos.descripcion_est = 'pendiente';");
                                                while ($resultado = mysqli_fetch_assoc($buscardor)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $resultado['id_pedido']; ?>
                                                        </td>
                                                        <td>
                                                            <form action='Actualizar/ActualizarNombreProv.php'
                                                                method='post'>
                                                                <input type='hidden' name='cod_Proveedor'
                                                                    value='<?php echo $resultado['id_persona']; ?>'>
                                                                <h3><input
                                                                        style='font-size:15px;border-color:white;border-style:none;text-transform: uppercase;width:100px;'
                                                                        type='text' name='nvnombre' class='form-control'
                                                                        value='<?php echo $resultado['nombre_per']; ?>' />
                                                                </h3>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action='Actualizar/ActualizarNombreProv.php'
                                                                method='post'>
                                                                <input type='hidden' name='cod_Proveedor'
                                                                    value='<?php echo $resultado['id_persona']; ?>'>
                                                                <h3><input
                                                                        style='font-size:15px;border-color:white;border-style:none;text-transform: uppercase;width:100px;'
                                                                        type='text' name='nvnombre' class='form-control'
                                                                        value='<?php echo $resultado['apellido']; ?>' />
                                                                </h3>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <input type='hidden' name='cod_Proveedor'
                                                                value='<?php echo $resultado['id_persona']; ?>'>
                                                            <h3><input
                                                                    style='font-size:15px;border-color:white;border-style:none;width:120px;'
                                                                    class='form-control'
                                                                    value='<?php echo $resultado['descripcion_est']; ?>' />
                                                            </h3>
                                                        </td>
                                                        <td>
                                                            <form action='actualizar/actualizar.php' method='POST'>
                                                                <input type='hidden' name='id_pedido' value=''>
                                                                <button
                                                                    style='margin-top:10px;background-color:white;cursor:pointer;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;margin-bottom:10px;border:white;'
                                                                    type='submit' name='actualizar'
                                                                    value='<?php echo $resultado['id_pedido']; ?>'
                                                                    onclick='return confirmacion()'>
                                                                    <img src='img/delete.png' style='width:23px;' />
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <button
                                                                style='margin-top:10px;background-color:white;cursor:pointer;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;margin-bottom:10px;border:white;'
                                                                name=''
                                                                onclick="vercontenido(<?php echo $resultado['id_cliente']; ?>)">
                                                                ver
                                                            </button>
                                                            <div id="contenido<?php echo $resultado['id_cliente']; ?>"
                                                                style="margin-right: 50%;">
                                                                <?php
                                                                $cod_persona = $resultado['id_cliente'];
                                                                $query_pedidos_persona = "SELECT detalle_pedidos.id_pedido, productos.nombre_pro, detalle_pedidos.cantidad
                                                            FROM detalle_pedidos
                                                            LEFT JOIN pedidos ON pedidos.id_pedido = detalle_pedidos.id_pedido
                                                            LEFT JOIN productos ON productos.id_producto = detalle_pedidos.id_producto
                                                            WHERE pedidos.id_cliente = $cod_persona";

                                                                $result_pedidos_persona = mysqli_query($mysqli, $query_pedidos_persona);
                                                                ?>
                                                                <table class='table custom-table m-0'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID Pedido</th>
                                                                            <th>Producto</th>
                                                                            <th>Cantidad</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        while ($pedido_producto = mysqli_fetch_assoc($result_pedidos_persona)) {
                                                                            echo "<tr>";
                                                                            echo "<td>" . $pedido_producto['id_pedido'] . "</td>";
                                                                            echo "<td>" . $pedido_producto['nombre_pro'] . "</td>";
                                                                            echo "<td>" . $pedido_producto['cantidad'] . "</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
        </div>

    <script>
        //Script el cual hace que el contenido ya se vea sin necesidad de darle al boton "ver"


        //  window.onload = function() {
        //      var todasLasSecciones = document.querySelectorAll('[id^="contenido"]');
        // todasLasSecciones.forEach(function(seccion) {
        //     seccion.style.display = "block";
        //  });
        // };

        function confirmacion() {
            var respuesta = confirm("¿Desea realmente borrar el registro?");
            return respuesta;
        }

        function vercontenido(id) {
            var contenidoDiv = document.getElementById("contenido" + id);

            if (contenidoDiv.style.display === "none") {
                contenidoDiv.style.display = "block";
            } else {
                contenidoDiv.style.display = "none";
            }
        }
    </script>
</body>

</html>
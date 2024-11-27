<?php
session_start();
require('conexion/conexion.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_chempa/estilo.css">
    <title>Comandas</title>

    <style>
        .fondo {
            background-color: #f0f0f0;
        }

        .tit-base {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: rgb(0, 0, 0);
            margin-top: -10px;
            padding-left: 9px;
            padding-right: 9px;
            margin-left: -10px;
            width: 100%;
            height: 90px;
            font-weight: bolder;
            font-size: 40px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: yellow;
        }

        .div-logo {
            /* background-color: red; */
            width: 100px;
            height: 90px;
            align-items: center;
            justify-content: center;
            position: absolute;
            margin-left: -1264px;
        }

        .opciones {
            background-color: rgba(255, 255, 47, 0.775);
            height: 40px;
            padding-left: 9px;
            padding-right: 9px;
            margin-left: -10px;
            width: 100%;
            justify-content: space-evenly;
            color: rgb(0, 0, 0);
            display: flex;
            align-items: center;
            font-weight: bolder;
            font-size: 20px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .contPag {
            margin-top: 130px;
            display: flex;
            justify-content: space-evenly;
        }

        .opciones1 {
            display: flex;
            justify-content: space-around;
        }

        .card-Opciones {
            background: linear-gradient(#eefa65d2 60%, #fdfdfda7);
            justify-items: center;
            width: 150px;
            height: 150px;
            border-top: 1px solid rgba(0, 0, 0, 0.808);
            border-left: 1px solid rgba(0, 0, 0, 0.808);
            border-right: 1px solid rgba(0, 0, 0, 0.808);
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
            border-bottom-width: 0cap;
            padding: 29px;
            padding-bottom: 28px;
            cursor: pointer;
            animation-delay: 200ms;
            animation-direction: left;
            font-size: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 300ms;
            animation-duration: 2s;
            animation-name: slideback;
            animation-delay: 10ms;

        }

        @keyframes slideback {

            from {
                margin-top: 250%;
            }

            to {
                margin-top: 0%;
                position: static;
            }

        }


        .card-Opciones:hover {
            color: #2b0808;
            position: relative;
            top: 8px;
            background: linear-gradient(#edff23d2 60%, #fdfdfda7);
        }

        .card-texto {
            border-bottom: 1px solid rgba(0, 0, 0, 0.808);
            border-left: 1px solid rgba(0, 0, 0, 0.808);
            border-right: 1px solid rgba(0, 0, 0, 0.808);

            background: linear-gradient(#ffffff73, #d3cc00b2);
            margin: -30px;
            padding: 20px;
            text-align: center;
            margin-top: -32px;
            font-weight: bolder;
            color: black;
        }

        .textoOpciones {
            text-decoration: none;
            color: rgb(255, 255, 255);
            transition: all 1000ms;
        }

        .CerrarS {
            background-color: rgba(255, 255, 40, 0.527);
            border-radius: 20px;
            border: 3px solid #00000007;
            cursor: pointer;
            font-family: Arial;
            font-size: 20px;
            font-style: italic;
            padding: 9px 31px;
            margin-left: 85%;
            margin-top: 23px;
            position: fixed;
            box-shadow: 2px #000000;
            transition: all 300ms;
        }

        .CerrarS:hover {
            top: 2px;
            position: relative;
            background-color: #685d16ee;
            color: #000407;
        }

        .CerrarS:active {
            position: relative;
            top: 1px;
        }

        .textoOpciones:hover {
            color: rgb(0, 174, 255);
        }

        .circulo {
            border: 10px solid #ffffff;
            border-radius: 100%;
            height: 65px;
            width: 65px;
            position: fixed;
            margin-left: -1;
            margin-top: 3px;
            background-color: yellow;
            color: #ffffff;
        }

        .container {
            width: 90%;
            margin: 90px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .item {
            flex: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
    function vercontenido(id) {
        var contenidoDiv = document.getElementById("contenido" + id);

        if (contenidoDiv.style.display === "none") {
            $.ajax({
                url: 'obtener_detalles_pedido.php',
                type: 'GET',
                data: {id_pedido: id},
                success: function(response) {
                    contenidoDiv.innerHTML = response;
                }
            });

            contenidoDiv.style.display = "block";
        } else {
            contenidoDiv.style.display = "none";
        }
    }
</script> -->

<script>
    var detallesVisibles = {}; // Esta variable almacenará el estado de visibilidad de los detalles

    function vercontenido(id) {
        var contenidoDiv = document.getElementById("contenido" + id);

        if (detallesVisibles[id]) { // Verifica si los detalles están visibles
            contenidoDiv.style.display = "none"; // Oculta los detalles si están visibles
            detallesVisibles[id] = false; // Actualiza el estado
        } else {
            $.ajax({
                url: 'obtener_detalles_pedido.php',
                type: 'GET',
                data: { id_pedido: id },
                success: function (response) {
                    contenidoDiv.innerHTML = response;
                    contenidoDiv.style.display = "block"; // Muestra los detalles
                    detallesVisibles[id] = true; // Actualiza el estado
                }
            });
        }
    }
</script>


<body>
    <!-- boton volver -->
    <div class="volver">
        <a href="../menu/menu.html"><img src="img/flecha1.png" height="50px" width="50px" alt="Botón"></a>
    </div>

    <!-- boton de historial  -->
    <div>
        <a href="../historial/historial.php" class="textoOpciones">
            <img src="img/time-past.png" alt="" style="width: 35px;
            margin-left: 90%; margin-top:-4%;">
        </a>
    </div>
    <?php
    require('conexion/conexion.php');
    ?>
    <div class="container">
        <?php
        $buscardor = mysqli_query($mysqli, "SELECT personas.nombre_per, pedidos.id_pedido, estado_pedidos.descripcion_est
            FROM pedidos
            LEFT JOIN personas ON personas.id_persona = pedidos.id_cliente
            LEFT JOIN estado_pedidos ON estado_pedidos.id_estado_pedido = pedidos.id_estado_pedido ");
        while ($resultado = mysqli_fetch_assoc($buscardor)) { ?>

            <div class="item">
                <!-- <img src="../Empanadas/imagenes/empanada.jpg" alt="Empanada de queso"> -->
                <p></p>
                <table style="margin-left:-30%; margin-top:-3%;">
                    <tr>
                        <th style="margin-left:3000">Num. Pedido</th>
                        <td>
                            <?php echo "<td>", $resultado['id_pedido'], "</td>"; ?>
                        </td>
                    </tr>

                    <th>Nombre</th>
                    <th>Estado del pedido</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                    <tr>

                        <td>
                            <?php echo "<td><form action='Actualizar/ActualizarNombreProv.php' method='post'>
                <input type='hidden' name='cod_Proveedor' value='" . $resultado['id_pedido'] . "'>
                <h3><input style='font-size:15px;border-color:white;border-style:none;
                text-transform: uppercase;width:100px;'type='text' name='nvnombre' class='form-control' value='" . $resultado['nombre_per'] . "'/></h3></p></form></td>"; ?>
                        </td>
                        <td>
                            <?php echo "<td>
                <input type='hidden' name='cod_Proveedor' value='" . $resultado['id_pedido'] . "'>
                <h3><input style='font-size:15px;border-color:white;border-style:none;width:120px;
                class='form-control' value='" . $resultado['descripcion_est'] . "'/></h3></p></td>"; ?>
                        </td>
                        <td>
                            <form method="get">
                                <input type="hidden" name="id_pedido" value='<?php echo $resultado['id_pedido']; ?>'>
                                <button
                                    style='margin-top:10px;background-color:white;cursor:pointer;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;margin-bottom:10px;border:white;'
                                    name='' onclick="vercontenido(<?php echo $resultado['id_pedido']; ?>)">
                                    <img src='img/caja.png' style='width:28px;' />
                                </button>
                            </form>
                        </td>
                        <div id="contenido<?php echo $resultado['id_pedido']; ?>" style="display:none;">
                            <!-- Aquí se mostrarán los detalles del pedido -->
                        </div>

            </div>

        <?php } ?>
    </div>
</body>

</html>
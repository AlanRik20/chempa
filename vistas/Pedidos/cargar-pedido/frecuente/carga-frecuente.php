<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
    <link rel="stylesheet" href="css/estilofrecuente.css" type="text/css">
    <script src="ocultar.js"></script>
    <?php
    $servidor = "localhost"; 
    $usuario = "root";
    $password = ""; 
    $bd_name="chempaa_db";
    $conectar= mysqli_connect($servidor,$usuario,$password,$bd_name);
    if (!$conectar) {
        die('No se pudo conectar: ' . mysql_error());
    }
?>
<style>
    tr{
        margin-top:-10px;
    }
</style>
<script src="../../validaciones.js"></script>
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
    background-image: url('./images.png'); /* Ruta de tu imagen circular */
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
    
    <div class="contPag" style="justify-content:space-evenly;margin-left:15%" id="pedido">
        <div class="contPag2">
            <div class="pedidos" style="margin-top:-50px;height:350px" align="center">
                <form action="../../index.html" method="post">
                cliente:<br>
                <select name="producto" id="select" class="cargadores" style="width: 200px;" required>
                <option value="0" selected="selected">seleccione cliente</option>
                <?php
                $sql="SELECT nombre_per,apellido FROM personas p INNER JOIN clientes c ON c.id_persona=p.id_persona;";
                    $result=mysqli_query($conectar,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                    $id=$mostrar['id_clientes'];
                    $nombre=$mostrar['nombre_per'];
                    $apellido=$mostrar['apellido'];
                ?>
                <option value=<?php echo $id?>><?php echo $nombre,(" "), $apellido?></option>
                <?php 
                    } 
                ?>
                </select>
                <br>
                <br>
                producto seleccionado:<br>
                <select name="producto" id="select" class="cargadores" style="width: 200px;" required>
                <option value="0" selected="selected">seleccione producto</option>
                <?php
                    $sql="SELECT id_producto, nombre_pro, descripcion from productos";
                    $result=mysqli_query($conectar,$sql);
                     while($mostrar=mysqli_fetch_array($result)){
                    $id=$mostrar['id_producto'];
                    $nombre=$mostrar['nombre_pro'];
                    $desc=$mostrar['descripcion'];
                ?>
                <option value=<?php echo $id?>><?php echo $nombre?></option>
                <?php 
                    } 
                ?>
                </select>
                <br>
                <br>
                cantidad:<br>           
                <input type="text" class="cargadores"  required name="costo" minlength="1" maxlength="2" onkeypress="return solonumeros(event)" onpaste="return false">
                <br>
                <br>
                metodo de pago:<br>
                <select required class="cargadores" style="width:200px">
                <option value="0" selected="selected">seleccione metodo de pago</option>
                <?php
                    $sql="SELECT * FROM metodo_de_pago";
                    $result=mysqli_query($conectar,$sql);
                     while($mostrar=mysqli_fetch_array($result)){
                        $id=$mostrar['id_metodo_pago'];
                        $desc1=$mostrar['descripcion_met'];
                ?>
                <option value=<?php echo $id?>><?php echo $desc1?></option>
                <?php 
                } 
                ?>
                </select>
                <br>
                <br>
                tipo de pedido:<br>
                <input type="radio" name="check" id="check" value="1" onchange="javascript:showContent()" />envio
                <input type="radio" name="check" id="check" value="2" onchange="javascript:showContent()" />retiro<br>
                <input type="submit" value="continuar" id="continuar" class="continuar"></input>
                </form>
            </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->


        </div>
        
        <div class="pedidos" style="margin-top:-50px;height:200px;width:200px" align="center" id="pai">
                <p style="margin-top:-70px;font-size:">datos de envio:</p><br>
                tipo direccion:<br>
                <form action="../../index.html" method="post">
                <select name="barrio" id="barrio" class="cargadores" style="width: 200px;" required>
                <option value="0" selected="selected">tipo direccion</option>
                <?php
                    $sql="SELECT * FROM tipo_direcciones";
                    $result=mysqli_query($conectar,$sql);
                     while($mostrar=mysqli_fetch_array($result)){
                        $id=$mostrar['id_tipo_direccion'];
                        $nombre=$mostrar['descripcion'];
                ?>
                <option value=<?php echo $id?>><?php echo $nombre?></option>;  
                <?php 
            } 
            ?>
            </select>
            <br>
            <br>
                <input type="submit" value="continuar" id="enviar" style="margin-top:150px;margin-left:-70px;position:absolute" class="continuar"></input>
                <br>

            </div>
        
            <br>
            <br>
        </form>
        </div>

<!-- ///////////////////////////////////////////////////////////////////////////////// -->
    <!-- <div class="contPag">

    </div> -->
</body>
</html>
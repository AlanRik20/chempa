<?php
require('../conexion/conexion.php');

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
            var respuesta = confirm("¿Realmente desea borrar este insumo?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }

        }
</script>
    <link rel="stylesheet" href="style.css" type="text/css">
    
    
</head>
<style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color:#f7f7e4;
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
    background-image: url('../img/images.png'); /* Ruta de tu imagen circular */
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
        <h2>Control de Stock</h2>
    </div>
    <div class="contPag">
            <div class="contenedor">
<center>
<div class="wrapper">


  <div class="form">
    <h3>Agregar Insumo</h3>
    <form action="Agregar.php" method="POST">
      <p>
        <input type="text" onkeypress="return soloLetras(event)" placeholder="Nombre" value="" name="Nombre" required>
      </p>
      <p>
      <select style="color: #2a2a2a;
        border: 1px solid #ddd;
        background-color: #fff;
        height: 40px;
        width:100%;
        font-size:15px;
        border-radius: 5px;
        outline: none;
        padding-top: 3px;
        padding-left: 20px;
        padding-right: 20px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        " value="" name="id_tipo_insumo" required>
                                    <option value="" name="id_tipo_insumo">Tipo de Insumo</option>
                                    <?php 
                                    require('../conexion/conexion.php'); 
                                    $sql = "SELECT * FROM `tipos_insumos`";
                                    //consulta
                                    $mostrarprov = $mysqli->query($sql);
                                  //mostrar en el select
                                    while ($row = mysqli_fetch_assoc($mostrarprov)){
                                    echo '<option name="id_tipo_insumo" value="'.$row ['id_tipo_insumo'].'">' .$row['descripcion'].'</option>';
                                    }
                                    ?>
                                    
                                </select>
      </p>
      <p>
        <input type="Number" onkeypress="return event.charCode>=1 && event.charCode<=100" min="1" name="cantidad" Placeholder="Cantidad"  required>
      </p>
      <p>
      <select style="color: #2a2a2a;
        border: 1px solid #ddd;
        background-color: #fff;
        height: 40px;
        font-size:15px;
        width:100%;
        border-radius: 5px;
        outline: none;
        padding-top: 3px;
        padding-left: 20px;
        padding-right: 20px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        " value="" name="id_tipo_medida" required>
                                    <option value="" name="id_tipo_medida">Medida</option>
                                    <?php 
                                    require('../conexion/conexion.php'); 
                                    $sql = "SELECT * FROM `tipo_medida`";
                                    //consulta
                                    $mostrarprov = $mysqli->query($sql);
                                  //mostrar en el select
                                    while ($row = mysqli_fetch_assoc($mostrarprov)){
                                    echo '<option name="id_tipo_medida" value="'.$row ['id_tipo_medida'].'">' .$row['descripcion'].'</option>';
                                    }
                                    ?>
                                    
      </select>
                                </p>
      <p>
      <select name="id_proveedor" style="color: #2a2a2a;
        border: 1px solid #ddd;
        background-color: #fff;
        height: 40px;
        width:100%;
        font-size:15px;
        border-radius: 5px;
        outline: none;
        padding-top: 3px;
        padding-left: 20px;
        padding-right: 20px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        " name="id_proveedor" required>
          <option value="">Proveedor</option>
            <?php 
            require('../conexion/conexion.php'); 
            $sql = "SELECT * FROM `proveedores`INNER JOIN personas ON proveedores.id_persona=personas.id_persona";
            //consulta
            $mostrarprov = $mysqli->query($sql);
          //mostrar en el select
            while ($row = mysqli_fetch_assoc($mostrarprov)){
            echo '<option name="id_proveedor" value="'.$row ['id_proveedor'].'">' .$row['nombre'].' '.$row['apellido'].'</option>';
            }
            ?>
                                    
                                    
                                    
      </select>
      </p>
      <p>

        <button>Agregar</button>
      </p>
      
      
    </form>
  </div>
</div>
</div>
        
</center>
</body>
</html>
<script type="text/javascript" src="../js/validacion.js"></script>

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
<body>
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
    <h2>Proveedores</h2>
</div>
    
    <div class="contPag">
            <div class="contenedor">
<center>
<div class="wrapper">

<?php
$proveedor=$_POST['id_proveedor'];
$id_persona = $_POST['id_persona'];
?>
  <div class="form">
    <h3>Actualizar Proveedor</h3>
    <form action="Modificar.php" method="POST">
        <?php
        $mostrar=mysqli_query($mysqli,"SELECT *, personas.id_persona, tipos_de_proveedores.descripcion AS descripcion_proveedor FROM `proveedores` INNER JOIN personas ON proveedores.id_persona = personas.id_persona INNER JOIN contactos ON proveedores.id_persona = personas.id_persona AND contactos.id_persona=proveedores.id_persona INNER JOIN tipos_de_proveedores ON proveedores.id_tipo_proveedor = tipos_de_proveedores.id_tipo_proveedor INNER JOIN tipo_contactos ON contactos.id_tipo_contacto = tipo_contactos.id_tipo_contacto WHERE proveedores.id_proveedor=$proveedor");
        if($resultado = mysqli_fetch_assoc($mostrar)){ 
        
        ?>
      <p>
        <label for="" style="display:flex;margin:5px;color:rgb(80, 80, 80);">Nombre</label>
        <input type="text" onkeypress="return soloLetras(event)" placeholder="Nombre" value="<?php echo $resultado["nombre_per"]?>"  name="nombre" >
        
        <input type="hidden" value="<?php echo $resultado["id_tipo_proveedor"]?>"  name="id_tipo_proveedor">
        <input type="hidden" value="<?php echo $resultado["id_proveedor"]?>" name="id_proveedor">
        <input type="hidden" value="<?php echo $resultado["id_persona"]?>" name="id_persona">



      </p>
      <p>
        <label for=""  style="display:flex;margin:5px;color:rgb(80, 80, 80);">Apellido</label>
        <input type="text" onkeypress="return soloLetras(event)" placeholder="Apellido" value="<?php echo $resultado["apellido"]?>"  name="apellido" ></p>
        <p>
        <label for=""  style="display:flex;margin:5px;color:rgb(80, 80, 80);">Fecha de Nacimiento</label>
        <input type="date" onkeypress="return soloLetras(event)" placeholder="fecha nacimiento" value="<?php echo $resultado["fecha_nac"]?>"  name="fecha_nac">
        </p>
        <p>
      <label for="" style="display:flex;margin:5px;color:rgb(89, 89, 89);font-size:14px;">Tipo de proveedor</label>

      <select style="color: #2a2a2a;border: 1px solid #ddd;
        background-color: #fff;height: 40px;width:100%;font-size:16px;border-radius: 5px;padding-top: 3px;padding-left: 20px;padding-right: 20px;-webkit-appearance: none;-moz-appearance: none;appearance: none;
        " value="" name="id_tipo_proveedor" >
                                    <?php 
                                    require('../conexion/conexion.php'); 
                                    $tipoinsumo=$resultado['id_tipo_proveedor'];
                                    $sql = "SELECT * FROM `tipos_de_proveedores` WHERE id_tipo_proveedor=$tipoinsumo";
                                    //consulta
                                    $mostrarprov = $mysqli->query($sql);
                                  //mostrar en el select
                                    if ($row = mysqli_fetch_assoc($mostrarprov)){
                                    echo '<option name="id_tipo_proveedor" value="'.$row ['id_tipo_proveedor'].'">' .$row['descripcion'].'</option>';
                                    }
                                    $sql = "SELECT * FROM `tipos_de_proveedores` WHERE id_tipo_proveedor!=$tipoinsumo";
                                    //consulta
                                    $mostrarprov = $mysqli->query($sql);
                                  //mostrar en el select
                                    while ($row = mysqli_fetch_assoc($mostrarprov)){
                                    echo '<option name="id_tipo_proveedor" value="'.$row ['id_tipo_proveedor'].'">' .$row['descripcion'].'</option>';
                                    }

                                    ?>
                                    
                                </select>
      </p>
      
      <p>
      <label for="" style="display:flex;margin:5px;color:rgb(80, 80, 80);">Cuit</label>

        <input type="Number" min="1" onkeypress="return event.charCode>=1 && event.charCode<=100" name="cuit" value="<?php echo $resultado['cuit'] ?>"  >
      </p>
      <p>
        <br><br>
        <a href="ModificarContacto.php?id_persona=<?php echo $resultado['id_persona']; ?>">Actualizar Contacto</a>
      </p>
        
        <button style="width:200%;">Actualizar</button>
      
      
      <?php
      }
        ?>
    </form>
  </div>
</div>
</div>
        
</center>
</body>
</html>
<script type="text/javascript" src="../js/validacion.js"></script>

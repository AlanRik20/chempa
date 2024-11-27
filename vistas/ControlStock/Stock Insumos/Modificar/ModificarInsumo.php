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

<?php
$Insumo=$_POST['id_insumo'];
?>
  <div class="form">
    <h3>Actualizar Insumo</h3>
    <form action="Modificar.php" method="POST">
        <?php
        $mostrar=mysqli_query($mysqli,"SELECT 
        i.*, 
        ti.descripcion AS nombre_tipo_insumo, 
        p.nombre_per AS Nombre, 
        p.apellido AS Apellido, 
        i.cantidad AS cantidad,
        tm.id_tipo_medida AS id_tipo_medida
    FROM 
        insumos i
    INNER JOIN 
        tipos_insumos ti ON i.id_tipo_insumo = ti.id_tipo_insumo
    INNER JOIN 
        proveedores pr ON i.id_proveedor = pr.id_proveedor
    INNER JOIN 
        personas p ON pr.id_persona = p.id_persona
    LEFT JOIN 
        tipo_medida tm ON i.id_tipo_medida = tm.id_tipo_medida
     WHERE i.id_insumo=$Insumo
        ");
        while($resultado = mysqli_fetch_assoc($mostrar)){ 
        
        ?>
      <p>
        <label for="" style="display:flex;margin:5px;color:rgb(80, 80, 80);">Nombre</label>
        <input type="text" onkeypress="return soloLetras(event)" placeholder="Nombre" value="<?php echo $resultado["descripcion"]?>"  name="descripcion" >
        <input type="hidden" value="<?php echo $resultado["id_tipo_insumo"]?>"  name="Nombre">
        <input type="hidden" value="<?php echo $resultado["id_insumo"]?>" name="id_insumo">


      </p>
      
      <p>
      <label for="" style="display:flex;margin:5px;color:rgb(89, 89, 89);font-size:14px;">Tipo de insumo</label>

      <select style="color: #2a2a2a;border: 1px solid #ddd;
        background-color: #fff;height: 40px;width:100%;font-size:16px;border-radius: 5px;padding-top: 3px;padding-left: 20px;padding-right: 20px;-webkit-appearance: none;-moz-appearance: none;appearance: none;
        " value="" name="id_tipo_producto" > <!-- Cambio de "id_tipo_insumo" a "id_tipo_producto" -->
        <?php 
        require('../conexion/conexion.php'); 
        $tipoinsumo = $resultado['id_tipo_insumo'];
        $sql = "SELECT * FROM `tipos_insumos` WHERE id_tipo_insumo=$tipoinsumo";
        //consulta
        $mostrarprov = $mysqli->query($sql);
        //mostrar en el select
        if ($row = mysqli_fetch_assoc($mostrarprov)){
            echo '<option name="id_tipo_producto" value="'.$row ['id_tipo_insumo'].'">' .$row['descripcion'].'</option>';
        }
        $sql = "SELECT * FROM `tipos_insumos` WHERE id_tipo_insumo!=$tipoinsumo";
        //consulta
        $mostrarprov = $mysqli->query($sql);
        //mostrar en el select
        while ($row = mysqli_fetch_assoc($mostrarprov)){
            echo '<option name="id_tipo_producto" value="'.$row ['id_tipo_insumo'].'">' .$row['descripcion'].'</option>';
        }
        ?>
    </select>
      </p>
      <p>
      <label for="" style="display:flex;margin:5px;color:rgb(80, 80, 80);">Cantidad</label>

        <input type="Number" min="1" onkeypress="return event.charCode>=1 && event.charCode<=100" name="cantidad" value="<?php echo $resultado['cantidad'] ?>" Placeholder="Cantidad" >
      </p>
      
      <p>
      <label for="" style="display:flex;margin:5px;color:rgb(80, 80, 80);">Medida</label>
      <select style="color: #2a2a2a;
        border: 1px solid #ddd;
        background-color: #fff;
        height: 40px;
        font-size:16px;
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
                                    <?php 
                                    require('../conexion/conexion.php');
                                    $medida=$resultado['id_tipo_medida'];
                                    $sql = "SELECT * FROM `tipo_medida` WHERE id_tipo_medida=$medida";
                                    //consulta
                                    $mostrarprov = $mysqli->query($sql);
                                  //mostrar en el select
                                    if ($row = mysqli_fetch_assoc($mostrarprov)){
                                    echo '<option name="id_tipo_medida" value="'.$row ['id_tipo_medida'].'">' .$row['descripcion'].'</option>';
                                    }
                                    $medida=$resultado['id_tipo_medida'];
                                    $sql = "SELECT * FROM `tipo_medida` WHERE id_tipo_medida!=$medida";
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
      <label for="" style="display:flex;margin:5px;color:rgb(80, 80, 80);">Proveedor</label>

      <select name="id_proveedor" value="" style="color: #2a2a2a;
        border: 1px solid #ddd;
        background-color: #fff;
        height: 40px;
        width:207%;
        font-size:16px;
        border-radius: 5px;
        outline: none;
        padding-top: 3px;
        padding-left: 20px;
        padding-right: 20px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        " >
        <?php 
        require('../conexion/conexion.php'); 
        $proveedor=$resultado['id_proveedor'];
        $sql = "SELECT * FROM `proveedores`INNER JOIN personas ON proveedores.id_persona=personas.id_persona WHERE id_proveedor=$proveedor";
        //consulta
        $mostrarprov = $mysqli->query($sql);
      //mostrar en el select
        if ($row = mysqli_fetch_assoc($mostrarprov)){
        echo '<option name="id_proveedor" value="'.$row ['id_proveedor'].'">' .$row['nombre'].' '.$row['apellido'].'</option>';
        }
        $sql = "SELECT * FROM `proveedores`INNER JOIN personas ON proveedores.id_persona=personas.id_persona WHERE id_proveedor!=$proveedor";
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
        <p>
        <button>Actualizar</button></p>
      </p>
      
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

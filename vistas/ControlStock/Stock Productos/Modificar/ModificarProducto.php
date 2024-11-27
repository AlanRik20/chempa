<?php
require('../conexion/conexion.php');
$producto=$_POST['id_producto'];
$sql = "SELECT productos.img,productos.id_producto,productos.descripcion AS pcto_des, productos.nombre_pro, productos.precio, stock_productos.cantidad FROM productos INNER JOIN stock_productos ON productos.id_producto = stock_productos.id_producto INNER JOIN detalle_productos ON productos.id_producto = detalle_productos.id_producto WHERE productos.id_producto=$producto GROUP BY productos.id_producto ";

$resultado = $mysqli->query($sql);
if ($resultado && $productoData = $resultado->fetch_assoc()) {
    $nombre_producto = $productoData['nombre_pro'];
    $precio = $productoData['precio'];
    $cantidad_stock = $productoData['cantidad'];
    $descripcion = $productoData['pcto_des'];
    $img = $productoData['img'];
} else {
    
}


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
      var respuesta = confirm("¿Realmente desea borrar este producto?");
      if (respuesta == true) {
        return true;
      } else {
        return false;
      }

    }
  </script>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



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
        <h2>Productos</h2>
    </div>

  <div class="contPag">
    <div class="contenedor">
      <center>
        <div class="wrapper">
          <div class="form">
            <h3>Actualizar Producto</h3>
            <form action="modificar.php" enctype="multipart/form-data" method="post">
              <p>
                <input type="text" style="width:200%;" onkeypress="return soloLetras(event)" placeholder="Nombre" value="<?php echo $nombre_producto; ?>" name="nombre">
              </p>
              <p></p>
              <p>
              <label for="">Precio</label>
                <input type="Number" min="1" onkeypress="return event.charCode>=1 && event.charCode<=100"
                  placeholder="Precio" value="<?php echo $precio; ?>" name="precio">
              </p>
              <p>
              <label for="">Cantidad</label>
                <input type="Number" min="1" onkeypress="return event.charCode>=1 && event.charCode<=100"
                  name="cantidad" value="<?php echo $cantidad_stock; ?>" Placeholder="Cantidad">
              </p>

              
              
            <p>
            <style>
  .fileInput {
    display: none;
  }

  .custom-file-button {
    background-color: white;
    color: blue;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

</style>


           

          </p>
          <p></p>
<p><img style="width:auto;height:120px;object-fit:cover;" src="../img/<?php echo $img ;?>" ><br><br>
  <label for="nueva_img" class="custom-file-button">Actualizar Imagen</label>
 <input class="fileInput" type="file" name="nueva_img" id="nueva_img" accept="image/*"/>
</p>


 <p>
              <input type="text" style="height:110px;" onkeypress="return soloLetras(event)" placeholder="Descripcion" value="<?php echo $descripcion; ?>"
                  name="descripcion">
              

                <button style="width:100%; margin-top:10px;" type="submit">Agregar</button>
              </p>
              <input type="hidden" name="id_producto" value="<?php echo $productoData['id_producto']; ?>">

            </form>
          </div>
        </div>
    </div>

    </center>
</body>

</html>
<script type="text/javascript" src="../js/validacion.js"></script>

      
</script>

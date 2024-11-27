<?php
include("../php/comprobar_usuario.php");
include("../php/conexion.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOG</title>
  <link rel="stylesheet" href="/chempa/config/estilo.css" type="text/css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <style>
    .carga-usuario {
      background: #e9d900;
      border: 0;
      padding: 7px 24px;
      color: black;
      transition: 0.4s;
      border-radius: 10px;
      cursor: pointer;
      height: 60px;
      text-decoration: none;
      width: 190px;
      margin-left: 1150px;
      margin-top: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .carga-usuario:hover {
      color: black;
    }
  </style>

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
    background-image: url(../images.png); /* Ruta de tu imagen circular */
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
        <a href="#" class="cerrar-sesion">Cerrar Sesión</a>
    </nav>
    <div class="otro-titulo">
        <h2>Control de Usuario</h2>
    </div>



  <div class="contenedor-buscador">
    <form action="" method="GET">
      <input class="buscador" type="search" placeholder="Busca un usuario" name="busqueda">
      <button class="boton_buscar" type="submit" name="enviar">Buscar</button>
      <button class="boton_reset" type="submit" name="reset_busqueda">Reiniciar Busqueda</button>
    </form>
  </div>

  <?php
  $where = "";
  if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];


    if (isset($_GET['busqueda'])) {
      $where = "WHERE nombre LIKE '%$busqueda%'";
    }

  }
  if (isset($_GET['reset_busqueda'])) {
    $where = "";
  } ?>

  <!-- <a href="agregarusuario.php" class="carga-usuario">Cargar Usuario</a> -->

  <div class="contenedor-general contenedor-usuarios">
    <div class="titulo-general titulo-usuarios">LOG</div>
    <div class="header-general">ID Usuario</div>
    <div class="header-general">Nombre</div>
    <div class="header-general">Contraseña</div>
    <div class="header-general">Fecha de Registro</div>
    <div class="header-general">Ver Detalle Completo</div>
    <div class="header-general">Modificar</div>
    <div class="header-general">Eliminar</div>
    <?php
    $usuarios = "SELECT * FROM usuarios $where ";
    $resultado = mysqli_query($conn, $usuarios);
    while ($row = mysqli_fetch_assoc($resultado)) { ?>
      <div class="item-tabla">
        <?php echo $row['id_usuario'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['nombre'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['contraseña'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['f_registro'] ?>
      </div>

      <div class="item-tabla">
        <a style="color:blue;" href="ver-detalle-usuario.php?id=<?php echo $row['id_usuario'] ?>">Ver</a>
      </div>
      <div class="item-tabla">
        <a style="color:blue;" href="actualizar-usuario.php?id=<?php echo $row['id_usuario'] ?>">Modificar</a>
      </div>
      <div class="item-tabla">
        <a style="color:red;" href="eliminar-usuario.php?id=<?php echo $row['id_usuario'] ?>">Eliminar</a>
      </div>
    <?php } ?>
  </div>


  <br>
  <div class="text-center"><button type="button">Volver al menu</button></div>

</body>

</html>
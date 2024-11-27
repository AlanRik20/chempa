<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cargar Usuario</title>
  <link rel="stylesheet" href="/chempa/config/estilo.css" type="text/css">
  <link href="/chempa/bootstrap/bootstrap.min.css" rel="stylesheet">

  <script src="\chempa\config\javascript.js"></script>


  <style>
    /* section {
      padding: 62px 0;
      overflow: hidden;

    } */

    #footer .creditos {
      float: right;
      font-size: 13px;
    }

    #footer .creditos a {
      transition: 0.3s;
    }

    .contact .php-email-form {
      width: 100%;
      border-top: 3px solid #000000;
      border-right: 3px solid #000000;
      border-left: 3px solid #000000;
      border-bottom: 3px solid #000000;
      padding: 30px;
      background: #fff;
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
      border-radius: 8px;
    }

    .form-group {
      padding-bottom: 8px;
      margin-bottom: 20px;
    }

    .contact input[type=submit] {
      background: #e9d900;
      border: 0;
      padding: 7px 24px;
      color: #000000;
      transition: 0.4s;
      border-radius: 10px;
      cursor: pointer;
    }

  </style>
</head>

<body>
  <?php include("nav.php"); ?>

  <div class="opciones">
    <div>Seccion agregar usuario</div>
  </div>




  <div class="form-carga-usuario">
    <br>
    <br>
    <form action="" method="post">
      <?php include("../php/agregarusuario1.php"); ?>

      <br>
      <br>
      <label>Cargue sus datos</label>
      <br>
      <br>
      <input class="input-carga-usuario" type="text" name="nombre-persona" placeholder="Ingrese su Nombre"
        onkeypress="return sololetras(event)" onpaste="return false" minlength="3" required>
      <br>
      <br>
      <input class="input-carga-usuario" type="text" name="apellido-persona" placeholder="Ingrese su Apellido"
        onkeypress="return sololetras(event)" onpaste="return false" minlength="3" required>
      <br>
      <br>

      <input class="input-carga-usuario" type="date" name="fecha_nac">
      <br>
      <br>
      <!-- cuil -->

      <input class="input-carga-usuario" type="text" name="cuil" placeholder="Ingrese su CUIL"
        onkeypress="return solonumeros(event)" onpaste="return false" required minlength="11">
      <br>
      <br>

      <!-- cuil -->

      <!-- nombre usuario -->
      <input class="input-carga-usuario" type="text" name="nombre-usuario" placeholder="Ingrese su nombre de usuario"
        onkeypress="return validaambos(event)" onpaste="return false" required>
      <br>
      <br>
      <!-- nombre usuario -->

      <!-- contraseña de usuario -->
      <input class="input-carga-usuario" type="password" name="password" placeholder="Ingrese su contraseña"
        onkeypress="return validaambos(event)" onpaste="return false" required>
      <!-- contraseña de usuario -->
      <br>
      <br>
      <label>Cargue su contacto</label>
      <br>
      <br>

      <input class="input-carga-usuario" type="text" name="contacto" placeholder="Ingrese su contacto"
        onkeypress="return validaambos(event)" onpaste="return false" required>

      <br>
      <br>

      <!-- tipo contacto -->
      <!-- <br>
      <br> -->
      <select class="input-carga-usuario" name="tipo-contacto" required>
        <option value="" disabled selected>Tipo Contacto</option>
        <?php
        // imprimo en una lista los clientes
        $tipo_contacto = "SELECT * FROM tipo_contactos";
        $resultado1 = mysqli_query($conn, $tipo_contacto);
        while ($row1 = mysqli_fetch_assoc($resultado1)) { ?>
          <option value="<?php echo $row1['id_tipo_contacto']; ?>">
            <?php echo $row1['descripcion']; ?>
          </option>
        <?php } ?>
      </select>
      <!-- tipo contacto -->


      <br>
      <br>
      <!-- cargo -->
      <label>Seleccione su cargo</label>
      <br>
      <br>
      <select class="input-carga-usuario" name="cargo" required>
        <option value="" disabled selected>Seleccione un Cargo</option>
        <?php
        // imprimo en una lista los clientes
        $cargos = "SELECT * FROM cargos";
        $resultado2 = mysqli_query($conn, $cargos);
        while ($row2 = mysqli_fetch_assoc($resultado2)) { ?>
          <option value="<?php echo $row2['id_cargo']; ?>">
            <?php echo $row2['descripcion']; ?>
          </option>
        <?php } ?>
      </select>

      <!-- cargo -->

      <br>
      <br>
      <label for="">Cargue su direcciòn</label>
      <br>
      <br>
      <!-- <select class="input-carga-usuario" name="tipo-direccion" required>
        <option value="" disabled selected>Seleccione su tipo dirección</option>
        <?php
        // imprimo en una lista los clientes
        $tipos_direcciones = "SELECT * FROM tipo_direcciones";
        $resultado3 = mysqli_query($conn, $tipos_direcciones);
        while ($row3 = mysqli_fetch_assoc($resultado3)) { ?>
          <option value="<?php echo $row3['id_tipo_direccion']; ?>">
            <?php echo $row3['descripcion']; ?>
          </option>
        <?php } ?>
      </select> -->
      <!-- <br>
      <br> -->

      <!-- <select class="input-carga-usuario" name="provincia" required>
        <option value="" disabled selected>Seleccione su Provincia</option>
        <?php
        // imprimo en una lista los clientes
        $provincia = "SELECT * FROM provincias WHERE id_provincia=1";
        $resultado4 = mysqli_query($conn, $provincia);
        while ($row4 = mysqli_fetch_assoc($resultado4)) { ?>
          <option value="<?php echo $row4['id_provincia']; ?>">
            <?php echo $row4['descripcion']; ?>
          </option>
        <?php } ?>
      </select>
      <br>
      <br> -->

      <!-- <select class="input-carga-usuario" name="localidad" required>
        <option value="" disabled selected>Seleccione su localidad</option>
        <?php
        // imprimo en una lista los clientes
        $localidad = "SELECT * FROM localidades";
        $resultado5 = mysqli_query($conn, $localidad);
        while ($row5 = mysqli_fetch_assoc($resultado5)) { ?>
          <option value="<?php echo $row5['id_localidad']; ?>">
            <?php echo $row5['descripcion']; ?>
          </option>
        <?php } ?>
      </select> -->
      <!-- <br>
      <br> -->
      <select class="input-carga-usuario" name="barrio" required>
        <option value="" disabled selected>Seleccione su barrio</option>
        <?php
        // imprimo en una lista los clientes
        $barrios = "SELECT * FROM barrios";
        $resultado6 = mysqli_query($conn, $barrios);
        while ($row6 = mysqli_fetch_assoc($resultado6)) { ?>
          <option value="<?php echo $row6['id_barrio']; ?>">
            <?php echo $row6['nombre']; ?>
          </option>
        <?php } ?>
      </select>
      <br>
      <br>


      <input class="enviar" type="submit" name="enviar" value="Cargar Usuario">
      <!-- <form action="verusuario.php" method="get">
        <input type="submit" value="Volver">
      </form> -->

      <br>
      <br>
      <br>
    </form>
  </div>
</body>

</html>
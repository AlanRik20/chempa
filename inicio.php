<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Inicio Sesión</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="config/estilo.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="\chempa\config\javascript.js"></script>

</head>
<style>
        nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: hsl(0, 0%, 0%);
  padding: 10px;
}

/* Estilos para la imagen de usuario circular */
.nav-left img {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  overflow: hidden;
}

/* Estilos para el título "Cheempanada" */
.nav-center {
  flex-grow: 1;
  text-align: center;
}

.nav-center h1 {
  margin: 0;
  font-size: 45px;
  color: white;
}

/* Estilos para el botón "Cerrar Sesión" */
.btn-cerrar-sesion {
  padding: 10px 16px;
  background-color: #fbff00;
  color: rgb(0, 0, 0);
  border: none;
  border-radius: 15px;
  cursor: pointer;
  width: 200px;
}

/* Estilos para posicionar el botón en la esquina derecha */
.nav-right {
  position: relative;
}

.btn-cerrar-sesion {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
}

        section {
            padding: 62px 0;
            overflow: hidden;

        }

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
        .form-login{
            margin: auto;
            margin-top: 200px;
        }
        
.opciones{
    background-color: rgba(255, 255, 47, 0.775);
    height:40px;
    padding-left: 9px;
    padding-right: 9px;
    margin-left: -10px;
    width: 102%;
    justify-content: space-evenly;
    color: rgb(0, 0, 0);
    display: flex;
    align-items: center;
    font-weight: bolder;
    font-size: 20px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
    </style>
<body class="body-login">
<nav>
    <div class="nav-left">
      <img src="./images.png" alt="Imagen de Usuario">
    </div>
    <div class="nav-center">
      <h1>Chempanadas</h1>
    </div>
    <div class="nav-right">
     <a href="../../index.php"> <button class="btn-cerrar-sesion">Cerrar Sesión</button></a>
    </div>
  </nav>
  <div class="opciones">
<div>Inicio de Sesión</div>
    </div>
 


    <div class="form-login">
        <br>
        <br>
        <form action="" method="post">
            <br>
            <?php
            include("login/login_registro/login.php");
            ?>
            <br>
            <input class="input-login" type="text" name="usuario_login" placeholder="Ingrese su usuario"
                onkeypress="return validaambos(event)" onpaste="return false" minlength="3" required>
            <br>
            <br>
            <input class="input-login" type="password" name="password_login" placeholder="Ingrese su contraseña"
                onkeypress="return validaambos(event)" onpaste="return false" required>
            <br>
            <br>
            <input class="enviar" type="submit" name="enviar_login" value="Iniciar Sesión">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
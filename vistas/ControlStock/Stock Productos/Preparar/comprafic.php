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
      var respuesta = confirm("¿Realmente desea borrar este producto?");
      if (respuesta == true) {
        return true;
      } else {
        return false;
      }

    }
  </script>
  <link rel="stylesheet" href="css2.css" type="text/css">


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
        <h2>Calcular compra</h2>
    </div>

  <div class="contPag">
    <div class="contenedor">
      <center>
        <div class="wrapper">


          <div class="form">
            <h3>Compra Ficticia</h3>
            <form action="agregar.php" enctype="multipart/form-data" method="post">

              <p>
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
        " value="" name="id_producto">
                  <?php
                  require('../conexion/conexion.php');
                  $sql = "SELECT * FROM `productos`";
                  //consulta
                  $mostrarprov = $mysqli->query($sql);
                  while ($row = mysqli_fetch_assoc($mostrarprov)) {
                    echo '<option name="id_producto" value="' . $row['id_producto'] . '">' . $row['nombre_pro'] . '</option>';
                  }


                  ?>

                </select>
              </p>
              
              <p>

                <input type="Number" min="1" onkeypress="return event.charCode>=1 && event.charCode<=100"
                name="cantidad" value="<?php echo $resultado['cantidad'] ?>" Placeholder="Cantidad" required>
                
                </p>
                
                
                

<button>Calcular</button>
<div id="resultado">
<table class="styled-table">
        <!-- Aquí se generarán las filas de la tabla con los resultados -->
    </table>
              </div>

             


            </form>
            <p></p>
            <form action="prepararr.php" method="post" id="form-cargarstock">
  <input type="hidden" name="id_producto" id="id_producto_hidden">
  <input type="hidden" name="ingredientesJSON" id="ingredientesJSON">

  <input type="hidden" name="cantidad" id="cantidad_hidden">
  <button type="button" style="width:207%" onclick="prepararYEnviar()"> Registrar</button>
</form>
            



          </div>
        </div>
    </div>
                </div>
                

    </center>
</body>

</html>
<script type="text/javascript" src="../js/validacion.js"></script>
<script>
  document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault(); // Evita la recarga de la página

        var formData = new FormData(this);

        // Envía el formulario mediante AJAX a procesar.php
        fetch('procesar.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            // Muestra los resultados en el div "resultado"
            document.getElementById('resultado').innerHTML = data;
        });
    });
function prepararYEnviar() {
  var id_producto = document.querySelector('select[name="id_producto"]').value;
  var cantidad = document.querySelector('input[name="cantidad"]').value;
  document.getElementById('id_producto_hidden').value = id_producto;
  document.getElementById('cantidad_hidden').value = cantidad;
  
  // Recopila los ingredientes y su información en un array
  var ingredientes = [];
  var ingredientRows = document.querySelectorAll('.styled-table tr');
  ingredientRows.forEach(function(row) {
    var cells = row.querySelectorAll('td');
    if (cells.length === 3) {
      var nombre = cells[0].textContent;
      var cantidad = cells[1].textContent;
      var medida = cells[2].textContent;
      ingredientes.push({nombre, cantidad, medida});
    }
  });
  
  // Convierte el array en formato JSON y lo almacena en el campo oculto
  var ingredientesJSON = JSON.stringify(ingredientes);
  document.getElementById('ingredientesJSON').value = ingredientesJSON;

  // Modifica el action del formulario para apuntar a compraficticia.php
  document.getElementById('form-cargarstock').action = 'compraficticia.php';
  
  // Envía el formulario
  document.getElementById('form-cargarstock').submit();
}
</script>
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
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



</head>

<body>
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
            <h3>Agregar Producto</h3>
            <form action="agregar.php" enctype="multipart/form-data" method="post">
              <p>
                <input type="text" onkeypress="return soloLetras(event)" placeholder="Nombre" value="" name="nombre" required>
              </p>
              <p>
                <input type="Number" min="1" onkeypress="return event.charCode>=1 && event.charCode<=100"
                  placeholder="Precio" value="" name="precio" required>
              </p>
              <p>

                <input type="Number" min="1" onkeypress="return event.charCode>=1 && event.charCode<=100"
                  name="cantidad" value="<?php echo $resultado['cantidad'] ?>" Placeholder="Cantidad" required>
              </p>

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
        " value="" name="id_medida_producto">
                  <?php
                  require('../conexion/conexion.php');
                  $sql = "SELECT * FROM `medida_producto`";
                  //consulta
                  $mostrarprov = $mysqli->query($sql);
                  while ($row = mysqli_fetch_assoc($mostrarprov)) {
                    echo '<option name="id_medida_producto" value="' . $row['id_medida_producto'] . '">' . $row['medida'] . '</option>';
                  }


                  ?>

                </select>
              </p>
              <p>
                <input type="text" onkeypress="return soloLetras(event)" placeholder="Descripcion" value=""
                  name="descripcion" style="width:207%;">
              </p>
              <p></p>
              <p>
              <label for="insumosSelect" style="margin-bottom:8px;margin-left:-70%;">Insumos:</label>
              <select id="insumosSelect" style="color: #2a2a2a; border: 1px solid #ddd; background-color: #fff; height: 40px; font-size:16px; width:100%; border-radius: 5px; outline: none; padding-top: 3px; padding-left: 20px; padding-right: 20px; -webkit-appearance: none; -moz-appearance: none; appearance: none" name="insumosSelect[]">
                <?php
                require('../conexion/conexion.php');
                $sql = "SELECT i.id_insumo, i.descripcion AS insumo, i.id_tipo_medida, m.medida
                        FROM `insumos` AS i
                        INNER JOIN `tipo_medida` AS m ON i.id_tipo_medida = m.id_tipo_medida";
                $mostrarinsumos = $mysqli->query($sql);
                while ($row = mysqli_fetch_assoc($mostrarinsumos)) {
                  echo '<option value="' . $row['id_insumo'] . '" data-medida="' . $row['medida'] . '">' . $row['insumo'] . '</option>';
                }
                ?>
              </select>
              <input type="number" id="cantidadInsumo" name="cantidadInsumo" min="1" placeholder="Cantidad por docena" style="font-size: 16px; width: 78%;margin-top:5px;">
              <input type="button" value="OK" id="agregarInsumo" style="font-size: 12px; width: 20%;margin-top:5px;">
            </p>

            
            <div id="insumosSeleccionados" style="border: 1px solid #ddd; padding: 5px; display: inline-block;margin-top:25px;"></div>
            <style>
          .insumo-box {
            display: inline-block;
            background-color: #696969;
            padding-right: 8px;
            padding-left: 8px;
            padding-top:5px;
            padding-bottom: 5px;
            margin: 5px;
            border-radius: 2px;
            color:white;
          }

          .eliminar-insumo {
            cursor: pointer;
            margin-left: 1px;
            color:white;

            
          }
        </style>
            
            <input style="width:207%;" type="file" name="nueva_img" id="nueva_img"/>
<p></p>

              <p>

                <button style="width:207%;" type="submit">Agregar</button>
              </p>


            </form>
          </div>
        </div>
    </div>

    </center>
</body>

</html>
<script type="text/javascript" src="../js/validacion.js"></script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
  const insumosSelect = document.getElementById("insumosSelect");
  const agregarInsumoBtn = document.getElementById("agregarInsumo");
  const insumosSeleccionados = document.getElementById("insumosSeleccionados");
  const cantidadInsumo = document.getElementById("cantidadInsumo");
  const form = document.querySelector("form");

  agregarInsumoBtn.addEventListener("click", function() {
    const selectedOption = insumosSelect.options[insumosSelect.selectedIndex];
    if (selectedOption) {
      const selectedText = selectedOption.text;
      const id_insumo = selectedOption.value;
      const medida = selectedOption.getAttribute("data-medida");
      const cantidad = cantidadInsumo.value;

      // Crea un input oculto para enviar los datos de insumos al servidor
      const insumoInput = document.createElement("input");
      insumoInput.type = "hidden";
      insumoInput.name = "insumosSelect[]";
      insumoInput.value = id_insumo;
      form.appendChild(insumoInput);

      // Crea un input oculto para enviar las cantidades al servidor
      const cantidadInput = document.createElement("input");
      cantidadInput.type = "hidden";
      cantidadInput.name = "cantidadInsumo[]";
      cantidadInput.value = cantidad;
      form.appendChild(cantidadInput);

      // Crea un div para mostrar el insumo seleccionado con cantidad y medida
      const insumoDiv = document.createElement("span");
      insumoDiv.classList.add("insumo-box");

      // Muestra el insumo con cantidad y medida
      insumoDiv.innerHTML = `${cantidad} ${medida} ${selectedText} <i class="fas fa-times eliminar-insumo" data-insumo-id="${id_insumo}"></i>`;

      insumosSeleccionados.appendChild(insumoDiv);

      // Limpia el select y la cantidad después de agregar un insumo
      insumosSelect.selectedIndex = -1;
      cantidadInsumo.value = "";
    }
  });

  // Agrega un evento para eliminar insumos al hacer clic en el icono de "X"
  insumosSeleccionados.addEventListener("click", function(event) {
    if (event.target.classList.contains("eliminar-insumo")) {
      const id_insumo = event.target.getAttribute("data-insumo-id");
      const insumoDiv = event.target.parentElement;
      insumoDiv.remove();
    }
  });
});

      
</script>

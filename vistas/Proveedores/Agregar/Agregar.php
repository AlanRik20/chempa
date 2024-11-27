<?php
require('../conexion/conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cuit = $_POST['cuit'];
$id_tipo_proveedor = $_POST['id_tipo_proveedor']; 
$fecha_nac = $_POST['fecha_nac'];

$sql = "INSERT INTO personas (nombre_per, apellido, fecha_nac) VALUES ('$nombre', '$apellido', '$fecha_nac');";
$resultado = $mysqli->query($sql);

if (!$resultado) {
    echo "<script> alert('La persona no se agregó correctamente'); </script>";
} else {
    $id_persona = $mysqli->insert_id;
    $sql = "INSERT INTO `proveedores` (`id_proveedor`, `id_persona`, `cuit`, `id_tipo_proveedor`) VALUES (NULL, '$id_persona', '$cuit', '$id_tipo_proveedor');"; 
    $resultado = $mysqli->query($sql);

    if (!$resultado) {
        echo "<script> alert('El proveedor no se agregó correctamente'); </script>";
    } else {
        echo "<script> alert('El proveedor se agregó correctamente'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
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
                    <div class="form">
                        <h3>Agregar Insumo</h3>
                        <form action="AgregarContacto.php" method="POST">
                            <input type="hidden" name="id_persona" value="<?php echo $id_persona ?>">
                            <p>
                                <select id="tipoInsumo" name="id_tipo_contacto" style="color: #2a2a2a;
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
                                    " required>
                                    <option value="">Tipo de contacto</option>
                                    <?php 
                                    require('../conexion/conexion.php'); 
                                    $sql = "SELECT * FROM `tipo_contactos`";
                                    $mostrarprov = $mysqli->query($sql);
                                    while ($row = mysqli_fetch_assoc($mostrarprov)){
                                        echo '<option value="'.$row ['id_tipo_contacto'].'">' .$row['descripcion'].'</option>';
                                    }
                                    ?>
                                </select>
                            </p>
                            <p id="campoAdicional" style="display: none;">
                                <input type="text" name="valor" placeholder="Contacto">
                            </p>
                            <p>
                                <button>Agregar</button>
                            </p>
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <script type="text/javascript" src="../js/validacion.js"></script>
    <script>
        // Obtener elementos del DOM
        const tipoInsumo = document.getElementById('tipoInsumo');
        const campoAdicional = document.getElementById('campoAdicional');

        // Función para manejar el cambio en el select
        tipoInsumo.addEventListener('change', function() {
            if (this.value !== '') {
                campoAdicional.style.display = 'block'; // Mostrar el campo adicional
            } else {
                campoAdicional.style.display = 'none'; // Ocultar el campo adicional
            }
        });
    </script>
</body>
</html>

<?php
require('../conexion/conexion.php');

if (isset($_GET['id_persona'])) {
    $id_persona = $_GET['id_persona'];
} else {
    echo "Error: No se proporcionó el id_persona.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
</head>
<body class="fondo">
    <!-- ... -->
    <div class="contPag">
        <div class="contenedor">
            <center>
                <div class="wrapper">
                    <div class="form">
                        <!-- ... -->
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
    <!-- ... -->
</body>
</html>

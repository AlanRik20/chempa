<?php
require('../conexion/conexion.php');

if (isset($_GET['id_persona'])) {
    $id_persona = $_GET['id_persona'];
} else {
    echo "Error: No se proporcionó el ID de persona.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Insumo</title>
    <link rel="stylesheet" href="style.css" type="text/css">
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
</head>
<body class="fondo">
<div class="circulo"></div>
    <div class="tit-base">
        <div class="div-logo">
            <a href="inicioSesion.html"><input type="submit" value="Cerrar sesión" class="CerrarS" style="position: fixed;"></a>
            <img src="../img/logo.png" width="100px" style="margin-top: -5px;">
        </div>
        Chempanadas
    </div>
    <div class="opciones">
        <div>Control de Stock</div>
    </div>
    
    <div class="contPag">
        <div class="contenedor">
            <center>
                <div class="wrapper">
                    <?php
                    $consulta = "SELECT c.*, tc.descripcion AS tipo_contacto FROM contactos c
                                INNER JOIN tipo_contactos tc ON c.id_tipo_contacto = tc.id_tipo_contacto
                                WHERE id_persona = '$id_persona'";
                    $result = mysqli_query($mysqli, $consulta);
                    ?>
                    <div class="form">
                        <h3>Actualizar Contacto</h3>
                        <form action="ModificarCont.php" method="POST">
                            <input type="hidden" name="id_persona" value="<?php echo $id_persona ?>">
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<input type="hidden" name="id_contacto[]" value="'.$row['id_contacto'].'">';
                                echo '<p><label for="contacto_'.$row['id_contacto'].'">'.$row['tipo_contacto'].'</label>';
                                echo '<input type="text" id="contacto_'.$row['id_contacto'].'" name="contacto[]" value="'.$row['valor'].'" placeholder="Contacto"></p>';
                                
                            }
                            ?>
                            <p>
                                <br>
                                <a href="../Agregar/AgregarCont.php?id_persona=<?php echo $id_persona ?>">Agregar Contacto</a>

                            </p>
                            <p>
                                
                                <button style="width:100%;">Actualizar</button>
                            </p>
                            
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <script type="text/javascript" src="../js/validacion.js"></script>
</body>
</html>

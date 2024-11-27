<?php
require('../conexion/conexion.php');
session_start();
if (isset($_SESSION['cantidad'])) {
    $cantidad = $_SESSION['cantidad'];
    
} else {
    // Manejo de caso en el que "cantidad" no está en la sesión
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
    
    <link rel="stylesheet" href="../css/csss.css" type="text/css">
    <script>
        function confirmacion() {
            var respuesta = confirm("¿Realmente desea vaciar el registro?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }

        }
           
            </script>

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
    <center>
    <div class="contPag">
        
    <div class="input-estilo">
        <form action="Comprafic.php" method="POST">
        <button style='background-color:black;margin-right:10px;
                color: white;font-size:20px;
                padding: 7px 20px;
                border: none;
                border-radius: 5px;
                margin-left:-20px;
                cursor: pointer;' name='editar' value=''>&#8592</button></form>
                <form action='Vaciar.php' method='POST'>
                <button style='background-color:black;margin-right:10px;
                color: white;font-size:20px;
                padding: 7px 20px;
                border: none;
                border-radius: 5px;
                margin-left:740%;
                cursor: pointer;' type='submit' name='eliminar' value='' onclick='return confirmacion()'>Vaciar</button>
                 </form>
            </div>
                        
        <table class="tabla1">
            <thead>
                <tr>
                    
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Insumos </th>
                    
                    

                </tr>
            </thead>
            <tbody> 
            <?php
            $totalCantidadesInsumos = 0;
            $mostrar=mysqli_query($mysqli,"SELECT compra_ficticia.*, productos.*, detalle_productos.*, GROUP_CONCAT(CONCAT(insumos.descripcion,': ', ROUND(detalle_productos.cantidad * compra_ficticia.cantidad_pcto, 3), ' ', tipo_medida.Medida) SEPARATOR ' | ') AS insumos_relacionados FROM compra_ficticia INNER JOIN productos ON compra_ficticia.id_producto = productos.id_producto INNER JOIN detalle_productos ON detalle_productos.id_producto = productos.id_producto INNER JOIN insumos ON insumos.id_insumo = detalle_productos.id_insumo INNER JOIN tipo_medida ON insumos.id_tipo_medida = tipo_medida.id_tipo_medida GROUP BY compra_ficticia.id_compra_ficticia");
            if ($mostrar->num_rows > 0) {
                $totalCantidadesInsumos = array();
                while ($resultado = mysqli_fetch_assoc($mostrar)) {
                    echo "<tr>";
                    echo "<td>", $resultado['nombre_pro'], "</td>";
                    echo "<td>", $resultado['cantidad_pcto'], "</td>";
                    echo "<td>", $resultado['insumos_relacionados'], "</td>";
            
                    $insumos = explode(" | ", $resultado['insumos_relacionados']);
                    foreach ($insumos as $insumo) {
                        $insumo_data = explode(': ', $insumo);
                        $insumo_name = $insumo_data[0];
                        $insumo_qty = floatval($insumo_data[1]);

                        list($insumo_qty, $insumomed) = explode(' ', $insumo_data[1]);
                    
                        if (!array_key_exists($insumo_name, $totalCantidadesInsumos)) {
                            $totalCantidadesInsumos[$insumo_name] = $insumo_qty;
                        } else {
                            $totalCantidadesInsumos[$insumo_name] += $insumo_qty;
                        }
                    }
                }
                ?>
                </table>
                <br>
                <?php
// Supongamos que tienes un array asociativo $totalCantidadesInsumos con los datos.
// Debes modificar esta parte según tu implementación real.



echo '<table class="tabla2">';
echo '<thead>';
echo '<tr>';
echo"<th colspan='6'>Cantidad Total</th>";
echo '</tr>';

echo '<tr>';
echo '<th>Insumo</th>';
echo '<th>Cantidad</th>';
echo '<th>Insumo</th>';
echo '<th>Cantidad</th>';
echo '<th>Insumo</th>';
echo '<th>Cantidad</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

$rowCounter = 0;
$columnCounter = 0;


foreach ($totalCantidadesInsumos as $insumo => $cantidad) {
    if ($columnCounter === 0) {
        echo '<tr>';
    }

    echo '<td>' . $insumo . '</td>';
    
    echo '<td>' . $cantidad . ' ' . $insumomed. '</td>';
    

    $columnCounter++;

    if ($columnCounter === 3) {
        echo '</tr>';
        $columnCounter = 0;
        $rowCounter++;
    }
}

if ($columnCounter > 0) {
    // Si hay insumos sin pareja en la última fila
    echo '<td></td>'; // Celda vacía para mantener la estructura
   
    echo '</tr>';
}
?>

<?php
echo '</tbody>';
echo '</table>';
?>
                <button style='background-color:black;margin-right:10px;margin-top:10px;
                color: white;font-size:20px;
                padding: 7px 20px;
                border: none;
                border-radius: 5px;
                margin-left:55%;
                cursor: pointer;' id="saveAsPDF" name='imprimir' value='' >Guardar como PDF</button>
        <script>
             document.getElementById('saveAsPDF').addEventListener('click', function() {
            window.print();
            });
        </script>
                <?php
                
        }else{
            echo "<td colspan='2'>No se han encontrado articulos</td>";
            echo"<td colspan='3'>
            <form action='Comprafic.php' method='POST'>
            <button style='background-color: black;
            color: white;font-size:15px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;' name='editar' value=''>Volver</button>
             </form>
            </td>";
        }?>
            </tbody>
            
            <input type="hidden" value="<?php echo $resultado['id_producto']?>">
        </table>
        <br><br><br>
        
    </div>
</center>
</body>
</html>
<?php
require('../conexion/conexion.php');

$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

// Consulta para obtener los ingredientes relacionados con el id_producto
$sql = "SELECT dp.id_insumo, i.descripcion, dp.cantidad, tm.id_tipo_medida, tm.Medida
        FROM detalle_productos dp
        INNER JOIN insumos i ON dp.id_insumo = i.id_insumo
        INNER JOIN tipo_medida tm ON i.id_tipo_medida = tm.id_tipo_medida
        WHERE dp.id_producto = $id_producto";

// Ejecuta la consulta
$resultado = $mysqli->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}

// Array para almacenar la información de los ingredientes
$ingredientesArray = [];

while ($row = mysqli_fetch_assoc($resultado)) {
    $id_insumo = $row['id_insumo'];
    $ingrediente_nombre = $row['descripcion'];
    $ingrediente_cantidad = $row['cantidad'] * $cantidad;
    $medida = $row['Medida'];

    // Agrega los datos al array
    $ingredientesArray[] = [
        'id_insumo' => $id_insumo,
        'nombre' => $ingrediente_nombre,
        'cantidad' => $ingrediente_cantidad,
        'medida' => $medida,
    ];
}

// Codifica el array en formato JSON
$ingredientesJSON = json_encode($ingredientesArray);

// Devuelve el JSON como respuesta
echo $ingredientesJSON;
?>

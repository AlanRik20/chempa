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

    //tabla de ingredientes y cantidades totales
    $ingredientes = '<table>';
    $ingredientes .= '<tr><th>Ingrediente</th><th>Cantidad</th><th>Medida</th></tr>';
    while ($row = mysqli_fetch_assoc($resultado)) {
        $ingrediente_nombre = $row['descripcion'];
        $ingrediente_cantidad = $row['cantidad'] * $cantidad;
        $medida = $row['Medida'];

        // Agrega un input hidden para el id_tipo_medida
        $id_tipo_medida = $row['id_tipo_medida'];
        $ingredientes .= "<input type='hidden' name='id_tipo_medida[]' value='$id_tipo_medida'>";
        
        $ingredientes .= "<tr><td>$ingrediente_nombre</td><td>$ingrediente_cantidad</td><td>$medida</td></tr>";
    }
    $ingredientes .= '</table>';

    // Devuelve la tabla de ingredientes como respuesta
    echo $ingredientes;

?>

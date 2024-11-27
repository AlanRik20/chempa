<?php
$servername = "localhost"; // Por ejemplo: localhost
$username = "root";
$password = "";
$dbname = "chempaa_db";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para buscar pedidos según fechas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

    $sql = "SELECT 
        pedidos.id_pedido,
        personas.nombre_per,
        productos.nombre_pro,
        detalle_pedidos.cantidad,
        tipos_de_pedidos.descripcion_pe,
        pedidos.fecha,
        metodo_de_pago.descripcion_met,
        detalle_pedidos.precio 
    FROM pedidos 
    LEFT JOIN personas ON personas.id_persona = pedidos.id_cliente 
    LEFT JOIN detalle_pedidos ON detalle_pedidos.id_pedido = pedidos.id_pedido
    LEFT JOIN productos ON productos.id_producto = detalle_pedidos.id_producto
    LEFT JOIN tipos_de_pedidos ON tipos_de_pedidos.id_tipo_pedido = pedidos.id_tipo_de_pedido
    LEFT JOIN metodo_de_pago ON metodo_de_pago.id_metodo_pago = pedidos.id_metodo_pago
    WHERE pedidos.fecha BETWEEN '$fechaInicio' AND '$fechaFin'";
    
    // Ejecutar la consulta
    $results = $conn->query($sql);

    // Organizar los resultados en un arreglo según la persona
    $pedidos_por_persona = array();
    while ($row = $results->fetch_assoc()) {
        $persona = $row['nombre_per'];
        if (!isset($pedidos_por_persona[$persona])) {
            $pedidos_por_persona[$persona] = array();
        }
        $pedidos_por_persona[$persona][] = $row;
    }
} else {
    $pedidos_por_persona = array(); // Inicializar el arreglo vacío si no se envió el formulario
}

// Cerrar la conexión
$conn->close();
?>

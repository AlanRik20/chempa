<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chempaa_db";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$fechaInicio = $_POST['fechaInicio'];
$fechaTerminacion = $_POST['fechaFin'];

$query1 = "SELECT COUNT(id_pedido) as Efectivo FROM pedidos WHERE id_metodo_pago = 1 AND fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query2 = "SELECT COUNT(id_pedido) as Tarjeta_de_credito FROM pedidos WHERE id_metodo_pago = 2 AND fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query3 = "SELECT COUNT(id_pedido) as Tarjeta_de_debito FROM pedidos WHERE id_metodo_pago = 3 AND fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query4 = "SELECT COUNT(id_pedido) as Transferencia_bancaria FROM pedidos WHERE id_metodo_pago = 4 AND fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query5 = "SELECT pedidos.id_metodo_pago, SUM(precio) as total_recaudado_en_efectivo from detalle_pedidos LEFT JOIN pedidos on pedidos.id_pedido = detalle_pedidos.id_pedido WHERE id_metodo_pago=1 AND pedidos.fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query6 = "SELECT pedidos.id_metodo_pago, SUM(precio) as total_recaudado_en_credito from detalle_pedidos LEFT JOIN pedidos on pedidos.id_pedido = detalle_pedidos.id_pedido WHERE id_metodo_pago=2 AND pedidos.fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query7 = "SELECT pedidos.id_metodo_pago, SUM(precio) as total_recaudado_en_debito from detalle_pedidos LEFT JOIN pedidos on pedidos.id_pedido = detalle_pedidos.id_pedido WHERE id_metodo_pago=3 AND pedidos.fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query8 = "SELECT pedidos.id_metodo_pago, SUM(precio) as total_recaudado_por_transferencia_bancaria from detalle_pedidos LEFT JOIN pedidos on pedidos.id_pedido = detalle_pedidos.id_pedido WHERE id_metodo_pago=4 AND pedidos.fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query9 = "SELECT COUNT(id_pedido) as pedidos_retirados FROM pedidos WHERE `id_tipo_de_pedido` = 1 AND fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";
$query10 = "SELECT COUNT(id_pedido) as pedidos_por_deliberi FROM pedidos WHERE `id_tipo_de_pedido` = 2 AND fecha BETWEEN '$fechaInicio' AND '$fechaTerminacion';";

// New query for total revenue
$query11 = "SELECT SUM(precio) AS Total_recaudado from detalle_pedidos;";

$result1 = $conn->query($query1);
$row1 = $result1->fetch_assoc();
$result2 = $conn->query($query2);
$row2 = $result2->fetch_assoc();
$result3 = $conn->query($query3);
$row3 = $result3->fetch_assoc();
$result4 = $conn->query($query4);
$row4 = $result4->fetch_assoc();
$result5 = $conn->query($query5);
$row5 = $result5->fetch_assoc();
$result6 = $conn->query($query6);
$row6 = $result6->fetch_assoc();
$result7 = $conn->query($query7);
$row7 = $result7->fetch_assoc();
$result8 = $conn->query($query8);
$row8 = $result8->fetch_assoc();
$result9 = $conn->query($query9);
$row9 = $result9->fetch_assoc();
$result10 = $conn->query($query10);
$row10 = $result10->fetch_assoc();

// New query result
$result11 = $conn->query($query11);
$row11 = $result11->fetch_assoc();

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Consultas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        h2 {
            
            color: #000;
            padding: 10px;
        }

        p {
            margin: 10px;
        }

        button {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 20px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Resultados</h1>

    <h2>Metodos de Pago</h2>
    <p>Efectivo: <?php echo $row1['Efectivo']; ?></p>
    <p>Tarjeta de Crédito: <?php echo $row2['Tarjeta_de_credito']; ?></p>
    <p>Tarjeta de Débito: <?php echo $row3['Tarjeta_de_debito']; ?></p>
    <p>Transferencia Bancaria: <?php echo $row4['Transferencia_bancaria']; ?></p>

    <h2>Total Recaudado</h2>
    <p>Total Recaudado en Efectivo: <?php echo $row5['total_recaudado_en_efectivo']; ?></p>
    <p>Total Recaudado en Crédito: <?php echo $row6['total_recaudado_en_credito']; ?></p>
    <p>Total Recaudado en Débito: <?php echo $row7['total_recaudado_en_debito']; ?></p>
    <p>Total Recaudado por Transferencia Bancaria: <?php echo $row8['total_recaudado_por_transferencia_bancaria']; ?></p>

    <h2>Tipos de Pedido</h2>
    <p>Pedidos Retirados: <?php echo $row9['pedidos_retirados']; ?></p>
    <p>Pedidos por Delivery: <?php echo $row10['pedidos_por_deliberi']; ?></p>

    <h2>Total Recaudado en Ventas</h2>
    <p>Total Recaudado: <?php echo $row11['Total_recaudado']; ?></p>

    <button onclick="window.print()">Imprimir</button>
</body>
</html>

<?php
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chempaa_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT fecha, COUNT(*) as total_pedidos
        FROM pedidos
        WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'
        GROUP BY fecha";

$result = $conn->query($sql);
// Puedes procesar los resultados aquí
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Estadísticas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    *{
      text-align: center;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        color: black;
        cursor: pointer;
    }
    .btn-start {
        background-color: black;
    }
    .btn-logout {
        background-color: black;
    }
</style>
<body>
    <h1>Resultados de la estadística</h1>
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        var labels = [];
        var data = [];

        <?php
        while ($row = $result->fetch_assoc()) {
            $fecha = $row['fecha'];
            $totalPedidos = $row['total_pedidos'];

            echo "labels.push('$fecha');";
            echo "data.push($totalPedidos);";
        }
        ?>

        var myChart = new Chart(ctx, {
            type: 'line', // Cambiamos el tipo de gráfico a 'line'
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pedidos por Día',
                    data: data,
                    borderColor: '#00000', // Color de la línea
                    borderWidth: 2,
                    pointBackgroundColor: '#00000', // Color de los puntos
                    pointRadius: 4 // Tamaño de los puntos
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- Botón de Inicio -->
    <a href="index.html" class="btn btn-start">Volver</a>
</body>
</html>

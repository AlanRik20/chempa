<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pedidos</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-align: center;
    }
    /* Estilos generales del nav */
    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: hsl(0, 0%, 0%);
      padding: 10px;
    }

    /* Estilos para la imagen de usuario circular */
    .nav-left img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      overflow: hidden;
    }

    /* Estilos para el título "Cheempanada" */
    .nav-center {
      flex-grow: 1;
      text-align: center;
    }

    .nav-center h1 {
      margin: 0;
      font-size: 45px;
      color: white;
    }

    /* Estilos para el botón "Cerrar Sesión" */
    .btn-cerrar-sesion {
      padding: 10px 16px;
      background-color: #fbff00;
      color: rgb(0, 0, 0);
      border: none;
      border-radius: 15px;
      cursor: pointer;
      width: 200px;
    }

    /* Estilos para posicionar el botón en la esquina derecha */
    .nav-right {
      position: relative;
    }

    .btn-cerrar-sesion {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
    }

    table{
      margin: auto;
      margin-bottom: 40px;
    }
    p{
      font-size: 30px;
    }
    .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            color: white;
            cursor: pointer;
        }
        
        .btn-logout {
            background-color: black;

        }
        
</style>
<body>
    
<nav>

    <div class="nav-left">
      <img src="../images.png" alt="Imagen de Usuario">
    </div>
    <div class="nav-center">
      <h1>Cheempanadas</h1>
    </div>
    <div class="nav-right">
      <button class="btn-cerrar-sesion">Cerrar Sesión</button>
    </div>
  </nav>
<br>

<h1>Lista de Pedidos</h1>
<br>
<!-- Formulario de búsqueda de fechas -->
<form method="POST" action="">
    <label for="fechaInicio">Fecha de Inicio:</label>
    <input type="date" id="fechaInicio" name="fechaInicio">
    <label for="fechaFin">Fecha de Fin:</label>
    <input type="date" id="fechaFin" name="fechaFin">
    <input type="submit" value="Buscar">
</form>
<br>
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

$pedidos_por_persona = array();
$totalRecaudado = 0;

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
    while ($row = $results->fetch_assoc()) {
        $persona = $row['nombre_per'];
        if (!isset($pedidos_por_persona[$persona])) {
            $pedidos_por_persona[$persona] = array();
        }
        $pedidos_por_persona[$persona][] = $row;
        $totalRecaudado += $row['precio']; // Calcular la cantidad total recaudada
    }
}

// Cerrar la conexión
$conn->close();
?>

<!-- Mostrar la cantidad total recaudada -->
<strong><p>Total Recaudado: $<?php echo number_format($totalRecaudado, 2); ?></p></strong>
<br>
<br>
<a href="../index.html" class="btn btn-logout">Salir</a>
<br>
<br>
<!-- Tabla de resultados -->
<?php
// Mostrar los resultados de la búsqueda
foreach ($pedidos_por_persona as $persona => $pedidos) {
    echo "<h2>Pedido de $persona</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID Pedido</th><th>Nombre Producto</th><th>Cantidad</th><th>Descripción Tipo</th><th>Fecha</th><th>Método de Pago</th><th>Precio</th></tr>";
    foreach ($pedidos as $pedido) {
        echo "<tr>";
        echo "<td>{$pedido['id_pedido']}</td>";
        echo "<td>{$pedido['nombre_pro']}</td>";
        echo "<td>{$pedido['cantidad']}</td>";
        echo "<td>{$pedido['descripcion_pe']}</td>";
        echo "<td>{$pedido['fecha']}</td>";
        echo "<td>{$pedido['descripcion_met']}</td>";
        echo "<td>{$pedido['precio']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>

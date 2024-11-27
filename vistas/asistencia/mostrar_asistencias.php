<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistencias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navegador {
            background-color: #000000;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .imagen-circular {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-image: url(../images.png);
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
            background-color: rgba(255, 255, 47);
            padding: 3px;
            text-align: center;
        }

        .otro-titulo h2 {
            margin: 0;
            font-size: 20px;
        }

        table {
            width: 80%; /* Ancho de la tabla */
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        a {
            text-decoration: none;
            color: #333;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="fondo">
    <nav class="navegador">
        <div class="imagen-circular"></div>
        <h1 class="titulo">Chempanada</h1>
        <a href="../../index.php" class="cerrar-sesion">Cerrar Sesión</a>
    </nav>
    <div class="otro-titulo">
        <h2>Lista De Asistencias</h2>
    </div>
    <form action="index.html">
            <input type="hidden"><button style="margin-left:1660px;margin-top:30px;border:none;background-color:rgba(0, 0, 0, 0) cursor: pointer;"><img style="width:34px" src='img/añadir.png'></button>
           </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>DNI</th>
            <th>Fecha y Hora de Entrada</th>
            <th>Acciones</th>
        </tr>

        <?php
        include 'conexion.php';

        $sql = "SELECT * FROM asistencia";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row["Id_asistencia"]}</td>
                        <td>{$row["empleado"]}</td>
                        <td>{$row["DNI"]}</td>
                        <td>{$row["Fecha_entrada"]}</td>
                        <td>
                            <a href='modificar_asistencia.php?Id_asistencia={$row["Id_asistencia"]}'>Modificar</a>
                            <a href='eliminar_asistencia.php?Id_asistencia={$row["Id_asistencia"]}'>Eliminar</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay asistencias registradas</td></tr>";
        }

        $conn->close();
        ?>

    </table>

</body>
</html>

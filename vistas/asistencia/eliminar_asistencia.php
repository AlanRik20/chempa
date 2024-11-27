<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Asistencia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        p {
            text-align: center;
            margin: 10px 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            padding: 8px;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        a {
            text-decoration: none;
            color: #333;
            margin-top: 10px;
            display: inline-block;
            background-color: #ddd;
            padding: 8px;
            border-radius: 4px;
        }

        a:hover {
            background-color: #bbb;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
        <h2>Eliminar Asistencia</h2>
    </div>
    <p>Ingresa el ID de la asistencia que deseas eliminar:</p>

    <?php
    include 'conexion.php'; 

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
        
        $id_asistencia_a_eliminar = $_POST['id_asistencia'];

        
        $sql = "DELETE FROM asistencia WHERE id_asistencia=$id_asistencia_a_eliminar";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green; text-align: center;'>Asistencia eliminada con éxito</p>";
        } else {
            echo "<p style='color: red; text-align: center;'>Error al eliminar la asistencia: " . $conn->error . "</p>";
        }
    }


    $conn->close();
    ?>

    <form action="eliminar_asistencia.php" method="post">
        <label for="id_asistencia">ID Asistencia:</label>
        <input type="text" name="id_asistencia" required>

        <input type="submit" name="eliminar" value="Eliminar Asistencia">
    </form>
    <div class="button-container">
        <a href="mostrar_asistencias.php"><button>Volver</button></a>
    </div>
    <br>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Asistencia</title>
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
            margin-top: 20px;
            color: #333;
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
            background-color: #ffd700;
            color: #333;
            cursor: pointer;
        }
        
        form input[type="submit"] {
            background-color: #fbff00;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 15px;
            padding: 10px 16px;
            cursor: pointer;
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
        <h2>Modificar Asistencia</h2>
    </div>

<?php
include 'conexion.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])) {
    
    $id_asistencia = $_POST['id_asistencia'];
    $nuevo_empleado = $_POST['nuevo_empleado'];
    $nuevo_dni = $_POST['nuevo_dni'];
    $nueva_fechaentrada = $_POST['nueva_fechaentrada'];

    
    $sql = "UPDATE asistencia SET empleado='$nuevo_empleado', dni='$nuevo_dni', fechaentrada='$nueva_fechaentrada' WHERE id_asistencia=$id_asistencia";

    if ($conn->query($sql) === TRUE) {
        echo "Asistencia modificada con éxito";
    } else {
        echo "Error al modificar la asistencia: " . $sql . "<br>" . $conn->error;
    }
} else {
    
    $id_asistencia_a_modificar = isset($_GET['id_asistencia']) ? $_GET['id_asistencia'] : null;

    
    if ($id_asistencia_a_modificar !== null) {
        
        $sql = "SELECT * FROM asistencia WHERE id_asistencia=$id_asistencia_a_modificar";
        $result = $conn->query($sql);

        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            
            
            <form action="modificar_asistencia.php" method="post">
                <input type="hidden" name="id_asistencia" value="<?php echo $row['id_asistencia']; ?>">

                <label for="nuevo_empleado">Nuevo Empleado:</label>
                <input type="text" name="nuevo_empleado" value="<?php echo $row['empleado']; ?>" required>

                <label for="nuevo_dni">Nuevo DNI:</label>
                <input type="text" name="nuevo_dni" value="<?php echo $row['dni']; ?>" required>

                <label for="nueva_fechaentrada">Nueva Fecha de Entrada:</label>
                <input type="datetime" name="nueva_fechaentrada" value="<?php echo $row['fechaentrada']; ?>" required readonly>

                <input type="submit" name="modificar" value="Modificar Asistencia">
            </form>

            <div class="button-container">
            <a href="mostrar_asistencias.php"><button>Volver</button></a>
        </div>
            <?php
        } else {
            echo "Error al obtener los datos de la asistencia: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "ID de asistencia no proporcionado.";
    }
}


$conn->close();
?>

</body>
</html>

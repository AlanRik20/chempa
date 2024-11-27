<?php
include 'conexion.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $empleado = $_POST["empleado"];
    $dni = $_POST["dni"];
    $fechaentrada = $_POST["fechaentrada"];

    $sql = "INSERT INTO asistencia (empleado, dni, Fecha_entrada) VALUES ('$empleado', '$dni', '$fechaentrada')";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: mostrar_asistencias.php");
        exit();
    } else {
        echo "Error al registrar la asistencia: " . $conn->error;
    }
}


$conn->close();
?>

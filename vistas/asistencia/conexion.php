<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'chempaa_db';

$conn = new mysqli($server, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

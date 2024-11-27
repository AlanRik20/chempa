<?php 
	$servidor = "localhost";
	$usuario = "root";
	$password = "";
	$base_de_datos = "Chempaa_db";
	$mysqli = new mysqli($servidor, $usuario, $password, $base_de_datos);

	if ($mysqli->connect_errno) {
		echo "No se puedo realizar la conexion: ("
		. $mysqli->connect_errno . ") " . $mysqli->connect_errno;
	}

 ?> 

 
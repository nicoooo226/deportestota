<?php

$nombre = $_POST['nombre'];
$pass = $_POST['pass'];
$tipo = $_POST['tipo'];

//$conexion = mysqli_connect("localhost","root","","escuela");//host,user,pass,db
include('logica/conexion.php');

		//agrega un nuevo usuario
		
		mysqli_query($conexion,"INSERT INTO usuarios (nombre, clave, tipo) VALUES ('$nombre', '$pass', '$tipo') ");
		
		if($tipo == "alumno"){
        mysqli_query($conexion,"INSERT INTO calificaciones (nombre, mate, espa, historia) VALUES ('$nombre', 0,0,0) ");
		}
		echo "Se agrego el usuario: <br>".$nombre."<br>";
	
?>
<a href="paginaprincipal.php">Volver atras</a>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
</head>
<body>
<?php 
// Llamamos al archivo de conexión a la base de datos
require("conexion.php");
	
//Creamos las variables con los nombres de los campos del formulario
$usuario = $_POST["usuario"];
$email = $_POST["email"];
//$website = $_POST["website"];
$comentario = $_POST["comentario"];

// Codigo de insercion a la base de datos
$insertar = mysqli_query($conexion,"INSERT INTO comentarios (usuario, correo,  comentario) VALUES ('$usuario','$email','$comentario')");

if (!$insertar) {
	echo "Error al guardar";
} else {
	echo "Guardado con éxito";
}

mysqli_close($conexion);
?>
<br/>
<a href="form.php">Volver al inicio</a>
<a href="comentarios.php">ver comentarios</a>

</body>

</html>
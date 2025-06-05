<?php session_start();
$sesion = $_SESSION['username'];
if(!isset($sesion)){
    header("location: login.php");
}
?>
<html>
<head>
	<title>Agregar Usuarios</title>
</head>
<body>
<h2>Ingresa los datos del nuevo usuario</h2>
<form method="POST" action="accion.php">
<p>Nombre</p>
<input type="text" name="nombre">
<p>Clave</p>
<input type="text" name="pass"><br>
<select name="tipo">
		<option value="alumno">Alumno</option>
		<option value="docente">Docente</option>
		
</select><br />
<input type="submit" value="Agrega usuario"><br>
</form>
<a href="paginaprincipal.php">Ir atras</a>
</body>
</html>
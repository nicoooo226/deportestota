<?php session_start();
$sesion = $_SESSION['username'];
if(!isset($sesion)){
    header("location: login.php");
}
?>
<html>
<head>
	<title>Eliminar Usuarios</title>
</head>
<body>
<h1>Los datos eliminados no se recuperan</h1>    
<h2>Ingresa los datos del  usuario a eliminar</h2>
<form method="POST" action="delete.php">
<p>Nombre</p>

<select name="nombre">
        <option value="0">Seleccione:</option>
        <?php
         include('logica/conexion.php');
          $query = $mysqli = mysqli_query ($conexion,"SELECT * FROM usuarios");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
          }
        ?>
</select>

<input type="submit" value="eliminar usuario"><br>
</form>
<a href="paginaprincipal.php">Ir atras</a>
</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Comentarios</title> 
</head> 
<body> 
<?php 
  // Se conecta al SGBD 
 //if(!($conexion = mysql_connect("localhost", "root", ""))) 
  //  die("Error: No se pudo conectar");
	
  // Selecciona la base de datos 
  //if(!mysql_select_db("comentarios", $conexion)) 
   // die("Error: No existe la base de datos");
	//include('conexion.php');
  $conexion = mysqli_connect("localhost","root","","comentarios");
//if (!$conexion) {
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM comentarios"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysqli_query($conexion, $sentencia); 
  //if(!$resultado) 
    //die("Error: no se pudo realizar la consulta");

 echo "<div id='comentarios'>";
  //while($fila = mysql_fetch_assoc($resultado)) 
  while ($fila = mysqli_fetch_array($resultado))
  { 
  	echo "<div class='user'>";
    echo "*" . $fila['usuario'] . "<br/> <div class='tiempo'>" . $fila['fecha'] . "</div>";
  	
    echo "</div>";
  	echo "<div class='comment'>";
    echo $fila['comentario'] . '<br/>';
  	echo "----------------------------------------</div>";
  } 
 echo "</div><br/>";
  // Libera la memoria del resultado
  mysqli_free_result($resultado);
  
  // Cierra la conexi�n con la base de datos 
  mysqli_close($conexion); 
?> 
<a href="form.php">Volver al inicio</a>
</body> 
</html> 

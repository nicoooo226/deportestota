<?php
 session_start();
$sesion = $_SESSION['username'];
if(!isset($sesion)){
    header("location: login.php");
}
$nombre=$_POST ["nombre"];
echo $nombre;
include('logica/conexion.php');
//$conexion = mysqli_connect("localhost","root","","escuela");
//$registros = mysqli_query($conexion,"DELETE * FROM usuarios WHERE nombre='$nombre' ");
//Creamos la sentencia SQL
$ssql = "delete from usuarios where nombre='$nombre'";

// Ejecutamos la sentencia de borrado
if($conexion->query($ssql)) {
 $ssql2 = "delete from calificaciones where nombre='$nombre'";  
 if($conexion->query($ssql2)) { 
 echo '<p>Contacto borrado con éxito</p>';
 }
} else {
  echo '<p>Hubo un error al borrar el contaco: ' . $conexion->error . '</p>';
}


    // Cierra la conexion
    mysqli_close($conexion);
    
    echo "<br><br><a href='paginaprincipal.php'>Volver a la página principal</a>";



?>
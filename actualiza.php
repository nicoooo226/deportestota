<?php
$nombre=$_POST ["nombre"];
$materia=$_POST ["asignatura"];
$calif=$_POST ["califiacacion"];
include('logica/conexion.php');
//$conexion = mysqli_connect("localhost","root","","escuela");
$registros = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre='$nombre ' ");

while ($reg = mysqli_fetch_array($registros)) {
	
    $categoria=$reg['tipo'];
    
}
if($categoria=="alumno"){
if($materia=="mate"){
 $registros = mysqli_query($conexion,"UPDATE calificaciones SET mate=$calif WHERE nombre='$nombre' ");
}
if($materia=="espaniol"){
    $registros = mysqli_query($conexion,"UPDATE calificaciones SET espa=$calif WHERE nombre='$nombre' ");
   }
   if($materia=="historia"){
    $registros = mysqli_query($conexion,"UPDATE calificaciones SET historia=$calif WHERE nombre='$nombre' ");
   }

    // Cierra la conexion
    mysqli_close($conexion);
    echo "Califiacion registrada";
 }
 else{
    echo "No se pueden registrar calificaciones a un docente";
 }
    echo "<br><br><a href='paginaprincipal.php'>Volver a la página principal</a>";



?>
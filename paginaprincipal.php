<?php
session_start();
$sesion = $_SESSION['username'];
include('logica/conexion.php');
$registros = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre = '$sesion ' ");
echo "<h1> BIENVENIDO: $sesion </h1><br>";
while ($reg = mysqli_fetch_array($registros)) {
    $categoria=$reg['tipo'];
 }
if(!isset($sesion)){
    header("location: login.php");
}else{
     if($categoria=='docente'){
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>

    <h2>Alumnos y sus calificaciones</h2>
     <table>
      <tr >
        <th>Nombre </th>
        <th>Español </th>
        <th>Matemáticas</th>
        <th>Historia </th>
        <th>Promedio </th>
     </tr>
<?php
     $registros = mysqli_query($conexion,"SELECT * FROM calificaciones");
     while ($fila = mysqli_fetch_array($registros))
     { 
?>
    <tr>
    <td><?php echo $fila['nombre']?> </td>
    <td><?php echo $fila['espa']?> </td>
    <td><?php echo $fila['mate']?> </td>
    <td><?php echo $fila['historia']?> </td>
    <td><?php echo ($fila['historia']+ $fila['mate']+ $fila['espa'])/3?> </td>
    </tr>
    
    
<?php
   } 
   
?>
    </table>
    <h2>Opciones del administrador</h2>
    <h3>Actualizar califiación  </h3>
    <form action="actualiza.php" method="post">
        Nombre del Alumno(a):<br />
        <select name="nombre">
        <option value="0"></option>
<?php
        $query = $mysqli = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE tipo='alumno'");
        while ($valores = mysqli_fetch_array($query)) {
        echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
        }
?>
        </select>
        <br>
        Asignatura:<br>
        <select name="asignatura" aria-placeholder="Asignatura">
				<option value="espaniol">Español</option>
				<option value="mate">Matemáticas</option>
				<option value="historia">Historia</option>
		</select><br>
		Califiación:<br>
		<input type="number" name="califiacacion" min=5 max=10 placeholder="Calificación" ><br>
		<input type="reset" value="Limpiar formulario">
		<input type="submit" value="Guardar">
	</form>
        <br>
        <a href="nuevos.php">Agregar nuevos usuarios</a>
        <br>
        <a href="elimina.php">Eliminar usuarios</a>
     
</body>
</html> 
<?php

    }   
    else{
    echo"Tus calificaciones son:<br>";
    $registros = mysqli_query($conexion,"SELECT * FROM calificaciones WHERE nombre = '$sesion ' ");
    while ($reg = mysqli_fetch_array($registros)) {
    	echo "Matemáticas: ".$reg['mate']."<br>";
        $a=$reg['mate'];
	    echo "Español: ".$reg['espa']."<br>";
        $b=$reg['espa'];
	    echo "Historia: ".$reg['historia']."<br>";
        $c=$reg['historia'];
        }
        $promedio=($a+$b+$c)/3;
        echo $sesion. " Tu promedio es: ". $promedio;
    }
    echo "<br><br><a href='logica/salir.php'>Salir</a>";
}

?>
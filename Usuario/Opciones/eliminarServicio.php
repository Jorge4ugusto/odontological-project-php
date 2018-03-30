<?php
INCLUDE("../../Core/conexion.php");
$Servicio=$_GET['ID'];
$deshabilitar	= "	UPDATE 		servicio
      SET 		  estado = 3
      WHERE 		id_servicio = $Servicio";
$ejecutar	= mysql_query($deshabilitar, $bd);
if(isset($ejecutar))
{
  header("Location:../#tratamientos");
}
else
{
  echo"Error!!.<br/>";
  echo"<a href='index.php'>volver</a>";
}
?>

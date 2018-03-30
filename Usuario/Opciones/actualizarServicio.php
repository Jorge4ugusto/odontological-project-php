<?php
	require_once("../../Core/conexion.php");
	$id=$_GET['ID1'];
	$nombre_serv=$_GET['N1'];
  $costo=$_GET['A1'];
	$actualizar	= "	UPDATE 	servicio
				SET 	nombre_servicio		= '$nombre_serv',
					costo_servicio 	= '$costo'
				WHERE 	id_servicio	= '$id' ";
	$eje_actualizar = mysql_query($actualizar, $bd);
	if(isset($eje_actualizar))
	{
		header("Location:../index.php#tratamientos");
	}
	else
	{
		echo" ERROR AL EJECUTAR<br/>";
		echo"<a href='../index.php'>volver</a>";
	}
?>

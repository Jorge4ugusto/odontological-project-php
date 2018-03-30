<?php
	require_once("../../Core/conexion.php");
	$Paciente=$_GET['ID1'];
	$Nombre=$_GET['N1'];
	$Apellido=$_GET['A1'];
	$Genero=$_GET['G1'];
	$Edad=$_GET['E1'];
	$actualizar	= "	UPDATE 	Paciente
				SET 	nombres_paciente		= '$Nombre',
					apellidos_paciente 	= '$Apellido',
					GENERO		= '$Genero',
					EDAD		= '$Edad'
				WHERE 	ID_PACIENTE 	= '$Paciente' ";
	$eje_actualizar = mysql_query($actualizar, $bd);
	if(isset($eje_actualizar))
	{
		header("Location:../index.php#pacientes");
	}
	else
	{
		echo" ERROR AL EJECUTAR<br/>";
		echo"<a href='index.php'>volver</a>";
	}
?>

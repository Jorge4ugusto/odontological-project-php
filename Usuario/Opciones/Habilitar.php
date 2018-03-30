<?php
	INCLUDE("../../Core/conexion.php");
	$Paciente	= $_GET['ID'];
	$habilitar	= "	UPDATE 		Paciente
				SET 		estado = 1
				WHERE 		ID_paciente = $Paciente";
	$ejecutar	= mysql_query($habilitar, $bd);
	if(isset($ejecutar))
	{
		header("Location:../#pacientes");
	}
	else
	{
		echo"Error!!.<br/>";
		echo"<a href='index.php'>volver</a>";
	}
?>

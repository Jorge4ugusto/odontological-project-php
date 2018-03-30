<?php
	INCLUDE("../../Core/conexion.php");
	$Paciente	= $_GET['ID'];
	$deshabilitar	= "	UPDATE 		Paciente
				SET 		estado = 2
				WHERE 		ID_paciente = $Paciente";
	$ejecutar	= mysql_query($deshabilitar, $bd);
	if(isset($ejecutar))
	{
		header("Location:../#pacientes");
	}
	else
	{
		echo"Error!!.<br/>";
		echo"<a href='index.php'>volver</a>";
	}
/*	public function deshabilitarServicio($Servicio)
	{
		$Servicio=$_GET[''];
		$deshabilitar	= "	UPDATE 		servicio
					SET 		  estado = 2
					WHERE 		id_servicio = $Servicio";
		$ejecutar	= mysql_query($deshabilitar, $bd);
	}*/
?>

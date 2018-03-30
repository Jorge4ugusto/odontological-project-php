<?php
	INCLUDE		("../../Core/conexion.php");
	$Paciente	= $_GET['ID'];
	$sql_eliminar	= "	UPDATE 		Paciente
			  	SET 		Estado = 3
				WHERE		ID_Paciente = $Paciente";
	$ejec_eliminar 	= mysql_query($sql_eliminar, $bd);
	IF(isset($ejec_eliminar))
	{
		HEADER("Location:../#pacientes");
	}
	ELSE
	{
		ECHO"Error al Ejecutar!!.<br/>";
		ECHO"<a href='index.php'>volver</a>";
	}
?>

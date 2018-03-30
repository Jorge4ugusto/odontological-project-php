<?php
	INCLUDE("../../Core/conexion.php");
	$Paciente = $_GET["ID"];
	$Consulta = "SELECT	ID_PACIENTE,
				nombres_paciente,
				apellidos_paciente,
				GENERO,
				EDAD,
				ESTADO
			FROM	Paciente
			WHERE	ID_PACIENTE = $Paciente";

			$Ejecutar_Consulta	= MySql_Query($Consulta, $bd);
			$Array= MySql_Fetch_Array($Ejecutar_Consulta);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Editar.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../Multimedia/Estilos/main.css" />
		<noscript><link rel="stylesheet" href="../../Multimedia/Estilos/noscript.css" /></noscript>
	</head>
	<body>
<div id="wrapper">

<article id="editarPaciente">
	<h2 class="major">Editar Paciente</h2>
	<h3>Numero de Paciente:
	<?=$Array['ID_PACIENTE']?></h3>
<form action="Actualizar.php" method="GET">

<div class="field half first">
<label for="N1">Nombres:</label>
<input Name="N1" type="text" value="<?=$Array['nombres_paciente']?>" required>
<label for="A1">G&eacute;nero:</label>
<?php
if($Array['GENERO']=="Masculino"):
echo "Masculino: <input Name='G1' type='radio' Value='Masculino' checked><br>
Femenino: <input Name='G1' type='radio' Value='Femenino' >";
endif;
?>
<?php
if($Array['GENERO']=="Femenino"):
echo "Masculino: <input Name='G1' type='radio' Value='Masculino' ><br>
Femenino: <input Name='G1' type='radio' Value='Femenino' checked >";
endif;
?>

</div>
<div class="field half">
	<label for="A1">Apellidos:</label>
	<input Name="A1" type="text" value="<?=$Array['apellidos_paciente']?>" required>

<label for="E1">Edad:</label>
<input Name="E1" type="number" value="<?=$Array['EDAD']?>" required>



</div>
<ul class="actions">
<li><input class="button special" type="submit" value="Actualizar"> <input type="reset"  value="Restablecer"></li>
<li><a href="../index.php#pacientes" class="button">Cancelar</a></li>
<input name="ID1" type="hidden" value="<?=$Array['ID_PACIENTE'];?>"/>
</ul>
</form>
</article>
</div>
<div id="bg"></div>
	<script src="../../Multimedia/Scripts Java/jquery.min.js"></script>
	<script src="../../Multimedia/Scripts Java/skel.min.js"></script>
	<script src="../../Multimedia/Scripts Java/util.js"></script>
	<script src="../../Multimedia/Scripts Java/main.js"></script>
	</body>
</html>

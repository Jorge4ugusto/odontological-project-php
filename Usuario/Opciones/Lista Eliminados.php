<!DOCTYPE html>
<html>
	<?php
		include("conexion.php");
		$sql_mostrar	= "SELECT ID_PACIENTE,
				  	  NOMBRES,
				  	  APELLIDOS,
				  	  GENERO,
				  	  EDAD,
				  	  ESTADO
			   	    FROM  Paciente
			  	   ";
		$ejecuto_mostrar=mysql_query($sql_mostrar,$BD);
	?>
	<center>
		<h1> Lista de Eliminados </h1>
	</center>
	<br/>
	<center>
		<table>
			<tr>
				<th width="100" height="50" bgcolor="#CCBBFF">
					<a href="4 Lista.php">
						Lista Principal
					</a>
				</th>
			</tr>
		</table>
	</center>
	<hr/>
	<table align="center">
  		<thead>
			<tr>
				<th width="45" height="45" bgcolor="#CCBBFF">ID PACIENTE</th>
				<th width="70" height="45" bgcolor="#CCBBFF">NOMBRES</th>
				<th width="70" height="45" bgcolor="#CCBBFF">APELLIDOS</th>
				<th width="136" height="45" bgcolor="#CCBBFF">GENERO</th>
				<th width="70" height="45" bgcolor="#CCBBFF">EDAD</th>
				<th width="70" height="45" bgcolor="#CCBBFF">ESTADO</th>
			</tr>
			<tr height="10"></tr>
   		</thead>
		<tbody>
			<?php
				while($arreglito=mysql_fetch_array($ejecuto_mostrar))
				{
					IF($arreglito['Estado']==3)
					{
			?>
					<tr bgcolor="#EEE0E0">
    						<td><?=$arreglito['ID_PACIENTE']?></td>
    						<td><?=$arreglito['NOMBRES']?></td>
    						<td><?=$arreglito['APELLIDOS']?></td>
    						<td><?=$arreglito['GENERO']?></td>	
    						<td><?=$arreglito['EDAD']?></td>
						<td bgcolor='#CC0000' align='center'>
							<font color='#ffffff'>
								Eliminado
							</font>
						</td>
						<td>
							<a href="Habilitar.php?id_usu=<?=$arreglito['ID_PACIENTE']?>">
								<img src="Imagenes/habilitar.png" width="25" height="25">
							</a>
						</td>
				<?php
					}
				?>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</html>
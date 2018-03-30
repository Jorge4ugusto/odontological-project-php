<?php
include('../Core/conexion.php');
include('../Core/Lock.php');
$nombre=$_POST['nombreServicio'];
$costo=$_POST['costoServicio'];
$sql_inserta="INSERT INTO servicio (id_usuario,nombre_servicio,costo_servicio,estado)
 VALUES ('$login_session_usuario','$nombre','$costo',1)";
# ejecutamos la cosnulta
$ejecutar_sql = mysql_query($sql_inserta,$bd);
#verificacmos si se ejecuto la consulta
if(isset($ejecutar_sql))
{
  echo "<h3>Datos Insertados con exito!!!</h3>";
  header("Location:index.php#tratamientos");
}
else
{
  echo "<h3>Error: Ejecucion!!!</h3>";
 }

?>

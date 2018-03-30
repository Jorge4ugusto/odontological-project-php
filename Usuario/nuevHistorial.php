<?php
include('../Core/conexion.php');
include('../Core/Lock.php');
$diente18=$_POST['18'];
$diente17=$_POST['17'];
$diente16=$_POST['16'];
$diente15=$_POST['15'];
$diente14=$_POST['14'];
$diente13=$_POST['13'];
$diente12=$_POST['12'];
$diente11=$_POST['11'];
$diente21=$_POST['21'];
$diente22=$_POST['22'];
$diente23=$_POST['23'];
$diente24=$_POST['24'];
$diente25=$_POST['25'];
$diente26=$_POST['26'];
$diente27=$_POST['27'];
$diente28=$_POST['28'];
$diente48=$_POST['48'];
$diente47=$_POST['47'];
$diente46=$_POST['46'];
$diente45=$_POST['45'];
$diente44=$_POST['44'];
$diente43=$_POST['43'];
$diente42=$_POST['42'];
$diente41=$_POST['41'];
$diente31=$_POST['31'];
$diente32=$_POST['32'];
$diente33=$_POST['33'];
$diente34=$_POST['34'];
$diente35=$_POST['35'];
$diente36=$_POST['36'];
$diente37=$_POST['37'];
$diente38=$_POST['38'];
$sql_insertarCHK="INSERT INTO dientes (id_odontograma,diente18,diente17,diente16,diente15,diente14,diente13,diente12,diente11,diente21,diente22,diente23,diente24,diente25,diente26,diente27,diente28,diente48,diente47,diente46,
  diente45,diente44,diente43,diente42,diente41,diente31,diente32,diente33,diente34,diente35,diente36,diente37,diente38)
VALUES(1,'$diente18','$diente17','$diente16','$diente15','$diente14','$diente13','$diente12','$diente11','$diente21','$diente22','$diente23','$diente24','$diente25','$diente26','$diente27','$diente28','$diente48','$diente47','$diente46',
  '$diente45','$diente44','$diente43','$diente42','$diente41','$diente31','$diente32','$diente33','$diente34','$diente35','$diente36','$diente37','$diente38')
";
$ejecutar_CHK=mysql_query($sql_insertarCHK,$bd);
$paciente=$_POST['SeleccionarPacientes'];
$tratamiento=$_POST['SeleccionarTratamientos'];
$fechaIni=$_POST['fechaComienzo'];
$fechaC=$_POST['fechaConclusion'];
$sql_inserta="INSERT INTO tratamiento (id_odontograma,id_usuario,paciente,tratamiento,fecha_inicio,fecha_consulta,estado)
 VALUES (1,'$login_session_usuario','$paciente','$tratamiento','$fechaIni','$fechaC',1)";
# ejecutamos la cosnulta
$ejecutar_sql = mysql_query($sql_inserta,$bd);
#verificacmos si se ejecuto la consulta
if(isset($ejecutar_sql))
{
  echo "<h3>Datos Insertados con exito!!!</h3>";
  header("Location:index.php#nuevoHistorial");
}
else
{
  echo "<h3>Error: Ejecucion!!!</h3>";
 }
 ?>

<?php
include('Core/conexion.php');
$nombrecompleto=$_POST['name'];
$edad=$_POST['edad'];
$genero=$_POST['genero'];
$usuario=$_POST['usuario'];
$contraseña=$_POST['contra'];
$sql_inserta="INSERT INTO usuario (usuario,contraseña,estado,nombre_completo,edad,genero)
 VALUES ('$usuario','$contraseña',1,'$nombrecompleto','$edad','$genero')";
# ejecutamos la cosnulta
$ejecutar_sql = mysql_query($sql_inserta,$bd);
#verificacmos si se ejecuto la consulta
if(isset($ejecutar_sql))
{
  echo "<h3>Datos Insertados con exito!!!</h3>";
  header("Location:index.php");
}
else
{
  echo "<h3>Error: Ejecucion!!!</h3>";
 }

?>

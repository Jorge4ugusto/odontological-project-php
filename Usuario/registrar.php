<?php
include('../Core/conexion.php');
include('../Core/Lock.php');
$nombre=$_POST['name'];
$apellido=$_POST['apes'];
$edad=$_POST['edad'];
$genero=$_POST['genero'];
$sql_inserta="INSERT INTO paciente (id_usuario, nombres_paciente,apellidos_paciente,genero,edad,estado)
 VALUES ('$login_session_usuario','$nombre','$apellido','$genero','$edad',1)";
# ejecutamos la cosnulta
$ejecutar_sql = mysql_query($sql_inserta,$bd);
#verificacmos si se ejecuto la consulta
if(isset($ejecutar_sql))
{
  echo "<h3>Datos Insertados con exito!!!</h3>";
  header("Location:index.php#pacientes");
}
else
{
  echo "<h3>Error: Ejecucion!!!</h3>";
 }
/*------------------Subir Imagen------------------*/
 if ( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
 	echo "ha ocurrido un error";
 } else {
 	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
 	//y que el tamano del archivo no exceda los 16MB
 	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
 	$limite_kb = 16384;

 	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){

 		//este es el archivo temporal
 		$imagen_temporal  = $_FILES['imagen']['tmp_name'];
 		//este es el tipo de archivo
 		$tipo = $_FILES['imagen']['type'];
 		//leer el archivo temporal en binario
                 $fp     = fopen($imagen_temporal, 'r+b');
                 $data = fread($fp, filesize($imagen_temporal));
                 fclose($fp);

                 //escapar los caracteres
                 $data = mysql_escape_string($data);

 		$resultado = @mysql_query("INSERT INTO imagenes (imagen, tipo_imagen) VALUES ('$data', '$tipo')") ;

 		if ($resultado){
 			echo "el archivo ha sido copiado exitosamente";
 		} else {
 			echo "ocurrio un error al copiar el archivo.";
 		}
 	} else {
 		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
 	}
 }
?>

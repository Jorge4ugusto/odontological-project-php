<?php
$mysql_hostname="localhost";
$mysql_user="root";
$mysql_password="admin";
$mysql_database="ondontologica";
$bd=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)
or die
("No se puede conectar a la Base de datos error en los parametros de contraseña y nombre");
mysql_select_db($mysql_database,$bd)
or die
("Error de Conexion a la Base de Datos");
?>

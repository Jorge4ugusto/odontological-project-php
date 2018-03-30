<?php
$mysql_hostname="mysql.hostinger.es";
$mysql_user="u186755370_jorge";
$mysql_password="ViKingo1931";
$mysql_database="u186755370_odont";
$bd=mysql_connect($mysql_hostname,$mysql_user,$mysql_password)
or die
("No se puede conectar a la Base de datos error en los parametros de contraseña y nombre");
mysql_select_db($mysql_database,$bd)
or die
("Error de Conexion a la Base de Datos");
?>

<?php
require_once('conexion.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query(
  "SELECT id_usuario,
          nombre_completo
   FROM   usuario
   WHERE  usuario='$user_check'
   ");
 $row=mysql_fetch_array($ses_sql);
 $login_session_nombre=$row['nombre_completo'];
 $login_session_usuario=$row['id_usuario'];
 if (!isset($login_session_nombre)) {
   header("Location:../index.php");
 }
 ?>

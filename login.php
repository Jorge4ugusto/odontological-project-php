<?php
require_once('Core/conexion.php');
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
$mi_nombre_usr=addslashes($_POST['user_nombre']);
$mi_password=addslashes($_POST['password']);
$sql="SELECT id_usuario,
             usuario,
             estado
        FROM usuario
       WHERE usuario='$mi_nombre_usr'
         AND contraseña='$mi_password'
";
$result=mysql_query($sql,$bd);
$fila=mysql_fetch_array($result);
$id=$fila['id_usuario'];
$estado=$fila[2];
$cont=mysql_num_rows($result);
if ($cont==1) {
    $_SESSION['login_user']=$mi_nombre_usr;
    header("Location:Usuario/");
}
else {
echo "Usuario o contraseña incorrectos";
echo "<a href='index.php#Ingresar'>Regresar</a>";
}
}
 ?>

<?php
require ('conexion.php');
if (isset($_POST['submit'])){
$username=mysql_escape_string($_POST['uname']);
$password=mysql_escape_string($_POST['pass']);


if (!$_POST['uname'] | !$_POST['pass'])
 {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('No has completado todos los campos Requeridos')
        window.location.href='login.html'
        </SCRIPT>");
exit();
     }
$sql= mysql_query("SELECT * FROM `user` WHERE `User` = '$username' AND `Password` = '$password'");
if(mysql_num_rows($sql) > 0)
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='/Facultad/menu.html'
        </SCRIPT>");
exit();
}
else{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Usuario o Contraseña Incorrecta. Por favor, vuelva a introducir los parámetros')
        window.location.href='/Facultad/index.html'
        </SCRIPT>");
exit();
}
}
else{
}
?>
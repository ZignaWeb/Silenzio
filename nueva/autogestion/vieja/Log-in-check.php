<?php $dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");

session_start();

$myusername=$_POST['usr']; 
$mypassword=$_POST['psw'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$result=mysql_query('SELECT * FROM `usuario` WHERE `nombre`="'.$myusername.'" AND `password`="'.$mypassword.'"');
$count=mysql_num_rows($result);

if($count==1){
$dat=mysql_fetch_assoc($result);
$permisos=$dat["status"];
session_register("myusername");
session_register("mypassword");
header("location:./");
}
else {
header("location:./?e=login");
}
?>
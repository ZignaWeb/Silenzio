<?php


$conn = mysql_connect("http://200.123.180.90","silenzio-vtas","sile123") or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db("silenzio-vtas",$conn));
  


if ($_SESSION["autentificado"] != "SI") {  
   	header("Location: index.php"); 
   	exit(); 
}	
?>
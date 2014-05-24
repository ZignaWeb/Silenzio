<?php
session_start(); 
$conn = mysql_connect("http://200.123.180.90","silenzio-vtas","sile123");  
mysql_select_db("silenzio-vtas",$conn); 
if ($_SESSION["autentificado"] != "SI") {  
   	header("Location: index.html"); 
   	exit(); 
}	
?>
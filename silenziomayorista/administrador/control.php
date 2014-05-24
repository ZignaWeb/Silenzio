<?php
if ($_POST["usuario"]=="silenzio" && $_POST["contrasena"]=="silenzio")

	{ 
   	
	session_start(); 
    $_SESSION["autentificado"]= "SI"; 
   	header ("Location: home.php");	}

else { 
   	
   	header("Location: error_ingreso.php"); 
	
	} 
?> 
<? 
if ($_POST["usuario"]=="mayorista" && $_POST["contrasena"]=="silenzio")

	{ 
   	
	session_start(); 
    $_SESSION["autentificado"]= "SI"; 
   	header ("Location: home.php");	}

else { 
   	
   	header("Location: error.html"); 
	
	} 
?> 
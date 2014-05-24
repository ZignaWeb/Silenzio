<?php 
$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");

session_start();
include ('funciones.php');
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Autogesti&oacute;n</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="main.css" rel="stylesheet" type="text/css" />

</head>

<body id="ag">
	<h1> <img src="../../r/i/logo.gif" /></h1>
	<? 
	$linkBack='<a class="goBack" href="./"><img src="imgs/Home-icon.png" height="15" width="15" /> Volver al inicio </a>';
    $getDo=str_replace("ñ","n",strip_tags($_GET["do"]));
    if(session_is_registered(myusername)){
     echo '<p class="bienvenido"><a href="Log-out.php"><img src="imgs/salir.png" height="15" width="15" align="salir"> Salir</a> - Bienvenido <strong>'.$_SESSION["myusername"].'</strong></p>';
    }
    ?>
	<div class="itemColImg">
	<?
	
    if(!session_is_registered(myusername)){
        if ($e=="login"){
            echo '<p style="color:red; font-weight:bold">Los datos ingresados no corresponden a un usuario con acceso al sistema. </p>';
        }
        include ('Log-in.php');
		
		
	// eliminar
    }elseif ($getDo=="eliminar" && $_GET["que"] && $_GET["id"]) {
        echo $linkBack;
        include ('eliminar_cmd.php');
	// actualizar form
    }elseif ($getDo=="actualizar" && $_GET["id"]!="" && $_GET["que"]!="") {
        echo $linkBack;
        include ($_GET["que"].'s_actualizar.php');
	// actualizar script
    }elseif ($getDo=="actualizar push" && $_GET["id"]!="" && $_GET["que"]!="") {
        echo $linkBack;
        include ($_GET["que"].'s_actualizar_cmd.php');
		
	
	// musica manage
    }elseif ($getDo=="musica") {
        echo $linkBack;
        include ('musica.php');
	// musica agregar form
    }elseif ($getDo=="agregar musica") {
        echo $linkBack;
        include ('musica_agregar.php');
	// musica agragar script
    }elseif ($getDo=="push musica") {
        echo $linkBack;
        include ('musica_agregar_cmd.php');
	// musica editar
    }elseif ($getDo=="editar musica") {
        echo $linkBack;
        include ('musica_editar.php');	
	// musica editar script
    }elseif ($getDo=="actualizar musica") {
        echo $linkBack;
        include ('musica_editar_cmd.php');
	
		
	// usuarios manage
    }elseif ($getDo=="usuario") {
        echo $linkBack;
        include ('usuarios.php');
	// usuario agregar form
    }elseif ($getDo=="agregar usuario") {
        echo $linkBack;
        include ('usuarios_agregar.php');
	// usuario agragar script
    }elseif ($getDo=="push usuario") {
        echo $linkBack;
        include ('usuarios_agregar_cmd.php');
	// editar usuario
	}elseif ($getDo=="editar usuario") {
        echo $linkBack;
        include ('usuarios_editar.php');	
	// actualizar usuario
	}elseif ($getDo=="actualizar usuario") {
        echo $linkBack;
        include ('usuarios_editar_cmd.php');	
		
	// locales manage
    }elseif ($getDo=="local") {
        echo $linkBack;
        include ('locales.php');
	// local agregar form
    }elseif ($getDo=="agregar local") {
        echo $linkBack;
        include ('locales_agregar.php');
	// local agragar script
    }elseif ($getDo=="push local") {
        echo $linkBack;
        include ('locales_agregar_cmd.php');
	// local editar form
    }elseif ($getDo=="editar local") {
        echo $linkBack;
        include ('locales_editar.php');
	// local editar script
    }elseif ($getDo=="actualizar local") {
        echo $linkBack;
        include ('locales_editar_cmd.php');
				
		
	// campañas manage
    }elseif ($getDo=="campania") {
        echo $linkBack;
        include ('campania.php');
	// campaa agregar form
    }elseif ($getDo=="agregar campania") {
        echo $linkBack;
        include ('campania_agregar.php');
	// campaña agragar script
    }elseif ($getDo=="push campania") {
        echo $linkBack;
        include ('campania_agregar_cmd.php');
	// campaña editar 
    }elseif ($getDo=="editar campania") {
        echo $linkBack;
        include ('campania_editar.php');
	// campaña editar script
    }elseif ($getDo=="actualizar campania") {
        echo $linkBack;
        include ('campania_editar_cmd.php');
				
		
	// prendas manage
    }elseif ($getDo=="prenda") {
        echo $linkBack;
        include ('prendas.php');
	// prenda agregar form
    }elseif ($getDo=="agregar prenda") {
        echo $linkBack;
        include ('prendas_agregar.php');
	// prenda agragar script
    }elseif ($getDo=="push prenda") {
        echo $linkBack;
        include ('prendas_agregar_cmd.php');
	// prenda ADITAR form
    }elseif ($getDo=="editar prenda") {
        echo $linkBack;
        include ('prendas_editar.php');
	// prenda editar script
    }elseif ($getDo=="actualizar prenda") {
        echo $linkBack;
        include ('prendas_editar_cmd.php');
		
		
	// lookbook manage
    }elseif ($getDo=="lookbook") {
        echo $linkBack;
        include ('lookbook.php');
	// lookbook agregar form
    }elseif ($getDo=="agregar lookbook") {
        echo $linkBack;
        include ('lookbook_agregar.php');
	// lookbook agragar script
    }elseif ($getDo=="push lookbook") {
        echo $linkBack;
        include ('lookbook_agregar_cmd.php');
	// lookbook editar form
    }elseif ($getDo=="editar lookbook") {
        echo $linkBack;
        include ('lookbook_editar.php');
	// lookbook editar script
    }elseif ($getDo=="actualizar lookbook") {
        echo $linkBack;
        include ('lookbook_editar_cmd.php');
		
	
	// promociones manage
    }elseif ($getDo=="promocion") {
        echo $linkBack;
        include ('promociones.php');
	// promociones agregar form
    }elseif ($getDo=="agregar promocion") {
        echo $linkBack;
        include ('promociones_agregar.php');
	// promociones agragar script
    }elseif ($getDo=="push promocion") {
        echo $linkBack;
        include ('promociones_agregar_cmd.php');
	// promociones editar form
    }elseif ($getDo=="editar promocion") {
        echo $linkBack;
        include ('promociones_editar.php');
	// promociones editar script
    }elseif ($getDo=="actualizar promocion") {
        echo $linkBack;
        include ('promociones_editar_cmd.php');
		
		
	// looks manage
    }elseif ($getDo=="look") {
        echo $linkBack;
        include ('looks.php');
	// looks agregar form
    }elseif ($getDo=="agregar look") {
        echo $linkBack;
        include ('looks_agregar.php');
	// looks agragar script
    }elseif ($getDo=="push look") {
        echo $linkBack;
        include ('looks_agregar_cmd.php');
	// looks editar form
    }elseif ($getDo=="editar look") {
        echo $linkBack;
        include ('looks_editar.php');
	// looks editar script
    }elseif ($getDo=="actualizar look") {
        echo $linkBack;
        include ('looks_editar_cmd.php');
		
		
	// favoritos manage
    }elseif ($getDo=="favoritos") {
        echo $linkBack;
        include ('favoritos.php');
	// favoritos agregar form
    }elseif ($getDo=="agregar favoritos") {
        echo $linkBack;
        include ('favoritos_agregar.php');
	// favoritos agragar script
    }elseif ($getDo=="push favoritos") {
        echo $linkBack;
        include ('favoritos_agregar_cmd.php');
	// favoritos editar form
    }elseif ($getDo=="editar favoritos") {
        echo $linkBack;
        include ('favoritos_editar.php');
	// favoritos editar script
    }elseif ($getDo=="actualizar favoritos") {
        echo $linkBack;
        include ('favoritos_editar_cmd.php');
				
		
	// botonera
    }else{
        include ('botonera.php');
    }
    ?>
    </div>
</body>
</html>
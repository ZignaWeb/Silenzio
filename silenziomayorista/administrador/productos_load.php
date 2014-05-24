<? include ("seguridad.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SILENZIO - AUTOGESTION</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jscolor/jscolor.js"></script>
<script type="text/javascript" src="enlistar.js"></script>
</head>

<body>

<div id="central">
	
    <div id="izquierdo">
    
    	<div id="menu">
        
        	 <? include('menu.php'); ?>
        
        </div>
    
    </div>
    <div id="derecho">
    	
        <a href="salir.php" style="text-decoration:none;float:right;"><p class="texto2">Cerrar sesion</p></a><br />
        <br />
        <form  style="text-align:left;" action="enlistar.php" method="post" enctype="multipart/form-data">
        <p class="texto1">ENLISTAR PRODUCTOS<br />
        Selecciona la categoria del producto
        </p>
        <select name="country" style="margin-left:25px;margin-bottom:3px;" id="country" ></select>
        <select name="city" style="margin-left:25px;margin-bottom:3px;" id="city"></select><br />
		<p class="texto1"><input name="grabar" type="submit" class="entrar_no" value="Enlistar" /></p>


        </form>
        
  </div>

</div>
</body>
</html>
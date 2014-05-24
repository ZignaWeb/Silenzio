<? include ("seguridad.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SILENZIO - AUTOGESTION</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jscolor/jscolor.js"></script>
<script type="text/javascript" src="catandsubcat.js"></script>
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
        <form  style="text-align:left;" action="test.php" method="post" enctype="multipart/form-data">
        <p class="texto1">AGREGAR PRODUCTO<br />
        Selecciona la categoria del productor
        </p>
        <select name="country" style="margin-left:25px;margin-bottom:3px;" id="country" ></select>
        <select name="city" style="margin-left:25px;margin-bottom:3px;" id="city"></select><br />
        <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="text" name="nombre" value="Nombre" />
        <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="text" name="cod" value="Codigo de Articulo" /><br />
        <input  style="margin-left:20px;margin-bottom:3px;width:160px;"type="text" name="material" value="Material de confeccion" />
        <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="text" name="talles" value="xs / s / m / l" /><br />
        

	<p style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:0.8em;color:#666;margin-left:20px;margin-right:5px;margin-bottom:">
    
    Color 01 <input name="color1" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;"  class="color" value="ffffff" />
    Color 02 <input name="color2" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" />
    Color 03 <input name="color3" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" /><br />
    Color 04 <input name="color4" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" />
    Color 05 <input name="color5" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" />
    Color 06 <input name="color6" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" /><br />
    Color 07 <input name="color7" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" />
    Color 08 <input name="color8" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" />
    Color 09 <input name="color9" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" /><br />
    Color 10 <input name="color10" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="ffffff" /></p>
        
         <p class="texto1">Seleccionar Imagen (500px X 500px)<br />
			<input name="userfile" type="file" class="entrar_no" onChange="muestra();" size="16" style="float: left" /><br />
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000" /><br />
			<input name="grabar" type="submit" class="entrar_no" value="Agregar" />
			<input type="reset" value="Cancelar" /></p>

        </form>
        
  </div>

</div>
</body>
</html>
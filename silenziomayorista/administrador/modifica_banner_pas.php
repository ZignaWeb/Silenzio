<? include ("seguridad.php");?>
<?php
$id=$_REQUEST['cate_ban'];
$ssql = "SELECT * FROM banners WHERE id=$id"; 
$resultid = mysql_query($ssql,$conn); 


?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SILENZIO - AUTOGESTION</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
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
        <?    while ($row=mysql_fetch_object($resultid))
    { ?>
      <form style="text-align:left;" method="post" action="modificar_banners.php" enctype="multipart/form-data">
        <p class="texto1">PASO 2<br />
        Modifica el título, la descripción o la imagen</p>
        <input name="titulo" style="margin-left:20px;margin-bottom:5px;" type="text" value="<? echo strip_tags($row->titulo) ?>"  /><br />
        <textarea name="texto" style="margin-left:20px;" name="texto" cols="30" rows="4"><? echo strip_tags($row->texto) ?></textarea><br />  
        <div style="margin-left:20px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:0.7em;margin-bottom:5px;">Imagen<br /><img src="banners/<? echo strip_tags($row->imagen) ?>" width="260" height="89" /></div>
        <input name="userfile" type="file" class="entrar_no" onChange="muestra();" size="16" style="margin-left:20px;float:left;" /><br />
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000"><br />
		<input style="margin-left:20px;" name="grabar" type="submit" class="entrar_no" value="Modificar">
		<input type="reset" value="Cancelar">
        
        
        <input name="tituloviejo" style="margin-left:20px;margin-bottom:5px;" type="hidden" value="<? echo strip_tags($row->titulo) ?>"  /><br />
        <input name="nomas" style="margin-left:20px;margin-bottom:5px;" type="hidden" value="<? echo strip_tags($row->imagen) ?>"  /><br />
        <textarea name="textoviejo" style="margin-left:20px;visibility:hidden;" name="texto_viejo" cols="30" rows="4"><? echo strip_tags($row->texto) ?></textarea><br />
        </form>
        <? 
	}
	
	?>
  </div>

</div>
</body>
</html>
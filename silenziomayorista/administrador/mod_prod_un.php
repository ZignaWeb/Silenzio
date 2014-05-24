<? include ("seguridad.php");?>
<?php
$id=$_REQUEST['mod'];

$ssql = "SELECT * FROM silenzio WHERE id=$id"; 
$resultid = mysql_query($ssql,$conn); 


?> 

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
        <?    while ($row=mysql_fetch_object($resultid))
    { ?>
        <form  style="text-align:left;" action="mod_prod_dos.php" method="post" enctype="multipart/form-data">
        <p class="texto1">AGREGAR PRODUCTO (Paso 1)<br />
        Modifica primero las caracteristicas y luego en Paso 2 la imagen, si lo deseas. 
        </p>
        <p class="texto1"><? echo strip_tags($row->categoria) ?> / <? echo strip_tags($row->subcategoria) ?></p>
        <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="text" name="nombre" value="<? echo strip_tags($row->nombre_sil) ?>" />
        <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="text" name="cod" value="<? echo strip_tags($row->articulo) ?>" /><br />
        <input  style="margin-left:20px;margin-bottom:3px;width:160px;"type="text" name="material" value="<? echo strip_tags($row->material) ?>" />
        <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="text" name="talles" value="<? echo strip_tags($row->talle) ?>" /><br />
        

	<p style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:0.8em;color:#666;margin-left:20px;margin-right:5px;margin-bottom:">
    
    Color 01 <input name="color1" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;"  class="color" value="<? echo strip_tags($row->coloruno) ?>" />
    Color 02 <input name="color2" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colordos) ?>" />
    Color 03 <input name="color3" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colortres) ?>" /><br />
    Color 04 <input name="color4" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorcuatro) ?>" />
    Color 05 <input name="color5" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorcinco) ?>" />
    Color 06 <input name="color6" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorseis) ?>" /><br />
    Color 07 <input name="color7" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorsiete) ?>" />
    Color 08 <input name="color8" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorocho) ?>" />
    Color 09 <input name="color9" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colornueve) ?>" /><br />
    Color 10 <input name="color10" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colordiez) ?>" />
    <input name="integro" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" value="<? echo strip_tags($row->id) ?>" />

			<input name="grabar" type="submit" class="entrar_no" value="Al Paso 2" />
			<input type="reset" value="Cancelar" /></p>
            
     <!-- Cosas ocultas -->        
     
     <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="hidden" name="nombre_oc" value="<? echo strip_tags($row->nombre_sil) ?>" />
     <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="hidden" name="cod_oc" value="<? echo strip_tags($row->articulo) ?>" /><br />
     <input  style="margin-left:20px;margin-bottom:3px;width:160px;"type="hidden" name="material_oc" value="<? echo strip_tags($row->material) ?>" />
     <input style="margin-left:20px;margin-bottom:3px;width:160px;" type="hidden" name="talles_oc" value="<? echo strip_tags($row->talle) ?>" /><br />
     <input name="color1_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;"  class="color" value="<? echo strip_tags($row->coloruno) ?>" />
     <input name="color2_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colordos) ?>" />
     <input name="color3_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colortres) ?>" />
     <input name="color4_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorcuatro) ?>" />
     <input name="color5_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorcinco) ?>" />
     <input name="color6_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorseis) ?>" />
     <input name="color7_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorsiete) ?>" />
     <input name="color8_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colorocho) ?>" />
     <input name="color9_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colornueve) ?>" />
     <input name="color10_oc" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo strip_tags($row->colordiez) ?>" />

        </form>
         <? 
	}
	
	?>
  </div>

</div>
</body>
</html>
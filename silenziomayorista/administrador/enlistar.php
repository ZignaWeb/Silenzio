<? include ("seguridad.php");?>
<?php
$subcate = $_REQUEST['city'];
if  ($subcate =='Todos')
	 
	 {
	 $ssql = "SELECT * FROM silenzio WHERE categoria='$_REQUEST[country]'
		 ORDER BY id"; 
     $resultid = mysql_query($ssql,$conn); 
	 }
	 
	 else
	 {
		 $ssql = "SELECT * FROM silenzio WHERE categoria='$_REQUEST[country]' AND subcategoria='$subcate'
		 		ORDER BY id";
		 $resultid = mysql_query($ssql,$conn);
	 }

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SILENZIO - AUTOGESTION</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="central_ext">
	
    <div id="izquierdo">
    
    	<div id="menu">
        
        	 <? include('menu.php'); ?>
        
        </div>
    
    </div>
    <div id="derecho_ext">
    	
        <a href="salir.php" style="text-decoration:none;float:right;"><p class="texto2">Cerrar sesion</p></a><br />
        <br />
        <br />
        <ul style="list-style:none; text-align:left;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#666; font-size:0.6em;">
               <? 
		
		$num_filas = 0;
		while ($row=mysql_fetch_object($resultid))
  {
	  
	  ?>
      
      <li style="font-weight:bold;font-size:1.3em;background-color:#F5F5F5;"><? echo strip_tags($row->nombre_sil) ?> Art. <? echo strip_tags($row->articulo) ?></li><br />
      <li>CODIGO DE GESTION <strong><? echo strip_tags($row->id) ?></strong> </li><br />
      <li><img src="productos/<? echo strip_tags($row->imagen_sil) ?>" width="50" height="50" /></li><br />
      
      <?
	  
	  $num_filas++;
  }
  ?>
        </ul>
  </div>

</div>
</body>
</html>
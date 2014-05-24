<? include ("seguridad.php");?>

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
        <form  style="text-align:left;" action="delete.php" method="post" enctype="multipart/form-data">
        <p class="texto1">ELIMINAR PRODUCTOS<br />
        Escriba el <strong>CODIGO DE GESTION</strong> del producto, para procesar la eliminacion.
        </p>
        <p class="texto1"><input type="text" name="delete" value="" /><br /><br />
		<input name="grabar" type="submit" class="entrar_no" value="Eliminar" /><br /><br />
        Si Desconoces el CODIGO DE GESTION de tu producto, ve a <a href="productos_load.php">PRODUCTOS CARGADOS</a> para encontrarlo.
        </p>
        


        </form>
        
  </div>

</div>
</body>
</html>
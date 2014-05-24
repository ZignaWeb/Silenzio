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
        <br />
        <br />
        <br />
        <form method="post" action="modifica_banner_pas.php">
        <p class="texto1">PASO 1<br />
        Selecciona la categoria del banner a modificar
        </p>
        <select style="text-align:left;margin-left:20px;" name="cate_ban">
          <option value="1">Tejidos</option>
          <option value="2">Tapados y Abrigos</option>
          <option value="3">Blazer</option>
          <option value="4">Pantalones</option>
          <option value="5">Jeans</option>
          <option value="6">Camisas y Blusas</option>
          <option value="7">Remeras</option>
          <option value="8">Accesorios</option>
        </select>
         <input style="margin-left:10px;" type="submit" value="Siguiente" />
        </form>
        
  </div>

</div>
</body>
</html>
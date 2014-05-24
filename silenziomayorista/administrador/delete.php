<? include ("seguridad.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php

$registros=mysql_query("select id from silenzio
                       where id='$_REQUEST[delete]'",$conn) or
  die("Problemas en el select:".mysql_error());
if ($reg=mysql_fetch_array($registros))
{
  mysql_query("delete from silenzio where id='$_REQUEST[delete]'",$conn) or
    die("Problemas en el select:".mysql_error());
  echo '
       <div id="central">
	
    <div id="izquierdo">
   
    
    </div>
    <div id="derecho">
    	
        <br />
        <br />
        <br />
        <a href="delete_prod.php" style="text-decoration:none;"><p class="texto2">Producto eliminado exitosamente - Click para volver</p></a>
        
  </div>

</div>';
}
else
{
  echo '<div id="central">
	
    <div id="izquierdo">
   
    
    </div>
    <div id="derecho">
    	
        <br />
        <br />
        <br />
        <a href="delete_prod.php" style="text-decoration:none;"><p class="texto2">No existe producto con ese codigo - Click para volver</p></a>
        
  </div>

</div>';
}
mysql_close($conn);
?>
</body>
</html>
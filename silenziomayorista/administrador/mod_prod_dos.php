<? include ("seguridad.php");?>
<?

$registros=mysql_query("UPDATE silenzio
                         SET nombre_sil='$_REQUEST[nombre]', articulo='$_REQUEST[cod]', material='$_REQUEST[material]', talle='$_REQUEST[talles]', coloruno='$_REQUEST[color1]', colordos='$_REQUEST[color2]', colortres='$_REQUEST[color3]', colorcuatro='$_REQUEST[color4]', colorcinco='$_REQUEST[color5]', colorseis='$_REQUEST[color6]', colorsiete='$_REQUEST[color7]', colorocho='$_REQUEST[color8]', colornueve='$_REQUEST[color9]', colordiez='$_REQUEST[color10]'
                         WHERE id='$_REQUEST[integro]'",$conn) or
  die("Problemas en el select:".mysql_error());
 echo '<div id="central">
	
    <div id="izquierdo">
   
    
    </div>
    <div id="derecho">
    	
        <br />
        <br />
        <br />
        <p class="texto2">Actualizando Informacion</p></a>
        
  </div>

</div>';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

    
    var segundos = 0;
	setTimeout("document.getElementsByName('forma_nueva')[0].submit()", segundos); 

</script>
</head>
<body>
<form name="forma_nueva" action="mod_prod_tres.php">
<input name="none" type="hidden" style="width:50px;border:1px solid #999;margin-right:10px;margin-bottom:10px;" class="color" value="<? echo ($_REQUEST['integro']); ?>" />
</form>
</body>
</html>
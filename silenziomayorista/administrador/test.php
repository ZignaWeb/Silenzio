<?

include("seguridad.php");
$nombre_archivo = $_FILES["userfile"]["name"];
$tipo_archivo = $_FILES["userfile"]["type"]; 
$tamano_archivo = $_FILES["userfile"]["size"];

if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && (    $tamano_archivo < 2000000))) 

{  
    echo ' <div id="central">
	
    <div id="izquierdo">
   
    
    </div>
    <div id="derecho">
    	
        <br />
        <br />
        <br />
        <a href="agrega_prod.php" style="text-decoration:none;"><p class="texto2">Los parametros de la imagen, no son los permitidos. Revise el peso y/o la extension. - Click aqui para volver</p></a>
        
  </div>

</div>';   
  
}
  
  
  else 
  
  {
	  
	$nom_img= $nombre_archivo; 
     
    $directorio = 'productos/'; 

    if (move_uploaded_file($_FILES['userfile']['tmp_name'],$directorio . "/" . $nom_img)) 
    	
		{
			
			
			mysql_query("insert into silenzio(categoria,subcategoria,nombre_sil,articulo,material,talle,coloruno,colordos,colortres,colorcuatro,colorcinco,colorseis,colorsiete,colorocho,colornueve,colordiez,imagen_sil) values 
   ('$_REQUEST[country]','$_REQUEST[city]','$_REQUEST[nombre]','$_REQUEST[cod]','$_REQUEST[material]','$_REQUEST[talles]','$_REQUEST[color1]','$_REQUEST[color2]','$_REQUEST[color3]','$_REQUEST[color4]','$_REQUEST[color5]','$_REQUEST[color6]','$_REQUEST[color7]','$_REQUEST[color8]','$_REQUEST[color9]','$_REQUEST[color10]','$nom_img')", 
   $conn) or die("Problemas en el select".mysql_error());
		mysql_close($conn);
		echo '<div id="central">
	
    <div id="izquierdo">
   
    
    </div>
    <div id="derecho">
    	
        <br />
        <br />
        <br />
        <a href="agrega_prod.php" style="text-decoration:none;"><p class="texto2">PRODUCTO CARGADO CON EXITO - CLICK AQUI PARA VOLVER</p></a>
        
  </div>

</div>';
		
		}
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listo</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
</body>
</html>
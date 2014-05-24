<?php  
include("seguridad.php");
$titulo = trim($_POST['titulo']);
$texto = trim($_POST['texto']);
$nombre_archivo = $_FILES["userfile"]["name"];
$tipo_archivo = $_FILES["userfile"]["type"]; 
$tamano_archivo = $_FILES["userfile"]["size"];

if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && (    $tamano_archivo < 2000000))) 
{  
    echo '<div id="central">
	
    <div id="izquierdo">
   
    
    </div>
    <div id="derecho">
    	
        <br />
        <br />
        <br />
        <a href="modifica_banner.php" style="text-decoration:none;"><p class="texto2">Los parametros de la imagen, no son los permitidos. Revise el peso y/o la extension. - Click aqui para volver</p></a>
        
  </div>

</div>';   
?> 
    <script language="javascript"> 
        setTimeout("url()",5000); 
        function url() 
        { 
        window.history.back(); 
        } 
    </script>            
<?     
} 
else 
{  
    $nom_img= $nombre_archivo; 
     
    $directorio = 'banners/'; 

    if (move_uploaded_file($_FILES['userfile']['tmp_name'],$directorio . "/" . $nom_img)) 
    {  
            $diaactual= date("d");  
        $mesactual= date("m");  
        $anoactual= date("Y"); 
        $fecha= $diaactual . "/" . $mesactual . "/" . $anoactual; 
         


$registros=mysql_query("UPDATE banners
                         SET titulo='".$_REQUEST['titulo']."', texto='".$_REQUEST['texto']."', imagen='$nom_img' 
                         WHERE titulo='".$_REQUEST['tituloviejo']."'",$conn) or
  die("Problemas en el select:".mysql_error());
 echo '<div id="central">
	
    <div id="izquierdo">
   
    
    </div>
    <div id="derecho">
    	
        <br />
        <br />
        <br />
        <a href="modifica_banner.php" style="text-decoration:none;"><p class="texto2">Banner modificado con éxito - Click aqui para volver</p></a>
        
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
        <a href="modifica_banner.php" style="text-decoration:none;"><p class="texto2">Error al subir la imagen - Click aqui para volver</p></a>
        
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

<?  
/*****Creado por: hheroedeleyenda@hotmail.com*****/  
/* ginitofl */  
/* Gino Flores Lopez  */  

$server="localhost";              /* Nuestro server mysql:  */  
$database="newton_silenzio";               /* Nuestra base de datos */  
$dbpass="silenzio123";               /*Nuestro password */  
$dbuser="newton_silenzio";                 /* Nuestro user  */ 


//datos del arhivo  
$mensaje = trim($_POST['titulo']);
$titulo = trim($_POST['texto']);
$nombre_archivo = $HTTP_POST_FILES["userfile"]["name"];
$tipo_archivo = $HTTP_POST_FILES["userfile"]["type"]; 
$tamano_archivo = $HTTP_POST_FILES["userfile"]["size"];

//compruebo si las características del archivo son las que deseo  

if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && (    $tamano_archivo < 200000))) 
{  
    echo '<div id="cental">
<h1> La extensión o el tamaño de los archivos no es correcta.<br />Se permiten archivos .gif o .jpg<br />se permiten archivos de 200 Kb máximo.</h1><br />
<a class="menu_medio" href="admin.php">Volver al menu principal</a>
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

    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'],$directorio . "/" . $nom_img)) 
    {  
            $diaactual= date("d");  
        $mesactual= date("m");  
        $anoactual= date("Y"); 
        $fecha= $diaactual . "/" . $mesactual . "/" . $anoactual; 
         
        //NOS CONECTAMOS A LA BASE DE DATOS 

        $link=mysql_connect($server,$dbuser,$dbpass); 
                         
        $query="INSERT INTO banners (titulo,texto,imagen) VALUES ('$mensaje','$titulo','$nom_img')";  

        $result=mysql_db_query($database,$query,$link); 
         
        if(mysql_affected_rows($link)) 
        {  
            echo '<div id="cental">
<h1> Oferta Publicada Correctamente</h1><br />
<a class="menu_medio" href="admin.php">Volver al menu principal</a>
</div>';  
             
        } else  
        {  
           echo '<div id="cental">
<h1> Error introduciendo oferta</h1><br />
<a class="menu_medio" href="admin.php">Volver al menu principal</a>
</div>';   
        } /* Cierre del else */  




    } 
    else 
    { 
        echo '<div id="cental">
<h1> Error al subir la foto</h1><br />
<a class="menu_medio" href="admin.php">Volver al menu principal</a>
</div>';  
    } 
} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Oferta Publicada</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
</body>
</html>
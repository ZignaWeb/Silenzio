<? include ("seguridad.php");?>
<?  
/*****Creado por: hheroedeleyenda@hotmail.com*****/  
/* ginitofl */  
/* Gino Flores Lopez  */  

$server="localhost";              /* Nuestro server mysql:  */  
$database="newton_silenzio";               /* Nuestra base de datos */  
$dbpass="silenzio123";               /*Nuestro password */  
$dbuser="newton_silenzio";                 /* Nuestro user  */ 


//datos del arhivo  
$categoria = trim($_POST['country']);
$subcategoria = trim($_POST['city']);
$nombre = trim($_POST['nombre']);
$codigo = trim($_POST['codigo']);
$material = trim($_POST['material']);
$talles = trim($_POST['talles']);
$color1 = trim($_POST['color1']);
$color2 = trim($_POST['color2']);
$color3 = trim($_POST['color3']);
$color4 = trim($_POST['color4']);
$color5 = trim($_POST['color5']);
$color6 = trim($_POST['color6']);
$color7 = trim($_POST['color7']);
$color8 = trim($_POST['color8']);
$color9 = trim($_POST['color9']);
$color10 = trim($_POST['color10']);
$nombre_archivo = $HTTP_POST_FILES["userfile"]["name"];
$tipo_archivo = $HTTP_POST_FILES["userfile"]["type"]; 
$tamano_archivo = $HTTP_POST_FILES["userfile"]["size"];

//compruebo si las características del archivo son las que deseo  

if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && (    $tamano_archivo < 100000))) 
{  
    echo '<div id="cental">
<h1> La extensión o el tamaño de los archivos no es correcta.<br />Se permiten archivos .gif o .jpg<br />se permiten archivos de 100 Kb máximo.</h1><br />
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
     
    $directorio = 'productos/'; 

    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'],$directorio . "/" . $nom_img)) 
    {  
   
         
       //NOS CONECTAMOS A LA BASE DE DATOS 

        $link=mysql_connect($server,$dbuser,$dbpass); 
                         
        $query="INSERT INTO silenzio (categoria,subcategoria,nombre,articulo,material,talle,color1,color2,color3,color4,color5,color6,color7,color8,color9,color10,imagen) VALUES ('$categoria','$subcategoria','$codigo','$material','$talles','$color1','$color2','$color3','$color4','$color5','$color6','$color7','$color8','$color9','$color10','$nom_img')"; 

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
<? include ("seg.php");?>
<?php

$id=$_REQUEST['valor'];
 
$ssql = "SELECT * FROM banners WHERE id=$id "; 
$ssql_b = "SELECT * FROM silenzio WHERE categoria='$_REQUEST[see]' AND subcategoria='$_REQUEST[subca]' ORDER BY id DESC "; 
$resultid = mysql_query($ssql,$conn); 
$resultid_b = mysql_query($ssql_b,$conn); 


?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>S I L E N Z I O </title>
 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"> </script>
<script type="text/javascript" src="javascript.js"> </script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#accordion").accordion();
	
  });
	
  </script>


<style type="text/css">

body { margin:0px; padding:0px; text-align:left; }

#center { margin-left:20px; }
 #izquierdo { height:100%;
			width:200px;
			bottom:0%;
			background-color:#000;
			position:absolute;
			top:20px;
			background-image:url(images/fondo_nogris.jpg);
			background-repeat:no-repeat;
			left:20px;
			}

#wrapper {
	width: 200px;
	margin-left: auto;
	margin-right: auto;
	margin-top:130px;
	}

.accordionButton {	
	width: 200px;
	float: left;
	cursor: pointer;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	color:#FFF;
	font-size:0.6em;
	letter-spacing:2px;
	text-align:left;
	padding-bottom:8px;
	padding-top:5px;
	margin-left:30px;
	}
	
.accordionContent {	
	width: 200px;
	float: left;
	background: #333333;
	display: none;
	padding-top:0px;
	padding-bottom:0px;
	}
ul.line_ul { border-left:1px solid #606060;
text-align:left;
margin-left:30px; padding-left:20px;
list-style:none;
}

li.lista { font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
font-size:0.65em;
color:#909090;
letter-spacing:2px;
padding-bottom:5px;
padding-top:3px;
letter-spacing:1px;
cursor:pointer;
}

li.lista:hover { color:#FFF; }
#derecho { width:760px; height:auto; float:left; margin-left:220px; margin-top:20px; }

.banner_derecho { width:760px; height:260px; border-bottom:10px solid #CCC; }
	
	.caja_negra { background-color:#000; width:250px; height:260px; float:right; top:-260px; position:relative; filter:alpha(opacity=70); -moz-opacity:0.7; -khtml-opacity: 0.7; opacity: 0.7;
 }
 
 h1.titulo { color:#FFF; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:1.4em; font-weight:300; margin-left:30px; margin-top:50px; }
 p.caja {
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:small;
	color:#FFF;
	margin-left:30px;
	width:190px;
	font-style:normal;
}
 
 #seccion_tit { width:760px; height:60px; }
 .seccion_tit { font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:1.3em; color:#666; margin-top:40px; }
 
 .productos { width:760px; float:left; margin:0px; padding:0px; position:relative; top:-150px; /top:30px; }
	
	ul.ul_producto { list-style:none; margin:0px; padding:0px; width:760px; float:left; }
	li.li_producto { display:inline; margin-right:19px; float:left;cursor:pointer;}
	
	p.art_1 { font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#666; font-size:0.8em; }
	
	</style>
	
    
</head>

<body>
<div id="center">
<div id="izquierdo">

		<? include('menu.php'); ?>    
        
</div> <!-- Cierra Izquierdo  -->               

	<div id="derecho">
    	   	
        <?    while ($row=mysql_fetch_object($resultid))
    { ?>
 
        <div class="banner_derecho">
        <img src="administrador/banners/<? echo strip_tags($row->imagen) ?>" width="760" height="260" />
        <div class="caja_negra">

        	<h1 class="titulo"><? echo strip_tags($row->titulo) ?></h1>
            <p class="caja"><? echo strip_tags($row->texto) ?></p>
        </div>
        </div>
        <div id="seccion_tit">
        
        <p class="seccion_tit"><? echo strip_tags($row->titulo) ?> / <? echo ($_REQUEST['subca']); ?></p>
         
		 <? 
  }
  ?>
        </div>
        
        <div class="productos">
        
        
        	<ul class="ul_producto">
            
             <?    
			 $num_filas = 0; 
			 while ($row_b=mysql_fetch_object($resultid_b))
    { ?>
        		
            	<li class="li_producto" onclick="parent.location='ampliada.php?amp=<? echo strip_tags($row_b->id) ?>'">
            		<div style="width:233px;"><img src="administrador/productos/<? echo strip_tags($row_b->imagen_sil) ?>" width="233" height="233" /></div>
                    <div style="width:233px; height:60px;"><p class="art_1"><? echo strip_tags($row_b->nombre_sil) ?><br />Art.<? echo strip_tags($row_b->articulo) ?></p></div>
            	</li>
                
                  <?
				    $num_filas++; 
  }
  ?>
                
                
            	
        </ul>
        
        
        
        
        </div>
    
    </div>
</div> <!--Cierra center -->


</body>

</body>
</html>
<? include ("seg.php");?><?php
 
$ssql_b = "SELECT * FROM silenzio WHERE id='".$_REQUEST['amp']."' "; 
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

#ampliada { width:758px; height:520px; background-color:#FFF; margin:auto; border:1px solid #DDD;}
		
		.img_ampliada { width:500px; height:500px; float:left; margin-top:10px; margin-left:10px;}
		
		.info_ampliada { width:220px; height:500px; float:left; margin-left:10px; margin-top:10px; background-color:#FFF; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#666; font-size:0.8em; text-align:left; }
		
		#close_amp { margin-right:10px; text-transform:uppercase; text-align:right; font-size:0.7em; letter-spacing:3px; }
		#nom_amp { margin-left:20px; margin-top:60px;}
		#art_amp { margin-left:20px; margin-top:20px;}
		#talle_amp { margin-left:20px; margin-top:0px; line-height:24px;}
		#color_amp { margin-left:20px; margin-top:20px;}
		#material_amp { margin-left:20px; line-height:24px; }
		
		#colores_amp_diag { width:85px; height:55px;}
		
	
	</style>
	
    
</head>

<body>
<div id="center">
<div id="izquierdo">

	<? include('menu.php'); ?> 
</div> <!-- Cierra Izquierdo  -->               

	<div id="derecho">
     <?    
			 while ($row_b=mysql_fetch_object($resultid_b))
    { ?>
    	
    <div id="ampliada">

	<div class="img_ampliada">
    <img src="administrador/productos/<? echo strip_tags($row_b->imagen_sil) ?>" width="500" height="500" />
    </div>
    
    <div class="info_ampliada">
    		
            <div id="close_amp">
            <p style="cursor:pointer;" onclick="javascript:history.back(1)"><strong>VOLVER</strong></p>
            </div>
    		<div id="nom_amp">
            <p><strong><? echo strip_tags($row_b->nombre_sil) ?></strong></p>
            </div>
            <div id="art_amp">
            <p><strong>Art.</strong> <? echo strip_tags($row_b->articulo) ?></p>
            </div>
            <div id="material_amp">
            <p><strong>Material: </strong><br /><? echo strip_tags($row_b->material) ?></p>
            </div>
            <div id="talle_amp">
            <p><strong>Talles:</strong><br /><? echo strip_tags($row_b->talle) ?></p>
            </div>
          
              <div id="color_amp">
            <p><strong>Color:</strong></p>
            
            	<!-- Cuadros de color por Style  -->
                
                <div id="colores_amp_diag">
                
                	<?php 
					$ya=0;
					if(strip_tags($row_b->coloruno)=="FFFFFF"){$ya=1; }?><div style="background-color:#<? echo strip_tags($row_b->coloruno) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div>
                    
					<?php if((trim(strip_tags($row_b->colordos)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colordos)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colordos) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                    
					<?php if((trim(strip_tags($row_b->colortres)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colortres)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colortres) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                   
                    <?php if((trim(strip_tags($row_b->colorcuatro)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colorcuatro)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colorcuatro) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                    
					<?php if((trim(strip_tags($row_b->colorcinco)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colorcinco)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colorcinco) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                   
                    <?php if((trim(strip_tags($row_b->colorseis)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colorseis)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colorseis) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                   
                    <?php if((trim(strip_tags($row_b->colorsiete)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colorsiete)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colorsiete) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                   
                    <?php if((trim(strip_tags($row_b->colorocho)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colorocho)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colorocho) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                   
                    <?php if((trim(strip_tags($row_b->colornueve)))!="FFFFFF" and $ya==0){
					 if(strip_tags($row_b->colornueve)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colornueve) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }
					
					?>
                   
                    <?php if((trim(strip_tags($row_b->colordiez)))!="FFFFFF" and $ya!=0){
					 if(strip_tags($row_b->colordiez)=="FFFFFF"){$ya=1; }
					 
					 ?><div style="background-color:#<? echo strip_tags($row_b->colordiez) ?>;border:solid ; border-color:#CCCCCC; border-style:solid; border-width:1px;width:22px;height:22px;float:left;margin-right:4px;margin-bottom:4px;"></div><?php }?>
                
                </div>
            	
                <!-- Cierra Cuadros de color por Style  -->
            
            
            </div>
            
            
            
            
          </div>
            
            
            
      </div>
           <? 
  }
  ?>
    
    </div>
</div> <!--Cierra center -->


</body>

</body>
</html>
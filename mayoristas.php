<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>

</head>

<body id="lookbook" class="mayoristas">
  
<div id="mainBox" class="table">
	<div class="row">
    	<div id="header" class="cell">
        	<div class="table">
            	<div class="row">
                	<? include ("r/html/header.php")?>
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
    	<div id="content" class="cell" >
        	<?
			$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");
			
			$cq=mysql_query("SELECT categoria.nombre, categoria.categoriaid FROM `categoria`,`prenda` WHERE categoria.categoriaid=prenda.categoria GROUP BY categoria ORDER BY categoria.nombre ASC");

$cn=mysql_num_rows($cq);
			$j=0;
			while($cd[$j]=mysql_fetch_assoc($cq)){$j++;}
			unset($cd[$j]);
			
			if ($_GET["c"]!="" && $_GET["c"]!=0){
				$c=strip_tags($_GET["c"]);
			}else{
				
				$c=$cd[0]['categoriaid'];
				
			}
			$pq=mysql_query("SELECT * FROM `prenda` WHERE `categoria`='$c'");
			$j=0;
			while($pd[$j]=mysql_fetch_assoc($pq)){$j++;}
			unset($pd[$j]);
			
			?>
       <ol id="MS_nav">
                    <?
					 foreach ($cd as $valor ){ 
					 	if ($c==$valor['categoriaid']){
							
							$style= 'font-family:italic';		
						}else{
							$style=NULL;		
						}
						echo '<li style="'.$style.'" id="men'.str_replace(" ","_",$valor["nombre"]).'"><a href="mayoristas.php?c='.$valor['categoriaid'].'">'.($valor['nombre']).'</a></li>';
						
					}
										
					?>
                </ol>
        	
            
            
            <div class="descripcion">
            	<div>
                    <h2><?=$pd[0]["nombre"]?></h2>
                    <p><?=$pd[0]["talle"]?></p>
                    <p><?=$pd[0]["color"]?></p>
                </div>
            </div>

        	<!--<div class="largePic" style="background:url('r/i/imgPre/PROXIMAMENTE.png') #ccc; background-position:center; background-size:cover;"></div>-->
            
            <div class="largePic">
            	<img class="MS_big_box" src="http://silenzio.com.ar/nueva/include/img/content/box/<?=$pd[0]["img"].'" alt="'.$pd[0]["nombre"].'"  title="'.$pd[0]["nombre"]?>"/><div class="MS_big_float_cont">
                <? 
				if ($pd[0]["img2"]!=""){
					echo '<img class="MS_big_float" src="http://silenzio.com.ar/nueva/include/img/content/box/'.$pd[0]["img2"].'" alt="'.$pd[0]["nombre"].'"  title="'.$pd[0]["nombre"].'"/>';
				}
				?>
                </div>
			</div>
            <ol class="smallPic">
            	<?
				$r=0;
				foreach($pd as $d){

					echo '<li class="litaItem">';
					
					if ($d["new"] == 1 ) {
						echo '<div class="MS_new">NEW!</div>';
					}
					if ($d["agotado"] == 1 ) {
						echo '<div class="MS_ago">agotado!</div>';
					}
					if ($d["img2"] != "" ) {
						echo '<img class="MS_img2" src="http://silenzio.com.ar/nueva/include/img/content/box/'.$d["img2"].'" alt="'.$d["talle"].' - '.$d["color"].'"  title="'.$d["nombre"].'" />';
					}
					echo '<img class="MS_img1" src="http://silenzio.com.ar/nueva/include/img/content/box/'.$d["img"].'" alt="'.$d["talle"].' - '.$d["color"].'"  title="'.$d["nombre"].'" />';
					echo '</li>'; 
					$r++;					
				}
				?>
            </ol>
        </div>
    </div>
</div>
<a id="afip" class="left cell" href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
<script type="text/javascript">
$(document).ready(function(){
	$(".smallPic li img").click(function(){
		var img1=$(this).attr("src"),
			tit=$(this).attr("title"),
			des=$(this).attr("alt");
			
		if ($(this).hasClass("MS_img2")){
			var img2=$(this).siblings(".MS_img1").attr("src");
			$(".largePic .MS_big_float_cont").html('<img class="MS_big_float" src="'+img1+'" alt="'+des+'"  title="'+tit+'"/>');
			$(".largePic img.MS_big_box").attr("src",img2);
		}else{
			$(".largePic img.MS_big_box").attr("src",img1);
			$(".largePic .MS_big_float_cont").html("");
		}
		
		$(".largePic img").attr("title",tit);
		$(".descripcion div").html("<h2>"+tit+"</h2><p>"+des+"</p>");
	});
	
	$(".largePic").on("click","img.MS_big_float", function(){

		var img1=$(".largePic img.MS_big_float").attr("src");
		var img2=$(".largePic img.MS_big_box").attr("src");
		
		$(".largePic img.MS_big_float").attr("src",img2);
		$(".largePic img.MS_big_box").attr("src",img1);

	});
	
	$(".litaItem").hover(
		function(){
			$(this).children(".MS_img2").fadeIn(0);
		}
		,function(){
			$(this).children(".MS_img2").fadeOut(0);
		}
	);
});
</script><div id="videoplayer"></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35281861-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>

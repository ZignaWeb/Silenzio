<?
$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");

$cq=mysql_query("SELECT categoria.nombre, categoria.categoriaid FROM `categoria`,`prenda` WHERE categoria.categoriaid=prenda.categoria GROUP BY categoria ORDER BY categoria.nombre ASC");
$cn=mysql_num_rows($cq);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css" rel="stylesheet" type="text/css" />
<link href="r/mayorista.css" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>
<link rel="icon" type="image/ico" href="favicon.ico"></link> 
<link rel="shortcut icon" href="favicon.ico"></link>
</head>

<body id="mayoristas">
  
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
    	<div id="content" class="cell">
        	<div id="MS_contenedor">
                <ol id="MS_nav">
                    <?
					for ($i=0;$i<$cn;$i++) {
						$cd[$i]=mysql_fetch_assoc($cq);
						if ($_GET["c"]==$cd[$i]['categoriaid']) {
						echo '<li style="font-family:\'Italic\'" id="men'.str_replace(" ","_",$cd[$i]["nombre"]).'"><a href="mayoristas.php?c='.$cd[$i]['categoriaid'].'">'.($cd[$i]['nombre']).'</a></li>';
						}else{
						echo '<li id="men'.str_replace(" ","_",$cd[$i]["nombre"]).'"><a href="mayoristas.php?c='.$cd[$i]['categoriaid'].'">'.($cd[$i]['nombre']).'</a></li>';
						}
					}
					?>
                </ol>
                <?

				if ($_GET["c"]!="" && $_GET["c"]!=0){
					$c=strip_tags($_GET["c"]);
				}else{
					$c=$cd[0]['categoriaid'];
				}
					$pq=mysql_query("SELECT * FROM `prenda` WHERE `categoria`='$c'");
					$cdat=mysql_fetch_assoc(mysql_query("SELECT * FROM `categoria` WHERE `categoriaid`='$c'"));
				?>
                
                <ol id="MS_lista">
                    <?
					$pn=mysql_num_rows($pq);
					for ($i=0;$i<$pn;$i++) {
					$pd=mysql_fetch_assoc($pq);
					foreach($pd as $key => $val){
						$pd[$key]=htmlentities(utf8_decode($val));
					}
					echo '<li class="litaItem">';
					// add new
					if ($pd["new"] == 1 ) {
						echo '<div class="MS_new">NEW!</div>';
					}
					if ($pd["agotado"] == 1 ) {
						echo '<div class="MS_ago">agotado!</div>';
					}
					// add rolover
					if ($pd["img2"] != "" ) {
						echo '<div class="rollOv">
							<img id="'.$pd["img2"].'-'.$pd["img"].'" class="MS_thumb" src="../nueva/include/img/content/sma/'.$pd["img"].'" width="220" height="250" alt="'.ucfirst(strtolower($pd["nombre"])).', Talle: '.$pd["talle"].', Color: '.str_replace("/"," ",$pd["color"]).'">
							
							<img id="'.$pd["img"].'-'.$pd["img2"].'" class="MS_thumb MS_thumb_off" src="../nueva/include/img/content/sma/'.$pd["img2"].'" width="220" height="250" alt="'.ucfirst(strtolower($pd["nombre"])).', Talle: '.$pd["talle"].', Color: '.str_replace("/"," ",$pd["color"]).'">
						
						</div>';
					}else{
						echo '<img class="MS_thumb" src="../nueva/include/img/content/sma/'.$pd["img"].'" width="220" height="250" alt="'.ucfirst(strtolower($pd["nombre"])).', Talle: '.$pd["talle"].', Color: '.str_replace("/"," ",$pd["color"]).'">';
					}
					
					echo '<div class="MS_thum_desc">
							<h3>'.ucfirst(strtolower($pd["nombre"])).'</h3>
							<p>Talle: '.$pd["talle"].'</p>
							<p>Color: '.str_replace("/",", ",$pd["color"]).'</p>
						</div>
					</li>';
					}
					?>
                </ol>
                <div id="MS_prev"><img src="r/i/mayoristas/prev.png" /></div>
                <div id="MS_next"><img src="r/i/mayoristas/next.png" /></div>
            </div>
            <div id="MS_imagePan">
                <div id="MS_inagePan_img">
                    <img id="MS_panImg" src="r/i/mayoristas/blank.gif" alt="imagen" />
                </div>
                <div id="MS_info">
                    <span id="MS_showhide">Detalles</span>
                    <div id="MS_data"></div>
                </div>
                <a id="MS_cerrar" href="#">Cerrar</a>
                <img id="MS_switchImg" alt="siguiente imagen" />
            </div>
        </div>
    </div>
    <div class="row">
    	<div id="footMayo" class="cell"><a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
</div>
    </div>
</div>
<div id="videoplayer"></div>
<script type="text/javascript">
	// load js functions	
	$(window).resize(function(){refreshit();});
	$(document).ready(function () {
		var hold_width, list_size, item_ancho, list_ancho;
		refreshit();
		MS("#MS_contenedor");		
	});
</script>

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
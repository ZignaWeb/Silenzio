<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>

</head>

<body id="promo">
  
<div id="mainBox" class="table new">
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
        	<?
			$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");
			$date =date("Y-m-d");
			$lq=mysql_query("SELECT * FROM `ag_promo` WHERE `inicio`<='$date' AND `fin`>='$date' AND `mostrar`='1' ORDER BY `id` ASC");
			$i=0;
			while($ld[$i]=mysql_fetch_assoc($lq)){
				$img[$i]=mysql_fetch_assoc(mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='prom' AND `dep_id`='".$ld[$i]["id"]."' AND `mostrar`='1' LIMIT 1"));
				$ld[$i]["img"]=$img[$i]["url"];
				$i++;
			}
			if ($ld[$i]["img"]==""){unset($ld[$i]);unset($img[$i]);}
			if(count($ld)==0){
				$ld[0]["img"]="url1392923925.jpeg";
				$ld[0]["titulo"]="Nos hay promociones por el momento";
			}
			?>
        	<div id="madiaHold" class="table">
            	<div id="img" class="row">
                	<div id="imgHold" class="cell">
                    	<img src="http://silenzio.com.ar/cp/uploads/box/<?=$ld[0]["img"]?>" />
                    </div>
                </div>
                <div class="row" style="height:70px; position:relative">
                	<a id="afip" class="left cell" href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
                </div>
            </div>
            
            <div id="cuadrosHold" class="table">
            	<?
				for ($j=0;$j<count($ld);$j++) {
					if ($j%2==0){echo '<div class="row">
					';}
					if ($j==0) {$on="on";}else{$on="";}
					echo '<div class="cell promo '.$on.'" data-img="'.$img[$j].'"><h2>'.$ld[$j]["titulo"].'</h2><p>'.$ld[$j]["descripcion"].'</p><p class="fechas">Desde el '.date("d/m/y", strtotime($ld[$j]["inicio"])).' al '.date("d/m/y", strtotime($ld[$j]["fin"])).'</p></div>';
					if ($j%2==1){echo '</div>
					';}
				}
				?>
            </div>
            
        </div>
    </div>
</div>
<div id="videoplayer"></div>
<script type="text/javascript">
$(document).ready(function(){
	$(".promo").click(function(){
		$(".promo").removeClass("on");
		$(this).addClass("on");
		var img=$(this).attr("data-img");
		$("#imgHold img").attr("src","http://silenzio.com.ar/cp/uploads/box/"+img);
	});
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

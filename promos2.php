<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>
<link rel="icon" type="image/ico" href="favicon.ico"></link> 
<link rel="shortcut icon" href="favicon.ico"></link>
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
			$lq=mysql_query("SELECT * FROM `promocion` WHERE `inicio`<='$date' AND `fin`>='$date' ORDER BY `promocionid` ASC");
			$i=0;
			while($ld[$i]=mysql_fetch_assoc($lq)){
				$i++;
			}
			if ($ld[$i]["img"]=="" && count($ld)>3){unset($ld[$i]);}
			?>
        	<div id="madiaHold" class="table">
            	<div id="img" class="row">
                	<div id="imgHold" class="cell">
                    	<img src="http://silenzio.com.ar/nueva/include/img/content/pmo/<?=$ld[0]["img"]?>" />
                    </div>
                </div>
            </div>
            
            <div id="cuadrosHold" class="table">
            	<?
				$r=0;
				foreach($ld as $d){
					$r++;
					if ($r%2==1){echo '<div class="row">
					';}
					
					// echo '<div class="cell promo" style="background-image:url(\'r/i/imgPre/PROXIMAMENTE.png\'); background-position:center; background-size:cover;"><div class="boxline"></div></div>';
					echo '<div class="cell promo" data-img="'.$d["img"].'"><h2>'.$d["titulo"].'</h2><p>'.$d["descripcion"].'</p><p class="fechas">Desde el '.date("d/m/y", strtotime($d["inicio"])).' al '.date("d/m/y", strtotime($d["fin"])).'</p></div>';
					if ($r%2==0){echo '</div>
					
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
		$("#imgHold img").attr("src","http://silenzio.com.ar/nueva/include/img/content/big/"+img);
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>

</head>

<body id="lookbook">
  
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
			include ("cp/r/sql.php");
			$lq=mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='lookbook' AND `dep_id`='1' AND `mostrar`='1' ORDER BY `id` ASC");
			$i=0;
			while($ld[$i]=mysql_fetch_assoc($lq)){
				$i++;
			}
			unset($ld[$i]);
			?>
        	<div class="descripcion">
            	<div>
                	<h2><?=$ld[0]["titulo"]?></h2>
                    <p><?=$ld[0]["descripcion"]?></p>
                </div>
            </div>

        	<!--<div class="largePic" style="background:url('r/i/imgPre/PROXIMAMENTE.png') #ccc; background-position:center; background-size:cover;"></div>-->
            
            <div class="largePic"> <img src="http://silenzio.com.ar/cp/uploads/box/<?=$ld[0]["url"].'" alt="'.$ld[0]["descripcion"].'"  title="'.$ld[0]["titulo"]?>"/>
            
</div>
            <ol class="smallPic">
            	<?
				$r=0;
				foreach($ld as $d){
					$r++;
					// echo '<li style="background:url(\'r/i/imgPre/PROXIMAMENTE.png\') #000; background-position:center; background-size:cover;"></li>';
					echo '<li><img src="http://silenzio.com.ar/cp/uploads/box/'.$d["url"].'" alt="'.$d["descripcion"].'"  title="'.$d["titulo"].'" /></li>'; 
					
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
		var img=$(this).attr("src"),
			tit=$(this).attr("title"),
			des=$(this).attr("alt");
		$(".largePic img").attr("src",img);
		$(".largePic img").attr("title",tit);
		$(".descripcion div").html("<h2>"+tit+"</h2><p>"+des+"</p>");
	});
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

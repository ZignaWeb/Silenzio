<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css?v=1" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>
<link rel="icon" type="image/ico" href="favicon.ico"></link> 
<link rel="shortcut icon" href="favicon.ico"></link>
</head>

<body>
  
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
        	<div id="showbox">
                <div class="view"><div class="current" style="background:url(r/i/slide/Silenzio-Portada1A.jpg);background-size:cover;"></div><div class="next" style="background:url(r/i/slide/Silenzio-Portada2A.jpg);background-size:cover;"></div></div>
            </div>
        </div>
    </div>
</div>

<div id="footSlide">
	<h2>¡Favoritos de la semana!</h2>
    <ol id="novedades">
    	<?
		$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");

		$fq=mysql_query("SELECT * FROM `favoritos` WHERE 1 ORDER BY `favoritosid` DESC LIMIT 3");
		while($fd=mysql_fetch_assoc($fq)){
			echo "<li><img src='http://www.silenzio.com.ar/nueva/include/img/content/".$fd["img"]."' alt='".$fd["titulo"]."' /></li>";
		}
        ?>
    </ol>
</div>

<div id="videoplayer"></div>
<div id="favplayer"></div>
<div id="formplayer">
	<iframe src='r/html/Form.php'></iframe>
    <a class="cerrar" href="#">cerrar [ x ]</a>
</div>

<a id="afip" class="right" href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
<script type="text/javascript">
	// load js functions
	$(document).ready(function () {
								
		slider("#showbox");
		
		$("#footSlide h2").click(function(event){
			$("#novedades").slideToggle();
		});
		
		$("#footSlide #novedades li img").click(function(){
			$("#favplayer").html("<div id='cutter'><img class='popImg' src='"+$(this).attr("src")+"' /></div><a id='cerrar' href='#'>[ x ] cerrar</a>").fadeIn();
		});
		
		//
		postSubmenu ();
		
		$(window).resize(function(){
			postSubmenu();
		})
		
		function postSubmenu () {
			var offset = $(".menu > li:nth-of-type(1)").position().top;
			var Hheader= $("#header").height()-offset ;
			$("#header .submenu").css("padding-top",Hheader);
		}
		
		setTimeout(function(){
			$("#formplayer").fadeIn();
		},1000);
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

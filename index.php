<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css?v=4" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="r/superslides.css">
<link rel="shortcut icon" href="" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>
<link rel="icon" href="data:;base64,=">
</head>

<body>
<div id="cover"></div>
<div id="mainBox" style="overflow-x:hidden;">
	<a href="index.php"><img id="logo" src="r/i/logodark.png" /></a>
	<div id="navigation">    	                	
					<? 
					include ("r/html/header.php");
					include ("cp/r/sql.php");
					$lq=mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='cmp' AND `dep_id`='1' AND `mostrar`='1' ORDER BY `id` ASC");
					$rowsp = mysql_num_rows($lq);
					while ($ld = mysql_fetch_assoc($lq)){
						$url[] = $ld["url"];
					}
					
					?>
    </div>
    <div id="slides">
    <div class="slides-container">
      <?
	  	for ($j=0;$j<$rowsp;$j++){
			echo '<img src="http://silenzio.com.ar/cp/uploads/slide/'.$url[$j].'" alt="Campaña">';
		} 
	  ?>
    </div>

    <nav class="slides-navigation">
      <a href="#" class="next"><img style="height:50px; padding-right:20px;" src="r/i/logonext.png" /></a>
      <a href="#" class="prev"><img style="height:50px; padding-left:20px;" src="r/i/logoprevious.png" /></a>
    </nav>
  </div>
  
    
</div>
<div id="videoplayer"></div>
<div id="favplayer"></div>
<div id="formplayer">
	<iframe src='http://www.zigna.com.ar/remotes/silenzio/home_form_silenzio.php'></iframe>
    <a class="cerrar" href="#">cerrar [ x ]</a>
</div>

<a id="afip" class="right" href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
<script type="text/javascript">
	// load js functions
	$(document).ready(function () {		
								
		setTimeout(function(){$("#formplayer").fadeIn();},1000);
		
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
  <script src="r/c/slider/jquery.easing.1.3.js"></script>
  <script src="r/c/slider/jquery.animate-enhanced.min.js"></script>
  <script src="r/c/slider/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
  <script>
    $(function() {
      $('#slides').superslides({
        hashchange: true,
        play: 3000
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css?v=4" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>
<link rel="icon" href="data:;base64,=">
</head>

<body>
  
<div id="mainBox" class="table">
	<div style="position:fixed; bottom:85px; height:45px; width:100%; z-index:9999; text-align:center; width:100%;"><img src="r/i/logodark.png" width="244" height="102" alt="Silenzio" /></div>
    <div style="position:fixed; bottom:130px; height:45px; background-color:#F6F5EE; width:100%; z-index:9999;">
        <? 
        include ("r/html/newHeader.html");
        include ("cp/r/sql.php");
        $lq=mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='cmp' AND `dep_id`='1' AND `mostrar`='1' ORDER BY `id` ASC");
        $i=0;
        while ($ld[$i]=mysql_fetch_assoc($lq)) {$i++;}
        array_pop($ld);
        ?>      
    </div>
    <div class="row">
    	<div id="content" class="cell">
        	<div id="showbox">
                <div class="view"><div class="current" style="background-image:url(http://silenzio.com.ar/cp/uploads/slide/<?=$ld[0]["url"]?>)"></div><div class="next" style="background-image:url(http://silenzio.com.ar/cp/uploads/slide/<?=$ld[1]["url"]?>)"></div></div>
            </div>
        </div>
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
		slider("#showbox");
		
		$("#footSlide h2").click(function(event){
			$("#novedades").slideToggle();
		});
		
		$("#footSlide #novedades li img").click(function(){
			$("#favplayer").html("<div id='cutter'><img class='popImg' src='"+$(this).attr("src")+"' /></div><a class='cerrar' href='#'>[ x ] cerrar</a>").fadeIn();
		});
		
		//
		
		
		function slider(id) {
					
		var imgs = new Array(
		<?
	
		$echo="";
		foreach($ld as $ldi){
			$ldp=$ldi["url"];
			$echo .= "'http://silenzio.com.ar/cp/uploads/slide/$ldp',";
		}
		echo substr($echo,0,-1);
		?>
		 );
		
		var delay = 5000,
			c=0,
			current,
			n=imgs.length;
			w=$(window).width();
			
			setInterval(function(){
				c++;
				current=c%n;
				if(current<n-1){next=current+1;}else{next=0;}
				
				$(id + " .view .current").animate({width:0},1000,function(){
					$(id + " .view .current").detach();
					$(id + " .view div.next").attr("class","current").css('background-image', 'url(' + imgs[current] + ')');
					$(id + " .view").append('<div class="next"></div>');
					$(id + " .view div.next").css('background-image', 'url(' + imgs[next] + ')');
				});
				
			},delay);
		}
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>
</head>

<body id="locales">
  
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
        	<?
			include ("cp/r/sql.php");
			?>
            <script type="text/javascript">
				var m = new Array(), i = new Array();
			</script>
        	<div id="madiaHold" class="table">
            	<div id="img" class="row">
                	<div id="imgHold" class="cell" style="background:url(http://silenzio.com.ar/nueva/include/img/content/loc/img1378152564.jpeg); background-size:cover"></div>
                </div>
                <div id="map" class="row">
                	<div id="mapHold" class="cell">
                		<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ar/maps?f=q&source=s_q&hl=es-419&geocode=&q=Avenida+V%C3%A9lez+Sarsfield+361,+C%C3%B3rdoba&aq=0&oq=Av.+Velez+Sarsfield+361&sll=-31.398755,-64.186859&sspn=0.338177,0.676346&ie=UTF8&hq=&hnear=Av+V%C3%A9lez+Sarsfield+361,+C%C3%B3rdoba&t=m&z=14&ll=-31.419463,-64.188813&output=embed"></iframe><br /><small><a href="https://maps.google.com.ar/maps?f=q&source=embed&hl=es-419&geocode=&q=Avenida+V%C3%A9lez+Sarsfield+361,+C%C3%B3rdoba&aq=0&oq=Av.+Velez+Sarsfield+361&sll=-31.398755,-64.186859&sspn=0.338177,0.676346&ie=UTF8&hq=&hnear=Av+V%C3%A9lez+Sarsfield+361,+C%C3%B3rdoba&t=m&z=14&ll=-31.419463,-64.188813" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>
                    </div>
                </div>
                <div class="row afip" style="height:70px; position:relative">
                	<a id="afip" class="left cell" href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
                </div>
            </div>
            
            <div id="cuadrosHold" class="table">
            	<div class="row">
                	<div class="cell on">
                    	<div class="boxline">
	                        <h2>Córdoba</h2>
							<?
							$os=0;
                            $lq=mysql_query("SELECT * FROM `ag_local` WHERE `localidad`='1'");
                            while($ld=mysql_fetch_assoc($lq)){
								$ld["img"]=mysql_fetch_assoc(mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='loc' AND `dep_id`='".$ld["id"]."'"));
								$ld["img"]=$ld["img"]["url"];
								
                                if ($ld["lugar"]!=NULL) {
									echo '<h3 id="l'.$ld["id"].'">'.$ld["lugar"].'</h3><p>'.$ld["direccion"].'<br/>'.$ld["telefono"].'</p>';
								}else{
									echo '<h3 id="l'.$ld["id"].'">'.$ld["direccion"].'</h3><p>'.$ld["telefono"].'</p>';
								}
								echo '<script type="text/javascript">
									m['.$ld["id"].']=\''.$ld["googleMaps"].'\';
									i['.$ld["id"].']="'.$ld["img"].'";
									</script>';
								$os++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="cell">
                    	<div class="boxline">
                        	<h2>Mendoza</h2>
                        	<?
								$lq=mysql_query("SELECT * FROM `ag_local` WHERE `localidad`='2'");
								while($ld=mysql_fetch_assoc($lq)){
									$ld["img"]=mysql_fetch_assoc(mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='loc' AND `dep_id`='".$ld["id"]."'"));
									$ld["img"]=$ld["img"]["url"];
									if ($ld["lugar"]!=NULL) {
										echo '<h3 id="l'.$ld["id"].'">'.$ld["lugar"].'</h3><p>'.$ld["direccion"].'<br/>'.$ld["telefono"].'</p>';
									}else{
										echo '<h3 id="l'.$ld["id"].'">'.$ld["direccion"].'</h3><p>'.$ld["telefono"].'</p>';
									}
									echo '<script type="text/javascript">
										m['.$ld["id"].']=\''.$ld["googleMaps"].'\';
										i['.$ld["id"].']="'.$ld["img"].'";
										</script>';
									$os++;
								}
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="cell">
                    	<div class="boxline">
	                        <h2>Salta</h2>
                        	<?
								$lq=mysql_query("SELECT * FROM `ag_local` WHERE `localidad`='4'");
                            	while($ld=mysql_fetch_assoc($lq)){
								$ld["img"]=mysql_fetch_assoc(mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='loc' AND `dep_id`='".$ld["id"]."'"));
								$ld["img"]=$ld["img"]["url"];
									if ($ld["lugar"]!=NULL) {
										echo '<h3 id="l'.$ld["id"].'">'.$ld["lugar"].'</h3><p>'.$ld["direccion"].'<br/>'.$ld["telefono"].'</p>';
									}else{
										echo '<h3 id="l'.$ld["id"].'">'.$ld["direccion"].'</h3><p>'.$ld["telefono"].'</p>';
									}
									echo '<script type="text/javascript">
										m['.$ld["id"].']=\''.$ld["googleMaps"].'\';
										i['.$ld["id"].']="'.$ld["img"].'";
										</script>';
									$os++;
								}
                            ?>
                        </div>
                    </div>
                    <div class="cell">
                    	<div class="boxline">
                        	<h2>Tucumán</h2>
                        	<?
								$lq=mysql_query("SELECT * FROM `ag_local` WHERE `localidad`='5'");
								while($ld=mysql_fetch_assoc($lq)){
									$ld["img"]=mysql_fetch_assoc(mysql_query("SELECT * FROM `ag_media` WHERE `dep_table`='loc' AND `dep_id`='".$ld["id"]."'"));
									$ld["img"]=$ld["img"]["url"];
									if ($ld["lugar"]!=NULL) {
										echo '<h3 id="l'.$ld["id"].'">'.$ld["lugar"].'</h3><p>'.$ld["direccion"].'<br/>'.$ld["telefono"].'</p>';
									}else{
										echo '<h3 id="l'.$ld["id"].'">'.$ld["direccion"].'</h3><p>'.$ld["telefono"].'</p>';
									}
									echo '<script type="text/javascript">
										m['.$ld["id"].']=\''.$ld["googleMaps"].'\';
										i['.$ld["id"].']="'.$ld["img"].'";
										</script>';
									$os++;
								}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div id="videoplayer"></div>
<script type="text/javascript">
$(document).ready(function(){
	$("h3").click(function(){
		var id = $(this).attr("id").replace("l","");
		$(".boxline p").fadeOut();
		$(".cell").removeClass("on");
		$(this).parents(".cell").addClass("on");
		$(this).next("p").fadeIn();

		$("#mapHold").html(m[id]);
		$("#imgHold").attr("style","background-image:url('http://silenzio.com.ar/cp/uploads/box/"+i[id]+"'); background-size:cover");
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

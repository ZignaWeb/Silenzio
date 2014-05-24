<div id="contenido">
	<div id="boxTicker" class="locales">
	<div id="localSelect" class="boxShadow dosCol colSep">
    
    	<?
		// array info
		$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");
		$tabla="local";
		$dq=mysql_query("SELECT * FROM `$tabla` WHERE 1");
		$dn=mysql_num_rows($dq);
		for ($i=0;$i<$dn;$i++) {
			$dd[$i]=mysql_fetch_assoc($dq);
		}
		?>
    	<h2>LOCALES</h2>
        <div class="pink">
            <ol id="direcciones">
            	<?
				for ($i=0;$i<$dn;$i++) {
					echo '<li><p>'.$dd[$i]["direccion"].'</p><p>'.$dd[$i]["telefono"].'</p></li>';
				}
				?>
            </ol>
        </div>
    	<ol class="dos30" id="LText">
        	<?
			for ($i=0;$i<$dn;$i++) {
				if ($i==0){$c='class="selected"';}else{$c="";}
				echo '<li '.$c.'>'.$dd[$i]["lugar"].'</li>';
			}
			?>
        </ol>
    </div>
    <div id="localMedia" class="boxShadow dosCol">
    	<ol id="mapas">
        	<!--Local Patio olmos -->
            <?
			for ($i=0;$i<$dn;$i++) {
				echo '<li>
					<div id="localImg">
						<img src="http://silenzio.com.ar/nueva/include/img/content/loc/'.$dd[$i]["img"].'" />
					</div>
					<div id="gMap">
						'.$dd[$i]["googleMaps"].'
					</div>
				</li>';
			}
			?>
        	<li>            
        </ol>
    </div>
    
</div>

<script type="text/javascript">
	$("title").text("Locales : Silenzio");
	window.clearInterval(intervalo);
				
	var intervalo 	= null,
		pos			= 0,
		delay		= 6000;
	
	$('#direcciones li').css({display:"none"});
	$('#direcciones li').eq(0).fadeIn();
	

	$('#mapas li').eq(0).fadeIn();
	
	boxTicker();
	
	// click li
	$("#LText li, #LImgChica li").click(function(){
		
		pos = $(this).index();
							
		change(pos);
		
		window.clearInterval(intervalo);
		intervalo = null;
	});
	
	function change (pos){
		$('#LText li').attr("class","");
		$('#LText li').eq(pos).attr("class","selected");
		
		$('#direcciones li').css({display:"none"});
		$('#direcciones li').eq(pos).fadeIn();
		
		$('#mapas li').fadeOut();
		$('#mapas li').eq(pos).fadeIn();
	}
	
	// box ticker
	function boxTicker(){	
		var num		= $('#LText li').size();
		
		if (intervalo==null){intervalo = window.setInterval(function(){nextItem()},delay);}
			
		function nextItem(){
			if(pos>=num-1){pos=0;}else{pos++;}
			if (num>1) {
				change(pos);
			}
		}
		
	}
</script>
</div>
<div id="fiscal">
        <a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
    </div>
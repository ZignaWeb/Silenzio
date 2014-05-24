		<div id="contenido" class="promos">
			<div class="boxShadow colSep medio floatLeft">
            	<h2>Promos</h2>
                <p class="subtitulo kerningAmplio">Verano 2013</p>
                <ol id="promos">
                	<?
					$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");
					$tabla="promocion";
					$date =date("Y-m-d");
					$u_q=mysql_query("SELECT * FROM `$tabla` WHERE `inicio`<='$date' AND `fin`>='$date' ORDER BY `titulo` ASC");
					$u_n=mysql_num_rows($u_q);
					for ($i=0;$i<$u_n;$i++) {
						$u_d[$i]=mysql_fetch_assoc($u_q);
						if ($i==0){$c='class="selected"';}else{$c="";}
						echo '<li '.$c.'><h3 id="'.$u_d[$i]["img"].'" class="kerningAmplio">'.$u_d[$i]["titulo"].'</h3>
                        <p>'.nl2br($u_d[$i]["descripcion"]).'</p>
					</li>';
					}
					?>
                </ol>
            </div>
            <div class="boxShadow dosCol medio floatLeft">
            	<ol id="imgs">
                	<?
					for ($i=0;$i<$u_n;$i++) {

						echo '<li><img src="nueva/include/img/content/box/'.$u_d[$i]["img"].'" height="477" width="400" /></li>';
					}
					?>

                </ol>
            </div>
            <script type="text/javascript">
				$("title").text("Promos : Silenzio");
				
				window.clearInterval(intervalo);
				
				var intervalo 	= null,
					pos			= 0,
					delay		= 6000;
				
				boxTicker();
				
				// click li
				$("#promos li").click(function(){
					
					pos = $(this).index();
					
					$('#imgs li').fadeOut();
					$('#promos li').attr("class","");
					
					$('#imgs li').eq(pos).fadeIn();
					$('#promos li').eq(pos).attr("class","selected");
					
					window.clearInterval(intervalo);
					intervalo = null;
				});
				
				// box ticker
				function boxTicker(){	
					var num		= $('#promos li').size();
					
					if (intervalo==null){intervalo = window.setInterval(function(){nextItem()},delay);}
						
					function nextItem(){
						if(pos>=num-1){pos=0;}else{pos++;}
						if (num>1) {
						$('#promos li').attr("class","");
						$('#promos li').eq(pos).attr("class","selected");
						$('#imgs li').fadeOut();
						$('#imgs li').eq(pos).fadeIn();
						}
					}
					
				}
			</script>
        </div>
        <div id="fiscal">
        <a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
    </div>
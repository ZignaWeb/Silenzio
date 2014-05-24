		<div id="contenido" class="looks">
			<div class="boxShadow colSep medioMedio floatLeft">
            	<h2>Looks</h2>
                <p class="subtitulo kerningAmplio">Verano 2013</p>
                <ol id="LText">
	                <?
					$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");
					$tabla="look";
					$date =date("Y-m-d");
					$u_q=mysql_query("SELECT * FROM `$tabla` WHERE `desde`<='$date' AND `hasta`>='$date' ORDER BY `titulo` ASC");
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
            <div class="boxShadow colSep medioMedioMedio floatLeft">
            	<ul id="LImgChica">
                	<?
					for ($i=0;$i<$u_n;$i++) {
						echo '<li><img src="nueva/include/img/content/sma/'.$u_d[$i]["img"].'" width="139" /></li>';
					}
					?>
                </ul>
            </div>
            <div class="boxShadow dosCol medio floatLeft">
            	<ul id="LImgGrande">
                	<?
					for ($i=0;$i<$u_n;$i++) {
						echo '<li><img src="nueva/include/img/content/box/'.$u_d[$i]["img"].'"/></li>';
					}
					?>
                </ul>
            </div>
            <script type="text/javascript">
				$("title").text("Looks : Silenzio");
				
				window.clearInterval(intervalo);
				
				var intervalo 	= null,
					pos			= 0,
					delay		= 6000;
				
				$('#LImgChica li').eq(pos).css({display:"none"});
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
					
					$('#LImgChica li').fadeIn();
					$('#LImgChica li').eq(pos).css({display:"none"});
					
					$('#LImgGrande li').css({display:"none"});
					$('#LImgGrande li').eq(pos).fadeIn();
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
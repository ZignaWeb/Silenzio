		<div id="contenido">
        	<div id="megaWind" class="boxShadow">
            	<div id="megaWindContainer">
                	<div id="megaWindContenido">
                    	<div id="bigList">
                            <ol id="BIGThumbs">
								<?
                                $dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");
                                $tabla="lookbook";
                                $u_q=mysql_query("SELECT * FROM `$tabla` WHERE 1");
                                $u_n=mysql_num_rows($u_q);
                                for ($i=0;$i<$u_n;$i++) {
                                    $u_d[$i]=mysql_fetch_assoc($u_q);
                                    echo '<li><img class="thumb" src="nueva/include/img/content/sma/'.$u_d[$i]["img"].'" alt="'.$u_d[$i]["titulo"].']['.$u_d[$i]["descripcion"].'" /></li>';
                                }
                                ?>
                            </ol>
                            <div id="prevBg"><img src="include/img/layout/prev.png" alt="Anteriores"></div>
						    <div id="nextBg"><img src="include/img/layout/next.png" alt="Siguientes"></div>
                        </div>
                        <div id="smaList">
                            <ol id="SMAThumbs">
                                <?
								for ($i=0;$i<$u_n;$i++) {
                                    echo '<li><img class="thumb" src="nueva/include/img/content/sma/'.$u_d[$i]["img"].'" alt="'.$u_d[$i]["titulo"].']['.$u_d[$i]["descripcion"].'" /></li>';
                                }
								?>
                            </ol>
                            <div id="prevSm"><img src="include/img/layout/prev.png" alt="Anteriores"></div>
						    <div id="nextSm"><img src="include/img/layout/next.png" alt="Siguientes"></div>
                        </div>
                        <div id="megaWindDesc" class="kerningAmplio">MÁS LIBRE. MÁS VERANO.</div>
                    </div>
                </div>
            </div>
            
            <script type="text/javascript">
				$("title").text("Lookbook : Silenzio");
				// cantidad de imágenes
				var nI		= $("#BIGThumbs li").size(),
					bigW	= 220,
					bigH	= 250,
					smaW	=  88,
					conW	= 789,
					
					// holders
					nigP	= 0, // posicion actual big
					
					// movimientos
					mSma	= 200,
					mBig	= 500;
					
				// listenes flechas
				$("#nextSm").click(function(){slide(-1,"sm");});
				$("#prevSm").click(function(){slide(+1,"sm");});
				
				$("#nextBg").click(function(){slide(-1,"bg");});
				$("#prevBg").click(function(){slide(+1,"bg");});
				
				// ensanchar el campo
				$("#bigList ol").css({width:nI*bigW+nI*6});
				$("#smaList ol").css({width:nI*smaW+nI*2});
				
				var moveB=0;
				
				function slide ( dir , que ) {	
					var step    = 790,
						widtBig = nI*bigW+nI*6,
						widtSma = nI*smaW+nI*2+step-step*0.4;
						
					moveB = moveB + dir*step;
					if (moveB > 0){moveB=0;}
					
					if (que=="bg") {
						if (moveB < -(widtBig-step)){moveB=-(widtBig-step);}
						$("#BIGThumbs").animate({left:Math.floor(moveB)},500);
						$("#SMAThumbs").animate({left:Math.floor(moveB*0.4)},500);
					}else if (que=="sm"){
						if (moveB < -(widtSma-step)){moveB=-(widtSma-step);}
						$("#BIGThumbs").animate({left:Math.floor(moveB*2.5)},500);
						$("#SMAThumbs").animate({left:Math.floor(moveB)},500);
					}
				}
				
				// img pan
				var change="";
				$("img.thumb").click(function(){
					$("body").css("overflow","hidden");
					change = $(this).attr("src").replace("/sma/","/big/");
					var datainfo = $(this).attr("alt").split("][");
					$("#imagePan #info #data").html('<h3>'+datainfo[0]+'</h3><p>'+datainfo[1]+'</p>');
							
					$("#outer_container").fadeOut(function(){
						refreshit();
						$("#panImg").attr("src",change).load(function(){
							$(this).fadeIn();
						});
						$(this).fadeIn();
					});
				});
				
				$("#panImg, #cerrarPan").click(function(){
					$("body").css("overflow","auto");
					$("#outer_container").fadeOut();
					$("#panImg").attr("src","");
				});
				var imgWH = new Array(),
					relY;
				$("#panImg").load(function() {
					imgWH   = [$(this).width(), $(this).height()];
					relY	= Math.floor((imgWH[1]-wH)/wH);
					//$("title").text(picDim[0]+" x "+picDim[1]);
				});
				
				$("#imagePan").mousemove(function(e){  
					var posX = e.pageX-$(window).scrollLeft();
						posY = e.pageY,
						move = relY*posY;
					$("#panImg").clearQueue().animate({marginTop:-move},700);		
				});
				
				$("#info").hover(
					function(){
						$("#data").slideDown();
					},function(){
						$("#data").slideUp();
					}
					
				);
				
				function refreshit () {
					wH = $(window).height();
					wW = $(window).width();
					var fH = 60,  //altura boton next prev
					mH = 330, //altura thumb
					dH = wH-mH; // espacio vacío
						
					$("#outer_container, #imagePan").css({height:wH});
					$("#imagePan #info").css({marginLeft:((wW-$("#info").width())/2)});
					$("#article").css({marginTop:Math.floor(dH/2)});
					$("#prev, #next").css({top:Math.floor(dH/2+(mH/2-fH/2)), height:fH });
				}
			</script>
        </div>
        <div id="fiscal">
        <a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
    </div>
        <div id="outer_container">
            <div id="imagePan">
                <div class="container">
                    <img id="panImg" class="panning" alt="imagen" />
                    <a id="cerrarPan" href="#">X <span>CERRAR</span></a>
                </div>
                <div id="info">
                    <span id="showhide">Detalles</span>
                    <div id="data"></div>
                </div>
            </div>
        </div>

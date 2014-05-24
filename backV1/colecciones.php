<script type="text/javascript">$("title").text("Colecciones : Silenzio");</script>

<div id="contenido">
    
    <div class="contCele holdCamp">
        <img src="include/img/layout/colecciones/bigs/celebrate.jpg" width="100%" alt="Celebrate" />
        <div class="intro">
            <h2>CELEBRATE</h2><br />
            <span>Inspirada en los años 70, las prendas de ésta línea están destinadas a la celebración. Los colores blanco, visón y el infaltable dorado, crean una imagen fresca y elegante.</span></div>
	</div>
    
    <div class="contFeel holdCamp">
        <img src="include/img/layout/colecciones/bigs/feel.jpg" width="100%" alt="Feel of dream" />
        <div class="intro">
        	<h2>FEEL OF DREAMS</h2><br />
        	<span>Sensible y fuerte, inspirada en el contacto con la naturaleza y los orígenes, ésta línea genera calidez por su colorido y fuerza, por la combinación de sus estampados.</span></div>
	</div>
    
    <div class="contPowe holdCamp">
        <img src="include/img/layout/colecciones/bigs/power.jpg" width="100%" alt="Power of color" />
        <div class="intro">
        	<h2>POWER OF COLOR</h2><br />
            <span>El deporte y la playa dan inspiración a esta paleta. Las olas golpean la ciudad, se sumergen en la vida urbana, creando sensación de movimiento, frescura y libertad.</span></div>
	</div>
    
    <div class="contJung holdCamp">
        <img src="include/img/layout/colecciones/bigs/jungle.jpg" width="100%" alt="Jungle" />
        <div class="intro"><span></span></div>
	</div>
    
</div>
<div id="coleccionesList">
<a id="videoback" href="http://vimeo.com/48102858#"><img src="include/img/layout/colecciones/videoBackstage.png" height="42" width="143" alt="Video Backstage" /></a>
	<ol id="coleccionList">
    	<li><img class="contCele" src="include/img/layout/colecciones/celebrate.jpg" alt="Inspirada en los años 70, fresca y elegante." /></li>
        <li><img class="contFeel" src="include/img/layout/colecciones/feelofdreams.jpg" alt="Sensible y fuerte, Inspirada en el contacto con la naturaleza." /></li>
        <li><img class="contPowe" src="include/img/layout/colecciones/power.jpg" alt="El deporte y la playa dan inspiración creando sensación de movimiento, frescura y libertad." /></li>
        <li><img class="contJung" src="include/img/layout/colecciones/jungle.jpg" alt="falta" /></li>
    </ol>
</div>

<div id="footer">
    <div id="sec">
        <ol>
            <li><a href="http://www.facebook.com/SilenzioArgentina" target="_blank"><img src="include/img/layout/menu/face.png" /></a></li>
            <li><a href="https://twitter.com/SilenzioArg" target="_blank"><img src="include/img/layout/menu/tweet.png" /></a></li>
        </ol>
    </div>
</div>
<div id="fiscal">
        <a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
    </div>
<div id="lightbox">
    <div id="video">
    <iframe src="http://player.vimeo.com/video/48102858" width="500"
    height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen
    allowFullScreen></iframe>
    <img src="autogestion/imgs/eliminar.png" id="cerrarVideo" />
    </div>
</div>
<script type="text/javascript">
	var selector;
	$("#coleccionList li img").click(function(){
		selector = $(this).attr("class");
		$("div#contenido div.holdCamp").css({display:"none"});
		$("."+selector).fadeIn();
	});
	
	$("#videoback").click(function(event){
		
		event.preventDefault();
		
		var wH = $(window).height(),
			wW = $(window).width(),
			iH = 281,
			iW = 500,
			lr = "http://player.vimeo.com/video/48102858";
			
		$("#video iframe").attr("src",lr);
		$("#video").css({top:Math.floor((wH-iH)/2),left:Math.floor((wW-iW)/2)});
		$("#lightbox").css({width:wW, height:wH}).fadeIn();
	});
	
	$("#cerrarVideo").click(function(){
		$("#lightbox").fadeOut();
		$("#video iframe").attr("src","");
	})
	
	
</script>
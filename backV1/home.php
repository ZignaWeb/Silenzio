<div id="contenido">
        	<div id="boxTicker">
            	<ol id="box1" class="boxShadow dosCol">
                	<li><img src="include/img/layout/home/1a.gif" alt="Silenzio 2013 : Power of color" /></li>
                    <li><img src="include/img/layout/home/2a.gif" alt="Silenzio 2013 : Power of color" /></li>
                    <li><img src="include/img/layout/home/3a.gif" alt="Silenzio 2013 : Celebrate" /></li>
                    <li><img src="include/img/layout/home/4a.gif" alt="Silenzio 2013 : Feel of dreams" /></li>
                    <li><img src="include/img/layout/home/5a.gif" alt="Silenzio 2013 : Feel of dreams" /></li>
                </ol>
                <ol id="box2" class="boxShadow dosCol">
                	<li><img src="include/img/layout/home/1b.jpg" alt="Silenzio 2013 : Power of color" /></li>
                    <li><img src="include/img/layout/home/2b.jpg" alt="Silenzio 2013 : Power of color" /></li>
                    <li><img src="include/img/layout/home/3b.jpg" alt="Silenzio 2013 : Celebrate" /></li>
                    <li><img src="include/img/layout/home/4b.jpg" alt="Silenzio 2013 : Feel of dreams" /></li>
                    <li><img src="include/img/layout/home/5b.jpg" alt="Silenzio 2013 : Feel of dreams" /></li>
                </ol>
        	</div>
        </div>
        <div id="fiscal">
        <a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
    </div>
        
        <script type="text/javascript">			
			$("title").text("Silenzio");
			
			window.clearInterval(intervalo);
			var intervalo = null;
			
			boxTicker();
			
			// box ticker
			function boxTicker(){	
				var num		= $('#box1 li').size(),
					pos		= 1,
					delay	= 4000;
				
				if (intervalo==null){intervalo = window.setInterval(function(){nextItem()},delay);}
					
				function nextItem(){
					if(pos>=num-1){pos=0;}else{pos++;}
					$('#box1 li, #box2 li').fadeOut();
					$('#box1 li').eq(pos).fadeIn();
					$('#box2 li').eq(pos).fadeIn();
				}
				
			}
		</script>
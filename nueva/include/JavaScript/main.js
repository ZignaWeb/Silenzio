$(document).ready(function(){
	var css = $("link[rel=stylesheet]");
	
	$.ajaxSetup({cache:false});
	
	// AJAX llamado direct url input
	if(window.location.hash){ajaxChange((window.location.hash).replace("#","")+'.php' );}else{window.location="#home";}
	
	// AJAX llamado cuando cambia el HASH
	$(window).hashchange( function(){ajaxChange((window.location.hash).replace("#","")+'.php');});

	// AJAX cambiar contenido
    function ajaxChange(loadUrl){
	  	$("#pagina").fadeOut(function(){$(this).load(loadUrl,function(){
				if (loadUrl=="colecciones.php") {
					css.attr({href : "include/css/colecciones.css"});
				}else{
					css.attr({href : "include/css/main.css"});
				}
				$(this).fadeIn();
			})
		});
	}
	
	// AJAX cambiar HASH
	$(".enlaceajax").click(function(event){event.preventDefault();window.location.hash = $(this).attr("href");});
   
});
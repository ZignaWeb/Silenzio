$(document).ready(function(){
	var videoIframe = '<iframe src="//player.vimeo.com/video/71997030" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	var videotxt = videoIframe+'<a class="cerrar" href="#">[ x ] cerrar</a>';
	$("a.video").click(function(event){
		event.preventDefault();
		$("#videoplayer").html(videotxt).fadeIn();
	});
	$(document).on("click", "#videoplayer a.cerrar", function(event){
		event.preventDefault();
		$("#videoplayer").fadeOut("slow", function(){$(this).empty();});						
	});
	$(document).on("click", "#favplayer a.cerrar", function(event){
		event.preventDefault();
		$("#favplayer").fadeOut("slow", function(){$(this).empty();});						
	});
	$(document).on("click", "#formplayer a.cerrar", function(event){
		event.preventDefault();
		$("#formplayer").fadeOut("slow", function(){$(this).empty();});						
	});
});


function slider(id) {
                
	var imgs = new Array(
	 'r/i/slide/Silenzio-Portada1A.jpg',
	 'r/i/slide/Silenzio-Portada2A.jpg',
	 'r/i/slide/Silenzio-Portada3A.jpg',
	 'r/i/slide/Silenzio-Portada4A.jpg',
	 'r/i/slide/Silenzio-Portada5A.jpg'
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
			$(id + " .view div.current").animate({width:0},1000,function(){
				$(id + " .view div.current").remove();
				$(id + " .view div.next").attr("class","current").css('background-image', 'url(' + imgs[current] + ')');
				$(id + " .view").append('<div class="next"></div>');
				$(id + " .view div.next").attr("class","next").css('background-image', 'url(' + imgs[next] + ')');
			});
			
		},delay);
}

function refreshit() {
	hold_width = $("#MS_contenedor").width();
}


function MS (hold) {
	
	list_size = $("#MS_contenedor #MS_lista li").size(),
	item_ancho = $("#MS_contenedor #MS_lista li").width()+2,
	list_ancho = item_ancho*list_size+150;
	
	var lista_position, window_width,move_px;
	
	$("#MS_contenedor #MS_lista").css({width:list_ancho});
	
	$("#MS_prev").click( function(event){moveRight()});
	$("#MS_next").click( function(event){ moveLeft()});
	$(".MS_thumb").click(function(event){  loadImg($(this).attr("alt"),$(this).attr("src"),$(this).attr("id"))});
	$("#MS_cerrar").click(function(event){ event.preventDefault();$("#MS_imagePan").fadeOut();});
	$("#MS_info").hover(
		function(){
			$("#MS_data").slideDown();
		},
		function(){
			$("#MS_data").slideUp();
		}
	);
	
	$(".rollOv").hover(
		function(){
			$(this).children(".MS_thumb").css({display:"none"});
			$(this).children(".MS_thumb_off").css({display:"block"});
		},
		function(){
			$(this).children(".MS_thumb").css({display:"block"});
			$(this).children(".MS_thumb_off").css({display:"none"});
		}
	);
	
	$("#MS_switchImg").click(function(){
		var thisAlts   = $(this).attr("alt").split("-");
		var showSwitch = "http://silenzio.com.ar/nueva/include/img/content/big/"+thisAlts[0];
		var thumSwitch = "http://silenzio.com.ar/nueva/include/img/content/sma/"+thisAlts[1];
		
		$("#MS_switchImg").attr("alt",thisAlts[1]+"-"+thisAlts[0]);
		
		$("#MS_panImg").attr("src",showSwitch);
		$("#MS_switchImg").attr("src",thumSwitch)
		
	});
}
function moveLeft(){
	getPos();

	if (-list_ancho < lista_position-(hold_width+item_ancho)*2) {
		$("#MS_contenedor #MS_lista").animate({left:(lista_position-hold_width+item_ancho)},1000);
		} else {
		$("#MS_contenedor #MS_lista").animate({left:(-list_ancho+hold_width)},1000);
	}
}
function moveRight(){
	getPos();
	if (0 > lista_position+hold_width-item_ancho) {
		$("#MS_contenedor #MS_lista").animate({left:(lista_position+hold_width-item_ancho)},1000);
		} else {
		$("#MS_contenedor #MS_lista").animate({left:0},1000);
	}
}

function getPos () {
	lista_position = $("#MS_contenedor #MS_lista").position().left;
	window_width = $(window).width();
	move_px = window_width-item_ancho;
}

function loadImg (alt, src, id){
	src = src.replace("/sma/","/big/")
	$("#MS_imagePan").fadeIn();
	
	$("#MS_imagePan #MS_inagePan_img #MS_panImg").attr("src",src);
	
	var imgWidth = $("#MS_imagePan #MS_inagePan_img #MS_panImg").width();
	var imgHeight = $("#MS_imagePan #MS_inagePan_img #MS_panImg").height();
	var window_height = $(window).height();
	
	var img_pan_rel = (imgHeight-window_height)/window_height; 
	
	if (id){
		thisId = id;
		swichy = thisId.split("-");
		$("#MS_switchImg").attr("src","http://silenzio.com.ar/nueva/include/img/content/sma/"+swichy[0]).css("display","block");
		$("#MS_switchImg").attr("alt",swichy[0]+"-"+swichy[1]);
	}else{
		$("#MS_switchImg").css({display:"none"});
	}
	
	$("#MS_data").html("<p>"+alt.replace(/,/g,"</p><p>")+"</p>");
	
	$("#MS_imagePan #MS_inagePan_img").mousemove(function(e){
		$("#MS_imagePan #MS_inagePan_img #MS_panImg").css({top:-Math.floor(e.pageY*img_pan_rel)});
	});
}
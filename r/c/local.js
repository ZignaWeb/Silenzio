
	


$(document).ready(function(){
	
	postSubmenu();
	offsetimg ();
		
	$(window).resize(function(){
		postSubmenu();
		offsetimg ();
	})
	
	function postSubmenu () {
		var offset = $(".menu > li:nth-of-type(1)").position().top;
		var Hheader= $("#header").height()-offset ;
		$("#header .submenu").css("padding-top",Hheader);
	}
	
		function offsetimg () {
		var altp = $("#container > div > div > div:nth-child(4) > div > p:nth-child(1)").height();
		var alta =  $("#container > div > div > div:nth-child(4) > div:nth-child(1) > a:nth-child(4)").height();
		var padding = altp+ alta;
		$("##container > div > div > div:nth-child(4) > div:nth-child(2) > img").css("padding-top",padding);
	}

	
	var videoIframe = '<iframe src="//player.vimeo.com/video/86903941" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
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

function setCookie(cname,cvalue,exdays)
{
var d = new Date();
d.setTime(d.getTime()+(exdays*60*1000));
var expires = "expires="+d.toGMTString();
document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname)
{
var name = cname + "=";
var ca = document.cookie.split(';');
for(var i=0; i<ca.length; i++) 
  {
  var c = ca[i].trim();
  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
return "";
}

function checkCookie() {
	var user=getCookie("visit");
	if (user==""){
		setTimeout(function(){$("#formplayer").fadeIn();},1000);
		setCookie("visit",1,15);
	}
}
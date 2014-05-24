var wH,wW,lW;

$(document).ready(function(){
	wH = $(window).height();
	wW = $(window).width();
	dH = wH-330;
	iN=$("li.litaItem").size();
	iW=$("li.litaItem").width()+2;
	lW=iW*iN+100;
		
	if (wW < lW){
		$("body").css({width:lW});
	}
	
	refreshit ();
	$("#pre").fadeOut();
	
	$("img.thumb").click(function(){
		$("body").css("overflow","hidden");
		change = $(this).attr("src").replace("/sma/","/big/");
		var datainfo = $(this).attr("alt").split(",");
		$("#imagePan #info #data").html('<h3>'+datainfo[0]+'</h3><p>'+datainfo[1]+'</p><p>'+datainfo[2]+'</p><p>'+datainfo[3]+'</p>');
				
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
	
	$("#next").click(function(){nextPag();});
	$("#prev").click(function(){prevPag();});

});



$(window).resize(function(){refreshit();});

function nextPag () {
	sW=$(window).scrollLeft();
	if (lW-wW-sW > wW) {
		$("body, html").animate({scrollLeft:(sW+wW)},1000);
		} else {
		$("body, html").animate({scrollLeft:(lW-wW)},1000);
	}
}

function prevPag () {
	sW=$(window).scrollLeft();
	if (sW>wW) {
		$("body, html").animate({scrollLeft:(sW-wW)},1000);
		} else {
		$("body, html").animate({scrollLeft:0},1000);
	}
}


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
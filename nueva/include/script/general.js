$(document).ready(function(){
	
	// logo hover
	$("h1#logoSwitch").hover(
		function(){
			$("img#logoNegro").clearQueue().fadeOut(0);
		},
		function(){
			$("img#logoNegro").clearQueue().fadeIn(0);
		}
	);
	
	// TICKER
	
	boxTicker("box2");
	boxTicker("box1");
	
	function boxTicker(id, delay){
		var num		= $('#'+id+' li').size(),
			pos		= -1;		
		setInterval(function(){nextItem()},5000);
		function nextItem(){
			if(pos>=num-1){pos=0;}else{pos++;}
			$('#'+id+' li').fadeOut();
			$('#'+id+' li').eq(pos).fadeIn();
		}
	}

});
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Silenzio</title>
<link href="r/css2.css" rel="stylesheet" type="text/css" />
<script src="r/c/jq.js" type="text/javascript"></script>
<script type="text/javascript" src="r/c/local.js"></script>
<link rel="icon" type="image/ico" href="favicon.ico"></link> 
<link rel="shortcut icon" href="favicon.ico"></link>
</head>

<body id="looks">
  
<div id="mainBox" class="table">
	<div class="row">
    	<div id="header" class="cell">
        	<div class="table">
            	<div class="row">
                	<? include ("r/html/header.php")?>
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
    	<div id="content" class="cell" >
        	<?
			include ("cp/r/sql.php");
			$lq=mysql_query("SELECT * FROM `look` WHERE 1 ORDER BY `lookid` ASC");
			$i=0;
			while($ld[$i]=mysql_fetch_assoc($lq)){$i++;}
			unset($ld[$i]);
			
			?>
        	<div class="descripcion">
            	<div>
            		<h2><?=$ld[0]["titulo"]?></h2><p><?=$ld[0]["descripcion"]?></p>
                </div>
            </div>
            <div class="largePic"  style="background:url('http://silenzio.com.ar/nueva/include/img/content/box/<?=$ld[0]["img"]?>') #ccc; background-position:center; background-size:cover;"></div>
            <ol class="smallPic">
            	<?
				foreach($ld as $d){
					echo '<li style="background-image:url(\'http://silenzio.com.ar/nueva/include/img/content/box/'.$d["img"].'\'); background-position:center; background-size:cover;" alt="'.$d["descripcion"].'" title="'.$d["titulo"].'"></li>';
				}
				?>
            </ol>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".smallPic li").click(function(){
		var img=$(this).css("background-image"),
			tit=$(this).attr("title"),
			des=$(this).attr("alt");
		$(".largePic").css("background-image",img);
		$(".descripcion div").html("<h2>"+tit+"</h2><p>"+des+"</p>");
	});
});
</script>
<div id="videoplayer"></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35281861-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>

<? include ("seg.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>S I L E N Z I O </title>
 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"> </script>
<script type="text/javascript" src="supersized.1.0.js"></script>
<script type="text/javascript" src="javascript.js"> </script>
	<script type="text/javascript">
	
	$(function(){
		$.fn.supersized.options = {  
			startwidth: 1024,  
			startheight: 768,
			minsize: .50,
			slideshow: 1,
			slideinterval: 5000  
		};
        $('#supersize').supersized(); 
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#accordion").accordion();
	
  });
	
  </script>


<style type="text/css">
	
	*{
			margin:0;
			padding:0;
			color:#FFF;
		}
		img{
			border:none;
		}
		body {
			overflow:hidden; /*Needed to eliminate scrollbars*/
			
		}
		#content{
			height:100%;
			width:200px;
			bottom:0%;
			background-color:#000;
			position:absolute;
			top:20px;
	
		}
		#contentframe{
			text-align:center;
		}
		
		/*Supersize Plugin Styles*/
		#supersize img, #supersize a{
			height:100%;
			width:100%;
			padding-right:15px;
			display:none;
		}
		#supersize .activeslide, #supersize .activeslide img{
			display:inline;
		}
		
		#todo { width:100px; height:100%; padding:20px; }
		
		.formulario { margin-top:250px;}
		.form_imput { width:150px; height:22px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#333; font-size:0.8em; border:none; margin-top:10px; float:left; margin-left:25px; padding-top:3px; padding-left:3px;}
		.form_submit { width:70px; height:30px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; color:#FFF; font-size:0.8em; border:none; margin-top:10px; background-color:#1A1A1A; float:left; margin-left:25px; padding-top:-2px;}
		p.acceso { font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:0.8em; color:#FFF; text-align:left; letter-spacing:1px; margin-left:25px;}
#wrapper {
	width: 200px;
	margin-left: auto;
	margin-right: auto;
	margin-top:130px;
	}

.accordionButton {	
	width: 200px;
	float: left;
	cursor: pointer;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	color:#FFF;
	font-size:0.6em;
	letter-spacing:2px;
	text-align:left;
	padding-bottom:8px;
	padding-top:5px;
	margin-left:30px;
	}
	
.accordionContent {	
	width: 200px;
	float: left;
	background: #333333;
	display: none;
	padding-top:13px;
	padding-bottom:13px;
	}
ul.line_ul { border-left:1px solid #606060;
text-align:left;
margin-left:30px; padding-left:20px;
list-style:none;
}

li.lista { font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
font-size:0.65em;
color:#909090;
letter-spacing:2px;
padding-bottom:5px;
padding-top:3px;
letter-spacing:1px;
cursor:pointer;
}

li.lista:hover { color:#FFF; }
	</style>
	
    
</head>

<body>
<div id="todo">
	<div id="supersize">
		<a class="activeslide"><img  src="images/fon1.jpg"/> </a>
        <a><img src="images/fon2.jpg"/></a>
          <a><img src="images/fon4.jpg"/></a>
	</div>

	<!-- Aqui comienza div principal  --->
	<div id="content" style="background-image:url(images/fondo_nogris.jpg);background-repeat:no-repeat;">
		<div id="contentframe">
        
      		<? include('menu.php'); ?>    
        
        </div>
    </div>
	
    <div style="height:20px;width:100%;background-color:#FFF;position:absolute;bottom:0%;"></div>
    <div style="height:100%;width:20px;background-color:#FFF;position:absolute; bottom:0%;right:0%"></div>
	
    
</div>
</body>

</body>
</html>
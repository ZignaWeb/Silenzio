<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" />
<title>FormIndex</title>
</head>

<body>
<div id="popup">
    	<form id="sendMail" action="/r/c/sendIndex.php" method="post">
        <p >Silenzio</p>
        <label><span>Nombre</span> <input class="validar" type="text" name="name"></label>
        <label><span>Apellido</span> <input class="validar" type="text" name="lastname"></label>
        <label><span>E-mail</span> <input class="validar" type="email" name="email"></label>
        <label><span>Repetir e-mail</span> <input class="validar" type="email" rel="email" name="reemail"></label>
        <label><span>Ciudad</span> <input class="validar" type="text" name="city"></label>
        <input type="submit" value="Registrate">
        
        </form>

    </div>
      <script type="text/javascript">
	$(".validar").change(function(){
		fromValidator (this);
	});
	$("#mensaje").click(function(){
		$(this).fadeOut();
	});
	$('#sendMail').submit(function(event) {
	  event.preventDefault();
	  
	  var url = $(this).attr('action');
	  var datos = $(this).serialize();
	  
	  $.post(url, datos, function(resultado) {
		$('#mensaje').html(resultado);
		$("#mensaje").fadeIn();
		if ($("#mensaje").text().search("Gracias por contactarnos")!=-1) {
			$('#sendMail').fadeOut();
		}
	  });  
	});
	</script>
</body>
</html>
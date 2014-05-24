<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>
</head>

<body>
<form name="form1" action="cargar.php" method="post"enctype="multipart/form-data">
<input type="text" name="titulo" size="25" value="titulo" ><br />
<textarea name="texto" cols="30" rows="10"></textarea> <br />
<p class="menu">Seleccionar Imagen del producto<br /></p>
<input name="userfile" type="file" class="entrar_no" onChange="muestra();" size="16" style="float: left" /><br />
<input type="hidden" name="MAX_FILE_SIZE" value="200000"><br />
<input name="grabar" type="submit" class="entrar_no" value="agregar">
<input type="reset" value="Cancelar">
</form>
</body>
</html>

<?
$tabla="lookbook";
echo '<h2>'.$tabla.'</h2>';

$tit=mysql_real_escape_string($_POST["tit"]);
$txt=mysql_real_escape_string($_POST["txt"]);

if ($tit && $txt){
	$doQuery="INSERT INTO `$tabla` SET `titulo`='".$tit."',`descripcion`='".$txt."'";
	if (mysql_query($doQuery)){
		echo "<p>¡$tabla agregado correctamente!</p>";
	}else{
		echo "<p>Error al ingresar la $tabla, inténtelo de nuevo.</p>";
	}
	
	if (!empty($_FILES["img"])){
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		$relid=mysql_insert_id();
		subirImg($name_media_field,$destination_dir,$tabla,$relid);
	}
}else{
	echo "<p>Todos los campos son obligatorios</p>";
}
?>
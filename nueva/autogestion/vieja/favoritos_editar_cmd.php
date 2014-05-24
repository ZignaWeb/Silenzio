
<?
$tabla="favoritos";
echo '<h2>'.$tabla.'</h2>';
$ide=mysql_real_escape_string(trim($_POST["ide"]));
$tit=mysql_real_escape_string(trim($_POST["titulo"]));

// i2b
$doQuery="UPDATE `$tabla` SET `titulo`='".$tit."' WHERE `favoritosid`='$ide'";

	if (mysql_query($doQuery)){
		echo "<p>¡Actualización de $tabla correcta!</p>";
	}else{
		echo "<p>Error, inténtelo de nuevo.</p><p>".htmlentities($doQuery)."</p>";
	}
	
	if (!empty($_FILES["img"])){
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		$relid=$ide;
		subirImgFav($name_media_field,$destination_dir,$tabla,$relid);
	}
?>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
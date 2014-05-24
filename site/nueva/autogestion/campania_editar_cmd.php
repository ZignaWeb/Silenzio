<?
$tabla="campania";
echo '<h2>'.$tabla.'</h2>';

$tit=mysql_real_escape_string($_POST["tit"]);
$txt=mysql_real_escape_string($_POST["txt"]);
$ide=mysql_real_escape_string($_POST["ide"]);

$doQuery="UPDATE `$tabla` SET `titulo`='".$tit."',`descripcion`='".$txt."' WHERE `".$tabla."id`='$ide' ";

if ($txt && $tit && $ide){

	if (mysql_query($doQuery)){
		echo "<p>¡Actualización de $tabla correcta!</p>";
	}else{
		echo "<p>Error, inténtelo de nuevo.</p>";
	}
	
	if (!empty($_FILES["img"])){
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		$relid=$ide;
		subirImg($name_media_field,$destination_dir,$tabla,$relid);
	}
}else{
	echo "<p>Todos los campos son obligatorios</p>";
}
?>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>

<?
$tabla="lookbook";
echo '<h2>'.$tabla.'</h2>';

$tit=mysql_real_escape_string($_POST["tit"]);
$des=mysql_real_escape_string($_POST["des"]);
$ide=mysql_real_escape_string($_POST["ide"]);

$doQuery="UPDATE `$tabla` SET `titulo`='".$tit."',`descripcion`='".$des."' WHERE `".$tabla."id`='$ide' ";

if ($des && $tit && $ide){

	if (mysql_query($doQuery)){
		echo "<p>¡Actualización de $tabla correcta!</p>";
	}else{
		echo "<p>Error, inténtelo de nuevo.</p><p>".htmlentities($doQuery)."</p>";
	}
	
	if (!empty($_FILES["img"])){
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		$relid=$ide;
		subirImg($name_media_field,$destination_dir,$tabla,$relid);
	}
}else{
	echo "<p>Todos los campos son obligatorios</p>".$doQuery;
}
?>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
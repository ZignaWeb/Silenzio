
<?
$tabla="local";
echo '<h2>'.$tabla.'</h2>';

$ubi=mysql_real_escape_string($_POST["ubi"]);
$dir=mysql_real_escape_string($_POST["dir"]);
$tel=mysql_real_escape_string($_POST["tel"]);
$map=mysql_real_escape_string($_POST["map"]);
$pro=mysql_real_escape_string($_POST["pro"]);
$ide=mysql_real_escape_string($_POST["ide"]);

$doQuery="UPDATE `$tabla` SET `lugar`='".$ubi."',`direccion`='".$dir."', `telefono`='".$tel."', `googleMaps`='".$map."', `provincia`='".$pro."' WHERE `".$tabla."id`='$ide' ";

if ($dir && $tel && $map && $ide){

	if (mysql_query($doQuery)){
		echo "<p>¡Actualización de $tabla correcta!</p>";
	}else{
		echo "<p>Error, inténtelo de nuevo.</p><p>".htmlentities($doQuery)."</p>";
	}
	
	if (!empty($_FILES["img"])){
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		$relid=$ide;
		subirImgLocal($name_media_field,$destination_dir,$tabla,$relid);
	}
}else{
	echo "<p>Todos los campos son obligatorios</p>".$doQuery;
}
?>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>

<?
$tabla="local";
echo '<h2>'.$tabla.'</h2>';

$ubi=mysql_real_escape_string($_POST["ubi"]);
$dir=mysql_real_escape_string($_POST["dir"]);
$tel=mysql_real_escape_string($_POST["tel"]);
$pro=mysql_real_escape_string($_POST["pro"]);
$map=mysql_real_escape_string($_POST["map"]);

if ($ubi && $dir && $tel && $map && $pro){
	$doQuery="INSERT INTO `$tabla` SET `lugar`='".$ubi."',`direccion`='".$dir."', `telefono`='".$tel."', `provincia`='".$pro."', `googleMaps`='".$map."'";
	if (mysql_query($doQuery)){
		echo "<p>¡$tabla agregado correctamente!</p>";
	}else{
		echo "<p>Error al ingresar la $tabla, inténtelo de nuevo.</p>";
	}
	
	if (!empty($_FILES["img"])){
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		$relid=mysql_insert_id();
		subirImgLocal($name_media_field,$destination_dir,$tabla,$relid);
	}
}else{
	echo "<p>Todos los campos son obligatorios</p>";
}
?>
<?="<a href='?do=agregar $tabla'>Agregar otro: $tabla</a>"?>
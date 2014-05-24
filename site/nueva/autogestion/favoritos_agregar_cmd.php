<?
$tabla = "favoritos";
echo "<h2>Agregar cmd: $tabla</h2>";

$tit=mysql_real_escape_string(trim($_POST["titulo"]));

$query="INSERT INTO `$tabla` SET `titulo`='".$tit."'";

if ($tit!="" && !empty($_FILES["img"])) {
	if (mysql_query($query)){
		$relid=mysql_insert_id();
		echo "<p>¡Item agregado a $tabla correctamente!(id: ".$relid.")</p>";
		
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		subirImgFav($name_media_field,$destination_dir,$tabla,$relid);
		
	}else{
		echo '<p>Error al ingresar el elemento a $tabla, inténtelo de nuevo.</p>';
	}
}else{
	echo "<p>Todos los campos son obligatorios</p>";
}
?>
<?="<a href='?do=agregar $tabla'>Agregar otro: $tabla</a>"?>
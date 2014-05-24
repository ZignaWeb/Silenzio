
<?
$tabla="look";
echo '<h2>'.$tabla.'</h2>';

$tit=mysql_real_escape_string($_POST["tit"]);
$des=mysql_real_escape_string($_POST["des"]);

$aAnio=mysql_real_escape_string($_POST["aAnio"]);
$aMes=mysql_real_escape_string($_POST["aMes"]);
$aDia=mysql_real_escape_string($_POST["aDia"]);

$dAnio=mysql_real_escape_string($_POST["dAnio"]);
$dMes =mysql_real_escape_string($_POST["dMes"]);
$dDia =mysql_real_escape_string($_POST["dDia"]);

if ($tit && $txt){
	$doQuery="INSERT INTO `$tabla` SET `titulo`='".$tit."',`descripcion`='".$txt."', `desde`='".$dAnio."-".$dMes."-".$dDia."', `hasta`='".$aAnio."-".$aMes."-".$aDia."'";
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
<?="<a href='?do=agregar $tabla'>Agregar otro: $tabla</a>"?>
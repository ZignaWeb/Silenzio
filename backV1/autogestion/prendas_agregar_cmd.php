<?
$tabla = "prenda";
echo "<h2>Agregar cmd: $tabla</h2>";


$nom=mysql_real_escape_string(trim($_POST["nom"]));
$cod=mysql_real_escape_string(trim($_POST["cod"]));
$tal=mysql_real_escape_string(trim($_POST["tal"]));
$col=mysql_real_escape_string(trim($_POST["col"]));
$des=mysql_real_escape_string(trim($_POST["txt"]));
$new=mysql_real_escape_string(trim($_POST["new"]));
if ($new!=1) {$new=0;}
$catI=mysql_real_escape_string(trim(strtolower(htmlentities($_POST["catinput"]))));
$catM=mysql_real_escape_string(trim($_POST["catmenu"]));

if ($catI!=""){
	$check=mysql_query("SELECT * FROM `categoria` WHERE `nombre`='$catI'");
	if (mysql_num_rows($check)==0) {
		mysql_query("INSERT INTO `categoria` SET `nombre`='$catI'");
		$lastcat=mysql_fetch_assoc(mysql_query("SELECT * FROM `categoria` WHERE `nombre`='$catI'"));
	}else{
		$lastcat=mysql_fetch_assoc($check);
	}
	$cat=$lastcat["categoriaid"];
	
}elseif ($catM!=""){
	$cat=$catM;
}

$query="INSERT INTO `prenda` SET `nombre`='".$nom."',`descripcion`='".$des."',`codigo`='".$cod."',`talle`='".$tal."',`color`='".$col."',`categoria`='".$cat."', `new`='".$new."'";
if (mysql_query($query)){
	echo "<p>¡Item agregado a $tabla correctamente!(id: ".mysql_insert_id().")</p>";
	$relid=mysql_insert_id();
	if (!empty($_FILES["img1"])){
		$name_media_field="img1";
		$destination_dir="../include/img/content/";
		subirImg($name_media_field,$destination_dir,$tabla,$relid);
	}
	if (!empty($_FILES["img2"])){
		$name_media_field="img2";
		$destination_dir="../include/img/content/";
		subirImg2($name_media_field,$destination_dir,$tabla,$relid);
	}
}else{
	echo '<p>Error al ingresar el elemento a $tabla, inténtelo de nuevo.</p>';
}
?>
<?="<a href='?do=agregar $tabla'>Agregar otro: $tabla</a>"?>
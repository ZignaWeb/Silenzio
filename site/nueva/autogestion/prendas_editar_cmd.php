
<?
$tabla="prenda";
echo '<h2>'.$tabla.'</h2>';

$nom=mysql_real_escape_string(trim($_POST["nom"]));
$cod=mysql_real_escape_string(trim($_POST["cod"]));
$tal=mysql_real_escape_string(trim($_POST["tal"]));
$col=mysql_real_escape_string(trim($_POST["col"]));
$des=mysql_real_escape_string(trim($_POST["txt"]));
$i2b=mysql_real_escape_string(trim($_POST["img2borrar"]));
$new=mysql_real_escape_string(trim($_POST["new"]));
if ($new!=1) {$new=0;}
$ago=mysql_real_escape_string(trim($_POST["agotado"]));
if ($ago!=1) {$ago=0;}
$catI=mysql_real_escape_string(trim(strtolower(htmlentities($_POST["catinput"]))));
$catM=mysql_real_escape_string(trim($_POST["catmenu"]));
$ide =mysql_real_escape_string(trim($_POST["ide"]));

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
// i2b
$doQuery="UPDATE `$tabla` SET `nombre`='".$nom."',`descripcion`='".$des."',`codigo`='".$cod."',`talle`='".$tal."',`color`='".$col."',`categoria`='".$cat."', `new`='".$new."', `agotado`='".$ago."' ";
if ($i2b==1) {
	$doQuery.=", `img2`='' ";
}
$doQuery.="WHERE `".$tabla."id`='".$ide."'";

	if (mysql_query($doQuery)){
		echo "<p>¡Actualización de $tabla correcta!</p>";
	}else{
		echo "<p>Error, inténtelo de nuevo.</p><p>".htmlentities($doQuery)."</p>";
	}
	
	if (!empty($_FILES["img"])){
		$name_media_field="img";
		$destination_dir="../include/img/content/";
		$relid=$ide;
		subirImg1($name_media_field,$destination_dir,$tabla,$relid);
	}
	
	if (!empty($_FILES["img2"])){
		$name_media_field="img2";
		$destination_dir="../include/img/content/";
		$relid=$ide;
		subirImg2($name_media_field,$destination_dir,$tabla,$relid);
	}

?>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
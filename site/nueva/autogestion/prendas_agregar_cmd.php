<?
$tabla = "prenda";
echo "<h2>Agregar cmd: $tabla</h2>";

$nom=mysql_real_escape_string(trim($_POST["nom"]));
$cod=mysql_real_escape_string(trim($_POST["cod"]));
$tal=mysql_real_escape_string(trim($_POST["tal"]));
$col=mysql_real_escape_string(trim($_POST["col"]));
$des=mysql_real_escape_string(trim($_POST["txt"]));
$new=mysql_real_escape_string(trim($_POST["new"]));
$ago=mysql_real_escape_string(trim($_POST["agotado"]));
if ($new!=1) {$new=0;}
if ($ago!=1) {$ago=0;}
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

$query="INSERT INTO `prenda` SET `nombre`='".$nom."',`descripcion`='".$des."',`codigo`='".$cod."',`talle`='".$tal."',`color`='".$col."',`categoria`='".$cat."', `new`='".$new."', `agotado`='".$ago."'";
if (mysql_query($query)){
	$relid=mysql_insert_id();
	echo "<p>¡Item agregado a $tabla correctamente!(id: ".mysql_insert_id().")</p>";
	
	if (!empty($_FILES["img"])){
		$destination_dir="../include/img/content/";
		subirImg1('img',$destination_dir,$tabla,$relid);
		echo "subirImg1('img',$destination_dir,$tabla,$relid);";
	}
	
	if (!empty($_FILES["img2"])){
		$destination_dir="../include/img/content/";
		subirImg2('img2',$destination_dir,$tabla,$relid);
		echo "subirImg2('img2',$destination_dir,$tabla,$relid);";
	}
}else{
	echo '<p>Error al ingresar el elemento a $tabla, inténtelo de nuevo.</p>';
}
?>
<?="<a href='?do=agregar $tabla'>Agregar otro: $tabla</a>"?>
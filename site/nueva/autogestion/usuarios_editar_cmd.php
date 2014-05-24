<?
$tabla="usuario";
echo '<h2>'.$tabla.'</h2>';

$usr=mysql_real_escape_string($_POST["usr"]);
$psw=mysql_real_escape_string($_POST["psw"]);
$ide=mysql_real_escape_string($_POST["ide"]);

$doQuery="UPDATE `$tabla` SET nombre='".$usr."',`password`='".$psw."' WHERE `".$tabla."id`='$ide' ";

if ($usr && $psw){

		if (mysql_query($doQuery)){
			echo "<p>¡Actualización de $tabla correcta!</p>";
		}else{
			echo "<p>Error, inténtelo de nuevo.</p><p>".htmlentities($doQuery)."</p>";
		}

}else{
	echo "<p>Todos los campos son obligatorios</p>";
}
?>

<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
<?
$tit=mysql_real_escape_string($_POST["tit"]);
$ide=mysql_real_escape_string($_POST["ide"]);
$tabla="musica";

echo "<h2>$tabla</h2>";

if ($tit && $ide){
	if (mysql_query("UPDATE `".$tabla."` SET `titulo` ='".$tit."' WHERE `".$tabla."id`='$ide'" )){
		echo "<p>$tabla actualizada correctamente</p>";
	}else{
		echo "<p>Error</p>";
	}
}else{
	echo "<p>Todos los campos son obligatorios</p>";
}

?>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
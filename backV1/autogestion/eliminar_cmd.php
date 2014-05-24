<?
$que=mysql_real_escape_string($_GET["que"]);
$ide=mysql_real_escape_string($_GET["id"]);


if ($que=="musica"){
	$file=mysql_fetch_assoc(mysql_query("SELECT * FROM `musica` WHERE `musicaid`='$ide'"));
	$file=str_replace("http://www.silenzio.com.ar/nueva/","../",$file["mp3"]);
	if (mysql_query("DELETE FROM `".$que."` WHERE `".$que."id`='".$ide."'")){
		echo '<p>¡Eliminado: '.ucfirst($que).'!</p>';
		if (!unlink($file)){echo '<p>Ocurrió un error inesperado y no se pudo eliminar el archivo.</p>';}
	}else{
		echo '<p>Error al eliminar ('.$file["mp3"].'), inténtelo de nuevo.</p>';
	}
	
}else{

	if (mysql_query("DELETE FROM `".$que."` WHERE `".$que."id`='".$ide."'")){
		echo '<p>¡Eliminado: '.ucfirst($que).'!</p>';
	}else{
		echo '<p>Error al eliminar el '.$que.', inténtelo de nuevo.</p>';
	}
}
?>
<?="<a href='?do=$que'>Volver: $que</a>"?>
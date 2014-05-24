<?
$tit=mysql_real_escape_string($_POST["tit"]);
$tabla="musica";
$name_media_field="musica";
$destination_dir="../include/mp3/";
mkdir($destination_dir,0777);

echo "<h2>$tabla</h2>";

if (!empty($_FILES[$name_media_field]) || !$tit){

	$tmp_name   = $_FILES[$name_media_field]['tmp_name'];
	$file_type  = $_FILES[$name_media_field]['type'];
	$newFile	= $destination_dir.$_FILES[$name_media_field]['name'];
	$query		= mysql_query("INSERT INTO `".$tabla."` SET `mp3` ='http://www.silenzio.com.ar/nueva/include/mp3/".$_FILES[$name_media_field]['name']."', `titulo` ='".$tit."'" );
	
	if (!file_exists($newFile)){
		if(move_uploaded_file($tmp_name, $newFile)){
			if ($query){
				echo '<p>Mp3 cargado correctamente</p>';
			}else{echo '<p>no se pudo cargar el mp3</p>';}
		}else{echo '<p>No se pudo copiar el archivo al servidor, inténtelo de nuevo</p>';}
	}else{	echo '<p>Un archivo con el mismo nombre existe en el servidor.</p>';}
}else{echo '<p>Todos los campos son obligatorios</p>';}

?>
<?="<a href='?do=agregar $tabla'>Agregar otro: $tabla</a>"?>
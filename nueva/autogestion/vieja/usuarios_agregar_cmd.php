<?
$tabla="usuario";
echo '<h2>Usuarios</h2>';


$usr=mysql_real_escape_string($_POST["usr"]);
$psw=mysql_real_escape_string($_POST["psw"]);

if ($usr!="" && $psw!=""){
	if (mysql_query("INSERT INTO `usuario` SET `nombre`='".$usr."',`password`='".$psw."'")){
		echo '<p>¡Usuario agregado correctamente!</p>';
	}else{
		echo '<p>Error al ingresar el usuario, inténtelo de nuevo.</p>';
	}
}
?>

<?="<a href='?do=agregar $tabla'>Agregar otro: $tabla</a>"?>
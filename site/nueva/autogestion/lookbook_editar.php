<?
$id    = $_GET["id"];
$tabla = "lookbook";
$ud=mysql_fetch_assoc(mysql_query("SELECT * FROM `$tabla` WHERE `".$tabla."id`='$id'"));
$u_n=mysql_num_rows($u_q);

$secciones = array (
);
echo "<h2>$tabla</h2><ol id='admin'>";
foreach($secciones as $key => $val){
	echo '<li class="agBoton"><a href="./?do='.$key.'"><img src="imgs/'.$val.'" title="'.$key.'"/><br />'.$key.'</a></li>';
}

echo '</ol>';
?>
<h3>Editar <?=$tabla?>:</h3><br />
<form action="./?do=actualizar <?=$tabla?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ide" value="<?=$ud[$tabla."id"]?>" />
	<label><span>Titulo</span><input name="tit" value="<?=$ud["titulo"]?>" /></label><br />
    <label><span>Descripcion</span><input name="des" value="<?=$ud["descripcion"]?>" /></label><br />
    <label><span>Foto</span><input name="img" type="file" /></label><br />
    <img src="http://silenzio.com.ar/nueva/include/img/content/sma/<?=$ud["img"]?>" width="100" />
	<input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
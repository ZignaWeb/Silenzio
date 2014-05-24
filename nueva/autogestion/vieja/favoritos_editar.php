<?
$id    = $_GET["id"];
$tabla = "favoritos";
$ud=mysql_fetch_assoc(mysql_query("SELECT * FROM `$tabla` WHERE `".$tabla."id`='$id'"));
echo '</ol>';
?>
<h3>Editar <?=$tabla?>:</h3><br />
<form action="./?do=actualizar <?=$tabla?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ide" value="<?=$ud[$tabla."id"]?>" />
	<label><span>Titulo</span><input name="titulo" value="<?=$ud["titulo"]?>" /></label><br />
    <label><span>Imagen</span><input name="img" type="file" /></label><br />
    <?
	if ($ud["img"]!="") {
	?>
    <img src="http://silenzio.com.ar/nueva/include/img/content/fav/<?=$ud["img"]?>" width="100" /><br />
    <?
	}
	?>
    </fieldset>
	<input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
<?
$id    = $_GET["id"];
$tabla = "campania";
$ud=mysql_fetch_assoc(mysql_query("SELECT * FROM `$tabla` WHERE `".$tabla."id`='$id'"));
$u_n=mysql_num_rows($u_q);


echo "<h2>$tabla</h2>";

?>
<h3>Editar <?=$tabla?>:</h3><br />
<form action="./?do=actualizar <?=$tabla?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ide" value="<?=$ud[$tabla."id"]?>" />
	<label><span>Título</span><input name="tit" value="<?=$ud["titulo"]?>" /></label><br />
    <label><span>Descripcion</span><textarea name="txt" /><?=$ud["descripcion"]?></textarea></label><br />
    <label><span>Imagen</span><input name="img" type="file" /></label><br />
    <img src="http://silenzio.com.ar/nueva/include/img/content/sma/<?=$ud["img"]?>" width="100" />
	<input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
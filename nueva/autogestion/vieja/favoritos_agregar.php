<?
$tabla="favoritos";

echo "<h2>$tabla</h2>";
?>
<h3>Agregar <?=$tabla?>:</h3><br />
<form action="./?do=push <?=$tabla?>" method="post" enctype="multipart/form-data">
	<label><span>titulo</span><input name="titulo" /></label><br />
    <label><span>Imagen</span><input name="img" type="file" /></label>
	<input id="submit" type="submit" />
</form>

<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
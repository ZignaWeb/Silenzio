<?
$id    = $_GET["id"];
$tabla = "promocion";
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
	<label><span>Título</span><input name="tit" value="<?=$ud["titulo"]?>" /></label><br />
    <label><span>Descripcion</span><textarea name="txt"/><?=$ud["descripcion"]?></textarea></label><br />
    <label><span>Imagen</span><input name="img" type="file" /></label><br />
    <img src="http://silenzio.com.ar/nueva/include/img/content/sma/<?=$ud["img"]?>" width="100" />
    <label><span>Fecha inicio: </span>
    	<? $desde=explode("-",$ud["inicio"]);	?>
    	<select name="dAnio"><?=printAnio($desde[0])?></select>
        <select name="dMes"><?=printMes($desde[1])?></select>
        <select name="dDia"><?=printDia($desde[2])?></select>
    </label>
    <label><span>Fecha finalizacion</span>
    	<? $hasta=explode("-",$ud["fin"]);	?>
    	<select name="aAnio"><?=printAnio($hasta[0])?></select>
        <select name="aMes"><?=printMes($hasta[1])?></select>
        <select name="aDia"><?=printDia($hasta[2])?></select>
    </label>
	<input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
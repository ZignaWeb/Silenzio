<?
$tabla="look";
$u_q=mysql_query("SELECT * FROM `$tabla` WHERE 1");
$u_n=mysql_num_rows($u_q);

$secciones = array (
);
echo "<h2>$tabla</h2><ol id='admin'>";
foreach($secciones as $key => $val){
	echo '<li class="agBoton"><a href="./?do='.$key.'"><img src="imgs/'.$val.'" title="'.$key.'"/><br />'.$key.'</a></li>';
}

echo '</ol>';
?>
<h3>Agregar <?=$tabla?>:</h3><br />
<form action="./?do=push <?=$tabla?>" method="post" enctype="multipart/form-data">
	<label><span>Título</span><input name="tit" /></label><br />
    <label><span>Descripcion</span><textarea name="txt" /></textarea></label><br />
    <label><span>Imagen</span><input name="img" type="file" /></label><br />
    <label><span>Fecha inicio</span>
    	<select name="dAnio"><?=printAnio()?></select>
        <select name="dMes"><?=printMes()?></select>
        <select name="dDia"><?=printDia()?></select>
    </label><br />
    <label><span>Fecha finalizacion</span>
    	<select name="aAnio"><?=printAnio()?></select>
        <select name="aMes"><?=printMes()?></select>
        <select name="aDia"><?=printDia()?></select>
    </label><br />
	<input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
<?
$id    = $_GET["id"];
$tabla = "local";
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
<h3>Agregar <?=$tabla?>:</h3><br />
<form action="./?do=actualizar <?=$tabla?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ide" value="<?=$ud[$tabla."id"]?>" />
	<label><span>Ubicación</span><input name="ubi" value="<?=$ud["lugar"]?>" /></label><br />
    <label><span>Provincia</span>
    	<select name="pro">
        	<? 
			$provincias = array('Ciudad de Buenos Aires','Buenos Aires','Catamarca','Chaco','Chubut','Córdoba','Corrientes','Entre Ríos','Formosa','Jujuy','La Pampa','La Rioja','Mendoza','Misiones','Neuquén','Río Negro','Salta','San Juan','San Luis','Santa Cruz','Santa Fe','Santiago del Estero','Tierra del Fuego','Salta', 'Tucumán');
			for ($i=0;$i<count($provincias);$i++){
				echo '<option value="'.$provincias[$i].'"';
				if ($provincias[$i]==$ud["provincia"]) {
					echo ' selected="selected" ';
				}
				echo '>'.$provincias[$i].'</option>';
			}
			?>
        </select>
    </label><br />
    <label><span>Dirección</span><input name="dir" value="<?=$ud["direccion"]?>" /></label><br />
    <label><span>Teléfono</span><input name="tel" value="<?=$ud["telefono"]?>" /></label><br />
    <label><span>Foto</span><input name="img" type="file" /></label><br />
    <img src="http://silenzio.com.ar/nueva/include/img/content/loc/<?=$ud["img"]?>" width="100" />
    <label><span>GoogleMaps</span><textarea name="map"><?=$ud["googleMaps"]?></textarea></label><br />
	<input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
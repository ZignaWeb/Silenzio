<?
$tabla="local";
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
	<label><span>Ubicación</span><input name="ubi" /></label><br />
    <label><span>Provincia</span>
    	<select name="pro">
        	<? 
			$provincias = array('Ciudad de Buenos Aires','Buenos Aires','Catamarca','Chaco','Chubut','Córdoba','Corrientes','Entre Ríos','Formosa','Jujuy','La Pampa','La Rioja','Mendoza','Misiones','Neuquén','Río Negro','Salta','San Juan','San Luis','Santa Cruz','Santa Fe','Santiago del Estero','Tierra del Fuego','Salta', 'Tucumán');
			for ($i=0;$i<count($provincias);$i++){
				echo '<option value="'.$provincias[$i].'">'.$provincias[$i].'</option>';
			}
			?>
        </select></label><br />
    <label><span>Dirección</span><input name="dir" /></label><br />
    <label><span>Teléfono</span><input name="tel" /></label><br />
    <label><span>Foto</span><input name="img" type="file" /></label><br />
    <label><span>GoogleMaps</span><textarea name="map"></textarea></label><br />
	<input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
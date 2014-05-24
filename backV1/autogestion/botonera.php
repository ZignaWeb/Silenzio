<?
$secciones = array (
	"usuario",
	"prenda",
	"promocion",
	"look",
	"campania",
	"local"
);

echo '<ol id="admin">';
foreach($secciones as $key){
	echo '<li><a href="./?do='.$key.'">'.$key.'</a></li>';
}
echo '</ol>';

?>
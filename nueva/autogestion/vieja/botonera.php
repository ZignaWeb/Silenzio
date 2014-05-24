<?
$secciones = array (
	"usuario",
	"prenda",
	"promocion",
	"look",
	"lookbook",
	"campania",
	"local",
	"favoritos"
);

echo '<ol id="admin">';
foreach($secciones as $key){
	echo '<li><a href="./?do='.$key.'">'.$key.'</a></li>';
}
echo '</ol>';

?>
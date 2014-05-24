<?
$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");

$cq=mysql_query("SELECT * FROM `categoria` WHERE 1 ORDER BY `nombre` ASC");
$cn=mysql_num_rows($cq);
	
if ($_GET["c"]!=""){
	$c=strip_tags($_GET["c"]);
	$pq=mysql_query("SELECT * FROM `prenda` WHERE `categoria`='$c'");
	$cdat=mysql_fetch_assoc(mysql_query("SELECT * FROM `categoria` WHERE `categoriaid`='$c'"));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mayoristas <?=ucwords($cdat["nombre"])?></title>
<link href="../include/css/mayorista.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../include/script/jQuery.js"></script>
<script type="text/javascript" src="../include/script/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../include/script/localScripts.js"></script>
</head>

<body id="bod_<?=str_replace(" ","_",$cdat["nombre"])?>" style="background-color:#<?=ramdomPastel()?>">
<div id="pre"></div>
<div id="header">
	<h1 id="logoSwitch"><a href="index.php">
    	<img id="logoNegro" src="../include/img/layout/logos/principal.gif" height="33" width="165" alt="silenzio" /></a>
  </h1>
    <div id="nav">
    	<ol>
        <?
		for ($i=0;$i<$cn;$i++) {
			$cd[$i]=mysql_fetch_assoc($cq);
			echo '<li id="men'.str_replace(" ","_",$cd[$i]["nombre"]).'"><a href="./?c='.$cd[$i]['categoriaid'].'">'.($cd[$i]['nombre']).'</a></li>';
			// echo '#bod_'.str_replace(" ","_",$cd["nombre"]).' #men'.str_replace(" ","_",$cd["nombre"]).' a,';
		}
		?>
      </ol>
    </div>
</div>
	<?
	if ($_GET["c"]!=""){
	?>
<div id="article">
    <ol class="listaModelos">
    	<?
		$pn=mysql_num_rows($pq);
		for ($i=0;$i<$pn;$i++) {
		$pd=mysql_fetch_assoc($pq);
		echo '<li class="litaItem">
            <img class="thumb" src="../nueva/include/img/content/sma/'.$pd["img"].'" width="220" height="250" alt="'.$pd["nombre"].',Código: '.$pd["codigo"].', Talle: '.$pd["talle"].', Color: '.$pd["color"].'">
            <div class="fotoFoot">
                <h3>'.$pd["nombre"].'</h3>
                <p>Código: '.$pd["codigo"].'</p>
                <p>Talle: '.$pd["talle"].'</p>
                <p>Color: '.$pd["color"].'</p>
            </div>
        </li>';
		}
		?>
    </ol>
    <div id="prev"><img src="../include/img/layout/prev.png" alt="Anteriores"></div>
    <div id="next"><img src="../include/img/layout/next.png" alt="Siguientes"></div>
    </div>
    <? }else{?>
    <img id="portadaImg" src="../include/img/mayoristas/portadam.jpg"  />
    <? } ?>
    
    <? if ($_GET["c"]==""){	?>
    <ol id="secMenu">
		<?
        for ($i=0;$i<$cn;$i++) {
            echo '<li id="men'.str_replace(" ","_",$cd[$i]["nombre"]).'"><a href="./?c='.$cd[$i]['categoriaid'].'">'.($cd[$i]['nombre']).'</a></li>';
            // echo '#bod_'.str_replace(" ","_",$cd["nombre"]).' #men'.str_replace(" ","_",$cd["nombre"]).' a,';
        }
        ?>
    </ol>
    <? } ?>
    
<div id="footer">
	<span class="coleccion">Verano 2013</span>
</div>

<div id="fiscal">
    <a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMzUwMTk4MzcxOV1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cuc2lsZW56aW8uY29tLmFyXX0=" target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0" width="44" height="60"></a>
</div>

<div id="outer_container">
<div id="imagePan">
	<div class="container">
       	<img id="panImg" class="panning" alt="imagen" />
        <a id="cerrarPan" href="#">X <span>CERRAR</span></a>
	</div>
    <div id="info">
    	<span id="showhide">Detalles</span>
    	<div id="data"></div>
    </div>
</div>
</div>
<?
function ramdomPastel(){
	$r=dechex(rand(160,240));
	$g=dechex(rand(160,240));
	$b=dechex(rand(160,240));
	return $r.$g.$b;
}
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35281861-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
<?
$dbh = mysql_connect ("MYSQL.silenzio.com.ar", "silenzio", "silen123") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("web");

$cq=mysql_query("SELECT * FROM `categoria` WHERE 1 ORDER BY `nombre` ASC");
$cn=mysql_num_rows($cq);
	
if ($_GET["c"]!=""){
	$c=strip_tags($_GET["c"]);
	$pq=mysql_query("SELECT * FROM `prenda` WHERE `categoria`='$c'");
	$cdat=mysql_fetch_assoc(mysql_query("SELECT * FROM `categoria` WHERE `categoriaid`='$c'"));
}else{
	$pq=mysql_query("SELECT * FROM `prenda` WHERE 1 ORDER BY `prendaid` DESC LIMIT 100 ");
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Mayoristas <?=$cdat["nombre"]?></title>
<link href="../include/css/mayorista.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../include/script/jQuery.js"></script>
<script type="text/javascript" src="../include/script/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../include/script/localScripts.js"></script>
</head>

<body id="bod_<?=str_replace(" ","_",$cdat["nombre"])?>" style="background-color:#<?=ramdomPastel()?>">
<div id="pre"></div>
<header>
	<h1 id="logoSwitch"><a href="index.php">
    	<img src="../include/img/layout/logos/principalPrimavera.gif" height="33" width="165" alt="silenzio" />
    	<img id="logoNegro" src="../include/img/layout/logos/principal.gif" height="33" width="165" alt="silenzio" /></a>
  </h1>
    <nav>
    	<ol>
        <?
		for ($i=0;$i<$cn;$i++) {
			$cd=mysql_fetch_assoc($cq);
			echo '<li><a href="./?c='.$cd['categoriaid'].'">'.($cd['nombre']).'</a></li>';
		}
		?>
      </ol>
    </nav>
</header>
<article>
    <ol class="listaModelos">
    	<?
		$pn=mysql_num_rows($pq);
		for ($i=0;$i<$pn;$i++) {
		$pd=mysql_fetch_assoc($pq);
		echo '<li class="litaItem">
            <img class="thumb" src="../include/img/content/sma/'.$pd["img"].'" width="220" height="250" alt="'.$pd["nombre"].',Código: '.$pd["codigo"].', Talle: '.$pd["talle"].', Color: '.$pd["color"].'">
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
</article>
<footer>New Collection Summer 12/13 <span class="status"></span></footer>
<div id="outer_container">
<div id="imagePan">
	<div class="container">
       	<img id="panImg" class="panning" alt="imagen" />
	</div>
    <div id="info">
    	<span id="showhide">Detalles</span>
    	<div id="data"></div>
    </div>
</div>
</div>
<?
function ramdomPastel(){
	$r=dechex(rand(120,253));
	$g=dechex(rand(120,253));
	$b=dechex(rand(120,253));
	return $r.$g.$b;
}
?>
</body>
</html>
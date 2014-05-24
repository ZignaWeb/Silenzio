<?
$tabla="prenda";
$u_q=mysql_query("SELECT * FROM `$tabla` WHERE 1");
$u_n=mysql_num_rows($u_q);

$secciones = array (
	"agregar $tabla" => "usuarios_agregar.png"
);
echo "<h2>$tabla</h2><ol id='admin'>";
foreach($secciones as $key => $val){
	echo '<li class="agBoton"><a href="./?do='.$key.'">'.$key.'</a></li>';
}
echo '</ol>';
	
if ($u_n>0) {
	echo "<h3>Registro de: $tabla</h3><ol class='listaAdmin'>";
	for ($i=0;$i<$u_n;$i++) {
		$u_d=mysql_fetch_assoc($u_q);
		$c_d=mysql_fetch_assoc(mysql_query("SELECT * FROM `categoria` WHERE categoriaid='".$u_d["categoria"]."'"));
		echo '<li class="itemAdmin">
					<a href="./?do=eliminar&que='.$tabla.'&id='.$u_d[$tabla."id"].'" class="opciones" title="eliminar '.$tabla.'"><img src="imgs/eliminar.png" width="20" height="20" alt="edit" /></a>
					<a href="./?do=editar '.$tabla.'&id='.$u_d[$tabla."id"].'" class="opciones" title="editar '.$tabla.'"><img src="imgs/editar.png" width="20" height="20" alt="edit" /></a>
					
					<img class="thumb" src="../include/img/content/tny/'.$u_d["img"].'"/>
					<div class="thumbtxt">
						<span class="titulo">'.$u_d["nombre"].' - '.$u_d["codigo"].' ('.$c_d["nombre"].')</span><br>
						<span class="descripcion">Talle: '.$u_d["talle"].'</span><br>
						<span class="descripcion">Color: '.$u_d["color"].'</span><br>
					</div>
			</li>';
	}
	echo '</ol>';
}else{
	echo "<p>No hay $tabla para mostrar</p>";
}

?>
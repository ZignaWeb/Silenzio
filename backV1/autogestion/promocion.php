<?
$tabla="promocion";
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
	echo "<h3>$tabla registrados</h3><ol class='listaAdmin'>";
	for ($i=0;$i<$u_n;$i++) {
		$u_d=mysql_fetch_assoc($u_q);
		echo '<li class="itemAdmin">
					<a href="./?do=eliminar&que=usuario&id='.$u_d["usuarioid"].'" class="opciones" title="eliminar usuario">
						<img src="imgs/usuarios_eliminar.png" width="20" height="20" alt="edit" /></a>
					'.$u_d["nombre"].'
			</li>';
	}
	echo '</ol>';
}else{
	echo "<p>No hay $tabla para mostrar</p>";
}

?>
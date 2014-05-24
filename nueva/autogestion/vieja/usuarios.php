<?
$tabla="usuario";
$u_q=mysql_query("SELECT * FROM `$tabla` WHERE 1");
$u_n=mysql_num_rows($u_q);

$secciones = array (
	"agregar usuario" => "usuarios_agregar.png"
);
echo '<h2>Usuarios</h2><ol id="admin">';
foreach($secciones as $key => $val){
	echo '<li class="agBoton"><a href="./?do='.$key.'">'.$key.'</a></li>';
}
echo '</ol>';
	
if ($u_n>0) {
	echo '<h3>Usuarios registrados</h3><ol class="listaAdmin">';
	for ($i=0;$i<$u_n;$i++) {
		$u_d=mysql_fetch_assoc($u_q);
		echo '<li class="itemAdmin">
					<a href="./?do=eliminar&que=usuario&id='.$u_d["usuarioid"].'" class="opciones" title="eliminar usuario"><img src="imgs/eliminar.png" width="20" height="20" alt="edit" /></a>
					<a href="./?do=editar '.$tabla.'&id='.$u_d["usuarioid"].'" class="opciones" title="editar '.$tabla.'"><img src="imgs/editar.png" width="20" height="20" alt="edit" /></a>
					'.$u_d["nombre"].'
			</li>';
	}
	echo '</ol>';
}

?>
<?
$tabla="prenda";
$u_q=mysql_query("SELECT * FROM `$tabla` WHERE 1");
$u_n=mysql_num_rows($u_q);

echo "<h2>$tabla</h2>";
?>
<h3>Agregar <?=$tabla?>:</h3><br />
<form action="./?do=push <?=$tabla?>" method="post" enctype="multipart/form-data">
	<label><span>Nombre</span><input name="nom" /></label><br />
    <label><span>Código</span><input name="cod" /></label><br />
    <label><span>Talles</span><input name="tal" /></label><br />
    <label><span>Color</span><input name="col" /></label><br />
    <label><span>Descripcion</span><textarea name="txt" /></textarea></label><br />
    <label><span>Categoría</span>
    	<select id="catmenu" name="catmenu">
        	<option value="">Elige una categoria de la lista</option>
        	<?
			$cq=mysql_query("SELECT * FROM `categoria` WHERE 1 ORDER BY `nombre` ASC");
			$cn=mysql_num_rows($cq);
			for ($i=0;$i<$cn;$i++){
				$cd=mysql_fetch_assoc($cq);
				echo "<option value='".$cd['categoriaid']."'>".$cd['nombre']."</option>";
			}
			?>
	    </select> <a href="#" id="nuevaCat">Crear Categoria</a>
        <input id="catinput" name="catinput" style="display:none" />
        </label><br />
    <label><span>NEW!</span> <input class="checkbox" type="checkbox" name="new" checked="checked" value="1" /></label><br />
    <label><span>Agotado</span> <input class="checkbox" type="checkbox" name="agotado" value="1" /></label><br />
    <label><span>Imagen</span><input name="img" type="file" /></label><br />
    <label><span>Imagen</span><input name="img2" type="file" /></label>
	<input id="submit" type="submit" />
</form>
<script type="text/javascript">
	$("#nuevaCat").click(function(){
		$("#catinput").css({display:"inline"});
		$("#catmenu").css({display:"none"})
		$(this).css({display:"none"})
	})
</script>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
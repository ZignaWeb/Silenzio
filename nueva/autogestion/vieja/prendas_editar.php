<?
$id    = $_GET["id"];
$tabla = "prenda";
$ud=mysql_fetch_assoc(mysql_query("SELECT * FROM `$tabla` WHERE `".$tabla."id`='$id'"));
echo '</ol>';
?>
<h3>Editar <?=$tabla?>:</h3><br />
<form action="./?do=actualizar <?=$tabla?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ide" value="<?=$ud[$tabla."id"]?>" />
	<label><span>Nombre</span><input name="nom" value="<?=$ud["nombre"]?>" /></label><br />
    <label><span>Código</span><input name="cod" value="<?=$ud["codigo"]?>" /></label><br />
    <label><span>Talles</span><input name="tal" value="<?=$ud["talle"]?>" /></label><br />
    <label><span>Color</span><input name="col" value="<?=$ud["color"]?>" /></label><br />
    <label><span>Descripcion</span><textarea name="txt" /><?=$ud["descripcion"]?></textarea></label><br />
    <label><span>Categoría</span>
    	<select id="catmenu" name="catmenu">
        	<option value="">Elige una categoria de la lista</option>
        	<?
			$cq=mysql_query("SELECT * FROM `categoria` WHERE 1 ORDER BY `nombre` ASC");
			$cn=mysql_num_rows($cq);
			for ($i=0;$i<$cn;$i++){
				$cd=mysql_fetch_assoc($cq);
				
				if ($ud["categoria"]==$cd['categoriaid']){$sel="selected='selected'";}else{$sel="";}
				
				echo "<option value='".$cd['categoriaid']."' $sel>".$cd['nombre']."</option>";
			}
			?>
	    </select> <a href="#" id="nuevaCat">Crear Categoria</a>
        <input id="catinput" name="catinput" style="display:none" />
        </label><br />
    <label><span>NEW!</span> <input class="checkbox" type="checkbox" name="new" <? if ($ud["new"]==1){echo 'checked="checked"';} ?> value="1" /> </label><br />
    <label><span>Agotoado</span> <input class="checkbox" type="checkbox" name="agotado" <? if ($ud["agotado"]==1){echo 'checked="checked"';} ?> value="1" /> </label><br />
    <fieldset>
    <label><span>Imagen</span><input name="img" type="file" /></label><br />
    <?
	if ($ud["img"]!="") {
	?>
    <img src="http://silenzio.com.ar/nueva/include/img/content/sma/<?=$ud["img"]?>" width="100" /><br />
    <?
	}
	?>
    </fieldset>
    <fieldset>
    <label><span>Imagen</span><input name="img2" type="file" /></label><br />
    <?
	if ($ud["img2"]!="") {
	?>
    <img src="http://silenzio.com.ar/nueva/include/img/content/sma/<?=$ud["img2"]?>" width="100" /><br /> 
    <label><span>¿borrar imagen?</span><input class="checkbox" type="checkbox" name="img2borrar" value="1" /></label><br />
    <?
	}
	?>
    </fieldset>
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
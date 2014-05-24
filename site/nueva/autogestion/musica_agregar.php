<?
$tabla="musica";
echo "<h2>$tabla</h2>";

?>
<h3>Agregar <?=$tabla?>:</h3><br />
<form action="./?do=push <?=$tabla?>" method="post" enctype="multipart/form-data">
	<label><span>Titulo</span><input name="tit" /></label><br />
    <label><span>Mp3</span><input name="musica" type="file" /></label><br />
	<input id="submit" type="submit" />
    <span id="cargando" style="display:none">Subiendo archivo, por favor espere</span>
</form>
<script type="text/javascript">
	$("#submit").click(function(){
		$("#cargando").fadeIn(function(){
			$("#submit").attr("disabled","disabled");
			}
		);
	})
</script>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
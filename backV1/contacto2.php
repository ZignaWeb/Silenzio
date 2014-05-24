<div id="boxTicker" class="contacto">
	<div class="boxShadow dosCol colSep">
    	<img src="include/img/layout/contacto/img.gif" height="477" width="400" alt="contacto" />
    </div>
	<div id="contactoFormHolder" class="boxShadow dosCol">
        <h3>Contacto</h3>
        <div id="sendMail">
            <label><span>Nombre</span><input class="formFormat" name="nombre" /></label>
            <label><span>Email</span><input class="formFormat" name="email" /></label>
            <label><span>Teléfono</span><input class="formFormat" name="telefono" /></label>
            <fieldset>
                <label><span>Ventas</span><input type="radio" value="ventas" name="division" checked="checked" /></label>
                <label><span>RRHH</span><input type="radio" value="rrhh" name="division" /></label>
            </fieldset>
            <label><span>Comentario</span><textarea class="formFormat" rows="6" name="mensaje" /></textarea></label>
            <input onclick="sendMail()" id="submit" type="submit" />
        </div>
        <div id="msje"></div>
    </div>
</div>
<script type="text/javascript">
function sendMail(){
	var cat = $("input[@name=division]:checked").val();
		alert(cat);
}
</script>
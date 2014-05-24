<?
$u_q=mysql_query("SELECT * FROM `usuario` WHERE 1");
$u_n=mysql_num_rows($u_q);
$tabla="usuario";
echo '<h2>Usuarios</h2><ol id="admin">';

echo '</ol>';
?>
<h3>Agregar usuario:</h3><br />
<form action="./?do=push usuario" method="post">
	<label><span>Nombre</span><input name="usr" /></label><br />
    <label><span>Contraseña</span><input name="psw" /></label><br />
  <input id="submit" type="submit" />
</form>
<?="<a href='?do=$tabla'>Volver: $tabla</a>"?>
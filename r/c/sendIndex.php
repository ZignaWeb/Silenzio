<?
if($_POST['name'] && $_POST['lastanme'] && $_POST['email'] && $_POST['reemail'] && $_POST['city']) {
		
		$sitio="Silenzio";
		$to = "machado.fran@gmail.com";
		$extraMensaje='';
		
		$nombre=strip_tags($_GET['name']);
		$apellido=strip_tags($_GET['lastname']);
		$email=strip_tags($_GET['email']);
		$reemail=strip_tags($_GET['reemail']);
		$ciucdad=strip_tags($_GET['city']);
		
		
		$emailcontent = "Contacto $sitio
.............................................................................
Nombre: $nombre $apellido
Email: $email 
Ciudad: $ciudad 
.............................................................................

"; 
		
		$e=0;
		$error="";
		$ereg="^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$";
		
		if ( $email=="" || !ereg($ereg, $email)){$error.="El email que ingresaste no es v&aacute;lido. ";$e++;}
			if($email!=$reemail){$error.="Los Emails ingresados no son iguales";$e++;}
		if( $e==0 ) {
			$subject = "Contacto $sitio";
			$headers = "From:" . $email;
			
			if (mail($to,$subject,$emailcontent,$headers)){
				echo "<p class='sent'>¡Gracias por contactarnos <strong>$nombre</strong>!<br />Nos comunicaremos a la brevedad. CLIC AQUI para volver.</p>".$extraMensaje;
				}else{
				echo "<p class='notsent'>Ocurrió un error inesperado. Por favor inténtalo nuevamente. CLIC AQUI para volver.<p/>";
			}
			
			}else{
			echo "<p class='notsent'>".$error." CLIC AQUI para volver.</p>";
		}  		
}else{
	echo "<p class='notsent'>Todos los campos son obligatorios. CLIC AQUI para volver.</p>";
}
?>
<script type="text/javascript">
/* mensaje cambio */
		$(".notsent").click( function () {
			$("#mensaje").fadeOut(function(){
				$("#sendMail").fadeIn();
			});
		});
		$(".sent").click( function () {
			$("#mensaje").fadeOut(function(){
				$('#sendMail').each (function(){
				  this.reset();
				});
				$("#sendMail").fadeIn();
			});
		});
</script>
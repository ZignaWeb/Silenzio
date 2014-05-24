<?
if($_GET['email'] && $_GET['nombre'] && $_GET['telefono'] && $_GET['mensaje']) {
		
		$sitio= "silenzio.com.ar";
		$date = date("d-m-Y");
		$to   = "machado.fran@gmail.com";
		  $to2  = strip_tags($_GET['division']);
		if($to2=="ventas"){$to2="ventamayorista@silenzio.com.ar";}elseif($to2=="rrhh"){$to2="info@silenzio.com.ar";}
		
		$nombre=strip_tags($_GET['nombre']);
		$tel=strip_tags($_GET['telefono']);
		$email=strip_tags($_GET['email']);
		$categoria=strip_tags($_GET['division']);
		$mensaje=htmlentities(strip_tags($_GET['mensaje']));
		$subject = "Contacto $sitio";
		$emailcontent = "----------------------------------------------------------------------------- 
Contacto $sitio
----------------------------------------------------------------------------- 
				
Nombre: $nombre
Email: $email 
Telefono: $tel 
Mensage: $mensaje 

Enviado $date
----------------------------------------------------------------------------- "; 
		
		$e=0;
		$error="";
		$ereg="^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$";
		
		if ( $email=="" || !ereg($ereg, $email)){$error.="El email que ingresaste no es v&aacute;lido. ";$e++;}
		
		if( $e==0 ) {
			
			header ('Location: http://www.asisedice.com');
			
			}else{
			echo "<p class='notsent'>".$error."</p>";
		}  		
}else{
	echo "<p class='notsent'>Todos los campos son obligatorios.";
}
?>
<?php 
if (!$_POST["usr"] || !$_POST["psw"]) { 
	header("Location:./");
}
include("r/main.php");

$myusername = addslashes($_POST["usr"]); 
$mypassword = addslashes($_POST["psw"]);
$qt="SELECT * FROM `".$secciones["adm"]["db"]."` WHERE `".$secciones["adm"]["c"]["usr"]["db"]."`='$myusername' AND `".$secciones["adm"]["c"]["psw"]["db"]."`='$mypassword'";
$q=mysql_query($qt);

$count=mysql_num_rows($q);
if($count==1 || ($_POST["usr"]==$temp["user"]["n"] && $_POST["psw"]==$temp["user"]["p"])){
	$d=mysql_fetch_assoc($q);
	$myuserid=$d["id"];
	$mypermisos=$d["level"];
	$timeout=time();
	session_register("myusername");
	session_register("myuserid");
	session_register("mypermisos");
	session_register("timeout");
	header("Location:./");
} else {
	header("Location:./?e=usrpsw");
}
?>
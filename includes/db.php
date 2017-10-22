<?php
if ($_SERVER['HTTP_HOST'] == 'multitudetech.com' || $_SERVER['HTTP_HOST'] == 'www.multitudetech.com' || $_SERVER['HTTP_HOST'] == 'shivom.multitudetech.com'){
	$db_username = "u197245873_shiv";
	$db_password = "A3P6m6fs9Hit";
	$db_name = "u197245873_shiv";
	$db_host = "localhost";
}
else {
 	$db_username = "root";
	$db_password = "root";
	$db_name = "shivom";
	$db_host = "localhost";
}
$dbh=mysql_connect($db_host, $db_username, $db_password) or die ('You need to set your database connection in includes/db.php.</td></tr></table></body></html>');
mysql_select_db($db_name) or die ('You need to set your database connection in includes/db.php.</td></tr></table></body></html>');
?>
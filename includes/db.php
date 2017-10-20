<?php
if ($_SERVER['HTTP_HOST'] == ''){
	
}	else {
 	$db_username = "root";
	$db_password = "root";
	$db_name = "shivom";
	$db_host = "localhost";
}
$dbh=mysql_connect($db_host, $db_username, $db_password) or die ('You need to set your database connection in includes/db.php.</td></tr></table></body></html>');
mysql_select_db($db_name) or die ('You need to set your database connection in includes/db.php.</td></tr></table></body></html>');
?>
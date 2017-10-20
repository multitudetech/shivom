<?php
include_once 'includes/custom_functions.php';
include_once 'includes/check_login.php';
if($_SESSION['role']=='1'){
	//header("location: projects.php");
	die();
}
elseif($_SESSION['role']=='2'){
	header("location: work_order.php");
	die();
}
?>
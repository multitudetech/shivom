<?php
//display error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "db.php"; //include db file
include_once "functions.php"; // include function file
if(isset($_POST)){
	if(isset($_POST['drg_type'])&&$_POST['drg_type']!=''){
		$drg_type = $_POST['drg_type'];
	}else{
		$_SESSION['error'] = "Enter Drawing Type";
		error_drg();
	}
	if(isset($_POST['drg_no'])&&$_POST['drg_no']!=''){
		$drg_no = $_POST['drg_no'];
	}else{
		$_SESSION['error'] = "Enter Drg No";
		error_drg();
	}
	if(isset($_POST['description'])&&$_POST['description']!=''){
		$description = $_POST['description'];
	}else{
		$_SESSION['error'] = "Enter Description";
		error_drg();
	}

	$insert_query = "INSERT INTO drawing (`drg_type`, `drg_no`, `description`)
				VALUES ('".$drg_type."', '".$drg_no."', '".$description."');";
	mysqli_query($con, $insert_query);

	$_SESSION['success'] = "Drawing Successfully Added";
	success();
}
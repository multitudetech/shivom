<?php
//display error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "db.php"; //include db file
include_once "functions.php"; // include function file
if(isset($_POST)){
	if(isset($_POST['drawing_no'])&&$_POST['drawing_no']!=''){
		$drawing_no = $_POST['drawing_no'];
	}else{
		$_SESSION['error'] = "Enter Drawing No";
		error_drg();
	}
	if(isset($_POST['customer_drawing_no'])&&$_POST['customer_drawing_no']!=''){
		$customer_drawing_no = $_POST['customer_drawing_no'];
	}else{
		$_SESSION['error'] = "Enter Customer Drawing No";
		error_drg();
	}
	if(isset($_POST['description'])&&$_POST['description']!=''){
		$description = $_POST['description'];
	}else{
		$_SESSION['error'] = "Enter Description";
		error_drg();
	}

	$insert_query = "INSERT INTO drawing (`drawing_no`, `customer_drawing_no`, `description`)
				VALUES ('".$drawing_no."', '".$customer_drawing_no."', '".$description."');";
	mysqli_query($con, $insert_query);

	$_SESSION['success'] = "Drawing Successfully Added";
	success();
}
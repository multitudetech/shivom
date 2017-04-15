<?php
//display error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "db.php"; //include db file
include_once "functions.php"; // include function file

if(isset($_POST)){
	if(isset($_POST['order_no'])&&$_POST['order_no']!=''){
		$order_no = $_POST['order_no'];
		$check_order_exist = "SELECT order_no FROM brass_detail WHERE order_no='".$order_no."'";
		$res = mysqli_query($con, $check_order_exist);
		$data = mysqli_fetch_assoc($res);
		if(count($data)>0){

			if(isset($_POST['date'])&&$_POST['date']!=''){
				$date = $_POST['date'];
				$date = changeDateFormatStoreToDB($date);
			}else{
				$_SESSION['error'] = "Enter Date";
				error();
			}
			if(isset($_POST['batch_no'])&&$_POST['batch_no']!=''){
				$batch_no = $_POST['batch_no'];
			}else{
				$_SESSION['error'] = "Enter Batch No";
				error();
			}
			if(isset($_POST['kg'])&&$_POST['kg']!=''){
				$kg = $_POST['kg'];
			}else{
				$_SESSION['error'] = "Enter Kg";
				error();
			}
			if(isset($_POST['per_100_wt'])&&$_POST['per_100_wt']!=''){
				$per_100_wt = $_POST['per_100_wt'];
			}else{
				$_SESSION['error'] = "Enter 100 W/T";
				error();
			}
			if(isset($_POST['pcs'])&&$_POST['pcs']!=''){
				$pcs = $_POST['pcs'];
			}else{
				$_SESSION['error'] = "Enter PCs";
				error();
			}
			if(isset($_POST['rejection_kg'])&&$_POST['rejection_kg']!=''){
				$rejection_kg = $_POST['rejection_kg'];
			}else{
				$_SESSION['error'] = "Enter Rejection Kg";
				error();
			}
			if(isset($_POST['rejection_pcs'])&&$_POST['rejection_pcs']!=''){
				$rejection_pcs = $_POST['rejection_pcs'];
			}else{
				$_SESSION['error'] = "Enter Rejection Pcs";
				error();
			}
			if(isset($_POST['ok_pcs'])&&$_POST['ok_pcs']!=''){
				$ok_pcs = $_POST['ok_pcs'];
			}else{
				$_SESSION['error'] = "Enter Ok PCs";
				error();
			}

			$insert_query = "INSERT INTO inward_entry (`order_no`, `date`, `batch_no`, `kg`, `per_100_wt`,`pcs`, `rejection_kg`, `rejection_pcs`, `ok_pcs`)
				VALUES ('".$order_no."', '".$date."', '".$batch_no."', '".$kg."', '".$per_100_wt."', '".$pcs."', '".$rejection_kg."', '".$rejection_pcs."', '".$ok_pcs."');";
			mysqli_query($con, $insert_query);

			$_SESSION['success'] = "Inward entry successfully saved";
			redirect();
		}
		else{
			$_SESSION['error'] = "Bed Request!!";
			error();	
		}
	}
}
else{
	$_SESSION['error'] = "It's not post request!!";
	error();
}
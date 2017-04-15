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
			if(isset($_POST['size'])&&$_POST['size']!=''){
				$size = $_POST['size'];
			}else{
				$_SESSION['error'] = "Enter Size";
				error();
			}
			if(isset($_POST['gross_weight'])&&$_POST['gross_weight']!=''){
				$gross_weight = $_POST['gross_weight'];
			}else{
				$_SESSION['error'] = "Enter Gross Weight";
				error();
			}
			if(isset($_POST['kg'])&&$_POST['kg']!=''){
				$kg = $_POST['kg'];
			}else{
				$_SESSION['error'] = "Enter Kg";
				error();
			}
			if(isset($_POST['pcs'])&&$_POST['pcs']!=''){
				$pcs = $_POST['pcs'];
			}else{
				$_SESSION['error'] = "Enter PCs";
				error();
			}

			$insert_query = "INSERT INTO outward_entry (`order_no`, `date`, `batch_no`, `size`, `gross_weight`, `kg`, `pcs`)
				VALUES ('".$order_no."', '".$date."', '".$batch_no."', '".$size."', '".$gross_weight."', '".$kg."', '".$pcs."');";
			mysqli_query($con, $insert_query);

			$_SESSION['success'] = "Outward entry successfully saved";
			redirect();
		}
		else{
			$_SESSION['error'] = "Bed Request!!";
			error();	
		}
	}
	else{
		$_SESSION['error'] = "Bed Request!!";
		error();
	}
}
else{
	$_SESSION['error'] = "It's not post request!!";
	error();
}
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
		$_SESSION['error'] = "Select Drawing No";
		error();
	}
	if(isset($_POST['customer_drawing_no'])&&$_POST['customer_drawing_no']!=''){
		$customer_drawing_no = $_POST['customer_drawing_no'];
	}else{
		$_SESSION['error'] = "Enter Customer Drawing No";
		error();
	}
	if(isset($_POST['description'])&&$_POST['description']!=''){
		$description = $_POST['description'];
	}else{
		$_SESSION['error'] = "Enter Description";
		error();
	}
	if(isset($_POST['order_no'])&&$_POST['order_no']!=''){
		$order_no = $_POST['order_no'];
	}else{
		$_SESSION['error'] = "Enter Order Number";
		error();
	}
	if(isset($_POST['date'])&&$_POST['date']!=''){
		$date = $_POST['date'];
		$date = changeDateFormatStoreToDB($date);
	}else{
		$_SESSION['error'] = "Enter Date";
		error();
	}
	if(isset($_POST['oa_no'])&&$_POST['oa_no']!=''){
		$oa_no = $_POST['oa_no'];
	}else{
		$_SESSION['error'] = "Enter Date";
		error();
	}
	if(isset($_POST['order_qty'])&&$_POST['order_qty']!=''){
		$order_qty = $_POST['order_qty'];
	}else{
		$_SESSION['error'] = "Enter Order Qty";
		error();
	}
	if(isset($_POST['solid_wt'])&&$_POST['solid_wt']!=''){
		$solid_wt = $_POST['solid_wt'];
	}else{
		$_SESSION['error'] = "Enter Solid W/T";
		error();
	}
	if(isset($_POST['finish_wt'])&&$_POST['finish_wt']!=''){
		$finish_wt = $_POST['finish_wt'];
	}else{
		$_SESSION['error'] = "Enter Finish W/T";
		error();
	}
	if(isset($_POST['chips_wt'])&&$_POST['chips_wt']!=''){
		$chips_wt = $_POST['chips_wt'];
	}else{
		$_SESSION['error'] = "Enter Chips W/T";
		error();
	}
	if(isset($_POST['required_rod'])&&$_POST['required_rod']!=''){
		$required_rod = $_POST['required_rod'];
	}else{
		$_SESSION['error'] = "Enter Total Rod Required";
		error();
	}
	if(isset($_POST['rod_rate'])&&$_POST['rod_rate']!=''){
		$rod_rate = $_POST['rod_rate'];
	}else{
		$_SESSION['error'] = "Enter Rod Rate";
		error();
	}
	if(isset($_POST['chips_rate'])&&$_POST['chips_rate']!=''){
		$chips_rate = $_POST['chips_rate'];
	}else{
		$_SESSION['error'] = "Enter Chips Rate";
		error();
	}
	if(isset($_POST['labour_cost'])&&$_POST['labour_cost']!=''){
		$labour_cost = $_POST['labour_cost'];
	}else{
		$_SESSION['error'] = "Enter Labour Cost";
		error();
	}
	if(isset($_POST['assembly_cost'])&&$_POST['assembly_cost']!=''){
		$assembly_cost = $_POST['assembly_cost'];
	}else{
		$_SESSION['error'] = "Enter Assembly Cost";
		error();
	}
	if(isset($_POST['processing_cost'])&&$_POST['processing_cost']!=''){
		$processing_cost = $_POST['processing_cost'];
	}else{
		$_SESSION['error'] = "Enter Processing Cost";
		error();
	}
	if(isset($_POST['plating_cost'])&&$_POST['plating_cost']!=''){
		$plating_cost = $_POST['plating_cost'];
	}else{
		$_SESSION['error'] = "Enter Plating Cost";
		error();
	}
	if(isset($_POST['debarring_cost'])&&$_POST['debarring_cost']!=''){
		$debarring_cost = $_POST['debarring_cost'];
	}else{
		$_SESSION['error'] = "Enter Debarring Cost";
		error();
	}
	$other_cost_1 = $_POST['other_cost_1'];
	$other_cost_2 = $_POST['other_cost_2'];
	$other_cost_3 = $_POST['other_cost_3'];
	if(isset($_POST['final_cost'])&&$_POST['final_cost']!=''){
		$final_cost = $_POST['final_cost'];
	}else{
		$_SESSION['error'] = "Enter Final Cost";
		error();
	}

	//check order exist or not
	$check_order_exist = "SELECT order_no FROM brass_detail WHERE order_no='".$order_no."'";
	$res = mysqli_query($con, $check_order_exist);
	$data = mysqli_fetch_assoc($res);
	if(count($data)>0){
		$_SESSION['error'] = "order <span>".$order_no."</span> already exist";
		error();
	}else{
		//store in db
		$insert_query = "INSERT INTO brass_detail (`order_no`, `drawing_id`, `date`, `oa_no`, `order_qty`, `solid_wt`, `finish_wt`, `chips_wt`, `required_rod`, `rod_rate`, `chips_rate`, `labour_cost`, `assembly_cost`, `processing_cost`, `plating_cost`, `debarring_cost`, `other_cost_1`, `other_cost_2`, `other_cost_3`, `final_cost`, `customer_drawing_no`, `description`)
				VALUES ('".$order_no."', '".$drawing_no."', '".$date."', '".$oa_no."', '".$order_qty."', '".$solid_wt."', '".$finish_wt."', '".$chips_wt."', '".$required_rod."', '".$rod_rate."', '".$chips_rate."', '".$labour_cost."', '".$assembly_cost."', '".$processing_cost."', '".$plating_cost."', '".$debarring_cost."', '".$other_cost_1."', '".$other_cost_2."', '".$other_cost_3."', '".$final_cost."', '".$customer_drawing_no."', '".$description."');";
		mysqli_query($con, $insert_query);

		$_SESSION['success'] = "order <span>".$order_no."</span> successfully saved";
		success();
	}
}
else{
	$_SESSION['error'] = "It's not post request!!";
	error();
}
?>
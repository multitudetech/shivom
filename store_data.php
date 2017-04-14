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
		$_SESSION['error'] = "Select Drawing Type";
		error();
	}
	if(isset($_POST['drg_no'])&&$_POST['drg_no']!=''){
		$drg_no = $_POST['drg_no'];
	}else{
		$_SESSION['error'] = "Enter Drg No";
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
	if(isset($_POST['order_qty'])&&$_POST['order_qty']!=''){
		$order_qty = $_POST['order_qty'];
	}else{
		$_SESSION['error'] = "Enter Order Qty";
		error();
	}
	if(isset($_POST['pcs_wt_100'])&&$_POST['pcs_wt_100']!=''){
		$pcs_wt_100 = $_POST['pcs_wt_100'];
	}else{
		$_SESSION['error'] = "Enter 100 Pcs wt";
		error();
	}
	if(isset($_POST['rate'])&&$_POST['rate']!=''){
		$rate = $_POST['rate'];
	}else{
		$_SESSION['error'] = "Enter Rate";
		error();
	}
	if(isset($_POST['labour'])&&$_POST['labour']!=''){
		$labour = $_POST['labour'];
	}else{
		$_SESSION['error'] = "Enter Labour";
		error();
	}
	if(isset($_POST['rod'])&&$_POST['rod']!=''){
		$rod = $_POST['rod'];
	}else{
		$_SESSION['error'] = "Enter Rod";
		error();
	}
	if(isset($_POST['chhol'])&&$_POST['chhol']!=''){
		$chhol = $_POST['chhol'];
	}else{
		$_SESSION['error'] = "Enter Chhol";
		error();
	}
	if(isset($_POST['required_rod'])&&$_POST['required_rod']!=''){
		$required_rod = $_POST['required_rod'];
	}else{
		$_SESSION['error'] = "Enter Required Rod";
		error();
	}
	if(isset($_POST['refund_chhips'])&&$_POST['refund_chhips']!=''){
		$refund_chhips = $_POST['refund_chhips'];
	}else{
		$_SESSION['error'] = "Enter Refund Chhips";
		error();
	}
	if(isset($_POST['refund_material'])&&$_POST['refund_material']!=''){
		$refund_material = $_POST['refund_material'];
	}else{
		$_SESSION['error'] = "Enter Refund Material";
		error();
	}
	if(isset($_POST['description'])&&$_POST['description']!=''){
		$description = $_POST['description'];
	}else{
		$_SESSION['error'] = "Enter Description";
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
		$insert_query = "INSERT INTO brass_detail (`order_no`, `date`, `order_qty`, `pcs_wt_100`, `rate`, `labour`, `drg_no`, `rod`, `chhol`, `required_rod`, `refund_chhips`, `refund_material`, `description`, `drg_type`)
				VALUES ('".$order_no."', '".$date."', '".$order_qty."', '".$pcs_wt_100."', '".$rate."', '".$labour."', '".$drg_no."', '".$rod."', '".$chhol."', '".$required_rod."', '".$refund_chhips."', '".$refund_material."', '".$description."', '".$drg_type."');";
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
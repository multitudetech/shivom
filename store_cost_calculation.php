<?php
//display error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "db.php"; //include db file
include_once "functions.php"; // include function file

if(isset($_POST)){
	if(isset($_POST['ampl_part_no'])&&$_POST['ampl_part_no']!=''){
		$ampl_part_no = $_POST['ampl_part_no'];
	}else{
		$_SESSION['error'] = "Enter AMPL Part No";
		error();
	}

	if(isset($_POST['rod_size'])&&$_POST['rod_size']!=''){
		$rod_size = $_POST['rod_size'];
	}else{
		$_SESSION['error'] = "Enter Rod Size";
		error();
	}

	if(isset($_POST['drawing_no'])&&$_POST['drawing_no']!=''){
		$drawing_no = $_POST['drawing_no'];
	}else{
		$_SESSION['error'] = "Enter Drawign No";
		error();
	}

	if(isset($_POST['basic_rate'])&&$_POST['basic_rate']!=''){
		$basic_rate = $_POST['basic_rate'];
	}else{
		$_SESSION['error'] = "Enter Basic Rate";
		error();
	}

	$job_charge = $_POST['job_charge'];
	$size_premimum = $_POST['size_premimum'];
	$loe = $_POST['loe'];
	$holo = $_POST['holo'];

	if(isset($_POST['twenty_per'])&&$_POST['twenty_per']!=''){
		$twenty_per = $_POST['twenty_per'];
	}else{
		$_SESSION['error'] = "Enter 2.20%";
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

	if(isset($_POST['solid_wait'])&&$_POST['solid_wait']!=''){
		$solid_wait = $_POST['solid_wait'];
	}else{
		$_SESSION['error'] = "Enter Solid Wait";
		error();
	}

	if(isset($_POST['finish_wait'])&&$_POST['finish_wait']!=''){
		$finish_wait = $_POST['finish_wait'];
	}else{
		$_SESSION['error'] = "Enter Finish Wait";
		error();
	}

	if(isset($_POST['chips_wait'])&&$_POST['chips_wait']!=''){
		$chips_wait = $_POST['chips_wait'];
	}else{
		$_SESSION['error'] = "Enter Chips Wait";
		error();
	}

	if(isset($_POST['solid_amount'])&&$_POST['solid_amount']!=''){
		$solid_amount = $_POST['solid_amount'];
	}else{
		$_SESSION['error'] = "Enter Solid Amount";
		error();
	}

	if(isset($_POST['chips_reclaim'])&&$_POST['chips_reclaim']!=''){
		$chips_reclaim = $_POST['chips_reclaim'];
	}else{
		$_SESSION['error'] = "Enter Chips Reclaim";
		error();
	}

	if(isset($_POST['net_material_amount'])&&$_POST['net_material_amount']!=''){
		$net_material_amount = $_POST['net_material_amount'];
	}else{
		$_SESSION['error'] = "Enter Net Material Amount";
		error();
	}

	if(isset($_POST['pallet_cycle_time'])&&$_POST['pallet_cycle_time']!=''){
		$pallet_cycle_time = $_POST['pallet_cycle_time'];
	}else{
		$_SESSION['error'] = "Enter Pallet Cycle Time";
		error();
	}

	if(isset($_POST['piece_per_pallete'])&&$_POST['piece_per_pallete']!=''){
		$piece_per_pallete = $_POST['piece_per_pallete'];
	}else{
		$_SESSION['error'] = "Enter Piece per pallete";
		error();
	}

	if(isset($_POST['one_piece_cycle_time'])&&$_POST['one_piece_cycle_time']!=''){
		$one_piece_cycle_time = $_POST['one_piece_cycle_time'];
	}else{
		$_SESSION['error'] = "Enter One piece cycle time";
		error();
	}

	if(isset($_POST['time_of_mfg'])&&$_POST['time_of_mfg']!=''){
		$time_of_mfg = $_POST['time_of_mfg'];
	}else{
		$_SESSION['error'] = "Enter Time of mfg";
		error();
	}

	if(isset($_POST['total_pcs'])&&$_POST['total_pcs']!=''){
		$total_pcs = $_POST['total_pcs'];
	}else{
		$_SESSION['error'] = "Enter Total Pcs";
		error();
	}

	if(isset($_POST['pcs_per_hour'])&&$_POST['pcs_per_hour']!=''){
		$pcs_per_hour = $_POST['pcs_per_hour'];
	}else{
		$_SESSION['error'] = "Enter Pcs per hour";
		error();
	}

	if(isset($_POST['per_days_hour'])&&$_POST['per_days_hour']!=''){
		$per_days_hour = $_POST['per_days_hour'];
	}else{
		$_SESSION['error'] = "Enter Per days hour";
		error();
	}

	if(isset($_POST['pcs_per_23_hrs'])&&$_POST['pcs_per_23_hrs']!=''){
		$pcs_per_23_hrs = $_POST['pcs_per_23_hrs'];
	}else{
		$_SESSION['error'] = "Enter Pcs per 23 hour";
		error();
	}

	if(isset($_POST['month_per_day'])&&$_POST['month_per_day']!=''){
		$month_per_day = $_POST['month_per_day'];
	}else{
		$_SESSION['error'] = "Enter Month per day";
		error();
	}

	if(isset($_POST['total_pcs_25_days'])&&$_POST['total_pcs_25_days']!=''){
		$total_pcs_25_days = $_POST['total_pcs_25_days'];
	}else{
		$_SESSION['error'] = "Enter Total Pcs 25 days";
		error();
	}

	if(isset($_POST['cnc_exp_month'])&&$_POST['cnc_exp_month']!=''){
		$cnc_exp_month = $_POST['cnc_exp_month'];
	}else{
		$_SESSION['error'] = "Enter CNC Exp Month";
		error();
	}

	if(isset($_POST['per_pcs_labour'])&&$_POST['per_pcs_labour']!=''){
		$per_pcs_labour = $_POST['per_pcs_labour'];
	}else{
		$_SESSION['error'] = "Enter Per pcs labour";
		error();
	}

	if(isset($_POST['kg_per_hour'])&&$_POST['kg_per_hour']!=''){
		$kg_per_hour = $_POST['kg_per_hour'];
	}else{
		$_SESSION['error'] = "Enter Kg per hour";
		error();
	}

	if(isset($_POST['wait_per_100_pcs'])&&$_POST['wait_per_100_pcs']!=''){
		$wait_per_100_pcs = $_POST['wait_per_100_pcs'];
	}else{
		$_SESSION['error'] = "Enter Wait per 100 pcs";
		error();
	}

	if(isset($_POST['labour_per_kg'])&&$_POST['labour_per_kg']!=''){
		$labour_per_kg = $_POST['labour_per_kg'];
	}else{
		$_SESSION['error'] = "Enter labour per kg";
		error();
	}

	if(isset($_POST['quentity'])&&$_POST['quentity']!=''){
		$quentity = $_POST['quentity'];
	}else{
		$_SESSION['error'] = "Enter quentity";
		error();
	}

	if(isset($_POST['days'])&&$_POST['days']!=''){
		$days = $_POST['days'];
	}else{
		$_SESSION['error'] = "Enter days";
		error();
	}

	if(isset($_POST['holidays'])&&$_POST['holidays']!=''){
		$holidays = $_POST['holidays'];
	}else{
		$_SESSION['error'] = "Enter holidays";
		error();
	}

	if(isset($_POST['weekly_off'])&&$_POST['weekly_off']!=''){
		$weekly_off = $_POST['weekly_off'];
	}else{
		$_SESSION['error'] = "Enter weekly off";
		error();
	}

	if(isset($_POST['start_date'])&&$_POST['start_date']!=''){
		$start_date = $_POST['start_date'];
		$start_date = changeDateFormatStoreToDB($start_date);
	}else{
		$_SESSION['error'] = "Enter start date";
		error();
	}

	if(isset($_POST['end_date'])&&$_POST['end_date']!=''){
		$end_date = $_POST['end_date'];
		$end_date = changeDateFormatStoreToDB($end_date);
	}else{
		$_SESSION['error'] = "Enter end date";
		error();
	}

	if(isset($_POST['cnc_production_count'])&&$_POST['cnc_production_count']!=''){
		$cnc_production_count = $_POST['cnc_production_count'];
	}else{
		$_SESSION['error'] = "Enter cnc production count";
		error();
	}

	if(isset($_POST['labour_cost'])&&$_POST['labour_cost']!=''){
		$labour_cost = $_POST['labour_cost'];
	}else{
		$_SESSION['error'] = "Enter labour cost";
		error();
	}

	if(isset($_POST['machine_expense'])&&$_POST['machine_expense']!=''){
		$machine_expense = $_POST['machine_expense'];
	}else{
		$_SESSION['error'] = "Enter machine expense";
		error();
	}

	if(isset($_POST['total_labour'])&&$_POST['total_labour']!=''){
		$total_labour = $_POST['total_labour'];
	}else{
		$_SESSION['error'] = "Enter total labour";
		error();
	}

	if(isset($_POST['pf_20_per'])&&$_POST['pf_20_per']!=''){
		$pf_20_per = $_POST['pf_20_per'];
	}else{
		$_SESSION['error'] = "Enter PF 20 per";
		error();
	}

	if(isset($_POST['total_labour_pf'])&&$_POST['total_labour_pf']!=''){
		$total_labour_pf = $_POST['total_labour_pf'];
	}else{
		$_SESSION['error'] = "Enter Total Labour PF";
		error();
	}

	if(isset($_POST['platting_kg'])&&$_POST['platting_kg']!=''){
		$platting_kg = $_POST['platting_kg'];
	}else{
		$_SESSION['error'] = "Enter Platting Kg";
		error();
	}

	if(isset($_POST['platting_amount'])&&$_POST['platting_amount']!=''){
		$platting_amount = $_POST['platting_amount'];
	}else{
		$_SESSION['error'] = "Enter Platting Amount";
		error();
	}

	if(isset($_POST['extra_charge'])&&$_POST['extra_charge']!=''){
		$extra_charge = $_POST['extra_charge'];
	}else{
		$_SESSION['error'] = "Enter Extra Charge";
		error();
	}

	if(isset($_POST['material_vabour_cost'])&&$_POST['material_vabour_cost']!=''){
		$material_vabour_cost = $_POST['material_vabour_cost'];
	}else{
		$_SESSION['error'] = "Enter Material + Labour Cost";
		error();
	}

	//if(isset($_POST['euro'])&&$_POST['euro']!=''){
		$euro = $_POST['euro'];
	// }else{
	// 	$_SESSION['error'] = "Enter Euro";
	// 	error();
	// }

	if(isset($_POST['final_inr'])&&$_POST['final_inr']!=''){
		$final_inr = $_POST['final_inr'];
	}else{
		$_SESSION['error'] = "Enter Final INR";
		error();
	}

	if(isset($_POST['percentage'])&&$_POST['percentage']!=''){
		$percentage = $_POST['percentage'];
	}else{
		$_SESSION['error'] = "Enter %";
		error();
	}

	if(isset($_POST['quentity'])&&$_POST['quentity']!=''){
		$quentity = $_POST['quentity'];
	}else{
		$_SESSION['error'] = "Enter quentity";
		error();
	}

	if(isset($_POST['rod_kg'])&&$_POST['rod_kg']!=''){
		$rod_kg = $_POST['rod_kg'];
	}else{
		$_SESSION['error'] = "Enter Rod Kg";
		error();
	}

	//store data part
	$insert_query = "INSERT INTO costing_tool (ampl_part_no, rod_size, drawing_no, basic_rate, job_charge, size_premimum, loe, holo, twenty_per, rod_rate, chips_rate, solid_wait, finish_wait, chips_wait, solid_amount, chips_reclaim, net_material_amount, pallet_cycle_time, piece_per_pallete, one_piece_cycle_time, time_of_mfg, total_pcs, pcs_per_hour, per_days_hour, pcs_per_23_hrs, month_per_day, total_pcs_25_days, cnc_exp_month, per_pcs_labour, kg_per_hour, wait_per_100_pcs, labour_per_kg, days, holidays, weekly_off, start_date, end_date, cnc_production_count, labour_cost, machine_expense, total_labour, pf_20_per, total_labour_pf, platting_kg, platting_amount, extra_charge, material_vabour_cost, euro, final_inr, percentage, quentity, rod_kg)
	VALUES ('".$ampl_part_no."', '".$rod_size."', '".$drawing_no."', '".$basic_rate."', '".$job_charge."', '".$size_premimum."', '".$loe."', '".$holo."', '".$twenty_per."', '".$rod_rate."', '".$chips_rate."', '".$solid_wait."', '".$finish_wait."', '".$chips_wait."', '".$solid_amount."', '".$chips_reclaim."', '".$net_material_amount."', '".$pallet_cycle_time."', '".$piece_per_pallete."', '".$one_piece_cycle_time."', '".$time_of_mfg."', '".$total_pcs."', '".$pcs_per_hour."', '".$per_days_hour."', '".$pcs_per_23_hrs."', '".$month_per_day."', '".$total_pcs_25_days."', '".$cnc_exp_month."', '".$per_pcs_labour."', '".$kg_per_hour."', '".$wait_per_100_pcs."', '".$labour_per_kg."', '".$days."', '".$holidays."', '".$weekly_off."', '".$start_date."', '".$end_date."', '".$cnc_production_count."', '".$labour_cost."', '".$machine_expense."', '".$total_labour."', '".$pf_20_per."', '".$total_labour_pf."', '".$platting_kg."', '".$platting_amount."', '".$extra_charge."', '".$material_vabour_cost."', '".$euro."', '".$final_inr."', '".$percentage."', '".$quentity."', '".$rod_kg."')";
	mysqli_query($con, $insert_query);

	$_SESSION['success'] = "Successfully saved";
	success();
}
else{
	$_SESSION['error'] = "It's not post request!!";
	error();
}
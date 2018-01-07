<?php
$_data = $_POST;
unset($_POST);
if($_data['wo_id']==""){	//Check WO available
	//create WO
	$data = insertlog();
	$wo_id = insert('work_order', $data, $dbh);
}
else{
	//WO Available
	$wo_id = $_data['wo_id'];
}

//add data to WO Items
$data1['work_order_id'] = $wo_id;
$data1['machine_id'] = $_data['machine_id'];
$data1['ampl_part_no'] = $_data['ampl_part_no'];
$data1['rod_size'] = $_data['rod_size'];
$data1['drawing_no'] = $_data['drawing_no'];
$data1['basic_rate'] = $_data['basic_rate'];
$data1['job_charge'] = $_data['job_charge'];
$data1['size_premimum'] = $_data['size_premimum'];
$data1['loe'] = $_data['loe'];
$data1['holo'] = $_data['holo'];
$data1['twenty_per'] = $_data['twenty_per'];
$data1['rod_rate'] = $_data['rod_rate'];
$data1['chips_rate'] = $_data['chips_rate'];
$data1['solid_wait'] = $_data['solid_wait'];
$data1['finish_wait'] = $_data['finish_wait'];
$data1['chips_wait'] = $_data['chips_wait'];
$data1['solid_amount'] = $_data['solid_amount'];
$data1['chips_reclaim'] = $_data['chips_reclaim'];
$data1['net_material_amount'] = $_data['net_material_amount'];
$data1['pallet_cycle_time'] = $_data['pallet_cycle_time'];
$data1['piece_per_pallete'] = $_data['piece_per_pallete'];
$data1['one_piece_cycle_time'] = $_data['one_piece_cycle_time'];
$data1['time_of_mfg'] = $_data['time_of_mfg'];
$data1['total_pcs'] = $_data['total_pcs'];
$data1['pcs_per_hour'] = $_data['pcs_per_hour'];
$data1['per_days_hour'] = $_data['per_days_hour'];
$data1['pcs_per_23_hrs'] = $_data['pcs_per_23_hrs'];
$data1['month_per_day'] = $_data['month_per_day'];
$data1['total_pcs_25_days'] = $_data['total_pcs_25_days'];
$data1['cnc_exp_month'] = $_data['cnc_exp_month'];
$data1['per_pcs_labour'] = $_data['per_pcs_labour'];
$data1['kg_per_hour'] = $_data['kg_per_hour'];
$data1['wait_per_100_pcs'] = $_data['wait_per_100_pcs'];
$data1['labour_per_kg'] = $_data['labour_per_kg'];
$data1['quentity'] = $_data['quentity'];
$data1['days'] = $_data['days'];
$data1['holidays'] = $_data['holidays'];
$data1['weekly_off'] = $_data['weekly_off'];
$data1['start_date'] = $_data['start_date'];
$data1['end_date'] = $_data['end_date'];
$data1['cnc_production_count'] = $_data['cnc_production_count'];
$data1['labour_cost'] = $_data['labour_cost'];
$data1['machine_expense'] = $_data['machine_expense'];
$data1['total_labour'] = $_data['total_labour'];
$data1['pf_20_per'] = $_data['pf_20_per'];
$data1['total_labour_pf'] = $_data['total_labour_pf'];
$data1['platting_kg'] = $_data['platting_kg'];
$data1['platting_amount'] = $_data['platting_amount'];
$data1['extra_charge'] = $_data['extra_charge'];
$data1['material_vabour_cost'] = $_data['material_vabour_cost'];
$data1['euro'] = $_data['euro'];
$data1['final_inr'] = $_data['final_inr'];
$data1['percentage'] = $_data['percentage'];
$data1['rod_kg'] = $_data['rod_kg'];

$data2 = insertlog();
$tabledata = array_merge($data1, $data2);

insert('work_order_items', $tabledata, $dbh);
?>
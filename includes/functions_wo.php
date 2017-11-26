<?php
function get_wo_detail(){
	global $dbh;
	$sSQL = "SELECT * FROM costing_tool";
	$result = sql($sSQL, $dbh);
	return $result;
}

function get_wo_detail_by_id($_id){
	global $dbh;
	$sSQL = "SELECT * FROM costing_tool WHERE id='".$_id."'";
	$result = sql($sSQL, $dbh);
	$result = array_shift($result);
	return $result;
}

function get_wo_list_detail(){
	global $dbh;
	$sSQL = "SELECT id, ampl_part_no, rod_size, drawing_no, audit_created_date, audit_created_by FROM costing_tool";
	$result = sql($sSQL, $dbh);
	return $result;
}

function fake_wo_data(){
	$data1['maqchine_id'] = "";
	$data1['ampl_part_no'] = "";
	$data1['rod_size'] = "";
	$data1['drawing_no'] = "";
	$data1['basic_rate'] = "";
	$data1['job_charge'] = "";
	$data1['size_premimum'] = "";
	$data1['loe'] = "";
	$data1['holo'] = "";
	$data1['twenty_per'] = "";
	$data1['rod_rate'] = "";
	$data1['chips_rate'] = "";
	$data1['solid_wait'] = "";
	$data1['finish_wait'] = "";
	$data1['chips_wait'] = "";
	$data1['solid_amount'] = "";
	$data1['chips_reclaim'] = "";
	$data1['net_material_amount'] = "";
	$data1['pallet_cycle_time'] = "";
	$data1['piece_per_pallete'] = "";
	$data1['one_piece_cycle_time'] = "";
	$data1['time_of_mfg'] = "";
	$data1['total_pcs'] = "";
	$data1['pcs_per_hour'] = "";
	$data1['per_days_hour'] = "";
	$data1['pcs_per_23_hrs'] = "";
	$data1['month_per_day'] = "";
	$data1['total_pcs_25_days'] = "";
	$data1['cnc_exp_month'] = "";
	$data1['per_pcs_labour'] = "";
	$data1['kg_per_hour'] = "";
	$data1['wait_per_100_pcs'] = "";
	$data1['labour_per_kg'] = "";
	$data1['quentity'] = "";
	$data1['days'] = "";
	$data1['holidays'] = "";
	$data1['weekly_off'] = "";
	$data1['start_date'] = "";
	$data1['end_date'] = "";
	$data1['cnc_production_count'] = "";
	$data1['labour_cost'] = "";
	$data1['machine_expense'] = "";
	$data1['total_labour'] = "";
	$data1['pf_20_per'] = "";
	$data1['total_labour_pf'] = "";
	$data1['platting_kg'] = "";
	$data1['platting_amount'] = "";
	$data1['extra_charge'] = "";
	$data1['material_vabour_cost'] = "";
	$data1['euro'] = "";
	$data1['final_inr'] = "";
	$data1['percentage'] = "";
	$data1['rod_kg'] = "";

	return $data1;
}

function get_wo_filter_detail($_data){
	global $dbh;
	$wh = "";
	// if($_data['start_date']!=''){
	// 	$wh .= " AND DATE_FORMAT(audit_created_date, '%Y-%m-%d')>='".getcustomdate($_data['start_date'])."'";
	// }
	// if($_data['end_date']!=''){
	// 	$wh .= " AND DATE_FORMAT(audit_created_date, '%Y-%m-%d')<='".getcustomdate($_data['end_date'])."'";
	// }
	if($_data['ampl_part_no']!=''){
		$wh .= " AND ampl_part_no LIKE '%".$_data['ampl_part_no']."%'";
	}
	if($_data['drawing_no']!=''){
		$wh .= " AND drawing_no LIKE '%".$_data['drawing_no']."%'";
	}

	$sSQL = "SELECT * FROM costing_tool WHERE 1 ".$wh;
	$result = sql($sSQL, $dbh);
	return $result;
}
?>
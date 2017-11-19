<?php
function get_machine_detail(){
	global $dbh;
	$sSQL = "SELECT * FROM machine_detail";
	$result = sql($sSQL, $dbh);
	return $result;
}

function get_machine_detail_by_id($_id){
	global $dbh;
	$sSQL = "SELECT * FROM machine_detail WHERE id='".$_id."'";
	$result = sql($sSQL, $dbh);
	$result = array_shift($result);
	return $result;
}

function get_machine_list_detail(){
	global $dbh;
	$sSQL = "SELECT id, machine_name, month_price FROM machine_detail";
	$result = sql($sSQL, $dbh);
	return $result;
}

function fake_machine_data(){
	$data1['machine_name'] = "";
	$data1['month_price'] = "";
	$data1['audit_created_date'] = "";
	$data1['audit_updated_date'] = "";
	$data1['audit_created_by'] = "";
	$data1['audit_updated_by'] = "";
	$data1['audit_ip'] = "";
	$data1['id'] = "";

	return $data1;
}

function get_machine_filter_detail($_data){
	global $dbh;
	$wh = "";
	if($_data['machine_name']!=''){
		$wh .= " AND machine_name LIKE '%".$_data['machine_name']."%'";
	}
	if($_data['month_price']!=''){
		$wh .= " AND month_price LIKE '%".$_data['month_price']."%'";
	}

	$sSQL = "SELECT * FROM machine_detail WHERE 1 ".$wh;
	$result = sql($sSQL, $dbh);
	return $result;
}
?>
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
	return $result;
}

function get_wo_list_detail(){
	global $dbh;
	$sSQL = "SELECT id, ampl_part_no, rod_size, drawing_no, audit_created_date, audit_created_by FROM costing_tool";
	$result = sql($sSQL, $dbh);
	return $result;
}
?>
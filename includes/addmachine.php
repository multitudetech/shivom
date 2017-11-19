<?php
$_data = $_POST;
unset($_POST);
$data1['machine_name'] = $_data['machine_name'];
	$data1['month_price'] = $_data['month_price'];
	// $data1['audit_created_date'] = $data['audit_created_date'];
	// $data1['audit_updated_date'] = $data['audit_updated_date'];

	// $data1['audit_created_by'] = $data['audit_created_by'];
	// $data1['audit_updated_by'] = $data['audit_updated_by'];
	$data1['audit_ip'] = $_SERVER['REMOTE_ADDR'];

$data2 = insertlog();
$tabledata = array_merge($data1, $data2);

insert('machine_detail', $tabledata, $dbh);
?>
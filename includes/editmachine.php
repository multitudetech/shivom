<?php
$_data = $_POST;
//unset($_POST);
if(isset($_data['id'])&&$_data['id']>0&&is_numeric($_data['id'])){
	$data1['machine_name'] = $_data['machine_name'];
	$data1['month_price'] = $_data['month_price'];
	$data1['audit_ip'] = $_SERVER['REMOTE_ADDR'];

	$data2 = updatelog();
	$tabledata = array_merge($data1, $data2);

	$wh = 'id='.$_data['id'];
	update('machine_detail', $wh, $tabledata, '', $dbh);
	setMessage('MAchine #'.$_data['id'].' successfully edited!', 'success');
}
else{
	setMessage('Error! in updating machine', 'success');
}
?>
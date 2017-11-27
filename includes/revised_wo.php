<?php
$_data = $_POST;
unset($_POST);
if(isset($_data['id'])&&$_data['id']>0&&is_numeric($_data['id'])){
	if($_data['type']=='revised'){
		$data = get_revised_wo_detail_by_id($_data['id']);
	}
	else{
		$data = get_wo_detail_by_id($_data['id']);
	}
	$data1 = $data;
	$data1['costing_tool_id'] = $data1['id'];
	unset($data1['id']);
	unset($data1['audit_created_by']);
	unset($data1['audit_created_date']);
	unset($data1['audit_updated_by']);
	unset($data1['audit_updated_date']);
	unset($data1['audit_ip']);
	$data2 = insertlog();
	$tabledata = array_merge($data1, $data2);
	insert('revised_work_order', $tabledata, $dbh);

	setMessage('WO #'.$_data['id'].' revised successfully!', 'success');
}
else{
	setMessage('Invalid request!', 'error');
}
?>
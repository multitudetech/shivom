<?php
$_data = $_POST;
unset($_POST);
if(isset($_data['id'])&&$_data['id']>0&&is_numeric($_data['id'])){
	$data = get_wo_detail_by_id($_data['id']);
	$data1 = $data;
	$data1['costing_tool_id'] = $data1['id'];
	unset($data1['id']);
	$data2 = insertlog();
	$tabledata = array_merge($data1, $data2);
	insert('deleted_costing_tool', $tabledata, $dbh);

	$wh = 'id='.$_data['id'];
	delete('costing_tool', $wh, $dbh);

	setMessage('WO #'.$_data['id'].' deleted successfully!', 'success');
}
else{
	setMessage('WO not deleted!', 'error');
}
?>
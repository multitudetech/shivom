<?php
$_data = $_POST;
unset($_POST);
if(isset($_data['id'])&&$_data['id']>0&&is_numeric($_data['id'])){
	$data = get_wo_detail_by_id($_data['id']);
	$data1 = $data;
	$data2 = insertlog();
	//$tabledata = array_merge($data1, $data2);
	$wo_id = insert('work_order', $data2);
	for($i = 0; $i < count($data1); $i++){
		unset($data1[$i]['id']);
		$data1[$i]['work_order_id'] = $wo_id;
		$tabledata = array_merge($data1[$i], $data2);
		insert('work_order_items', $tabledata, $dbh);
	}

	setMessage('WO #'.$_data['id'].' copied successfully!', 'success');
}
else{
	setMessage('WO not copied!', 'error');
}
?>
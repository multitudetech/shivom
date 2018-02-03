<?php
$_data = $_POST;
$wo_id = $_data['wo_id'];
unset($_POST);

if(isset($_data['item_ids'])&&count($_data['item_ids'])>0){
	//add data to revised workorder
	$revised_wo_data1['work_order_id'] = $wo_id;
	$revised_wo_data2 = insertlog();
	$revised_wo_data = array_merge($revised_wo_data1, $revised_wo_data2);
	$revised_wo_id = insert('revised_work_order', $revised_wo_data, $dbh);

	//get workorder items
	$data = array();
	if($_data['oreginal']=='false'){
		foreach ($_data['item_ids'] as $item_ids) {
			$data[] = get_revised_wo_items_by_id($item_ids);
		}
	}
	else{
		foreach ($_data['item_ids'] as $item_ids) {
			$data[] = get_wo_items_by_id($item_ids);
		}
	}

	//add revised workorder items
	foreach ($data as $items_data) {
		$data1 = $items_data;
		if(isset($data1['revised_work_order_id'])){
			unset($data1['revised_work_order_id']);
		}
		if(isset($data1['work_order_id'])){
			unset($data1['work_order_id']);
		}
		$data1['revised_work_order_id'] = $revised_wo_id;
		unset($data1['id']);
		unset($data1['audit_created_by']);
		unset($data1['audit_created_date']);
		unset($data1['audit_updated_by']);
		unset($data1['audit_updated_date']);
		unset($data1['audit_ip']);
		$data2 = insertlog();
		$tabledata = array_merge($data1, $data2);
		insert('revised_work_order_items', $tabledata, $dbh);	
	}

	setMessage('WO #'.$wo_id.' revised successfully!', 'success');
}
else{
	setMessage('Invalid request!', 'error');
}
?>
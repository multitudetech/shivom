<?php
include_once "db.php"; //include db file
$msg = "Bed request";
if(isset($_GET)){
	if(isset($_GET['drawing_id'])&&$_GET['drawing_id']!=''){
		//return json_encode($_GET['drawing_id']);
		$select_drawing_data = "SELECT * FROM drawing WHERE id=".$_GET['drawing_id'];
		$res = mysqli_query($con, $select_drawing_data);
		$data = mysqli_fetch_assoc($res);
		if(count($data)>0){
			echo json_encode($data);
			exit();
		}else{
			echo json_encode($msg);
			exit();
		}
	}else{
		echo json_encode($msg);
		exit();
	}
}
else{
	echo json_encode($msg);
	exit();
}
<?php
include_once 'header.php';
if($_SESSION['role']==$role_id_user1){
	//include_once 'layouts/layout_work_order.php';
	//echo "<pre>";
	if(isset($_POST['addwo'])){
		include_once 'includes/addwo.php';
	}
	include_once 'layouts/layout_detailed_work_order.php';
}
include_once 'footer.php';
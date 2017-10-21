<?php
include_once 'header.php';
include_once 'includes/functions_wo.php';
if($_SESSION['role']==$role_id_user1){
	if(isset($_POST['addwo'])){
		include_once 'includes/addwo.php';
	}
	//include_once 'layouts/layout_detailed_work_order.php';
	include_once 'layouts/layout_work_order.php';
}
include_once 'footer.php';
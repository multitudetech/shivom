<?php
include_once 'header.php';
include_once 'includes/functions_wo.php';
include_once 'includes/functions_machine.php';
if($_SESSION['role']==$role_id_user1){
	//functionality
	
	if(isset($_POST['addwo'])){
		include_once 'includes/addwo.php';
	}
	elseif(isset($_POST['editwo'])){
		include_once 'includes/editwo.php';
	}
	elseif(isset($_POST['delete'])){
		include_once 'includes/deletewo.php';
	}
	elseif(isset($_POST['copy'])){
		include_once 'includes/copywo.php';
	}
	elseif(isset($_GET['revisedwo'])){
		include_once 'includes/revised_wo.php';
	}


	//layouts
	if(isset($_GET['editwo'])){
		include_once 'layouts/layout_detailed_work_order.php';
	}
	elseif(isset($_GET['addwo'])){
		include_once 'layouts/layout_detailed_work_order.php';
	}
	elseif(isset($_GET['revisedwo'])){
		include_once 'layouts/layout_detailed_work_order.php';
	}
	else{
		include_once 'layouts/layout_work_order.php';
	}
}
include_once 'footer.php';
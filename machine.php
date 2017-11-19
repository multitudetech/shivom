<?php
include_once 'header.php';
include_once 'includes/functions_machine.php';
if($_SESSION['role']==$role_id_user1){
	//functionality
	if(isset($_POST['addmachine'])){
		include_once 'includes/addmachine.php';
	}
	elseif(isset($_POST['editmachine'])){
		include_once 'includes/editmachine.php';
	}
	elseif(isset($_POST['delete'])){
		include_once 'includes/deletemachine.php';
	}
	elseif(isset($_POST['copy'])){
		include_once 'includes/copymachine.php';
	}

	//layouts
	if(isset($_GET['editmachine'])){
		include_once 'layouts/layout_detailed_machine.php';
	}
	elseif(isset($_GET['addmachine'])){
		include_once 'layouts/layout_detailed_machine.php';
	}
	else{
		include_once 'layouts/layout_machine.php';
	}
}
include_once 'footer.php';
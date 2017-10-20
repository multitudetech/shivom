<?php
if($_POST['name']==''){
	$_SESSION['custom_message'] = 'Enter name of user';
}
elseif($_POST['userName']==''){
	$_SESSION['custom_message'] = 'Enter username';
}
elseif($_POST['password']==''){
	$_SESSION['custom_message'] = 'Enter password';
}
elseif($_POST['userRoles_id']==''){
	$_SESSION['custom_message'] = 'Select user role';
}
elseif($_POST['skills']==''){
	$_SESSION['custom_message'] = 'Enter user skills';
}
else{
	$message = adduser($_POST);
	if($message!=''){
		$_SESSION['custom_message'] = $message;
	}
}
?>
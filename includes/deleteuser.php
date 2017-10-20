<?php
if($_GET['delete']=='true'){
	if(isset($_GET['id'])&&is_numeric($_GET['id'])&&$_GET['id']>0){
		$message = deleteuser($_GET['id']);
		if($message!=''){
			$_SESSION['custom_message'] = $message;
		}
	}
	else{
		$_SESSION['custom_message'] = 'Bad request';
	}
}
?>
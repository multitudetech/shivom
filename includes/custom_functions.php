<?php
include_once 'includes/db.php';
include_once 'includes/functions.php';
include_once 'includes/config.php';
function escapestring($_string){
	$string = mysql_real_escape_string($_string);
	return $string;
}
function checklogin(){
	session_cache_limiter('none');
	session_start();
	if(!isset($_SESSION['sessionset'])){
		header("location: login.php");
		die();
	}
}
function checkalreadylogedin(){
	session_cache_limiter('none');
	session_start();
	if(isset($_SESSION['sessionset'])){
	    header("location: index.php");
	    die();
	}
}
function actionlogin(){
	global $dbh;
	$error = "";
	if(isset($_POST['login'])){
	    if($_POST['username']!=''&&$_POST['password']!=''){
	        $sSQL = "SELECT id, name, role_id FROM users WHERE user_name='".mysql_real_escape_string($_POST['username'])."' AND password='".mysql_real_escape_string($_POST['password'])."' AND active='1'";
	        $result = sql($sSQL, $dbh);
	        
	        if(is_array($result)&&count($result)==1){
	            $_SESSION['sessionset'] = 1;
	            $_SESSION['role'] = $result[0]['role_id'];
	            $_SESSION['name'] = $result[0]['name'];
	            $_SESSION['userid'] = $result[0]['id'];
	            header("location: index.php");
	            die();
	        }
	        else{
	            $error = "Invalid username or password";
	        }
	    }
	    else{
	        $error = "Please enter username and password";
	    }
	}
	return $error;
}
function actionlogout(){
	session_cache_limiter('none');
	session_start();
	unset($_SESSION);
	session_destroy();
	header("location: index.php");
	die();
}
function generatelogin(){
	session_cache_limiter('none');
	session_start();
	$_SESSION['sessionset'] = 1;
    $_SESSION['role'] = 2;
    $_SESSION['name'] = 'androiduser';
    $_SESSION['userid'] = $_GET['user_id'];
}
function getusernamebyid($_userid){
	global $dbh;
	$sSQL = "SELECT name FROM users WHERE id='".$_userid."'";
	
	$result = sql($sSQL, $dbh);
	return $result[0]['name'];
}
function getusers(){
	global $dbh;
	$sSQL = "SELECT id, name, userName, password, role_id, audit_created_date FROM users WHERE active='1'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function adduser($_data){
	global $dbh;
	$useravailable = checkusername($_data['userName']);
	if(!$useravailable){
		$data['name'] 			= $_data['name'];
		$data['userName'] 		= $_data['userName'];
		$data['password'] 		= $_data['password'];
		$data['role_id'] 	= $_data['role_id'];
		$data['active'] 		= '1';
		$user_id = insert('users', $data, $dbh);
		if($user_id>0){
			$skill_arr2 = explode(',', $_data['skills']);
			$skill_arr = array_map('trim', $skill_arr2);
			$skill_arr = array_unique($skill_arr);
			foreach ($skill_arr as $data) {
				$skill_id = getskillid($data);
				foreach ($skill_id as $data2) {
					$data_user_skills['users_id'] 	= $user_id;
					$data_user_skills['skills_id'] 	= $data2['id'];
					insert('user_skills', $data_user_skills, $dbh);			
				}
			}
			return 'User added successfully';
		}
		else{
			return 'User not added';
		}
	}
	else{
		return 'User already exist';
	}
}
function edituser($_data){
	global $dbh;
	$useridavailable = checkuserid($_data['user_id']);
	if($useridavailable){
		$data['name'] = $_data['name'];
		$data['userName'] 		= $_data['userName'];
		$data['password'] 		= $_data['password'];
		$data['role_id'] 	= $_data['role_id'];
		$wh = 'id='.$_data['user_id'];
		update('users', $wh, $data, '', $dbh);
		//delete old skills
		$wh = 'users_id='.$_data['user_id'];
		delete('user_skills', $wh, $dbh);
		//add new skills
		$skill_arr2 = explode(',', $_data['skills']);
		$skill_arr = array_map('trim', $skill_arr2);
		$skill_arr = array_unique($skill_arr);
		foreach ($skill_arr as $data) {
			$skill_id = getskillid(trim($data));
			foreach ($skill_id as $data2) {
				$data_user_skills['users_id'] 	= $_data['user_id'];
				$data_user_skills['skills_id'] 	= $data2['id'];
				insert('user_skills', $data_user_skills, $dbh);
			}
		}
	}
	else{
		return "User doesn't exist";
	}
}
function deleteuser($_id){
	global $dbh;
	$data['active'] = '0';
	$wh = "id='".$_id."'";
	update('users', $wh, $data, '', $dbh);
		
	return 'User deleted successfully';
}
function checkuserid($_id){
	global $dbh;
	$sSQL = "SELECT id FROM users WHERE id='".$_id."'";
	$result = sql($sSQL, $dbh);
	if(count($result)>0){
		return true;
	}
	else{
		return false;
	}
}
function checkusername($_username){
	global $dbh;
	$sSQL = "SELECT id FROM users WHERE userName='".$_username."'";
	$result = sql($sSQL, $dbh);
	if(count($result)>0){
		return true;
	}
	else{
		return false;
	}
}
function getcustomdate($_date){
	$temp_date = date_create($_date);
	$date = date_format($temp_date, 'Y-m-d');
	return $date;
}
function getroles(){
	global $dbh;
	$sSQL = "SELECT id, name FROM m_user_roles WHERE active='1'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function create_dropdown($data, $_selected = null){
	$options = '';
	if($_selected!=''){
		foreach ($data as $d) {
			$options .= '<option value="'.$d['id'].'"';
			if($_selected==$d['id']){
				$options .= 'selected=selected';
			}
			$options .= '>'.$d['name'].'</option>';
		}
	}
	else{
		foreach ($data as $d) {
			$options .= '<option value="'.$d['id'].'">'.$d['name'].'</option>';
		}
	}
	return $options;
}
function timetohour($_time){
	$time = explode(':', $_time);
	if(!isset($time[0]))
	$time[0] = '00';
	if(!isset($time[1]))
	$time[1] = '00';	
	$res = $time[0].' hr '.$time[1].' min';
	return $res;
}
function calculatecompleteper($_totalqty, $_completeqty){
	$per = number_format((100*$_completeqty)/$_totalqty, 2);
	return $per;
}
function getip(){
	return $_SERVER['REMOTE_ADDR'];
}
function getloggedinuserid(){
	return $_SESSION['userid'];
}
function insertlog(){
	$data['audit_created_date'] = date('Y-m-d H:i:s');
	$data['audit_created_by'] = getloggedinuserid();
	$data['audit_ip'] = getip();
	return $data;
}
function updatelog(){
	$data['audit_updated_date'] = date('Y-m-d H:i:s');
	$data['audit_updated_by'] = getloggedinuserid();
	$data['audit_ip'] = getip();
	return $data;
}
function change_arraykey($_arr){
	foreach ($_arr as $outerKey=>$arrData) {
	    foreach ($arrData as $innerKey => $innerData) {
	      	$newData[$innerKey][$outerKey] = $innerData;
	    }
	}
	return $newData;
}
function calculatesec($_time){
	$time = explode(':', $_time);
	$sec = ($time[0]*3600)+($time[1]*60)+($time[2]);
	return $sec;
}
?>
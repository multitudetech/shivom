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
function getuserskills($_userid){
	global $dbh;
	$sSQL = "SELECT skills_id FROM user_skills WHERE users_id='".$_userid."'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function getcustomdate($_date){
	$temp_date = date_create($_date);
	$date = date_format($temp_date, 'Y-m-d');
	return $date;
}
function getskillid($_skillname){
	global $dbh;
	$sSQL = "SELECT id FROM m_skills WHERE name='".$_skillname."'";
	$result = sql($sSQL, $dbh);
	return $result;	
}
function getskillname($_skillid){
	global $dbh;
	$sSQL = "SELECT id, name FROM m_skills WHERE id='".$_skillid."'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function gettaskcount_userwise($_userid){
	global $dbh;
	$sSQL = "SELECT COUNT(tasks.id) AS task_count FROM tasks
	LEFT JOIN projects ON projects.id=tasks.projects_id
	WHERE tasks.assigned_to='".$_userid."' AND projects.status<>'1'";
	$result = sql($sSQL, $dbh);
	return $result[0]['task_count'];
}
function getroles(){
	global $dbh;
	$sSQL = "SELECT id, name FROM m_user_roles WHERE active='1'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function getskills(){
	global $dbh;
	$sSQL = "SELECT id, name FROM m_skills WHERE active='1'";
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
function getskillsdata(){
	global $dbh;
	$sSQL = "SELECT id, name, description, audit_created_date FROM m_skills WHERE active='1'";
	
	$result = sql($sSQL, $dbh);
	return $result;
}
function addskill($_data){
	global $dbh;
	$data['name'] 			= $_data['name'];
	$data['description'] 	= $_data['description'];
	$data['active']			= '1';
	$data2 = insertlog();
	$tabledata = array_merge($data, $data2);
	$user_id = insert('m_skills', $tabledata, $dbh);
	return 'Skill added successfully';
}
function editskill($_data){
	global $dbh;
	$data['name'] = $_data['name'];
	$data['description'] = $_data['description'];
	$data2 = updatelog();
	$tabledata = array_merge($data, $data2);
	$wh = "id='".$_data['id']."'";
	update('m_skills', $wh, $tabledata, '', $dbh);
	return 'Skill updated successfully';	
}
function deleteskill($_id){
	global $dbh;
	$data['active'] = '0';
	$wh = "id='".$_id."'";
	update('m_skills', $wh, $data, '', $dbh);
	return 'Skill deleted successfully';
}
function getprojectsdata(){
	global $dbh;
	$sSQL = "SELECT p.id, p.name, p.reference, IFNULL(T1.task_count, 0) AS task_count, GROUP_CONCAT(T3.name) AS skills, IFNULL(T1.overall_time, '00:00') AS overall_time 
		FROM projects p 
		LEFT JOIN (SELECT projects_id AS project_id, COUNT(id) AS task_count, SEC_TO_TIME( SUM( TIME_TO_SEC( estimated_time ) ) ) AS overall_time FROM tasks WHERE status<>'1' GROUP BY projects_id) T1 ON T1.project_id=p.id
		LEFT JOIN project_skills T2 ON T2.project_id=p.id
		LEFT JOIN m_skills T3 ON T3.id=T2.skills_id
		WHERE IFNULL(p.status, '0')<>'1'
		GROUP BY p.id";
	$result = sql($sSQL, $dbh);
	return $result;
}
function getprojectbyid($_projectid){
	global $dbh;
	$sSQL = "SELECT T1.name AS project_name, 
			T1.reference,
			T1.description AS project_desc,
			GROUP_CONCAT(T3.name) AS skills
		FROM projects T1
			LEFT JOIN project_skills T2 ON T2.project_id=T1.id
			LEFT JOIN m_skills T3 ON T3.id=T2.skills_id
		WHERE T1.id='".$_projectid."'
		GROUP BY T1.id";
	$result = sql($sSQL, $dbh);
	return $result;
}
function gettaskbyprojectid($_projectid = null){
	global $dbh;
	$sSQL = "SELECT tasks.*
		FROM tasks
		LEFT JOIN projects ON tasks.projects_id=projects.id
		WHERE IFNULL(tasks.status, '0')<>'1' AND projects.status<>'1'";
	if($_projectid!=''){
		$sSQL .= " AND tasks.projects_id='".$_projectid."'";
	}
	$result = sql($sSQL, $dbh);
	return $result;
}
function getusertaskbyprojectid($_projectid = null){
	global $dbh;
	$_userid = $_SESSION['userid'];
	//get user skills
	/*$sSQL = "SELECT skills_id FROM user_skills WHERE users_id='".$_userid."'";
	$skill_result = sql($sSQL, $dbh);
	$where = '';
	$separate = '';
	foreach ($skill_result as $skills) {
		$where .= $separate."ps.skills_id=".$skills['skills_id'];
		$separate = ' OR ';
	}*/
	/*$sSQL = "SELECT DISTINCT(t.id) AS id, t.name, t.quantity, t.estimated_time, t.details, t.attachment_link, t.video_link FROM tasks t 
		LEFT JOIN projects p ON t.projects_id=p.id
		LEFT JOIN project_skills ps ON ps.project_id=p.id
		WHERE 1 AND IFNULL(p.status, '0')<>'1' AND IFNULL(t.status, '0')<>'1' AND (".$where.") AND p.id='".$_projectid."'";*/
	$sSQL = "SELECT DISTINCT(t.id) AS id, t.name, t.quantity, t.estimated_time, t.details, t.attachment_link, t.video_link FROM tasks t 
		LEFT JOIN projects p ON t.projects_id=p.id
		WHERE 1 AND IFNULL(p.status, '0')<>'1' AND IFNULL(t.status, '0')<>'1' AND t.assigned_to='".$_userid."' AND p.id='".$_projectid."'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function getcompletedtaskbyprojectid($_projectid = null, $_userid = null){
	global $dbh, $status_task_completed;
	$sSQL = "SELECT DISTINCT(t.id) AS id, t.name, t.quantity, t.estimated_time, t.details, t.attachment_link, t.video_link FROM tasks t 
		LEFT JOIN projects p ON t.projects_id=p.id
		WHERE 1 AND IFNULL(p.status, '0')<>'1' AND IFNULL(t.status, '0')<>'1'";
	if($_userid!=''){
		$sSQL .= " AND t.assigned_to='".$_userid."'";
	}
	$sSQL .= " AND p.id='".$_projectid."' AND t.status='".$status_task_completed."'";
	
	$result = sql($sSQL, $dbh);
	return $result;
}
function getcheckpointbytaskid($_taskid){
	global $dbh;
	$sSQL = "SELECT id, task_id, description, attachment_link, video_link, status
		FROM qc_chackpoints WHERE task_id='".$_taskid."'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function gettaskbyid($_id){
	global $dbh;
	$sSQL = "SELECT * FROM tasks WHERE id='".$_id."'";
	$result = sql($sSQL, $dbh);
	return $result;	
}
function getcheckpointbyid($_id){
	global $dbh;
	$sSQL = "SELECT * FROM qc_chackpoints WHERE task_id='".$_taskid."'";
	$result = sql($sSQL, $dbh);
	return $result;	
}
function addproject($_data, $_files){
	global $dbh, $upload_path;
	$data['name'] 			= $_data['project_name'];
	$data['reference'] 		= $_data['reference'];
	$data['description'] 	= $_data['project_description'];
	$data2 = insertlog();
	$tabledata = array_merge($data, $data2);
	$project_id = insert('projects', $tabledata, $dbh);
	if($project_id>0){
		$skill_arr2 = explode(',', $_data['skills']);
		$skill_arr = array_map('trim', $skill_arr2);
		$skill_arr = array_unique($skill_arr);
		foreach ($skill_arr as $s_data) {
			$skill_id = getskillid($s_data);
			foreach ($skill_id as $s_data2) {
				$data_user_skills['project_id'] 	= $project_id;
				$data_user_skills['skills_id'] 	= $s_data2['id'];
				$tabledata_skills = array_merge($data_user_skills, $data2);
				insert('project_skills', $tabledata_skills, $dbh);			
			}
		}
	}
	if($_data['task_name']!=''){
		$data = $tabledata = array();
		$data['projects_id'] 		= $project_id;
		$data['name']				= $_data['task_name'];
		$data['details'] 			= $_data['task_desc'];
		$data['estimated_time'] 	= $_data['estimated_time']; 
		$data['quantity'] 			= $_data['qty'];
		$data['status'] 			= '0';
                $data['due_date'] 			= $_data['due_date'];
		if($_files['task_attachment_file']['name']!='' && $_FILES['task_attachment_file']["error"] == UPLOAD_ERR_OK){
			$file_name = str_replace(' ', '_', $_files['task_attachment_file']['name']);
			$target_file = $upload_path.basename(rand(0,4).'_'.$file_name);
			move_uploaded_file($_files["task_attachment_file"]["tmp_name"], $target_file);
			$data['attachment_link'] 	= escapestring($target_file);
		}
		if($_files['task_attachment_video']['name']!='' && $_FILES['task_attachment_video']["error"] == UPLOAD_ERR_OK){
			$file_name = str_replace(' ', '_', $_files['task_attachment_video']['name']);
			$target_video_file = $upload_path.basename(rand(0,4).'_'.$_files['task_attachment_video']['name']);
			move_uploaded_file($_files["task_attachment_video"]["tmp_name"], $target_video_file);
			$data['video_link'] 		= escapestring($target_video_file);
		}
		$tabledata = array_merge($data, $data2);
		$task_id = insert('tasks', $tabledata, $dbh);
		$count = 0;
		
		foreach ($_data['qc_description'] as $data_qc) {
			$data = $tabledata = array();
			$data['task_id'] = $task_id;
			$data['description'] = $data_qc;
			$data['status'] = '0';
			if($_files['qc_attachment_file']['name'][$count]!='' && $_FILES['qc_attachment_file']["error"][$count] == UPLOAD_ERR_OK){
				$file_name = str_replace(' ', '_', $_files['qc_attachment_file']['name'][$count]);
				$target_file = $upload_path.basename(rand(0,4).'_'.$file_name);
				move_uploaded_file($_files["qc_attachment_file"]["tmp_name"][$count], $target_file);
				$data['attachment_link'] 	= escapestring($target_file);
			}
			if($_files['qc_attachment_video']['name'][$count]!='' && $_FILES['qc_attachment_video']["error"][$count] == UPLOAD_ERR_OK){
				$file_name = str_replace(' ', '_', $_files['qc_attachment_video']['name'][$count]);
				$target_video_file = $upload_path.basename(rand(0,4).'_'.$file_name);
				move_uploaded_file($_files["qc_attachment_video"]["tmp_name"][$count], $target_video_file);
				$data['video_link'] 	= escapestring($target_video_file);
			}
			$tabledata = array_merge($data, $data2);
			
			insert('qc_chackpoints', $tabledata, $dbh);	
			$count++;
		}
	}
	return 'Project added successfully';
}
function editproject($_data, $_files){
	global $dbh, $upload_path;
	$data['name'] 			= $_data['project_name'];
	$data['reference'] 		= $_data['reference'];
	$data['description'] 	= $_data['project_desc'];
	$wh = 'id='.$_data['project_id'];
	update('projects', $wh, $data, '', $dbh);
	//edit project skill
	editprojectskill($_data['skills'], $_data['project_id']);
	
	$task_count = 0;
	foreach ($_data['task_id'] as $task_id) {
		$task_count++;
		$_task_data['task_id'] = $task_id;
                $_task_data['due_date'] = $_data['due_date'][$task_count];
		$_task_data['task_name'] = $_data['task_name'][$task_count];
		$_task_data['qty'] = $_data['qty'][$task_count];
		$_task_data['estimated_time'] = $_data['estimated_time'][$task_count];
		$_task_data['dependency'] = $_data['dependency'][$task_count];
		$_task_data['task_desc'] = $_data['task_desc'][$task_count];
		$_task_data['task_attachment_file']['name'] = $_files['task_attachment_file']['name'][$task_count];
		$_task_data['task_attachment_file']['error'] = $_files['task_attachment_file']['error'][$task_count];
		$_task_data['task_attachment_file']['tmp_name'] = $_files['task_attachment_file']['tmp_name'][$task_count];
		$_task_data['task_attachment_video']['name'] = $_files['task_attachment_video']['name'][$task_count];
		$_task_data['task_attachment_video']['error'] = $_files['task_attachment_video']['error'][$task_count];
		$_task_data['task_attachment_video']['tmp_name'] = $_files['task_attachment_video']['tmp_name'][$task_count];
		$_task_data['qc_id'] = $_data['qc_id'][$task_count];
		$_task_data['qc_description'] = $_data['qc_description'][$task_count];
		$_task_data['qc_attachment_file']['name'] = $_files['qc_attachment_file']['name'][$task_count];
		$_task_data['qc_attachment_file']['error'] = $_files['qc_attachment_file']['error'][$task_count];
		$_task_data['qc_attachment_file']['tmp_name'] = $_files['qc_attachment_file']['tmp_name'][$task_count];
		$_task_data['qc_attachment_video']['name'] = $_files['qc_attachment_video']['name'][$task_count];
		$_task_data['qc_attachment_video']['error'] = $_files['qc_attachment_video']['error'][$task_count];
		$_task_data['qc_attachment_video']['tmp_name'] = $_files['qc_attachment_video']['tmp_name'][$task_count];
		edittask($_task_data);	
	}
	return 'Project edited successfully';
}
function deleteproject($_id){
	global $dbh;
	$data['status'] = '1';
	$data2 = updatelog();
	$tabledata = array_merge($data, $data2);
	
	$wh = "id='".$_id."'";
	update('projects', $wh, $tabledata, '', $dbh);
		
	return 'Project deleted successfully';
}
function editprojectskill($_data, $_projectid){
	global $dbh;
	//delete old skills
	$wh = 'project_id='.$_projectid;
	delete('project_skills', $wh, $dbh);
	//add new skills
	$skill_arr2 = explode(',', $_data);
	$skill_arr = array_map('trim', $skill_arr2);
	$skill_arr = array_unique($skill_arr);
	foreach ($skill_arr as $data) {
		$skill_id = getskillid(trim($data));
		foreach ($skill_id as $data2) {
			$data_project_skills['project_id'] 	= $_projectid;
			$data_project_skills['skills_id'] 	= $data2['id'];
			insert('project_skills', $data_project_skills, $dbh);
		}
	}
}
function edittask($_data){
	global $dbh, $upload_path;
	$data = $tabledata = array();
	$data['name']				= $_data['task_name'];
	$data['details'] 			= $_data['task_desc'];
	$data['estimated_time'] 	= $_data['estimated_time']; 
	$data['quantity'] 			= $_data['qty'];
        $data['due_date'] 			= $_data['due_date'];
	if($_data['task_attachment_file']['name']!='' && $_data['task_attachment_file']["error"] == UPLOAD_ERR_OK){
		$file_name = str_replace(' ', '_', $_data['task_attachment_file']['name']);
		$target_file = $upload_path.basename(rand(0,4).'_'.$file_name);
		move_uploaded_file($_data["task_attachment_file"]["tmp_name"], $target_file);
		$data['attachment_link'] 	= escapestring($target_file);
	}
	if($_data['task_attachment_video']['name']!='' && $_data['task_attachment_video']["error"] == UPLOAD_ERR_OK){
		$file_name = str_replace(' ', '_', $_data['task_attachment_video']['name']);
		$target_video_file = $upload_path.basename(rand(0,4).'_'.$_data['task_attachment_video']['name']);
		move_uploaded_file($_data["task_attachment_video"]["tmp_name"], $target_video_file);
		$data['video_link'] 		= escapestring($target_video_file);
	}
	$data2 = updatelog();
	$tabledata = array_merge($data, $data2);
	
	$wh = 'id='.$_data['task_id'];
	update('tasks', $wh, $tabledata, '', $dbh);
	$data_dependent_task['task_id'] 	= $_data['task_id'];
	$data_dependent_task['dependency'] 	= $_data['dependency'];
	editdependenttask($data_dependent_task);
	$_qc_data['task_id'] 				= $_data['task_id'];
	$_qc_data['qc_id'] 					= $_data['qc_id'];
	$_qc_data['qc_description'] 		= $_data['qc_description'];
	$_qc_data['qc_attachment_file'] 	= $_data['qc_attachment_file'];
	$_qc_data['qc_attachment_video'] 	= $_data['qc_attachment_video'];
	insertoreditqcdetail($_qc_data);
	
}
function editdependenttask($_data){
	global $dbh;
	$sSQL = "SELECT COUNT(id) AS count FROM task_dependent_list WHERE task_id='".$_data['task_id']."'";
	$result = sql($sSQL, $dbh);
	
	if(isset($_data['dependency'])&&$_data['dependency']!=''&&$_data['dependency']!=0){
		if($result[0]['count']>0){
			//update dependent task
			$data['task_id'] = $_data['task_id'];
			$data['dependent_task_id'] = $_data['dependency'];
			$data2 = updatelog();
			$tabledata = array_merge($data, $data2);
			$wh = 'task_id='.$_data['task_id'];
			update('task_dependent_list', $wh, $tabledata, '', $dbh);
		}
		else{
			//insert dependent task
			$data['task_id'] = $_data['task_id'];
			$data['dependent_task_id'] = $_data['dependency'];
			$data2 = insertlog();
			$tabledata = array_merge($data, $data2);
			insert('task_dependent_list', $tabledata, $dbh);
		}
	}
	else{
		if(count($result)>0){
			$wh = "task_id=".$_data['task_id'];
			delete('task_dependent_list', $wh, $dbh);
		}
	}
}
function insertoreditqcdetail($_data){
	global $dbh;
	
	$qc_count = count($_data['qc_id']);
	$qc_desc_count = count($_data['qc_description']);
	$qc_attachment_file = change_arraykey($_data['qc_attachment_file']);
	$qc_attachment_video = change_arraykey($_data['qc_attachment_video']);
	
	for($count = 1; $count <= $qc_desc_count; $count++){
		if($count <= $qc_count){
			//update qc
			$data['id'] = $_data['qc_id'][$count];
			$data['description'] = $_data['qc_description'][$count];
			$data['attachment_link'] = $qc_attachment_file[$count];
			$data['video_link'] = $qc_attachment_video[$count];
			editqc($data);
		}
		else{
			//add qc
			if($_data['qc_description'][$count]!=''){
				$data['task_id'] = $_data['task_id'];
				$data['description'] = $_data['qc_description'][$count];
				$data['attachment_link'] = $qc_attachment_file[$count];
				$data['video_link'] = $qc_attachment_video[$count];
				addqc($data);
			}
		}
	}
}
function addqc($_data){
	global $dbh, $upload_path;
	
	$data['task_id'] = $_data['task_id'];
	$data['description'] = $_data['description'];
	$data['status'] = 0;
	if($_data['attachment_link']['name']!='' && $_data['attachment_link']["error"] == UPLOAD_ERR_OK){
		$file_name = str_replace(' ', '_', $_data['attachment_link']['name']);
		$target_file = $upload_path.basename(rand(0,4).'_'.$file_name);
		move_uploaded_file($_data['attachment_link']["tmp_name"], $target_file);
		$data['attachment_link'] 	= escapestring($target_file);
	}
	if($_data['video_link']['name']!='' && $_data['video_link']["error"] == UPLOAD_ERR_OK){
		$file_name = str_replace(' ', '_', $_data['video_link']['name']);
		$target_video_file = $upload_path.basename(rand(0,4).'_'.$file_name);
		move_uploaded_file($_data['video_link']["tmp_name"], $target_video_file);
		$data['video_link'] 	= escapestring($target_video_file);
	}
	$data2 = insertlog();
	$tabledata = array_merge($data, $data2);
	insert('qc_chackpoints', $tabledata, $dbh);
}
function editqc($_data){
	global $dbh, $upload_path;
	
	$data['id'] = $_data['id'];
	$data['description'] = $_data['description'];
	
	if($_data['attachment_link']['name']!='' && $_data['attachment_link']["error"] == UPLOAD_ERR_OK){
		$file_name = str_replace(' ', '_', $_data['attachment_link']['name']);
		$target_file = $upload_path.basename(rand(0,4).'_'.$file_name);
		move_uploaded_file($_data['attachment_link']["tmp_name"], $target_file);
		$data['attachment_link'] 	= escapestring($target_file);
	}
	if($_data['video_link']['name']!='' && $_data['video_link']["error"] == UPLOAD_ERR_OK){
		$file_name = str_replace(' ', '_', $_data['video_link']['name']);
		$target_video_file = $upload_path.basename(rand(0,4).'_'.$file_name);
		move_uploaded_file($_data['video_link']["tmp_name"], $target_video_file);
		$data['video_link'] 	= escapestring($target_video_file);
	}
	$data2 = updatelog();
	$tabledata = array_merge($data, $data2);
	$wh = "id='".$_data['id']."'";
	
	update('qc_chackpoints', $wh, $tabledata, '', $dbh);
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
function gettaskstatusname($_statuscode){
	if($_statuscode=='0'){
		return "To Do";
	}
	elseif($_statuscode=='1'){
		return "Deleted";
	}
	elseif($_statuscode=='2'){
		return "Inprogress";
	}
	elseif($_statuscode=='3'){
		return "Assigned";
	}
	elseif($_statuscode=='4'){
		return "Working";
	}
	elseif($_statuscode=='5'){
		return "Paused";
	}
	elseif($_statuscode=='6'){
		return "Stopped";
	}
	elseif($_statuscode=='7'){
		return "Completed";
	}
}
function getallotedtasks($_userid=null){
	global $dbh;
	$sSQL = "SELECT tasks.* FROM tasks
	LEFT JOIN projects ON projects.id=tasks.projects_id
	WHERE tasks.assigned_to='".$_userid."' AND projects.status<>'1' ORDER BY tasks.priority";
	$result = sql($sSQL, $dbh);
	return $result;
}
function getunallotedtask_withskill($_userid=null){
	global $dbh;
	if($_userid!=''){
		$user_skills = getuserskill($_userid);
		$where = '';
		$separate = '';
		foreach ($user_skills as $skills) {
			$where .= $separate."ps.skills_id=".$skills['skills_id'];
			$separate = ' OR ';
		}
	}
	if($where==''){
		$where = 1;
	}
	$sSQL = "SELECT DISTINCT(t.id) AS id, t.name, t.details, t.estimated_time, t.quantity, t.attachment_link, t.video_link FROM tasks t
	LEFT JOIN projects p ON t.projects_id=p.id
	LEFT JOIN project_skills ps ON ps.project_id=p.id
	WHERE 1 AND IFNULL(p.status, '0')<>'1' AND IFNULL(t.status, '0')<>'1' AND (".$where.") AND IFNULL(t.assigned_to, '0')='0'";
	
	$result = sql($sSQL, $dbh);
	return $result;
}
function getuserskill($_userid){
	global $dbh;
	$sSQL = "SELECT skills_id FROM user_skills WHERE users_id='".$_userid."'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function assigntasktouser($_userid, $_taskid){
	global $dbh, $status_task_assigned;
	$data['assigned_to'] = $_userid;
	$data['assigned_datetime'] = date('Y-m-d H:i:s');
	$data['status'] = $status_task_assigned;
	$data['priority'] = generatepriorityid($_userid);
	$data2 = updatelog();
	$tabledata = array_merge($data, $data2);
	$wh = "id=".$_taskid;
	update('tasks', $wh, $tabledata, '', $dbh);
	return "Assigned task successfully";
}
function checkadmin($_userid){
	global $dbh;
	$sSQL = "SELECT role_id FROM users WHERE id='".$_userid."'";
	$result = sql($sSQL, $dbh);
	if($result[0]['role_id']=='1'){
		$msg = true;
	}
	else{
		$msg = false;
	}
	return $msg;
}
function generatepriorityid($_userid){
	global $dbh;
	$sSQL = "SELECT MAX(priority) AS priority FROM tasks WHERE assigned_to='".$_userid."'";
	$result = sql($sSQL, $dbh);
	return $result[0]['priority']+1;	
}
function setpriority($_taskid, $_priority){
	global $dbh;
	$data['priority'] = $_priority;
	$data2 = updatelog();
	$tabledata = array_merge($data, $data2);
	$wh = "id=".$_taskid;
	update('tasks', $wh, $tabledata, '', $dbh);	
	return 'task prioruty updated';
}
function updatetask_byuser($_data){
	global $dbh, $status_task_completed;
	//starting task first time
	/*$task_status = gettaskstatus($_data['task_id']);
	if($task_status=='3'){
		$data['status'] = '4';
		$data['start_datetime'] = date('Y-m-d H:i:s');
	}*/
	//after produce all parts
	if($_data['totalQuantity']==$_data['totalAmount']){
		$qc_status = checktaskqcremaining($_data['task_id']);
		if(!$qc_status){
			$data['status'] = $status_task_completed;
			$data['end_datetime'] = date('Y-m-d H:i:s');
			$data['completed_datetime'] = date('Y-m-d H:i:s');
		}
		//storing other data
		$data['amount'] = $_data['totalAmount'];
		$data['duration'] = $_data['timer'];
		$data2 = updatelog();
		$tabledata = array_merge($data, $data2);
		$wh = "id='".$_data['task_id']."'";
		update('tasks', $wh, $tabledata, '', $dbh);
		$qc_data = $_data['qccheckbox'];
		updateqcdetail($_data['task_id'], $qc_data);
	}
}
function gettaskstatus($_taskid){
	global $dbh;
	$sSQL = "SELECT status FROM tasks WHERE id='".$_taskid."'";
	$result = sql($sSQL, $dbh);
	return $result[0]['status'];
}
function checktaskqcremaining($_taskid){
	global $dbh;
	$sSQL = "SELECT COUNT(id) AS qc_remaining FROM qc_chackpoints WHERE IFNULL(status, '0')='0' AND task_id='".$_taskid."'";
	$result = sql($sSQL, $dbh);
	if($result[0]['qc_remaining']>0){
		$return = true;
	}
	else{
		$return = false;
	}
	return $return;
}
function updateqcdetail($_taskid, $_qcdata, $_api = false, $_userid = null){
	global $dbh;
	//first make all qc as uncheck
	$data['status'] = '0';
	if($_api){
		$data2 = apiupdatelog($_userid);
	}
	else{
		$data2 = updatelog();
	}
	$tabledata = array_merge($data, $data2);
	$wh = "task_id='".$_taskid."' AND status='1'";
	update('qc_chackpoints', $wh, $tabledata, '', $dbh);
	
	//update qc
	$data = $data2 = $tabledata = array();
	foreach ($_qcdata as $qcid) {
		$qc_status = getqcstatus($qcid);
		if(!$qc_status){
			$data['status'] = '1';
			if($_api){
				$data2 = apiupdatelog($_userid);
			}
			else{
				$data2 = updatelog();
			}
			$tabledata = array_merge($data, $data2);
			$wh = "id='".$qcid."'";
			update('qc_chackpoints', $wh, $tabledata, '', $dbh);
		}
	}
}
function getqcstatus($_qcid){
	global $dbh;
	$sSQL = "SELECT status FROM qc_chackpoints WHERE task_id='".$_qcid."'";
	$result = sql($sSQL, $dbh);
	return $result[0]['status'];
}
function getpausereason(){
	global $dbh;
	$sSQL = "SELECT id, name FROM m_pause_reasons WHERE active='1'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function checkdependenttask($_taskid){
	global $dbh;
	$sSQL = "SELECT COUNT(id) AS count, dependent_task_id FROM task_dependent_list WHERE task_id='".$_taskid."'";
	
	$result = sql($sSQL, $dbh);
	return $result;
}
function checktaskcompleted($_taskid){
	global $dbh, $status_task_completed;
	$sSQL = "SELECT status FROM tasks WHERE id='".$_taskid."'";
	$result = sql($sSQL, $dbh);
	if($result[0]['status']==$status_task_completed){
		$status = true;
	}
	else{
		$status = false;
	}
	return $status;
}
function starttask($_taskid, $_userid){
	global $dbh, $status_task_working;
	try{
		$data['status'] = $status_task_working;
		$data['start_datetime'] = date('Y-m-d H:i:s');
		$data['audit_updated_date'] = date('Y-m-d H:i:s');
		$data['audit_updated_by'] = $_userid;
		$data['audit_ip'] = getip();
		$tabledata = $data;
		$wh = "id='".$_taskid."'";
		update('tasks', $wh, $tabledata, '', $dbh);
		return true;
	}
	catch(Exception $e){
		return false;
	}
}
function pausetask($_data){
	global $dbh, $status_task_paused;
	try{
		$data['status'] 				= $status_task_paused;
		$data['duration'] 				= $_data['duration'];
		$data['audit_updated_date'] 	= date('Y-m-d H:i:s');
		$data['audit_created_by'] 		= $_data['user_id'];
		$data['audit_ip'] 				= getip();
		$tabledata = $data;
		$wh = "id=".$_data['task_id'];
		update('tasks', $wh, $tabledata, '', $dbh);
		//insert pause entry
		$data = $tabledata = array();
		$data['task_id'] 				= $_data['task_id'];
		$data['start_time'] 			= date('Y-m-d H:i:s');
		//$data['duration'] 				= $_data['duration'];
		$data['pause_reason_id'] 		= $_data['pause_id'];
		$data['audit_created_date'] 	= date('Y-m-d H:i:s');
		$data['audit_created_by'] 		= $_data['user_id'];
		$data['audit_ip'] 				= getip();
		$pause_id = insert('task_pause_reason', $data, $sSQL);
		return $pause_id;
	}
	catch(Exception $e){
		return false;
	}
}
function resumetask($_data){
	global $dbh, $status_task_working;
	try{
		//update task status
		$data['status'] = $status_task_working;
		$data['audit_updated_date'] = date('Y-m-d H:i:s');
		$data['audit_updated_by'] = $_data['user_id'];
		$data['audit_ip'] = getip();
		$tabledata = $data;
		$wh = "id='".$_data['task_id']."'";
		update('tasks', $wh, $tabledata, '', $dbh);
		//calculate pause time duration
		$sSQL = "SELECT start_time FROM task_pause_reason WHERE id='".$_data['task_pause_id']."'";
		$res = sql($sSQL, $dbh);
		$start_time = $res[0]['start_time'];
		$end_time = date('Y-m-d H:i:s');
		$tmp_start_time = strtotime($start_time);
		$tmp_end_time = strtotime($end_time);
		$diff = $tmp_end_time-$tmp_start_time;
		$time_diff = gmdate('H:i:s', $diff);
		//update pause end time and duration
		$data = $tabledata = array();
		$data['end_time'] = $end_time;
		$data['duration'] = $time_diff;
		$data['audit_updated_date'] = date('Y-m-d H:i:s');
		$data['audit_updated_by'] = $_data['user_id'];
		$data['audit_ip'] = getip();
		$tabledata = $data;
		$wh = "id='".$_data['task_pause_id']."'";
		update('task_pause_reason', $wh, $tabledata, '', $dbh);
		return true;
	}
	catch(Exception $e){
		return false;
	}
}
function stoptask($_data){
	global $dbh, $status_task_stoped;
	try{
		$data['status'] = $status_task_stoped;
		$data['end_datetime'] = date('Y-m-d H:i:s');
		$data['duration'] = $_data['duration'];
		$data['amount'] = $_data['amount'];
		$data['audit_updated_date'] = date('Y-m-d H:i:s');
		$data['audit_updated_by'] = $_data['user_id'];
		$data['audit_ip'] = getip();
		$tabledata = $data;
		$wh = "id='".$_data['task_id']."'";
		update('tasks', $wh, $tabledata, '', $dbh);
		return true;
	}
	catch(Exception $e){
		return false;
	}
}
function checkothertaskstart($_userid){
	global $dbh, $status_task_working,$status_task_paused;
	//$sSQL = "SELECT COUNT(id) as count FROM tasks WHERE assigned_to='".$_userid."' AND status='".$status_task_working."'";
        $sSQL = "SELECT id FROM tasks WHERE assigned_to='".$_userid."' AND (status='".$status_task_working."' or status='".$status_task_paused."')";	
        $working_task = sql($sSQL, $dbh);
	if(count($working_task)>0){
                $sSQL="SELECT pause_reason_id FROM task_pause_reason where task_id=".$working_task[0]['id']." order by id desc limit 1";                                
                $out_of_material=sql($sSQL, $dbh);//if pause reason is Out of material than an othar task will start.                                
                if($out_of_material[0]['pause_reason_id']=='4')
                    $msg = false;
                else
                    $msg = true;                    
	}
	else{
		$msg = false;
	}                        
	return $msg;
}
function calculatesec($_time){
	$time = explode(':', $_time);
	$sec = ($time[0]*3600)+($time[1]*60)+($time[2]);
	return $sec;
}
function getreportdata($_data){
	global $dbh, $status_task_completed;
	$start_date = $_data['start_date'];
	$end_date = $_data['end_date'];
	$user_id = $_data['user_id'];
	$project_id = $_data['project_id'];
	$where = "";
	if($start_date!=''){
		$where .= " AND DATE_FORMAT(t.audit_created_date, '%Y-%m-%d')>='".$start_date."'";
	}
	if($end_date!=''){
		$where .= " AND DATE_FORMAT(t.audit_created_date, '%Y-%m-%d')<='".$end_date."'";
	}
	if($user_id!=0){
		$where .= " AND t.assigned_to='".$user_id."'";
	}
	if($project_id!=0){
		$where .= " AND t.projects_id='".$project_id."'";
	}
	$sSQL = "SELECT t.id AS task_id, p.name AS project_name, t.name AS task_name, t.audit_created_date AS created_date, t.completed_datetime AS completed_date, t.estimated_time AS estimated_time, t.duration AS actual_time
		FROM tasks t
		LEFT JOIN projects p ON t.projects_id=p.id
		WHERE t.status='".$status_task_completed."' AND p.status<>'1' ".$where;
	$result = sql($sSQL, $dbh);
	return $result;
}
function getReasonCount($_id){
	global $dbh;
	$sSQL = "SELECT COUNT(id) AS count FROM task_pause_reason WHERE task_id='".$_id."'";
	$result = sql($sSQL, $dbh);
	return $result[0]['count'];
}
function getpauselistbytaskid($_taskid){
	global $dbh;
	$sSQL = "SELECT T1.audit_created_date AS pause_date, T1.duration AS pause_time, T2.name AS pause_reason
		FROM task_pause_reason T1
		LEFT JOIN m_pause_reasons T2 ON T2.id=T1.pause_reason_id
		WHERE T1.task_id='".$_taskid."'";
	$result = sql($sSQL, $dbh);
	return $result;
}
function getTaskTimeDiff($estimated_time, $required_time){
	$temp_estimated_time = explode(':', $estimated_time);
	$new_estimated_time = '';
	if($temp_estimated_time[0]==''){
		$new_estimated_time = '00:00:00';
	}
	elseif($temp_estimated_time[1]==''){
		$new_estimated_time = $temp_estimated_time[0].':00:00';
	}
	elseif($temp_estimated_time[2]==''){
		$new_estimated_time = $temp_estimated_time[0].':'.$temp_estimated_time[1].':00';
	}
	else{
		$new_estimated_time = $estimated_time;	
	}
	$temp_required_time = explode(':', $required_time);
	$new_required_time = '';
	if($temp_required_time[0]==''){
		$new_required_time = '00:00:00';
	}
	elseif($temp_required_time[1]==''){
		$new_required_time = $temp_required_time[0].':00:00';
	}
	elseif($temp_required_time[2]==''){
		$new_required_time = $temp_required_time[0].':'.$temp_required_time[1].':00';
	}
	else{
		$new_required_time = $required_time;	
	}
	$estimated_time = strtotime($new_estimated_time);
	$required_time = strtotime($new_required_time);
	$time_diff = $estimated_time - $required_time;
	return $time_diff;
}
?>
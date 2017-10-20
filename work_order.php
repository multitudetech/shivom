<?php
include_once 'header.php';
if($_SESSION['role']==$role_id_user1){
	include_once 'layouts/layout_work_order.php';
}
include_once 'footer.php';
<?php
//at error redirect to index page
function error(){
	header("Location: http://localhost:8081/shivom/index.php");
	exit();	
}

//at error redirect to index page
function error_drg(){
	header("Location: http://localhost:8081/shivom/add_drawing.php");
	exit();	
}

//success redirect
function success(){
	header("Location: http://localhost:8081/shivom/index.php");
	exit();	
}

//call for convert date to DB format
function changeDateFormatStoreToDB($date){
	$date = str_replace('/', '-', $date);
	$newDate = date("Y-m-d", strtotime($date));
	return $newDate;
}

//call for convert date to display format
function changeDateFormatFetchFromDB($date){
	$date = str_replace('-', '/', $date);
	$newDate = date("d/m/Y", strtotime($date));
	return $newDate;
}
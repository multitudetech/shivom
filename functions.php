<?php
//at error redirect to index page
function error(){
	if(!isset($_SERVER['HTTP_REFERER'])){
		header('Location: ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}
	else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	exit();	
}

//at error redirect to index page
function error_drg(){
	if(!isset($_SERVER['HTTP_REFERER'])){
		header('Location: ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}
	else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	exit();	
}

//success redirect
function success(){
	if(!isset($_SERVER['HTTP_REFERER'])){
		header('Location: ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}
	else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	exit();	
}

function redirect(){
	if(!isset($_SERVER['HTTP_REFERER'])){
		header('Location: ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}
	else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
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
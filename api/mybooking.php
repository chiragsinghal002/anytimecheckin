<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['MyBooking']=='ARQP12345'){
	$userId=$_REQUEST['userId'];
	//$password=$_REQUEST['password'];
	$result=$hotels->GetAllHotelsbyUserid($userId);
	$result=array('result'=>'success','UpcomingData'=>$result);
	echo json_encode($result);
}



if($_REQUEST['MyBooking']=='AREMAIL12345'){
	$userId=$_REQUEST['userId'];
	
	$completed=$hotels->CompetedHotelsbyUserid($userId);
	
	$result=array('result'=>'success','CompletedData'=>$completed);
	echo json_encode($result);
}

if($_REQUEST['MyBooking']=='ARRP12345'){
	$userId=$_REQUEST['userId'];
	//$password=$_REQUEST['password'];
	$cancelled=$hotels->CancelledHotelsbyUserid($userId);
	
	$cancel=array('result'=>'success','CancelData'=>$cancelled);
	echo json_encode($cancel);
}

?>

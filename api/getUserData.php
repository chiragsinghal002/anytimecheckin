<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['getUserProfile']=='ARQP12345'){
	$userId=$_REQUEST['userId'];
	$result=$user->GetUserProfileWithID($userId);
	echo json_encode($result);
}
if($_REQUEST['getAllBooking']=='AREMAIL12345'){
	$userId=$_REQUEST['userId'];
	$password=$_REQUEST['password'];
	$result=$hotels->GetAllHotelsbyUserid($userId);
	echo json_encode($result);
}
if($_REQUEST['updateUserProfile']=='updateUser12345'){
	$data['fname']=$_REQUEST['fname'];
	$data['lname']=$_REQUEST['lname'];
	$data['email']=$_REQUEST['email'];
	$data['mob_no']=$_REQUEST['mob_no'];
	$data['user_id']=$_REQUEST['user_id'];
	$update=$user->UpdateUserProfile($data);
	if ($update==1) {
		$result=array('result'=>'success','message'=>'updated successfully');
	}
	else{
		$result=array('result'=>'failed','message'=>'user profile not updated');
	}
	echo json_encode($result);
}
?>

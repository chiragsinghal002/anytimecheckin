<?php 
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['SignupByGuest']=='ARQP12345'){
	$data['fname']=$_REQUEST['fname'];
	$data['lname']=$_REQUEST['lname'];
	$data['mobno']=$_REQUEST['mobno'];
	$data['email']=$_REQUEST['email'];
	$data['discounted_price']=$_REQUEST['discounted_price'];
	$data['user_id']=$_REQUEST['user_id'];
	//var_dump($data);die;
	$result_book=$user->BookingConfirm($data);
	if($add==0){
		$result=array('result'=>'failed','guest'=>'something went wrong');
	}else{
		$result=array('result'=>'success','guest'=>'guest added successfully');
	}
	
	echo json_encode($result);
}

?>
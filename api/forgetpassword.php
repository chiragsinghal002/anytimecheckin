<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['ForgetPasswordByEmail']=='ARQP12345'){
	$email=$_REQUEST['email'];
	
	$result=$user->forgotpasswordbyEmail($email);

	$result=array('result'=>'success','Forget Password'=>'Password sent at your email');
	echo json_encode($result);
}



if($_REQUEST['ForgetPasswordByMobile']=='ARMOBILE12345'){
	$mobile=$_REQUEST['mobile'];
	
	$result_mobile=$user->forgotpasswordbyMobile($mobile);
	
	$result=array('result'=>'success','Your Password'=>$result_mobile);
	echo json_encode($result);
}



?>

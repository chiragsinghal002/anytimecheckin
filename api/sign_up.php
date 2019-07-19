<?php 
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['SignupByEmail']=='ARQP12345'){
	$data['userName']=$_REQUEST['userName'];

	$data['lastName']=$_REQUEST['lastName'];

	$data['userEmail']=$_REQUEST['userEmail'];

	$data['password']=$_REQUEST['password'];

	$data['checkbox']=$_REQUEST['checkbox'];
	//var_dump($data);die;
	$add=$user->registerbyEmail($data);
	if($add==3){
		$result=array('result'=>'failed','email'=>'Email id already exist');
	}else{
		$result=array('result'=>'success','otp'=>$add);
	}
	
	echo json_encode($result);
}
if($_REQUEST['SignUpByMobile']=='AREMAIL12345'){
	$data['userName']=$_REQUEST['userName'];

	$data['lastName']=$_REQUEST['lastName'];

	$data['mobno']=$_REQUEST['mobno'];

	$data['password']=$_REQUEST['password'];
	$add=$user->registerbyMobile($data);
	if($add==3){
		$result=array('success'=>'0');
	}else{
		$result=array('success'=>'1','otp'=>$add);
	}
	// $result=array('success'=>'1',$add);
	echo json_encode($result);
}
?>
<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['checkByMobile']=='ARQP12345'){
  $mob=$_REQUEST['mobile'];
	$otp=$_REQUEST['otp'];
  $add=$user->checkOTPByMob($otp,$mob);

  if($add==0){
		$result=array('success'=>'0');
	}else{
		$result=array('success'=>'1');
	}
  echo json_encode($result);
}
if($_REQUEST['checkByByEmail']=='AREMAIL12345'){
  $email=$_REQUEST['email'];
	$otp=$_REQUEST['otp'];
  $add=$user->checkOTPByEmail($otp,$email);
  if($add==0){
    $result=array('success'=>'0');
  }else{
    $result=array('success'=>'1');
  }
	echo json_encode($result);
}
?>

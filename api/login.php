<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
include_once'../Object.php';
if($_REQUEST['loginByMobile']=='ARQP12345'){
  $mob=$_REQUEST['mobile'];
	$password=$_REQUEST['password'];
  $result=$user->loginbymob($mob,$password);
	echo json_encode($result);
}
if($_REQUEST['loginByEmail']=='AREMAIL12345'){
  $email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
  $result=$user->loginbyemail($email,$password);
  // var_dump($result);

  if($result['result']==0){
  	$data=array('login'=>'failed','result'=>'Username or pass does not match');
  }
  if($result['result']==1){
  	$data=array('login'=>'success','user_id'=>$result['user_id'],'fname'=>$result['fname'],'lname'=>$result['lname'],'mobile'=>$result['mob_no'],'email'=>$result['email']);
  }
	echo json_encode($data);
}
?>

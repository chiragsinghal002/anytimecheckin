<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
include_once'../Object.php';
if($_REQUEST['loginByEmail']=='FACEBOOK123'){
  $email=$_REQUEST['email'];
  $result=$user->loginbyfacebookapi($email);
   // var_dump($result);die;

  if($result['result']==0){
  	$data=array('login'=>'failed','result'=>'Username or pass does not match');
  }
  if($result['result']==1){
  	$data=array('login'=>'success','user_id'=>$result['user_id'],'fname'=>$result['fname'],'lname'=>$result['lname'],'mobile'=>$result['mob_no'],'email'=>$result['email']);
  }
	echo json_encode($data);
}
?>

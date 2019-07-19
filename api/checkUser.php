<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['checkByEmail']=='ARQP12345'){

	$email=$_REQUEST['email'];

  $result=$user->checkUserbyEmail($email);

	echo json_encode($result);

}
if($_REQUEST['checkByMobile']=='AREMAIL12345'){
  $email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
  $result=$user->loginbyemail($email,$password);
	echo json_encode($result);
}
?>

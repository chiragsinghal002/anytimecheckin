<?php 
include("../classes/apidb.php");
include 'PushNotification.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['notification']=='NOTIFY12345'){
	$token=$_REQUEST['token'];
	$user_id=$_REQUEST['user_id'];
	$device_id=$_REQUEST['device_id'];
	$message='a';
	$order_id=rand(0000000,9999999);
	$serverObject = new SendNotification(); 
	$jsonString = $serverObject->sendPushNotificationToFCMSever($token,$message,$order_id);  
	$jsonObject = json_decode($jsonString);
	echo json_encode($jsonObject);
}

?>
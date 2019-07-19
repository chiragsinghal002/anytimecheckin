<?php

include("../classes/apidb.php");

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

# Get JSON as a string
$json_str = file_get_contents('php://input');

# Get as an object

$json_obj = json_decode($json_str);
$user_id=$json_obj->user_id;
$password=$json_obj->password;

$sql=mysqli_query($apiconn, "SELECT * FROM `user_registration` WHERE `user_id`='$user_id'");
$r=mysqli_fetch_array($sql);
															
if($user_id >0)
{
	$changestatus=mysqli_query($apiconn, "update `user_registration` set password='$password' where user_id='$user_id'");
	
	if($changestatus)
	{
		$result->status = 1;
		$result->result = 'Password changed successfully';
	}
	else
	{
		$result->status = 2;
		$result->result = 'There is some problem in changing password';
	}																		
}
else
{
       $result->status = 0;
       $result->result = 'This User id does not Exist';
}
							
 
 

$myJSON = json_encode($result);

echo $myJSON;
?>
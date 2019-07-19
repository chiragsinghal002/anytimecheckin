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
$email=$json_obj->email;

$sql=mysqli_query($apiconn, "SELECT * FROM `user_registration` WHERE `email`='$email'");
$r=mysqli_fetch_array($sql);
									
$user_id = $r['user_id'];
$password = $r['password'];
									
if($user_id >0)
{
	$to = $r['email'];
	$subject = "Anytime Check In Password";
	$txt='<img src="https://epimoniapp.com/anytimecheckin/image/logo.png" /><br /><br />';
	$txt.= "<strong>Greetings,</strong><br /><br />You requested a Password on rest & go website.<br /><br /> Your Password is: ".$password."<br /> <br />Please use this Password to login . You can change your password anytime by clicking on your MY ACCOUNT.<br /><br /> Thanks for using Anytime Check In.<br />";
				
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: info@resrandgo.com" . "\r\n";		
	$mailstatus=mail($to,$subject,$txt,$headers);
	$mailstatus=mail('kanchan.netmaximus@gmail.com',$subject,$txt,$headers);
	if($mailstatus)
	{
		$result->status = 1;
		$result->result = 'Please check your email id your password has been sent';
	}
	else
	{
		$result->status = 2;
		$result->result = 'There is some problem in sending mail';
	}																		
}
else
{
       $result->status = 0;
       $result->result = 'This Email id does not Exist';
}
							
 
 

$myJSON = json_encode($result);

echo $myJSON;
?>
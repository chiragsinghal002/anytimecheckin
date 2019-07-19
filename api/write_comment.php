<?php 
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['WriteaComment']=='ARQP12345'){
	$user_id=$_REQUEST['user_id'];
	$booking_id=$_REQUEST['booking_id'];
	$user_review=$_REQUEST['commnet_text'];
	$user_rating=$_REQUEST['ratings'];
	$hotel_id=$_REQUEST['hotel_id'];
	$rev =$hotels->UserReviewbyid($booking_id,$hotel_id,$user_id);
	
	// var_dump($rev);
	if ($rev['booking_id'] !== $booking_id) {

		$add=$user->Userreviewcomment($user_id,$booking_id,$user_review,$user_rating,$hotel_id);
		
	if($add==1){
		$result=array('result'=>'failed');
	}else{
		$result=array('result'=>'success');
	}
	}else{
		$result=array('result'=>'failed');
	}

			echo json_encode($result);
	
	
}

?>
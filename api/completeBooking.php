<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['completeBooking']=='COMPLE12345'){

	
	$user_id = $_REQUEST['user_id'];
	$user_result=$user->UserInfobyId($user_id);
	$completed=$hotels->CompetedHotelsbyUserid($user_id);
	 // var_dump($completes);

	if(!empty($completed)){
		foreach($completed as $complete){
			//var_dump($complete);
			$data['hotel_id']=$complete['hotel_id'];
			$data['user_can_comment']='true';
			$data['hotel_name']=$complete['hotel_name'];
			$data['hotel_booking_id']=$complete['hotel_booking_id'];
			$data['booking_id']=$complete['booking_id'];
			$booking_type=$complete['booking_type'];
			if($booking_type=='1'){
				$data['check_in_date']=$complete['check_in_date'];
				$data['check_out_date']=$complete['check_out_date'];
				$data['check_in_time']='';
				$data['check_out_time']='';
			}else{
				$data['check_in_date']=$complete['check_in_date'];
				$data['check_out_date']=$complete['check_out_date'];
				$data['check_in_time']=$complete['check_in_time'];
				$data['check_out_time']=$complete['check_out_time'];
			}
			$room_type_id=$complete['room_type_id'];
			$data['room_type_name']=$complete['hotel_room_type'];
			if (!empty($complete['main_image'])) {
				$thumbimage2=explode(".",$complete['main_image']); 
				$thumbimagefinal2=$thumbimage2[0]."_thumb.".$thumbimage2[1];
			}
			$data['hotel_image_thumb']=$thumbimagefinal2;
		
			
			$getresult[]=$data;
		}
		$result=array('result'=>'success','data'=>$getresult);
	}else{
		$result=array('result'=>'failed');
	}

	echo json_encode($result);

}




?>

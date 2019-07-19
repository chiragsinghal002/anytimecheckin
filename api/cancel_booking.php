<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['cancelBooking']=='ARQP12345'){

	
	$user_id = $_REQUEST['user_id'];
	$user_result=$user->UserInfobyId($user_id);
	$cancelled=$hotels->CancelledHotelsbyUserid($user_id);
	// var_dump($cancelled);

	if(!empty($cancelled)){
		foreach($cancelled as $cancel){
			$data['hotel_id']=$cancel['hotel_id'];
			$data['user_can_comment']='false';
			$data['hotel_name']=$cancel['hotel_name'];
			$data['hotel_booking_id']=$cancel['hotel_booking_id'];
			$data['booking_id']=$cancel['booking_id'];
			$booking_type=$cancel['booking_type'];
			if($booking_type=='1'){
				$data['check_in_date']=$cancel['check_in_date'];
				$data['check_out_date']=$cancel['check_out_date'];
				$data['check_in_time']='';
				$data['check_out_time']='';
			}else{
				$data['check_in_date']=$cancel['check_in_date'];
				$data['check_out_date']=$cancel['check_out_date'];
				$data['check_in_time']=$cancel['check_in_time'];
				$data['check_out_time']=$cancel['check_out_time'];
			}
			$room_type_id=$cancel['room_type_id'];
			$data['room_type_name']=$cancel['hotel_room_type'];
			if (!empty($cancel['main_image'])) {
				$thumbimage2=explode(".",$cancel['main_image']); 
				$thumbimagefinal2=$thumbimage2[0]."_thumb.".$thumbimage2[1];
			}
			$data['hotel_image_thumb']=$thumbimagefinal2;
				if($cancel['booking_status']=='1'){
				$data['Cancellation_status']=array('Cancelled'=>'false','Inprogress'=>'false','Confirmed'=>'false');
			}else if($cancel['booking_status']=='2'){
				$data['Cancellation_status']=array('Cancelled'=>'false','Inprogress'=>'false','Confirmed'=>'true');
			}else if($cancel['booking_status']=='3'){
				$data['Cancellation_status']=array('Cancelled'=>'false','Inprogress'=>'true','Confirmed'=>'false');
			}else{
					$data['Cancellation_status']=array('Cancelled'=>'true','Inprogress'=>'false','Confirmed'=>'false');
			}
			$getresult[]=$data;
		}
		$result=array('result'=>'success','data'=>$getresult);
	}else{
		$result=array('result'=>'failed');
	}

	echo json_encode($result);

}




?>

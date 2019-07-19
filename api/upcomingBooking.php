<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['upcomingBooking']=='UPCOM12345'){

	
	$user_id = $_REQUEST['user_id'];
	$user_result=$user->UserInfobyId($user_id);
	$upcomings=$hotels->GetAllHotelsbyUserid($user_id);
	// var_dump($upcomings);

	if(!empty($upcomings)){
		foreach($upcomings as $upcoming){
			$data['hotel_id']=$upcoming['hotel_id'];
			
			$data['hotel_name']=$upcoming['hotel_name'];
			$data['booking_id']=$upcoming['booking_id'];
			$data['hotel_booking_id']=$upcoming['hotel_booking_id'];
			$booking_type=$upcoming['booking_type'];
			if($booking_type=='1'){
				$today=date('Y-m-d');
				$data['check_in_date']=$upcoming['check_in_date'];
				$data['check_out_date']=$upcoming['check_out_date'];
				$a=dateDiffInDays($today,$data['check_in_date']);
				$data['check_in_time']='';
				$data['check_out_time']='';
				$data['booking_type']='day';
				if($a>=2){
					$data['user_can_cancel']='false';
				}else{
					$data['user_can_cancel']='true';
				}
			}else{
				$data['check_in_date']=$upcoming['check_in_date'];
				$data['check_out_date']=$upcoming['check_out_date'];
				$data['check_in_time']=$upcoming['check_in_time'];
				$data['check_out_time']=$upcoming['check_out_time'];
				$data['booking_type']='hour';
				$today=date('Y-m-d');
				$a=dateDiffInDays($today,$data['check_in_date']);
				if($a>=2){
					$data['user_can_cancel']='false';
				}else{
					$data['user_can_cancel']='true';
				}
			}
			$room_type_id=$upcoming['room_type_id'];
			$data['room_type_name']=$upcoming['hotel_room_type'];
			if (!empty($upcoming['main_image'])) {
				$thumbimage2=explode(".",$upcoming['main_image']); 
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
function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
     abs(round($diff / 86400)); 
} 



?>

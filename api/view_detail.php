<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['ViewDetail']=='ARQP12345'){
	$userId=$_REQUEST['user_id'];
	$bookingId=$_REQUEST['booking_id'];
	$userresult=$user->UserInfobyId($userId);

	$resultbooking=$user->GetBookingConfirmbyId($bookingId);
  // var_dump($resultbooking);
	 $result_hotel=$user->Hoteldetailbyid($resultbooking['hotel_id']);
   // var_dump($result_hotel);
  $result_room=$user->Roomdetailbyid($resultbooking['room_type_id']);
  // var_dump($result_room);
    /////////////////////////////////////////////////
            $check_in_date = $resultbooking['check_in_date'];
           $checkdate = date("j F, Y", strtotime($check_in_date));

           $check_out_date = $resultbooking['check_out_date'];
           $checkoutdate = date("j F, Y", strtotime($check_out_date));

              $outstanding_amount=$resultbooking['actual_price']-$resultbooking['booked_price']-$resultbooking['discount_price'];
              $result=array('booking_id'=>$resultbooking['hotel_booking_id'],'hotel_name'=>$result_hotel['hotel_name'],'hotel_address'=>$result_hotel['hotel_address'],'check_in_date'=>$check_in_date,'check_out_date'=>$check_out_date,'check_in_time'=>$resultbooking['check_in_time'],'check_out_time'=>$resultbooking['check_out_time'],'no_of_adult'=>$resultbooking['no_of_adults'],'no_of_child'=>$resultbooking['no_of_childs'],'room_type'=>$result_room['hotel_room_type'],'no_of_rooms'=>$resultbooking['no_of_rooms'],'total_amount'=>$resultbooking['actual_price'],'amount_paid'=>$resultbooking['booked_price'],'outstanding_amount'=>$outstanding_amount,'booking_type'=>$resultbooking['booking_type']);
           
        	
             
              echo json_encode($result);
               

	}

?>

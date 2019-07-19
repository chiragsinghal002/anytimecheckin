<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['bookingConfirmed']=='booking12345'){
	
  $tran_id=$_REQUEST['transaction_id'];
  $booking_result=$user->GetBookingidfromtranid($tran_id);
  
	$bookingId=$booking_result['booking_id'];
	$resultbooking=$user->GetBookingConfirmbyId($bookingId);
  // var_dump($resultbooking);die;
  $hotel_id=$resultbooking['hotel_id'];

  $room_type_id=$resultbooking['room_type_id'];
  $result_hotel=$user->Hoteldetailbyid($hotel_id);
  
  $check_in_date = $resultbooking['check_in_date'];
  $check_out_date = $resultbooking['check_out_date'];
  $day = date('d', strtotime($check_in_date));
  $month=date('M',strtotime($check_in_date));
  $year=date('Y',strtotime($check_in_date));
  $price_per_day=$result_hotel['price_per_day'];
  $price_per_hour=$result_hotel['price_per_hour'];
  // var_dump($result_hotel);
   if(!empty($check_in_date && $check_out_date)){
                   $date1 = date_create($check_in_date);
                   $date2 = date_create($check_out_date);
//difference between two dates
                   $diff = date_diff($date1,$date2);
//count days
                   $days=$diff->format("%a");
                  
                 }else if(!empty($check_in_time && $check_out_time)){
                  $checkInTime=strtotime($resultbooking['check_in_time']);
                  $checkOutTime=strtotime($resultbooking['check_out_time']);
                  $datediff = $checkOutTime - $checkInTime;
                  $hour=($datediff / 3600 );
                  // $_SESSION
                }
  $dailybasisprice=$hotels->dayhourpricebydailybase($hotel_id,$room_type_id,$day,$month,$year);
    // var_dump($dailybasisprice);
  if(!empty($dailybasisprice)){
          // $avl_room=$dailybasisprice['available_room']-$dailybasisprice['booked_room'];
    $pr_p_day=$dailybasisprice['price_per_day'];
    $h_p_day=$dailybasisprice['price_per_hour'];

  }else{
          // $avl_room=10;
    $pr_p_day=$price_per_day;
    $h_p_day=$price_per_hour;
  }
  $result_room=$user->Roomdetailbyid($resultbooking['room_type_id']);
 
  $guest_name=$resultbooking['fname'].$resultbooking['lname'];
  $outstanding_amount=$resultbooking['actual_price']-$resultbooking['booked_price']-$resultbooking['discount_price'];
  $result=array('booking_id'=>$bookingId,'tran_id'=>$resultbooking['hotel_booking_id'],'hotel_name'=>$result_hotel['hotel_name'],'hotel_id'=>$resultbooking['hotel_id'],'hotel_address'=>$result_hotel['hotel_address'],'no_adult'=>$resultbooking['no_of_adults'],'no_child'=>$resultbooking['no_of_childs'],'room_type'=>$result_room['hotel_room_type'],'no_of_rooms'=>$resultbooking['no_of_rooms'],'primary_guest_name'=>$guest_name,'guest_mobile_no'=>$resultbooking['mob_no'],'guest_email_id'=>$resultbooking['email'],'price_per_day'=>$pr_p_day,'price_per_hours'=>$h_p_day,'net_payable_amount'=>$resultbooking['actual_price'],'amount_paid'=>$resultbooking['booked_price'],'outstanding_amount'=>$outstanding_amount,'discount_amount'=>'','booking_type'=>$resultbooking['booking_type'],'coupan_code_which_applied'=>'','no_of_days'=>$days,'no_hours'=>$hour,'check_in_date'=>$check_in_date,'check_out_date'=>$check_out_date,'check_in_time'=>$resultbooking['check_in_time'],'check_out_time'=>$resultbooking['check_out_time'],'hotellat'=>$result_hotel['hotel_latitude'],'hotel_lng'=>$result_hotel['hotel_longitude']);



  echo json_encode($result);


}

?>

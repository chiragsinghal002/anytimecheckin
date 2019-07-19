<?php 
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['hotelDetail']=='Hotel12345')
{
	if(isset($_REQUEST['hotel_id']))
	{
		$id = $_REQUEST['hotel_id'];
		$check_in_date=$_REQUEST['check_in_date'];
		$check_out_date=$_REQUEST['check_out_date'];
		$booking_for=$_REQUEST['booking_type'];
		$result_hotel=$user->Hoteldetailbyid($id);
		// var_dump($result_hotel);
		// $result_hotel=array('hotel_id'=>$result_hotel1['hotel_id']);
		$day = date('d', strtotime($check_in_date));
		$month=date('M',strtotime($check_in_date));
		$year=date('Y',strtotime($check_in_date));
		$hotel_id = $result_hotel['hotel_id'];
		$room_type =$user->GetRoomtypeByHotelId($id);
		$room_image =$user->GetRoomimageByHotelId($id);
		// var_dump($room_image);
		$rating=$reviews->AvarageRating($result_hotel['hotel_id']);
		$result_review=$reviews->FetchReviews($_REQUEST['hotel_id']);
		if ($result_review > 0) {
			$review_count= count($result_review);
		}else{
			$review_count=NULL;
		}
		$rate = round($rating['AVG(user_rating)']);
		$facadmin= $result_hotel['admin_facility'];
		if (!empty($facadmin)) {
			$expfacadmin = explode(',', $facadmin);           
			foreach ($expfacadmin as $expfacadmins) {
				$facilities =$hotels->GetAllfacility($expfacadmins);
				foreach ($facilities as $facility) {     
					$adm_fac[]=$facility['facility_name'];
				} 
			}  

		}
		$fac = $result_hotel['hotel_facilities'];
		$expfac = explode(',', $fac);
		if (!empty($expfac)) {
			foreach ($expfac as $expfacs) {
				$hotel_facility =$hotels->GetAllhotelfacility($expfacs);
				if (!empty($hotel_facility)) {
					foreach ($hotel_facility as $hotel_facilities) {
						$hotel_fac[]= $hotel_facilities['facility_name'];
					} 
				} 
			} 

		}
		$hotelimage=explode(",",($room_image['hotel_room_image']));

		foreach($hotelimage as $hotel_image_result)
		{

			$hotel_images[]=$hotel_image_result;


		} 
                  // var_dump($hotel_images);
		$hotel_detail=array('hotel_id'=>$result_hotel['hotel_id'],'hotel_vendor_id'=>$result_hotel['hotel_vendor_id'],'review_count'=>$review_count,'hotel_name'=>$result_hotel['hotel_name'],'hotel_address'=>$result_hotel['hotel_address'],'hotel_latitude'=>$result_hotel['hotel_latitude'],'hotel_longitude'=>$result_hotel['hotel_longitude'],'hotel_city'=>$result_hotel['hotel_city'],'hotel_pin_code'=>$result_hotel['hotel_pin_code'],'hotel_state'=>$result_hotel['hotel_state'],'hotel_country'=>$result_hotel['hotel_country'],'hotel_website'=>$result_hotel['hotel_website'],'hotel_mobile'=>$result_hotel['hotel_mobile'],'hotel_telephone'=>$result_hotel['hotel_telephone'],'hotel_fax'=>$result_hotel['hotel_fax'],'hotel_airport'=>$result_hotel['hotel_airport'],'hotel_landmark'=>$result_hotel['hotel_landmark'],'hotel_star_category'=>$result_hotel['hotel_star_category'],'hotel_description'=>$result_hotel['hotel_description'],'hotel_status'=>$result_hotel['hotel_status'],'hotel_email'=>$result_hotel['hotel_email'],'any'=>$result_hotel['any'],'check_in'=>$result_hotel['check_in'],'check_out'=>$result_hotel['check_out'],'min_hour'=>$result_hotel['min_hour'],'admin_facility'=>$adm_fac,'main_image'=>$result_hotel['main_image'],'hotel_images'=>$hotel_images,'room_type_id'=>$result_hotel['room_type_id'],'hotel_room_type'=>$result_hotel['hotel_room_type'],'no_of_rooms'=>$result_hotel['no_of_rooms'],'price_per_hour'=>$result_hotel['price_per_hour'],'price_per_day'=>$result_hotel['price_per_day'],'adult_person_capacity'=>$result_hotel['adult_person_capacity'],'child_capacity'=>$result_hotel['child_capacity'],'status'=>$result_hotel['status'],'vendor_facility'=>$result_hotel['vendor_facility'],'description'=>$result_hotel['description'],'user_rating'=>$rate);
		$result_review=$reviews->FetchReviews($_REQUEST['hotel_id']);
		if(!empty($room_type))
		{
			foreach ($room_type as $room_types) 
			{
				 // var_dump($room_types);
				$adult_person_capacity=$room_types['adult_person_capacity'];
				$hid= $room_types['hotel_id'];
				$rid= $room_types['room_type_id'];
				$room_type_name=$room_types['hotel_room_type']; 
				$price_per_hour=$room_types['price_per_hour'];
				$price_per_day=$room_types['price_per_day'];
				$room_type_id=$room_types['room_type_id'];
				$dailybasisprice=$hotels->dayhourpricebydailybase($hid,$room_type_id,$day,$month,$year);
				if(!empty($dailybasisprice)){
					$avl_room=$dailybasisprice['available_room']-$dailybasisprice['booked_room'];
					$pr_p_day=$dailybasisprice['price_per_day'];
					$h_p_day=$dailybasisprice['price_per_hour'];
					
				}else{
					$avl_room=10;
					$pr_p_day=$price_per_day;
					$h_p_day=$price_per_hour;
				}
				$room_type_discount1=$user->GetRoomtypeDiscount($room_type_id);
       // var_dump($room_type_discount1);
				if(!empty($room_type_discount1))
				{
					$room_type_discount=array('camp_dis_id'=>$room_type_discount1[0]['camp_dis_id'],'hotel_id'=>$room_type_discount1[0]['hotel_id'],'camp_id'=>$room_type_discount1[0]['camp_id'],'room_type_id'=>$room_type_discount1[0]['room_type_id'],'discount_type'=>$room_type_discount1[0]['discount_type'],'discount_price'=>$room_type_discount1[0]['discount_price'],'discount_percent'=>$room_type_discount1[0]['discount_percent'],'voucher_no'=>$room_type_discount1[0]['voucher_no'],'discount_for'=>$room_type_discount1[0]['discount_for'],'max_hour'=>$room_type_discount1[0]['max_hour'],'min_hour'=>$room_type_discount1[0]['min_hour'],'max_day'=>$room_type_discount1[0]['max_day'],'min_day'=>$room_type_discount1[0]['min_day'],'camp_dr_status'=>$room_type_discount1[0]['camp_dr_status']);
     // var_dump($room_type_discount);
				}else{
					$room_type_discount='';
				}
				$room_photo =$hotels->RoomPhotosbyid($hid,$rid);
				//var_dump($room_photo);
				$pics = $room_photo['room_photo'];
				$exp = explode(',',$pics);
				 // var_dump($exp);
				if(!empty($exp)){
					for($i=0;$i<=count($exp)-1;$i++){
						$img1 = $exp[$i];
						if(!empty($img1)){
							$thumbimg1=explode(".",$img1); 
							$thumbimg1final=$thumbimg1[0]."_thumb.".$thumbimg1[1];
							$r_image[]=$img1;
							$t_image[]=$thumbimg1final;
						}else{
							$r_image[]='NULL';
							$t_image[]='NULL';
						}
						
					}
				}
				// var_dump($r_image);
				// var_dump($t_image);
				// $room_images[]=array();
				
				if(!empty($room_type_discount))
				{
				    $discount_type=$room_type_discount['discount_type'];//1 for discount price 2 for discount %
				    $discount_price=$room_type_discount['discount_price'];
				    $discount_percent=$room_type_discount['discount_percent'];
				    $discount_for=$room_type_discount['discount_for'];
				    $max_hour=$room_type_discount['max_hour'];
				    $min_hour=$room_type_discount['min_hour'];
				    $max_day=$room_type_discount['max_day'];
				    $min_day=$room_type_discount['min_day'];
				}
				$room_type_details[]=array('room_type_id'=>$room_type_id,'room_type_name'=>$room_type_name,'facilities'=>$hotel_fac,'available_room'=>$avl_room,'price_per_day'=>$pr_p_day,'price_per_hour'=>$h_p_day,'room_type_discount'=>$room_type_discount,'room_image'=>$r_image,'thumb_image'=>$t_image);
				// $room_type_details_new[]=$room_type_details;
				unset($r_image);
				unset($t_image);
			}
		}
	}
	$result=array('result'=>'success','hotel_detail'=>$hotel_detail,'room_type'=>$room_type_details,'reviews'=>$result_review);
	echo json_encode($result);

}
?>
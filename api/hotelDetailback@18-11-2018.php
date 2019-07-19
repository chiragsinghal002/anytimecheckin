<?php 
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['hotelDetail']=='Hotel12345'){
  $id = $_REQUEST['hotel_id'];
  $result_hotel=$user->Hoteldetailbyid($id);
  $hotel_id = $result_hotel['hotel_id'];
  
   $adfac = $result_hotel['28'];
   $adexp = explode(',', $adfac);
   $total = count($adexp);  

   for ($i=0; $i <=$total-1 ; $i++) { 
   	$hotel_facility=$user->GetFacilitybyHotelsid($adexp[$i]);
    // echo "<pre>";
    // print_r($hotel_facility);
   	
   } 
   $hotel_photo = $user->GetRoomimageByHotelId($hotel_id);
   $hotelimg = $hotel_photo['hotel_room_image']; 
   
  $room_type =$user->GetRoomtypeByHotelId($hotel_id);

  $room_type_id =$room_type[0]['room_type_id'];
 

              
// echo "<pre>";
// print_r($room_type_discount1);


   // $result=array('result'=>'success','hotel_facility'=> $hotel_facility);

  $result=array('result'=>'success','hotel_detail'=>$result_hotel,'room_type_detail'=>$room_type,'hotel_image'=> $hotelimg);
  echo json_encode($result);
}
?>
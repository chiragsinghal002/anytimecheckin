<?php 
include("../classes/apidb.php");
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
// header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['hotelDetail']=='Hotel12345'){
  //var_dump($_POST);
	$id = $_REQUEST['hotel_id']; 
	
	$get_hotel = mysqli_query($apiconn,"SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.hotel_id = '$id'");
	$num_row  = mysqli_num_rows($get_hotel);

	if($num_row){

		$row=mysqli_fetch_array($get_hotel);
		
		$des = $row['hotel_description'];
		$newstring = iconv('UTF-8','UTF-8//IGNORE',$des);
		
		$hotel_id=$row['hotel_id'];
		$img = $row['main_image'];

   //            $thumbimage=explode(".",$row['main_image']); 
			// $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];

		
              // avrage rating

		$get_rating = mysqli_query($apiconn,"SELECT AVG(user_rating) FROM user_reviews WHERE `hotel_id` = '$hotel_id'");
		$num_rating  = mysqli_num_rows($get_rating);
		$row_rating = mysqli_fetch_array($get_rating);
		$rate = round($row_rating['AVG(user_rating)']);              
              // end avarage rating
		
		$hotel_id=$row['hotel_id'];
		$data1['hotel_id']=$row['hotel_id'];
		$data1['image']="image/".$img;
		$data1['hotel_name']=$row['hotel_name'];
		$data1['hotel_address']=$row['hotel_address'];
		$data1['hotel_city']=$row['hotel_city'];
		$data1['hotel_latitude']=$row['hotel_latitude'];
		$data1['hotel_longitude']=$row['hotel_longitude'];
                     //$data1['rating']=$rate;
		$data1['price']=$row['price_per_day'];
		
		$data1['hotel_description']=$newstring;
					 //$data1['hotel_facilities']=$row['hotel_facilities'];
		
		
                   // $data['responseCode']= "200";
		$data['result']="success";  
                    //$data['allComment']=$data1; 
		
		$datas = $data1;
		
		$data['hoteldetail']=$datas;					
		
		
						 //room type by hotelid
		
		$room_type = mysqli_query($apiconn,"SELECT * FROM ci_room_type WHERE hotel_id = '$id'");
		$num_room  = mysqli_num_rows($room_type);
		if($num_room>0){
			while($roomtype = mysqli_fetch_array($room_type)){
				
				$hid= $roomtype['hotel_id'];
				$rid= $roomtype['room_type_id'];					
				
						// room photo 
				
				$room_photo = mysqli_query($apiconn,"SELECT * FROM ci_room_photo  WHERE hotel_id = $hid AND room_id=$rid");
				$num_roompic  = mysqli_num_rows($room_photo);
				if($num_roompic>0){
					$roomphoto = mysqli_fetch_array($room_photo);
					
					$data2['room_photo']="image/".$roomphoto['room_photo'];   
					
					
				}
				else{
					$data2['room_photo']="Room Image not found";
					
				}
				
						// end room photo				   
				
				$room_type_id=$roomtype['room_type_id'];	
				
				$rdes = $roomtype['description'];
				$rtypestring = iconv('UTF-8','UTF-8//IGNORE',$rdes);				   
				
				$data2['room_type_id']=$roomtype['room_type_id'];
				$data2['hotel_room_type']=$roomtype['hotel_room_type'];
				$data2['price_per_hour']=$roomtype['price_per_hour'];
				$data2['price_per_day']=$roomtype['price_per_day'];
				$data2['adult_person_capacity']=$roomtype['adult_person_capacity'];
				$data2['child_capacity']=$roomtype['child_capacity'];
				$data2['status']=$roomtype['status'];
				$data2['created_at']=$roomtype['created_at'];
				$data2['modified_at']=$roomtype['modified_at'];
				$data2['admin_facility']=$roomtype['admin_facility'];
				$data2['vendor_facility']=$roomtype['vendor_facility'];
				$data2['description']=$rtypestring;					  
				$data['result']="success";                               
				$datas2[] = $data2;                                
				$data['roomtype']=$datas2;					
				
						 // discount section start			
				
				$discount = mysqli_query($apiconn,"SELECT * FROM ci_camp_discount_rate WHERE room_type_id = '$roomtype[room_type_id]' and camp_dr_status='1'");
				$numdis = mysqli_num_rows($discount);
				if($numdis>0){
					while($fetch_discount=mysqli_fetch_array($discount)){
						
						if(!empty($fetch_discount)){				   
							
					    $discount_type=$fetch_discount['discount_type'];//1 for discount price 2 for discount %
					    $discount_price=$fetch_discount['discount_price'];
					    $discount_percent=$fetch_discount['discount_percent'];
					    $discount_for=$fetch_discount['discount_for'];
					    $max_hour=$fetch_discount['max_hour'];
					    $min_hour=$fetch_discount['min_hour'];
					    $max_day=$fetch_discount['max_day'];
					    $min_day=$fetch_discount['min_day'];
					}
					
					if(!empty($fetch_discount)){
						if(!empty($discount_for=='1')){
							if(!empty($discount_price)){
								$data4['discount_price']=$discount_price.' '.'RM'.' '.'day booking';
								
							}else{
								$data4['discount_percent']=$discount_percent.'%'.' '.'day booking';
								
							}
						}else{
							if(!empty($discount_price)){
								$data4['discount_price']=$discount_price.' '.'RM'.' '.'Hour booking';
								
							}else{
								$data4['discount_percent']=$discount_percent.'%'.' '.'Hour booking';
								
							}
						}
					}else{

					}   
					
					
					    //$hotelimage = $fetch['hotel_room_image'];				
					
					
					
					$data['result']="success";  
					
					$datas4[] = $data4;
					
					$data['discount']=$datas4;
					
					
				}					
				
			}
			else {             
				$data['discount']="discount not Found";
			}
			
			
				// end discount section
		}
		
		
		
		
		
	}
	else {
             // $data['responseCode']= "0"; 
		$data['result']="No data Found";
	}

               // end room type 
	
				// hotel image 
	
	$hotel_image = mysqli_query($apiconn,"SELECT * FROM  `ci_hotel_photo` where hotel_id = $id");
	$numhimage = mysqli_num_rows($hotel_image);
	if($numhimage>0){
		$fetch=mysqli_fetch_array($hotel_image);
		
		
		$hotelimage = explode(",",$fetch['hotel_room_image']);
		foreach($hotelimage as $hi)
		{
			$thumbhotel=explode(".",$hi);
			$thumbhotelnew=$thumbhotel[0]."_thumb.".$thumbhotel[1];
			$data5['hotelimage_url']= "image/".$hi;
			$data5['hotelimagethumb_url']= "image/thumb/".$thumbhotelnew;
			$datas5[] = $data5;
		}
		
		
		$data['hotelimage']=$datas5;
		
					//	$data['hotelimage']=$hotelimage;
		
		
		$data['result']="success";  
		
		$datas3 = $data3;
		
		
	}
	else {
             // $data['responseCode']= "0"; 
		$data['hotelimage']="Hotel Image not Found";
	}
				//end hotel image
	
			// room image 
	
				// $hotel_image1 = mysqli_query($apiconn,"SELECT * FROM  `ci_room_photo` where hotel_id = $id and room_status=1");
				// $numhimage1 = mysqli_num_rows($hotel_image1);
			 //   if($numhimage1>0){
				// 	   $fetch1=mysqli_fetch_array($hotel_image1);
	
	
				// 		 $hotelimage1 = explode(",",$fetch1['room_photo']);
				// 		 foreach($hotelimage1 as $hi1)
				// 		 {
				// 		     $thumbroom=explode(".",$hi1);
				// 		     $thumbroomnew=$thumbroom[0]."_thumb.".$thumbroom[1];
				// 		    $data51['roomimage_url']= "image/".$hi1;
				// 		    $data51['roomimagethumb_url']= "image/thumb/".$thumbroomnew;
				// 		    $datas51[] = $data51;
				// 		 }
	
	
    //                     $data['roomimage']=$datas51;
	
				// 	//	$data['hotelimage']=$hotelimage;
	
	
				// 	  $data['result']="success";  
	
    //                              $datas3 = $data3;
	
	
			 //   }
			 //   else {
    //          // $data['responseCode']= "0"; 
    //             $data['hotelimage']="Hotel Image not Found";
    //       }
				//end room image
	
	
	
}
else {
             // $data['responseCode']= "0"; 
	$data['result']="No data Found";
}




$data = json_encode($data);
echo $data;
}
?>    


<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
include("../classes/apidb.php");			


		$get_hotel = mysqli_query($apiconn,"SELECT ci_hotels.*,hotel_featured.*,ci_room_type.* FROM hotel_featured INNER JOIN ci_hotels ON ci_hotels.hotel_id=hotel_featured.hotel_id LEFT JOIN ci_room_type ON hotel_featured.hotel_id=ci_room_type.hotel_id where hotel_featured.status = '1' and ci_hotels.hotel_status = '1' GROUP BY hotel_featured.hotel_id ORDER BY ci_hotels.hotel_created_date  DESC LIMIT 4");
			 $num_row  = mysqli_num_rows($get_hotel);

							
							if($num_row > 0){

								
                          while($row=mysqli_fetch_array($get_hotel))
                         {
                         	

                         if (!empty($row['main_image'])) {
                                  $thumbimage=explode(".",$row['main_image']); 
                  $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
                  $img = 'front/'.$thumbimagefinal;
              }
              else{
              	$img = 'no-image.png';

              }
              $hotel_id=$row['hotel_id'];

              // avrage rating

              $get_rating = mysqli_query($apiconn,"SELECT AVG(user_rating) FROM user_reviews WHERE `hotel_id` = '$hotel_id'");
				 $num_rating  = mysqli_num_rows($get_rating);
				$row_rating = mysqli_fetch_array($get_rating);
				 $rate = round($row_rating['AVG(user_rating)']);
				 //$rate = $row_rating[AVG('user_rating')];				
				
              // end avarage rating

				 if($row['price_per_hour']!=='0'){
								if($row['price_per_hour']<$row['price_per_day']){

									$price = number_format($row['price_per_hour']);

								}else{

									$price = number_format($row['price_per_day']);

								}

							}else{

								$price = number_format($row['price_per_day']);

							}

							 
		
                        $hotel_id=$row['hotel_id'];
                        $data1['hotel_id']=$row['hotel_id'];
					$data1['image']=$img;
                    $data1['hotel_name']=$row['hotel_name'];
                    $data1['hotel_address']=$row['hotel_address'];
                    $data1['hotel_city']=$row['hotel_city'];
                    $data1['hotel_latitude']=$row['hotel_latitude'];
                    $data1['hotel_longitude']=$row['hotel_longitude'];
                  	 $data1['rating']=$rate;
                    $data1['price']=$price;
                   
                     //$data1['hotel_description']=$row['hotel_description'];
                    
                    
										$data['responseCode']= "200";
										$data['result']="Top Hotels for Home";	
										//$data['allComment']=$data1; 
                                        
			                           $datas[] = $data1;
                                 }
                        //$data['responseCode'] = "200";
		                //$data['responseMessage'] = 'All the list of Favourite products.';
                        $data['topHotels']=$datas;
                        
   }
					  else {
							$data['responseCode']= "0"; 
    						$data['result']="No data Found";
					}
				
			
					
			$data = json_encode($data);
	echo $data;
?>		





<?php
// include_once'../Object.php';
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Headers: content-type');
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
// header('Allow: POST, GET, OPTIONS, PUT, DELETE');

// if($_REQUEST['tophotels']=='topHotels12345'){
	
	
// 	$result=$hotels->GetAllHotels();

// 	$result=array('result'=>'success','Get Top Hotels'=>$result);

// 	echo json_encode($result);
// }


?>

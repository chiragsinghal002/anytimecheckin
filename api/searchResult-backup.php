<?php 
include("../classes/apidb.php");
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
// header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['searchResult']=='SearchResult12345'){
  //var_dump($_POST);
  $search=$_REQUEST['location'];
  $optradio=$_REQUEST['optradio'];
  $check_in_date=$_REQUEST['check_in_date'];
  $check_in_time=$_REQUEST['check_in_time'];
  $check_out_date=$_REQUEST['check_out_date'];
  $check_out_time=$_REQUEST['check_out_time'];
  $no_of_adults=$_REQUEST['no_of_adults'];
  $no_of_rooms=$_REQUEST['no_of_rooms'];
  $no_of_childs=$_REQUEST['no_of_childs'];
  $lat=$_REQUEST['lat'];
  $lng=$_REQUEST['lng'];
  
      if($optradio=='1') {


    $get_user = mysqli_query($apiconn,"SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='$check_in_date' and ci_hotels.check_out>='$check_out_date' AND ci_room_type.status='1' AND ci_room_type.adult_person_capacity>=1 AND ci_room_type.child_capacity>=1 AND ci_hotels.any='3' OR ci_hotels.any='1' GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance");
               $num_row  = mysqli_num_rows($get_user);

               $data2=$num_row;


              
              if($num_row){

                $no_of_hotels = count($get_user);
                
              // echo $data1['NO. OF HOTELS']=$no_of_hotels;  
                
                          while($row=mysqli_fetch_array($get_user))
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

               
    
                        $hotel_id=$row['hotel_id'];
                        $data1['hotel_id']=$row['hotel_id'];
          $data1['image']=$img;
                    $data1['hotel_name']=$row['hotel_name'];
                    $data1['hotel_address']=$row['hotel_address'];
                    $data1['hotel_city']=$row['hotel_city'];
                    $data1['hotel_latitude']=$row['hotel_latitude'];
                    $data1['hotel_longitude']=$row['hotel_longitude'];
                     $data1['rating']=$rate;
                    $data1['price']=$row['price_per_day'];
                   
                     $data1['distance']=$row['distance'];
                    
                    
                   // $data['responseCode']= "200";
                    $data['result']="success";  
                    //$data['allComment']=$data1; 
                                        
                                 $datas[] = $data1;
                                 }
                        //$data['responseCode'] = "200";
                    //$data['responseMessage'] = 'All the list of Favourite products.';
                        $data['searchResult']=$datas;

                         $data['total hotels']=$data2;
   }
            else {
             // $data['responseCode']= "0"; 
                $data['result']="No data Found";
          }
        
        }
        else{

          $get_user = mysqli_query($apiconn,"SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='$check_in_time_new' and ci_hotels.check_out>='$check_out_time_new' AND ci_room_type.status='1' AND  ci_room_type.adult_person_capacity>='$no_of_adults' AND ci_room_type.child_capacity>='$no_of_childs' AND ci_hotels.any='3' OR ci_hotels.any='1'  GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance");
              $num_row  = mysqli_num_rows($get_user);
              $data2=$num_row;
              
              if($num_row){
                
                
                
                          while($row=mysqli_fetch_array($get_user))
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

               
    
                        $hotel_id=$row['hotel_id'];
                        $data1['hotel_id']=$row['hotel_id'];
                        $data1['image']=$img;
                    $data1['hotel_name']=$row['hotel_name'];
                    $data1['hotel_address']=$row['hotel_address'];
                    $data1['hotel_city']=$row['hotel_city'];
                    $data1['hotel_latitude']=$row['hotel_latitude'];
                    $data1['hotel_longitude']=$row['hotel_longitude'];
                     $data1['rating']=$rate;
                    $data1['price']=$row['price_per_day'];
                   
                     $data1['distance']=$row['distance'];
                    
                    
                    //$data['responseCode']= "200";
                    $data['result']="success";  
                    //$data['allComment']=$data1; 
                                        
                                 $datas[] = $data1;
                                 }
                        //$data['responseCode'] = "200";
                    //$data['responseMessage'] = 'All the list of Favourite products.';
                        $data['searchResult']=$datas;
                        $data['total hotels']=$data2;
   }
            else {
             // $data['responseCode']= "0"; 
                $data['result']="No data Found";
          }

        } 
      $data = json_encode($data);
  echo $data;
}
?>    




<?php
// include("../classes/apidb.php");

// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Headers: content-type');
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
// header('Allow: POST, GET, OPTIONS, PUT, DELETE');

// # Get JSON as a string
// $json_str = file_get_contents('php://input');

// # Get as an object

// $json_obj = json_decode($json_str);
// $search=$json_obj->location;
// $optradio=$json_obj->optradio;
// $check_in_date=$json_obj->check_in_date;
// $check_in_time=$json_obj->check_in_time;
// $check_out_date=$json_obj->check_out_date;
// $check_out_time=$json_obj->check_out_time;
// $no_of_adults=$json_obj->no_of_adults;
// $no_of_rooms=$json_obj->no_of_rooms;
// $no_of_childs=$json_obj->no_of_childs;
// $lat=$json_obj->lat;
// $lng=$json_obj->lng;


//  $i=1;
//  $result=array();
//  $subArray=array();

//    $query=mysqli_query($apiconn,"SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='2018-10-16' and ci_hotels.check_out>='2018-10-17' AND ci_room_type.status='1' AND ci_room_type.adult_person_capacity>=1 AND ci_room_type.child_capacity>=1 AND ci_hotels.any='3' OR ci_hotels.any='1' GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance");
//  $row=mysqli_num_rows($query);
  
//  if($row>0)
//  {
//    $subArray['status']=1;
//    $results=mysqli_fetch_array($query);
    
//      //$query1=mysqli_query($apiconn,"select * from `user_registration` where user_id='$results[user_id]'");
//      //$result1=mysqli_fetch_array($query1);
      
//      //$query11=mysqli_query($apiconn,"select * from `ci_hotels` where hotel_id='$results[hotel_id]'");
//      //$result11=mysqli_fetch_array($query11);


      
    
//      $subArray['user_id']= $results['user_id']; 
//      $subArray['firstname']= $results1['fname'];
//      $subArray['lastname']= $results1['lname'];
//      $subArray['hotel_id']= $results['hotel_id'];
//      $subArray['hotelname']= $results11['hotel_name'];
//      $subArray['check_in_date']= $results['check_in_date']; 
//      $subArray['check_out_date']= $results['check_out_date'];
//      $subArray['check_in_time']= $results['check_in_time']; 
//      $subArray['check_out_time']= $results['check_out_time'];
//      $subArray['no_of_rooms']= $results['no_of_rooms']; 
//      $subArray['no_of_adults']= $results['no_of_adults']; 
//      $subArray['booked_price']= $results['booked_price']; 
//      $subArray['arrival_time']= $results['arrival_time']; 
//      $result[] =  $subArray ;
    
//  $i++;
//  }
//  else
//  {
//    $subArray['status'] = 0;
//    $subArray['result'] = 'No booking is found';
//    $result[] =  $subArray ;
//  } 
                
// $myJSON = json_encode($result);

// echo $myJSON;
?>


              
<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['BookingDetail']=='ARQP12345'){

  $data['noofroom']=$_REQUEST['noofroom'];
  $data['no_of_person']=$_REQUEST['no_of_person'];
  $data['check_in_date']=$_REQUEST['check_in_date'];
  $data['check_out_date']=$_REQUEST['check_out_date'];
  $data['total_price']=$_REQUEST['total_price'];
  $data['discount_type']=$_REQUEST['discount_type'];
  $data['discount_price']=$_REQUEST['discount_price'];
  $data['discount_percent']=$_REQUEST['discount_percent'];
  $data['discount_for']=$_REQUEST['discount_for'];
  $data['max_hour']=$_REQUEST['max_hour'];
  $data['min_hour']=$_REQUEST['min_hour'];

   $data['max_day']=$_REQUEST['max_day'];
  $data['min_day']=$_REQUEST['min_day'];
  $data['hotel_id']=$_REQUEST['hotel_id'];
  $data['hotel_name']=$_REQUEST['hotel_name'];
  $data['hotel_address']=$_REQUEST['hotel_address'];
  $data['hotel_room_type']=$_REQUEST['hotel_room_type'];
  $data['check_in_time']=$_REQUEST['check_in_time'];
  $data['check_out_time']=$_REQUEST['check_out_time'];
  $data['hotel_room_type_id']=$_REQUEST['hotel_room_type_id'];
  $data['optradio']=$_REQUEST['optradio'];
  $data['childs']=$_REQUEST['childs'];  
   $data['user_id']=$_REQUEST['user_id'];



   if(!empty($data['check_in_date'] && $data['check_out_date'])){
                   $date1 = date_create($data['check_in_date']);
                   $date2 = date_create($data['check_out_date']);

//difference between two dates
                   $diff = date_diff($date1,$date2);

//count days
                   $days=$diff->format("%a");
                   //$_SESSION['days']=$days;
                 } 
                 if(!empty($check_in_time && $check_out_time)){
                  $checkInTime=strtotime($check_in_time);
                  $checkOutTime=strtotime($check_out_time);
                  $datediff = $checkOutTime - $checkInTime;
                  $hour=($datediff / 3600 );
                  //$_SESSION['hour']=$hour;
                }

                if(!empty($hour)){
                	$data['hour'] = $hour;
                }
                else{
                	$data['day'] = $days;

                }

                // rating section

                $rating=$reviews->AvarageRating($data['hotel_id']);
                $rate = round($rating['AVG(user_rating)']);

                $data['rating'] = $rate;

                // end rating section

                $data['original_price']=number_format($data['total_price']);

                // discount section

                 if(!empty($data['discount_for'])){

                 	 if($data['optradio']=='1'){
                if(!empty($data['discount_for']=='2')){
                
                  if($data['min_day']<=$days){

                        if($days<=$data['max_day']){
                         if(!empty($data['discount_price'])){
                          $data['discount_price']=$data['discount_price'];
                        }else{
                          $data['discount_percent'] = $data['discount_percent'];
                        }
                        
                      }
                    }
                    
              }
              }else{
                if($data['min_hour']!=='0.00'){
                    if($data['min_hour']<=$hour){
                    if($hour<= $data['max_hour']){
                     if(!empty($data['discount_price'])){
                      $data['discount_price'] =$data['discount_price'];
                    }else{
                       $data['discount_percent'] =$data['discount_percent'];
                    }
                     
                  }
                
                }
                }

                 
              }
                 }

                 ////////////////////////////
                  if(!empty($data['discount_for'])){
          if($data['optradio']=='1'){
           if($data['discount_for']=='2'){
            if($data['min_day']<=$days){                         // echo 'day';
              if($days<=$data['max_day']){
               if(!empty($data['discount_price'])){
                $data['discount_price']=$data['discount_price'];
              }else{
                $abc=$data['total_price']*$data['discount_percent'];
                $data['discount_price']=$abc/100;
              }
            }else{
              $data['discount_price']='0';
            }
          }else{
            $data['discount_price']='0';
          }
        }
      }
      if($data['optradio']=='2'){
        if($data['discount_for']=='1'){
                               // echo 'hour';
         if($data['min_hour']<=$hour){
          if($hour<=$data['max_hour']){
           if(!empty($data['discount_price'])){
            $data['discount_price']=$data['discount_price'];
          }else{
            $abc=$data['total_price']*$data['discount_percent'];
            $data['discount_price']=$abc/100;
          }
        }else{
          $data['discount_price']='0';
        }
      }else{
        $data['discount_price']='0';
      }
    }else{
      $data['discount_price']='0';
    }
  }
}else{
  $data['discount_price']='0';
}

$setting=$user->GetSettingDetail();

$dis = $setting['admin_discount'];

$data['booking_fees']=number_format(($data['total_price']-$data['discount_price'])*$dis/100);

$data['price']= number_format($data['total_price']-$data['discount_price']);


                 ///////////////////////////////

                $signup = include_once'signup_guest.php';	



                // end discount section

  
  
$detail=array('result'=>'success','BookingDetail'=>$data);
	echo json_encode($detail);



  

}

?>

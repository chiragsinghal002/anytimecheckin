<?php 
    require_once 'db.php';

    class Hotel extends DB
  {  
  // admin facility  section
public function GetAllfacility($facility){       
       
             $selectfacility = $this->db->query("SELECT * FROM facility_id WHERE for_hotel = '1' AND admin = '1' AND facility_id = '$facility'") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectfacility);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectfacility)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }
    }
  // end admin facility section 


    // hotel facility  section
public function GetAllhotelfacility($facility){       
       
             $selectfacility = $this->db->query("SELECT * FROM facility_id WHERE for_hotel = '1' AND vendor = '1' AND facility_id = '$facility'") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectfacility);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectfacility)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }



    }
  // end hotel facility section 

     // room facility  section
public function GetAllroomfacility($hid){       
       
             $selectfacility = $this->db->query("SELECT * FROM facility_id WHERE for_room_type = '1' AND vendor = '1' AND hotel_id = '$hid'") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectfacility);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectfacility)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }



    }
  // end room facility section

public function GetAllHotels(){       
       
             $selectuser = $this->db->query("SELECT ci_hotels.*,hotel_featured.*,ci_room_type.* FROM hotel_featured INNER JOIN ci_hotels ON ci_hotels.hotel_id=hotel_featured.hotel_id INNER JOIN ci_room_type ON hotel_featured.hotel_id=ci_room_type.hotel_id where hotel_featured.status = '1' and ci_hotels.hotel_status = '1' GROUP BY hotel_featured.hotel_id ORDER BY ci_hotels.hotel_created_date  DESC LIMIT 4") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectuser)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }
    }

    // get all hotels 


public function GetAllTopHotels(){       
       
             $selectuser = $this->db->query("SELECT ci_hotels.*,hotel_featured.*,ci_room_type.* FROM hotel_featured INNER JOIN ci_hotels ON ci_hotels.hotel_id=hotel_featured.hotel_id LEFT JOIN ci_room_type ON hotel_featured.hotel_id=ci_room_type.hotel_id where hotel_featured.status = '1' and ci_hotels.hotel_status = '1' GROUP BY hotel_featured.hotel_id ORDER BY ci_hotels.hotel_created_date  DESC LIMIT 20") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectuser)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }



    }

    // get all hotes end

public function GetAllHotelsbyUserid($id){  

 $date = date("Y-m-d"); 

    //echo "SELECT ci_hotels.*,hotel_featured.*,hotel_booking.* FROM hotel_featured INNER JOIN ci_hotels ON hotel_featured.hotel_id=ci_hotels.hotel_id INNER JOIN hotel_booking ON ci_hotels.hotel_id=hotel_booking.hotel_id where hotel_booking.booking_status='1' AND hotel_booking.user_id = '$id' AND hotel_booking.check_in_date >= '$date' ORDER BY check_in_date DESC";

 $selectuser = $this->db->query("SELECT ci_hotels.*,hotel_featured.*,hotel_booking.* FROM hotel_featured INNER JOIN ci_hotels ON hotel_featured.hotel_id=ci_hotels.hotel_id INNER JOIN hotel_booking ON ci_hotels.hotel_id=hotel_booking.hotel_id where hotel_booking.booking_status='1' AND hotel_booking.user_id = '$id' AND hotel_booking.check_in_date >= '$date' ORDER BY check_in_date DESC ") or die(mysqli_error($this->db));
       
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectuser)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }



    }


    public function CompetedHotelsbyUserid($id){       
       
             $selectuser = $this->db->query("SELECT ci_hotels.*,hotel_featured.*,hotel_booking.*,ci_room_type.price_per_hour,ci_room_type.price_per_day,ci_room_type.hotel_room_type FROM hotel_featured INNER JOIN ci_hotels ON hotel_featured.hotel_id=ci_hotels.hotel_id INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id INNER JOIN hotel_booking ON ci_hotels.hotel_id=hotel_booking.hotel_id where hotel_booking.booking_status='2' AND hotel_booking.user_id = '$id' GROUP BY `hotel_booking_id` ORDER BY check_in_date DESC") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectuser)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }



    }

    public function CancelledHotelsbyUserid($id){       
       
             $selectuser = $this->db->query("SELECT ci_hotels.*,hotel_featured.*,hotel_booking.*,ci_room_type.price_per_hour,ci_room_type.price_per_day,ci_room_type.hotel_room_type FROM hotel_featured INNER JOIN ci_hotels ON hotel_featured.hotel_id=ci_hotels.hotel_id INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id INNER JOIN hotel_booking ON ci_hotels.hotel_id=hotel_booking.hotel_id where hotel_booking.booking_status='4' AND hotel_booking.user_id = '$id' ORDER BY check_in_date DESC") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectuser)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }
    }

    // user Review

public function UserReviewbyid($bid,$hid,$user_id){   
//echo "SELECT * FROM user_reviews  WHERE booking_id = $bid AND hotel_id=$hid AND user_id = $user_id";die;    
       
             $selectuser = $this->db->query("SELECT * FROM user_reviews  WHERE booking_id = $bid AND hotel_id=$hid AND user_id = $user_id") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                $fetch=mysqli_fetch_array($selectuser);
                     // while($fetch=mysqli_fetch_array($selectuser)){
            // $data[]=$fetch;
                $data=$fetch;
        // }
            return $data;
             }else{
                return 0;
             }
    }


// user review end


public function Roomtypebyid($rid){

   $selectuser = $this->db->query("SELECT * FROM ci_room_type  WHERE room_type_id=$rid") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
   $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      // while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1=$fetch;
      // }
    return $fetch1;
  }else{
    return 0;
  }
}





public function RoomPhotosbyid($hid,$rid){


   $selectuser = $this->db->query("SELECT * FROM ci_room_photo  WHERE hotel_id = $hid AND room_id=$rid") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
   $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      // while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1=$fetch;
      // }
    return $fetch1;
  }else{
    return 0;
  }
}

// this is use for daily day and hour price change basis of hotel id and room type id
public function dayhourpricebydailybase($hid,$room_type_id,$day,$month,$year){


   $selectuser = $this->db->query("SELECT available_room_day,available_room_hour,booked_room_day,booked_room_hour,price_per_day,price_per_hour FROM room_pricing_schedule_test  WHERE hotel_id ='".$hid."' AND room_type_id='".$room_type_id."' AND day='".$day."' AND month='".$month."' AND year='".$year."' AND status='1'") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
   $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      // while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1=$fetch;
      // }
    return $fetch1;
  }else{
    return NULL;
  }
}

// This is for available rooms in room type

public function availableRoomsInHotelType($room_type_id,$check_in_date,$check_out_date,$hotel_id){

    // echo "SELECT * FROM hotels_room_inventory  WHERE room_type_id = $room_type_id AND room_status='1'";
   // $selectuser = $this->db->query("SELECT * FROM hotels_room_inventory  WHERE room_type_id = $room_type_id AND room_status='1' AND hotel_id='$hotel_id'") or die(mysqli_error($this->db)); 
   $selectuser = $this->db->query("SELECT no_of_rooms FROM ci_room_type  WHERE room_type_id = $room_type_id AND status='1' AND hotel_id='$hotel_id'") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
    $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      // while($fetch=mysqli_fetch_array($selectuser)){
   
      // }
    return  $fetch['no_of_rooms'];
  }else{
    return 0;
  }
}
   	
	
	
	// For Room Availabe by hour

public function roomAvailableByHour($room_type_id,$check_in_date,$hotel_id){

 
   $selectuser = $this->db->query("SELECT check_in_time,check_out_time FROM hotel_booking  WHERE room_type_id = $room_type_id AND status='1' AND hotel_id='$hotel_id' AND booking_type='2' ORDER BY check_in_time ASC") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
   // $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      while($fetch=mysqli_fetch_assoc($selectuser)){
            $data[]=$fetch;
      }
      // var_dump($data);
      foreach ($data as $v) {
  if (isset($_data[$v['check_out_time']])) {
    // found duplicate
    continue;
  }
  // remember unique item
  $_data[$v['check_out_time']] = $v;
}
    return $data = array_values($_data);
  }else{
    return 0;
  }
}

	
	public function update($tablename,$data,$condition){
                     if (count($data) > 0) {
                        foreach ($data as $key => $value) {

                            //$value = mysql_real_escape_string($value); // this is dedicated to @Jon
                            $value = "'$value'";
                            $updates[] = "$key = $value";
                        }
                    }
                    if (count($condition) > 0) {
                        foreach ($condition as $key => $value) {

                            //$value = mysql_real_escape_string($value); // this is dedicated to @Jon
                            $value = "'$value'";
                            $conditions[] = "$key = $value";
                        }
                    }
                    $implodeArray = implode(', ', $updates);
                    $implodeArray1 = implode(', ', $conditions);
                    //echo "UPDATE $tablename SET $implodeArray  where  $implodeArray1";die;
                    $selectuser = $this->db->query("UPDATE $tablename SET $implodeArray  where  $implodeArray1") or die(mysqli_error($this->db));
                    if($selectuser){
                        return '1';
                    }else{
                        return '0';
                    }
                }


                public function GetProjectLikes($project_id,$like_type){
                   
                   if($like_type=='1'){
                         $selectuser = $this->db->query("SELECT * FROM project_like where project_id='$project_id' and like_type='1'");
                    $fetch=mysqli_fetch_array($selectuser);
                     $num=mysqli_num_rows($selectuser);
                    return $num;
                   }else{
                     $selectuser = $this->db->query("SELECT * FROM project_like where project_id='$project_id' and like_type='2'");
                    $fetch=mysqli_fetch_array($selectuser);
                    $num=mysqli_num_rows($selectuser);
                    return $num;
                   }
                   
                }


                 public function InsertProjectLikes($project_id,$user_id,$like_type){
                   
                   if($like_type=='1'){
                    $selectuser = $this->db->query("INSERT into project_like (like_id,project_id,user_id,like_type,like_no,status) values('','".$project_id."','".$user_id."','1','1','1')") or die(mysqli_error($this->db));
                    //$fetch=mysqli_fetch_array($selectuser);
                    $result=$this->GetProjectLikes($project_id,$like_type);
                    
                    return $result;
                   }else{
                        $selectuser = $this->db->query("INSERT into project_like (like_id,project_id,user_id,like_type,like_no,status) values('','".$project_id."','".$user_id."','2','1','1')") or die(mysqli_error($this->db));
                    //$fetch=mysqli_fetch_array($selectuser);
                    $result=$this->GetProjectLikes($project_id,$like_type);
                    return $result;
                   }
                    
                }

                 public function FollowbyId($pro_id){
       
        $getproject = $this->db->query("SELECT * FROM my_following where project_id='$pro_id'");
        $fetch=mysqli_fetch_array($getproject);
        
        return $fetch;
    }

    public function FriendbyId($sid,$user_id1){
      //echo "SELECT * FROM add_friend where sender_user_id='$sid' and receiver_user_id='$user_id1'";die;

        $getfriend = $this->db->query("SELECT * FROM add_friend where sender_user_id='$sid' and receiver_user_id='$user_id1'");
        if(mysqli_num_rows($getfriend)>0){
             //echo "SELECT * FROM add_friend where sender_user_id='$sid' and receiver_user_id='$user_id1'";die;
             $fetch=mysqli_fetch_array($getfriend);
        
            return $fetch;
        }else{
            //echo "SELECT * FROM add_friend where receiver_user_id='$sid' and sender_user_id='$user_id1'";die;
             $getfriend = $this->db->query("SELECT * FROM add_friend where receiver_user_id='$sid' and sender_user_id='$user_id1'");
              $fetch=mysqli_fetch_array($getfriend);
        
            return $fetch;
        }
       
    }

    public function TotalVisits($uid,$pid){
       
       $date = date('Y-m-d');
        $selectuser = $this->db->query("INSERT into project_visits set project_id = $pid,user_id = '$uid',visit='1',modified='$date'") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);
        
        return 1;
      
         
        
    }

    public function GetVisitsbyProjectid($pro_id){
       
        
             $selectuser = $this->db->query("SELECT * from project_visits where project_id = '$pro_id' GROUP BY user_id") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                     while($fetch=mysqli_fetch_array($selectuser)){
            $data[]=$fetch;
        }
            return $data;
             }else{
                return 0;
             }
       
    
       
    }

     public function GetmaxBid($bid){
        $created=date('Y-m-d');
       //echo "SELECT max(bid_price) FROM add_bid where project_id='$bid'";die;
        $selectuser = $this->db->query("SELECT max(bid_price) FROM add_bid where project_id='$bid'") or die(mysqli_error($this->db));
        $fetch=mysqli_fetch_array($selectuser);
        //var_dump($fetch);die;
        if($fetch[0]!=='NULL'){
            
            $bid=$fetch[0];
        }else{
            $selectuser = $this->db->query("SELECT place_bid FROM projects where project_id='$bid'") or die(mysqli_error($this->db));
            $fetch=mysqli_fetch_array($selectuser);
            $bid=$fetch[0];
        }
        return $bid;
        
        
        
    }

     public function BidMail($bid){
       //echo "chirag";die;
       
        //echo "SELECT sold_ideas.*,projects.*,users.* FROM sold_ideas INNER JOIN projects ON sold_ideas.project_id=projects.project_no INNER JOIN users ON projects.user_id=users.user_id where sold_ideas.buyer_id='$user_id' GROUP BY sold_ideas.buyer_id,sold_ideas.project_id";die;
         $date=date('Y-m-d');
        // echo "SELECT projects.*,users.* FROM projects INNER JOIN users ON users.user_id=projects.user_id where projects.project_time>='$date' and projects.project_id='$bid'";die;
       
        $selectuser = $this->db->query("SELECT projects.*,users.* FROM projects INNER JOIN users ON users.user_id=projects.user_id where projects.project_time>='$date' and projects.project_id='$bid'") or die(mysqli_error($this->db));
             $num=mysqli_num_rows($selectuser);
             if($num>0){
                      $selectuser1 = $this->db->query("SELECT add_bid.*,users.* FROM add_bid INNER JOIN users ON users.user_id=add_bid.user_id where add_bid.bid_price=max(),add_bid.project_id='$bid'") or die(mysqli_error($this->db));
        $fetch=mysqli_fetch_array($selectuser1);
        
             }else{
                return 0;
             }

       }

} 
?>
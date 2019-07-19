<?php 
    require_once 'db.php';

    class Bid extends DB
  { 
    
   	
	 // Add Bid
    public  function AddBids($data) {
		$imageDBpath1="";

	for($i=0; $i<count($_FILES['documents']['name']); $i++) {
         

		$pic_loc2 = $_FILES['documents']['tmp_name'][$i];

		$folder2="user_documents/";
		$pic2 = rand(0000,9999).$_FILES['documents']['name'][$i];

        $img_name[]=$pic2;
		//$imageDBpath1[]= $pic2.",";
		move_uploaded_file($pic_loc2,$folder2.$pic2);
	}
		
		//var_dump($img_name);die;
        $imgname=implode(',', $img_name);
		
	  $created = date('Y-m-d h:i:s'); 
      $expiry_date=date('Y-m-d',strtotime("+30 days"));
	  
	  $sql = "INSERT INTO projects SET user_id = '$data[user_id]', project_no = '$data[project_no]', project_title = '$data[project_title]',project_type='1',place_bid = '$data[place_bid]',capital = '$data[capital]',forecast ='$data[forecast]',documents ='$imgname',project_time = '$data[project_time]',status ='3',created_at='$created',modified_at='$created'";
     
        $result = $this->db->query($sql) or die(mysqli_error($this->db));  
        //$row = mysql_fetch_array($result);
      $id = mysqli_insert_id($this->db);
		if($id >0){              
            //echo "INSERT INTO project_info SET project_id = '$id' and expiry_date='$expiry_date'";die;
                   $result = $this->db->query("INSERT INTO project_info SET project_id = '$id',expiry_date='$expiry_date',status ='3'") or die(mysqli_error($this->db));
                   $data['status']='1';
                   $data['id']=$id;
               return $data;
            }else{
                return 0;
            }
		
		
        //echo $row['name'];  
    }  


    // Add buy now Project
     public  function AddBuyNow($data) {
        $imageDBpath1="";

    for($i=0; $i<count($_FILES['documents']['name']); $i++) {
         

        $pic_loc2 = $_FILES['documents']['tmp_name'][$i];

        $folder2="user_documents/";
        $pic2 = rand(0000,9999).$_FILES['documents']['name'][$i];

        $img_name[]=$pic2;
        //$imageDBpath1[]= $pic2.",";
        move_uploaded_file($pic_loc2,$folder2.$pic2);
    }
        
        //var_dump($img_name);die;
        $imgname=implode(',', $img_name);
        
      $created = date('Y-m-d h:i:s'); 
       $expiry_date=date('Y-m-d',strtotime("+30 days"));
      $sql = "INSERT INTO projects SET user_id = '$data[user_id]', project_no = '$data[project_no]', project_title = '$data[project_title]',project_type='2',capital = '$data[capital]',forecast ='$data[forecast]',documents ='$imgname',buy_now='".$data['buy_now']."',project_time = '$data[project_time]',status ='3',created_at='$created',modified_at='$created'";
     
        $result = $this->db->query($sql) or die(mysqli_error($this->db));  
        //$row = mysql_fetch_array($result);
         $id = mysqli_insert_id($this->db);
        if($id >0){              
                   $result = $this->db->query("INSERT INTO project_info SET project_id = '$id',expiry_date='$expiry_date',status='3'") or die(mysqli_error($this->db));
                   $data['status']='1';
                   $data['id']=$id;
               return $data;
            }else{
                return 0;
            }
        
        
        //echo $row['name'];  
    }  

        // Add donate Project
         public  function AddDonate($data) {
        $imageDBpath1="";

    for($i=0; $i<count($_FILES['documents']['name']); $i++) {
         

        $pic_loc2 = $_FILES['documents']['tmp_name'][$i];

        $folder2="user_documents/";
        $pic2 = rand(0000,9999).$_FILES['documents']['name'][$i];

        $img_name[]=$pic2;
        //$imageDBpath1[]= $pic2.",";
        move_uploaded_file($pic_loc2,$folder2.$pic2);
    }
        
        //var_dump($img_name);die;
        $imgname=implode(',', $img_name);
        
      $created = date('Y-m-d h:i:s'); 
       $expiry_date=date('Y-m-d',strtotime("+30 days"));
      $sql = "INSERT INTO projects SET user_id = '$data[user_id]', project_no = '$data[project_no]', project_title = '$data[project_title]',project_type='3',capital = '$data[capital]',forecast ='$data[forecast]',documents ='$imgname',donate='".$data['donate']."',project_time = '$data[project_time]',status ='3',created_at='$created',modified_at='$created'";
     
        $result = $this->db->query($sql) or die(mysqli_error($this->db));  
        //$row = mysql_fetch_array($result);
         $id = mysqli_insert_id($this->db);
        if($id >0){              
                   $result = $this->db->query("INSERT INTO project_info SET project_id = '$id',expiry_date='$expiry_date',status='3'") or die(mysqli_error($this->db));
                   $data['status']='1';
                   $data['id']=$id;
               return $data;
            }else{
                return 0;
            }
        
        
        //echo $row['name'];  
    }  





        // Close Donate Project

	
	 public function getBidbyId($id){
        $getbid = $this->db->query("SELECT * FROM projects where project_id='$id'");
        $fetch = mysqli_fetch_array($getbid);
        
        return $fetch;
    }
	
	 public function getProjectinfobyPid($id){
        
        //echo "SELECT projects.*,project_info.* FROM projects INNER JOIN project_info ON projects.project_id=project_info.project_id where projects.project_id='$id'";die;
        $getproject = $this->db->query("SELECT projects.*,project_info.* FROM projects INNER JOIN project_info ON projects.project_id=project_info.project_id where projects.project_id='$id'");
        $fetch = mysqli_fetch_array($getproject);
        
        return $fetch;
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
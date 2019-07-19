<?php
    require_once 'db.php';

    class Project extends DB
  {

      // For User Registration1//

    public  function register1($data,$user_id) {
        //var_dump($data);die;
        //$pass = md5($password);
        $date=date('Y-m-d');
        if($data['gender']=='man'){
            $expiry_date=date('Y-m-d',strtotime($date. ', + 2 days'));
            $expiry_date1 = strtotime($expiry_date);
    }else{
            $expiry_date=date('Y-m-d',strtotime($date. ', + 7 days'));
             $expiry_date1 = strtotime($expiry_date);
        }
            $register = $this->db->query("Insert into users_info (`id`, `user_id`, `gender`, `looking_for`, `sex_icon`,`dob`,`city`,`state`, `country`, `education`, `civil_estate`, `size`, `origen`, `color_hair`, `pets`, `lifestyle`, `vegetarian`, `childs`, `no_of_childs`, `smoking`, `supported_team`, `package_type`, `activation_date`, `expiry_date`, `status`, `created`) values ('','".$user_id."','".$data['gender']."','".$data['looking']."','".$data['sex_icon']."','".$data['dob']."','','','','".$data['education']."','".$data['civil_estate']."','".$data['size']."','".$data['origen']."','','','','','','','','','normal','$date','$expiry_date1','0','$date')") or die(mysqli_error($this->db));
            if($register){
                $package = $this->db->query("Insert into user_package (package_id,user_id,package_info,price,activation_date,expiry_date,status,created,modified) values('','".$user_id."','normal','0','$date','".$expiry_date1."','0','$date','$date')") or die(mysqli_error($this->db));
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }

    // User Registarion2
    public  function register2($data,$user_id) {
        //$pass = md5($password);

            $created=date('Y-m-d');
            $register = $this->db->query("UPDATE users_info SET city='".$data['city']."',state='".$data['state']."',country='".$data['country']."',color_hair='".$data['hair_color']."',eye_color='".$data['eye_color']."',pets='".$data['pets']."',pet_category='".$data['pet_category']."',lifestyle='".$data['lifestyle']."',vegetarian='".$data['vegetarian']."',childs='".$data['children']."',no_of_childs='".$data['no_of_childs']."',smoking='".$data['smoking']."',supported_team='".$data['supported_team']."',team_name='".$data['sport_name']."',child_category='".$data['child_category']."',team_category='".$data['sport_category']."',only_chat='".$data['only_chat']."',only_speak='".$data['only_speak']."',sporadic_relationship='".$data['sporadic_relationship']."',serious_relationship='".$data['serious_relationship']."' WHERE user_id='".$user_id."'") or die(mysqli_error($conn));
            if($register){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }

    //Update user account for deactivation users_info and users
    public  function DeactivateAccount($user_id) {


            $created=date('Y-m-d');
            //echo   "UPDATE users_info INNER JOIN users ON users.user_id=users_info.user_id SET users.status='2',users_info.status='2' where users.user_id='$user_id'";
            $register = $this->db->query("UPDATE users_info INNER JOIN users ON users.user_id=users_info.user_id SET users.status='2',users_info.status='2' where users.user_id='$user_id'") or die(mysqli_error($conn));
            if($register){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }



    // close fetch love friend list

    // close user search result
     // Get user details using user_id

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
        $selectuser = $this->db->query("UPDATE $tablename SET $implodeArray  where  $implodeArray1");
        if($selectuser){
            return '1';
        }else{
            return '0';
        }
    }



	 // forgot password

    public function UserForgotPassword($email){
        $selectuser = $this->db->query("SELECT * FROM users where email='$email'");
        $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
        return $fetch;
    }
    // end forgot password

	// start user by user id

	public function UserbyId($user_id){

        $selectuser = $this->db->query("SELECT * FROM users where user_id='$user_id'");
        $fetch=mysqli_fetch_array($selectuser);

        return $fetch;
    }

    public function GetProjectLikes($project_id,$like_type){

       if($like_type=='1'){
             $selectuser = $this->db->query("SELECT * FROM project_like where project_id='$project_id' and like_type='1'");
        $fetch=mysqli_fetch_array($selectuser);

        return $fetch;
       }else{
         $selectuser = $this->db->query("SELECT * FROM project_like where project_id='$project_id' and like_type='2'");
        $fetch=mysqli_fetch_array($selectuser);
            foreach($fetch as $data){

            }
        return $fetch;
       }

    }

     public function GetProjectinfo($id){
        //echo "SELECT projects.*,project_info.* FROM projects INNER JOIN project_info ON projects.project_id=project_info.project_id where projects.project_id='$id'";die;
        $getproject = $this->db->query("SELECT projects.*,project_info.*,users.*,users_info.* FROM projects INNER JOIN project_info ON projects.project_id=project_info.project_id INNER JOIN users_info ON projects.user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where projects.project_id='$id'") or die(mysqli_error($this->db));
        $fetch = mysqli_fetch_array($getproject);

        return $fetch;
    }


     public function InsertProjectLikes($project_id,$user_id,$like_type){

       if($like_type=='1'){
        $selectuser = $this->db->query("INSERT into project_like (like_id,project_id,user_id,like_type,like_no,status) values('','".$project_id."','".$user_id."','1','1','1')") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);

        return 1;
       }else{
            $selectuser = $this->db->query("INSERT into project_like (like_id,project_id,user_id,like_type,like_no,status) values('','".$project_id."','".$user_id."','2','1','1')") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);

        return 1;
       }

    }

     public function AddPayment($project_id,$user_id,$pay_mode){
        $created=date('Y-m-d');

        $selectuser = $this->db->query("INSERT into payment_info (payment_id,user_id,project_id,payment_method,amount,created) values('','".$user_id."','".$project_id."','$pay_mode','2','$created')") or die(mysqli_error($this->db));
        if($selectuser){
            return 1;
        }
        //$fetch=mysqli_fetch_array($selectuser);


    }

     public function SoldIdea($pro_id,$buyer_id,$seller_id,$price,$pay_mode){
        //echo 'chirag';
        $created=date('Y-m-d');
       //echo $pro_id;die;
        $result=$this->ProjectType($pro_id);
        //echo $result;die;
        if($result=='1'){
            //echo "INSERT into sold_ideas (sold_idea_no,project_id,buyer_id,seller_id,paying_amount,created) values('','".$pro_id."','".$buyer_id."','".$seller_id."','".$price."','$created')";die;
             $selectuser = $this->db->query("INSERT into sold_ideas (sold_idea_no,project_id,buyer_id,seller_id,paying_amount,created) values('','".$pro_id."','".$buyer_id."','".$seller_id."','".$price."','$created')") or die(mysqli_error($this->db));
        //echo '1';
             return 0;
        }
        if($result=='0'){
             $selectuser = $this->db->query("INSERT into sold_ideas (sold_idea_no,project_id,buyer_id,seller_id,paying_amount,created) values('','".$pro_id."','".$buyer_id."','".$seller_id."','".$price."','$created')") or die(mysqli_error($this->db));
        if($selectuser){
            $update=$this->db->query("UPDATE projects JOIN project_info ON projects.project_id = project_info.project_id SET project_info.status='0',projects.status='0' where projects.project_no='$pro_id'") or die(mysqli_error($this->db));
            return 1;
        }
        }

        //$fetch=mysqli_fetch_array($selectuser);


    }

     public function AddPaymentBuyNow($project_id,$user_id){
        $created=date('Y-m-d');

        $selectuser = $this->db->query("INSERT into payment_info (payment_id,user_id,project_id,amount,created) values('','".$user_id."','".$project_id."','2','$created')") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);


    }

     public function AddPaymentDonate($project_id,$user_id){
        $created=date('Y-m-d');

        $selectuser = $this->db->query("INSERT into payment_info (payment_id,user_id,project_id,amount,created) values('','".$user_id."','".$project_id."','2','$created')") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);


    }

    public function AddBid($curr_bid,$project_id,$user_id){
        $created=date('Y-m-d');
       //echo "INSERT into add_bid(bid_id,project_id,user_id,bid_price,created) values('','".$project_id."','".$user_id."','".$curr_bid."','$created')";die;
        $selectuser = $this->db->query("INSERT into add_bid (bid_id,project_id,user_id,bid_price,created) values('','".$project_id."','".$user_id."','".$curr_bid."','$created')") or die(mysqli_error($this->db));
        //echo "UPDATE projects SET place_bid='$curr_bid' where project_id='$project_id'";die;
        $updatebid=$this->db->query("UPDATE projects SET place_bid='$curr_bid' where project_id='$project_id'") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);
        return 1;


    }



    public function GetAllProject($user_id){

        // echo "SELECT projects.*,project_info.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id where projects.status='1'";die;
        $date=date('Y-m-d');
        // echo "SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.status='1'and projects.user_id!='$user_id' and projects.date(project_time)>=$date";die;

             $selectuser = $this->db->query("SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.status='1'and projects.user_id!='$user_id' and projects.project_time>='$date'") or die(mysqli_error($this->db));
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
      public function GetAllProjectNum(){

        // echo "SELECT projects.*,project_info.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id where projects.status='1'";die;
            $date=date('Y-m-d');
             $selectuser = $this->db->query("SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where project_info.status != '2' and projects.status != '2'and projects.status != '0' and project_info.status != '0' and projects.status != '3' and project_info.status != '3' and projects.project_time>='$date' ") or die(mysqli_error($this->db));
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

    public function GetAllProjectforFront(){
         $date=date('Y-m-d');
      //echo "SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where project_info.status != '2' and projects.status != '2'and projects.status != '0' and project_info.status != '0' and projects.status != '3' and project_info.status != '3' and projects.project_time>='$date' ";die;
         //echo "SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.status='1'and projects.user_id!='$user_id' and projects.project_time>='$date'";die;
       
             //$selectuser = $this->db->query("SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where project_info.status != '2' and projects.status != '2'and projects.status != '0' and project_info.status != '0' and projects.status != '3' and project_info.status != '3' and projects.project_time>='$date' ") or die(mysqli_error($this->db));
           $selectuser = $this->db->query("SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.status='1' and projects.project_time>='$date'") or die(mysqli_error($this->db));
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


     public function GetUserProject($user_id){

      //  echo "SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.user_id='$user_id' and projects.status = '1' and project_info.status = '1'";

             $selectuser = $this->db->query("SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.user_id='$user_id' and projects.status = '1' and project_info.status = '1'") or die(mysqli_error($this->db));
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

    public function GetMyIdeas($user_id){
       //echo "SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.user_id='$user_id' and projects.status!='0'";

             $selectuser = $this->db->query("SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.user_id='$user_id' and projects.status!='0'") or die(mysqli_error($this->db));
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

     public function GetSoldIdeas($user_id){


        $selectuser = $this->db->query("SELECT sold_ideas.*,projects.*,users.* FROM sold_ideas INNER JOIN projects ON sold_ideas.project_id=projects.project_no INNER JOIN users ON projects.user_id=users.user_id where sold_ideas.seller_id='$user_id' and sold_ideas.status='1' GROUP BY sold_ideas.seller_id,sold_ideas.project_id") or die(mysqli_error($this->db));
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

     public function GetMyProjects($user_id){


        //echo "SELECT sold_ideas.*,projects.*,users.* FROM sold_ideas INNER JOIN projects ON sold_ideas.project_id=projects.project_no INNER JOIN users ON projects.user_id=users.user_id where sold_ideas.buyer_id='$user_id' GROUP BY sold_ideas.buyer_id,sold_ideas.project_id";die;
        $selectuser = $this->db->query("SELECT sold_ideas.*,projects.*,users.* FROM sold_ideas INNER JOIN projects ON sold_ideas.project_id=projects.project_no INNER JOIN users ON sold_ideas.seller_id=users.user_id where sold_ideas.buyer_id='$user_id' and sold_ideas.status='1'") or die(mysqli_error($this->db));
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





public  function DeleteProjectbyProid($pro_id) {

           $project = $this->db->query("UPDATE projects INNER JOIN project_info ON project_info.status=projects.status SET projects.status='0',project_info.status='0' where projects.project_id='$pro_id'") or die(mysqli_error($conn));
            if($project){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }

    public  function RemoveProjectbyProid($pro_id) {

           $project = $this->db->query("UPDATE sold_ideas SET status='0' WHERE project_id='$pro_id'") or die(mysqli_error($conn));
            if($project){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }

    public  function OfflineProjectbyProid($pro_id) {

       $up = "UPDATE projects INNER JOIN project_info ON project_info.status=projects.status SET projects.status='2',project_info.status='2' where projects.project_id='$pro_id'";
       //die;
           $project = $this->db->query($up) or die(mysqli_error($conn));
            if($project){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }

    public  function UpdateProject($project_id) {
         $date=date('Y-m-d');
        $expiry_date=date('Y-m-d',strtotime($date. ', + 30 days'));
       $up = "UPDATE projects INNER JOIN project_info ON project_info.status=projects.status SET projects.status='1',project_info.status='1',project_info.expiry_date='$expiry_date',projects.project_time='$expiry_date' where projects.project_id='$project_id'";
       //die;
           $project = $this->db->query($up) or die(mysqli_error($conn));
            if($project){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }

    public  function RenewProject($project_id) {
       $date=date('Y-m-d');
        $expiry_date=date('Y-m-d',strtotime($date. ', + 30 days'));
            $expiry_date1 = strtotime($expiry_date);
   $up = "UPDATE projects INNER JOIN project_info ON project_info.project_id=projects.project_id INNER JOIN sold_ideas ON projects.project_no=sold_ideas.project_id SET projects.status='1',project_info.status='1',project_info.expiry_date='$expiry_date',projects.project_time='$expiry_date',sold_ideas.status='0' where projects.project_id='$project_id'";

           $project = $this->db->query($up) or die(mysqli_error($conn));
            if($project){
                //echo "UPDATE sold_ideas SET status='0' WHERE project_id='$project_id'";die;
                // $project1 = $this->db->query("UPDATE sold_ideas SET status='0' WHERE project_id='$project_id'") or die(mysqli_error($conn));
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }

     public  function RenewProject1($project_id) {
       $date=date('Y-m-d');
        $expiry_date=date('Y-m-d',strtotime($date. ', + 30 days'));
            $expiry_date1 = strtotime($expiry_date);
   $up = "UPDATE projects INNER JOIN project_info ON project_info.project_id=projects.project_id  SET projects.status='1',project_info.status='1',project_info.expiry_date='$expiry_date',projects.project_time='$expiry_date' where projects.project_id='$project_id'";

           $project = $this->db->query($up) or die(mysqli_error($conn));
            if($project){
                //echo "UPDATE sold_ideas SET status='0' WHERE project_id='$project_id'";die;
                // $project1 = $this->db->query("UPDATE sold_ideas SET status='0' WHERE project_id='$project_id'") or die(mysqli_error($conn));
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }


public  function OnlineProjectbyProid($pro_id) {
        $on ="UPDATE projects INNER JOIN project_info ON project_info.status=projects.status SET projects.status='1',project_info.status='1' where projects.project_id='$pro_id'";
        //die;
           $project = $this->db->query($on) or die(mysqli_error($conn));
            if($project){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }

            //return $register;
    }


 public function AddFollowing($project_id,$sid,$rid){

       //echo "INSERT into my_following set project_id ='$project_id',status = '1',sender_id='$sid',receiver_id='$rid'";die;
        $selectuser = $this->db->query("INSERT into my_following set project_id ='$project_id',status = '1',sender_id='$sid',receiver_id='$rid'") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);

        return 1;



    }

    public function UpdateFollowing($project_id,$status){


       $project = $this->db->query("UPDATE my_following SET status = '$status' where project_id = $project_id") or die(mysqli_error($this->db));
            if($project){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }



    }

    // Remove Following
          public  function DeleteFollowing($project_id,$sender_id,$receiver_id) {


        $result = $this->db->query("DELETE FROM my_following where project_id='$project_id' and sender_id='$sender_id' and receiver_id='$receiver_id' and status = '1'") or die(mysqli_error($this->db));
        //$row = mysql_fetch_array($result);
        return 1;
        //echo $row['name'];
    }


    public function FollowbyId($pro_id){

        $getproject = $this->db->query("SELECT * FROM my_following where project_id='$pro_id'");
        $fetch=mysqli_fetch_array($getproject);

        return $fetch;
    }


 public function FriendbyId($sid){
       //echo "SELECT * FROM add_friend where sender_user_id='$sid'";die;
        $getfriend = $this->db->query("SELECT * FROM add_friend where sender_user_id='$sid'");
        $fetch=mysqli_fetch_array($getfriend);

        return $fetch;
    }

     public function GetFollowers($user_id){


             $selectuser = $this->db->query("SELECT projects.*,project_info.*,users.*,my_following.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id INNER JOIN my_following ON projects.project_id = my_following.project_id where my_following.sender_id='$user_id'and my_following.status = '1'") or die(mysqli_error($this->db));
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


    public function AddFriends($rid,$sid){

     //echo  "INSERT into add_friend set sender_user_id = '$sid',status = '1',receiver_user_id='$rid'";die;
        //echo "INSERT into add_friend set sender_user_id = '$sid',status = '0',receiver_user_id='$rid'";
        $selectuser = $this->db->query("INSERT into add_friend set sender_user_id = '$sid',status = '0',receiver_user_id='$rid'") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);

        return 1;



    }


     // Remove Friend
          public  function DeleteFriend($Unfriend,$sender_id) {
            // echo "DELETE FROM add_friend where sender_user_id=$sender_id and receiver_user_id=$receiver_id and status = '1'";die;
        $result = $this->db->query("DELETE FROM add_friend where sender_user_id=$sender_id and receiver_user_id=$Unfriend and status='1'") or die(mysqli_error($this->db));
        if(mysqli_num_rows($result)>0){
            return 1;
        }else{
                 $result1 = $this->db->query("DELETE FROM add_friend where receiver_user_id=$sender_id and sender_user_id=$Unfriend and status='1'") or die(mysqli_error($this->db));
                 return 1;
        }
        //$row = mysql_fetch_array($result);

        //echo $row['name'];
    }

    public function UpdateFriends($uid,$status){


       $project = $this->db->query("UPDATE add_friend SET status = '$status' where sender_user_id = $uid") or die(mysqli_error($conn));
            if($project){
                $data['result']=1;
                return $data;
            }else{
                return 0;
            }



    }

    public function TotalProjectByUserid($userid){


        $selectuser = $this->db->query("SELECT count(user_id) FROM projects where user_id='$userid'") or die(mysqli_error($this->db));
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

    public function ProjectType($projectid){

        //echo "SELECT project_type FROM projects where project_id='$projectid'";die;
        $selectuser = $this->db->query("SELECT project_type FROM projects where project_no='$projectid'") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
             $num=mysqli_num_rows($selectuser);
             if($num>0){

           return 1;
             }else{
                return 0;
             }


    }


     // Fetch friend list

    public  function FetchFriend($user_id) {
    $created=date('Y-m-d hh:ii:ss');
    //echo "SELECT users.fname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' and add_friend.status!='0' group by add_friend.sender_user_id";die;
      $result = $this->db->query("SELECT users.fname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' and add_friend.status!='0' group by add_friend.sender_user_id") or die(mysqli_error($this->db));
      $result1 = mysqli_num_rows($result);
      if($result1>0){
       while($row = mysqli_fetch_array($result)){
        $data[]=$row;
       }
       return $data;
      }else{
        return 0;
      }

        //echo $row['name'];
    }



public  function FriendsmailList($user_id) {
    $created=date('Y-m-d hh:ii:ss');
    
      $result = $this->db->query("SELECT *  FROM users WHERE user_id = '$user_id'") or die(mysqli_error($this->db));
      $result1 = mysqli_num_rows($result);
      if($result1>0){
       while($row = mysqli_fetch_array($result)){
        $data[]=$row;
       }
       return $data;
      }else{
        return 0;
      }

        //echo $row['name'];
    }



     public  function FetchFriendReceiver($user_id) {
    $created=date('Y-m-d hh:ii:ss');
    //echo "SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.receiver_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' group by add_friend.receiver_user_id";die;
      $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.receiver_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' group by add_friend.receiver_user_id") or die(mysqli_error($this->db));
      $result1 = mysqli_num_rows($result);
      if($result1>0){
       while($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
       }
       return $data;
      }else{
        return 0;
      }

        //echo $row['name'];
    }
     public  function FetchUserFriend($user_id) {
    $created=date('Y-m-d hh:ii:ss');

      $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where  add_friend.status='1' AND add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' AND add_friend.status='1'group by add_friend.sender_user_id") or die(mysqli_error($this->db));
      $result1 = mysqli_num_rows($result);
      if($result1>0){
       while($row = mysqli_fetch_array($result)){
        $data[]=$row;
       }
       return $data;
      }else{
        return 0;
      }

        //echo $row['name'];
    }



public  function FetchUserFriend1($user_id) {
  $created=date('Y-m-d hh:ii:ss');
  //echo "SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.status='1' and add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' and add_friend.status='1' GROUP BY add_friend.sender_user_id,add_friend.receiver_user_id";
  $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.status='1' and add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' and add_friend.status='1' GROUP BY add_friend.sender_user_id,add_friend.receiver_user_id") or die(mysqli_error($this->db));
  $result1 = mysqli_num_rows($result);
  if($result1>0){
   while($row = mysqli_fetch_array($result)){
    $data[]=$row;
  }
  return $data;
}else{
  return 0;
}

        //echo $row['name'];
}
}
?>

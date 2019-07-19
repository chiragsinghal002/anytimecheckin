<?php 
require_once 'db.php';

class Friend extends DB
{ 



    // Add friend request
  public  function AddFriend($sender_id,$user_id) {
    $created=date('Y-m-d hh:ii:ss');  
    $result = $this->db->query("INSERT INTO friends(friend_id,sender_user_id,receiver_user_id,friend_status,created,modified) values('','$sender_id','$user_id','0','$created','$created')") or die(mysqli_error($this->db));  
        //$row = mysql_fetch_array($result);
    return 1;
        //echo $row['name'];  
  }  



    // Fetch friend list
  
  public  function FetchFriend($user_id) {
    $created=date('Y-m-d hh:ii:ss');
    
    $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id'group by add_friend.sender_user_id") or die(mysqli_error($this->db)); 
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

public  function FetchUserFriend($user_id) {
  $created=date('Y-m-d hh:ii:ss');
 // echo "SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.status='1' and add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' and add_friend.status='1'";die;
  $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.status='1' and add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' and add_friend.status='1'  GROUP BY sender_user_id,receiver_user_id") or die(mysqli_error($this->db)); 
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
    //echo "SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' group by add_friend.sender_user_id";
  $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.receiver_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' group by add_friend.receiver_user_id") or die(mysqli_error($this->db)); 
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

    // Close friend list

      // Friend Request Notification
public  function FetchFriendnotify($user_id) {
  $created=date('Y-m-d hh:ii:ss');  
    //echo "SELECT users.fname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' where add_friend.status='0' group by add_friend.sender_user_id";die;
  $result = $this->db->query("SELECT users.fname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' where add_friend.status='0' group by add_friend.sender_user_id") or die(mysqli_error($this->db)); 
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
// Check Friend 
 // Fetch friend list

public  function CheckFriend($user_id,$u_id) {
  $created=date('Y-m-d hh:ii:ss');  
  $result = $this->db->query("SELECT users.username,users.picture,users_info.*,friends.* FROM friends INNER JOIN users_info ON friends.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where friend.sender_user_id='$user_id' group by friends.receiver_user_id") or die(mysqli_error($this->db)); 
        //$result = $this->db->query("INSERT INTO friends(friend_id,sender_user_id,receiver_user_id,friend_status,created,modified) values('','$sender_id','$user_id','0','$created','$created')") or die(mysqli_error($this->db));  
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

    // Close friend list
    // Close Check Friend



    // close fetch love friend list


        // Start Match Love Friend List Function

public  function MatchloveFriend($user_id) {
  $created=date('Y-m-d hh:ii:ss');  
  $result = $this->db->query("SELECT lv_receiver_id From love where lv_sender_id='$user_id' and lv_status='1' GROUP BY lv_receiver_id") or die(mysqli_error($this->db)); 
  $result1 = mysqli_num_rows($result);
  if($result1>0){
   while($row = mysqli_fetch_array($result)){
    $data[]=$row;
  }
  return $data;
}

        //echo $row['name'];  
}  

        // Close Match Love Friend Lisr Function


                                // fetch Profile visits



public  function FetchProfileVisits($user_id) {
  $created=date('Y-m-d hh:ii:ss');  
  
  $result = $this->db->query("SELECT users.username,users.picture,users_info.*,profile_visits.* FROM profile_visits INNER JOIN users_info ON profile_visits.sender_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where profile_visits.receiver_id='$user_id' group by profile_visits.sender_id") or die(mysqli_error($this->db)); 
  
  $result1 = mysqli_num_rows($result);
  if($result1>0){
   while($row = mysqli_fetch_array($result)){
    $data[]=$row;
  }
  return $data;
}

        //echo $row['name'];  
}  


                                // Close fetch Profile visits



public  function session() {  
  if (isset($_SESSION['login'])) {  
    return $_SESSION['login'];  
  }  
}  

public  function logout() {  
  $_SESSION['login'] = false;  
  session_destroy();  
}  

    // Get user details using user_id

public function UserInfo($user_id){
        // echo "SELECT users.username,users.picture,users_info.* FROM users_info INNER JOIN users ON users.user_id=users_info.user_id where users.user_id='$user_id'";die;
  $selectuser = $this->db->query("SELECT users.*,users_info.* FROM users_info INNER JOIN users ON users.user_id=users_info.user_id where users.user_id='$user_id'");
  $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
  return $fetch;
}

     // Get user details using user_id

public function GetAllUsers(){
        // echo "SELECT users.username,users.picture,users_info.* FROM users_info INNER JOIN users ON users.user_id=users_info.user_id where users.user_id='$user_id'";die;
  $selectuser = $this->db->query("SELECT * FROM users WHERE status='1'");
  while($fetch=mysqli_fetch_array($selectuser)){
    $data[]=$fetch;
  }
  return $data;
}

     // Get user details by user_id in user_info

public function UserInfobyId($id){
  $selectuser = $this->db->query("SELECT * FROM users_info where id='$id'");
  $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
  return $fetch;
}
    // Get user details using user_id

public function UserImage($user_id){
  $selectuser = $this->db->query("SELECT * FROM users where user_id='$user_id'");
  $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
  return $fetch;
}

    // User search result on user dashboard by default
public function UserSearchResult($user_id,$data){

  $selectuser = $this->db->query("SELECT users.*,users_info.* FROM users_info INNER JOIN users ON users_info.user_id=users.user_id where  users_info.country='".$data['country']."' and users_info.origen='".$data['origen']."' and users_info.vegetarian='".$data['vegetarian']."' and users_info.smoking='".$data['smoking']."' and users_info.supported_team='".$data['supported_team']."' and users_info.only_chat='".$data['only_chat']."' and users_info.only_speak='".$data['only_speak']."' and  users_info.sporadic_relationship='".$data['sporadic_relationship']."' and users_info.serious_relationship='".$data['serious_relationship']."' and  users_info.status='1' and NOT users_info.user_id='$user_id'") or die(mysqli_error($this->db));
             //$selectuser = $this->db->query("SELECT users.username,users_info.* FROM users_info INNER JOIN users ON users_info.user_id=users.user_id where vegetarian='".$data['vegetarian']."' and users_info.status='0'") or die(mysqli_error($this->db));
  $fetch_num=mysqli_num_rows($selectuser);
  if($fetch_num>0){
    while($fetch=mysqli_fetch_array($selectuser)){
      $fetch1[]=$fetch;
    }
    

    return $fetch1;
  }else{
    return 0;
  }
}


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
$selectuser = $this->db->query("UPDATE $tablename SET $implodeArray  where  $implodeArray1") or die(mysqli_error($this->db));
if($selectuser){
  return '1';
}else{
  return '0';
}
}



public function insert($table, $data) {
  $key = array_keys($data);
  $val = array_values($data);
  $sql = $this->db-query("INSERT INTO $table (" . implode(', ', $key) . ") "
   . "VALUES ('" . implode("', '", $val) . "')") or die(mysqli_error($this->db));
  
  if($sql){
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

public function mail($email){
  $to = 'imsas80@gmail.com';
  $subject = "IBAD Enquiry";

  $message = "
  <html>
  <head>
  <title>Refinance Enquiry</title>
  </head>
  <body>
  <h3>Here are the details that we received from myRefinanceRATES.com</h3>
  <ul>
  <li><b>Mortgage Lead Type:</b> $ref_type</li>
  <li><b>Downpayment:</b> $downpayment</li>
  <li><b>Buy Timeframe:</b> $timeframe</li>
  <li><b>Agent Found:</b> $agent</li>

  </ul>
  </body>
  </html>
  ";

                        // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
  $headers .= 'From: <webmail@netmaxims.in>' . "\r\n";
                        //$headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";

  $mail = mail($to,$subject,$message,$headers);
}


	//Update user profile pic

public  function UpdateProfilePic($user_id) { 

	
  $img_name = $_FILES['user_image']['name'];
  $img_tmp = $_FILES['user_image']['tmp_name'];
  $rand = rand(00000,99999);
  $filename = $rand.$img_name;
  move_uploaded_file($img_tmp, 'user_images/'.$filename);
  
  
  echo $up = "UPDATE users_info SET user_image = '$img_name' where user_id='$user_id'";die;
  $register = $this->db->query($up) or die(mysqli_error($conn));
  if($register){
    $data['result']=1;
    return $data;
  }else{
    return 0;
  }

  
}



	 // Add Bid
public  function AddBids($data) {
		/* $img_name = $_FILES['bid_image']['name'];
       $img_tmp = $_FILES['bid_image']['tmp_name'];
       $rand = rand(00000,99999);
       $filename = $rand.$img_name;
       move_uploaded_file($img_tmp,'image/'.$filename); */
       
       $result = $this->db->query("INSERT INTO bid SET bid_title = '$data[bid_title]', bid_uid = '$data[bid_uid]',bid_place_bid='$data[bid_place_bid]',bid_capital = '$data[bid_capital]',bid_forecast = '$data[bid_forecast]',bid_time_left ='$data[bid_time_left]',bid_visit ='$data[bid_visit]',bid_image = '$filename',bid_auto_id ='$data[bid_auto_id]'") or die(mysqli_error($this->db));  
        //$row = mysql_fetch_array($result);
       $id = mysqli_insert_id($this->db);
       
       return $id;
        //echo $row['name'];  
     }  

     
     public function getBidbyId($id){
      $getbid = $this->db->query("SELECT * FROM bid where bid_id='$id'");
      $fetch = mysqli_fetch_array($getbid);
      
      return $fetch;
    }


    public function getUserbysrId($sid,$rid){
      $selectuser = $this->db->query("SELECT * FROM add_friend where sender_user_id='$sid' and receiver_user_id = '$rid'");
      $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
      return $fetch;
    }

    

    public  function UpdateSenderReceiver($sid,$rid,$status) {  


      $created=date('Y-m-d');  
      $up =  "UPDATE add_friend  SET status = '$status' where sender_user_id='$sid' and receiver_user_id = '$rid'";         
      $register = $this->db->query($up) or die(mysqli_error($conn));
      if($register){
        $data['result']=1;
        return $data;
      }else{
        return 0;
      }

            //return $register;   
    }
    public  function FriendRemoved($sid,$rid,$status,$receiver_id) {  


      $created=date('Y-m-d');  
      $up =  "DELETE FROM add_friend where sender_user_id='$sid' and receiver_user_id = '$rid' OR sender_user_id='$rid' and receiver_user_id = '$sid'";     
      $register = $this->db->query($up) or die(mysqli_error($conn));
      if($register){
                        //echo "chirag11";
        //echo $up1 =  "DELETE FROM add_friend where sender_user_id='$sid' and receiver_user_id = '$rid' OR sender_user_id='$sid' and receiver_user_id = '$rid'";
       // $register1 = $this->db->query($up1) or die(mysqli_error($conn));
        $data['result']=1;
        return $data;

      }else{

        return 0;
      }

            //return $register;   
    }




  } 
  ?>
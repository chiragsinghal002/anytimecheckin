<?php 
require_once 'db.php';

class User extends DB
{ 

// login vendor
public  function login($data) {

        //echo "SELECT * FROM  ci_vendors WHERE v_email = '".$data['vendorEmail']."' and v_pass = '".$data['vendorpassword']."' and status = '1'";die;

        $query = $this->db->query("SELECT * FROM  ci_vendors WHERE v_email = '".$data['vendorEmail']."' and v_pass = '".$data['vendorpassword']."' and status = '1'") or die(mysqli_query($this->db));
        $result = mysqli_num_rows($query);
        if ($result == 1) {  
          $data = mysqli_fetch_array($query); 
          $result1['result']='1';
          $result1['v_id'] = $data['v_id']; 
          $result1['v_fname']=$data['v_fname'];
          $result1['v_lname']=$data['v_lname'];
          $result1['v_email']=$data['v_email'];
          //$result1['email']=$data['email'];
        //$result1['status']=$data['status'];
           //return $result1;
          //return 1;

        } else { 
        return 0; 
         $result1['result']='0';
       }  
       return $result1['result'] = '1';
       //$result1['result']='0';
     } 
  // login vendor end


// register vendor
    public  function registerVendor($data) {  

        // echo "<pre>";
        // print_r($data);
        // die;
        //$pass = md5($data['password']); 
        $created=date('Y-m-d'); 
        $otp = mt_rand(100000, 999999);

        // date_default_timezone_set('Asia/Kolkata');

        // $currentDate = date("H:i:s");
        // $currentDate_timestamp = strtotime($currentDate);
        // $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);
        
        $admin = $this->db->query("Select * from admin_setting where setting_id='1'");  
        $resultadmin = mysqli_fetch_array($admin); 
        
        $adminemail = $resultadmin['admin_email'];
      

        $checkuser = $this->db->query("Select v_id from ci_vendors where v_email='".$data['email']."'");  
        $result = mysqli_num_rows($checkuser);  
        if ($result == 0) {  

            $register = $this->db->query("INSERT INTO ci_vendors SET v_fname='".$data['userName']."',v_lname='".$data['lastName']."',v_mob = '".$data['mobile']."',v_email='".$data['email']."',v_pass='".$data['pass1']."',v_otp='".$otp."',v_address='".$data['address']."',v_gst_number='".$data['gst_number']."',status='0',created= '$created',modified='$created',v_company='".$data['company_name']."',v_gst='".$data['state_name']."',v_city='".$data['city']."',v_zip='".$data['zip']."'") or die(mysqli_error($this->db));
           // $uid = mysqli_insert_id($this->db);
            if($register){ 
              $to = $data['email'];
     $subject = "Anytime Check In Registration";

     $message = "
<table style='width: 100%; padding-bottom: 15px;'>
<tbody><tr style='
    border-bottom: 2px solid #222;
'>
  <td style='text-align: center; width: 100%;'><img src='https://epimoniapp.com/anytimecheckin/image/top-logo.png'></td>
</tr>
</tbody></table>

<table style='width:100%;margin-top: 25px;'>

<!-- <tr>
  <td style='text-align: center; font-size: 26px; color: #222; font-weight: bold;'>Welcome! You are officially a member of Anytimecheckin</td>
</tr> -->
</table>

<table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
<tr>
  <td color: #222;>Dear ".$data['userName']." ".$data['lastName'].",</td>
</tr>

<tr>
  <td color: #222;>Your account has been created and you can log in using your email address and password.</td>
</tr>

<tr>
  <td><b>Email address:</b> ".$data['email']."</td>
</tr>

<tr>
  <td><b>Your password is:</b> ".$data['pass1']."</td>
</tr>

<tr>
  <td>After logging in, you will be able to access our services: reviewing past orders, change password and editing your account information.</td>
</tr>

<br />


<tr>
<td>Thanks,</td>
</tr>

<tr>
<td>Anytime Check In</td>
</tr>

<tr>
<td>info@anytimecheckin.com</td>
</tr>



</table>

<table style=' width: 100%; 
    padding-top: 20px;'>
  <tr><td></td></tr>
</table>




<style>
td {
    font-size: 18px; color:#222;
}
</style>"
    ;

    //echo $message;

                        // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
          $headers .= 'From: info@anytimecheckin.com' . "\r\n";
          // $headers .= 'From: <webmail@netmaxims.in>' . "\r\n";
          $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
          $headers .= 'Cc:'.$adminemail . "\r\n";

               // echo'<pre>';
               // print_r($message);die;

          $mail = mail($to,$subject,$message,$headers); 

          return 1; 

             // return $otp;
         }else{
            return $otp;
        }

            //return $register;  
    }else{
        return 3;
    }  
}

    //end register vendor

    public  function registerbyEmail($data) {  

        // echo "<pre>";
        // print_r($data);
        // die;
        //$pass = md5($data['password']); 
        $created=date('Y-m-d'); 
        $otp = mt_rand(100000, 999999);

        date_default_timezone_set('Asia/Kolkata');

        $currentDate = date("H:i:s");
        $currentDate_timestamp = strtotime($currentDate);
        $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);

        $checkuser = $this->db->query("Select user_id from user_registration where email='".$data['userEmail']."'");  
        $result = mysqli_num_rows($checkuser);  
        if ($result == 0) {  

            $register = $this->db->query("INSERT INTO user_registration SET auth_type='Normal',fname='".$data['userName']."',lname = '".$data['lastName']."',email='".$data['userEmail']."',password='".$data['password']."',otp='".$otp."',time_expire='".$endDate_months."',is_active='0',created_at= '$created',status='0'") or die(mysqli_error($this->db));
           // $uid = mysqli_insert_id($this->db);
            if($register){

    //            $to = $data['userEmail'];
    //            $subject = "Rest & Go OTP";

    //            $message = "
    //            <html>
    //            <head>
    //            <title>Rest & Go OTP</title>
    //            </head>
    //            <body>
    //            <h3>Use this OTP</h3>
    //            <p>$otp</p>
    //            </body>
    //            </html>
    //            ";

    // //echo $message;

    //                     // Always set content-type when sending HTML email
    //            $headers = "MIME-Version: 1.0" . "\r\n";
    //            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //                     // More headers
    //            $headers .= 'From: <webmail@netmaxims.in>' . "\r\n";
    //            $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";

    //            $mail = mail($to,$subject,$message,$headers);

             return $otp;





         }else{
            return $otp;
        }

            //return $register;  
    }else{
        return 3;
    }  
}
      // For User Registration1//
public  function registerbyMobile($data) {  

        // echo "<pre>";
        // print_r($data);
        // die;
        //$pass = md5($data['password']); 
    $created=date('Y-m-d'); 
    $otp = mt_rand(100000, 999999);

    date_default_timezone_set('Asia/Kolkata');

    $currentDate = date("H:i:s");
    $currentDate_timestamp = strtotime($currentDate);
    $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);

    $checkuser = $this->db->query("Select user_id from user_registration where mob_no='".$data['mobno']."'");  
    $result = mysqli_num_rows($checkuser);  
    if ($result == 0) {  

        $register = $this->db->query("INSERT INTO user_registration SET auth_type='Normal',fname='".$data['userName']."',lname = '".$data['lastName']."',mob_no='".$data['mobno']."',password='".$data['password']."',otp='".$otp."',time_expire='".$endDate_months."',is_active='0',created_at= '$created',status='0'") or die(mysqli_error($this->db));
           // $uid = mysqli_insert_id($this->db);
        if($register){

    //            $to = $data['userEmail'];
    //            $subject = "Rest & Go OTP";

    //            $message = "
    //            <html>
    //            <head>
    //            <title>Rest & Go OTP</title>
    //            </head>
    //            <body>
    //            <h3>Use this OTP</h3>
    //            <p>$otp</p>
    //            </body>
    //            </html>
    //            ";

    // //echo $message;

    //                     // Always set content-type when sending HTML email
    //            $headers = "MIME-Version: 1.0" . "\r\n";
    //            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //                     // More headers
    //            $headers .= 'From: <webmail@netmaxims.in>' . "\r\n";
    //            $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";

    //            $mail = mail($to,$subject,$message,$headers);

         return $otp;





     }else{
        return $otp;
    }

            //return $register;  
}else{
    return 3;
}  
}


public  function checkUserbyEmail($email) {  

    $result=$this->db->query("SELECT * FROM user_registration where email='$email'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);  
    return $row['email'];  
} 

public  function checkUserbyEmailsss($email) {  

    $result=$this->db->query("SELECT * FROM user_registration where email='$email'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);  
    return $row;  
}  


public  function checkOTPByEmail($otp,$email) { 
    // /echo "SELECT * FROM user_registration where email='$email' and otp='$otp'";die;
    $result=$this->db->query("SELECT * FROM user_registration where email='$email' and otp='$otp'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);
    if($num=='1'){
       $register = $this->db->query("UPDATE user_registration SET is_active='1' where email='$email'") or die(mysqli_error($this->db));
       if($register){
        return 1;
    }
}else{
   return 0;
}

}
public  function checkOTPByMob($otp,$mob) { 

    $result=$this->db->query("SELECT * FROM user_registration where mob_no='$mob' and otp='$otp'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);  
    if($num=='1'){
       $register = $this->db->query("UPDATE user_registration SET is_active='1' where mob_no='$mob'") or die(mysqli_error($this->db));
       if($register){
        return 1;
    }
}else{
   return 0;
}

}

public  function ResendOTP($otp) {  

    $result=$this->db->query("UPDATE user_registration INNER JOIN users ON users.user_id=users_info.user_id SET users.status='2',users_info.status='2' where users.user_id='$user_id'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);  
    return $row;  
}   



    //Update user account for deactivation users_info and users
public  function DeactivateAccount($user_id) {  


    $created=date('Y-m-d');

    $register = $this->db->query("UPDATE users_info INNER JOIN users ON users.user_id=users_info.user_id SET users.status='2',users_info.status='2' where users.user_id='$user_id'") or die(mysqli_error($conn));
    if($register){
        $data['result']=1;
        return $data;
    }else{
        return 0;
    }

            //return $register;   
}



public  function loginbymob($mob,$password) {  
    $check = $this->db->query("SELECT * FROM user_registration where mob_no='$mob' and password='$password' and is_active='1'") or die(mysqli_query($this->db));
    $result = mysqli_num_rows($check);  
    if ($result == 1) {  
        $data = mysqli_fetch_array($check); 
        $result1['result']='1';
        $result1['user_id'] = $data['user_id']; 
        //$result1['status']=$data['status'];
       
    } else {  
         $result1['result']='0';
    }  
    return $result1;
}  



    // check password and update new password
public  function checkpassword($current_password,$user_id,$new_password) {  
    $pass = md5($current_password);
    $pass1 = md5($new_password);  
    $date=date('Y-m-d');
        //$date=date('2018-02-29 00:00:00');
    $date1 = strtotime($date);

    $check = $this->db->query("SELECT * FROM users where password='$pass' and user_id='$user_id'") or die(mysqli_query($this->db));
    $result = mysqli_num_rows($check);  
    if ($result == 1) {  
      $update = $this->db->query("UPDATE users SET password='$pass1' where user_id='$user_id'") or die(mysqli_query($this->db));
      return 1;
  } else {  
    return 0;  
}  
}  



public  function fullname($id) {  

    $result=$this->db->query("SELECT * FROM users where user_id='$id'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);  
    return $row['fname'].' '.$row['lname'];  
}  



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
    $result = $this->db->query("SELECT users.*,users_info.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' group by add_friend.sender_user_id") or die(mysqli_error($this->db)); 
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
// Check Friend 
 // Fetch friend list

public  function CheckFriend($user_id,$u_id) {
    $created=date('Y-m-d hh:ii:ss'); 

    $result = $this->db->query("SELECT * FROM add_friend  where add_friend.sender_user_id='$user_id' and add_friend.receiver_user_id='$u_id' OR  add_friend.receiver_user_id='$user_id' and add_friend.sender_user_id='$u_id' GROUP BY  add_friend.receiver_user_id,add_friend.sender_user_id") or die(mysqli_error($this->db)); 
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

    $selectuser = $this->db->query("SELECT users.*,users_info.* FROM users_info INNER JOIN users ON users.user_id=users_info.user_id where users.user_id='$user_id'");
    $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
    return $fetch;
}

     // Get user details using user_id

public function GetAllUsers(){

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
  public function UserSearchResult(){

    // $time=$data[0]['time'];
    // $time1=$data[0]['time1'];
    // $date11=$data[0]['date'];
    // $date22=$data[0]['date1'];
    // $date = date("Y-m-d", strtotime($date11));
    // $date1 = date("Y-m-d", strtotime($date22));
    // $longitude=$data[0]['longitude'];
    // $latitude=$data[0]['latitude'];
    // $longitude=28.3743;
    // $latitude=77.3293;
    // if(!empty($time && $time1)){
    if(1==1){
   $selectuser = $this->db->query("  SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='04:00' and ci_hotels.check_out>='06:00' AND ci_room_type.status='1' AND  ci_room_type.adult_person_capacity>=3 AND ci_room_type.child_capacity>=2 AND ci_hotels.any='3' OR ci_hotels.any='1'  ORDER BY ((ci_hotels.hotel_latitude- 28.367976)*(ci_hotels.hotel_latitude- 28.367976)) + ((ci_hotels.hotel_longitude - 77.329549)*(ci_hotels.hotel_longitude- 77.329549)) ASC") or die(mysqli_error($this->db));
    //$selectuser = $this->db->query("SELECT users.username,users_info.* FROM users_info INNER JOIN users ON users_info.user_id=users.user_id where vegetarian='".$data['vegetarian']."' and users_info.status='0'") or die(mysqli_error($this->db));
    }else{
    $selectuser = $this->db->query("  SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='04:00' and ci_hotels.check_out>='06:00' AND ci_room_type.status='1' AND  ci_room_type.adult_person_capacity>=3 AND ci_room_type.child_capacity>=2 AND ci_hotels.any='1'  ORDER BY ((ci_hotels.hotel_latitude- 28.367976)*(ci_hotels.hotel_latitude- 28.367976)) + ((ci_hotels.hotel_longitude - 77.329549)*(ci_hotels.hotel_longitude- 77.329549)) ASC") or die(mysqli_error($this->db));
    }


    // $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id WHERE ci_hotels.check_in<='$date' and ci_hotels.check_out>='$date1' AND ci_hotels.hotel_status='1' ORDER BY ((ci_hotels.hotel_latitude-$latitude)*(ci_hotels.hotel_latitude-$latitude)) + ((ci_hotels.hotel_longitude - $longitude)*(ci_hotels.hotel_longitude- $longitude)) ASC") or die(mysqli_error($this->db));
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

     public function Hoteldetailbyid($id){


   $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.hotel_id = $id ORDER BY ((ci_hotels.hotel_latitude- 28.367976)*(ci_hotels.hotel_latitude- 28.367976)) + ((ci_hotels.hotel_longitude - 77.329549)*(ci_hotels.hotel_longitude- 77.329549)) ASC") or die(mysqli_error($this->db));  

   
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

  public function GetRoomtypeByHotelId($data){

   $selectuser = $this->db->query("SELECT * FROM ci_room_type WHERE hotel_id = '$data'") or die(mysqli_error($this->db));
    

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

        $value = "'$value'";
        $updates[] = "$key = $value";
    }
}
if (count($condition) > 0) {
    foreach ($condition as $key => $value) {

        $value = "'$value'";
        $conditions[] = "$key = $value";
    }
}
$implodeArray = implode(', ', $updates);
$implodeArray1 = implode(', ', $conditions);

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


      // Friend Request Notification
public  function FetchFriendnotify($user_id) {
    $created=date('Y-m-d hh:ii:ss');  
    
    $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' and add_friend.status='0' group by add_friend.sender_user_id") or die(mysqli_error($this->db)); 
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



	 // Add Bid
public  function AddBids($data) {
	

   $result = $this->db->query("INSERT INTO bid SET bid_title = '$data[bid_title]', bid_uid = '$data[bid_uid]',bid_place_bid='$data[bid_place_bid]',bid_capital = '$data[bid_capital]',bid_forecast = '$data[bid_forecast]',bid_time_left ='$data[bid_time_left]',bid_visit ='$data[bid_visit]',bid_image = '$filename',bid_auto_id ='$data[bid_auto_id]'") or die(mysqli_error($this->db));  

   $id = mysqli_insert_id($this->db);

   return $id;
        //echo $row['name'];  
}  


public function getBidbyId($id){
    $getbid = $this->db->query("SELECT * FROM bid where bid_id='$id'");
    $fetch = mysqli_fetch_array($getbid);

    return $fetch;
}

public function GetMyIdeas($user_id){

   $selectuser = $this->db->query("SELECT projects.*,project_info.*,users.* FROM project_info INNER JOIN projects ON project_info.project_id=projects.project_id INNER JOIN users ON projects.user_id=users.user_id where projects.user_id='$user_id' and projects.status != '0' and project_info.status != '0'") or die(mysqli_error($this->db));
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

public  function ViewFetchFriend($user_id) {
    $created=date('Y-m-d hh:ii:ss');  

    $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' and add_friend.status='1' GROUP BY add_friend.sender_user_id") or die(mysqli_error($this->db)); 
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

public function GetUsersLikes($user_id){


 $selectuser = $this->db->query("SELECT * FROM user_like where user_id='$user_id' and status='1'");
 $fetch=mysqli_fetch_array($selectuser);
 $num=mysqli_num_rows($selectuser);
 return $num;


}

public function InsertUserLikes($profile_user,$user_id,$des_like){

    $selectuser = $this->db->query("INSERT into user_like (user_id,user_liker_id,like,status) values('','".$profile_user."','".$user_id."','".$des_like."',1')") or die(mysqli_error($this->db));
        //$fetch=mysqli_fetch_array($selectuser);
    $result=$this->GetUsersLikes($profile_user);

    return $result;
        //return 1;


}  

  public  function SearchResult($user_id) {
    $created=date('Y-m-d hh:ii:ss');
    //echo "SELECT users.username,users.picture,users_info.*,friends.* FROM friends INNER JOIN users_info ON friends.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where friends.receiver_user_id='$user_id' group by friends.sender_user_id";die;
    $result = $this->db->query("SELECT users.username,users.picture,users_info.* FROM friends INNER JOIN users_info ON friends.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where friends.receiver_user_id='$user_id' group by friends.sender_user_id") or die(mysqli_error($this->db));
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


  // dependent dropdown

   public  function getCountry() {
    $created=date('Y-m-d hh:ii:ss');      
      $result = $this->db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC") or die(mysqli_error($this->db)); 
       
      $result1 = mysqli_num_rows($result);
      if($result1>0){
       while($row = mysqli_fetch_array($result)){
        $data[]=$row;
       }
       return $data;
      }
        
        //echo $row['name'];  
    }



     public  function getStatebyCountry() {
    $created=date('Y-m-d hh:ii:ss');      
      $result = $this->db->query("SELECT * FROM states WHERE country_id = 150 AND status = 1 ORDER BY state_name ASC") or die(mysqli_error($this->db)); 
       
      $result1 = mysqli_num_rows($result);
      if($result1>0){
       while($row = mysqli_fetch_array($result)){
        $data[]=$row;
       }
       return $data;
      }
        
        //echo $row['name'];  
    }


     public  function getCitybyState($state_id) {
    $created=date('Y-m-d hh:ii:ss');  

   // echo "SELECT * FROM cities JOIN states ON states.state_id = cities.state_id WHERE states.state_name = '".$state_id."' AND cities.status = 1 ORDER BY cities.city_name ASC";die;

      $result = $this->db->query("SELECT * FROM cities JOIN states ON states.state_id = cities.state_id WHERE states.state_name = '".$state_id."' AND cities.status = 1 ORDER BY cities.city_name ASC") or die(mysqli_error($this->db)); 
       
      $result1 = mysqli_num_rows($result);
      if($result1>0){
       while($row = mysqli_fetch_array($result)){
        $data[]=$row;
       }
       return $data;
      }
        
        //echo $row['name'];  
    }

  // end dependent dropdown



} 
?>
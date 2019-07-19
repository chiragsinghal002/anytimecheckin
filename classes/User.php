<?php 
require_once 'db.php';

class User extends DB
{ 
  public  function registerbyEmail($data) {  
   $created=date('Y-m-d'); 
   $otp = mt_rand(100000, 999999);

   date_default_timezone_set('Asia/Kolkata');

   $currentDate = date("H:i:s");
   $currentDate_timestamp = strtotime($currentDate);
   $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);

   $checkuser = $this->db->query("SELECT user_id from user_registration where email='".$data['userEmail']."' and status='1' and is_active='1'");

   $result = mysqli_num_rows($checkuser);
   if ($result == 0) {  
          //echo "INSERT INTO user_registration SET auth_type='Normal',fname='".$data['userName']."',lname = '".$data['lastName']."',email='".$data['userEmail']."',password='".$data['password']."',otp='".$otp."',time_expire='".$endDate_months."',is_active='0',created_at= '$created',status='0'";die;

    $register = $this->db->query("INSERT INTO user_registration SET auth_type='Normal',fname='".$data['userName']."',lname = '".$data['lastName']."',email='".$data['userEmail']."',password='".$data['password']."',otp='".$otp."',time_expire='".$endDate_months."',is_active='0',created_at= '$created',status='0'") or die(mysqli_error($this->db));
          // $lastid = mysqli_insert_id($this->db);
    if($register){

     $to = $data['userEmail'];
     $subject = "Anytime Check In OTP Verification";
     $message = "
     <table style='width: 100%;'>
     <tbody><tr style='
     border-bottom: 2px solid #222;
     '>
     <td style='text-align: center; width: 100%;'><img src='https://epimoniapp.com/anytimecheckin/image/top-logo.png'></td>
     </tr>
     </tbody></table>

     <table style='width:100%;margin-top: 25px;'>

     </table>

     <table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
     <tr>
     <td color: #222;>Dear ".$data['userName']." ".$data['lastName'].",</td>
     </tr>

     <tr>
     <td color: #222;>Anytime Check In OTP Verification</td>
     </tr>

     <tr>
     <td>Your OTP for Registration: ".$otp."</td>
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

    </style>

    ";

    //echo $message;

                        // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
    $headers .= 'From: info@anytimecheckin.com' . "\r\n";
    $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
    $headers .= 'Cc: amitnetmax903@gmail.com' . "\r\n";

               // echo'<pre>';
               // print_r($message);die;

    $mail = mail($to,$subject,$message,$headers);

    return $otp;





  }else{
    return $otp;
  }

            //return $register;  
}else{


  echo '3';
}  
}


// change password




public  function ChangePasswordtest($data) {

  $checkuser = $this->db->query("SELECT * FROM user_registration where user_id='".$data['user_id']."'");  
  $result = mysqli_num_rows($checkuser);  
  if ($result == 1) {
    $detail = mysqli_fetch_array($checkuser); 
    $result1 = $detail['password']; 

    if($result1 == $data['current_password']){
      if($data['new_password']== $data['confirme_password']){

        $register = $this->db->query("UPDATE user_registration SET password='".$data['new_password']."' WHERE user_id='".$data['user_id']."'") or die(mysqli_error($this->db));
           // $uid = mysqli_insert_id($this->db);
        if($register){

         $to = $detail['email']; ;
         $subject = "Change Password";

         $message = "
         <table style='width: 100%;'>
         <tbody><tr style='
         border-bottom: 2px solid #222;
         '>
         <td style='text-align: center; width: 100%;'><img src='https://epimoniapp.com/anytimecheckin/image/top-logo.png'></td>
         </tr>
         </tbody></table>

         <table style='width:100%;margin-top: 25px;'>

         <!-- <tr>
         <td style='text-align: center; font-size: 26px; color: #222; font-weight: bold;'>Anytime Check In OTP Successfull</td>
         </tr> -->
         </table>

         <table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
         <tr>
         <td color: #222;>Dear ".$detail['fname']." ".$detail['lname'].",</td>
         </tr>

         <tr>
         <td color: #222;>Your password has been changed</td>
         </tr>

         <tr>
         <td>Your new password is: ".$data['new_password']."</td>
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

        </style>

        ";

    //echo $message;

                        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
        $headers .= 'From: info@anytimecheckin.com' . "\r\n";
        $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";    
        $headers .= 'Cc: amitnetmax903@gmail.com' . "\r\n";            

        $mail = mail($to,$subject,$message,$headers);

        return 1;





      }
      else{
        return 2;
      }

    }
    else{
      return 5;
    }


  }
  else{
    return 6;
  }




            //return $register;  
}else{
  return 7;
}  
}


      // get vendor by id

public  function GetVendorbyID($data) { 

  $check = $this->db->query("SELECT * FROM ci_vendors where v_id='".$data."'") or die(mysqli_query($this->db));
  $result = mysqli_num_rows($check);  
  if ($result == 1) {  
    $data = mysqli_fetch_array($check); 
          //$result1['result']=$data;
    return $data;

        //$result1['status']=$data['status'];

  } else {  
   $result1['result']='0';
 }  
 return $result1;
}


      // end get vendor by id



     // get setting detail

public  function GetSettingDetail() { 

  $check = $this->db->query("SELECT * FROM admin_setting where setting_id='1'") or die(mysqli_query($this->db));
  $result = mysqli_num_rows($check);  
  if ($result == 1) {  
    $data = mysqli_fetch_array($check);

    return $data;

  } else {  
   $result1['result']='0';
 }  
 return $result1;
}


      // end get setting detail


      // get admin

public  function GetAdminDetail() { 

  $check = $this->db->query("SELECT * FROM ci_users where id='1'") or die(mysqli_query($this->db));
  $result = mysqli_num_rows($check);  
  if ($result == 1) {  
    $data = mysqli_fetch_array($check); 
          //$result1['result']=$data;
    return $data;

        //$result1['status']=$data['status'];

  } else {  
   $result1['result']='0';
 }  
 return $result1;
}


      // end get admin




public  function GetUserbyID($data) { 

  $check = $this->db->query("SELECT * FROM user_registration where user_id='".$data."'") or die(mysqli_query($this->db));
  $result = mysqli_num_rows($check);  
  if ($result == 1) {  
    $data = mysqli_fetch_array($check); 
    $result1['result']='1';
    $result1['password'] = $data['password']; 
        //$result1['status']=$data['status'];

  } else {  
   $result1['result']='0';
 }  
 return $result1;
}

public  function GetUserProfileWithID($id) {
            // echo "SELECT * FROM user_registration where user_id='".$id."'";die;
 $check = $this->db->query("SELECT * FROM user_registration where user_id='".$id."'") or die(mysqli_query($this->db));
 $result = mysqli_num_rows($check);
 if ($result == 1) {
   $data = mysqli_fetch_array($check);
   $result1['result']='1';
   $result1['profile'] = $data;
             //$result1['status']=$data['status'];

 } else {
  $result1['result']='0';
}
return $result1;
}

    // vendor detail

public  function GetVendorDetailbyId($id) {           
 $check = $this->db->query("SELECT * FROM ci_vendors where v_id='".$id."'") or die(mysqli_query($this->db));
 $result = mysqli_num_rows($check);
 if ($result == 1) {
   $data = mysqli_fetch_array($check);
   $result1['result']='1';
   $result1['profile'] = $data;
             //$result1['status']=$data['status'];

 } else {
  $result1['result']='0';
}
return $result1;
}

    // vendor detail end

public  function ChangePassword($data) { 


  $register = $this->db->query("UPDATE user_registration SET password='".$data['new_password']."' WHERE user_id='".$data['user_id']."'") or die(mysqli_error($this->db));
           // $uid = mysqli_insert_id($this->db);
  if($register){
   $to = $email;
   $subject = "Anytime Check In OTP Verification";

   $message = "
   <!DOCTYPE html>
   <html lang='en'>

   <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
   <title> Email Newcustomer</title>
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <meta name='description' content=''>
   <meta name='keywords' content=''>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

   <link href='https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway' rel='stylesheet'>
   <link rel='stylesheet' href='css/bootstrap.min.css'>  
   <link rel='stylesheet' href='css/style.css'>
   <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet'>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
   </head>

   <body id='top' data-spy='scroll'>

   <table style='font:inherit;/* border-width:3px 1px 1px; *//* border-style:solid; *//* border-color:#3eb3f0; *//* border-top-left-radius:3px; *//* border-top-right-radius:3px; */width:100%;max-width:600px;margin:0px auto;'>
   <tbody>
   <tr>
   <td style='text-align: center;'>
   <a href='#'>
   <img src='http://netmaxims.in/projects/anytimecheckin/image/logo.png' style='max-width:100%;height:auto' alt='' class='CToWUd'>
   </a>
   </td>
   </tr>  
   </tbody>
   </table>
   <table style='font:inherit;width:100%;max-width: 100%;margin: -31px auto 0px 0px;'>
   <tbody>
   <tr>
   <td>
   <img src='http://netmaxims.in/projects/anytimecheckin/image/top-border.jpg' style='width:100%;height:auto' alt='' class='CToWUd'>
   </td>
   </tr>
   </tbody>
   </table>
   <table style='border:0;margin:0;padding:0;font:inherit;border-top:0;background-color:#fff;padding:20px 0px 0px;width:100%;max-width:600px;margin:0 auto;'>
   <tbody>

   <td>
   <p style='border:0px none;margin:0px 0px 0px;padding:0px;font-style:inherit;font-weight: 600;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size: 32px;line-height:25px;color: #294e8d;text-align: center;'>
   Anytime Check In OTP Verification</p><br>
   </p>

   </td>
   </tr>

   </tbody>
   </table>
   <table style='border:0;margin:0;padding:0;font:inherit;border-top:0;background-color:#fff;padding:0px 18px;width:100%;max-width:1070px;margin:0 auto;'>
   <tbody>
   <tr>
   <td>
   <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>Dear User,</p>
   </td>
   </tr>

   <tr>
   <td>
   <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>
   Anytime Check In OTP Verification</p>

   <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;    width: 67%;'>
   Use this OTP for Registration: <b> $otp</b></p>
   <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;width: 85%;'>
   </p>





   </td>
   </tr>
   <tr>
   <td>
   <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>
   Thanks,<br>
   Anytime Check In</p>
   </td>
   </tr>


   </tbody>
   </table>

   <div class='mail-area-last wel'>
   <div class='container'>
   <div class='row'>

   <div class='border-blue'>
   <img src='http://netmaxims.in/projects/anytimecheckin/image/border-blue.jpg' style='width:100%;' /> <span= style='margin-left: 25px;'>
   </div>
   <div class='col-xs-6 col-sm-6' style='float:left;'>
   <div class='mail-medicine'>
   <h2 style='color: #7f7f7f; margin-left: 55px;
   font-size: 14px; font-weight: 400;margin-top: 0px;'>Anytime checkin</h2>
   <p style='font-size: 13px;
   color: #7f7f7f;  font-weight: 400; margin-left: 55px;'>Online Hotel Booking Service<br /> by 24*7 hours</p>
   </div>
   </div>


   <div class='col-xs-6 col-sm-6' style='float:right;'>
   <div class='mail-left'>
   <span style='color: #7f7f7f; font-size: 14px; margin-right: 70px;  font-weight: 300;'><a href='http://www.anytimecheckin.com' target='_blank' data-saferedirecturl='https://www.google.com/url?hl=en&amp;q=http://www.anytimecheckin.com&amp;source=gmail&amp;ust=1524723379004000&amp;usg=AFQjCNFHFP7-I2l_9c5i3ns4bafB2_sZUg' style=' color: #7f7f7f;'>http://www.anytimecheckin.com</a></span><br>
   <span style='font-size:13px;margin-right:70px;color:#7f7f7f;font-weight:400;display: block;margin-top: 5px;margin-bottom: 5px;'>Tel:  +123456789</span>
   <span style='font-size:13px;margin-right:70px;color:#7f7f7f;font-weight:400;display: block;margin-top: 0px;'><a href='mailto:info@anytimecheckin.com' target='_blank'  style=' color: #7f7f7f;'>Email: info@anytimecheckin.com</a></span>
   </div>
   </div>
   </div>
   </div>
   </div>



   <!-- <div class='footer-last'>
   <div class='container-fluid'>
   <div class='row'>
   <div class='col-xs-12 col-sm-12 col-md-12'>
   <p>© 2018 copyright section</p>
   </div>
   </div>
   </div>
   </div> -->

   <!-- /close footer-->




   <script>
   function myFunction() {
    document.getElementsByClassName('topnav')[0].classList.toggle('responsive');
  }
  </script>

  <script>
  $(document).ready(function(){
    $('button').click(function(){
      $('p').toggle();
      });
      });
      </script>







      <style type='text/css'>

      .mail-logo{ text-align: center; margin-top: 10px;}


      .mail-logo:before{
        content: '';
        width: 93%;
        height: 6px;
        background: #2a568b;
        position: absolute;
        top: 9em;
        left: 0px;
        right: 0px;
        margin: 0 auto;
      }


      .mail-heading h2 {
        text-align: center;
        color: #294e8d;
        font-family: roboto;
        font-weight: 600;
        font-size: 38px;
        margin-top: 45px;
        margin-bottom: 32px;
      }

      .mail-verify-title {
        margin-left: 20.5%;
      }

      p.next-mail {
        font-size: 18px !important;
        width: 69% !important;
        margin-bottom: 40px !important;
      }

      .mail-verify-title p {
        font-size: 18px;
        margin-top: 30px;
      }

      p.mail-last {
        color: #918f8f;
      }

      .mail-verify-title h2 {
        font-size: 20px;
        margin-top: 3.5em;
        color: #000000;
        font-family: roboto;
        font-weight: 500;
        margin-bottom: 5em;
      }


      .mail-area-last:before{
        content: '';
        width: 93%;
        height: 4px;
        background: #2a568b;
        position: absolute;
        top: 45em;
        left: 0px;
        right: 0px;
        margin: 0 auto;}


        .mail-medicine h2 {
          font-size: 19px;
          color: #6e6d6d;
        }

        .mail-medicine p {
          font-size: 18px;
          color: #6e6d6d;
          margin-top: 13px;
        }

        .mail-left {
          text-align: right;
        }


        .mail-left h2 {
          font-size: 20px;
          color: #6e6d6d;
          margin-bottom: 0px;
        }


        .mail-left p {
          font-size: 17px;
          margin: 2px 0px 0px 0px;
        }

        .mail-area-last {
          margin-bottom: 25px;
        }


        .mail-verify-title.next {
          margin-left: 15.5%;
        }


        p.next-mail.next {
          font-size: 18px !important;
          width: 97% !important;
          margin-bottom: 40px !important;
        }


        .mail-add-area {
          margin-left: 15.5%;
        }

        .mail-add-area p {
          font-size: 16px;
          margin: 4px 0px 0px 0px;
        }

        p.mail-upon {
          font-size: 18px;
          margin-top: 40px;
        }

        p.mail-thanks {
          font-size: 18px;
          margin-top: 32px;
        }


        .mail-area-last.wel {
          margin-bottom: 25px;
          margin-top: 60px;
        }

        .mail-area-last.wel:before {
          margin-top: 54px;
        }

        p.mail-lat {
          margin: 7px 0px 0px 0px;
        }

        .mail-area-last.point:before {
          margin-top: 30px;
        }

        h2.mail-point {
          margin-top: 53px;
        }
        </style>




        </body>
        </html>

        ";

    //echo $message;

                        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
        $headers .= 'From: <webmail@netmaxims.in>' . "\r\n";
        $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
        $headers .= 'Cc: amitnetmax903@gmail.com' . "\r\n";

               // echo'<pre>';
               // print_r($message);die;

        $mail = mail($to,$subject,$message,$headers);

        return $otp;





      }else{
        return $otp;
      }

            //return $register;  

    }

// end change password

// end change password


// update user profile
    public  function UpdateUserProfile($data) {
      $fname = $data['fname'];
      $lname = $data['lname'];
      $email = $data['email'];
      $mob_no = $data['mob_no'];
      $user_id = $data['user_id'];

          // echo "UPDATE user_registration  SET fname='$fname',lname='$lname',email ='$email',mob_no='$mob_no' where user_id='$user_id'";die;
      $register = $this->db->query("UPDATE user_registration  SET fname='$fname',lname='$lname',email ='$email',mob_no='$mob_no' where user_id='$user_id'") or die(mysqli_error($conn));
      if($register){
                //$data['result']=1;
        return 1;
      }else{
        return 0;
      }

            //return $register;
    }



// end update user profile

        //booking cancelled

    public  function bookingCancelled($id) {


          // echo "UPDATE user_registration  SET fname='$fname',lname='$lname',email ='$email',mob_no='$mob_no' where user_id='$user_id'";die;
      $register = $this->db->query("UPDATE hotel_booking  SET booking_status='4' where booking_id='$id'") or die(mysqli_error($conn));
      if($register){
                //$data['result']=1;
        return 1;
      }else{
        return 0;
      }

            //return $register;
    }

        // booking cancelled end



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

      $checkuser = $this->db->query("SELECT user_id from user_registration where mob_no='".$data['mobno']."'");  
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

    $result=$this->db->query("SELECT * FROM user_registration where email='$email' and is_active='1' and status='1'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);  
    return $row;  
  }  


  public  function checkOTPByEmail($otp,$email) { 
    // /echo "SELECT * FROM user_registration where email='$email' and otp='$otp'";die;
    $result=$this->db->query("SELECT * FROM user_registration where email='$email' and otp='$otp'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);
    if($num>0){
          // echo "UPDATE user_registration SET is_active='1',status = '1' where email='$email' AND otp='$otp'";die;
     $register = $this->db->query("UPDATE user_registration SET is_active='1',status = '1' where email='$email'") or die(mysqli_error($this->db));
     if($register){

       $to = $email;
       $subject = "Anytime Check In OTP";



       $message = "
       <table style='width: 100%;'>
       <tbody><tr style='
       border-bottom: 2px solid #222;
       '>
       <td style='text-align: center; width: 100%;'><img src='https://epimoniapp.com/anytimecheckin/image/top-logo.png'></td>
       </tr>
       </tbody></table>

       <table style='width:100%;margin-top: 25px;'>

       <!-- <tr>
       <td style='text-align: center; font-size: 26px; color: #222; font-weight: bold;'>Anytime Checkin OTP Successfull</td>
       </tr> -->
       </table>

       <table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
       <tr>
       <td color: #222;>Dear User,</td>
       </tr>

       <tr>
       <td color: #222;>Anytime Check In OTP</td>
       </tr>

       <tr>
       <td>Your OTP is verified successfully.</td>
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

      </style>

      ";

    //echo $message;

                        // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
      $headers .= 'From: info@anytimecheckin.com' . "\r\n";
      $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
      $headers .= 'Cc: amitnetmax903@gmail.com' . "\r\n";

               // echo'<pre>';
               // print_r($message);die;

      $mail = mail($to,$subject,$message,$headers);

      return 1;
    }
  }else{
   return 0;
 }

}

// forgot password by email

public  function forgotpasswordbyEmail($email) { 
    //echo "SELECT * FROM user_registration where email='$email'";die;
  $result=$this->db->query("SELECT * FROM user_registration where email='$email'") or die(mysqli_query($this->db));
  $row = mysqli_fetch_array($result);
  $num=mysqli_num_rows($result);

  $fname=$row['fname'];
  $lname=$row['lname'];
  $password = $row['password'];

  if($row){

   $to = $email;
   $subject = "Anytime Check In Forget Password";

   $message = "
   <table style='width: 100%;'>
   <tbody><tr style='
   border-bottom: 2px solid #222;
   '>
   <td style='text-align: center; width: 100%;'><img src='https://epimoniapp.com/anytimecheckin/image/top-logo.png'></td>
   </tr>
   </tbody></table>

   <table style='width:100%;margin-top: 25px;'>

   <!-- <tr>
   <td style='text-align: center; font-size: 26px; color: #222; font-weight: bold;'>Anytime Checkin OTP Successfull</td>
   </tr> -->
   </table>

   <table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
   <tr>
   <td color: #222;>Dear $fname $lname,</td>
   </tr>

   <tr>
   <td color: #222;>A new password was requested from anytimecheckin.com</td>
   </tr>

   <tr>
   <td>Your new password is: $password</td>
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
  </style>

  ";

    //echo $message;

                        // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
  $headers .= 'From: info@anytimecheckin.com' . "\r\n";
  $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
                //$headers .= 'Cc: amitnetmax903@gmail.com' . "\r\n";

               // echo'<pre>';
               // print_r($message);die;

  $mail = mail($to,$subject,$message,$headers);

  return 1;
}


}

// forgot password

// forgot password by email

public  function forgotpasswordbyMobile($mobile) { 
    //echo "SELECT * FROM user_registration where email='$email'";die;
  $result=$this->db->query("SELECT * FROM user_registration where mob_no='$mobile'") or die(mysqli_query($this->db));
  $row = mysqli_fetch_array($result);
  $num=mysqli_num_rows($result);

  $password = $row['password'];

  if($row){

    echo $password;

    return $password;
    return 1;
  }


}

// forgot password by mobile



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

// get pages 
public function GetPages(){

  $selectuser = $this->db->query("SELECT * FROM ci_pages");
  while($fetch=mysqli_fetch_array($selectuser)){
    $data[]=$fetch;
  }
  return $data;
}
// end get pages



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
  $check = $this->db->query("SELECT * FROM user_registration where mob_no='$mob' and password='$password' and is_active='1' and status = '1'") or die(mysqli_query($this->db));
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


  // get user by email   
public function UserInfobyEmail($email){
  $selectuser = $this->db->query("SELECT * FROM  user_registration where email='$email'");
  $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
  return $fetch;
}
  // get user by email end  




// facebook api for login

// login by facebook
public  function loginbyfacebookapi($email) {

$query = $this->db->query("SELECT * FROM user_registration WHERE email = '$email' and is_active = '1' and status = '1'") or die(mysqli_query($this->db));
  $result = mysqli_num_rows($query);

  if ($result == 1) {  
    $data = mysqli_fetch_array($query);
    $result1['result']='1';
    $result1['user_id'] = $data['user_id']; 
    $result1['fname']=$data['fname'];
    $result1['lname']=$data['lname'];
    $result1['mob_no']=$data['mob_no'];
    $result1['email']=$data['email'];
        //$result1['status']=$data['status'];

  } else {  
   $result1['result']='0';
          //return 0;
 }  
 return $result1;



}

// login by facebook
public  function loginbyfacebook($data) {


  $created=date('Y-m-d'); 
   //$otp = mt_rand(100000, 999999);

  date_default_timezone_set('Asia/Kolkata');

  $currentDate = date("H:i:s");
  $currentDate_timestamp = strtotime($currentDate);
  $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);

  $checkuser = $this->db->query("Select user_id from user_registration where email='".$data['userEmail']."' and status='1' and is_active='1'");  
  $result = mysqli_num_rows($checkuser);  
  if ($result == 0) { 
   //echo "INSERT INTO user_registration SET auth_type='facebook',fname='".$data['userName']."',lname = '".$data['lastName']."',email='".$data['userEmail']."',time_expire='".$endDate_months."',is_active='1',created_at= '$created',status='1'";die;

    $register = $this->db->query("INSERT INTO user_registration SET auth_type='facebook',fname='".$data['userName']."',lname = '".$data['lastName']."',email='".$data['userEmail']."',time_expire='".$endDate_months."',is_active='1',created_at=$created,status='1'") or die(mysqli_error($this->db));
          // $lastid = mysqli_insert_id($this->db);

    return 0;

  }
  else{
        //echo "SELECT * FROM user_registration WHERE email='".$data['userEmail']."' and is_active = '1' and status = '1'";die;

    $query = $this->db->query("SELECT * FROM user_registration WHERE email='".$data['userEmail']."' and is_active = '1' and status = '1'") or die(mysqli_query($this->db));
    $result = mysqli_num_rows($query);

    if ($result == 1) {  
      $data = mysqli_fetch_array($query);
      $result1['result']='1';
      $result1['user_id'] = $data['user_id']; 
      $result1['fname']=$data['fname'];
      $result1['lname']=$data['lname'];
      $result1['mob_no']=$data['mob_no'];
      $result1['email']=$data['email'];
        //$result1['status']=$data['status'];

    } 
    return 1; 
       //return $result1;

  }

      //



}

     // login by facebook end



public  function loginbyemail($email,$password) {
  $query = $this->db->query("SELECT * FROM user_registration WHERE email = '$email' and password = '$password' and is_active = '1' and status = '1'") or die(mysqli_query($this->db));
  $result = mysqli_num_rows($query);

  if ($result == 1) {  
    $data = mysqli_fetch_array($query);
    $result1['result']='1';
    $result1['user_id'] = $data['user_id']; 
    $result1['fname']=$data['fname'];
    $result1['lname']=$data['lname'];
    $result1['mob_no']=$data['mob_no'];
    $result1['email']=$data['email'];
        //$result1['status']=$data['status'];

  } else {  
   $result1['result']='0';
          //return 0;
 }  
 return $result1;
}  


// Login for facebook



public  function getuserbyemail($email) {

  $check = $this->db->query("SELECT * FROM `user_registration` WHERE `email` = '$email'") or die(mysqli_query($this->db));
  $result = mysqli_num_rows($check);  
  if ($result == 1) {  
    $data = mysqli_fetch_array($check); 
    $result1['result']='1';
    $result1['time_expire'] = $data['time_expire']; 
        //$result1['result']=$data;

  } else {  
   $result1['result']='0';
 }  
 return $result1;
}

// resend code 

public  function resendCodetoUser($userEmail) { 


  $code = mt_rand(100000, 999999);


  date_default_timezone_set('Asia/Kolkata');

  $currentDate = date("H:i:s");
  $currentDate_timestamp = strtotime($currentDate);
  $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);


  $update = $this->db->query("UPDATE user_registration SET otp ='$code',time_expire='$endDate_months' where email='$userEmail'") or die(mysqli_error($conn));
  if($update){

    $to = $userEmail;
    $subject = "Anytime Check In Resend OPT";

    $message = "
    <!DOCTYPE html>
    <html lang='en'>

    <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <title> Email Newcustomer</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway' rel='stylesheet'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>  
    <link rel='stylesheet' href='css/style.css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>



    </head>

    <body id='top' data-spy='scroll'>

    <table style='font:inherit;/* border-width:3px 1px 1px; *//* border-style:solid; *//* border-color:#3eb3f0; *//* border-top-left-radius:3px; *//* border-top-right-radius:3px; */width:100%;max-width:600px;margin:0px auto;'>
    <tbody>
    <tr>
    <td style='text-align: center;'>
    <a href='#'>
    <img src='http://netmaxims.in/projects/anytimecheckin/image/logo.png' style='max-width:100%;height:auto' alt='' class='CToWUd'>
    </a>
    </td>
    </tr>  
    </tbody>
    </table>
    <table style='font:inherit;width:100%;max-width: 100%;margin: -31px auto 0px 0px;'>
    <tbody>
    <tr>
    <td>
    <img src='http://netmaxims.in/projects/anytimecheckin/image/top-border.jpg' style='width:100%;height:auto' alt='' class='CToWUd'>
    </td>
    </tr>
    </tbody>
    </table>
    <table style='border:0;margin:0;padding:0;font:inherit;border-top:0;background-color:#fff;padding:20px 0px 0px;width:100%;max-width:600px;margin:0 auto;'>
    <tbody>

    <td>
    <p style='border:0px none;margin:0px 0px 0px;padding:0px;font-style:inherit;font-weight: 600;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size: 32px;line-height:25px;color: #294e8d;text-align: center;'>
    Your Resend OTP</p><br>
    </p>

    </td>
    </tr>

    </tbody>
    </table>
    <table style='border:0;margin:0;padding:0;font:inherit;border-top:0;background-color:#fff;padding:0px 18px;width:100%;max-width:1070px;margin:0 auto;'>
    <tbody>
    <tr>
    <td>
    <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>Dear User,</p>
    </td>
    </tr>

    <tr>
    <td>
    <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>
    A new OPT was requested from anytimecheckin.</p>

    <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;    width: 67%;'>
    Your new OPT is: <b> $code</b></p>
    <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;width: 85%;'>
    </p>





    </td>
    </tr>
    <tr>
    <td>
    <p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>
    Thanks,<br>
    Anytime Check In</p>
    </td>
    </tr>


    </tbody>
    </table>

    <div class='mail-area-last wel'>
    <div class='container'>
    <div class='row'>

    <div class='border-blue'>
    <img src='http://netmaxims.in/projects/anytimecheckin/image/border-blue.jpg' style='width:100%;' /> <span= style='margin-left: 25px;'>
    </div>
    <div class='col-xs-6 col-sm-6' style='float:left;'>
    <div class='mail-medicine'>
    <h2 style='color: #7f7f7f; margin-left: 55px;
    font-size: 14px; font-weight: 400;margin-top: 0px;'>Anytime checkin</h2>
    <p style='font-size: 13px;
    color: #7f7f7f;  font-weight: 400; margin-left: 55px;'>Online Hotel Booking Service<br /> by 24*7 hours</p>
    </div>
    </div>


    <div class='col-xs-6 col-sm-6' style='float:right;'>
    <div class='mail-left'>
    <span style='color: #7f7f7f; font-size: 14px; margin-right: 70px;  font-weight: 300;'><a href='http://www.anytimecheckin.com' target='_blank' data-saferedirecturl='https://www.google.com/url?hl=en&amp;q=http://www.anytimecheckin.com&amp;source=gmail&amp;ust=1524723379004000&amp;usg=AFQjCNFHFP7-I2l_9c5i3ns4bafB2_sZUg' style=' color: #7f7f7f;'>http://www.anytimecheckinanytimecheckin.com</a></span><br>
    <span style='font-size:13px;margin-right:70px;color:#7f7f7f;font-weight:400;display: block;margin-top: 5px;margin-bottom: 5px;'>Tel:  +123456789</span>
    <span style='font-size:13px;margin-right:70px;color:#7f7f7f;font-weight:400;display: block;margin-top: 0px;'><a href='mailto:info@anytimecheckin.com' target='_blank'  style=' color: #7f7f7f;'>Email: info@anytimecheckin.com</a></span>
    </div>
    </div>
    </div>
    </div>
    </div>



    <!-- <div class='footer-last'>
    <div class='container-fluid'>
    <div class='row'>
    <div class='col-xs-12 col-sm-12 col-md-12'>
    <p>© 2018 copyright section</p>
    </div>
    </div>
    </div>
    </div> -->

    <!-- /close footer-->




    <script>
    function myFunction() {
      document.getElementsByClassName('topnav')[0].classList.toggle('responsive');
    }
    </script>

    <script>
    $(document).ready(function(){
      $('button').click(function(){
        $('p').toggle();
        });
        });
        </script>







        <style type='text/css'>

        .mail-logo{ text-align: center; margin-top: 10px;}


        .mail-logo:before{
          content: '';
          width: 93%;
          height: 6px;
          background: #2a568b;
          position: absolute;
          top: 9em;
          left: 0px;
          right: 0px;
          margin: 0 auto;
        }


        .mail-heading h2 {
          text-align: center;
          color: #294e8d;
          font-family: roboto;
          font-weight: 600;
          font-size: 38px;
          margin-top: 45px;
          margin-bottom: 32px;
        }

        .mail-verify-title {
          margin-left: 20.5%;
        }

        p.next-mail {
          font-size: 18px !important;
          width: 69% !important;
          margin-bottom: 40px !important;
        }

        .mail-verify-title p {
          font-size: 18px;
          margin-top: 30px;
        }

        p.mail-last {
          color: #918f8f;
        }

        .mail-verify-title h2 {
          font-size: 20px;
          margin-top: 3.5em;
          color: #000000;
          font-family: roboto;
          font-weight: 500;
          margin-bottom: 5em;
        }


        .mail-area-last:before{
          content: '';
          width: 93%;
          height: 4px;
          background: #2a568b;
          position: absolute;
          top: 45em;
          left: 0px;
          right: 0px;
          margin: 0 auto;}


          .mail-medicine h2 {
            font-size: 19px;
            color: #6e6d6d;
          }

          .mail-medicine p {
            font-size: 18px;
            color: #6e6d6d;
            margin-top: 13px;
          }

          .mail-left {
            text-align: right;
          }


          .mail-left h2 {
            font-size: 20px;
            color: #6e6d6d;
            margin-bottom: 0px;
          }


          .mail-left p {
            font-size: 17px;
            margin: 2px 0px 0px 0px;
          }

          .mail-area-last {
            margin-bottom: 25px;
          }


          .mail-verify-title.next {
            margin-left: 15.5%;
          }


          p.next-mail.next {
            font-size: 18px !important;
            width: 97% !important;
            margin-bottom: 40px !important;
          }


          .mail-add-area {
            margin-left: 15.5%;
          }

          .mail-add-area p {
            font-size: 16px;
            margin: 4px 0px 0px 0px;
          }

          p.mail-upon {
            font-size: 18px;
            margin-top: 40px;
          }

          p.mail-thanks {
            font-size: 18px;
            margin-top: 32px;
          }


          .mail-area-last.wel {
            margin-bottom: 25px;
            margin-top: 60px;
          }

          .mail-area-last.wel:before {
            margin-top: 54px;
          }

          p.mail-lat {
            margin: 7px 0px 0px 0px;
          }

          .mail-area-last.point:before {
            margin-top: 30px;
          }

          h2.mail-point {
            margin-top: 53px;
          }
          </style>




          </body>
          </html>

          ";

    //echo $message;

                        // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
          $headers .= 'From: <webmail@netmaxims.in>' . "\r\n";
          $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
          $headers .= 'Cc: amitnetmax903@gmail.com' . "\r\n";

               // echo'<pre>';
               // print_r($message);die;

          $mail = mail($to,$subject,$message,$headers);


          $data['result']=1;
          return 1;
        //return $data;
        }else{
          return 0;
        }

            //return $register;   
      }

// end resend code

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

    // Close friend list
// Check Friend 

        // get pages
      public function GetPagesbyid($id){

        $selectuser = $this->db->query("SELECT * FROM ci_pages WHERE page_id='$id' and page_status='1'");
        while($fetch=mysqli_fetch_array($selectuser)){
          $data=$fetch;
        }
        return $data;
      }
        //end get pages

      public function GetAllFeaturedAd(){

        $selectuser = $this->db->query("SELECT * FROM featured_ad WHERE status='1'");
        while($fetch=mysqli_fetch_array($selectuser)){
          $data[]=$fetch;
        }
        return $data;
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
        $selectuser = $this->db->query("SELECT * FROM  user_registration where user_id='$id'");
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
      public function UserSearchResultForday($check_in_date,$check_out_date,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng){


       $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='".$check_in_date."' and ci_hotels.check_out>='".$check_out_date."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));


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


    public function UserSearchResultForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$hr){
          // $lng=28.3743;
          // $lat=77.3293;
      $check_in_time_new  = date("H:i", strtotime($check_in_time));
      $check_out_time_new  = date("H:i", strtotime($check_out_time));
      // echo "SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance";die;

      $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_hotels.min_hour<=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));

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

        // search hotel filter for day basis

    public function searchResultFilterForday($check_in_date,$check_out_date,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$star0,$star1,$star2,$star3,$rating1,$rating2,$rating3,$rating4,$rating5,$budget_1,$budget_2,$budget_3,$budget_4){

      if($rating1!==6 OR $rating2!==6 OR $rating3!==6 OR $rating4!==6 OR $rating5!==6){

        $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,user_reviews.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status INNER JOIN user_reviews ON ci_hotels.hotel_id=user_reviews.hotel_id WHERE ci_hotels.check_in<=".$check_in_date." and ci_hotels.check_out>=".$check_out_date." AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND user_reviews.user_rating IN($rating1,$rating2,$rating3,$rating4,$rating5)  AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
      }else if($star0!==5 OR $star1!==5 OR $star2!==5 OR $star3!==5){


       $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<=$check_in_date and ci_hotels.check_out>=$check_out_date AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND hotel_star_category IN($star0,$star1,$star2,$star3) AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
     }else if($budget_1!==0 OR $budget_2!==0 OR $budget_3!==0 OR $budget_4!==0){
      if($budget_1!==0){
        $budget1_a=1;
        $budget1_b=15;

        $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<=$check_in_date and ci_hotels.check_out>=$check_out_date AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  $budget1_a and  $budget1_b AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
      }
      if($budget_2!==0){
        $budget2_a=75;
        $budget2_b=100;
        $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<=$check_in_date and ci_hotels.check_out>=$check_out_date AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  $budget2_a and  $budget2_b AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
      }
      if($budget_3!==0){
        $budget3_a=100;
        $budget3_b=125;
        $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<=$check_in_date and ci_hotels.check_out>=$check_out_date AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  $budget3_a and  $budget3_b AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
      }
      if($budget_4!==0){
        $budget4_a=125;
        $budget4_b=10000;
        $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<=$check_in_date and ci_hotels.check_out>=$check_out_date AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  $budget4_a and  $budget4_b AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
      }



    }else{
     $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='".$check_in_date."' and ci_hotels.check_out>='".$check_out_date."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
   }
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


// Search Result filters for hour
public function UserSearchResultfilterForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$star0,$star1,$star2,$star3,$rating1,$rating2,$rating3,$rating4,$rating5,$budget_1,$budget_2,$budget_3,$budget_4,$hr){
          // $lng=28.3743;
          // $lat=77.3293;
  $check_in_time_new  = date("H:i", strtotime($check_in_time));
  $check_out_time_new  = date("H:i", strtotime($check_out_time));

  if($rating1!==6 OR $rating2!==6 OR $rating3!==6 OR $rating4!==6 OR $rating5!==6){

   $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,user_reviews.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status  INNER JOIN user_reviews ON ci_hotels.hotel_id=user_reviews.hotel_id WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND user_reviews.user_rating IN($rating1,$rating2,$rating3,$rating4,$rating5) AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
 }else if($star0!==5 OR $star1!==5 OR $star2!==5 OR $star3!==5){
  $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status INNER JOIN user_reviews ON ci_hotels.hotel_id=user_reviews.hotel_id WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND user_reviews.user_rating IN($rating1,$rating2,$rating3,$rating4,$rating5) AND ci_hotels.hotel_star_category IN($star0,$star1,$star2,$star3) AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
}else if($budget_1!==0 OR $budget_2!==0 OR $budget_3!==0 OR $budget_4!==0){
  if($budget_1!==0){
    $budget1_a=1;
    $budget1_b=15;
    $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status INNER JOIN user_reviews ON ci_hotels.hotel_id=user_reviews.hotel_id WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  ".$budget1_a." and  ".$budget1_b." AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
  }
  if($budget_2!==0){
   $budget2_a=75;
   $budget2_b=100;
   $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status INNER JOIN user_reviews ON ci_hotels.hotel_id=user_reviews.hotel_id WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  ".$budget2_a." and  ".$budget2_b." AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
 }
 if($budget_3!==0){
   $budget3_a=100;
   $budget3_b=125;
   $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status INNER JOIN user_reviews ON ci_hotels.hotel_id=user_reviews.hotel_id WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  ".$budget3_a." and  ".$budget3_b." AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
 }
 if($budget_4!==0){
   $budget4_a=125;
   $budget4_b=10000;
   $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status INNER JOIN user_reviews ON ci_hotels.hotel_id=user_reviews.hotel_id WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_room_type.price_per_day BETWEEN  ".$budget4_a." and  ".$budget4_b." AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
 }
}else{
 $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.*,( 3959 * acos( cos( radians($lat) ) * cos( radians( hotel_latitude ) ) * cos( radians( hotel_longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( hotel_latitude ) ) ) ) AS distance FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='".$check_in_time_new."' and ci_hotels.check_out>='".$check_out_time_new."' AND ci_room_type.status='1' AND ci_hotels.any='3' OR ci_hotels.any='1' AND ci_hotels.min_hour>=".$hr." AND ci_room_type.adult_person_capacity>=".$no_of_adults." AND ci_room_type.child_capacity>=".$no_of_childs." GROUP BY ci_hotels.hotel_id HAVING distance < 5 ORDER BY distance") or die(mysqli_error($this->db));
}



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



// Close function



public function Hoteldetailbyid($id){
// echo $id;
//           echo "SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.hotel_id = '$id'";die;

 $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.hotel_id = $id") or die(mysqli_error($this->db));  
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


      // hotel facility

public function GetFacilitybyHotelsid($id){       

 $selectuser = $this->db->query("SELECT facility_name FROM facility_id  WHERE facility_id= '$id'") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
 $num=mysqli_num_rows($selectuser);
 if($num>0){
  $fetch=mysqli_fetch_array($selectuser);
  $data=$fetch;
        //              while($fetch=mysqli_fetch_array($selectuser)){
        //     $data[]=$fetch;
        // }
  return $data;
}else{
  return 0;
}



}

      // hotel facility end

public function GetRoomimageByHotelId($id)
{
  $selectuser = $this->db->query("SELECT * FROM  `ci_hotel_photo` where hotel_id = $id") or die(mysqli_error($this->db));  
  $fetch_num=mysqli_num_rows($selectuser);
  $fetch=mysqli_fetch_array($selectuser);
  if($fetch_num>0)
  {
		  // while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1=$fetch;
		  // }
    return $fetch1;
  }
  else
  {
    return 0;
  }
}

public function Roomdetailbyid($id){


 $selectuser = $this->db->query("SELECT * FROM ci_room_type  WHERE room_type_id = $id") or die(mysqli_error($this->db));  
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


// room photos by id
public function RoomPhotosbyid($id){


 $selectuser = $this->db->query("SELECT * FROM ci_room_photo  WHERE room_id = $id") or die(mysqli_error($this->db));  
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

// room photos by id end

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


public function GetRoomtypeDiscount($data){


 $selectuser = $this->db->query("SELECT * FROM ci_camp_discount_rate WHERE room_type_id = '$data' and camp_dr_status='1'") or die(mysqli_error($this->db));


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



// get discount by hotel id and room type id 
public function GetDiscountbyhotelandroomid($hid,$rid){


 $selectuser = $this->db->query("SELECT * FROM ci_camp_discount_rate WHERE room_type_id = '$rid' and hotel_id = '$hid' and camp_dr_status='1'") or die(mysqli_error($this->db));


 $fetch_num=mysqli_num_rows($selectuser);
 if($fetch_num>0){

  $fetch=mysqli_fetch_array($selectuser);
      // while($fetch=mysqli_fetch_array($selectuser)){
      //   $fetch1[]=$fetch;
      // }


  return $fetch;
}else{
  return 0;
}
}

  // end get discount by hotel id and room type id


     // Add Bid
public  function BookingConfirm($data) {
   // echo "<pre>";
   //  print_r($data);die;
   // var_dump($data);
  $checkIn=$data['check_in_date'];
  $checkout=$data['check_out_date'];
  $check_in_time=$data['check_in_time'];
  $check_out_time=$data['check_out_time'];
  $arrival_time='dont know';
  $date=date('Y-m-d H:i:s');
  $no_of_rooms=$data['noofroom'];
  $no_of_adults=$data['no_of_person'];
  $booking_type=$data['booking_type'];
  $childs=$data['childs'];
  $day = date('d', strtotime($checkIn));
  $month=date('M',strtotime($checkIn));
  $year=date('Y',strtotime($checkIn));
  $hotel_id=$data['hotel_id'];
  $room_type_id=$data['room_type_id'];
  $result = $this->db->query("INSERT INTO `hotel_booking`(`booking_id`, `user_id`, `hotel_id`, `payment_id`, `room_type_id`,`booking_type`,`check_in_date`, `check_out_date`,`check_in_time`,`check_out_time`,`no_of_rooms`, `no_of_adults`,`no_of_childs`,`booked_price`, `arrival_time`, `status`, `book_created_at`, `actual_price`, `discount_price`,`hotel_booking_id`,`fname`,`lname`,`email`,`mob_no`) VALUES ('','".$data['user_id']."','".$data['hotel_id']."','".$data['paymentId']."','".$data['room_type_id']."','".$booking_type."','".$checkIn."','".$checkout."','".$check_in_time."','".$check_out_time."','".$no_of_rooms."','".$no_of_adults."','".$childs."','".$data['booked_price']."','".$arrival_time."','1','".$date."','".$data['actual_price']."','".$data['discount_price']."','".$data['hotel_booking_id']."','".$data['fname']."','".$data['lname']."','".$data['email']."','".$data['mob_no']."')") or die(mysqli_error($this->db));
  $a=mysqli_insert_id($this->db);
  $select_query=$this->db->query("SELECT * FROM room_pricing_schedule where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and day='".$day."' and month='".$month."' and year='".$year."'") or die(mysqli_error($this->db));
  $result1 = mysqli_num_rows($select_query);
  if($result1>0){
    $update=$this->db->query("UPDATE room_pricing_schedule SET available_room=available_room-'".$no_of_rooms."',booked_room=booked_room+'".$no_of_rooms."' where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and day='".$day."' and month='".$month."' and year='".$year."'") or die(mysqlii_error($this->db));

  }else{
    $insert_query=$this->db->query("INSERT INTO room_pricing_schedule(id,hotel_id,room_type_id,available_room,booked_room,price_per_day,price_per_hour,day,month,year,status,created_at,modified_at) values('','".$hotel_id."','".$room_type_id."','10','10','','','".$day."','".$month."','".$year."','','".$date."','')") or die(mysqli_error($this->db));
    $a=mysqli_insert_id($this->db);
    $update1=$this->db->query("UPDATE room_pricing_schedule SET available_room=available_room-'".$no_of_rooms."',booked_room=booked_room+'".$no_of_rooms."' where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and day='".$day."' and month='".$month."' and year='".$year."'") or die(mysqlii_error($this->db));
  }


  session_start();
  $_SESSION['booking_id']=$a;

  if($result){
    return 1;
      //return $a;
  }else{
    return 0;
  }
        //echo $row['name']; 
        //echo '1'; 
} 


public function random_num($size) {
  $alpha_key = '';
  $keys = range('A', 'Z');

  for ($i = 0; $i < 3; $i++) {
    $alpha_key .= $keys[array_rand($keys)];
  }

  $length = $size - 2;

  $key = '';
  $keys = range(0, 5);

  for ($i = 0; $i < $length; $i++) {
    $key .= $keys[array_rand($keys)];
  }

  return $alpha_key . $key;

}



public function GetBookingConfirmbyId($id){
// echo "SELECT * FROM hotel_booking where booking_id='$id'";die;
  $selectuser = $this->db->query("SELECT * FROM hotel_booking where booking_id='$id'");
  $fetch=mysqli_fetch_array($selectuser);

  return $fetch;
}

public function GetBookingidfromtranid($id){
// echo "SELECT * FROM hotel_booking where booking_id='$id'";die;
  $selectuser = $this->db->query("SELECT * FROM hotel_booking where hotel_booking_id='$id'");
  $fetch=mysqli_fetch_array($selectuser);

  return $fetch;
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


  $up = "UPDATE users_info SET user_image = '$img_name' where user_id='$user_id'";
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


public function Userreviewcomment($user_id,$booking_id,$user_reviews,$user_rating,$hotel_id)
// public function Userreviewcomment($data)
{
    // $user_id = $data['userid'];
    // $booking_id = $data['bookingid'];
    // $hotel_id = $data['hotelid'];
    // $user_reviews = $data['comment'];
    // $user_rating = $data['rating'];

  $dd=date("Y-m-d H:i:s");

    //echo "INSERT INTO `user_reviews`(`user_id`, `booking_id`, `hotel_id`, `user_reviews`, `user_rating`, `status`, `created_at`) VALUES ('$user_id','$booking_id','$hotel_id','$user_reviews','$user_rating','1','$dd')";die;

  //echo  "INSERT INTO user_reviews SET user_id='$user_id',booking_id='".$booking_id."',hotel_id = '".$hotel_id."',user_reviews='".$user_reviews."',user_rating='".$user_rating."',restatus='1',created_at='".$dd."'";die;

  $selectuser = $this->db->query( "INSERT INTO user_reviews SET user_id='$user_id',booking_id='".$booking_id."',hotel_id = '".$hotel_id."',user_reviews='".$user_reviews."',user_rating='".$user_rating."',restatus='0',created_at='".$dd."'") or die(mysqli_error($this->db));

  return $result;



}  

} 
?>
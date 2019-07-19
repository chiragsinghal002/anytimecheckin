<?php 
include_once'Object.php';

if (isset($_POST['submit1'])) {

  $data['userName']=$_POST['submit1'];

  $data['lastName']=$_POST['lastName'];

  $data['userEmail']=$_POST['userEmail'];

  $data['password']=$_POST['password'];

  $data['checkbox']=$_POST['checkbox'];

//var_dump($data);die;
  
  echo $add=$user->registerbyEmail($data);

}


if (isset($_POST['updateprofile'])) {
  // echo "<pre>";
  // print_r($_POST);die;

  $data['fname']=$_POST['updateprofile'];

  $data['lname']=$_POST['lname'];

  $data['email']=$_POST['email'];

  $data['mob_no']=$_POST['mob_no'];

  $data['user_id']=$_POST['user_id'];

//var_dump($data);die;

  $update=$user->UpdateUserProfile($data);
  if ($update) {
   echo 'data updated successfully';
 }
 else{
  echo 'data not updated';
}



}

if (isset($_POST['changepassword'])) {
  // echo "<pre>";
  // print_r($_POST);die;

  $data['current_password']=$_POST['changepassword'];

  $data['new_password']=$_POST['new_password'];

  $data['confirme_password']=$_POST['confirme_password'];

  
  $data['user_id']=$_POST['user_id'];

  //$userdetail=$user->GetUserbyID($data['user_id']);

  $update=$user->ChangePasswordtest($data);
  
  // if ($userdetail['password']== $data['current_password']) {
  //  $update=$user->ChangePassword($data);
  //  if ($update) {
  //    echo 'data updated successfully';
  //  }
  //  else{
  //   echo 'data not updated';
  //  }
  // }

}


if (isset($_POST['email'])) {
  $data['yourEmail']=$_POST['email'];  


  $add=$user->forgotpasswordbyEmail($data['yourEmail']);
  if ($add) {
    //echo 'Password sent at your email.';
    print "<p style='color:red;font-size:13px''>Password sent at your email.</p>";
    ?>
    <script type="text/javascript">
      setTimeout(function(){
       window.location.reload(1);
     }, 3000);
   </script>
   <?php
 }
 else{
    // echo 'Invalid email.';
  print "<p style='color:red;font-size:13px''>Invalid email</p>";
}

}


if (isset($_POST['mobile'])) {
  $data['yourMobile']=$_POST['mobile'];  


  $add=$user->forgotpasswordbyMobile($data['yourMobile']);
  if ($add) {

    //echo 'Password sent at your email.';
   // print "<p style='color:red;font-size:13px''>Password sent at your mobile no.</p>";
    ?>

    <?php
  }
  else{
   echo 'Invalid mobile.';
   // print "<p style='color:red;font-size:13px''>Invalid mobile no.</p>";
 }

}



if (isset($_POST['submit2'])) {

  $data['userName']=$_POST['submit2'];

  $data['lastName']=$_POST['lastName'];

  $data['mobno']=$_POST['mobno'];

  $data['password']=$_POST['password'];

  //$data['checkbox']=$_POST['checkbox'];

//var_dump($data);die;
  echo $add=$user->registerbyMobile($data);

}



if (isset($_POST['verify'])) {
  $data['one']=$_POST['verify'];

  $data['two']=$_POST['two'];

  $data['three']=$_POST['three'];

  $data['four']=$_POST['four'];

  $data['five']=$_POST['five'];

  $data['six']=$_POST['six'];

  $data['userEmail']=$_POST['userEmail'];

  $data['mobno']=$_POST['mobno'];

 //var_dump($data);die;

  $con = $data['one'].$data['two'].$data['three'].$data['four'].$data['five'].$data['six'];

  if(!empty($data['userEmail'])){

    $verify =$user->checkOTPByEmail($con,$data['userEmail']);

    if($verify=='1') {

      echo '1';

    }

  }else{     

    if(!empty($data['mobno'])){

      $verify =$user->checkOTPByMob($con,$data['mobno']);

      if($verify=='1') {

        echo '1';
      }
    }
  }
}

if(isset($_POST['loginbyemail'])){ 

}

if(isset($_POST['loginbymob'])){

   //var_dump($_POST);

  $mobilelogin=$_POST['mobilelogin'];

  $mobpassword=$_POST['mobpassword'];

  $result=$user->loginbymob($mobilelogin,$mobpassword);

    //var_dump($result);

  if($result['result']=='1'){

    session_start();

    $_SESSION['user_id']=$result['user_id'];

    header('location:index.php');

  }

  if($result['result']=='0'){

    header('location:index.php');

    echo "<script>";

    echo "alert('Password doesnt exist')"; 

    echo "</script>";

  }

    //echo $result;



}


if(isset($_POST['resendcode'])){
  //echo 'chirag';
   //var_dump($_POST);die;

    //echo $code=$_POST['code'];

 $userEmail=$_POST['userEmail'];

 date_default_timezone_set('Asia/Kolkata');

 $currentTime = date("H:i:s");
 $current_timestamp = strtotime($currentTime).'<br>';

 $resultdetail=$user->getuserbyemail($userEmail);
    // echo "<pre>";
    // print_r($resultdetail);
 $time_expire = $resultdetail['time_expire'];
    //  echo $current_timestamp;
    // echo $time_expire;
 if ($current_timestamp <= $time_expire) {

  $result=$user->resendCodetoUser($userEmail);

    //var_dump($result);
  if ($result==1) {
    //echo 'chirag';
   echo 'check your email';
 }else{

   echo 'your time is expire';
 }
}else{
      // echo "<script>";

      //   echo "alert('your time is expire')"; 

      //   echo "</script>";
  return 2;
}



    //var_dump($result);

    // if($result['result']=='1'){

    //     session_start();

    //     $_SESSION['user_id']=$result['user_id'];

    //     header('location:index.php');

    // }

    //echo $result;



}


if(isset($_POST['loginbyemail'])){

   //var_dump($_POST);die;

  $mobilelogin=$_POST['emaillogin'];

  $mobpassword=$_POST['emailpassword'];

  $result=$user->loginbyemail($mobilelogin,$mobpassword);

  if($result['result']=='1'){

    session_start();

    $_SESSION['user_id']=$result['user_id'];

    header('location:index.php');

  }

  if($result['result']=='0'){

    header('location:index.php');

    echo "<script>";

    echo "alert('Password doesnt exist')"; 

    echo "</script>";

  }

    //echo $result;



}

if(isset($_POST['submit4'])){

  // echo "<pre>";
  // print_r($_POST);die;

  $result1=$user->BookingConfirm($_POST);

  if($result1=='1'){

    return 1;

  }

}

if(isset($_POST['submit10'])){

   //var_dump($_POST);die;

 $email=$_POST['submit10'];

 $password=$_POST['password1'];

 $result=$user->loginbyemail($email,$password);
 echo json_encode($result);
 // return $result; 

    // var_dump($result);



}

?>
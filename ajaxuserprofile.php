<?php 
include_once'Object.php';

if (isset($_POST['updateprofile'])) { 

  $data['fname']=$_POST['updateprofile'];

  $data['lname']=$_POST['lname'];

  $data['email']=$_POST['email'];

  $data['mob_no']=$_POST['mob_no'];

  $data['user_id']=$_POST['user_id'];

  // echo "<pre>";
  // print_r($data);die;

//var_dump($data);die;

   $update=$user->UpdateUserProfile($data);
   if ($update) {
     //echo 'data updated successfully';
     print "<p id='mess' style='color:green;font-size:13px;text-align: center;''>data updated successfully</p>";

     ?>
     <script type="text/javascript">
       setTimeout(function() {
    $('#mess').fadeOut('slow');
}, 3000); // <-- time in milliseconds
     </script>

     <?php
   }
   else{
    // echo 'data not updated';
    print "<p id='mess' style='color:red;font-size:13px;text-align: center;''>updation fail</p>";
    ?>
<script type="text/javascript">
       setTimeout(function() {
    $('#mess').fadeOut('slow');
}, 3000); // <-- time in milliseconds
     </script>

    <?php
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

   if($data['new_password'] !=  $data['confirme_password']) {
  	//echo "your new password and confirm password is not match";
     print "<p id='pass' style='color:red;font-size:13px;text-align: center;''>your new password and confirm password is not match</p>";
     ?>
<script type="text/javascript">
       setTimeout(function() {
    $('#pass').fadeOut('slow');
}, 3000); // <-- time in milliseconds
     </script>
     <?php
  }

  elseif($update == 6) {
  	//echo "your current password is wrong";
     print "<p id='pass' style='color:red;font-size:13px;text-align: center;''>your current password is wrong</p>";
     ?>
<script type="text/javascript">
       setTimeout(function() {
    $('#pass').fadeOut('slow');
}, 3000); // <-- time in milliseconds
     </script>
     <?php
  }
 else{
 	//echo "your password change successfully";
  print "<p id='pass' style='color:red;font-size:13px;text-align: center;''>your password change successfully</p>";
  ?>
<script type="text/javascript">
       setTimeout(function() {
    $('#pass').fadeOut('slow');
}, 3000); // <-- time in milliseconds
     </script>
  <?php
 }
  
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

if(isset($_POST['login_booking'])){
   $email=$_POST['email'];
  $password=$_POST['password'];
 echo  $result=$user->loginbyemail($email,$password);

   session_start();
  $_SESSION['user_id']=$result['user_id'];
  $_SESSION['fname']=$result['fname'];
  $_SESSION['lname']=$result['lname'];
  $_SESSION['mob_no']=$result['mob_no'];
  $_SESSION['email']=$result['email'];
}
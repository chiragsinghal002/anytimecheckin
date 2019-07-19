<?php 

include_once'Object.php';

if (isset($_POST['submit1'])) {
  $data['userName']=$_POST['submit1'];
  $data['lastName']=$_POST['lastName'];
  $data['email']=$_POST['email'];
  $data['company_name']=$_POST['company_name'];
  $data['address']=$_POST['address'];
  $data['state_name']=$_POST['state_name'];
  $data['city']=$_POST['city'];
  $data['zip']=$_POST['zip'];
  $data['gst_number']=$_POST['gst_number'];
  $data['mobile']=$_POST['mobile'];
  $data['pass1']=$_POST['pass1'];
  $data['pass2']=$_POST['pass2'];
// echo'<pre>';
// print_r($data);
// die;
  echo $add=$user->registerVendor($data);
}

if (isset($_POST['login'])) {
  
  $data['vendorEmail']=$_POST['login'];
  $data['vendorpassword']=$_POST['vendorpassword'];  

  echo $login=$user->login($data);
   if($result1['result']=='1'){
    //echo 'kanchan';

        session_start();

        $_SESSION['user_id']=$result1['v_id'];


       // print_r($_SESSION);die;

        header('location:index.php');

    }
}
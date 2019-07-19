<?php 
include_once'object.php';
if (isset($_POST['submit1'])) {

  $data['userName']=$_POST['submit1'];
  $data['lastName']=$_POST['lastName'];
  $data['userEmail']=$_POST['userEmail'];
  $data['password']=$_POST['password'];
  $data['checkbox']=$_POST['checkbox'];
//var_dump($data);die;

  echo $add=$user->registerbyEmail($data);
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
if(isset($_POST['submit4'])){
  $result1=$user->BookingConfirm($_POST);
  if($result1=='1'){
    return 1;
  }
}

?>
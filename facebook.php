<?php
include_once'Object.php';
if(isset($_POST['signup'])){
	
$data['userName'] = $_POST['signup'];
$data['lastName'] = $_POST['last_name'];
$data['userEmail'] = $_POST['email'];


 echo $add=$user->loginbyfacebook($data);
 //var_dump($add); die;
 if ($add == 1) {
 	$useremail=$user->UserInfobyEmail($_POST['email']);
 	 session_start();

    $_SESSION['user_id']=$useremail['user_id'];
  echo '1';
 }
else{
	$useremail=$user->UserInfobyEmail($_POST['email']);
 	 session_start();

    $_SESSION['user_id']=$useremail['user_id'];
	echo '0';

}



  
}
?>

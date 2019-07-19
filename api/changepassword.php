<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['ChangePassword']=='ARQP12345'){
	 $data['current_password']=$_REQUEST['current_password'];

  $data['new_password']=$_REQUEST['new_password'];

  $data['confirme_password']=$_REQUEST['confirme_password'];

  
  $data['user_id']=$_REQUEST['user_id'];

  $update=$user->ChangePasswordtest($data);
  
if($data['new_password'] !=  $data['confirme_password']) {
  	$result=array('result'=>'failed','error'=>'your new password and confirm password is not match');
	echo json_encode($result);
    }

    elseif(empty($data['current_password'])) {
	$result=array('result'=>'failed','error'=>'Missing current password');
	echo json_encode($result);
}

elseif(empty($data['new_password'])) {
	$result=array('result'=>'failed','error'=>'Missing new password');
	echo json_encode($result);
}

elseif(empty($data['confirme_password'])) {
	$result=array('result'=>'failed','error'=>'Missing confirm password');
	echo json_encode($result);
}

 elseif(empty($data['user_id'])) {
	$result=array('result'=>'failed','error'=>'Missing User id');
	echo json_encode($result);
}

elseif($update == 6) {
	$result=array('result'=>'failed','error'=>'your current password is wrong');
	echo json_encode($result);

}else{
	$result=array('result'=>'success','ChangePassword'=>'your password change successfully');
	echo json_encode($result);

}

	 

	
}

?>

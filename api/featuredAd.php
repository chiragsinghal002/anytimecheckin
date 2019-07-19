<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
include_once'../Object.php';
if($_REQUEST['featuredAd']=='Ad12345'){
	// $userId=$_REQUEST['userId'];
	$adResult=$ad->featured_ad();
	if($adResult==0){
		$result=array('result'=>'failed','error'=>'Result Not Found');
	}else{
		$result=array('result'=>'success','feature_ad'=>$adResult);
	}
	echo json_encode($result);
}
?>

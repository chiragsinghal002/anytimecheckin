<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['tophotels']=='topHotels12345'){
	// $userId=$_REQUEST['userId'];
	// echo 'chirag';die;
	$hotelsResult=$hotels->GetAllHotels();
	if($hotelsResult==0){
		$result=array('result'=>'failed','error'=>'No Hotel Found');
	}else{
		$result=array('result'=>'success','topHotelsDetails'=>$hotelsResult);
	}
	echo json_encode($result);
}
?>

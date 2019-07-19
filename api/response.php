<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
$time = date('r');
if(isset($_REQUEST['trackid'])){
	$a=array('result'=>'success','server_time'=>$time,'transaction_id'=>$_REQUEST['trackid']);
}else{
	$a=array('result'=>1,'server_time'=>$time);
}
$aa=json_encode($a);
echo "data:{$aa}\n\n";
ob_end_flush();
flush();
?>
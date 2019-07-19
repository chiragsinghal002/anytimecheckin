<?php 
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['paymentPage']=='ARQP12345')
{
	if(isset($_REQUEST['payment'])){
		// echo 'chirag';
		$data['noofroom']=$_REQUEST['no_of_room'];
		$data['no_of_person']=$_REQUEST['no_of_person'];
		$data['check_in_date']=$_REQUEST['check_in_date'];
		$data['check_out_date']=$_REQUEST['check_out_date'];
		$data['check_in_time']=$_REQUEST['check_in_time'];
		$data['check_out_time']=$_REQUEST['check_out_time'];
		$data['actual_price']=$_REQUEST['total_amount'];
		$data['discount_price']=$_REQUEST['discount_amount'];
		$data['childs']=$_REQUEST['no_of_childs'];
		$data['booked_price']=$_REQUEST['booked_price'];
		$data['booking_type']=$_REQUEST['booking_type'];
		$data['paymentId']='PAYPAL12345';
		$data['user_id']=$_REQUEST['user_id'];
		if(!empty($data['user_id'])){
			$getinfo=$user->UserInfobyId($data['user_id']);
			$data['email']=$getinfo['email'];
		}else{
			$data['email']=$_REQUEST['email'];
		}
		$data['hotel_id']=$_REQUEST['hotel_id'];
		$data['room_type_id']=$_REQUEST['hotel_room_type_id'];
		$data['fname']=$_REQUEST['fname'];
		$data['lname']=$_REQUEST['lname'];
		$data['mob_no']=$_REQUEST['mob_no'];
		$data['hotel_booking_id']=$user->random_num(9);
		// var_dump($_REQUEST);die;
		 $result_book=$user->BookingConfirm($data);		 
		 if($result_book=='1'){
		 	$success=array('result'=>'success','transaction_id'=>$data['hotel_booking_id'],'mail_id'=>$data['email']);
		 }else{
		 	$success=array('result'=>'failed');
		 }

		 echo json_encode($success);
	}
}
?>
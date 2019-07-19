<?php 
	include_once'Object.php';
	// echo '1';
	if(isset($_POST['booked_price'])){
		var_dump($_POST);die;
		echo $result_book=$user->BookingConfirm($_POST);
	}
	
?>
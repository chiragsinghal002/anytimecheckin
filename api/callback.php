<?php 
session_start();
include_once'../Object.php';
?>
<?php
if(isset($_POST['PaRes']))
{

    $data=array("service"=>"ECOMAPI_SALE_3DSREQ", "trackid"=>$_SESSION['trackid'], "paRes"=>$_POST['PaRes'], "carddetails"=>$_SESSION['carddetails']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_SESSION['paymentMode']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = array("mobiApiKey:".$_SESSION['apiKey'], "loginId:".$_SESSION['loginID']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec ($ch);

    curl_close ($ch);
    $fresult=json_decode($server_output, true);

    if($fresult['responseMessage']=='SUCCESSFUL')
    { 
        $abc1=$_SESSION['discounted_price'];
        $pricee=($_SESSION['total_price']-$abc1)*10/100;
        $optradio=$_SESSION['optradio'];
        $user_id=$_SESSION['user_id'];
        $resultbooking=$user->random_num(9);
        $_POST['booked_price']=$pricee;
        $_POST['payment_type']=$optradio;
        $_POST['hotel_id']=$_SESSION['hotel_id'];
        $_POST['room_type_id']=$_SESSION['hotel_room_type_id'];
        $_POST['user_id']=$user_id;
        $_POST['paymentId']='PAYPAL12345';
        $_POST['discount_price']=$_SESSION['discounted_price'];
        $_POST['hotel_booking_id']=$resultbooking;
        $_POST['check_in_date']=date('Y-m-d',strtotime($_SESSION['check_in_date']));
        $_POST['check_out_date']=date('Y-m-d',strtotime($_SESSION['check_out_date']));
        $_POST['check_in_time']=date('H:i:s',strtotime($_SESSION['check_in_time']));
        $_POST['check_out_time']=date('H:i:s',strtotime($_SESSION['check_out_time']));
        $_POST['noofroom']=$_SESSION['noofroom'];
        $_POST['no_of_person']=$_SESSION['no_of_person'];
        $_POST['actual_price']=$_SESSION['total_price'];
            // var hotel_booking_id=$("#hotel_booking_id").val();
        $_POST['booking_type']= $optradio;
        $_POST['childs']=$_SESSION['childs'];
        $_POST['fname']=$_SESSION['fname'];
        $_POST['lname']=$_SESSION['lname'];
        $_POST['email']=$_SESSION['email'];
        $_POST['mob_no']=$_SESSION['mob_no'];
        $result_book=$user->BookingConfirm($_POST);
        $data=array('result'=>'success');
      
    }
    else 
    {
        // echo $fresult['responseDescription'];
         $data=array('result'=>$fresult['responseDescription']);
    }
    echo json_encode($data);
}

?>



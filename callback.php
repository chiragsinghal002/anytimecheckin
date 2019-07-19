<?php 
session_start();
include_once'Object.php';
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
        if($result_book=='1'){
            header('Location:booking-confirmation.php');
        }else{
            echo 'Payment Failed';
        }
    }
    else 
    {
        echo $fresult['responseDescription'];
    }
}

?>

<div class="col-sm-2 col-md-2">
    <input type="hidden" name="fname" id="fname" class="form-control fd" value="<?php echo $_SESSION['fname'];?>" >
    <input type="hidden" name="lname" id="lname" class="form-control fd" value="<?php echo $_SESSION['lname'];?>">
    <input type="hidden" name="email" id="email" class="form-control fd" value="<?php echo $_SESSION['email'];?>" >

    <input type="hidden" name="mob_no" id="mob_no" class="form-control fd" value="<?php echo $_SESSION['mob_no'];?>" >
    <input type="hidden" name="country" id="country" class="form-control fd" >
    <input type="hidden" name="checkbox" class="form-control fd" >
    <input type="hidden" name="amt"  id="price" value="<?php echo $pricee;?>">
    <input type="hidden"  name="hotel_id" id="hotel_id" value="<?php echo $_SESSION['hotel_id'];?>">
    <input type="hidden" name="room_type_id" id="room_type_id" value="<?php echo $_SESSION['room_type_id'];?>">
    <input type="hidden" name="booking_type" id="booking_type" value="<?php echo $optradio;?>">
    <input type="hidden"  name="user_id" id="user_id" value="<?php echo $user_id;?>">
    <input type="hidden" name="paymentId" id="paymentId" value="Mobiversa">
    <input type="hidden" name="actual_price" id="actual_price" value="<?php echo $_SESSION['total_price'];?>">
    <input type="hidden" name="discount_price" id="discount_price" value="<?php echo $_SESSION['discounted_price'];?>">
    <input type="hidden" name="hotel_booking_id" id="hotel_booking_id" value="<?php echo $resultbooking;?>">
    <input type="hidden" id="check_in_date" value="<?php echo date('Y-m-d',strtotime($_SESSION['check_in_date']));?>">
    <input type="hidden" id="check_out_date" value="<?php echo date('Y-m-d',strtotime($_SESSION['check_out_date']));?>">
    <input type="hidden" id="check_in_time" value="<?php echo date('H:i:s',strtotime($_SESSION['check_in_time']));?>">
    <input type="hidden" id="check_out_time" value="<?php echo date('H:i:s',strtotime($_SESSION['check_out_time']));?>">
    <input type="hidden" id="noofroom" value="<?php echo $_SESSION['noofroom'];?>">
    <input type="hidden" id="no_of_person" value="<?php echo $_SESSION['no_of_person'];?>">
    <input type="hidden" id="childs" value="<?php echo $_SESSION['childs'];?>">
    <input type="hidden" id="hotel_room_type_id" value="<?php echo $_SESSION['hotel_room_type_id'];?>">


    <!--  <button type="submit" name="paynow" class="btn btn-default yu" id="paynow">Book & Pay Now</button> -->
            <!-- <div class="pay-buton">
              <div id="paypal-button-container"></div>
          </div> -->

      </div>

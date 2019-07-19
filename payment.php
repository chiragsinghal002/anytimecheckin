<?php
session_start();
include_once'Object.php';
?>
<script type="text/javascript">
	function payment() {
            // window.alert('Payment Complete!');

            var booked_price=$("#price").val();
            var payment_type=$('#payment_type').val();
            var hotel_id=$('#hotel_id').val();
            var room_type_id=$('#hotel_room_type_id').val();
            var user_id=$('#user_id').val();
            var paymentId=$("#paymentId").val();
            var discount_price=$("#discount_price").val();
            var hotel_booking_id=$("#hotel_booking_id").val();
            var check_in_date=$("#check_in_date").val();
            var check_out_date=$("#check_out_date").val();
            var check_in_time=$("#check_in_time").val();
            var check_out_time=$("#check_out_time").val()
            var noofroom=$("#noofroom").val();
            var no_of_person=$("#no_of_person").val();
            var actual_price=$("#actual_price").val();
            // var hotel_booking_id=$("#hotel_booking_id").val();
            var booking_type=$("#booking_type").val();
            var childs=$("#childs").val();
            var fname=$("#fname").val();
            var lname=$("#lname").val();
            var email=$("#email").val();
            var mob_no=$("#mob_no").val();
            
            $.ajax({
            	url:'paypal-ajax.php',
            	type:'POST',
            	data:{'booked_price':booked_price,payment_type:payment_type,hotel_id:hotel_id,room_type_id:room_type_id,user_id:user_id,paymentId:paymentId,discount_price:discount_price,booking_type:booking_type,hotel_booking_id:hotel_booking_id,check_in_date:check_in_date,check_out_date:check_out_date,childs:childs,check_in_time:check_in_time,check_out_time:check_out_time,discount_price:discount_price,noofroom:noofroom,no_of_person:no_of_person,actual_price:actual_price,fname:fname,lname:lname,email:email,mob_no:mob_no},
            	success:function(data){
                //alert(data);
                console.log(data);
                if(data=='1'){
                	window.location.href='booking-confirmation.php';
                }
                if(data=='0'){
                	window.location.href='booking-confirmation.php';
                }
            }
        });
        }
    </script>

    <?php
    if(isset($_POST['submit']))
    {
    	// var_dump($_POST);die;
    	$_SESSION['apiKey'] = 'b07ad9f31df158edb188a41f725899bc';
    	$_SESSION['loginID'] = 'Mobiversa';
    	$_SESSION['paymentMode'] = 'https://demo.mobiversa.com/payment/myapiservice/jsonservice';	

    	$pass = $_POST['cardnum'].'#'.$_POST['ccv'].'#'.substr($_POST['exp_yy'], -2).$_POST['exp_mm'];

    	$encrypted = base64_encode(openssl_encrypt($pass, 'aes-128-cbc', substr($_SESSION['apiKey'], 0, 16), OPENSSL_RAW_DATA, substr($_SESSION['apiKey'], -16)));

    	$data=array("service"=>"ECOMAPI_SALE_REQ", "orderId"=>$_POST['ordrid'], "amount"=>$_POST['amount'], "email"=>$_POST['emailid'], "carddetails"=>strtoupper(implode(unpack("H*", $encrypted))));
    	$_SESSION['carddetails']=strtoupper(implode(unpack("H*", $encrypted)));

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

    	if(isset($fresult['responseData']['paReq']))
    	{
    		if($fresult['responseData']['paReq']!='')
    		{
    			echo '<form name="Payer" id="Payer" action="'.$fresult['responseData']['url'].'" method="post">
    			<input type="hidden" name="PaReq" value="'.$fresult['responseData']['paReq'].'"/>
    			<input type="hidden" name="TermUrl" id="TermUrl" value="https://anytimecheckin.com/new/callback.php"/>
    			<input type="hidden" name="MD" value="'.$fresult['responseData']['trackid'].'"/>
    			</form>
    			<script>document.getElementById("Payer").submit();</script>
    			';
    			$_SESSION['trackid']=$fresult['responseData']['trackid'];
    			echo '<script type="text/javascript">',
    			'payment();',
    			'</script>';
    		}
    	}
    	else if(isset($fresult['responseCode']))
    	{
    		if($fresult['responseCode']=='0001')
    		{
    			echo $fresult['responseDescription'];
    		}
    	}	
    }
    ?>
    <?php 
    $abc1=$_SESSION['discounted_price'];
    $pricee=($_SESSION['total_price']-$abc1)*10/100;
    $optradio=$_SESSION['optradio'];
    $user_id=$_SESSION['user_id'];
    $resultbooking=$user->random_num(9);
    ?>
    <!--  <form method="post" action=""> -->

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
      <!--  </form> -->

      <form action="" method="post">
      	Card Number:<br>
      	<input type="text" name="cardnum" value="4918914107195005"><br><br>
      	Ccv:<br>
      	<input type="text" name="ccv" value="123"><br><br>	
      	ExpDate:<br>
      	<input type="text" name="exp_mm" placeholder="MM" value="07" style="width:25px;"> <input style="width:40px;" type="text" name="exp_yy" placeholder="YYYY" value="2019"><br><br>	
      	Email Address:<br>
      	<input type="text" name="emailid" value="<?php if(!empty($_SESSION['email'])){echo $_SESSION['email'];}else{};?>"><br><br>
      	Amount:<br>
  	<input type="text" name="amount" value="<?php echo round($pricee);?>" readonly><!-- <br><br>
  	Order ID:<br> -->
  	<input type="hidden" name="ordrid" value="<?php echo $resultbooking;?>"><br><br>
  	<input type="submit" name="submit" value="Submit">
  </form>

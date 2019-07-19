<?php 
session_start();
   //var_dump($_REQUEST); die;
header('Cache-Control: no-cache, must-revalidate, max-age=0');
include_once'../Object.php';
if(isset($_REQUEST['user_id'])){
	$user_id=$_REQUEST['user_id'];
	$userresult=$user->UserInfobyId($user_id);
	$optradio=$_REQUEST['optradio'];
	$check_in_date=$_REQUEST['check_in_date'];
	$check_out_date=$_REQUEST['check_out_date'];
	$check_in_time=$_REQUEST['check_in_time'];
	$check_out_time=$_REQUEST['check_out_time'];
	$hotel_id=$_REQUEST['hotel_id'];
	$room_type_id=$_REQUEST['hotel_room_type_id'];
	$discount_for=$_REQUEST['discount_for'];
	$discount_price=$_REQUEST['discount_price'];
	$discount_percent=$_REQUEST['discount_percent'];
	$discounted_price=$_REQUEST['discounted_price'];
	$min_hour=$_REQUEST['min_hour'];
	$min_day=$_REQUEST['min_day'];
	$max_day=$_REQUEST['max_day'];
	$days=$_REQUEST['days'];
	$childs=$_REQUEST['childs'];
}else{
	$optradio=$_REQUEST['optradio'];
	$check_in_date=$_REQUEST['check_in_date'];
	$check_out_date=$_REQUEST['check_out_date'];
	$check_in_time=$_REQUEST['check_in_time'];
	$check_out_time=$_REQUEST['check_out_time'];
	$hotel_id=$_REQUEST['hotel_id'];
	$room_type_id=$_REQUEST['hotel_room_type_id'];
	$discount_for=$_REQUEST['discount_for'];
	$discount_price=$_REQUEST['discount_price'];
	$discount_percent=$_REQUEST['discount_percent'];
	$discounted_price=$_REQUEST['discounted_price'];
	$min_day=$_REQUEST['min_day'];
	$max_day=$_REQUEST['max_day'];
	$days=$_REQUEST['days'];
	$min_hour=$_REQUEST['min_hour'];
	$childs=$_REQUEST['childs'];
}
  // echo date('H:i:s',strtotime($_REQUEST['check_in_time']));

?>

<!doctype html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!--<![endif]-->

	<!-- meta -->

	<meta charset="UTF-8">

	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

	<title>Anytime Check In</title>



	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
  <?php
  if(isset($_POST['submit']))
  {
    	// var_dump($_POST);die;
  	$_REQUEST['apiKey'] = 'b07ad9f31df158edb188a41f725899bc';
  	$_REQUEST['loginID'] = 'Mobiversa';
  	$_REQUEST['paymentMode'] = 'https://demo.mobiversa.com/payment/myapiservice/jsonservice';	

  	$pass = $_POST['cardnum'].'#'.$_POST['ccv'].'#'.substr($_POST['exp_yy'], -2).$_POST['exp_mm'];

  	$encrypted = base64_encode(openssl_encrypt($pass, 'aes-128-cbc', substr($_REQUEST['apiKey'], 0, 16), OPENSSL_RAW_DATA, substr($_REQUEST['apiKey'], -16)));

  	$data=array("service"=>"ECOMAPI_SALE_REQ", "orderId"=>$_POST['ordrid'], "amount"=>$_POST['amount'], "email"=>$_POST['emailid'], "carddetails"=>strtoupper(implode(unpack("H*", $encrypted))));
  	$_REQUEST['carddetails']=strtoupper(implode(unpack("H*", $encrypted)));

  	$ch = curl_init();

  	curl_setopt($ch, CURLOPT_URL, $_REQUEST['paymentMode']);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  	$headers = array("mobiApiKey:".$_REQUEST['apiKey'], "loginId:".$_REQUEST['loginID']);
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
  			$_REQUEST['trackid']=$fresult['responseData']['trackid'];
        if(!empty($_REQUEST['trackid'])){
          header("Location:response.php?trackid=".$_REQUEST['trackid']."");
        }
  			// echo '<script type="text/javascript">',
  			// 'payment();',
  			// '</script>';
  		}
  	}
  	else if(isset($fresult['responseCode']))
  	{
  		if($fresult['responseCode']=='0001')
  		{
  			$payment_response=$fresult['responseDescription'];
  		}
  	}	
  }
  ?>
  <body>
  	<!-- header -->
  	<div class="new-header">

  		<div class="container">

  			<div class="row">

  				<div class="col-sm-3 col-md-3">

  					<div class="new-logo">

  						<a href="index.php"><img src="image/logo1.png"></a>

  					</div>

  				</div>

  				<div class="col-sm-9 col-md-9 range-details">

  					<div class="coustmer-area" align="center">

  						<ul>

  							<li><span>1</span><br><p>Customer Information</p></li>

  							<li class="active"><span>2</span><br><p>Payment Information</p></li>

  							<li><span>3</span><br><p>Booking is confirmed</p></li>

  						</ul>

  					</div>

  				</div>

  			</div>

  		</div>

  	</div>





  	<!-- /header -->          





  	<!-- /night-area -->



  	<div class="night-area">

  		<div class="container">

  			<div class="row">

  				<div class="col-sm-6 col-md-6 ">

  					<div class="night-content">

  						<div class="row agust">

  							<div class="col-smm-8 col-md-8">
  								<?php
  								if(!empty($check_in_date && $check_out_date)){
  									$date1 = date_create($check_in_date);
  									$date2 = date_create($check_out_date);
//difference between two dates
  									$diff = date_diff($date1,$date2);
//count days
  									$days=$diff->format("%a");
  									$_REQUEST['days']=$days;
  								}else if(!empty($check_in_time && $check_out_time)){
  									$checkInTime=strtotime($check_in_time);
  									$checkOutTime=strtotime($check_out_time);
  									$datediff = $checkOutTime - $checkInTime;
  									$hour=($datediff / 3600 );
                  // $_REQUEST
  								}else{

  								}

  								?>

  								<div class="agust">


  									<h2><?php  if(!empty($datediff)){echo $date=date('d M y',strtotime($check_in_date));}else{echo date('d M y',strtotime($check_in_date));?> - <?php echo date('d M y',strtotime($check_out_date));}?></h2>
  									<?php 
  									if(!empty($check_in_time && $check_out_time)){ ?>
  										<?php if($check_in_time!==$check_out_time){?>
  											<p class="gf"><?php echo $check_in_time.'-'.$check_out_time;?></p>
  										<?php }?>

  									<? }
  									?>

  								</div>

  							</div>

  							<div class="col-sm-4 col-md-4">

  								<div class="agust-content">

  									<p><?php echo $_REQUEST['hotel_room_type'];?><br>Room</p>

  								</div>

  							</div>

  						</div>

  						<div class="super-area paypal">

  							<ul>


  								<?php if($optradio==2){?>
  									<?php if(!empty($_REQUEST['hour'])){ ?>
  										<li><p><img src="image/list-2.png"><?php echo $_REQUEST['hour'];?> Hour </p></li>
  									<?php } ?>
  								<?php }else{?>
  									<li><p><img src="image/list-2.png"><?php echo $_REQUEST['days'];?> Night </p></li>
  								<?php } ?>
             <!--  <?php if(!empty($_REQUEST['hour'])){ ?>
               <li><p><img src="image/list-2.png"><?php echo $_REQUEST['hour'];?> Hour </p></li>
             <?php }else{ ?>
               <li><p><img src="image/list-2.png"><?php echo $_REQUEST['days'];?> Night </p></li>
               <?php }?> -->

               <li><p><img src="image/list-2.png"><?php echo $_REQUEST['noofroom'];?>Room </p></li>

               <li><p><img src="image/list-3.png"><?php echo $_REQUEST['no_of_person'];?> Adult 
               	<!-- (Max <?php echo $result['adult_person_capacity'];?> Adults) -->
               </p></li>

               <li><p><img src="image/list-3.png"><?php echo $childs;?> child
               	<!-- s(Max <?php echo $result['child_capacity'];?> Children)  -->

               </p></li>                

               <!--  <li><p><img src="image/list-3.png">Max <?php echo $result['adult_person_capacity'];?> adults, <?php echo $result['child_capacity'];?> children 
                (0-6 years)
            </p></li> -->

               <!--  <li><p><img src="image/list-4.png">28 sq.m.</p></li>

               	<li><p><img src="image/list-5.png">Breakfast included</p></li> -->

               </ul>

           </div>

       </div>
       <div class="night-content">



       	<div class="super-area paypal">

       		<ul>

       			<!--  <li><p><img src="image/list-1.png"><?php echo $result1['hotel_room_type'];?></p></li> -->

       			<!--  <li><p><img src="image/list-1.png">1 x Superior room</p></li> -->

       			<!-- <li><p><img src="image/list-2.png"><?php echo $_POST['noofroom'];?> room,<?php echo $_POST['no_of_person'];?> adults</p></li> -->

       			<li><p><img src="image/list-2.png"><?php echo $_REQUEST['fname'];?></p></li>

       			<li><p><img src="image/list-2.png"><?php echo $_REQUEST['lname'];?></p></li>

       			<li><p><img src="image/list-3.png"><?php echo $_REQUEST['mob_no'];?></p></li>

       			<li><p><img src="image/list-3.png"><?php echo $_REQUEST['email'];?>

       		</p></li>                

               <!--  <li><p><img src="image/list-3.png">Max <?php echo $result['adult_person_capacity'];?> adults, <?php echo $result['child_capacity'];?> children 
                (0-6 years)
            </p></li> -->

               <!--  <li><p><img src="image/list-4.png">28 sq.m.</p></li>

               	<li><p><img src="image/list-5.png">Breakfast included</p></li> -->

               </ul>

           </div>

       </div>

   </div>


   <div class="col-sm-6 col-md-6">

   	<div class="park-area">

   		<div class="row">

   			<div class="col-sm-8 col-md-8">

   				<div class="park-content">


   					<h2><?php 

   					echo $_REQUEST['hotel_name'];

                  //echo $result['hotel_name'];?></h2>

                  <?php 
                  $rating=$reviews->AvarageRating($_REQUEST['hotel_id']);
                  $rate = round($rating['AVG(user_rating)']);
            //$star = $result_hotel['hotel_star_category'];

                  for ($i=1; $i <= $rate ; $i++) { 

                  	?>

                  	<span class="fa fa-star checked star-detail"></span>

                  	<?php

                  }



                  ?>

                  <!-- <img src="image/park-star.png"> -->

              </div>

          </div>


          <div class="col-sm-4 col-md-4">
          	<?php  if(!empty($discount_for)){ ?>

          		<div class="agust-content cd">


          			<?php 
          			if($optradio=='1'){
                    // echo 'chirag1';
          				if(!empty($discount_for=='2')){
          					if($min_day<=$days){

          						if($days<=$max_day){
          							if(!empty($discount_price)){
          								echo $discount_price.' '.'RM Off On';
          							}else{
          								echo $discount_percent.'%'.' '.'Off On';
          							}
          							echo  "<span>".'Discount'."<span>";
          						}
          					}

          				}
          			}else{
                // echo 'chirag1';
                // echo $min_hour;
          				$hour=$_REQUEST['hour'];
          				$max_hour=$_REQUEST['max_hour'];
          				if($min_hour!=='0.00'){
                  // echo $min_hour;
                  // echo $hour;
          					if($min_hour<=$hour){
                       // echo $hour;
          						if($hour<=$max_hour){
                      // echo $max_hour;
          							if(!empty($discount_price)){
          								echo $discount_price.' '.'RM Off On';
          							}else{
          								echo $discount_percent.'%'.' '.'Off On';
          							}
          							echo  "<span>".'Discount'."<span>";
          						}

          					}
          				}


          			}
          			?>

          		</div>
          	<?php } ?>

          </div>

      </div>

      <div class="plot">

      	<h2><?php echo $_REQUEST['hotel_address'];?></h2>

      </div>



  </div>

  <div class="row ba">



  	<div class="col-sm-8 col-md-8 booking-left">

  		<div class="include-area">

  			<ul>

  				<li>Original price (<?php echo $_POST['noofroom'];?> Room <?php if(!empty($hour)){echo $hour.' '.'Hour';}else{echo $days.' '.'Night';}?>)</li>

  				<li>Discount Price (<?php echo $_POST['noofroom'];?> Room <?php if(!empty($hour)){echo $hour.' '.'Hour';}else{echo $days.' '.'Night';}?>)</li>

  				<li>Book Fees</li>

  			</ul>

  			<div class="new-ul">

  				<ul>

  					<li><h2>Price</h2></li>

  					<!-- <li><p>Include in price : GST18%</p></li> -->

  				</ul>

  			</div>

  		</div>

  	</div>

  	<div class="col-sm-4 col-md-4 right-mobile">

  		<div class="include-content">

  			<ul>

  				<li>RM<?php echo number_format($_REQUEST['total_price']);?></li>



  				<li>RM 
  					<?php
  					echo $abc1=$_REQUEST['discounted_price'];
  					?>
  				</li>



  				<li class="free">
  					<?php $pricee=($_REQUEST['total_price']-$abc1)*10/100;?>
  					RM  <?php echo number_format($pricee);?>
  				</li>

  			</ul>

  			<div class="new-two" align="right">

  				<ul>

  					<li><h2>RM<?php echo number_format($_REQUEST['total_price']-$abc1);?></h2></li>

  				</ul>

  			</div>

  		</div>

  	</div>

  </div>



</div>

</div>

</div>

</div>

  <div class="but-area">

  	<div class="container">

  		<div class="row">

         <!--  <div class="but-content" align="right">

            <input type="button" class="btn btn-default ld" value="Continue" id="submit" style=" background:black;color:#fff;width:12%;margin-left:auto;display: block;">

        </div> -->

    </div>



</div>

</div>

</div>





<!-- secure-area  -->

<div id="paypal">

	<div class="secure-area">

		<div class="container">

			<div class="row re">

				<div class="col-sm-3 col-md-3">

					<div class="secure-pic">

						<img src="image/secure.png">

					</div>

				</div>

				<div class="col-sm-9 col-md-9">

					<div class="secure-content">

						<p>All card information is fully encrypted, secure, and protected</p>

					</div>

				</div>

			</div>

		</div>

	</div>





	<!-- mat-area -->     



	<div class="mat-area">

		<div class="container hs">

			<div class="row">

				<div class="col-sm-6 col-md-6">

					<div class="mat-content">
						<?php 
						if(!empty($payment_response)){ ?>
							<div class="alert alert-warning alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<?php echo '<strong>'.'Warning!'.'</strong>'.' '.$payment_response;?>
							</div>
						<?php }?>
						

						<h2 style="text-align: center;font-size: 21px;padding-bottom: 15px;">Payment Method :</h2>

						<form action="" method="post">
							<div class="form-group col-sm-6">
								<label for="email">Card Number:</label>
								<input type="text" name="cardnum" class="form-control" value="4918914107195005">
							</div>
							<div class="form-group col-sm-6">
								<label for="email">Ccv:</label>
								<input type="text" class="form-control"  name="ccv" value="123">
							</div>
							<div class="form-group col-sm-6">


								<label for="email" style="display: block;">ExpDate:</label>
								<input type="text" class="form-control date" name="exp_mm" placeholder="MM" value="07" style="width: 20%;">
								<input class="form-control date" type="text" name="exp_yy" placeholder="YYYY" value="2019" style=" width: 70%;">
							</div>
							<div class="form-group col-sm-6">
								<!-- <label for="email">Email Address:</label> -->
								<input  class="form-control"  type="hidden" readonly name="emailid" value="<?php if(!empty($_REQUEST['email'])){echo $_REQUEST['email'];}else{};?>">
							</div>
							<div class="form-group col-sm-6">
								<!-- <label for="email">Amount:</label> -->
								<input type="hidden" class="form-control" name="amount" value="<?php echo round($pricee);?>" readonly>
							</div>
	<!-- <br><br>
	
		Order ID:<br> -->
		<input type="hidden" name="ordrid" value="<?php echo $resultbooking;?>"><br><br>
		<div class="form-group col-sm-12 text-button text-center">
			<input type="submit" name="submit" value="Submit">
		</div>
	</form>
</div>

</div>

<div class="col-sm-6 col-sm-6">

	<div class="mat-text">

		<?php 

		$pricee=($_REQUEST['total_price']-$abc1)*10/100;

		?>

		<h1>RM<?php echo number_format($pricee);?></h1>

		<p>10% off total amount</p>

           <!--  <input type="hidden" id="price" value="<?php echo $pricee;?>">

            <input type="hidden" id="hotel_id" value="<?php echo $_POST['hotel_id'];?>">

            <input type="hidden" id="hotel_room_type_id" value="<?php echo $_POST['hotel_room_type_id'];?>">
            <input type="hidden" id="user_id" value="<?php echo $user_id;?>">
            <input type="hidden" id="no_of_person" value="<?php echo $_POST['no_of_person'];?>"> -->

        </div>

    </div>



</div>

<div class="row">

	<div class="check-text ">

		<!-- <label class="checkbox-inline"><input type="checkbox" value="">Let me know about exclusive Anytime check in promotions and last minute deals</label> -->

		<p class="jh">By procceeding you agree to Anytime Check In <a href="terms_of_use.php">Terms & Use</a> and <a href="privacy_policy.php">Privacy Policy</a></p>

	</div>

</div>



</div>

</div>       



<!-- /pay-area --> 



<div class="pay-total">

	<div class="container">

		<div class="row">

			<!-- <div class="col-sm-10 col-md-10">

				<div class="pay-total-text" align="right">

					<p>Pay 10% off total amount with <a href="#">Paypal</a></p>

				</div>

			</div> -->
			<?php 
			$resultbooking=$user->random_num(9);
         // echo $resultbooking;
			?>




			<form method="post" action="" id="booking">

				<div class="col-sm-2 col-md-2">
					<input type="hidden" name="fname" id="fname" class="form-control fd" value="<?php echo $_REQUEST['fname'];?>" >
					<input type="hidden" name="lname" id="lname" class="form-control fd" value="<?php echo $_REQUEST['lname'];?>">
					<input type="hidden" name="email" id="email" class="form-control fd" value="<?php echo $_REQUEST['email'];?>" >

					<input type="hidden" name="mob_no" id="mob_no" class="form-control fd" value="<?php echo $_REQUEST['mob_no'];?>" >
					<input type="hidden" name="country" id="country" class="form-control fd" >
					<input type="hidden" name="checkbox" class="form-control fd" >
					<input type="hidden" name="amt"  id="price" value="<?php echo $pricee;?>">
					<input type="hidden"  name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'];?>">
					<input type="hidden" name="room_type_id" id="room_type_id" value="<?php echo $_REQUEST['room_type_id'];?>">
					<input type="hidden" name="booking_type" id="booking_type" value="<?php echo $optradio;?>">
					<input type="hidden"  name="user_id" id="user_id" value="<?php echo $user_id;?>">
					<input type="hidden" name="paymentId" id="paymentId" value="PAYPAL12345">
					<input type="hidden" name="actual_price" id="actual_price" value="<?php echo $_REQUEST['total_price'];?>">
					<input type="hidden" name="discount_price" id="discount_price" value="<?php echo $_REQUEST['discounted_price'];?>">
					<input type="hidden" name="hotel_booking_id" id="hotel_booking_id" value="<?php echo $resultbooking;?>">
					<input type="hidden" id="check_in_date" value="<?php echo date('Y-m-d',strtotime($_REQUEST['check_in_date']));?>">
					<input type="hidden" id="check_out_date" value="<?php echo date('Y-m-d',strtotime($_REQUEST['check_out_date']));?>">
					<input type="hidden" id="check_in_time" value="<?php echo date('H:i:s',strtotime($_REQUEST['check_in_time']));?>">
					<input type="hidden" id="check_out_time" value="<?php echo date('H:i:s',strtotime($_REQUEST['check_out_time']));?>">
					<input type="hidden" id="noofroom" value="<?php echo $_REQUEST['noofroom'];?>">
					<input type="hidden" id="no_of_person" value="<?php echo $_REQUEST['no_of_person'];?>">
					<input type="hidden" id="childs" value="<?php echo $_REQUEST['childs'];?>">
					<input type="hidden" id="hotel_room_type_id" value="<?php echo $_REQUEST['hotel_room_type_id'];?>">


					<!--  <button type="submit" name="paynow" class="btn btn-default yu" id="paynow">Book & Pay Now</button> -->
            <!-- <div class="pay-buton">
              <div id="paypal-button-container"></div>
          </div> -->

      </div>
  </form>
  <!-- <a href="payment.php"><button>Pay & Book Now</button></a> -->

</div>

</div>

</div>



</div>

<!-- manila-area -->



<script type="text/javascript">

	$(function(){

		$("#submit").click(function(){

			var fname=$("#fname").val();

			var lname=$("#lname").val();

			var email=$("#email").val();

			var mobno=$("#mobno").val();

			var country=$("#country").val();

			var checkbox=$("#checkbox").val();

			$("#formka").hide();

			$("#paypal").show();



		})



		$("#paynow").click(function(){

			var fname=$("#fname").val();

			var lname=$("#lname").val();

			var email=$("#email").val();

			var mobno=$("#mobno").val();

			var country=$("#country").val();

			var checkbox=$("#checkbox").val();

			var hotel_id=$("#hotel_id").val();

			var room_type_id=$("#hotel_room_type_id").val();

			var amt=$("#amt").val();

			var paymentId='PAYPAL12345';

			var no_of_person=$("#no_of_person").val();
			var user_id=$('#user_id').val();

			$.ajax({

				url:'adduser1.php',

				type:'post',

				data:{'submit4':fname,lname:lname,email:email,mobno:mobno,country:country,checkbox:checkbox,amt:amt,paymentId:paymentId,room_type_id:room_type_id,hotel_id:hotel_id,no_of_person:no_of_person,user_id:user_id},

				success:function(data){

					console.log(data);

					if(data==1)
					{

						window.location.href='booking-confirmation.php';

					}

				}

			})

		})

	})

</script>
<!-- footer-area -->
<?php 
include_once('footer.php');
?>
<!-- /footer-area -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">jssor_1_slider_init();</script>
<script type="text/javascript">
	$(function(){
		$("#submit1").click(function(){
      // alert('chirag');
      var email1=$("#email1").val();
      var password1=$("#password1").val();
      $.ajax({

      	url:'adduser.php',

      	type:'post',
      	dataType: 'json',

      	data:{'submit10':email1,password1:password1},

      	success:function(data){
          // alert(data);
          console.log(data);

          $("#fname").val('kanchan');

          $("#lname").val('bhaskar');
          $("#email").val('kanchan.netmaximus@gmail.com');

          $("#mobno").val();

          $("#country").val('INDIA');


      }

  })
  })
	})
</script>
<style>
.paypal ul li {
	font-size: 15px;
	padding: 0px 0px 10px 0px;
	width: 50%;
	float: left;
}
.super-area {
	margin-top: 0px;
	display: flex;
	justify-content: center;
	margin-bottom: -30px;
}
.night-content {

	height: unset !Important; 

}
.night-content {
	background: rgb(255, 255, 255, .4);
	padding: 13px;
	margin-top: 20px;
	margin-bottom: 20px;
	min-height: 102px;
	max-height: 170px;
	box-shadow: 0px 1px 13px #7d7d7d;
	/* opacity: .5; */
}
.date {
	display: inline;
}
.text-center input {
	background: #474747;
	color: #fff;
	padding: 5px 26px;
}
</style
</body>
</html>
<!-- Modal -->
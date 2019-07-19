<?php 
include_once'Object.php';

session_start();

if(isset($_SESSION['user_id']))
{
	$user_id=$_SESSION['user_id'];

	$result=$user->UserInfobyId($user_id);

	$email = $result['email'];

}

if(isset($_GET['can']))
{
	$cancel =  $_GET['can'];

	$resultbooking=$user->GetBookingConfirmbyId($cancel);
	
	$hid = $resultbooking['hotel_id'];


	$rhoteldetail=$user->Hoteldetailbyid($hid); 
	// echo "<pre>";
	// print_r($resultbooking);die;
	if (!empty($resultbooking['check_in_time'] && $resultbooking['check_out_time']))  {

		$intime = "(".$resultbooking['check_in_time'].")";
		$outtime = "(".$resultbooking['check_out_time'].")";
	}


	$hvid = $rhoteldetail['hotel_vendor_id'];
	$hotelvendordetail=$user->GetVendorDetailbyId($hvid);
	$vemail =$hotelvendordetail['v_email'];  

	if ($hid) {

		$resultcancel=$user->bookingCancelled($cancel);
		if ($resultcancel) {

			$to = $email;
			$subject = "Anytime Check Cancel Booking";

			$message = "
			<!DOCTYPE html>
			<html lang='en'>

			<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
			<title> Email Newcustomer</title>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<meta name='description' content=''>
			<meta name='keywords' content=''>
			<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

			<link href='https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway' rel='stylesheet'>
			<link rel='stylesheet' href='css/bootstrap.min.css'>  
			<link rel='stylesheet' href='css/style.css'>
			<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet'>
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
			</head>

			<body id='top' data-spy='scroll'>

			<table style='font:inherit;/* border-width:3px 1px 1px; *//* border-style:solid; *//* border-color:#3eb3f0; *//* border-top-left-radius:3px; *//* border-top-right-radius:3px; */width:100%;max-width:600px;margin:0px auto;'>
			<tbody>
			<tr>
			<td style='text-align: center;'>
			<a href='#'>
			<img src='http://anytimecheckin.com/new/image/logo.png' style='max-width:100%;height:auto' alt='' class='CToWUd'>
			</a>
			</td>
			</tr>  
			</tbody>
			</table>
			<table style='font:inherit;width:100%;max-width: 100%;margin: -31px auto 0px 0px;'>
			<tbody>
			<tr>
			<td>
			<img src='http://anytimecheckin.com/new/image/top-border.jpg' style='width:100%;height:auto' alt='' class='CToWUd'>
			</td>
			</tr>
			</tbody>
			</table>
			<table style='border:0;margin:0;padding:0;font:inherit;border-top:0;background-color:#fff;padding:20px 0px 0px;width:100%;max-width:600px;margin:0 auto;'>
			<tbody>

			<td>
			<p style='border:0px none;margin:0px 0px 0px;padding:0px;font-style:inherit;font-weight: 600;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size: 32px;line-height:25px;color: #294e8d;text-align: center;'>
			Anytime Check In Cancel Booking</p><br>
			</p>

			</td>
			</tr>

			</tbody>
			</table>
			<table style='border:0;margin:0;padding:0;font:inherit;border-top:0;background-color:#fff;padding:0px 18px;width:100%;max-width:1070px;margin:0 auto;'>
			<tbody>
			<tr>
			<td>
			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>Dear User,</p>
			</td>
			</tr>

			<tr>
			<td>
			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>
			Anytime Check In Cancel Booking</p>

			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;    width: 67%;'>
			<b> Your Booking cancel successfully</b></p>
			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;width: 85%;'>
			<b> Hotel Name :- </b> ".$rhoteldetail['hotel_name']."
			</p>

			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;width: 85%;'>
			<b> Check-in Date:- </b> ".$resultbooking['check_in_date'].$intime."
			</p>

			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;width: 85%;'>
			<b> Check-out Date:- </b> ".$resultbooking['check_out_date'].$outtime."
			</p>

			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;width: 85%;'>
			<b> Money Refund:- </b> ".$resultbooking['booked_price']."
			</p>





			</td>
			</tr>
			<tr>
			<td>
			<p style='border:0px none;margin:0px 330px 0px;padding:0px;font-style:inherit;font-weight:inherit;font-size-adjust:inherit;font-stretch:inherit;font-feature-settings:inherit;font-kerning:inherit;font-synthesis:inherit;font-variant:inherit;font-family:sans-serif;font-size:14px;line-height:25px;color:#222;text-align:justify;'>
			Thanks,<br>
			Anytime Check In</p>
			</td>
			</tr>


			</tbody>
			</table>

			<div class='mail-area-last wel'>
			<div class='container'>
			<div class='row'>

			<div class='border-blue'>
			<img src='https://www.anytimecheckin.com/new/image/border-blue.jpg' style='width:100%;' /> <span= style='margin-left: 25px;'>
			</div>
			<div class='col-xs-6 col-sm-6' style='float:left;'>
			<div class='mail-medicine'>
			<h2 style='color: #7f7f7f; margin-left: 55px;
			font-size: 14px; font-weight: 400;margin-top: 0px;'>Anytime checkin</h2>
			<p style='font-size: 13px;
			color: #7f7f7f;  font-weight: 400; margin-left: 55px;'>Online Hotel Booking Service<br /> by 24*7 hours</p>
			</div>
			</div>


			<div class='col-xs-6 col-sm-6' style='float:right;'>
			<div class='mail-left'>
			<span style='color: #7f7f7f; font-size: 14px; margin-right: 70px;  font-weight: 300;'><a href='http://www.anytimecheckin.com' target='_blank' data-saferedirecturl='https://www.google.com/url?hl=en&amp;q=http://www.anytimecheckin.com&amp;source=gmail&amp;ust=1524723379004000&amp;usg=AFQjCNFHFP7-I2l_9c5i3ns4bafB2_sZUg' style=' color: #7f7f7f;'>http://www.anytimecheckin.com</a></span><br>
			<span style='font-size:13px;margin-right:70px;color:#7f7f7f;font-weight:400;display: block;margin-top: 5px;margin-bottom: 5px;'>Tel:  +123456789</span>
			<span style='font-size:13px;margin-right:70px;color:#7f7f7f;font-weight:400;display: block;margin-top: 0px;'><a href='mailto:info@anytimecheckin.com' target='_blank'  style=' color: #7f7f7f;'>Email: info@anytimecheckin.com</a></span>
			</div>
			</div>
			</div>
			</div>
			</div>



			<!-- <div class='footer-last'>
			<div class='container-fluid'>
			<div class='row'>
			<div class='col-xs-12 col-sm-12 col-md-12'>
			<p>© 2018 copyright section</p>
			</div>
			</div>
			</div>
			</div> -->

			<!-- /close footer-->




			<script>
			function myFunction() {
				document.getElementsByClassName('topnav')[0].classList.toggle('responsive');
			}
			</script>

			<script>
			$(document).ready(function(){
				$('button').click(function(){
					$('p').toggle();
					});
					});
					</script>







					<style type='text/css'>

					.mail-logo{ text-align: center; margin-top: 10px;}


					.mail-logo:before{
						content: '';
						width: 93%;
						height: 6px;
						background: #2a568b;
						position: absolute;
						top: 9em;
						left: 0px;
						right: 0px;
						margin: 0 auto;
					}


					.mail-heading h2 {
						text-align: center;
						color: #294e8d;
						font-family: roboto;
						font-weight: 600;
						font-size: 38px;
						margin-top: 45px;
						margin-bottom: 32px;
					}

					.mail-verify-title {
						margin-left: 20.5%;
					}

					p.next-mail {
						font-size: 18px !important;
						width: 69% !important;
						margin-bottom: 40px !important;
					}

					.mail-verify-title p {
						font-size: 18px;
						margin-top: 30px;
					}

					p.mail-last {
						color: #918f8f;
					}

					.mail-verify-title h2 {
						font-size: 20px;
						margin-top: 3.5em;
						color: #000000;
						font-family: roboto;
						font-weight: 500;
						margin-bottom: 5em;
					}


					.mail-area-last:before{
						content: '';
						width: 93%;
						height: 4px;
						background: #2a568b;
						position: absolute;
						top: 45em;
						left: 0px;
						right: 0px;
						margin: 0 auto;}


						.mail-medicine h2 {
							font-size: 19px;
							color: #6e6d6d;
						}

						.mail-medicine p {
							font-size: 18px;
							color: #6e6d6d;
							margin-top: 13px;
						}

						.mail-left {
							text-align: right;
						}


						.mail-left h2 {
							font-size: 20px;
							color: #6e6d6d;
							margin-bottom: 0px;
						}


						.mail-left p {
							font-size: 17px;
							margin: 2px 0px 0px 0px;
						}

						.mail-area-last {
							margin-bottom: 25px;
						}


						.mail-verify-title.next {
							margin-left: 15.5%;
						}


						p.next-mail.next {
							font-size: 18px !important;
							width: 97% !important;
							margin-bottom: 40px !important;
						}


						.mail-add-area {
							margin-left: 15.5%;
						}

						.mail-add-area p {
							font-size: 16px;
							margin: 4px 0px 0px 0px;
						}

						p.mail-upon {
							font-size: 18px;
							margin-top: 40px;
						}

						p.mail-thanks {
							font-size: 18px;
							margin-top: 32px;
						}


						.mail-area-last.wel {
							margin-bottom: 25px;
							margin-top: 60px;
						}

						.mail-area-last.wel:before {
							margin-top: 54px;
						}

						p.mail-lat {
							margin: 7px 0px 0px 0px;
						}

						.mail-area-last.point:before {
							margin-top: 30px;
						}

						h2.mail-point {
							margin-top: 53px;
						}
						</style>




						</body>
						</html>

						";

    //echo $message;

                        // Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
						$headers .= 'From: info@anytimecheckin.com' . "\r\n";
						$headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
						$headers .= 'Cc:'.$vemail. "\r\n";

               // echo'<pre>';
               // print_r($message);die;

						$mail = mail($to,$subject,$message,$headers);



						header("location:mybooking.php");
					}

				}



			}

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

				<title>AnytimeCheckin</title>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

				<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

				<link href="css/style.css" rel="stylesheet" type="text/css" />
				<link href="css/style3.css" rel="stylesheet" type="text/css" />
				<link href="css/responsive.css" rel="stylesheet" type="text/css" />


				<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"> -->

				<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">

				<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet">

				<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

				<body>
					<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['user_id']; ?>" />
					<!-- top-header -->
					<div class="vbv">

						<div class="container">

							<div class="row">

								<div class="col-xs-12 cl-sm-6 col-md-6">

									<div class="logo-area">

										<a href="index.php"><img src="image/logo-footer.png" /></a>

									</div>

								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">

									<div class="user-area">

										<p><a href="#"><i class="fa fa-user"></i> <?php echo $result['fname'].' '.$result['lname'];?></a></p>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="left-tab-area">

						<div class="container">

							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12 act">

									<div class="col-sm-3 left-sidebar">

										<div class="tab">

											<!-- <button class="tablinks active" onclick="openCity(event, 'London')"><i class="fa fa-calendar"></i>My Booking</button> -->

											<a href="user-profile.php"><button class="tablinks"><i class="fa fa-user"></i>My Profile</button></a>

											<a href="mybooking.php"><button class="tablinks active"  onclick="openCity(event, 'Tokyo')"><i class="fa fa-ticket" aria-hidden="true"></i>My Booking</button></a>
											<a href="change-password.php"><button class="tablinks" ><!--onclick="openCity(event, 'Tokyo')----><i class="fa fa-key" aria-hidden="true"></i>Change Password</button></a>
											<a href="logout.php"><button class="tablinks "><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</button></a>

										</div>

									</div>

									<div class="col-sm-9 right-side">

										<div id="London" class="tabcontent" style="display:none;">

											<h3>London</h3>

											<p>London is the capital city of England.</p>

										</div>

										<div id="Paris" class="tabcontent" style="display:none;">

  <!-- <h3>Paris</h3>

  	<p>Paris is the capital of France.</p>  -->


  	<div class="profile-form">
  		<div id="mail-status" class="replay"></div>
  		<!-- <form action="/action_page.php"> -->

  			<input type="text" id="fname" name="fname" value="<?php echo $result['fname'];?>" placeholder="First Name"><i style="color: #fff;" class="fa fa-question-circle"></i>

  			<input type="text" id="lname" name="lname" value="<?php echo $result['lname'];?>" placeholder=" Last Name"><i style="color: #fff;" class="fa fa-question-circle"></i>

  			<?php 
  			if(!empty($result['mob_no'])){
  				?>
  				<input type="text" id="mob_no" name="mob_no" value="<?php echo $result['mob_no'];?>" placeholder="Phone number" readonly><i class="fa fa-question-circle"></i>
  				<?php

  			}
  			else{
  				?>
  				<input type="text" id="mob_no" name="mob_no"  placeholder="Phone number" ><i class="fa fa-question-circle"></i>

  				<?php
  			}
  			?>


  			<?php 
  			if(!empty($result['mob_no'])){
  				?>
  				<input type="text" id="email" name="email" value="<?php echo $result['email'];?>" placeholder="Email" readonly><i class="fa fa-question-circle"></i>
  				<?php

  			}
  			else{
  				?>
  				<input type="text" id="email" name="email"  placeholder="Email"><i class="fa fa-question-circle"></i>

  				<?php
  			}
  			?>

  			<input type="hidden" id="user_id" name="user_id"  value="<?php echo $result['user_id'];?>" placeholder="user id"><i class="fa fa-question-circle"></i>   

  			<!-- </form> -->
  			<div class="change-pass">

  				<button onclick="change_pass();">Change Paswword</button>

  				<div class="Submit-form">
  					<button type="submit" class="btn btn-primary" name="updateprofile" data-toggle="modal" onclick="return UpdateProfile();">Submit</button>

  					<!-- <a href="#">Submit</a> -->

  				</div>

  			</div>

  		</div>

  		<div class="current-pass"> 

  			<input type="text" id="current_password"  name="current_password" placeholder="Current Password" required="required"><br>  
  			<input type="text" id="new_password" name="new_password" placeholder="New Password"required="required"><br>
  			<!-- <i class="fa fa-eye-slash"></i> --> 

  			<input type="text" id="confirme_password" name="confirme_password" placeholder="Confirme Password"required="required"><br>
  			<!--  <i class="fa fa-eye-slash"></i> -->

  			<div class="Submit-form">
  				<button type="submit" class="btn btn-primary" name="changepassword" data-toggle="modal" onclick="return changepassword();">Submit</button>

  				<!-- <a href="#">Submit</a> -->

  			</div>

  		</div>

  	</div>

  	<div id="Tokyo" class="tabcontent" style="display:none;">

  		<div class="">

  			<ul class="nav nav-tabs">

  				<li class="active"><a data-toggle="tab" href="#home" id="upcoming">Upcoming</a></li>

  				<li><a data-toggle="tab" href="#menu1" id="menu11">Completed</a></li>

  				<li><a data-toggle="tab" href="#menu2" id="menu22">Cancelled</a></li>

  			</ul>


  			<div class="tab-content" id="adc">

  				<div id="home" class="tab-pane fade in active">

  					<?php 
  					$upcoming=$hotels->GetAllHotelsbyUserid($user_id);

  					$rmid=$upcoming['room_type_id'];

  					//$roomdetail=$hotels->Roomtypebyid($rmid);

  					// echo "<pre>";
  					// print_r($rmid);

  					if (!empty($upcoming)) {
  						foreach($upcoming as $upcomings){ 


  							?>
  							<div class="sort-des">
  								<p>Book on 
  									<?php 
  									$original = $upcomings['book_created_at'];
  									echo $date = date("j F, Y", strtotime($original));
  									?>
  								</p>
  							</div>

  							<div class="row">

  								<div class="col-xs-12 col-sm-8 col-md-8">

  									<div class="hotel-view">

  										 <?php 
                                if (!empty($upcomings['main_image'])) {

                                  $thumbimage=explode(".",$upcomings['main_image']); 
                  $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
                                 ?>
                                 <img src="image/front/<?php echo $thumbimagefinal;?>">
                                 
                                 <?php
                               }
                               else{
                                ?>
                               <img src="image/no-image.png" />
                                <?php
                              }
                              ?>



  										<?php 
  										//if(empty($upcomings['main_image'])){
  											?>

  											<!-- <img src="image/no-image.png" /> -->
  										<?php //} 
  										//else{
  											?>
  											<!-- <img src="image/<?php echo $upcomings['main_image'];?>" /> -->
  											<?php
  										//}

  										?>

  										<div class="hotel-title">

  											<h2><?php echo $upcomings['hotel_name'];?></h2>

  											<p>Booking ID : <?php echo $upcomings['hotel_booking_id'];?></p>



  											<div class="executive">

  												<p><?php echo $upcomings['hotel_room_type'];?></p>

  											</div>

  										</div>

  									</div>

  								</div>

  								<div class="col-xs-12 col-sm-2 col-md-2">

  									<div class="check-in">

  										<h2>CHECK IN</h2>
  										<?php 
  										if(empty($upcomings['check_in_time'])){
  											$original1 = $upcomings['check_in_date'];
  											$date1 = date("j F, Y", strtotime($original1));
  											?>

  											<P>
  												<?php echo $date1;?>
  											</P>
  										<?php } 
  										else{
  											$original1 = $upcomings['check_in_date'];
  											$date1 = date("j F, Y", strtotime($original1));
  											?>
  											<P>
  												<?php echo $date1;?>
  											</P>

  											<p><?php echo $upcomings['check_in_time'];?></p>
  										<?php } ?>

  										<!--  <p><span>Saturday</span></p> -->

  									</div>

  								</div>



  								<div class="col-xs-12 col-sm-2 col-md-2">

  									<div class="check-in">

  										<h2>CHECK OUT</h2>

  										<?php 
  										if(empty($upcomings['check_out_time'])){
  											$original2 = $upcomings['check_out_date'];
  											$date2 = date("j F, Y", strtotime($original2));
  											?>
  											<P>
  												<?php echo $date2;?>
  											</P>
  										<?php } 
  										else{
  											$original2 = $upcomings['check_out_date'];
  											$date2 = date("j F, Y", strtotime($original2));
  											?>
  											<P>
  												<?php echo $date2;?>
  											</P>

  											<p><?php echo $upcomings['check_out_time'];?></p>
  										<?php } ?>

  										<!--  <p><span>Saturday</span></p> -->

  									</div>

  								</div>

  								<div class="comment-area">


  									<!-- <input type="submit" name="email" onclick="return validateForgot();" class="btn btn-info sub" value="Submit"> -->

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" id="<?php echo $upcomings['booking_id'];?>" data-target="#exampleModal1<?php echo $upcomings['booking_id'];?>" onclick="return confirm_alert(this.id);">

  Booking Cancelled
</button> -->
<?php 
// echo $upcomings['booking_type'];
$date=date('Y-m-d');
		// echo $upcomings['check_in_date'];
 $date_new=date('Y-m-d',strtotime('-2 day', strtotime($upcomings['check_in_date'])));
if($upcomings['booking_type']=='1'){

	if($date<=$date_new){ ?>
		<a href="mybooking.php?can=<?php echo $upcomings['booking_id'];?>"   onclick="return confirm_alert(this);"> 
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $upcomings['booking_id'];?>">

				Cancel Booking
			</button>
		</a>
	<?php	}
	?>

<?php }else{ 
		 if($date<=$date_new){ ?>
		<a href="mybooking.php?can=<?php echo $upcomings['booking_id'];?>"   onclick="return confirm_alert(this);"> 
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $upcomings['booking_id'];?>">

				Cancel Booking
			</button>
		</a>
	<?php	}
	?>

<?php }
?>
<!-- <a href="mybooking.php?can=<?php echo $upcomings['booking_id'];?>"   onclick="return confirm_alert(this);"> 
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $upcomings['booking_id'];?>">

		Cancel Booking
	</button>
</a> -->

<script type="text/javascript">
	function confirm_alert(node) {
                 //function confirm_alert(id) {
                  //alert(id);
                  return confirm("Are You Sure You Want to Cancel Booking ?");
                 // var a= confirm("Are You Sure You Want to Cancel Booking ?");
                  // if(a==true){


                  //   $.ajax({

                  //       url:'bookingCancelled.php',

                  //       type:'post',

                  //       data:'id='+$("#id").val(),

                  //       success:function(data){

                  //          alert(data);                          

                  //     }

                  //   })

                  // }else{
                  //   return false;
                  // }               


              }
          </script>  

          <!-- <button>Booking Cancelled</button> -->

          <div class="view-detail">

          	<a href="view_detail.php?booking_id=<?php echo $upcomings['booking_id'];?>">View Detail</a>

          </div>

      </div>

  </div>
<?php } 

}
else{
	echo 'no booking found';
}
?>            

</div>

</div>

<div id="menu1" class="tab-pane fade">    

	<?php 
	$completed=$hotels->CompetedHotelsbyUserid($user_id);
	if (!empty($completed)) {
		foreach($completed as $complete){

			$bid = $complete['booking_id'];
			$hid = $complete['hotel_id'];



			?>

<!-- <input type="text" id="hotelid" name="hotelid" value="<?php echo $complete['hotel_id']; ?>" />
-->

<div class="sort-des">

	<p>Book on 
		<?php 
		$compdate = $complete['book_created_at'];
		echo $compdate = date("j F, Y", strtotime($compdate));
		?>

	</p>

</div>

<div class="row">



	<div class="col-xs-12 col-sm-8 col-md-8">



		<div class="hotel-view">

		<?php 
        if (!empty($complete['main_image'])) {

          $thumbimage1=explode(".",$complete['main_image']); 
$thumbimagefinal1=$thumbimage1[0]."_thumb.".$thumbimage1[1];
         ?>
         <img src="image/front/<?php echo $thumbimagefinal1;?>">
         
         <?php
       }
       else{
        ?>
       <img src="image/no-image.png" />
        <?php
      }
      ?>


			<?php 
			//if(!empty($complete['main_image'])){
				?>
				<!-- <img src="image/<?php echo $complete['main_image'];?>" /> -->

				<?php
			// }
			// else{
				?>
				<!-- <img src="image/no-image.png" /> -->

				<?php
			// }
			?>



			<div class="hotel-title">

				<h2><?php echo $complete['hotel_name'];?></h2>

				<p>Booking ID : <?php echo $complete['hotel_booking_id'];?></p>

			</div>

		</div>

	</div>

	<div class="col-xs-12 col-sm-2 col-md-2">

		<div class="check-in">

			<h2>CHECK IN</h2>

			<?php 
			if(empty($complete['check_in_time'])){
				$comporiginal1 = $complete['check_in_date'];
				$compdate1 = date("j F, Y", strtotime($comporiginal1));
				?>

				<P>
					<?php echo $compdate1;?>
				</P>
			<?php } 
			else{
				$comporiginal1 = $complete['check_in_date'];
				$compdate1 = date("j F, Y", strtotime($comporiginal1));
				?>
				<P>
					<?php echo $compdate1;?>
				</P>

				<p><?php echo $complete['check_in_time'];?></p>
			<?php } ?>

			<!-- <p><span>Saturday</span></p> -->

		</div>

	</div>



	<div class="col-xs-12 col-sm-2 col-md-2">

		<div class="check-in">

			<h2>CHECK OUT</h2>

			<?php 
			if(empty($complete['check_out_time'])){
				$comporiginal2 = $complete['check_out_date'];
				$compdate2 = date("j F, Y", strtotime($comporiginal2));
				?>

				<P>
					<?php echo $compdate2;?>
				</P>
			<?php } 
			else{
				$comporiginal2 = $complete['check_out_date'];
				$compdate2 = date("j F, Y", strtotime($comporiginal2));
				?>
				<P>
					<?php echo $compdate2;?>
				</P>

				<p><?php echo $complete['check_out_time'];?></p>
			<?php } ?>

			<!--  <p><span>Saturday</span></p> -->

		</div>

	</div>





	<div class="col-sm-12 asdsd">

		<div class="col-sm-9 comment text-right">

			<?php 
			$rev =$hotels->UserReviewbyid($bid,$hid,$user_id);

			$rr = $rev['user_rating'];

			if ($complete['booking_id'] == $rev['booking_id']) {

				?>



				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $complete['booking_id'];?>">Your comment</button>


				<!--Rating Star New Code -->




				<!--Rating Star New Code -->


				<div id="demo<?php echo $complete['booking_id'];?>" class="collapse search-star">
					<section class='rating-widget'>

						<!-- Rating Stars Box -->
						<div class='rating-stars text-center'>
							<ul id='stars'>
      <!-- <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
    </li> -->
    <?php
    for ($i=1; $i <= $rr ; $i++) { 

    	?>

    	<span class="fa fa-star checked star-detail"></span>

    	<?php

    }



    ?>
    ?>

</ul>
</div>

<div class='success-box'>
	<div class='clearfix'></div>
	<!-- <div class='text-message'></div> -->

	<div class='clearfix'></div>
</div>
<input type="hidden" id="selected_rating" name="selected_rating">


</section>




<textarea class="form-control" rows="5" placeholder="write a comment" id="comment<?php echo $complete['booking_id'];?>" readonly><?php echo $rev['user_reviews'];?></textarea>
<!-- <button type="button" class="form-control" rows="5" style=" width: 28%; margin: 0px auto;" id="<?php echo $complete['booking_id'];?>" value="<?php echo $complete['hotel_id']; ?>" onclick="return comment(this.id,this.value);">Submit</button> -->


<div id="commentresult<?php echo $complete['booking_id'];?>"></div> 

</div>
<?php }
else{
	?>
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $complete['booking_id'];?>">Write a comment</button>

	<div id="demo<?php echo $complete['booking_id'];?>" class="collapse search-star">
		<section class='rating-widget'>

			<!-- Rating Stars Box -->
			<div class='rating-stars text-center'>
				<ul id='stars'>
					<li class='star' title='Poor' data-value='1'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='Fair' data-value='2'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='Good' data-value='3'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='Excellent' data-value='4'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='WOW!!!' data-value='5'>
						<i class='fa fa-star fa-fw'></i>
					</li>
				</ul>
			</div>

			<div class='success-box'>
				<div class='clearfix'></div>
				<!-- <div class='text-message'></div> -->

				<div class='clearfix'></div>
			</div>
			<input type="hidden" id="selected_rating" name="selected_rating">


		</section>




		<textarea class="form-control" rows="5" placeholder="write a comment" id="comment<?php echo $complete['booking_id'];?>"><?php echo $rev['user_reviews'];?></textarea>
		<button type="button" class="form-control" rows="5" style=" width: 28%; margin: 0px auto;" id="<?php echo $complete['booking_id'];?>" value="<?php echo $complete['hotel_id']; ?>" onclick="return comment(this.id,this.value);">Submit</button>


		<div id="commentresult<?php echo $complete['booking_id'];?>"></div> 

	</div>

	<?php
}
?>
</div>

<div class="col-sm-3  view-detail">

	<a href="view_detail.php?booking_id=<?php echo $complete['booking_id'];?>">View Detail</a>


</div>

</div>

</div>




<?php } 

}
else{
	echo 'no booking found';
}

?>



</div>


</div>


<script type="text/javascript">

	$(function(){
		$("#menu1").hide();
		$(".current-pass").hide();

		$("#menu11").click(function(){

          //alert('chirag');

          $("#adc").hide();

          $("#menu1").show();

          $("#menu2").hide();

      })

		$("#menu22").click(function(){

          //alert('chirag');

          $("#menu1").hide();

          $("#adc").hide();

          $("#menu2").show();

           // $("#adc").css("display","none");

       })

		$("#upcoming").click(function(){

          //alert('chirag');

          $("#menu1").hide();

          $("#menu2").hide();

          $("#adc").show();

      })

        //   $("#menu22").click(function(){

        //   //alert('chirag');

        //   $("#menu1").css("display","block");

        // })

    })



	function change_pass(){

		$(".current-pass").show();

		$(".profile-form").hide();

	}

</script>

<div id="menu2" class="tab-pane fade">
	<?php 
	$cancelled=$hotels->CancelledHotelsbyUserid($user_id);
	if (!empty($cancelled)) {

		foreach($cancelled as $cancel){


			?>

			<div class="sort-des">

				<p>Book on 
					<?php 
					$canceloriginal = $cancel['book_created_at'];
					echo $canceldate = date("j F, Y", strtotime($canceloriginal));
					?>

				</p>

			</div>



			<div class="row">

				<div class="col-xs-12 col-sm-8 col-md-8">

					<div class="hotel-view">

						<?php 
        if (!empty($cancel['main_image'])) {

          $thumbimage2=explode(".",$cancel['main_image']); 
$thumbimagefinal2=$thumbimage2[0]."_thumb.".$thumbimage2[1];
         ?>
         <img src="image/front/<?php echo $thumbimagefinal2;?>">
         
         <?php
       }
       else{
        ?>
       <img src="image/no-image.png" />
        <?php
      }
      ?>


						<?php 
						//if(!empty($cancel['main_image'])){
							?>
							<!-- <img src="image/<?php echo $cancel['main_image'];?>" /> -->

							<?php
						// }
						// else{
							?>
							<!-- <img src="image/no-image.png" /> -->

							<?php
						//}
						?>

						<div class="hotel-title">

							<h2><?php echo $cancel['hotel_name'];?></h2>

							<p>Booking ID : <?php echo $cancel['hotel_booking_id'];?></p>



               <!--  <div class="range-slide">

            <ul>

              <li><span>1</span><br /> <p>Cancelled</p></li>

              <li><span>2</span> <br /> <p>In progress</p></li>

              <li><span>3</span> <br /> <p>Confirmed</p></li>

            </ul>

        </div> -->

    </div>

</div>

</div>

<div class="col-xs-12 col-sm-2 col-md-2">

	<div class="check-in">

		<h2>CHECK IN</h2>

		<?php 
		if(empty($cancel['check_in_time'])){
			$canceloriginal1 = $cancel['check_in_date'];
			$canceldate1 = date("j F, Y", strtotime($canceloriginal1));
			?>

			<P>
				<?php echo $canceldate1;?>
			</P>
		<?php } 
		else{
			$canceloriginal1 = $cancel['check_in_date'];
			$canceldate1 = date("j F, Y", strtotime($canceloriginal1));
			?>
			<P>
				<?php echo $canceldate1;?>
			</P>

			<p><?php echo $cancel['check_in_time'];?></p>
		<?php } ?>

           <!--  <p><span>Saturday</span></p>
           -->
       </div>

   </div>



   <div class="col-xs-12 col-sm-2 col-md-2">

   	<div class="check-in">

   		<h2>CHECK OUT</h2>

   		<?php 
   		if(empty($cancel['check_out_time'])){
   			$canceloriginal2 = $cancel['check_out_date'];
   			$canceldate2 = date("j F, Y", strtotime($canceloriginal2));
   			?>

   			<P>
   				<?php echo $canceldate2;?>
   			</P>
   		<?php } 
   		else{
   			$canceloriginal2 = $cancel['check_out_date'];
   			$canceldate2 = date("j F, Y", strtotime($canceloriginal2));
   			?>
   			<P>
   				<?php echo $canceldate2;?>
   			</P>

   			<p><?php echo $cancel['check_out_time'];?></p>
   		<?php } ?>

           <!--  <p><span>Saturday</span></p>
           -->
       </div>

   </div>

   <div class="comment-area">


   	<!-- <p>Write a comment</p> -->

   	<div class="view-detail">

   		<a href="view_detail.php?booking_id=<?php echo $cancel['booking_id'];?>">View Detail</a>


   	</div>

   </div>


</div>

<?php }
}
else{
	echo'no booking found';
}
?>

</div>

<!--     <div id="menu3" class="tab-pane fade">

      <h3>Menu 3</h3>

      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

  </div> -->

</div>

</div>









<!-- <div id="London" class="tabcontent" style="display:none;">

  <h3>London</h3>

  <p>London is the capital city of England.</p>

</div>





<div id="Paris" class="tabcontent" style="display:none;">

  <h3>Paris</h3>

  <p>Paris is the capital of France.</p> 

</div> -->



<!-- <div id="Tokyo" class="tabcontent" style="display:none;">

  <h3>Tokyo</h3>

  <p>Tokyo is the capital of Japan.</p>

</div> -->

</div>

</div>

</div>

</div>



<div class="footer-booking">
	<?php
	include_once 'footer.php'; 
	?>
</div>


</body>

</html>

<script type="text/javascript">


	$("#Paris").hide();

	$("#my_profile").click(function(){
          //alert('my_profile');
          $("#Paris").hide();
          $(".current-pass").hide();
          $(".profile-form").css('display','none');
      })



  </script>
  <script type="text/javascript">


  	$("#Tokyo").show();

  	$("#my_profile").click(function(){
          //alert('my_profile');
          $("#Paris").hide();
          $(".current-pass").hide();
          $(".profile-form").css('display','none');
      })



  </script>





  <script>

  	function openCity(evt, cityName) {

  		var i, tabcontent, tablinks;

  		tabcontent = document.getElementsByClassName("tabcontent");

  		for (i = 0; i < tabcontent.length; i++) {

  			tabcontent[i].style.display = "none";

  		}

  		tablinks = document.getElementsByClassName("tablinks");

  		for (i = 0; i < tablinks.length; i++) {

  			tablinks[i].className = tablinks[i].className.replace(" active", "");

  		}

  		document.getElementById(cityName).style.display = "block";

  		evt.currentTarget.className += " active";

  	}



// Get the element with id="defaultOpen" and click on it

document.getElementById("defaultOpen").click();

</script>











<!-- booking cancelled modal -->



<!-- Button trigger modal -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

  Launch demo modal

</button> -->



<!-- Modal -->
<?php 
$upcoming1=$hotels->GetAllHotelsbyUserid($user_id);
if(!empty($upcoming1)){
	foreach($upcoming1 as $upcomings1){
		$result_book = $upcomings1['booking_id'];

		$resultbooking=$user->GetBookingConfirmbyId($result_book);    

		$resulthotel=$user->Hoteldetailbyid($resultbooking['hotel_id']);
    // echo "<pre>";
   // print_r($resulthotel);

		$result1=$user->Roomdetailbyid($resultbooking['room_type_id']);
  // echo "<pre>";
  // print_r();



		?>

		<div class="modal fade" id="exampleModal<?php echo $upcomings1['booking_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

						<h5 class="modal-title" id="exampleModalLabel">Booking Detail</h5>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">

							<span aria-hidden="true">&times;</span>

						</button>



					</div>

					<div class="modal-body">

						<p>Booking ID</p>

						<h2><?php echo $resultbooking['hotel_booking_id'];?></h2>







						<div class="bedroom-des">

							<div class="col-xs-12 col-sm-4 col-md-4">

								<div class="bedroom">
									<?php 
									if(empty($resulthotel['main_image'])){
										?>

										<img src="image/bed.jpg" />
									<?php } 
									else{
										?>
										<img src="image/<?php echo $resulthotel['main_image'];?>" />
										<?php
									}

									?>

								</div>

							</div>



							<div class="col-xs-12 col-sm-8 col-md-8 bed">

								<div class="bedroom-detail">

									<h2><?php echo $resulthotel['hotel_name'];?></h2>

									<p><?php echo $resulthotel['hotel_address'];?><br /><?php echo $resulthotel['hotel_city'];?>,<?php echo $resulthotel['hotel_pin_code'];?></p>

								</div>

							</div>

						</div>



						<div class="modal-body de">

							<div class="container col-md-12">

								<div class="row">

									<div class="col-xs-12 col-sm-3 col-md-3">

										<div class="bed-heading">

											<?php 
											if(empty($resultbooking['check_in_time'])){
												$check_in_date = $resultbooking['check_in_date'];

												$checkdate = date("j F, Y", strtotime($check_in_date));


												?>

												<h2><?php echo $checkdate;?>
											</h2>
										<?php } 
										else{
											?>
											<h2><?php echo $checkdate;?>
											<br /><span><?php echo $resultbooking['check_in_time'];?></span></h2>
											<?php
										}

										?>

									</div>

								</div>



								<div class="col-xs-12 col-sm-3 col-md-3">

									<div class="bed-heading">

										<?php 
										if(empty($resultbooking['check_out_time'])){
											$check_out_date1 = $resultbooking['check_out_date'];

											$checkdate1 = date("j F, Y", strtotime($check_out_date1));


											?>

											<h2><?php echo $checkdate1;?>
										</h2>
									<?php } 
									else{
										?>
										<h2><?php echo $checkdate1;?>
										<br /><span><?php echo $resultbooking['check_out_time'];?></span></h2>
										<?php
									}

									?>
								</div>
							</div>


							<div class="col-xs-12 col-sm-3 col-md-3">
								<div class="bed-heading">
									<h2> Guest<br /><span><?php echo $resultbooking['no_of_adults'];?> Adult</span></h2>
								</div>
							</div>


							<div class="col-xs-12 col-sm-3 col-md-3">
								<div class="bed-heading">
									<h2><?php echo $resultbooking['no_of_rooms'];?> <?php echo $result1['hotel_room_type'];?> Room<br /><span></span></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="container col-md-12">
						<div class="row">
							<div class="amount">

								<p>Total Amount <span>&euro; 
									<?php
									$tdiscount = $total1;
									$per = $tdiscount*20;
									$totaldiscount = $per/100;
									$a = $total1;
									$b = $totaldiscount;
									$c = $total1-$totaldiscount;

									$d = $c*10;
									$netbooking = $d/100;
									$Outstanding = $c-$netbooking;

									echo $resultbooking['actual_price'];?></span></p>
								</div>

								<div class="amount">
									<p>Amount Pay <span>&euro; <?php echo $resultbooking['booked_price'];?></span></p>
								</div>



								<div class="amount">
									<p>Outstanding Amount <span>&euro;<?php echo $Outstanding;?></span></p>

								</div>
							</div>

						</div>

					</div>



					<div class="modal-body">

						<div class="container col-md-12">

							<div class="row">
								<div class="refund">

									<h2>refund detail</h2>

									<p>Total ampunt to be refund</p>

								</div>

								<div class="amount">

									<p>Total Amount <span>Rs 3000</span></p>

								</div>

								<div class="amount">

									<p>Refund Amount <span>Rs 2100 <i class="fa fa-question-circle"></i></span></p>

								</div>

								<div class="check-box">

									<p><input type="checkbox" name="vehicle1" value="Bike"> I accept the Terms & Condition in the lincence agreement</p>

								</div>

								<div class="table-submit">

									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">

										Submit

									</button>

									<!--   <a href="#">Submit</a> -->

								</div>

							</div>

						</div>

					</div>


					<div class="modal-footer">

        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        	<button type="button" class="btn btn-primary">Save changes</button> -->

        </div>

    </div>

</div>

</div>

</div>
<?php } 
}
?>


<!-- close-modal -->









<!-- small-modal -->



<!-- Button trigger modal -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">

  Launch demo modal

</button> -->



<!-- Modal -->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header small">

				<h5 class="modal-title" id="exampleModalLabel">Please tell us more why you want to cancel the order</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body dd">

				<div class="check-box">

					<p><input type="checkbox" name="vehicle1" value="Bike">Not interested anymore</p>

				</div>



				<div class="check-box">

					<p><input type="checkbox" name="vehicle1" value="Bike">I want to change my mind</p>

				</div>



				<div class="check-box">

					<p><input type="checkbox" name="vehicle1" value="Bike">Found nother best booking</p>

				</div>



				<div class="check-box">

					<p><input type="checkbox" name="vehicle1" value="Bike">Other</p>

					<div class="small-input">

						<form action="/action_page.php">

							<input type="text" name="fname"><br>

						</form>

					</div>

				</div>





			</div>

			<div class="modal-footer nn">

				<button type="button" class="btn btn-primary">Submit</button>

			</div>

		</div>

	</div>

</div>

<script>

	function UpdateProfile() {

                //alert('kanchan');

                $.ajax({

                	url: "ajaxuserprofile.php",

                	type: "POST",

                	data:'updateprofile='+$("#fname").val()+'&lname='+$("#lname").val()+'&email='+$("#email").val()+'&mob_no='+$("#mob_no").val()+'&user_id='+$("#user_id").val(),

                	success:function(data){
                    //alert(data);       

                    $("#mail-status").html(data);

                }



            });





            }



        </script>

        <script>

        	function changepassword() {

               //alert('kanchan');

               $.ajax({

               	url: "ajaxuserprofile.php",

               	type: "POST",

               	data:'changepassword='+$("#current_password").val()+'&new_password='+$("#new_password").val()+'&confirme_password='+$("#confirme_password").val()+'&user_id='+$("#user_id").val(),

               	success:function(data){
               		alert(data);




                       // $("#mail-status").html(data);

                   }

               });

           }             

       </script>

       <style type="text/css">
       .hotel-view img {
       	width: 191px;
       	height: 171px;
       }
   </style>
   <script>
   	jQuery(document).ready(function($){

   		$(".btnrating").on('click',(function(e) {

   			var previous_value = $("#selected_rating").val();

   			var selected_value = $(this).attr("data-attr");
   			$("#selected_rating").val(selected_value);

   			$(".selected-rating").empty();
   			$(".selected-rating").html(selected_value);

   			for (i = 1; i <= selected_value; ++i) {
   				$("#rating-star-"+i).toggleClass('btn-warning');
   				$("#rating-star-"+i).toggleClass('btn-default');
   			}

   			for (ix = 1; ix <= previous_value; ++ix) {
   				$("#rating-star-"+ix).toggleClass('btn-warning');
   				$("#rating-star-"+ix).toggleClass('btn-default');
   			}

   		}));


   	});
   </script>




   <script>
   	function comment(id,hotel_id)
   	{
  // alert(id);
  // alert(hotel_id);
  
  var bookingid=id;
  var hotelid=hotel_id;
  //alert(hotelid);
 var userid=document.getElementById("userid").value;
 // var hotelid=document.getElementById("hotel_id").value;
 //alert(userid);
  // alert(bookingid);
   var comment=document.getElementById("comment"+bookingid).value;
   //alert(comment);
   var rating=document.getElementById("selected_rating").value;
  //alert(rating);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function()
  {
  	if (this.readyState == 4 && this.status == 200)
  	{
		   // Typical action to be performed when the document is ready:
		   //document.getElementById("commentresult"+bookingid).innerHTML = xhttp.responseText;
		   document.getElementById("commentresult"+bookingid).innerHTML = "Comment added successfully";
		}
	};
	xhttp.open("GET", "https://anytimecheckin.com/new/mybookingcomment.php?bookingid="+id+"&userid="+userid+"&comment="+comment+"&hotelid="+hotel_id+"&rating="+rating, true);
	xhttp.send();


}


</script>

<!-- Rating Star New Code -->
<script>
	$(document).ready(function(){

		/* 1. Visualizing things on Hover - See next part for action on click */
		$('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
    	if (e < onStar) {
    		$(this).addClass('hover');
    	}
    	else {
    		$(this).removeClass('hover');
    	}
    });
    
}).on('mouseout', function(){
	$(this).parent().children('li.star').each(function(e){
		$(this).removeClass('hover');
	});
});


/* 2. Action to perform on click */
$('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
    	$(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
    	$(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
    	msg = " " + ratingValue + " ";
    }
    else {
    	msg = "" + ratingValue + " ";
    }
    responseMessage(msg);
    $("#selected_rating").val(msg);
    
});


});


	function responseMessage(msg) {
		$('.success-box').fadeIn(200);  
		$('.success-box div.text-message').html("<span>" + msg + "</span>");
	}
</script>






<style>

.clearfix {
	clear:both;
}

.text-center {        width: 100%;
	margin: 28px auto;
	text-align: right;}



	pre {
		display: block;
		padding: 9.5px;
		margin: 0 0 10px;
		font-size: 13px;
		line-height: 1.42857143;
		color: #333;
		word-break: break-all;
		word-wrap: break-word;
		background-color: #F5F5F5;
		border: 1px solid #CCC;
		border-radius: 4px;
	}


	.new-react-version {
		padding: 20px 20px;
		border: 1px solid #eee;
		border-radius: 20px;
		box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);

		text-align: center;
		font-size: 14px;
		line-height: 1.7;
	}

	.new-react-version .react-svg-logo {
		text-align: center;
		max-width: 60px;
		margin: 20px auto;
		margin-top: 0;
	}





	.success-box {
		margin: 0px 0;
		padding: 10px 10px;
		border: 1px solid transparent;
		background: transparent;
		position: absolute;
		right: 0;
		top: 15%;
	}

	.success-box img {
		margin-right:10px;
		display:inline-block;
		vertical-align:top;
	}

	.success-box > div {
		vertical-align: top;
		display: inline-block;
		color: #888;
		margin-top: -4px;
		font-size: 29px;
	}



	/* Rating Star Widgets Style */
	.rating-stars ul {
		list-style-type:none;
		padding:0;

		-moz-user-select:none;
		-webkit-user-select:none;
	}
	.rating-stars ul > li.star {
		display:inline-block;

	}

	/* Idle State of the stars */
	.rating-stars ul > li.star > i.fa {
		color:#ccc; /* Color on idle state */
		font-size: 20px;
		cursor: pointer;
	}

	/* Hover state of the stars */
	.rating-stars ul > li.star.hover > i.fa {
		color:#FFCC36;
	}

	/* Selected state of the stars */
	.rating-stars ul > li.star.selected > i.fa {
		color:#FF912C;
		font-size: 20px;
		cursor: pointer;
	}

	.btn-flat {
		background: transparent;
		color: #000;
		border-color: #b9b3b3;
	}

</style>

<!-- Rating Star New Code -->



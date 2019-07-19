<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['cancelBookingbyuser']=='CANCEL12345'){
	$cancel =  $_REQUEST['booking_id'];

	$resultbooking=$user->GetBookingidfromtranid($cancel);
	 // var_dump($resultbooking);
	$result=$user->UserInfobyId($resultbooking['user_id']);
	$email = $result['email'];
	$hid = $resultbooking['hotel_id'];
	$rhoteldetail=$user->Hoteldetailbyid($hid); 
	$hvid = $rhoteldetail['hotel_vendor_id'];
	$hotelvendordetail=$user->GetVendorDetailbyId($hvid);
	$vemail =$hotelvendordetail['v_email'];
	$resultcancel=$user->bookingCancelled($cancel);
	if($resultcancel){
		mail1($email,$vemail);
		$result=array('result'=>'success');
	}else{
		$result=array('result'=>'failed');
	}
	echo json_encode($result);

}

function mail1($email,$vemail){
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

						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
						$headers .= 'From: info@anytimecheckin.com' . "\r\n";
						$headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
						$headers .= 'Cc:'.$vemail. "\r\n";
						$mail = mail($to,$subject,$message,$headers);
			
}




?>

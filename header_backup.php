<?php 
include_once'Object.php';
if(isset($_POST['submit'])){
      // var_dump($_POST);
      $search=$_POST['search'];
      $optradio=$_POST['optradio'];
      $check_in_date=$_POST['check_in_date'];
      $check_in_time=$_POST['check_in_time'];
      $check_out_date=$_POST['check_out_date'];
      $check_out_time=$_POST['check_out_time'];
      $no_of_adults=$_POST['no_of_adults'];
      $no_of_rooms=$_POST['no_of_rooms'];
      $no_of_childs=$_POST['no_of_childs'];
      $lat=$_POST['lat'];
      $lng=$_POST['lng'];
      if($optradio=='1'){
        $result=$user->UserSearchResultForday($check_in_date,$check_out_date,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng);
        // var_dump($result);
      }else{
       $result=$user->UserSearchResultForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng);
         // var_dump($result);
     }
    }
session_start();

if(isset($_SESSION['user_id']))
{
	$user_id=$_SESSION['user_id'];

	$result=$user->UserInfobyId($user_id);

}

   // date_default_timezone_set('Asia/Kolkata');

   // $currentTime = date("H:i:s");
   // echo $currentDate_timestamp = strtotime($currentTime).'<br>';

   // $selectedTime = $currentTime;
   // $endTime = strtotime($selectedTime);
   // echo date('h:i:s', $endTime);
?>
<!doctype html>
<html lang="en">
<p id="demo" style="display: none;"></p>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<!--<![endif]-->
	<!-- meta -->
	<meta name="google-site-verification" content="SnyDQEU8pB1KuFwP1AQw3ZboRHt_iC32zjm_t9al5Kw" />
	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width"> -->
	<title>Anytime Checkin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/style2.css" rel="stylesheet" type="text/css" />
        <link href="css/style1.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
        <script src="js/search.js"></script>
       <body>
        <!-- header -->
        <div class="header-area slider-top">
             <div class="container">
                <div class="row">
                   <div class="col-sm-12 col-md-12">
                      <div class="header-content">
                         <div class="col-sm-12 col-md-12">
                            <div class="login-area" align="right">
                               <div class="logo-text" align="center">
                                    <a href="index.php"><img src="image/logo.png"></a>
                               </div>
                               <ul>
                                  <?php 
                                     if(empty($_SESSION['user_id'])){ 
                                     
                                     
                                       ?>
                                  <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Second">Create a Account</button></li>
                                  <?php } ?>
                                  <li class="sign">
                                     <?php 
                                        if(!empty($_SESSION['user_id'])){ 
                                        
                                        
                                          ?>
                                     <!--  <a href="logout.php" class="btn btn-primary">LogOut</a> -->
                                     <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn"><img src="image/admin-pic.PNG"><?php echo $result['fname'].' '.$result['lname'];?></button>
                                        <div id="myDropdown" class="dropdown-content" align="left">
                                           <ul>
                                              <li class="tigdm"><a href="user-profile.php">My Profile</a></li>
                                              <!-- <li class="tigdm"><a href="#">My Profile</a></li> -->
                                              <li>Saved properties list</li>
                                              <li>Inbox</li>
                                              <li>My bookings</li>
                                           </ul>
                                           <a href="logout.php">Sign Out</a>
                                        </div>
                                     </div>
                                     <?php }else{  ?>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#third">Login</button>
                                     <?php  }
                                        ?>
                                  </li>
                               </ul>
                               <!-- this section user login stage -->
                            </div>
                            <div class="menu">
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="row" align="center">
                   <div class="text">
                      <p align="center"><span>You'll Never Forget Your Stay<br /></span> <span class="acc">with Anytime Check In</span>
                      </p>
                   </div>
                </div>
                <div class="row">
    			   <div class="boxing">
    			   				  <div id="stickytypeheader" class="xenlo">

                        <div class="col-sm-12 col-md-12 ser">
                        <div class="search-hotel-area">
                           <div class="col-sm-4 col-md-4 location">
                              <div class="get-loction">
                                 <button onclick="getLocation()"><img src="image/current-location.png" /></button>
                              </div>
                              <form action="search.php" class="icon" method="post">
                                 <label class="se"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                                 <input type="text"  class="controls" id="google_search" placeholder="Enter Destination.." name="search" value="<?php if(!empty($search)){echo $search;}?>" required> 
                                 <div id="map"></div>
                                 <input type="hidden" name="lat" id="lat" value="<?php if(!empty($lat)){echo $lat;}?>">
                                 <input type="hidden" name="lng" id="lng" value="<?php if(!empty($lng)){echo $lng;}?>">
                           </div>
                           <div class="col-sm-1 col-md-1">
                           <div class="month-area ss">
    					        <p>Book By</p>
                           <div class="time-area ae">
    					        <img src="image/calender.png">
                           <!--  <h2>10 March 2018</h2><p>Saturday</p> -->
                           <form class="rad">
                           <!--    <input type="text" class="form-control hasDatepicker" placeholder="Date" name="date" id="date">
                              <input type="text" class="form-control hasDatepicker" placeholder="Saturday" name="date" id="day"> -->
                              <input type="hidden" id="da_1" value="<?php if(!empty($optradio)){echo $optradio;}else{echo '1';}?>">
                           <div class="radio">
                           <label class="red"><input type="radio" name="optradio" value="<?php if(!empty($optradio=='1')){echo $optradio;}else{echo '1';}?>" id="day_1" <?php if($optradio=='1'){echo 'checked';}if(empty($optradio)){echo 'checked';}?> onchange='handleChange(this.value)'>Day</label>
                           </div>
                           <div class="radio">
                           <label class="red"><input type="radio"  value="<?php if(!empty($optradio=='2')){echo $optradio;}else{echo '2';}?>" name="optradio" <?php if($optradio=='2'){echo 'checked';}?> onchange='handleChange(this.value)'>Hour</label>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="col-sm-2 col-md-2">
                           <div class="month-area ss">
    					         <p>Check In</p>
                           <div class="time-area calen">
    					        <img src="image/calender.png">
                           <!--  <h2>10 March 2018</h2><p>Saturday</p> -->
                           <div class="rod">
                           <input type="text" class="form-control hasDatepicker" placeholder="Date" name="check_in_date" id="check_in_date" value="<?php if(!empty($check_in_date)){echo $check_in_date;}?>">
                           <input type="text" class="form-control hasDatepicker re" placeholder="check_in time" name="check_in_time" id="check_in_time" value="<?php if(!empty($check_in_time)){echo $check_in_time;}?>">
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="col-sm-2 col-md-2 ">
                           <div class="month-area ss">
    					        <p>Check Out</p>
                           <div class="time-area calen">
    					        <img src="image/calender.png">
                           <!-- <h2>10 March 2018</h2><p>Saturday</p> -->               
                           <div class="rod">
                           <input type="text" class="form-control hasDatepicker" placeholder="Date" name="check_out_date" id="check_out_dates" data-date-format='yyyy-mm-dd' value="<?php if(!empty($check_out_date)){echo $check_out_date;}?>">
                           <input type="text" class="form-control hasDatepicker re" placeholder="Check_Out time" name="check_out_time" id="check_out_time" value="<?php if(!empty($check_out_time)){echo $check_out_time;}?>">
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="col-sm-2 col-md-2 ">
                           <a id="contact">
                           <div class="month-area ss">
    					   	<p></p>
                           <div class="time-area rooms">
    					    <img src="image/adult.png"> 
                           <h2><span id="no_of_adults"><?php if(!empty($no_of_adults)){echo $no_of_adults;}else{echo '1';}?></span> adults</h2>
                           <p><span id="no_of_rooms"><?php if(!empty($no_of_rooms)){echo $no_of_rooms;}else{echo '1';}?></span> rooms</p>
                           <p><span id="no_of_childs"><?php if(!empty($no_of_childs)){echo $no_of_childs;}else{echo '1';}?></span> childs</p>
                           <!--  <a href="#" title="Header" data-toggle="popover" data-placement="bottom" data-content="Content">Bottom</a> -->
                           </div>
                           <input type="hidden" name="no_of_adults" id="no_of_adults_form" value="<?php if(!empty($no_of_adults)){echo $no_of_adults;}else{echo '1';}?>">
                           <input type="hidden" name="no_of_rooms" id="no_of_rooms_form" value="<?php if(!empty($no_of_rooms)){echo $no_of_rooms;}else{echo '1';}?>">
                           <input type="hidden" name="no_of_childs" id="no_of_childs_form" value="<?php if(!empty($no_of_childs)){echo $no_of_childs;}else{echo '1';}?>">
                           </div>
                           </a>
                           </div>
                           <div class="messagepop pop" id="no-popup">
                           <div class="row">
                           <div class="col-md-12" style="padding: 0;">
                           <div class="PlusMinusRow" data-selenium="occupancyRooms">
                           <ul>
                           
                           <i class="fa fa-minus" aria-hidden="true" id="adult_inc" onclick="adult_decNumber()"></i> 
                           </li>
                           <li id="display"><span id="adult_count"><?php if(!empty($no_of_adults)){echo $no_of_adults;}else{echo '1';}?></span>
                           <span id="adult_label"> Adult</span>
                           </li>
                           <li><i class="fa fa-plus" aria-hidden="true" id="adult_dec" onclick="adult_incNumber()"/></i></li>
                           <li>
                            <li>
                           <i class="fa fa-minus" aria-hidden="true" id="room_inc" onclick="room_decNumber()"></i> 
                           </li>
                           <li id="display"><span id="room_count"><?php if(!empty($no_of_rooms)){echo $no_of_rooms;}else{echo '1';}?></span>
                           <span id="adult_label"> Room</span>
                           </li>
                           <li><i class="fa fa-plus" aria-hidden="true" id="room_dec" onclick="room_incNumber()"/></i></li>
                           <li>
                           <i class="fa fa-minus" aria-hidden="true" id="child_inc" onclick="child_decNumber()"></i> 
                           </li>
                           <li id="display"><span id="child_count"><?php if(!empty($no_of_childs)){echo $no_of_childs;}else{echo '1';}?></span>
                           <span id="adult_label"> Child</span>
                           </li>
                           <li><i class="fa fa-plus" aria-hidden="true" id="child_dec" onclick="child_incNumber()"/></i></li>
                           </ul>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="col-sm-1 col-md-1 vv">
                           <div class="month-area butt">
                           <!-- <a href="search.php"> --><!-- <button type="button" class="btn btn-default sear">Search</button> --> <input type="submit" id="fixed-button" class="btn btn-default sear" placeholder="Search" name="submit" value="Search"><!-- </a> -->
                           </div>
                           </div>
                        </div>
                        </div>
    				</div>
                </div>
                </form>
             </div>
          </div>
          
<!-- /header -->    
<!-- Button trigger modal -->
    <!-- Start Forgot Password for Email -->
       <?php include_once'pop-up/forgotpassforEmail.php'?>

    <!-- Close forgot Password for Email -->
		<!--  forgot Password for mobile pop up -->
		 <?php include_once'pop-up/forgotpassforMobile.php'?>
			<!-- Close forgot Password for mobile pop up  -->
			
		      <!-- Registration Popup -->

            <?php include_once'pop-up/registration.php'?>

          <!-- Close Registration Popup -->
			
						<!-- login popup -->
              <?php include_once'pop-up/log-in.php'?>

            <!-- close login pop-up -->
						<!-- verification Popup -->


            <?php include_once'pop-up/verification.php'?>
            <!-- close verification PopUp -->
						
								<!-- /container-area -->
							</div>
							<!-- slider-area -->
							<!-- top-header -->
							
							



	      
 
<!-- /rest-area --> 
<!-- chef-area --> 

<!-- faster -->
<script src="js/myjs.js"></script>
                 
                     <!-- footer area -->
                
                     <style>
                     a.selected {
                     	background-color:#1F75CC;
                     	color:white;
                     	z-index:100;
                     }
                     .messagepop {
                     	background-color: #FFFFFF;
                     	border: 1px solid #999999;
                     	cursor: default;
                     	display: none;
                     	margin-top: 15px;
                     	position: absolute;
                     	text-align: left;
                     	width: 170px;
                     	z-index: 50;
                     	padding: 24px 26px 20px;
                     	right: 0px;
                     }
                     label {
                     	display: block;
                     	margin-bottom: 3px;
                     	padding-left: 15px;
                     	text-indent: -15px;
                     }
                     .messagepop p, .messagepop.div {
                     	border-bottom: 1px solid #EFEFEF;
                     	margin: 8px 0;
                     	padding-bottom: 8px;
                     }
                     .PlusMinusRow li {
                     	color: #000;
                     	display: inline-block;
                     	padding: 0px 8px;
                     	font-size: 16px;
                     }
                     .PlusMinusRow li {
                     	color: #468cff;
                     	display: inline-block;
                     	padding: 0px 11px;
                     	font-size: 15px;
                     }
                     a.selected {
                     	background-color: transparent;
                     	color: white;
                     	z-index: 100;
                     }
                     .PlusMinusRow {
                     	border-bottom: 2px solid #f1f1f1;
                     	margin-top: -17px;
                     }
                     span#adult_label {
                     	color: lightgray;
                     	font-weight: 600;
                     	font-size: 12px;
                     }
                     .month-area {
                     	display: inline-flex;
                     	margin-top: 19px;
                     	width: 100%;
                     }
                     .PlusMinusRow i {
                     	font-size: 11px;
                     	cursor: pointer;
                     }
                   </style>
                   <style type="text/css">
                   form.rad {
                    position: relative;
                    top: -28px;
                  }
                  label.red {
                    font-size: 13px;
                    font-weight: 400;
                  }
                  .time-area.ae p {
                    margin-bottom: 3px !important;
                    position: relative;
                    top: -17px;
                    left: -35px;
                    color: #222;
                    font-weight: 400;
                    font-size: 13px;
                  }
                  .time-area.calen p {
                    margin-bottom: 3px !important;
                    position: relative;
                    top: -17px;
                    left: -35px;
                    color: #222;
                    font-weight: 400;
                    font-size: 13px;
                  }
                  form.rod {
                    position: relative;
                    top: -27px;
                  }
                </style>
                <script>
                  function deselect(e) {
                   $('.pop').slideFadeToggle(function() {
                    e.removeClass('selected');
                  });    
                 }

                 $(function() {
                   $('#contact').on('click', function() {

                    //console.log("pop up click");
                    if($(this).hasClass('selected')) {
                     deselect($(this));               
                   } else {
                     $(this).addClass('selected');
                     $('.pop').slideFadeToggle();
                   }
                   return false;
                 });

                   $('.close').on('click', function() {
                    deselect($('#contact'));
                    return false;
                  });
                 });

                 $.fn.slideFadeToggle = function(easing, callback) {
                   return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
                 };
               </script>
              

       <style>
         /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
         /* Optional: Makes the sample page fill the window. */
         html, body {
         	height: 100%;
         	margin: 0;
         	padding: 0;
         }
         #description {
         	font-family: Roboto;
         	font-size: 15px;
         	font-weight: 300;
         }
         #infowindow-content .title {
         	font-weight: bold;
         }
         #infowindow-content {
         	display: none;
         }
         .pac-card {
         	margin: 10px 10px 0 0;
         	border-radius: 2px 0 0 2px;
         	box-sizing: border-box;
         	-moz-box-sizing: border-box;
         	outline: none;
         	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
         	background-color: #fff;
         	font-family: Roboto;
         }
         #pac-container {
         	padding-bottom: 12px;
         	margin-right: 12px;
         }
         .pac-controls {
         	display: inline-block;
         	padding: 5px 11px;
         }
         .pac-controls label {
         	font-family: Roboto;
         	font-size: 13px;
         	font-weight: 300;
         }
         #google_search {
         	background-color: #fff;
         	font-family: Roboto;
         	font-size: 15px;
         	font-weight: 300;
         	margin-left: 12px;
         	padding: 0 11px 0 13px;
         	text-overflow: ellipsis;
         	width: 400px;
         }
         #google_search:focus {
         	border-color: #4d90fe;
         }
         #title {
         	color: #fff;
         	background-color: #4d90fe;
         	font-size: 25px;
         	font-weight: 500;
         	padding: 6px 12px;
         }
         #target {
         	width: 345px;
         }
         .radio {
         	position: relative;
         	bottom: 26px;
         }
         .time-area p {
         	margin-bottom: 0px;
         	margin-top: 0px;
         }

       </style>
      <script type="text/javascript">
       $(function(){
        var stickyHeaderTop = $('#stickytypeheader').offset().top;

        $(window).scroll(function(){
          if( $(window).scrollTop() > stickyHeaderTop ) {
    
            $('#sticky').css('display', 'block');
            document.getElementById("fixed-button").style.padding = "8px 24px";   

            document.getElementById("fixed-button").style.margin = "17px  0px"; 
			$('.xenlo').attr('id', 'sdsdsddf');
			$('#sdsdsddf').css({background: '#fff',height:'78px', position: 'fixed', top: '0px', left:'0',    border: '2px solid rgb(71, 71, 71)' });
          } 
          else {
            $('#sticky').css('display', 'none');
            document.getElementById("fixed-button").style.padding = "25px";   

            document.getElementById("fixed-button").style.margin = "unset";   
	$('.xenlo').attr('id', 'abcccb');
$('#abcccb').css({background: 'transparent',height:'7px',position: 'static', top: '0px'});
          }
        });
      });
    </script>
	
<style>
.datefield {
    margin: 0px;
    height: 20px !important;
    position: relative;
    bottom: 11px;
    border: none;
    box-shadow: none;
}
</style>
 
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
        //var_dump($result);
      }else{
       $result=$user->UserSearchResultForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng);
         //var_dump($result);
     }
    }


    ?>

    <html lang="en">
       <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
          <!--<![endif]-->
          <!-- meta -->
          <meta name="google-site-verification" content="zAN_JiX-Tcw8prAL8QxFfwPdTcsW-jHaE6zbJW1CZ8M" />
          <meta charset="UTF-8">
          <!-- <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width"> -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
          <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
          <link href="css/style.css" rel="stylesheet" type="text/css" />
          <link href="css/style2.css" rel="stylesheet" type="text/css" />
          <link href="css/style1.css" rel="stylesheet" type="text/css" />
          <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i" rel="stylesheet">
	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
	    $(document).ready(function () {
			var date = new Date();
			var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            
       
            $("#check_in_date").datepicker({
                format: 'mm-dd-yyyy',
				minDate: "dateToday",
                 maxDate: '+3M',
                onSelect: function (date) {
                    var date2 = $('#check_in_date').datepicker('getDate');
                    date2.setDate(date2.getDate()+1);
                    $('#check_out_date').datepicker('setDate', date2);
                    //sets minDate to dateofbirth date + 1
                    $('#check_out_date').datepicker('option', 'minDate', date2);
                }
            });
            $('#check_out_date').datepicker({
                format: 'mm-dd-yyyy',
				minDate: "dateToday",
				maxDate: '+3M',
                onClose: function () {
                    var dt1 = $('#check_in_date').datepicker('getDate');
                    console.log(dt1);
                    var dt2 = $('#check_out_date').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#check_out_date').datepicker('option', 'minDate');
                        $('#check_out_date').datepicker('setDate', minDate);
                    }
                }
            });
        });

    </script>
          <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
          -->
		  
       <body>
          <!-- header -->
          <div class="header-area">
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
				<form action="search.php" class="icon" method="post">
					<div class="row">
					   <div class="boxing">
							<div class="col-sm-12 col-md-12 ser">
								<div class="search-hotel-area">
								   <div class="col-sm-3 col-md-3 location">
									  <div class="get-loction">
										 <button onclick="getLocation()"><img src="image/current-location.png" /></button>
									  </div>
									  
										 <label class="se"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
										 <input type="text"  class="controls" id="google_search" placeholder="Enter Destination.." name="search" value="<?php if(!empty($search)){echo $search;}?>"> 
										 <div id="map"></div>
										 <input type="hidden" name="lat" id="lat" value="<?php if(!empty($lat)){echo $lat;}?>">
										 <input type="hidden" name="lng" id="lng" value="<?php if(!empty($lng)){echo $lng;}?>">
								   </div>
									<div class="col-sm-2 col-md-2">
										<div class="month-area ss">
											<p>Book By</p>
											<div class="time-area ae">
												<img src="image/calender.png"> 
												<div class="radio">
													<label class="red"><input type="radio" name="optradio" value="<?php if(!empty($optradio)){echo $optradio;}else{echo '1';}?>" id="day_1" <?php if($optradio=='1'){echo 'checked';}?>>Day</label>
												</div>
												<div class="radio">
													<label class="red"><input type="radio"  value="<?php if(!empty($optradio)){echo $optradio;}else{echo '2';}?>" name="optradio" <?php if($optradio=='2'){echo 'checked';}?>>Hour</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-2 col-md-2">
										<div class="month-area ss">
											<p>Check In</p>
											<div class="time-area calen">
												<img src="image/calender.png">
												<div class="rod">
													<input type="text" class="form-control" ID="check_in_date" name="check_in_date" value="<?php if(!empty($check_in_date)){echo $check_in_date;}?>" />
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
												<div class="rod">
													<input type="text" class="form-control" ID="check_out_date" name="check_out_date" value="<?php if(!empty($check_out_date)){echo $check_out_date;}?>" />
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
													Adults:<select name="no_of_adults" id="no_of_adults">
														<option value="1" <?php if(!empty($no_of_adults) && $no_of_adults==1){echo "selected='selected'"; } ?>>1</option>
														<option value="2" <?php if(!empty($no_of_adults) && $no_of_adults==2){echo "selected='selected'"; } ?>>2</option>
														<option value="3" <?php if(!empty($no_of_adults) && $no_of_adults==3){echo "selected='selected'"; } ?>>3</option>
														<option value="4" <?php if(!empty($no_of_adults) && $no_of_adults==4){echo "selected='selected'"; } ?>>4</option>
													</select>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rooms:<select name="no_of_rooms" id="no_of_rooms">
														<option value="1" <?php if(!empty($no_of_rooms) && $no_of_rooms==1){echo "selected='selected'"; } ?>>1</option>
														<option value="2" <?php if(!empty($no_of_rooms) && $no_of_rooms==2){echo "selected='selected'"; } ?>>2</option>
														<option value="3" <?php if(!empty($no_of_rooms) && $no_of_rooms==3){echo "selected='selected'"; } ?>>3</option>
														<option value="4" <?php if(!empty($no_of_rooms) && $no_of_rooms==4){echo "selected='selected'"; } ?>>4</option>
													</select>
													&nbsp;&nbsp;&nbsp;&nbsp;Children:<select name="no_of_childs" id="no_of_childs">
														<option value="0" <?php if(!empty($no_of_childs) && $no_of_childs==0){echo "selected='selected'"; } ?>>0</option>
														<option value="1" <?php if(!empty($no_of_childs) && $no_of_childs==1){echo "selected='selected'"; } ?>>1</option>
														<option value="2" <?php if(!empty($no_of_childs) && $no_of_childs==2){echo "selected='selected'"; } ?>>2</option>
														<option value="3" <?php if(!empty($no_of_childs) && $no_of_childs==3){echo "selected='selected'"; } ?>>3</option>
														<option value="4" <?php if(!empty($no_of_childs) && $no_of_childs==4){echo "selected='selected'"; } ?>>4</option>
													</select>
													
													<!--<h2><span id="no_of_adults"><?php if(!empty($no_of_adults)){echo $no_of_adults;}echo '1';?></span> adults</h2>
													<p><span id="no_of_rooms"><?php if(!empty($no_of_rooms)){echo $no_of_rooms;}echo '1';?></span> rooms</p>
													<p><span id="no_of_childs"><?php if(!empty($no_of_childs)){echo $no_of_childs;}echo '1';?></span> childs</p>-->
												</div>
												<!--<input type="hidden" name="no_of_adults" id="no_of_adults_form" value="1">
												<input type="hidden" name="no_of_rooms" id="no_of_rooms_form" value="1">
												<input type="hidden" name="no_of_childs" id="no_of_childs_form" value="0">-->
											</div>
										</a>
									</div>
								   <!--<div class="messagepop pop">
									   <div class="row">
									   <div class="col-md-12" style="padding: 0;">
										<div class="PlusMinusRow" data-selenium="occupancyRooms">
											<ul>
											   <li>
													<i class="fa fa-minus" aria-hidden="true" id="room_inc" onclick="room_decNumber()"></i> 
											   </li>
											   <li id="display"><span id="room_count">1</span>
													<span id="adult_label"> Room</span>
											   </li>
											   <li><i class="fa fa-plus" aria-hidden="true" id="room_dec" onclick="room_incNumber()"/></i></li>
											   <li>
											   <i class="fa fa-minus" aria-hidden="true" id="adult_inc" onclick="adult_decNumber()"></i> 
											   </li>
											   <li id="display"><span id="adult_count">1</span>
											   <span id="adult_label"> Adult</span>
											   </li>
											   <li>
													<i class="fa fa-plus" aria-hidden="true" id="adult_dec" onclick="adult_incNumber()"/></i></li>
											   <li>
													<i class="fa fa-minus" aria-hidden="true" id="child_inc" onclick="child_decNumber()"></i> 
											   </li>
											   <li id="display"><span id="child_count">1</span>
													<span id="adult_label"> Child</span>
											   </li>
											   <li>
											   <i class="fa fa-plus" aria-hidden="true" id="child_dec" onclick="child_incNumber()"/></i></li>
											</ul>
										</div>
									   </div>
									   </div>
								   </div>-->
									<div class="col-sm-1 col-md-1 vv">
									   <div class="month-area butt">
									   <!-- <a href="search.php"> --><!-- <button type="button" class="btn btn-default sear">Search</button> --> <input type="submit" class="btn btn-default sear" placeholder="Search" name="submit" value="Search"><!-- </a> -->
									   </div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </form>
             </div>
          </div>
          <p id="demo"></p>
          <!-- /header -->    
          <!-- Button trigger modal -->
          <div class="container">
             <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#first">first</button> -->
             <!-- Modal-first -->
             <div class="modal fade re" id="first" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <button type="button" class="close jh" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <div class="head-line">
                         <p>Have trouble remembering your Rest & Go password? Login 
                            with facebook now and you will never have to
                         </p>
                      </div>
                      <div class="head-line-pic" align="center">
                         <a href="#"><img src="image/face.png"></a>
                         <p>or</p>
                      </div>
                      <div class="enter-area">
                         <p>
                            Enter your mobile number and we”ll send you a verification 
                            code to <span>reset your password</span>
                         </p>
                      </div>
                      <div id="frmEmail">
                         <div id="mail-status" class="replay"></div>
                         <div class="number">
                            <!-- <form> -->
                            <p>Your Email Id</p>
                            <div class="input-group">  
                               <span class="input-group-addon"><img src="image/mail-area.png"></span>
                               <input id="yourEmail" type="email" class="form-control" name="yourEmail" placeholder="Email Id">
                            </div>
                            <div class="input-msg" style="color: red;"><span id="yourEmail-info" class="info"></span></div>
                            <br />
                            <div class="captcha"></div>
                            <div class="submit-area">
                               <input type="submit" name="email" onclick="return validateForgot();" class="btn btn-info sub" value="Submit">
                            </div>
                            <!-- </form> -->
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!--  forget pop up by mobile -->
             <div class="modal fade re" id="mobileforget" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <button type="button" class="close jh" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <div class="head-line">
                         <p>Have trouble remembering your Rest & Go password? Login 
                            with facebook now and you will never have to
                         </p>
                      </div>
                      <div class="head-line-pic" align="center">
                         <a href="#"><img src="image/face.png"></a>
                         <p>or</p>
                      </div>
                      <div class="enter-area">
                         <p>
                            Enter your mobile number and we”ll send you a verification 
                            code to <span>reset your password</span>
                         </p>
                      </div>
                      <div id="frmEmail">
                         <div id="mail-mobile" class="replay"></div>
                         <div class="number">
                            <!-- <form> -->
                            <p>Your Mobile No.</p>
                            <div class="input-group">  
                               <span class="input-group-addon"><img src="image/flag.png">+60</span>
                               <input id="yourMobile" type="number" class="form-control" name="yourMobile" placeholder="Mobile No.">
                            </div>
                            <div class="input-msg" style="color: red;"><span id="yourMobile-info" class="info"></span></div>
                            <br />
                            <div class="captcha"></div>
                            <div class="submit-area">
                               <input type="submit" name="mobile" onclick="return validateMobileForgot();" class="btn btn-info sub" value="Submit">
                            </div>
                            <!-- </form> -->
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!-- end forget pop up by mobile -->
             <!-- second-area -->
             <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Second">Second</button>-->
             <!-- Modal-first -->
             <div class="modal fade" id="Second" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered aq" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h3 align="left">Sign In</h3>
                         <button type="button" class="close gf" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <div class="head-line">
                         <div class="row">
                            <div class="col-sm-6 col-md-6 rt">
                               <div class="have-mail buttons">
                                  <div class="mail-1">
                                     <img src="image/mail-area.png"><a href="#" onclick="divVisibility('Div1');">Email</a>
                                  </div>
                                  <div class="phone-1">
                                     <img src="image/mobile-area.png"><a href="#" onclick="divVisibility('Div2');">Mobile</a>
                                  </div>
                               </div>
                               <div class="head-line-pic second" align="center">
                                  <p>or</p>
                                  <a href="#"><img src="image/face.png"></a>
                                  <h4>Already have a account? <a href="#">Sign In</a></h4>
                               </div>
                            </div>
                            <!--contact form-->
                            <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
                            <div class="inner_div">
                               <div class="col-sm-6 col-md-6" id="Div1">
                                  <div class="promo-area">
                                     <!-- <form method="post" action=""> -->
                                     <div id="frmEmail">
                                        <div id="mail-status" class="replay"></div>
                                        <div class="form-group as">
                                           <label for="email">First Name*</label>
                                           <input type="text" name="userName" class="form-control se" id="userName">
                                           <div class="input-msg" style="color: red;"><span id="userName-info" class="info"></span></div>
                                           <br />
                                        </div>
                                        <div class="form-group as">
                                           <label for="email">Last Name*</label>
                                           <input type="text" name="lastName" class="form-control se" id="lastName">
                                           <div class="input-msg" style="color: red;"><span id="lastName-info" class="info"></span></div>
                                           <br />
                                        </div>
                                        <div class="form-group as">
                                           <label for="email">Email*</label>
                                           <input type="email" name="userEmail" class="form-control se" id="userEmail">
                                           <div class="input-msg" style="color: red;"><span id="userEmail-info" class="info"></span></div>
                                           <br />
                                        </div>
                                        <div class="form-group as">
                                           <label for="email">Password*</label>
                                           <input type="password" name="password" class="form-control se" id="password">
                                           <div class="input-msg" style="color: red;"><span id="password-info" class="info"></span></div>
                                           <br />
                                        </div>
                                        <div class="checkbox">
                                           <label><input type="checkbox" name="checkbox" id="checkbox">     
                                           Email me exclusive Rest & Go promotions. <br>I can unsubscribe at any time as stated in the privacy policy</label>
                                           <div class="input-msg" style="color: red;"><span id="checkbox-info" class="info"></span></div>
                                        </div>
                                        <div class="captcha"></div>
                                        <div class="create-area">
                                           <!-- <input type="submit" name="submit1"  class="btn btn-info create" value="Create Account"> -->
                                           <!-- data-target="#fourth" -->
                                           <button type="submit" class="btn btn-primary" name="submit1" data-toggle="modal" onclick="return validateEmail();">Create Account</button>
                                        </div>
                                     </div>
                                     <!-- </form> -->
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6" id="Div2" style="display: none;">
                                  <div class="promo-area">
                                     <!-- <form action="" method="post"> -->
                                     <div class="form-group as">
                                        <label for="email">First Name*</label>
                                        <input type="text" class="form-control se" id="fname">
                                        <div class="input-msg" style="color: red;"><span id="fname-info" class="info"></span></div>
                                        <br />
                                     </div>
                                     <div class="form-group as">
                                        <label for="email">Last Name*</label>
                                        <input type="text" class="form-control se" id="lname">
                                        <div class="input-msg" style="color: red;"><span id="lname-info" class="info"></span></div>
                                        <br />
                                     </div>
                                     <div class="form-group as">
                                        <div class="number nh">
                                           <p>Mobile number</p>
                                           <div class="input-group">
                                              <span class="input-group-addon"><img src="image/flag.png">+60</span>
                                              <input id="mobno1" type="text" class="form-control de" placeholder="Additional Info">
                                              <div class="input-msg" style="color: red;"><span id="mobno1-info" class="info"></span></div>
                                              <br />
                                           </div>
                                        </div>
                                     </div>
                                     <div class="form-group as">
                                        <label for="email">Password*</label>
                                        <input type="password" class="form-control se" id="password1">
                                        <div class="input-msg" style="color: red;"><span id="password1-info" class="info"></span></div>
                                        <br />
                                     </div>
                                     <div class="checkbox">
                                        <label><input type="checkbox" id="mob-checkbox"> Email me exclusive Rest & Go promotions. <br>I can unsubscribe at any time as stated in the privacy policy</label>
                                        <div class="input-msg" style="color: red;"><span id="mob-checkbox-info" class="info"></span></div>
                                        <br />
                                     </div>
                                     <div class="captcha"></div>
                                     <div class="create-area">
                                        <!-- <input type="submit" class="btn btn-info create" value="Create Account" name="submit"> -->
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" onclick="return validateEmail2()">Create Account</button>
                                     </div>
                                     <!-- </form> -->
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!-- third-area -->
             <!-- Modal-first -->
             <div class="modal fade" id="third" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered aq" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h3 align="left">Sign Up</h3>
                         <button type="button" class="close gf" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <div class="head-line">
                         <div class="row">
                            <div class="col-sm-6 col-md-6 rt ki">
                               <div class="hate-area">
                                  <p>Hate remembering your Rest & Go password? Login with Facebook now and you will never have to</p>
                               </div>
                               <div class="have-mail fd">
                                  <div class="mail-new">
                                     <img src="image/mail-area.png"><a href="#" onclick="divVisibility('Div3');">Email</a>
                                  </div>
                                  <div class="phone-new">
                                     <img src="image/mobile-area.png"><a href="#" onclick="divVisibility('Div4');">Mobile</a>
                                  </div>
                               </div>
                               <div class="head-line-pic second hh" align="center">
                                  <p>or</p>
                                  <a href="#"><img src="image/face.png"></a>
                               </div>
                               <div class="create-new">
                                  <h4>No account yet? <input type="submit" class="btn btn-info create new" value="Create Account" onclick="createaccount()"></h4>
                               </div>
                            </div>
                            <div class="inner_div">
                               <div class="col-sm-6 col-md-6" id="Div3">
                                  <div class="promo-area">
                                     <form action="adduser.php" method="post">
                                        <div class="form-group as rr">
                                           <div class="number nh">
                                              <p>Email</p>
                                              <div class="input-group">  
                                                 <span class="input-group-addon"><img src="image/mail-area.png"></span>
                                                 <input type="email" class="form-control de" name="emaillogin" placeholder="Email" id=loginemailvalid required="">
                                              </div>
                                           </div>
                                        </div>
                                        <div class="form-group as re">
                                           <label for="email">Password*</label>
                                           <input type="password" class="form-control se" name="emailpassword" id="loginemailpass" required="">
                                           <p><button type="button" class="btn btn-primary" data-toggle="modal" onclick="forgetpassword()" >Forgot your password?</button></p>
                                        </div>
                                        <div class="captcha"></div>
                                        <div class="create-area tr tt" align="center">
                                           <input type="submit" class="btn btn-info sign" name="loginbyemail" value="Sign In">
                                           <p>By proceeding you agree to Rest & Go <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></p>
                                        </div>
                                     </form>
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6" id="Div4" style="display: none;">
                                  <div class="promo-area">
                                     <form action="adduser.php" method="post">
                                        <div class="form-group as rr">
                                           <div class="number nh">
                                              <p>Mobile number</p>
                                              <div class="input-group">  
                                                 <span class="input-group-addon"><img src="image/flag.png">+60</span>
                                                 <input type="mobile" class="form-control de" name="mobilelogin" placeholder="Additional Info" id=loginmobvalid required="">
                                              </div>
                                           </div>
                                        </div>
                                        <div class="form-group as re">
                                           <label for="email">Password*</label>
                                           <input type="password" class="form-control se" name="mobpassword" id="loginmobpass" required="">
                                           <p><button type="button" class="btn btn-primary" data-toggle="modal" onclick="mobileforget()">Forgot your password?</button></p>
                                        </div>
                                        <div class="captcha"></div>
                                        <div class="create-area tr tt" align="center">
                                           <input type="submit" class="btn btn-info sign" name="loginbymob" value="Sign In">
                                           <p>By proceeding you agree to Rest & Go <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></p>
                                        </div>
                                     </form>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!-- fourth-area -->
             <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fourth">fourth</button> -->
             <!-- Modal-first -->
             <!-- verification code -->
             <div class="modal fade" id="fourth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h3 align="left">Verification</h3>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <div id="frmEmail">
                         <div class="head-line ii">
                            <p>
                               We have sent a verification code to +60-xxxxxxxxxx. This code will expire 1n 2 minutes. 
                               <!-- <form method="post"> -->
                               <button type="submit" name="resendcode" onclick="return resendcode();" class="btn btn-info sub">Resend code</button>
                            <div id="mail-resendcode" class="replay"></div>
                            <!-- <a href="#">Resend code</a> -->
                            <!-- </form> -->
                            </p>
                         </div>
                      </div>
                      <!-- <form action="" method="post"> -->
                      <div id="frmverify">
                         <div align="center" id="otp-status" class="replay"></div>
                         <div class="verification">
                            <ul>
                               <li>
                                  <div class="expire-area" align="center">
                                     <div class="form-group num">
                                        <input type="text" name="one" class="form-control old" maxlength="1" id="otp1">
                                        <div class="input-msg" style="color: red;"><span id="one-info" class="info"></span></div>
                                        <br />
                                     </div>
                                  </div>
                               </li>
                               <li>
                                  <div class="expire-area" align="center">
                                     <div class="form-group num">
                                        <input type="text" name="two" class="form-control old" maxlength="1" id="otp2">
                                        <div class="input-msg" style="color: red;"><span id="two-info" class="info"></span></div>
                                        <br />
                                     </div>
                                  </div>
                               </li>
                               <li>
                                  <div class="expire-area" align="center">
                                     <div class="form-group num">
                                        <input type="text" name="three" class="form-control old" maxlength="1" id="otp3">
                                        <div class="input-msg" style="color: red;"><span id="three-info" class="info"></span></div>
                                        <br />
                                     </div>
                                  </div>
                               </li>
                               <li>
                                  <div class="expire-area" align="center">
                                     <div class="form-group num">
                                        <input type="text" name="four" class="form-control old" maxlength="1" id="otp4">
                                        <div class="input-msg" style="color: red;"><span id="four-info" class="info"></span></div>
                                        <br />
                                     </div>
                                  </div>
                               </li>
                               <li>
                                  <div class="expire-area" align="center">
                                     <div class="form-group num">
                                        <input type="text" name="five" class="form-control old" maxlength="1" id="otp5">
                                        <div class="input-msg" style="color: red;"><span id="five-info" class="info"></span></div>
                                        <br />
                                     </div>
                                  </div>
                               </li>
                               <li>
                                  <div class="expire-area" align="center">
                                     <div class="form-group num">
                                        <input type="text" name="six" class="form-control old" maxlength="1" id="otp6">
                                        <div class="input-msg" style="color: red;"><span id="six-info" class="info"></span></div>
                                        <br />
                                     </div>
                                  </div>
                               </li>
                            </ul>
                            <input type="hidden" id="otp-check" value="">
                         </div>
                         <div class="submit-area">
                            <button type="submit" name="verify" onclick="return sendverify();" class="btn btn-info sub">Verify</button>
                         </div>
                      </div>
                      <!-- </form> -->
                      <div class="enter-area as">
                         <p>
                            Haven't recieved a verification code on your mobile yet? <a href="#">Use another mobile number</a>
                         </p>
                         <p>Already have a account? <a href="#">Sign In</a></p>
                      </div>
                      <div class="captcha"></div>
                   </div>
                </div>
             </div>
             <!-- /container-area -->
          </div>
    <!-- meassage popup -->


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

    <!-- /check-area -->
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

      // $(function() {
        // $('#contact').on('click', function() {

          // console.log("pop up click");
          // if($(this).hasClass('selected')) {
            // deselect($(this));               
          // } else {
            // $(this).addClass('selected');
            // $('.pop').slideFadeToggle();
          // }
          // return false;
        // });

        // $('.close').on('click', function() {
          // deselect($('#contact'));
          // return false;
        // });
      // });

      // $.fn.slideFadeToggle = function(easing, callback) {
        // return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
      // };
    </script>


    <script type="text/javascript">

      var i = 1;
      var j=1;
      var k=1;

      function incNumber() {
        if (i < 9) {
          i++;
        } else if (i = 9) {
          i = 1;
        }

        return i;
      }

      function decNumber() {
        if (i > 0) {
          --i;
        } else if (i = 0) {
          i = 9;
        }

        return i;
      }

      function incNumber1() {
        if (j < 9) {
          j++;
        } else if (j = 9) {
          j = 1;
        }

        return j;
      }

      function decNumber1() {
        if (j > 0) {
          --j;
        } else if (j = 0) {
          j = 9;
        }

        return j;
      }
      function incNumber2() {
        if (k < 9) {
          k++;
        } else if (k = 9) {
          k = 1;
        }

        return k;
      }

      function decNumber2() {
        if (k > 0) {
          --k;
        } else if (k = 0) {
          k = 9;
        }

        return k;
      }


      function adult_incNumber(){
        var i=incNumber();
              //alert(j);
             // document.getElementById("adult_count").innerHTML = i;
             // document.getElementById("no_of_adults").innerHTML = i;
             // $("#no_of_adults_form").val(i);
            }




            function adult_decNumber(){
              var i=decNumber();
              //alert(j);
             // document.getElementById("adult_count").innerHTML = i;
             // document.getElementById("no_of_adults").innerHTML = i;
             // $("#no_of_adults_form").val(i);
            }



            function room_incNumber(){
              var j=incNumber1();
             // document.getElementById("room_count").innerHTML = j;
             // document.getElementById("no_of_rooms").innerHTML = j;
             // $("#no_of_rooms_form").val(j);
            }




            function room_decNumber(){
              var j=decNumber1();
              // document.getElementById("room_count").innerHTML =j;
              // document.getElementById("no_of_rooms").innerHTML = j;
              // $("#no_of_rooms_form").val(j);
            }
            function child_incNumber(){
              var k=incNumber2();
              // document.getElementById("child_count").innerHTML = k;
              // document.getElementById("no_of_rooms").innerHTML = k;
              // $("#no_of_childs_form").val(k);
            }




            function child_decNumber(){
              var k=decNumber2();
              // document.getElementById("child_count").innerHTML = k;
              // document.getElementById("no_of_rooms").innerHTML = k;
              // $("#no_of_childs_form").val(k);
            }
          </script>
          <script type="text/javascript">
            // $(function(){
             // var a= $("#no_of_adults_form").val();
                // alert(a);
                // document.getElementById("no_of_adults").innerHTML = a;
                // var b= $("#no_of_rooms_form").val();
                // document.getElementById("no_of_rooms").innerHTML = b;
                // var c= $("#no_of_childs_form").val();
                // document.getElementById("no_of_childs").innerHTML = c;
              // })
            </script>
            <script>
          // This example adds a search box to a map, using the Google Place Autocomplete
          // feature. People can enter geographical searches. The search box will return a
          // pick list containing a mix of places and predicted search terms.

          // This example requires the Places library. Include the libraries=places
          // parameter when you first load the API. For example:

          function initAutocomplete() {

            console.log('initAutocomplete');
            // Create the search box and link it to the UI element.
            var input = document.getElementById('google_search');
            var searchBox = new google.maps.places.SearchBox(input);
            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            // map.addListener('bounds_changed', function() {
            //   searchBox.setBounds(map.getBounds());
            // });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
              var places = searchBox.getPlaces();
              console.log(places);
              var lat=places[0].geometry.location.lat();
              var lng=places[0].geometry.location.lng();
              console.log(lng);
              console.log(lat);
              $('#lat').val(lat);
              $('#lng').val(lng);
              if (places.length == 0) {
                return;
              }

              // Clear out the old markers.
              markers.forEach(function(marker) {
                marker.setMap(null);
              });
              markers = [];

              // For each place, get the icon, name and location.
              var bounds = new google.maps.LatLngBounds();
              places.forEach(function(place) {
                if (!place.geometry) {
                  console.log("Returned place contains no geometry");
                  return;
                }

                if (place.geometry.viewport) {
                  // Only geocodes have viewport.
                  bounds.union(place.geometry.viewport);
              } else {
                bounds.extend(place.geometry.location);
              }
          });
              map.fitBounds(bounds);
          });
        }

    </script>
        <script type="text/javascript">
          // $(function(){
            // var radio=$("#day_1").val();
               // console.log(radio);
              // if(radio=='1'){
                // console.log(1);
                // $("#check_in_time").hide();
                // $("#check_out_time").hide();
                // $("#check_in_date").show();
                // $("#check_out_date").show();
              // }
              // if(radio=='2'){
                // console.log(2);
                // $("#check_in_time").show();
                // $("#check_out_time").show();
                // $("#check_in_date").show();
                // $("#check_out_date").show();
              // }
            // })
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

        </style>
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
        .search-hotel-area input[type="text"] {
          background: none;
        }
     </style>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_df35mjfjKsOXeDYc5OrHJz8rmV8mu_U&libraries=places&callback=initAutocomplete"
      async defer></script>
      <script>
        // function deselect(e) {
          // $('.pop').slideFadeToggle(function() {
            // e.removeClass('selected');
          // });    
        // }

        // $(function() {
          // $('#contact').on('click', function() {

            // console.log("pop up click");
            // if($(this).hasClass('selected')) {
              // deselect($(this));               
            // } else {
              // $(this).addClass('selected');
              // $('.pop').slideFadeToggle();
            // }
            // return false;
          // });

          // $('.close').on('click', function() {
            // deselect($('#contact'));
            // return false;
          // });
        // });

        // $.fn.slideFadeToggle = function(easing, callback) {
          // return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
        // };
      </script>
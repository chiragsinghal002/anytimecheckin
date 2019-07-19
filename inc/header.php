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
      <title>Anytime Checkin</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
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
      <script type="text/javascript">
         $(function(){
           var date = new Date();
           var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
           var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
           $('#check_in_date').datepicker({
             format: 'mm-dd-yyyy',
             autoclose:true,
             todayHighlight:true,
             startDate:today,
             endDate: '+3M'
           });
           // var dat=$('#check_in_date').val();
           // alert(dat);
           var date1 = new Date();
           $("#check_out_date").datepicker({
             format: 'mm-dd-yyyy',
             autoclose:true,
             startDate:date1,
             endDate: '+3M'
           })
         
           var datess = new Date();
           $("#check_out_dates").datepicker({
             format: 'mm-dd-yyyy',
             autoclose:true,
             startDate:date1,
             endDate: '+3M'
           })
         
           $("#check_in_time").timepicker();
           $("#check_out_time").timepicker();
         });
      </script>
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
                              <img src="image/logo.png">
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
                           <!-- <nav class="navbar navbar-inverse sho">
                              <div class="navbar-header">
                              
                                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-2" aria-expanded="false">
                              
                                 <span class="sr-only">Toggle navigation</span>
                              
                                 <span class="icon-bar top-bar"></span>
                              
                                 <span class="icon-bar middle-bar"></span>
                              
                                 <span class="icon-bar bottom-bar"></span>
                              
                                 </button>
                              
                              </div>
                              
                              <div class="collapse navbar-collapse" id="example-2" align="center">
                              
                                 <ul class="nav navbar-nav">
                              
                                    <li><a href="index.html">Home</a></li>
                              
                                    <li><a href="#">Hotels</a></li>
                              
                                    <li  class="codes"><a href="#">Blog</a></li>
                              
                                    <li><a href="#">Login</a></li>
                              
                                    <li><a href="#">Register </a></li>
                              
                                    <li><a href="#">Contact Us</a></li>
                              
                                 </ul>
                              
                              </div>
                              
                              </nav> -->
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
                    <div class="col-sm-12 col-md-12 ser">
                    <div class="search-hotel-area">
                       <div class="col-sm-3 col-md-3 location">
                          <div class="get-loction">
                             <button onclick="getLocation()"><img src="image/current-location.png" /></button>
                          </div>
                          <form action="search.php" class="icon" method="post">
                             <label class="se"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                             <input type="text"  class="controls" id="google_search" placeholder="Enter Destination.." name="search"> 
                             <div id="map"></div>
                             <input type="hidden" name="lat" id="lat">
                             <input type="hidden" name="lng" id="lng">
                       </div>
                       <div class="col-sm-2 col-md-2">
                       <div class="month-area ss">
					        <p>Book By</p>
                       <div class="time-area ae">
					        <img src="image/calender.png">
                       <!--  <h2>10 March 2018</h2><p>Saturday</p> -->
                       <form class="rad">
                       <!--    <input type="text" class="form-control hasDatepicker" placeholder="Date" name="date" id="date">
                          <input type="text" class="form-control hasDatepicker" placeholder="Saturday" name="date" id="day"> -->
                       <div class="radio">
                       <label class="red"><input type="radio" name="optradio" value="1" id="day_1" checked>Day</label>
                       </div>
                       <div class="radio">
                       <label class="red"><input type="radio"  value="2" name="optradio">Hour</label>
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
                       <input type="text" class="form-control hasDatepicker" placeholder="Date" name="check_in_date" id="check_in_date">
                       <input type="text" class="form-control hasDatepicker re" placeholder="check_in time" name="check_in_time" id="check_in_time">
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
                       <input type="text" class="form-control hasDatepicker" placeholder="Date" name="check_out_date" id="check_out_dates">
                       <input type="text" class="form-control hasDatepicker re" placeholder="Check_Out time" name="check_out_time" id="check_out_time">
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
                       <h2><span id="no_of_adults">1</span> adults</h2>
                       <p><span id="no_of_rooms">1</span> rooms</p>
                       <p><span id="no_of_childs">1</span> childs</p>
                       <!--  <a href="#" title="Header" data-toggle="popover" data-placement="bottom" data-content="Content">Bottom</a> -->
                       </div>
                       <input type="hidden" name="no_of_adults" id="no_of_adults_form" value="1">
                       <input type="hidden" name="no_of_rooms" id="no_of_rooms_form" value="1">
                       <input type="hidden" name="no_of_childs" id="no_of_childs_form" value="1">
                       </div>
                       </a>
                       </div>
                       <div class="messagepop pop">
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
                       <li><i class="fa fa-plus" aria-hidden="true" id="adult_dec" onclick="adult_incNumber()"/></i></li>
                       <li>
                       <i class="fa fa-minus" aria-hidden="true" id="child_inc" onclick="child_decNumber()"></i> 
                       </li>
                       <li id="display"><span id="child_count">1</span>
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
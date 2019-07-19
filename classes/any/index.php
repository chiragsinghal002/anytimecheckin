<?php 
include_once'object.php';
session_start();
if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
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
  <title>Rest & Go</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
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
              <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Second">Create a Account</button></li>
              <li class="sign">
                <?php 
                if(!empty($_SESSION['user_id'])){ ?>
                 <a href="logout.php" class="btn btn-primary">LogOut</a>
               <?php }else{  ?>

                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#third">Login</button>
               <?php  }
               ?>

             </li>

           </ul> 

           <!-- this section user login stage -->
                  <!-- <div class="dropdown">
<button onclick="myFunction()" class="dropbtn"><img src="image/admin-pic.png">Lalit Bisht</button>
  <div id="myDropdown" class="dropdown-content" align="left">
    <ul>
      <li class="tigdm">My bookings</li>
      <li>Saved properties list</li>
      <li>Inbox</li>
      <li>My bookings</li>
    </ul>

    <a href="#">Sign Out</a>
   
  </div>
</div> -->

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
              <div class="row" align="center">
                <div class="text">
                 <p align="center">With Rest &amp; Go<br><span>You’ll Never Forget<br>
                 Your Stay</span>
               </p>
             </div>
           </div>
           <div class="row">
            <div class="col-sm-12 col-md-12 ser home">
             <div class="search-hotel-area">
              <div class="col-sm-4 col-md-4">
               <!-- <form action="/action_page.php" class="icon"> -->
                <label class="se"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                <div id="locationField">
      <input id="autocomplete" placeholder="Enter your address"
             onFocus="geolocate()" type="text"></input>
    </div>
                <!-- </form> -->
              </div>
              <div class="col-sm-2 col-md-2">
               <div class="month-area ss">
                <img src="image/calender.png">
                <div class="time-area">
                 <!-- <form> -->
                  <input type="text" class="form-control hasDatepicker" placeholder="Date" name="date" id="date">
                  <input type="text" class="form-control hasDatepicker" placeholder="Saturday" name="date" id="day">
                  <!-- </form> -->
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-md-2 ">
             <div class="month-area ss">
              <img src="image/calender.png">
              <div class="time-area">
               <!-- <form> -->
                <input type="text" class="form-control hasDatepicker" placeholder="Date" name="date" id="date1">
                <input type="text" class="form-control hasDatepicker" placeholder="Saturday" name="date" id="day">
                <!-- </form> -->
              </div>
            </div>
          </div>
          <div class="col-sm-2 col-md-2 ">
           <div class="month-area ss">
            <img src="image/adult.png"> 
            <div class="time-area">
             <h2>5 adults</h2>
             <p>4 rooms</p>
           </div>
         </div>
       </div>
       <div class="col-sm-2 col-md-2 vv">
         <div class="month-area butt">
          <a href="search.php"> <input type="submit" class="btn btn-default sear" placeholder="Search" name="submit" value="submit"></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

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
          with facebook now and you will never have to</p>
        </div>
        <div class="head-line-pic" align="center">
         <a href="#"><img src="image/face.png"></a>
         <p>or</p>
       </div>
       <div class="enter-area">
        <p>
          Enter your mobile number and we”ll send you a verification 
          code to <span>reset your password</span></p>
        </div>
        <div class="number">
          <form>
            <p>Mobile number</p>
            <div class="input-group">  
              <span class="input-group-addon"><img src="image/flag.png">+60</span>
              <input id="mobno" type="tel" class="form-control" name="msg" placeholder="Additional Info">
            </div>
          </form>
        </div>
        <div class="captcha"></div>
        <div class="submit-area">
          <input type="submit" class="btn btn-info sub" value="Submit">
        </div>

      </div>
    </div>
  </div>



  <!-- second-area -->

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Second">Second</button>
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
                      <div class="input-msg" style="color: red;"><span id="userName-info" class="info"></span></div><br />
                    </div>

                    <div class="form-group as">
                      <label for="email">Last Name*</label>
                      <input type="text" name="lastName" class="form-control se" id="lastName">
                      <div class="input-msg" style="color: red;"><span id="lastName-info" class="info"></span></div><br />
                    </div>

                    <div class="form-group as">
                      <label for="email">Email*</label>
                      <input type="email" name="userEmail" class="form-control se" id="userEmail">
                      <div class="input-msg" style="color: red;"><span id="userEmail-info" class="info"></span></div><br />
                    </div>
                    <div class="form-group as">
                      <label for="email">Password*</label>
                      <input type="password" name="password" class="form-control se" id="password">
                      <div class="input-msg" style="color: red;"><span id="password-info" class="info"></span></div><br />
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
                      <div class="input-msg" style="color: red;"><span id="fname-info" class="info"></span></div><br />
                    </div>

                    <div class="form-group as">
                      <label for="email">Last Name*</label>
                      <input type="text" class="form-control se" id="lname">
                      <div class="input-msg" style="color: red;"><span id="lname-info" class="info"></span></div><br />
                    </div>

                    <div class="form-group as">
                     <div class="number nh">
                      <p>Mobile number</p>
                      <div class="input-group">  
                        <span class="input-group-addon"><img src="image/flag.png">+60</span>
                        <input id="mobno1" type="text" class="form-control de" placeholder="Additional Info">
                        <div class="input-msg" style="color: red;"><span id="mobno1-info" class="info"></span></div><br />
                      </div>
                    </div>

                  </div>
                  <div class="form-group as">
                    <label for="email">Password*</label>
                    <input type="password" class="form-control se" id="password1">
                    <div class="input-msg" style="color: red;"><span id="password1-info" class="info"></span></div><br />
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" id="mob-checkbox"> Email me exclusive Rest & Go promotions. <br>I can unsubscribe at any time as stated in the privacy policy</label>
                    <div class="input-msg" style="color: red;"><span id="mob-checkbox-info" class="info"></span></div><br />
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
                  <img src="image/mail-area.png"><a href="#">Email</a>
                </div>
                <div class="phone-new">
                  <img src="image/mobile-area.png"><a href="#">Mobile</a>
                </div>
              </div>
              <div class="head-line-pic second hh" align="center">
                <p>or</p>
                <a href="#"><img src="image/face.png"></a>

              </div>
              <div class="create-new">
                <h4>No account yet? <input type="submit" class="btn btn-info create new" value="Create Account"></h4>
              </div>

            </div>



            <div class="col-sm-6 col-md-6">
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
                  <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#first">Forgot your password?</button></p>
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
      <div class="head-line ii">
        <p>
          We have sent a verification code to +60-xxxxxxxxxx. This code will expire 1n 10 minutes. <a href="#">Resend code</a></p>
        </div>

        <!-- <form action="" method="post"> -->
          <div id="frmverify">
           <div align="center" id="otp-status" class="replay"></div>
           <div class="verification">

            <ul>
              <li><div class="expire-area" align="center">
               <div class="form-group num">
                <input type="text" name="one" class="form-control old" maxlength="1" id="otp1">
                <div class="input-msg" style="color: red;"><span id="one-info" class="info"></span></div><br />
              </div>
            </div>
          </li>
          <li><div class="expire-area" align="center">
           <div class="form-group num">
            <input type="text" name="two" class="form-control old" maxlength="1" id="otp2">
            <div class="input-msg" style="color: red;"><span id="two-info" class="info"></span></div><br />
          </div>
        </div>
      </li>
      <li><div class="expire-area" align="center">
       <div class="form-group num">
        <input type="text" name="three" class="form-control old" maxlength="1" id="otp3">
        <div class="input-msg" style="color: red;"><span id="three-info" class="info"></span></div><br />
      </div>
    </div>
  </li>
  <li><div class="expire-area" align="center">
   <div class="form-group num">
    <input type="text" name="four" class="form-control old" maxlength="1" id="otp4">
    <div class="input-msg" style="color: red;"><span id="four-info" class="info"></span></div><br />
  </div>
</div>
</li>

<li><div class="expire-area" align="center">
 <div class="form-group num">
  <input type="text" name="five" class="form-control old" maxlength="1" id="otp5">
  <div class="input-msg" style="color: red;"><span id="five-info" class="info"></span></div><br />
</div>
</div>
</li>
<li><div class="expire-area" align="center">
 <div class="form-group num">
  <input type="text" name="six" class="form-control old" maxlength="1" id="otp6">
  <div class="input-msg" style="color: red;"><span id="six-info" class="info"></span></div><br />
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
    Haven't recieved a verification code on your mobile yet? <a href="#">Use another mobile number</a></p>
    <p>Already have a account? <a href="#">Sign In</a></p>
  </div>

  <div class="captcha"></div>


</div>
</div>
</div>



<!-- /container-area -->
</div>




<!-- hotel-area -->

<div class="hotel-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="hotel-content">
          <h2 align="center">Our Hotels</h2>
          <p align="center">The Best Oriental Hotel</p>
          <div class="col-sm-3 col-md-3 pic">
            <img src="image/hotel-1.jpg">
            <div class="boder">
              <div class="dor">
                <ul>
                  <li><h2>Sogor Dormitory</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
                  <li>Address 12, Malaysia<span class="like">4/10</span></li>

                </ul>
              </div>
              <div class="dor new">
                <ul>
                  <li>Price From<span class="dollor">$89</span></li>
                  <li><p>Lorem Ipsum is simply dummy text of the 
                   printing and typesetting industry. 

                 standard dummy text ever</p> </li>
               </ul>
             </div>
             <div class="books" align="center">
              <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-3 pic">
          <img src="image/hotel-2.jpg">
          <div class="boder">
            <div class="dor say">
              <ul>
                <li><h2>Marrioff</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
                <li>Address 12, Malaysia<span class="like">4/10</span></li>

              </ul>
            </div>
            <div class="dor new">
              <ul>
                <li>Price From<span class="dollor">$89</span></li>
                <li><p>Lorem Ipsum is simply dummy text of the 
                 printing and typesetting industry. 

               standard dummy text ever</p> </li>
             </ul>
           </div>
           <div class="books" align="center">
            <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
          </div>
        </div>
      </div>

      <div class="col-sm-3 col-md-3 pic">
        <img src="image/hotel-1.jpg">
        <div class="boder">
          <div class="dor mal">
            <ul>
              <li><h2>Malaysia hotels</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
              <li>Address 12, Malaysia<span class="like">4/10</span></li>
              
            </ul>
          </div>
          <div class="dor new">
            <ul>
              <li>Price From<span class="dollor">$89</span></li>
              <li><p>Lorem Ipsum is simply dummy text of the 
               printing and typesetting industry. 

             standard dummy text ever</p> </li>
           </ul>
         </div>
         <div class="books" align="center">
          <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-md-3 pic">
      <img src="image/hotel-1.jpg">
      <div class="boder">
        <div class="dor sev">
          <ul>
            <li><h2>Seven Terraces</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
            <li>Address 12, Malaysia<span class="like">4/10</span></li>

          </ul>
        </div>
        <div class="dor new">
          <ul>
            <li>Price From<span class="dollor">$89</span></li>
            <li><p>Lorem Ipsum is simply dummy text of the 
             printing and typesetting industry. 

           standard dummy text ever</p> </li>
         </ul>
       </div>
       <div class="books" align="center">
        <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
      </div>
    </div>
  </div>


</div>
</div>
</div>
</div>
</div>
</div>
<!-- /hotel-area --> 

<!-- rest-area -->       

<div class="rest-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-sm-12">
        <div class="rest-content">
          <div class="col-sm-6 col-md-6">
            <div class="everywhere" align="center">
              <h2>REST & GO.com, <br>
              everywhere you go</h2>
            </div>
            <div class="apple">
              <ul>
                <li><a href="#"><img src="image/apple.png"></a></li>
                <li><a href="#"><img src="image/android.png"></a></li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /rest-area --> 


<!-- chef-area --> 

<div class="chef-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="chef-content" align="center">
          <h2>Our Blog</h2>
          <p>The Best Oriental Hotel</p>
          <div class="col-sm-5 col-md-5">
            <div class="blog-area" align="left">
              <h1>01</h1>
              <h3>Our Chef @ Work</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, v Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
              <button type="button" class="btn area">Discover More</button>
            </div>
          </div>
          <div class="col-sm-7 col-md-7">
            <div class="blog-picture">
              <img src="image/blog.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /rest-area -->


<!-- faster -->

<div class="faster-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="faster-content" align="center">
          <h2>Book Faster. Book Easily. Book Rest & Go</h2>
          <p>The Best Oriental Hotel</p>
          <div class="col-sm-7 col-md-7 ww">
            <div class="fast-video">
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/OD5IlLPl5e4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-sm-5 col-md-5 extra">
            <div class="discover" align="right">
              <h4>Luxury Rooms</h4>
              <h2>Discover our Rooms</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
          </div>
          <div class="col-sm-12 col-md-12">
            <div class="ready" align="center">
              <button type="button" class="btn ready">READY TO LAUNCH</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /faster -->


<!-- mail-area -->
<div class="main">
  <div class="mail-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="mail-content" align="center">
            <div class="col-sm-4 col-md-4"><img src="image/mail.png"><h2>MAIL US</h2><p>info@rest&go.com</p>
             <p>Lorem ipsum dolor sit amet, consectetur 
               adipiscing elit, sed do eiusmod tempor incidid
             unt ut labore et dolore magna aliqua.</p>
             <button type="button" class="btn me bb">MAIL ME</button>
           </div>
           <div class="col-sm-4 col-md-4"><img src="image/locat.png"><h2>LOCATE US</h2><p>Malaysia FL 32904</p>
             <p>Lorem ipsum dolor sit amet, consectetur 
               adipiscing elit, sed do eiusmod tempor incidid
             unt ut labore et dolore magna aliqua.</p>
             <button type="button" class="btn me yes">VIEW MAP</button>
           </div>
           <div class="col-sm-4 col-md-4"><img src="image/need.png"><h2>NEED HELP</h2><p>+ 223 446 3343</p>
             <p>Lorem ipsum dolor sit amet, consectetur 
               adipiscing elit, sed do eiusmod tempor incidid
             unt ut labore et dolore magna aliqua.</p>
             <button type="button" class="btn me">CALL US</button>
           </div>

         </ul>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
<!-- /mail-area -->

<!-- footer-area -->

<div class="footer-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="footer-content">
          <div class="footer-logo" align="center">
            <img src="image/footer-logo.jpg">
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="social-media">
              <ul>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-7 col-md-7">
            <div class="information">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Hotels</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Shortcodes</a></li>
                <li><a href="#">Areas</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
            <div class="info-text">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="subscribe">
              <p>Subscribe to Newsletter</p>
              
            </div>
            <div class="plan">
              <form>
                <div class="input-group">
                  <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                  <span class="input-group-addon"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></span>   
                </div>

              </form>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="copy" align="center">
              <p>Copyright © 2017 by Rest & Go</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /footer-area -->      
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5asTcOrsNGE5SD5CSPOaeccksBiz0e1Q&libraries=places&callback=initAutocomplete"
        async defer></script>
<script type="text/javascript">

  $('#date').datepicker({

    dateFormat: 'dd/mm/yy',

    minDate: +0,

    changeMonth: true,

    changeYear: true,

  });

</script>

<script type="text/javascript">

  $(function(){

    $('#date').change(function(){

        //alert('chirag');

        var dat=$("#date").val();

        $('#date1').datepicker({

          dateFormat: 'dd/mm/yy',

          minDate: dat,

          changeMonth: true,

          changeYear: true,

        });

      });



    $("#date1").change(function(){

      var dat=$("#date").val();

      var dat1=$("#date1").val();

        //console.log(dat);

        //console.log(dat1);

        if(dat==dat1){

          $("#time").show();

          $("#time1").show();

        }else{

          $("#time").hide();

          $("#time1").hide();

        }

      })

      $("#date1").click(function(){
        alert('chirag');
      })


  });

</script>

<script type="text/javascript">

  // $(function(){

  //   $('#time').hide();

  //   $("#time1").hide();

  // })

  // $(function(){

  //   $('.timepicker').timepicker({

  //     timeFormat: 'h:mm p',

  //     interval: 30,

  //     minTime: '10',

  //     maxTime: '10:00pm',

  //     defaultTime: '11',

  //     startTime: '10:00',

  //     dynamic: false,

  //     dropdown: true,

  //     scrollbar: true

  //   });

  // })

  function initAutocomplete() {


    console.log('chirag');

      // Create the search box and link it to the UI element.

      var input = document.getElementById('pac-input');

      var searchBox = new google.maps.places.SearchBox(input);

      searchBox.addListener('places_changed', function() {

        var places = searchBox.getPlaces();

        console.log(places);

        if (places.length == 0) {

          return;

        }





      });

    }

    initAutocomplete();



  </script>


  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<script type="text/javascript">
 var divs = ["Div1", "Div2", "Div3", "Div4"];
 var visibleDivId = null;
 function divVisibility(divId) {
  if(visibleDivId === divId) {
    visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
  var i, divId, div;
  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}
</script>
<script>
  function sendEmail2() {
                     //var valid = validateEmail2();


                     $.ajax({
                      url: "adduser.php",
                      type: "POST",
                      data:'submit2='+$("#fname").val()+'&lastName='+$("#lname").val()+'&password='+$("#password1").val()+'&mobno='+$("#mobno1").val(),
                      success:function(data){
                        console.log(data);
                        if(data=='3'){
                         $("#mobno1-info").html("(mobno Already Exist)");
                         $("#mobno1").css('background-color','#FFFFDF');
                       }else{
                      //alert('chirag');
                      $("#otp-check").val(data);
                      $("#fourth").modal('show');
                    }
                    $('#fourth').modal('show'); 
                       // $("#mail-status").html(data);
                     }

                   });


                   }
                   function validateEmail2() {
                    var valid = true;
                    $(".form-control").css('background-color','');
                    $(".info").html('');

                    if($("#fname").val()=="") {
                      $("#fname-info").html("(This field is required)");
                      $("#fname").css('background-color','#FFFFDF');
                      valid = false;
                    }
                    if($("#lname").val()=="") {
                      $("#lname-info").html("(This field is required)");
                      $("#lname").css('background-color','#FFFFDF');
                      valid = false;
                    }
                    if($("#mobno1").val()=="") {
                      $("#mobno1-info").html("(This field is required)");
                      $("#mobno1").css('background-color','#FFFFDF');
                      valid = false;
                    }

                    if($("#password1").val()=="") {
                      $("#password1-info").html("(This field is required)");
                      $("#password1").css('background-color','#FFFFDF');
                      valid = false;
                    }
                    if($("#mob-checkbox").val()=="") {
                      $("#checkbox-info").html("(This field is required)");
                      $("#mob-checkbox").css('background-color','#FFFFDF');
                      valid = false;
                    }                    


                      // if($("#g-recaptcha-response").val()=="") {
                      // $("#g-recaptcha-response-info").html("(Captcha is required)");
                      // $("#g-recaptcha-response").css('background-color','#FFFFDF');
                      // valid = false;
                      // }
                      if(valid==true){
                        sendEmail2();
                      }
                      return valid;
                    }
                  </script>
                  <script>
                    function sendEmail() {
                //console.log('chirag');
                $.ajax({
                  url: "adduser.php",
                  type: "POST",
                  data:'submit1='+$("#userName").val()+'&lastName='+$("#lastName").val()+'&password='+$("#password").val()+'&userEmail='+$("#userEmail").val()+'&checkbox='+$("#checkbox").val(),
                  success:function(data){
                    console.log(data);
                    if(data=='3'){
                     $("#userEmail-info").html("(userEmail Already Exist)");
                     $("#userEmail").css('background-color','#FFFFDF');
                   }else{
                      //alert('chirag');
                      $("#otp-check").val(data);
                      $("#fourth").modal('show');
                    }
                    
                       // $("#mail-status").html(data);
                     }

                   });


              }
              function validateEmail() {
                  //alert('chirag');
                  var valid = true;
                  $(".form-control").css('background-color','');
                  $(".info").html('');

                  if($("#userName").val()=="") {
                    $("#userName-info").html("(This field is required)");
                    $("#userName").css('background-color','#FFFFDF');
                    valid = false;
                  }
                  if($("#lastName").val()=="") {
                    $("#lastName-info").html("(This field is required)");
                    $("#lastName").css('background-color','#FFFFDF');
                    valid = false;
                  }
                  if($("#userEmail").val()=="") {
                    $("#userEmail-info").html("(This field is required)");
                    $("#userEmail").css('background-color','#FFFFDF');
                    valid = false;
                  }
                  if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                    $("#userEmail-info").html("(This is not a valid email format)");
                    $("#userEmail").css('background-color','#FFFFDF');
                    valid = false;
                  }
                  if($("#password").val()=="") {
                    $("#password-info").html("(This field is required)");
                    $("#password").css('background-color','#FFFFDF');
                    valid = false;
                  }
                  if($("#checkbox").val()!=="on") {
                    $("#checkbox-info").html("(This field is required)");
                    $("#checkbox").css('background-color','#FFFFDF');
                    valid = false;
                  }                    
                  

                      // if($("#g-recaptcha-response").val()=="") {
                      // $("#g-recaptcha-response-info").html("(Captcha is required)");
                      // $("#g-recaptcha-response").css('background-color','#FFFFDF');
                      // valid = false;
                      // }
                      if(valid==true){
                        sendEmail();
                      }
                      return valid;
                    }
                  </script>
                  <script>
                    function sendverify() {

                      var otp1=$("#otp1").val();
                      var otp2=$("#otp2").val();
                      var otp3=$("#otp3").val();
                      var otp4=$("#otp4").val();
                      var otp5=$("#otp5").val();
                      var otp6=$("#otp6").val();
                      var otp=otp1+otp2+otp3+otp4+otp5+otp6;
                      var otp_verify=$("#otp-check").val();
                    // console.log(otp);
                    // console.log(otp_verify);
                    if(otp==otp_verify){
                     $.ajax({
                      url: "adduser.php",
                      type: "POST",
                      data:'verify='+$("#otp1").val()+'&two='+$("#otp2").val()+'&three='+$("#otp3").val()+'&four='+$("#otp4").val()+'&five='+$("#otp5").val()+'&six='+$("#otp6").val()+'&userEmail='+$("#userEmail").val()+'&mobno='+$("#mobno1").val(),
                      success:function(data){
                        console.log(data);
                        if(data=='1'){
                          $('#fourth').modal('hide');
                          $('#Second').modal('hide');
                          $('#third').modal('show');
                        }


                      }
                      
                    });
                   }else{
                    alert('otp is not verified');
                  }



                }
                function validateverify() {
                  var valid = true;
                  $(".form-control").css('background-color','');
                  $(".info").html('');

                  if($("#one").val()=="") {
                    $("#one-info").html("please fill");
                    $("#one").css('background-color','#FFFFDF');
                    valid = false;
                  }
                  if($("#two").val()=="") {
                    $("#two-info").html("please fill");
                    $("#two").css('background-color','#FFFFDF');
                    valid = false;
                  }
                  if($("#three").val()=="") {
                    $("#three-info").html("please fill");
                    $("#three").css('background-color','#FFFFDF');
                    valid = false;
                  }
                      // if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                      // $("#userEmail-info").html("(invalid)");
                      // $("#userEmail").css('background-color','#FFFFDF');
                      // valid = false;
                      // }
                      if($("#four").val()=="") {
                        $("#four-info").html("please fill");
                        $("#four").css('background-color','#FFFFDF');
                        valid = false;
                      }
                      if($("#five").val()=="") {
                        $("#five-info").html("please fill");
                        $("#five").css('background-color','#FFFFDF');
                        valid = false;
                      }                    


                      if($("#six").val()=="") {
                        $("#six").html("please fill");
                        $("#six").css('background-color','#FFFFDF');
                        valid = false;
                      }
                      
                      return valid;
                    }

                    function loginvalid(){
                      //alert('chirag');
                      //return true;
                      if($("#loginmobvalid").val()==""){
                        window.alert('Mobile no is required');
                        return false;
                      }

                      if($("#loginmobpass").val()==""){
                        window.alert('Password is required');
                        return false;
                      }

                      $.ajax({
                        url:'adduser.php',
                        type:'post',
                        data:'loginbymob='+$("#loginmobvalid").val()+'&pass='+$("#loginmobpass").val(),
                        success:function(data){
                          console.log(data);
                          if(data=='0'){
                           window.alert('Mobile no doesnt Exist');
                         }else{
                          Session['user_id']=data;
                          window.location.href="index.php";
                        }
                      }
                    })


                    }
                  </script>

                  <!-- end vefification code -->





                </body>
                </html>





                <!-- Modal -->


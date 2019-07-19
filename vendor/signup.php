<?php 
    include_once'Object.php';   

?>
<!doctype html>
<html lang="en">
  <head>
      <link rel="icon" href="https://www.anytimecheckin.com/new/image/24-77.jpg" type="image/gif" sizes="50x50">

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
<script src="js/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

 <script type="text/javascript">
    
   $(document).ready(function(){
    $('#state_name').on('change',function(){
        //alert('kanchan');
         var stateID = $('#state_name').val();
        //alert(stateID);
              if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(data){
                    //alert(data);
                    $('#city').html(data);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });

    // $(function(){
      // $("#state").change(function(){
      //   var stateID = $('#state').val();
      //   //alert(stateID);
      //         if(stateID){
      //       $.ajax({
      //           type:'POST',
      //           url:'ajaxData.php',
      //           data:'state_id='+stateID,
      //           success:function(data){
      //               //alert(data);
      //               $('#city').html(data);
      //           }
      //       }); 
      //   }else{
      //       $('#city').html('<option value="">Select state first</option>'); 
      //   }
      // });
    });

</script>
<body>

        
 <!-- header-inner -->

 <div class="header-inner">
   <div class="container-fluid">
     <div class="row">
       <div class="inner-content">
         <div class="col-sm-4 col-md-4">
           <div class="inner-logo">
                <a href="https://anytimecheckin.com/new"><img src="image/logo.png"></a> 
			</div>
         </div>
         <div class="col-sm-8 col-md-8">
           <div class="yatra" align="right">   
            <div class="uu">
           <!--<p>Already have a Rest & Go for<br /> Business account?</p> -->
           </div>     
             <ul>
               <li><button type="button" class="btn btn-default yatra" id="downClick">Sign Up</button></li>
               <a href="hotel/admin/"><li class="flex">OR <button type="button" class="btn btn-default login">Login</button></li></a>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
            
 <!-- /header-inner -->          

<!-- add-area -->

<div class="add-area">
  <div class="container-fluid">
    <div class="row">
      <div class="add-content">
        <div class="col-sm-5 col-md-5">
          <!--<div class="ready-area">
             <?php if(!empty($msg1)){echo $msg1;}else{echo $msg1='';}?>
            <!-- <form method="post" action=""> -->
            <!-- <h3 align="center">Already have a Anytimecheckin for Business <br>account? Login Now</h3>
            <!-- <form class="rest-form" align="center"> -->
              <!-- <div class="form-group">
                 <input type="email" class="form-control" placeholder="Email" name="vendorEmail" id="vendorEmail">
                 <div class="input-msg" style="color: red;"><span id="vendorEmail-info" class="info"></span></div><br />
                 <input type="password" class="form-control" placeholder="password" name="vendorpassword" id="vendorpassword">
                 <div class="input-msg" style="color: red;"><span id="vendorpassword-info" class="info"></span></div><br />
              </div>

              <button type="submit" class="btn btn-primary" name="login" data-toggle="modal" onclick="return validateVendorLogin();">Login</button>

            <!-- </form> -->
           
               <!-- <div class="checkbox">
               <label class="ch"><input type="checkbox" required=""> Remember me</label>
               </div> -->
               <!-- <button type="button" class="btn btn-default conti">Continue</button> -->
               <!-- <input type="submit" class="conti" name="login" value="Continue"> -->
           <!--  </form> -->
           <!-- <a href="vendor_forget.php">Forgot Password</a>
            <p>By proceeding, you agree with Anytimecheckin for Business <span>Terms of Service </span> & <span>Privacy Policy</span></p>
          </div> -->
        </div>
        <div class="col-sm-7 col-md-7 head-vendorn">
          <div class="stay-area" align="center">
            <h3>Welcome to <span>Anytime Check In </span>for Business</h3>
            <p>You’ll Never Forget Your Stay</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /add-area -->


<!-- buisness-area -->

<div class="buisness-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-1 col-md-1"></div>
      <div class="col-sm-10 col-md-10">
        <?php if(!empty($msg)){echo $msg;}else{echo $msg='';}?>
        <div class="buisness-content" >
          <h3 align="center">Sign Up for  Business</h3>
        
       <div id="frmEmail">

        <div id="mail-status" class="replay"></div>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <!-- <form method="post" action=""> -->
              <div class="form-group">
      <label for="email">Your Full Name</label>
      <input type="text" class="form-control" id="userName" placeholder="First Name" name="userName" >
    </div>
    <div class="input-msg" style="color: red;"><span id="userName-info" class="info"></span></div><br />
            
          </div>
          <div class="col-sm-6 col-md-6">
           
               <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName">              
         
          </div>
          <div class="input-msg" style="color: red;"><span id="lastName-info" class="info"></span></div><br />
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-12 vv">
            <!-- <form class="company"> -->
              <label for="email">Your Company Details</label>
            <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company_name" >
            <div class="input-msg" style="color: red;"><span id="company_name-info" class="info"></span></div><br />

            <input type="text" class="form-control" id="address" placeholder="Registered Address" name="address" >
            <div class="input-msg" style="color: red;"><span id="address-info" class="info"></span></div><br />

          <!-- </form> -->
          </div>
        </div>
<!-- </form> -->


 <!-- start test dropdown -->
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
                        
                    <!-- <select class="date-regis" name="country" id="country" required>
                        <option value="">Select Country</option>
                      <?php 
                      $resultc=$user->getStatebyCountry();
                    foreach ($resultc as $valuec) {
                      ?>
                       <option value="<?php echo $valuec['state_id'];?>"><?php echo $valuec['state_name'];?></option>
                     <?php
                    }
                    
                    ?>                      
                    </select> -->

                    <!--  <select class="date-regis" name="state" id="state">
        <option value="">State</option>
    </select> -->
                    
                   <select class="form-control" name="state_name"  id="state_name" required>
                      <option value="">State</option>
                      <?php 

                    $result=$user->getStatebyCountry();
                    foreach ($result as $value) {
                     ?>
                     <option value="<?php echo $value['state_name'];?>"><?php echo $value['state_name'];?></option>
                     <?php
                    }
                    
                    ?>                      
                      
                    </select> 

            
            <!-- <input type="text" class="form-control" id="gst" placeholder="Select GST State" name="gst"> -->
          </div>
          <div class="input-msg" style="color: red;"><span id="gst-info" class="info"></span></div><br />
           </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">

              <select class="form-control" name="city" id="city">
        <option value="">City</option>
    </select> 

            <!-- <input type="text" class="form-control aa" id="city1" placeholder="Select City" name="city" > -->
          </div>
          <div class="input-msg" style="color: red;"><span id="city-info" class="info"></span></div><br />
        </div>
        </div>

        <!-- end test dropdown -->

       

         <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
            <input type="number" class="form-control" id="zip" placeholder="Post Code" name="zip" >
          </div>
          <div class="input-msg" style="color: red;"><span id="zip-info" class="info"></span></div><br />
           </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
            <input type="number" class="form-control" id="gst_number" placeholder="Business Registration No." name="gst_number">
          </div>
           <div class="input-msg" style="color: red;"><span id="gst_number-info" class="info"></span></div><br />
        </div>
        </div>

         <div class="row">

          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label for="email">Contact details for Anytime Check In business account</label> 
            <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" >
          </div>
          <div class="input-msg" style="color: red;"><span id="mobile-info" class="info"></span></div><br />
           </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email Id" name="email" >
          </div>
          <div class="input-msg" style="color: red;"><span id="email-info" class="info"></span></div><br />
        </div>
        </div>

         <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
            <input type="password" class="form-control" id="pass1" placeholder=" your password" name="pass1">
          </div>
          <div class="input-msg" style="color: red;"><span id="pass1-info" class="info"></span></div><br />
           </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
            <input type="password" class="form-control" id="pass2" placeholder="Re-enter password" name="pass2">
          </div>
          <div class="input-msg" style="color: red;"><span id="pass2-info" class="info"></span></div><br />

        </div>
        </div>

          <div class="row">
          <!-- <div class="col-sm-12 col-md-12 hh">
            <form class="company">
              <label for="email" class="kk">Prove that you're human</label><br>
            <img src="image/captcha.png">
            <p>By signing up, you agree with Rest & Go for Business <span>Terms of Service </span>and <span>Privacy Policy</span></p>
          </form>
          </div> -->
        </div>
        <div class="row" align="center">
          <!-- <button type="button" class="btn btn-default free">Sign up for free</button> -->
          <button type="submit" class="btn btn-primary for-free" name="submit1" data-toggle="modal" onclick="return validateRegistration();">Sign Up </button>
          <!-- <input type="submit" class="free" name="signup" value="Sign Up for Free"> -->
        </div>
        </div>

      <!-- </form> -->
        </div>
      </div>
      <div class="col-sm-1 col-md-1"></div>
    </div>
  </div>
</div>

<!-- /buisness-area -->


<!-- get-area -->

<!--<div class="get-area">
  <div class="container">
    <div class="row">
      <div class="get-content">
        <div class="col-sm-6 col-md-6">
          <div class="but-area" align="center">
            <h3>Anytimecheckin.com, <br>everywhere you go</h3>
            <ul class="nn">
              <li><a href="#"><img src="../image/get1.png"></a></li>
              <li><a href="#"><img src="../image/get2.png"></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="get-pic">
            <img src="image/get.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->

<!-- /get-area --> 
<?php 
include_once'footer.php';
?>


<!-- footer-area -->

<!--<div class="footer-area">
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
                <li><a href="hotel.html">Hotels</a></li>
                <li><a href="info.html">Info</a></li>
                <li><a href="rooms.html">Rooms</a></li>
                <li><a href="Shortcodes.html">Shortcodes</a></li>
                <li><a href="areas.html">Areas</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="signup.php">Business Account</a></li>
                <li><a href="contact.html">Contact Us</a></li>
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
</div>-->
        
<!-- /footer-area -->        
     
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

              
<script type="text/javascript">
  
  $(document).ready(function(){
   
   $("#downClick").click(function() {
     $('html, body').animate({
         scrollTop: $(".buisness-area").offset().top
     }, 1500);
 });
});




</script>

                  <script>

                    function sendRegistration() {

                //console.log('chirag');
                var state_name = $("#state_name").val();
                 //alert(state_name);

                $.ajax({

                  url: "addvendor.php",

                  type: "POST",

                  data:'submit1='+$("#userName").val()+'&lastName='+$("#lastName").val()+'&email='+$("#email").val()+'&company_name='+$("#company_name").val()+'&address='+$("#address").val()+'&state_name='+$("#state_name").val()+'&city='+$("#city").val()+'&zip='+$("#zip").val()+'&gst_number='+$("#gst_number").val()+'&mobile='+$("#mobile").val()+'&pass1='+$("#pass1").val()+'&pass2='+$("#pass2").val(),

                  success:function(data){
                    //alert(data);

                    console.log(data);

                    if(data=='3'){

                     $("#email-info").html("(Email Already Exist)");

                     $("#email").css('background-color','#FFFFDF');

                   }
                   if (data=='1') {
                    alert('Registration successfully but wait for approval');
                    window.location.href = 'signup.php';
                    
                    

                   }
                   else{
                     //alert('vendor not register');
                   }

                    

                       // $("#mail-status").html(data);

                     }



                   });





              }

              function validateRegistration() {

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

                  if($("#email").val()=="") {

                    $("#email-info").html("(This field is required)");

                    $("#email").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                    $("#email-info").html("(This is not a valid email format)");

                    $("#email").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#company_name").val()=="") {

                    $("#company_name-info").html("(This field is required)");

                    $("#company_name").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#address").val()=="") {

                    $("#address-info").html("(This field is required)");

                    $("#address").css('background-color','#FFFFDF');

                    valid = false;

                  }

                   if($("#state").val()=="") {

                    $("#gst-info").html("(This field is required)");

                    $("#state").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#city").val()=="") {

                    $("#city-info").html("(This field is required)");

                    $("#city").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#zip").val()=="") {

                    $("#zip-info").html("(This field is required)");

                    $("#zip").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#gst_number").val()=="") {

                    $("#gst_number-info").html("(This field is required)");

                    $("#gst_number").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#mobile").val()=="") {

                    $("#mobile-info").html("(This field is required)");

                    $("#mobile").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#pass1").val()=="") {

                    $("#pass1-info").html("(This field is required)");

                    $("#pass1").css('background-color','#FFFFDF');

                    valid = false;

                  }
                  if($("#pass2").val()=="") {

                    $("#pass2-info").html("(This field is required)");

                    $("#pass2").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#pass1").val()!==$("#pass2").val()) {

                    $("#pass2-info").html("(Password and Re-password is not same)");

                    $("#pass2").css('background-color','#FFFFDF');

                    valid = false;

                  }                    

                  



                      // if($("#g-recaptcha-response").val()=="") {

                      // $("#g-recaptcha-response-info").html("(Captcha is required)");

                      // $("#g-recaptcha-response").css('background-color','#FFFFDF');

                      // valid = false;

                      // }

                      if(valid==true){

                        sendRegistration();

                      }

                      return valid;

                    }

                  </script>

                  <!-- login script -->

                  <script>

                    function vendorLogin() {
                $.ajax({

                  url: "addvendor.php",

                  type: "POST",

                  data:'login='+$("#vendorEmail").val()+'&vendorpassword='+$("#vendorpassword").val(),
                  success:function(data){
                  alert(data);

                    console.log(data);

                    if(data=='0'){

                     $("#vendorEmail-info").html("(Login detail is incorrect)");

                     $("#vendorEmail").css('background-color','#FFFFDF');

                   } 
                   if(data=='1'){
                   // Session['user_id']=data;

                    window.location.href="https://epimoniapp.com/anytimecheckin/vendor/hotel/admin/dashboard";

                   } 

                   else{
                     Session['user_id']=data;
                     window.location.href="index.php";
                     //alert('vendor not register');
                   }                  

                       // $("#mail-status").html(data);

                     }
                   });

              }

              function validateVendorLogin() {
                  //alert('chirag');
                  var valid = true;
                  $(".form-control").css('background-color','');
                  $(".info").html('');            

                  if($("#vendorEmail").val()=="") {
                    $("#vendorEmail-info").html("(This field is required)");
                    $("#vendorEmail").css('background-color','#FFFFDF');
                    valid = false;
                  }

                  if(!$("#vendorEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                    $("#vendorEmail-info").html("(This is not a valid email format)");
                    $("#vendorEmail").css('background-color','#FFFFDF');
                    valid = false;
                  }                 

                  if($("#vendorpassword").val()=="") {
                    $("#vendorpassword-info").html("(This field is required)");
                    $("#vendorpassword").css('background-color','#FFFFDF');
                    valid = false;
                  }      


                      if(valid==true){
                        vendorLogin();
                      }

                      return valid;

                    }

                  </script>

                  <!-- login script end -->











</body>
</html>





<!-- Modal -->


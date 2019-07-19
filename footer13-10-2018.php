 <?php 
 $url = $_SERVER['HTTP_HOST'].'/anytimecheckin/vendor/';
 ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!-- footer-area -->
<div class="footer-sec"></div>
 <div class="footer-area">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 col-md-12">

        <div class="footer-content">

          <div class="footer-logo" align="center">

            <a href="index.php"><img src="image/logo-footer.png"></a>

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

                <li><a href="https://epimoniapp.com/anytimecheckin/index.php">Home</a></li>

                <li><a href="about.php">About Us</a></li>

                <li><a href="blog.php">Blog</a></li>
                
                <li><a href="vendor/hotel/admin/">Vendor Login</a></li>

                <!-- <li><a href="#">Rooms</a></li>

                <li><a href="#">Shortcodes</a></li>

                <li><a href="#">Areas</a></li>

                <li><a href="#">News</a></li> -->

                <li><a href="contact.php">Contact Us</a></li>

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

              <p>Copyright © 2018 by Anytimecheckin</p>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>



<!-- /footer-area -->      


   

   





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

 var divs = ["Div1", "Div2"];

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


<script type="text/javascript">

 var divs = ["Div3", "Div4"];

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

     // div.style.display = "none";

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
                    //alert(data);

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

                  <!-- forgot password -->

                   <script>

                    function forgot() {

                    $.ajax({
                      url: "adduser.php",
                      type: "POST",
                      data:'email='+$("#yourEmail").val(),
                      success:function(data){
                        //alert(data);
                        //$("#forgetpassword").hide();
                        
                        $("#mail-status").html(data);
                        //$('#first').modal('hide');
                      }
                      
                    });
                

                }

              function validateForgot() {

                  //alert('chirag');
                  //$('#first').modal('hide');

                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');




                  if($("#yourEmail").val()=="") {

                    $("#yourEmail-info").html("(This field is not valid)");

                    $("#yourEmail").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if(!$("#yourEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                    $("#yourEmail-info").html("(This is not a valid email format)");

                    $("#yourEmail").css('background-color','#FFFFDF');

                    valid = false;

                  }                 

                      if(valid==true){

                        forgot();

                      }

                      return valid;

                    }

                  </script>

                  <!-- end forgot password -->


                  <!--mobile forgot password -->

                   <script>

                    function mobileforgot() {

                    $.ajax({
                      url: "adduser.php",
                      type: "POST",
                      data:'mobile='+$("#yourMobile").val(),
                      success:function(data){
                        // alert(data);
                       console.log(data);
                        
                        $("#mail-mobile").html(data);
                        //$('#first').modal('hide');
                      }
                      
                    });
                

                }

              function validateMobileForgot() {

                  //alert('chirag');
                  //$('#first').modal('hide');

                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');

                  if($("#yourMobile").val()=="") {

                    $("#yourMobile-info").html("(This field is not valid)");

                    $("#yourMobile").css('background-color','#FFFFDF');

                    valid = false;

                  }

                                  

                      if(valid==true){

                        mobileforgot();

                      }

                      return valid;

                    }

                  </script>

                  <!-- end mobile forgot password -->




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

                    function loginemail(){

                      if($("#loginemailvalid").val()==""){

                        window.alert('email is required');

                        return false;
                      }
                      if($("#loginemailpass").val()==""){

                        window.alert('Password is required');

                        return false;
                      }

                      $.ajax({

                        url:'adduser.php',

                        type:'post',

                        data:'loginbyemail='+$("#loginemailvalid").val()+'&pass='+$("#loginemailpass").val(),

                        success:function(data){

                           alert(data);

                          if(data=='0'){



                           window.alert('Email doesnt Exist');

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


                <script type="text/javascript">
                  $(document).ready(function() {
                    $('#media').carousel({
                      pause: true,
                      interval: false,
                      autoPlay    : true,
                    });
                  });
                </script>





                <style type="text/css">
                /* carousel */

                .time-area.new input {
                  margin: 0px;
                  height: 20px !important;
                  position: relative;
                  top: -21px;
                  border: none;
                  box-shadow: none;
                }


                .chef-area {
                  display: none;
                }

                .thumbnail{ border: 0px;}
                .media-carousel 
                {
                  margin-bottom: 0;
                  /*padding: 0 40px 30px 40px;*/
                  /*margin-top: 30px*/;
                }
                /* Previous button  */
                .media-carousel .carousel-control.left 
                {
                  left: -45px;
                  background-image: none;
                  background: none repeat scroll 0 0 #222222;
                  border: 4px solid #FFFFFF;
                  border-radius: 23px 23px 23px 23px;
                  height: 40px;
                  width: 40px;
                  margin-top: 5em;
                }
                /* Next button  */
                .media-carousel .carousel-control.right 
                {
                  right: -45px !important;
                  background-image: none;
                  background: none repeat scroll 0 0 #222222;
                  border: 4px solid #FFFFFF;
                  border-radius: 23px 23px 23px 23px;
                  height: 40px;
                  width : 40px;
                  margin-top: 5em;
                }

                span.acc {
                  font-size: 36px !important;
                }

                /* Changes the position of the indicators */
                .media-carousel .carousel-indicators 
                {
                  right: 50%;
                  top: auto;
                  bottom: 0px;
                  margin-right: -19px;
                }

                .header-area{ height: 390px;}

                .col-sm-12.col-md-12.ser{ margin-top: 0px !important;}

                .text p{ margin-top: 0px;}

                /* Changes the colour of the indicators */
                .media-carousel .carousel-indicators li 
                {
                  background: #c0c0c0;
                }
                .media-carousel .carousel-indicators .active 
                {
                  background: #333333;
                }




                .media-carousel img
                {
                  width: 100%;
                  height: 100%;
                }
                /* End carousel */

                .col-sm-4.col-md-4.map-area input {
                  padding: 0px;
                  padding-left: 30px;
                  position: relative;
                  background: none;
                  bottom: 3em;
                  left: 27px;
                }

/*
input#date1 {
    margin: 0px;
    height: 20px !important;
    position: relative;
    top: -7px;
    border: none;
    box-shadow: none;
    }*/




    input::placeholder {
      color: #565353 !important;
      /*font-weight: 600;*/
    }

    .time-area.new input {
      margin-top: 8px !important;
    }



    .login-area:before{ display: none;}
     
  </style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJivoznMnRFWb1MSVVSvFbIxVfGRdIV5Q&libraries=places&callback=initAutocomplete"
     async defer></script>
    <script type="text/javascript">
      var d=$("#day_1").val();
  // alert(d);
  if(d=='1'){
     $("#check_in_time").hide();
        $("#check_out_time").hide();
        $("#check_in_date").show();
        $("#check_out_date").show();
  }
  if(d=='2'){
     $("#check_in_time").show();
        $("#check_out_time").show();
        $("#check_in_date").show();
        $("#check_out_date").show();
  }
    </script>
<?php 
include_once'Object.php';

session_start();

if(isset($_SESSION['user_id']))
{
  $user_id=$_SESSION['user_id'];

  $result=$user->UserInfobyId($user_id);

}

// if(isset($_GET['para1'])){
//   $_SESSION['fname']=$fname=$_GET['para1'];
//   $_SESSION['last_name']=$lname=$_GET['para2'];
//   $_SESSION['email']=$email=$_GET['para3'];

 
// }

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

<!-- <link href="css/style.css" rel="stylesheet" type="text/css" /> -->
<link href="css/style3.css" rel="stylesheet" type="text/css" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"> -->

<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
<!-- top-header -->
<div class="header-area gg">

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

   <a href="user-profile.php"><button class="tablinks "><i class="fa fa-user"></i>My Profile</button></a>


<a href="mybooking.php"><button class="tablinks" ><!--onclick="openCity(event, 'Tokyo')----><i class="fa fa-ticket" aria-hidden="true"></i>My Booking</button></a>
<a href="change-password.php"><button class="tablinks active" ><!--onclick="openCity(event, 'Tokyo')----><i class="fa fa-key" aria-hidden="true"></i>Change Password</button></a>

<a href="logout.php"><button class="tablinks" ><!--onclick="openCity(event, 'Tokyo')----><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</button></a>

</div>

</div>

<div class="col-sm-9 right-side">


<div class="current-pass"> 
  <div id="changepassword-status" class="replay"></div>

    <input type="text" id="current_password"  name="current_password" placeholder="Current Password" required="required"><br> 
    <div class="input-msg" style="color: red;"><span id="current_password-info" class="info"></span></div>
                        <br /> 
    <input type="text" id="new_password" name="new_password" placeholder="New Password"required="required"><br>
    <div class="input-msg" style="color: red;"><span id="new_password-info" class="info"></span></div>
                        <br />
    <!-- <i class="fa fa-eye-slash"></i> --> 

    <input type="text" id="confirme_password" name="confirme_password" placeholder="Confirme Password"required="required"><br>
    <div class="input-msg" style="color: red;"><span id="confirme_password-info" class="info"></span></div>
                        <br />
   <!--  <i class="fa fa-eye-slash"></i> -->

   <input type="hidden" id="user_id" name="user_id"  value="<?php echo $result['user_id'];?>" placeholder="user id">

  <div class="Submit-form">
    <button type="submit" class="btn btn-primary password-button" name="changepassword" style="width: 23%;float: left;position: relative;left: 14%;" data-toggle="modal" onclick="return validatechangepassword();">Submit</button>

      <!-- <a href="#">Submit</a> -->

    </div>

</div>
</div>
</div>
</div>
</div>
</div>
<script>

                    function changepassword() {

               //alert('kanchan');

                $.ajax({

                  url: "ajaxuserprofile.php",

                  type: "POST",

                  data:'changepassword='+$("#current_password").val()+'&new_password='+$("#new_password").val()+'&confirme_password='+$("#confirme_password").val()+'&user_id='+$("#user_id").val(),

                  success:function(data){
                    //alert(data);                
                    

                       $("#changepassword-status").html(data);

                     }

                   });

              } 

              function validatechangepassword() {

                  //alert('chirag');
                  //$('#first').modal('hide');

                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');




                  if($("#current_password").val()=="") {

                    $("#current_password-info").html("(This field is not valid)");

                    $("#current_password").css('background-color','#FFFFDF');

                    valid = false;

                  }

                   if($("#new_password").val()=="") {

                    $("#new_password-info").html("(This field is not valid)");

                    $("#new_password").css('background-color','#FFFFDF');

                    valid = false;

                  }

                   if($("#confirme_password").val()=="") {

                    $("#confirme_password-info").html("(This field is not valid)");

                    $("#confirme_password").css('background-color','#FFFFDF');

                    valid = false;

                  }
               

                      if(valid==true){

                        changepassword();

                      }

                      return valid;

                    }            

                  </script>
				  
</body>
</html>
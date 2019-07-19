<?php 
 include_once'Object.php';

  if(isset($_GET['email'])){
    $email=$_GET['email'];
  }
  if(isset($_POST['submit'])){
    //var_dump($_POST);
    $otp=$_POST['otp'];
    
   
    $result=$user->VerifyAccountfromOtp($email,$otp);
   //var_dump($result);die;
    if($result==1){
      header('Location:index.html');
    }else{

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
<title>Rest & Go</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<body>

        
 <!-- header-inner -->

 <div class="header-inner">
   <div class="container-fluid">
     <div class="row">
      <div class="col-sm-12 col-md-12">
       <div class="inner-content as" align="left">
        <img src="image/inner-logo.png">
        <!--  <div class="col-sm-4 col-md-4">
           <div class="inner-logo">
             <img src="image/inner-logo.png">
           </div>
         </div> -->
        <!--  <div class="col-sm-8 col-md-8">
           <div class="yatra" align="right">   
            <div class="uu">
           <p>Already have a Yatra for<br /> Business account?</p> 
           </div>     
             <ul>
               <li><button type="button" class="btn btn-default yatra">Sign Up</button></li>
               <li class="flex">OR <button type="button" class="btn btn-default login">Login</button></li>
             </ul>
           </div>
         </div> -->
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
        <div class="col-sm-4 col-md-4"></div>
       <div class="col-sm-4 col-md-4">
          <div class="ready-area">
            <h3 align="center">Check your Received Otp <br>on your email</h3>
            <!-- <form class="rest-form" align="center"> -->
              <form action="" method="post">
              <div class="form-group">
                   <input type="text" class="form-control" id="pwd new az" placeholder="Enter Your Otp" name="otp">
              </div>

          
              
               <!-- <button type="button" class="btn btn-default conti ae">Continue</button> -->
               <input type="submit" name="submit" value="Continue" class="conti abc">
            </form>
            <p>By proceeding, you agree with Rest & Go for Business <span>Terms of Service </span> & <span>Privacy Policy</span></p>
          </div>
        </div> 
        <div class="col-sm-4 col-md-4"></div>
      </div>
    </div>
  </div>
</div>

<!-- /add-area -->


<!-- buisness-area -->


        
<!-- /footer-area -->        
     
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

              








</body>
</html>





<!-- Modal -->


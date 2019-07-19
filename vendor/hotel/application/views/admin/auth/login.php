<?php 
 $url = $_SERVER['HTTP_HOST'].'/new/vendor/';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	    <link rel="icon" href="https://www.anytimecheckin.com/new/image/24-77.jpg" type="image/gif" sizes="50x50">
          <title><?=isset($title)?$title:'Vendor Dashboard' ?></title>
          <!-- Tell the browser to be responsive to screen width -->
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- Bootstrap 3.3.6 -->
          <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
           <!-- Custom CSS -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/style.css">
           <!-- jQuery 2.2.3 -->
          <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
		  
<link href="css/style.css" rel="stylesheet" type="text/css" />
       
    </head>
<body style="background: #e8e8ea; ">
 <div class="header-inner">
   <div class="container-fluid login-path">
     <div class="row">
       <div class="inner-content">
         <div class="col-sm-4 col-md-4">
           <div class="inner-logo">
                <a href="http://anytimecheckin.com/new"><img src="https://anytimecheckin.com/new/vendor/image/logo.png"></a> 
			</div>
         </div>
         <div class="col-sm-8 col-md-8">
           <div class="yatra" align="right">   
            <div class="uu">
           <!--<p>Already have a Rest & Go for<br /> Business account?</p> -->
           </div>     
               <li style="list-style: none;"><a href="../../../signup.php"><button type="button" class="btn btn-default yatra" id="downClick" style="background: transparent;">Sign Up</button></a></li>
             <ul>
               <!--<a href="hotel/admin/"><li class="flex">OR <button type="button" class="btn btn-default login">Login</button></li></a>-->
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
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

    <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="login-title">
                    <h3><!--<span>Anytimecheckin</span>-->VENDOR LOGIN</h3>
                </div>
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                </div>
                <?php endif; ?>
                <div class="form-box">
                    <div class="caption">
                        <!--<h4>Sign in to start your session</h4>-->
                    </div>
                    <?php echo form_open(base_url('admin/auth/login'), 'class="login-form" '); ?>
                        <div class="input-group">
                            <input type="email" name="email" id="email" value="vendor@gmail.com" class="form-control" placeholder="Email" >
                            <input type="password" name="password" value="123456" id="password" class="form-control" placeholder="Password" >
                            <input type="submit" name="submit" id="submit" class="form-control" value="Submit">
                        </div>
                         <div class="col-md-12 manager"><a href="<?php echo base_url('admin/auth/forgot')?>" class="form-control">Forgot Password</a></div>
                        <!--<div class="col-md-12" style="padding: 0;"><a href="../../../signup.php" class="form-control"><strong> Vendor Signup</strong></a></div>-->
                       <!--  <div class="col-md-6"><a href="<?php echo base_url('admin/auth/role')?>" class="form-control">Manager/Reception</a></div> -->
                        <div class="col-md-12 manager"><a href="<?php echo base_url('admin/auth/role')?>" class="form-control">Manager/Reception</a></div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
	<div class="footer-space"></div>
</body>



    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>public/dist/js/app.min.js"></script>
  

    <style type="text/css">
    .login-title{
        padding-top: 10px;
    }
    .login-title span{
        font-size: 30px;
        line-height: 1.9;
        display: block;
        font-weight: 700;
    }
    .form-box{
       position: relative;
    background: #ffffff;
    max-width: 375px;
    width: 100%;
    border-top: 5px solid #33b5e5;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    padding: 30px;
    height: 197px;
    /* margin: -20px; */
}
    }
	a.form-control {
    display: block !IMPORTANT;
    width: 100%;
    margin-top: 12px;
}


.manager {
    padding: 0;
    margin-top: 15px;
}

.manager a {
    font-weight: 600;
    border: 1px solid #555;
}

.form-box {

    height: 250px;

}
.form-box {
    min-height: 285px;
    max-height: 300px;
}

  
    .login-form input[type=text], .login-form input[type=password]{
        margin-bottom:10px;
    }
.footer-space {
    margin-bottom: 40px;
}
    .login-form input {
        outline: none;
        display: block;
        width: 100%;
        border: 1px solid #d9d9d9;
        margin: 0 0 20px;
        padding: 10px 15px;
        box-sizing: border-box;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        min-height: 40px;
        font-wieght: 400;
        -webkit-transition: 0.3s ease;
        transition: 0.3s ease;
    }

    .login-form input[type=submit]{
        cursor: pointer;
        background: #33b5e5;
        width: 100%;
        border: 0;
        padding: 8px 15px;
        color: #ffffff;
        -webkit-transition: 0.3s ease;
        transition: 0.3s ease;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        min-height: 40px;
        
    }
	
	
	
	
	
	.inner-logo {
    position: relative;
    left: 29px;
}
.yatra {
    display: inline-flex;
    float: right;
    padding-top: 15px;
}
.yatra ul li {
    color: #3b3d4c;
    font-size: 16px;
    font-family: 'Roboto', sans-serif;
    display: inline-block;
}
button.btn.btn-default.yatra {
    color: #3b3d4c;
    font-size: 17px;
    font-family: 'Roboto', sans-serif;
    margin-right: 20px;
    border: 1px #3b3d4c solid;
    padding: 5px 15px 5px 15px;
    margin-top: 35px;
}
.inner-logo img {
    width: 38%;
    /* padding: 0px 31px; */
}
.inner-logo img {
    margin-top: 23px;
    margin-bottom: 23px;
}
.login-path{
background: #fff;
}
button.btn.btn-default.login {
    color: #fff;
    font-size: 17px;
    font-family: 'Roboto', sans-serif;
    margin-right: 48px;
    border: 1px #3b3d4c solid;
    padding: 5px 20px 5px 20px;
    background: #3b3d4c;
    margin-left: 20px;
    position: relative;
}
li.flex {
    position: relative;
    bottom: 13px;
}
.add-area {
    background: #ffffff url(https://epimoniapp.com/anytimecheckin/vendor/image/signup-back.jpg) no-repeat;
    background-size: cover;
    width: 100%;
    height: 376px;
}
.head-vendorn {
    width: 100%;
}
.stay-area h3 {
    font-family: nyala;
    font-size: 45px;
    color: #fff;
    text-transform: unset;
    margin-top: 12%;
    font-weight: 500;
}
.stay-area h3 span {
    font-size: 55px;
    font-weight: 500;
}
.stay-area p {
    color: #fff;
    font-size: 22px;
}

    </style>
</html>
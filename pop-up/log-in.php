<div class="modal fade" id="third" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered aq" role="document">
<div class="modal-content">
<div class="modal-header">
<h3 align="left">Sign In</h3>
<button type="button" class="close gf" onclick="hidesignup();" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="head-line">
<div class="row">
<div class="col-sm-6 col-md-6 rt ki">
<div class="hate-area">
<!--<p>Hate remembering your Anytime Check In password? Login with Facebook now and you will never have to</p>-->
</div>
<!--<div class="have-mail fd">
<div class="mail-new">
<img src="image/mail-area.png"><a href="#" onclick="divVisibility('Div3');">Email</a>
</div>
<div class="phone-new">
<img src="image/mobile-area.png"><a href="#">Mobile</a>
<!-- <img src="image/mobile-area.png"><a href="#" onclick="divVisibility('Div4');">Mobile</a> -->
<!--</div>
</div>-->
<div class="head-line-pic second hh" align="center">
<!--<p>or</p>-->
<!-- <a href="#"><img src="image/face.png"></a> -->

<!-- Facebook Login -->
<div class="facebook-continue">

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
</div>
<!-- close facebook login -->
</div>
<div class="create-new">
<h4>No account yet? <input type="submit" class="btn btn-info create new" value="Create Account" onclick="createaccount()"></h4>
</div>
</div>
<div class="inner_div">
<div class="col-sm-6 col-md-6" id="Div3">

<div id="signin-status" class="replay"></div>

<div class="promo-area">
<form action="adduser.php" method="post">
<div class="form-group as rr">
<div class="number nh">
<label for="email">Email*</label>
<input type="email" class="form-control de" name="emaillogin" placeholder="Email" id=loginemailvalid >
<div class="input-group">  
<!--<span class="input-group-addon"><!--<img src="image/mail-area.png"></span>-->


<div class="input-msg" style="color: red;"><span id="loginemailvalid-info" class="info"></span></div>
<br />

</div>
</div>
</div>
<div class="form-group as re">
<label for="email">Password*</label>
<input type="password" class="form-control se" name="emailpassword" id="loginemailpass" placeholder="Password" >

<div class="input-msg" style="color: red;"><span id="loginemailpass-info" class="info"></span></div>


<p><button type="button" class="btn btn-primary" data-toggle="modal" onclick="forgetpassword()" >Forgot your password?</button></p>

</div>
<div class="captcha"></div>
<div class="create-area tr tsd" align="center">

<button type="button" class="btn btn-primary" name="loginbyemail" data-toggle="modal" onclick="return validateSignUp();">Sign In</button>

<!-- <input type="submit" class="btn btn-info sign" name="loginbyemail" onclick="return validateSignUp();" value="Sign In"> -->

<!--<p>By proceeding you agree to Anytime Checkin <a href="terms_of_use.php">Terms of Use</a> and <a href="privacy_policy.php">Privacy Policy</a></p>-->
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
<!--<span class="input-group-addon"><img src="image/flag.png">+60</span>-->
<input type="mobile" class="form-control de" name="mobilelogin" placeholder="Additional Info" id=loginmobvalid required="">
</div>
</div>
</div>
<div class="form-group as re">
<label for="email">Password*</label>
<input type="password" class="form-control se" name="mobpassword" id="loginmobpass" required="" placeholder="Password">
<p><button type="button" class="btn btn-primary" data-toggle="modal" onclick="mobileforget()">Forgot your password?</button></p>
</div>
<div class="captcha"></div>
<div class="create-area tr tsd" align="center">
<input type="submit" class="btn btn-info sign" name="loginbymob" value="Sign In">

</div>
</form>
</div>
</div>
</div>
</div>
<div class="row">
<p class="tsd terms">By proceeding you agree to Anytime Check In <a href="page.php?id=6">Terms of Use</a> and <a href="page.php?id=7">Privacy Policy</a></p>
</div>
</div>
</div>
</div>
</div>
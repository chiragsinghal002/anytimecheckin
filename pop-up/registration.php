		<div class="modal fade" id="Second" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered aq" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h3 align="left">Sign Up</h3>
		<button type="button" class="close gf" data-dismiss="modal" onclick="hidesignin();" aria-label="Close">
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
		<img src="image/mobile-area.png"><a href="#" >Mobile</a>
		<!-- <img src="image/mobile-area.png"><a href="#" onclick="divVisibility('Div2');">Mobile</a> -->
		</div>
		</div>
		<div class="head-line-pic second" align="center">
		<p>or</p>
		<!-- Facebook Login -->
		<div class="facebook-continue">

		<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
		</fb:login-button>
		</div>
		<!-- close facebook login -->
		<!-- <a href="#"><img src="image/face.png"></a> -->
		<h4>Already have a account? <a href="#" onclick="return showLogin();">Sign In</a></h4>
		</div>
		</div>
		<!--contact form-->
		<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
		<div class="inner_div">
		<div class="col-sm-6 col-md-6" id="Div1">
		<div class="promo-area">
		<!-- <form method="post" action=""> -->
		<div id="frmEmail">
		<div id="email-login" class="replay"></div>
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
		<!-- <div class="checkbox">
		<label><input type="checkbox" name="checkbox" id="checkbox">     
		Email me exclusive Rest & Go promotions. <br>I can unsubscribe at any time as stated in the privacy policy</label>
		<div class="input-msg" style="color: red;"><span id="checkbox-info" class="info"></span></div>
		</div> -->
		<div class="captcha"></div>
		<div class="create-area">
		<!-- <input type="submit" name="submit1"  class="btn btn-info create" value="Create Account"> -->
		<!-- data-target="#fourth" -->
		<button type="submit" class="btn btn-primary create-pop" name="submit1" data-toggle="modal" onclick="return validateEmail();">Create Account</button>
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

		<script type="text/javascript">
			function preventNumberInput(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58){
        e.preventDefault();
    }
}

$(document).ready(function(){
    $('#userName').keypress(function(e) {
        preventNumberInput(e);
    });
});

$(document).ready(function(){
    $('#lastName').keypress(function(e) {
        preventNumberInput(e);
    });
});
		</script>
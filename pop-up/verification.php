<div class="modal fade" id="fourth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h3 align="left">Verification</h3>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hideverification();">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div id="frmEmail">
<div class="head-line ii">
<!--<p>
We have sent a verification code to Email. This code will expire 1n 2 minutes. 
<!-- <form method="post"> -->
<!--<button type="submit" name="resendcode" onclick="return resendcode();" class="btn btn-info sub Resend">Resend code</button>
<div id="mail-resendcode" class="replay"></div>
<!-- <a href="#">Resend code</a> -->
<!-- </form> -->
<!--</p>-->
</div>
</div>
<!-- <form action="" method="post"> -->

<div id="frmverify">
<div align="center" id="otp-status" class="replay"></div>
<div class="verification">
<!-- <ul>
<li> -->
<!-- 	test -->
<div class="expire-area" align="center">
<div class="form-group num">
<input class="inputs form-control old" name="one" type="text" maxlength="1"  id="otp1" />
<input class="inputs form-control old" name="two" type="text" maxlength="1"  id="otp2"/>
<input class="inputs form-control old" name="three" type="text" maxlength="1"  id="otp3"/>
<input class="inputs form-control old" name="four" type="text" maxlength="1"  id="otp4"/>
<input class="inputs form-control old" name="five" type="text" maxlength="1"  id="otp5"/>
<input class="inputs form-control old" name="six" type="text" maxlength="1"  id="otp6"/>
</div>
</div>
<!-- test -->
<!-- <div class="expire-area" align="center">
<div class="form-group num">
	
<input type="text" name="one" class="inputs form-control old" maxlength="1" id="otp1">
<div class="input-msg" style="color: red;"><span id="one-info" class="info"></span></div>
<br />
</div>
</div> -->
<!-- </li> -->
<!-- <li>
<div class="expire-area" align="center">
<div class="form-group num">
	
<input type="text" name="two" class="inputs form-control old" maxlength="1" id="otp2">
<div class="input-msg" style="color: red;"><span id="two-info" class="info"></span></div>
<br />
</div>
</div>
</li> -->
<!-- <li>
<div class="expire-area" align="center">
<div class="form-group num">
<input type="text" name="three" class="inputs form-control old" maxlength="1" id="otp3">
<div class="input-msg" style="color: red;"><span id="three-info" class="info"></span></div>
<br />
</div>
</div>
</li> -->
<!-- <li>
<div class="expire-area" align="center">
<div class="form-group num">
<input type="text" name="four" class="inputs form-control old" maxlength="1" id="otp4">
<div class="input-msg" style="color: red;"><span id="four-info" class="info"></span></div>
<br />
</div>
</div>
</li> -->
<!-- <li>
<div class="expire-area" align="center">
<div class="form-group num">
<input type="text" name="five" class="form-control old" maxlength="1" id="otp5">
<div class="input-msg" style="color: red;"><span id="five-info" class="info"></span></div>
<br />
</div>
</div>
</li> -->
<!-- <li>
<div class="expire-area" align="center">
<div class="form-group num">
<input type="text" name="six" class="form-control old" maxlength="1" id="otp6">
<div class="input-msg" style="color: red;"><span id="six-info" class="info"></span></div>
<br />
</div>
</div>
</li> -->
<!-- </ul> -->
<input type="hidden" id="otp-check" value="">
</div>
<div class="submit-area">
<button type="submit" name="verify" onclick="return sendverify();" class="btn btn-info sub" style="margin-top: 29px;">Verify</button>
</div>
</div>
<!-- </form> -->
<div class="enter-area as">
<!--<p>
Haven't recieved a verification code on your Email yet? 
<!-- <a href="#">Use another mobile number</a> -->
<!--</p>-->
<p class="have">Already have a account? <a href="#" onclick="return showLogin();">Sign In</a></p>
</div>
<div class="captcha"></div>
</div>
</div>
</div>

<style type="text/css">
	.form-group.num input {
    width: 14%;
    float: left;
    margin: 0px 7px;
}
</style>
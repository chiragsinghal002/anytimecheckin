<div class="container">
	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#first">first</button> -->
	<!-- Modal-first -->
	<div class="modal fade re" id="first" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close jh" data-dismiss="modal"  aria-label="Close" onclick="hideforgotEmail();">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="head-line">
					<p>We will send password on your registered email id
					</p>
				</div>
				<!--<div class="head-line-pic" align="center">
					<a href="#"><img src="image/face.png"></a>
					<p>or</p>
				</div>-->
				<!--<div class="enter-area">
					<p>
						Enter your mobile number and we”ll send you a verification 
						code to <span>reset your password</span>
					</p>
				</div>-->
				<div id="frmEmail">
					<div id="mail-status" class="replay"></div>
					<div class="number">
						<!-- <form> -->
						<label for="email">Your Email Id</label>
							<input id="yourEmail" type="email" class="form-control" name="yourEmail" placeholder="Email Id">

							<div class="input-group">  
								<!--<span class="input-group-addon"><img src="image/mail-area.png"></span>-->
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
		</div>
		<style>

		</style>
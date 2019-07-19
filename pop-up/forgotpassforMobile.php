<div class="modal fade re" id="mobileforget" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close jh" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="head-line">
						<p>Have trouble remembering your Rest & Go password? Login 
							with facebook now and you will never have to
						</p>
					</div>
					<div class="head-line-pic" align="center">
						<a href="#"><img src="image/face.png"></a>
						<p>or</p>
					</div>
					<div class="enter-area">
						<p>
							Enter your mobile number and we”ll send you a verification 
							code to <span>reset your password</span>
						</p>
					</div>
					<div id="frmEmail">
						<div id="mail-mobile" class="replay"></div>
						<div class="number">
							<!-- <form> -->
								<p>Your Mobile No.</p>
								<div class="input-group">  
									<span class="input-group-addon"><img src="image/flag.png">+60</span>
									<input id="yourMobile" type="number" class="form-control" name="yourMobile" placeholder="Mobile No.">
								</div>
								<div class="input-msg" style="color: red;"><span id="yourMobile-info" class="info"></span></div>
								<br />
								<div class="captcha"></div>
								<div class="submit-area">
									<input type="submit" name="mobile" onclick="return validateMobileForgot();" class="btn btn-info sub" value="Submit">
								</div>
								<!-- </form> -->
							</div>
						</div>
					</div>
				</div>
			</div>
<?php
session_start();

if(isset($_POST['submit']))
{
    $_SESSION['apiKey'] = 'b07ad9f31df158edb188a41f725899bc';
    $_SESSION['loginID'] = 'Mobiversa';
    $_SESSION['paymentMode'] = 'https://demo.mobiversa.com/payment/myapiservice/jsonservice';	

	$pass = $_POST['cardnum'].'#'.$_POST['ccv'].'#'.substr($_POST['exp_yy'], -2).$_POST['exp_mm'];

	$encrypted = base64_encode(openssl_encrypt($pass, 'aes-128-cbc', substr($_SESSION['apiKey'], 0, 16), OPENSSL_RAW_DATA, substr($_SESSION['apiKey'], -16)));

	$data=array("service"=>"ECOMAPI_SALE_REQ", "orderId"=>$_POST['ordrid'], "amount"=>$_POST['amount'], "email"=>$_POST['emailid'], "carddetails"=>strtoupper(implode(unpack("H*", $encrypted))));
	$_SESSION['carddetails']=strtoupper(implode(unpack("H*", $encrypted)));

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $_SESSION['paymentMode']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$headers = array("mobiApiKey:".$_SESSION['apiKey'], "loginId:".$_SESSION['loginID']);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$server_output = curl_exec ($ch);

	curl_close ($ch);
	$fresult=json_decode($server_output, true);
	
	if(isset($fresult['responseData']['paReq']))
	{
		if($fresult['responseData']['paReq']!='')
		{
			echo '<form name="Payer" id="Payer" action="'.$fresult['responseData']['url'].'" method="post">
	 				<input type="hidden" name="PaReq" value="'.$fresult['responseData']['paReq'].'"/>
					<input type="hidden" name="TermUrl" id="TermUrl" value="http://anytimecheckin.com/new/card/callback.php"/>
					<input type="hidden" name="MD" value="'.$fresult['responseData']['trackid'].'"/>
					</form>
						<script>document.getElementById("Payer").submit();</script>
					';
			$_SESSION['trackid']=$fresult['responseData']['trackid'];
		}
	}
	else if(isset($fresult['responseCode']))
	{
		if($fresult['responseCode']=='0001')
		{
			echo $fresult['responseDescription'];
		}
	}

	
}
?>


<form action="" method="post">
Card Number:<br>
<input type="text" name="cardnum" value="4918914107195005"><br><br>
Ccv:<br>
<input type="text" name="ccv" value="123"><br><br>	
ExpDate:<br>
<input type="text" name="exp_mm" placeholder="MM" value="07" style="width:25px;"> <input style="width:40px;" type="text" name="exp_yy" placeholder="YYYY" value="2019"><br><br>	
Email Address:<br>
<input type="text" name="emailid" value="nafees_ghyas@hotmail.com"><br><br>
Amount:<br>
<input type="text" name="amount" value="10"><br><br>
Order ID:<br>
<input type="text" name="ordrid" value="1001"><br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php 
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');
if($_REQUEST['paymentGateway']=='GATEWAY12345')
{
	
	session_start();
	$_SESSION['apiKey'] = 'b07ad9f31df158edb188a41f725899bc';
	$_SESSION['loginID'] = 'Mobiversa';
	$_SESSION['paymentMode'] = 'https://demo.mobiversa.com/payment/myapiservice/jsonservice';	
	$_POST['orderid']=$user->random_num(9);
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
	// var_dump($_SESSION);
	curl_close ($ch);
	$fresult=json_decode($server_output, true);
	// var_dump($fresult);
	if(isset($fresult['responseData']['paReq']))
	{
		if($fresult['responseData']['paReq']!='')
		{
			echo '<form name="Payer" id="Payer" action="'.$fresult['responseData']['url'].'" method="post">
			<input type="hidden" name="PaReq" value="'.$fresult['responseData']['paReq'].'"/>
			<input type="hidden" name="TermUrl" id="TermUrl" value="https://anytimecheckin.com/new/api/callback.php"/>
			<input type="hidden" name="MD" value="'.$fresult['responseData']['trackid'].'"/>
			</form>
			<script>document.getElementById("Payer").submit();</script>
			';
			$_SESSION['trackid']=$fresult['responseData']['trackid'];
			$data=array('payer'=>$fresult['responseData']['url'],'PaReq'=>$fresult['responseData']['paReq'],'MD'=>$fresult['responseData']['trackid']);
		}
	}else if(isset($fresult['responseCode']))
	{
		if($fresult['responseCode']=='0001')
		{
			$data=array('result'=>$fresult['responseDescription']);
  			// $payment_response=$fresult['responseDescription'];
		}
	}
	echo json_encode($data);
}
?>
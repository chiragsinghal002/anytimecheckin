<?php
session_start();

if(isset($_POST['PaRes']))
{
        
        $data=array("service"=>"ECOMAPI_SALE_3DSREQ", "trackid"=>$_SESSION['trackid'], "paRes"=>$_POST['PaRes'], "carddetails"=>$_SESSION['carddetails']);

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
 
        if($fresult['responseMessage']=='SUCCESSFUL')
        { 
                echo 'Payment accepted!'; 
        }
        else 
        {
                echo $fresult['responseDescription'];
        }
}
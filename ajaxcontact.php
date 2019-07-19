<?php 
include_once'Object.php';

if (isset($_POST['contact'])) { 

  $data['name']=$_POST['contact'];

  $data['email']=$_POST['email'];

  $data['phone']=$_POST['phone'];

  $data['subject']=$_POST['subject'];

  
  // mail

  $to = 'kanchan.netmaximus@gmail.com';
     $subject = "Anytime Check In Inquiry";
     $message = "
     <table style='width: 100%;'>
<tbody><tr style='
    border-bottom: 2px solid #222;
'>
  <td style='text-align: center; width: 100%;'><img src='https://anytimecheckin.com/new/image/top-logo.png'></td>
</tr>
</tbody></table>

<table style='width:100%;margin-top: 25px;'>

</table>

<table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
<tr>
  <td color: #222;>Name:- ".$data['name'].",</td>
</tr>

<tr>
  <td color: #222;>Email:- ".$data['email'].",</td>
</tr>

<tr>
  <td color: #222;>Phone:- ".$data['phone'].",</td>
</tr>

<tr>
  <td color: #222;>Subject:- ".$data['subject'].",</td>
</tr>



<br />

<tr>
<td>Thanks,</td>
</tr>

<tr>
<td>Anytime Check In</td>
</tr>

<tr>
<td>info@anytimecheckin.com</td>
</tr>

</table>

<table style=' width: 100%; 
    padding-top: 20px;'>
  <tr><td></td></tr>
</table>




<style>


td {
    font-size: 18px; color:#222;
}

</style>
          
          ";

    //echo $message;

                        // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
          $headers .= 'From: info@anytimecheckin.com' . "\r\n";
          $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
          

               // echo'<pre>';
               // print_r($message);die;

          $mail = mail($to,$subject,$message,$headers);

  // end mail

   
   if ($mail) {
     //echo 'data updated successfully';
     print "<p style='color:green;font-size:13px;text-align: center;''>Mail Sent Successfully</p>";

     ?>
     <script type="text/javascript">
      setTimeout(function(){
       window.location.reload(1);
     }, 3000);
   </script>

     <?php
   }
   else{
      print "<p style='color:red;font-size:13px''>Mail not Sent</p>";
   }
   
}




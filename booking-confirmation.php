<?php
include_once'Object.php';
session_start();
// var_dump($_SESSION);die;
if(isset($_SESSION['user_id'])){

  $user_id=$_SESSION['user_id'];

  $userresult=$user->UserInfobyId($user_id);
  
}


// if (isset($_POST['paynow'])) {
  //  $result_book=$user->BookingConfirm($_SESSION['hotel_id']);

  // if($result_book){

$resultbooking=$user->GetBookingConfirmbyId($_SESSION['booking_id']);
// var_dump($_SESSION);
// var_dump($resultbooking);
$hid = $resultbooking['hotel_id'];
$rid = $resultbooking['room_type_id'];

// echo "<pre>";
// print_r($resultbooking);

$result=$user->Hoteldetailbyid($_SESSION['hotel_id']);

$vid =  $result['hotel_vendor_id'];

$vendordetail=$user->GetVendorbyID($vid);

$vemail = $vendordetail['v_email'];

$Admindetail=$user->GetAdminDetail();

$adminemail = $Admindetail['email'];


$result1=$user->Roomdetailbyid($_SESSION['hotel_room_type_id']);


$room_pic=$user->RoomPhotosbyid($result1['room_type_id']);
  // echo "<pre>";
  // print_r($room_pic);
$pics = $room_pic['room_photo'];
$exp_pics = explode(',', $pics);
  // echo "<pre>";
  // print_r($exp_pics);die;





$to = $_SESSION['email'];
$subject = "Anytime Check In Booking";               

    //echo $message;

$original = date('Y-m-d');
$startdate = date("j F, Y", strtotime($original));

$check_in_date = $_SESSION['check_in_date'];
$checkdate = date("j F, Y", strtotime($check_in_date));

$check_out_date = $_SESSION['check_out_date'];
$checkoutdate = date("j F, Y", strtotime($check_out_date));

             $your_date = strtotime($check_in_date); // or your date as well
             $now = strtotime($check_out_date);
             $datediff = $now - $your_date;
               //$days1=($datediff / 3600/24/30 );
             $days1= round($datediff / (60 * 60 * 24));
               //echo $days=floor($days1);

             if($datediff ==0){
               $night = 1;
             }else{
               $night = $days1;
             }

             $actual_price = $_SESSION['total_price'];
              // $night = '1';
             $total = $actual_price*$night;

             $noofroom = $_SESSION['noofroom'];

             $total1 = $total*$noofroom; 



// test code for discount 
             

             $resultdiscount=$user->GetDiscountbyhotelandroomid($hid,$rid);
             //var_dump($resultdiscount);
             $discount_for =$resultdiscount['discount_for'];
             $discount_price =$resultdiscount['discount_price'];
             $discount_percent =$resultdiscount['discount_percent'];
             $max_hour=$resultdiscount['max_hour'];
             $min_hour=$resultdiscount['min_hour'];
             $max_day=$resultdiscount['max_day'];
             $min_day=$resultdiscount['min_day'];

              // echo "<pre>";
              // print_r($resultdiscount);


             if(!empty($discount_for=='1')){
              if(!empty($discount_price)){
                $discount = $discount_price.' '.'RM';
              }else{
                $discount = $discount_percent.'%';
              }
            }else if(!empty($discount_for=='2')){
              if(!empty($discount_price)){
                $discount = $discount_price.' '.'RM';
              }else{
               $discount = $discount_percent.'%';
             }
           }else{

           }

           if(!empty($discount_for=='2')){

                        //if($min_day<=$days1){
                          //if($days1<=$max_day){
             if(!empty($discount_price)){

                            // echo $abc1=$discount_price;
               $abc1=$discount_price;
             }else{
              $abc=$total1*$discount_percent;
                            // echo $abc1=$abc/100;
              $abc1=$abc/100;

            }
                        // }else{
                        //   echo $abc1='0';
                        // }
                      // }
                      // else{
                      //   echo $abc1='0';
                      // }
          }
          else if(!empty($discount_for=='1')){                      
                     // if($min_hour<=$hour){

                      // if($hour<=$max_hour){
           if(!empty($discount_price)){

                        // echo $abc1=$discount_price;
             $abc1=$discount_price;
           }else{


            $abc=$total1*$discount_percent;
                        // echo $abc1=$abc/100;
            $abc1=$abc/100;
                      // }
                    // }else{

                    //   echo $abc1='0';
                    // }
                  // }
                  // else{

                  //   echo $abc1='0';
                  // }
          }}
          else{

                  // echo $abc1='0';
            $abc1='0';
          }

           //end test code for discount 


          $pricee=($total-$abc1)*10/100;

        // $tdiscount = $total1;
        //     $per = $tdiscount*20;
        //     $totaldiscount = $per/100;

          $totaldiscount = $total1-$abc1;

          $a = $total1;
          $b = $totaldiscount;
          $c = $total1-$totaldiscount;

          $d = $c*10;
          $netbooking = $d/100;

       // $a = $total1;
       //        $b = $totaldiscount;
       //        $c = $total1-$totaldiscount;

       //        $d = $c*10;
       //      $netbooking = $d/100;

          $Outstanding = $c-$netbooking;

          ?>


          <!-- for time code -->

          <li>
              <?php 

              $your_date = strtotime($check_in_date); // or your date as well
               $now = strtotime($check_out_date);
               $datediff = $now - $your_date;
               //$days1=($datediff / 3600/24/30 );
               $days1= round($datediff / (60 * 60 * 24));
               if($datediff !=0){
                 $ttday =  $days1;
              $tdays = "<td style='color: #000; font-size: 14px;'><b>Total Days</b><br />".$ttday."</td>";
               }else{

                 $check_in_time = $resultbooking['check_in_time']; // or your date as well
               $check_out_time = $resultbooking['check_out_time'];
                if(!empty($check_in_time && $check_out_time)){
                  $checkInTime=strtotime($check_in_time);
                  $checkOutTime=strtotime($check_out_time);
                  $timediff = $checkOutTime - $checkInTime;
                  $hour=($timediff / 3600 );

                   if($hour !=0){

                      //date_default_timezone_set('Asia/Kolkata');
   $chekin = date("h:i a ",$checkInTime);
   $chekout = date("h:i a ",$checkOutTime); 

                  $ttday =  floor($hour).'('.$chekin.' to '.$chekout.')';

                    $tdays = "<td style='color: #000; font-size: 14px;'><b>Total Hours</b><br />".$ttday."</td>";
               ?>
                <!-- <h2>Total Hours</h2> -->
               <?php
               }

               }

               }
               ?>
             

              <p>
              <?php 

              $your_date = strtotime($check_in_date); // or your date as well
               $now = strtotime($check_out_date);
               $datediff = $now - $your_date;
               //$days1=($datediff / 3600/24/30 );
               $days1= round($datediff / (60 * 60 * 24));
               if($datediff !=0){
                $ttday =  $days1;
               }
               else{
                $check_in_time = $resultbooking['check_in_time']; // or your date as well
               $check_out_time = $resultbooking['check_out_time'];
                if(!empty($check_in_time && $check_out_time)){
                  $checkInTime=strtotime($check_in_time);
                  $checkOutTime=strtotime($check_out_time);
                  $timediff = $checkOutTime - $checkInTime;
                  $hour=($timediff / 3600 );

                 // date_default_timezone_set('Asia/Kolkata');

                   $originaltime = $row['check_in_time'];
              $chekin =  date("h:i a",strtotime($originaltime));
           //$check_in_date = date("d/m/Y", strtotime($originaltime));

            $originaltime1 = $row['check_out_time'];
           $chekout =  date("h:i a",strtotime($originaltime1));

   // $chekin = date("h:i:a ",$checkInTime);
   // $chekout = date("h:i:a ",$checkOutTime); 

                  $ttday =  floor($hour).'('.$chekin.' to '.$chekout.')';

               } }
           
            ?></p></li>


          <!-- end for time code -->




          <!-- test code -->

          <?php 
          $resultdiscount=$user->GetDiscountbyhotelandroomid($hid,$rid);
          if ($resultdiscount) { 


            $dis =  "<tr class='discount'>
            <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>Discount:</td>
            <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>".$discount."</td>
            <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>RM ".number_format($abc1)."</td>
            </tr>";
          }

         $bookamount = "<tr class='discount'>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>Booking Amount</td>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'> Rounding up </td>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'> RM ".number_format($resultbooking['booked_price'])."</td>
          </tr>";

          $Outstanding = "<tr class='discount'>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>Outstanding Amount</td>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>Rounding up </td>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>RM ".number_format($total-$resultbooking['booked_price'])."</td>
          </tr>";

          if ($resultbooking['no_of_childs']>1) {
            $child1= "Children";
          }else{
            $child1= "Child";
          }
          $child = " <td style='color: #000; font-size: 14px;'><b>$child1:</b> <br />".$resultbooking['no_of_childs']."</td>";

          $message = "

          <table style='width: 100%;'>
          <tbody>
          <tr style='border-bottom: 2px solid #222;'>
          <td style='text-align: center; width: 100%;'><img src='https://anytimecheckin.com/new/image/top-logo.png'></td>
          </tr>
          </tbody>
          </table>

          <table style='width:100%;margin-top: 25px;'>
          <tr>
          <td style='font-size: 14px; color:#000;'> Booking Id: ".$resultbooking['hotel_booking_id']."</td>
          <td style='text-align: right; color: #000; font-size: 14px;'>Booked by: ".$userresult['fname']." on ". $startdate."</td>
          </tr>

          <tr>

          <!--<td style='width: 380px;'><img src='http://anytimecheckin.com/new/image/".$exp_pics[0]."' style='width: 300px; height:187'></td>-->



          <!-- <td style='width: 380px;'><img src='http://anytimecheckin.com/new/image/crown.png'></td>-->



          <td style='color: #000; font-size: 14px;'>
          <ul style='list-style: none;'>
          <li>".$result['hotel_name']." </li>
          <li>".$result['hotel_address']." ,".$result['hotel_city'].",".$result['hotel_pin_code']."</li>
          <!--<li>".$result['hotel_description']."</li>-->

          </ul>
          </td>
          </tr>

          </table>


          <table style='width:100%'>
          <tr class='heading'>
          <td style='color: #000; font-size: 14px;'><b>Check In:</b> <br />".$checkdate."</td>
          <td style='color: #000; font-size: 14px;'><b>Check Out:</b> <br /> ".$checkoutdate." </td>
          <td style='color: #000; font-size: 14px;'><b>Guest:</b> <br />".$_SESSION['no_of_person']."</td>
          $child
          <td style='color: #000; font-size: 14px;'><b>Room Type:</b> <br />".$result1['hotel_room_type']." </td>
          <td style='color: #000; font-size: 14px;'><b>No. of Room: </b><br />".$_SESSION['noofroom']."</td>

        $tdays
          </tr>


          </table>


          <table style='width:100%'>
          <tr class='heading'>
          <td style='color: #000; font-size: 14px; font-weight: bold;'> Primary Guest:</td>
          <td style='color: #000; font-size: 14px; font-weight: bold;'> Mobile Number: </td>
          <td style='color: #000; font-size: 14px; font-weight: bold;'>Email ID:</td>
          </tr>

          <tr class='date'>
          <td style='color: #000; font-size: 14px;'>".$_SESSION['fname']."</td>
          <td style='color: #000; font-size: 14px;'>".$_SESSION['mob_no']."</td>
          <td style='color: #000; font-size: 14px;'> ".$_SESSION['email']."</td>
          </tr>
          </table>


          <table style='width: 100%'>
          <tr class='discount'>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>Room Tariff: </td>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>RM ".$actual_price." </td>
          <td style='border: 1px solid #ccc; color: #000; font-size: 14px;'>RM ".$total."</td>
          </tr>




          $bookamount

          $Outstanding
          </table>

          <table style='width:100%;'>

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


          <style>
          td ul li {
            padding: 13px 0px;
          }

          tr.heading td {
            font-size: 20px;
            font-weight: bold;
          }

          tr.discount td {
            border: 1px solid #bfbfbf;
            padding: 15px;
          }

          tr.discount td {
            padding: 18px 15px;
          }

          td {
            font-size: 14px;
          }
          tr.heading th {
            text-align: left;
            font-size: 18px;
            padding-top: 35px;
          }
          tr.date td {
            padding: 20px 0px;
          }

          table td {
            color: #000;
          }
          </style>                          
          ";
          // echo $message;
          // die;

                        // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
          $headers .= 'From: info@anytimecheckin.com' . "\r\n";
          $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
          $headers .= 'Cc:'.$adminemail . "\r\n";
          $headers .= 'Cc:'.$vemail . "\r\n";


//           echo "<pre>";
// print_r($message);die;
          $mail = mail($to,$subject,$message,$headers);

  // }


// }


          ?>
          <!doctype html>

          <html lang="en">

          <head>

            <meta charset="utf-8">

            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <!--<![endif]-->

            <!-- meta -->

            <meta charset="UTF-8">

            <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

            <title>Anytime Check In</title>



            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">



            <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
            <link href="css/responsive.css" rel="stylesheet" type="text/css" />



            <link href="css/style.css" rel="stylesheet" type="text/css" />

            <script src="js/jquery.min.js"></script>

            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">



            <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
            <script src="https://www.paypalobjects.com/api/checkout.js"></script>
          




    <body>





     <!-- header -->

     <div class="new-header">

      <div class="container">

        <div class="row">

          <div class="col-sm-3 col-md-3">

            <div class="new-logo">

              <a href="index.php"><img src="image/logo1.png"></a>

            </div>

          </div>

          <div class="col-sm-9 col-md-9 range-details">

            <div class="coustmer-area" align="center">

              <ul>

                <li><span>1</span><br><p>Customer Information</p></li>

                <li><span>2</span><br><p>Payment Information</p></li>

                <li class="active"><span>3</span><br><p>Booking is confirmed</p></li>

              </ul>

            </div>

          </div>

        </div>

      </div>

    </div>






    <!-- /header -->          





    <!-- /great-area -->



    <div class="great-area">

      <div class="container">

        <div class="row">

          <div class="col-sm-12 col-md-12">

           <div class="great-content" align="center">

            <h2><img src="image/right.png">GREAT! YOUR STAY IS CONFIRMED</h2>

            <h3>Thank you for booking with us</h3>

            <p>You will soon receive an email confirmation on <?php if(!empty($_SESSION['email'])){echo $_SESSION['email'];}?></p>

            <!-- <button type="button" class="btn btn-default print"><i class="fa fa-print" aria-hidden="true"></i> Print</button> -->

          </div>

        </div>

      </div>

    </div>

  </div>



  <!-- oyo-area -->



  





<!-- know-area -->



<!-- secure-area  -->







<!-- mat-area -->     







<!-- /pay-area --> 









<!-- manila-area -->





<!-- /manila-area -->





<!-- queen-area -->







<!-- /queen-area -->

<!-- majestic-area -->





<!-- premier-area -->









<!-- footer-area -->

<?php 
include_once('footer.php');
?>



<!-- /footer-area -->        














<script type="text/javascript">jssor_1_slider_init();</script>









</body>

</html>











<!-- Modal -->




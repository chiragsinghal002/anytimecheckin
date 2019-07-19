<?php
include_once'Object.php';
session_start();
if(isset($_SESSION['user_id'])){

  $user_id=$_SESSION['user_id'];

  $userresult=$user->UserInfobyId($user_id);
  // echo "<pre>";
  // print_r($userresult);

    //var_dump($userresult);


}

if (isset($_GET['booking_id'])) {
  // echo "<pre>";
  // print_r($_GET['booking_id']);
$result_book = $_GET['booking_id'];


    $resultbooking=$user->GetBookingConfirmbyId($result_book);
      $hid = $resultbooking['hotel_id'];
      $rid = $resultbooking['room_type_id'];

     $result=$user->Hoteldetailbyid($resultbooking['hotel_id']);

  $result1=$user->Roomdetailbyid($resultbooking['room_type_id']);
  // echo "<pre>";
  // print_r();

  $room_pic=$user->RoomPhotosbyid($result1['room_type_id']);

  $pics = $room_pic['room_photo'];
  $exp_pics = explode(',', $pics);

  
}

 
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

<title>Anytime Check in</title>



<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">



<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

  <link href="css/responsive.css" rel="stylesheet" type="text/css" />


<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/style3.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">



<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>



 

<body>



        

 <!-- header -->



<div class="new-header">

  <div class="container">

    <div class="row">

      <div class="col-sm-5 col-md-5">

        <div class="logo-area">

          <a href="index.php"><img src="image/logo-footer.png"></a>

        </div>

      </div>

      <div class="col-sm-7 col-md-7">

      
        <div class="user-area">

          <p><a href="#"><i class="fa fa-user"></i> <?php echo $userresult['fname'].' '.$userresult['lname'];?></a></p>

        </div>
      </div>

    </div>

  </div>

</div>

     
<div class="left-tab-area">

  <div class="container">

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12 act">

        <div class="col-sm-3 left-sidebar">

        <div class="tab">

<!-- <button class="tablinks active" onclick="openCity(event, 'London')"><i class="fa fa-calendar"></i>My Booking</button> -->

   <a href="user-profile.php"><button class="tablinks active"><i class="fa fa-user"></i>My Profile</button></a>


<a href="mybooking.php"><button class="tablinks" ><!--onclick="openCity(event, 'Tokyo')----><i class="fa fa-ticket" aria-hidden="true"></i>My Booking</button></a>
<a href="change-password.php"><button class="tablinks" ><!--onclick="openCity(event, 'Tokyo')----><i class="fa fa-key" aria-hidden="true"></i>Change Password</button></a>
<a href="logout.php"><button class="tablinks" ><!--onclick="openCity(event, 'Tokyo')----><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</button></a>

</div>

</div>

<div class="col-sm-9 right-side">

<div id="London" class="tabcontent" style="display:none;">

  <h3>London</h3>

  <p>London is the capital city of England.</p>

</div>

<div id="Paris" class="tabcontent" style="display:none;">
<div class="oyo-area">


    <div class="row">

      <div class="col-sm-6 col-md-6">

        <div class="oyo-text">

          <p>Booking ID</p>

          <h2><?php echo $resultbooking['hotel_booking_id'];?></h2>

        </div>

      </div>

      <div class="col-sm-6 col-md-6">

        <div class="oyo-content">
          <?php 
          $original = $resultbooking['book_created_at'];
           $startdate = date("j F, Y", strtotime($original));
          ?>

          <p align="right">Booked by <?php echo $userresult['fname'];?> on  <?php echo $startdate;?></p>

        </div>

      </div>

    </div>

     <div class="row">

        <div class="col-sm-4 col-md-4">

          <div class="oyo-pic">

            <?php 
           // if (!empty($result['main_image'])) {
        if (!empty($pics)) {

          $thumbimage2=explode(".",$exp_pics[0]);

          
$thumbimagefinal2=$thumbimage2[0]."_thumb.".$thumbimage2[1];
         ?>
          <img src="image/Room/<?php echo $thumbimagefinal2;?>"> 
         <!-- <img src="image/<?php echo $exp_pics[0];?>"> -->
         
         <?php
       }
       else{
        ?>
       <img src="image/no-image.png" />
        <?php
      }
      ?>


             <?php 
            //if(!empty($result['main_image'])){
              ?>
             <!--  <img src="image/<?php echo $result['main_image'];?>" /> -->

              <?php
            // }
            // else{
              ?>
               <!-- <img src="image/no-image.png" /> -->

              <?php
           // }
            ?>

           <!--  <img src="image/crown.png">
 -->
          </div>

        </div>

        <div class="col-sm-8 col-md-8">

          <div class="crown-area">

            <h2><?php echo $result['hotel_name'];?></h2>

           <!--  <h3>Crown Residency</h3> -->

            <p><?php echo $result['hotel_address'].','.$result['hotel_city'].','.$result['hotel_pin_code'];?></p>

            <p><span>Hotel Description :</span> <?php echo $result['hotel_description'];?></p>

            <!-- <p><span>Landmark :</span> <?php echo $result['hotel_landmark'];?></p> -->

          </div>

        </div>

      </div>

      <div class="row">

        <div class="adult-text">
          <ul>

            <li><h2>Check In</h2> <p>

              <?php 
              $check_in_date = $resultbooking['check_in_date'];
           $checkdate = date("j F, Y", strtotime($check_in_date));

              echo $checkdate;?>
                
              </p></li>

            <li><h2>Check Out</h2> <p><?php 
             $check_out_date = $resultbooking['check_out_date'];
           $checkoutdate = date("j F, Y", strtotime($check_out_date));

            echo $checkoutdate;?>
              
            </p></li>




            <li><h2> Guest</h2> <p><?php echo $resultbooking['no_of_adults'];?></p></li>

            <li><h2> <?php echo $result1['hotel_room_type'];?> Room</h2><p><?php echo $resultbooking['no_of_rooms'];?></p></li>

            <li>
              <?php 

              $your_date = strtotime($check_in_date); // or your date as well
               $now = strtotime($check_out_date);
               $datediff = $now - $your_date;
               //$days1=($datediff / 3600/24/30 );
               $days1= round($datediff / (60 * 60 * 24));
               if($datediff !=0){
               ?>
                <h2>Total Days</h2>
               <?php
               }else{

                 $check_in_time = $resultbooking['check_in_time']; // or your date as well
               $check_out_time = $resultbooking['check_out_time'];
                if(!empty($check_in_time && $check_out_time)){
                  $checkInTime=strtotime($check_in_time);
                  $checkOutTime=strtotime($check_out_time);
                  $timediff = $checkOutTime - $checkInTime;
                  $hour=($timediff / 3600 );

                   if($hour !=0){
               ?>
                <h2>Total Hours</h2>
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
                echo $days1;
               }
               else{
                $check_in_time = $resultbooking['check_in_time']; // or your date as well
               $check_out_time = $resultbooking['check_out_time'];
                if(!empty($check_in_time && $check_out_time)){
                  $checkInTime=strtotime($check_in_time);
                  $checkOutTime=strtotime($check_out_time);
                  $timediff = $checkOutTime - $checkInTime;
                  $hour=($timediff / 3600 );

                  date_default_timezone_set('Asia/Kolkata');
	 $chekin = date("h:i:a ",$checkInTime);
	 $chekout = date("h:i:a ",$checkOutTime);	

                  echo floor($hour).'('.$chekin.' to '.$chekout.')';

               } }
           
            ?></p></li>

          </ul>

        </div>

        <div class="adult-detail">

          <ul>

            <li><p>Primary Guest</p><h2><?php echo $userresult['fname'].' '.$userresult['lname'];?></h2></li>

            <li><p>Mobile Number</p><h2><?php echo ($userresult['mob_no'])?$userresult['mob_no']:'';?></h2></li>

            <li><p>Email ID</p><h2><?php echo ($userresult['email'])?$userresult['email']:'';?></h2></li>

          </ul>

        </div>

      </div>

      <div class="row tr">

      

          <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-one">

              <p>Room Tariff</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-two">

              <?php 
              // $actual_price = $resultbooking['actual_price'];
              // $night = '1';
              // $total = $actual_price*$night;
              ?>

            <!--   <p>RM <?php echo $actual_price;?> x <?php echo $night;?> Night</p> -->

             <?php 
               $your_date = strtotime($check_in_date); // or your date as well
               $now = strtotime($check_out_date);
               $datediff = $now - $your_date;
               //$days1=($datediff / 3600/24/30 );
               $days1= round($datediff / (60 * 60 * 24));
               //echo $days=floor($days1);
               
                if($datediff ==0){
         //$night = 1;

$actual_price = $resultbooking['actual_price'];
             // $night = $days1;
              $total = $actual_price;
              ?>

              <p>RM <?php echo $actual_price;?></p>
              <?php

         }else{
         $night = $days1;

         $actual_price = $resultbooking['actual_price'];
             // $night = $days1;
              $total = $actual_price*$night;
              ?>

              <p>RM <?php echo number_format($actual_price);?> (<?php echo $night;?> Night, <?php echo $resultbooking['no_of_rooms'];?> Room)</p>

<?php
         }
         ?>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-third">

              <h2>RM <?php echo $total;?></h2>

            </div>

          </div>

      

      </div>


       <?php 
       $resultdiscount=$user->GetDiscountbyhotelandroomid($hid,$rid);
       if ( $resultdiscount) {       
      
      ?>



      <div class="row tr">     

          <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-one">

              <p>Discount</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-two">

              <p>

                <!-- test code for discount -->
              <?php 

             
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
                      echo $discount_price.' '.'RM';
                    }else{
                      echo $discount_percent.'%';
                    }
                  }else if(!empty($discount_for=='2')){
                    if(!empty($discount_price)){
                      echo $discount_price.' '.'RM';
                    }else{
                      echo $discount_percent.'%';
                    }
                  }else{

                  }
                  ?>




                  <?php
                      if(!empty($discount_for=='2')){

                        //if($min_day<=$days1){
                          //if($days1<=$max_day){
                           if(!empty($discount_price)){
                            
                            // echo $abc1=$discount_price;
                             $abc1=$discount_price;
                          }else{
                            $abc=$total*$discount_percent;
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

                       
                        $abc=$total*$discount_percent;
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
                ?>
                <!-- <h2>RM<?php echo number_format($total1-$abc1);?></h2>


              <!-- end test code for discount -->



             <!--  Coupon Applied -->
            </p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <?php 
            
            // $tdiscount = $total1;
            // $per = $tdiscount*20;
            // $totaldiscount = $per/100;

            // $totaldiscount = number_format($total1-$abc1);
            //$totaldiscount = $total-$abc1;           

            ?>

            <div class="tarrif-third">

               <h2>RM <?php 
               $disprice = floor($resultbooking['discount_price']);

            echo $disprice;


               //echo number_format($abc1);
               ?></h2>


             <!--  <h2>RM <?php echo number_format($totaldiscount);?></h2> -->

            </div>

          </div>

      

      </div>

      <?php } ?>


      <div class="row tr">     

          <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-one">

              <p>Booking Amount</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-two">

              <p>Rounding up</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-third">
              <?php 
            //   $a = $total1;
            //   $b = $totaldiscount;
            //   $c = $total1-$totaldiscount;

            //   $d = $c*10;
            // $netbooking = $d/100;

              ?>
              <?php $pricee=($total-$abc1)*10/100;

              ?>
                

                 <h2>RM  <?php 

                 echo $bprice;
                 $bprice = floor($resultbooking['booked_price']);
                 echo $bprice;


                 //echo number_format($pricee);?></h2>

             <!--  <h2>RM <?php echo $netbooking;?></h2> -->

            </div>

          </div>

      

      </div>






     <!--  <div class="row tr">     

          <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-one">

              <p>Booking Amount</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-two">

              <?php 
              //$bookint_amt = $resultbooking['booked_price'];
              $noofroom = $resultbooking['no_of_rooms'];

              $total1 = $total*$noofroom; 
              ?>

              <p>RM <?php echo $total; ?> x <?php echo $noofroom;?> Room</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-third">

              <h2>RM <?php echo $total1;?></h2>

            </div>

          </div>

      

      </div> -->

     
       <!-- <div class="row tr">

      

          <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-one">

              <p>Net Booking Amount (After 10% Payable)</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-two">

              <p>Rounding up</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-third">
              <?php 
              $a = $total1;
              $b = $totaldiscount;
              $c = $total1-$totaldiscount;

              $d = $c*10;
            $netbooking = $d/100;

              ?>

              <h2>RM <?php echo $netbooking;?></h2>

            </div>

          </div>

      

      </div> -->

        <div class="row tr">

      

          <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-one">

              <p>Outstanding Amount</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-two">

              <p>Rounding up</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4 detail-left">

            <div class="tarrif-third">

              <?php
              //$Outstanding = $c-$netbooking;

              ?>

               <?php
              //$Outstanding = $c-$netbooking;
              if ($resultdiscount) {

              ?>

              <h2> RM <?php

              //echo $view_booking['actual_price']-$view_booking['discount_price']-$view_booking['booked_price'];
              
                $out1 = $total-$disprice;
               $out2 = $out1-$bprice;

               echo $out2;            

               ?></h2>
               <?php  }
             else{

              echo '<h2>'.$out2 = $total-$bprice.'</h2>';
             }?>

             <!--  <h2>RM <?php echo number_format($total-$abc1- $pricee);?></h2> -->

              <!-- <h2>RM <?php echo $Outstanding;?></h2> -->

            </div>

          </div>

      

      </div>

       




</div>




</div>

<div id="Tokyo" class="tabcontent" style="display:none;">
  <div class="sort-list">

    <select name="carlist" form="carform">

  <option value="volvo">Sort by</option>

  <option value="saab">Saab</option>

  <option value="opel">Opel</option>

  <option value="audi">Audi</option>

</select>

  </div>  

<div class="">

  <ul class="nav nav-tabs">

    <li class="active"><a data-toggle="tab" href="#home" id="upcoming">Upcoming</a></li>

    <li><a data-toggle="tab" href="#menu1" id="menu11">Completed</a></li>

    <li><a data-toggle="tab" href="#menu2" id="menu22">Cancelled</a></li>

  </ul>


  <div class="tab-content" id="adc">

    <div id="home" class="tab-pane fade in active">

      <?php 
      $upcoming=$hotels->GetAllHotelsbyUserid($user_id);
      foreach($upcoming as $upcomings){

      
      ?>
      <div class="sort-des">

  <p>Book on 
    <?php 
 $original = $upcomings['created_at'];
 echo $date = date("j F, Y", strtotime($original));
    ?>
      
    </p>

</div>

      <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-8">

          <div class="hotel-view">

            <?php 
            if(empty($upcomings['main_image'])){
            ?>

            <img src="image/bed.jpg" />
            <?php } 
            else{
            ?>
             <img src="image/<?php echo $upcomings['main_image'];?>" />
            <?php
          }

            ?>

            <div class="hotel-title">

            <h2><?php echo $upcomings['hotel_name'];?></h2>

            <p>Booking ID : <?php echo $upcomings['hotel_booking_id'];?></p>



            <div class="executive">

              <p><?php echo $upcomings['hotel_room_type'];?></p>

            </div>

          </div>

          </div>

        </div>

        <div class="col-xs-12 col-sm-2 col-md-2">

          <div class="check-in">

            <h2>CHECK IN</h2>
            <?php 
              if(empty($upcomings['check_in_time'])){
              $original1 = $upcomings['check_in_date'];
  $date1 = date("j F, Y", strtotime($original1));
 ?>

            <P>
              <?php echo $date1;?>
            </P>
            <?php } 
            else{?>
            <P>
              <?php echo $date1;?>
            </P>

            <p><?php $upcomings['check_in_time'];?></p>
            <?php } ?>

           <!--  <p><span>Saturday</span></p> -->

          </div>

        </div>



        <div class="col-xs-12 col-sm-2 col-md-2">

          <div class="check-in">

            <h2>CHECK OUT</h2>

           <?php 
              if(empty($upcomings['check_out_time'])){
              $original2 = $upcomings['check_out_date'];
  $date2 = date("j F, Y", strtotime($original2));
 ?>

            <P>
              <?php echo $date2;?>
            </P>
            <?php } 
            else{?>
            <P>
              <?php echo $date2;?>
            </P>

            <p><?php $upcomings['check_out_time'];?></p>
            <?php } ?>

           <!--  <p><span>Saturday</span></p> -->

          </div>

        </div>

        <div class="comment-area">


<!-- <input type="submit" name="email" onclick="return validateForgot();" class="btn btn-info sub" value="Submit"> -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $upcomings['booking_id'];?>">

  Booking Cancelled

</button>

<!-- <button>Booking Cancelled</button> -->

<div class="view-detail">

  <a href="view_detail.php?booking_id=<?php echo $upcomings['booking_id'];?>">View Detail</a>

</div>

        </div>

      </div>
      <?php } ?>            

      </div>

    </div>

    <div id="menu1" class="tab-pane fade">    

       <?php 
      $completed=$hotels->CompetedHotelsbyUserid($user_id);
      foreach($completed as $complete){
      
      ?>

                 <div class="sort-des">

  <p>Book on 
     <?php 
 $compdate = $complete['created_at'];
 echo $compdate = date("j F, Y", strtotime($compdate));
    ?>

  </p>

</div>

      <div class="row">



        <div class="col-xs-12 col-sm-8 col-md-8">

 

          <div class="hotel-view">

            <img src="image/hotel.jpg" />

            <div class="hotel-title">

            <h2><?php echo $complete['hotel_name'];?></h2>

            <p>Booking ID : <?php echo $complete['hotel_booking_id'];?></p>

          </div>

          </div>

        </div>

        <div class="col-xs-12 col-sm-2 col-md-2">

          <div class="check-in">

            <h2>CHECK IN</h2>

             <?php 
              if(empty($complete['check_in_time'])){
              $comporiginal1 = $complete['check_in_date'];
  $compdate1 = date("j F, Y", strtotime($comporiginal1));
 ?>

            <P>
              <?php echo $compdate1;?>
            </P>
            <?php } 
            else{?>
            <P>
              <?php echo $compdate1;?>
            </P>

            <p><?php $complete['check_in_time'];?></p>
            <?php } ?>

            <!-- <p><span>Saturday</span></p> -->

          </div>

        </div>



        <div class="col-xs-12 col-sm-2 col-md-2">

          <div class="check-in">

             <h2>CHECK OUT</h2>

           <?php 
              if(empty($complete['check_out_time'])){
              $comporiginal2 = $complete['check_out_date'];
  $compdate2 = date("j F, Y", strtotime($comporiginal2));
 ?>

            <P>
              <?php echo $compdate2;?>
            </P>
            <?php } 
            else{?>
            <P>
              <?php echo $compdate2;?>
            </P>

            <p><?php $complete['check_out_time'];?></p>
            <?php } ?>

           <!--  <p><span>Saturday</span></p> -->

          </div>

        </div>





        <div class="comment-area">

          <p>Write a comment</p>

        <div class="view-detail">

       <a href="view_detail.php?booking_id=<?php echo $complete['booking_id'];?>">View Detail</a>


          </div>

        </div>

      </div>




<?php } ?>
      


</div>


    </div>

    <script type="text/javascript">

      $(function(){
        $("#menu1").hide();
        $(".current-pass").hide();

        $("#menu11").click(function(){

          //alert('chirag');

          $("#adc").hide();

          $("#menu1").show();

          $("#menu2").hide();

        })

         $("#menu22").click(function(){

          //alert('chirag');

          $("#menu1").hide();

           $("#adc").hide();

           $("#menu2").show();

           // $("#adc").css("display","none");

        })

          $("#upcoming").click(function(){

          //alert('chirag');

          $("#menu1").hide();

          $("#menu2").hide();

          $("#adc").show();

        })

        //   $("#menu22").click(function(){

        //   //alert('chirag');

        //   $("#menu1").css("display","block");

        // })

      })



      function change_pass(){

        $(".current-pass").show();

        $(".profile-form").hide();

      }

    </script>

    <div id="menu2" class="tab-pane fade">
 <?php 
      $cancelled=$hotels->CancelledHotelsbyUserid($user_id);
      foreach($cancelled as $cancel){

      
      ?>

      <div class="sort-des">

  <p>Book on 
    <?php 
 $canceloriginal = $cancel['created_at'];
 echo $canceldate = date("j F, Y", strtotime($canceloriginal));
    ?>

  </p>

</div>



      <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-8">

          <div class="hotel-view">

            <img src="image/hotel.jpg" />

            <div class="hotel-title">

            <h2><?php echo $cancel['hotel_name'];?></h2>

            <p>Booking ID : <?php echo $cancel['hotel_booking_id'];?></p>



                <div class="range-slide">

            <ul>

              <li><span>1</span><br /> <p>Cancelled</p></li>

              <li><span>2</span> <br /> <p>In progress</p></li>

              <li><span>3</span> <br /> <p>Confirmed</p></li>

            </ul>

          </div>

          </div>

          </div>

        </div>

        <div class="col-xs-12 col-sm-2 col-md-2">

          <div class="check-in">

            <h2>CHECK IN</h2>

             <?php 
              if(empty($cancel['check_in_time'])){
              $canceloriginal1 = $cancel['check_in_date'];
  $canceldate1 = date("j F, Y", strtotime($canceloriginal1));
 ?>

            <P>
              <?php echo $canceldate1;?>
            </P>
            <?php } 
            else{?>
            <P>
              <?php echo $canceldate1;?>
            </P>

            <p><?php $cancel['check_in_time'];?></p>
            <?php } ?>

           <!--  <p><span>Saturday</span></p>
 -->
          </div>

        </div>



        <div class="col-xs-12 col-sm-2 col-md-2">

          <div class="check-in">

            <h2>CHECK OUT</h2>

           <?php 
              if(empty($cancel['check_out_time'])){
              $canceloriginal2 = $cancel['check_out_date'];
  $canceldate2 = date("j F, Y", strtotime($canceloriginal2));
 ?>

            <P>
              <?php echo $canceldate2;?>
            </P>
            <?php } 
            else{?>
            <P>
              <?php echo $canceldate2;?>
            </P>

            <p><?php $cancel['check_out_time'];?></p>
            <?php } ?>

           <!--  <p><span>Saturday</span></p>
 -->
          </div>

        </div>

        <div class="comment-area">

<p>Write a comment</p>

<div class="view-detail">

 <a href="view_detail.php?booking_id=<?php echo $cancel['booking_id'];?>">View Detail</a>


</div>

        </div>

      </div>

<?php }?>

    </div>

<!--     <div id="menu3" class="tab-pane fade">

      <h3>Menu 3</h3>

      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

    </div> -->

  </div>

</div>
<script type="text/javascript">
 

        $("#Paris").show();

        $("#my_profile").click(function(){
          //alert('my_profile');
          $("#Paris").show();
          $(".current-pass").hide();
          $(".profile-form").css('display','block');
        })
       

   
</script>





<script>

function openCity(evt, cityName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {

        tabcontent[i].style.display = "none";

    }

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {

        tablinks[i].className = tablinks[i].className.replace(" active", "");

    }

    document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";

}



// Get the element with id="defaultOpen" and click on it

document.getElementById("defaultOpen").click();

</script>











<!-- booking cancelled modal -->



<!-- Button trigger modal -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

  Launch demo modal

</button> -->



<!-- Modal -->
 <?php 
      $upcoming1=$hotels->GetAllHotelsbyUserid($user_id);
      if ($upcoming1) {
       
      foreach($upcoming1 as $upcomings1){
      $result_book = $upcomings1['booking_id'];

      $resultbooking=$user->GetBookingConfirmbyId($result_book);    

     $resulthotel=$user->Hoteldetailbyid($resultbooking['hotel_id']);
    // echo "<pre>";
   // print_r($resulthotel);

  $result1=$user->Roomdetailbyid($resultbooking['room_type_id']);
  // echo "<pre>";
  // print_r();


      
      ?>

<div class="modal fade" id="exampleModal<?php echo $upcomings1['booking_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Booking Detail</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>



      </div>

      <div class="modal-body">

        <p>Booking ID</p>

        <h2><?php echo $resultbooking['hotel_booking_id'];?></h2>

      

      

     

<div class="bedroom-des">

        <div class="col-xs-12 col-sm-4 col-md-4">

          <div class="bedroom">
            <?php 
            if(empty($resulthotel['main_image'])){
            ?>

            <img src="image/bed.jpg" />
            <?php } 
            else{
            ?>
             <img src="image/<?php echo $resulthotel['main_image'];?>" />
            <?php
          }

            ?>

          </div>

        </div>



        <div class="col-xs-12 col-sm-8 col-md-8 bed">

          <div class="bedroom-detail">

            <h2><?php echo $resulthotel['hotel_name'];?></h2>

            <p><?php echo $resulthotel['hotel_address'];?><br /><?php echo $resulthotel['hotel_city'];?>,<?php echo $resulthotel['hotel_pin_code'];?></p>

          </div>

        </div>

        </div>



     <div class="modal-body de">

        <div class="container col-md-12">

          <div class="row">

             <div class="col-xs-12 col-sm-3 col-md-3">

          <div class="bed-heading">

            <?php 
            if(empty($resultbooking['check_in_time'])){
              $check_in_date = $resultbooking['check_in_date'];
            
           $checkdate = date("j F, Y", strtotime($check_in_date));

              
              ?>

            <h2><?php echo $checkdate;?>
              </h2>
              <?php } 
              else{
              ?>
               <h2><?php echo $checkdate;?>
              <br /><span><?php echo $resultbooking['check_in_time'];?></span></h2>
              <?php
            }

              ?>

          </div>

        </div>



         <div class="col-xs-12 col-sm-3 col-md-3">

          <div class="bed-heading">

            <?php 
            if(empty($resultbooking['check_out_time'])){
              $check_out_date1 = $resultbooking['check_out_date'];
            
           $checkdate1 = date("j F, Y", strtotime($check_out_date1));

              
              ?>

            <h2><?php echo $checkdate1;?>
              </h2>
              <?php } 
              else{
              ?>
               <h2><?php echo $checkdate1;?>
              <br /><span><?php echo $resultbooking['check_out_time'];?></span></h2>
              <?php
            }

              ?>
          </div>
        </div>


          <div class="col-xs-12 col-sm-3 col-md-3">
          <div class="bed-heading">
            <h2> Guest<br /><span><?php echo $resultbooking['no_of_adults'];?> Adult</span></h2>
          </div>
        </div>


         <div class="col-xs-12 col-sm-3 col-md-3">
          <div class="bed-heading">
            <h2><?php echo $resultbooking['no_of_rooms'];?> <?php echo $result1['hotel_room_type'];?> Room<br /><span></span></h2>
          </div>
        </div>
          </div>
        </div>
      </div>
<div class="modal-body">
        <div class="container col-md-12">
          <div class="row">
<div class="amount">

  <p>Total Amount <span>&euro; 
    <?php
     $tdiscount = $total1;
            $per = $tdiscount*20;
            $totaldiscount = $per/100;
             $a = $total1;
              $b = $totaldiscount;
              $c = $total1-$totaldiscount;

              $d = $c*10;
            $netbooking = $d/100;
             $Outstanding = $c-$netbooking;

   echo $resultbooking['actual_price'];?></span></p>
</div>

<div class="amount">
  <p>Amount Pay <span>&euro; <?php echo $resultbooking['booked_price'];?></span></p>
</div>



<div class="amount">
  <p>Outstanding Amount <span>&euro;<?php echo $Outstanding;?></span></p>

</div>
</div>

</div>

</div>



<div class="modal-body">

    <div class="container col-md-12">

      <div class="row">
<div class="refund">

  <h2>refund detail</h2>

  <p>Total ampunt to be refund</p>

</div>

<div class="amount">

  <p>Total Amount <span>RM 3000</span></p>

</div>

<div class="amount">

  <p>Refund Amount <span>RM 2100 <i class="fa fa-question-circle"></i></span></p>

</div>

<div class="check-box">

  <p><input type="checkbox" name="vehicle1" value="Bike"> I accept the Terms & Condition in the lincence agreement</p>

</div>

<div class="table-submit">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">

  Submit

</button>

<!--   <a href="#">Submit</a> -->

</div>

</div>

</div>

</div>
 

      <div class="modal-footer">

        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary">Save changes</button> -->

      </div>

    </div>

  </div>

</div>

</div>
<?php }  } ?>


<!-- close-modal -->









<!-- small-modal -->



<!-- Button trigger modal -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">

  Launch demo modal

</button> -->



<!-- Modal -->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header small">

        <h5 class="modal-title" id="exampleModalLabel">Please tell us more why you want to cancel the order</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body dd">

        <div class="check-box">

  <p><input type="checkbox" name="vehicle1" value="Bike">Not interested anymore</p>

</div>



        <div class="check-box">

  <p><input type="checkbox" name="vehicle1" value="Bike">I want to change my mind</p>

</div>



        <div class="check-box">

  <p><input type="checkbox" name="vehicle1" value="Bike">Found nother best booking</p>

</div>



        <div class="check-box">

  <p><input type="checkbox" name="vehicle1" value="Bike">Other</p>

  <div class="small-input">

  <form action="/action_page.php">

<input type="text" name="fname"><br>

</form>

</div>

</div>





      </div>

      <div class="modal-footer nn">

        <button type="button" class="btn btn-primary">Submit</button>

      </div>

    </div>

  </div>

</div>

<script>

                    function UpdateProfile() {

                //alert('kanchan');

                $.ajax({

                  url: "ajaxuserprofile.php",

                  type: "POST",

                  data:'updateprofile='+$("#fname").val()+'&lname='+$("#lname").val()+'&email='+$("#email").val()+'&mob_no='+$("#mob_no").val()+'&user_id='+$("#user_id").val(),

                  success:function(data){
                    //alert(data);       

                       $("#mail-status").html(data);

                     }



                   });





              }

             

                  </script>

                  <script>

                    function changepassword() {

               //alert('kanchan');

                $.ajax({

                  url: "ajaxuserprofile.php",

                  type: "POST",

                  data:'changepassword='+$("#current_password").val()+'&new_password='+$("#new_password").val()+'&confirme_password='+$("#confirme_password").val()+'&user_id='+$("#user_id").val(),

                  success:function(data){
                    alert(data);

                    
                    

                       // $("#mail-status").html(data);

                     }

                   });

              }             

                  </script>

                  <style type="text/css">
                    .hotel-view img {
    width: 191px;
    height: 171px;
}
                  </style>








<!-- <div id="London" class="tabcontent" style="display:none;">

  <h3>London</h3>

  <p>London is the capital city of England.</p>

</div>





<div id="Paris" class="tabcontent" style="display:none;">

  <h3>Paris</h3>

  <p>Paris is the capital of France.</p> 

</div> -->



<!-- <div id="Tokyo" class="tabcontent" style="display:none;">

  <h3>Tokyo</h3>

  <p>Tokyo is the capital of Japan.</p>

</div> -->

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

          <p>You will soon receive an email confirmation on nitishgkumar16@gmail.com</p>

          <button type="button" class="btn btn-default print"><i class="fa fa-print" aria-hidden="true"></i> Print</button>

        </div>

      </div>

    </div>

  </div>

</div>



<!-- oyo-area -->



<div class="oyo-area">

  
</div>






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

           include_once 'footer.php';

           ?>




        

<!-- /footer-area -->        

     

                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



              







<script type="text/javascript">jssor_1_slider_init();</script>









</body>
<style>
.great-content {
    display: none;
}
</style>
</html>











<!-- Modal -->




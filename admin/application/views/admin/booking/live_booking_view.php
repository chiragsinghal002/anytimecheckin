<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="col-sm-6 box-header with-border" style="padding: 7px !IMPORTANT;">
          <h3 class="box-title">Booking ID: <?= $view_booking['hotel_booking_id']; ?></h3>
        </div>
    <div class="col-sm-6 box-header with-border">
      <?php 
          $original = $view_booking['book_created_at'];
           $startdate = date("j F, Y", strtotime($original));
          ?>
             <span>Booked by <?= $view_booking['fname']; ?> on <?= $startdate;?></span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
    <div class="oyo-area">


    <div class="row">

      <div class="col-sm-6 col-md-6">

        <div class="oyo-text">

          <!--<p>Booking ID</p>

          <h2>CXE1014113</h2>-->

        </div>

      </div>

      <div class="col-sm-6 col-md-6">

        <div class="oyo-content">
          
          <!--<p align="right">Booked by  on  4 September, 2018</p>-->

        </div>

      </div>

    </div>

     <div class="row">

        <div class="col-sm-4 col-md-4">
          

          <div class="oyo-pic">
            <?php 
            $pics = $view_booking['room_photo'];
          
             $exp = explode(',',$pics);
              $img1 = $exp[0];



if (!empty($img1)) {
  $thumbimg1=explode(".",$img1); 

$thumbimg1final=$thumbimg1[0]."_thumb.".$thumbimg1[1];
  ?>
   <img src="../../../../image/Room/<?php echo $thumbimg1final;?>">

  <?php
}else{
                  ?>
                  <img src="../../../../image/no-image.png">
                  <?php
                }
                ?>    
              
           <!--  <img src="image/crown.png">
 -->
          </div>

        </div>

        <div class="col-sm-8 col-md-8">

          <div class="crown-area">

            <h2><?= $view_booking['hotel_name']; ?></h2>

           <!--  <h3>Crown Residency</h3> -->

            <p><?php echo $view_booking['hotel_address'].','.$view_booking['hotel_city'].','.$view_booking['hotel_pin_code'];?></p>

            <p><span>Hotel Description :</span> <?php echo $view_booking['hotel_description'];?></p>

            <!-- <p><span>Landmark :</span> <?php echo $view_booking['hotel_landmark'];?> </p> -->

          </div>

        </div>

      </div>

      <div class="row">

        <div class="adult-text">

          <ul>

            <li><h2>Check In</h2> <p>

              <?php 
              $check_in_date = $view_booking['check_in_date'];
           $checkdate = date("j F, Y", strtotime($check_in_date));

              echo $checkdate;?>               
              </p></li>

            <li><h2>Check Out</h2> <p>

              <?php 
             $check_out_date = $view_booking['check_out_date'];
           $checkoutdate = date("j F, Y", strtotime($check_out_date));

            echo $checkoutdate;?>          
            </p></li>

            <li><h2> Guest</h2> <p><?php echo $view_booking['no_of_adults'];?></p></li>

             <li><h2>  Room Type</h2><p><?php echo $view_booking['hotel_room_type'];?></p></li>
             <li><h2>  No. of Room</h2><p><?php echo $view_booking['no_of_rooms'];?></p></li>

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

                 $check_in_time = $view_booking['check_in_time']; // or your date as well
               $check_out_time = $view_booking['check_out_time'];
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
                $check_in_time = $view_booking['check_in_time']; // or your date as well
               $check_out_time = $view_booking['check_out_time'];
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
            

            <li><h2>Primary Guest</h2><p><?php echo $view_booking['fname'].' '.$view_booking['lname'];?></p></li>

            <li><h2>Mobile Number</h2>
              <?php if(!empty($view_booking['mob_no'])){?>
              <p><?php echo ($view_booking['mob_no'])?$view_booking['mob_no']:'';?></p>
            <?php } else{
              ?>
               <p>mobile no. not avilable</p>
              <?php
            }?>
            </li>

            <li><h2>Email ID</h2><p><?php echo ($view_booking['email'])?$view_booking['email']:'';?></p></li>

            


          </ul>

        </div>

      </div>


      <div class="row tr">

      

          <div class="col-sm-4 col-md-4">

            <div class="tarrif-one">

              <p>Room Tariff</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4">
            <?php 
            if ($view_booking['booking_type']) {
              # code...
            }
            ?>

            <div class="tarrif-two">

              <?php 
               $your_date = strtotime($check_in_date); // or your date as well
               $now = strtotime($check_out_date);
               $datediff = $now - $your_date;
               //$days1=($datediff / 3600/24/30 );
               $days1= round($datediff / (60 * 60 * 24));
               //echo $days=floor($days1);
               
                if($datediff ==0){
         //$night = 1;

$actual_price = $view_booking['actual_price'];
             // $night = $days1;
              $total = $actual_price;
              $a = $actual_price;
              ?>

              <p>RM <?php echo $actual_price;?></p>
              <?php

         }else{
         $night = $days1;

         $actual_price = $view_booking['actual_price'];
             // $night = $days1;
              $total = $actual_price*$night;
              ?>

              <p>RM 
                <?php 
                $a = floor($actual_price);


              echo  $a;?> (<?php echo $night;?> Night, <?php echo $view_booking['no_of_rooms'];?> Room)</p>

              <!-- <p>RM <?php echo $actual_price;?> x <?php echo $night;?> Night</p> -->

<?php
         }
         ?>

              

            <!--   <p>RM <?php echo $actual_price;?> x <?php echo $night;?> Night</p> -->

            </div>

          </div>

           <div class="col-sm-4 col-md-4">

            <div class="tarrif-third">

               <h2>RM <?php echo $a;?></h2>

            </div>

          </div>

      

      </div>


      <!-- discount section -->

       <?php 

       $resultdiscount=$view_discount;
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

              <!--  <h2>RM <?php echo number_format($abc1);?></h2> -->


            <h2>RM 
              <?php 

              $disprice = floor($view_booking['discount_price']);

            echo $disprice;
            ?></h2>

            </div>

          </div>

      

      </div>

      <?php } ?>

      <!-- discount section -->


      <!-- booking amount section -->
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
              <?php //$pricee=($total-$abc1)*10/100;

              ?>
                

                 <h2>RM 
                  <?php 
                  $bprice = floor($view_booking['booked_price']);
                 echo $bprice;?></h2>

             <!--  <h2>RM <?php echo $netbooking;?></h2> -->

            </div>

          </div>

      

      </div>


      <!-- end booking amount section-->

        <div class="row tr">

      

          <div class="col-sm-4 col-md-4">

            <div class="tarrif-one">

              <p>Outstanding Amount</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4">

            <div class="tarrif-two">

              <p>Rounding up</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4">

            <div class="tarrif-third">

              
             <?php
              //$Outstanding = $c-$netbooking;
              if ($resultdiscount) {

              ?>

              <h2> RM <?php

              //echo $view_booking['actual_price']-$view_booking['discount_price']-$view_booking['booked_price'];
              
                $out1 = $a-$disprice;
               $out2 = $out1-$bprice;

               echo $out2;            

               ?></h2>
               <?php  }
             else{

              echo '<h2>'.$out2 = $a-$bprice.'</h2>';
             }?>

            </div>

          </div> 

      </div>
      
          <a href="javascript: history.go(-1)" class="btn btn-info pull-right">Go Back</a>    

</div>


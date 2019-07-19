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
          
            $exp_pics = explode(',', $pics);
            ?>
          <img src="../../../../../image/<?= $exp_pics[0]; ?>">

              
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
   $chekin = date("h:i:s ",$checkInTime);
   $chekout = date("h:i:s ",$checkOutTime); 

                  echo $hour.'('.$chekin.' to '.$chekout.')';

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
              ?>

              <p>RM <?php echo $actual_price;?></p>
              <?php

			   }else{
			   $night = $days1;

         $actual_price = $view_booking['actual_price'];
             // $night = $days1;
              $total = $actual_price*$night;
              ?>

              <p>RM <?php echo $actual_price;?> x <?php echo $night;?> Night</p>

<?php
			   }
         ?>

              

            <!--   <p>RM <?php echo $actual_price;?> x <?php echo $night;?> Night</p> -->

            </div>

          </div>

           <div class="col-sm-4 col-md-4">

            <div class="tarrif-third">

               <h2>RM <?php echo $total;?></h2>

            </div>

          </div>

      

      </div>





      <div class="row tr">

      

          <div class="col-sm-4 col-md-4">

            <div class="tarrif-one">

              <p>Booking Amount</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4">

           <div class="tarrif-two">

              <?php 
              //$bookint_amt = $resultbooking['booked_price'];
              $noofroom = $view_booking['no_of_rooms'];

              $total1 = $total*$noofroom; 
              ?>

              <p>RM <?php echo $total; ?> x <?php echo $noofroom;?> Room</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4">

            <div class="tarrif-third">

              <h2>RM <?php echo $total1;?></h2>

            </div>

          </div>

      

      </div>



      <div class="row tr">

      

          <div class="col-sm-4 col-md-4">

            <div class="tarrif-one">

              <p>Discount</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4">

            <div class="tarrif-two">

              <p>Coupon Applied</p>

            </div>

          </div>

           <div class="col-sm-4 col-md-4">
            <?php 
            
            $tdiscount = $total1;
            $per = $tdiscount*20;
            $totaldiscount = $per/100;

            ?>

            
            <div class="tarrif-third">

             <h2> RM <?php echo $totaldiscount;?></h2>

            </div>

          </div>

      

      </div>

       <div class="row tr">

      

          <div class="col-sm-4 col-md-4">

            <div class="tarrif-one">

              <p>Net Booking Amount (After 10% Payable)</p>

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
              $a = $total1;
              $b = $totaldiscount;
              $c = $total1-$totaldiscount;

              $d = $c*10;
            $netbooking = $d/100;

              ?>

              <h2> RM <?php echo $netbooking;?></h2>

            </div>

          </div>

      

      </div>

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
              $Outstanding = $c-$netbooking;

              ?>

              <h2> RM <?php echo $Outstanding;?></h2>

            </div>

          </div>

      

      </div>

       




</div>


<!-- 
          <?php if(isset($msg) || validation_errors() !== ''): ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            <?= validation_errors();?>
            <?= isset($msg)? $msg: ''; ?>
          </div>
        <?php endif; ?>

        <?php echo form_open(base_url('admin/booking/view/'.$view_booking['booking_id']), 'class="form-horizontal"' )?> 

 <div class="form-group">
          <label for="hotel_name" class="col-sm-2 control-label"> Hotel booking id</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_name" value="<?= $view_booking['hotel_booking_id']; ?>" class="form-control" id="hotel_name" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="hotel_name" class="col-sm-2 control-label"> Hotel Name</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_name" value="<?= $view_booking['hotel_name']; ?>" class="form-control" id="hotel_name" placeholder="" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="hotel_email" class="col-sm-2 control-label">Hotel Email *</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_email" value="<?= $view_booking['hotel_email']; ?>" class="form-control" id="hotel_email" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="hotel_address" class="col-sm-2 control-label">Hotel Address</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_address" value="<?= $view_booking['hotel_address']; ?>" class="form-control" id="hotel_address" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">User Name</label>

          <div class="col-sm-9">
            <input type="text" name="city" value="<?= $view_booking['fname'].' '.$view_booking['lname']; ?>" class="form-control" id="city" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">User email</label>

          <div class="col-sm-9">
            <input type="text" name="city" value="<?= $view_booking['email']; ?>" class="form-control" id="city" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Mobile</label>

          <div class="col-sm-9">
            <input type="text" name="city" value="<?= $view_booking['mob_no']; ?>" class="form-control" id="city" placeholder="" readonly>
          </div>
        </div>


        <div class="form-group">
          <?php 
                $original = $view_booking['check_in_date'];
            $check_in_date = date("d/m/Y", strtotime($original));

            $original1 = $view_booking['check_out_date'];
           $check_out_date = date("d/m/Y", strtotime($original1));
              ?>
          <label for="pincode" class="col-sm-2 control-label">check in date</label>

          <div class="col-sm-9">
           <input type="text" name="website" class="form-control" value="<?= $check_in_date; ?>" id="website" placeholder="" readonly>
          </div>
        </div>


        <div class="form-group">
          <label for="website" class="col-sm-2 control-label">check out date</label>

          <div class="col-sm-9">
            <input type="text" name="website" class="form-control" value="<?= $check_out_date; ?>" id="website" placeholder="" readonly>
          </div>
        </div>

         <div class="form-group">
          <label for="hotel_address" class="col-sm-2 control-label">Room Type</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_address" value="<?= $view_booking['hotel_room_type']; ?>" class="form-control" id="hotel_address" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="mobile_no" class="col-sm-2 control-label">No. of Rooms</label>

          <div class="col-sm-9">
            <input type="text" name="mobile_no" class="form-control" value="<?= $view_booking['no_of_rooms']; ?>" id="mobile_no" placeholder="" readonly>
          </div>
        </div>

         <div class="form-group">
          <label for="mobile_no" class="col-sm-2 control-label">No. of Adults</label>

          <div class="col-sm-9">
            <input type="text" name="mobile_no" class="form-control" value="<?= $view_booking['no_of_adults']; ?>" id="mobile_no" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="telephone" class="col-sm-2 control-label">Booking Price</label>

          <div class="col-sm-9">
            <input type="text" name="telephone" class="form-control" value="<?= $view_booking['booked_price']; ?> &euro;" id="telephone" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="fax" class="col-sm-2 control-label">Actual Price</label>

          <div class="col-sm-9">
            <input type="text" name="fax" class="form-control" value="<?= $view_booking['actual_price']; ?> &euro;" id="fax" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="airport" class="col-sm-2 control-label">Discount Price</label>

          <div class="col-sm-9">
            <input type="text" name="airport" class="form-control" value="<?= $view_booking['discount_price']; ?> &euro;" id="airport" placeholder="" readonly>
          </div>
        </div>              

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Booking Status</label>

                <div class="col-sm-9">
                  <?php 
                  if ($view_booking['booking_status'] == 1) {
                    ?>
                    <input type="text" name="airport" class="form-control" value="Pending" id="airport" placeholder="" readonly>
                    <?php
                  }
                  elseif ($view_booking['booking_status'] == 2) {
                    ?>
                    <input type="text" name="airport" class="form-control" value="Completed" id="airport" placeholder="" readonly>
                    <?php
                  }
                  elseif ($view_booking['booking_status'] == 3) {
                    ?>
                    <input type="text" name="airport" class="form-control" value="Progress" id="airport" placeholder="" readonly>
                    <?php
                  }
                   elseif ($view_booking['booking_status'] == 4) {
                    ?>
                    <input type="text" name="airport" class="form-control" value="Canceled" id="airport" placeholder="" readonly>
                    <?php
                  }
                  ?>

                  <!-- <select name="mini_hour" id="text1" class="form-control">

                    <option value="">Select</option>                    
                    <option value="1" <?php echo ($view_booking['min_hour']==1 ? 'selected' : '');?>>1</option>
                    <option value="2" <?php echo ($view_booking['min_hour']==2 ? 'selected' : '');?>>2</option>
                    <option value="3" <?php echo ($view_booking['min_hour']==3 ? 'selected' : '');?>>3</option>
                    <option value="4" <?php echo ($view_booking['min_hour']==4 ? 'selected' : '');?>>4</option>
                    <option value="5" <?php echo ($view_booking['min_hour']==5 ? 'selected' : '');?>>5</option>
                    <option value="6" <?php echo ($view_booking['min_hour']==6 ? 'selected' : '');?>>6</option>
                    <option value="7"<?php echo ($view_booking['min_hour']==7 ? 'selected' : '');?>>7</option>
                    <option value="8"<?php echo ($view_booking['min_hour']==8 ? 'selected' : '');?>>8</option>
                    <option value="9"<?php echo ($view_booking['min_hour']==9 ? 'selected' : '');?>>9</option>
                    <option value="10"<?php echo ($view_booking['min_hour']==10 ? 'selected' : '');?>>10</option>

                  </select> -->
                </div>
              </div>

              



              <!-- <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                </div>
              </div> -->
              <?php //echo form_close(); ?>
            <!--</div>
            <!-- /.box-body -->
          <!--</div>
        </div>
      </div>  

    </section>  -->
<?php 
include_once'Object.php';

session_start();

if(isset($_SESSION['user_id']))
{
  $user_id=$_SESSION['user_id'];

  $result=$user->UserInfobyId($user_id);

}

// if(isset($_GET['para1'])){
//   $_SESSION['fname']=$fname=$_GET['para1'];
//   $_SESSION['last_name']=$lname=$_GET['para2'];
//   $_SESSION['email']=$email=$_GET['para3'];

 
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

<title>AnytimeCheckin</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- <link href="css/style.css" rel="stylesheet" type="text/css" /> -->
<link href="css/style3.css" rel="stylesheet" type="text/css" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"> -->

<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<body>
<!-- top-header -->
<div class="header-area gg">

  <div class="container">

    <div class="row">

      <div class="col-xs-12 cl-sm-6 col-md-6">

        <div class="logo-area">

<a href="index.php"><img src="image/logo-footer.png" /></a>
        </div>

      </div>

      <div class="col-xs-12 col-sm-6 col-md-6">

        <div class="user-area">

          <p><a href="#"><i class="fa fa-user"></i> <?php echo $result['fname'].' '.$result['lname'];?></a></p>

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

  <!-- <h3>Paris</h3>

  <p>Paris is the capital of France.</p>  -->


  <div class="profile-form">
<div id="mail-status" class="replay"></div>
    <!-- <form action="/action_page.php"> -->

    <input type="text" id="fname" name="fname" value="<?php echo $result['fname'];?>" placeholder="First Name"><!--<i style="color: #fff;" class="fa fa-question-circle"></i>-->

    <input type="text" id="lname" name="lname" value="<?php echo $result['lname'];?>" placeholder=" Last Name"><!--<i style="color: #fff;" class="fa fa-question-circle"></i>-->

    <?php 
    if(!empty($result['mob_no'])){
    ?>
<input type="text" id="mob_no" name="mob_no" value="<?php echo $result['mob_no'];?>" placeholder="Phone number" readonly><!--<i class="fa fa-question-circle"></i>-->
    <?php

  }
  else{
  ?>
  <input type="text" id="mob_no" name="mob_no"  placeholder="Phone number" ><!--<i class="fa fa-question-circle"></i>-->

  <?php
}
    ?>


    <?php 
    if(!empty($result['email'])){
    ?>
<input type="text" id="email" name="email"  value="<?php echo $result['email'];?>" placeholder="Email" readonly><!--<i class="fa fa-question-circle"></i>-->
    <?php

  }
  else{
  ?>
  <input type="text" id="email" name="email"  placeholder="Email" ><!--<i class="fa fa-question-circle"></i>-->

  <?php
}
    ?>

<input type="hidden" id="user_id" name="user_id"  value="<?php echo $result['user_id'];?>" placeholder="user id"><!--<i class="fa fa-question-circle"></i>-->   

  <!-- </form> -->
  <div class="change-pass">

    <!--<button onclick="change_pass();" style="
    position: relative;
    right: 68%;
">Change Paswword</button>-->

    <div class="Submit-form">
       <button type="submit" class="btn btn-primary" name="updateprofile" data-toggle="modal" onclick="return UpdateProfile();">Submit</button>

      <!-- <a href="#">Submit</a> -->

    </div>

  </div>

  </div>

<div class="current-pass"> 
  <div id="changepassword-status" class="replay"></div>

    <input type="text" id="current_password"  name="current_password" placeholder="Current Password" required="required"><br> 
    <div class="input-msg" style="color: red;"><span id="current_password-info" class="info"></span></div>
                        <br /> 
    <input type="text" id="new_password" name="new_password" placeholder="New Password"required="required"><br>
    <div class="input-msg" style="color: red;"><span id="new_password-info" class="info"></span></div>
                        <br />
    <!-- <i class="fa fa-eye-slash"></i> --> 

    <input type="text" id="confirme_password" name="confirme_password" placeholder="Confirme Password"required="required"><br>
    <div class="input-msg" style="color: red;"><span id="confirme_password-info" class="info"></span></div>
                        <br />
   <!--  <i class="fa fa-eye-slash"></i> -->

  <div class="Submit-form">
    <button type="submit" class="btn btn-primary" name="changepassword" data-toggle="modal" onclick="return validatechangepassword();">Submit</button>

      <!-- <a href="#">Submit</a> -->

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

</div>





</body>

</html>

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
      if(!empty($upcoming1)){
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

  <p>Total Amount <span>Rs 3000</span></p>

</div>

<div class="amount">

  <p>Refund Amount <span>Rs 2100 <i class="fa fa-question-circle"></i></span></p>

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
<?php }
}
 ?>


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
                    //alert(data);                
                    

                       $("#changepassword-status").html(data);

                     }

                   });

              } 

              function validatechangepassword() {

                  //alert('chirag');
                  //$('#first').modal('hide');

                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');




                  if($("#current_password").val()=="") {

                    $("#current_password-info").html("(This field is not valid)");

                    $("#current_password").css('background-color','#FFFFDF');

                    valid = false;

                  }

                   if($("#new_password").val()=="") {

                    $("#new_password-info").html("(This field is not valid)");

                    $("#new_password").css('background-color','#FFFFDF');

                    valid = false;

                  }

                   if($("#confirme_password").val()=="") {

                    $("#confirme_password-info").html("(This field is not valid)");

                    $("#confirme_password").css('background-color','#FFFFDF');

                    valid = false;

                  }
               

                      if(valid==true){

                        changepassword();

                      }

                      return valid;

                    }            

                  </script>

                  <style type="text/css">
                    .hotel-view img {
    width: 191px;
    height: 171px;
}

/*.current-pass {
    display: block !important;
}*/

                  </style>
<?php 
session_start();
header('Cache-Control: no-cache, must-revalidate, max-age=0');
include_once'Object.php';

if(isset($_POST['book_now'])){
  // var_dump($_POST);
  $noofroom=$_POST['noofroom'];
  $no_of_person=$_POST['no_of_person'];
  $check_in_date=$_POST['check_in_date'];
  $check_out_date=$_POST['check_out_date'];
  $total_price=$_POST['total_price'];
  $discount_type=$_POST['discount_type'];
  $discount_price=$_POST['discount_price'];
  $discount_percent=$_POST['discount_percent'];
  $discount_for=$_POST['discount_for'];
  $optradio=$_POST['optradio'];
  $max_hour=$_POST['max_hour'];
  $min_hour=$_POST['min_hour'];
  $max_day=$_POST['max_day'];
  $min_day=$_POST['min_day'];
  $childs=$_POST['no_of_childs'];
  if($optradio==2){
   if(!empty($_POST['check_in_time'])){
    $check_in_time=$_POST['check_in_time'];
  }else{
    $check_in_time='';
  }
  if(!empty($_POST['check_out_time'])){
    $check_out_time=$_POST['check_out_time'];
  }else{
    $check_out_time='';
  }
}else{
  $check_in_time='';
  $check_out_time='';
}


$result=$user->Hoteldetailbyid($_POST['hotel_id']);

$hotel_name = $result['hotel_name'];
$address = $result['hotel_address'];

$result1=$user->Roomdetailbyid($_POST['hotel_room_type_id']);

$_SESSION['noofroom']=$noofroom;
$_SESSION['no_of_person']=$no_of_person;
$_SESSION['check_in_date']=$check_in_date;
$_SESSION['check_out_date']=$check_out_date;
$_SESSION['check_in_time']=$check_in_time;
$_SESSION['check_out_time']=$check_out_time;
$_SESSION['total_price']=$total_price;
$_SESSION['discount_type']=$discount_type;
$_SESSION['discount_price']=$discount_price;
$_SESSION['discount_percent']=$discount_percent;
$_SESSION['discount_for']=$discount_for;
$_SESSION['max_hour']=$max_hour;
$_SESSION['min_hour']=$min_hour;
$_SESSION['hotel_id']=$_POST['hotel_id'];
$_SESSION['hotel_name']=$hotel_name;
$_SESSION['hotel_address']=$address;
$_SESSION['hotel_room_type']=$result1['hotel_room_type'];
$_SESSION['check_in_time']=$check_in_time;
$_SESSION['check_out_time']=$check_out_time;
$_SESSION['hotel_room_type_id']=$_POST['hotel_room_type_id'];
$_SESSION['optradio']=$optradio;
$_SESSION['childs']=$childs;
  // var_dump($_SESSION);

}
if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  $userresult=$user->UserInfobyId($user_id);


}

if(isset($_POST['submit11'])){
  // var_dump($_POST);
  $email=$_POST['email'];
  $password=$_POST['password'];
  $discounted_price=$_POST['discounted_price'];
  $result=$user->loginbyemail($email,$password);
  //var_dump($result);
  if($result['result']=='1'){
   session_start();
   $_SESSION['user_id']=$result['user_id'];
   $_SESSION['fname']=$result['fname'];
   $_SESSION['lname']=$result['lname'];
   $_SESSION['mob_no']=$result['mob_no'];
   $_SESSION['email']=$result['email'];
   $_SESSION['discounted_price']=$discounted_price;
   header('Location:pay-paypal.php');
 }else{
  $msg = "Wrong Credentials";
  //header("Refresh:0");
}

}
if(isset($_POST['continue_as_guest'])){
  //var_dump($_POST);
  $_SESSION['user_id']='0';
  $_SESSION['fname']=$_POST['fname'];
  $_SESSION['lname']=$_POST['lname'];
  $_SESSION['mob_no']=$_POST['mobno'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['discounted_price']=$_POST['discounted_price'];
  header('Location:pay-paypal.php');
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

  <title>Anytime Check In</title>



  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/responsive.css" rel="stylesheet" type="text/css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/myjs.js"></script>
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

              <li class="active"><span>1</span><br><p>Customer Information</p></li>

              <li><span>2</span><br><p>Payment Information</p></li>

              <li><span>3</span><br><p>Booking is confirmed</p></li>

            </ul>

          </div>

        </div>

      </div>

    </div>

  </div>





  <!-- /header -->          





  <!-- /night-area -->



  <div class="night-area">

    <div class="container">

      <div class="row">

        <div class="col-sm-6 col-md-6 ">

          <div class="night-content">

            <div class="row agust">

              <div class="col-smm-8 col-md-8">
                <?php
                if(!empty($check_in_date && $check_out_date)){
                 $date1 = date_create($check_in_date);
                 $date2 = date_create($check_out_date);
                 $diff = date_diff($date1,$date2);

                 $days=$diff->format("%a");
                 $_SESSION['days']=$days;
               } 
               if(!empty($check_in_time && $check_out_time)){
                $checkInTime=strtotime($check_in_time);
                $checkOutTime=strtotime($check_out_time);
                $datediff = $checkOutTime - $checkInTime;
                $hour=($datediff / 3600 );
                $_SESSION['hour']=$hour;
              }

              ?>

              <div class="agust">
                <h2><?php  if(!empty($datediff)){echo $date=date('d M y',strtotime($check_in_date));}else{echo date('d M y',strtotime($check_in_date));?> - <?php echo date('d M y',strtotime($check_out_date));}?></h2>
                <?php 
                if(!empty($check_in_time && $check_out_time)){ ?>
                  <?php if($check_in_time!==$check_out_time){?>
                   <p class="gf"><?php echo $check_in_time.'-'.$check_out_time;?></p>
                 <?php }?>

               <? }
               ?>


             </div>

           </div>

           <div class="col-sm-4 col-md-4">

            <div class="agust-content">

              <p><?php echo $result1['hotel_room_type'];?>Room</p>

            </div>

          </div>

        </div>

        <div class="super-area">

          <ul>

            <?php if(!empty($hour)){ ?>
             <li><p><img src="image/list-2.png"><?php echo $hour;?> Hour </p></li>
           <?php }else{ ?>
             <li><p><img src="image/list-2.png"><?php echo $days;?> Night </p></li>
           <?php }?>


           <?php 
           if ($_POST['noofroom']==1) {
            ?>
            <li><p><img src="image/list-2.png"><?php echo $_POST['noofroom'];?> Room </p></li>

            <?php
          }elseif ($_POST['noofroom']>1) {
            ?>
            <li><p><img src="image/list-2.png"><?php echo $_POST['noofroom'];?> Rooms </p></li>

            <?php
          }
          ?>




          <li>
            <?php 
            if ($_POST['no_of_person']==1) {                    
              ?>
              <p><img src="image/list-3.png"><?php echo $_POST['no_of_person'];?> Adult
                <!-- (Max <?php echo $result['child_capacity'];?> Children)  -->

              </p>
              <?php 
            }
            elseif($_POST['no_of_person']>1){
              ?>
              <p><img src="image/list-3.png"><?php echo $_POST['no_of_person'];?> Adults
                <!-- (Max <?php echo $result['child_capacity'];?> Children)  -->

              </p>
              <?php
            }

            ?>
          </li> 

                <!-- <li><p><img src="image/list-3.png"><?php echo $_POST['no_of_person'];?> Adult 
                 
                </p></li> -->



                <li>
                  <?php 
                  if ($_POST['no_of_childs']==1) {                    
                    ?>
                    <p><img src="image/list-3.png"><?php echo $_POST['no_of_childs'];?> child
                      <!-- (Max <?php echo $result['child_capacity'];?> Children)  -->

                    </p>
                    <?php 
                  }
                  elseif($_POST['no_of_childs']>1){
                    ?>
                    <p><img src="image/list-3.png"><?php echo $_POST['no_of_childs'];?> children
                      <!-- (Max <?php echo $result['child_capacity'];?> Children)  -->

                    </p>
                    <?php
                  }

                  ?>
                </li>                


                <li> <button onclick="goBack()">Back to Hotel</button></li>

              </ul>


              <script>
                function goBack() {
                  window.history.back();
                }
              </script>

            </div>

          </div>

        </div>

        <div class="col-sm-6 col-md-6">

          <div class="park-area">

            <div class="row">

              <div class="col-sm-8 col-md-8">

                <div class="park-content">


                  <h2><?php 
                  echo $hotel_name;

                  //echo $result['hotel_name'];?></h2>

                  <?php 
                  $rating=$reviews->AvarageRating($result1['hotel_id']);
                  $rate = round($rating['AVG(user_rating)']);
            //$star = $result_hotel['hotel_star_category'];

                  for ($i=1; $i <= $rate ; $i++) { 

                    ?>

                    <span class="fa fa-star checked star-detail"></span>

                    <?php

                  }



                  ?>

                 <!--  <img src="image/park-star.png">
                 -->
               </div>

             </div>


             <div class="col-sm-4 col-md-4">
              <?php 
              if(!empty($discount_for)){
                ?>

                <div class="agust-content cd">



                 <?php 
                 if($optradio=='1'){
                  if(!empty($discount_for=='2')){

                    if($min_day<=$days){

                      if($days<=$max_day){
                       if(!empty($discount_price)){
                        echo $discount_price.' '.'RM Off On';
                      }else{
                        echo $discount_percent.'%'.' '.'Off On';
                      }
                      echo  "<span>".'Discount'."<span>";
                    }
                  }

                }
              }else{
                if($min_hour!=='0.00'){
                  if($min_hour<=$hour){
                    if($hour<=$max_hour){
                     if(!empty($discount_price)){
                      echo $discount_price.' '.'RM Off On';
                    }else{
                     echo $discount_percent.'%'.' '.'Off On';
                   }
                   echo  "<span>".'Discount'."<span>";
                 }

               }
             }


           }
           ?>




         </div>
       <?php } ?>

     </div>

   </div>

   <div class="plot">

    <h2><?php echo $address;?></h2>

  </div>



</div>

<div class="row ba">



  <div class="col-sm-8 col-md-8 booking-left">

    <div class="include-area">

      <ul>

        <li>Original price (<?php echo $_POST['noofroom'];?> Room <?php if(!empty($hour)){echo $hour.' '.'Hour';}else{echo $days.' '.'Night';}?>)</li>

        <li>Discount Price (<?php echo $_POST['noofroom'];?> Room <?php if(!empty($hour)){echo $hour.' '.'Hour';}else{echo $days.' '.'Night';}?>)</li>

        <li>Booking Fees</li>



      </ul>

      <div class="new-ul">

        <ul>

          <li><h2>Price</h2></li>

          <!-- <li><p>Include in price : GST18%</p></li> -->

        </ul>

      </div>

    </div>

  </div>

  <div class="col-sm-4 col-md-4 right-mobile">

    <div class="include-content">

      <ul>

        <li>RM<?php echo number_format($_POST['total_price']);?></li>



        <li>
          RM
          <?php
          if(!empty($discount_for)){
            if($optradio=='1'){
             if($discount_for=='2'){
            if($min_day<=$days){                         // echo 'day';
            if($days<=$max_day){
             if(!empty($discount_price)){
              echo $abc1=$discount_price;
            }else{
              $abc=$_SESSION['total_price']*$discount_percent;
              echo $abc1=$abc/100;
            }
          }else{
            echo $abc1='0';
          }
        }else{
          echo $abc1='0';
        }
      }
    }
    if($optradio=='2'){
      if($discount_for=='1'){
                               // echo 'hour';
       if($min_hour<=$hour){
        if($hour<=$max_hour){
         if(!empty($discount_price)){
          echo $abc1=$discount_price;
        }else{
          $abc=$_SESSION['total_price']*$discount_percent;
          echo $abc1=$abc/100;
        }
      }else{
        echo $abc1='0';
      }
    }else{
      echo $abc1='0';
    }
  }else{
    echo $abc1='0';
  }
}
}else{
  echo $abc1='0';
}
?>



</li>


<li class="free">RM<?php echo number_format(($_POST['total_price']-$abc1)*10/100);?></li>

</ul>

<div class="new-two" align="right">

  <ul>

    <li><h2>RM<?php echo number_format($_POST['total_price']-$abc1);?></h2></li>

  </ul>

</div>

</div>

</div>

</div>



</div>

</div>

</div>

</div>



<!-- fill-area -->

<div id="formka">

  <div class="fill-area">

    <div class="container">


      <div class="row detail-row">


        <?php 
        if (empty($_SESSION['user_id'])) {
          ?>
          <div class="col-sm-6 book-back">
            <div class="head-login">


              <h2>login & continue</h2>
              <p style="color: red;"><span id="login_alert"></span></p>

            </div>
            <!-- <form action="" method="post"> -->
              <div class="login-detail">
                <div class="form-group er">

                  <label for="email">Username:</label>

                  <input type="email" class="form-control fd" name="email" id="email11" required="">

                </div>
                <div class="form-group er">

                  <label for="email">Password:</label>

                  <input type="password" class="form-control fd" name="password" id="password11" required="">
                  <input type="hidden" class="form-control fd" name="discounted_price" value="<?php echo $abc1;?>" id="discounted_price11">
                </div>
                <input type="submit"  class="login-detals" name="submit11" onclick="chirag()">

              </div>
              <!-- </form> -->
              <?php include_once'pop-up/registration.php';?>

              <?php include_once'pop-up/verification.php';?>

              <div class="create-new">
                <h4>No account yet? <input type="submit" class="btn btn-info create new" value="Create Account" onclick="createaccount()"></h4>
              </div>

            </div>

            <!-- <form> -->
              <div class="col-sm-6 book-back">

                <div class="head">

                  <h2>continue as guest</h2>

                </div>
                <div class="continue">
                  <form action="" method="post">

                    <div class="form-group col-sm-6 er">

                      <label for="email">Name:</label>

                      <input type="text" class="form-control fd" name="fname" required="" id="text_field">

                    </div>

                    <div class="form-group col-sm-6 er">

                      <label for="email">Last Name:</label>

                      <input type="text" class="form-control fd"  name="lname" required="" id="text_field1">

                    </div>

                    <div class="form-group col-sm-6 er">

                      <label for="email">Mobile Number:</label>

                      <input type="number" class="form-control fd" name="mobno"  required="">

                    </div>

                    <div class="form-group col-sm-6 er">

                      <label for="email">Country of residence:</label>

                      <input type="text" class="form-control fd" name="country" required="" id="text_field2">
                      <input type="hidden" class="form-control fd" name="discounted_price" value="<?php echo $abc1;?>">

                    </div>



                    <div class="form-group er ft">

                      <label for="email">Email:</label>

                      <input type="email" class="form-control fd" name="email"  required="">
                      <input type="submit" name="continue_as_guest" class="login-detals" id="submit1">


                      <!-- <label class="checkbox-inline"><input type="checkbox" id="checkbox">I’ m making this booking to sommeone else</label> -->

                    </div>
                  </form>
                </div>


              </div>

              <?php
            }

            else{
              ?>
              <div class="col-sm-6 book-back">
                <div class="head-login">

                  <h2>User Detail</h2>

                </div>
                <form action="" method="post">
                  <div class="login-detail">

                    <div class="form-group er">

                      <label for="email">First Name:</label>

                      <input type="text" class="form-control fd" name="fname" id="email1" value="<?php echo $userresult['fname'];?>">
                      <input type="hidden" class="form-control fd" name="discounted_price" value="<?php echo $abc1;?>">
                    </div>

                    <div class="form-group er">

                      <label for="email">Last Name:</label>

                      <input type="text" class="form-control fd" name="lname" id="email1" value="<?php echo $userresult['lname'];?>">

                    </div>

                    <div class="form-group er">

                      <label for="email">Email:</label>

                      <input type="email" class="form-control fd" name="email" id="email1" value="<?php echo $userresult['email'];?>">

                    </div>

                    <div class="form-group er">

                      <label for="email">Mobile:</label>

                      <input type="text" class="form-control fd" name="mob_no" id="email1" value="<?php echo $userresult['mob_no'];?>">

                    </div>

                    <div class="form-group er">

                      <!-- <label for="email">Password:</label> -->

                      <input type="hidden" class="form-control fd" name="password" id="password1" value="<?php echo $userresult['password'];?>">

                    </div>
                    <input type="submit"  class="login-detals" name="submit11" value="Countinue">

                  </div>
                </form>
              </div>

              <?php
            }
            ?>










          </div>

        </div>

      </div>

    </div>







    <!-- know-area -->

    <!-- <div class="know-area">

      <div class="container">

        <div class="row">

          <div class="col-sm-12 col-md-12 dd">

            <div class="know-content">

              <h2>Known your arrival time</h2>

              <p>We”ll let the property or host known when to expect you for smoother arrival.</p>

              <select name="carlist" class="uk" form="carform" id="arrival_time">

                <option value="volvo"> I Don’t Know</option>

                <option value="saab">Saab</option>

                <option value="opel">Opel</option>

                <option value="audi">Audi</option>

              </select>

              <p class="jh">By procceeding you agree to Rest & Go <a href="#">Terms & Use</a> and <a href="#">Privacy Policy</a></p>

            </div>

          </div>

        </div>

      </div>

    </div> -->



    <div class="but-area">

      <div class="container">

        <div class="row">

         <!--  <div class="but-content" align="right">

            <input type="button" class="btn btn-default ld" value="Continue" id="submit" style=" background:black;color:#fff;width:12%;margin-left:auto;display: block;">

          </div> -->

        </div>



      </div>

    </div>

  </div>
  <input type="hidden" name="fname" id="fname" class="form-control fd" value="<?php echo $userresult['fname'];?>" >
  <input type="hidden" name="lname" id="lname" class="form-control fd" value="<?php echo $userresult['lname'];?>">
  <input type="hidden" name="email" id="email" class="form-control fd" value="<?php echo $userresult['email'];?>" >

  <input type="hidden" name="mob_no" id="mob_no" class="form-control fd" value="<?php echo $userresult['mob_no'];?>" >
  <input type="hidden" name="country" id="country" class="form-control fd" >
  <input type="hidden" name="checkbox" class="form-control fd" >
  <input type="hidden" name="amt"  id="price" value="<?php echo $pricee;?>">
  <input type="hidden"  name="hotel_id" id="hotel_id" value="<?php echo $result['hotel_id'];?>">
  <input type="hidden" name="room_type_id" id="room_type_id" value="<?php echo $result1['room_type_id'];?>">
  <input type="hidden"  name="user_id" id="user_id" value="<?php echo $user_id;?>">
  <input type="hidden" name="paymentId" id="paymentId" value="PAYPAL12345">
  <input type="hidden" name="actual_price" id="actual_price" value="<?php echo $result1['price_per_day'];?>">
  <input type="hidden" name="discount_price" id="discount_price" value="<?php echo $abc1;?>">
  <input type="hidden" name="hotel_booking_id" id="hotel_booking_id" value="<?php echo $resultbooking;?>">




  <!-- secure-area  -->

 <!--  <div id="paypal">

    <div class="secure-area">

      <div class="container">

        <div class="row re">

         <div class="col-sm-3 col-md-3">

           <div class="secure-pic">

             <img src="image/secure.png">

           </div>

         </div>

         <div class="col-sm-9 col-md-9">

           <div class="secure-content">

             <p>All card information is fully encrypted, secure, and protected</p>

           </div>

         </div>

       </div>

     </div>

   </div>
 -->




 <!-- mat-area -->     



   <!-- <div class="mat-area">

    <div class="container hs">

      <div class="row">

        <div class="col-sm-6 col-md-6">

          <div class="mat-content">

            <h2>Payment Method :</h2>

            <img src="image/pay.png">

          </div>

        </div>

        <div class="col-sm-6 col-sm-6">

          <div class="mat-text">

            <?php 

            $pricee=($_POST['total_price']-$abc1)*10/100;

            ?>

            <h1>RM<?php echo number_format($pricee);?></h1>

            <p>10% off total amount</p>

            <input type="hidden" id="price" value="<?php echo $pricee;?>">

            <input type="hidden" id="hotel_id" value="<?php echo $_POST['hotel_id'];?>">

            <input type="hidden" id="hotel_room_type_id" value="<?php echo $_POST['hotel_room_type_id'];?>">
            <input type="hidden" id="user_id" value="<?php echo $user_id;?>">
            <input type="hidden" id="no_of_person" value="<?php echo $_POST['no_of_person'];?>">

          </div>

        </div>



      </div>

      <div class="row">

        <div class="check-text ">

          <label class="checkbox-inline"><input type="checkbox" value="">Let me know about exclusive Anytime check in promotions and last minute deals</label>

          <p class="jh">By procceeding you agree to Rest & Go <a href="#">Terms & Use</a> and <a href="#">Privacy Policy</a></p>

        </div>

      </div>



    </div>

  </div>  -->      



  <!-- /pay-area --> 



  <!-- <div class="pay-total">

    <div class="container">

      <div class="row">

        <div class="col-sm-10 col-md-10">

          <div class="pay-total-text" align="right">

            <p>Pay 10% off total amount with <a href="#">Paypal</a></p>

          </div>

        </div>
        <?php 
        $resultbooking=$user->random_num(9);
         // echo $resultbooking;
        ?>




        <form method="post" action="" id="booking">

          <div class="col-sm-2 col-md-2">
            <input type="hidden" name="fname" id="fname" class="form-control fd" value="<?php echo $userresult['fname'];?>" >
            <input type="hidden" name="lname" id="lname" class="form-control fd" value="<?php echo $userresult['lname'];?>">
            <input type="hidden" name="email" id="email" class="form-control fd" value="<?php echo $userresult['email'];?>" >

            <input type="hidden" name="mob_no" id="mob_no" class="form-control fd" value="<?php echo $userresult['mob_no'];?>" >
            <input type="hidden" name="country" id="country" class="form-control fd" >
            <input type="hidden" name="checkbox" class="form-control fd" >
            <input type="hidden" name="amt"  id="price" value="<?php echo $pricee;?>">
            <input type="hidden"  name="hotel_id" id="hotel_id" value="<?php echo $result['hotel_id'];?>">
            <input type="hidden" name="room_type_id" id="room_type_id" value="<?php echo $result1['room_type_id'];?>">
            <input type="hidden"  name="user_id" id="user_id" value="<?php echo $user_id;?>">
            <input type="hidden" name="paymentId" id="paymentId" value="PAYPAL12345">
            <input type="hidden" name="actual_price" id="actual_price" value="<?php echo $result1['price_per_day'];?>">
            <input type="hidden" name="discount_price" id="discount_price" value="<?php echo $offprice;?>">
            <input type="hidden" name="hotel_booking_id" id="hotel_booking_id" value="<?php echo $resultbooking;?>">
            <div class="pay-buton">

             <!--  <button type="submit" name="paynow" class="btn btn-default yu" id="paynow">Book & Pay Now</button> -->
             <div id="paypal-button-container"></div>

           </div>

         </div>
       </form>


     </div>

   </div>

 </div> 



</div>

<!-- manila-area -->



<script type="text/javascript">

  $(function(){

    $("#submit").click(function(){

      var fname=$("#fname").val();

      var lname=$("#lname").val();

      var email=$("#email").val();

      var mobno=$("#mobno").val();

      var country=$("#country").val();

      var checkbox=$("#checkbox").val();

      $("#formka").hide();

      $("#paypal").show();



    })



    $("#paynow").click(function(){

     var fname=$("#fname").val();

     var lname=$("#lname").val();

     var email=$("#email").val();

     var mobno=$("#mobno").val();

     var country=$("#country").val();

     var checkbox=$("#checkbox").val();

     var hotel_id=$("#hotel_id").val();

     var room_type_id=$("#hotel_room_type_id").val();

     var amt=$("#amt").val();

     var paymentId='PAYPAL12345';

     var no_of_person=$("#no_of_person").val();
     var user_id=$('#user_id').val();

     $.ajax({

      url:'adduser1.php',

      type:'post',

      data:{'submit4':fname,lname:lname,email:email,mobno:mobno,country:country,checkbox:checkbox,amt:amt,paymentId:paymentId,room_type_id:room_type_id,hotel_id:hotel_id,no_of_person:no_of_person,user_id:user_id},

      success:function(data){

        console.log(data);

        if(data==1)
        {

          window.location.href='booking-confirmation.php';

        }

      }

    })

   })

  })

</script>
<script type="text/javascript">
  function preventNumberInput(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58){
        e.preventDefault();
    }
}

$(document).ready(function(){
    $('#text_field').keypress(function(e) {
        preventNumberInput(e);
    });
});

$(document).ready(function(){
    $('#text_field1').keypress(function(e) {
        preventNumberInput(e);
    });
});

$(document).ready(function(){
    $('#text_field2').keypress(function(e) {
        preventNumberInput(e);
    });
});
</script>
<!-- footer-area -->
<?php 
include_once('footer.php');
?>
<!-- /footer-area -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">jssor_1_slider_init();</script>
<script type="text/javascript">
  $(function(){
    $("#submit1").click(function(){
      // alert('chirag');
      var email1=$("#email1").val();
      var password1=$("#password1").val();
      $.ajax({

        url:'adduser.php',

        type:'post',
        dataType: 'json',

        data:{'submit10':email1,password1:password1},

        success:function(data){
          // alert(data);
          console.log(data);

          $("#fname").val('kanchan');

          $("#lname").val('bhaskar');
          $("#email").val('kanchan.netmaximus@gmail.com');

          $("#mobno").val();

          $("#country").val('INDIA');


        }

      })
    })
  })

  function chirag(){
    var email1=$("#email11").val();
    var password1=$("#password11").val();
    var discounted_price=$("#discounted_price").val();
    $.ajax({

      url:'adduser.php',
      type:'post',
      data:{'submit11':email1,password1:password1,discounted_price:discounted_price},
      success:function(data){
          // alert(data);
          // console.log(data);
          if(data=='1'){
            $("#login_alert").html(' ');
           window.location.href='pay-paypal.php';
          }else{
             $("#login_alert").html('Wrong Credentials');
          }


        }

      })
  }
</script>
</body>
</html>
<!-- Modal -->
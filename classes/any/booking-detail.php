<?php 
session_start();
include_once'Object.php';
if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  $userresult=$user->UserInfobyId($user_id);
    //var_dump($userresult);
}
if(isset($_POST['book_now'])){
  //var_dump($_POST);
  $result=$user->Hoteldetailbyid($_POST['hotel_id']);
  $result1=$user->Roomdetailbyid($_POST['hotel_room_type_id']);
   // echo "<pre>";
  //  var_dump($result);

//   var_dump($result1);
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
  <title>Rest & Go</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="js/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>


  <body>


   <!-- header -->

   <div class="new-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3">
          <div class="new-logo">
            <img src="image/new-logo.png">
          </div>
        </div>
        <div class="col-sm-9 col-md-9">
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
        <div class="col-sm-6 col-md-6">
          <div class="night-content">
            <div class="row agust">
              <div class="col-smm-8 col-md-8">
                <div class="agust">
                  <h2>17 August 2018 - 19 August 2018</h2>
                  <p class="gf">1 night</p>
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="agust-content">
                  <p><?php echo $result['hotel_room_type'];?><br>Room</p>
                </div>
              </div>
            </div>
            <div class="super-area">
              <ul>
                <li><p><img src="image/list-1.png">1 x Superior room</p></li>
                <li><p><img src="image/list-2.png">1 room,<?php echo $_POST['no_of_person'];?> adults</p></li>
                <li><p><img src="image/list-3.png">Max <?php echo $result['adult_person_capacity'];?> adults, <?php echo $result['child_capacity'];?> children (0-6 years)</p></li>
                <li><p><img src="image/list-4.png">28 sq.m.</p></li>
                <li><p><img src="image/list-5.png">Breakfast included</p></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="park-area">
            <div class="row">
              <div class="col-sm-8 col-md-8">
                <div class="park-content">
                  <h2><?php echo $result['hotel_name'];?></h2>
                  <img src="image/park-star.png">
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="agust-content cd">
                  <p>61% <br>Discount</p>
                </div>
              </div>
            </div>
            <div class="plot">
              <h2><?php echo $result['hotel_address'];?></h2>
            </div>
            
          </div>
          <div class="row ba">

            <div class="col-sm-8 col-md-8">
              <div class="include-area">
                <ul>
                  <li>Orginal price (1 Room 1 Night)</li>
                  <li>Price (1 Room 1 Night)</li>
                  <li>Book Fees</li>
                </ul>
                <div class="new-ul">
                  <ul>
                    <li><h2>Price</h2></li>
                    <li><p>Include in price : GST18%</p></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="include-content">
                <ul>
                  <li>&euro;<?php echo number_format($result1['price_per_day']);?></li>
                  <?php
                  $off = $result1['price_per_day']*10;
                  $price = $off/100;
                  $offprice = $result1['price_per_day'] - $price;?>
                  <li>&euro;<?php echo number_format($offprice);?></li>
                  <li class="free">Free</li>
                </ul>
                <div class="new-two" align="right">
                  <ul>
                    <li><h2>&euro;<?php echo number_format($offprice);?></h2></li>
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
        <div class="row">
          <div class="fill-main">
            <div class="head">
              <h2>Please fill in your information</h2>
            </div>
            <!-- <form> -->
              <div class="col-sm-6 col-md-6">
                <div class="fill-content">
                  <div class="form-group er">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control fd" value="<?php echo $userresult['fname'];?>" id="fname">
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="fill-content">
                  <div class="form-group er">
                    <label for="email">Last Name:</label>
                    <input type="text" class="form-control fd" id="" value="<?php echo $userresult['lname'];?>" id="lname">
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="fill-content">
                  <div class="form-group er">
                    <label for="email">Mobile Number:</label>
                    <input type="text" class="form-control fd" id="mobno" value="<?php if(!empty($userresult['mob_no'])){echo $userresult['mob_no'];}else{} ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="fill-content">
                  <div class="form-group er">
                    <label for="email">Country of residence:</label>
                    <input type="text" class="form-control fd" id="country">
                  </div>
                </div>
              </div>
              <div class="mail-text">
                <div class="form-group er ft">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control fd" id="email" value="<?php if(!empty($userresult['email'])){echo $userresult['email'];}else{} ?>">
                  <label class="checkbox-inline"><input type="checkbox" id="checkbox">I’ m making this booking to sommeone else</label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <!-- know-area -->
    <div class="know-area">
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
    </div>

    <div class="but-area">
      <div class="container">
        <div class="row">
          <div class="but-content" align="right">
            <input type="button" class="btn btn-default ld" value="Continue" id="submit">
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- secure-area  -->
  <div id="paypal" style="display: none;">
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


   <!-- mat-area -->     

   <div class="mat-area">
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
              $pricee=$offprice*10/100;
            ?>
            <h1>&euro;<?php echo number_format($pricee);?></h1>
            <p>10% off total amount</p>
            <input type="hidden" id="amt" value="<?php echo $pricee;?>">
            <input type="hidden" id="hotel_id" value="<?php echo $_POST['hotel_id'];?>">
            <input type="hidden" id="hotel_room_type_id" value="<?php echo $_POST['hotel_room_type_id'];?>">
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
  </div>       

  <!-- /pay-area --> 

  <div class="pay-total">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-10">
          <div class="pay-total-text" align="right">
            <p>Pay 10% off total amount with <a href="#">Paypal</a></p>
          </div>
        </div>
        <div class="col-sm-2 col-md-2">
          <div class="pay-buton">
            <button type="button" class="btn btn-default yu" id="paynow">Book & Pay Now</button>
          </div>
        </div>
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
       $.ajax({
            url:'adduser.php',
            type:'post',
            data:{'submit4':fname,lname:lname,email:email,mobno:mobno,country:country,checkbox:checkbox,amt:amt,paymentId:paymentId,room_type_id:room_type_id,hotel_id:hotel_id,no_of_person:no_of_person},
            success:function(data){
              console.log(data);
              if(data==1){
                window.location.href='booking-confirmation.html';
              }
            }
          })
   })
  })
</script>
<!-- /manila-area -->


<!-- queen-area -->



<!-- /queen-area -->
<!-- majestic-area -->


<!-- premier-area -->




<!-- footer-area -->

<div class="footer-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="footer-content">
          <div class="footer-logo" align="center">
            <img src="image/footer-logo.jpg">
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="social-media">
              <ul>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-7 col-md-7">
            <div class="information">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Hotels</a></li>
                <li><a href="#">Info</a></li>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Shortcodes</a></li>
                <li><a href="#">Areas</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
            <div class="info-text">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="subscribe">
              <p>Subscribe to Newsletter</p>
              
            </div>
            <div class="plan">
              <form>
                <div class="input-group">
                  <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                  <span class="input-group-addon"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></span>   
                </div>

              </form>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="copy" align="center">
              <p>Copyright © 2017 by Rest & Go</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /footer-area -->        

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





<script type="text/javascript">jssor_1_slider_init();</script>




</body>
</html>





<!-- Modal -->


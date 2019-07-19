<?php
include 'header.php';
//header('Cache-Control: no-cache, must-revalidate, max-age=0');
?>  
<?
if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  // var_dump($_SESSION);
}
// var_dump($_SESSION);

if(isset($_GET['hotel_id'])){
  $id = $_GET['hotel_id'];
 $today=date('Y-m-d');
 $check_in_date=date('d M Y',strtotime($today));
 $check_out_date=date('d M Y', strtotime($check_in_date . ' +1 day'));
 $result_hotel=$user->Hoteldetailbyid($id);
 $day = date('d', strtotime($check_in_date));
 $month=date('M',strtotime($check_in_date));
 $year=date('Y',strtotime($check_in_date));
 $hotel_id = $result_hotel['hotel_id'];
 $room_type =$user->GetRoomtypeByHotelId($id);
 $room_image =$user->GetRoomimageByHotelId($id);
 $optradio='1';
 $no_of_adults='1';
 $no_of_rooms='1';
 $no_of_childs='1';
}
if(isset($_POST['hotel_id'])){
  $id = $_POST['hotel_id'];
  $check_in_date=$_POST['check_in_date'];
  $check_out_date=$_POST['check_out_date'];
  $result_hotel=$user->Hoteldetailbyid($id);
  $day = date('d', strtotime($check_in_date));
  $month=date('M',strtotime($check_in_date));
  $year=date('Y',strtotime($check_in_date));
  $hotel_id = $result_hotel['hotel_id'];
  $room_type =$user->GetRoomtypeByHotelId($id);
  $room_image =$user->GetRoomimageByHotelId($id);

}
?>

<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
<script type="text/javascript">

  jssor_1_slider_init = function() {



    var jssor_1_SlideshowTransitions = [

    {$Duration:1200,$Zoom:1,$Easing:{$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},

    {$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},

    {$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},

    {$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InQuint,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuint},$Opacity:2,$Round:{$Rotate:0.8}},

    {$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

    {$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},

    {$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Opacity:2,$Round:{$Rotate:0.5}},

    {$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InQuint,$Zoom:$Jease$.$InQuart,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuint},$Opacity:2,$Round:{$Rotate:0.8}},

    {$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Opacity:2,$Round:{$Rotate:0.5}},

    {$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InQuint,$Zoom:$Jease$.$InQuart,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuint},$Opacity:2,$Round:{$Rotate:0.8}},

    {$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},

    {$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},

    {$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},

    {$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}}

    ];



    var jssor_1_options = {

      $AutoPlay: 1,

      $SlideshowOptions: {

        $Class: $JssorSlideshowRunner$,

        $Transitions: jssor_1_SlideshowTransitions,

        $TransitionsOrder: 1

      },

      $ArrowNavigatorOptions: {

        $Class: $JssorArrowNavigator$

      },

      $ThumbnailNavigatorOptions: {

        $Class: $JssorThumbnailNavigator$,

        $Rows: 2,

        $SpacingX: 14,

        $SpacingY: 12,

        $Orientation: 2,

        $Align: 156

      }

    };



    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);



    /*#region responsive code begin*/



    var MAX_WIDTH = 960;



    function ScaleSlider() {

      var containerElement = jssor_1_slider.$Elmt.parentNode;

      var containerWidth = containerElement.clientWidth;



      if (containerWidth) {



        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);



        jssor_1_slider.$ScaleWidth(expectedWidth);

      }

      else {

        window.setTimeout(ScaleSlider, 30);

      }

    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, "load", ScaleSlider);

    $Jssor$.$AddEvent(window, "resize", ScaleSlider);

    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);

    /*#endregion responsive code end*/

  };

</script>

<body>
  <div class="Sogor-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="sogor-content">
            <!-- <h2 align="center">Top Hotels</h2> -->
            <!-- <p align="center">The Best Oriental Hotel</p> -->
            <?php
            if($room_image['hotel_room_image']!="")
            {
              ?>
              <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:400px;overflow:hidden;visibility:hidden;background-color:#24262e;">
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                  <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="image/<?php echo $result_hotel['main_image'];?>" />
                </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:720px;height:480px;overflow:hidden;">
                  <?php
                  $hotelimage=explode(",",($room_image['hotel_room_image']));
                  $tt = count($hotelimage);
                // echo "<pre>";
                // print_r($hotelimage);

                // foreach($hotelimage as $hotel_image_result)
                  for ($i=0; $i <=3 ; $i++)
                  {
                    $thumbimage=explode(".",$hotelimage[$i]); 
                    $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];

                    if (!empty($hotelimage[$i])) {
                    # code...

                      ?>
                      <div data-p="150.00">
                        <img data-u="image" src="image/thumb2/<?php echo $thumbimagefinal; ?>" />
                        <img data-u="thumb" src="image/thumb/<?php echo $thumbimagefinal; ?>" />
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>

                <!-- Thumbnail Navigator -->

                <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:720px;top:0px;width:240px;height:480px;background-color:#fff;" data-autocenter="2" data-scale-left="0.75">

                  <div data-u="slides">

                    <div data-u="prototype" class="p" style="width:99px;height:66px;">

                      <div data-u="thumbnailtemplate" class="t"></div>

                      <svg viewbox="0 0 16000 16000" class="cv">

                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>

                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>

                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>

                      </svg>

                    </div>

                  </div>

                </div>

                <!-- Arrow Navigator -->


              </div>

              <?php
            }
            ?>

          </div>

        </div>

      </div>

    </div>

  </div>



  <!-- /Sogor-area --> 

  <?php
  $hotelimage=explode(",",($room_image['hotel_room_image']));
  $tt = count($hotelimage);
  if ($tt > 3) {

    ?>


    <button type="button" class="btn btn-info btn-lg pop-up-detail" data-toggle="modal" data-target="#myModal"> more photos</button>
  <?php } ?>


  <div class="container">
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog popup-width">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <?php $hotelimage=explode(",",($room_image['hotel_room_image'])); ?>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php
                $i=0; 
                foreach($hotelimage as $hotel_image_result)
                  { ?>
                    <div class="item <?php if($i==0){ ?>active<?php } ?>">
                      <img src="image/<?php echo $hotel_image_result; ?>" alt="<?php echo $hotel_image_result; ?>" style="width:100%;">
                    </div>
                    <?php
                    $i++;
                  } ?>

                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                  <span class="sr-only">Next</span>
                </a>

                <ul class="carousel-indicators">
                  <?php $i=0; foreach($hotelimage as $hotel_image_result)
                  {
                    $thumbimage=explode(".",$hotel_image_result); 
                    $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
                    ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i==0){ ?>class="active"<?php } ?>><img src="image/thumb/<?php echo $thumbimagefinal; ?>"></li>
                    <?php $i++;
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>






<!-- manila-area -->



<div class="manila-area">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 col-md-12">

        <div class="manila-content">

          <ul>

            <li><h2><?php echo $result_hotel['hotel_name'];?>

            <?php 
            $rating=$reviews->AvarageRating($result_hotel['hotel_id']);
            $rate = round($rating['AVG(user_rating)']);
            //$star = $result_hotel['hotel_star_category'];

            for ($i=1; $i <= $rate ; $i++) { 

              ?>

              <span class="fa fa-star checked star-detail"></span>

              <?php

            }



            ?>

            <!-- star rating according to review -->

            <?php 
      //       $rating=$reviews->AvarageRating($result_hotel['hotel_id']);
      // $rate = round($rating['AVG(user_rating)']);
      //       $color = '';

      //       for($count=1; $count<=5; $count++)
      //        {
      //         if($count <= $rate)
      //         {
      //          $color = 'color:#ffcc00;';
      //         }
      //         else
      //         {
      //          $color = 'color:#ccc;';
      //         }
      //        echo $output = '<span  data-rating="'.$rate.'" class="fa fa-star" style="'.$color.'">

      //        </span>';
      //        }

            ?>
            <!--end star rating according to review -->
           <!-- <p>

               <?php 
              // if ($rate > 0) {
               // echo $rate.' '. 'Rating';
              // }else{

              // }
              

              ?> 

            </p>-->
            <span> 
              <?php 
              $result_review=$reviews->FetchReviews($_REQUEST['hotel_id']);
              if ($result_review > 0) {
                echo count($result_review).' '. 'user reviews';
              }else{
                //echo '0'.' '. 'user reviews';
              }
              
              ?>
            </span>







          </h2></li>

          <li><img src="image/area.png"><?php echo $result_hotel['hotel_address'];?>, <?php echo $result_hotel['hotel_city'];?>, <?php echo $result_hotel['hotel_pin_code'];?> - </li>
          <li><p>
            <?php 
            echo $result_hotel['hotel_description'];

            ?>
            
          </p></li>

          <!-- <li><h3>1 room types with 12 total room offers available (See all rooms)</h3></li> -->



        </ul>

      </div>

    </div>

    <div class="col-sm-4 col-md-4">

      <div class="good-area" align="right">

       <!--  <p>Very Good <img src="image/good.png"></p> -->

     </div>

   </div>

 </div>

</div>

</div>



<!-- /manila-area -->





<!-- queen-area -->



<?php 

//var_dump($room_type);
$j=1;
foreach($room_type as $room_types){
     // var_dump($room_types);
 $adult_person_capacity=$room_types['adult_person_capacity'];
 $hid= $room_types['hotel_id'];
 $rid= $room_types['room_type_id']; 
 // for day rooms available
 $total_rooms=$room_types['no_of_rooms'];
 // for hour base room available
 $total_rooms_hour1=$room_types['no_of_rooms_hour'];
 if(empty($total_rooms_hour1)){
  $total_rooms_hour=5;
 }else{
   $total_rooms_hour=$total_rooms_hour1;
 }
 $room_type_id=$room_types['room_type_id'];
 $dailybasisprice=$hotels->dayhourpricebydailybase($hid,$room_type_id,$day,$month,$year);
    // var_dump($dailybasisprice);
 $dailybasisprice['booked_room_hour'];
 if(!empty($dailybasisprice)){
  $avl_room_day=$total_rooms-$dailybasisprice['booked_room_day'];
  $avl_room_hour=$total_rooms_hour-$dailybasisprice['booked_room_hour'];
  if($optradio=='1'){
    $avl_room=$avl_room_day;
  }else{
    $avl_room=$avl_room_hour;
  }
  $pr_p_day=$dailybasisprice['price_per_day'];
  $h_p_day=$dailybasisprice['price_per_hour'];
}else{
  if($optradio=='1'){
    $avl_room=$total_rooms;
  }else{
    $avl_room=$total_rooms_hour;
  }
}
$room_type_discount1=$user->GetRoomtypeDiscount($room_type_id);
     // var_dump($room_type_discount1);
if(!empty($room_type_discount1)){
 $room_type_discount=$room_type_discount1[0];
     // var_dump($room_type_discount);
}else{
  $room_type_discount='';
}
$room_photo =$hotels->RoomPhotosbyid($hid,$rid);

$pics = $room_photo['room_photo'];

$exp = explode(',',$pics);
$img1 = $exp[0];

$thumbimg1=explode(".",$img1); 
$thumbimg1final=$thumbimg1[0]."_thumb.".$thumbimg1[1];

$img2 = $exp[1];
$thumbimg2=explode(".",$img2); 
$thumbimg2final=$thumbimg2[0]."_thumb.".$thumbimg2[1];

$img3 = $exp[2];
$thumbimg3=explode(".",$img3); 
$thumbimg3final=$thumbimg3[0]."_thumb.".$thumbimg3[1];

?>
<?php 
if(!empty($room_type_discount)){
                 // var_dump($room_type_discount);
                // echo '<pre>';
                // print_r($room_type_discount);

    $discount_type=$room_type_discount['discount_type'];//1 for discount price 2 for discount %
    $discount_price=$room_type_discount['discount_price'];
    $discount_percent=$room_type_discount['discount_percent'];
    $discount_for=$room_type_discount['discount_for'];
    $max_hour=$room_type_discount['max_hour'];
    $min_hour=$room_type_discount['min_hour'];
    $max_day=$room_type_discount['max_day'];
    $min_day=$room_type_discount['min_day'];
  }
  ?>
  <div class="queen-area">

    <div class="container">

      <div class="row">
        <div class="compare-text">
          <h2 align="center">
            <?php
            if(!empty($check_in_date && $check_out_date)){
             $date1 = date_create($check_in_date);
             $date2 = date_create($check_out_date);

//difference between two dates
             $diff = date_diff($date1,$date2);

//count days
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
          <?php 
          if(!empty($discount_for)){

            ?>

            <?php 
            if($optradio=='1'){
                    // echo 'optradio';
                    //echo $discount_for;
              if(!empty($discount_for=='2')){

                if($min_day<=$days){
                  if($days<=$max_day){
                   if(!empty($discount_price)){
                     echo $discount_price.' '.'RM Off On'.' '.$min_day.' '.'day booking';
                   }else{
                     echo $discount_percent.'%'.' '.'Off On'.' '.$min_day.' '.'day booking';
                   }

                 }
               }

             }
           }else{
                // echo 'min_hour';
            if($min_hour!=='0.00'){
                  //echo 'chirag';
              if($min_hour<=$hour){
                if($hour<=$max_hour){
                 if(!empty($discount_price)){
                   echo $discount_price.' '.'RM Off On'.' '.$min_hour.' '.'Hour booking';
                 }else{
                  echo $discount_percent.'%'.' '.'Off On'.' '.$min_hour.' '.'Hour booking';
                }
              }

            }
          }


        }
        ?>
      <?php } ?>
    </h2>
  </div>

  <div class="col-sm-12 col-md-12 last">

    <div class="queen-content">


      <h2><?php echo $room_types['hotel_room_type'];?></h2>

    </div>

    <div class="tt">

      <div class="col-sm-3 col-md-3 qq">

        <div class="queen-pic">
          <?php 
          if (!empty($img1)) {
            ?>
            <img src="image/Room/<?php echo $thumbimg1final;?>">
            <?php
          }else{
            ?>
            <img src="image/no-image.png">
            <?php
          }
          ?>



          <ul>
           <?php 
           if (!empty($img2)) {
            ?>
            <li>
              <img src="image/Room/<?php echo $thumbimg2final;?>">
              <!-- <img src="image/queen2.png"> -->
            </li>

            <?php
          }else{

          }
          ?>

          <?php 
          if (!empty($img3)) {
            ?>
            <li>
              <img src="image/Room/<?php echo $thumbimg3final;?>">
              <!--  <li><img src="image/queen3.png"></li> -->

            </li>

            <?php
          }else{

          }
          ?>




        </ul>


        <?php if(!empty($pics)){ 

          $roomcount = count($exp);
          $j=1;

          if ($roomcount>3) {

            ?>
            <button type="button" class="btn btn-info btn-lg pop-up" data-toggle="modal" data-target="#myModal<?php echo $j; ?>"> more photos</button>
          <?php } ?>


          <div class="modal fade" id="myModal<?php echo $j; ?>" role="dialog">
            <div class="modal-dialog popup-width">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
              <?php //$hotelimage=explode(",",($room_image['hotel_room_image'])); 
              $hotelimage1 = explode(',',$pics);
              ?>
              <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php
                  $k=0; 
                  foreach($hotelimage1 as $hotel_image_result1)
                  {
                        // echo "<pre>";
                        // print_r($hotel_image_result1);
                   ?>
                   <div class="item <?php if($k==0){ ?>active<?php } ?>">
                    <img src="image/<?php echo $hotel_image_result1; ?>" alt="<?php echo $hotel_image_result1; ?>" style="width:100%;">
                  </div>
                  <?php
                  $k++;
                } ?>

              </div>

              <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                <span class="sr-only">Next</span>
              </a>

              <ul class="carousel-indicators">
                <?php $k=0; foreach($hotelimage1 as $hotel_image_result1)
                {
                          // echo "<pre>";
                          // print_r($hotel_image_result);

                  $thumbimage=explode(".",$hotel_image_result1); 
                  $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
                  ?>
                  <li data-target="#myCarousel2" data-slide-to="<?php echo $k; ?>" <?php if($k==0){ ?>class="active"<?php } ?>><img src="image/thumb/<?php echo $thumbimagefinal; ?>"></li>
                  <?php $k++;
                }
                ?>
              </ul>
            </div>
          </div>
        </div>

      </div>

    </div>
  <?php } ?>
</div> 

</div>



<div class="col-sm-9 col-md-9 new">

  <div class="row border-text">

    <!-- facility section -->


    <div class="col-sm-4 col-md-4  title-pad">
      <div class="title-text">
        <h3>Choose your deal</h3>
      </div>

      <div class="break-area">


        <h2>Benefits</h2>

        <ul>
          <?php 

          $facadmin = $result_hotel['28'];
          if (!empty($facadmin)) {


            $expfacadmin = explode(',', $facadmin);           
            
            foreach ($expfacadmin as $expfacadmins) {

              $facilities =$hotels->GetAllfacility($expfacadmins);
              if (!empty($facilities)) {
                
              foreach ($facilities as $facility) {
                      // echo "<per>";
                      // print_r($facility);

                ?>
                <li><!--<img src="image/<?php //echo $facility['image'];?>" style="width: 25px;height: 25px;">--><i class="fa fa-check-circle" aria-hidden="true"></i><?php echo $facility['facility_name'];?></li>

              <?php } } }  
            }
            ?>

            <?php
            $fac = $result_hotel['hotel_facilities'];
            $expfac = explode(',', $fac);
            if (!empty($expfac)) {

              foreach ($expfac as $expfacs) {

                $hotel_facility =$hotels->GetAllhotelfacility($expfacs);
            // echo "<pre>";
            // print_r($hotel_facility);
            // }



                  //$hotel_facility =$hotels->GetAllhotelfacility($_GET['hotel_id']);
                if (!empty($hotel_facility)) {


                  foreach ($hotel_facility as $hotel_facilities) {
                      // echo "<per>";
                      // print_r($facility);

                    ?>
                    <li><!--<img src="image/<?php //echo $hotel_facilities['image'];?>" style="width: 25px;height: 25px;">--><i class="fa fa-check-circle" aria-hidden="true"></i><?php echo $hotel_facilities['facility_name'];?></li>
                  <?php } } } } ?>

                  <?php 
                  $room_facility =$hotels->GetAllroomfacility($_REQUEST['hotel_id']);
                  if (!empty($room_facility)) {

                    foreach ($room_facility as $room_facilities) {
                      // echo "<per>";
                      // print_r($facility);

                      ?>
                      <li><!--<img src="image/<?php //echo $room_facilities['image'];?>" style="width: 25px;height: 25px;">--><i class="fa fa-check-circle" aria-hidden="true"></i><?php echo $room_facilities['facility_name'];?></li>

                    <?php } }?>

                  </ul>

                </div>

              </div>

              <!-- facility section end -->

              <div class="col-sm-3 col-md-3 title-pad">
               <div class="title-text">
                <h3>Price per night</h3>
              </div>

              <?php 
              if(!empty($optradio=='1')){ ?>
                <div class="save-area" align="right">
                  <!-- <p>SAVE 55% TODAY!</p> -->
                  <ul>
                   <?php
                   $room_types['price_per_day'];
                   $room_types['price_per_hour'];
                   $off = $room_types['price_per_day']*10;
                   $price = $off/100;
                   $offprice = $room_types['price_per_day'] - $price;
                   ?>
                    <!-- <li>
                     
                      <del><?php echo $room_types['price_per_day'];?></del>
                    </li> -->
                    <!-- <li><img src="image/off.png"><span><del>Rs <?php echo $price;?></del></span></li> -->
                  </ul>
                  <h2>RM <span><?php if(!empty($pr_p_day)){echo $pr_p_day;}else{echo $room_types['price_per_day'];}?></span></h2>
                </div>
              <? }elseif(!empty($optradio=='2')){ ?>
                <div class="save-area" align="right">
                  <h3>Price per Hour</h3>
                  <!-- <p>SAVE 55% TODAY!</p> -->
                  <ul>
                   <?php
                   $room_types['price_per_hour'];
                   $off = $room_types['price_per_hour']*10;
                   $price = $off/100;
                   $offprice = $room_types['price_per_hour'] - $price;
                   ?>
                   <!--  <li>
                     
                      <del><?php echo $room_types['price_per_hour'];?></del>
                    </li> -->
                    <!-- <li><img src="image/off.png"><span><del>Rs <?php echo $price;?></del></span></li> -->
                  </ul>
                  <h2>RM <span><?php if(!empty($h_p_day)){echo $h_p_day;}else{echo $room_types['price_per_hour'];}?></span></h2>
                </div>
              <? }else{ ?>
                <div class="save-area" align="right">
                  <h3>Price per night</h3>
                  <!-- <p>SAVE 55% TODAY!</p> -->
                  <ul>
                    <?php
                    $room_types['price_per_day'];
                    $room_types['price_per_hour'];
                    $off = $room_types['price_per_day']*10;
                    $price = $off/100;
                    $offprice = $room_types['price_per_day'] - $price;
                    ?>
                   <!--  <li>
                      
                      <del><?php echo $room_types['price_per_day'];?></del>
                    </li> -->
                    <!-- <li><img src="image/off.png"><span><del>Rs <?php echo $price;?></del></span></li> -->
                  </ul>
                  <h2>RM <span><?php if(!empty($pr_p_day)){echo $pr_p_day;}else{echo $room_types['price_per_day'];}?></span></h2>
                </div>
              <?  }
              ?>

            </div>
            <form action="booking-detail.php" method="post" class="detail-form" style="display:flex;">      

              <div class="col-sm-2 col-md-2 room title-pad detail2">
               <div class="title-text">
                <!-- <?php 
                $room_count=$hotels->availableRoomsInHotelType($rid,$check_in_date,$check_out_date,$hotel_id);
                ?> -->
                <h3>Room</h3>
              </div>

              <div class="select-area">

                <div class="form-group">

                  

                  <select class="form-control" name="noofroom"  id="<?php echo $room_types['room_type_id'];?>" onchange="rooms(this.id,this.value)">
                    <?php 
                    if($avl_room>0){
                     for($i=1;$i<=$avl_room;$i++){ ?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?  }
                  }else{ ?>
                    <option value="0">Not Available</option>
                  <?  }


                  ?>



                </select>

                <!-- <input type="hidden" id="sel1_<?php echo $room_types['room_type_id'];?>" value=""> -->
                <input type="hidden" id="adult_person_capacity" value="<?php echo $adult_person_capacity;?>">
                <span id="show_error" style="color: red;"></span>
              </div>

            </div>

          </div>

          <script type="text/javascript">
           function rooms(id,value){
            // alert(id);
            // alert(value);
             var b=$("#total_price2_"+id).val();
             var c=value*b;
             var d =Math.floor(c);
             $("#total_price1_"+id).html(d.toLocaleString('en'));
             $("#total_price_"+id).val(d);
             var person=$("#no_person").val();
             var adult_person=$("#adult_person_capacity").val();
             var rooms=value;
             var calc=rooms*adult_person;
             if(person>calc){
              if(person==calc){
                $("#show_error").html(' ');
              }else{
                $("#show_error").html('please select more rooms');
              }
              
            }else{
              $("#show_error").html(' ');
            }
          }
          // $(function(){
          //   var a=$("#no_person").val();
          //   var b=$("#adult_person_capacity").val();
          //   var c=$("#sel1").val();
          //   var e=c*b;
          //   if(a>e){
          //     if(a==e){
          //       $("#show_error").html(' ');
          //     }else{
          //       $("#show_error").html('please select more rooms');
          //     }

          //   }else{
          //     $("#show_error").html(' ');
          //   }
          // })
        </script>

        <div class="col-sm-3 col-md-3 booked title-pad detail2">
         <div class="title-text">

          <h3>Compare Price</h3>
        </div>
        <div class="row uj">

          <div class="compare-content">
            <div class="col-sm-12 col-md-12 hh">
              <div class="comp-text">
                <h2>RM <?php if(!empty($pr_p_day)){echo number_format($pr_p_day);}else{echo number_format($room_types['price_per_day']);}?><span></span></h2>
                <div class="gg">
                  <h3 align="right">Per Day</h3>
                </div>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 hh">
              <div class="comp-text">
                <h2>RM <?php if(!empty($h_p_day)){echo number_format($h_p_day);}else{echo number_format($room_types['price_per_hour']);}?><span></span></h2>
                <div class="gg">
                  <h3 align="right">Per Hour</h3>
                </div>
              </div>
            </div>
            <?php 

            if(!empty($optradio=='1')){



             $date1 = date_create($check_in_date);
             $date2 = date_create($check_out_date);

//difference between two dates
             $diff = date_diff($date1,$date2);

//count days
             $days=$diff->format("%a");
             if(!empty($pr_p_day)){$room_types['price_per_day']=$pr_p_day;}
             $total_price=$room_types['price_per_day']*$days;

           }elseif(!empty($optradio=='2')){
                        $your_date = strtotime($check_in_date); // or your date as well
                        $now = strtotime($check_out_date);
                        $checkInTime=strtotime($check_in_time);
                        $checkOutTime=strtotime($check_out_time);
                        $datediff = $checkOutTime - $checkInTime;

                        $hour=($datediff / 3600 );
                        if(!empty($h_p_day)){$room_types['price_per_hour']=$h_p_day;}
                        $total_price=$room_types['price_per_hour']*$hour;
                      }
                      ?>

                      <div class="col-sm-12 col-md-12 hh">
                        <?php 
                        if(!empty($total_price)){ ?>
                         <div class="comp-text">
                          <h2>RM<span id="total_price1_<?php echo $room_types['room_type_id'];?>" style="font-size: 14px;font-weight: 500;color: #000;/* margin-left: 4px; */"><?php if(!empty($total_price)){echo number_format($total_price);}?></span></h2>
                          <?php 
                          if(!empty($total_price)){ ?>
                            <div class="gg">
                              <h3 align="right">Total Price</h3>
                            </div>
                          <?php  }else{ ?>

                          <?php }
                          ?>

                        </div>
                      <?php  }else{ ?>

                      <?php }
                      ?>

                    </div>







                  </div>
                </div>


                <!-- <form action="booking-detail.php" method="post"> -->

                  <div class="most-area">

                    <input type="hidden" name="hotel_id" value="<?php echo $id;?>">
                    <input type="hidden" name="hotel_room_type_id" value="<?php echo $room_types['room_type_id'];?>">
                    <input type="hidden" name="no_of_person" id="no_person" value="<?php echo $no_of_adults;?>">
                    <input type="hidden" name="no_of_childs" value="<?php echo $no_of_childs;?>">
                    <input type="hidden" name="check_in_date" value="<?php echo $check_in_date;?>">
                    <input type="hidden" name="check_out_date" value="<?php echo $check_out_date;?>">
                    <input type="hidden" name="check_in_time" value="<?php echo $check_in_time;?>">
                    <input type="hidden" name="check_out_time" value="<?php echo $check_out_time;?>">
                    <input type="hidden" name="hotel_price" value="<?php echo $offprice;?>">
                    <input type="hidden" name="total_price" id="total_price_<?php echo $room_types['room_type_id'];?>" value="<?php echo $total_price;?>">
                    <input type="hidden" name="discount_type" value="<?php echo $discount_type;?>">
                    <input type="hidden" name="discount_price" value="<?php echo $discount_price;?>">
                    <input type="hidden" name="discount_percent" value="<?php echo $discount_percent;?>">
                    <input type="hidden" name="optradio" value="<?php echo $optradio;?>">
                    <input type="hidden" name="discount_for" value="<?php echo $discount_for;?>">
                    <input type="hidden" name="max_hour" value="<?php echo $max_hour;?>">
                    <input type="hidden" name="min_hour" value="<?php echo $min_hour;?>">
                    <input type="hidden" name="max_day" value="<?php echo $max_day;?>">
                    <input type="hidden" name="min_day" value="<?php echo $min_day;?>">

                    <input type="submit" class="btn btn-default most" value="Book Now" name="book_now" id="book_now" style=" background: #474747;  color: #fff;   margin-left: auto;    margin-right: auto;    width: 83%;    display: block;
                    margin-bottom: 12px;" <?php if(($room_count>0)){}else{echo 'disabled';}?>>

                  </div>

                </form>
              </div>
              <input type="hidden" name="total_price" class="title-color" id="total_price2_<?php echo $room_types['room_type_id'];?>" value="<?php echo $total_price;?>">



            </div>

          </div>

        </div>

      </div>

    </div>
    <?php 
    $optradio;
    $check_in_date;
    $hotel_id;
    $room_type_id;
    ?>
    <?php if($optradio=='2'){
      $roomavailable=$hotels->roomAvailableByHour($room_type_id,$check_in_date,$hotel_id);
      // var_dump($roomavailable);
      if($roomavailable>0){
       $count=count($roomavailable);
     }else{
      $count='0';
    }
    ?>
    <?php if($count!=='0'){?>
      <div class="avail-area">
        <div class="container">
          <div class="row">

            <?php 
            for($i=0;$i<=$count-1;$i++){ ?>
             <div class="col-sm-2 col-md-2">
              <div class="avail-content booked" align="center">
                <h2><?php echo $check_in_date;?></h2>
                <p><?php echo date('h:i a',strtotime($roomavailable[$i]['check_in_time']));?> to <?php echo date('h:i a',strtotime($roomavailable[$i]['check_out_time']));?></p>
                <a href="#">Booked</a>
              </div>
            </div>
          <?   }
          ?>
        </div>
      </div>
    </div>
  <?php }else{ ?>
  <!-- <div class="avail-area">
  <div class="container">
    <div class="row">
      <?php 
        for($i=01;$i<=22;$i+=2){ ?>
           <div class="col-sm-2 col-md-2">
        <div class="avail-content" align="center">
          <h2><?php echo $check_in_date;?></h2>
          <p><?php echo $i;?>:00 to <?php echo $i+2;?>:00</p>
          <a href="#">Available</a>
        </div>
      </div>
     <?   }
      ?>
     

    </div>
  </div>
</div> -->
<?php } ?>
<?php } ?>

</div>

</div>

<?php
$j++;
}

?>



<!-- /avail-area -->


<!-- /avail-area-close -->

<!-- user-comment-area -->



<div class="user-comment-area">
  <div class="container">
    <div class="row">
      <?php 
      $result_review=$reviews->FetchReviews($_REQUEST['hotel_id']);
      if ($result_review>0) {

        ?>
        <div class="col-sm-12 col-md-12">
          <div class="user-review">
            <h2>User reviews</h2>
          </div>
        </div>
      <?php } ?>
      <?php 
      $result_review=$reviews->FetchReviews($_REQUEST['hotel_id']);
      if (!empty($result_review)) {


        foreach ($result_review as  $value) {
          $date = $value['created_at'];
          $exp = explode(' ', $date);

          $original = $exp[0];
          $startdate = date("j F, Y", strtotime($original));


          ?>
          <div class="col-sm-6 col-md-6">
            <div class="user-location">
              <p><?php echo $value['fname'].' '.$value['lname'];?>  
              <!-- <span>| Lucknow the great hotel</span> -->
            </p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="user-locatin" align="right">
            <p><?php echo $startdate;?>
            <!-- <span>11:28am</span> -->
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="user-review-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="user-review-content">
          <?php $rate=  $value['user_rating'];?>
          <ul>
            <?php 
            for($i=0;$i<= $rate-1;$i++){
              ?>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <!-- <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li> -->
          <?php } ?>
        </ul>
        <p><?php echo $value['user_reviews'];?></p>
      </div>
    </div>
  </div>

<?php }  } ?>
</div>
</div>

<!-- <h2>Vendor Review</h2> -->

<?php 
//$vendor_review=$reviews->FetchvendorReviews($_REQUEST['hotel_id']);

// echo "<pre>";
// print_r($vendor_review);

// foreach ($vendor_review as $value) {
//   echo $value['vreview'].'<br>';
// }

?>



<div class="user-comment-area">
  <div class="container">
    <div class="row">
      <?php 
      $vendor_review=$reviews->FetchvendorReviews($_REQUEST['hotel_id']);

      if ($vendor_review>0) {

        ?>
        <div class="col-sm-12 col-md-12">
          <div class="user-review">
            <h2>Vendor/Manager Review</h2>
          </div>
        </div>
      <?php } ?>
      <?php 
      $vendor_review=$reviews->FetchvendorReviews($_REQUEST['hotel_id']);
      if (!empty($vendor_review)) {


        foreach ($vendor_review as  $value1) {
          // echo "<pre>";
          // print_r($value1);

          $date = $value1['created_at'];
          $exp = explode(' ', $date);

          $original = $exp[0];
          $startdate = date("j F, Y", strtotime($original));


          ?>
          <div class="col-sm-6 col-md-6">
            <div class="user-location">
              <p><?php echo $value1['v_fname'].' '.$value1['v_lname'];

              if($value1['user_type']==1){
                echo'(Manager)';
              }
              elseif($value1['user_type']==2){
                echo'(Vendor)';
              }
              ?>  
              <!-- <span>| Lucknow the great hotel</span> -->
            </p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="user-locatin" align="right">
            <p><?php echo $startdate;?>
            <!-- <span>11:28am</span> -->
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="user-review-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="user-review-content">
          <?php //$rate=  $value['user_rating'];?>
         <!--  <ul>
            <?php 
            for($i=0;$i<= $rate-1;$i++){
              ?>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
          <?php } ?>
        </ul> -->
        <p><?php echo $value1['vreview'];?></p>
      </div>
    </div>
  </div>

<?php }  } ?>
</div>
</div>


<!-- <div class="user-comment-area sec">
  <div class="container">
    <div class="row">

      <div class="col-sm-6 col-md-6">
        <div class="user-location">
          <p>John  <span>| Lucknow the great hotel</span></p>
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
        <div class="user-locatin" align="right">
          <p>26/08/2018  <span>11:28am</span></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="user-review-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="user-review-content sec">
          <ul>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
          </ul>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- majestic-area -->

<!-- <div class="queen-area">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 col-md-12 last">

        <div class="queen-content">

          <h2>Majestic Room </h2>

        </div>

        <div class="tt">

        <div class="col-sm-3 col-md-3 qq">

          <div class="queen-pic">

            <img src="image/queen1.png">

            <ul>

              <li><img src="image/queen2.png"></li>

              <li><img src="image/queen3.png"></li>

            </ul>

         </div> 

        </div>



        <div class="col-sm-9 col-md-9 new">

          <div class="row">

      

            <div class="col-sm-4 col-md-4">

              <div class="break-area">

              <h3>Choose your deal</h3>

                <h2>Benefits</h2>

                <ul>

                  <li><img src="image/ben1.png">No breakfast</li>

                  <li><img src="image/ben2.png">Pay nothing until July 08, 2018</li>

                  <li><img src="image/ben3.png">Free Wi-Fi</li>

                  <li><img src="image/ben4.png">Free cancellation before July 10</li>

                  <li><img src="image/ben5.png">Non-smoking </li>

                  <li><img src="image/ben6.png">Shower</li>

                </ul>

              </div>

            </div>

            <div class="col-sm-3 col-md-3">

              <div class="save-area" align="right">

                <h3>Price per night</h3>

                <p>SAVE 55% TODAY!</p>

                <ul>

                  <li><del>Rs 3289</del></li>

                  <li><img src="image/off.png"><span><del>Rs 1809</del></span></li>

                </ul>

                <h2>Rs <span>1,726</span></h2>

              </div>

            </div>



            <div class="col-sm-2 col-md-2 room">

              <h3>Room</h3>

              <div class="select-area">

                <div class="form-group">

  <select class="form-control" id="sel1">

    <option>1</option>

    <option>2</option>

    <option>3</option>

    <option>4</option>

  </select>

</div>

              </div>

            </div>



            <div class="col-sm-3 col-md-3 booked">

              <h3>most booked</h3>

              <div class="most-area">

                <button type="button" class="btn btn-default most">Book Now</button>

              </div>

            </div>

            

          </div>

        </div>

      </div>

    </div>

    </div>

  </div>

</div> -->



<!-- premier-area -->

<!-- <div class="queen-area">

  <div class="container">

    <div class="row">

      <div class="col-sm-12 col-md-12 last">

        <div class="queen-content">

          <h2>Premier Room </h2>

        </div>

        <div class="tt">

        <div class="col-sm-3 col-md-3 qq">

          <div class="queen-pic">

            <img src="image/queen1.png">

            <ul>

              <li><img src="image/queen2.png"></li>

              <li><img src="image/queen3.png"></li>

            </ul>

         </div> 

        </div>



        <div class="col-sm-9 col-md-9 new">

          <div class="row">

      

            <div class="col-sm-4 col-md-4">

              <div class="break-area">

              <h3>Choose your deal</h3>

                <h2>Benefits</h2>

                <ul>

                  <li><img src="image/ben1.png">No breakfast</li>

                  <li><img src="image/ben2.png">Pay nothing until July 08, 2018</li>

                  <li><img src="image/ben3.png">Free Wi-Fi</li>

                  <li><img src="image/ben4.png">Free cancellation before July 10</li>

                  <li><img src="image/ben5.png">Non-smoking </li>

                  <li><img src="image/ben6.png">Shower</li>

                </ul>

              </div>

            </div>

            <div class="col-sm-3 col-md-3">

              <div class="save-area" align="right">

                <h3>Price per night</h3>

                <p>SAVE 55% TODAY!</p>

                <ul>

                  <li><del>Rs 3289</del></li>

                  <li><img src="image/off.png"><span><del>Rs 1809</del></span></li>

                </ul>

                <h2>Rs <span>1,726</span></h2>

              </div>

            </div>



            <div class="col-sm-2 col-md-2 room">

              <h3>Room</h3>

              <div class="select-area">

                <div class="form-group">

  <select class="form-control" id="sel1">

    <option>1</option>

    <option>2</option>

    <option>3</option>

    <option>4</option>

  </select>

</div>

              </div>

            </div>



            <div class="col-sm-3 col-md-3 booked">

              <h3>most booked</h3>

              <div class="most-area">

                <button type="button" class="btn btn-default most">Book Now</button>

              </div>

            </div>

            

          </div>

        </div>

      </div>

    </div>

    </div>

  </div>

</div> -->







<!-- footer-area -->

<div class="container">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <img src="image/banner3.jpg" alt="Los Angeles" style="width:100%;">
              </div>
              <div class="item">
                <img src="image/banner3.jpg" alt="Chicago" style="width:100%;">
              </div>
              <div class="item">
                <img src="image/banner3.jpg" alt="New york" style="width:100%;">
              </div>
              <div class="item">
                <img src="image/banner3.jpg" alt="New york" style="width:100%;">
              </div>
              <div class="item">
                <img src="image/banner3.jpg" alt="New york" style="width:100%;">
              </div>
              <div class="item">
                <img src="image/banner3.jpg" alt="New york" style="width:100%;">
              </div>
              <div class="item">
                <img src="image/banner3.jpg" alt="New york" style="width:100%;">
              </div>
              <div class="item">
                <img src="image/banner3.jpg" alt="New york" style="width:100%;">
              </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
              <span class="sr-only">Next</span>
            </a>

            <ul class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"><img src="http://placehold.it/1200x400/cccccc/999999"></li>
              <li data-target="#myCarousel" data-slide-to="1"><img src="image/banner3.jpg""></li>
              <li data-target="#myCarousel" data-slide-to="2"><img src="image/banner3.jpg""></li>
              <li data-target="#myCarousel" data-slide-to="3"><img src="image/banner3.jpg""></li>
              <li data-target="#myCarousel" data-slide-to="4"><img src="image/banner3.jpg""></li>
              <li data-target="#myCarousel" data-slide-to="5"><img src="image/banner3.jpg""></li>
              <li data-target="#myCarousel" data-slide-to="6"><img src="image/banner3.jpg""></li>
              <li data-target="#myCarousel" data-slide-to="7"><img src="image/banner3.jpg""></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
</div>



<?php include_once'footer.php';?>



<!-- /footer-area -->        











<script type="text/javascript">jssor_1_slider_init();</script>

<script type="text/javascript">
function reset(id){
  alert('chirag');
 console.log(id);
 console.log('chirag');
// $("#"+id).prop('selectedIndex',0);
}
</script>







</body>

</html>




<style type="text/css">
.comp-text {
  display: inline-flex;
  margin-top: 7px;

}


.comp-text:before {
  background: #fff;
  position: absolute;
  width: 82%;
  height: 39px;
  content: '';
  left: 19px;
  top: 5px;
  border: 1px solid #cac5c5;
  border-radius: 3px;
}

.comp-text h2{z-index: 1111; margin-left: 20px !important;}
.queen-pic ul li img {
  height: 96px;
  width: 126px;
  
  
}
span.star-detail {
  color: orange;
  margin-top: 7px;
  margin-left: 0px !Important;
  font-size: 17px;
  position: relative;
  left: 9px;
}
.manila-content span {
  padding: 0px 12px;
}
.manila-content ul li h2 {
  font-size: 16px;
  margin-bottom: 13px;

}
.break-area i {
  padding: 0px 8px 0px 0px;
  font-size: 15px;
}
.queen-content h2:before {
 background: transparent;

}
.queen-content h2 {
  font-family: 'Open Sans', sans-serif;
  font-size: 28px;
  color: #222;
  padding-bottom: 7px;
  font-weight: 500;
  text-transform: capitalize;
  border-bottom: 1px solid #222;
  text-align: center;
  margin: 0;
}
</style>
<script type="text/javascript">
  $(function(){
    //alert('chirag');
    var a =$("#sel1").val();
    // console.log(a);
    if(a==0){
     $('#book_now').prop('disabled', true);
   }
 });
</script>





<!-- Modal -->


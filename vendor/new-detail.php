<?php
include_once'Object.php';
 $id = $_GET['hotel_id'];
  $result=$user->Hoteldetailbyid($id);
  $hotel_id = $result['hotel_id'];

  $room_type =$user->GetRoomtypeByHotelId($hotel_id);

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

        
 <?php include 'header.php';?>        

<!-- check-area -->
<!-- <div class="check-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="check-content">
          <div class="col-sm-2 col-md-2">
            <div class="best">
              <h3>BOOK NOW</h3>
              <p>Best Price Guranted</p>
            </div>
          </div> 
          <div class="col-sm-3 col-md-3 aa">
            <div class="month zz">
              <h3>CHECK IN</h3>
              <p><img src="image/calender.png">10 MARCH 2018<br><span>SATURDAY</span></p>
            </div>
          </div> 
          <div class="col-sm-2 col-md-2 bb">
            <div class="month ff">
              <h3>CHECK OUT</h3>
              <p><img src="image/calender.png">10 MARCH 2018<br><span>SATURDAY</span></p>
            </div>
          </div> 
           <div class="col-sm-3 col-md-3 bb">
            <div class="month rr">
              <h3>GOING TO</h3>
              <input type="text" class="des" placeholder="Enter Destination" name="Enter Destination">
            </div>
          </div> 
          <div class="col-sm-2 col-md-2 bb">
            <div class="month try">
             <button type="button" class="btn search">Search</button>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>
 -->
<!-- /check-area -->


<!-- bed-area -->

<!-- /bed-area -->


<!-- Sogor-area -->

<div class="Sogor-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="sogor-content">
          <h2 align="center">Our Hotels</h2>
          <p align="center">The Best Oriental Hotel</p>

          


      <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:400px;overflow:hidden;visibility:hidden;background-color:#24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:720px;height:480px;overflow:hidden;">
            <div data-p="150.00">
                <img data-u="image" src="img/004.jpg" />
                <img data-u="thumb" src="img/004-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/005.jpg" />
                <img data-u="thumb" src="img/005-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/006.jpg" />
                <img data-u="thumb" src="img/006-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/007.jpg" />
                <img data-u="thumb" src="img/007-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/008.jpg" />
                <img data-u="thumb" src="img/008-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/009.jpg" />
                <img data-u="thumb" src="img/009-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/010.jpg" />
                <img data-u="thumb" src="img/010-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/013.jpg" />
                <img data-u="thumb" src="img/013-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/014.jpg" />
                <img data-u="thumb" src="img/014-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/015.jpg" />
                <img data-u="thumb" src="img/015-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/016.jpg" />
                <img data-u="thumb" src="img/016-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/017.jpg" />
                <img data-u="thumb" src="img/017-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/018.jpg" />
                <img data-u="thumb" src="img/018-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/015.jpg" />
                <img data-u="thumb" src="img/015-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/016.jpg" />
                <img data-u="thumb" src="img/016-s99x66.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/017.jpg" />
                <img data-u="thumb" src="img/017-s99x66.jpg" />
            </div>
            

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
        <!-- <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:270px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div> -->
    </div>





        </div>
      </div>
    </div>
  </div>
</div>

<!-- /Sogor-area --> 




<!-- manila-area -->

<div class="manila-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-8">
        <div class="manila-content">
          <ul>
            <li><h2><?php echo $result['hotel_name'];?>
              <?php 
                  $star = $result['hotel_star_category'];
                  for ($i=0; $i < $star ; $i++) { 
                    ?>
                    <img src="image/star.png">
                    <?php
                  }

                  ?>

              

            </h2></li>
            <li><img src="image/area.png"><?php echo $result['hotel_address'];?>, <?php echo $result['hotel_city'];?>, <?php echo $result['hotel_pin_code'];?> - </li>
            <li><h3>1 room types with 12 total room offers available (See all rooms)</h3></li>

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
foreach($room_type as $room_types){
  ?>
<div class="queen-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 last">
        <div class="queen-content">
          <h2><?php echo $room_types['hotel_room_type'];?></h2>
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
                  <li>
                    <?php
                    $room_types['price_per_day'];

                   $off = $room_types['price_per_day']*10;
                   $price = $off/100;
                    $offprice = $room_types['price_per_day'] - $price;


                    ?>

                    <del><?php echo $room_types['price_per_day'];?></del></li>
                  <li><img src="image/off.png"><span><del>Rs <?php echo $price;?></del></span></li>
                </ul>
                <h2>Rs <span><?php echo $offprice;?></span></h2>
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
</div>
  <?php
}
?>



<!-- /queen-area -->
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


<?php 
if (isset($_POST['submit'])) {
  //var_dump($_POST);
  // if (empty($_POST['date'])) {
  //   //echo '<script>alert("Please choose Date");</script>';
  //   echo 'ksdhjlfs';
  // }

  // elseif ($_POST['date1'] == '') {
  //   echo '<script>alert("Please choose other Date");</script>';
  // }
  // else{
  //   header("location:search.php");
  // }
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i" rel="stylesheet">
<!--<script src="js/jquery.min.js"></script>-->
 <script type="text/javascript"  src='http://cdn.renderedfont.com/js/renderedfont-0.8.min.js#free'></script>

<style>
a.selected {
  background-color:#1F75CC;
  color:white;
  z-index:100;
}

.messagepop {
    background-color: #FFFFFF;
    border: 1px solid #999999;
    cursor: default;
    display: none;
    margin-top: 15px;
    position: absolute;
    text-align: left;
    width: 170px;
    z-index: 50;
    padding: 24px 26px 20px;
    right: 0px;
}

label {
  display: block;
  margin-bottom: 3px;
  padding-left: 15px;
  text-indent: -15px;
}

.messagepop p, .messagepop.div {
  border-bottom: 1px solid #EFEFEF;
  margin: 8px 0;
  padding-bottom: 8px;
}
.PlusMinusRow li {
    color: #000;
    display: inline-block;
    padding: 0px 8px;
    font-size: 16px;
}
.PlusMinusRow li {
    color: #468cff;
    display: inline-block;
    padding: 0px 11px;
    font-size: 15px;
}
a.selected {
    background-color: transparent;
    color: white;
    z-index: 100;
}
.PlusMinusRow {
    border-bottom: 2px solid #f1f1f1;
    margin-top: -17px;
}
span#adult_label {
    color: lightgray;
    font-weight: 600;
    font-size: 12px;
}

.month-area {
    display: inline-flex;
    margin-top: 19px;
    width: 100%;
}
.PlusMinusRow i {
    font-size: 11px;
    cursor: pointer;
}

</style>
 <!-- <script>
function verify()
{
if(document.getElementById("date").value=="")
{
document.getElementById("date").focus();
document.getElementById("dates").innerHTML="Please enter date";
return false;
}
else
{
document.getElementById("dates").style.display="none";
}
if(document.getElementById("date1").value=="")
{
document.getElementById("date1").focus();
document.getElementById("dates1").innerHTML="Please enter second date";
return false;
}
else
{
document.getElementById("dates1").style.display="none";
}





return true;
}
</script> -->

<body>


 <!-- header -->

 <!-- <div class="header-area">
   <div class="container">
     <div class="row">
       <div class="col-sm-12 col-md-12">
         <div class="header-content">
           <div class="col-sm-10 col-md-10">
             <div class="menu">
                <nav class="navbar navbar-inverse sho">
                  <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-2" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar top-bar"></span>
                  <span class="icon-bar middle-bar"></span>
                  <span class="icon-bar bottom-bar"></span>
                  </button>
                  </div>

                     <div class="collapse navbar-collapse" id="example-2">
                       <ul class="nav navbar-nav">


                        <li><a href="#">Home</a></li>
                        <li><a href="#">Hotels</a></li>

                        <li><a href="#">Info</a></li>
                        <li><a href="#">Rooms</a></li>
                        <li class="codes"><a href="#">Shortcodes </a></li>
                        <li><a href="#">Areas</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                       </ul>

                    </div>

                      </nav>
             </div>
           </div>
           <div class="col-sm-2 col-md-2">
             <div class="book">
               <button type="button" class="btn now">Book Now</button>
             </div>
           </div>

         </div>

       </div>
       <div class="row">
        <div class="col-sm-12 col-md-12 hhh">
       <div class="text"><p align="center">With Rest & Go<br><span>You’ll Never Forget<br>
Your Stay</span></p></div>
        </div>
     </div>
   </div>
   </div>
 </div>


<div class="check-area">
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
</div> -->

<!-- /check-area -->

<!-- header -->

 <div class="header-area">
   <div class="container">
     <div class="row">
       <div class="col-sm-12 col-md-12">
         <div class="header-content">
           <div class="col-sm-12 col-md-12">
             <div class="menu">
                <nav class="navbar navbar-inverse sho">
                  <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-2" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar top-bar"></span>
                  <span class="icon-bar middle-bar"></span>
                  <span class="icon-bar bottom-bar"></span>
                  </button>
                  </div>
                     <!-- .navbar-collapse -->
                     <div class="collapse navbar-collapse" id="example-2" align="center">
                       <ul class="nav navbar-nav">

                         <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">+POST IDEAS <span class="caret"></span></a>
             <ul class="dropdown-menu drop">
              <li><a href="#">Bid</a></li>
              <li><a href="#">Buy Now</a></li>
              <li><a href="#">Donate</a></li>
            </ul>
          </li> -->
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Hotels</a></li>
                        <li  class="codes"><a href="#">Blog</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register </a></li>
                        <li><a href="#">Contact Us</a></li>
                       </ul>

                    </div><!-- /.navbar-collapse -->

                      </nav>
             </div>
           </div>
          <!--  <div class="col-sm-1 col-md-1">
             <div class="book">
               <button type="button" class="btn now">Book Now</button>
             </div>
           </div> -->

         </div>

       </div>
       <div class="row" align="center">
         <div class="text"><p align="center">With Rest &amp; Go<br><span>You’ll Never Forget<br>
Your Stay</span></p></div>
       </div>
       <div class="row">
     <form action="search.php" class="icon" method="post" onsubmit="return verify();">
        <div class="col-sm-12 col-md-12 ser home">
          <div class="search-hotel-area">
            <div class="col-sm-4 col-md-4">
              
              <label class="se"><i class="fa fa-map-marker" aria-hidden="true"></i></label>
            <input type="text"  placeholder="Enter Destination.." name="search">


            </div>
           <div class="col-sm-2 col-md-2">

          <div class="month-area ss">

            <img src="image/calender.png">

            <div class="time-area">


                <div class="input-group date">


                  <input type="text" class="form-control" name="date" id="date">
                  <div id="dates" class="input-msg"></div>

                  <div class="input-group-addon">

                    <span class="glyphicon glyphicon-th"></span>

                  </div>

                </div>

                <input type="time" name="time" id="time">


            </div>

          </div>

        </div>

        <div class="col-sm-2 col-md-2 ">

          <div class="month-area ss">

            <img src="image/calender.png">

            <div class="time-area">

              <div class="input-group date">

                <input type="text" class="form-control" name="date1" id="date1">
                <div id="dates1" class="input-msg"></div>

                <div class="input-group-addon">

                  <span class="glyphicon glyphicon-th"></span>

                </div>

              </div>

              <input type="time" name="time1" id="time1">

            </div>

          </div>

        </div>

        <div class="col-sm-2 col-md-2 ">
<a href="/contact" id="contact">
          <div class="month-area ss">

            <img src="image/adult.png">

            <div class="time-area">

              <h2>5 adults</h2>

              <p>4 rooms</p>

            </div>

          </div>
		  </a>
<div class="messagepop pop">
<div class="row">
<div class="col-md-12" style="padding: 0;">
    <div class="PlusMinusRow" data-selenium="occupancyRooms">
	<ul>
	<li>
	<i class="fa fa-minus" aria-hidden="true" id="inc" onclick="incNumber()"></i>	</li>

		    <li id="display"><span id="adult_count">1</span>
			<span id="adult_label"> Adult</span>
			</li>
				<li><i class="fa fa-plus" aria-hidden="true" id="dec" onclick="decNumber()"/></i></li>
					<li>
	<i class="fa fa-minus" aria-hidden="true" id="inc" onclick="incNumber()"></i>	</li>

		    <li id="display"><span id="adult_count">1</span>
			<span id="adult_label"> Adult</span>
			</li>
				<li><i class="fa fa-plus" aria-hidden="true" id="dec" onclick="decNumber()"/></i></li>
						<li>
	<i class="fa fa-minus" aria-hidden="true" id="inc" onclick="incNumber()"></i>	</li>

		    <li id="display"><span id="adult_count">1</span>
			<span id="adult_label"> Adult</span>
			</li>
				<li><i class="fa fa-plus" aria-hidden="true" id="dec" onclick="decNumber()"/></i></li>
				</ul>



	</div>
	</div>
	</div>
	
   
</div>
        </div>

        <div class="col-sm-2 col-md-2 vv">

          <div class="month-area butt">

            <input type="submit" class="btn btn-default sear" name="submit" value="submit">
          </div>

        </div>

      </div>
             <!-- <div class="col-sm-2 col-md-2 vv">
              <div class="month-area butt">
             <a href="search.php">
            
               <input type="submit" class="btn btn-default sear" placeholder="Search" name="submit" value="submit"></a>

            </div>
            </div> -->
          </div>
          </form>
        </div>
     </div>
   </div>
   </div>
 </div>

 <!-- /header -->



<!-- bed-area -->
<!-- <div class="together">
<div class="bed-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="bed-content" align="center">
          <ul>
            <li><img src="image/bedroom.jpg"><h3>Bedroom</h3><p>up to 75% off the price
            of an overnight stay</p></li>
            <li><img src="image/balcony.jpg"><h3>Sea View Balcony</h3><p>up to 75% off the price
            of an overnight stay</p></li>
            <li><img src="image/coverage.jpg"><h3>Wifi Coverage</h3><p>up to 75% off the price
            of an overnight stay</p></li>
            <li><img src="image/pool.jpg"><h3>Pool & Spa</h3><p>up to 75% off the price
            of an overnight stay</p></li>
            <li><img src="image/taxi.jpg"><h3>Airport Taxi</h3><p>up to 75% off the price
            of an overnight stay</p></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div> -->


<!-- /bed-area -->


<!-- hotel-area -->





<div class="hotel-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="hotel-content">
          <h2 align="center">Our Hotels</h2>
          <p align="center">The Best Oriental Hotel</p>
          <div class="col-sm-3 col-md-3 pic">
            <img src="image/hotel-1.jpg">
            <div class="boder">
            <div class="dor">
              <ul>
                <li><h2>Sogor Dormitory</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
                <li>Address 12, Malaysia<span class="like">4/10</span></li>

              </ul>
            </div>
             <div class="dor new">
              <ul>
                <li>Price From<span class="dollor">$89</span></li>
                <li><p>Lorem Ipsum is simply dummy text of the
                     printing and typesetting industry.

                     standard dummy text ever</p> </li>
              </ul>
            </div>
            <div class="books" align="center">
              <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
            </div>
          </div>
          </div>
          <div class="col-sm-3 col-md-3 pic">
            <img src="image/hotel-2.jpg">
            <div class="boder">
            <div class="dor say">
              <ul>
                <li><h2>Marrioff</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
                <li>Address 12, Malaysia<span class="like">4/10</span></li>

              </ul>
            </div>
             <div class="dor new">
              <ul>
                <li>Price From<span class="dollor">$89</span></li>
                <li><p>Lorem Ipsum is simply dummy text of the
                     printing and typesetting industry.

                     standard dummy text ever</p> </li>
              </ul>
            </div>
            <div class="books" align="center">
              <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
            </div>
          </div>
          </div>

<div class="col-sm-3 col-md-3 pic">
            <img src="image/hotel-1.jpg">
            <div class="boder">
            <div class="dor mal">
              <ul>
                <li><h2>Malaysia hotels</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
                <li>Address 12, Malaysia<span class="like">4/10</span></li>

              </ul>
            </div>
             <div class="dor new">
              <ul>
                <li>Price From<span class="dollor">$89</span></li>
                <li><p>Lorem Ipsum is simply dummy text of the
                     printing and typesetting industry.

                     standard dummy text ever</p> </li>
              </ul>
            </div>
            <div class="books" align="center">
              <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
            </div>
          </div>
          </div>

<div class="col-sm-3 col-md-3 pic">
            <img src="image/hotel-1.jpg">
            <div class="boder">
            <div class="dor sev">
              <ul>
                <li><h2>Seven Terraces</h2><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></li>
                <li>Address 12, Malaysia<span class="like">4/10</span></li>

              </ul>
            </div>
             <div class="dor new">
              <ul>
                <li>Price From<span class="dollor">$89</span></li>
                <li><p>Lorem Ipsum is simply dummy text of the
                     printing and typesetting industry.

                     standard dummy text ever</p> </li>
              </ul>
            </div>
            <div class="books" align="center">
              <a href="new-detail.html"><button type="button" class="btn home">Book Now</button></a>
            </div>
          </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /hotel-area -->

<!-- rest-area -->

<div class="rest-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-sm-12">
        <div class="rest-content">
          <div class="col-sm-6 col-md-6">
            <div class="everywhere" align="center">
              <h2>REST & GO.com, <br>
everywhere you go</h2>
            </div>
              <div class="apple">
                <ul>
                  <li><a href="#"><img src="image/apple.png"></a></li>
                  <li><a href="#"><img src="image/android.png"></a></li>
                </ul?>
              </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- /rest-area -->


<!-- chef-area -->

<div class="chef-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="chef-content" align="center">
          <h2>Our Blog</h2>
          <p>The Best Oriental Hotel</p>
          <div class="col-sm-5 col-md-5">
            <div class="blog-area" align="left">
              <h1>01</h1>
              <h3>Our Chef @ Work</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, v Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
              <button type="button" class="btn area">Discover More</button>
            </div>
          </div>
          <div class="col-sm-7 col-md-7">
            <div class="blog-picture">
              <img src="image/blog.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /rest-area -->


<!-- faster -->

<div class="faster-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="faster-content" align="center">
          <h2>Book Faster. Book Easily. Book Rest & Go</h2>
          <p>The Best Oriental Hotel</p>
          <div class="col-sm-7 col-md-7 ww">
            <div class="fast-video">
              <iframe width="100%" height="400" src="https://www.youtube.com/embed/OD5IlLPl5e4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-sm-5 col-md-5 extra">
            <div class="discover" align="right">
              <h4>Luxury Rooms</h4>
              <h2>Discover our Rooms</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
          </div>
          <div class="col-sm-12 col-md-12">
          <div class="ready" align="center">
            <button type="button" class="btn ready">READY TO LAUNCH</button>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /faster -->


<!-- mail-area -->
<div class="main">
<div class="mail-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="mail-content" align="center">
          <div class="col-sm-4 col-md-4"><img src="image/mail.png"><h2>MAIL US</h2><p>info@rest&go.com</p>
             <p>Lorem ipsum dolor sit amet, consectetur
             adipiscing elit, sed do eiusmod tempor incidid
             unt ut labore et dolore magna aliqua.</p>
             <button type="button" class="btn me bb">MAIL ME</button>
            </div>
            <div class="col-sm-4 col-md-4"><img src="image/locat.png"><h2>LOCATE US</h2><p>Malaysia FL 32904</p>
             <p>Lorem ipsum dolor sit amet, consectetur
             adipiscing elit, sed do eiusmod tempor incidid
             unt ut labore et dolore magna aliqua.</p>
             <button type="button" class="btn me yes">VIEW MAP</button>
            </div>
            <div class="col-sm-4 col-md-4"><img src="image/need.png"><h2>NEED HELP</h2><p>+ 223 446 3343</p>
             <p>Lorem ipsum dolor sit amet, consectetur
             adipiscing elit, sed do eiusmod tempor incidid
             unt ut labore et dolore magna aliqua.</p>
             <button type="button" class="btn me">CALL US</button>
            </div>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /mail-area -->

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
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Hotels</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Shortcodes</a></li>
                <li><a href="#">Areas</a></li>
                <li><a href="#">News</a></li>
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


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script> -->

    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>-->


    <script type="text/javascript">
      
    $('#date').datepicker({

      dateFormat: 'dd/mm/yy',

      minDate: +0,

      changeMonth: true,

      changeYear: true,

    });

    </script>

    <script type="text/javascript">

    $(function(){

      $('#date').change(function(){

        //alert('chirag');

        var dat=$("#date").val();

        $('#date1').datepicker({

          dateFormat: 'dd/mm/yy',

          minDate: dat,

          changeMonth: true,

          changeYear: true,

        });

      });



      $("#date1").change(function(){

        var dat=$("#date").val();

        var dat1=$("#date1").val();

        //console.log(dat);

        //console.log(dat1);

        if(dat==dat1){

          $("#time").show();

          $("#time1").show();

        }else{

          $("#time").hide();

          $("#time1").hide();

        }

      })



    });

    </script>

    <script type="text/javascript">

    $(function(){

      $('#time').hide();

      $("#time1").hide();

    })

    $(function(){

      $('.timepicker').timepicker({

        timeFormat: 'h:mm p',

        interval: 30,

        minTime: '10',

        maxTime: '10:00pm',

        defaultTime: '11',

        startTime: '10:00',

        dynamic: false,

        dropdown: true,

        scrollbar: true

      });

    })

    function initAutocomplete() {


      console.log('chirag');

      // Create the search box and link it to the UI element.

      var input = document.getElementById('pac-input');

      var searchBox = new google.maps.places.SearchBox(input);

      searchBox.addListener('places_changed', function() {

        var places = searchBox.getPlaces();

        console.log(places);

        if (places.length == 0) {

          return;

        }





      });

    }

    initAutocomplete();



    </script>
<script>
function deselect(e) {
  $('.pop').slideFadeToggle(function() {
    e.removeClass('selected');
  });    
}

$(function() {
  $('#contact').on('click', function() {
    if($(this).hasClass('selected')) {
      deselect($(this));               
    } else {
      $(this).addClass('selected');
      $('.pop').slideFadeToggle();
    }
    return false;
  });

  $('.close').on('click', function() {
    deselect($('#contact'));
    return false;
  });
});

$.fn.slideFadeToggle = function(easing, callback) {
  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
};
</script>

<script type="text/javascript">

    var i = 1;

    function incNumber() {
        if (i < 9) {
            i++;
        } else if (i = 9) {
            i = 1;
        }
        document.getElementById("adult_count").innerHTML = i;
    }

    function decNumber() {
        if (i > 0) {
            --i;
        } else if (i = 0) {
            i = 9;
        }
        document.getElementById("adult_count").innerHTML = i;
    }
    </script>

</body>
</html>





<!-- Modal -->

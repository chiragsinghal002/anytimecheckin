<?php
include_once 'header.php';
?>
<div class="container">
<div class="row">
</div>
<?php 
$Ad_result=$ad->featured_ad();

$count_ad=count($Ad_result);
if($count_ad>=1){ ?>
<div class='row'>
<div class='col-md-12'>
<div class="carousel slide media-carousel" id="media">
<div class="carousel-inner">
 <?php
//var_dump($Ad_result);
?> 
<div class="item active">
	<div class="row">
		<?php 
		if($count_ad<=2){
			for ($i=0;$i<=$count_ad-1; $i++) { ?>
				<div class="col-md-6">
					<a class="thumbnail" href="<?php echo $Ad_result[$i]['banner']?>"><img alt="" src="<?php echo $Ad_result[$i]['banner']?>"></a>
				</div>
			<?php }
		}else{
			for ($i=0;$i<=1; $i++) { ?>
				<div class="col-md-6">
					<a class="thumbnail" href="<?php echo $Ad_result[$i]['banner']?>"><img alt="" src="<?php echo $Ad_result[$i]['banner']?>"></a>
				</div>
			<?php }
		}
		?>
	</div>
</div>
<div class="item">
	<div class="row">
		<?php if($count_ad>2){
			for ($i=2;$i<=$count_ad-1; $i++) { ?>
				<div class="col-md-6">
					<a class="thumbnail" href="<?php echo $Ad_result[$i]['banner']?>"><img alt="" src="<?php echo $Ad_result[$i]['banner']?>"></a>
				</div>
			<?php
			 }}
			?>
		</div>
	</div>
</div>
<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
<a data-slide="next" href="#media" class="right carousel-control">›</a>
</div>
</div>
</div>
</div>
<?php  }else{}
?>
<!-- hotel-area -->
<div class="hotel-area">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="hotel-content">
<h2 align="center">Top Hotels</h2>
<!--<p align="center">The Best Oriental Hotel</p>-->
<?php 
$result=$hotels->GetAllHotels();

//echo $starcount = count($result);

// echo "<pre>";

// print_r($result);

foreach ($result as  $value) {
  // echo "<pre>";
  // print_r($value);

	$star = $value['hotel_star_category'];
	?>

	<div class="col-sm-3 col-md-3  pic">
		<?php 
		if (!empty($value['main_image'])) {

			$thumbimage=explode(".",$value['main_image']); 
			$thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
			?>
			<a href="hotel-detail.php?hotel_id=<?php echo $value['hotel_id'];?>"><img src="image/front/<?php echo $thumbimagefinal;?>"></a>
			<?php
		}
		else{
			?>
			<a href="hotel-detail.php?hotel_id=<?php echo $value['hotel_id'];?>"> <img src="image/no-image.png"></a>
			<?php
		}

		 $rating=$reviews->AvarageRating($value['hotel_id']);
		  $rate = round($rating['AVG(user_rating)']);
		?>
		<!--  <img src="image/<?php echo $value['main_image'];?>"> -->
		<div class="boder">
			<div class="dor">
				<ul>
					<li>
						<?php 
						$color = '';

						for($count=1; $count<=5; $count++)
						 {
						  if($count <= $rate)
						  {
						   $color = 'color:#ffcc00;';
						  }
						  else
						  {
						   $color = 'color:#ccc;';
						  }
						 echo $output = '<span  data-rating="'.$rate.'" class="fa fa-star" style="'.$color.'">
						 
						 </span>';
						 }
						  //echo $output;					
						?>
						<!-- <p>
							<?php 
							if ($rate>0) {
								echo $rate;
							}
							else{
								echo '0';
							}
							?>
						</p> -->
						<h2><?php echo $value['hotel_name'];?></h2>
					
						<!--  <span class="fa fa-star checked"></span> -->
					</li>
					<h5 class="price-hotel">
						<?php echo $value['hotel_address'];?>, <?php echo $value['hotel_country'];?>
						<!-- <span class="like">4/10</span> -->
					</h5>
				</ul>
			</div>
			<div class="dor new">
				<ul>
					<li>Price From<span class="dollor">
						<span class="fa fa-dollor">
							<?php if($value['price_per_hour']!=='0'){
								if($value['price_per_hour']<$value['price_per_day']){

									echo 'RM '.number_format($value['price_per_hour']);

								}else{

									echo 'RM '.number_format($value['price_per_day']);

								}

							}else{

								echo '$'.number_format($value['price_per_day']);

							}?>
						</span>
					</span>
				</li>
				<li>
					<p>
						<?php
						$string = $value['hotel_description'];

						$string = strip_tags($string);

						if (strlen($string) > 100) {                      

							$stringCut = substr($string, 0, 100);                      

							$string = substr($stringCut, 0, strrpos($stringCut, ' ')). '...........'; 



						}



						echo $string;



						?> 
						<?php //echo $value['hotel_description'];?>
					</p>
				</li>
			</ul>
		</div>
		<div class="books info-button" align="center">
			<!-- <a href="hotel-detail.php?hotel_id=<?php echo $value['hotel_id'];?>">
				<button type="button" class="btn home">Book Now</button> -->
			</a>
		</div>
	</div>
</div>
<?php
}



?>

</div>
</div>
</div>
</div>
</div>
</div>

<a href="all_top_hotels.php" style=" background: #3b3d4c;color: #fff; margin-top: 8px; padding: 8px 17px 8px 17px;  border-radius: 13px; font-family: 'Open Sans', sans-serif;font-weight: 600;display: block;text-align: center;width: 17%;
margin: 0px auto; margin-bottom: 15px; " class="hotels">All Top Hotels</a>
<!-- /hotel-area --> 
<!-- rest-area -->       
<div class="rest-area">
<div class="container">
<div class="row">
<div class="col-sm-12 col-sm-12">
<div class="rest-content">
<div class="col-sm-6 col-md-6">
<div class="everywhere" align="center">
	<h2>Anytime Check In, <br>
		everywhere you go
	</h2>
</div>
<div class="apple">
	<ul>
		<li><a href="#"><img src="image/apple.png"></a></li>
		<li><a href="#"><img src="image/android.png"></a></li>
	</ul>
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
<div class="footer-back">  
<div class="faster-area">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="faster-content" align="center">
<h2>Book Faster. Book Easily. Book Rest & Go</h2>
<!--<p>The Best Oriental Hotel</p>-->
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
		<!--<button type="button" class="btn ready">READY TO LAUNCH <i class="fa fa-play"></i></button>-->
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
	<div class="col-sm-4 col-md-4">
		<img src="image/mail.png">
		<h2>MAIL US</h2>
		<p>info@rest&go.com</p>
   <!-- <p>Lorem ipsum dolor sit amet, consectetur 
      adipiscing elit, sed do eiusmod tempor incidid
      
  unt ut labore et dolore magna aliqua.</p> -->
  <button type="button" class="btn me bb gg">MAIL ME</button>
</div>
<div class="col-sm-4 col-md-4">
	<img src="image/locat.png">
	<h2>LOCATE US</h2>
	<p>Malaysia FL 32904</p>
   <!-- <p>Lorem ipsum dolor sit amet, consectetur 
      adipiscing elit, sed do eiusmod tempor incidid
      
  unt ut labore et dolore magna aliqua.</p> -->
  <button type="button" class="btn me yes">VIEW MAP</button>
</div>
<div class="col-sm-4 col-md-4">
	<img src="image/need.png">
	<h2>NEED HELP</h2>
	<p>+ 223 446 3343</p>
   <!-- <p>Lorem ipsum dolor sit amet, consectetur 
      adipiscing elit, sed do eiusmod tempor incidid
      
  unt ut labore et dolore magna aliqua.</p> -->
  <button type="button" class="btn me">CALL US</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- /mail-area -->
<?php 
include_once('footer.php');
?>
</div>
<script type="text/javascript">
function resendcode() {
   // alert('kanchan');
     //var code=$("#code").val();
     var userEmail=$("#userEmail").val();
     //console.log(userEmail); 
     //alert(code);             
     

     $.ajax({
     	url: "adduser.php",
     	type: "POST",
     	data:'resendcode='+$("#code").val()+'&userEmail='+$("#userEmail").val(),

     	success:function(data){
     		//alert(data);

     		console.log(data);

     		if(data=='1'){

     			$('#fourth').modal('hide');

     			$('#Second').modal('hide');

     			$('#third').modal('show');
     			$("#mail-resendcode").html(data);

     		}
     	}                     

     });


 }

</script>
<script type="text/javascript">
	function forgetpassword(){
		$('#third').modal('hide');
		$('#first').modal('show');

	}
</script>
<script type="text/javascript">
	function createaccount(){
		$('#third').modal('hide');
		$('#Second').modal('show');

	}
</script>
<script type="text/javascript">
	function mobileforget(){
		$('#third').modal('hide');
		$('#mobileforget').modal('show');

	}
</script>
<!-- footer area -->






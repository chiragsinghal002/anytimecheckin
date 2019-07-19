<?php
include_once'Object.php';
  $result=$user->UserSearchResult();
  
?>



<?php
include_once'header.php';
 
?>


<!-- bed-area -->

<!-- /bed-area -->


<!-- hotel-area -->

<div class="hotel-area new">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="hotel-content inner">
          <h2 align="center">Search Hotel</h2>
          <p align="center">The Best Oriental Hotel</p>

          <?php 
          foreach ($result as $resultdetail) {
     //     	echo '<pre>';
  			// print_r($resultdetail);


          ?>


<div class="col-sm-3 col-md-3 pic">
            <img src="image/hotel-1.jpg">
            <div class="boder inner">
            <div class="dor sev">
              <ul>
                <li><h2><?php echo $resultdetail['hotel_name'];?></h2>

                	<?php 
                	$star = $resultdetail['hotel_star_category'];
                	for ($i=0; $i < $star ; $i++) { 
                		?>
                		<span class="fa fa-star checked"></span>
                		<?php
                	}

                	?>

                	
                	<!-- <span class="fa fa-star checked"></span> -->
                </li>
            <li><?php echo $resultdetail['hotel_address'];?>, <?php echo $resultdetail['hotel_city'];?><!-- <span class="like">4/10</span> --></li>
              
              </ul>
            </div>
             <div class="dor new">
              <ul>
                <li>Price From<span class="dollor">$<?php echo $resultdetail['price_per_day'];?></span></li>
                <li><p><?php echo $resultdetail['hotel_description'];?></p> </li>
              </ul>
            </div>
            <div class="books" align="center">
           <a href="new-detail.php?hotel_id=<?php echo $resultdetail['hotel_id'];?>"><button type="button" class="btn home">Book Now</button></a>
            </div>
          </div>
          </div>
<?php } ?>


        </div>
      </div>
    </div>
  </div>
</div>

<!-- /hotel-area --> 




<!-- faster -->



<!-- /faster -->


<!-- mail-area -->

<!-- /mail-area -->
<?php 
include_once 'footer.php';
?>


<?php
include_once'header.php';
?>
<!-- <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" /> -->




<!-- bed-area -->



<!-- /bed-area -->


<!-- SEARCH RESULT FILTER PANEL HTML START -->

<!-- price-detail-area -->

<div class="price-detail-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-md-3">
        <div class="price-night">
          <div class="row">
            <div class="col-sm-9 col-md-9">
              <div class="par-area">
                <h2>Price Per Night</h2>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="par-area to">
                <h2>Clear</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div data-role="page">


              <div data-role="main" class="ui-content">
                <form method="post" action="search.php">
                  <div data-role="rangeslider">
                    <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
                    <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
                  </div>
                  
                  
                </form>
              </div>
            </div> 
          </div>
          
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="row">
          <div class="yet">
            <div class="col-sm-9 col-md-9">
              <div class="star-night">
                <h2>Star Night</h2>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="star-night-content">
                <h2>Clear</h2>
              </div>
            </div>
            <div class="row">
              <div class="star-night-area">
                <ul>
                  <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span></li>
                    <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span></li>
                      <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span></li>
                        <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span></li>
                          <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span></li>
                          <li><input type='checkbox' class="night"> <span class="rate">No Rating</span></li>
                        </ul>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 col-md-3">
                <div class="row">
                  <div class="yet">
                    <div class="col-sm-9 col-md-9">
                      <div class="star-night">
                        <h2>Customer Reviews</h2>
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                      <div class="star-night-content">
                        <h2>Clear</h2>
                      </div>
                    </div>
                    <div class="row">
                      <div class="star-night-area">
                        <ul>
                          <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span></li>
                            <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span></li>
                              <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span></li>
                                <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span></li>
                                  <li><input type='checkbox' class="night"> <span class="fa fa-star checked"></span></li>
                                  <li><input type='checkbox' class="night"> <span class="rate">No Rating</span></li>
                                </ul>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-3 sd">
                        <div class="keybord-area">
                          <form>
                            <div class="form-group">
                              <label class="keyb">Search Result for:</label>
                              <input type="text" class="form-control key" placeholder="Property name or keyboard" id="">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /price-detail-area -->
                <!-- SEARCH RESULT FILTER PANEL HTML END -->





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
                         //   echo'<pre>';
                      			// print_r($resultdetail);
                            ?>
                            <div class="col-sm-3 col-md-3 pic">
                              <form action="hotel-detail.php?hotel_id=<?php echo $resultdetail['hotel_id'];?>" method="post">
                                <?php 
                                if (!empty($resultdetail['main_image'])) {
                                 ?>
                                 <img src="image/<?php echo $resultdetail['main_image'];?>">
                                 <?php
                               }
                               else{
                                ?>
                                <img src="image/no-image.png">
                                <?php
                              }
                              ?>
                              
                              
                              <input type="hidden" name="search" value="<?php echo $search;?>">
                              <input type="hidden" name="optradio" value="<?php echo $optradio;?>">
                              <input type="hidden" name="check_in_date" value="<?php echo $check_in_date;?>">

                              <input type="hidden" name="check_in_time" value="<?php echo $check_in_time;?>">
                              <input type="hidden" name="check_out_date" value="<?php echo $check_out_date;?>">
                              <input type="hidden" name="check_out_time" value="<?php echo $check_out_time;?>">
                              <input type="hidden" name="no_of_adults" value="<?php echo $no_of_adults;?>">
                              <input type="hidden" name="no_of_rooms" value="<?php echo $no_of_rooms;?>">
                              <input type="hidden" name="no_of_childs" value="<?php echo $no_of_childs;?>">
                              <input type="hidden" name="lat" value="<?php echo $resultdetail['hotel_latitude'];?>">
                              <input type="hidden" name="lng" value="<?php echo $resultdetail['hotel_longitude'];?>">
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

                              <div class="dor new search-page">

                                <ul>

                                  <li>Price From<span class="dollor">$<?php echo $resultdetail['price_per_day'];?></span></li>

                                  <li>
                                   <?php
                                   $string = $resultdetail['hotel_description'];
                                   $string = strip_tags($string);
                                   if (strlen($string) > 100) {          

                                    $stringCut = substr($string, 0, 100);                    
                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')). '...........'; 
                                  }       
                                  
                                  ?>   
                                  

                                  <p><?php echo $string;?></p> </li>

                                </ul>

                              </div>

                              <div class="books search-book" align="center">

                               <input type="submit" class="btn home" value="Book Now" name="submit">

                             </div>

                           </div>

                         </div>
                       </form>
                     <?php } ?>





                   </div>

                 </div>

               </div>

             </div>

           </div>
           <?php 

           include_once 'footer.php';

           ?>
           
           
           
           <style>
           .price-detail-area {
            display: none;
          }

          .radio label.red {
            font-size: 13px; padding-left: 0px;}


            .radio input#day_1 {
              margin-right: 30px;
            }

            .radio input[type="radio"]{
             margin-right: 30px;}

             .rod input#check_in_date {
              padding-top: 0px;
            }


            .rod input#check_out_date{
              padding-top: 0px;
            }

            .col-sm-3.col-md-3.pic img {
              height: 201px;
            }

            .radio label.red {
             
              display: block !important;
            }
            .rod input#check_in_date {
              padding-top: 7px;
            }          </style>
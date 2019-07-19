<?php
include_once'header.php';
?>
<div class="price-detail-area">
  <div class="container">
    <div class="row search-rating">
      <div class="col-sm-3 col-md-3">
        <div class="price-night">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="par-area search-heading">
                <h2>Budget</h2>
              </div>
            </div>
           <!-- <div class="col-sm-3 col-md-3">
              <div class="par-area to">
               <h2>Clear</h2>
              </div>
            </div>-->
          </div>
          <div class="row">

            <div class="star-night-area">
              <ul>
                <li><input type='checkbox' class="night" id="budget_1" value="1_15">Below 15</li>
                <li><input type='checkbox' class="night" id="budget_2" value="75_100">75-100</li>
                <li><input type='checkbox' class="night" id="budget_3" value="100_125">100-125</li>
                <li><input type='checkbox' class="night" id="budget_4" value="125_above">Above 125
                </li>
              </ul>

            </div>

          </div>

        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="row">
          <div class="yet search-height">
            <div class="col-sm-12 col-md-12 sapce-sea	">
              <div class="star-night search-heading">
                <h2>Star Night</h2>
              </div>
            </div>
            <!--<div class="col-sm-3 col-md-3">
              <div class="star-night-content">
               <h2>Clear</h2>
              </div>
            </div>-->
            <div class="row">
              <div class="star-night-area">
                <ul>
                  <li><input type='checkbox' class="night" id="star3" value="3"> 3 Star</li>
                  <li><input type='checkbox' class="night" id="star2" value="2"> 2 Star</li>
                  <li><input type='checkbox' class="night" id="star1" value="1"> 1 Star</li>
                  <li><input type='checkbox' class="night" id="star0" value="4"> Boutique</li>
                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="row">
          <div class="yet search-height">
            <div class="col-sm-12 col-md-12 sapce-sea">
              <div class="star-night search-heading">
                <h2>Customer Reviews</h2>
              </div>
            </div>
            <!--<div class="col-sm-3 col-md-3">
              <div class="star-night-content">
                <h2>Clear</h2>
              </div>
            </div>-->
            <div class="row">
              <div class="star-night-area">
                <ul>
                  <li><input type='checkbox' class="night" id="user_rating5" value="5"> <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span></li>
                    <li><input type='checkbox' class="night" id="user_rating4" value="4"> <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span></li>
                      <li><input type='checkbox' class="night" id="user_rating3" value="3"> <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span></li>
                        <li><input type='checkbox' class="night" id="user_rating2" value="2"> <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                        </li>
                        <li><input type='checkbox' class="night" id="user_rating1" value="1"> <span class="fa fa-star checked"></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <span id="loading" class="loader-search" style="display: none;">
        <img src="img/Loading_icon.gif">
      </span>
      <!-- /price-detail-area -->
      <!-- SEARCH RESULT FILTER PANEL HTML END -->
      <!-- hotel-area -->
      <div class="hotel-area new">

        <div class="container">

          <div class="row" id='search_result_found'>

            <div class="col-sm-12 col-md-12">

              <div class="hotel-content inner">

                <h2 align="center">Search Hotels</h2>
                <p align="center" style="    text-transform: lowercase;">About
                  <?php 
                  if($result >0){

                    echo $shotel = count($result);
                  }else{
                    echo $shotel = '0';
                  }
                  ?> results found</p>
                  <?php 
                  if($result >0){
                    foreach ($result as $resultdetail) {
                      ?>
                       <form action="hotel-detail.php" method="post">
                        <input type="hidden" name="hotel_id" value="<?php echo $resultdetail['hotel_id'];?>">
                         <input type="hidden" name="check_in_date" value="<?php echo $check_in_date;?>">
                          <input type="hidden" name="check_out_date" value="<?php echo $check_out_date;?>">
                           <input type="hidden" name="check_in_time" value="<?php echo $check_in_time;?>">
                          <input type="hidden" name="check_out_time" value="<?php echo $check_out_time;?>">
                          <input type="hidden" name="no_of_adults" value="<?php echo $no_of_adults;?>">
                          <input type="hidden" name="no_of_rooms" value="<?php echo $no_of_rooms;?>">
                          <input type="hidden" name="no_of_childs" value="<?php echo $no_of_childs;?>">
                          <input type="hidden" name="lat" value="<?php echo $lat;?>">
                          <input type="hidden" name="lng" value="<?php echo $lng;?>">
                           <input type="hidden" name="hr" value="<?php echo $hr;?>">
                           <input type="hidden" name="search" value="<?php echo $search;?>">
                           <input type="hidden" name="optradio" value="<?php echo $optradio;?>">
                      <div class="col-sm-3 col-md-3 pic">
                       
                          <?php 
                          if (!empty($resultdetail['main_image'])) {
                            $thumbimage=explode(".",$resultdetail['main_image']); 
                            $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
                            ?>
                            <a href="#"><img src="image/front/<?php echo $thumbimagefinal;?>"></a>
                            <?php
                          }
                          else{
                            ?>
                            <a href="#"><img src="image/no-image.png"></a>
                            <?php
                          }
                          ?>
                          <div class="boder inner">
                            <div class="dor sev">
                              <ul>
                                <li><h2><?php echo $resultdetail['hotel_name'];?></h2>
                                  <?php
                                  $rating=$reviews->AvarageRating($resultdetail['hotel_id']);
                                  $rate = round($rating['AVG(user_rating)']);

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
                                 ?>





                                 <!-- <span class="fa fa-star checked"></span> -->

                               </li>

                               <li><?php echo $resultdetail['hotel_address'];?>, <?php echo $resultdetail['hotel_city'];?><!-- <span class="like">4/10</span> --></li>



                             </ul>

                           </div>

                           <div class="dor new search-page">

                            <ul>

                              <li>Price From<span class="dollor">RM<?php echo $resultdetail['price_per_day'];?></span></li>

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

                           <input type="submit" class="btn home" value="Book Now" name="submit2">

                         </div>

                       </div>
                    
                     </div>
                    </form>
                 <?php } 
               }
               else{

                 ?>
                 <p> Hotel not Found. </p>

                 <?php
               }

               ?>





             </div>

           </div>

         </div>

       </div>

     </div>
     <?php 

     include_once 'footer.php';

     ?>



     <style>
          /* .price-detail-area {
            display: none;
            }*/
            .hotel-content h2 {

              margin-bottom: 0px;
            }

          </style>
          <script type="text/javascript">
            function search_result(){
              $(function(){

                var search=$("#google_search").val();
                var lat= $("#lat").val();
                var lng=$("#lng").val();
                var optradio=$("#da_1").val();
                var check_in_date=$("#check_in_date").val();
                var check_out_date=$("#check_out_dates").val();
                var check_in_time=$("#check_in_time").val();
                var check_out_time=$("#check_out_time").val();
                var no_of_adults=$("#no_of_adults_form").val();
                var no_of_rooms=$("#no_of_rooms_form").val();
                var no_of_childs=$("#no_of_childs_form").val();
                var hr=$("#sel_hour").val();
                // var star3,star2,star1,star0,rating5,rating4,rating3,rating2,rating1;
              // alert(search);
              if(document.getElementById('star3').checked){
               var star3= $("#star3").val();
             }else{
              var star3='';
             }
             if(document.getElementById('star2').checked){
               var star2= $("#star2").val();
             }else{
              var star2='';
             }
             if(document.getElementById('star1').checked){
               var star1= $("#star1").val();
             }else{
              var star1='';
             }
              if(document.getElementById('star0').checked){
               var star0= $("#star0").val();
               // alert(star0);
             }else{
              var star0='';
             }
              if(document.getElementById('user_rating5').checked){
               var rating5= $("#user_rating5").val();
             }else{
              var rating5='';
             }
             if(document.getElementById('user_rating4').checked){
               var rating4= $("#user_rating4").val();
             }else{
              var rating4='';
             }
             if(document.getElementById('user_rating3').checked){
               var rating3= $("#user_rating3").val();
             }else{
              var rating3='';
             }
             if(document.getElementById('user_rating2').checked){
               var rating2= $("#user_rating2").val();
             }else{
              var rating2='';
             }
             if(document.getElementById('user_rating1').checked){
               var rating1= $("#user_rating1").val();
             }else{
              var rating1='';
             }
              if(document.getElementById('budget_1').checked){
               var budget_1= $("#budget_1").val();
             }else{
              var budget_1='';
             }
             if(document.getElementById('budget_2').checked){
               var budget_2= $("#budget_2").val();
             }else{
              var budget_2='';
             }
             if(document.getElementById('budget_3').checked){
               var budget_3= $("#budget_3").val();
             }else{
              var budget_3='';
             }
             if(document.getElementById('budget_4').checked){
               var budget_4= $("#budget_4").val();
             }else{
              var budget_4='';
             }
           
             $.ajax({
              url:'ajax-search.php',
              type:'post',
              data:{'search':search,lat:lat,lng:lng,optradio:optradio,check_in_date:check_in_date,check_out_date:check_out_date,check_in_time:check_in_time,check_out_time:check_out_time,no_of_adults:no_of_adults,no_of_childs:no_of_childs,no_of_rooms:no_of_rooms,star0:star0,star1:star1,star2:star2,star3:star3,rating1:rating1,rating2:rating2,rating3:rating3,rating4:rating4,rating5:rating5,budget_1:budget_1,budget_2:budget_2,budget_3:budget_3,budget_4:budget_4,hr:hr},
              beforeSend: function(data) {
                    // setting a timeout
                     $("#search_result_found").html('');
                    $("#loading").css('display','block');
                  },
                  success:function(data){
                     console.log(data);
                   $("#search_result_found").html(data);
                 },
                 complete: function(data){
                  $("#loading").css('display','none');
                }
              })

           })
            }
          </script>
          <script type="text/javascript">
            $("#star3").change(function(){
              search_result();
            })
            $("#star2").change(function(){
              search_result();
            })
            $("#star1").change(function(){
              search_result();
            })
            $("#star0").change(function(){
              search_result();
            })
            $("#user_rating1").change(function(){
              search_result();
            })
            $("#user_rating2").change(function(){
              search_result();
            })
            $("#user_rating3").change(function(){
              search_result();
            })
            $("#user_rating4").change(function(){
              search_result();
            })
            $("#user_rating5").change(function(){
              search_result();
            })
            $("#budget_1").change(function(){
              search_result();
            })
            $("#budget_2").change(function(){
              search_result();
            })
            $("#budget_3").change(function(){
              search_result();
            })
            $("#budget_4").change(function(){
              search_result();
            })
          </script>
          <style type="text/css">
          .loader-search {
            display: block;
            TEXT-ALIGN: center;
          }
        </style>
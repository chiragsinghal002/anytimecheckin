<?php
include_once'Object.php';
// $result=$user->GetPagesbyid(4);
// // echo "<pre>";
// // print_r($result);



?>
<?php
include_once'header_inner_page.php';
?>




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
                <form method="post" action="/action_page_post.php">
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






<div class="loren-ipsum">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <h2>Comming Soon</h2> 
               <!--  <p>Comming Soon</p> -->
            </div>
        </div>
    </div>
</div>




                <!-- hotel-area -->



             <style type="text/css">
             
           </style>





           <!-- faster -->







           <!-- /faster -->





           <!-- mail-area -->



           <!-- /mail-area -->

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









           </style>
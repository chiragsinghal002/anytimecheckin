<?php
//include_once'Object.php';
$result=$user->GetPagesbyid(4);
// echo "<pre>";
// print_r($result);



?>
<?php
include_once'header_inner_page.php';
?>
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link href="css/style2.css" rel="stylesheet" type="text/css" />

<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />




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


                  <div class="terms-area">
                    <h2>COMING SOON</h2>
                  </div>


           <!-- /mail-area -->

          <?php 

           include_once 'footer.php';

           ?>



           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           
           
           
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




.header-area {
    background: url(image/banner3.jpg) no-repeat;
    width: 100%;
    background-size: cover;
    height: 264px !important;
}
.terms-area h2 {
    text-align: center;
    padding: 150px 0px;
    color: #222;
    font-size: 3em;
}



           </style>
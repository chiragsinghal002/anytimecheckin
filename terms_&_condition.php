<?php
include_once'Object.php';
$result=$user->GetPagesbyid(9);
// echo "<pre>";
// print_r($result);




?>
<?php
include_once'header_inner_page.php';
?>


<!-- bed-area -->



<!-- /bed-area -->


<!-- SEARCH RESULT FILTER PANEL HTML START -->

<!-- price-detail-area -->

<!-- <div class="price-detail-area">
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
                </div> -->

                <!-- /price-detail-area -->
                <!-- SEARCH RESULT FILTER PANEL HTML END -->






<!-- <div class="loren-ipsum">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <h3><?php echo $result['page_title'];?></h3>
                <!--<p><?php echo $result['page_description'];?></p>-->
            </div>
        </div>
    </div>
</div> -->


<div class="about-area">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="about-des">

          <p><?php echo $result['page_description'];?></p>
         <!--  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>

<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p> -->
        </div>
      </div>
    </div>
  </div>
</div>





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

.about-area {
    background-image: url(https://anytimecheckin.com/new/image/footer-back.jpg);
    width: 100%;
}

.about-des p {
    font-size: 16px;
    color: #646464;
    line-height: 24px;
    text-align: justify;
    font-weight: 500;
    font-family: 'Open Sans', sans-serif;
    margin-top: 40px;
}









           </style>
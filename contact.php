<?php
include_once'Object.php';
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


<!-- 



<div class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 iframe-contact">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16300690.430084962!2d100.57057402696853!3d4.089292544186079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3034d3975f6730af%3A0x745969328211cd8!2sMalaysia!5e0!3m2!1sen!2sin!4v1538803858495" width="600" height="450" frameborder="0" style="border:0;width:100%;    max-height: 229px;" allowfullscreen></iframe>
              
            </div>
        </div>
    </div>
</div>
<div class="contact-form">
    <div class="container-fluid">
        
<div class="row contact-color">
      <div class=" col-sm-offset-1 col-sm-10 col-sm-offset-1 con-border">
                <div class="col-sm-8 contact-text">
              <h2>get in touch</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
           <form class="form-horizontal" action="/action_page.php">
                <div class="form-group left-form">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Name">
                  </div>
                 <div class="col-sm-6 ">          
                    <input type="password" class="form-control" placeholder="Email">
                  </div>
                </div> 
        <div class="form-group left-form">
                  <div class="col-sm-12">
                       <textarea class="form-control">Messages</textarea>
                  </div>
              </div>


                     <div class="form-group left-form">        
                       <div class="col-sm-10">
                         <button type="submit" class="btn btn-default">Submit</button>
                       </div>
                     </div>
                 </form>
          
              
            </div>
                      <div class="col-sm-4 contact-head">
                   <h3>Contact Information</h3>
                  <div class="social-icon">
                     <ul>
                      <li>
                       <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                       <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                       <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                   </ul>
                  </div>
                 
              </div>
    </div>
    </div>
</div>
</div>
 -->

  <!-- hotel-area -->


  <?php 
if(isset($_POST['contact'])){
  
  $data['name']=$_POST['name'];

  $data['email']=$_POST['email'];

  $data['phone']=$_POST['phone'];

  $data['subject']=$_POST['subject'];

  
  // mail

  $to = 'kanchan.netmaximus@gmail.com';
     $subject = "Anytime Check In Inquiry";
     $message = "
     <table style='width: 100%;'>
<tbody><tr style='
    border-bottom: 2px solid #222;
'>
  <td style='text-align: center; width: 100%;'><img src='https://anytimecheckin.com/new/image/top-logo.png'></td>
</tr>
</tbody></table>

<table style='width:100%;margin-top: 25px;'>

</table>

<table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
<tr>
  <td color: #222;>Name:- ".$data['name'].",</td>
</tr>

<tr>
  <td color: #222;>Email:- ".$data['email'].",</td>
</tr>

<tr>
  <td color: #222;>Phone:- ".$data['phone'].",</td>
</tr>

<tr>
  <td color: #222;>Subject:- ".$data['subject'].",</td>
</tr>



<br />

<tr>
<td>Thanks,</td>
</tr>

<tr>
<td>Anytime Check In</td>
</tr>

<tr>
<td>info@anytimecheckin.com</td>
</tr>

</table>

<table style=' width: 100%; 
    padding-top: 20px;'>
  <tr><td></td></tr>
</table>




<style>


td {
    font-size: 18px; color:#222;
}

</style>
          
          ";

    //echo $message;

                        // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
          $headers .= 'From: info@anytimecheckin.com' . "\r\n";
          $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
          

               // echo'<pre>';
               // print_r($message);die;

          $mail = mail($to,$subject,$message,$headers);

          if ($mail) {
    
    $msg="Thank you for contacting us. We have received your request and shall get back to you at the earliest.";
  }else{
    $msg="Problem in Sending Mail.";
  }
}
  ?>


  <div class="contact-area">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="contact-des">
            <?php 
    $adminsetting = $user->GetSettingDetail();
    
    ?>

            <h2>CONTACT US</h2>
            <!--<P>For long weekends away, camping outings and business trips, the Overnight Duffle can't be beat. The dual handles make it a cinch to carry, while the durable waterproof exterior helps you worry less about the weather. </P>-->
            <ul>
              <li><i class="fa fa-map-marker"></i><?php echo $adminsetting['admin_locate'];?></li>
              <li><i class="fa fa-phone"></i> <?php echo $adminsetting['admin_phone'];?></li>
              <li><a href="mailto:<?php echo $adminsetting['admin_email'];?>"><i class="fa fa-envelope-o"></i> <?php echo $adminsetting['admin_email'];?></a></li>
            </ul>
          </div>
        </div>


        <div class="col-xs-12 col-sm-6 col-md-6">
          <?php 
echo '<p style="color:red;">'.$msg.'</p>';

?> 
          <div id="mail-status" class="replay"></div>
          <div class="contact-des">
            <h2>SEND YOUR COMMENTS</h2>
            <div class="contact-form">
                <form action="" method="post">
                <input type="text" id="name" name="name"  placeholder="Name">
                <div class="input-msg" style="color: red;"><span id="name-info" class="info"></span></div>
                            <br />
                <input type="text" id="email" name="email"  placeholder="Email">
                <div class="input-msg" style="color: red;"><span id="email-info" class="info"></span></div>
                            <br />
                <input type="text" id="phone" name="phone"  placeholder="Phone Number">
                <div class="input-msg" style="color: red;"><span id="phone-info" class="info"></span></div>
                            <br />
                <textarea id="subject" name="subject"  placeholder="What's on your mind?" style="height:200px"></textarea>
                <div class="input-msg" style="color: red;"><span id="subject-info" class="info"></span></div>
                            <br />

               <!--  <button type="button" class="btn btn-primary create-pop" name="contact"  onclick="return validateContact();">Send Message</button> -->

                <input type="submit" name="contact" onclick="return validateContact();" value="Send Message">
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




<div class="map-area">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.705068125238!2d101.68221297413943!3d3.1336395908728525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49c052793f51%3A0x118066eb8a4410f5!2sKuala+Lumpur+Sentral%2C+50470+Kuala+Lumpur%2C+Federal+Territory+of+Kuala+Lumpur%2C+Malaysia!5e0!3m2!1sen!2sin!4v1542970048024" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

             <style type="text/css">
             
           </style>





           <!-- faster -->







           <!-- /faster -->





           <!-- mail-area -->



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
.contact-des p {
    text-align: justify;
    font-size: 16px;
    color: #646464;
    font-weight: 500;
    font-family: 'Open Sans', sans-serif;
}


.contact-des ul li {
        text-align: justify;
    font-size: 16px;
    color: #646464;
    font-weight: 500;
    font-family: 'Open Sans', sans-serif;
    padding: 5px 0px;

}

.contact-des ul li i {
    font-size: 18px;
    padding-right: 10px;
    width: 21px;
}

.contact-des h2 {
    color: #000;
    font-weight: 600;
    font-size: 24px;
    text-transform: unset;
    font-family: 'Open Sans', sans-serif;
    margin-top: 10px;
}


.contact-form input[type=text], select, textarea {
        width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    font-size: 16px;
    color: #646464;
    font-weight: 500;
    font-family: 'Open Sans', sans-serif;
}

.map-area {
    margin-top: 40px;
}

.contact-area {
    margin-top: 20px;
}

.contact-area {
    margin-top: 20px;
    content: "";
    background-image: url(https://anytimecheckin.com/new/image/footer-back.jpg);
}

.contact-des ul li a{
  color: #646464;
}

.contact-form input[type=submit] {
    background-color: #3b3d4c;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 7px;
    cursor: pointer;
}

.contact-form input[type=submit]:hover {
    background-color: #3b3d4c;
}

.create-pop {
    background: #3f3f40 !IMPORTANT;
    padding: 8px 26px !IMPORTANT;
}


           </style>

            <script>

                  function contact() {
                   // alert('kanchan');

                //console.log('chirag');

                $.ajax({

                  url: "ajaxcontact.php",

                  type: "POST",

                  data:'contact='+$("#name").val()+'&email='+$("#email").val()+'&phone='+$("#phone").val()+'&subject='+$("#subject").val(),

                  success:function(data){
                    //alert(data);

                   // console.log(data);

                        $("#mail-status").html(data);

                     }
                   });

              }

              function validateContact() {
                  
                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');

                  if($("#name").val()=="") {

                    $("#name-info").html("(This field is required)");

                    $("#name").css('background-color','#FFFFDF');

                    valid = false;

                  }

                 

                  if($("#email").val()=="") {

                    $("#email-info").html("(This field is required)");

                    $("#email").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                    $("#email-info").html("(This is not a valid email format)");

                    $("#email").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#phone").val()=="") {

                    $("#phone-info").html("(This field is required)");

                    $("#phone").css('background-color','#FFFFDF');

                    valid = false;

                  }   

                   if($("#subject").val()=="") {

                    $("#subject-info").html("(This field is required)");

                    $("#subject").css('background-color','#FFFFDF');

                    valid = false;

                  }                         

                      if(valid==true){
                      
                        //contact();

                      }

                      return valid;

                    }

                  </script>
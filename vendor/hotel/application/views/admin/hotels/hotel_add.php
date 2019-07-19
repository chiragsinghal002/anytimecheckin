<?php 
$base_url = 'https://anytimecheckin.com/image/';
?>
<meta name="google-site-verification" content="zAN_JiX-Tcw8prAL8QxFfwPdTcsW-jHaE6zbJW1CZ8M" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Hotel</h3>
          <div class="tt"><a href="<?= base_url('admin/hotels'); ?>" class="btn btn-info btn-flat"><< Back</a></div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            <?= validation_errors();?>
            <?= isset($msg)? $msg: ''; ?>
          </div>
        <?php endif; ?>

        <?php echo form_open_multipart(base_url('admin/hotels/add'), 'class="form-horizontal needs-validation" novalidate' )?> 

        <div class="form-group">
          <label for="hotel_name validationCustom20" class="col-sm-2 control-label">Name of the Hotel *</label>

          <div class="col-sm-9">
            <!-- <input type="text" name="hotel_name" class="form-control" id="hotel_name" placeholder=""> -->
            <?= form_input(['name'=>'hotel_name','class'=>'form-control','id'=>'hotel_name validationCustom20','placeholder'=>'','required'=>'required']);?>
            <div class="invalid-feedback">
              Enter Hotel Name
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="hotel_email validationCustom01" class="col-sm-2 control-label">Hotel Email *</label>

          <div class="col-sm-9">
            <input type="email" name="hotel_email" class="form-control" id="hotel_email validationCustom01" required placeholder="">
            <div class="invalid-feedback">
              Enter Hotel Email
            </div>
          </div>
        </div>

         <div class="form-group">
          <label for="hotel_address validationCustom02" class="col-sm-2 control-label">Address *</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_address" class="form-control" id="hotel_address validationCustom02" required placeholder="">
            <div class="invalid-feedback">
              Enter Address
            </div>
          </div>
        </div>


<!-- <div class="form-group">
          <label for="email" class="col-sm-2 control-label">State</label>

          <div class="col-sm-9">
            <input type="text" name="state_name" class="form-control" id="state_name" placeholder="">
          </div>
        </div> -->


       <!--  <div class="form-group">
          <label for="email" class="col-sm-2 control-label">City</label>

          <div class="col-sm-9">
            <input type="text" name="city" class="form-control" id="city" placeholder="">
          </div>
        </div> -->


<!-- start test dropdown -->

        <div class="form-group">
          <label for="role validationCustom03" class="col-sm-2 control-label">State *</label>

          <div class="col-sm-9">
            <select name="state_name" id="state_name" class="form-control validationCustom03" required onchange="state_type(this.value)">
              <!-- <select name="hotel_id" id="hotel_id" class="form-control" onchange="hotel();"> -->
                <option value="">Select State</option>

                <?php foreach($states as $row): ?>
                  <option value="<?= $row['state_name']; ?><?php echo set_select('state_name', $row['state_name'], False); ?>"><?= $row['state_name']; ?></option>
                <?php endforeach; ?>

              </select>
              <div class="invalid-feedback">
                Select State
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="role validationCustom21" class="col-sm-2 control-label">City *</label>

            <div class="col-sm-9">
              <select name="city" class="form-control validationCustom21" id="sel_city" required="">
                <option value="">Select City</option>
                <?php //foreach($room_types as $row): ?>
                <!--  <option value="<?= $row['room_type_id']; ?>"><?= $row['hotel_room_type']; ?></option> -->
                <?php// endforeach; ?>

              </select>
              <div class="invalid-feedback">
                Select City
              </div>
            </div>
          </div>

          <!-- end test dropdown -->


        <div class="form-group">
                <label for="pincode validationCustom04" class="col-sm-2 control-label">Pin Code *</label>

                <div class="col-sm-9">
                  <input type="text" name="pincode" class="form-control" id="pincode validationCustom04" required placeholder="">
                  <div class="invalid-feedback">
                    Enter Pin Code
                  </div>
                </div>
              </div>


        <div class="form-group">
                <label for="website validationCustom05" class="col-sm-2 control-label">Website</label>

                <div class="col-sm-9">
                  <input type="text" name="website" class="form-control" id="website"  placeholder="">
                  <!-- <div class="invalid-feedback">
                    Enter Website
                  </div> -->
                </div>
              </div>

        <div class="form-group">
                <label for="mobile_no validationCustom06" class="col-sm-2 control-label">Mobile No. *</label>

                <div class="col-sm-9">
                  <input type="number" name="mobile_no" class="form-control" id="mobile_no validationCustom06" required placeholder="">
                  <div class="invalid-feedback">
                    Enter Mobile No.
                  </div>

                </div>
              </div>

         <div class="form-group">
                <label for="telephone validationCustom07" class="col-sm-2 control-label">Telephone No </label>

                <div class="col-sm-9">
                  <input type="number" name="telephone" class="form-control" id="telephone" placeholder="">
                 <!--  <div class="invalid-feedback">
                    Enter Telephone No.
                  </div> -->
                </div>
              </div>

        <div class="form-group">
          <label for="fax" class="col-sm-2 control-label">Fax No</label>

          <div class="col-sm-9">
            <input type="text" name="fax" class="form-control" id="fax" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="airport" class="col-sm-2 control-label">Nearest Airport</label>

          <div class="col-sm-9">
            <input type="text" name="airport" class="form-control" id="airport" placeholder="">
          </div>
        </div>

        <div class="form-group">
                <label for="star_category validationCustom10" class="col-sm-2 control-label">Rating *</label>

                <div class="col-sm-9">
                  <select name="star_category" id="star_category validationCustom10" required class="form-control" required="">
                   <option value="">--Select--</option> 
                   <option value="1">1 Star</option>                   
                   <option value="2">2 Star</option>
                   <option value="3">3 Star</option>
                   <option value="4">Boutique</option>


                 </select>
                 <div class="invalid-feedback">
                  Enter Rating
                </div>
              </div>                
              </div>

        
        <div class="form-group">
                <label for="to_date validationCustom11" class="col-sm-2 control-label">Image *</label>

                <div class="col-sm-9">
                  <input type="file" name="hotel[]" id="validationCustom11" class="form-control" required accept="image/*" multiple="">

                  <div class="invalid-feedback">
                    Enter Image
                  </div>
                 
                </div>
              </div>



      <div class="form-group">
                <label for="hotel_facilities" class="col-sm-2 control-label">Admin Facilities</label>
                

                <div class="col-sm-9">
                  <?php foreach($admin_facility as $admin_fac){
                    ?>
                    <input type="checkbox" name="admin_facility[]" value="<?php echo $admin_fac['facility_id'];?>"><?php echo $admin_fac['facility_name'];?><br>


                    <?php
                  }

                  ?>
                 


                </div>
              </div>

              <div class="form-group">
                <label for="hotel_facilities" class="col-sm-2 control-label">Facilities</label>


                <div class="col-sm-9">
                  <?php foreach($facilities as $facility){
                    ?>
                    <input type="checkbox" name="hotel_facilities[]" value="<?php echo $facility['facility_id'];?>"><?php echo $facility['facility_name'];?><br>

                    <?php
                  }
                  ?>
                 

                  <!-- <input type="checkbox" name="hotel_facilities" value="2" > Swimming Pool<br>
                    <input type="checkbox" name="hotel_facilities" value="3" > Wifi<br> -->
                  </div>
                </div>

                 <div class="form-group">
                  <label for="description validationCustom23" class="col-sm-2 control-label">Hotel Description *</label>

                  <div class="col-sm-9">
                    <!-- <textarea name="description" rows="10" cols="10" class="form-control" id="description"></textarea> -->
                    <!-- <input type="text" name="description" class="form-control" id="description" placeholder=""> -->

                    <?php
                    $data = array(
                      'name'        => 'description',
                      'id'          => 'description validationCustom23',
                      'rows'        => '10',
                      'cols'        => '10',
                      'class'      => 'form-control',
                      'required'   =>'required'
                    );

                    echo form_textarea($data);

                    ?>
                    <div class="invalid-feedback">
                    Enter Hotel Description
                  </div>
                  </div>
                </div>



                <div class="form-group any">
                  <label for="star_category" class="col-sm-2 control-label">Any Time</label>

                  <div class="col-sm-9">
                    <div id="myRadioGroup">
                      Yes<input type="radio" name="cars" checked="checked" value="1"/>
                      No<input type="radio" name="cars" value="3" />

                      <div id="Cars2" class="desc">

                      </div>
                      <div id="Cars3" class="desc" style="display: none;">
                        <input type="text" name="check_in" class="check_in" id="star_category" placeholder="check in">
                        <input type="text" name="check_out" class="check_out"  id="star_category" placeholder="check out">
        <!-- <input type="text" name="check_in" class="check_in" id="star_category" placeholder="check in">
          <input type="text" name="check_out" class="check_out"  id="star_category" placeholder="check out"> -->
        </div>
      </div>
    </div>
  </div>


             


 <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Property Location</label>

                <div class="col-sm-9">
                  <input type="text"  class="controls" id="google_search" placeholder="Enter Destination.." name="search"> 
                             <div id="map"></div>
                  <input type="button" onclick="getLocation()" value="Current Location">
                </div>
               
              </div>

              <div id="example"></div>

              <div class="form-group">
                <label for="hotel_longitude" class="col-sm-2 control-label">Longitude *</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_longitude" class="form-control" id="hotel_longitude" placeholder="" readonly="readonly">
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_latitude" class="col-sm-2 control-label">Latitude *</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_latitude" class="form-control" id="hotel_latitude" readonly="readonly" placeholder="">
                </div>
              </div>


             

              <div class="form-group">
    <label for="role validationCustom22" class="col-sm-2 control-label">Minimum Hours *</label>

    <div class="col-sm-9">
      <select name="mini_hour" id="text1 validationCustom22" class="form-control" required="">
        <option value="">--Select--</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>

       <div class="invalid-feedback">
                    Select Hours  
                  </div>
      
    </div>
  </div>

  <div class="form-group any">
    <label for="role" class="col-sm-2 control-label">Maximum Hours</label>

    <div class="col-sm-9">
      <select name="max_hour" id="text2" class="form-control">

        <option value="6">6</option>
        <!-- <option value="1">1</option> -->
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
                   

                  </select>
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Hotel" class="btn btn-info pull-right">
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>  

    </section> 



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

 <script>
        $("#add_user").addClass('active');
        function state_type(id){
  //alert(id);
  
  $.ajax({
    url:'City_ForStateId',
    type:'GET',
    data:{'state_name':id},
    success:function(data){
    //alert(data);
    $("#sel_city").html(data);
  }
})
}
// alert('chirag');
</script>  


  <script type="text/javascript">
  var x = document.getElementById("demo");

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    var lat=position.coords.latitude;
    var lng=position.coords.longitude;

    $("#hotel_latitude").val(lat);
    $("#hotel_longitude").val(lng);
   
  }
  $(function(){
    var lat=$("#hotel_latitude").val();
    var lng=$("#hotel_longitude").val();
     var latlng = new google.maps.LatLng(lat, lng);
        var geocoder = new google.maps.Geocoder();
     geocoder.geocode({ 'latLng': latlng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[1]) {
                         // alert("Location: " + results[1].formatted_address);
                        $("#google_search").val(results[1].formatted_address);
                      }
                    }
                  })
  })

</script>


   <script>
         // This example adds a search box to a map, using the Google Place Autocomplete
         // feature. People can enter geographical searches. The search box will return a
         // pick list containing a mix of places and predicted search terms.
         
         // This example requires the Places library. Include the libraries=places
         // parameter when you first load the API. For example:
         
         function initAutocomplete() {
         
           console.log('initAutocomplete');
           // Create the search box and link it to the UI element.
           var input = document.getElementById('google_search');
           var searchBox = new google.maps.places.SearchBox(input);
           // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
         
           // Bias the SearchBox results towards current map's viewport.
           // map.addListener('bounds_changed', function() {
           //   searchBox.setBounds(map.getBounds());
           // });
         
           var markers = [];
           // Listen for the event fired when the user selects a prediction and retrieve
           // more details for that place.
           searchBox.addListener('places_changed', function() {
             var places = searchBox.getPlaces();
             console.log(places);
             var lat=places[0].geometry.location.lat();
             var lng=places[0].geometry.location.lng();
             console.log(lng);
             console.log(lat);
             $('#hotel_latitude').val(lat);
             $('#hotel_longitude').val(lng);
             if (places.length == 0) {
               return;
             }
         
             // Clear out the old markers.
             markers.forEach(function(marker) {
               marker.setMap(null);
             });
             markers = [];
         
             // For each place, get the icon, name and location.
             var bounds = new google.maps.LatLngBounds();
             places.forEach(function(place) {
               if (!place.geometry) {
                 console.log("Returned place contains no geometry");
                 return;
               }
         
               if (place.geometry.viewport) {
                 // Only geocodes have viewport.
                 bounds.union(place.geometry.viewport);
               } else {
                 bounds.extend(place.geometry.location);
               }
             });
             map.fitBounds(bounds);
           });
         }
         function geocodeLatLng(geocoder, map, infowindow) {
           var input = document.getElementById('latlng').value;
           var latlngStr = input.split(',', 2);
           var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
           geocoder.geocode({'location': latlng}, function(results, status) {
             if (status === 'OK') {
               if (results[0]) {
                 map.setZoom(11);
                 var marker = new google.maps.Marker({
                   position: latlng,
                   map: map
                 });
                 infowindow.setContent(results[0].formatted_address);
                 console.log(infowindow.setContent(results[0].formatted_address));
                 infowindow.open(map, marker);
               } else {
                 window.alert('No results found');
               }
             } else {
               window.alert('Geocoder failed due to: ' + status);
             }
           });
         }
         
      </script>




<!-- for validation -->
<script type="text/javascript">
 // Example starter JavaScript for disabling form submissions if there are invalid fields
 (function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!-- end for validation -->
 

       <style type="text/css">
        <style>
         /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
         /* Optional: Makes the sample page fill the window. */
         html, body {
         height: 100%;
         margin: 0;
         padding: 0;
         }
         #description {
         font-family: Roboto;
         font-size: 15px;
         font-weight: 300;
         }
         #infowindow-content .title {
         font-weight: bold;
         }
         #infowindow-content {
         display: none;
         }
         .pac-card {
         margin: 10px 10px 0 0;
         border-radius: 2px 0 0 2px;
         box-sizing: border-box;
         -moz-box-sizing: border-box;
         outline: none;
         box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
         background-color: #fff;
         font-family: Roboto;
         }
         #pac-container {
         padding-bottom: 12px;
         margin-right: 12px;
         }
         .pac-controls {
         display: inline-block;
         padding: 5px 11px;
         }
         .pac-controls label {
         font-family: Roboto;
         font-size: 13px;
         font-weight: 300;
         }
         #google_search {
         background-color: #fff;
         font-family: Roboto;
         font-size: 15px;
         font-weight: 300;
         margin-left: 12px;
         padding: 0 11px 0 13px;
         text-overflow: ellipsis;
         width: 400px;
         }
         #google_search:focus {
         border-color: #4d90fe;
         }
         #title {
         color: #fff;
         background-color: #4d90fe;
         font-size: 25px;
         font-weight: 500;
         padding: 6px 12px;
         }
         #target {
         width: 345px;
         }
         .radio {
         position: relative;
         bottom: 26px;
         }
         .time-area p {
         margin-bottom: 0px;
         margin-top: 0px;
         }
      </style>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJivoznMnRFWb1MSVVSvFbIxVfGRdIV5Q&libraries=places&callback=initAutocomplete"
         async defer></script>
<style type="text/css">
  .col-sm-9 input[type="button"] {
    margin-left: 12px;
    margin-top: 2px;
}


.form-group.any {
    visibility: hidden;
}
</style>
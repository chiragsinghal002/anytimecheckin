<?php 
$base_url = 'https://anytimecheckin.com/image/';
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Hotel</h3>
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

        <?php echo form_open_multipart(base_url('admin/hotels/viewhotel/'.$hotel['hotel_id']), 'class="form-horizontal"' )?> 
        <div class="form-group">
          <label for="hotel_name" class="col-sm-2 control-label">Name of the Hotel *</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_name" value="<?= $hotel['hotel_name']; ?>" class="form-control" id="hotel_name" placeholder="" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="hotel_email" class="col-sm-2 control-label">Hotel Email *</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_email" value="<?= $hotel['hotel_email']; ?>" class="form-control" id="hotel_email" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="hotel_address" class="col-sm-2 control-label">Hotel Address</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_address" value="<?= $hotel['hotel_address']; ?>" class="form-control" id="hotel_address" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">City</label>

          <div class="col-sm-9">
            <input type="text" name="city" value="<?= $hotel['hotel_city']; ?>" class="form-control" id="city" placeholder="" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="pincode" class="col-sm-2 control-label">Pin Code</label>

          <div class="col-sm-9">
            <input type="number" name="pincode" value="<?= $hotel['hotel_pin_code']; ?>" class="form-control" id="pincode" placeholder="" readonly>
          </div>
        </div>


        <div class="form-group">
          <label for="website" class="col-sm-2 control-label">Website</label>

          <div class="col-sm-9">
            <input type="text" name="website" class="form-control" value="<?= $hotel['hotel_website']; ?>" id="website" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="mobile_no" class="col-sm-2 control-label">Mobile No.</label>

          <div class="col-sm-9">
            <input type="text" name="mobile_no" class="form-control" value="<?= $hotel['hotel_mobile']; ?>" id="mobile_no" placeholder="" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="telephone" class="col-sm-2 control-label">Telephone No *</label>

          <div class="col-sm-9">
            <input type="text" name="telephone" class="form-control" value="<?= $hotel['hotel_telephone']; ?>" id="telephone" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="fax" class="col-sm-2 control-label">Fax No</label>

          <div class="col-sm-9">
            <input type="text" name="fax" class="form-control" value="<?= $hotel['hotel_fax']; ?>" id="fax" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="airport" class="col-sm-2 control-label">Nearest Airport</label>

          <div class="col-sm-9">
            <input type="text" name="airport" class="form-control" value="<?= $hotel['hotel_airport']; ?>" id="airport" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="star_category" class="col-sm-2 control-label">Rating</label>

          <div class="col-sm-9">
            <input type="text" name="star_category" class="form-control" value="<?= $hotel['hotel_star_category']; ?>" id="star_category" placeholder="" readonly>
          </div>
        </div>

        <!-- <div class="form-group">
                <label for="facility_name" class="col-sm-2 control-label"> Image</label>

                <div class="col-sm-9">
                   <input type="file" name="hotel[]"  id="inputFile1" class="form-control" accept="image/*">
                   <?php 
                   if ($hotel['main_image'] != '') {
                     ?>
                     <img src="<?= $base_url.$hotel['main_image']; ?>" style="width: 70px;height: 70px;">
                     <?php
                   }
                   else{
                    
                   }
                   ?>
                  
                </div>
              </div>  -->

<!------------------->
 <div class="form-group">
                <label for="to_date" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-9">
                  <input type="file" name="hotel" class="form-control" accept="image/*">
          <br />
          <?php 

          if(!empty($hotel['main_image']))
          {

        $room_photo=explode(",",$hotel['main_image']);
          $j=1;
          foreach($room_photo as $room_photos)  
          { ?>
            <img width="40px" src="../../../../../image/<?= $room_photos; ?>" />
            <!-- <a href="<?= base_url('admin/hotels/delperhotelphoto/'.$room_photos); ?>">[x]</a> -->
            |<?php if($j%10==0){
          echo "<br />";
          } 
          $j++; 
        }
          }       
        ?>    
                </div>
              </div> 
<!-------------------->




        <div class="form-group">
          <label for="description" class="col-sm-2 control-label">Hotel Description</label>

          <div class="col-sm-9">
            <textarea name="description" rows="10" cols="10"  class="form-control" id="description" readonly><?php echo $hotel['hotel_description']; ?></textarea>
            <!-- <input type="text" name="description" class="form-control" id="description" placeholder=""> -->
          </div>
        </div>

      <div class="form-group">
          <label for="hotel_facilities" class="col-sm-2 control-label">Admin Facilities</label>


          <div class="col-sm-9">
            <?php 
            $adminfaci =  $hotel['admin_facility'];
            $exp = explode(",",$adminfaci);
            //$total = count($exp);
                  //var_dump($exp);
                  // echo "<pre>";
                  // print_r($exp);
            // echo "<pre>";
            // var_dump($facilities);

            foreach($admin_facility as $adminfacility){
              
                  // echo "<pre>";
                  // print_r($adminfacility);
            $id2 = $adminfacility['facility_id'];

            //  for ($i=0; $i<=$total-1 ; $i++) { 

            //   if ($id1 == $exp[$i]) {
            //     $checked = 'checked="checked"';
            //   }

            //   else{

            //     $checked = '';

            //   }

            // }
                  //echo $checked;

            ?>

            <input type="checkbox" name="admin_facility[]" value="<?php echo $adminfacility['facility_id'];?>"<? if(in_array($id2,$exp)){ echo 'checked';}?> readonly><?php echo $adminfacility['facility_name'];?><br>

            <?php
          } 
          ?>

                  
                  </div>
                </div> 




        <div class="form-group">
          <label for="hotel_facilities" class="col-sm-2 control-label">Facilities</label>


          <div class="col-sm-9">
            <?php 
            $faci =  $hotel['hotel_facilities'];
            $exp = explode(",",$faci);
            //$total = count($exp);
                  //var_dump($exp);
                  // echo "<pre>";
                  // print_r($exp);
            // echo "<pre>";
            // var_dump($facilities);

            foreach($facilities as $facility){
                   // var_dump($facility);
            $id1 = $facility['facility_id'];

            //  for ($i=0; $i<=$total-1 ; $i++) { 

            //   if ($id1 == $exp[$i]) {
            //     $checked = 'checked="checked"';
            //   }

            //   else{

            //     $checked = '';

            //   }

            // }
                  //echo $checked;

            ?>

            <input type="checkbox" name="hotel_facilities[]" value="<?php echo $facility['facility_id'];?>"<? if(in_array($id1,$exp)){ echo 'checked';}?> readonly><?php echo $facility['facility_name'];?><br>

            <?php
          } 
          ?>

                  <!-- <input type="checkbox" name="hotel_facilities" value="2" > Swimming Pool<br>
                    <input type="checkbox" name="hotel_facilities" value="3" > Wifi<br> -->
                  </div>
                </div>

             <!--  <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Any Time</label>

                <div class="col-sm-9">
                  <div id="myRadioGroup">
    Yes<input type="radio" name="cars" checked="checked" value="1"  />
    No<input type="radio" name="cars" value="3" />

    <div id="Cars2" class="desc">
       
        </div>
    <div id="Cars3" class="desc" style="display: none;">
        <input type="time" name="check_in" id="star_category" placeholder="check in">
        <input type="time" name="check_out"  id="star_category" placeholder="check out">
    </div>
</div>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Location</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_location" value="<?php echo $hotel['hotel_location']; ?>" class="form-control" id="star_category" placeholder="">
                  <button>GET IT</button>
                </div>
              </div> -->


             <!--  <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Property Location</label>

                <div class="col-sm-9">
                  <input type="text"  class="controls" id="google_search" placeholder="Enter Destination.." name="search"> 
                             <div id="map"></div>
                  <input type="button" onclick="getLocation()" value="Current Location">
                </div>
               
              </div> -->

              <div id="example"></div>

              <div class="form-group">
                <label for="hotel_longitude" class="col-sm-2 control-label">Longitude *</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_longitude" value="<?php echo $hotel['hotel_longitude']; ?>" class="form-control" id="hotel_longitude" placeholder="" readonly="readonly">
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_latitude" class="col-sm-2 control-label">Latitude *</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_latitude" value="<?php echo $hotel['hotel_latitude']; ?>" class="form-control" id="hotel_latitude" readonly="readonly" placeholder="" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Minimum Hour</label>

                <div class="col-sm-9">
                  <select name="mini_hour" id="text1" class="form-control" readonly>

                    <option value="">Select</option>                    
                    <option value="1" <?php echo ($hotel['min_hour']==1 ? 'selected' : '');?>>1</option>
                    <option value="2" <?php echo ($hotel['min_hour']==2 ? 'selected' : '');?>>2</option>
                    <option value="3" <?php echo ($hotel['min_hour']==3 ? 'selected' : '');?>>3</option>
                    <option value="4" <?php echo ($hotel['min_hour']==4 ? 'selected' : '');?>>4</option>
                    <option value="5" <?php echo ($hotel['min_hour']==5 ? 'selected' : '');?>>5</option>
                    <option value="6" <?php echo ($hotel['min_hour']==6 ? 'selected' : '');?>>6</option>
                    <option value="7"<?php echo ($hotel['min_hour']==7 ? 'selected' : '');?>>7</option>
                    <option value="8"<?php echo ($hotel['min_hour']==8 ? 'selected' : '');?>>8</option>
                    <option value="9"<?php echo ($hotel['min_hour']==9 ? 'selected' : '');?>>9</option>
                    <option value="10"<?php echo ($hotel['min_hour']==10 ? 'selected' : '');?>>10</option>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Maximum Hour</label>

                <div class="col-sm-9">
                  <select name="max_hour" id="text2" class="form-control" readonly>

                    <option value="">Select</option>                    
                    <option value="1" <?php echo ($hotel['max_hour']==1 ? 'selected' : '');?>>1</option>
                    <option value="2"<?php echo ($hotel['max_hour']==2 ? 'selected' : '');?>>2</option>
                    <option value="3" <?php echo ($hotel['max_hour']==3 ? 'selected' : '');?>>3</option>
                    <option value="4" <?php echo ($hotel['max_hour']==4 ? 'selected' : '');?>>4</option>
                    <option value="5" <?php echo ($hotel['max_hour']==5 ? 'selected' : '');?>>5</option>
                    <option value="6" <?php echo ($hotel['max_hour']==6 ? 'selected' : '');?>>6</option>
                    <option value="7" <?php echo ($hotel['max_hour']==7 ? 'selected' : '');?>>7</option>
                    <option value="8" <?php echo ($hotel['max_hour']==8 ? 'selected' : '');?>>8</option>
                    <option value="9" <?php echo ($hotel['max_hour']==9 ? 'selected' : '');?>>9</option>
                    <option value="10" <?php echo ($hotel['max_hour']==10 ? 'selected' : '');?>>10</option>

                  </select>
                </div>
              </div>



             <!--  <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                </div>
              </div> -->
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
</style>
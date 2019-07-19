
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Hotel</h3>
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

        <?php echo form_open_multipart(base_url('admin/hotels/edit/'.$hotel['hotel_id']), 'class="form-horizontal"' )?> 
        <div class="form-group">
          <label for="hotel_name" class="col-sm-2 control-label">Name of the Hotel *</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_name" value="<?= $hotel['hotel_name']; ?>" class="form-control" id="hotel_name" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="hotel_email" class="col-sm-2 control-label">Hotel Email *</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_email" value="<?= $hotel['hotel_email']; ?>" class="form-control" id="hotel_email" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="hotel_address" class="col-sm-2 control-label">Hotel Address</label>

          <div class="col-sm-9">
            <input type="text" name="hotel_address" value="<?= $hotel['hotel_address']; ?>" class="form-control" id="hotel_address" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">City</label>

          <div class="col-sm-9">
            <input type="text" name="city" value="<?= $hotel['hotel_city']; ?>" class="form-control" id="city" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="pincode" class="col-sm-2 control-label">Pin Code</label>

          <div class="col-sm-9">
            <input type="number" name="pincode" value="<?= $hotel['hotel_pin_code']; ?>" class="form-control" id="pincode" placeholder="">
          </div>
        </div>


        <div class="form-group">
          <label for="website" class="col-sm-2 control-label">Website</label>

          <div class="col-sm-9">
            <input type="text" name="website" class="form-control" value="<?= $hotel['hotel_website']; ?>" id="website" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="mobile_no" class="col-sm-2 control-label">Mobile No.</label>

          <div class="col-sm-9">
            <input type="text" name="mobile_no" class="form-control" value="<?= $hotel['hotel_mobile']; ?>" id="mobile_no" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="telephone" class="col-sm-2 control-label">Telephone No *</label>

          <div class="col-sm-9">
            <input type="text" name="telephone" class="form-control" value="<?= $hotel['hotel_telephone']; ?>" id="telephone" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="fax" class="col-sm-2 control-label">Fax No</label>

          <div class="col-sm-9">
            <input type="text" name="fax" class="form-control" value="<?= $hotel['hotel_fax']; ?>" id="fax" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="airport" class="col-sm-2 control-label">Nearest Airport</label>

          <div class="col-sm-9">
            <input type="text" name="airport" class="form-control" value="<?= $hotel['hotel_airport']; ?>" id="airport" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="star_category" class="col-sm-2 control-label">Rating</label>

          <div class="col-sm-9">
            <input type="text" name="star_category" class="form-control" value="<?= $hotel['hotel_star_category']; ?>" id="star_category" placeholder="">
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
            <textarea name="description" rows="10" cols="10"  class="form-control" id="description"><?php echo $hotel['hotel_description']; ?></textarea>
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

            <input type="checkbox" name="admin_facility[]" value="<?php echo $adminfacility['facility_id'];?>"<? if(in_array($id2,$exp)){ echo 'checked';}?>><?php echo $adminfacility['facility_name'];?><br>

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

            <input type="checkbox" name="hotel_facilities[]" value="<?php echo $facility['facility_id'];?>"<? if(in_array($id1,$exp)){ echo 'checked';}?>><?php echo $facility['facility_name'];?><br>

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
                  <input type="text" name="hotel_latitude" value="<?php echo $hotel['hotel_latitude']; ?>" class="form-control" id="hotel_latitude" readonly="readonly" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Minimum Hour</label>

                <div class="col-sm-9">
                  <select name="mini_hour" id="text1" class="form-control">

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
                  <select name="max_hour" id="text2" class="form-control">

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



              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>  

    </section> 
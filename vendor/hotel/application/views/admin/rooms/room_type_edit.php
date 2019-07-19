<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Room Type</h3>
           <div class="tt">
            <a href="<?= base_url('admin/rooms/roomtype'); ?>" class="btn btn-info btn-flat"><< Back</a>
           </div>
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

        <?php echo form_open(base_url('admin/rooms/editroomtype/'.$roomtype['room_type_id']), 'class="form-horizontal needs-validation" novalidate' )?>  

        <div class="form-group">
          <label for="role validationCustom100" class="col-sm-2 control-label">Hotel</label>

          <div class="col-sm-9">

            <?php 
            if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
              ?>
              <select name="hotel_id" id="validationCustom100" required class="form-control">

                <option value="">Select Hotel</option>
                <?php foreach($all_hotels as $row): ?>

                  <option value="<?= $row['hotel_id']; ?>" <?= ($roomtype['hotel_id'] == $row['hotel_id'])?'selected': '' ?>><?= $row['hotel_name']; ?></option>
                <?php endforeach; ?>

              </select>

              <div class="invalid-feedback">
                Enter Hotel
              </div>
            <?php } 
            else{
             ?>

             <input type="hidden" name="hotel_id" value="<?php echo $roomtype['hotel_id']; ?>" />

             <select name="hotel_id" class="form-control act">

              <option value="">Select Hotel</option>
              <?php foreach($all_hotels as $row): ?>

                <option value="<?= $row['hotel_id']; ?>" <?= ($roomtype['hotel_id'] == $row['hotel_id'])?'selected': '' ?>><?= $row['hotel_name']; ?></option>
              <?php endforeach; ?>

            </select>
            <?php
          }
          ?>
        </div>
      </div>



      <div class="form-group">
        <label for="hotel_room_type validationCustom101" class="col-sm-2 control-label">Room Type</label>

        <div class="col-sm-9">
          <input type="text" name="hotel_room_type" id="validationCustom101" required value="<?= $roomtype['hotel_room_type']; ?>" class="form-control" id="hotel_room_type" placeholder="">

          <div class="invalid-feedback">
            Enter Room Type
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="hotel_room_type validationCustom102" class="col-sm-2 control-label">No of rooms(Day)</label>

        <div class="col-sm-9">
          <input type="text" name="no_of_rooms" id="validationCustom101" required value="<?= $roomtype['no_of_rooms']; ?>" class="form-control" id="hotel_room_type" placeholder="">
          <div class="invalid-feedback">
            Enter No of rooms for day
          </div>
        </div>
      </div>

       <div class="form-group">
        <label for="hotel_room_type validationCustom42" class="col-sm-2 control-label">No of rooms(Hour)</label>

        <div class="col-sm-9">
          <input type="text" name="no_of_rooms_hour" id="validationCustom1099" required value="<?= $roomtype['no_of_rooms_hour']; ?>" class="form-control" id="hotel_room_type" placeholder="">
          <div class="invalid-feedback">
            Enter No of rooms for hour
          </div>
        </div>
      </div>
               <!-- <div class="form-group">
                <label for="v_user_password" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-9">
                  <input type="password" name="v_user_password" class="form-control" id="v_user_password" placeholder="">
                </div>
              </div> -->


              <div class="form-group validationCustom103">
                <label for="hotel_room_type" class="col-sm-2 control-label">Price</label>

                <div class="col-sm-4">
                  <input type="number" name="hours_price" value="<?php echo $roomtype['price_per_hour'];?>" class="form-control" id="hotel_room_type validationCustom102" required placeholder="hourly price">
                  <div class="invalid-feedback">
                    Enter Price
                  </div>
                </div>

                <div class="col-sm-4">
                  <input type="number" name="day_price"value="<?php echo $roomtype['price_per_day'];?>"  class="form-control" id="hotel_room_type validationCustom102" required placeholder="day price">
                  <div class="invalid-feedback">
                    Enter Day
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
                <label for="hotel_facilities" class="col-sm-2 control-label">Facilities</label>
                

                <div class="col-sm-9">
                  <?php foreach($admin_facility as $admin_fac){
                    ?>
                     <input type="checkbox" name="admin_facility[]" value="<?php echo $admin_fac['facility_id'];?>"><?php echo $admin_fac['facility_name'];?><br>

                    <?php
                  }
                  ?>
                 
                 
                </div>
              </div> -->

              <div class="form-group">
                <label for="hotel_facilities" class="col-sm-2 control-label">Facilities</label>

                <div class="col-sm-9">
                  <?php 
                  $faci =  $roomtype['vendor_facility'];
                  $exp = explode(",",$faci);

                  foreach($vendor_facility as $ven_fac){
                   // var_dump($facility);
                    $id1 = $ven_fac['facility_id'];           

                    ?>
                    <input type="checkbox" name="vendor_facility[]" value="<?php echo $ven_fac['facility_id'];?>"<? if(in_array($id1,$exp)){ echo 'checked';}?>><?php echo $ven_fac['facility_name'];?><br>

                    <?php
                  } 
                  ?>

                </div>
              </div>

                <!-- <div class="col-sm-9">
                  <?php foreach($vendor_facility as $ven_fac){
                    ?>
                     <input type="checkbox" name="vendor_facility[]" value="<?php echo $ven_fac['facility_id'];?>"><?php echo $ven_fac['facility_name'];?><br>

                    <?php
                  }
                  ?>                
                  
                </div> 
              </div>-->

              <div class="form-group " >
                <label for="hotel_room_type validationCustom104" class="col-sm-2 control-label">Capacity</label>

                <div class="col-sm-4">
                  <select name="adult_person_capacity" id="validationCustom104" required class="form-control">

                    <option value="">Select Adult</option>                    
                    <option value="1"<?php echo ($roomtype['adult_person_capacity']==1 ? 'selected' : '');?>>1</option>
                    <option value="2"<?php echo ($roomtype['adult_person_capacity']==2 ? 'selected' : '');?>>2</option>
                    <option value="3"<?php echo ($roomtype['adult_person_capacity']==3 ? 'selected' : '');?>>3</option>
                    <option value="4"<?php echo ($roomtype['adult_person_capacity']==4 ? 'selected' : '');?>>4</option>
                    <option value="5"<?php echo ($roomtype['adult_person_capacity']==5 ? 'selected' : '');?>>5</option>
                    <option value="6"<?php echo ($roomtype['adult_person_capacity']==6 ? 'selected' : '');?>>6</option>
                    <option value="7"<?php echo ($roomtype['adult_person_capacity']==7 ? 'selected' : '');?>>7</option>
                    <option value="8"<?php echo ($roomtype['adult_person_capacity']==8 ? 'selected' : '');?>>8</option>
                    <option value="9"<?php echo ($roomtype['adult_person_capacity']==9 ? 'selected' : '');?>>9</option>
                    <option value="10"<?php echo ($roomtype['adult_person_capacity']==10 ? 'selected' : '');?>>10</option>

                  </select>
                  <div class="invalid-feedback">
                    Select Adult
                  </div>
                </div>

                <div class="col-sm-4">
                  <select name="child_capacity" class="form-control" id="validationCustom104" required>

                    <option value="">Select Child</option>                    
                    <option value="1"<?php echo ($roomtype['child_capacity']==1 ? 'selected' : '');?>>1</option>
                    <option value="2"<?php echo ($roomtype['child_capacity']==2 ? 'selected' : '');?>>2</option>
                    <option value="3"<?php echo ($roomtype['child_capacity']==3 ? 'selected' : '');?>>3</option>
                    <option value="4"<?php echo ($roomtype['child_capacity']==4 ? 'selected' : '');?>>4</option>
                    <option value="5"<?php echo ($roomtype['child_capacity']==5 ? 'selected' : '');?>>5</option>
                    <option value="6"<?php echo ($roomtype['child_capacity']==6 ? 'selected' : '');?>>6</option>
                    <option value="7"<?php echo ($roomtype['child_capacity']==7 ? 'selected' : '');?>>7</option>
                    <option value="8"<?php echo ($roomtype['child_capacity']==8 ? 'selected' : '');?>>8</option>
                    <option value="9"<?php echo ($roomtype['child_capacity']==9 ? 'selected' : '');?>>9</option>
                    <option value="10"<?php echo ($roomtype['child_capacity']==10 ? 'selected' : '');?>>10</option>

                  </select>
                  <div class="invalid-feedback">
                    Select Child
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2  control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" id="validationCustom104" required class="form-control">
                   <option value="">Select Status</option>
                   <option value="1" <?= ($roomtype['status'] == 1)?'selected': '' ?> >Active</option>
                   <option value="0" <?= ($roomtype['status'] == 0)?'selected': '' ?>>Inactive</option>
                 </select>
                 <div class="invalid-feedback">
                  Select Status
                </div>
              </div>
            </div>


            <div class="form-group">
              <label for="hotel_facilities" class="col-sm-2 control-label">Description</label>


              <div class="col-sm-9">
                <textarea rows="10" cols="10" id="validationCustom104" required name="description" class="text"><?php echo $roomtype['description']; ?></textarea>
                <div class="invalid-feedback">
                  Enter Description
                  </div

                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Submit" class="btn btn-info pull-right">
                </div>
              </div>
              <?php echo form_close( ); ?>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>  

    </section> 


    <script>
      $("#add_user").addClass('active');
    </script> 

    <style type="text/css">
      textarea.text {
        margin: 0px;
        width: 654px;
        height: 139px;
        z-index: auto;
        position: relative;
        line-height: 18.5714px;
        font-size: 13px;
        transition: none 0s ease 0s;
        background: transparent !important;
      }
    </style> 


    <style type="text/css">
     select.form-control.act option {
      display: none;
    }
  </style> 
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
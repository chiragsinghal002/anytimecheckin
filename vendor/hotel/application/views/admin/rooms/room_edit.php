<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Room</h3>
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
           
            <?php echo form_open(base_url('admin/rooms/edit/'.$room['hotel_room_id']), 'class="form-horizontal"' )?> 

              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                 <select name="room_type_id" class="form-control">
                    <option value="">Select Role</option>
                    <?php foreach($room_types as $row): ?>
                    <option value="<?= $row['room_type_id']; ?>" <?= ($room['room_type_id'] == $row['room_type_id'])?'selected': '' ?> ><?= $row['hotel_room_type']; ?></option>
                    
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="room_name" class="col-sm-2 control-label">Room Name</label>

                <div class="col-sm-9">
                  <input type="text" name="room_name" value="<?= $room['room_name']; ?>" class="form-control" id="room_name" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="room_no" class="col-sm-2 control-label">Room No</label>

                <div class="col-sm-9">
                  <input type="room_no" name="room_no" value="<?= $room['room_no']; ?>" class="form-control" id="room_no" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="room_location" class="col-sm-2 control-label">Room Location</label>

                <div class="col-sm-9">
                  <input type="text" name="room_location" value="<?= $room['room_location']; ?>" class="form-control" id="room_location" placeholder="">
                </div>
              </div>
              
                 <div class="form-group">
                <label for="room_facilities" class="col-sm-2 control-label">Room Facilities</label>

                <div class="col-sm-9">
                  <input type="text" name="room_facilities" value="<?= $room['room_facilities']; ?>" class="form-control" id="room_facilities" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="capacity" class="col-sm-2 control-label">Room Capacity</label>

                <div class="col-sm-9">
                  <input type="text" name="room_capacity" value="<?= $room['room_capacity']; ?>" class="form-control" id="room_capacity" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="capacity" class="col-sm-2 control-label">Room Description</label>

                <div class="col-sm-9">
                 <textarea name="room_description" rows="10" cols="10" class="form-control"><?php echo $room['room_description']; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="room_hourly_charge" class="col-sm-2 control-label">Hourly Charge</label>

                <div class="col-sm-9">
                  <input type="number" name="room_hourly_charge" value="<?= $room['room_hourly_charge']; ?>" class="form-control" id="room_hourly_charge" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="room_fixed_charge" class="col-sm-2 control-label">Fixed Charge</label>

                <div class="col-sm-9">
                  <input type="number" name="room_fixed_charge" value="<?= $room['room_fixed_charge']; ?>" class="form-control" id="room_fixed_charge" placeholder="">
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
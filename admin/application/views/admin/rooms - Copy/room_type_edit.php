<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Room Type</h3>
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
           
           <?php echo form_open(base_url('admin/rooms/editroomtype/'.$roomtype['room_type_id']), 'class="form-horizontal"' )?>  

            <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Hotel</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>" <?= ($roomtype['hotel_id'] == $row['hotel_id'])?'selected': '' ?>><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

             

               <div class="form-group">
                <label for="hotel_room_type" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_room_type" value="<?= $roomtype['hotel_room_type']; ?>" class="form-control" id="hotel_room_type" placeholder="">
                </div>
              </div>

               <!-- <div class="form-group">
                <label for="v_user_password" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-9">
                  <input type="password" name="v_user_password" class="form-control" id="v_user_password" placeholder="">
                </div>
              </div> -->


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" class="form-control">
                     <option value="">Select Status</option>
                    <option value="1" <?= ($roomtype['status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($roomtype['status'] == 0)?'selected': '' ?>>Inactive</option>
                  </select>
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
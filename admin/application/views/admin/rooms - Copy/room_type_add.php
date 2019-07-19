<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Room Type</h3>
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
           
            <?php echo form_open(base_url('admin/rooms/addroomtype'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Hotel</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_room_type" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_room_type" class="form-control" id="hotel_room_type" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">No. of Person</label>

                <div class="col-sm-9">
                  <select name="person" class="form-control">
                    
                    <option value="">Select Person</option>                    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                     
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="hotel_room_type" class="col-sm-2 control-label">Price</label>

                <div class="col-sm-4">
                  <input type="number" name="hours_price" class="form-control" id="hotel_room_type" placeholder="hourly price">
                </div>
               
                <div class="col-sm-4">
                  <input type="number" name="day_price" class="form-control" id="hotel_room_type" placeholder="day price">
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
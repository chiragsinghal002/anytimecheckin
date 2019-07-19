<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- <script src="../../locationpicker.jquery.min.js"></script> -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Hotel Photos</h3>
          <span>Your image size should be (720 × 480 pixels)</span>
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

            <?php echo form_open_multipart(base_url('admin/hotels/addhotelphotos'), 'class="form-horizontal"');  ?> 
            
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control" onchange="room_type(this.value)">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

              <!-- <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <select name="room_id" class="form-control" id="sel_city">
                    
                    <option value="">Select Room</option>
                    <?php foreach($room_type as $room): 
                      // echo "<pre>";
                      // print_r($room);
                      ?>

                    <option value="<?= $room['room_type_id']; ?>"><?= $room['hotel_room_type']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>  -->            
             

               <div class="form-group">
                <label for="to_date" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-9">
                  <input type="file" name="hotel[]" multiple="multiple" class="form-control" accept="image/*">
                </div>
              </div>


               <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" class="form-control">
                    
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Hotel" class="btn btn-info pull-right">
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
function room_type(id){
$.ajax({
  url:'RoomTypeId_ForHotelId',
  type:'GET',
  data:{'hotel_id':id},
  success:function(data){
    console.log(data);
    $("#sel_city").html(data);
  }
})
}
// alert('chirag');
</script>


<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create Rooms</h3>
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
        <?php //var_dump($all_hotels);?>
        <?php echo form_open(base_url('admin/rooms/CreateRoom'), 'class="form-horizontal"');  ?> 
        <div class="form-group">
          <label for="role" class="col-sm-2 control-label">Select Hotel</label>

          <div class="col-sm-9">
            <select name="hotel_id" id="hotel_id" class="form-control" onchange="room_type(this.value)">
            <!-- <select name="hotel_id" id="hotel_id" class="form-control" onchange="hotel();"> -->
              <option value="">Select Hotel</option>

              <?php foreach($all_hotels as $row): ?>
                <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="role" class="col-sm-2 control-label">Room Type</label>

          <div class="col-sm-9">
            <select name="room_type_id" class="form-control" id="sel_city">
              <option value="">Select Room Type</option>
              <?php foreach($room_types as $row): ?>
                <option value="<?= $row['room_type_id']; ?>"><?= $row['hotel_room_type']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>

              <!-- <div class="form-group">
                <label for="room_name" class="col-sm-2 control-label">Room Name</label>

                <div class="col-sm-9">
                  <input type="text" name="room_name" class="form-control" id="room_name" placeholder="">
                </div>
              </div> -->

             <div class="form-group">
                <label for="room_no" class="col-sm-2 control-label">No of Rooms</label>

                <div class="col-sm-9">
                  <input type="number" name="no_of_rooms" class="form-control" id="no_of_rooms" placeholder="No of Rooms">
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
function room_type(id){
  
$.ajax({
  url:'RoomTypeId_ForHotelId',
  type:'GET',
  data:{'hotel_id':id},
  success:function(data){
    // alert(data);
    $("#sel_city").html(data);
  }
})
}
// alert('chirag');
</script>    
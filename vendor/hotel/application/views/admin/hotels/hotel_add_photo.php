<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- <script src="../../locationpicker.jquery.min.js"></script> -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Hotel Photos</h3>
          <div class="tt">
            <a href="<?= base_url('admin/hotels/hotelphoto_list'); ?>" class="btn btn-info btn-flat"><< Back</a>
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

            <?php echo form_open_multipart(base_url('admin/hotels/addhotelphotos'), 'class="form-horizontal needs-validation" novalidate');  ?> 
            
              <div class="form-group">
                <label for="role validationCustom01" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" id="validationCustom01" required class="form-control" onchange="room_type(this.value)">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
       
                  </select>
				               			        <div class="invalid-feedback">
        Enter Hotel Name
      </div>
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
                <label for="to_date validationCustom01 " class="col-sm-2 control-label">Image</label>                

                <div class="col-sm-9">
                  <input type="file" name="hotel[]" multiple="multiple" id="validationCustom01" required class="form-control" accept="image/*">
                  <span style="color: red">Your image size should be (720 × 480 pixels)</span>
				  			        <div class="invalid-feedback">
        Enter Image
      </div>
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


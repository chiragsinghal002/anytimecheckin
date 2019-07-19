<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Room</h3>
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
           
            <?php echo form_open(base_url('admin/rooms/add'), 'class="form-horizontal needs-validation" novalidate');  ?> 
              <div class="form-group">
                <label for="role validationCustom100" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <select name="room_type_id" id="validationCustom100" required class="form-control">
                    <option value="">Select Room</option>
                    <?php foreach($room_types as $row): ?>
                    <option value="<?= $row['room_type_id']; ?>"><?= $row['hotel_room_type']; ?></option>
                     <?php endforeach; ?>
                    
                  </select>
				  
   	  	     <div class="invalid-feedback">
              Enter Room Type
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="room_name" class="col-sm-2 control-label">Room Name</label>

                <div class="col-sm-9">
                  <input type="text" name="room_name" class="form-control" id="room_name" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="room_no" class="col-sm-2 control-label">Room No</label>

                <div class="col-sm-9">
                  <input type="text" name="room_no" class="form-control" id="room_no" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="room_location" class="col-sm-2 control-label">Room Location</label>

                <div class="col-sm-9">
                  <input type="text" name="room_location" class="form-control" id="room_location" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="room_facilities" class="col-sm-2 control-label">Room Facilities</label>

                <div class="col-sm-9">
                  <input type="text" name="room_facilities" class="form-control" id="room_facilities" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="capacity" class="col-sm-2 control-label">Room Capacity</label>

                <div class="col-sm-9">
                  <input type="text" name="room_capacity" class="form-control" id="room_capacity" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="capacity" class="col-sm-2 control-label">Room Description</label>

                <div class="col-sm-9">
                 <textarea name="room_description" rows="10" cols="10" class="form-control"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="room_hourly_charge" class="col-sm-2 control-label">Hourly Charge</label>

                <div class="col-sm-9">
                  <input type="number" name="room_hourly_charge" class="form-control" id="room_hourly_charge" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="room_fixed_charge" class="col-sm-2 control-label">Fixed Charge</label>

                <div class="col-sm-9">
                  <input type="number" name="room_fixed_charge" class="form-control" id="room_fixed_charge" placeholder="">
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
<script>
$("#add_user").addClass('active');
</script>    
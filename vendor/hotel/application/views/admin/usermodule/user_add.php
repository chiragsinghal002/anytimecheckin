  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add User</h3>
           <div class="tt">
            <a href="<?= base_url('admin/usermodule'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open(base_url('admin/usermodule/add'), 'class="form-horizontal needs-validation" novalidate');  ?> 

             <div class="form-group">
                <label for="role validationCustom01" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" id="validationCustom01" required class="form-control">
                    
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

              <div class="form-group">
                <label for="firstname validationCustom02" class="col-sm-2 control-label">First Name</label>

                <div class="col-sm-9">
                  <input type="text" name="firstname" class="form-control" id="firstname validationCustom02" required placeholder="">
				  		      <div class="invalid-feedback">
        Enter First Name
      </div>
                </div>
              </div>

              <div class="form-group">
                <label for="lastname validationCustom03" class="col-sm-2 control-label">Last Name</label>

                <div class="col-sm-9">
                  <input type="text" name="lastname" class="form-control" id="lastname validationCustom03" required placeholder="">
				  			  		      <div class="invalid-feedback">
        Enter Last Name
      </div>
                </div>
              </div>

              <div class="form-group">
                <label for="email validationCustom04" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="email validationCustom04" required placeholder="">
				  			  			  		      <div class="invalid-feedback">
        Enter Email
      </div>
				  
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no validationCustom05" class="col-sm-2 control-label">Mobile No</label>

                <div class="col-sm-9">
                  <input type="number" name="mobile_no" class="form-control" id="mobile_no validationCustom05" required placeholder="">
				  			  			  			  		      <div class="invalid-feedback">
        Enter Mobile No
      </div>
                </div>
              </div>
              <div class="form-group">
                <label for="address validationCustom06" class="col-sm-2 control-label">Address</label>

                <div class="col-sm-9">
                  <input type="address" name="address" class="form-control" id="address validationCustom06" required placeholder="">
				  		  			  			  			  		      <div class="invalid-feedback">
        Enter Address
      </div>
                </div>
              </div>

              <!-- <div class="form-group">
                <label for="designation" class="col-sm-2 control-label">Designation</label>

                <div class="col-sm-9">
                  <input type="designation" name="designation" class="form-control" id="designation" placeholder="">
                </div>
              </div> -->

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" class="form-control">
                   <!--  <option value="">Select Status</option> -->
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add User" class="btn btn-info pull-right">
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
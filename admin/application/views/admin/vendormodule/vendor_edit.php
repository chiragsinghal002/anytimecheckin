<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Vendor</h3>
          <div class="tt">
            <a href="<?= base_url('admin/Vendormodule'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open(base_url('admin/vendormodule/edit/'.$user['v_id']), 'class="form-horizontal needs-validation" novalidate' )?>           

              <div class="form-group">
                <label for="firstname validationCustom100" class="col-sm-2 control-label">First Name</label>

                <div class="col-sm-9">
                  <input type="text" name="v_fname" value="<?= $user['v_fname']; ?>" class="form-control" id="v_fname validationCustom100" required placeholder="" >
				     <div class="invalid-feedback">
              Enter First Name
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="lastname validationCustom101" class="col-sm-2 control-label">Last Name</label>

                <div class="col-sm-9">
                  <input type="text" name="v_lname" value="<?= $user['v_lname']; ?>" class="form-control" id="v_lname validationCustom101" required placeholder="">
				       <div class="invalid-feedback">
              Enter Last Name
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="email validationCustom102" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="v_email" value="<?= $user['v_email']; ?>" class="form-control" id="v_email validationCustom102"required placeholder="">
				         <div class="invalid-feedback">
              Enter Email
            </div>
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no validationCustom103" class="col-sm-2 control-label">Mobile No</label>

                <div class="col-sm-9">
                  <input type="number" name="v_mob" value="<?= $user['v_mob']; ?>" class="form-control" id="mobile_no validationCustom103" required placeholder="">
				  	         <div class="invalid-feedback">
              Enter Mobile No.
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="address validationCustom104" class="col-sm-2 control-label">Address</label>

                <div class="col-sm-9">
                  <input type="address" name="v_address" value="<?= $user['v_address']; ?>" class="form-control" id="v_address validationCustom103" required placeholder="">
				  	  	         <div class="invalid-feedback">
              Enter Address
            </div>
                </div>
              </div>
              
              <div class="form-group">
                <label for="address validationCustom105" class="col-sm-2 control-label">State</label>

                <div class="col-sm-9">
                  <input type="text" name="v_gst" value="<?= $user['v_gst']; ?>" class="form-control" id="v_gst validationCustom105" required placeholder="">
				    	  	         <div class="invalid-feedback">
              Enter State
            </div>
                </div>
              </div>
              
               <div class="form-group">
                <label for="address validationCustom106" class="col-sm-2 control-label">City</label>

                <div class="col-sm-9">
                  <input type="text" name="v_city" value="<?= $user['v_city']; ?>" class="form-control " id="v_city validationCustom106" required placeholder="">
				  	    	  	         <div class="invalid-feedback">
              Enter City
            </div>
                </div>
              </div>
              
              <div class="form-group">
                <label for="address validationCustom107" class="col-sm-2 control-label">Business Registration Number</label>

                <div class="col-sm-9">
                  <input type="text" name="text" value="<?= $user['v_gst_number']; ?>" class="form-control" id="v_gst_number validationCustom107" placeholder="" required>
				  	  	    	  	         <div class="invalid-feedback">
              Enter Business Registration Number
            </div>
                </div>
              </div>
              
             
              
              <div class="form-group">
                <label for="address validationCustom108" class="col-sm-2 control-label">Post Code</label>

                <div class="col-sm-9">
                  <input type="text" name="v_zip" value="<?= $user['v_zip']; ?>" class="form-control" id="v_zip validationCustom108 " placeholder="" required>
				  	  	  	    	  	         <div class="invalid-feedback">
              Enter Post Code
            </div>
                </div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($user['status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($user['status'] == 0)?'selected': '' ?>>Inactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Vendor" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 
<!-- for validation -->
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
<style>

</style>

<!-- end for validation -->
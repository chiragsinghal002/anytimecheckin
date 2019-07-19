  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Assign User Role</h3>
           <div class="tt">
            <a href="<?= base_url('admin/users'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open(base_url('admin/users/assignrole'), 'class="form-horizontal needs-validation" novalidate');  ?> 

            <div class="form-group">
                <label for="role validationCustom01" class="col-sm-2 control-label">Hotel</label>

                <div class="col-sm-9">
                  <select name="hotel_id" id="validationCustom01" required class="form-control">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
				  		      <div class="invalid-feedback">
        Select Hotel
      </div>
                </div>
              </div>

              <div class="form-group">
                <label for="role validationCustom02" class="col-sm-2 control-label">User</label>

                <div class="col-sm-9">
                  <select name="v_user_id"  id="validationCustom02" required class="form-control">
                    
                    <option value="">Select User</option>
                    <?php foreach($user_list as $user): ?>

                    <option value="<?= $user['v_user_id']; ?>"><?= $user['user_fname'].' '.$user['user_lname']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
				  				  		      <div class="invalid-feedback">
        Select User
      </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="role validationCustom03" class="col-sm-2 control-label">User Role</label>

                <div class="col-sm-9">
                  <select name="v_user_profile_id" id="validationCustom03" required class="form-control">
                    
                    <option value="">Select Role</option>                

                    <option value="1">Manager</option>
                    <option value="2">Reception</option>
                      
                    
                  </select>

                  <!-- <select name="v_user_profile_id" class="form-control">
                    
                    <option value="">Select Role</option>
                    <?php foreach($user_role as $role): ?>

                    <option value="<?= $role['user_role_id']; ?>"><?= $role['user_role_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select> -->
				  						  				  		      <div class="invalid-feedback">
        Select User Role
      </div>
                </div>

              </div>

               <div class="form-group">
                <label for="v_user_email validationCustom04" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="v_user_email" class="form-control" id="v_user_email validationCustom04"  required placeholder="">
				  			  						  				  		      <div class="invalid-feedback">
       Enter Email
      </div>
                </div>
              </div>

               <div class="form-group">
                <label for="v_user_password validationCustom05" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-9">
                  <input type="password" name="v_user_password" class="form-control" id="v_user_password validationCustom05" required placeholder="">
				  				  			  						  				  		      <div class="invalid-feedback">
       Enter Password
      </div>
                </div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="v_status" class="form-control">
                   <!--  <option value="">Select Status</option> -->
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Role" class="btn btn-info pull-right">
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
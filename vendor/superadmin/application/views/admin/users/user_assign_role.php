<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Assign User Role</h3>
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
           
            <?php echo form_open(base_url('admin/users/assignrole'), 'class="form-horizontal"');  ?> 

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
                <label for="role" class="col-sm-2 control-label">User</label>

                <div class="col-sm-9">
                  <select name="v_user_id" class="form-control">
                    
                    <option value="">Select User</option>
                    <?php foreach($user_list as $user): ?>

                    <option value="<?= $user['v_user_id']; ?>"><?= $user['user_fname'].' '.$user['user_lname']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">User Role</label>

                <div class="col-sm-9">
                  <select name="v_user_profile_id" class="form-control">
                    
                    <option value="">Select Role</option>
                    <?php foreach($user_role as $role): ?>

                    <option value="<?= $role['user_role_id']; ?>"><?= $role['user_role_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="v_user_email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="v_user_email" class="form-control" id="v_user_email" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="v_user_password" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-9">
                  <input type="password" name="v_user_password" class="form-control" id="v_user_password" placeholder="">
                </div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="v_status" class="form-control">
                    <option value="">Select Status</option>
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


<script>
$("#add_user").addClass('active');
</script>    
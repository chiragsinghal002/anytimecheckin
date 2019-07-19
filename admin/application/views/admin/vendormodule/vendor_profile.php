<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Vendor Profile </h3>
          <div class="tt">
            <a href="<?= base_url('admin/Vendormodule'); ?>" class="btn btn-info btn-flat"><< Back</a>
           </div>
         <!--  <div class="go"><a href="javascript: history.go(-1)" class="btn btn-info pull-right">Go Back</a></div> -->
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
           
            <?php echo form_open(base_url('admin/vendormodule/vendorprofile/'.$profile['v_id']), 'class="form-horizontal"' )?> 
            
          
           
              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">First Name</label>

                <div class="col-sm-9">
                  <input type="text" name="firstname" value="<?= $profile['v_fname']; ?>" class="form-control" id="firstname" placeholder="" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Last Name</label>

                <div class="col-sm-9">
                  <input type="text" name="lastname" value="<?= $profile['v_lname']; ?>" class="form-control" id="lastname" placeholder="" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="email" value="<?= $profile['v_email']; ?>" class="form-control" id="email" placeholder="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>

                <div class="col-sm-9">
                  <input type="number" name="mobile_no" value="<?= $profile['v_mob']; ?>" class="form-control" id="mobile_no" placeholder="" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Company</label>

                <div class="col-sm-9">
                  <input type="text" name="v_company" value="<? echo $profile['v_company']; ?>" class="form-control" id="v_company" placeholder="" readonly >
                </div>
              </div>

              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Address</label>

                <div class="col-sm-9">
                  <input type="address" name="address" value="<?= $profile['v_address']; ?>" class="form-control" id="address" placeholder="" readonly>
                </div>
              </div>
              
               <div class="form-group">
                <label for="address" class="col-sm-2 control-label">State</label>

                <div class="col-sm-9">
                  <input type="text" name="v_gst" value="<?= $profile['v_gst']; ?>" class="form-control" id="v_gst" placeholder="" readonly>
                </div>
              </div>

               <div class="form-group">
                <label for="address" class="col-sm-2 control-label">City</label>

                <div class="col-sm-9">
                  <input type="address" name="address" value="<?= $profile['v_city']; ?>" class="form-control" id="address" placeholder="" readonly>
                </div>
              </div>

               <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Post Code </label>

                <div class="col-sm-9">
                  <input type="address" name="address" value="<?= $profile['v_zip']; ?>" class="form-control" id="address" placeholder="" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="designation" class="col-sm-2 control-label">Business Registration Number</label>

                <div class="col-sm-9">
                  <input type="designation" name="designation" value="<?= $profile['v_gst_number']; ?>" class="form-control" id="designation" placeholder="" readonly>
                </div>
              </div>

            <!--  <div class="form-group">
                <label for="designation" class="col-sm-2 control-label">GST </label>

                <div class="col-sm-9">
                  <input type="designation" name="designation" value="<?= $profile['v_gst']; ?>" class="form-control" id="designation" placeholder="" readonly>
                </div>
              </div>-->

               <div class="form-group">
                <label for="designation" class="col-sm-2 control-label">Registred date </label>

                <div class="col-sm-9">
                  <input type="designation" name="created" value="<?php 
                  $registre_date=date('d-m-Y',strtotime($profile['created']));
             $register_date1 = $registre_date;

                  echo  $register_date1; ?>" class="form-control" id="designation" placeholder="" readonly>
                </div>
              </div>

              <!--<div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                 <div class="col-sm-9">
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($profile['user_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($profile['user_status'] == 0)?'selected': '' ?>>Inactive</option>
                  </select>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update User" class="btn btn-info pull-right">
                </div>
              </div> -->
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 
<style type="text/css">
  .go {
    display: inline;
}

h3.box-title {
    position: relative;
    top: 6px !important;
}
</style>
<?php 
$base_url = 'https://anytimecheckin.com/image/';
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Profile</h3>
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

        <?php echo form_open_multipart(base_url('admin/users/edituserprofile/'.$this->session->userdata('admin_id')), 'class="form-horizontal"' )?> 


        <div class="form-group">
          <label for="hotel_name" class="col-sm-2 control-label">First Name</label>

          <div class="col-sm-9">
            <input type="text" name="v_fname" value="<?= $user['v_fname']; ?>" class="form-control" id="hotel_name" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="v_lname" class="col-sm-2 control-label">Last Name</label>

          <div class="col-sm-9">
            <input type="text" name="v_lname" value="<?= $user['v_lname']; ?>" class="form-control" id="v_lname" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="v_mob" class="col-sm-2 control-label">Mobile No.</label>

          <div class="col-sm-9">
            <input type="text" name="v_mob" value="<?= $user['v_mob']; ?>" class="form-control" id="v_mob" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>

          <div class="col-sm-9">
            <input type="text" name="v_email" value="<?= $user['v_email']; ?>" class="form-control" id="city" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="v_company" class="col-sm-2 control-label">Company</label>

          <div class="col-sm-9">
            <input type="text" name="v_company" value="<?= $user['v_company']; ?>" class="form-control" id="v_company" placeholder="">
          </div>
        </div>


        <div class="form-group">
          <label for="v_address" class="col-sm-2 control-label">Address</label>

          <div class="col-sm-9">
            <input type="text" name="v_address" class="form-control" value="<?= $user['v_address']; ?>" id="v_address" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="v_gst_number" class="col-sm-2 control-label">GST No.</label>

          <div class="col-sm-9">
            <input type="text" name="v_gst_number" class="form-control" value="<?= $user['v_gst_number']; ?>" id="v_gst_number" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="v_gst" class="col-sm-2 control-label">GST </label>

          <div class="col-sm-9">
            <input type="text" name="v_gst" class="form-control" value="<?= $user['v_gst']; ?>" id="v_gst" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="v_city" class="col-sm-2 control-label">City</label>

          <div class="col-sm-9">
            <input type="text" name="v_city" class="form-control" value="<?= $user['v_city']; ?>" id="fax" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="v_zip" class="col-sm-2 control-label">Zip</label>

          <div class="col-sm-9">
            <input type="text" name="v_zip" class="form-control" value="<?= $user['v_zip']; ?>" id="airport" placeholder="">
          </div>
        </div>

           




              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>  

    </section> 
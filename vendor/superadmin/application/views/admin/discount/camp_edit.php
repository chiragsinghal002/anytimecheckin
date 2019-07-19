<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Campaing</h3>
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
           
            <?php echo form_open(base_url('admin/discount/edit/'.$camp['camp_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="camp_name" class="col-sm-2 control-label">Camp Name</label>

                <div class="col-sm-9">
                  <input type="text" name="camp_name" value="<?= $camp['camp_name']; ?>" class="form-control" id="camp_name" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="camp_status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($camp['camp_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($camp['camp_status'] == 0)?'selected': '' ?>>Inactive</option>
                  </select>
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
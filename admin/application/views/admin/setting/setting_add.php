<script src="<?php echo base_url('public/dist/ckeditor/ckeditor.js');?>"></script>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Setting</h3>
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
           
            <?php echo form_open(base_url('admin/setting/'), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="admin_name" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-9">
                  <input type="text" name="admin_name" value="<?= $pageview['admin_name']; ?>" class="form-control" id="admin_name" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="admin_email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="text" name="admin_email" value="<?= $pageview['admin_email']; ?>" class="form-control" id="admin_email" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="admin_discount" class="col-sm-2 control-label">Discount %</label>

                <div class="col-sm-9">
                  <input type="text" name="admin_discount" value="<?= $pageview['admin_discount']; ?>" class="form-control" id="admin_discount" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="admin_phone" class="col-sm-2 control-label">Phone</label>

                <div class="col-sm-9">
                  <input type="text" name="admin_phone" value="<?= $pageview['admin_phone']; ?>" class="form-control" id="admin_phone" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="page_title" class="col-sm-2 control-label">Locate</label>

                <div class="col-sm-9">
                  <input type="text" name="admin_locate" value="<?= $pageview['admin_locate']; ?>" class="form-control" id="admin_locate" placeholder="">
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
$(document).ready(function(){
var date_input=$('input[name="effective_From"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
date_input.datepicker({
format: 'mm/dd/yyyy',
container: container,
todayHighlight: true,
autoclose: true,
})
})
</script>

<script>
$(document).ready(function(){
var date_input=$('input[name="effective_to"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
date_input.datepicker({
format: 'mm/dd/yyyy',
container: container,
todayHighlight: true,
autoclose: true,
})
})
</script>
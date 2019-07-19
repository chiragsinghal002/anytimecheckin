<script src="<?php echo base_url('public/dist/ckeditor/ckeditor.js');?>"></script>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Page</h3>
          <div class="tt">
            <a href="<?= base_url('admin/page'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open(base_url('admin/page/edit/'.$pageview['page_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="page_title" class="col-sm-2 control-label">Title</label>

                <div class="col-sm-9">
                  <input type="text" name="page_title" value="<?= $pageview['page_title']; ?>" class="form-control" id="page_title" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="page_description" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-9">
                  <textarea name="page_description" rows="10" cols="20"><?= $pageview['page_description']; ?></textarea>
                </div>
              </div>
              <script>
                        CKEDITOR.replace( 'page_description' );
                        </script>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                 <select name="page_status" id="page_status" class="form-control">
                    
                    <option value="">Select</option>                    
                     <option value="1" <?= ($pageview['page_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($pageview['page_status'] == 0)?'selected': '' ?>>Inactive</option>
                    
                     
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php 
$base_url = '/new/image/';
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Facility</h3>
          <div class="tt">
            <a href="<?= base_url('admin/hotelfacilities'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open_multipart(base_url('admin/hotelfacilities/edit/'.$ad['facility_id']), 'class="form-horizontal needs-validation" novalidate' )?> 
              <div class="form-group">
                <label for="facility_name validationCustom100" class="col-sm-2 control-label">Facility Title</label>

                <div class="col-sm-9">
                  <input type="text" name="facility_name" value="<?= $ad['facility_name']; ?>" class="form-control" id="facility_name validationCustom100" required placeholder="">
				       <div class="invalid-feedback">
              Enter Facility Title
            </div>
                </div>
              </div>

              <!-- <div class="form-group">
                <label for="facility_name" class="col-sm-2 control-label">Facility Image</label>

                <div class="col-sm-9">
                   <input type="file" name="image[]" multiple="multiple" id="inputFile1" class="form-control" accept="image/*">
                   <?php 
                   if ($ad['image'] != '') {
                     ?>
                     <img src="<?= $base_url.$ad['image']; ?>" style="width: 70px;height: 70px;">
                     <?php
                   }
                   else{
                    
                   }
                   ?>
                  
                </div>
              </div> -->
              

              

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                 <select name="status" id="status" class="form-control">
                    
                    <option value="">Select</option>                    
                     <option value="1" <?= ($ad['status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($ad['status'] == 0)?'selected': '' ?>>Inactive</option>
                    
                     
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
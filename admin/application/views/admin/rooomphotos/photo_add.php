<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Room Photos</h3>
          <div class="tt">
            <a href="<?= base_url('admin/roomphotos/roomphoto_list'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open_multipart(base_url('admin/roomphotos/add'), 'class="form-horizontal needs-validation" novalidate');  ?> 
            
             <div class="form-group validationCustom100">
                <label for="role"  class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control" id="sel_city validationCustom100" required>
                    
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
                <label for="role validationCustom101" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <select name="room_id" class="form-control" id="sel_city validationCustom100" required>
                    
                    <option value="">Select Room</option>
                    <?php foreach($room_type as $room): 
                      // echo "<pre>";
                      // print_r($room);
                      ?>

                    <option value="<?= $room['room_type_id']; ?>"><?= $room['hotel_room_type']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
				   	     <div class="invalid-feedback">
              Enter Room Type
            </div>
                </div>
              </div>

             <div class="form-group">
                <label for="to_date validationCustom102" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-9">
                  <input type="file" name="userfile[]" multiple class="form-control" id="validationCustom102" required>
				  	   	     <div class="invalid-feedback">
              Enter Image
            </div>
                </div>
				
              </div>

              

              <div class="form-group">
                <label for="role validationCustom103" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="room_status" class="form-control" id="validationCustom103" required>
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
				  	  	   	     <div class="invalid-feedback">
              Select Status
            </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Submit" class="btn btn-info pull-right">
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

<!-- Script -->
 
  <script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // City change
    $('#sel_city').change(function(){
      var city = $(this).val();
     
      // AJAX request
      $.ajax({       
        url:'<?=base_url()?>admin/discount/discountrate',
        method: 'post',
        data: {city: city},
        dataType: 'json',
        success: function(response){
          alert(dataType);

          // Remove options 
          $('#sel_user').find('option').not(':first').remove();
          $('#sel_depart').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#sel_depart').append('<option value="'+data['room_type_id']+'">'+data['hotel_room_type']+'</option>');
          });
        }
     });
   });
 
   // Department change
   $('#sel_depart').change(function(){
     var department = $(this).val();

     // AJAX request
     $.ajax({
       url:'<?=base_url()?>index.php/User/getDepartmentUsers',
       method: 'post',
       data: {department: department},
       dataType: 'json',
       success: function(response){
 
         // Remove options
         $('#sel_user').find('option').not(':first').remove();

         // Add options
         $.each(response,function(index,data){
           $('#sel_user').append('<option value="'+data['id']+'">'+data['name']+'</option>');
         });
       }
    });
  });
 
 });
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
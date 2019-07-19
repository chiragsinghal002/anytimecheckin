<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Hotel Photos</h3>
           <div class="tt">
            <a href="<?= base_url('admin/hotels/hotelphoto_list'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open_multipart(base_url('admin/hotels/edithotelphoto'), 'class="form-horizontal needs-validation" novalidate' );  ?> 

            
            
            <input type="hidden" name="hotel_photo_id" value="<?php echo $roomphotodata[0]['hotel_photo_id']; ?>" />
             <div class="form-group">
                <label for="role validationCustom100" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">

                   <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
        
                  <select name="hotel_id" id="validationCustom100" required class="form-control" onchange="room_type(this.value)">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): 

                    ?>

                    <option <?php if($roomphotodata[0]['hotel_id']==$row['hotel_id']){ echo 'selected="selected"'; } ?> value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
				  
   	  	     <div class="invalid-feedback">
              Enter Hotel
            </div>
                  <?php } 
                  else{
                   ?>

                   <input type="hidden" name="hotel_id" value="<?php echo $roomphotodata[0]['hotel_id']; ?>" />

                   <?php 
                   // echo '<pre>';
                   // print_r($hotel_detail);
                   // foreach ($hotel_detail as $key) {
                     # code...
                  
                   ?>

                   <!-- <input type="text" name="hotel_id" value="<?php echo $key['hotel_name']; ?>" /> -->
                   <?php
                    // } 
                   ?>

                   <select  name="hotel_id" class="form-control act" onchange="room_type(this.value)" >
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): 

                    ?>

                    <option <?php if($roomphotodata[0]['hotel_id']==$row['hotel_id']){ echo 'selected="selected"'; } ?> value="<?= $row['hotel_id']; ?>" ><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                   <?php
                  }
                    ?>
                </div>
              </div>




              <!-- <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <select name="room_type_id" class="form-control" id="sel_rooms">
                    
                    <option value="">Select Room</option>
                    <?php foreach($room_type as $room): 
                      // echo "<pre>";
                      // print_r($room);
                      ?>

                    <option <?php if($roomphotodata[0]['room_type_id']==$room['room_type_id']){ echo 'selected="selected"'; } ?> value="<?= $room['room_type_id']; ?>"><?= $room['hotel_room_type']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div> -->

             <div class="form-group">
                <label for="to_date validationCustom101" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-9">
                  <input type="file" name="userfile[]" id="validationCustom100" required multiple="multiple" class="form-control" accept="image/*">
                  <span style="color: red;">Your image size should be (720 × 480 pixels)</span>
          <br />
          <?php 
          if(!empty($roomphotodata[0]['hotel_room_image']))
          {
        $room_photo=explode(",",$roomphotodata[0]['hotel_room_image']);

        foreach($room_photo as $room_photos)  
          { 
            // echo "<pre>";
            // print_r($room_photos);
          }
        
        $tt = count($room_photo);

        for ($i=0; $i <=$tt-1 ; $i++)
                {
                  $thumbimage=explode(".",$room_photo[$i]); 
                  $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];

       
          $j=1;
          // foreach($room_photo as $room_photos)  
          // { 
            ?>
            <img width="40px" src="/new/image/thumb/<?php echo $thumbimagefinal; ?>" />
            <a href="<?= base_url('admin/hotels/delperhotelphoto/'.$room_photos.'/'.$roomphotodata[0]['hotel_photo_id']); ?>" onclick="return confirm_alert(this);">[x]</a>
            |<?php if($j%10==0){
          echo "<br />";
          } 
          $j++; 
        }
          }       
        ?>    
				  
   	  	     <div class="invalid-feedback">
              Enter Image
                </div>
              </div>

              

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option <?php if($roomphotodata[0]['status']==1){ echo 'selected="selected"'; } ?> value="1">Active</option>
                    <option <?php if($roomphotodata[0]['status']==0){ echo 'selected="selected"'; } ?> value="0">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
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
                function confirm_alert(node) {
                 //function confirm_alert(id) {
                  //alert(id);
                  return confirm("Are You Sure You Want to delete this ?");
                                 

                }
              </script> 

<!-- <script>
$("#add_user").addClass('active');
function room_type(id){
$.ajax({
  url:'RoomTypeIdedit_ForHotelId',
  type:'GET',
  data:{'hotel_id':id},
  success:function(data){
    console.log(data);
    $("#sel_rooms").html(data);
  }
})
}
// alert('chirag');
</script> -->


<!-- <script>
$("#add_user").addClass('active');
</script>   -->

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

 <style type="text/css">
   select.form-control.act option {
    display: none;
}
 </style>
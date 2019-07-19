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
           
            <?php echo form_open_multipart(base_url('admin/roomphotos/editroomphoto'), 'class="form-horizontal"');  ?> 
            <input type="hidden" name="room_photo_id" value="<?php echo $roomphotodata[0]['room_photo_id']; ?>" />
             <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">

                   <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
				
                  <select name="hotel_id" class="form-control" id="hotel_id" onchange="room_type(this.value)" readonly>
                    
                    <!-- <option value="">Select Hotel</option> -->
                    <?php foreach($all_hotels as $row):
                      // echo "<pre>";
                      // print_r($row);
                     ?>

                    <option class="act" <?php if($roomphotodata[0]['hotel_id']==$row['hotel_id']){ echo 'selected="selected"'; } ?> value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                  <?php } 
                  else{
                   ?>
                    <select name="hotel_id" class="form-control act" id="hotel_id" onchange="room_type(this.value)" readonly>
                    
                    <!-- <option value="">Select Hotel</option> -->
                    <?php foreach($all_hotels as $row):
                      // echo "<pre>";
                      // print_r($row);
                     ?>

                    <option class="act" <?php if($roomphotodata[0]['hotel_id']==$row['hotel_id']){ echo 'selected="selected"'; } ?> value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                   <?php } ?>
                </div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <select name="room_id" class="form-control" id="sel_city" readonly>
                    
                    <!-- <option  value="">Select Room</option> -->
                    <?php foreach($room_type as $room): 
                      // echo "<pre>";
                      // print_r($room);
                      ?>

                    <option class="act" <?php if($roomphotodata[0]['room_id']==$room['room_type_id']){ echo 'selected="selected"'; } ?> value="<?= $room['room_type_id']; ?>"><?= $room['hotel_room_type']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

             <div class="form-group">
                <label for="to_date" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-9">
                  <input type="file" name="userfile[]" multiple="multiple" class="form-control" accept="image/*">
                  <span style="color: red;">Your image size should be (262 × 169 pixels)</span>
				  <br />
				  <?php	
				  if(!empty($roomphotodata[0]['room_photo']))
				  {
				$room_photo=explode(",",$roomphotodata[0]['room_photo']);
					$j=1;
					foreach($room_photo as $room_photos)	
					{ ?>
						<img width="40px" src="../../../../../image/<?= $room_photos; ?>" />
						<a href="<?= base_url('admin/roomphotos/delperroomphoto/'.$room_photos.'/'.$roomphotodata[0]['room_photo_id']); ?>" onclick="return confirm_alert(this);">[x]</a>
						|<?php if($j%10==0){
					echo "<br />";
					}	
					$j++;	
				}
				  }				
				?>		
                </div>
              </div>

              

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="room_status" class="form-control">
                    <option value="">Select Status</option>
                    <option <?php if($roomphotodata[0]['room_status']==1){ echo 'selected="selected"'; } ?> value="1">Active</option>
                    <option <?php if($roomphotodata[0]['room_status']==0){ echo 'selected="selected"'; } ?> value="0">Inactive</option>
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


              <style type="text/css">
   select.form-control option.act {
    display: none !important;
}


 </style>

<!-- <script>
$("#add_user").addClass('active');
function room_type(id){
  // alert(id);
  console.log(id);
$.ajax({
  url:'RoomTypeId_ForHotelId',
  type:'GET',
  data:{'hotel_id':id},
  success:function(data){
    console.log(data);
    $("#sel_city").html(data);
  }
})
}
// alert('chirag');
</script>  -->  



<!-- <script>
$("#add_user").addClass('active');
</script>   -->

<!-- Script -->
 
  <!-- <script type='text/javascript'>
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
 </script> -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Discount Rate</h3>
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
           
            <?php echo form_open(base_url('admin/discount/discountrate'), 'class="form-horizontal"');  ?> 
            <?php 
            $rand = rand(10,10000);
            ?>

<div class="form-group">
          <label for="role" class="col-sm-2 control-label">Select Hotel</label>

          <div class="col-sm-9">
            <select name="hotel_id" id="hotel_id" class="form-control" onchange="room_type(this.value)">
            <!-- <select name="hotel_id" id="hotel_id" class="form-control" onchange="hotel();"> -->
              <option value="">Select Hotel</option>

              <?php foreach($all_hotels as $row): ?>
                <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>


            <!--  <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control" id="sel_city">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>
 -->
               <div class="form-group">
          <label for="role" class="col-sm-2 control-label">Room Type</label>

          <div class="col-sm-9">
            <select name="room_type_id" class="form-control" id="sel_room">
              <option value="">Select Room Type</option>
              <?php foreach($room_types as $row): ?>
                <option value="<?= $row['room_type_id']; ?>"><?= $row['hotel_room_type']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>


             <!--  <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <select name="room_type_id" class="form-control" id='sel_depart'>
                     <option value="">Select Room</option>            
               
                  
                  </select>
                </div>
              </div> -->

              <div class="form-group">
          <label for="role" class="col-sm-2 control-label">Camp Name</label>

          <div class="col-sm-9">
            <select name="camp_id" class="form-control">
              <option value="">Select Camp</option>
              <?php foreach($all_camps as $row_camps): 
                // echo "<pre>";
                // print_r($row_camp['camp_name']);

                ?>
                <option value="<?php echo $row_camps['camp_id']?>"><?= $row_camps['camp_name']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>

              <div class="form-group">
                <label for="from_date" class="col-sm-2 control-label" >Type of Discount</label>

                <div class="col-sm-9">
                    <select name="discount_type" onchange="discounttype(this);" class="form-control">
                    <option value="">Select Discount</option>
                    <option value="1">Price Base</option>
                    <option value="2">% Base</option>
                  </select>
                </div>
                <br>

               <div id="ifYes" style="display: none;">
    <label for="Price Base">Price Base</label> <input type="text"  name="baseprice" /><br />
</div>
<div id="ifNo" style="display: none;">
    <label for="Percent Base">Percent Base</label> <input type="text"  name="baseprecent" /><br />
</div>
              </div>

              <div class="form-group">
                <!-- <label for="to_date" class="col-sm-2 control-label">Voucher</label> -->

                <div class="col-sm-9">
                  <input type="hidden" name="voucher_no" class="form-control" value="<?php echo $rand;?>" id="to_date" placeholder="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Discount For</label>

                <div class="col-sm-9">
                  <select name="discount_for" onchange="discountfor(this);" class="form-control">
                    <option value="">Select Discount</option>
                    <option value="1">Hourly</option>
                    <option value="2">Daily</option>
                  </select>
                </div>
                <br>
                <div id="ifHourly" style="display: none;">
    <label for="max_hour">Max. Hour</label> <input type="text"  name="max_hour" /><br />
    <label for="min_hour">Min. Hour</label> <input type="text" name="min_hour" /><br />
</div>
 <br>
<div id="ifDaily" style="display: none;">
    <label for="max_day">Max. Day</label> <input type="text" name="max_day" /><br />
    <label for="min_day">Min. Day</label> <input type="text" name="min_day" /><br />
</div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="camp_dr_status" class="form-control">
                   <!--  <option value="">Select Status</option> -->
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
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
function room_type(id){
  
$.ajax({
  url:'RoomTypeId_ForHotelId',
  type:'GET',
  data:{'hotel_id':id},
  success:function(data){
    // alert(data);
    $("#sel_room").html(data);
  }
})
}
// alert('chirag');
</script>    


<<!-- script>
$("#add_user").addClass('active');
</script>   -->

  <script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // City change
    $('#sel_city').change(function(){
      var city = $(this).val();
      //alert(city);
     
      // AJAX request
      $.ajax({       
       // url:'<?=base_url()?>admin/discount/discountrate',
       url:'discountrate',
        method: 'post',
        data: {city: city},
        dataType: 'json',
        success: function(response){
          //alert(response);

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

 <script>
    function discounttype(that) {
        if (that.value == "1") {
            //alert("check");
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    
    if (that.value == "2") {
           // alert("check");
            document.getElementById("ifNo").style.display = "block";
        } else {
            document.getElementById("ifNo").style.display = "none";
        }
    }
</script>

<script>
    function discountfor(that) {
        if (that.value == "1") {
            //alert("check");
            document.getElementById("ifHourly").style.display = "block";
        } else {
            document.getElementById("ifHourly").style.display = "none";
        }
    
    if (that.value == "2") {
           // alert("check");
            document.getElementById("ifDaily").style.display = "block";
        } else {
            document.getElementById("ifDaily").style.display = "none";
        }
    }
</script>
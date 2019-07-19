
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Discount Rate</h3>
          <div class="tt">
            <a href="<?= base_url('admin/discount/discountlist'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open(base_url('admin/discount/discountrate'), 'class="form-horizontal needs-validation" novalidate');  ?> 
            <?php 
            $rand = rand(10,10000);
            ?>

 <div class="form-group">

                <label for="role validationCustom01" class="col-sm-2 control-label">Hotel Name</label>



                <div class="col-sm-9">

                  <select name="hotel_id" class="form-control validationCustom01" id="hotel_id" required onchange="room_type(this.value)" >

                    

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

                <label for="role validationCustom02" class="col-sm-2 control-label">Room Type</label>



                <div class="col-sm-9">

                  <select name="room_type_id" required class="form-control validationCustom02" id="sel_city">

                    

                    <option value="">Select Room Type</option>

                    <?php foreach($room_type as $room): 

                      // echo "<pre>";

                      // print_r($room);

                      ?>



                    <!-- <option value="<?= $room['room_type_id']; ?>"><?= $room['hotel_room_type']; ?></option> -->

                      <?php endforeach; ?>

                    

                  </select>

                              <div class="invalid-feedback">

        Enter Room Type

      </div>

                </div>

              </div>


              <div class="form-group">
          <label for="role validationCustom03" class="col-sm-2 control-label">Camp Name</label>

          <div class="col-sm-9">
            <select name="camp_id" id="validationCustom03" required class="form-control">
              <option value="">Select Camp</option>
              <?php foreach($all_camps as $row_camps): 
                // echo "<pre>";
                // print_r($row_camp['camp_name']);

                ?>
                <option value="<?php echo $row_camps['camp_id']?>"><?= $row_camps['camp_name']; ?></option>
              <?php endforeach; ?>

            </select>
											        <div class="invalid-feedback">
        Enter Camp Name
      </div>
          </div>
        </div>

              <div class="form-group">
                <label for="from_date validationCustom04" class="col-sm-2 control-label" >Type of Discount</label>

                <div class="col-sm-9">
                    <select name="discount_type" id="validationCustom04" required onchange="discounttype(this);" class="form-control">
                    <option value="">Select Discount</option>
                    <option value="1">Price Base</option>
                    <option value="2">% Base</option>
                  </select>
				  										        <div class="invalid-feedback">
        Enter Type of Discount
      </div>
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
                <label for="role validationCustom05" class="col-sm-2 control-label">Discount For</label>

                <div class="col-sm-9">
                  <select name="discount_for" id="validationCustom05" required onchange="discountfor(this);" class="form-control">
                    <option value="">Select Discount</option>
                    <option value="1">Hourly</option>
                    <option value="2">Daily</option>
                  </select>
				                  </select>
				  										        <div class="invalid-feedback">
        Enter Discount For
      </div>
                </div>
                <br>
                <div id="ifHourly" style="display: none;">
    <label for="max_hour" style="display: none;">Max. Hour</label> <input type="text"  name="max_hour"  value="6" style="display: none;" /><br />

    <label for="min_hour">Min. Hour</label>
    <select name="min_hour">     
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
    </select>


     <!-- <input type="text" name="min_hour" /> -->
     <br />
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


<script>

$("#add_user").addClass('active');

function room_type(id){

  

$.ajax({

  url:'RoomTypeId_ForHotelId',

  type:'GET',

  data:{'hotel_id':id},

  success:function(data){

    // alert(data);

    $("#sel_city").html(data);

  }

})

}

// alert('chirag');

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
  
  div#ifHourly {
    float: left;
    margin-left: 130px;
    position: relative;
    top: 0px !important;
}
</style>
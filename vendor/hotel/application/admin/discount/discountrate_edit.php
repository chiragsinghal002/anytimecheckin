<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Discount Rate</h3>
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
           
            <?php echo form_open(base_url('admin/discount/editdiscountrate/'.$disrate['camp_dis_id']), 'class="form-horizontal"' )?>

            <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>" <?= ($disrate['hotel_id'] == $row['hotel_id'])?'selected': '' ?> ><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Room Type</label>

                <div class="col-sm-9">
                  <select name="room_type_id" class="form-control">
                    
                    <option value="">Select Room Type</option>
                    <?php foreach($room_types as $room_type): ?>

                    <option value="<?= $room_type['room_type_id']; ?>" <?= ($disrate['room_type_id'] == $room_type['room_type_id'])?'selected': '' ?> ><?= $room_type['hotel_room_type']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Camp</label>

                <div class="col-sm-9">
                  <select name="camp_id" class="form-control">
                    
                    <option value="">Select Camp</option>
                    <?php foreach($camp_list as $row_camp): 
                      // echo "<pre>";
                      // print_r($camp_list);
                      ?>

                    <option value="<?= $row_camp['camp_id']; ?>" <?= ($disrate['camp_id'] == $row_camp['camp_id'])?'selected': '' ?> ><?= $row_camp['camp_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

             <div class="form-group">
                <label for="from_date" class="col-sm-2 control-label" >Type of Discount</label>

                <div class="col-sm-9">
                    <select name="discount_type" id="<?php $disrate['discount_type'];?>" onchange="discounttype(this);" class="form-control">
                    <option value="">Select Discount</option>
                    <option value="1" <?= ($disrate['discount_type'] == 1)?'selected': '' ?> >Price Base</option>
                     <option value="2" <?= ($disrate['discount_type'] == 2)?'selected': '' ?> >% Base</option>
                   <!--  <option value="1">Price Base</option>
                    <option value="2">% Base</option> -->
                  </select>
                </div>
                <br>

               



<?php 
 if ($disrate['discount_type'] == 1) {

?>
               <div id="ifYes" style="display: show;">
    <label for="Price Base">Price Base</label> <input type="text"  name="baseprice"  value="<?php echo $disrate['discount_price'];?>" /><br />
</div>
<br>
<div id="ifNo" style="display: none;">
    <label for="Percent Base">Percent Base</label> <input type="text"  name="baseprecent" /><br />
</div>
<?php
 } 
 ?>
<?php 
if ($disrate['discount_type'] == 2) {

?>
<div id="ifNo" style="display: show;">
    <label for="Percent Base">Percent Base</label> <input type="text"  name="baseprecent" value="<?php echo $disrate['discount_percent'];?>" /><br />
</div>
<br>
 <div id="ifYes" style="display: none;">
    <label for="Price Base">Price Base</label> <input type="text"  name="baseprice" /><br />
</div>
<?php
  }
 ?>
              </div>

              <div class="form-group">
                <!-- <label for="to_date" class="col-sm-2 control-label">Voucher</label> -->

                <div class="col-sm-9">
                  <input type="hidden" name="voucher_no" class="form-control" value="<?php echo $disrate['voucher_no'];?>" placeholder="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Discount For</label>

                <div class="col-sm-9">
                  <select name="discount_for" onchange="discountfor(this);" class="form-control">
                    <option value="">Select Discount</option>
                    <option value="1" <?= ($disrate['discount_for'] == 1)?'selected': '' ?> >Hourly</option>
                    <option value="2" <?= ($disrate['discount_for'] == 2)?'selected': '' ?> >Daily</option>
                    <!-- <option value="1">Hourly</option>
                    <option value="2">Daily</option> -->
                  </select>
                </div>
                <br>


<?php 

if ($disrate['discount_for'] == 1) {

?>
 <div id="ifHourly" style="display: show;">
    <label for="max_hour">Max. Hour</label> <input type="text"  name="max_hour"  value="<?php echo $disrate['max_hour'];?>"/><br />
    <label for="min_hour">Min. Hour</label> <input type="text" name="min_hour" value="<?php echo $disrate['min_hour'];?>" /><br />
</div>
            <br>
<div id="ifDaily" style="display: none;">
    <label for="max_day">Max. Day</label> <input type="text" name="max_day" /><br />
    <label for="min_day">Min. Day</label> <input type="text" name="min_day" /><br />
</div>
<?php } ?>
<?php 
if ($disrate['discount_for'] == 2) {

?>
<div id="ifDaily" style="display: show;">
    <label for="max_day">Max. Day</label> <input type="text" name="max_day" value="<?php echo $disrate['max_day'];?>" /><br />
    <label for="min_day">Min. Day</label> <input type="text" name="min_day" value="<?php echo $disrate['min_day'];?>" /><br />
</div>
<br>
 <div id="ifHourly" style="display: none;">
    <label for="max_hour">Max. Hour</label> <input type="text"  name="max_hour" /><br />
    <label for="min_hour">Min. Hour</label> <input type="text" name="min_hour" /><br />
</div>
<?php }?>

               
 
              </div>

              


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="camp_date_status" class="form-control">
                    <!-- <option value="">Select Status</option> -->
                    <option value="1" <?= ($disrate['camp_dr_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($disrate['camp_dr_status'] == 0)?'selected': '' ?>>Inactive</option>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

<script type="text/javascript">
    $(function(){
      var date = new Date();
      var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      $('#from_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose:true,
        todayHighlight:true,
        startDate:today

      });
      // var dat=$('#check_in_date').val();
      // alert(dat);
      var date1 = new Date();
      $("#to_date").datepicker({
        format: 'dd-mm-yyyy',
        autoclose:true,
        startDate:date1
      })

      $(".check_in").timepicker();
      $(".check_out").timepicker();
    });
  </script>   


 <script>
    function discounttype(that) {
      //alert(this);
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
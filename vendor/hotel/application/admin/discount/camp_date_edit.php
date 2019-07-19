<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit User</h3>
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
           
            <?php echo form_open(base_url('admin/discount/editcampdate/'.$campdate['camp_date_id']), 'class="form-horizontal"' )?>

            <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>" <?= ($campdate['hotel_id'] == $row['hotel_id'])?'selected': '' ?> ><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Camp</label>

                <div class="col-sm-9">
                  <select name="camp_id" class="form-control">
                    
                    <option value="">Select Camp</option>
                    <?php foreach($camp_list as $row_camp): ?>

                    <option value="<?= $row_camp['camp_id']; ?>" <?= ($campdate['camp_id'] == $row_camp['camp_id'])?'selected': '' ?> ><?= $row_camp['camp_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="from_date" class="col-sm-2 control-label">From Date</label>

                <div class="col-sm-9">
                  <input type="text" name="from_date" value="<?= $campdate['from_date']; ?>" class="form-control" id="from_date" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="to_date" class="col-sm-2 control-label">To Date</label>

                <div class="col-sm-9">
                  <input type="text" name="to_date" value="<?= $campdate['to_date']; ?>" class="form-control" id="to_date" placeholder="">
                </div>
              </div>
              


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="camp_date_status" class="form-control">
                    <!-- <option value="">Select Status</option> -->
                    <option value="1" <?= ($campdate['camp_date_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($campdate['camp_date_status'] == 0)?'selected': '' ?>>Inactive</option>
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
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Date Campaning</h3>
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
           
            <?php echo form_open(base_url('admin/discount/datecampaingadd'), 'class="form-horizontal"');  ?> 

             <div class="form-group">
                <label for="role" class="col-sm-2 control-label"><?php //echo $lang['form_hotel'];?> Hotel Name</label>

                <div class="col-sm-9">
                  <select name="hotel_id" class="form-control">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>


              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Camp Name</label>

                <div class="col-sm-9">
                  <select name="camp_id" class="form-control">
                    
                    <option value="">Select Camp</option>
                    <?php foreach($all_camps as $row_camp): ?>

                    <option value="<?= $row_camp['camp_id']; ?>"><?= $row_camp['camp_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="from_date" class="col-sm-2 control-label">From Date</label>

                <div class="col-sm-9">
                  <input type="date" name="from_date" class="form-control" id="from_date" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="to_date" class="col-sm-2 control-label">To Date</label>

                <div class="col-sm-9">
                  <input type="date" name="to_date" class="form-control" id="to_date" placeholder="">
                </div>
              </div>



              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="camp_date_status" class="form-control">
                    <option value="">Select Status</option>
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
</script>    
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Hotel</h3>
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
           
            <?php echo form_open(base_url('admin/hotels/view/'.$hotel['hotel_id']), 'class="form-horizontal"' )?>

            <?php 
            // echo'<pre>';
            // print_r($hotel); 
            ?> 
              <div class="form-group">
                <label for="hotel_name" class="col-sm-2 control-label">Name of the Hotel *</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="hotel_name" value="<?= $hotel['hotel_name']; ?>" class="form-control" id="hotel_name" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="hotel_email" class="col-sm-2 control-label">Hotel Email *</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="hotel_email" value="<?= $hotel['hotel_email']; ?>" class="form-control" id="hotel_email" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_address" class="col-sm-2 control-label">Hotel Address</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="hotel_address" value="<?= $hotel['hotel_address']; ?>" class="form-control" id="hotel_address" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Country</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="hotel_country" value="<?= $hotel['hotel_country']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">State</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="hotel_state" value="<?= $hotel['hotel_state']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">City</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="city" value="<?= $hotel['hotel_city']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="pincode" class="col-sm-2 control-label">Pin Code</label>

                <div class="col-sm-9">
                  <input type="number" readonly="readonly" name="pincode" value="<?= $hotel['hotel_pin_code']; ?>" class="form-control" id="pincode" placeholder="">
                </div>
              </div>
              

              <div class="form-group">
                <label for="website" class="col-sm-2 control-label">Website</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="website" class="form-control" value="<?= $hotel['hotel_website']; ?>" id="website" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Mobile No.</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="mobile_no" class="form-control" value="<?= $hotel['hotel_mobile']; ?>" id="mobile_no" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="telephone" class="col-sm-2 control-label">Telephone No *</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="telephone" class="form-control" value="<?= $hotel['hotel_telephone']; ?>" id="telephone" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="fax" class="col-sm-2 control-label">Fax No</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="fax" class="form-control" value="<?= $hotel['hotel_fax']; ?>" id="fax" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="airport" class="col-sm-2 control-label">Nearest Airport</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="airport" class="form-control" value="<?= $hotel['hotel_airport']; ?>" id="airport" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Star Category</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="star_category" class="form-control" value="<?= $hotel['hotel_star_category']; ?>" id="star_category" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Hotel Description</label>

                <div class="col-sm-9">
                  <textarea readonly="readonly" name="description" rows="10" cols="10"  class="form-control" id="description"><?php echo $hotel['hotel_description']; ?></textarea>
                  <!-- <input type="text" name="description" class="form-control" id="description" placeholder=""> -->
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Any</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="any" value="<?= $hotel['any']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Check In</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="check_in" value="<?= $hotel['check_in']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Check Out</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="check_out" value="<?= $hotel['check_out']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Minimum Hour</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="min_hour" value="<?= $hotel['min_hour']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Maximum Hour</label>

                <div class="col-sm-9">
                  <input type="text" readonly="readonly" name="max_hour" value="<?= $hotel['max_hour']; ?>" class="form-control" id="city" placeholder="">
                </div>
              </div>

             <!--  <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                </div>
              </div> -->
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 
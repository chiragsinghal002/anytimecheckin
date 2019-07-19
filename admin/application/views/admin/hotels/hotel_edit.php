<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Hotel</h3>
          <div class="tt">
            <a href="<?= base_url('admin/hotels'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open(base_url('admin/hotels/edit/'.$hotel['hotel_id']), 'class="form-horizontal needs-validation" id="myform" novalidate' )?> 
              <div class="form-group">
                <label for="hotel_name validationCustom100" class="col-sm-2 control-label">Name of the Hotel *</label>

                <div class="col-sm-9">
                  <input required="required" type="text" name="hotel_name" value="<?= $hotel['hotel_name']; ?>" class="form-control" id="hotel_name validationCustom100" required placeholder="">
				  
   	  	     <div class="invalid-feedback">
              Enter Name of the Hotel
            </div>
                </div>
              </div>
              <div class="form-group">
                <label for="hotel_email validationCustom101" class="col-sm-2 control-label">Hotel Email *</label>

                <div class="col-sm-9">
                  <input  required="required"  type="email" name="hotel_email" value="<?= $hotel['hotel_email']; ?>" class="form-control" id="hotel_email validationCustom101" required placeholder="">
				     <div class="invalid-feedback">
              Enter Hotel Email
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_address validationCustom102" class="col-sm-2 control-label">Hotel Address</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_address" value="<?= $hotel['hotel_address']; ?>" class="form-control" id="hotel_address validationCustom102" required placeholder="">
				       <div class="invalid-feedback">
              Enter Hotel Address
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="email validationCustom103" class="col-sm-2 control-label">City</label>

                <div class="col-sm-9">
                  <input type="text" name="city" value="<?= $hotel['hotel_city']; ?>" class="form-control" id="city validationCustom103" required placeholder="">
				  	       <div class="invalid-feedback">
              Enter City
            </div>
                </div>
              </div>
              <div class="form-group">
                <label for="pincode validationCustom104" class="col-sm-2 control-label">Pin Code</label>

                <div class="col-sm-9">
                  <input type="number" name="pincode" value="<?= $hotel['hotel_pin_code']; ?>" class="form-control " id="pincode validationCustom103" required placeholder="">
				  	  	       <div class="invalid-feedback">
              Enter Pin Code
            </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="website validationCustom105" class="col-sm-2 control-label">Website</label>

                <div class="col-sm-9">
                  <input type="text" name="website" class="form-control" value="<?= $hotel['hotel_website']; ?>" id="website validationCustom104" required placeholder="">
				  	  	  	       <div class="invalid-feedback">
              Enter Website
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="mobile_no validationCustom106" class="col-sm-2 control-label">Mobile No.</label>

                <div class="col-sm-9">
                  <input type="text" name="mobile_no" class="form-control" value="<?= $hotel['hotel_mobile']; ?>" id="mobile_no validationCustom106" required placeholder="">
				  	  	  	       <div class="invalid-feedback">
              Enter Mobile No.
            </div>
                </div>
              </div>
              <div class="form-group">
                <label for="telephone validationCustom107" class="col-sm-2 control-label">Telephone No *</label>

                <div class="col-sm-9">
                  <input  required="required"  type="tel" name="telephone" class="form-control" value="<?= $hotel['hotel_telephone']; ?>" id="telephone validationCustom107" required placeholder="">
				  		  	  	  	       <div class="invalid-feedback">
              Enter Telephone No 
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="fax validationCustom108" class="col-sm-2 control-label">Fax No</label>

                <div class="col-sm-9">
                  <input type="text" name="fax" class="form-control" value="<?= $hotel['hotel_fax']; ?>" id="fax validationCustom107"  required placeholder="">
				  	  		  	  	  	       <div class="invalid-feedback">
              Enter Fax No 
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="airport validationCustom109" class="col-sm-2 control-label">Nearest Airport</label>

                <div class="col-sm-9">
                  <input type="text" name="airport" class="form-control" value="<?= $hotel['hotel_airport']; ?>" id="airport validationCustom108" required placeholder="">
				  	  	  		  	  	  	       <div class="invalid-feedback">
              Enter Nearest Airport
            </div>
                </div>
              </div>

              <div class="form-group">
                <label for="star_category validationCustom110" class="col-sm-2 control-label">Star Category</label>

                <div class="col-sm-9">
                  <input type="text" name="star_category" class="form-control" value="<?= $hotel['hotel_star_category']; ?>" id="star_category validationCustom110" required placeholder="">
				    	  	  		  	  	  	       <div class="invalid-feedback">
              Enter Star Category
            </div>
                </div>
              </div>

               <div class="form-group">
                <label for="description validationCustom110" class="col-sm-2 control-label">Hotel Description</label>

                <div class="col-sm-9">
                  <textarea name="description" rows="10" cols="10"  class="form-control" id="description validationCustom110 " required><?php echo $hotel['hotel_description']; ?></textarea>
				  	    	  	  		  	  	  	       <div class="invalid-feedback">
              Enter Hotel Description
            </div>
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
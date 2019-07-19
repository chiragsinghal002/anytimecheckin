  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Room Type</h3>
           <div class="tt">
            <a href="<?= base_url('admin/rooms/roomtype'); ?>" class="btn btn-info btn-flat"><< Back</a>
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
           
            <?php echo form_open(base_url('admin/rooms/addroomtype'), 'class="form-horizontal needs-validation" novalidate');  ?> 
              <div class="form-group">
                <label for="role validationCustom01" class="col-sm-2 control-label">Hotel *</label>

                <div class="col-sm-9">
                  <select name="hotel_id" id="validationCustom01" required class="form-control">
                    
                    <option value="">Select Hotel</option>
                    <?php foreach($all_hotels as $row): ?>

                    <option value="<?= $row['hotel_id']; ?>"><?= $row['hotel_name']; ?></option>
                      <?php endforeach; ?>
                    
                  </select>
				  		        <div class="invalid-feedback">
        Enter Hotel
      </div>
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_room_type validationCustom02" class="col-sm-2 control-label">Room Type *</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_room_type" class="form-control" id="hotel_room_type validationCustom02" required placeholder="">
				  			  		        <div class="invalid-feedback">
        Enter Room Type
      </div>
                </div>
              </div>     
               <div class="form-group">
                <label for="hotel_room_type validationCustom02" class="col-sm-2 control-label">No of Rooms(Day)*</label>

                <div class="col-sm-9">
                  <input type="number" name="no_of_rooms" class="form-control" id="hotel_room_type validationCustom25" required placeholder="">
                              <div class="invalid-feedback">
        Enter no of rooms for day
      </div>
                </div>
              </div> 
               <div class="form-group">
                <label for="hotel_room_type validationCustom40" class="col-sm-2 control-label">No of Rooms(Hour)*</label>

                <div class="col-sm-9">
                  <input type="number" name="no_of_rooms_hour" class="form-control" id="hotel_room_type validationCustom45" required placeholder="">
                              <div class="invalid-feedback">
        Enter no of rooms for hour
      </div>
                </div>
              </div>           

               <div class="form-group">
                <label for="hotel_room_type validationCustom03 " class="col-sm-2 control-label">Price (RM) *</label>

                <div class="col-sm-4">
                  <input type="number" name="hours_price" class="form-control" id="hotel_room_type validationCustom03" required placeholder="hourly price">
				  		        <div class="invalid-feedback">
        Enter Price (RM)
      </div>
                </div>
               
                <div class="col-sm-4">
                  <input type="number" name="day_price" class="form-control" id="hotel_room_type validationCustom03" required placeholder="day price">
				  			  		        <div class="invalid-feedback">
        Enter Price (RM)
      </div>
                </div>
              </div>

              

              <div class="form-group validationCustom04">
                <label for="hotel_facilities" class="col-sm-2 control-label">Facilities</label>
                

                <div class="col-sm-9">
                  <?php foreach($vendor_facility as $ven_fac){
                    ?>
                     <input type="checkbox" name="vendor_facility[]"  value="<?php echo $ven_fac['facility_id'];?>"><?php echo $ven_fac['facility_name'];?><br>
					 			  		  			  		       
                

                    <?php
                  }
                  ?>
	 
                 
                </div>
              </div>
			   <div class="invalid-feedback">
        Enter Facilities
      </div>


               <div class="form-group">
                <label for="hotel_room_type validationCustom04" class="col-sm-2 control-label">Capacity *</label>

                <div class="col-sm-4">
                  <select name="adult_person_capacity" id="validationCustom04" required class="form-control">
                    
                    <option value="">Select Adult</option>                    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                     
                  </select>
				  				 			  		  			  		        <div class="invalid-feedback">
        Enter Capacity
      </div>
                </div>
               
                <div class="col-sm-4">
                  <select name="child_capacity" id="validationCustom04" required class="form-control">
                    
                    <option value="">Select Child</option>                    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                     
                  </select>
				   <div class="invalid-feedback">
        Enter Capacity
      </div>
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_facilities validationCustom05" class="col-sm-2 control-label">Description *</label>
                

                <div class="col-sm-9">
                  <textarea rows="10" cols="10" name="description" id="validationCustom05" required class="form-control"></textarea>
			   <div class="invalid-feedback">
        Enter Description
      </div>                 
                </div>
              </div>
             
       
              
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Submit" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 


<script>
$("#add_user").addClass('active');
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
  textarea.text {
    margin: 0px;
    width: 654px;
    height: 139px;
    z-index: auto;
    position: relative;
    line-height: 18.5714px;
    font-size: 13px;
    transition: none 0s ease 0s;
    background: transparent !important;
}
</style>  
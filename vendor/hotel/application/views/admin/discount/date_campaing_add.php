  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<section class="content">

  <div class="row">

    <div class="col-md-12">

      <div class="box">

        <div class="box-header with-border">

          <h3 class="box-title">Add Date Campaign</h3>
           <div class="tt">
            <a href="<?= base_url('admin/discount/campingdate'); ?>" class="btn btn-info btn-flat"><< Back</a>
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

           

            <?php echo form_open(base_url('admin/discount/datecampaingadd'), 'class="form-horizontal needs-validation " novalidate');  ?> 



             <div class="form-group">

                <label for="role validationCustom01" class="col-sm-2 control-label"><?php //echo $lang['form_hotel'];?> Hotel Name</label>



                <div class="col-sm-9">

                  <select name="hotel_id" class="form-control" id="validationCustom01" required>

                    

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

                <label for="role validationCustom01" class="col-sm-2 control-label">Camp Name</label>



                <div class="col-sm-9">

                  <select name="camp_id" class="form-control" id="validationCustom01" required>

                    

                    <option value="">Select Camp</option>

                    <?php foreach($all_camps as $row_camp): ?>



                    <option value="<?= $row_camp['camp_id']; ?>"><?= $row_camp['camp_name']; ?></option>

                      <?php endforeach; ?>

                    

                  </select>

				  			  			        <div class="invalid-feedback">

        Enter Camp Name

      </div>

                </div>

              </div>



              <div class="form-group">

                <label for="from_date validationCustom03" class="col-sm-2 control-label">From Date</label>



                <div class="col-sm-9">

                  <input type="text" name="from_date" class="form-control from_date" id="validationCustom03" required placeholder="dd-mm-yyyy">

				  				  			  			        <div class="invalid-feedback">

        Enter From Date

      </div>

                </div>

              </div>



              <div class="form-group">

                <label for="to_date validationCustom04" class="col-sm-2 control-label">To Date</label>



                <div class="col-sm-9">

                  <input type="text" name="to_date" class="form-control to_date" id="validationCustom04" required placeholder="dd-mm-yyyy">

				  			  				  			  			        <div class="invalid-feedback">

        Enter To Date

      </div>

                </div>

              </div>







              <div class="form-group">

                <label for="role" class="col-sm-2 control-label">Status</label>



                <div class="col-sm-9">

                  <select name="camp_date_status" class="form-control">

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

</script>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">



<script type="text/javascript">

    $(function(){

      var date = new Date();

      var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

      var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

      $('.from_date').datepicker({

        format: 'dd-mm-yyyy',

        autoclose:true,

        todayHighlight:true,

        startDate:today



      });

      // var dat=$('#check_in_date').val();

      // alert(dat);

      var date1 = new Date();

      $(".to_date").datepicker({

        format: 'dd-mm-yyyy',

        autoclose:true,

        startDate:date1

      })



      $(".check_in").timepicker();

      $(".check_out").timepicker();

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<section class="content">

  <div class="row">

    <div class="col-md-12">

      <div class="box">

        <div class="box-header with-border">

          <h3 class="box-title">Add Campaign</h3>
          <div class="tt">
            <a href="<?= base_url('admin/discount'); ?>" class="btn btn-info btn-flat"><< Back</a>
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

           

            <?php echo form_open(base_url('admin/discount/add'), 'class="form-horizontal needs-validation" novalidate');  ?> 



             

              <div class="form-group">

                <label for="campname validationCustom01" class="col-sm-2 control-label">Campaigning Name</label>



                <div class="col-sm-9">

                  <input type="text" name="camp_name" class="form-control" id="campname validationCustom01" required placeholder="">

				  		        <div class="invalid-feedback">

        Enter Campaigning Name

      </div>

            

                </div>

              </div>



              



              <div class="form-group">

                <label for="role" class="col-sm-2 control-label">Status</label>



                <div class="col-sm-9">

                  <select name="camp_status" class="form-control">

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



<script>

$("#add_user").addClass('active');

</script>    
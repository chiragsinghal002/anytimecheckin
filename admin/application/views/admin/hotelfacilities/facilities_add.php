<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//<a href="https://www.jqueryscript.net/tags.php?/map/">map</a>s.google.com/maps/api/js?sensor=false&libraries=places"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="../../locationpicker.jquery.min.js"></script>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Facility</h3>
          <div class="tt">
            <a href="<?= base_url('admin/hotelfacilities'); ?>" class="btn btn-info btn-flat"><< Back</a>
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

                      
            <?php echo form_open_multipart(base_url('admin/hotelfacilities/add'), 'class="form-horizontal needs-validation" novalidate' );  ?> 
              <div class="form-group">
                <label for="ad_name validationCustom100" class="col-sm-2 control-label">Facility Title</label>

                <div class="col-sm-9">
                  <input type="text" name="facility_name" class="form-control" id="ad_name validationCustom100" required placeholder="">
				  	     <div class="invalid-feedback">
              Enter Facility Title
            </div>
                </div>
              </div>

              <!--  <div class="form-group">
               

                <div class="col-sm-9">
                  <input type="hidden" name="banner" value="<?= base_url()?>/public/dist/img/user2-160x160.jpg" class="form-control" id="banner" placeholder="">
                </div>
              </div> -->

              

             
<!-- 
              <div class="form-group">
                <label for="to_date" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-9 gallery">
                  <input type="file" name="image[]" multiple="multiple" id="inputFile1" class="form-control" accept="image/*">
                </div>
              </div> -->

             <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" id="status" class="form-control">
                    
                   <!--  <option value="">Select</option> -->                    
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                    
                     
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
<script>
$(document).ready(function() {
    $("input[name$='cars']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Cars" + test).show();
    });
});
$('#example').locationpicker({
  location: {latitude: 46.15242437752303, longitude: 2.7470703125}
});

</script>
<script type="text/javascript">
  $('#example').locationpicker({

  // these are default options
  location: {
    latitude: 40.7324319,
    longitude: -73.82480799999996
  },
  locationName: "",
  radius: 500,
  zoom: 15,
  scrollwheel: true,
  inputBinding: {
      latitudeInput: null,
      longitudeInput: null,
      radiusInput: null,
      locationNameInput: null
  },
  enable<a href="https://www.jqueryscript.net/tags.php?/autocomplete/">Autocomplete</a>: false,
  enableAutocompleteBlur: false,
  enableReverseGeocode: true,
  draggable: true,
  // must be undefined to use the default gMaps marker
  markerIcon: undefined
  
});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
$(document).ready(function(){
var date_input=$('input[name="effective_From"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
date_input.datepicker({
format: 'yyyy-mm-dd',
container: container,
todayHighlight: true,
autoclose: true,
})
})
</script>

<script>
$(document).ready(function(){
var date_input=$('input[name="effective_to"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
date_input.datepicker({
format: 'yyyy-mm-dd',
container: container,
todayHighlight: true,
autoclose: true,
})
})
</script>

<!------------------------->
<script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#inputFile').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
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
<style>
.gallery img {
    width: 150px;
    padding: 0px 12px;
}
</style>

<!---------------------------->


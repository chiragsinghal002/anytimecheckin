<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//<a href="https://www.jqueryscript.net/tags.php?/map/">map</a>s.google.com/maps/api/js?sensor=false&libraries=places"></script>
<script src="../../locationpicker.jquery.min.js"></script>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Hotel</h3>
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

                      
            <?php echo form_open(base_url('admin/hotels/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="hotel_name" class="col-sm-2 control-label">Name of the Hotel *</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_name" class="form-control" id="hotel_name" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="hotel_email" class="col-sm-2 control-label">Hotel Email *</label>

                <div class="col-sm-9">
                  <input type="email" name="hotel_email" class="form-control" id="hotel_email" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="hotel_address" class="col-sm-2 control-label">Address</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_address" class="form-control" id="hotel_address" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="city" class="col-sm-2 control-label">City *</label>

                <div class="col-sm-9">
                  <input type="text" name="city" class="form-control" id="city" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="pincode" class="col-sm-2 control-label">Pin Code *</label>

                <div class="col-sm-9">
                  <input type="text" name="pincode" class="form-control" id="pincode" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="website" class="col-sm-2 control-label">Website</label>

                <div class="col-sm-9">
                  <input type="url" name="website" class="form-control" id="website" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Mobile No.</label>

                <div class="col-sm-9">
                  <input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="telephone" class="col-sm-2 control-label">Telephone No *</label>

                <div class="col-sm-9">
                  <input type="number" name="telephone" class="form-control" id="telephone" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="fax" class="col-sm-2 control-label">Fax No</label>

                <div class="col-sm-9">
                  <input type="text" name="fax" class="form-control" id="fax" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="airport" class="col-sm-2 control-label">Nearest Airport</label>

                <div class="col-sm-9">
                  <input type="text" name="airport" class="form-control" id="airport" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Star Category</label>

                <div class="col-sm-9">
                  <input type="text" name="star_category" class="form-control" id="star_category" placeholder="">
                </div>
              </div>

               <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Hotel Description</label>

                <div class="col-sm-9">
                  <textarea name="description" rows="10" cols="10" class="form-control" id="description"></textarea>
                  <!-- <input type="text" name="description" class="form-control" id="description" placeholder=""> -->
                </div>
              </div>



        <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Any Time</label>

                <div class="col-sm-9">
                  <div id="myRadioGroup">
    Yes<input type="radio" name="cars" checked="checked" value="1"  />
    No<input type="radio" name="cars" value="3" />

    <div id="Cars2" class="desc">
       
        </div>
    <div id="Cars3" class="desc" style="display: none;">
        <input type="text" name="check_in" id="star_category" placeholder="check in">
        <input type="text" name="check_out"  id="star_category" placeholder="check out">
    </div>
</div>
                </div>
              </div>

              <div class="form-group">
                <label for="star_category" class="col-sm-2 control-label">Location</label>

                <div class="col-sm-9">
                  <input type="text" name="hotel_location" class="form-control" id="star_category" placeholder="">
                  <button>GET IT</button>
                </div>
              </div>
              <div id="example"></div>
      
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Minimum Hour</label>

                <div class="col-sm-9">
                  <select name="mini_hour" id="text1" class="form-control">
                    
                    <option value="">Select</option>                    
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
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Maximum Hour</label>

                <div class="col-sm-9">
                  <select name="max_hour" id="text2" class="form-control">
                    
                    <option value="">Select</option>                    
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
                </div>
              </div>


             
              
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Hotel" class="btn btn-info pull-right">
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


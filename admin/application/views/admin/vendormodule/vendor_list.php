 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Vendor
<!-- <td class="text-left"><a href="<?= base_url('admin/vendormodule/add'); ?>" class="btn btn-info btn-flat" style="left: 75em;position: relative; right: 0px;">Add User</a></td> -->
      </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <form method="get" class="grid-user" action="<?= base_url('admin/vendormodule/'); ?>">
            <input type="text" name="first_name" class="users"  value="<?php if(!empty($_GET['first_name'])){ echo $_GET['first_name']; } ?>" placeholder="Please enter first name" />
            <input type="email" name="email"  class="users"  value="<?php if(!empty($_GET['email'])){ echo $_GET['email']; } ?>" placeholder="Please enter email" />
            <input type="text" name="mobile" class="users"  value="<?php if(!empty($_GET['mobile'])){ echo $_GET['mobile']; } ?>" placeholder="Please enter mobile" />
           
            <select name="status" style="width: 100%;margin-bottom: 12px;">
                <option value="">Select</option>
                <option value="0" <?php if($_GET['status']!="" && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>Pending</option>
                <option value="1" <?php if($_GET['status']!="" && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Approved</option>
                 <option value="2" <?php if($_GET['status']!="" && $_GET['status']=="2"){ echo "selected='selected'"; } ?>>Blocked</option>
            </select>
            <input type="submit" name="submit" value="Search" / class="user-button">
			         <a href="<?= base_url('admin/vendormodule/'); ?>" class="user-button">Reset</a>
         </form>

      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Address</th>
          <th>Registred Date</th>
          <th>Referral Code</th>
          <th>Status</th>
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php $i=1;
           foreach($all_vendor as $row): 
            // echo "<pre>";
            // print_r($row);
            ?>
          <tr style="width: 10px;">
            <td><?= $i++; ?></td>
            <td><?= $row['v_fname']; ?></td>
            <td><?= $row['v_lname']; ?></td>
            <td ><?= $row['v_email']; ?></td>
            <td><?= $row['v_mob']; ?></td>
            <td><?= $row['v_address']; ?></td>
            <td><?php 
            $registre_date=date('d-m-Y',strtotime($row['created']));
             $register_date1 = $registre_date;

            echo $register_date1; ?></td>

            <td><?= $row['v_referral']; ?></td>
             <!-- <td><?= ($row['status'] == 1)?'Approved':'Pending'; ?></td> -->

              <?php 
                if ($row['status'] == 0) {
                  ?>
                  <td>
             <select name="status" class="colorselector">
                <option value="<?php echo $row['v_id']; ?>" <?= ($row['status'] == 1)?'selected': '' ?> >Approve</option>
               <!--  <option value="2" <?= ($row['status'] == 2)?'selected': '' ?>>Blocked</option> -->
                <option value="0" <?= ($row['status'] == 0)?'selected': '' ?>>Pending</option>            

             </select>
             <span id="alotresult<?php echo $row['status']; ?>"></span>

              <?php 
           if ($row['status'] == '0') {
            ?>
            <!-- <div class="output"> -->
  <div id="<?php echo $row['v_id']; ?>" class="colors red"> 
   <?php echo form_open_multipart(base_url('admin/vendormodule/referral'), 'class="form-horizontal"');  ?> 
            
              <div class="form-group Referral">
                <label for="v_referral" class="">Referral Code</label>

                <div class="col-sm-12">
                  <input type="hidden" name="v_id" class="form-control" id="v_id" value="<?php echo $row['v_id']; ?>" placeholder="">

                  <input type="hidden" name="v_email" class="form-control" id="v_email" value="<?php echo $row['v_email']; ?>" placeholder="">

                  <input type="hidden" name="v_fname" class="form-control" id="v_fname" value="<?php echo $row['v_fname']; ?>" placeholder="">
                  <input type="hidden" name="v_lname" class="form-control" id="v_lname" value="<?php echo $row['v_lname']; ?>" placeholder="">

                  <input type="text" name="v_referral" class="form-control" id="v_referral" placeholder="" required="required">

                  <!-- <?= form_input(['name'=>'v_referral','class'=>'form-control','id'=>'v_referral','placeholder'=>'']);?> -->
                </div>
              </div><br>

               <div class="form-group">
                <div class="col-md-12 aren">
                  <input type="submit" name="submit" value="Submit" class="btn btn-info pull-left refrealmode">
                </div>
              </div>
            <?php echo form_close( ); ?>

  </div>
<!--  
</div> -->

            <?php
           }
           ?>

           </td>
                  <?php
                }
                else{
                  ?>               

              <td>
             <select name="status"  id="alot<?php echo $row['v_id']; ?>" onChange="return alot(<?php echo $row['v_id']; ?>);">
                <option value="1" <?= ($row['status'] == 1)?'selected': '' ?> >Approve</option>
                <option value="2" <?= ($row['status'] == 2)?'selected': '' ?>>Blocked</option>

                <?php 
                if ($row['status'] == 0) {
                  ?>
                  <option value="0" <?= ($row['status'] == 0)?'selected': '' ?>>Pending</option>
                  <?php 
                }
                ?>
                


             </select>
             <span id="alotresult<?php echo $row['status']; ?>"></span>
           </td>

           <?php } ?>
          
           

            

            <td class="text-right">
                 <a href="<?= base_url('admin/vendormodule/edit/'.$row['v_id']); ?>" class="btn btn-info btn-flat">Edit</a><br>
              <a href="<?= base_url('admin/vendormodule/vendorprofile/'.$row['v_id']); ?>" class="btn btn-info btn-flat">View Profile</a><br>
              <a href="<?= base_url('admin/hotels/vendorhotels/'.$row['v_id']); ?>" class="btn btn-info btn-flat">View Hotels</a><br>
             
            </td>
          </tr>
          <?php endforeach; ?>

        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $(function() {
  $('.colorselector').change(function(){
    $('.colors').hide();
    $('#' + $(this).val()).show();
  });
});
// [forked from](http://jsfiddle.net/FvMYz/)
// [show-hide-based-on-select-option-jquery)(http://stackoverflow.com/questions/2975521/show-hide-div-based-on-select-option-jquery/2975565#2975565)
</script>

<style type="text/css">
    
    /* https://gist.github.com/toddparker/32fc9647ecc56ef2b38a */



.output {
  margin: 0 auto;
  padding: 1em; 
}
.colors {
  padding: 2em;
  color: #fff;
  display: none;
}
.form-group.Referral input#v_referral {
    width: 216%;
    height: 25px;
    border-radius: 0px;
}
/*.red {
  background: #c04;
} */

@media (min-width: 768px)
.col-sm-9 {

    width: 75%;
    margin-bottom: 9px;
    
}

  .form-group.Referral  {
    color: #928f8f !important;
}
.user-button {
    background: #5bc0de;
    padding: 2px 20px;
    color: #ffff;
    border: none;
	    margin-bottom: 12px;
}
.users {
    margin: 0px 7px 10px 0;
}
</style>


<script>
  $(function () {
    $("#example1").DataTable();
  });
</script> 
<script>
$("#view_users").addClass('active');
</script> 


<style type="text/css">

</style>

<script type="text/javascript">
                function confirm_alert(node) {
                  return confirm("Are You Sure Want to Delete this ?");
                }
              </script>  

               <!---------------------- alot salesperson --------------------------->
           <script type="text/javascript">
                  function alot(id)
                  {
                  
                     //var id=id;                    
                     var alot=document.getElementById("alot"+id).value;

                    //   var xhttp = new XMLHttpRequest();
                    //alert(alot);
                      
                     var dataString="vendormodule/activatevendor"+"?id="+id+"&alot="+alot;

                        $.ajax({
                          url:'vendormodule/activatevendor/'+id,
                          type:'GET',
                          data:dataString,
                          success:function(data){
                            //alert(data);
                          }

                        })
                    // console.log(url);
                    // xhttp.open("GET",url,"true");
                    
                    // xhttp.send();
                    // xhttp.onreadystatechange =
                    // function()
                    // {
                    // alert(this.responseText);
                    //   document.getElementById("alotresult"+id).innerHTML=this.responseText;
                    // };
                  
                  }

              </script>         

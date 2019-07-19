 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Hotels 

         </h3>

          <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
         <div class="tt"><a href="<?= base_url('admin/hotels/add'); ?>" class="btn btn-info btn-flat">Add Hotel</a></div>
         <?php } ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
         <form method="get" class="grid-none" action="<?= base_url('admin/hotels/'); ?>">
            <input type="text" name="hotel_name" value="<?php if(!empty($_GET['hotel_name'])){ echo $_GET['hotel_name']; } ?>" placeholder="Please enter hotel name" />&nbsp;
            <input type="email" name="email" value="<?php if(!empty($_GET['email'])){ echo $_GET['email']; } ?>" placeholder="Please enter email" />&nbsp;
            <input type="text" name="address" value="<?php if(!empty($_GET['address'])){ echo $_GET['address']; } ?>" placeholder="Please enter address" />&nbsp;
             <input type="text" name="city" value="<?php if(!empty($_GET['city'])){ echo $_GET['city']; } ?>" placeholder="Please enter city" />&nbsp;
              <input type="text" name="pincode" value="<?php if(!empty($_GET['pincode'])){ echo $_GET['pincode']; } ?>" placeholder="Please enter pincode" />&nbsp;
               <input type="text" name="telephone" value="<?php if(!empty($_GET['telephone'])){ echo $_GET['telephone']; } ?>" placeholder="Please enter telephone" />&nbsp;
            <select name="status">
                <option value="">Select</option>
                <option value="0" <?php if(!empty($_GET['status']) && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>Pending</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Approved</option>
                 <option value="2" <?php if(!empty($_GET['status']) && $_GET['status']=="2"){ echo "selected='selected'"; } ?>>Blocked</option>
            </select>&nbsp;
            <input type="submit" name="submit" value="Search" />
			  <a href="<?= base_url('admin/hotels/'); ?>">Reset</a>
         </form>
       
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <th>Hotel Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>City</th>
          <th>Pin Code</th>
          <th>Telephone</th>
          <th>Status</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach($all_hotels as $row): 
          	// echo "<pre>";
          	// print_r($row);
          	?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['hotel_email']; ?></td>
            <td><?= $row['hotel_address']; ?></td>
            <td><?= $row['hotel_city']; ?></td>
            <td><?= $row['hotel_pin_code']; ?></td>
            <td><?= $row['hotel_telephone']; ?></td>
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->

              <td>
             <select name="status" id="alot<?php echo $row['hotel_id']; ?>" onChange="return alot(<?php echo $row['hotel_id']; ?>);">
                <option value="1" <?= ($row['hotel_status'] == 1)?'selected': '' ?> >Active</option>
                <option value="2" <?= ($row['hotel_status'] == 2)?'selected': '' ?>>Blocked</option>

                <?php 
                if ($row['hotel_status'] == 0) {
                  ?>
                  <option value="0" <?= ($row['hotel_status'] == 0)?'selected': '' ?>>Inactive</option>
                  <?php 
                }
                ?>
                


             </select>
             <span id="alotresult<?php echo $row['hotel_status']; ?>"></span>
           </td>
             <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>

            <td class="text-right"><a href="<?= base_url('admin/hotels/edit/'.$row['hotel_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/hotels/del/'.$row['hotel_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
            <?php } 
            else{
            	?>
            	 <td class="text-right"><a href="<?= base_url('admin/hotels/viewhotel/'.$row['hotel_id']); ?>" class="btn btn-info btn-flat">View</a></td>

            	<?php
            }
            ?>


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
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script> 
<script>
$("#view_users").addClass('active');
</script>   

<script type="text/javascript">
                function confirm_alert(node) {
                  return confirm("Are You Sure Want to Delete this ?");
                }
              </script> 

              <style type="text/css">
                

                .tt {
    float: right;
}
.box-header a.btn.btn-info.btn-flat{left: 0px!important;}
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
                      
                     var dataString="hotels/activatehotel"+"?id="+id+"&alot="+alot;

                        $.ajax({
                          url:'hotels/activatehotel/'+id,
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


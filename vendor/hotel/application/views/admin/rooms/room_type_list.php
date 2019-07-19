  <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <!-- <div class="box-header">
      <h3 class="box-title">Room Type List

<td class="text-left"><a href="<?= base_url('admin/rooms/addroomtype'); ?>" class="btn btn-info btn-flat" style="left: 68em;position: relative; right: 0px;">Add Room Type</a></td>
      </h3>
    </div> -->

<div class="box-header">
    <div class="dd">
      <h3 class="box-title">Room Type List
</h3>
        </div>
         <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>

    <div class="tt">
        <a href="<?= base_url('admin/rooms/addroomtype'); ?>" class="btn btn-info btn-flat">Add Room Type</a>
    </div>
    <?php } ?>

    </div>

    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <!-- <form method="get" action="<?= base_url('admin/rooms/roomtype/'); ?>">
            <input type="text" name="hotel_name" value="<?php if(!empty($_GET['hotel_name'])){ echo $_GET['hotel_name']; } ?>" placeholder="Please enter hotel name" />&nbsp;
            <input type="text" name="room_type" value="<?php if(!empty($_GET['room_type'])){ echo $_GET['room_type']; } ?>" placeholder="Please enter room type" />&nbsp;
            <input type="text" name="hourprice" value="<?php if(!empty($_GET['hourprice'])){ echo $_GET['hourprice']; } ?>" placeholder="Please enter hourly price" />&nbsp;
            <input type="text" name="dayprice" value="<?php if(!empty($_GET['dayprice'])){ echo $_GET['dayprice']; } ?>" placeholder="Please enter day price" />&nbsp;
             <input type="text" name="adult" value="<?php if(!empty($_GET['adult'])){ echo $_GET['adult']; } ?>" placeholder="Please enter day adult capacity" />&nbsp;
              <input type="text" name="child" value="<?php if(!empty($_GET['child'])){ echo $_GET['child']; } ?>" placeholder="Please enter child capacity" />&nbsp;
            <select name="status">
                <option value="">Select</option>
                <option value="0" <?php if(!empty($_GET['status']) && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>Inactive</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Active</option>
                
            </select>&nbsp;
            <input type="submit" name="submit" value="Search" />
         </form>
         <a href="<?= base_url('admin/rooms/roomtype/'); ?>">Reset</a> -->
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>Hotel Name</th>
          <th>Room Type</th> 
          <th>Room Facility</th> 
          <th>Price (RM)</th>
          <th>Capacity</th> 
          <th>Status</th>         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          foreach($all_rooms as $row):

            $vf = $row['vendor_facility'];
            $exp = explode(',', $vf);
             $texp = count($exp);
           ?>
           
          <tr>
            <td><?= $i; ?></td>
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['hotel_room_type']; ?></td>
            <td>
            <?php
           foreach($vendor_facility as $ven_fac){
                   // var_dump($facility);
            $id1 = $ven_fac['facility_id']; 
                    

            ?>
           
            <? if(in_array($id1,$exp)){

              $value =  $ven_fac['facility_name'];
              //echo rtrim($value,',');
              echo $value;
            }
            ?><br>
         
            <?php
          } 
          ?>
        </td>
            <td><?= $row['price_per_hour']; ?> /Hour<br>
               <?= $row['price_per_day']; ?> /Day    

            </td>
            <td>Adult (<?= $row['adult_person_capacity']; ?>)<br>
              Child (<?= $row['child_capacity']; ?>)</td>
            <td><?= $row['status']==1?'Active':'Inactive'; ?></td>
           
            <td class="text-right"><a href="<?= base_url('admin/rooms/editroomtype/'.$row['room_type_id']); ?>" class="btn btn-info btn-flat">Edit</a>
               <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
              <a href="<?= base_url('admin/rooms/delroomtype/'.$row['room_type_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>
              <?php } ?>
            </td>
          </tr>
          <?php $i++ ;endforeach; ?>
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
  
  h3.box-title {
    position: relative;
    top: 8px;
}

.dd {
    width: 50%;
}
.tt {
    float: right;
}
.box-header a.btn.btn-info.btn-flat{left: 0px!important;}
</style>                    

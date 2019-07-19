 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
      <h3 class="box-title">Discount List
</h3>

<?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
    <div class="tt">
        <a href="<?= base_url('admin/discount/discountrate'); ?>" class="btn btn-info btn-flat">Add Discount Rate</a>
    </div>
    <?php } ?>

    </div>



    <!-- <div class="box-header">
      <h3 class="box-title">Campaning Date List
<td class="text-left"><a href="<?= base_url('admin/discount/datecampaingadd'); ?>" class="btn btn-info btn-flat" style="left: 65em;position: relative; right: 0px;">Date of Campaning</a></td>

      </h3>
    </div> -->
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <!-- <form method="get" action="<?= base_url('admin/discount/discountlist/'); ?>">
            <input type="text" name="hotel_name" value="<?php if(!empty($_GET['hotel_name'])){ echo $_GET['hotel_name']; } ?>" placeholder="Please enter hotel name" />&nbsp;
            <input type="text" name="room_type" value="<?php if(!empty($_GET['room_type'])){ echo $_GET['room_type']; } ?>" placeholder="Please enter room type" />&nbsp;
            <input type="text" name="camp_name" value="<?php if(!empty($_GET['camp_name'])){ echo $_GET['camp_name']; } ?>" placeholder="Please enter camp name" />&nbsp;
              <select name="discount_type">
                <option value="">Select discount type</option>
                <option value="1" <?php if(!empty($_GET['discount_type']) && $_GET['discount_type']=="1"){ echo "selected='selected'"; } ?>>1</option>
                <option value="2" <?php if(!empty($_GET['discount_type']) && $_GET['discount_type']=="2"){ echo "selected='selected'"; } ?>>2</option>
                
            </select>&nbsp;
             
            <select name="status">
                <option value="">Select status</option>
                <option value="0" <?php if(!empty($_GET['status']) && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>Inactive</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Active</option>
                
            </select>&nbsp;
            <input type="submit" name="submit" value="Search" />
         </form>
         <a href="<?= base_url('admin/discount/discountlist/'); ?>">Reset</a> -->
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>Hotel Name</th>
          <th>Room Type</th>
          <th>Camp Name</th>
          <th>Type of Discount</th>
         <!--  <th>Voucher</th> -->
          <th>Discount For</th>
          <th>Status</th>         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>


        <tbody>
          <?php $i=1; foreach($camp_date as $row):


          if ($row['camp_dr_status'] != '3') { 
        
            
              
           ?>

          <tr>
             <td><?= $i++; ?></td>
             <?php if($this->session->userdata('role') ==1){

               foreach ($hotel_detail as $hotel) {
                ?>
               <td><?= $row['hotel_name']; ?></td>

                <?php

               }

             }
             else{
              ?>
            <td><?= $row['hotel_name']; ?></td> 

              <?php
             }
             ?>
            
            <td><?= $row['hotel_room_type']; ?></td>
            <td><?= $row['camp_name']; ?></td>
             <?php
              if ($row['discount_type'] =='1') {
                ?>
                <td style="width: 17%;">price  = RM <?= $row['discount_price']; ?> </td>

                <?php
               } else{
                ?>
                 <td style="width: 17%;">percentage = <?= $row['discount_percent']; ?> %</td>
                <?php
               }

              ?>
            
           <!--  <td><?= $row['voucher_no'];?></td> -->
             <?php
              if ($row['discount_for'] =='1') {
                ?>
                <td>max hour = 6.00<br>
                  min hour = <?= $row['min_hour']; ?>

                </td>

                <?php
               } else{
                ?>
                 <td>max day = 6<br>
                  min day = <?= $row['min_day']; ?>

                </td>
                <?php
               }

              ?>
            
            <td><?= ($row['camp_dr_status']==1)?'Active':'Inactive'; ?></td>
            
            <td class="text-right">
              <a href="<?= base_url('admin/discount/editdiscountrate/'.$row['camp_dis_id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
              <a href="<?= base_url('admin/discount/deletediscountrate/'.$row['camp_dis_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>

              <?php } ?>

            </td>
          </tr>
        <?php } ?>
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
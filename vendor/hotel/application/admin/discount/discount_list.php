 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
      <h3 class="box-title">Discount List
</h3>
    <div class="tt">
        <a href="<?= base_url('admin/discount/discountrate'); ?>" class="btn btn-info btn-flat">Add Discount Rate</a>
    </div>

    </div>



    <!-- <div class="box-header">
      <h3 class="box-title">Campaning Date List
<td class="text-left"><a href="<?= base_url('admin/discount/datecampaingadd'); ?>" class="btn btn-info btn-flat" style="left: 65em;position: relative; right: 0px;">Date of Campaning</a></td>

      </h3>
    </div> -->
    <!-- /.box-header -->
    <div class="box-body table-responsive">
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
        
             // echo "<pre>";
             // print_r($row);
           ?>

          <tr>
             <td><?= $i++; ?></td>
            <td><?= $row['hotel_name']; ?></td>
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
                <td>max hour = <?= $row['max_hour']; ?><br>
                  min hour = <?= $row['min_hour']; ?>

                </td>

                <?php
               } else{
                ?>
                 <td>max day = <?= $row['max_day']; ?><br>
                  min day = <?= $row['min_day']; ?>

                </td>
                <?php
               }

              ?>
            
            <td><?= ($row['camp_dr_status']==1)?'Active':'Inactive'; ?></td>
            
            <td class="text-right">
              <a href="<?= base_url('admin/discount/editdiscountrate/'.$row['camp_dis_id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/discount/deletediscountrate/'.$row['camp_dis_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
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
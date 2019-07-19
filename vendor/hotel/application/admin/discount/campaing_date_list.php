 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
    <div class="dd">
      <h3 class="box-title">Campaning Date List
</h3>
        </div>
    <div class="tt">
        <a href="<?= base_url('admin/discount/datecampaingadd'); ?>" class="btn btn-info btn-flat">Date of Campaning</a>
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
          <th>Camp Name</th>
          <th>From Date</th>
          <th>To Date</th>
          <th>Status</th>         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($camp_date as $row):
          if ($row['camp_date_status'] != '3') {
            # code...
        
            // echo "<pre>";
            // print_r($row);
           ?>

          <tr>
             <td><?= $i++; ?></td>
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['camp_name']; ?></td>
            <td><?= $row['from_date']; ?></td>
            <td><?= $row['to_date']; ?></td>
            <td><?= ($row['camp_date_status']==1)?'Active':'Inactive'; ?></td>
            
            <td class="text-right">
              <a href="<?= base_url('admin/discount/editcampdate/'.$row['camp_date_id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/discount/deletecampingdate/'.$row['camp_date_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
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
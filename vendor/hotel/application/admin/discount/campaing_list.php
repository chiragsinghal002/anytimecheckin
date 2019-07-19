 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
	    <div class="dd">

      <h3 class="box-title">Campaning List

      </h3>
	  </div>
	    <div class="tt"><a href="<?= base_url('admin/discount/add'); ?>" class="btn btn-info btn-flat" >Add Campaning</a></div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>Camping Name</th>
          <th>Status</th>         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($all_camp as $row):
           if ($row['camp_status'] != '3') {
           ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['camp_name']; ?></td>
            <td><?= ($row['camp_status']==1)?'Active':'Inactive'; ?></td>
            
            <td class="text-right"><a href="<?= base_url('admin/discount/edit/'.$row['camp_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/discount/deletecamping/'.$row['camp_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
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
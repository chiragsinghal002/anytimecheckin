 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Campaning List
<td class="text-left"><a href="<?= base_url('admin/discount/add'); ?>" class="btn btn-info btn-flat" style="left: 70em;position: relative; right: 0px;">Add Campaning</a></td>
      </h3>
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
          <?php $i=1; foreach($all_camp as $row): ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['camp_name']; ?></td>
            <td><?= ($row['camp_status']==1)?'Active':'Inactive'; ?></td>
            
            <td class="text-right"><a href="<?= base_url('admin/discount/edit/'.$row['camp_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/discount/del/'.$row['camp_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
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
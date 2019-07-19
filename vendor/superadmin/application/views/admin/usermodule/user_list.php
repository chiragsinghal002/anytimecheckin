 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">User Module
<td class="text-left"><a href="<?= base_url('admin/usermodule/add'); ?>" class="btn btn-info btn-flat" style="left: 75em;position: relative; right: 0px;">Add User</a></td>

      </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Status</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($all_users as $row): 
            // echo "<pre>";
            // print_r($row);
            ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['user_fname']; ?></td>
            <td><?= $row['user_lname']; ?></td>
            <td><?= $row['user_email']; ?></td>
            <td><?= $row['user_mob_no']; ?></td>
             <td><?= ($row['user_status'] == 1)?'Active':'Inactive'; ?></td>
            <td class="text-right"><a href="<?= base_url('admin/usermodule/edit/'.$row['v_user_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/usermodule/del/'.$row['v_user_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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

 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Assign User List
<td class="text-left"><a href="<?= base_url('admin/users/assignrole'); ?>" class="btn btn-info btn-flat" style="left: 65em;position: relative; right: 0px;">Assign User Role</a></td>

      </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>Hotel</th>
          <th>User</th>
          <th>Role</th>
          <th>Email</th>
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
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['user_fname'].' '.$row['user_lname']; ?></td>
            <td><?= $row['user_role_name']; ?></td>
            <td><?= $row['v_user_email']; ?></td>
            <td><?= ($row['v_status'] == 1)?'Active':'Inactive'; ?></td>
            <td class="text-right"><a href="<?= base_url('admin/users/editassignrole/'.$row['v_assign_role']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/users/delassign/'.$row['v_assign_role']); ?>" class="btn btn-danger btn-flat" onclick="return confirm_alert(this);">Delete</a></td>
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

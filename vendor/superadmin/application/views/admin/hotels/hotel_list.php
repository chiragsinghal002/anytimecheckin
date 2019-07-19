 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Hotels 

        <td class="text-left"><a href="<?= base_url('admin/hotels/add'); ?>" class="btn btn-info btn-flat">Add Hotel</a></td>
      </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
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
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach($all_hotels as $row): ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['hotel_email']; ?></td>
            <td><?= $row['hotel_address']; ?></td>
            <td><?= $row['hotel_city']; ?></td>
            <td><?= $row['hotel_pin_code']; ?></td>
            <td><?= $row['hotel_telephone']; ?></td>
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->
            <td class="text-right"><a href="<?= base_url('admin/hotels/edit/'.$row['hotel_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/hotels/del/'.$row['hotel_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
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

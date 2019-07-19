 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Hotels 

       <!--  <td class="text-left"><a href="<?= base_url('admin/hotels/add'); ?>" class="btn btn-info btn-flat">Add Hotel</a></td> -->
      </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <!-- <th>Vendor Name</th> -->
          <th>Hotel Name</th>
          <th>Email</th>
          <th>Vendor Name</th>
          <th>Vendor Email</th>
          <th>Address</th>
          <th>City</th>          
          <th>Telephone</th>
          <th>Is Featured</th>
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php 
         //var_dump($all_hotels);
          $i = 1;
          
          foreach($all_hotels as $row): 
           
              // echo "<pre>";
              // print_r($row);
            
      

            ?>
          <tr>
            <td><?= $i++; ?></td>
           <!--  <td><?= $row['username']; ?></td> -->
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['hotel_email']; ?></td>
            <td><?= $row['v_fname'].' '.$row['v_lname']; ?></td>
            <td><?= $row['v_email']; ?></td>
            <td><?= $row['hotel_address']; ?></td>
            <td><?= $row['hotel_city']; ?></td>
            <!-- <td><?= $row['hotel_pin_code']; ?></td> -->
            <td><?= $row['hotel_telephone']; ?></td>

           <td><?= ($row['status']==1)?'Yes':'No'; ?></td>
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->
            <td class="text-right"><a href="<?= base_url('admin/hotels/view/'.$row['hotel_id']); ?>" class="btn btn-info btn-flat">View</a>
              <!-- <a href="<?= base_url('admin/hotels/del/'.$row['hotel_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a> -->
            </td>
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
 

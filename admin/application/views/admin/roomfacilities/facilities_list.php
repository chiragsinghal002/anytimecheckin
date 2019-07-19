 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Room Facilities List

       <!--  <td class="text-left"><a href="<?= base_url('admin/hotels/add'); ?>" class="btn btn-info btn-flat" style="left: 68em;position: relative; right: 0px;">Add Hotel</a></td>  -->
      </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <!-- <th>Vendor Name</th> -->
          <th>Facility Title</th>
          <th>Image</th>
          <!-- <th>Date To</th> -->
          <th>Status</th>
          <!-- <th>Pin Code</th>
          <th>Telephone</th> -->
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          $base_url = 'http://netmaxims.in/projects/anytimecheckin/image/';
          foreach($all_facility as $row): 
// echo "<pre>";
// print_r($row);

            ?>
          <tr>
            <td><?= $i++; ?></td>
           
            <td><?= $row['facility_name']; ?></td>

            <td>
              <?php 
              if ($row['image'] != '') {
                ?>
                <img src="<?= $base_url.$row['image']; ?>" style="width: 70px;height: 70px;">
                <?php
              }
              else{
                echo 'no image';
              }
              ?>
              
            </td> 
           
            <td><?= ($row['status']==1)?'Active':'Inactive'; ?></td>
            
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->
            <td class="text-right"><a href="<?= base_url('admin/roomfacilities/edit/'.$row['facility_id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/roomfacilities/del/'.$row['facility_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>
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
 

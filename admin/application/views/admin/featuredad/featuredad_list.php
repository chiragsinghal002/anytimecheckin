 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Featured AD List </h3>
      <div class="tt" style="margin-top: 0;"><a href="<?= base_url('admin/featuredad/add'); ?>" class="btn btn-info btn-flat" >Create Featured AD</a>
</div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <!-- <th>Vendor Name</th> -->
          <th>AD Title</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Status</th>
          <!-- <th>Pin Code</th>
          <th>Telephone</th> -->
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach($all_ad as $row): 
// echo "<pre>";
// print_r($row);

            ?>
          <tr>
            <td><?= $i++; ?></td>
           <!--  <td><?= $row['username']; ?></td> -->
            <td><?= $row['ad_name']; ?></td>
            <!-- <td><img src="<?= $row['banner']; ?>"></td> -->
            <td><?= $row['effective_From']; ?></td>
            <td><?= $row['effective_to']; ?></td>
            <td><?= ($row['status']==1)?'Active':'Inactive'; ?></td>
            
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->
            <td class="text-right"><a href="<?= base_url('admin/featuredad/edit/'.$row['feat_ad_id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/featuredad/del/'.$row['feat_ad_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>
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
 

 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
	    <div class="dd">

      <h3 class="box-title">Campaign List

      </h3>
	  </div>
       <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>

	    <div class="tt"><a href="<?= base_url('admin/discount/add'); ?>" class="btn btn-info btn-flat" >Add Campaigning</a></div>
      <?php } ?>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <!-- <form method="get" action="<?= base_url('admin/discount/'); ?>">
            <input type="text" name="camp_name" value="<?php if(!empty($_GET['camp_name'])){ echo $_GET['camp_name']; } ?>" placeholder="Please enter camp name" />&nbsp;
            <select name="status">
                <option value="">Select</option>
                <option value="0" <?php if(!empty($_GET['status']) && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>Pending</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Approved</option>
                 <option value="2" <?php if(!empty($_GET['status']) && $_GET['status']=="2"){ echo "selected='selected'"; } ?>>Blocked</option>
            </select>&nbsp;
            <input type="submit" name="submit" value="Search" />
         </form>
         <a href="<?= base_url('admin/discount/'); ?>">Reset</a> -->
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
            
            <td class="text-right"><a href="<?= base_url('admin/discount/edit/'.$row['camp_id']); ?>" class="btn btn-info btn-flat">Edit</a>
               <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
              <a href="<?= base_url('admin/discount/deletecamping/'.$row['camp_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>
              <?php } ?>
            </td>
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
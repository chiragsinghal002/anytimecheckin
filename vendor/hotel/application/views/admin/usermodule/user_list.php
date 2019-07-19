 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
    <div class="dd">
      <h3 class="box-title">User Module
</h3>
        </div>
    <div class="tt">
        <a href="<?= base_url('admin/usermodule/add'); ?>" class="btn btn-info btn-flat">Add User</a>
    </div>

    </div>

    <!-- <div class="box-header">
      <h3 class="box-title">User Module
<td class="text-left"><a href="<?= base_url('admin/usermodule/add'); ?>" class="btn btn-info btn-flat" style="left: 75em;position: relative; right: 0px;">Add User</a></td>

      </h3>
    </div> -->
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <div style="display: none;">
        <form method="get" action="<?= base_url('admin/usermodule/'); ?>">
            <input type="text" name="first_name" value="<?php if(!empty($_GET['first_name'])){ echo $_GET['first_name']; } ?>" placeholder="Please enter first name" />&nbsp;
            <input type="text" name="last_name" value="<?php if(!empty($_GET['last_name'])){ echo $_GET['last_name']; } ?>" placeholder="Please enter last name" />&nbsp;
            <input type="email" name="email" value="<?php if(!empty($_GET['email'])){ echo $_GET['email']; } ?>" placeholder="Please enter email" />&nbsp;
            <input type="text" name="mobile" value="<?php if(!empty($_GET['mobile'])){ echo $_GET['mobile']; } ?>" placeholder="Please enter mobile" />&nbsp;
            <select name="status">
                <option value="">Select</option>
                <option value="0" <?php if(!empty($_GET['status']) && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>Pending</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Approved</option>
                 <option value="2" <?php if(!empty($_GET['status']) && $_GET['status']=="2"){ echo "selected='selected'"; } ?>>Blocked</option>
            </select>&nbsp;
            <input type="submit" name="submit" value="Search" />
         </form>
         <a href="<?= base_url('admin/usermodule/'); ?>">Reset</a>
       </div>
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
            <td class="text-right"><a href="<?= base_url('admin/usermodule/edit/'.$row['v_user_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/usermodule/del/'.$row['v_user_id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm_alert(this);">Delete</a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  

<script type="text/javascript">
                function confirm_alert(node) {
                  return confirm("Are You Sure Want to Delete this ?");
                }
              </script> 

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
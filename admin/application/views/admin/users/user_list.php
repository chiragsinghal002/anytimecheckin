 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Users</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <form method="get" class="grid-user" action="<?= base_url('admin/Users/'); ?>">
            <input type="text" name="fname" class="users" value="<?php if(!empty($_GET['fname'])){ echo $_GET['fname']; } ?>" placeholder="Please enter first name" />
            <input type="text" name="lname" class="users"  value="<?php if(!empty($_GET['lname'])){ echo $_GET['lname']; } ?>" placeholder="Please enter last name" />
            <input type="email" name="email" class="users"  value="<?php if(!empty($_GET['email'])){ echo $_GET['email']; } ?>" placeholder="Please enter email" />
            <input type="text" class="users"  name="mobile" value="<?php if(!empty($_GET['mobile'])){ echo $_GET['mobile']; } ?>" placeholder="Please enter mobile" />
            <select name="status">
                <option value="">Select</option>
                <option value="0" <?php if(!empty($_GET['status']) && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>Pending</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Approve</option>
                 <option value="2" <?php if(!empty($_GET['status']) && $_GET['status']=="2"){ echo "selected='selected'"; } ?>>Blocked</option>
            </select>
            <input type="submit" name="submit" value="Search" / class="user-button">
			    <a href="<?= base_url('admin/Users/'); ?>" class="user-button">Reset</a>
         </form>
     
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Status</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_users as $row):
            if ($row['status'] != '3') {
           

           ?>
          <tr>
            <td><?= $row['fname']; ?></td>
            <td><?= $row['lname']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['mob_no']; ?></td>
            <!--  <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['status'] == 1)? 'Active': 'Inactive'; ?><span></td> -->

              <td>
             <select name="status" id="alot<?php echo $row['user_id']; ?>" onChange="return alot(<?php echo $row['user_id']; ?>);">
                <option value="1" <?= ($row['status'] == 1)?'selected': '' ?> >Approve</option>
                <option value="2" <?= ($row['status'] == 2)?'selected': '' ?>>Blocked</option>

                <?php 
                if ($row['status'] == 0) {
                  ?>
                  <option value="0" <?= ($row['status'] == 0)?'selected': '' ?>>Pending</option>
                  <?php 
                }
                ?>
                


             </select>
             <span id="alotresult<?php echo $row['status']; ?>"></span>
           </td>
            <td class="text-right">
              <!-- <a href="<?= base_url('admin/users/edit/'.$row['user_id']); ?>" class="btn btn-info btn-flat">Edit</a> -->
              <a href="<?= base_url('admin/users/deleteusers/'.$row['user_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
<style>
.users {
    margin: 0px 7px 10px 0;
}
.user-button {
    background: #5bc0de;
    padding: 2px 20px;
    color: #ffff;
    border: none;
}
</style>
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

               <!---------------------- alot salesperson --------------------------->
           <script type="text/javascript">
                  function alot(id)
                  {
                  
                     //var id=id;                    
                     var alot=document.getElementById("alot"+id).value;

                    //   var xhttp = new XMLHttpRequest();
                    //alert(alot);
                      
                     var dataString="users/activateuser"+"?id="+id+"&alot="+alot;

                        $.ajax({
                          url:'users/activateuser/'+id,
                          type:'GET',
                          data:dataString,
                          success:function(data){
                            //alert(data)
                          }

                        })
                    // console.log(url);
                    // xhttp.open("GET",url,"true");
                    
                    // xhttp.send();
                    // xhttp.onreadystatechange =
                    // function()
                    // {
                    // alert(this.responseText);
                    //   document.getElementById("alotresult"+id).innerHTML=this.responseText;
                    // };
                  
                  }

              </script>      

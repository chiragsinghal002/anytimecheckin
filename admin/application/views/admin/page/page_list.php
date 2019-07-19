 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Pages List </h3>
       <div class="tt" style="margin-top: 0;"><a href="<?= base_url('admin/page/add'); ?>" class="btn btn-info btn-flat" >Create Page</a>
</div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <!-- <th>Vendor Name</th> -->
          <th>Title</th>
          <th>Description</th>
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
          foreach($all_page as $row): 


 $string =   $row['page_description'];
//  echo "<pre>";
// print_r($string);
// strip tags to avoid breaking any html

$string = strip_tags($string);
if (strlen($string) > 100) {
$stringCut = substr($string, 0, 200);
$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 

}

            ?>
          <tr>
            <td><?= $i++; ?></td>
           <!--  <td><?= $row['username']; ?></td> -->
            <td><?= $row['page_title']; ?></td>
            <!-- <td><img src="<?= $row['banner']; ?>"></td> -->
            <td><?= $string; ?></td>
           <!--  <td><?= $row['effective_to']; ?></td> -->
            <td><?= ($row['page_status']==1)?'Active':'Inactive'; ?></td>
            
            
            <td class="text-right"><a href="<?= base_url('admin/page/edit/'.$row['page_id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/page/del/'.$row['page_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>
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
 

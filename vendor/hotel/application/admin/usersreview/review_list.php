 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
    <div class="dd">
      <h3 class="box-title">User Review
</h3>
        </div>
   <!--  <div class="tt">
        <a href="<?= base_url('admin/hotelfacilities/add'); ?>" class="btn btn-info btn-flat">Add Hotel Facilities</a>
    </div> -->

    </div>


    <!-- <div class="box-header">
      <h3 class="box-title">Facilities List

       
      </h3>
    </div> -->
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <!-- <th>Vendor Name</th> -->
          <th>User Name</th>
          <th>Hotel</th>          
          <th>Rating</th>
         <!--  <th>Comment</th> -->
          <th>Status</th>
          <th>View</th>
          <!-- <th>Telephone</th> -->
          <!-- <th style="width: 150px;" class="text-right">Action</th> -->
        </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          
          foreach($all_review as $row): 
// echo "<pre>";
// print_r($row);
            if ($row['restatus'] != 3 )  {
            

            ?>
          <tr>
            <td><?= $i++; ?></td>
           
            <!-- <td></td> -->

            <td>
            <?php echo $row['fname'].' '.$row['lname'];?>     
            </td> 
            <td> 
            <?php echo $row['hotel_name'];?>    
            </td> 
            <td> 
            <?php echo $row['user_rating'];?>    
            </td> 
            <!--  <td>  
            <?php echo $row['user_reviews'];?>   
            </td>  -->
           
           <!--  <td><?= ($row['review_status']==1)?'Active':'Inactive'; ?></td>  -->

           
           <td>

 <select name="restatus" id="alot<?php echo $row['review_id']; ?>" onChange="return alot(<?php echo $row['review_id']; ?>);">
                <option value="1" <?= ($row['restatus'] == 1)?'selected': '' ?> >Active</option>
                <option value="0" <?= ($row['restatus'] == 0)?'selected': '' ?>>Inactive</option>              


             </select>
             <span id="alotresult<?php echo $row['restatus']; ?>"></span>



            <!--  <select name="status" id="alot<?php echo $row['review_id']; ?>" onChange="return alot(<?php echo $row['review_id']; ?>);">
                <option value="1"<?= ($row['status'] == 1)?'selected': '' ?> >Active</option>
                <option value="0"<?= ($row['status'] == 0)?'selected': '' ?>>Inactive</option>              


             </select>
             <span id="alotresult<?php echo $row['status']; ?>"></span> -->
           </td>
            
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->
            <td class="text-right">
              <a href="<?= base_url('admin/usersreview/hotelreviews/'.$row['hotel_id']); ?>" class="btn btn-info btn-flat">View</a> 
              <!-- <a href="<?= base_url('admin/usersreview/deletereview/'.$row['review_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a> -->
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
 
 <script type="text/javascript">
                  function alot(id)
                  {
                  
                     //var id=id;                    
                     var alot=document.getElementById("alot"+id).value;

                    //   var xhttp = new XMLHttpRequest();
                    //alert(id);
                      
                     var dataString="usersreview/activatereview"+"?id="+id+"&alot="+alot;

                        $.ajax({
                          url:'usersreview/activatereview/'+id,
                          type:'GET',
                          data:dataString,
                          success:function(data){
                            //alert(data);
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

 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Hotels </h3>
      
      <!-- <div class="go"><a href="javascript: history.go(-1)" class="btn btn-info pull-right">Go Back</a></div> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
         <form method="get" class="grid-user" action="<?= base_url('admin/hotels/'); ?>">
            <input type="text" name="hotel_name" value="<?php if(!empty($_GET['hotel_name'])){ echo $_GET['hotel_name']; } ?>" placeholder="Please enter hotel name" />&nbsp;
            <input type="email" name="email" value="<?php if(!empty($_GET['email'])){ echo $_GET['email']; } ?>" placeholder="Please enter email" />&nbsp;
            <input type="text" name="mobile" value="<?php if(!empty($_GET['mobile'])){ echo $_GET['mobile']; } ?>" placeholder="Please enter mobile" />&nbsp;
            <input type="text" name="city" value="<?php if(!empty($_GET['city'])){ echo $_GET['city']; } ?>" placeholder="Please enter city" />&nbsp;
            <input type="text" name="pincode" value="<?php if(!empty($_GET['pincode'])){ echo $_GET['pincode']; } ?>" placeholder="Please enter pincode" />&nbsp;
            <select name="status">
                <option value="">Select Featured</option>
                <option value="0" <?php if(!empty($_GET['status']) && $_GET['status']=="0"){ echo "selected='selected'"; } ?>>No</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Yes</option>
            </select>&nbsp;
            <input type="submit" name="submit" value="Search" />
			        <a href="<?= base_url('admin/hotels/'); ?>">Reset</a>
         </form>
 
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <!-- <th>Vendor Name</th> -->
          <th>Hotel Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>City</th>
          <th>Pin Code</th>
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
                       
            ?>
          <tr>
            <td><?= $i++; ?></td>
           <!--  <td><?= $row['username']; ?></td> -->
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['hotel_email']; ?></td>
            <td><?= $row['hotel_address']; ?></td>
            <td><?= $row['hotel_city']; ?></td>
            <td><?= $row['hotel_pin_code']; ?></td>
            <td><?= $row['hotel_telephone']; ?></td>

           <!-- <td><?= ($row['status']==1)?'Yes':'No'; ?></td>  -->

           <td>
             <select name="status" id="alot<?php echo $row['hotel_id']; ?>" onChange="return alot(<?php echo $row['hotel_id']; ?>);">
                <option value="1" <?= ($row['status'] == 1)?'selected': '' ?> >Yes</option>
                    <option value="0" <?= ($row['status'] == 0)?'selected': '' ?>>No</option>
             </select>
             <span id="alotresult<?php echo $row['status']; ?>"></span>
           </td>

          
            
            <td class="text-right"><a href="<?= base_url('admin/hotels/view/'.$row['hotel_id']); ?>" class="btn btn-info btn-flat">View</a>
              <!-- <a href="<?= base_url('admin/hotels/del/'.$row['hotel_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a> -->
               <a href="<?= base_url('admin/hotels/edit/'.$row['hotel_id']); ?>" class="btn btn-info btn-flat ">Edit</a> 
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

               <!---------------------- alot salesperson --------------------------->
           <script type="text/javascript">
                  function alot(id)
                  {
                  
                    // var id=id;                    
                     var alot=document.getElementById("alot"+id).value;

                    //   var xhttp = new XMLHttpRequest();
                    //alert(alot);
                      
                     var dataString="hotels/hotelfeaturededit"+"?id="+id+"&alot="+alot;

                        $.ajax({
                          url:'hotels/hotelfeaturededit/'+id,
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

  .go {
    display: inline;
}

h3.box-title {
    position: relative;
    top: 6px !important;
}
</style>                    
 

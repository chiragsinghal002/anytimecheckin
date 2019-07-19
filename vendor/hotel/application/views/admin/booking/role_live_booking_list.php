 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Live Booking List

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
          <th>User Name</th>
          <th>Hotel</th>
          <th>Check in </th>
          <th>Check Out </th>
          <th>No. of Rooms </th>
          <th>Booking Price &euro; </th>
          <th>Actual Price &euro;</th>
          <th>Discount Price &euro;</th>
          <!-- <th>Status</th> -->
           <th>Booking Status</th>
         <!-- <th>Telephone</th> -->
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
         
          foreach($all_booking as $row): 
// echo "<pre>";
// print_r($row);
            if ($row['booking_status'] != '5') {

            ?>
          <tr>
            <td><?= $i++; ?></td>
           
            <td><?= $row['fname'].' '.$row['lname'] ; ?></td>

            <td><?= $row['hotel_name'] ; ?></td>

            <td>
              <?php 
                $original = $row['check_in_date'];
           $check_in_date = date("d/m/Y", strtotime($original));

            $original1 = $row['check_out_date'];
           $check_out_date = date("d/m/Y", strtotime($original1));
              ?>
              <?= $check_in_date; ?></td>
            <td><?= $check_out_date ; ?></td>

            <td><?= $row['no_of_rooms'] ; ?></td>
            <td><?= $row['booked_price'] ; ?></td>
            <td><?= $row['actual_price'] ; ?></td>
            <td><?= $row['discount_price'] ; ?></td>

           
           <!--  <td><?= ($row['status']==1)?'Active':'Inactive'; ?></td> -->
            <td>
             <select name="booking_status" id="alot<?php echo $row['booking_id']; ?>" onChange="return alot(<?php echo $row['booking_id']; ?>);">
                <option value="1" <?= ($row['booking_status'] == 1)?'selected': '' ?> >Pending</option>
                <option value="2" <?= ($row['booking_status'] == 2)?'selected': '' ?>>Completed</option>
                <option value="3" <?= ($row['booking_status'] == 3)?'selected': '' ?>>Progress</option>
                <option value="4" <?= ($row['booking_status'] == 4)?'selected': '' ?>>Cancel</option>

               
                


             </select>
             <span id="alotresult<?php echo $row['booking_status']; ?>"></span>
           </td>
            
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->
            <td class="text-right">
               <a href="<?= base_url('admin/booking/view/'.$row['booking_id']); ?>" class="btn btn-info btn-flat">View</a>
              <a href="<?= base_url('admin/booking/deletebooking/'.$row['booking_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>
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
                    //alert(alot);
                      
                     var dataString="booking/activatebooking"+"?id="+id+"&alot="+alot;

                        $.ajax({
                          url:'booking/activatebooking/'+id,
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
 

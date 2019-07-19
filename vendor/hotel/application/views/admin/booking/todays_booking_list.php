 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
 
<div class="box-header">
      <h3 class="box-title">Today's Booking List 

         </h3>

         <div class="tt"><a href="<?= base_url('admin/booking/exportCSV'); ?>" class="btn btn-info btn-flat">Export Data</a></div>
    </div>
   
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#indate,#outdate,#booking_date" ).datepicker({
    dateFormat: 'yy-mm-dd'
});
  } );
  </script>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <form method="get" class="grid-none"  action="<?= base_url('admin/booking/todaysbooking/'); ?>">
           
            <input type="text" name="hotel" value="<?php if(!empty($_GET['hotel'])){ echo $_GET['hotel']; } ?>" placeholder="Please enter hotel name" />&nbsp;
           
             <input type="text" name="booking_date" id="booking_date" value="<?php if(!empty($_GET['booking_date'])){ echo $_GET['booking_date']; } ?>" placeholder="Please enter booking date" />&nbsp;
            <input type="text" name="indate" id="indate" value="<?php if(!empty($_GET['indate'])){ echo $_GET['indate']; } ?>" placeholder="Please enter check in date" />
             <input type="text" name="outdate" id="outdate" value="<?php if(!empty($_GET['outdate'])){ echo $_GET['outdate']; } ?>" placeholder="Please enter check out time" />
           <select name="status">
                <option value="">Select</option>
                <option value="2" <?php if(!empty($_GET['status']) && $_GET['status']=="2"){ echo "selected='selected'"; } ?>>Completed</option>
                <option value="1" <?php if(!empty($_GET['status']) && $_GET['status']=="1"){ echo "selected='selected'"; } ?>>Pending</option>
                 <option value="3" <?php if(!empty($_GET['status']) && $_GET['status']=="3"){ echo "selected='selected'"; } ?>>Progress</option>
                 <option value="4" <?php if(!empty($_GET['status']) && $_GET['status']=="4"){ echo "selected='selected'"; } ?>>Cancel</option>
            </select>&nbsp;
             
            <input type="submit" name="submit" value="Search" />
			       <a href="<?= base_url('admin/booking/'); ?>">Reset</a>
         </form>
  
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.NO.</th>
          <!-- <th>Vendor Name</th> -->
          <th>Name</th>
          <th>Hotel</th>
          <th>Booking Id</th>
          <th>Check in Date</th>
          <th>Check Out Date</th>
          <th>Check in Time</th>
          <th>Check Out Time</th>
          <th>No. of Rooms </th>
          <th>Booking Price (RM) </th>
          <th>Actual Price (RM)</th>
          <th>Discount Price (RM)</th>         
           <th>Booking Status</th>
         <th>Booking Date</th>
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
            <td><?= $row['hotel_booking_id'] ; ?></td>

            <td>
              <?php 
                $original = $row['check_in_date'];
           $check_in_date = date("d/m/Y", strtotime($original));

            $original1 = $row['check_out_date'];
           $check_out_date = date("d/m/Y", strtotime($original1));
              ?>
              <?= $check_in_date; ?></td>
            <td><?= $check_out_date ; ?></td>

             <?php 
                $originaltime = $row['check_in_time'];
              $check_in_time =  date("h:i a",strtotime($originaltime));
           //$check_in_date = date("d/m/Y", strtotime($originaltime));

            $originaltime1 = $row['check_out_time'];
           $check_out_time =  date("h:i a",strtotime($originaltime1));
              ?>

              <?php 
              if ($check_in_date == $check_out_date) {
                ?>
                <td><?= $check_in_time; ?></td>
            <td><?= $check_out_time ; ?></td>

                <?php
              }
              else{
                ?>
                <td></td>
                <td></td>
                <?php
              }
              ?>

             

            <td><?= $row['no_of_rooms'] ; ?></td>
            <td><?= number_format($row['booked_price']) ; ?></td>
            <td><?= number_format($row['actual_price']) ; ?></td>
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
           <td>
            <?php 
            $ordate = $row['book_created_at'];
           $booking_date = date("d/m/Y", strtotime($ordate));
           echo $booking_date;

           ?>
             
           </td> 
            
            <!-- <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['is_admin'] == 1)? 'admin': 'member'; ?><span></td> -->
            <td class="text-right">
               <a href="<?= base_url('admin/booking/view/'.$row['booking_id']); ?>" class="btn btn-info btn-flat">View</a>
                 <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
              <a href="<?= base_url('admin/booking/deletebooking/'.$row['booking_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>

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
 

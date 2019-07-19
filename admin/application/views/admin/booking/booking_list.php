 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
	<div class="dd">
      <h3 class="box-title">Booking</h3>
        </div>

	  <div class="tt">
        <a href="<?= base_url('admin/booking/exportCSV'); ?>" class="btn btn-info btn-flat" style="position: initial;" >Export Data</a>
    </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <div class="tt">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
              <link rel="stylesheet" href="/resources/demos/style.css">
              <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
              <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
              <script>
              $( function() {
                $( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd"});
                $( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd"});
              } );
              </script>
            <form method="get" action="" />
                <input type="text" name="hotelname" placeholder="Please enter hotel name" value="<?php if(!empty($_GET['hotelname'])){ echo $_GET['hotelname'];  } ?>" />&nbsp;
                <input type="text" name="datefrom" id="datepicker1" placeholder="Please enter date from" value="<?php if(!empty($_GET['datefrom'])){ echo $_GET['datefrom'];  } ?>" />&nbsp;
                <input type="text" name="dateto" id="datepicker2" placeholder="Please enter date to" value="<?php if(!empty($_GET['dateto'])){ echo $_GET['dateto'];  } ?>"  />&nbsp;
                 <select  name="todaybooking">
                     <option value="">Select if want today booking </option>
                     <option value="1" <?php if(!empty($_GET['todaybooking']) && ($_GET['todaybooking']=="1")){ echo 'selected="selected"'; } ?>>Yes</option>
                </select>&nbsp;
                <select  name="status">
                     <option value="">Select Status</option>
                     <option <?php if(!empty($_GET['status']) && ($_GET['status']=="1")){ echo 'selected="selected"'; } ?> value="1">Pending</option>
                     <option <?php if(!empty($_GET['status']) && ($_GET['status']=="2")){ echo 'selected="selected"'; } ?> value="2">Completed</option>
                     <option <?php if(!empty($_GET['status']) && ($_GET['status']=="3")){ echo 'selected="selected"'; } ?> value="3">Progress</option>
                     <option <?php if(!empty($_GET['status']) && ($_GET['status']=="4")){ echo 'selected="selected"'; } ?> value="4">Cancel</option>
                </select>
                &nbsp;
                <input type="submit" name="searchbooking" value="Search Booking" />&nbsp;
               <a href="/new/admin/admin/booking">[Reset]</a> 
                </form>
        </div>
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
         <th>Name</th>
          <th>Hotel</th>
          <th>Booking Id</th>
          <th>Check in Date/Check Out Date </th>
         <!--  <th>Check Out Date</th> -->

          <th>Check in Time/Check Out Time </th>
          <!-- <th>Check Out Time</th> -->
          <th>No. of Rooms </th>
          <th>Booking Price (RM) </th>
          <th>Actual Price (RM)</th>
          <th>Discount Price (RM)</th>         
           <th>Booking Status</th>
         <th>Booking Date</th>
         <th>Booking Reviews</th>
         <th>Action</th>
          <!-- <th style="width: 150px;" class="text-right">Option</th> -->
        </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($all_booking as $row):
          // echo "<pre>";
          // print_r($row);
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
              <?= $check_in_date; ?><br><?= $check_out_date ; ?></td>
            <!-- <td><?= $check_out_date ; ?></td> -->

              <?php 
                $originaltime = $row['check_in_time'];
              $check_in_time =  date("h:i a",strtotime($originaltime));
           //$check_in_date = date("d/m/Y", strtotime($originaltime));

            $originaltime1 = $row['check_out_time'];
           $check_out_time =  date("h:i a",strtotime($originaltime1));
              ?>

             <!-- <td><?= $check_in_time; ?></td>
            <td><?= $check_out_time ; ?></td> -->

             <?php 
              if ($check_in_date == $check_out_date) {
                ?>
                <td><?= $check_in_time; ?><br><?= $check_out_time ; ?></td>
           <!--  <td><?= $check_out_time ; ?></td> -->

                <?php
              }
              else{
                ?>
                <td></td>
                <!-- <td></td> -->
                <?php
              }
              ?>

            <td><?= $row['no_of_rooms'] ; ?></td>
            <td><?= number_format($row['booked_price']) ; ?></td>
            <td><?= number_format($row['actual_price']) ; ?></td>
            <td><?= $row['discount_price'] ; ?></td>

           
           <!--  <td><?= ($row['status']==1)?'Active':'Inactive'; ?></td> -->
            <td>

              <?php 
              if ($row['booking_status'] == 1) {
                echo "Pending";
              }
              elseif ($row['booking_status'] == 2) {
                echo "Completed";
              }
              elseif ($row['booking_status'] == 3) {
                echo "Progress";
              }
              else{
                echo "Cancel";
              }
              ?>           
             
           </td>
           <td>
            <?php 
            $ordate = $row['book_created_at'];
           $booking_date = date("d/m/Y", strtotime($ordate));
           echo $booking_date;

           ?>
             
           </td> 
            <td>
            <?php echo $row['rate']; ?>
           </td> 

           <td class="text-right">
               <a href="<?= base_url('admin/booking/view/'.$row['booking_id']); ?>" class="btn btn-info btn-flat">View</a>
              <!-- <a href="<?= base_url('admin/booking/deletebooking/'.$row['booking_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a> -->
            </td>

           <!--  <td class="text-right"><a href="<?= base_url('admin/booking/edit/'.$row['booking_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/booking/del/'.$row['booking_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td> -->
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
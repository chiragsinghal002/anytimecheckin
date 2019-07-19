<!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
   <!--  <div class="box-header">
      <h3 class="box-title">Room Photo List

<td class="text-left"><a href="<?= base_url('admin/roomphotos/add'); ?>" class="btn btn-info " >Add Room Photos</a></td>
      </h3>
    </div> -->


<div class="box-header">
    <div class="dd">
      <h3 class="box-title">Room Photos
</h3>
        </div>
         <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
    <div class="tt">
        <a href="<?= base_url('admin/roomphotos/add'); ?>" class="btn btn-info btn-flat"> Add Room Photos</a>
    </div>

              <?php
            }
            ?>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <form method="get" action="<?= base_url('admin/roomphotos/roomphoto_list'); ?>">
            <input type="text" name="hotel_name" class="users" value="<?php if(!empty($_GET['hotel_name'])){ echo $_GET['hotel_name']; } ?>" placeholder="Please enter hotel name" />
            <input type="text" name="room_type" class="users" value="<?php if(!empty($_GET['room_type'])){ echo $_GET['room_type']; } ?>" placeholder="Please enter room type" />
            
           
            <input type="submit" name="submit" class="user-button" value="Search" />
			<a href="<?= base_url('admin/roomphotos/roomphoto_list'); ?>" class="user-button" >Reset</a>
         </form>
         
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>Hotel Name</th>
           <th>Room Type</th>
          <th>Room Photo</th>
         
         <!--  <th>Room Facilities</th>
          <th>Room Capacity</th> -->
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php			$i=1; foreach($all_rooms as $row):
          
           ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['hotel_name']; ?></td>
            <td><?= $row['hotel_room_type']; ?></td>
            <!-- <td>			<?php	
			if(!empty($row['room_photo']))
			{
				$room_photo=explode(",",$row['room_photo']);
				$j=1;			
				foreach($room_photo as $room_photos)	
				{				
				?><img width="80px" src="../../../../image/<?= $room_photos; ?>" /> |
					<?php if($j%4==0)
					{
					echo "<br />";
					}	
				$j++;	
				}
			}				
				?>			</td> -->

        <td> <a href="<?= base_url('admin/roomphotos/viewroomgallery/'.$row['room_photo_id']); ?>" class="btn btn-info btn-flat">View</a></td>
            
            
            <td class="text-right">
              <a href="<?= base_url('admin/roomphotos/editroomphoto/'.$row['room_photo_id']); ?>" class="btn btn-info btn-flat">Edit</a>
                  <?php 
    if ($this->session->userdata('role')!=1 AND $this->session->userdata('role')!=2) {
      ?>
              <a href="<?= base_url('admin/roomphotos/delroomphoto/'.$row['room_photo_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a>
              <?php } ?>

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
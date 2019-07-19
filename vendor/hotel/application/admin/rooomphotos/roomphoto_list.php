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
    <div class="tt">
        <a href="<?= base_url('admin/roomphotos/add'); ?>" class="btn btn-info btn-flat"> Add Room Photos</a>
    </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
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
              <a href="<?= base_url('admin/roomphotos/delroomphoto/'.$row['room_photo_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
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
 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <div class="dd">
        <h3 class="box-title">Hotel Name
        </h3>
      </div>

   <!--  <div class="tt">
        <a href="<?= base_url('admin/hotelfacilities/add'); ?>" class="btn btn-info btn-flat">Add Hotel Facilities</a>
      </div> -->

    </div>
    
    <?= form_open('admin/rooms/TimmingAvilable');?>
    <div class="row">
     <div class="col-sm-3">
      <div class="form-group search-bit">
        <select name="hotel_id" id="hotel_id" class="form-control" onchange="room_type(this.value)">
          <!-- <select name="hotel_id" id="hotel_id" class="form-control" onchange="hotel();"> -->
            <option value="">Select Hotel</option>

            <?php foreach($all_hotels as $row): ?>
              <option value="<?= $row['hotel_id'];?>"><?= $row['hotel_name']; ?></option>
            <?php endforeach; ?>

          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group search-bit">
         <select name="room_type_id" class="form-control" id="sel_city">
          <option value="">Select Room Type</option>
          <?php foreach($room_types as $row): ?>
            <option value="<?= $row['room_type_id']; ?>"><?= $row['hotel_room_type']; ?></option>
          <?php endforeach; ?>

        </select>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group search-bit">
       <input type="date" class="form-control" data-date-format='d M y' name="check_in">
     </div>
   </div>
   <div class="col-sm-3">
    <div class="form-group search-bit">
     <select class="form-control" name="booking_type">
      <option>Booking Type</option>
      <option value="1">Day</option>
      <option value="2">Hour</option>

    </select>
  </div>
</div>
<div class="col-sm-3">
  <div class="form-group search-bit">
   <?= form_submit(['class'=>'form-control','name'=>'submit','value'=>'submit']);?>
 </div>
</div>
<?= form_close();?>
</div>

<div class="row review-search">
  <div class="table-responsive search-table">          
    <table class="table">
      <thead>
        <tr>
          <th>Room No.</th>
          <th>Room Details</th>
          <!-- <th class="text-right">Action</th> -->

        </tr>
      </thead>
      <tbody>
        <?php if(!empty($timmingList)):?>
          <?php $count=count($timmingList);?>
          <?php for($i=0;$i<$count-1;$i++){
            if($timmingList[$i]['room_no']==$timmingList[$i+1]['room_no']){
              $room[]=$timmingList[$i];
              $room[]=$timmingList[$i+1];
            }else{
              $aa[]=$timmingList[$i];
            }
          }
          ?>
          <?php 
          foreach ($aa as $dataa) { ?>
           <tr>

            <td><?php echo $dataa['room_no'];?></td>
            <td>
              <?php 
              echo date('d M y',strtotime($dataa['check_in_date'])).' - '.date('d M y',strtotime($dataa['check_out_date']));?>
            </td>
         <!--  <td class="text-right">
            <a href="#" class="btn btn-info btn-flat">Edit</a>
          </td> -->
        </tr>
      <?php  }
      ?>

    <?php endif;?>

    <?php 
    if(!empty($timmingListfortimming)){
      echo "<pre>";
      var_dump($timmingListfortimming);
      $count=count($timmingListfortimming);
      for($i=0;$i<$count-1;$i++){
        if($timmingListfortimming[$i]['room_no']==$timmingListfortimming[$i+1]['room_no']){
          $timming[]=$timmingListfortimming[$i]['check_in_time'].'-'.$timmingListfortimming[$i]['check_out_time'];
          $timming[]=$timmingListfortimming[$i+1]['check_in_time'].'-'.$timmingListfortimming[$i+1]['check_out_time'];
          $room[]=array('room_no'=>$timmingListfortimming[$i]['room_no'],'timming'=>$timming);
        }else{
          $aa[]=$timmingListfortimming[$i];
        }
      } ?>
           <?php 
          foreach ($aa as $dataa) { ?>
           <tr>

            <td><?php echo $dataa['room_no'];?></td>
            <td>
              <?php 
              echo $dataa['check_in_time'].'-'.$dataa['check_out_time'];?>
            </td>
         <!--  <td class="text-right">
            <a href="#" class="btn btn-info btn-flat">Edit</a>
          </td> -->
        </tr>
      <?php  }
      ?>
   <?php }
    ?>
  </tbody>
</table>
</div>
</div>



    <!-- <div class="box-header">
      <h3 class="box-title">Facilities List

       
      </h3>
    </div> -->
    <!-- /.box-header -->

    <!-- /.box-body -->
  </div>

  <!-- /.box -->
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $("#add_user").addClass('active');
  function room_type(id){

    $.ajax({
      url:'RoomTypeId_ForHotelId',
      type:'GET',
      data:{'hotel_id':id},
      success:function(data){
    // alert(data);
    $("#sel_city").html(data);
  }
})
  }
// alert('chirag');
</script>    



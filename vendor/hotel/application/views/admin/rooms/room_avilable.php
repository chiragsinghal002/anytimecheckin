 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  
 <section class="content">
   <div class="box">
    <div class="box-header">
      <div class="dd">
        <h3 class="box-title">Room Avilables
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
           <?php if($this->session->userdata('role') ==1){ ?>

           <?php  }else{ ?>
             <option value="">Select Hotel</option>
           <?php } 

           ?>
           

           <?php foreach($all_hotels as $row): ?>
            <option value="<?= $row['hotel_id'];?>" <?php echo  set_select('hotel_id',$row['hotel_id'], FALSE); ?>><?= $row['hotel_name']; ?></option>
          <?php endforeach; ?>

        </select>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group search-bit">
       <select name="room_type_id" class="form-control" id="sel_city" required>
         <?php if($this->session->userdata('role') ==1){ ?>

         <?php  }else{ ?>

           <option value="">Select Room Type</option>
         <?php } ?>

         <?php foreach($room_types as $row): ?>
          <option value="<?= $row['room_type_id']; ?>"<?php echo  set_select('room_type_id',$row['room_type_id'], FALSE); ?>><?= $row['hotel_room_type'];?></option>
        <?php endforeach; ?>

      </select>
    </div>
  </div>
  <?php 
  $datee=date('Y-m-d');
  ?>
  <div class="col-sm-3">
    <div class="form-group search-bit">
     <input type="date" class="form-control" data-date-format='d M y' name="check_in" value="<?php echo set_value('check_in') == false ? $datee : set_value('check_in');?>">
   </div>
 </div>
  <!--  <div class="col-sm-3">
    <div class="form-group search-bit">
     <select class="form-control" name="booking_type">
      <option>Booking Type</option>
      <option value="1">Day</option>
      <option value="2">Hour</option>

    </select>
  </div>
</div> -->
<div class="col-sm-3">
  <div class="form-group search-bit">
   <?= form_submit(['class'=>'form-control','name'=>'submit','value'=>'submit']);?>
 </div>
</div>
<?= form_close();?>
</div>
 <?php //var_dump($all_hotels);
      // var_dump($room_types);
 ?>
 <input type="hidden" id="hotell_id" value="<?php if(!empty($hotel_id)){echo $hotel_id;}else{echo $all_hotels[0]['hotel_id'];}?>">
 <input type="hidden" id="roomm_type_id" value="<?php if(!empty($room_type_id)){echo $room_type_id;}else if(!empty($room_types[0]['room_type_id'])){echo $room_types[0]['room_type_id'];}else{}?>">

 <div class="row review-search">
  <div class="table-responsive search-table">          
    <table class="table">
      <thead>
       <!--  <tr>
          <th>Room No.</th>
          <th>Room Details</th>
        

        </tr> -->


        <!-- my code -->

        <?php
        if (!empty($_POST['check_in'])) {
          # code...

          $originalDate = $_POST['check_in'];
          $newDate = date("Y-m-d", strtotime($originalDate));

          $date = $newDate;
// $date = '2003-09-01';
//$end = '2003-09-' . date('t', strtotime($date)); //get end date of month
          $end = date('Y-m-d', strtotime('+1 month', strtotime($date)));
          if(!empty($price)){
            $price_per_day=$price[0]['price_per_day'];
            $price_per_hour=$price[0]['price_per_hour'];
          }else{
            $price_per_day=0;
            $price_per_hour=0;
          }
          
          ?>
          <?php 
          
          // echo '<pre>';
            // var_dump($all_details);?>
            <table class="act">
              <tr>
               <td>
                <p class="rooms-booked">Rooms<br>(Day)</p>
                <p class="rooms-booked">Rooms<br>(Hour)</p>
                <p class="rooms-booked">booked<br>(day)</p>
                <p class="rooms-booked">booked<br>(hour)</p>
                <p class="rooms-booked">price<br>(day)</p>
                <p class="rooms-booked">price<br>(hour)</p>


              </td>
              <?php while(strtotime($date) <= strtotime($end)) {
               $day_num = date('d', strtotime($date));
               $day_name = date('D', strtotime($date));
               $month=date('M',strtotime($date));
               $year=date('Y',strtotime($date));
               $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
               if(!empty($all_details)){
                for($i=0;$i<=count($all_details)-1;$i++){

                  if($day_num==$all_details[$i]['day'] && $month==$all_details[$i]['month'] && $year==$all_details[$i]['year']){
                    $price_per_day1=$all_details[$i]['price_per_day'];
                    $price_per_hour1=$all_details[$i]['price_per_hour'];
                    $available_room_day=$all_details[$i]['available_room_day'];
                    $available_room_hour=$all_details[$i]['available_room_hour'];
                    $booked_room_day=$all_details[$i]['booked_room_day'];
                    $booked_room_hour=$all_details[$i]['booked_room_hour'];
                    break;
                  }
                  else{
                    $price_per_day1='';
                    $price_per_hour1='';
                    $available_room_day='';
                    $booked_room_day='';
                    $available_room_hour='';
                    $booked_room_hour='';
                    continue;
                  }


                }
              }

              if(!empty($price_per_day1)){
                $price_per_day1;
              }else{
                $price_per_day1=$price_per_day;
              }
              if(!empty($price_per_hour1)){
               $price_per_hour1;
             }else{
              $price_per_hour1=$price_per_hour;
            }
            if(empty($available_room_day)){
             $available_room_day=$rooms_available['no_of_rooms'];
           }
           if(empty($booked_room_day)){
             $booked_room_day=0;
           }
           if(empty($available_room_hour)){
            if(empty($rooms_available['no_of_rooms_hour'])){

             $available_room_hour=5;
           }else{
            $available_room_hour=$rooms_available['no_of_rooms_hour'];
          }
        }
        if(empty($booked_room_hour)){
         $booked_room_hour=0;
       }
       echo "<td>$day_num <br/> $day_name <br/> 
       <input type='text' name='room_available' placeholder='room_avbl' class='text-wrap' id='$day_num,$month,$year,1' onchange='rooms_available_day(this.id,this.value)' value='".$available_room_day."'>
       <input type='text' name='room_available' placeholder='room_avbl' class='text-wrap' id='$day_num,$month,$year,2' onchange='rooms_available_hour(this.id,this.value)' value='".$available_room_hour."'>
       <input type='text' name='room_booked' placeholder='rooms_booked' class='text-wrap' id='$day_num,$month,$year,5' onchange='rooms_booked_day(this.id,this.value)' value='".$booked_room_day."'> 
       <input type='text' name='room_booked' placeholder='rooms_booked' class='text-wrap' id='$day_num,$month,$year,6' onchange='rooms_booked_hour(this.id,this.value)' value='".$booked_room_hour."'> 
       <input type='text' name='price_per_day' placeholder='Day_price' class='text-wrap' id='$day_num,$month,$year,3' onchange='price_per_day(this.id,this.value)' value='".$price_per_day1."'>
       <input type='text' name='price_per_hour' placeholder='Hour_price' class='text-wrap' id='$day_num,$month,$year,4' onchange='price_per_hour(this.id,this.value)' value='".$price_per_hour1."'>
       </td>";

       ?>

       <?php
     }

     ?>
   </tr>
 </table>

<?php } ?>
<!-- For Managers -->
<?php
if ($this->session->userdata('role') ==1 && empty($_POST['check_in'])) {
          # code...

  $originalDate = date('Y-m-d');
  $newDate = date("Y-m-d", strtotime($originalDate));

  $date = $newDate;
// $date = '2003-09-01';
//$end = '2003-09-' . date('t', strtotime($date)); //get end date of month
  $end = date('Y-m-d', strtotime('+1 month', strtotime($date)));
  if(!empty($price)){
    $price_per_day=$price[0]['price_per_day'];
    $price_per_hour=$price[0]['price_per_hour'];
  }else{
    $price_per_day=0;
    $price_per_hour=0;
  }

  ?>
  <?php 

          // echo '<pre>';
           // var_dump($all_details);?>
           <table class="act">
            <tr>
              <td>
               <p class="rooms-booked">Rooms<br>(Day)</p>
               <p class="rooms-booked">Rooms<br>(Hour)</p>
               <p class="rooms-booked">booked<br>(day)</p>
               <p class="rooms-booked">booked<br>(hour)</p>
               <p class="rooms-booked">price<br>(day)</p>
               <p class="rooms-booked">price<br>(hour)</p>


             </td>
             <?php while(strtotime($date) <= strtotime($end)) {
               $day_num = date('d', strtotime($date));
               $day_name = date('D', strtotime($date));
               $month=date('M',strtotime($date));
               $year=date('Y',strtotime($date));
               $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
               if(!empty($all_details)){
                for($i=0;$i<=count($all_details)-1;$i++){

                  if($day_num==$all_details[$i]['day'] && $month==$all_details[$i]['month'] && $year==$all_details[$i]['year']){
                    $price_per_day1=$all_details[$i]['price_per_day'];
                    $price_per_hour1=$all_details[$i]['price_per_hour'];
                    $available_room_day=$all_details[$i]['available_room_day'];
                    $booked_room_day=$all_details[$i]['booked_room_day'];
                    $available_room_hour=$all_details[$i]['available_room_hour'];
                    $booked_room_hour=$all_details[$i]['booked_room_hour'];
                    break;
                  }
                  else{
                    $price_per_day1='';
                    $price_per_hour1='';
                    $available_room_day='';
                    $available_room_hour='';
                    $booked_room_day='';
                    $booked_room_hour='';
                    continue;
                  }


                }
              }

              if(!empty($price_per_day1)){
                $price_per_day1;
              }else{
                $price_per_day1=$price_per_day;
              }
              if(!empty($price_per_hour1)){
               $price_per_hour1;
             }else{
              $price_per_hour1=$price_per_hour;
            }
            if(empty($available_room_day)){
             $available_room_day=$rooms_available['no_of_rooms'];
           }
           if(empty($available_room_hour)){
             if(empty($rooms_available['no_of_rooms_hour'])){

               $available_room_hour=5;
             }else{
              $available_room_hour=$rooms_available['no_of_rooms_hour'];
            }
          }
          if(empty($booked_room)){
           $booked_room=0;
         }
         echo "<td>$day_num <br/> $day_name <br/> 
         <input type='text' name='room_available' placeholder='room_avbl' class='text-wrap' id='$day_num,$month,$year,1' onchange='rooms_available_day(this.id,this.value)' value='".$available_room_day."'>
         <input type='text' name='room_available' placeholder='room_avbl' class='text-wrap' id='$day_num,$month,$year,2' onchange='rooms_available_hour(this.id,this.value)' value='".$available_room_hour."'>
         <input type='text' name='room_booked' placeholder='rooms_booked' class='text-wrap' id='$day_num,$month,$year,5' onchange='rooms_booked_day(this.id,this.value)' value='".$booked_room_day."'> 
         <input type='text' name='room_booked' placeholder='rooms_booked' class='text-wrap' id='$day_num,$month,$year,6' onchange='rooms_booked_hour(this.id,this.value)' value='".$booked_room_hour."'> 
         <input type='text' name='price_per_day' placeholder='Day_price' class='text-wrap' id='$day_num,$month,$year,3' onchange='price_per_day(this.id,this.value)' value='".$price_per_day1."'>
         <input type='text' name='price_per_hour' placeholder='Hour_price' class='text-wrap' id='$day_num,$month,$year,4' onchange='price_per_hour(this.id,this.value)' value='".$price_per_hour1."'>
         </td>";

         ?>

         <?php
       }

       ?>
     </tr>
   </table>

 <?php } ?>


 <!-- close manager section -->

 <!-- end my code -->

</thead>
<tbody>
  <?php    

  if(!empty($timmingList)):?>
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
      // echo "<pre>";
      // var_dump($timmingListfortimming);
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
  function price_per_day(id,value){
    var room_type_id =$("#roomm_type_id").val();
    var hotel_id=$("#hotell_id").val();
    $.ajax({
     url:'price_per_day',
     type:'GET',
     data:{'hotel_id':hotel_id,room_type_id:room_type_id,id:id,price_per_day:value},
     success:function(data){


     }
   })
  }
  function price_per_hour(id,value){
    var room_type_id =$("#roomm_type_id").val();
    var hotel_id=$("#hotell_id").val();
    // alert(a);
    console.log(id);
    console.log(value);
    $.ajax({
     url:'price_per_hour',
     type:'GET',
     data:{'hotel_id':hotel_id,room_type_id:room_type_id,id:id,price_per_hour:value},
     success:function(data){
       console.log(data);

     }
   })
  }
  function rooms_booked_day(id,value){
    console.log(id);
    console.log(value);
    var room_type_id =$("#roomm_type_id").val();
    var hotel_id=$("#hotell_id").val();
    $.ajax({
     url:'rooms_booked_day',
     type:'GET',
     data:{'hotel_id':hotel_id,room_type_id:room_type_id,id:id,rooms_booked:value},
     success:function(data){
      console.log(data);

    }
  })
  }
  function rooms_booked_hour(id,value){
   var room_type_id =$("#roomm_type_id").val();
   var hotel_id=$("#hotell_id").val();
   $.ajax({
     url:'rooms_booked_hour',
     type:'GET',
     data:{'hotel_id':hotel_id,room_type_id:room_type_id,id:id,rooms_booked:value},
     success:function(data){


     }
   })
 }
 function rooms_available_day(id,value){
   var room_type_id =$("#roomm_type_id").val();
   var hotel_id=$("#hotell_id").val();
   $.ajax({
     url:'rooms_available_day',
     type:'GET',
     data:{'hotel_id':hotel_id,room_type_id:room_type_id,id:id,no_of_rooms:value},
     success:function(data){


     }
   })
 }
 function rooms_available_hour(id,value){
   var room_type_id =$("#roomm_type_id").val();
   var hotel_id=$("#hotell_id").val();
   $.ajax({
     url:'rooms_available_hour',
     type:'GET',
     data:{'hotel_id':hotel_id,room_type_id:room_type_id,id:id,no_of_rooms:value},
     success:function(data){


     }
   })
 }
 $(function(){
  var hotel=$('#hotell_id').val();
    // alert(hotel);
    if($('#hotell_id').val()!==''){
      room_type(hotel);
    }
  })


</script>    


<style type="text/css">
  table.act td {
    padding: 0px 10px;
  }
  p.rooms-booked {
    position: relative;
    top: 16px;
    margin-top: -2px;
    font-size: 8px;
    font-weight: bold;
  }
  .review-search {
    padding: 0px 18px;
  }
</style>
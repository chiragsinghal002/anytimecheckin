<!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
      <h3 class="box-title">Hotel Photo List

         </h3>
         <div class="tt" style="margin-top: 0;"><a href="<?= base_url('admin/hotels/addhotelphotos'); ?>" class="btn btn-info btn-flat">Add Hotel Photos</a></div>
    </div>

   <!--  <div class="box-header">
      <h3 class="box-title">Hotel Photo List

<td class="text-left"><a href="<?= base_url('admin/hotels/addhotelphotos'); ?>" class="btn btn-info " >Add Hotel Photos</a></td>
      </h3>
    </div> -->
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>S.No.</th>
          <th>Hotel Name</th>
           <!-- <th>Room Type</th> -->
         <!--  <th>Hotel Images</th> -->

          <th>Hotel Photo</th>
         
         <!--  <th>Room Facilities</th>
          <th>Room Capacity</th> -->
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php     $i=1; foreach($all_rooms as $row):
          
           ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['hotel_name']; ?></td>
           
            <!--  <td>   
               <?php if(!empty($row['hotel_room_image']))
      {
         $room_photo=explode(",",$row['hotel_room_image']);
        $j=1;     
         foreach($room_photo as $room_photos)  
         {       
         ?>
       <img width="80px" src="/new/image/<?= $room_photos; ?>" /> | 
      
           <?php
       

      if($j%4==0)
           {
          echo "<br />";
           } 
         $j++; 
         }
       }       
        ?>   
        </td>  -->

        <td><a href="<?= base_url('admin/hotels/viewhotelgallery/'.$row['hotel_photo_id']); ?>" class="btn btn-info btn-flat">View</a></td>

        <!-- <td  data-toggle="modal" data-target="#myModal" style="cursor: pointer;"> more photos</button></td> -->
        <td> 
              <a href="<?= base_url('admin/hotels/edithotelphoto/'.$row['hotel_photo_id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/hotels/delhotelphoto/'.$row['hotel_photo_id']); ?>" class="btn btn-danger btn-flat " onclick="return confirm_alert(this);">Delete</a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="http://placehold.it/1200x480&amp;text=one" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img src="http://placehold.it/1200x480/888/FFF" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                            <img src="http://placehold.it/1200x480&amp;text=three" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="3">
                            <img src="http://placehold.it/1200x480&amp;text=four" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="4">
                            <img src="http://placehold.it/1200x480&amp;text=five" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="5">
                            <img src="http://placehold.it/1200x480&amp;text=six" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="6">
                            <img src="http://placehold.it/1200x480&amp;text=seven" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="7">
                            <img src="http://placehold.it/1200x480&amp;text=eight" class="img-fluid">
                        </div>

                        <a class="carousel-control left pt-3" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="carousel-control right pt-3" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>

                    </div>
                    <!-- main slider carousel nav controls -->


                    <ul class="carousel-indicators list-inline">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=one" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=two" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=three" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-3" data-slide-to="3" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=four" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-4" data-slide-to="4" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=five" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carous
              el-selector-5" data-slide-to="5" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=six" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-6" data-slide-to="6" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=seven" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-7" data-slide-to="7" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=eight" class="img-fluid">
                            </a>
                        </li>
                    </ul>
            </div>
        
  
    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 </div>

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
                

                .tt {
    float: right;
}
#myCarousel .list-inline {
    white-space:nowrap;
    overflow-x:auto;
}

#myCarousel .carousel-indicators {
    position: static;
    left: initial;
    width: initial;
    margin-left: initial;
}

#myCarousel .carousel-indicators > li {
    width: initial;
    height: initial;
    text-indent: initial;
}

#myCarousel .carousel-indicators > li.active img {
    opacity: 0.7;
}
.box-header a.btn.btn-info.btn-flat{left: 0px!important;}
              </style> 
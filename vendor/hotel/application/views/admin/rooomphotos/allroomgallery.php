<!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
      <h3 class="box-title">Room Gallery

         </h3>
         <div class="tt"><a href="<?= base_url('admin/roomphotos/roomphoto_list'); ?>" class="btn btn-info btn-flat"><< Back</a></div>
    </div>

<div class="hotel-area">
  <h2 style="text-align: center;"><?php echo $gallery['hotel_room_type'];?></h2>
    <div class="container">
      <div class="row">

            <?php 
          
      if(!empty($gallery['room_photo']))
      {
        $room_photo=explode(",",$gallery['room_photo']);
         
        foreach($room_photo as $room_photos)  
        { 
       
        $thumbimage=explode(".",$room_photos); 
                  $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];    
        ?>

        <div class="col-sm-3 col-md-3">
          <div class="admin-pic">
            <img src="../../../../../image/Room/<?= $thumbimagefinal; ?>" /> 
            
          </div>
            </div>
          <?php }
        }
          ?>

          <!--   <div class="col-sm-3 col-md-3">
          <div class="admin-pic">
            <img src="https://epimoniapp.com/anytimecheckin/image/front/101718103437hotel6_thumb.jpg" />
            <h2>abc</h2>
          </div>
            </div> -->
<!-- 
            <div class="col-sm-3 col-md-3">
          <div class="admin-pic">
            <img src="https://epimoniapp.com/anytimecheckin/image/front/101718103437hotel6_thumb.jpg" />
            <h2>abc</h2>
          </div>
            </div> -->

           <!--  <div class="col-sm-3 col-md-3">
          <div class="admin-pic">
            <img src="https://epimoniapp.com/anytimecheckin/image/front/101718103437hotel6_thumb.jpg" />
            <h2>abc</h2>
          </div>
            </div> -->


        </div>
    </div>
</div>

</div>

   
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
                

                .tt {
    float: right;
     margin-top: 23px;
}

.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 0px;
    padding-right: 1px;
    width: 100%;
}

.row {
    margin-right: 92px;
    margin-left: -26px;
}

.admin-pic img {
    width: 255px;
    height: 165px;
    margin-bottom: 11px;
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
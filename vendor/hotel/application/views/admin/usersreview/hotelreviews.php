 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
<div class="box-header">
    <div class="dd">
      <h3 class="box-title"><?php echo $hotel['hotel_name'];?>
</h3>
        </div>

    </div>

<div class="row review">
           <!--  <div class="col-sm-12 col-md-12">
        <div class="user-review">
          <h2>User reviews</h2>
        </div>
      </div> -->

    </div>
  <div class="row review">
      <div class="col-sm-12 col-md-12">

        <?php 
         foreach($view_review as $row){         
        ?>
	  	       <div class="user-location-dynamic">

	       <div class="user-location">
            <p><?php echo $row['fname'].' '.$row['lname'];?>  
         <span>
          <?php 
           $original = $row['created_at'];
           $startdate = date("j F, Y", strtotime($original));

         echo $startdate;
         ?> 
            </span> 
          </p>
        </div>
        <div class="user-review-content">

          <?php $rate=  $row['user_rating'];?>
          <ul>
            <?php 
            for($i=0;$i<= $rate-1;$i++){
              ?>
              <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <!-- <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li> -->
          <?php } ?>
        </ul>
             
        <p> <?php echo $row['user_reviews'];?></p>
      </div>
</div>
<?php } ?>
	       <!-- <div class="user-location-dynamic">

	       <div class="user-location">
            <p>kanchan bhaskar  
           <span>24 August, 2018     </span> 
          </p>
        </div>
        <div class="user-review-content">
             
        <p> write a comment</p>
      </div>
</div>	 -->      <!--  <div class="user-location-dynamic">

	       <div class="user-location">
            <p>kanchan bhaskar  
          <span>24 August, 2018     </span> 
          </p>
        </div>
        <div class="user-review-content">
             
        <p> write a comment</p>
      </div>
</div> -->
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
<style type="text/css">
  .user-review-content ul {
    padding: 0;
}
  .user-review-content li {
    display: inline-block;
}

</style>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
  


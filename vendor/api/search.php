<?php
  include_once'../Object.php';
  $result=$user->UserSearchResult();
$data[]=array('HotelList'=>$result);
echo json_encode($data);
 ?>

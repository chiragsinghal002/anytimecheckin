<?php 
include_once'Object.php';

if (isset($_POST['id'])) {

  $data['id']=$_POST['id'];
  echo $data['id'];die;

  echo  $resultcancel=$user->bookingCancelled($data);

}
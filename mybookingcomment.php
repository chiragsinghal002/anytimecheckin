<?php 
include_once'Object.php';

session_start();


// if (isset($_POST['writecomment'])) {
//   $data['userid']=$_POST['writecomment'];
//   $data['bookingid']=$_POST['bookingid'];
//   $data['comment']=$_POST['comment'];
//   $data['rating']=$_POST['rating'];
//   $data['hotelid']=$_POST['hotelid'];

//   // echo "<pre>";
//   // print_r($data);
  
// //var_dump($data);die;
//   echo $result=$user->Userreviewcomment($data);
//   if ($result) {
//   	print "<p id='mess' style='color:green;font-size:13px;text-align: center;''>Comment added successfully</p>";
//   }
// }

if(isset($_GET['userid']))
{
  echo $userid=$_GET['userid'];
  echo $bookingid=$_GET['bookingid'];
  echo $comment=$_GET['comment'];
  echo $rating=$_GET['rating'];
  echo $hotelid=$_GET['hotelid'];

 // $result=$user->UserInfobyId($user_id);
  echo $result=$user->Userreviewcomment($userid,$bookingid,$comment,$rating,$hotelid);

}

?>

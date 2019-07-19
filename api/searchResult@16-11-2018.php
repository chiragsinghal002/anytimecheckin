<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
// header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['searchResult']=='SearchResult12345'){
  var_dump($_POST); die;
  $search=$_REQUEST['location'];
  $optradio=$_REQUEST['optradio'];
  $check_in_date=$_REQUEST['check_in_date'];
  $check_in_time=$_REQUEST['check_in_time'];
  $check_out_date=$_REQUEST['check_out_date'];
  $check_out_time=$_REQUEST['check_out_time'];
  $no_of_adults=$_REQUEST['no_of_adults'];
  $no_of_rooms=$_REQUEST['no_of_rooms'];
  $no_of_childs=$_REQUEST['no_of_childs'];
  $lat=$_REQUEST['lat'];
  $lng=$_REQUEST['lng'];
  
  if($optradio=='1'){

    $result=$user->UserSearchResultForday($check_in_date,$check_out_date,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng);
    $data=array('result'=>'success','booking_type'=>'day','searchResult'=>$result);
     var_dump($data);die;

  }else{
   $result=$user->UserSearchResultForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng);
     $data=array('result'=>'success','booking_type'=>'hour','searchResult'=>$result);
 } 

   echo json_encode($data);
}
?>
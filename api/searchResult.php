<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
// header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['searchResult']=='SearchResult12345'){
  // var_dump($_REQUEST);
  $search=$_REQUEST['location'];
  $optradio=$_REQUEST['optradio'];
  $check_in_date=date('Y-m-d',strtotime($_REQUEST['check_in_date']));
  $check_in_time=$_REQUEST['check_in_time'];
  $check_out_date=date('Y-m-d',strtotime($_REQUEST['check_out_date']));
  $check_out_time=$_REQUEST['check_out_time'];
  $no_of_adults=$_REQUEST['no_of_adults'];
  $no_of_rooms=$_REQUEST['no_of_rooms'];
  $no_of_childs=$_REQUEST['no_of_childs'];
  $lat=$_REQUEST['lat'];
  $lng=$_REQUEST['lng'];
  $hr=$_REQUEST['hr'];

  if($optradio=='1'){

    if(!empty($_REQUEST['star0'] || $_REQUEST['star1'] ||$_REQUEST['star2'] || $_REQUEST['star3'] || $_REQUEST['rating1'] || $_REQUEST['rating2'] || $_REQUEST['rating3'] || $_REQUEST['rating4'] || $_REQUEST['rating5'] || $_REQUEST['budget_1'] || $_REQUEST['budget_2'] || $_REQUEST['budget_3'] || $_REQUEST['budget_4'])){

     if(!empty($star0=$_REQUEST['star0'])){
      $star0=$_REQUEST['star0'];
    }else{
      $star0=5;
    }

    if(!empty($star1=$_REQUEST['star1'])){
     $star1=$_REQUEST['star1'];
   }else{
    $star1=5;
  }
  if(!empty($star2=$_REQUEST['star2'])){
   $star2=$_REQUEST['star2'];
 }else{
  $star2=5;
}
if(!empty($star3=$_REQUEST['star3'])){
 $star3=$_REQUEST['star3'];
}else{
  $star3=5;
}
if(!empty($rating1=$_REQUEST['rating1'])){
 $rating1=$_REQUEST['rating1'];
}else{
  $rating1=6;
}
if(!empty($rating2=$_REQUEST['rating2'])){
 $rating2=$_REQUEST['rating2'];
}else{
  $rating2=6;
}
if(!empty($rating3=$_REQUEST['rating3'])){
 $rating3=$_REQUEST['rating3'];
}else{
  $rating3=6;
}
if(!empty($rating4=$_REQUEST['rating4'])){
 $rating4=$_REQUEST['rating4'];
}else{
  $rating4=6;
}
if(!empty($rating5=$_REQUEST['rating5'])){
 $rating5=$_REQUEST['rating5'];
}else{
  $rating5=6;
}
if(!empty($budget_1=$_REQUEST['budget_1'])){
 $budget_1=$_REQUEST['budget_1'];
}else{
  $budget_1=0;
}
if(!empty($budget_2=$_REQUEST['budget_2'])){
 $budget_2=$_REQUEST['budget_2'];
}else{
  $budget_2=0;
}
if(!empty($budget_3=$_REQUEST['budget_3'])){
 $budget_3=$_REQUEST['budget_3'];
}else{
  $budget_3=0;
}
if(!empty($budget_4=$_REQUEST['budget_4'])){
 $budget_4=$_REQUEST['budget_4'];
}else{
  $budget_4=0;
}
$result=$user->searchResultFilterForday($check_in_date,$check_out_date,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$star0,$star1,$star2,$star3,$rating1,$rating2,$rating3,$rating4,$rating5,$budget_1,$budget_2,$budget_3,$budget_4);

if($result >0){
 $total_result= array('total_result'=>count($result));
}else{
 $total_result= 0;
}

if($result >0){
  foreach ($result as $resultdetail) {
    // var_dump($resultdetail);
    $filterresult['hotel_id']=$resultdetail['hotel_id'];


    if (!empty($resultdetail['main_image'])) {
      $thumbimage=explode(".",$resultdetail['main_image']); 
      $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
      // echo '<a href="#">';
      // echo '<img src="image/front/'.$thumbimagefinal.'">';
      // echo '</a>';
      $filterresult['main_image']=$resultdetail['main_image'];
    // $filterresult['thumb_image']= 'front/'.$thumbimagefinal;
    }
    $filterresult['hotel_name']=$resultdetail['hotel_name'];
    $rating=$reviews->AvarageRating($resultdetail['hotel_id']);
    $rate = round($rating['AVG(user_rating)']);
    // $filterresult['avg_rating']=$rate;
    $string = $resultdetail['hotel_description'];
    $string = strip_tags($string);
    $filterresult['hotel_address']=$resultdetail['hotel_address'];
    $filterresult['hotel_city']=$resultdetail['hotel_city'];
    $filterresult['hotel_pin_code']=$resultdetail['hotel_pin_code'];
    $filterresult['hotel_state']=$resultdetail['hotel_state'];
    $filterresult['price_per_day']=$resultdetail['price_per_day'];
    $filterresult['price_per_hour']=$resultdetail['price_per_hour'];
    $filterresult['distance']=$resultdetail['distance'];
    $filterresult['hotel_vendor_id']=$resultdetail['hotel_vendor_id'];
    $filterresult['hotel_latitude']=$resultdetail['hotel_latitude'];
    $filterresult['hotel_longitude']=$resultdetail['hotel_longitude'];
    $filterresult['hotel_country']=$resultdetail['hotel_country'];
    $filterresult['hotel_star_category']=$resultdetail['hotel_star_category'];
    $data1[]=$filterresult;
  }


  // $filterresult['hotel_description']=$string; 

  $data=array('result'=>'success','booking_type'=>'day','total_result'=>$total_result,'searchResult'=>$data1);
}else{
  $data=array('result'=>'failed','msg'=>'No result found');
}

}else{
 $result=$user->UserSearchResultForday($check_in_date,$check_out_date,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng);
     // var_dump($result);
 if(!empty($result)){
   $total_result= array('total_result'=>count($result));
 }else{
   $total_result= 0;
 }
 if(!empty($result)){
  foreach($result as $data){
    $searchdata['hotel_id']=$data['hotel_id'];
    $searchdata['hotel_vendor_id']=$data['hotel_vendor_id'];
    $searchdata['hotel_name']=$data['hotel_name'];
    $searchdata['hotel_address']=$data['hotel_address'];
    $searchdata['hotel_latitude']=$data['hotel_latitude'];
    $searchdata['hotel_longitude']=$data['hotel_longitude'];
    $searchdata['hotel_city']=$data['hotel_city'];
    $searchdata['hotel_pin_code']=$data['hotel_pin_code'];
    $searchdata['hotel_state']=$data['hotel_state'];
    $searchdata['hotel_country']=$data['hotel_country'];
    $searchdata['hotel_star_category']=$data['hotel_star_category'];
      // $searchdata['hotel_description']=$data['hotel_description'];
    $searchdata['main_image']=$data['main_image'];
    $searchdata['distance']=$data['distance'];
    $searchdata['price_per_hour']=$data['price_per_hour'];
    $searchdata['price_per_day']=$data['price_per_day'];
    $data1[]=$searchdata;
  }
    // $search_result=array('hotel_vendor_id'=>$result['hotel_vendor_id'],'hotel_name'=>$result['hotel_name'],'hotel_address'=>$result['hotel_address']);
  $data=array('result'=>'success','booking_type'=>'day','total_result'=>$total_result,'searchResult'=>$data1);
}else{
 $data=array('result'=>'failed','msg'=>'No result found');
}

}

}else{
 if(!empty($_REQUEST['star0'] || $_REQUEST['star1'] || $_REQUEST['star2'] || $_REQUEST['star3'] || $_REQUEST['rating1'] || $_REQUEST['rating2'] || $_REQUEST['rating3'] || $_REQUEST['rating4'] || $_REQUEST['rating5'] || $_REQUEST['budget_1'] || $_REQUEST['budget_2'] || $_REQUEST['budget_3'] || $_REQUEST['budget_4'])){

  $result=$user->UserSearchResultfilterForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$star0,$star1,$star2,$star3,$rating1,$rating2,$rating3,$rating4,$rating5,$budget_1,$budget_2,$budget_3,$budget_4,$hr);
         // var_dump($result);die;
  
  if($result >0){
   $total_result= array('total_result'=>count($result));
 }else{
   $total_result= 0;
 }

 if($result >0){
  foreach ($result as $resultdetail) {
    $filterresult['hotel_id']=$resultdetail['hotel_id'];
    if (!empty($resultdetail['main_image'])) {
      $thumbimage=explode(".",$resultdetail['main_image']); 
      $thumbimagefinal=$thumbimage[0]."_thumb.".$thumbimage[1];
      $filterresult['main_image']=$resultdetail['main_image'];
      // $filterresult['thumb_image']=$thumbimagefinal;
    }
    $filterresult['hotel_name']=$resultdetail['hotel_name'];
    $rating=$reviews->AvarageRating($resultdetail['hotel_id']);
    $rate = round($rating['AVG(user_rating)']);
    // $filterresult['avg_rating']=$rate;
    $filterresult['hotel_address']=$resultdetail['hotel_address'];
    $filterresult['hotel_city']=$resultdetail['hotel_city'];
    $filterresult['hotel_pin_code']=$resultdetail['hotel_pin_code'];
    $filterresult['hotel_state']=$resultdetail['hotel_state'];
    $filterresult['price_per_day']=$resultdetail['price_per_day'];
    $filterresult['price_per_hour']=$resultdetail['price_per_hour'];
    $filterresult['distance']=$resultdetail['distance'];
    $filterresult['hotel_vendor_id']=$resultdetail['hotel_vendor_id'];
    $filterresult['hotel_latitude']=$resultdetail['hotel_latitude'];
    $filterresult['hotel_longitude']=$resultdetail['hotel_longitude'];
    $filterresult['hotel_country']=$resultdetail['hotel_country'];
    $filterresult['hotel_star_category']=$resultdetail['hotel_star_category'];
    $string = $resultdetail['hotel_description'];
    $string = strip_tags($string);
    $data1[]=$filterresult;
  }
  

   // $filterresult['hotel_description']=$resultdetail['hotel_description'];
  $data=array('result'=>'success','booking_type'=>'hour','total_result'=>$total_result,'searchResult'=>$data1);
}else{
  $data=array('result'=>'failed','msg'=>'No result found');
} 

}else{
 $result=$user->UserSearchResultForHour($check_in_date,$check_in_time,$check_out_time,$no_of_adults,$no_of_rooms,$no_of_childs,$lat,$lng,$hr);
 if(!empty($result)){
   $total_result= array('total_result'=>count($result));
 }else{
   $total_result= 0;
 }
 if(!empty($result)){
  foreach($result as $data){
    $searchdata['hotel_id']=$data['hotel_id'];
    $searchdata['hotel_vendor_id']=$data['hotel_vendor_id'];
    $searchdata['hotel_name']=$data['hotel_name'];
    $searchdata['hotel_address']=$data['hotel_address'];
    $searchdata['hotel_latitude']=$data['hotel_latitude'];
    $searchdata['hotel_longitude']=$data['hotel_longitude'];
    $searchdata['hotel_city']=$data['hotel_city'];
    $searchdata['hotel_pin_code']=$data['hotel_pin_code'];
    $searchdata['hotel_state']=$data['hotel_state'];
    $searchdata['hotel_country']=$data['hotel_country'];
    $searchdata['hotel_star_category']=$data['hotel_star_category'];
      // $searchdata['hotel_description']=$data['hotel_description'];
    $searchdata['main_image']=$data['main_image'];
    $searchdata['distance']=$data['distance'];
    $searchdata['price_per_hour']=$data['price_per_hour'];
    $searchdata['price_per_day']=$data['price_per_day'];
    $data1[]=$searchdata;
  }
  $data=array('result'=>'success','booking_type'=>'hour','total_result'=>$total_result,'searchResult'=>$data1);
}else{
  $data=array('result'=>'failed','msg'=>'No result found');
}

}

} 

echo json_encode($data);
}
?>
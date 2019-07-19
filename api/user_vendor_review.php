<?php
include_once'../Object.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

if($_REQUEST['UserReview']=='ARQP12345'){

	$hotel_id=$_REQUEST['hotel_id'];

	$result_review=$reviews->FetchReviews($hotel_id);
	// var_dump($result_review);
	if(!empty($result_review)){
		foreach ($result_review as $result_reviews) {
			  // var_dump($result_reviews);
			if($result_reviews['review_id']==$result_reviews['vreview_id']){
				//$data[]=array('user_reviews'=>$result_reviews['user_reviews'],'user_rating'=>$result_reviews['user_rating'],'user_fname'=>$result_reviews['fname'],'user_lname'=>$result_reviews['lname'],'vreview'=>$result_reviews['vreview']);
				$user_reviews=$result_reviews['user_reviews'];
				$user_rating=$result_reviews['user_rating'];
				$user_fname=$result_reviews['fname'];
				$user_lname=$result_reviews['lname'];
				$vreview=$result_reviews['vreview'];
				$created_at=$result_reviews['created_at'];
			}else{
				//$data[]=array('user_reviews'=>$result_reviews['user_reviews'],'user_rating'=>$result_reviews['user_rating'],'user_fname'=>$result_reviews['fname'],'user_lname'=>$result_reviews['lname'],'vreview'=>NULL);
				$user_reviews=$result_reviews['user_reviews'];
				$user_rating=$result_reviews['user_rating'];
				$user_fname=$result_reviews['fname'];
				$user_lname=$result_reviews['lname'];
				$vreview=NULL;
				$created_at=$result_reviews['created_at'];
			}
			 $data[]=array('user_reviews'=>$user_reviews,'user_rating'=>$user_rating,'user_fname'=>$user_fname,'user_lname'=>$user_lname,'vreview'=>$vreview,'created_at'=>$created_at);
			//$data['user_reviews']=$data;

		}
		  // var_dump($data);
		$result=array('result'=>'success','hotel_id'=>$hotel_id,'reviews'=>$data);
	}else{
		$result=array('result'=>'failed','error'=>'No reviews Found');
	}

	
	
	echo json_encode($result);
}

// 		// vendor section

// 		if($_REQUEST['VendorReview']=='AAZZPP12345'){

// 	$data['hotel_id']=$_REQUEST['hotel_id'];

// 	$vendor_review=$reviews->FetchvendorReviews($data['hotel_id']);	

// 	//foreach ($vendor_review as $result_reviews) {
// 		if($vendor_review==0){
// 		$result=array('result'=>'failed','error'=>'No reviews Found');
// 	}
// 	else{

// 		foreach ($vendor_review as $result_reviews) {


// 		$review=array('hotel_id'=>$result_reviews['vhotel_id'],'vreview'=>$result_reviews['vreview'],'user_type'=>$result_reviews['user_type'],'created_at'=>$result_reviews['created_at'],'v_fname'=>$result_reviews['v_fname'],'v_lname'=>$result_reviews['v_lname']);
// 		$result=array('result'=>'success','VendorReview'=>$review);

// 		$result1[]=$review;


// 	}
// 	//$result=array('result'=>'success','VendorReview'=>$review);
// 	echo json_encode($result1);
// 	}

// 	// }

// }


		// end vendor section


?>

<?php
include("../classes/apidb.php");

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Allow: POST, GET, OPTIONS, PUT, DELETE');

# Get JSON as a string
$json_str = file_get_contents('php://input');

# Get as an object

$json_obj = json_decode($json_str);
$comment_id=$json_obj->comment_id;

 $i=1;
 $result=array();
 $subArray=array();
 	$query=mysqli_query($apiconn,"select * from `ci_user_review` where review_id='$comment_id'");
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		$subArray['status']=1;
		$results=mysqli_fetch_array($query);
		
			$query1=mysqli_query($apiconn,"select * from `user_registration` where user_id='$results[user_id]'");
			$result1=mysqli_fetch_array($query1);
			
			$query11=mysqli_query($apiconn,"select * from `ci_hotels` where hotel_id='$results[hotel_id]'");
			$result11=mysqli_fetch_array($query11);
		
			$subArray['user_id']= $results['user_id']; 
			$subArray['firstname']= $results1['fname'];
			$subArray['lastname']= $results1['lname'];
			$subArray['hotel_id']= $results['hotel_id'];
			$subArray['hotelname']= $results11['hotel_name'];
			$subArray['star_rating']= $results['star_rating']; 
			$subArray['comment']= $results['comment'];
			$subArray['review_status']= $results['review_status']; 
			$subArray['created_date']= $results['created_date'];
			$subArray['modified_date']= $results['modified_date']; 
	
			$result[] =  $subArray ;
		
	$i++;
	}
	else
	{
		$subArray['status'] = 0;
		$subArray['result'] = 'No comment is found';
		$result[] =  $subArray ;
	} 
								
$myJSON = json_encode($result);

echo $myJSON;
?>
							
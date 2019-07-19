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


 $i=1;
 $result=array();
 $subArray=array();
 	$query=mysqli_query($apiconn,"select * from `hotel_booking` order by booking_id desc");
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		$subArray['status']=1;
		while($results=mysqli_fetch_array($query))
		{
			$query1=mysqli_query($apiconn,"select * from `user_registration` where user_id='$results[user_id]'");
			$result1=mysqli_fetch_array($query1);
			
			$query11=mysqli_query($apiconn,"select * from `ci_hotels` where hotel_id='$results[hotel_id]'");
			$result11=mysqli_fetch_array($query11);

			if ($results['booking_status'] ==1 ) {
				$subArray['booking_status']= $results['booking_status'].' '.'for pending';
			}
			elseif($results['booking_status'] ==2 ) {
				$subArray['booking_status']= $results['booking_status'].' '.'for completed';
			}
			elseif($results['booking_status'] ==3 ) {
				$subArray['booking_status']= $results['booking_status'].' '.'for progress';
			}
			elseif($results['booking_status'] ==4 ) {
				$subArray['booking_status']= $results['booking_status'].' '.'for cancelled';
			}
			elseif($results['booking_status'] ==5 ) {
				$subArray['booking_status']= $results['booking_status'].' '.'for deleted';
			}
			
		
			$subArray['user_id']= $results['user_id']; 
			$subArray['firstname']= $results1['fname'];
			$subArray['lastname']= $results1['lname'];
			$subArray['hotel_id']= $results['hotel_id'];
			$subArray['hotelname']= $results11['hotel_name'];
			$subArray['check_in_date']= $results['check_in_date']; 
			$subArray['check_out_date']= $results['check_out_date'];
			$subArray['check_in_time']= $results['check_in_time']; 
			$subArray['check_out_time']= $results['check_out_time'];
			$subArray['no_of_rooms']= $results['no_of_rooms']; 
			$subArray['no_of_adults']= $results['no_of_adults']; 
			$subArray['booked_price']= $results['booked_price']; 
			$subArray['arrival_time']= $results['arrival_time']; 
			$result[] =  $subArray ;
		}
	$i++;
	}
	else
	{
		$subArray['status'] = 0;
		$subArray['result'] = 'No booking is found';
		$result[] =  $subArray ;
	} 
								
$myJSON = json_encode($result);

echo $myJSON;
?>
							
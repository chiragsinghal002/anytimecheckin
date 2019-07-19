<?php 
require_once 'db.php';

class Ad extends DB
{ 
	public function featured_ad(){
		// echo "SELECT * FROM featured_ad where status='1'";die;
			$date=date('Y-m-d');
		// echo "SELECT * FROM featured_ad where effective_From<='$date' and effective_to>='$date' and status='1'";
	
		$check = $this->db->query("SELECT * FROM featured_ad where effective_From<='$date' and effective_to>='$date' and status='1'") or die(mysqli_query($this->db));
		$result = mysqli_num_rows($check);  
		if ($result>0) {  
			while($data = mysqli_fetch_array($check)){
				$ad_data[]=$data;
			}
		}else{
				$ad_data=0;
			}
			return $ad_data;
	}
}
?>
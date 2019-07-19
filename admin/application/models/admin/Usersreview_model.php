<?php
	class Usersreview_model extends CI_Model{

		
		public function get_all_reviews(){
			//$this->db->where('hotel_vendor_id', $id);
			// $query = $this->db->get_where('ci_user_review');
			// return $result = $query->result_array();

			$this->db->select('*');
		$this->db->from('user_reviews');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = user_reviews.hotel_id','Left');
		$this->db->join('user_registration', 'user_registration.user_id = user_reviews.user_id','Left');	
		 //$this->db->where(array('ci_hotels.hotel_vendor_id' => $vid));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
		}

		public function get_review_by_id($id){
			//echo $id;die;
			$query = $this->db->get_where('user_reviews', array('review_id' => $id));
			return $result = $query->row_array();
		}



// get review by booking id

		public function get_review_by_bookingid($id){
			//echo $id;die;
			$query = $this->db->get_where('user_reviews', array('review_id' => $id));
			return $result = $query->row_array();
		}

		// end get review by booking id



public function edit_review($data, $id){
	// echo "<pre>";
	// print_r($data['review_status']);die;
	//echo "UPDATE `user_reviews` SET `restatus`= '".$data['review_status']."' WHERE `review_id` ='4'";die;
	$this->db->query("UPDATE `user_reviews` SET `restatus`= '".$data['review_status']."' WHERE `review_id` ='$id'");
			// $this->db->where('review_id', $id);
			// $this->db->update('user_reviews', $data);
			return true;
		}

		public function delete_review($data, $id){
			$this->db->where('review_id', $id);
			$this->db->update('user_reviews', $data);
			return true;
		}


		

	}

?>
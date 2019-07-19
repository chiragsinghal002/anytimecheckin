<?php
	class Usersreview_model extends CI_Model{

		
		public function get_all_reviews($vid){
			//$this->db->where('hotel_vendor_id', $id);
			// $query = $this->db->get_where('ci_user_review');
			// return $result = $query->result_array();

			$this->db->select('*');
		$this->db->from('user_reviews');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = user_reviews.hotel_id','Left');
		$this->db->join('user_registration', 'user_registration.user_id = user_reviews.user_id','Left');	
		 $this->db->where(array('ci_hotels.hotel_vendor_id' => $vid));
		 $this->db->group_by('user_reviews.hotel_id');

			$query = $this->db->get();
			//$result= $query->result_array();
			// echo "<pre>";
			// print_r($result);		
			
			return $result= $query->result_array();
		}

		// get review by hotel id

		public function get_review_by_hotelid($id){
			$this->db->select('*');
		$this->db->from('user_reviews');
		$this->db->join('user_registration', 'user_registration.user_id = user_reviews.user_id','Left');
		 $this->db->where(array('user_reviews.hotel_id' => $id));	

			$query = $this->db->get();			
			
			return $result= $query->result_array();

			
			// $query = $this->db->get_where('user_reviews', array('hotel_id' => $id));
			// return $result= $query->result_array();
		}

		// get review by hotel id end

		public function get_review_by_id($id){
			$query = $this->db->get_where('user_reviews', array('review_id' => $id));
			$result = $query->row_array();

			return $result = $query->row_array();
		}

public function edit_review($data, $id){
			$this->db->where('review_id', $id);
			$this->db->update('user_reviews', $data);
			return true;
		}

		public function delete_review($data, $id){
			$this->db->where('review_id', $id);
			$this->db->update('user_reviews', $data);
			return true;
		}


		

	}

?>
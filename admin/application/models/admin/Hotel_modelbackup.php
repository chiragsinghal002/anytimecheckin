<?php
	class Hotel_model extends CI_Model{

		public function add_hotel($data){
			$this->db->insert('ci_hotels', $data);
			return true;
		}

		public function get_all_hotels(){
			//$this->db->where('hotel_vendor_id', $id);
			// $query = $this->db->get_where('ci_hotels');
			// return $result = $query->result_array();
			$this->db->select('*');
		$this->db->from('ci_hotels');
		$this->db->join('hotel_featured', 'ci_hotels.hotel_id = hotel_featured.hotel_id','Left');
		$this->db->join('ci_vendors', 'ci_hotels.hotel_vendor_id = ci_vendors.v_id','Left');		
		$query = $this->db->get();
		return $result = $query->result_array();
		}

		// public function get_all_hotels($id){
		// 	$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $id));
		// 	return $result = $query->result_array();
		// }

		public function get_hotel_by_id($id){
			$query = $this->db->get_where('ci_hotels', array('hotel_id' => $id));
			return $result = $query->row_array();
		}


		public function get_hotel_by_vid($vid){
			// $query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));

			$this->db->select('*');
		$this->db->from('ci_hotels');
		$this->db->join('hotel_featured', 'ci_hotels.hotel_id = hotel_featured.hotel_id','Left');	
		 $this->db->where(array('ci_hotels.hotel_vendor_id' => $vid));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
			//var_dump($result);
			// while ($result = $query->row_array()){

			// 	$res[]=$result;
			// }
			//return $result;
		}

		// public function get_hotel_by_vid($vid){
		// 	$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));
		// 	$result = $query->result_array();
		// 	//var_dump($result);
		// 	// while ($result = $query->row_array()){

		// 	// 	$res[]=$result;
		// 	// }
		// 	return $result;
		// }

		public function edit_hotel($data, $id){
			$this->db->where('hotel_id', $id);
			$this->db->update('ci_hotels', $data);
			return true;
		}


		public function edit_featured($data, $id){
			$this->db->where('hotel_id', $id);
			$this->db->update('hotel_featured', $data);
			return true;
		}

		public function add_hotel_featured($data){
			$this->db->insert('hotel_featured', $data);
			return true;
		}

		public function get_hotel_featured_by_id($id){
			$query = $this->db->get_where('hotel_featured', array('hotel_id' => $id));
			return $result = $query->row_array();
		}

	}

?>
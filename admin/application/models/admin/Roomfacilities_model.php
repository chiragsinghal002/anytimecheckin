<?php
	class Roomfacilities_model extends CI_Model{

		public function add_facility($data){
			$this->db->insert('facility_id', $data);
			return true;
		}

		// public function get_all_facility(){
		// 	//$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('facility_id');
		// 	return $result = $query->result_array();
		// }

		public function get_all_facility(){
			$query = $this->db->get_where('facility_id', array('for_room_type' => '1','admin' => '1'));
				return $result = $query->result_array();
		}

		// public function get_all_hotels($id){
		// 	$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $id));
		// 	return $result = $query->result_array();
		// }

		public function get_facility_by_id($id){
			$query = $this->db->get_where('facility_id', array('facility_id' => $id));
			return $result = $query->row_array();
		}


		public function get_hotel_by_vid($vid){
			$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));
			$result = $query->result_array();
			//var_dump($result);
			// while ($result = $query->row_array()){

			// 	$res[]=$result;
			// }
			return $result;
		}

		public function edit_facilities($data, $id){
			
			$this->db->where('facility_id', $id);
			$this->db->update('facility_id', $data);
			return true;
		}

	}

?>
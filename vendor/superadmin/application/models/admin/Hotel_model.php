<?php
	class Hotel_model extends CI_Model{

		public function add_hotel($data){
			$this->db->insert('ci_hotels', $data);
			return true;
		}

		public function get_all_hotels($id){
			$this->db->where('hotel_vendor_id', $id);
			$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $id));
			return $result = $query->result_array();
		}

		public function get_hotel_by_id($id){
			$query = $this->db->get_where('ci_hotels', array('hotel_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_hotel($data, $id){
			$this->db->where('hotel_id', $id);
			$this->db->update('ci_hotels', $data);
			return true;
		}

	}

?>
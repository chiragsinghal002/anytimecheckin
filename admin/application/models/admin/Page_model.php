<?php
	class Page_model extends CI_Model{

		public function add_page($data){
			$this->db->insert('ci_pages', $data);
			return true;
		}

		public function get_all_page(){
			//$this->db->where('hotel_vendor_id', $id);
			$query = $this->db->get_where('ci_pages');
			return $result = $query->result_array();
		}

		// public function get_all_hotels($id){
		// 	$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $id));
		// 	return $result = $query->result_array();
		// }

		public function get_page_by_id($id){
			$query = $this->db->get_where('ci_pages', array('page_id' => $id));
			return $result = $query->row_array();
		}


		

		public function edit_page($data, $id){
			$this->db->where('page_id', $id);
			$this->db->update('ci_pages', $data);
			return true;
		}

	}

?>
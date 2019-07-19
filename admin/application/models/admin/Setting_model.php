<?php
	class Setting_model extends CI_Model{

		// public function add_page($data){
		// 	$this->db->insert('ci_pages', $data);
		// 	return true;
		// }

		// public function get_all_page(){
		// 	//$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('ci_pages');
		// 	return $result = $query->result_array();
		// }

		// public function get_all_hotels($id){
		// 	$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $id));
		// 	return $result = $query->result_array();
		// }

		public function get_setting_by_id(){
			$query = $this->db->get_where('admin_setting', array('setting_id' => 1));
			return $result = $query->row_array();
		}


		

		public function edit_setting($data, $id){
			$this->db->where('setting_id', 1);
			$this->db->update('admin_setting', $data);
			return true;
		}

	}

?>
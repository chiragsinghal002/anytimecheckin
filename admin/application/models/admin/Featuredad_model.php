<?php
	class Featuredad_model extends CI_Model{

		public function add_ad($data){
			$this->db->insert('featured_ad', $data);
			return true;
		}

		public function get_all_ad(){
			//$this->db->where('hotel_vendor_id', $id);
			$query = $this->db->get_where('featured_ad');
			return $result = $query->result_array();
		}

		// public function get_all_hotels($id){
		// 	$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $id));
		// 	return $result = $query->result_array();
		// }

		public function get_ad_by_id($id){
			$query = $this->db->get_where('featured_ad', array('feat_ad_id' => $id));
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

		public function edit_ad($data, $id){
			$this->db->where('feat_ad_id', $id);
			$this->db->update('featured_ad', $data);
			return true;
		}

	}

?>
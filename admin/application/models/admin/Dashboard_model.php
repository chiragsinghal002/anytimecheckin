<?php
	class Dashboard_model extends CI_Model{

		
		public function get_all_registeruser(){
			$this->db->where('is_active', '1');
			$query = $this->db->get('user_registration');
			return $result = $query->result_array();
		}

		


	}

?>
<?php
	class Usermodule_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('ci_v_users', $data);
			return true;
		}

		// public function get_all_users(){
		// 	$query = $this->db->get('ci_v_users');
		// 	return $result = $query->result_array();
		// }



		public function get_all_users($id){
		$this->db->select('*');
		$this->db->from('ci_v_users');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_v_users.hotel_id');				
		$this->db->where(array('ci_hotels.hotel_vendor_id' => $id));
		 
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}



		public function get_user_by_id($id){
			$query = $this->db->get_where('ci_v_users', array('v_user_id'=>$id));
			return $result = $query->row_array();
		}

		public function edit_user($data, $id){
			$this->db->where('v_user_id', $id);
			$this->db->update('ci_v_users', $data);
			return true;
		}

	}

?>
<?php
	class User_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('ci_users', $data);
			return true;
		}

		public function add_user_role($data){
			$this->db->insert('ci_user_role', $data);
			return true;
		}

		public function add_assign_role($data){
			$this->db->insert('ci_v_assign_role', $data);
			return true;
		}

		public function get_all_users(){
			$query = $this->db->get('ci_users');
			return $result = $query->result_array();
		}


		public function get_user_role(){
			$query = $this->db->get('ci_user_role');
			return $result = $query->result_array();
		}

		public function get_user_by_id($id){
			$query = $this->db->get_where('ci_users', array('id' => $id));
			return $result = $query->row_array();
		}

		public function get_assign_by_id($id){
			$query = $this->db->get_where('ci_v_assign_role', array('v_assign_role' => $id));
			return $result = $query->row_array();
		}


		public function get_assign_list_by_id($id){
		$this->db->select('*');
		$this->db->from('ci_v_assign_role');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_v_assign_role.hotel_id');
		$this->db->join('ci_v_users', 'ci_v_users.v_user_id = ci_v_assign_role.v_user_id');
		$this->db->join('ci_user_role', 'ci_user_role.user_role_id = ci_v_assign_role.v_user_profile_id');
		 $this->db->where(array('ci_hotels.hotel_vendor_id' => $id));
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}

		public function edit_user_assign_role($data, $id){
			$this->db->where('v_assign_role', $id);
			$this->db->update('ci_v_assign_role', $data);
			return true;
		}

		public function edit_user($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_users', $data);
			return true;
		}

	}

?>
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

		public function get_vendor_by_id($id){
			$query = $this->db->get_where('ci_vendors', array('v_id' => $id));
			return $result = $query->row_array();
		}

		public function get_user_by_role_id($id){
			$query = $this->db->get_where('ci_v_assign_role', array('v_user_id' => $id));
			return $result = $query->row_array();
		}

		public function get_assign_by_id($id){
			$query = $this->db->get_where('ci_v_assign_role', array('v_assign_role' => $id));
			return $result = $query->row_array();
		}


		public function get_assign_list_by_id($search=false,$id){
		$this->db->select('*');
		$this->db->from('ci_v_assign_role');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_v_assign_role.hotel_id');
		$this->db->join('ci_v_users', 'ci_v_users.v_user_id = ci_v_assign_role.v_user_id');
	    	if(!empty($search) && $search['role']!="")
            {
	    	    $this->db->where(array('ci_v_assign_role.v_user_profile_id' => $search['role']));
            }
	    	if(!empty($search) && $search['email']!="")
            {
	    	    $this->db->where(array('ci_v_users.user_email' => $search['email']));
            }
	    	if(!empty($search) && $search['hotel']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_name' => $search['hotel']));
            }
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('ci_v_users.user_status' => $search['status']));
            }
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

		public function edit_user_profile($data, $id){
			$this->db->where('v_id', $id);
			$this->db->update('ci_vendors', $data);
			return true;
		}

	}

?>
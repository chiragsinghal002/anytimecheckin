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
		// public function get_all_users($search=false,$id){
		$this->db->select('*');
		$this->db->from('ci_v_users');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_v_users.hotel_id');				
		if(!empty($search) && $search['first_name']!="")
            {
	    	    $this->db->where(array('ci_v_users.user_fname' => $search['first_name']));
            }
            if(!empty($search) && $search['last_name']!="")
            {
	    	    $this->db->where(array('ci_v_users.user_lname' => $search['last_name']));
            }
            if(!empty($search) && $search['email']!="")
            {
	    	    $this->db->where(array('ci_v_users.user_email' => $search['email']));
            }
            if(!empty($search) && $search['mobile']!="")
            {
	    	    $this->db->where(array('ci_v_users.user_mob_no' => $search['mobile']));
            }
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('ci_v_users.user_status' => $search['status']));
            }
           
		$this->db->where(array('ci_hotels.hotel_vendor_id' => $id));
		 
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}

			public function get_user_by_email($email){
			$query = $this->db->get_where('ci_v_users', array('user_email'=>$email));
			return $result = $query->row_array();
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
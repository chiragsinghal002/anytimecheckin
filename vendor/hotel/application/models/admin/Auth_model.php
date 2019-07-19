<?php
	class Auth_model extends CI_Model{

		public function login($data){

			$query = $this->db->get_where('ci_vendors', array('v_email' => $data['email'],'status' => '1','v_pass' => $data['password']));
			if ($query->num_rows() == 1){
				$result = $query->row_array();
				return $result = $query->row_array();

				//return false;
			}
			// else{
			// 	//Compare the password attempt with the password we have stored.
			// 	$result = $query->row_array();

			//     $validPassword = password_verify($data['password'], $result['v_pass']);
			//     if($validPassword){
			//         return $result = $query->row_array();
			//     }
				
			// }
		}

		// roles login
		public function roleslogin($data){

			$this->db->select('*');
		$this->db->from('ci_v_assign_role');
		$this->db->join('ci_v_users', 'ci_v_assign_role.v_user_id = ci_v_users.v_user_id','Left');
		
		$query = $this->db->where(array('ci_v_assign_role.v_user_email' =>$data['email'],'v_status' => '1','v_user_password' => $data['password']));

			$query = $this->db->get();		
			
			// return $result= $query->result_array();

			// $query = $this->db->get_where('ci_v_assign_role', array('v_user_email' => $data['email'],'v_status' => '1','v_user_password' => $data['password']));
			if ($query){
				return $result= $query->row_array();

				//return false;
			}
			// else{
			// 	//Compare the password attempt with the password we have stored.
			// 	$result = $query->row_array();

			//     $validPassword = password_verify($data['password'], $result['v_pass']);
			//     if($validPassword){
			//         return $result = $query->row_array();
			//     }
				
			// }
		}
		// roles login end

		public function forgot($data){
			
			// $this->db->where('v_email', $data['email_to']);
			// $up = $this->db->update('ci_vendors', array('v_pass' => $data['password']));
			// if ($up) {
				$query = $this->db->get_where('ci_vendors', array('v_email' => $data['email_to'],'status' => '1'));
			if ($query->num_rows() == 1){
				$result = $query->row_array();
				return $result = $query->row_array();

				//return false;
			}
			// }
			
			// else{
			// 	//Compare the password attempt with the password we have stored.
			// 	$result = $query->row_array();

			//     $validPassword = password_verify($data['password'], $result['v_pass']);
			//     if($validPassword){
			//         return $result = $query->row_array();
			//     }
				
			// }
		}

		public function rolereset($data){
			
			// $this->db->where('v_user_email', $data['email_to']);
			// $up = $this->db->update('ci_v_assign_role', array('v_user_password' => $data['password']));
			// if ($up) {
				$query = $this->db->get_where('ci_v_assign_role', array('v_user_email' => $data['email_to'],'v_status' => '1'));
			if ($query->num_rows() == 1){
				$result = $query->row_array();
				return $result = $query->row_array();

				//return false;
			}
			// }
			
			
		}

		public function change_pwd($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_users', $data);
			return true;
		}

		// public function password_verify($data){
		// 	$query = $this->db->get_where('ci_vendors', array('v_pass' => $data['password']));
		// 	return true;
		// }



	}

?>
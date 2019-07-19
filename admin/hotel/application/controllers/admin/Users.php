<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/user_model', 'user_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
			$this->load->model('admin/usermodule_model', 'usermodule_model');
		}

		public function index(){
			$id = $this->session->userdata('admin_id');
			$data['all_users'] =  $this->user_model->get_assign_list_by_id($id);
			$data['view'] = 'admin/users/user_assign_list';
			$this->load->view('admin/layout', $data);

		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/users/user_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'username' => $this->input->post('firstname').' '.$this->input->post('lastname'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_admin' => $this->input->post('user_role'),
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['view'] = 'admin/users/user_add';
				$this->load->view('admin/layout', $data);
			}
			
		}



// add user role
public function addrole(){
	$id = $this->session->userdata('admin_id');

	$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
	
			if($this->input->post('submit')){

				$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
				$this->form_validation->set_rules('user_role_name', 'Role Name', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/users/user_role_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'hotel_id' => $this->input->post('hotel_id'),
						'user_role_name' => $this->input->post('user_role_name'),
						'status' => $this->input->post('status'),
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->add_user_role($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/users/addrole'));
					}
				}
			}
			else{
				$data['view'] = 'admin/users/user_role_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

// end add user role

		// assign user role
public function assignrole(){
	$id = $this->session->userdata('admin_id');
	$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
	$data['user_list'] =  $this->usermodule_model->get_all_users($id);
	$data['user_role'] =  $this->user_model->get_user_role();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
				$this->form_validation->set_rules('v_user_id', 'User', 'trim|required');
				$this->form_validation->set_rules('v_user_profile_id', 'Role', 'trim|required');
				$this->form_validation->set_rules('v_user_email', 'Email', 'trim|required');
				$this->form_validation->set_rules('v_user_password', 'Password', 'trim|required');
				$this->form_validation->set_rules('v_status', 'Status', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/users/user_assign_role';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'hotel_id' => $this->input->post('hotel_id'),
						'v_user_id' => $this->input->post('v_user_id'),
						'v_user_profile_id' => $this->input->post('v_user_profile_id'),
						'v_user_email' => $this->input->post('v_user_email'),
						'v_user_password' =>  password_hash($this->input->post('v_user_password'), PASSWORD_BCRYPT),
						'v_status' =>  '1',
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->add_assign_role($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['view'] = 'admin/users/user_assign_role';
				$this->load->view('admin/layout', $data);
			}
			
		}

// end assign user role

// edit user assign role

		public function editassignrole($id = 0){
			$id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
	$data['user_list'] =  $this->usermodule_model->get_all_users($id);
	$data['user_role'] =  $this->user_model->get_user_role();
			if($this->input->post('submit')){
				$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
				$this->form_validation->set_rules('v_user_id', 'User', 'trim|required');
				$this->form_validation->set_rules('v_user_profile_id', 'Role', 'trim|required');
				$this->form_validation->set_rules('v_user_email', 'Email', 'trim|required');
				$this->form_validation->set_rules('v_status', 'Status', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->user_model->get_assign_by_id($id);					
					$data['view'] = 'admin/users/user_assign_role_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'hotel_id' => $this->input->post('hotel_id'),
						'v_user_id' => $this->input->post('v_user_id'),
						'v_user_profile_id' => $this->input->post('v_user_profile_id'),
						'v_user_email' => $this->input->post('v_user_email'),
						'v_status' => $this->input->post('v_status'),
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->edit_user_assign_role($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['user'] = $this->user_model->get_assign_by_id($id);
				$data['view'] = 'admin/users/user_assign_role_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		// end edit user assign role




		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->user_model->get_user_by_id($id);
					$data['view'] = 'admin/users/user_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'username' => $this->input->post('firstname').' '.$this->input->post('lastname'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_admin' => $this->input->post('user_role'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->edit_user($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['user'] = $this->user_model->get_user_by_id($id);
				$data['view'] = 'admin/users/user_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('ci_users', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/users'));
		}

		public function delassign($id = 0){
			$this->db->delete('ci_v_assign_role', array('v_assign_role' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/users'));
		}

	}


?>
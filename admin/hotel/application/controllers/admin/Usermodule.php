<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usermodule extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/usermodule_model', 'usermodule_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
		}

		public function index(){
			 $id = $this->session->userdata('admin_id');
			$data['all_users'] =  $this->usermodule_model->get_all_users($id);
			$data['view'] = 'admin/usermodule/user_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			 $id = $this->session->userdata('admin_id');
			 
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
			if($this->input->post('submit')){

				$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
				$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
				$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/usermodule/user_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'hotel_id' => $this->input->post('hotel_id'),
						'user_fname' => $this->input->post('firstname'),
						'user_lname' => $this->input->post('lastname'),
						'user_email' => $this->input->post('email'),
						'user_mob_no' => $this->input->post('mobile_no'),
						'user_address' => $this->input->post('address'),
						'user_designation' => $this->input->post('designation'),
						'user_status' => $this->input->post('status'),
						'created_at' => date('Y-m-d : h:m:s'),
						'modified_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->usermodule_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/usermodule'));
					}
				}
			}
			else{
				$data['view'] = 'admin/usermodule/user_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){

			 $uid = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
			if($this->input->post('submit')){
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
				$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->usermodule_model->get_user_by_id($id);					
					$data['view'] = 'admin/usermodule/user_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'hotel_id' => $this->input->post('hotel_id'),
						'user_fname' => $this->input->post('firstname'),
						'user_lname' => $this->input->post('lastname'),
						'user_email' => $this->input->post('email'),
						'user_mob_no' => $this->input->post('mobile_no'),
						'user_address' => $this->input->post('address'),
						'user_designation' => $this->input->post('designation'),
						'user_status' => $this->input->post('status'),					
						'modified_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->usermodule_model->edit_user($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/usermodule'));
					}
				}
			}
			else{
				$data['user'] = $this->usermodule_model->get_user_by_id($id);
				
				$data['view'] = 'admin/usermodule/user_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('ci_v_users', array('v_user_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/usermodule'));
		}

	}


?>
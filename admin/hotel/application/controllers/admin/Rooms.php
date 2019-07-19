<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Rooms extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/room_model', 'room_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
		}

		public function index(){
			$id = $this->session->userdata('admin_id');
			$data['all_rooms'] =  $this->room_model->get_all_rooms($id);
			$data['view'] = 'admin/rooms/room_list';
			$this->load->view('admin/layout', $data);
		}

		public function roomtype(){
			$id = $this->session->userdata('admin_id');
			$data['all_rooms'] =  $this->room_model->get_room_type_list_and_hotels($id);
			

			// $data['hotel'] =  $this->room_model->get_hotel_room_by_id();
			$data['view'] = 'admin/rooms/room_type_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			$data['room_types'] =  $this->room_model->get_all_room_type();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('room_type_id', 'Room Type', 'trim|required');
				$this->form_validation->set_rules('room_name', 'Room Name', 'trim|required');
				$this->form_validation->set_rules('room_no', 'Room No', 'trim|required');
				$this->form_validation->set_rules('room_location', 'Room Location', 'trim|required');
			
				$this->form_validation->set_rules('room_facilities', 'Room Facility', 'trim|required');
				$this->form_validation->set_rules('room_capacity', 'Room Capacity', 'trim|required');
				$this->form_validation->set_rules('room_description', 'Room Description', 'trim|required');
				$this->form_validation->set_rules('room_hourly_charge', 'Room Hourly Charge', 'trim|required');
				$this->form_validation->set_rules('room_fixed_charge', 'Room Fixed Charge', 'trim|required');
								

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/rooms/room_add';
					$this->load->view('admin/layout',$data);
				}
				else{
					$data = array(						
						'room_type_id' => $this->input->post('room_type_id'),
						'room_name' => $this->input->post('room_name'),
						'room_no' => $this->input->post('room_no'),
						'room_location' => $this->input->post('room_location'),
						'room_description' => $this->input->post('room_description'),
						'room_facilities' => $this->input->post('room_facilities'),
						'room_capacity' => $this->input->post('room_capacity'),
						'room_hourly_charge' => $this->input->post('room_hourly_charge'),
						'room_fixed_charge' => $this->input->post('room_fixed_charge'),
						'status' => '0',
						'created_at' => date('Y-m-d : h:m:s'),
						'modified_at' => date('Y-m-d : h:m:s'),					

						
					);

					$data = $this->security->xss_clean($data);
					$result = $this->room_model->add_room($data);					
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/rooms'));
					}
				}
			}
			else{
				$data['view'] = 'admin/rooms/room_add';
				$this->load->view('admin/layout', $data);
			}
			
		}




		public function addroomtype(){
			$id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
			if($this->input->post('submit')){

				$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
				$this->form_validation->set_rules('hotel_room_type', 'Room Name', 'trim|required');
				$this->form_validation->set_rules('hours_price', 'Hourly Price', 'trim|required');
				$this->form_validation->set_rules('day_price', 'Day Price', 'trim|required');
							

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/rooms/room_type_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						
						'hotel_id' => $this->input->post('hotel_id'),
						'hotel_room_type' => $this->input->post('hotel_room_type'),	
						'status' => '1',
						'created_at' =>date('Y-m-d : h:m:s'),
						'modified_at' =>date('Y-m-d : h:m:s'),
						'hours_price' => $this->input->post('hours_price'),
						'day_price' => $this->input->post('day_price'),	
						'person' => $this->input->post('person'),			

						
					);
					
					$data = $this->security->xss_clean($data);
					$result = $this->room_model->add_room_type($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/rooms/roomtype'));
					}
				}
			}
			else{
				$data['view'] = 'admin/rooms/room_type_add';
				$this->load->view('admin/layout', $data);
			}
			
		}


		public function edit($id = 0){
			$data['room_types'] =  $this->room_model->get_all_room_type();
			if($this->input->post('submit')){
				$this->form_validation->set_rules('room_type_id', 'Room Type', 'trim|required');
				$this->form_validation->set_rules('room_name', 'Room Name', 'trim|required');
				$this->form_validation->set_rules('room_no', 'Room No', 'trim|required');
				$this->form_validation->set_rules('room_location', 'Room Location', 'trim|required');
			
				$this->form_validation->set_rules('room_facilities', 'Room Facility', 'trim|required');
				$this->form_validation->set_rules('room_capacity', 'Room Capacity', 'trim|required');
				$this->form_validation->set_rules('room_hourly_charge', 'Room Hourly Charge', 'trim|required');
				$this->form_validation->set_rules('room_fixed_charge', 'Room Fixed Charge', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['room'] = $this->room_model->get_hotel_room_by_id($id);
					$data['view'] = 'admin/rooms/room_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						
						'room_type_id' => $this->input->post('room_type_id'),
						'room_name' => $this->input->post('room_name'),
						'room_no' => $this->input->post('room_no'),
						'room_location' => $this->input->post('room_location'),
						'room_description' => $this->input->post('room_description'),
						'room_facilities' => $this->input->post('room_facilities'),
						'room_capacity' => $this->input->post('room_capacity'),
						'room_hourly_charge' => $this->input->post('room_hourly_charge'),
						'room_fixed_charge' => $this->input->post('room_fixed_charge'),
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->room_model->edit_room($data,$id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/rooms'));
					}
				}
			}
			else{
				$data['room'] = $this->room_model->get_hotel_room_by_id($id);
				$data['view'] = 'admin/rooms/room_edit';
				$this->load->view('admin/layout', $data);
			}
		}


		public function editroomtype($id = 0){
			$uid = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
	// $data['user_list'] =  $this->usermodule_model->get_all_users();
	// $data['user_role'] =  $this->user_model->get_user_role();
			if($this->input->post('submit')){
				$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
				$this->form_validation->set_rules('hotel_room_type', 'Room Type', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				// $this->form_validation->set_rules('v_user_email', 'Email', 'trim|required');
				// $this->form_validation->set_rules('v_status', 'Status', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['roomtype'] = $this->room_model->get_roomtype_by_id($id);					
					$data['view'] = 'admin/rooms/room_type_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						//'room_type_id' => $this->input->post('room_type_id'),
						'hotel_id' => $this->input->post('hotel_id'),
						'hotel_room_type' => $this->input->post('hotel_room_type'),
						'status' => $this->input->post('status'),
						'modified_at' => date('Y-m-d : h:m:s'),
						
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->room_model->edit_room_type($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/rooms/roomtype'));
					}
				}
			}
			else{
				$data['roomtype'] = $this->room_model->get_roomtype_by_id($id);
				$data['view'] = 'admin/rooms/room_type_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('hotel_rooms', array('hotel_room_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/rooms'));
		}

		public function delroomtype($id = 0){
			$this->db->delete('ci_room_type', array('room_type_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/rooms/roomtype'));
		}

	}


?>
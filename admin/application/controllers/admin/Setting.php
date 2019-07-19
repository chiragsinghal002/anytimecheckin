<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/setting_model', 'setting_model');
		//$this->load->model('admin/hotel_model', 'hotel_model');

	}


	public function index($id = 0){

		//$data['room_types'] =  $this->room_model->get_all_room_type();
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('admin_name', 'admin_name', 'trim|required');
			$this->form_validation->set_rules('admin_email', 'admin_email', 'trim|required');
			$this->form_validation->set_rules('admin_discount', 'admin_discount', 'trim|required');
			$this->form_validation->set_rules('admin_phone', 'admin_phone', 'trim|required');
			
			$this->form_validation->set_rules('admin_locate', 'admin_locate', 'trim|required');
			

			if ($this->form_validation->run() == FALSE) {
				$data['pageview'] = $this->setting_model->get_setting_by_id($id);
				$data['view'] = 'admin/setting/setting_add';
				$this->load->view('admin/layout', $data);
			}
			else{
				$data = array(

					'admin_name' => $this->input->post('admin_name'),
					'admin_email' => $this->input->post('admin_email'),
					'admin_discount' => $this->input->post('admin_discount'),
					'admin_phone' => $this->input->post('admin_phone'),
					'admin_locate' => $this->input->post('admin_locate'),
					

				);
				$data = $this->security->xss_clean($data);
				$result = $this->setting_model->edit_setting($data,1);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/setting'));
				}
			}
		}
		else{
			$data['pageview'] = $this->setting_model->get_setting_by_id($id);
			$data['view'] = 'admin/setting/setting_add';
			$this->load->view('admin/layout', $data);
		}
	}


	public function index1(){
		$id = $this->session->userdata('admin_id');
		$data['all_rooms'] =  $this->room_model->get_all_rooms($id);
		$data['view'] = 'admin/rooms/room_list';
		$this->load->view('admin/layout', $data);
	}

	public function roomtype(){
		$uid = $this->session->userdata('admin_id');

		$data['all_rooms'] =  $this->room_model->get_room_type_list_and_hotels($uid);
		$data['vendor_facility'] =  $this->room_model->get_vendor_facilities($uid);


			// $data['hotel'] =  $this->room_model->get_hotel_room_by_id();
		$data['view'] = 'admin/rooms/room_type_list';
		$this->load->view('admin/layout', $data);
	}

	// For room type list based on hotel id
	public function RoomTypeId_ForHotelId(){
		$hotel_id=$_GET['hotel_id'];
		// $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		$data =  $this->room_model->get_room_by_id($hotel_id);
		// $this->load->view('admin/layout', $data);
		// var_dump($data);
		echo '<option value="'.'0'.'">'.'Select Room'.'</option>';
		foreach ($data as $room_type) {
		// echo $data['room_type']['room_type_id'];
	 		// var_dump($room_type);
			$room_type_id=$room_type['room_type_id'];
			$room_type_name=$room_type['hotel_room_type'];
			echo '<option value="'.$room_type_id.'">'.$room_type_name.'</option>';
		}
	}
	// Close this function

	public function CreateRoom(){
		$id = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);

		//echo $this->input->post('hotel');



		$data['room_types'] =  $this->room_model->get_all_room_type();
		if($this->input->post('submit')){
			$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');

			$this->form_validation->set_rules('room_type_id', 'Room Type', 'trim|required');			
			$this->form_validation->set_rules('no_of_rooms', 'Number of rooms', 'trim|required');
			


			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/rooms/create_room';
				$this->load->view('admin/layout',$data);
			}
			else{
				$data = array(	

					'user_id' => $this->session->userdata('admin_id'),
					'hotel_id' => $this->input->post('hotel_id'),					
					'room_type_id' => $this->input->post('room_type_id'),
					
					'room_no' => $this->input->post('no_of_rooms'),					
					'room_status' => '1',
					'created_at' => date('Y-m-d : h:m:s'),
					


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
			$data['view'] = 'admin/rooms/create_room';
			$this->load->view('admin/layout', $data);
		}

	}



	public function addroomin(){
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



		// Used for create room
	public function CreateRoom1(){
		$id = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		$data['room_types'] =  $this->room_model->get_all_room_type();
		if($this->input->post('submit')){

		//	$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
		//	$this->form_validation->set_rules('room_type_id', 'Room Type', 'trim|required');
			$this->form_validation->set_rules('no_of_rooms', 'Number of rooms', 'trim|required');
			//$this->form_validation->set_rules('room_name', 'Room Name', 'trim|required');
			//$this->form_validation->set_rules('room_no', 'Room No', 'trim|required');
			//$this->form_validation->set_rules('room_location', 'Room Location', 'trim|required');
			//$this->form_validation->set_rules('room_facilities', 'Room Facility', 'trim|required');
			//$this->form_validation->set_rules('room_capacity', 'Room Capacity', 'trim|required');
			//$this->form_validation->set_rules('room_description', 'Room Description', 'trim|required');
			//$this->form_validation->set_rules('room_hourly_charge', 'Room Hourly Charge', 'trim|required');
			//$this->form_validation->set_rules('room_fixed_charge', 'Room Fixed Charge', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/rooms/create_room';
				$this->load->view('admin/layout',$data);
			}
			else{
				$data = array(						
					'room_type_id' => $this->input->post('room_type_id'),
					'room_name' => $this->input->post('room_name'),
					'room_no' => $this->input->post('no_of_rooms'),
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
			$data['view'] = 'admin/rooms/create_room';
			$this->load->view('admin/layout', $data);
		}

	}





	public function addroomtype(){
		$uid = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
		$data['admin_facility'] =  $this->room_model->get_admin_facilities();
		$data['vendor_facility'] =  $this->room_model->get_vendor_facilities($uid);
		if($this->input->post('submit')){

			if (!empty($_POST['admin_facility'])) {
				$adminfacilities = $_POST['admin_facility'];
				$adminfac = implode(",",$adminfacilities); 

			}else{
				$adminfac = '';
			}

			if (!empty($_POST['vendor_facility'])) {
				$venfacilities = $_POST['vendor_facility'];
				$vandorfac = implode(",",$venfacilities);				


			}else{
				$vandorfac = '';
			}



			
			

			$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
			$this->form_validation->set_rules('hotel_room_type', 'Room Name', 'trim|required');
			$this->form_validation->set_rules('hours_price', 'Hourly Price', 'trim|required');
			$this->form_validation->set_rules('day_price', 'Day Price', 'trim|required');

			$this->form_validation->set_rules('description', 'Description', 'trim|required');


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
					'price_per_hour' => $this->input->post('hours_price'),
					'price_per_day' => $this->input->post('day_price'),	
						

					'adult_person_capacity' => $this->input->post('adult_person_capacity'),	
					'child_capacity' => $this->input->post('child_capacity'),
					'admin_facility' => $adminfac,	
					'vendor_facility' => $vandorfac,
					'description' => $this->input->post('description'),			


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
		//$data['room_types'] =  $this->room_model->get_all_room_type();
		if($this->input->post('submit')){
			$this->form_validation->set_rules('admin_name', 'admin_name', 'trim|required');
			$this->form_validation->set_rules('admin_email', 'admin_email', 'trim|required');
			$this->form_validation->set_rules('admin_discount', 'admin_discount', 'trim|required');
			$this->form_validation->set_rules('admin_phone', 'admin_phone', 'trim|required');
			
			$this->form_validation->set_rules('admin_locate', 'admin_locate', 'trim|required');
			

			if ($this->form_validation->run() == FALSE) {
				$data['pageview'] = $this->setting_model->get_setting_by_id($id);
				$data['view'] = 'admin/setting/setting_add';
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
				$result = $this->setting_model->edit_room($data,$id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/rooms'));
				}
			}
		}
		else{
			$data['pageview'] = $this->setting_model->get_setting_by_id($id);
			$data['view'] = 'admin/setting/setting_add';
			$this->load->view('admin/layout', $data);
		}
	}


	public function editroomtype($id = 0){
		$uid = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
		$data['admin_facility'] =  $this->room_model->get_admin_facilities();
		$data['vendor_facility'] =  $this->room_model->get_vendor_facilities($uid);
	// $data['user_list'] =  $this->usermodule_model->get_all_users();
	// $data['user_role'] =  $this->user_model->get_user_role();
		if($this->input->post('submit')){

			$adminfacilities = $_POST['admin_facility'];
			$adminfac = implode(",",$adminfacilities); 

			$venfacilities = $_POST['vendor_facility'];
			$vandorfac = implode(",",$venfacilities); 

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
					'price_per_hour' => $this->input->post('hours_price'),
					'price_per_day' => $this->input->post('day_price'),	
						//'person' => $this->input->post('person'),

					'adult_person_capacity' => $this->input->post('adult_person_capacity'),	
					'child_capacity' => $this->input->post('child_capacity'),
					'admin_facility' => $adminfac,	
					'vendor_facility' => $vandorfac,
					'description' => $this->input->post('description'),			



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
		$this->db->delete('hotels_room_inventory', array('room_inventory_id' => $id));
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
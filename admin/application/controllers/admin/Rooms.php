<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Rooms extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/room_model', 'room_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
		}

		// room avilable
	public function roomavilable(){
		if($this->session->userdata('role') ==1){

			$id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_manager_hotels($id);
			$hotel_id=$data['all_hotels'][0]['hotel_id'];
			$data['room_types'] =  $this->room_model->get_room_by_id($hotel_id);
			// 
			$room_type_id=$data['room_types'][0]['room_type_id'];
			//$this->session->set_flashdata('msg', 'Result Found Successfully!');
			//$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
			$data['price']=$this->room_model->price_base_of_roomtypeid($hotel_id,$room_type_id);
			$data['all_details']=$this->room_model->all_room_details($hotel_id,$room_type_id);
			$data['view'] = 'admin/rooms/room_avilable';
			$this->load->view('admin/layout', $data);

			// 
			
		}else{
			$id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
			$data['view'] = 'admin/rooms/room_avilable';
			$this->load->view('admin/layout', $data);
		}
		
	}

	// room avilable
	public function roomavilable1(){
		$id = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		
	}

	// room avilable
	public function TimmingAvilable(){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
			$this->form_validation->set_rules('room_type_id', 'Room Type', 'trim|required');
			$this->form_validation->set_rules('check_in', 'Select Date', 'trim|required');
			if($this->form_validation->run()==TRUE){
				// echo 'chirag';
				$data = array(	

					'user_id' => $this->session->userdata('admin_id'),
					'hotel_id' => $this->input->post('hotel_id'),					
					'room_type_id' => $this->input->post('room_type_id'),
					'check_in' => $this->input->post('check_in')					
					
				);

				$data = $this->security->xss_clean($data);
				$id = $this->session->userdata('admin_id');
			//$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
					$this->session->set_flashdata('msg', 'Result Found Successfully!');
					$data['all_hotels'] =  $this->hotel_model->get_all_hotels1();
				$hotel_id=$data['hotel_id'];
				$room_type_id=$data['room_type_id'];
				$data['price']=$this->room_model->price_base_of_roomtypeid($hotel_id,$room_type_id);
				// var_dump($data['price']);die;
				$data['all_details']=$this->room_model->all_room_details($hotel_id,$room_type_id);
				// var_dump($data['all_details']);die;
				$this->session->set_flashdata('msg', 'Result Found Successfully!');
				$data['view'] = 'admin/rooms/room_avilable';
				$this->load->view('admin/layout', $data);

			}else{
				// echo 'chirag1';
				// $id = $this->session->userdata('admin_id');
				$data['all_hotels'] =  $this->hotel_model->get_all_hotels1();
				$data['view'] = 'admin/rooms/room_avilable';
				$this->load->view('admin/layout', $data);
			}
			

		}else{
			// if($this->session->userdata('role') ==1){
			// 	$this->roomavilable();
			// }else{
				// $id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels1();
			$data['view'] = 'admin/rooms/room_avilable';
			$this->load->view('admin/layout', $data);
			// }
			
			
			
		}
	}


		public function index(){
			$id = $this->session->userdata('admin_id');
			$data['all_rooms'] =  $this->room_model->get_all_rooms($id);
			$data['view'] = 'admin/rooms/room_list';
			$this->load->view('admin/layout', $data);
		}

		public function roomtype()
		{
			$id = $this->session->userdata('admin_id');
			if(!empty($_GET) && $_GET['submit']=="Search")
			{
			    $data['all_rooms'] =  $this->room_model->get_room_type_list_and_hotels($_GET);
			}
			else
			{
			    $data['all_rooms'] =  $this->room_model->get_room_type_list_and_hotels();
			}
			

			$data['vendor_facility'] =  $this->room_model->get_room_facilities();

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
			$data['admin_facility'] =  $this->room_model->get_admin_facilities();
		$data['vendor_facility'] =  $this->room_model->get_vendor_facilities($id);
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
						'created_at' =>date('Y-m-d h:m:s'),
						'modified_at' =>date('Y-m-d h:m:s'),
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


	// 	public function editroomtype($id = 0){
	// 		$uid = $this->session->userdata('admin_id');
	// 		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
	// // $data['user_list'] =  $this->usermodule_model->get_all_users();
	// // $data['user_role'] =  $this->user_model->get_user_role();
	// 		if($this->input->post('submit')){
	// 			$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
	// 			$this->form_validation->set_rules('hotel_room_type', 'Room Type', 'trim|required');
	// 			$this->form_validation->set_rules('status', 'Status', 'trim|required');
	// 			// $this->form_validation->set_rules('v_user_email', 'Email', 'trim|required');
	// 			// $this->form_validation->set_rules('v_status', 'Status', 'trim|required');
				

	// 			if ($this->form_validation->run() == FALSE) {
	// 				$data['roomtype'] = $this->room_model->get_roomtype_by_id($id);					
	// 				$data['view'] = 'admin/rooms/room_type_edit';
	// 				$this->load->view('admin/layout', $data);
	// 			}
	// 			else{
	// 				$data = array(
	// 					//'room_type_id' => $this->input->post('room_type_id'),
	// 					'hotel_id' => $this->input->post('hotel_id'),
	// 					'hotel_room_type' => $this->input->post('hotel_room_type'),
	// 					'status' => $this->input->post('status'),
	// 					'modified_at' => date('Y-m-d : h:m:s'),
						
						
	// 				);
	// 				$data = $this->security->xss_clean($data);
	// 				$result = $this->room_model->edit_room_type($data, $id);
	// 				if($result){
	// 					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
	// 					redirect(base_url('admin/rooms/roomtype'));
	// 				}
	// 			}
	// 		}
	// 		else{
	// 			$data['roomtype'] = $this->room_model->get_roomtype_by_id($id);
	// 			$data['view'] = 'admin/rooms/room_type_edit';
	// 			$this->load->view('admin/layout', $data);
	// 		}
	// 	}

		public function editroomtype($id = 0){

		$uid = $this->session->userdata('admin_id');

if($this->session->userdata('role') ==1){
			$data['hotel_detail'] =  $this->hotel_model->get_manager_hotels($uid);
			// echo "<pre>";
			// print_r($data['hotel_detail']);

			$vid = $data['hotel_detail'][0]['hotel_vendor_id'];
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($vid);
			$data['admin_facility'] =  $this->room_model->get_admin_facilities();
		$data['vendor_facility'] =  $this->room_model->get_vendor_facilities($vid);
			

		}
		else{

		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
		$data['admin_facility'] =  $this->room_model->get_admin_facilities();
		$data['vendor_facility'] =  $this->room_model->get_vendor_facilities($uid);
	}

		// $data['admin_facility'] =  $this->room_model->get_admin_facilities();
		// $data['vendor_facility'] =  $this->room_model->get_vendor_facilities($uid);
	
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

	public function price_per_day(){
		$hotel_id=$_GET['hotel_id'];
		$room_type_id=$_GET['room_type_id'];
		$date=$_GET['id'];
		$price_per_day=$_GET['price_per_day'];
		$exp=explode(',',$date);
		// var_dump($exp);
		
		$data=array($exp[0],$exp[1],$exp[2],$hotel_id,$room_type_id,$price_per_day);
		$result=$this->room_model->price_per_day($data);
		
		
	}

	public function price_per_hour(){
		$hotel_id=$_GET['hotel_id'];
		$room_type_id=$_GET['room_type_id'];
		$date=$_GET['id'];
		$price_per_hour=$_GET['price_per_hour'];
		$exp=explode(',',$date);
		 //var_dump($exp);
		
		$data=array($exp[0],$exp[1],$exp[2],$hotel_id,$room_type_id,$price_per_hour);
		var_dump($data);
		$result=$this->room_model->price_per_hour($data);
		
		
	}

	public function rooms_booked(){
		$hotel_id=$_GET['hotel_id'];
		$room_type_id=$_GET['room_type_id'];
		$date=$_GET['id'];
		$rooms_booked=$_GET['rooms_booked'];
		$exp=explode(',',$date);
		// var_dump($exp);
		
		$data=array($exp[0],$exp[1],$exp[2],$hotel_id,$room_type_id,$rooms_booked);
		$result=$this->room_model->rooms_booked($data);
		
		
	}

	// For room availbale per day basis
	public function rooms_available(){
		$hotel_id=$_GET['hotel_id'];
		$room_type_id=$_GET['room_type_id'];
		$date=$_GET['id'];
		$no_of_rooms=$_GET['no_of_rooms'];
		$exp=explode(',',$date);
		// var_dump($exp);
		
		$data=array($exp[0],$exp[1],$exp[2],$hotel_id,$room_type_id,$no_of_rooms);
		$result=$this->room_model->rooms_available($data);
		
		
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

		// For room type list based on hotel id
	public function RoomTypeId_ForHotelId(){
	$hotel_id=$_GET['hotel_id'];
		// $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		$data =  $this->room_model->get_room_by_id($hotel_id);
		// $this->load->view('admin/layout', $data);
		 $data1=array('0'=>$data);
		echo '<option value="">'.'Select Room'.'</option>';
		foreach ($data1 as $room_type) {
		// echo $data['room_type']['room_type_id'];
	 		 
			$room_type_id=$room_type['room_type_id'];
			$room_type_name=$room_type['hotel_room_type'];
			echo '<option value="'.$room_type_id.'">'.$room_type_name.'</option>';
		}
	}
	// Close this function

	}


?>
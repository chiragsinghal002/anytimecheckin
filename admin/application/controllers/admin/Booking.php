<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Booking extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/room_model', 'room_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
			$this->load->model('admin/booking_model', 'booking_model');
		}

		public function index()
		{
			//$id = $this->session->userdata('admin_id');
        	if(!empty($this->input->get('searchbooking')))
        	{
        	    $hotelname=$this->input->get('hotelname');
        	    $datefrom=$this->input->get('datefrom');
        	    $dateto=$this->input->get('dateto');
        	    $todaybooking=$this->input->get('todaybooking');
        	    $status=$this->input->get('status');
        	    
        	       $data['all_booking'] =  $this->booking_model->get_all_booking_searchfilter($hotelname,$datefrom,$dateto,$todaybooking,$status);
        	}
        	else
        	{
        			$data['all_booking'] =  $this->booking_model->get_all_booking();
        	}		
			$data['view'] = 'admin/booking/booking_list';
			$this->load->view('admin/layout', $data);
		}



// Export data in CSV format
	public function exportCSV(){
		//$id = $this->session->userdata('admin_id');
		
		// file name
		$filename = 'booking_'.date('Ymd').'.csv';
		
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; "); 

		// get data
		$usersData = $this->booking_model->get_all_booking();

		// file creation
		$file = fopen('php://output', 'w');

		$header = array("Name","Hotel","Booking Id","Check In","Check Out","No. of Rooms","Booking Price (RM)","Actual Price (RM)","Discount Price (RM)","Booking Status","Booking Date");
		fputcsv($file, $header);

		foreach ($usersData as $key=>$row){

			$original = $row['check_in_date'];
           $check_in_date = date("d/m/Y", strtotime($original));

            $original1 = $row['check_out_date'];
           $check_out_date = date("d/m/Y", strtotime($original1));

           if ($row['booking_status'] ==1) {
           	$status = 'Pending';
           }
           	elseif ($row['booking_status'] ==2) {
           	$status = 'Completed';
           }
           	elseif ($row['booking_status'] ==3) {
           	$status = 'Progress';
           }
           	else{
           		$status = 'Cancel';

           	}
           
           $ordate = $row['book_created_at'];
           $booking_date = date("d/m/Y", strtotime($ordate));

			//$status = ($row['status'] == '1')?'Active':'Inactive';

			

		  $lineData = array($row['fname'].' '.$row['lname'], $row['hotel_name'], $row['hotel_booking_id'], $check_in_date, $check_out_date, $row['no_of_rooms'],$row['booked_price'],$row['actual_price'],$row['discount_price'],$status,$booking_date);

		 fputcsv($file,$lineData);
		}

		fclose($file);
		exit;
	}

// end Export data in CSV format


	// hotel detail view
	public function view($id){
		 //$id = $this->session->userdata('admin_id');
		$data['view_booking'] =  $this->booking_model->get_hotel_booking_by_id($id);
		$hid = $data['view_booking']['hotel_id'];
		$rid = $data['view_booking']['room_type_id'];

		$data['view_discount'] =  $this->booking_model->GetDiscountbyhotelandroomid($hid,$rid);
		
		
		$data['view'] = 'admin/booking/live_booking_view';
		

		$this->load->view('admin/layout', $data);
	}
	// end hotel detail view

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
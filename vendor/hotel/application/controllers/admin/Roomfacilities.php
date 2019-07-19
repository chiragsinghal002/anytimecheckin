<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Roomfacilities extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/roomfacilities_model', 'roomfacilities_model');
			$this->load->model('admin/room_model', 'room_model');
		$this->load->model('admin/hotel_model', 'hotel_model');
			
		}

		public function index(){
			$id = $this->session->userdata('admin_id');
			if(!empty($_GET) && $_GET['submit']=="Search")
			{
			    $data['all_facility'] =  $this->roomfacilities_model->get_all_facility($_GET,$id);
			}
			else
			{
			$data['all_facility'] =  $this->roomfacilities_model->get_all_facility($search='',$id);
			}
			
			$data['view'] = 'admin/roomfacilities/facilities_list';
			
			
			$this->load->view('admin/layout', $data);
		}

		public function vendorhotels($id = 0){
			//$id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_hotel_by_vid($id);
			// foreach ($data['all_hotels'] as $allhotels) {
			
			// $vid = $allhotels['hotel_vendor_id'];
			// $data['user_detail'] =  $this->user_model->get_user_by_id($vid);
			
			// }

			// echo "<pre>";
			// print_r($data['all_hotels']);
			
			$data['view'] = 'admin/hotels/hotel_list';
			
			
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




		
		public function add(){

			// // test code
			// $imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
			// $config['upload_path']   = $imagefilefolder; 
   //    $config['allowed_types'] = 'gif|jpeg|jpg|png'; 
   //    $config['max_size']      = 2048;
   //    $this->load->library('upload', $config);

   //    if ( ! $this->upload->do_upload('image')) {
   //       $error = array('error' => $this->upload->display_errors()); 
   //       $this->load->view('admin/roomfacilities/facilities_add', $error); 
   //    }else { 
   //       echo "Upload Successful";
   //       exit;
   //    } 
   

			// test code end

			$id = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		$data['room_types'] =  $this->room_model->get_all_room_type();
			if($this->input->post('submit')){
				// echo "<pre>";
				// print_r($_POST);die;

							
				$this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required');
				 //$this->form_validation->set_rules('image', 'image', 'image');
				// $this->form_validation->set_rules('effective_From', 'Date From', 'trim|required');
				// $this->form_validation->set_rules('effective_to', 'Date To', 'trim|required');
				
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				 	

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/roomfacilities/facilities_add';
					$this->load->view('admin/layout', $data);
				}
				else{
				// 	if(!empty($_FILES['image']['name']))
				// {
				// 	$filesCount = count($_FILES['image']['name']);
				// 	for($i = 0; $i < $filesCount; $i++)
				// 	{
				// 		$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
				// 		$fileimage=date("mdyhis").$_FILES['image']['name'][$i];
				// 		if(move_uploaded_file($_FILES['image']['tmp_name'][$i],$imagefilefolder.$fileimage))
				// 		{
				// 			//echo "yes";
				// 		}
						
				// 	   $upload_file[]     = $fileimage;
				// 	}
					//$uploadedimages = implode(', ', $upload_file);
					$data = array(
						'vendor_id' => $this->session->userdata('admin_id'),
						'hotel_id' => $this->input->post('hotel_id'),					
						'room_type_id' => $this->input->post('room_type_id'),
						'facility_name' => $this->input->post('facility_name'),
						//'image' => $uploadedimages,
						'vendor' => '1',
						'for_room_type' => '1',
						'status' => $this->input->post('status'),				
						'created_at' => date('Y-m-d H:i:s'),
						

						
						
					);
					// echo "<pre>";
					// print_r($data);
					// die;

					$data = $this->security->xss_clean($data);
					$result = $this->roomfacilities_model->add_facility($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/roomfacilities'));
					}
				// }
			}
			}
			else{
				$data['view'] = 'admin/roomfacilities/facilities_add';
				$this->load->view('admin/layout', $data);
			}
			
		}




		public function edit($id = 0){
			if($this->input->post('submit')){
				// echo "<pre>";
				// print_r($_POST);
				// print_r($_FILES);
				// die;

				$this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required');
				 //$this->form_validation->set_rules('banner', 'Banner', 'trim|required');
				// $this->form_validation->set_rules('effective_From', 'Date From', 'trim|required');
				// $this->form_validation->set_rules('effective_to', 'Date To', 'trim|required');
				
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['ad'] = $this->roomfacilities_model->get_facility_by_id($id);
					$data['view'] = 'admin/roomfacilities/facilities_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					
					if(!empty($_FILES['image']['name']))
				{

					// $filesCount = count($_FILES['image']['name']);
					// for($i = 0; $i < $filesCount; $i++)
					// {
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['image']['name'];
						if(move_uploaded_file($_FILES['image']['tmp_name'],$imagefilefolder.$fileimage))
						{
							//echo "yes";
						}
						
					//    $upload_file[]     = $fileimage;
					// }
					// $uploadedimages = implode(', ', $upload_file);


					$data = array(
						
						'facility_name' => $this->input->post('facility_name'),
						'image' => $fileimage,
						// 'admin' => '1',
						// 'for_hotel' => '1',
						'status' => $this->input->post('status'),				
						'created_at' => date('Y-m-d : h:m:s'),
						
						
					);
					// echo '<pre>';
					// print_r($data);die;

					$data = $this->security->xss_clean($data);
					$result = $this->roomfacilities_model->edit_facilities($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/roomfacilities'));
					}
				}
				else{

					$data = array(
						
						'facility_name' => $this->input->post('facility_name'),
						//'image' => $uploadedimages,
						// 'admin' => '1',
						// 'for_hotel' => '1',
						'status' => $this->input->post('status'),				
						//'created_at' => date('Y-m-d : h:m:s'),
						
						
					);
					// echo '<pre>';
					// print_r($data);die;

					$data = $this->security->xss_clean($data);
					$result = $this->roomfacilities_model->edit_facilities($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/roomfacilities'));
					}

				}
				}
			}
			else{
				$data['ad'] = $this->roomfacilities_model->get_facility_by_id($id);
				$data['view'] = 'admin/roomfacilities/facilities_edit';
				$this->load->view('admin/layout', $data);
			}
		}


		public function view($id = 0){
			
			
				$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
				$data['view'] = 'admin/hotels/hotel_view';
				$this->load->view('admin/layout', $data);
			
		}

		public function del($id = 0){
			$this->db->delete('facility_id', array('facility_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/roomfacilities'));
		}

	}


?>
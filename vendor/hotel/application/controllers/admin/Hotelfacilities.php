<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Hotelfacilities extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/hotelfacilities_model', 'hotelfacilities_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
			
		}

		public function index(){
			$id = $this->session->userdata('admin_id');
			
			if(!empty($_GET) && $_GET['submit']=="Search")
			{
			    $data['all_facility'] =  $this->hotelfacilities_model->get_all_facility($_GET,$id);
			}
			else
			{
			    $data['all_facility'] =  $this->hotelfacilities_model->get_all_facility($search='',$id);
			}
			
			$data['view'] = 'admin/hotelfacilities/facilities_list';
			
			
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



		
		public function add(){
			$id = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
			if($this->input->post('submit')){
				
				//$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
				$this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required');
				 //$this->form_validation->set_rules('banner', 'Banner', 'trim|required');
				// $this->form_validation->set_rules('effective_From', 'Date From', 'trim|required');
				// $this->form_validation->set_rules('effective_to', 'Date To', 'trim|required');
				
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				 	

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/hotelfacilities/facilities_add';
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
						'facility_name' => $this->input->post('facility_name'),
						//'image' => $uploadedimages,
						'vendor' => '1',
						'for_hotel' => '1',
						'status' => $this->input->post('status'),				
						'created_at' => date('Y-m-d : h:m:s'),
						

						
						
					);
					// echo "<pre>";
					// print_r($data);
					// die;

					$data = $this->security->xss_clean($data);
					$result = $this->hotelfacilities_model->add_facility($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/hotelfacilities'));
					}
				// }
			}
			}
			else{
				$data['view'] = 'admin/hotelfacilities/facilities_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		// public function edit($id = 0){
		// 	if($this->input->post('submit')){				

		// 		$this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required');				 
		// 		$this->form_validation->set_rules('status', 'Status', 'trim|required');
				

		// 		if ($this->form_validation->run() == FALSE) {
		// 			$data['ad'] = $this->hotelfacilities_model->get_facility_by_id($id);
		// 			$data['view'] = 'admin/hotelfacilities/facilities_edit';
		// 			$this->load->view('admin/layout', $data);
		// 		}
		// 		else{
					
		// 			if(!empty($_FILES['image']['name']))
		// 		{					

		// 			$filesCount = count($_FILES['image']['name']);
		// 			for($i = 0; $i < $filesCount; $i++)
		// 			{
		// 				$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
		// 				$fileimage=date("mdyhis").$_FILES['image']['name'][$i];
		// 				if(move_uploaded_file($_FILES['image']['tmp_name'][$i],$imagefilefolder.$fileimage))
		// 				{
		// 					//echo "yes";
		// 				}
						
		// 			   $upload_file[]     = $fileimage;
		// 			}
		// 			$uploadedimages = implode(', ', $upload_file);


		// 			$data = array(
						
		// 				'facility_name' => $this->input->post('facility_name'),
		// 				'image' => $uploadedimages,
		// 				// 'admin' => '1',
		// 				// 'for_hotel' => '1',
		// 				'status' => $this->input->post('status'),				
		// 				'created_at' => date('Y-m-d : h:m:s'),
						
						
		// 			);
		// 			// echo '<pre>';
		// 			// print_r($data);die;

		// 			$data = $this->security->xss_clean($data);
		// 			$result = $this->hotelfacilities_model->edit_facilities($data, $id);
		// 			if($result){
		// 				$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
		// 				redirect(base_url('admin/hotelfacilities'));
		// 			}
		// 		}
		// 		else{
		// 			$data = array(						
		// 				'facility_name' => $this->input->post('facility_name'),		
		// 				'status' => $this->input->post('status'),						
						
		// 			);
					

		// 			$data = $this->security->xss_clean($data);
		// 			$result = $this->hotelfacilities_model->edit_facilities($data, $id);
		// 			if($result){
		// 				$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
		// 				redirect(base_url('admin/hotelfacilities'));
		// 			}

		// 		}
		// 		}
		// 	}
		// 	else{
		// 		$data['ad'] = $this->hotelfacilities_model->get_facility_by_id($id);
		// 		$data['view'] = 'admin/hotelfacilities/facilities_edit';
		// 		$this->load->view('admin/layout', $data);
		// 	}
		// }


		public function edit($id = 0){
			if($this->input->post('submit')){
				
				$this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required');
				
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['ad'] = $this->hotelfacilities_model->get_facility_by_id($id);
					$data['view'] = 'admin/hotelfacilities/facilities_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					
					if(!empty($_FILES['image']['name']))
				{

					$filesCount = count($_FILES['image']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['image']['name'][$i];
						if(move_uploaded_file($_FILES['image']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							//echo "yes";
						}
						
					   $upload_file[]     = $fileimage;
					}
					$uploadedimages = implode(', ', $upload_file);


					$data = array(
						
						'facility_name' => $this->input->post('facility_name'),
						'image' => $uploadedimages,
						// 'admin' => '1',
						// 'for_hotel' => '1',
						'status' => $this->input->post('status'),				
						'created_at' => date('Y-m-d : h:m:s'),
						
						
					);
					// echo '<pre>';
					// print_r($data);die;

					$data = $this->security->xss_clean($data);
					$result = $this->hotelfacilities_model->edit_facilities($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/hotelfacilities'));
					}
				}
				else{

					$data = array(
						
						'facility_name' => $this->input->post('facility_name'),		
						'status' => $this->input->post('status'),						
						
						
					);
					// echo '<pre>';
					// print_r($data);die;

					$data = $this->security->xss_clean($data);
					$result = $this->hotelfacilities_model->edit_facilities($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/hotelfacilities'));
					}

				}
				}
			}
			else{
				$data['ad'] = $this->hotelfacilities_model->get_facility_by_id($id);
				$data['view'] = 'admin/hotelfacilities/facilities_edit';
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
			redirect(base_url('admin/hotelfacilities'));
		}

	}


?>
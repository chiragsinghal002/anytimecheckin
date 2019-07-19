<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Featuredad extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/featuredad_model', 'featuredad_model');
			
		}

		public function index(){
			//$id = $this->session->userdata('admin_id');
			$data['all_ad'] =  $this->featuredad_model->get_all_ad();
			// foreach ($data['all_hotels'] as $allhotels) {
			
						
			// }
			
			$data['view'] = 'admin/featuredad/featuredad_list';
			
			
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
			if($this->input->post('submit')){
				// echo "<pre>";
				// print_r($_POST);die;

							
				$this->form_validation->set_rules('ad_name', 'Featured AD Name', 'trim|required');
				 //$this->form_validation->set_rules('banner', 'Banner', 'trim|required');
				$this->form_validation->set_rules('effective_From', 'Date From', 'trim|required');
				$this->form_validation->set_rules('effective_to', 'Date To', 'trim|required');
				
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				 	

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/featuredad/featuredad_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					if(!empty($_FILES['banner']['name']))
				{
					$filesCount = count($_FILES['banner']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['banner']['name'][$i];
						if(move_uploaded_file($_FILES['banner']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							 $config['image_library'] = 'gd2';
	                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
	                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/front/'.$fileimage;
	                        $config['create_thumb'] = TRUE;
	                        $config['maintain_ratio'] = TRUE;
	                        $config['width']         = 547;
	                        $config['height']       = 246;
	                       
	
	                         $this->load->library('image_lib', $config);
	                        $this->image_lib->initialize($config);
	
	                        $this->image_lib->resize();
						}
						
					   $upload_file[]     = $fileimage;
					}
					$uploadedimages = implode(', ', $upload_file);
					$data = array(
						//'hotel_vendor_id' => $this->session->userdata('admin_id'),
						'ad_name' => $this->input->post('ad_name'),
						'banner' => $uploadedimages,
						'effective_From' => $this->input->post('effective_From'),
						'effective_to' => $this->input->post('effective_to'),
						'url' => $this->input->post('url'),
						'status' => $this->input->post('status'),				
						'created_at' => date('Y-m-d : h:m:s'),
						

						
						
					);
					// echo "<pre>";
					// print_r($data);
					// die;

					$data = $this->security->xss_clean($data);
					$result = $this->featuredad_model->add_ad($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/featuredad'));
					}
				}
			}
			}
			else{
				$data['view'] = 'admin/featuredad/featuredad_add';
				$this->load->view('admin/layout', $data);
			}
			
		}



////////////////// edit featured ad/////////////////////

public function edit($id = 0){
                
		$upload_file=array();
        // If file upload form submitted
        if(!empty($this->input->post('submit')))
		{
				$this->form_validation->set_rules('ad_name', 'Featured AD Name', 'trim|required');
				 //$this->form_validation->set_rules('banner', 'Banner', 'trim|required');
				$this->form_validation->set_rules('effective_From', 'Date From', 'trim|required');
				$this->form_validation->set_rules('effective_to', 'Date To', 'trim|required');
				
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				     
           	if ($this->form_validation->run() == FALSE) {
				$data['ad'] = $this->featuredad_model->get_ad_by_id($id);
					$data['view'] = 'admin/featuredad/featuredad_edit';
					$this->load->view('admin/layout', $data);
			}
			else
			{

			    if(!empty($_FILES['banner']['name']))
				{


					$data['ad'] = $this->featuredad_model->get_ad_by_id($id);
					// echo "<pre>";
					// print_r($data['room_photos']);die;
					// $filesCount = count($_FILES['hotel']['name']);
					// for($i = 0; $i < $filesCount; $i++)
					// {
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['banner']['name'];

						if(move_uploaded_file($_FILES['banner']['tmp_name'],$imagefilefolder.$fileimage))
						{
							$config['image_library'] = 'gd2';
	                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
	                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/front/'.$fileimage;
	                        $config['create_thumb'] = TRUE;
	                        $config['maintain_ratio'] = TRUE;
	                        $config['width']         = 547;
	                        $config['height']       = 246;
	                       
	
	                         $this->load->library('image_lib', $config);
	                        $this->image_lib->initialize($config);
	
	                        $this->image_lib->resize();
						}
						
					   $upload_files= $fileimage;
					   
					// }
					   $uploadedimages = $upload_files;

					// $uploadedimages = implode(',', $upload_file);
					if(!empty($data['banner']['banner']))
					{
						
						$uploadedimages = $upload_files;
					    // $upload_file=array_merge($data['room_photos']['main_image'],$upload_files);
					    // $uploadedimages = implode(',', $upload_file);
					}
					else
					{
						$uploadedimages = $upload_files;
					   // $uploadedimages = implode(',', $upload_files); 
					}
					$data = array(

						'ad_name' => $this->input->post('ad_name'),
						//'banner' => $this->input->post('banner'),
						'effective_From' => $this->input->post('effective_From'),
						'effective_to' => $this->input->post('effective_to'),
						'url' => $this->input->post('url'),
						'status' => $this->input->post('status'),	
						'banner' => $uploadedimages,

				);
					// echo "<pre>";
					// print_r($data);die;
				$data = $this->security->xss_clean($data);
				$result = $this->featuredad_model->edit_ad($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/featuredad'));
				}
				}
				else
				{
					$data = array(

							'ad_name' => $this->input->post('ad_name'),
						//'banner' => $this->input->post('banner'),
						'effective_From' => $this->input->post('effective_From'),
						'effective_to' => $this->input->post('effective_to'),
						'url' => $this->input->post('url'),
						'status' => $this->input->post('status'),	


				);
				$data = $this->security->xss_clean($data);
				$result = $this->featuredad_model->edit_ad($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/featuredad'));
				}
				}
			} 
		}
	   else
		{
			$eid=$this->uri->segment('4');
			$data['ad'] = $this->featuredad_model->get_ad_by_id($eid);
			// echo "<pre>";
			// print_r($data['hotel']);
			$data['view'] = 'admin/featuredad/featuredad_edit';
			$this->load->view('admin/layout', $data);

        }
            
    }


		////////////// end edit featured ad////////////////




		public function edit1($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('ad_name', 'Featured AD Name', 'trim|required');
				 //$this->form_validation->set_rules('banner', 'Banner', 'trim|required');
				$this->form_validation->set_rules('effective_From', 'Date From', 'trim|required');
				$this->form_validation->set_rules('effective_to', 'Date To', 'trim|required');
				
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['ad'] = $this->featuredad_model->get_ad_by_id($id);
					$data['view'] = 'admin/featuredad/featuredad_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						
						'ad_name' => $this->input->post('ad_name'),
						//'banner' => $this->input->post('banner'),
						'effective_From' => $this->input->post('effective_From'),
						'effective_to' => $this->input->post('effective_to'),
						'status' => $this->input->post('status'),				
						//'created_at' => date('Y-m-d : h:m:s'),
						
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->featuredad_model->edit_ad($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/featuredad'));
					}
				}
			}
			else{
				$data['ad'] = $this->featuredad_model->get_ad_by_id($id);
				$data['view'] = 'admin/featuredad/featuredad_edit';
				$this->load->view('admin/layout', $data);
			}
		}


		public function view($id = 0){
			
			
				$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
				$data['view'] = 'admin/hotels/hotel_view';
				$this->load->view('admin/layout', $data);
			
		}

		public function del($id = 0){
			$this->db->delete('featured_ad', array('feat_ad_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/featuredad'));
		}

	}


?>
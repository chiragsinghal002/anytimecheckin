<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Hotels extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/hotel_model', 'hotel_model');
			$this->load->model('admin/user_model', 'user_model');
			$this->load->model('admin/room_model', 'room_model');
		}

		public function index(){
			//$id = $this->session->userdata('admin_id');
			
			if(!empty($_GET) && $_GET['submit']=="Search")
			{
			    $data['all_hotels'] =  $this->hotel_model->get_all_hotels($_GET);
			}
			else
			{
			    $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id=false);
			}
			
			foreach ($data['all_hotels'] as $allhotels) {
			
			// echo $vid = $allhotels['hotel_vendor_id'];
			$hotelid = $allhotels['hotel_id'];
			
			// $data['user_detail'] =  $this->user_model->get_user_by_id($vid);

			$data['detail'][] =  $this->hotel_model->get_hotel_featured_by_id($hotelid);

			
			
			}
			// var_dump($data['detail']);
			$data['view'] = 'admin/hotels/hotel_list';
			
			
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

				if(!empty($_POST['cars']==3)){
					$this->form_validation->set_rules('check_in', 'Check In', 'trim|required');
				 $this->form_validation->set_rules('check_out', 'Check Out', 'trim|required');
				}

				
				$this->form_validation->set_rules('hotel_name', 'Hotel Name', 'trim|required');
				 $this->form_validation->set_rules('hotel_email', 'Email', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('pincode', 'Pin Code', 'trim|required');
				// $this->form_validation->set_rules('website', '', 'trim|required');
				// $this->form_validation->set_rules('mobile_no', '', 'trim|required');
				$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
				 $this->form_validation->set_rules('mini_hour', 'Minimum Hour', 'trim|required');
				 $this->form_validation->set_rules('max_hour', 'Maximum Hour', 'trim|required');
				// $this->form_validation->set_rules('star_category', '', 'trim|required');
				// $this->form_validation->set_rules('description', '', 'trim|required');
				
								

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/hotels/hotel_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'hotel_vendor_id' => $this->session->userdata('admin_id'),
						'hotel_name' => $this->input->post('hotel_name'),
						'hotel_address' => $this->input->post('hotel_address'),
						'hotel_city' => $this->input->post('city'),
						'hotel_pin_code' => $this->input->post('pincode'),
						'hotel_website' => $this->input->post('website'),
						'hotel_mobile' => $this->input->post('mobile_no'),
						'hotel_telephone' => $this->input->post('telephone'),
						'hotel_fax' => $this->input->post('fax'),
						'hotel_airport' => $this->input->post('airport'),
						'hotel_star_category' => $this->input->post('star_category'),
						'hotel_description' => $this->input->post('description'),						
						'hotel_created_date' => date('Y-m-d : h:m:s'),
						'hotel_modified_date' => date('Y-m-d : h:m:s'),
						'hotel_email' => $this->input->post('hotel_email'),

						'any' => $this->input->post('cars'),
						'check_in' => $this->input->post('check_in'),
						'check_out' => $this->input->post('check_out'),
						'min_hour' => $this->input->post('mini_hour'),
						'max_hour' => $this->input->post('max_hour'),

						
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->hotel_model->add_hotel($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/hotels'));
					}
				}
			}
			else{
				$data['view'] = 'admin/hotels/hotel_add';
				$this->load->view('admin/layout', $data);
			}
			
		}


public function hotelfeaturededit($id){
				// echo $id;
				// echo $_GET['alot'];

				// die;
			// if(isset($_GET['alotto']))
			// 	{
			// 		echo $_GET['alotto'];die;
			// 	}

			if($id){


				// if ($this->form_validation->run() == FALSE) {
				// 	//$data['hotel'] = $this->user_model->get_hotel_by_id($id);
				// 	$data['view'] = 'admin/hotels';
				// 	$this->load->view('admin/layout', $data);
				// }
				// else{
					$data['featuredid'] = $this->hotel_model->get_hotel_featured_by_id($id);

					$hotelid = $data['featuredid']['hotel_id'];
					

					$data = array(
						
						'hotel_id' => $id,
						'status' => $this->input->get('alot'),
						'added' => date('Y-m-d : h:m:s'),
												
					);
					
						//echo $data['hotel_id'];die;
					
					if (!empty($data['hotel_id'])) {
						// echo "<pre>";
						// print_r('kanchan');die;
									

						$data = $this->security->xss_clean($data);

						$result = $this->hotel_model->edit_featured($data, $id);
					

					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/hotels'));
					}
					}else{
						// 	echo "<pre>";
						// print_r('edit');die;	
						
					$data = $this->security->xss_clean($data);
					$result = $this->hotel_model->add_hotel_featured($data,$id);
					

					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/hotels'));
					}


					}		
					
					
				// }
			}
			else{
				$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
				$data['view'] = 'admin/hotels/hotel_view';
				$this->load->view('admin/layout', $data);
			}
		}

        //edit hotel
		public function edit($id)
		{
			if($this->input->post('submit'))
			{

				$data = array(
				    'hotel_id' => $id,
					'hotel_name' => $this->input->post('hotel_name'),
					'hotel_address' => $this->input->post('hotel_address'),
					'hotel_city' => $this->input->post('city'),
					'hotel_pin_code' => $this->input->post('pincode'),
					'hotel_website' => $this->input->post('website'),
					'hotel_mobile' => $this->input->post('mobile_no'),
					'hotel_telephone' => $this->input->post('telephone'),
					'hotel_fax' => $this->input->post('fax'),
					'hotel_airport' => $this->input->post('airport'),
					'hotel_star_category' => $this->input->post('star_category'),
					'hotel_description' => $this->input->post('description')
					);
					
				$data = $this->security->xss_clean($data);
				$result = $this->hotel_model->edit_hotel($data,$id);
				if($result)
				{
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/hotels'));
				}
			}
			else
			{
				$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
				$data['view'] = 'admin/hotels/hotel_edit';
				$this->load->view('admin/layout', $data);
			}
		}

        // view hotel
		public function view($id = 0){

			
				$data['featured'] = $this->hotel_model->get_hotel_featured_by_id($id);
				$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);

				$data['admin_facility'] =  $this->hotel_model->get_admin_facilities();

				$data['view'] = 'admin/hotels/hotel_view';
				$this->load->view('admin/layout', $data);
			
		}

		public function del($id = 0){
			$this->db->delete('ci_hotels', array('hotel_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/hotels'));
		}
		
		public function hotelphoto_list()
		{
            if($this->session->userdata('role') ==1)
            {
				$id = $this->session->userdata('admin_id');
		 	    $data['all_rooms'] =  $this->hotel_model->get_manager_hotel_photo($id);
			}
	    	else
	    	{
            	$id = $this->session->userdata('admin_id');
	        	$data['all_rooms'] =  $this->hotel_model->get_all_hotel_photo($id);
	        }
	    	$data['view'] = 'admin/hotels/hotelphoto_list';
	    	$this->load->view('admin/layout', $data);
	    }
	    
	    //Add hotel photos
	    public function addhotelphotos()
	    {
    		 $id = $this->session->userdata('admin_id');
    		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
    		$data['room_type'] =  $this->room_model->get_all_room_type();		
                
    		$upload_file=array();
            // If file upload form submitted
            if(!empty($_POST['submit']))
    		{	
    			$hid = $_POST['hotel_id'];
    			$data['hoteldetail'] =  $this->hotel_model->get_hotel_imageby_id($hid);
    			
    			
    			$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');        
                //$this->form_validation->set_rules('room_id', 'Room Type', 'trim|required');
                //$this->form_validation->set_rules('hotel', 'Image', 'trim|required');               
               // $this->form_validation->set_rules('room_status', 'Status', 'trim|required');
                    
                    
                if ($this->form_validation->run() == FALSE) {
                        $data['view'] = 'admin/hotels/hotel_add_photo';
                        $this->load->view('admin/layout', $data);
                }
    			else
    			{
    				if ($data['hoteldetail']['hotel_id']!=$_POST['hotel_id']) {
    
    				if(!empty($_FILES['hotel']['name'][0]))
    				{
    				
    					$filesCount = count($_FILES['hotel']['name']);
    					for($i = 0; $i < $filesCount; $i++)
    					{
    						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
    						$fileimage=date("mdyhis").$_FILES['hotel']['name'][$i];
    						if(move_uploaded_file($_FILES['hotel']['tmp_name'][$i],$imagefilefolder.$fileimage))
    						{
    							///////////////////////////////////////////////////////////////////
    							
    							$config['image_library'] = 'gd2';
    	                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
    	                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/thumb/'.$fileimage;
    	                        $config['create_thumb'] = TRUE;
    	                        $config['maintain_ratio'] = TRUE;
    	                        $config['width']         = 75;
    	                        $config['height']       = 50;
    	                       
    	
    	                         $this->load->library('image_lib', $config);
    	                        $this->image_lib->initialize($config);
    	
    	                        $this->image_lib->resize();
    
    
    	                        $config['image_library'] = 'gd2';
    	                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
    	                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/thumb2/'.$fileimage;
    	                        $config['create_thumb'] = TRUE;
    	                        $config['maintain_ratio'] = TRUE;
    	                        $config['width']         = 558;
    	                        $config['height']       = 248;
    	                       
    	
    	                        // $this->load->library('image_lib', $config);
    	                        $this->image_lib->initialize($config);
    	
    	                        $this->image_lib->resize();
    
    							///////////////////////////////////////////////////////////////////
    						}
    						
    					   $upload_file[]     = $fileimage;
    					}
    					$uploadedimages = implode(',', $upload_file);
    					$data = array(
    								'hotel_id' => $this->input->post('hotel_id'),
    								//'room_type_id' => $this->input->post('room_id'), 
    								'hotel_room_image' => $uploadedimages,
    								'status' => '1',                    
    								// 'created_at' => date('Y-m-d : h:m:s'),
    								// 'modified_at' => date('Y-m-d : h:m:s'),
    								
    							);
    							$result = $this->hotel_model->add_hotel_photos($data);
    							if($result){
    								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
    								redirect(base_url('admin/hotels/hotelphoto_list'));
    							}
    				}
    				else
    				{
    				    $data = array(
    								'hotel_id' => $this->input->post('hotel_id'),
    								//'room_id' => $this->input->post('room_id'), 
    								'status' => $this->input->post('room_status'),  
    								
    							);
    							$result = $this->hotel_model->add_hotel_photos($data);
    							if($result){
    								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
    								redirect(base_url('admin/hotels/hotelphoto_list'));
    							}
    				}
    			}
    			else{
    
    				$this->session->set_flashdata('msg', 'This hotel already exist choose the edit option to add more images!');
    				redirect(base_url('admin/hotels/addhotelphotos'));
    
    			}
    			} 
    		}
    	   else
    		{
                   $data['view'] = 'admin/hotels/hotel_add_photo';
                    $this->load->view('admin/layout', $data);
            }
                
        }
        
        //Edit hotel photo
	public function edithotelphoto($id = 0)
	{
		if($this->session->userdata('role') ==1)
		{
			$id = $this->session->userdata('admin_id');
			$data['hotel_detail'] =  $this->hotel_model->get_manager_hotels($id);

			$vid = $data['hotel_detail'][0]['hotel_vendor_id'];
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($vid);
		}
		else
		{
            $id = $this->session->userdata('admin_id');
		    $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
	    }
		$data['room_type'] =  $this->room_model->get_all_room_type();
		
		$upload_file=array();
        // If file upload form submitted
        if(!empty($this->input->post('submit')))
		{
			$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');               
		                
		    if ($this->form_validation->run() == FALSE)
		    {
		            $data['view'] = 'admin/hotels/edithotelphoto';
		                     $this->load->view('admin/layout', $data);
		    }
			else
			{
			    if(!empty($_FILES['userfile']['name'][0]))
				{
					$data['room_photos'] =  $this->hotel_model->get_hotelphotos($_POST['hotel_photo_id']);
					$filesCount = count($_FILES['userfile']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['userfile']['name'][$i];
						if(move_uploaded_file($_FILES['userfile']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							///////////////////////////////////////////////////////////////////

							 $config['image_library'] = 'gd2';
	                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
	                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/thumb2/'.$fileimage;
	                        $config['create_thumb'] = TRUE;
	                        $config['maintain_ratio'] = TRUE;
	                        $config['width']         = 558;
	                        $config['height']       = 248;
	                       
	
	                         $this->load->library('image_lib', $config);
	                        $this->image_lib->initialize($config);
	
	                        $this->image_lib->resize();
							

							$config['image_library'] = 'gd2';
				                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
				                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/thumb/'.$fileimage;
				                        $config['create_thumb'] = TRUE;
				                        $config['maintain_ratio'] = TRUE;
				                        $config['width']         = 75;
				                        $config['height']       = 50;
				
				                        // $this->load->library('image_lib', $config);
				                        $this->image_lib->initialize($config);
				
				                        $this->image_lib->resize();
							
					
							///////////////////////////////////////////////////////////////////
						}
						
					   $upload_files[]     = $fileimage;
					}
					if(!empty($data['room_photos']['hotel_room_image']))
					{
					    $upload_file=array_merge($data['room_photos'],$upload_files);
					    $uploadedimages = implode(',', $upload_file);
					}
					else
					{
					   $uploadedimages = implode(',', $upload_files); 
					}
					$data = array(
								'hotel_id' => $this->input->post('hotel_id'),
								//'room_type_id' => $this->input->post('room_type_id'), 
								'hotel_room_image' => $uploadedimages,
								'status' => $this->input->post('status'),                    
							);
							$result = $this->hotel_model->edithotelphoto($data,$this->input->post('hotel_photo_id'));
							if($result){
								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
								redirect(base_url('admin/hotels/hotelphoto_list'));
							}
				}
				else
				{
					$data = array(
								'hotel_id' => $this->input->post('hotel_id'),
								//'room_type_id' => $this->input->post('room_type_id'), 
								'status' => $this->input->post('status'),       
							);
							$result = $this->hotel_model->edithotelphoto($data,$this->input->post('hotel_photo_id'));
							if($result){
								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
								redirect(base_url('admin/hotels/hotelphoto_list'));
							}
    				}
    			} 
    		}
    	    else
    		{
    			$eid=$this->uri->segment('4');
    			$data['roomphotodata'] = $this->hotel_model->get_hotel_photo_by_id($eid);
    			// echo "<pre>";
    			// print_r($data['roomphotodata']);
    			$data['view'] = 'admin/hotels/edithotelphoto';
                $this->load->view('admin/layout', $data);
            }
        }
        
        //Delete hotel photo
        public function delhotelphoto($id = 0)
        {
    		$this->db->delete('ci_hotel_photo', array('hotel_photo_id' => $id));
    		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
    		redirect(base_url('admin/hotels/hotelphoto_list'));
    	}
    	
    	//View hotelGALLERY
    	public function viewhotelgallery($photoid){
		//$id = $this->session->userdata('admin_id');
		$data['gallery'] =  $this->hotel_model->get_gallery_by_id($photoid);
		$data['view'] = 'admin/hotels/allhotelgallery';
		
		$this->load->view('admin/layout', $data);
	}

    //end
	}


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/hotel_model', 'hotel_model');
		$this->load->model('admin/room_model', 'room_model');
	}

	public function index(){
		
		
		if($this->session->userdata('role') ==1){
			
			$id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_manager_hotels($id);
			// echo "<pre>";
			// print_r($data['all_hotels']);

		}
		else{
			 $id = $this->session->userdata('admin_id');
			 if(!empty($_GET) && $_GET['submit']=="Search")
			 {
			     $data['all_hotels'] =  $this->hotel_model->get_all_hotels($_GET,$id);
			 }
			 else
			 {
	        	//$data['all_hotels'] =  $this->hotel_model->get_all_hotels($search='',$id);

	        	$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
			 }

	}
		$data['view'] = 'admin/hotels/hotel_list';

		$this->load->view('admin/layout', $data);
	}

    public function hotelphoto_list()
    {
		if($this->session->userdata('role') ==1)
		{
			$id = $this->session->userdata('admin_id');
			$data['all_rooms'] =  $this->hotel_model->get_manager_hotel_photo($id);
			// echo "<pre>";
			// print_r($data['all_rooms']);

		}
		else{
		$id = $this->session->userdata('admin_id');
		if(!empty($_GET) && $_GET['submit']=="Search")
		{
		    $data['all_rooms'] =  $this->hotel_model->get_all_hotel_photo($_GET,$id);
		}
		else
		{
		    $data['all_rooms'] =  $this->hotel_model->get_all_hotel_photo($search='',$id);
		}
	}
		$data['view'] = 'admin/hotels/hotelphoto_list';
		$this->load->view('admin/layout', $data);
	}

// hotel gallery

	public function viewhotelgallery($photoid){
		//$id = $this->session->userdata('admin_id');
		$data['gallery'] =  $this->hotel_model->get_gallery_by_id($photoid);
		$data['view'] = 'admin/hotels/allhotelgallery';
		
		$this->load->view('admin/layout', $data);
	}


	// hotel gallery end

	// view hotel
	public function viewhotel($id){
		$uid = $this->session->userdata('admin_id');
		$data['facilities'] =  $this->hotel_model->get_all_facilities($uid);
		$data['facilitiesid'] =  $this->hotel_model->get_all_facilitiesbyid($id);

		$data['adminfacilitiesid'] =  $this->hotel_model->get_admin_facilitiesbyid($id);

		$data['admin_facility'] =  $this->hotel_model->get_admin_facilities();

		$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
		$data['view'] = 'admin/hotels/viewhotel';
		
		$this->load->view('admin/layout', $data);
	}

	// end view hotel

	// For room type list based on hotel id
	 public function RoomTypeId_ForHotelId(){
	 	$hotel_id=$_GET['hotel_id'];
		// $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		$data =  $this->room_model->get_room_by_id($hotel_id);
		// $this->load->view('admin/layout', $data);
		// var_dump($data);
		echo '<option value="">'.'Select Room'.'</option>';
	 	foreach ($data as $room_type) {
		// echo $data['room_type']['room_type_id'];
	 		// var_dump($room_type);
	 		$room_type_id=$room_type['room_type_id'];
	 		$room_type_name=$room_type['hotel_room_type'];
			 echo '<option value="'.$room_type_id.'">'.$room_type_name.'</option>';
		}
		
		
	}
	
	// close function

	// active and deactive hotels
		public function activatehotel($id){			

			if($id){

					$data['user'] = $this->hotel_model->get_hotel_by_id($id);

					$hotelid = $data['user']['hotel_id'];		
									

					$data = array(
						
						'hotel_id' => $id,
						'hotel_status' => $this->input->get('alot'),
						//'added' => date('Y-m-d : h:m:s'),
												
					);
					
					//echo $data['v_id'];die;
					
					if (!empty($data['hotel_id'])) {

						//echo $data['v_id'];
						
						$data = $this->security->xss_clean($data);

						$result = $this->hotel_model->edit_hotel($data, $id);
					

					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/hotels'));
					}
					}
					
			}
			
		}

		// active and deactive hotels

		// add hotel photos

		public function addhotelphotos(){
    //$data = array();
			// $_POST['id'];
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
	                       
	
	                        // $this->load->library('image_lib', $config);
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

		// end hotel photos


// start get cities according to state name

    public function City_ForStateId(){
		echo  $hotel_id=$_GET['state_name'];
		// $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		$data =  $this->hotel_model->get_city_by_state_id($hotel_id);
		// $this->load->view('admin/layout', $data);
		// echo "<pre>";
		// print_r($data);
		echo '<option value="'.'0'.'">'.'City'.'</option>';
		foreach ($data as $city) {
		// echo "<pre>";
		// print_r($city);
			$city_id=$city['city_id'];
			$city_name=$city['city_name'];
			echo '<option value="'.$city_name.'">'.$city_name.'</option>';
		}
	}

	public function editCity_ForStateId(){
		echo  $hotel_id=$_GET['state_name'];
		
		$data =  $this->hotel_model->get_city_by_state_id($hotel_id);
		// $this->load->view('admin/layout', $data);
		// echo "<pre>";
		// print_r($data);
		echo '<option value="'.'0'.'">'.'City'.'</option>';
		foreach ($data as $city) {
		// echo "<pre>";
		// print_r($city);
			$city_id=$city['city_id'];
			$city_name=$city['city_name'];
			echo '<option value="'.$city_name.'">'.$city_name.'</option>';
		}
	}


    // end  get cities according to state name

	public function add(){

		 $uid = $this->session->userdata('admin_id');
		$data['facilities'] =  $this->hotel_model->get_all_facilities($uid);
		$data['admin_facility'] =  $this->hotel_model->get_admin_facilities();

		$data['states'] =  $this->hotel_model->get_all_state();
		

		if($this->input->post('submit')){
		// 	echo "<pre>";
		// print_r($_POST);die;

			
			if (!empty($_POST['hotel_facilities'])) {
				$facilities = $_POST['hotel_facilities'];
			$facility = implode(",",$facilities);
			}else{
				$facilities = '';
			}

			if (!empty($_POST['admin_facility'])) {
				$adminfacilities = $_POST['admin_facility'];
			$adminfac = implode(",",$adminfacilities); 
			}else{
				$adminfacilities = '';
			}

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
			//$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
			$this->form_validation->set_rules('mini_hour', 'Minimum Hour', 'trim|required');
			$this->form_validation->set_rules('max_hour', 'Maximum Hour', 'trim|required');
				//$this->form_validation->set_rules('hotel_facilities[]', 'Facilities', 'trim|required');
				//$this->form_validation->set_rules('hotel_description', 'Description', 'trim|required');
				$this->form_validation->set_rules('hotel_address', 'Address', 'trim|required');

				if(empty($_POST['description'])){
				$this->form_validation->set_rules('hotel_description', 'Description', 'trim|required');				
			}
			if(empty($_FILES['hotel']['name'][0])){
				$this->form_validation->set_rules('hotel', 'Image', 'trim|required');				
			}




			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/hotels/hotel_add';
				$this->load->view('admin/layout', $data);
			}
			else{
				if(!empty($_FILES['hotel']['name']))
				{
//print_r($_POST);					
					$filesCount = count($_FILES['hotel']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['hotel']['name'][$i];
						if(move_uploaded_file($_FILES['hotel']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							 $config['image_library'] = 'gd2';
	                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
	                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/front/'.$fileimage;
	                        $config['create_thumb'] = TRUE;
	                        $config['maintain_ratio'] = TRUE;
	                        $config['width']         = 255;
	                        $config['height']       = 201;
	                       
	
	                        // $this->load->library('image_lib', $config);
	                        $this->image_lib->initialize($config);
	
	                        $this->image_lib->resize();
						}
						
					   $upload_file[]     = $fileimage;
					}
					$uploadedimages = implode(', ', $upload_file);



				$data = array(
					'hotel_vendor_id' => $this->session->userdata('admin_id'),
					'hotel_name' => $this->input->post('hotel_name'),
					'hotel_address' => $this->input->post('hotel_address'),
					'hotel_state' => $this->input->post('state_name'),
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
					'hotel_longitude' => $this->input->post('hotel_longitude'),
					'hotel_latitude' => $this->input->post('hotel_latitude'),
					'hotel_facilities' =>$facility,
					'admin_facility' => $adminfac,
					'main_image' => $uploadedimages,
				);
					//var_dump($data);die;
				$data = $this->security->xss_clean($data);
				$result = $this->hotel_model->add_hotel($data);
				//echo $result;die;
				if($result){

					$data1 = array(					
					'hotel_id' => $result,
					'status' => '0',
					'added' => date('Y-m-d : h:m:s'),
					);
					$data1 = $this->security->xss_clean($data1);
				$result = $this->hotel_model->add_hotel_featured($data1);



					$this->session->set_flashdata('msg', 'Record is Added Successfully!');
					redirect(base_url('admin/hotels'));
				}
			}

		}
		}
		else{
			$data['view'] = 'admin/hotels/hotel_add';
			$this->load->view('admin/layout', $data);
		}

	}

public function edit($id)
{
	// echo 'chirag';


	$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);


      $uid = $this->session->userdata('admin_id');
		$data['facilities'] =  $this->hotel_model->get_all_facilities($uid);
		$data['facilitiesid'] =  $this->hotel_model->get_all_facilitiesbyid($id);

		$data['adminfacilitiesid'] =  $this->hotel_model->get_admin_facilitiesbyid($id);

		$data['admin_facility'] =  $this->hotel_model->get_admin_facilities();

		$data['states'] =  $this->hotel_model->get_all_state();

		//  $hotel_id=$_GET['state_name'];
		// $data['city'] =  $this->hotel_model->get_city_by_state_id($hotel_id);
		// echo "<pre>";
		// print_r($data['city']);
            
		$upload_file=array();
        // If file upload form submitted
        if(!empty($this->input->post('submit')))
		{
			// var_dump($_POST);die;

			$facilities = $_POST['hotel_facilities'];
			// var_dump($facilities);die;
			$facility = implode(",",$facilities);

			$adminfacilities = $_POST['admin_facility'];
			$adminfac = implode(",",$adminfacilities); 
			$this->form_validation->set_rules('hotel_name', 'Hotel Name', 'trim|required');
			$this->form_validation->set_rules('hotel_email', 'Email', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('pincode', 'Pin Code', 'trim|required');	
			$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
				     
           	if ($this->form_validation->run() == FALSE) {
				
				$data['view'] = 'admin/hotels/hotel_edit';
				$this->load->view('admin/layout', $data);
			}
			else
			{		
			
			  $filesCount = count($_FILES['hotel']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
					$data['room_photos'] =  $this->hotel_model->get_hotel_by_id($id);
					// echo "<pre>";
					// print_r($data['room_photos']);die;
					// $filesCount = count($_FILES['hotel']['name']);
					// for($i = 0; $i < $filesCount; $i++)
					// {
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['hotel']['name'][$i];
						if(move_uploaded_file($_FILES['hotel']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							$config['image_library'] = 'gd2';
	                        $config['source_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/'.$fileimage;
	                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/front/'.$fileimage;
	                        $config['create_thumb'] = TRUE;
	                        $config['maintain_ratio'] = TRUE;
	                        $config['width']         = 255;
	                        $config['height']       = 201;
	                       
	
	                        // $this->load->library('image_lib', $config);
	                        $this->image_lib->initialize($config);
	
	                        $this->image_lib->resize();
						}
						
					   $upload_files[]= $fileimage;
					   
					 }
					  

					// $uploadedimages = implode(',', $upload_file);
					if(!empty($data['room_photos']['main_image']))
					{
						
						 $uploadedimages = implode(',', $upload_files);
					    // $upload_file=array_merge($data['room_photos']['main_image'],$upload_files);
					    // $uploadedimages = implode(',', $upload_file);
					}
					else
					{
						 $uploadedimages = implode(',', $upload_files);
					   // $uploadedimages = implode(',', $upload_files); 
					}
					$data = array(

					'hotel_name' => $this->input->post('hotel_name'),
					'hotel_address' => $this->input->post('hotel_address'),
					'hotel_state' => $this->input->post('state_name'),
					'hotel_city' => $this->input->post('city'),
					'hotel_pin_code' => $this->input->post('pincode'),
					'hotel_website' => $this->input->post('website'),
					'hotel_mobile' => $this->input->post('mobile_no'),
					'hotel_telephone' => $this->input->post('telephone'),
					'hotel_fax' => $this->input->post('fax'),
					'hotel_airport' => $this->input->post('airport'),
					'hotel_star_category' => $this->input->post('star_category'),
					'hotel_description' => $this->input->post('description'),
					'hotel_email' => $this->input->post('hotel_email'),
					'hotel_longitude' => $this->input->post('hotel_longitude'),
					'hotel_latitude' => $this->input->post('hotel_latitude'),
					'min_hour' => $this->input->post('mini_hour'),
					'hotel_facilities' =>$facility,
					'admin_facility' => $adminfac,
					'main_image' => $uploadedimages,

				);
					
				$data = $this->security->xss_clean($data);

				$result = $this->hotel_model->edit_hotel($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/hotels'));
				}
				else{
					
					$data = array(
					'hotel_name' => $this->input->post('hotel_name'),
					'hotel_address' => $this->input->post('hotel_address'),
					'hotel_state' => $this->input->post('state_name'),
					'hotel_city' => $this->input->post('city'),
					'hotel_pin_code' => $this->input->post('pincode'),
					'hotel_website' => $this->input->post('website'),
					'hotel_mobile' => $this->input->post('mobile_no'),
					'hotel_telephone' => $this->input->post('telephone'),
					'hotel_fax' => $this->input->post('fax'),
					'hotel_airport' => $this->input->post('airport'),
					'hotel_star_category' => $this->input->post('star_category'),
					'hotel_description' => $this->input->post('description'),
					'hotel_email' => $this->input->post('hotel_email'),
					'hotel_longitude' => $this->input->post('hotel_longitude'),
					'hotel_latitude' => $this->input->post('hotel_latitude'),
					'min_hour' => $this->input->post('mini_hour'),
					'hotel_facilities' =>$facility,
					'admin_facility' => $adminfac,

				);
				$data = $this->security->xss_clean($data);
				
				$result = $this->hotel_model->edit_hotel($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/hotels'));
				}
				}
			} 
		}
	   else
		{
			$eid=$this->uri->segment('4');
			$data['hotel'] = $this->hotel_model->get_hotel_by_id($eid);
			// echo "<pre>";
			// print_r($data['hotel']);
			$data['view'] = 'admin/hotels/hotel_edit';
			$this->load->view('admin/layout', $data);

        }
            
}



	public function edit1($id = 0){
		 $uid = $this->session->userdata('admin_id');
		$data['facilities'] =  $this->hotel_model->get_all_facilities($uid);
		$data['facilitiesid'] =  $this->hotel_model->get_all_facilitiesbyid($id);

		$data['adminfacilitiesid'] =  $this->hotel_model->get_admin_facilitiesbyid($id);

		$data['admin_facility'] =  $this->hotel_model->get_admin_facilities();
		// echo "<pre>";
		// print_r($data['admin_facility']);
		if($this->input->post('submit')){

			$facilities = $_POST['hotel_facilities'];
			//var_dump($facilities);die;
			$facility = implode(",",$facilities);

			$adminfacilities = $_POST['admin_facility'];
			$adminfac = implode(",",$adminfacilities); 



			$this->form_validation->set_rules('hotel_name', 'Hotel Name', 'trim|required');
			$this->form_validation->set_rules('hotel_email', 'Email', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('pincode', 'Pin Code', 'trim|required');
				// $this->form_validation->set_rules('website', '', 'trim|required');
				// $this->form_validation->set_rules('mobile_no', '', 'trim|required');
			$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
				// $this->form_validation->set_rules('fax', '', 'trim|required');
				// $this->form_validation->set_rules('airport', '', 'trim|required');
				// $this->form_validation->set_rules('star_category', '', 'trim|required');
				// $this->form_validation->set_rules('description', '', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data['hotel'] = $this->user_model->get_hotel_by_id($id);
				$data['view'] = 'admin/hotels/hotel_edit';
				$this->load->view('admin/layout', $data);
			}
			else{
				if(!empty($_FILES['hotel']['name']))
				{
//print_r($_POST);					
					$filesCount = count($_FILES['hotel']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['hotel']['name'][$i];
						if(move_uploaded_file($_FILES['hotel']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							//echo "yes";
						}
						
					   $upload_file[]     = $fileimage;
					}
					$uploadedimages = implode(', ', $upload_file);



				$data = array(

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
					'hotel_email' => $this->input->post('hotel_email'),
					'hotel_longitude' => $this->input->post('hotel_longitude'),
					'hotel_latitude' => $this->input->post('hotel_latitude'),
					'hotel_facilities' =>$facility,
					'admin_facility' => $adminfac,
					'main_image' => $uploadedimages,

				);
				$data = $this->security->xss_clean($data);
				$result = $this->hotel_model->edit_hotel($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/hotels'));
				}
			}
			else{

				$data = array(

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
					'hotel_email' => $this->input->post('hotel_email'),
					'hotel_longitude' => $this->input->post('hotel_longitude'),
					'hotel_latitude' => $this->input->post('hotel_latitude'),
					'hotel_facilities' =>$facility,
					'admin_facility' => $adminfac,

				);
				$data = $this->security->xss_clean($data);
				$result = $this->hotel_model->edit_hotel($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/hotels'));
				}

			}

		}
		}
		else{
			$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
			$data['view'] = 'admin/hotels/hotel_edit';
			$this->load->view('admin/layout', $data);
		}
	}

	public function del($id = 0){
		$this->db->delete('ci_hotels', array('hotel_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('admin/hotels'));
	}
	
	public function delhotelphoto($id = 0){
			$this->db->delete('ci_hotel_photo', array('hotel_photo_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/hotels/hotelphoto_list'));
		}
		
		public function delperhotelphoto($id = 0){

			echo $eid=$this->uri->segment('4');
			$hid=$this->uri->segment('5');
			
			$data['per_room_photos'] =  $this->hotel_model->get_perhotelphotos($eid);
				//redirect(base_url('admin/hotels/hotelphoto_list'));
			redirect(base_url('admin/hotels/edithotelphoto/'.$hid));
		}
			
		
		// edit hotel photo
	public function edithotelphoto($id = 0){
    //$data = array();

		if($this->session->userdata('role') ==1){
			
			$id = $this->session->userdata('admin_id');
			$data['hotel_detail'] =  $this->hotel_model->get_manager_hotels($id);
			// echo "<pre>";
			// print_r($data['hotel_detail']);

			$vid = $data['hotel_detail'][0]['hotel_vendor_id'];
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($vid);
			

		}
		else{

		$id = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
	}
		$data['room_type'] =  $this->room_model->get_all_room_type();
		
            
		$upload_file=array();
        // If file upload form submitted
        if(!empty($this->input->post('submit')))
		{
			
			 $this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');               
		        // $this->form_validation->set_rules('room_type_id', 'Room', 'trim|required');
		         //$this->form_validation->set_rules('userfile[]', 'Room Photo', 'required');               
		                
		        if ($this->form_validation->run() == FALSE) {
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
	                       
	
	                        // $this->load->library('image_lib', $config);
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



}


?>

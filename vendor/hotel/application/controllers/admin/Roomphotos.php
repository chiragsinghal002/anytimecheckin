<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Roomphotos extends MY_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('admin/roomphotos_model', 'roomphotos_model');
            $this->load->model('admin/hotel_model', 'hotel_model');
            $this->load->model('admin/usermodule_model', 'usermodule_model');
            $this->load->model('admin/room_model', 'room_model');
            // $this->load->helper('url');
             // $this->load->library('upload');
             $this->load->helper(array('form', 'url'));
        }

        public function index(){
            $id = $this->session->userdata('admin_id');
            $data['all_camp'] =  $this->discount_model->get_camps_by_vid($id);
            $data['view'] = 'admin/discount/campaing_list';
            $this->load->view('admin/layout', $data);

        }
        public function roomphoto_list(){
            if($this->session->userdata('role') ==1){
            
            $id = $this->session->userdata('admin_id');
            $data['all_rooms'] =  $this->roomphotos_model->get_all_rooms_photo_mananger($id);
            // echo "<pre>";
            // print_r($data['all_rooms']);

        }
        else{

		$id = $this->session->userdata('admin_id');
		if(!empty($_GET) && $_GET['submit']=="Search")
		{
		     $data['all_rooms'] =  $this->roomphotos_model->get_all_rooms_photo($_GET,$id);
		}
		else
		{
		    $data['all_rooms'] =  $this->roomphotos_model->get_all_rooms_photo($search='',$id);
		}
    }
		$data['view'] = 'admin/rooomphotos/roomphoto_list';
		$this->load->view('admin/layout', $data);
	}

    // room gallery

    public function viewroomgallery($photoid){
        //$id = $this->session->userdata('admin_id');
        $data['gallery'] =  $this->roomphotos_model->get_gallery_by_id($photoid);
        $data['view'] = 'admin/rooomphotos/allroomgallery';
        
        $this->load->view('admin/layout', $data);
    }


    // room gallery end


        public function campingdate(){
            $id = $this->session->userdata('admin_id');
            $data['camp_date'] =  $this->discount_model->get_all_campdate($id);
            $data['view'] = 'admin/discount/campaing_date_list';
            $this->load->view('admin/layout', $data);

        }
        
        public function add1(){
            if($this->input->post('submit')){
                 $id = $this->session->userdata('admin_id');
    $data['all_hotels'] =  $this->hotel_model->get_all_hotels($search='',$id);
    $data['room'] =  $this->room_model->get_room();

                $this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');               
                $this->form_validation->set_rules('room_id', 'Room', 'trim|required');
                $this->form_validation->set_rules('room_photo', 'Room Photo', 'trim|required');               
                $this->form_validation->set_rules('room_status', 'Status', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $data['view'] = 'admin/rooomphotos/photo_add';
                    $this->load->view('admin/layout', $data);
                }
                else{
                    $data = array(
                        
                        'hotel_id' => $this->input->post('hotel_id'),
                        'room_id' => $this->input->post('room_id'), 
                        'room_photo' => $this->input->post('room_photo'),
                        'room_status' => $this->input->post('room_status'),                    
                        'created_at' => date('Y-m-d : h:m:s'),
                        'modified_at' => date('Y-m-d : h:m:s'),
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->roomphotos_model->add_photos($data);
                    if($result){
                        $this->session->set_flashdata('msg', 'Record is Added Successfully!');
                        redirect(base_url('admin/discount'));
                    }
                }
            }
            else{
                $data['view'] = 'admin/rooomphotos/photo_add';
                $this->load->view('admin/layout', $data);
            }
            
        }



// add date campaing
public function datecampaingadd(){
    $id = $this->session->userdata('admin_id');
    $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
    $data['all_camps'] =  $this->discount_model->get_camps_by_vid($id);
    
            if($this->input->post('submit')){

                $this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
                $this->form_validation->set_rules('camp_id', 'Camp', 'trim|required');
                $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
                $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');
                $this->form_validation->set_rules('camp_date_status', 'Status', 'trim|required');
                
                if ($this->form_validation->run() == FALSE) {
                    $data['view'] = 'admin/discount/date_campaing_add';
                    $this->load->view('admin/layout', $data);
                }
                else{
                    $data = array(
                        'hotel_id' => $this->input->post('hotel_id'),
                        'camp_id' => $this->input->post('camp_id'),
                        'from_date' => $this->input->post('from_date'),
                        'to_date' => $this->input->post('to_date'),
                        'camp_date_status   ' => $this->input->post('camp_date_status'),
                        'created_at' => date('Y-m-d : h:m:s'),
                        'modified_at' => date('Y-m-d : h:m:s'),
                        
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->discount_model->add_dating_camping($data);
                    if($result){
                        $this->session->set_flashdata('msg', 'Record is Added Successfully!');
                        redirect(base_url('admin/discount/campingdate'));
                    }
                }
            }
            else{
                $data['view'] = 'admin/discount/date_campaing_add';
                $this->load->view('admin/layout', $data);
            }
            
        }

// end add date campaing

// For room type list based on hotel id
     public function RoomTypeId_ForHotelId(){
        echo $hotel_id=$_GET['hotel_id'];

        $data =  $this->room_model->get_room_by_id($hotel_id);
        echo '<option value="'.'0'.'">'.'Select'.'</option>';
        foreach ($data as $room_type) {
            $room_type_id=$room_type['room_type_id'];
            $room_type_name=$room_type['hotel_room_type'];
             echo '<option value="'.$room_type_id.'">'.$room_type_name.'</option>';
        }
    }
    // Close this function


    // add room photo
	public function add(){
    $data = array();
		$id = $this->session->userdata('admin_id');
        $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
		//$data['all_hotels'] =  $this->hotel_model->get_all_hotels($search='',$id);
		$data['room_type'] =  $this->room_model->get_all_room_type();
		
            
			$upload_file=array();
        // If file upload form submitted
        if(!empty($this->input->post('submit')))
		{
			
			 $this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');               
             $this->form_validation->set_rules('room_id', 'Room', 'trim|required');
             //$this->form_validation->set_rules('userfile[]', 'Room Photo', 'required');               
             $this->form_validation->set_rules('room_status', 'Status', 'trim|required');
                
                
             if ($this->form_validation->run() == FALSE) {
                     $data['view'] = 'admin/rooomphotos/photo_add';
                     $this->load->view('admin/layout', $data);
             }
			 else
			{
			    if(!empty($_FILES['userfile']['name'][0]))
				{
					$filesCount = count($_FILES['userfile']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
                        $imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						// $imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/projects/Rest-&-Go/image/";
						$fileimage=date("mdyhis").$_FILES['userfile']['name'][$i];
                        // for rezing the image

						if(move_uploaded_file($_FILES['userfile']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							//echo "yes";
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
                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/Room/'.$fileimage;
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']         = 262;
                        $config['height']       = 164;

                        // $this->load->library('image_lib', $config);
                        $this->image_lib->initialize($config);

                        $this->image_lib->resize();


						}
						
					   $upload_file[]     = $fileimage;
					}
					$uploadedimages = implode(',', $upload_file);
					$data = array(
								'hotel_id' => $this->input->post('hotel_id'),
								'room_id' => $this->input->post('room_id'), 
								'room_photo' => $uploadedimages,
								'room_status' => $this->input->post('room_status'),                    
								'created_at' => date('Y-m-d : h:m:s'),
								'modified_at' => date('Y-m-d : h:m:s'),
								
							);
							$result = $this->roomphotos_model->add_photos($data);
							if($result){
								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
								redirect(base_url('admin/roomphotos/roomphoto_list'));
							}
				}
				else
				{
				    $data = array(
								'hotel_id' => $this->input->post('hotel_id'),
								'room_id' => $this->input->post('room_id'), 
								'room_status' => $this->input->post('room_status'),                    
								'created_at' => date('Y-m-d : h:m:s'),
								'modified_at' => date('Y-m-d : h:m:s'),
								
							);
							$result = $this->roomphotos_model->add_photos($data);
							if($result){
								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
								redirect(base_url('admin/roomphotos/roomphoto_list'));
							}
				}
			} 
		}
	   else
		{
               $data['view'] = 'admin/rooomphotos/photo_add';
                $this->load->view('admin/layout', $data);
        }
            
    }
	
	// add room photo
	public function editroomphoto($id = 0){
    //$data = array();uuuu


        if($this->session->userdata('role') ==1){
            
            $uid = $this->session->userdata('admin_id');
            $data['all_hotels'] =  $this->roomphotos_model->get_all_rooms_photo_mananger($uid);
            $data['room_type'] =  $this->room_model->get_all_room_type();
            // echo "<pre>";
            // print_r($data['all_rooms']);

        }
        else{

		$uid = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
		$data['room_type'] =  $this->room_model->get_all_room_type();
    }
		
            
		$upload_file=array();
        // If file upload form submitted
        if(!empty($this->input->post('submit')))
		{
			
			 $this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');               
             $this->form_validation->set_rules('room_id', 'Room', 'trim|required');
             //$this->form_validation->set_rules('userfile[]', 'Room Photo', 'required');               
             $this->form_validation->set_rules('room_status', 'Status', 'trim|required');
                
                
            if ($this->form_validation->run() == FALSE) {
                     $data['view'] = 'admin/rooomphotos/photo_edit';
                     $this->load->view('admin/layout', $data);
            }
			else
			{
				if(!empty($_FILES['userfile']['name'][0]))
				{
					$data['room_photos'] =  $this->roomphotos_model->get_roomphotos($_POST['room_photo_id']);
					$filesCount = count($_FILES['userfile']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/new/image/";
						$fileimage=date("mdyhis").$_FILES['userfile']['name'][$i];
						if(move_uploaded_file($_FILES['userfile']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
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
                         $config['new_image'] =$_SERVER['DOCUMENT_ROOT'].'/new/image/Room/'.$fileimage;
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']         = 262;
                        $config['height']       = 164;

                        // $this->load->library('image_lib', $config);
                        $this->image_lib->initialize($config);

                        $this->image_lib->resize();
						}
						
					   $upload_files[]     = $fileimage;
					}
					if(!empty($data['room_photos']['room_photo']))
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
								'room_id' => $this->input->post('room_id'), 
								'room_photo' => $uploadedimages,
								'room_status' => $this->input->post('room_status'),                    
								'created_at' => date('Y-m-d : h:m:s'),
								'modified_at' => date('Y-m-d : h:m:s'),
								
							);
							$result = $this->roomphotos_model->edit_photos($data,$this->input->post('room_photo_id'));
							if($result){
								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
								redirect(base_url('admin/roomphotos/roomphoto_list'));
							}
				}
				else
				{
					$data = array(
								'hotel_id' => $this->input->post('hotel_id'),
								'room_id' => $this->input->post('room_id'), 
								'room_status' => $this->input->post('room_status'),                    
								'created_at' => date('Y-m-d : h:m:s'),
								'modified_at' => date('Y-m-d : h:m:s'),
								
							);
							$result = $this->roomphotos_model->edit_photos($data);
							if($result){
								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
								redirect(base_url('admin/roomphotos/roomphoto_list'));
							}
				}
			} 
		}
	   else
		{
			$eid=$this->uri->segment('4');
			$data['roomphotodata'] = $this->roomphotos_model->get_room_photo_by_id($eid);
			$data['view'] = 'admin/rooomphotos/photo_edit';
            $this->load->view('admin/layout', $data);
        }
            
    }


// end discount rate

// edit campaing date

        public function editcampdate($id = 0){
            $uid = $this->session->userdata('admin_id');
            $data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
            $data['camp_list'] =  $this->discount_model->get_camps_by_vid($uid);
    
            if($this->input->post('submit')){
                $this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
                $this->form_validation->set_rules('camp_id', 'Camp', 'trim|required');
                $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
                $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');
                $this->form_validation->set_rules('camp_date_status', 'Status', 'trim|required');
                

                if ($this->form_validation->run() == FALSE) {
                    $data['campdate'] = $this->discount_model->get_campdate_by_id($id);                 
                    $data['view'] = 'admin/discount/camp_date_edit';
                    $this->load->view('admin/layout', $data);
                }
                else{
                    $data = array(
                        'hotel_id' => $this->input->post('hotel_id'),
                        'camp_id' => $this->input->post('camp_id'),
                        'from_date' => $this->input->post('from_date'),
                        'to_date' => $this->input->post('to_date'),
                        'camp_date_status   ' => $this->input->post('camp_date_status'),
                        
                        'modified_at' => date('Y-m-d : h:m:s'),
                        
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->discount_model->edit_campdate($data, $id);
                    if($result){
                        $this->session->set_flashdata('msg', 'Record is Updated Successfully!');
                        redirect(base_url('admin/discount/campingdate'));
                    }
                }
            }
            else{
                $data['campdate'] = $this->discount_model->get_campdate_by_id($id);
                $data['view'] = 'admin/discount/camp_date_edit';
                $this->load->view('admin/layout', $data);
            }
        }

        // end edit camping date




        public function edit($id = 0){
            if($this->input->post('submit')){
                $this->form_validation->set_rules('camp_name', 'Camp Name', 'trim|required');
                $this->form_validation->set_rules('camp_status', 'Status', 'trim|required');
                
                if ($this->form_validation->run() == FALSE) {
                    $data['camp'] = $this->discount_model->get_camp_by_id($id);
                    $data['view'] = 'admin/discount/camp_edit';
                    $this->load->view('admin/layout', $data);
                }
                else{
                    $data = array(
                        
                        'camp_name' => $this->input->post('camp_name'),
                        'camp_status' => $this->input->post('camp_status'),                     
                        'modified_at' => date('Y-m-d : h:m:s'),
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->discount_model->edit_camp($data, $id);
                    if($result){
                        $this->session->set_flashdata('msg', 'Record is Updated Successfully!');
                        redirect(base_url('admin/discount'));
                    }
                }
            }
            else{
                $data['camp'] = $this->discount_model->get_camp_by_id($id);
                $data['view'] = 'admin/discount/camp_edit';
                $this->load->view('admin/layout', $data);
            }
        }

        public function del($id = 0){
            $this->db->delete('ci_dis_camp_name', array('camp_id' => $id));
            $this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
            redirect(base_url('admin/discount'));
        }

        public function deldatecamp($id = 0){
            $this->db->delete('ci_camp_date', array('camp_date_id' => $id));
            $this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
            redirect(base_url('admin/discount/campingdate'));
        }

		public function delroomphoto($id = 0){
			$this->db->delete('ci_room_photo', array('room_photo_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/roomphotos/roomphoto_list'));
		}
		
		public function delperroomphoto($id = 0){
			$eid=$this->uri->segment('4');
            $rid=$this->uri->segment('5');

			$data['per_room_photos'] =  $this->roomphotos_model->get_perroomphotos($eid);
					
					$upload_file=array_merge($data['room_photos'],$upload_files);
					
					$uploadedimages = implode(',', $upload_file);
					$data = array(
								'hotel_id' => $this->input->post('hotel_id'),
								'room_id' => $this->input->post('room_id'), 
								'room_photo' => $uploadedimages,
								'room_status' => $this->input->post('room_status'),                    
								'created_at' => date('Y-m-d : h:m:s'),
								'modified_at' => date('Y-m-d : h:m:s'),
								
							);
							$result = $this->roomphotos_model->edit_photos($data,$this->input->post('room_photo_id'));
							if($result){
								$this->session->set_flashdata('msg', 'Photo is deleted successfully!');
								// redirect(base_url('admin/roomphotos/roomphoto_list'));
                                redirect(base_url('admin/roomphotos/editroomphoto/'.$rid));
							}
			
			
			
			
			
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/roomphotos/roomphoto_list'));
		}

        

    }


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/booking_model', 'booking_model');
		$this->load->model('admin/hotel_model', 'hotel_model');
		$this->load->model('admin/room_model', 'room_model');
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('admin/usersreview_model', 'usersreview_model');
	}

	public function index(){
		 $id = $this->session->userdata('admin_id');

		 if(!empty($this->input->get('Search')))
        	{
        		        	    
        	    $indate=$this->input->get('indate');
        	    $outdate=$this->input->get('outdate');
        	    $booking_type=$this->input->get('booking_type');
        	   
        	    
        	       $data['all_booking'] =  $this->booking_model->get_all_booking_searchfilter($indate,$outdate,$booking_type);
        	}
        	
		 else
		 {
		     $data['all_booking'] =  $this->booking_model->get_all_booking($search='',$id);
		 }
		
		
		$data['view'] = 'admin/booking/live_booking_list';

		$this->load->view('admin/layout', $data);
	}

	// todays booking
	public function todaysbooking(){
		  $id = $this->session->userdata('admin_id');
		 if(!empty($_GET) && $_GET['submit']=="Search")
		 {
		     $data['all_booking'] =  $this->booking_model->get_todays_booking($_GET,$id);
		 }
		 else
		 {
		     $data['all_booking'] =  $this->booking_model->get_todays_booking($search='',$id);

		 }
		
		
		$data['view'] = 'admin/booking/todays_booking_list';

		$this->load->view('admin/layout', $data);
	}
	// end todays booking

// Export data in CSV format
	public function exportCSV(){
		$id = $this->session->userdata('admin_id');
		
		// file name
		$filename = 'booking_'.date('Ymd').'.csv';
		
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; "); 

		// get data

		if($this->session->userdata('role') ==1){
			
			//$id = $this->session->userdata('admin_id');
			$usersData =  $this->booking_model->get_all_manager_booking($id);
			// echo "<pre>";
			// print_r($data['all_hotels']);

		}
		else{

		$usersData = $this->booking_model->get_all_booking($id);
	}

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



	public function livebooking(){
		 $id = $this->session->userdata('admin_id');
		$data['user'] = $this->user_model->get_user_by_role_id($id);
		$hotel = $data['user']['hotel_id'];

		$data['hotel'] = $this->hotel_model->get_hotel_by_id($hotel);
		$vid = $data['hotel']['hotel_vendor_id'];
		

		$data['all_booking'] =  $this->booking_model->get_all_manager_booking($id);
		
		$data['view'] = 'admin/booking/live_booking_list';

		$this->load->view('admin/layout', $data);
	}

	public function livebookings(){
		 $id = $this->session->userdata('admin_id');
		$data['user'] = $this->user_model->get_user_by_role_id($id);
		$hotel = $data['user']['hotel_id'];

		$data['hotel'] = $this->hotel_model->get_hotel_by_id($hotel);
		$vid = $data['hotel']['hotel_vendor_id'];
		

		$data['all_booking'] =  $this->booking_model->get_all_manager_booking($id);
		
		$data['view'] = 'admin/booking/live_booking_list';

		$this->load->view('admin/layout', $data);
	}

	public function view($id){
		 $vid = $this->session->userdata('admin_id');
		$data['view_booking'] =  $this->booking_model->get_hotel_booking_by_id($id);
		$hid = $data['view_booking']['hotel_id'];
		$rid = $data['view_booking']['room_type_id'];

		$data['view_discount'] =  $this->booking_model->GetDiscountbyhotelandroomid($hid,$rid);

		$data['review_booking'] =  $this->booking_model->get_review_by_bookingid($id);

		$data['vendor_review'] =  $this->booking_model->get_vendorreview_by_id($vid,$id);
		// echo "<pre>";
		// print_r($data['vendor_review']);
		
		
		$data['view'] = 'admin/booking/live_booking_view';
		

		$this->load->view('admin/layout', $data);
	}


	// active and deactive hotels
		public function activatebooking($id){			

			if($id){

					$data['user'] = $this->booking_model->get_booking_by_id($id);

					$hotelid = $data['user']['booking_id'];		
									

					$data = array(
						
						'booking_id' => $id,
						'booking_status' => $this->input->get('alot'),
						//'added' => date('Y-m-d : h:m:s'),
												
					);
					
					//echo $data['v_id'];die;
					
					if (!empty($data['booking_id'])) {

						//echo $data['v_id'];
						
						$data = $this->security->xss_clean($data);

						$result = $this->booking_model->edit_booking($data, $id);
					

					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/booking'));
					}
					}
					
			}
			
		}

		// active and deactive hotels

		//delete booking
		public function deletebooking($id = 0){
			
				
					$data = array(
						'booking_status' => '5',
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->booking_model->delete_booking($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/booking'));
					}
				
			
		}

		//end delete booking

		// add hotel photos

		public function addhotelphotos(){
    //$data = array();
		 $id = $this->session->userdata('admin_id');
		$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);

		$data['room_type'] =  $this->room_model->get_all_room_type();
		
            
			$upload_file=array();
        // If file upload form submitted
        if(!empty($_POST['submit']))
		{
			
			$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');               
            $this->form_validation->set_rules('room_id', 'Room Type', 'trim|required');
            //$this->form_validation->set_rules('hotel', 'Image', 'trim|required');               
           // $this->form_validation->set_rules('room_status', 'Status', 'trim|required');
                
                
            if ($this->form_validation->run() == FALSE) {
                    $data['view'] = 'admin/hotels/hotel_add_photo';
                    $this->load->view('admin/layout', $data);
            }
			else
			{
				if(!empty($_FILES['hotel']['name']))
				{
//print_r($_POST);					
					$filesCount = count($_FILES['hotel']['name']);
					for($i = 0; $i < $filesCount; $i++)
					{
						$imagefilefolder=$_SERVER['DOCUMENT_ROOT']."/projects/Rest-&-Go/image/";
						$fileimage=date("mdyhis").$_FILES['hotel']['name'][$i];
						if(move_uploaded_file($_FILES['hotel']['tmp_name'][$i],$imagefilefolder.$fileimage))
						{
							//echo "yes";
						}
						
					   $upload_file[]     = $fileimage;
					}
					$uploadedimages = implode(', ', $upload_file);
					$data = array(
								'hotel_id' => $this->input->post('hotel_id'),
								'room_type_id' => $this->input->post('room_id'), 
								'hotel_room_image' => $uploadedimages,
								'status' => '1',                    
								// 'created_at' => date('Y-m-d : h:m:s'),
								// 'modified_at' => date('Y-m-d : h:m:s'),
								
							);
							$result = $this->hotel_model->add_hotel_photos($data);
							if($result){
								$this->session->set_flashdata('msg', 'Record is Added Successfully!');
								redirect(base_url('admin/hotels/addhotelphotos'));
							}
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


// add vendor review

    public function addVendorReview(){		
		if($this->input->post('submit')){
			$url = $_POST['url'];			

			// 	echo "<pre>";
			// print_r($_POST);die;

				$data = array(
					'ureview_id' => $this->input->post('ureview_id'),
					'vendor_id' => $this->input->post('vendor_id'),
					'vhotel_id' => $this->input->post('hotel_id'),
					'vreview' => $this->input->post('vreview'),
					'user_type' => $this->input->post('user_type'),
					'created_at' => date('Y-m-d : h:m:s'),
					

				);
					//var_dump($data);die;
				$data = $this->security->xss_clean($data);
				$result = $this->booking_model->add_vendor_review($data);
				//echo $result;die;
				if($result){
					

					$this->session->set_flashdata('msg', 'Record is Added Successfully!');
					redirect(base_url('admin/booking/view/'.$url));
				}
			
		}
		else{
			$data['view'] = 'admin/booking/view'.$url;
			$this->load->view('admin/layout', $data);
		}

	}

    // end add vendor review



	public function add(){
		$data['facilities'] =  $this->hotel_model->get_all_facilities();
		if($this->input->post('submit')){
			$facilities = $_POST['hotel_facilities'];

			$facility = implode(",",$facilities);


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
				//$this->form_validation->set_rules('hotel_facilities', 'Facilities', 'trim|required');
				//$this->form_validation->set_rules('description', '', 'trim|required');



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
					'hotel_longitude' => $this->input->post('hotel_longitude'),
					'hotel_latitude' => $this->input->post('hotel_latitude'),
					'hotel_facilities' =>$facility,



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
		else{
			$data['view'] = 'admin/hotels/hotel_add';
			$this->load->view('admin/layout', $data);
		}

	}

	public function edit($id = 0){
		$data['facilities'] =  $this->hotel_model->get_all_facilities();
		$data['facilitiesid'] =  $this->hotel_model->get_all_facilitiesbyid($id);
		//var_dump($data['facilities']);die;
		if($this->input->post('submit')){

			$facilities = $_POST['hotel_facilities'];
			//var_dump($facilities);die;
			$facility = implode(",",$facilities);

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

				);
				$data = $this->security->xss_clean($data);
				$result = $this->hotel_model->edit_hotel($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/hotels'));
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

}


?>

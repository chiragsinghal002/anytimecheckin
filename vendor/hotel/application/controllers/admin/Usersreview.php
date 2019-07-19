<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usersreview extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/usersreview_model', 'usersreview_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
			
		}

		public function index(){
			$id = $this->session->userdata('admin_id');
			$data['all_review'] =  $this->usersreview_model->get_all_reviews($id);			
			
			$data['view'] = 'admin/usersreview/review_list';
			
			
			$this->load->view('admin/layout', $data);
		}


		// active and deactive hotels
		public function activatereview($id){			

			if($id){

					$data['user'] = $this->usersreview_model->get_review_by_id($id);

					$hotelid = $data['user']['review_id'];		
									

					$data = array(
						
						'review_id' => $id,
						'restatus' => $this->input->get('alot'),
						//'added' => date('Y-m-d : h:m:s'),
												
					);
					
					//echo $data['v_id'];die;
					
					if (!empty($data['review_id'])) {

						//echo $data['v_id'];
						
						$data = $this->security->xss_clean($data);

						$result = $this->usersreview_model->edit_review($data, $id);
					

					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/usersreview'));
					}
					}
					
			}
			
		}

		// active and deactive hotels

		//delete reviews
		public function deletereview($id = 0){
			
				
					$data = array(
						'restatus' => '3',
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->usersreview_model->delete_review($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/usersreview'));
					}
				
			
		}

		//end delete reviews	

		// hotel reviews

		public function hotelreviews($id){
		 //$id = $this->session->userdata('admin_id');
		$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
		$data['view_review'] =  $this->usersreview_model->get_review_by_hotelid($id);
		
		$data['view'] = 'admin/usersreview/hotelreviews';
		// echo "<pre>";
		// print_r($data['view_review']);

		$this->load->view('admin/layout', $data);
	}		

		// end hotel reviews	

		

	}


?>
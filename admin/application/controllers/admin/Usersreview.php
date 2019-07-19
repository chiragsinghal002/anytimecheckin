<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usersreview extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/usersreview_model', 'usersreview_model');
			
		}

		public function index(){
			//$id = $this->session->userdata('admin_id');
			$data['all_review'] =  $this->usersreview_model->get_all_reviews();
			// foreach ($data['all_hotels'] as $allhotels) {
			
						
			// }
			
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
						'review_status' => $this->input->get('alot'),
						//'added' => date('Y-m-d : h:m:s'),
												
					);
					

					
					if (!empty($data['review_id'])) {

					// 	echo "<pre>";
					// print_r($data);

					// die;
						
						$data = $this->security->xss_clean($data);

						$result = $this->usersreview_model->edit_review($data,$id);
						

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
						'review_status' => '3',
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->usersreview_model->delete_review($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/usersreview'));
					}
				
			
		}

		//end delete reviews		

		

	}


?>
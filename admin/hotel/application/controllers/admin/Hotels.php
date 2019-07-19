<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Hotels extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/hotel_model', 'hotel_model');
		}

		public function index(){
			$id = $this->session->userdata('admin_id');
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
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

		public function edit($id = 0){
			if($this->input->post('submit')){
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
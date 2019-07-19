<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Page extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/page_model', 'page_model');
			
		}

		public function index(){
			//$id = $this->session->userdata('admin_id');
			$data['all_page'] =  $this->page_model->get_all_page();
			// foreach ($data['all_hotels'] as $allhotels) {
			
						
			// }
			
			$data['view'] = 'admin/page/page_list';
			
			
			$this->load->view('admin/layout', $data);
		}

		
		
		public function add(){
			if($this->input->post('submit')){
				// echo "<pre>";
				// print_r($_POST);die;

							
				$this->form_validation->set_rules('page_title', 'Title', 'trim|required');
				 $this->form_validation->set_rules('page_description', 'Description', 'trim|required');
				$this->form_validation->set_rules('page_status', 'Status', 'trim|required');
				// $this->form_validation->set_rules('effective_to', 'Date To', 'trim|required');
				
				// $this->form_validation->set_rules('status', 'Status', 'trim|required');
				 	

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/page/page_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						//'hotel_vendor_id' => $this->session->userdata('admin_id'),
						'page_title' => $this->input->post('page_title'),
						'page_description' => $this->input->post('page_description'),
						'page_status' => $this->input->post('page_status'),
									
						'page_added' => date('Y-m-d : h:m:s'),
						

						
						
					);
					// echo "<pre>";
					// print_r($data);
					// die;

					$data = $this->security->xss_clean($data);
					$result = $this->page_model->add_page($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/page'));
					}
				}
			}
			else{
				$data['view'] = 'admin/page/page_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('page_title', 'Title', 'trim|required');
				 $this->form_validation->set_rules('page_description', 'Description', 'trim|required');
				$this->form_validation->set_rules('page_status', 'Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['ad'] = $this->page_model->get_ad_by_id($id);
					$data['view'] = 'admin/page/page_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						
						'page_title' => $this->input->post('page_title'),
						'page_description' => $this->input->post('page_description'),
						'page_status' => $this->input->post('page_status'),
									
						//'page_added' => date('Y-m-d : h:m:s'),
						
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->page_model->edit_page($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/page'));
					}
				}
			}
			else{
				$data['pageview'] = $this->page_model->get_page_by_id($id);
				$data['view'] = 'admin/page/page_edit';
				$this->load->view('admin/layout', $data);
			}
		}


		public function view($id = 0){
			
			
				$data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
				$data['view'] = 'admin/hotels/hotel_view';
				$this->load->view('admin/layout', $data);
			
		}

		public function del($id = 0){
			$this->db->delete('ci_pages', array('page_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/page'));
		}

	}


?>
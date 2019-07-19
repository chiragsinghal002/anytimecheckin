<?php

	defined('BASEPATH') OR exit('No direct script access allowed');



	class Vendormodule extends MY_Controller {



		public function __construct(){

			parent::__construct();

			$this->load->model('admin/vendormodule_model', 'vendormodule_model');

			$this->load->model('admin/hotel_model', 'hotel_model');

		}



		public function index(){

			// $id = $this->session->userdata('admin_id');

			
			
			if(!empty($_GET['submit']) && $_GET['submit']=="Search")
			{
			     $data['all_vendor'] =  $this->vendormodule_model->get_all_vendor($_GET);
			}
			else
            {
                $data['all_vendor'] =  $this->vendormodule_model->get_all_vendor();
			    
		    }
		    $data['view'] = 'admin/vendormodule/vendor_list';
			$this->load->view('admin/layout', $data);

			// echo "<pre>";

			// print_r($data['all_users']);

		}

		// active and deactive vendor
		public function activatevendor($id){			
			

			if($id){

					$data['user'] = $this->vendormodule_model->get_vendor_by_id($id);

					$hotelid = $data['user']['v_id'];
									

					$data = array(
						
						'v_id' => $id,
						'status' => $this->input->get('alot'),
						//'added' => date('Y-m-d : h:m:s'),
												
					);
					
					//echo $data['v_id'];die;
					
					if (!empty($data['v_id'])) {

						//echo $data['v_id'];
						
						$data = $this->security->xss_clean($data);

						$result = $this->vendormodule_model->edit_vendor($data, $id);
					

					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/vendormodule'));
					}
					}
					
			}
			
		}

		// active and deactive vendor


		//////// referrel code///////////

		public function referral(){

			//  $id = $this->session->userdata('admin_id');		 

			// $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);

			if($this->input->post('submit')){	
			$email = $_POST['v_email'];
			$fname = $_POST['v_fname'];
			$lname = $_POST['v_lname'];
				$this->form_validation->set_rules('v_referral', 'Referral Code', 'trim|required');			


				if ($this->form_validation->run() == FALSE) {

					$data['view'] = 'admin/vendormodule/';

					$this->load->view('admin/layout', $data);

				}

				else{

					$data = array(

						'v_id' => $this->input->post('v_id'),

						'v_referral' => $this->input->post('v_referral'),
						'status' => '1',

						'modified' => date('Y-m-d : h:m:s'),

					);

					$data = $this->security->xss_clean($data);

					$result = $this->vendormodule_model->edit_referalcode($data);

					if($result){

						// email for vendor approve
						
					     $to = $email;
					     $subject = "Anytime Check In Approval";
					     $message = "
					     <table style='width: 100%;'>
					<tbody><tr style='
					    border-bottom: 2px solid #222;
					'>
					  <td style='text-align: center; width: 100%;'><img src='https://anytimecheckin.com/new/image/top-logo.png'></td>
					</tr>
					</tbody></table>

					<table style='width:100%;margin-top: 25px;'>

					</table>

					<table style='width: 100%;position: relative; left: 26%;     top: 10px;'>
					<tr>
					  <td color: #222;>Dear ".$fname." ".$lname.",</td>
					</tr>

					<tr>
					  <td color: #222;>Anytime Check In Approval</td>
					</tr>

					<tr>
					  <td>Your Account has been approved.</td>
					</tr>

					<br />

					<tr>
					<td>Thanks,</td>
					</tr>

					<tr>
					<td>Anytime Check In</td>
					</tr>

					<tr>
					<td>info@anytimecheckin.com</td>
					</tr>

					</table>

					<table style=' width: 100%; 
					    padding-top: 20px;'>
					  <tr><td></td></tr>
					</table>




					<style>


					td {
					    font-size: 18px; color:#222;
					}

					</style>
					          
					          ";

					    //echo $message;

					                        // Always set content-type when sending HTML email
					          $headers = "MIME-Version: 1.0" . "\r\n";
					          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					                        // More headers
					          $headers .= 'From: info@anytimecheckin.com' . "\r\n";
					          $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";
					           $headers .= 'Cc: taru@netmaxims.com' . "\r\n";

					               // echo'<pre>';
					               // print_r($message);die;

					          $mail = mail($to,$subject,$message,$headers);

					         // return $otp;


						// end email for vendor approve


						$this->session->set_flashdata('msg', 'Record is Added Successfully!');

						redirect(base_url('admin/vendormodule'));

					}

				}

			}

			else{

				$data['view'] = 'admin/vendormodule/';

				$this->load->view('admin/layout', $data);

			}

			

		}


		/////// end referrel code//////////

		

		public function add(){

			 $id = $this->session->userdata('admin_id');

			 

			$data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);

			if($this->input->post('submit')){



				$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');

				$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');

				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');

				$this->form_validation->set_rules('email', 'Email', 'trim|required');

				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');

				$this->form_validation->set_rules('address', 'Address', 'trim|required');

				$this->form_validation->set_rules('designation', 'Designation', 'trim|required');

				$this->form_validation->set_rules('status', 'Status', 'trim|required');



				if ($this->form_validation->run() == FALSE) {

					$data['view'] = 'admin/vendormodule/vendor_add';

					$this->load->view('admin/layout', $data);

				}

				else{

					$data = array(

						'hotel_id' => $this->input->post('hotel_id'),

						'user_fname' => $this->input->post('firstname'),

						'user_lname' => $this->input->post('lastname'),

						'user_email' => $this->input->post('email'),

						'user_mob_no' => $this->input->post('mobile_no'),

						'user_address' => $this->input->post('address'),

						'user_designation' => $this->input->post('designation'),

						'user_status' => $this->input->post('status'),

						'created_at' => date('Y-m-d : h:m:s'),

						'modified_at' => date('Y-m-d : h:m:s'),

					);

					$data = $this->security->xss_clean($data);

					$result = $this->vendormodule_model->add_user($data);

					if($result){

						$this->session->set_flashdata('msg', 'Record is Added Successfully!');

						redirect(base_url('admin/vendormodule'));

					}

				}

			}

			else{

				$data['view'] = 'admin/vendormodule/vendor_add';

				$this->load->view('admin/layout', $data);

			}

			

		}



		public function edit($id = 0)
		{
			 $uid = $this->session->userdata('admin_id');
			 $data['all_hotels'] =  $this->hotel_model->get_all_hotels($uid);
			 if($this->input->post('submit'))
			 {
			    $this->form_validation->set_rules('firstname', 'Username', 'trim|required');
                $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            	$this->form_validation->set_rules('status', 'Status', 'trim|required');

				
				$data = array(
                    'v_fname' => $this->input->post('v_fname'),
                    'v_lname' => $this->input->post('v_lname'),
                    'v_email' => $this->input->post('v_email'),
                    'v_mob' => $this->input->post('v_mob'),
                    'v_address' => $this->input->post('v_address'),
                    'v_gst' => $this->input->post('v_gst'),
                    'status' => $this->input->post('status'),
                    'modified' => date('Y-m-d : h:m:s')
                );
				$data = $this->security->xss_clean($data);
                $result = $this->vendormodule_model->edit_vendor_byid($data, $id);
                if($result)
                {
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/vendormodule'));
				}
				
			}
			else
			{
				$data['user'] = $this->vendormodule_model->get_vendor_byid($id);
				$data['view'] = 'admin/vendormodule/vendor_edit';
				$this->load->view('admin/layout', $data);
			}
		}


		// vendor profile
		public function vendorprofile($id){
			// $uid = $this->session->userdata('admin_id');

			$data['profile'] =  $this->vendormodule_model->get_vendor_by_id($id);

			if($this->input->post('submit')){

				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');

				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');

				$this->form_validation->set_rules('email', 'Email', 'trim|required');

				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');

				$this->form_validation->set_rules('address', 'Address', 'trim|required');

				$this->form_validation->set_rules('designation', 'Designation', 'trim|required');

				$this->form_validation->set_rules('status', 'Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {

					$data['user'] = $this->usermodule_model->get_user_by_id($id);					

					$data['view'] = 'admin/vendormodule/vendor_profile';

					$this->load->view('admin/layout', $data);

				}

				else{

					$data = array(

						'hotel_id' => $this->input->post('hotel_id'),

						'user_fname' => $this->input->post('firstname'),

						'user_lname' => $this->input->post('lastname'),

						'user_email' => $this->input->post('email'),

						'user_mob_no' => $this->input->post('mobile_no'),

						'user_address' => $this->input->post('address'),

						'user_designation' => $this->input->post('designation'),

						'user_status' => $this->input->post('status'),					

						'modified_at' => date('Y-m-d : h:m:s'),

					);

					$data = $this->security->xss_clean($data);

					$result = $this->vendormodule_model->edit_user($data, $id);

					if($result){

						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');

						redirect(base_url('admin/vendormodule'));

					}

				}

			}

			else{

				$data['user'] = $this->vendormodule_model->get_user_by_id($id);

				

				$data['view'] = 'admin/vendormodule/vendor_profile';

				$this->load->view('admin/layout', $data);

			}

		}

		// end vendor profile



		public function del($id = 0){

			$this->db->delete('ci_v_users', array('v_user_id' => $id));

			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');

			redirect(base_url('admin/vendormodule'));

		}



	}





?>
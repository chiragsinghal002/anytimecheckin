<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Discount extends MY_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('admin/discount_model', 'discount_model');
            $this->load->model('admin/hotel_model', 'hotel_model');
            $this->load->model('admin/usermodule_model', 'usermodule_model');
            $this->load->model('admin/room_model', 'room_model');
            $this->load->helper('url');
        }

        public function index(){
            $id = $this->session->userdata('admin_id');
            $data['all_camp'] =  $this->discount_model->get_camps_by_vid($id);
            $data['view'] = 'admin/discount/campaing_list';
            $this->load->view('admin/layout', $data);

        }

        public function campingdate(){
            $id = $this->session->userdata('admin_id');
            $data['camp_date'] =  $this->discount_model->get_all_campdate($id);
            $data['view'] = 'admin/discount/campaing_date_list';
            $this->load->view('admin/layout', $data);

        }
        
        public function add(){
            if($this->input->post('submit')){

                $this->form_validation->set_rules('camp_name', 'Camp Name', 'trim|required');               
                $this->form_validation->set_rules('camp_status', 'Status', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $data['view'] = 'admin/discount/campaning_add';
                    $this->load->view('admin/layout', $data);
                }
                else{
                    $data = array(
                        'vendor_id' => $this->session->userdata('admin_id'),
                        'camp_name' => $this->input->post('camp_name'),
                        'camp_status' => $this->input->post('camp_status'),                     
                        'created_at' => date('Y-m-d : h:m:s'),
                        'modified_at' => date('Y-m-d : h:m:s'),
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->discount_model->add_campaing($data);
                    if($result){
                        $this->session->set_flashdata('msg', 'Record is Added Successfully!');
                        redirect(base_url('admin/discount'));
                    }
                }
            }
            else{
                $data['view'] = 'admin/discount/campaning_add';
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

        // add discount rate
public function discountrate(){
    // echo $ids=$_POST['ids'];
    $id = $this->session->userdata('admin_id');
    $data['all_hotels'] =  $this->hotel_model->get_all_hotels($id);
    $data['room_type'] =  $this->room_model->get_room_by_id(7);
    
    //$data['user_role'] =  $this->user_model->get_user_role();
            if($this->input->post('submit')){

                $this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');
                $this->form_validation->set_rules('room_type_id', 'Room Type', 'trim|required');
                $this->form_validation->set_rules('discount_type', 'Discount', 'trim|required');
                $this->form_validation->set_rules('discount_for', 'Discount For', 'trim|required');
                $this->form_validation->set_rules('camp_dr_status', 'Status', 'trim|required');
                
                
                if ($this->form_validation->run() == FALSE) {
                    $data['view'] = 'admin/discount/discount_rate';
                    $this->load->view('admin/layout', $data);
                }
                else{
                    $data = array(
                        'hotel_id' => $this->input->post('hotel_id'),
                        'room_type_id' => $this->input->post('room_type_id'),
                        'discount_type' => $this->input->post('discount_type'),
                        'voucher_no' => $this->input->post('voucher_no'),
                        'discount_for' =>  $this->input->post('discount_for'),
                        'camp_dr_status' =>  $this->input->post('camp_dr_status'),
                        'created_at' => date('Y-m-d : h:m:s'),
                        'modified_at' => date('Y-m-d : h:m:s'),
                        
                    );
                    $data = $this->security->xss_clean($data);
                    $result = $this->discount_model->add_discount_rate($data);
                    if($result){
                        $this->session->set_flashdata('msg', 'Record is Added Successfully!');
                        redirect(base_url('admin/discount/discountrate'));
                    }
                }
            }
            else{
                $data['view'] = 'admin/discount/discount_rate';
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

    }


?>
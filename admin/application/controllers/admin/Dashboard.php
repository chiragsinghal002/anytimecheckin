<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();

			$this->load->model('admin/dashboard_model', 'dashboard_model');
			$this->load->model('admin/vendormodule_model', 'vendormodule_model');
			$this->load->model('admin/hotel_model', 'hotel_model');
			$this->load->model('admin/booking_model', 'booking_model');

		}

		public function index(){
			$data['all_vendor'] =  $this->vendormodule_model->get_all_vendor();
			$data['all_hotels'] =  $this->hotel_model->get_all_hotels1();
			$data['all_booking'] =  $this->booking_model->get_all_booking();
			$data['all_registeuser'] =  $this->dashboard_model->get_all_registeruser();

			// echo'<pre>';
			// print_r($data['all_registeuser']);

			$data['view'] = 'admin/dashboard/index';
			$this->load->view('admin/layout', $data);
		}

		public function index2(){
			$data['view'] = 'admin/dashboard/index2';
			$this->load->view('admin/layout', $data);
		}
	}

?>	
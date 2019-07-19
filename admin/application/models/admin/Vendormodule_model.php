<?php

	class Vendormodule_model extends CI_Model{



		public function add_user($data){

			$this->db->insert('ci_v_users', $data);

			return true;

		}



		public function get_all_vendor($search=false)
		{
		   	
			$this->db->select('*');
		    $this->db->from('ci_vendors');
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('ci_vendors.status' => $search['status']));
            }
            if(!empty($search) && $search['mobile']!="")
            {
	    	    $this->db->where(array('ci_vendors.v_mob' => $search['mobile']));
            }
	    	if(!empty($search) && $search['email']!="")
            {
	    	    $this->db->where(array('ci_vendors.v_email' => $search['email']));
            }
            if(!empty($search) && $search['first_name']!="")
            {
	    	    $this->db->where(array('ci_vendors.v_fname' => $search['first_name']));
            }
	    	$query = $this->db->get();		
			return $result= $query->result_array();
		}

		public function get_vendor_by_id($id){
			//echo $id;die;
			 $query = $this->db->get_where('ci_vendors', array('v_id' => $id));
			return $result = $query->row_array();
		}



/////// start referal code///////////
public function edit_referalcode($data){
	
			$this->db->where('v_id', $data['v_id']);

			$this->db->update('ci_vendors', $data);

			return true;

		}


		//// end referal code//////////


public function edit_vendor($data, $id){

			$this->db->where('v_id', $id);

			$this->db->update('ci_vendors', $data);

			return true;

		}


public function get_users(){

		$this->db->select('*');

		$this->db->from('ci_vendors');

		$this->db->join('ci_users', 'ci_users.id = ci_vendors.v_id');				

		$this->db->where(array('ci_vendors.status' => '1','ci_users.is_admin' => '1'));

		 

		$query = $this->db->get();		

			

			return $result= $query->result_array();

					}











		public function get_all_users($id){

		$this->db->select('*');

		$this->db->from('ci_v_users');

		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_v_users.hotel_id');				

		$this->db->where(array('ci_hotels.hotel_vendor_id' => $id));

		 

		$query = $this->db->get();		

			

			return $result= $query->result_array();

					}


		public function get_user_by_id($id){

			$query = $this->db->get_where('ci_v_users', array('v_user_id'=>$id));

			return $result = $query->row_array();

		}
        
        //get vendor by id
        public function get_vendor_byid($id)
        {
			$query = $this->db->get_where('ci_vendors', array('v_id'=>$id));
			return $result = $query->row_array();
		}

		public function edit_user($data, $id){

			$this->db->where('v_user_id', $id);

			$this->db->update('ci_v_users', $data);

			return true;

		}
		
		//edit vendor
		public function edit_vendor_byid($data, $id)
		{
			$this->db->where('v_id', $id);
			$this->db->update('ci_vendors', $data);
			return true;
		}



	}



?>
<?php
	class Discount_model extends CI_Model{

		public function add_campaing($data){
			$this->db->insert('ci_camp_discount_rate', $data);
			return true;
		}

		public function campadd($data){
			$this->db->insert('ci_dis_camp_name', $data);
			return true;
		}

		public function delete_camping($data, $id){
			$this->db->where('camp_id', $id);
			$this->db->update('ci_dis_camp_name', $data);
			return true;
		}

		public function delete_camping_date($data, $id){
			$this->db->where('camp_date_id', $id);
			$this->db->update('ci_camp_date', $data);
			return true;
		}

		public function delete_discount_rate($data, $id){
			$this->db->where('camp_dis_id', $id);
			$this->db->update('ci_camp_discount_rate', $data);
			return true;
		}

		public function get_camps_by_vid($id)
		// public function get_camps_by_vid($search=false,$id)
		{
		    $this->db->select('*');
		    $this->db->from('ci_dis_camp_name');
			$this->db->where('vendor_id', $id);
			$this->db->where('camp_status', '1');
			
			if(!empty($search) && $search['camp_name']!="")
            {
	    	    $this->db->where(array('camp_name' => $search['camp_name']));
            }
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('camp_status' => $search['status']));
            }
			$query = $this->db->get();		
			return $result= $query->result_array();
		}

		public function add_dating_camping($data){
			$this->db->insert('ci_camp_date', $data);
			return true;
		}

		public function add_discount_rate($data){
			$this->db->insert('ci_camp_discount_rate', $data);
			return true;
		}

		public function get_all_campdate($search=false,$id){
		$this->db->select('*');
		$this->db->from('ci_camp_date');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_camp_date.hotel_id');
		$this->db->join('ci_dis_camp_name', 'ci_dis_camp_name.camp_id = ci_camp_date.camp_id');	
		
		if(!empty($search) && $search['hotel_name']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_name' => $search['hotel_name']));
            }
            if(!empty($search) && $search['camp_name']!="")
            {
	    	    $this->db->where(array('ci_dis_camp_name.camp_name' => $search['camp_name']));
            }
            if(!empty($search) && $search['fromdate']!="")
            {
	    	    $this->db->where(array('ci_camp_date.from_date' => $search['fromdate']));
            }
            if(!empty($search) && $search['todate']!="")
            {
	    	    $this->db->where(array('ci_camp_date.to_date' => $search['todate']));
            }
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('ci_camp_date.camp_date_status' => $search['status']));
            }
            
		
		$this->db->where(array('ci_dis_camp_name.vendor_id' => $id));
		 
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}


	// discount list
		public function get_all_discount($id){
		$this->db->select('ci_camp_discount_rate.*,ci_dis_camp_name.*,ci_room_type.*,ci_hotels.hotel_name');
		$this->db->from('ci_camp_discount_rate');
		$this->db->join('ci_dis_camp_name', 'ci_dis_camp_name.camp_id = ci_camp_discount_rate.camp_id', 'inner');
		$this->db->join('ci_room_type', 'ci_room_type.room_type_id =ci_camp_discount_rate.room_type_id', 'inner');	
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_room_type.hotel_id','inner');
		
		
		    // if(!empty($search) && $search['hotel_name']!="")
      //       {
	    	//     $this->db->where(array('ci_hotels.hotel_name' => $search['hotel_name']));
      //       }
      //       if(!empty($search) && $search['room_type']!="")
      //       {
	    	//     $this->db->where(array('ci_room_type.hotel_room_type' => $search['room_type']));
      //       }
      //       if(!empty($search) && $search['camp_name']!="")
      //       {
	    	//     $this->db->where(array('ci_dis_camp_name.camp_name' => $search['camp_name']));
      //       }
      //       if(!empty($search) && $search['discount_type']!="")
      //       {
	    	//     $this->db->where(array(' ci_camp_discount_rate.discount_type' => $search['discount_type']));
      //       }
           
      //       if(!empty($search) && $search['status']!="")
      //       {
	    	//     $this->db->where(array('ci_camp_discount_rate.camp_dr_status' => $search['status']));
      //       }
		
		$this->db->order_by('ci_camp_discount_rate.camp_dis_id', "desc");	
		$this->db->where(array('ci_dis_camp_name.vendor_id' => $id));
		 
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}
	
	// discount list end	

	// discount list for manager

		public function get_all_manager_discount($hid,$mid){
		$this->db->select('*');
		$this->db->from('ci_camp_discount_rate');
		//$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_camp_discount_rate.hotel_id','left');
		$this->db->join('ci_dis_camp_name', 'ci_dis_camp_name.camp_id = ci_camp_discount_rate.camp_id', 'left');
		$this->db->join('ci_room_type', 'ci_room_type.room_type_id = ci_camp_discount_rate.room_type_id', 'left');
		$this->db->join('ci_v_assign_role', 'ci_v_assign_role.hotel_id = ci_camp_discount_rate.hotel_id', 'left');	
		$this->db->order_by('ci_camp_discount_rate.camp_dis_id', "desc");	
		$this->db->where(array('ci_v_assign_role.hotel_id' => $hid,'ci_v_assign_role.v_user_id' => $mid));
		 
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}


	// end discount list for manager			


		public function get_user_role(){
			$query = $this->db->get('ci_user_role');
			return $result = $query->result_array();
		}

		public function get_camp($uid){
			
		// 	$this->db->select('*');
		// $this->db->from('ci_dis_camp_name');
		// $this->db->join('ci_camp_discount_rate', 'ci_dis_camp_name.camp_id = ci_camp_discount_rate.camp_id','left');
			
		// $this->db->where(array('ci_dis_camp_name.vendor_id' => $uid,'ci_camp_discount_rate.camp_dis_id' => $id));
		 
		// $query = $this->db->get();	


			$query = $this->db->get_where('ci_dis_camp_name', array('vendor_id' => $uid,'camp_status' => 1));
			return $result = $query->result_array();
		}

		public function get_camp_by_id($id){
			$query = $this->db->get_where('ci_dis_camp_name', array('camp_id' => $id));
			return $result = $query->row_array();
		}

		public function get_campdate_by_id($id){
			$query = $this->db->get_where('ci_camp_date', array('camp_date_id' => $id));
			return $result = $query->row_array();
		}

		public function get_discountrate_by_id($id){
			
			$query = $this->db->get_where('ci_camp_discount_rate', array('camp_dis_id' => $id));
			return $result = $query->row_array();
		}


		

			public function edit_campdate($data, $id){
			$this->db->where('camp_date_id', $id);
			$this->db->update('ci_camp_date', $data);
			return true;
		}

		public function edit_camp($data, $id){
			$this->db->where('camp_id', $id);
			$this->db->update('ci_dis_camp_name', $data);
			return true;
		}

		public function edit_discountrate($data, $id){

			
			
			$this->db->where('camp_dis_id', $id);
			$this->db->update('ci_camp_discount_rate', $data);
			return true;
		}


		

	}

?>
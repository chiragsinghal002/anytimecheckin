<?php
	class Hotel_model extends CI_Model{

		public function add_hotel($data){
			$this->db->insert('ci_hotels', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			//return true;
		}

        public function edithotelphoto($data,$photo_id){
			$this->db->where('hotel_photo_id', $photo_id);
			$this->db->update('ci_hotel_photo', $data);
			return true;
		}
		
        public function get_hotel_photo_by_id($id){
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			$this->db->where(array('ci_hotel_photo.hotel_photo_id' => $id));
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}
		
		public function get_perhotelphotos($photo){
			$perphoto="%".$photo."%";
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			$this->db->like('hotel_room_image', $photo);
			//$this->db->like('room_photo',$photo,'after')
			$query = $this->db->get();	
			
			$result = $query->row_array();
			$parts = explode(',', $result['hotel_room_image']);

				while(($i = array_search($photo, $parts)) !== false) {
					unset($parts[$i]);
				}

				$updated_photo=implode(',', $parts);
				$data = array(
								'hotel_room_image' => $updated_photo,
								
							);
				$this->db->where('hotel_photo_id', $result['hotel_photo_id']);
				$this->db->update('ci_hotel_photo', $data);
			return 1;
			
		}
		
        public function get_all_hotel_photo($search=false,$id){
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			
			$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_hotel_photo.hotel_id');
			if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('ci_hotel_photo.status' => $search['status']));
            }
            if(!empty($search) && $search['hotel_name']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_name' => $search['hotel_name']));
            }
			$this->db->where(array('ci_hotels.hotel_vendor_id' => $id)); 
			$this->db->order_by("ci_hotel_photo.hotel_photo_id", "desc");
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}


		
		public function get_hotelphotos($photo_id){
			$this->db->select('hotel_room_image');
			$this->db->from('ci_hotel_photo');
			$this->db->where(array('hotel_photo_id' => $photo_id));
			$query = $this->db->get();	
			
			return $result = $query->row_array();
		}

		// get gallery start

		public function get_gallery_by_id($photoid){
			
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			//$this->db->join('ci_room_type', 'ci_room_type.room_type_id = ci_hotel_photo.room_type_id');
			$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_hotel_photo.hotel_id');		
			$this->db->where(array('ci_hotel_photo.hotel_photo_id' => $photoid));
			//$this->db->order_by("ci_hotel_photo.hotel_photo_id", "desc");
			$query = $this->db->get();	
			
			return $result = $query->row_array();
		}

		// get gallery end

		public function get_hotel_imageby_id($id){
			$query = $this->db->get_where('ci_hotel_photo', array('hotel_id'=>$id));
			return $result = $query->row_array();
		}
		

		public function add_hotel_photos($data){
			// echo "<pre>";
			// print_r($data);die;
			$this->db->insert('ci_hotel_photo', $data);
			return true;
		}

		public function add_hotel_featured($data){
			$this->db->insert('hotel_featured', $data);
			//$insert_id = $this->db->insert_id();
			//return  $insert_id;
			return true;
		}

		public function get_all_hotels($id)
		{
			
			$this->db->select('*');
		    $this->db->from('ci_hotels');
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_status' => $search['status']));
            }
            if(!empty($search) && $search['telephone']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_telephone' => $search['telephone']));
            }
	    	if(!empty($search) && $search['email']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_email' => $search['email']));
            }
            if(!empty($search) && $search['hotel_name']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_name' => $search['hotel_name']));
            }
             if(!empty($search) && $search['address']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_address' => $search['address']));
            }
             if(!empty($search) && $search['city']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_city' => $search['city']));
            }
             if(!empty($search) && $search['pincode']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_pin_code' => $search['pincode']));
            }
            $this->db->where(array('ci_hotels.hotel_vendor_id' => $id));
           	$this->db->order_by("ci_hotels.hotel_id", "DESC");
	    	$query = $this->db->get();		
			return $result= $query->result_array();
			
			

			return $result = $query->result_array();
		}

		////// manager section//////////////


		////////// get hotel for manager//////

		public function get_manager_hotels($id){
			$this->db->select('*');
			$this->db->from('ci_v_assign_role');			
			$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_v_assign_role.hotel_id');		
			$this->db->where(array('ci_v_assign_role.v_user_id' => $id));
			//$this->db->order_by("ci_v_assign_role.hotel_id", "desc");
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}
		///////// end get hotel for manager////


		///// get hotel photo for manager//////
		public function get_manager_hotel_photo($id){
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			$this->db->join('ci_v_assign_role', 'ci_v_assign_role.hotel_id = ci_hotel_photo.hotel_id');
			$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_hotel_photo.hotel_id');		
			 $this->db->where(array('ci_v_assign_role.v_user_id' => $id));
			$this->db->order_by("ci_hotel_photo.hotel_photo_id", "desc");
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}

		///// end get hotel photo for manager////



		/////// end manager section/////////

		public function get_hotel_by_id($id){
			$query = $this->db->get_where('ci_hotels', array('hotel_id' => $id));
			return $result = $query->row_array();
		}


		public function get_manager_hotel_by_id($id){
			$query = $this->db->get_where('ci_hotels', array('hotel_id' => $id));
			return $result = $query->result_array();
		}


		public function get_admin_facilities(){
			//$query = $this->db->get('facility_id');
			$query = $this->db->get_where('facility_id', array('for_hotel' => '1','admin'=>'1'));
			return $result = $query->result_array();
		}
		public function edit_hotel($data, $id){
			$this->db->where('hotel_id', $id);
			$this->db->update('ci_hotels', $data);
			return true;
		}

		public function get_all_facilities($uid){
			//$query = $this->db->get('facility_id');
			$query = $this->db->get_where('facility_id', array('for_hotel' => '1','vendor_id' => $uid));
			return $result = $query->result_array();
		}

		public function get_all_facilitiesbyid($id){
			//$query = $this->db->get('facility_id');
			$query = $this->db->get_where('ci_hotels', array('hotel_facilities' => '$id'));
			return $result = $query->result_array();
		}

		public function get_admin_facilitiesbyid($id){
			//$query = $this->db->get('facility_id');
			$query = $this->db->get_where('ci_hotels', array('admin_facility' => '$id'));
			return $result = $query->result_array();
		}



		// get state list

		public function get_all_state(){
			$query = $this->db->get_where('states', array('country_id' => '150'));
			return $result = $query->result_array();
		}

		//end get state list

		// start get city by state name

		public function get_city_by_state_id($state_id){
			$this->db->select('*');
			$this->db->from('cities');
			$this->db->join('states', 'states.state_id = cities.state_id');
					
			 $this->db->where(array('states.state_name' => $state_id, 'cities.status' => '1'));
			$this->db->order_by("cities.city_name", "ASC");
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}

		// end get city by state name

	}

?>
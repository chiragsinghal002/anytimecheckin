<?php
	class Hotel_model extends CI_Model{

		public function add_hotel($data){
			$this->db->insert('ci_hotels', $data);
			return true;
		}

		public function get_all_hotels($id)
		{
			$this->db->select('hotel.*,hotel1.*');
		    $this->db->from('ci_hotels as hotel1');
		    $this->db->join(' hotel_featured as hotel', 'hotel.hotel_id =hotel1.hotel_id','Left');	
		    if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('hotel1.hotel_status' => $search['status']));
            }
            if(!empty($search) && $search['hotel_name']!="")
            {
	    	    $this->db->where(array('hotel1.hotel_name' => $search['hotel_name']));
            }
            if(!empty($search) && $search['email']!="")
            {
	    	    $this->db->where(array('hotel1.hotel_email' => $search['email']));
            }
            if(!empty($search) && $search['mobile']!="")
            {
	    	    $this->db->where(array('hotel1.hotel_mobile' => $search['mobile']));
            }
             if(!empty($search) && $search['city']!="")
            {
	    	    $this->db->where(array('hotel1.hotel_city' => $search['city']));
            }
             if(!empty($search) && $search['pincode']!="")
            {
	    	    $this->db->where(array('hotel1.hotel_pin_code' => $search['pincode']));
            }
		    $query = $this->db->get();
		    return $result = $query->result_array();
		}

		public function get_all_hotels1(){
			
			$query = $this->db->get_where('ci_hotels', array('hotel_status' => 1));
			return $result = $query->result_array();
		}

		public function get_hotel_by_id($id){
			$query = $this->db->get_where('ci_hotels', array('hotel_id' => $id));
			return $result = $query->row_array();
		}

		public function get_user_by_id($id){
			$query = $this->db->get_where('ci_vendors', array('v_id' => $id));
			return $result = $query->row_array();
		}


		public function get_hotel_by_vid($vid){
			// $query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));

			$this->db->select('*');
		$this->db->from('ci_hotels');
		$this->db->join('hotel_featured', 'ci_hotels.hotel_id = hotel_featured.hotel_id','Left');	
		 $this->db->where(array('ci_hotels.hotel_vendor_id' => $vid));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
			//var_dump($result);
			// while ($result = $query->row_array()){

			// 	$res[]=$result;
			// }
			//return $result;
		}

		public function edit_hotel($data, $id){
			$this->db->where('hotel_id', $id);
			$this->db->update('ci_hotels', $data);
			return true;
		}


		public function edit_featured($data, $id){
			$this->db->where('hotel_id', $id);
			$this->db->update('hotel_featured', $data);
			return true;
		}

		public function add_hotel_featured($data){
			$this->db->insert('hotel_featured', $data);
			return true;
		}

		public function get_hotel_featured_by_id($id){

			$this->db->select('*');
		$this->db->from('ci_hotels');
		$this->db->join('hotel_featured', 'ci_hotels.hotel_id = hotel_featured.hotel_id','Left');	
		 $this->db->where(array('ci_hotels.hotel_id' => $id));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
			
			// $query = $this->db->get_where('hotel_featured', array('hotel_id' => $id));
			// return $result = $query->row_array();
		}


		public function get_admin_facilities(){
			//$query = $this->db->get('facility_id');
			$query = $this->db->get_where('facility_id', array('for_hotel' => '1','admin'=>'1'));
			return $result = $query->result_array();
		}
		
		//Get hotel photos
		public function get_all_hotel_photo($id)
		{
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			//$this->db->join('ci_room_type', 'ci_room_type.room_type_id = ci_hotel_photo.room_type_id');
			$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_hotel_photo.hotel_id');		
			// $this->db->where(array('ci_hotels.hotel_vendor_id' => $id));
			$this->db->order_by("ci_hotel_photo.hotel_photo_id", "desc");
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}
		
		//Add hotel photo
		public function add_hotel_photos($data)
		{
			// echo "<pre>";
			// print_r($data);die;
			$this->db->insert('ci_hotel_photo', $data);
			return true;
		}
		
		//Edit hotel photo
		public function edithotelphoto($data,$photo_id){
			$this->db->where('hotel_photo_id', $photo_id);
			$this->db->update('ci_hotel_photo', $data);
			return true;
		}
	
	    //Get hotel photo by id	
		public function get_hotel_photo_by_id($id){
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			$this->db->where(array('ci_hotel_photo.hotel_photo_id' => $id));
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}
		
		//Get hotel Photo
		public function get_hotelphotos($photo_id){
			$this->db->select('hotel_room_image');
			$this->db->from('ci_hotel_photo');
			$this->db->where(array('hotel_photo_id' => $photo_id));
			$query = $this->db->get();	
			
			return $result = $query->row_array();
		}
		
		//Get hotel image by id
		public function get_hotel_imageby_id($id){
			$query = $this->db->get_where('ci_hotel_photo', array('hotel_id'=>$id));
			return $result = $query->row_array();
		}
		
		//Get gallery images
		public function get_gallery_by_id($photoid)
		{
			$this->db->select('*');
			$this->db->from('ci_hotel_photo');
			//$this->db->join('ci_room_type', 'ci_room_type.room_type_id = ci_hotel_photo.room_type_id');
			$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_hotel_photo.hotel_id');		
			$this->db->where(array('ci_hotel_photo.hotel_photo_id' => $photoid));
			//$this->db->order_by("ci_hotel_photo.hotel_photo_id", "desc");
			$query = $this->db->get();	
			
			return $result = $query->row_array();
		}
		
    //end
	}

?>
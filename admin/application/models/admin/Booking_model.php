<?php
class Booking_model extends CI_Model{

	public function add_room($data){

		$this->db->insert('hotel_rooms', $data);
		return true;
	}

	public function add_room_type($data){
		$this->db->insert('ci_room_type', $data);
		return true;
	}

	public function get_hotel_booking_by_id($id){
			// $query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));

		$this->db->select('*');
		$this->db->from('hotel_booking');
		//$this->db->join('user_registration', 'hotel_booking.user_id = user_registration.user_id','Left');
		$this->db->join('ci_room_type', 'hotel_booking.room_type_id = ci_room_type.room_type_id','Left');
		$this->db->join('ci_room_photo', 'ci_room_type.room_type_id = ci_room_photo.room_id','Left');
		$this->db->join('ci_hotels', 'hotel_booking.hotel_id = ci_hotels.hotel_id','Left');	
		$this->db->where(array('hotel_booking.booking_id' => $id));

		$query = $this->db->get();		

		return $result = $query->row_array();

	}

	public function GetDiscountbyhotelandroomid($hid,$rid){
		$query = $this->db->get_where('ci_camp_discount_rate', array('room_type_id' => $rid,'hotel_id' => $hid,'camp_dr_status' => 1 ));
		return $result = $query->row_array();
	}

	public function get_all_booking(){
		$this->db->select('hotel_booking.*,ci_hotels.*,user_reviews.user_rating as rate');
		$this->db->from('hotel_booking');
		$this->db->join('ci_hotels', 'hotel_booking.hotel_id=ci_hotels.hotel_id','inner');
		$this->db->join('user_reviews', 'user_reviews.hotel_id=hotel_booking.hotel_id','left');
		// $this->db->group_by("user_reviews.booking_id");
		// $this->db->order_by("hotel_booking.booking_id", "desc");
		//$this->db->where(array('user_registration.is_active' => '1'));	
		$query = $this->db->get();		
		//print_r($this->db->last_query());
		return $result= $query->result_array();
	}



	public function get_all_rooms($id){
		$this->db->select('*');
		$this->db->from('hotel_rooms');
		$this->db->join('ci_room_type', 'ci_room_type.room_type_id = hotel_rooms.room_type_id');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_room_type.hotel_id');		
		$this->db->where(array('ci_hotels.hotel_vendor_id' => $id));
		$query = $this->db->get();		

		return $result= $query->result_array();
	}

	public function get_all_room_type(){
		$query = $this->db->get('ci_room_type');
		return $result = $query->result_array();
	}

	public function get_room(){
		$query = $this->db->get('hotel_rooms');
		return $result = $query->result_array();
	}

	public function get_room_by_id($id){
		$query = $this->db->get_where('ci_room_type', array('hotel_id' => $id));
		return $result = $query->row_array();
	}

	public function get_roomtype_by_id($id){
		$query = $this->db->get_where('ci_room_type', array('room_type_id' => $id));
		return $result = $query->row_array();
	}

	public function get_hotel_room_by_id($id){
		$query = $this->db->get_where('hotel_rooms', array('hotel_room_id' => $id));
		return $result = $query->row_array();
	}

	public function edit_room($data, $id){
		$this->db->where('hotel_room_id', $id);
		$this->db->update('hotel_rooms', $data);
		return true;
	}

	public function edit_room_type($data, $id){
		$this->db->where('room_type_id', $id);
		$this->db->update('ci_room_type', $data);
		return true;
	}


	public function get_room_type_list_and_hotels($id){
		$this->db->select('*');
		$this->db->from('ci_room_type');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_room_type.hotel_id');
		$this->db->where(array('ci_hotels.hotel_vendor_id' => $id));
		
		$query = $this->db->get();		

		return $result= $query->result_array();
	}

        //Get all booking by search filter
	public function get_all_booking_searchfilter($hotelname,$datefrom,$dateto,$todaybooking,$status)
	{
		$this->db->select('*');
		$this->db->from('hotel_booking');

		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = hotel_booking.hotel_id');
		if(!empty($status))
		{
			$this->db->where(array('hotel_booking.booking_status' => $status));
		}
		if(!empty($datefrom))
		{
			$this->db->where(array('hotel_booking.check_in_date' => $datefrom));
		}
		if(!empty($dateto))
		{
			$this->db->where(array('hotel_booking.check_out_date' => $dateto));
		}
		if(!empty($todaybooking))
		{
			$this->db->where(array('hotel_booking.check_in_date' => date('Y-m-d')));
		}
		if(!empty($hotelname))
		{
			$this->db->like('ci_hotels.hotel_name',$hotelname);
		}
		$this->db->order_by("hotel_booking.booking_id", "desc");

		$query = $this->db->get();	

    	//	var_dump( $this->db );

		return $result= $query->result_array();
	}

}

?>
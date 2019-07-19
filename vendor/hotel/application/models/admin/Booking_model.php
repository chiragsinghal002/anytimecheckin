<?php
	class Booking_model extends CI_Model{
		
		
public function get_all_booking($search=false,$vid)
{
			

			$this->db->select('*');
		$this->db->from('hotel_booking');
		
		$this->db->join('ci_hotels', 'hotel_booking.hotel_id = ci_hotels.hotel_id','Left');	
		
	    	
            if(!empty($search) && $search['hotel']!="")
            {
	    	    $this->db->where(array('ci_hotels.hotel_name' => $search['hotel']));
            }
           
            if(!empty($search) && $search['indate']!="")
            {
	    	    $this->db->where(array('hotel_booking.check_in_date' => $search['indate']));
            }
            if(!empty($search) && $search['outdate']!="")
            {
	    	    $this->db->where(array('hotel_booking.check_out_date' => $search['outdate']));
            }
            if(!empty($search) && $search['booking_date']!="")
            {
	    	    $this->db->where(array('hotel_booking.check_in_date' => date('Y-m-d')));
            }
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('hotel_booking.status' => $search['status']));
            }
           
		$this->db->order_by("hotel_booking.booking_id", "desc");
		 $this->db->where(array('ci_hotels.hotel_vendor_id' => $vid));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
			//var_dump($result);
			// while ($result = $query->row_array()){

			// 	$res[]=$result;
			// }
			//return $result;
		}
		//////// get booking for manager/////////

		// today's booking/////////
		public function get_todays_booking($search=false,$vid)
		{	
			$date = date("Y-m-d");
		$this->db->select('*');
		$this->db->from('hotel_booking');
		
		$this->db->join('ci_hotels', 'hotel_booking.hotel_id = ci_hotels.hotel_id','Left');	
		
	    	
          //   if(!empty($search) && $search['hotel']!="")
          //   {
	    	    // $this->db->where(array('ci_hotels.hotel_name' => $search['hotel']));
          //   }
           
          //   if(!empty($search) && $search['indate']!="")
          //   {
	    	    // $this->db->where(array('hotel_booking.check_in_date' => $search['indate']));
          //   }
          //   if(!empty($search) && $search['outdate']!="")
          //   {
	    	    // $this->db->where(array('hotel_booking.check_out_date' => $search['outdate']));
          //   }
          //   if(!empty($search) && $search['booking_date']!="")
          //   {
	    	    // $this->db->where(array('hotel_booking.check_in_date' => date('Y-m-d')));
          //   }
          //   if(!empty($search) && $search['status']!="")
          //   {
	    	    // $this->db->where(array('hotel_booking.status' => $search['status']));
          //   }
           
		$this->db->order_by("hotel_booking.booking_id", "desc");
		 $this->db->where(array('ci_hotels.hotel_vendor_id' => $vid ,'hotel_booking.check_in_date' => $date));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
			
		}
		// end today's booking/////

		 //Get all booking by search filter
	public function get_all_booking_searchfilter($indate,$outdate,$booking_type)
	{
		$this->db->select('*');
		$this->db->from('hotel_booking');

		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = hotel_booking.hotel_id');
		
		if(!empty($indate))
		{
			$this->db->where(array('hotel_booking.check_in_date >=' => $indate,'hotel_booking.booking_type >=' => $booking_type));
		}
		if(!empty($outdate))
		{
			$this->db->where(array('hotel_booking.check_in_date <=' => $outdate,'hotel_booking.booking_type >=' => $booking_type));
		}
		

		$this->db->order_by("hotel_booking.booking_id", "desc");

		$query = $this->db->get();	

    	//	var_dump( $this->db );

		return $result= $query->result_array();
	}

//Get all booking by search filter
		public function get_all_manager_booking($vid){
			// $query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));

			$this->db->select('*');
		$this->db->from('hotel_booking');		
		$this->db->join('ci_hotels', 'hotel_booking.hotel_id = ci_hotels.hotel_id','Left');	
		$this->db->join('ci_v_assign_role', 'ci_v_assign_role.hotel_id = ci_hotels.hotel_id','Left');
		$this->db->order_by("hotel_booking.booking_id", "desc");
		 $this->db->where(array('ci_v_assign_role.v_user_id' => $vid));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
			//var_dump($result);
			// while ($result = $query->row_array()){

			// 	$res[]=$result;
			// }
			//return $result;
		}

		/////// end get booking for manager//////

		// get review by booking id

		public function get_review_by_bookingid($id){
			//echo $id;die;
			$query = $this->db->get_where('user_reviews', array('booking_id' => $id));
			return $result = $query->row_array();
		}

		// end get review by booking id

		public function get_all_booking_by_hotel_id(){
			// $query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));

			$this->db->select('*');
		$this->db->from('hotel_booking');
		$this->db->join('user_registration', 'hotel_booking.user_id = user_registration.user_id','Left');
		
		$this->db->join('ci_hotels', 'hotel_booking.hotel_id = ci_hotels.hotel_id','Left');	
		$this->db->join('ci_v_assign_role', 'ci_hotels.hotel_id = ci_v_assign_role.hotel_id','Left');
		 //$this->db->where(array('ci_hotels.hotel_vendor_id' => $vid));

			$query = $this->db->get();		
			
			return $result= $query->result_array();
			//var_dump($result);
			// while ($result = $query->row_array()){

			// 	$res[]=$result;
			// }
			//return $result;
		}

		public function get_booking_by_id($id){
			$query = $this->db->get_where('hotel_booking', array('booking_id' => $id));
			return $result = $query->row_array();
		}


		public function GetDiscountbyhotelandroomid($hid,$rid){
			$query = $this->db->get_where('ci_camp_discount_rate', array('room_type_id' => $rid,'hotel_id' => $hid,'camp_dr_status' => 1 ));
			return $result = $query->row_array();
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

public function edit_booking($data, $id){
			$this->db->where('booking_id', $id);
			$this->db->update('hotel_booking', $data);
			return true;
		}

		public function delete_booking($data, $id){
			$this->db->where('booking_id', $id);
			$this->db->update('hotel_booking', $data);
			return true;
		}

		public function add_vendor_review($data){

			$this->db->insert('vendor_reviews', $data);
			return true;
		}


		// vendor review

		public function get_vendorreview_by_id($vid,$id){
			
			$this->db->select('*');
			$this->db->from('vendor_reviews');			
			$this->db->join('user_reviews', 'user_reviews.review_id = vendor_reviews.ureview_id');		
			$this->db->where(array('vendor_reviews.vendor_id' => $vid,'user_reviews.booking_id' => $id));
			//$this->db->order_by("ci_hotel_photo.hotel_photo_id", "desc");
			$query = $this->db->get();	
			
			return $result = $query->result_array();
		}


		// end vendor review
		

		

	}

?>
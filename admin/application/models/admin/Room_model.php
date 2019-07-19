<?php
error_reporting(0);
	class Room_model extends CI_Model{

		public function add_room($data){
			
			$this->db->insert('hotel_rooms', $data);
			return true;
		}

		public function add_room_type($data){
			$this->db->insert('ci_room_type', $data);
			return true;
		}

		public function all_room_details($hotel_id,$room_type_id){
			//$query = $this->db->get('facility_id');
		$query=$this->db->query("SELECT * FROM room_pricing_schedule where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and status='1' ORDER BY day ASC");
		 // $query->$this->db->get();		

		$result= $query->result_array();
		foreach($result as $data1){
			$data[]=$data1;
		}
		return $data;
	}

		// public function get_all_rooms(){
		// 	$query = $this->db->get('hotel_rooms');
		// 	return $result = $query->result_array();
		// }
		public function rooms_available($data){
		// var_dump($data);die;
		$day=$data[0];
		$month=$data[1];
		$year=$data[2];
		$hotel_id=$data[3];
		$room_type_id=$data[4];
		$no_of_rooms=$data[5];
		$created_at=date('Y-m-d H:i:s');
		$query = $this->db->get_where('room_pricing_schedule', array('hotel_id' => $hotel_id,'room_type_id'=>$room_type_id,'day'=>$day,'month'=>$month,'year'=>$year));
		// $result=$this->db->get();
		if($query->num_rows()>0){
			$update=$this->db->query("UPDATE room_pricing_schedule SET available_room='".$no_of_rooms."' where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and day='".$day."' and month='".$month."' and year='".$year."'");
		}else{
			$insert=array(
				'hotel_id'=>$hotel_id,
				'room_type_id'=>$room_type_id,
				'available_room'=>$no_of_rooms,
				'day'=>$day,
				'month'=>$month,
				'year'=>$year,
				'created_at'=>$created_at
			);
			$this->db->insert('room_pricing_schedule', $insert);
		}
		
	}

	public function rooms_booked($data){
		// var_dump($data);die;
		$day=$data[0];
		$month=$data[1];
		$year=$data[2];
		$hotel_id=$data[3];
		$room_type_id=$data[4];
		$booked_room=$data[5];
		$created_at=date('Y-m-d H:i:s');
		$query = $this->db->get_where('room_pricing_schedule', array('hotel_id' => $hotel_id,'room_type_id'=>$room_type_id,'day'=>$day,'month'=>$month,'year'=>$year));
		// $result=$this->db->get();
		if($query->num_rows()>0){
			$update=$this->db->query("UPDATE room_pricing_schedule SET booked_room='".$booked_room."' where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and day='".$day."' and month='".$month."' and year='".$year."'");
		}else{
			$insert=array(
				'hotel_id'=>$hotel_id,
				'room_type_id'=>$room_type_id,
				'booked_room'=>$booked_room,
				'day'=>$day,
				'month'=>$month,
				'year'=>$year,
				'created_at'=>$created_at
			);
			$this->db->insert('room_pricing_schedule', $insert);
		}
		
	}


	public function price_per_day($data){
		// var_dump($data);die;
		$day=$data[0];
		$month=$data[1];
		$year=$data[2];
		$hotel_id=$data[3];
		$room_type_id=$data[4];
		$price_per_day=$data[5];
		$created_at=date('Y-m-d H:i:s');
		$query = $this->db->get_where('room_pricing_schedule', array('hotel_id' => $hotel_id,'room_type_id'=>$room_type_id,'day'=>$day,'month'=>$month,'year'=>$year));
		// $result=$this->db->get();
		if($query->num_rows()>0){
			$update=$this->db->query("UPDATE room_pricing_schedule SET price_per_day='".$price_per_day."' where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and day='".$day."' and month='".$month."' and year='".$year."'");
		}else{
			$insert=array(
				'hotel_id'=>$hotel_id,
				'room_type_id'=>$room_type_id,
				'price_per_day'=>$price_per_day,
				'day'=>$day,
				'month'=>$month,
				'year'=>$year,
				'created_at'=>$created_at
			);
			$this->db->insert('room_pricing_schedule', $insert);
		}
		
	}

	public function price_per_hour($data){
		// var_dump($data);die;
		$day=$data[0];
		$month=$data[1];
		$year=$data[2];
		$hotel_id=$data[3];
		$room_type_id=$data[4];
		$price_per_hour=$data[5];
		$created_at=date('Y-m-d H:i:s');
		$query = $this->db->get_where('room_pricing_schedule', array('hotel_id' => $hotel_id,'room_type_id'=>$room_type_id,'day'=>$day,'month'=>$month,'year'=>$year));
		// $result=$this->db->get();
		if($query->num_rows()>0){
			$update=$this->db->query("UPDATE room_pricing_schedule SET price_per_hour='".$price_per_hour."' where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and day='".$day."' and month='".$month."' and year='".$year."'");
		}else{
			$insert=array(
				'hotel_id'=>$hotel_id,
				'room_type_id'=>$room_type_id,
				'price_per_hour'=>$price_per_hour,
				'day'=>$day,
				'month'=>$month,
				'year'=>$year,
				'created_at'=>$created_at
			);
			$this->db->insert('room_pricing_schedule', $insert);
		}
		
	}

	public function get_all_rooms_timming($data){
		
		// echo "SELECT * FROM hotel_booking where hotel_id='".$data['hotel_id']."' and room_type_id='".$data['room_type_id']."' and booking_type='".$data['booking_type']."' and check_in_date='".$data['check_in']."' ORDER BY room_no";die;
		$query=$this->db->query("SELECT * FROM hotel_booking where hotel_id='".$data['hotel_id']."' and room_type_id='".$data['room_type_id']."' and booking_type='".$data['booking_type']."' and check_in_date='".$data['check_in']."' ORDER BY room_no");
		 // $query->$this->db->get();		

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
		public function price_base_of_roomtypeid($hotel_id,$room_type_id){
			//$query = $this->db->get('facility_id');
		$query=$this->db->query("SELECT price_per_hour,price_per_day FROM ci_room_type where hotel_id='".$hotel_id."' and room_type_id='".$room_type_id."' and status='1'");
		 // $query->$this->db->get();		

		return $result= $query->result_array();
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


		public function get_room_type_list_and_hotels($search=false){
		$this->db->select('*');
		$this->db->from('ci_room_type');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_room_type.hotel_id');
		if(!empty($search) && $search['status']!="")
        {
	    	$this->db->where(array('ci_room_type.status' => $search['status']));
        }
        if(!empty($search) && $search['room_type']!="")
        {
	    	$this->db->where(array('ci_room_type.hotel_room_type' => $search['room_type']));
        }
        if(!empty($search) && $search['hotel_name']!="")
        {
	    	$this->db->where(array('ci_hotels.hotel_name' => $search['hotel_name']));
        }
        if(!empty($search) && $search['adult']!="")
        {
	    	$this->db->where(array('ci_hotels.adult_person_capacity' => $search['adult']));
        }
        if(!empty($search) && $search['child']!="")
        {
	    	$this->db->where(array('ci_hotels.child_capacity' => $search['child']));
        }
        
		 $this->db->order_by("ci_room_type.room_type_id","desc");
		
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}


					public function get_room_facilities(){
			//$query = $this->db->get('facility_id');
		$query = $this->db->get_where('facility_id', array('for_room_type' => '1','vendor'=>'1'));
		return $result = $query->result_array();
	}



	public function get_admin_facilities(){
			//$query = $this->db->get('facility_id');
		$query = $this->db->get_where('facility_id', array('for_room_type' => '1','admin'=>'1'));
		return $result = $query->result_array();
	}

	public function get_vendor_facilities(){
			//$query = $this->db->get('facility_id');
		$query = $this->db->get_where('facility_id', array('for_room_type' => '1','vendor'=>'1'));
		return $result = $query->result_array();
	}


	}

?>
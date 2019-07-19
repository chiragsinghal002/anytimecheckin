<?php
	class Room_model extends CI_Model{

		public function add_room($data){
			
			$this->db->insert('hotel_rooms', $data);
			return true;
		}

		public function add_room_type($data){
			$this->db->insert('ci_room_type', $data);
			return true;
		}

		// public function get_all_rooms(){
		// 	$query = $this->db->get('hotel_rooms');
		// 	return $result = $query->result_array();
		// }


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


	}

?>
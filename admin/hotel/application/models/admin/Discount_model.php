<?php
	class Discount_model extends CI_Model{

		public function add_campaing($data){
			$this->db->insert('ci_dis_camp_name', $data);
			return true;
		}

		public function get_camps_by_vid($id){
			$this->db->where('vendor_id', $id);
			$query = $this->db->get_where('ci_dis_camp_name', array('vendor_id' => $id));
			return $result = $query->result_array();
		}

		public function add_dating_camping($data){
			$this->db->insert('ci_camp_date', $data);
			return true;
		}

		public function add_discount_rate($data){
			$this->db->insert('ci_camp_discount_rate', $data);
			return true;
		}

		public function get_all_campdate($id){
		$this->db->select('*');
		$this->db->from('ci_camp_date');
		$this->db->join('ci_hotels', 'ci_hotels.hotel_id = ci_camp_date.hotel_id');
		$this->db->join('ci_dis_camp_name', 'ci_dis_camp_name.camp_id = ci_camp_date.camp_id');		
		$this->db->where(array('ci_dis_camp_name.vendor_id' => $id));
		 
		$query = $this->db->get();		
			
			return $result= $query->result_array();
					}


		public function get_user_role(){
			$query = $this->db->get('ci_user_role');
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


		

	}

?>
<?php
	class Hotelfacilities_model extends CI_Model{

		public function add_facility($data){
			$this->db->insert('facility_id', $data);
			return true;
		}

		// public function get_all_facility(){
		// 	//$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('facility_id');
		// 	return $result = $query->result_array();
		// }

		public function get_all_facility($search=false)
		{
		    $this->db->select('*');
		    $this->db->from('facility_id');
            if(!empty($search) && $search['status']!="")
            {
	    	    $this->db->where(array('status' => $search['status']));
            }
            if(!empty($search) && $search['facility_name']!="")
            {
	    	    $this->db->where(array('facility_name' => $search['facility_name']));
            }
            
            $this->db->where(array('for_hotel' =>'1', 'admin' => '1'));
	    	$query = $this->db->get();	
	    
			return $result= $query->result_array();
		}

		// public function get_all_hotels($id){
		// 	$this->db->where('hotel_vendor_id', $id);
		// 	$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $id));
		// 	return $result = $query->result_array();
		// }

		public function get_facility_by_id($id){
			$query = $this->db->get_where('facility_id', array('facility_id' => $id));
			return $result = $query->row_array();
		}


		public function get_hotel_by_vid($vid){
			$query = $this->db->get_where('ci_hotels', array('hotel_vendor_id' => $vid));
			$result = $query->result_array();
			//var_dump($result);
			// while ($result = $query->row_array()){

			// 	$res[]=$result;
			// }
			return $result;
		}

		public function edit_facilities($data, $id){

			$this->db->where('facility_id', $id);
			$this->db->update('facility_id', $data);
			return true;
		}

	}

?>
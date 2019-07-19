<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File_model extends CI_Model{

    public function getRows($id = ''){
        $this->db->select('room_photo_id,room_photo,created_at');
        $this->db->from('ci_room_photo');
        if($id){
            $this->db->where('room_photo_id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('created_at','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insert($data = array()){
        $insert = $this->db->insert_batch('ci_room_photo',$data);
        return $insert?true:false;
    }
    
}

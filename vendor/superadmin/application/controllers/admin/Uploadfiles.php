<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Uploadfiles extends MY_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('admin/file_model', 'file_model');
        $this->load->helper('url');
    }
    
    function index(){
        $data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = '/images/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    // $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    // $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->file_model->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        //Get files data from database
        $data['files'] = $this->file_model->getRows();
        //Pass the files data to view
        $this->load->view('admin/uploadfiles/index', $data);
    }

}
?>
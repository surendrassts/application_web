<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function __construct() {
            parent::__construct();
            @session_start();
        }
        
        public function details() {            
            $this->load->helper('url');
            $url_data['page_name'] = $this->uri->segment(2);
            $this->load->model('hospitals');
            $search_data = array();
            $search_data['k_search'] = '';
            if($this->input->post('k_search')){
                $search_data['k_search'] = $this->input->post('k_search');
            }
            if($this->input->post('k_c_submit')){
                $search_data['k_search'] = '';
            }            
            $result = $this->hospitals->getAllHospitals($search_data);
            $data = array('data'=>$result,'k_search'=>$search_data['k_search']);
            $this->load->view('hospitals/details',$data);
        }
        
        public function create() {
            $this->load->helper('url');
            $url_data['page_name'] = $this->uri->segment(2);
            $this->load->model('hospitals');
            
            
            $data = array('data'=>'','msg'=>'','status'=>'');
            try {
            if($this->input->post('e_create_submit')){
                $reqdata = $this->input->post();                
                $reqdata['e_type'] = $this->config->item('hospitals_entity_type');
                $target_dir = $this->config->item('entity_doc_upload_path');
                $temp_file = $_FILES["e_poc_document"]["tmp_name"];
                $uploadOk = 1;
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["e_poc_document"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                $target_file = $target_dir . basename($_FILES["e_poc_document"]["name"]);
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                echo $_FILES["e_poc_document"]["size"];
                if ($_FILES["e_poc_document"]["size"] > $this->config->item('entity_doc_max_size')) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                echo $imageFileType;
                if($imageFileType != $this->config->item('entity_doc_file_type')) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if(!is_writable($target_dir)) {
                    echo "Folder is not writable";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    $reqdata["timestamp"] = time();
                    $reqdata["file_ext"] = $imageFileType;
                    $result = $this->hospitals->createHospital($reqdata);
                    if($result){
                    mkdir($target_dir.$result, 0777, TRUE);
                    $target_path = $target_dir.$result."/".$result."_".$reqdata["timestamp"].".".$reqdata["file_ext"];
                    if (move_uploaded_file($_FILES["e_poc_document"]["tmp_name"], $target_path)) {
                        echo "The file ". basename( $_FILES["e_poc_document"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    }
                    if($result){
                        $data = array('data'=>$result,'msg'=>'Hospital added successfully','status'=>'success');
                    }  else {
                        $data = array('data'=>$result,'msg'=>'There is an error in backend','status'=>'error');
                    } 
                }
                
                
                
                
                /*LOADING UPLAOD LIBRARY FOR FILE UPLAOD */
                /*$config['file_name'] = time();
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1024;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('e_poc_document'))
                {
                echo $this->upload->display_errors();
                }
                else
                {
                    $result = 52;
                $config['upload_path']          = './uploads/'.$result."/";
                mkdir($config['upload_path'], 0777, TRUE);
                //$result = $this->hospitals->createHospital($reqdata);
                $res = $this->upload->data();
                $file_path     = $res['file_path'];
                $file         = $res['full_path'];
                $file_ext     = $res['file_ext'];
                $final_file_name = time().$file_ext;

                // here is the renaming functon
                rename($file, $file_path . $final_file_name);
                }*/
            }
            }  catch (Exception $e){
                $data = array('data'=>$result,'msg'=>'There is an error in backend','status'=>'error');
            }
            
            $result = $this->hospitals->getSpecialisation();
            $data['spe_types'] = $result;
            $this->load->model('common');
            $result_states =  $this->hospitals->get_states();
            $data['states'] = $result_states;
            $this->load->view('hospitals/create',$data);
        }
        
         public function edit(){
             $data = array('data'=>'','msg'=>'','status'=>'');
            $entity_id = $_GET['entity_id'];
            $this->load->model('hospitals');
            $result = $this->hospitals->edit_hospital($entity_id);
            $data = array("data"=>$result);
            $result_states =  $this->hospitals->get_states();
            $data['states'] = $result_states;
            $result = $this->hospitals->getSpecialisation();
            $data['spe_types'] = $result;
            $result_states =  $this->hospitals->get_states();
            $data['states'] = $result_states;
            //print_r($data);
            $this->load->view('hospitals/edit_hospital',$data);
            
         }
         
         
        public function update(){
            $data = array('data'=>'','msg'=>'','status'=>'');
            $data = array('data'=>'','msg'=>'User Sucessfully Updated','status'=>'');
            if($this->input->post('e_update_submit')){
                $this->load->model('users');
                $updatedata = $this->input->post();
                $this->users->update_user($updatedata);
                $this->details();
                
            }
            
            }
            
            public function update_status(){
                $this->load->model('hospitals');
                $status = $this->input->post('status');
                if($status == "Inactive"){
                    $status = 1;
                    
                }elseif($status == "Active"){
                    $status = 0;
                    
                }
                $entity_id = $this->input->post('id');
                $this->hospitals->update_user_status($entity_id,$status);
                
                }
    
    public function get_cities() {
        $this->load->model('hospitals');
        $state_id = $this->input->post('state_id');
        $this->hospitals->get_cities($state_id);
        
    }
        
        
        
}

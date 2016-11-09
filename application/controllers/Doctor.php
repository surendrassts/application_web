<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	   
	public function index()
	{
		
	}
        
        public function __construct() {
            parent::__construct();
            @session_start();
        }
        
        public function details() {
            $this->load->model('users');
            $search_data = array();
            $search_data['k_search'] = '';
            if($this->input->post('k_search')){
                $search_data['k_search'] = $this->input->post('k_search');
            }
            if($this->input->post('k_c_submit')){
                $search_data['k_search'] = '';
            }
            $result = $this->users->getAllDoctors($search_data);
            $data = array('data'=>$result,'k_search'=>$search_data['k_search']);
            $this->load->view('doctors/details',$data);
        }
        
        public function create() {     
            
            
            $this->load->model('users');
            $this->load->model('specialities');
            $data = array('data'=>'','msg'=>'','status'=>'');
            if($this->input->post('e_create_submit')){
                $reqdata = $this->input->post(); 
                $reqdata['e_type'] = $this->config->item('bbank_entity_type');
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
                    $reqdata['e_role'] = array($this->input->post('e_role'),$this->config->item('default_role'));
                $result = $this->users->createDoctor($reqdata);
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
                    $data = array('data'=>$result,'msg'=>'Doctor added successfully','status'=>'success');
                }  else {
                    $data = array('data'=>$result,'msg'=>'There is an error in backend','status'=>'error');
                }
                
                }
                
                }       
            $entity_roles = $this->users->get_entity_roles($this->config->item('doctors_entity_type'));
            $data['entity_roles'] = $entity_roles;
            $entity_services = $this->specialities->get_entity_specialities_services($this->config->item('doctors_entity_type'));
            $data['entity_services'] = $entity_services;
            $result_states =  $this->users->get_states();
             $data['states'] = $result_states;
            $this->load->view('doctors/create',$data);
        }
        
         public function edit(){
             $data = array('data'=>'','msg'=>'','status'=>'');
            $entity_id = $_GET['entity_id'];
            $this->load->model('users');
             $this->load->model('specialities');
            $result = $this->users->edit_doctor($entity_id);
            $data = array("data"=>$result);
            $result_states =  $this->users->get_states();
            $data['states'] = $result_states;
            $entity_services = $this->specialities->get_entity_specialities_services($this->config->item('doctors_entity_type'));
            $data['entity_services'] = $entity_services;
            $entity_roles = $this->users->get_entity_roles($this->config->item('doctors_entity_type'));
            $data['entity_roles'] = $entity_roles;
            $result_states =  $this->users->get_states();
            $data['states'] = $result_states;
            $this->load->view('doctors/edit_doctor',$data);
            
         }
         
         
         
         
        public function update(){
            $data = array('data'=>'','msg'=>'','status'=>'');
            $data = array('data'=>'','msg'=>'User Sucessfully Updated','status'=>'');
            if($this->input->post('e_update_submit')){
                $this->load->model('users');
                $updatedata = $this->input->post();
                $this->users->update_doctor($updatedata);
                $this->details();
                
            }
        
        }
        
               public function get_cities() {
                   $this->load->model('users');
                   $state_id = $this->input->post('state_id');
                   $this->users->get_cities($state_id);
                   
               }
        
        
        public function update_status(){
            $this->load->model('users');
            $status = $this->input->post('status');
            if($status == "Inactive"){
                $status = 1;
                
            }elseif($status == "Active"){
                $status = 0;
                
            }
            $user_id = $this->input->post('id');
            $this->users->update_user_status($user_id,$status);
            
            }
            
            }

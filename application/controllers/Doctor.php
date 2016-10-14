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
              
                $reqdata['e_role'] = array($this->input->post('e_role'),$this->config->item('default_role'));
                $result = $this->users->createDoctor($reqdata);
                if($result){
                    echo $result;
                }
            }            
            $entity_roles = $this->users->get_entity_roles($this->config->item('doctors_entity_type'));
            $data['entity_roles'] = $entity_roles;
            $entity_services = $this->specialities->get_entity_specialities_services($this->config->item('doctors_entity_type'));
            $data['entity_services'] = $entity_services;
            $this->load->view('doctors/create',$data);
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

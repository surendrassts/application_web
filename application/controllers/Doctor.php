<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

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
}

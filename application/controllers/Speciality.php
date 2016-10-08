<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speciality extends CI_Controller {

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
            $this->load->model('specialities');
            $search_data = array();
            $search_data['k_search'] = '';
            if($this->input->post('k_search')){
                $search_data['k_search'] = $this->input->post('k_search');
            }
            if($this->input->post('k_c_submit')){
                $search_data['k_search'] = '';
            }
            $result = $this->specialities->getAllSpecialities($search_data);
            $data = array('data'=>$result,'k_search'=>$search_data['k_search']);
            $this->load->view('speciality/details',$data);
        }
        
        
        public function create() {            
            $this->load->model('specialities');
            $data = array('data'=>'','msg'=>'','status'=>'');
            try {
            if($this->input->post('e_create_submit')){
                $reqdata = $this->input->post();                
                $result = $this->specialities->createSpeciality($reqdata);
                if($result){
                    $data = array('data'=>$result,'msg'=>'Speciality added Successfully','status'=>'success');
                }  else {
                    $data = array('data'=>$result,'msg'=>'There is an error in backend','status'=>'error');
                }                
            }
            }  catch (Exception $e){
                $data = array('data'=>$result,'msg'=>'There is an error in backend','status'=>'error');
            }
            $entity_types = $this->specialities->getEntityTypes();
            $data['entity_types'] = $entity_types;
            $this->load->view('speciality/create',$data);
        }
}

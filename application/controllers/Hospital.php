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
                $reqdata['e_type'] = 1;
                /*LOADING UPLAOD LIBRARY FOR FILE UPLAOD */
               $result = $this->hospitals->createHospital($reqdata);
                $config['upload_path']          = './uploads/'.$result."/";
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1024;
                $this->load->library('upload', $config);
                mkdir($config['upload_path'], 0777, TRUE);
                $this->upload->do_upload('e_poc_document');
                $error = array('error' => $this->upload->display_errors());
                 echo $error['error'];
                if($result){
                    $data = array('data'=>$result,'msg'=>'Hospital added successfully','status'=>'success');
                }  else {
                    $data = array('data'=>$result,'msg'=>'There is an error in backend','status'=>'error');
                }                
            }
            }  catch (Exception $e){
                $data = array('data'=>$result,'msg'=>'There is an error in backend','status'=>'error');
            }
            
            $result = $this->hospitals->getSpecialisation();
           
           
            $data['spe_types'] = $result;
            
            $this->load->model('common');
            
            $result_states =  $this->common->get_states();
            
            $data['states'] = $result_states;
            
            $this->load->view('hospitals/create',$data);
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
        
        $this->load->model('common');
        
        $state_id = $this->input->post('state_id');
        $this->common->get_cities($state_id);
              
    }
        
        
        
}

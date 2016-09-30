<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

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
        }
        
        public function detail() {            
            $this->load->helper('url');
            $url_data['page_name'] = $this->uri->segment(2);
            $this->load->model('vendors');
            $result = $this->vendors->getVendorDetailsByPagename($url_data);
            $data = array('data'=>$result);
            $this->load->view('vendor/detail',$data);
        }
}

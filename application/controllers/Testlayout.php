<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testlayout extends CI_Controller {
    
    public function index()
	{       
                $this->load->library('Layouts');
                $this->layouts->set_title('Welcome');
                $this->layouts->add_include('js/simple_js.js');
		$this->layouts->view('welcome_message');
	}
    
    
    
    
}
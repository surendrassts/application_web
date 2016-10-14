<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
    
    
    public function get_country(){
      
        $query = $this->db->get_where('country', array('status' => 1));
        $data = $query->result();
        return $data;
        
     }
    
    public function get_states(){
      
        $query = $this->db->get_where('state', array('status' => 1));
        $data = $query->result();
        return $data;
        
     }
    
    
    
    
   public function get_cities($state_id){
      
        $query = $this->db->get_where('cities', array('state_id'=> 1,'status' => 1));
        $data = $query->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
     
     }
    
    
    
    
    
    
    
}

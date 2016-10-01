<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospitals extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->set($data);
        if($this->db->insert('users')){
            return true;
        }  else {
            return false;
        }
    }
    
    function getAllHospitals($search_data){
        if(!empty ($search_data['k_search'])){
            $query = $this->db->query("select *,eb.name as eb_branch,eb.status as eb_status from entities e join entity_branches eb on e.id=eb.entity_id join entity_types et on e.entity_type=et.id where et.id=1 and (e.name like '%".$search_data['k_search']."%' or e.description like '%".$search_data['k_search']."%')");
        }  else {
            $query = $this->db->query("select *,eb.name as eb_branch,eb.status as eb_status from entities e join entity_branches eb on e.id=eb.entity_id join entity_types et on e.entity_type=et.id where et.id=1");    
        }        
        $data = $query->result();
        return $data;
    }   
    
    function getAllUsers(){
        $query = $this->db->query("select * from users");
        $result = $query->result();
        return $result;
    }
    
}

?>
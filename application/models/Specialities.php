<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialities extends CI_Model{
	
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
    
    function getAllSpecialities($search_data){
        if(!empty ($search_data['k_search'])){
            $query = $this->db->query("SELECT s.id,s.name,et.entity_type,s.status FROM specializations_and_services s JOIN entity_types et ON s.entity_type = et.id where s.name like '%".$search_data['k_search']."%'");
        }  else {
            $query = $this->db->query("SELECT s.id,s.name,et.entity_type,s.status FROM specializations_and_services s JOIN entity_types et ON s.entity_type = et.id");    
        }        
        $data = $query->result();
        return $data;
    }
    
    function getEntityTypes(){
        $data = array();
        $query = $this->db->query("SELECT * FROM entity_types");    
        $data = $query->result();
        return $data;
    }
    
    function createSpeciality($reqdata){
        $this->db->trans_start();
        $result = FALSE;
        $query = $this->db->query("insert into specializations_and_services(name,entity_type,status) values(".$this->db->escape($reqdata['e_name']).",".$this->db->escape($reqdata['e_entity_type']).",".$this->db->escape($reqdata['e_status']).")");
        if($query){
            $result = $this->db->insert_id();
            $this->db->trans_complete();            
        }
        return $result;
    }
    
}

?>
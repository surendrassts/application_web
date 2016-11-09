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
            $query = $this->db->query("select e.*,eb.name as eb_branch,eb.status as eb_status,city as eb_city from entities e join entity_branches eb on e.id=eb.entity_id join entity_types et on e.entity_type=et.id where et.id=1 and (e.name like '%".$search_data['k_search']."%' or e.description like '%".$search_data['k_search']."%')");
                 
        }  else {
            $query = $this->db->query("select e.*,eb.name as eb_branch,eb.status as eb_status,city as eb_city from entities e join entity_branches eb on e.id=eb.entity_id join entity_types et on e.entity_type=et.id where et.id=1");
            
        }
        $data = $query->result();
        return $data;
    }   
    
    function getAllUsers(){
        $query = $this->db->query("select * from users");
        $result = $query->result();
        return $result;
    }
    
    function getSpecialisation(){
        $query = $this->db->query("select * from specializations_and_services where entity_type = 1");
        $res   = $query->result();  
        if($res){
            return $res;
        }else{
            return mysql_error();
        }
    }
    
   
    function edit_hospital($entity_id){
        
        
        $query1 = $this->db->query("select e.*,eb.* from entities as e left join entity_branches as eb on e.id = eb.entity_id  where e.id='$entity_id'");
        
        //echo "select e.*,eb.* from entities as e left join entity_branches as eb on e.id = eb.entity_id  where e.id='$entity_id'";
        
        $result['entity'] = $query1->result_array();
        
        
        $query2 = $this->db->query("select * from entity_specializations where entity_id = '$entity_id'");
        echo "select * from entity_specializations where entity_id = '$entity_id'";
        $result = $query2->result_array();
        if($result){
        $result['spe'] = $result;
        }
        
        
        
        return array('entity'=>$query1,'spe'=>$query2);
        
    }
    
    function update_hospital($updatedata){
       
        $data =array(
        "name" => $updatedata['e_name'],
        "description" => $updatedata['e_description'],
        "website" => $updatedata['e_website']
         );
       
        $this->db->where('id', $updatedata['entity_id']);
        $result = $this->db->update('entities', $data);
        
        for($i=0; $i<=sizeof($updatedata['e_spe'])-1; $i++){
        
        $data = array(
            "addressline1" => $updatedata['e_spe'][$i]
                );
        /*
        $this->db->where('id', $updatedata['entity_id']);
        $result = $this->db->update('entities', $data);
        */
        }
        
        
        
        $data =array(
        "name" => $updatedata['e_name'],
            "addressline1" => $updatedata['e_loc_addressline1'],
            "addressline2" => $updatedata['e_loc_addressline2'],
            "city" => $updatedata['e_loc_city'],
            "state" => $updatedata['e_loc_state'],
            "zipcode" => $updatedata['e_loc_zipcode'],
            "poc_name" => $updatedata['e_poc_firstname'].$updatedata['e_poc_lastname'],
            "mobile" => $updatedata['e_poc_mobile'],
            "landline" => $updatedata['e_loc_phone'],
            "email" => $updatedata['e_poc_email'],
            
                );
         $this->db->where('entity_id', $updatedata['entity_id']);
         
        
         $result = $this->db->update('entity_branches', $data);
         
         if($result){
             echo "Sucessfully updated";
         }
        
    }
    
    
    
    
    function createHospital($reqdata){
        $this->db->trans_start();
        $result = FALSE;
        $query = $this->db->query("insert into entities(entity_type,name,description,status,website,created_at,created_by,modified_at,modified_by) values('".$reqdata['e_type']."',".$this->db->escape($reqdata['e_name']).",".$this->db->escape($reqdata['e_description']).",".$reqdata['e_status'].",".$this->db->escape($reqdata['e_website']).",now(),'1',now(),'1')");
        if($query){
            $result = $this->db->insert_id();
            $query_result = $this->db->query("insert into entity_branches(entity_id,name,addressline1,addressline2,city,state,country,zipcode,poc_name,mobile,landline,email,status,created_at,created_by,modified_at,modified_by) values('".$result."',".$this->db->escape($reqdata['e_name'].$reqdata['e_loc_city']).",".$this->db->escape($reqdata['e_loc_addressline1']).",".$this->db->escape($reqdata['e_loc_addressline2']).",".$this->db->escape($reqdata['e_loc_city']).",".$this->db->escape($reqdata['e_loc_state']).",'India',".$this->db->escape($reqdata['e_loc_zipcode']).",".$this->db->escape($reqdata['e_poc_firstname'].$reqdata['e_poc_lastname']).",".$this->db->escape($reqdata['e_poc_mobile']).",".$this->db->escape($reqdata['e_loc_phone']).",".$this->db->escape($reqdata['e_poc_email']).",".$reqdata['e_status'].",now(),'1',now(),'1')");
            if($query_result){
                 $doc_link = $result."_".$reqdata["timestamp"].".".$reqdata["file_ext"];
                 $query_doc = $this->db->query("insert into entity_documents(document_name,document_link,entity_id,status) values(".$this->db->escape($reqdata['e_doc_type']).",".$this->db->escape($doc_link).",".$result.",0)");
                 if($query_doc){  
                 foreach ($reqdata['e_spe'] as $e_spe){
                 $query = $this->db->query("insert into entity_specializations(entity_id,specialization_id,entity_type) values ('".$result."','$e_spe','".$reqdata['e_type']."')");
                 }}
                $this->db->trans_complete();
            }
        }
        return $result;
    }
    //ACTIVATE OR DEACTIVATE USER
    public function update_user_status($entity_id,$status){
        $data['status'] = $status;
        $this->db->where('id', $entity_id);
        $this->db->update('entities',$data);
        echo $status;

    }
    
    
    
       
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
      
        $query = $this->db->get_where('cities', array('state_id'=> $state_id,'status' => 1));
        $data = $query->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
  
     
     }

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model{
	
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
    
    function getAll(){
        $query = $this->db->get('users');
        $data = $query->result();
        return $data;
    }
    
    function Authenticate($data){
        $query = $this->db->query("select * from users u join user_roles ur on ur.user_id=u.user_id where u.user_email='".$data['email']."' and ur.role_id=2");
        $result = $query->result();
        foreach ($result as $row){
            if($row->user_password == md5($data['password'])){
                return $row;
            }  else {
                return false;
            }
        }
    }
    
    function CreateOrUpdateUser($data){        
        $return;
        if(!isset ($data['id'])){
            $userdata = $this->getUserDetails($data);
            if(!empty ($userdata)){
                return $userdata;
            }else{
                $this->db->set($data);
                $return = $this->db->insert('users',$data);
                
            }
            
        }else{
            $this->db->set($data);
            $return = $this->db->insert('users',$data);    
        }
        return $return;
    }
    
    function getUserDetails($reqdata){
        $query = $this->db->query("select * from users where user_email=".$this->db->escape($reqdata['e_email'])." OR user_mobile=".$this->db->escape($reqdata['e_mobile']));
        $result = $query->result();
        if(!empty ($result)){
            return $result;
        }else {
            return '';
        }
    }
    function edit_user($user_id){
        
        
        $query = $this->db->query("select a.*,b.* from users as a left join user_address as b on a.user_id = b.user_id where a.user_id='$user_id'");
        $result = $query->result();
        return $result;
        
        
    }
    
    function update_user($updatedata){
       
        $data =array(
        "first_name" => $updatedata['e_firstname'],
        "last_name" => $updatedata['e_lastname'],
        "user_email" => $updatedata['e_email'],
        "user_mobile" => $updatedata['e_mobile'],
        "user_status" => $updatedata['e_status'],
        "blood_group" => $updatedata['e_blood_group']
         );
        if(isset($_POST['e_donation_status'])){
            $data["blood_donation_status"] = $updatedata['e_donation_status'];
            $data ["blood_group"] = $updatedata['e_blood_group'];
            
        }else{
            $data["blood_donation_status"] = 0;
            
        }
        $this->db->where('user_id', $updatedata['user_id']);
        $this->db->update('users', $data);
        
        
        $data =array(
        "user_add_line1" => $updatedata['e_addressline1'],
            "user_add_line2" => $updatedata['e_addressline2'],
            "user_city" => $updatedata['e_city'],
            "user_state" => $updatedata['e_state'],
            "user_zipcode" => $updatedata['e_zipcode']
                );
        $this->db->where('user_id', $updatedata['user_id']);
        $this->db->update('user_address', $data);
        
        
    }
    
    
      
    function edit_doctor($entity_id){
        $query1 = $this->db->query("select u.*,ua.*,es.*,ur.*  from users as u inner join user_address as ua on u.user_id = ua.user_id left join entity_specializations as es on u.user_id = es.user_id left join user_roles as ur on u.user_id = ur.user_id where u.user_id = '25'");
        $result = $query1->result_array();
        return($result);
        
    }
    
    function update_doctor($updatedata){
        $data =array(
        "first_name" => $updatedata['e_firstname'],
        "last_name" => $updatedata['e_lastname'],
        "user_email" => $updatedata['e_email'],
        "user_mobile" => $updatedata['e_mobile'],
        "user_status" => $updatedata['e_status'],
        "blood_group" => $updatedata['e_blood_group']
         );
        if(isset($_POST['e_donation_status'])){
            $data["blood_donation_status"] = $updatedata['e_donation_status'];
            $data ["blood_group"] = $updatedata['e_blood_group'];
            
        }else{
            $data["blood_donation_status"] = 0;
            
        }
        $this->db->where('user_id', $updatedata['user_id']);
        $this->db->update('users', $data);
         /*
        for($i=0; $i<=sizeof($updatedata['e_spe'])-1; $i++){
        
           
        $data = array(
            "addressline1" => $updatedata['e_spe'][$i]
                );
        
        $this->db->where('id', $updatedata['entity_id']);
        $result = $this->db->update('entities', $data);
       
        }
        
         */
        
        $data =array(
        "user_add_line1" => $updatedata['e_loc_addressline1'],
            "user_add_line2" => $updatedata['e_loc_addressline2'],
            "user_city" => $updatedata['e_loc_city'],
            "user_state" => $updatedata['e_loc_state'],
            "user_zipcode" => $updatedata['e_loc_zipcode'],
            );
        $this->db->where('user_id', $updatedata['user_id']);
        $result = $this->db->update('user_address', $data);
        if($result){
            echo "Sucessfully updated";
            print_r($data);
            
        }else{
            
            echo "fail";
        }
        
        }
    
    
    
    function getAllUsers($search_data){
        if(!empty ($search_data['k_search'])){
            $query = $this->db->query("select * from users u join user_roles ur on u.user_id=ur.user_id join roles r on ur.role_id=r.id where (first_name like '%".$search_data['k_search']."%' or last_name like '%".$search_data['k_search']."%'  or user_email like '%".$search_data['k_search']."%') and r.entity_type is NULL");
        }  else {
            $query = $this->db->query("select * from users u join user_roles ur on u.user_id=ur.user_id join roles r on ur.role_id=r.id where r.entity_type is NULL");
        }
        $result = $query->result();
        return $result;
    }
    
    function createUser($reqdata){
        $result = FALSE;
        $user_data = $this->getUserDetails($reqdata);
        if($user_data){
            $result = "existed";
            return $result;
        }
        $this->db->trans_start();
        $query = $this->db->query("insert into users(first_name,last_name,user_email,user_password,user_mobile,user_status,is_email_verified,is_mobile_verified,blood_donation_status,blood_group) values(".$this->db->escape($reqdata['e_firstname']).",".$this->db->escape($reqdata['e_lastname']).",".$this->db->escape($reqdata['e_email']).",".$this->db->escape(md5($reqdata['e_password'])).",".$this->db->escape($reqdata['e_mobile']).",".$this->db->escape($reqdata['e_status']).",1,1,".$this->db->escape($reqdata['e_donation_status']).",".$this->db->escape($reqdata['e_blood_group']).")");
        if($query){
            $result = $this->db->insert_id();
            foreach ($reqdata['e_role'] as $value) {
                if($value){
                    $query_role = $this->db->query("insert into user_roles(user_id,role_id) values(".$result.",".$value.")");
                }
            }
            $query_address = $this->db->query("insert into user_address(user_id,user_add_line1,user_add_line2,user_city,user_state,user_zipcode,created_at,created_by,modified_at,modified_by) values(".$result.",".$this->db->escape($reqdata['e_loc_addressline1']).",".$this->db->escape($reqdata['e_loc_addressline2']).",".$this->db->escape($reqdata['e_loc_city']).",".$this->db->escape($reqdata['e_loc_state']).",".$this->db->escape($reqdata['e_loc_zipcode']).",now(),1,now(),1)");
            if($query_address){
                $this->db->trans_complete();
                return $result;
            } else {
                $result = "failure";
                return $result;
            }
        }
    }

    function createDoctor($reqdata){
        $result = FALSE;
        $user_data = $this->getUserDetails($reqdata);
        if($user_data){
            $result = "existed";
            return $result;
        }
        $this->db->trans_start();
        $query = $this->db->query("insert into users(first_name,last_name,user_email,user_password,user_mobile,user_status,is_email_verified,is_mobile_verified,blood_donation_status,blood_group,created_at,created_by,modified_at,modified_by) values(".$this->db->escape($reqdata['e_firstname']).",".$this->db->escape($reqdata['e_lastname']).",".$this->db->escape($reqdata['e_email']).",".$this->db->escape(md5($reqdata['e_password'])).",".$this->db->escape($reqdata['e_mobile']).",".$this->db->escape($reqdata['e_status']).",1,1,".$this->db->escape($reqdata['e_donation_status']).",".$this->db->escape($reqdata['e_blood_group']).",now(),1,now(),1)");
        if($query){
            $result=$this->db->insert_id();
            foreach ($reqdata['e_role'] as $value) {
                if($value){
                    $query_role = $this->db->query("insert into user_roles(user_id,role_id) values(".$result.",".$value.")");
                }
            }
            $query_entity = $this->db->query("insert into entities(entity_type,name,status,user_id,created_at,created_by,modified_at,modified_by) values('".$this->config->item('doctors_entity_type')."',".$this->db->escape($reqdata['e_firstname'].' '.$reqdata['e_lastname']).",".$this->db->escape($reqdata['e_status']).",".$this->db->escape($result).",now(),1,now(),1)");
            if($query_entity){
                $result_entity_id = $this->db->insert_id();
                 $doc_link = $result_entity_id."_".$reqdata["timestamp"].".".$reqdata["file_ext"];
                 $query_doc = $this->db->query("insert into entity_documents(document_name,document_link,entity_id,status) values(".$this->db->escape($reqdata['e_doc_type']).",".$this->db->escape($doc_link).",".$result_entity_id.",0)");
                 if($query_doc){
             foreach ($reqdata['e_service'] as $value) {
                if($value){
                    $query_service = $this->db->query("insert into entity_specializations(entity_id,user_id,specialization_id,entity_type) values('".$result_entity_id."','".$result."','".$value."','".$this->config->item('doctors_entity_type')."')");
                }
            }
                 }
            }
            $query_address = $this->db->query("insert into user_address(user_id,user_add_line1,user_add_line2,user_city,user_state,user_zipcode,created_at,created_by,modified_at,modified_by) values(".$result.",".$this->db->escape($reqdata['e_loc_addressline1']).",".$this->db->escape($reqdata['e_loc_addressline2']).",".$this->db->escape($reqdata['e_loc_city']).",".$this->db->escape($reqdata['e_loc_state']).",".$this->db->escape($reqdata['e_loc_zipcode']).",now(),1,now(),1)");
            if($query_address){
                $this->db->trans_complete();
                return $result_entity_id;
            } else {
                $result = "failure";
                return $result;
            }
        }
    }

    function getNonEntityRoles(){
        $query = $this->db->query("select * from roles where entity_type is NULL");
        $result = $query->result();
        return $result;
    }

    function get_entity_roles($entity_type){
        $query = $this->db->query("select * from roles where entity_type='".$entity_type."' OR id='".$this->config->item('default_role')."' order by id desc");
        $result = $query->result();
        return $result;
    }

    function getAllDoctors($search_data){
        if(!empty ($search_data['k_search'])){
            $query = $this->db->query("select * from users u join user_roles ur on u.user_id=ur.user_id join roles r on ur.role_id=r.id where (u.first_name like '%".$search_data['k_search']."%' or u.last_name like '%".$search_data['k_search']."%'  or u.user_email like '%".$search_data['k_search']."%') and r.entity_type='".$this->config->item('doctors_entity_type')."'");
        }  else {
            $query = $this->db->query("select * from users u join user_roles ur on u.user_id=ur.user_id join roles r on ur.role_id=r.id where r.entity_type='".$this->config->item('doctors_entity_type')."'");
            
        }
        $result = $query->result();
        return $result;
    }

    
  //ACTIVATE OR DEACTIVATE USER
    
  public function update_user_status($user_id,$status){
    $data['user_status'] = $status;
    $this->db->where('user_id', $user_id);
    $this->db->update('users',$data);
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
    
       //print_r($data);
   }
    
   
}
?>
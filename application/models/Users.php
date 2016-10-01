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
        echo "select * from users u join user_roles ur on ur.user_id=u.user_id where u.user_email='".$data['email']."' and ur.role_id=2";
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
    
    function getUserDetails($data){
        $query = $this->db->query("select * from users where user_email='".$data['email']."'");
        $result = $query->result();
        if(!empty ($result[0])){
            return $result[0];
        }else {
            return '';
        }
    }
    
    function getAllUsers($search_data){
        if(!empty ($search_data['k_search'])){
            $query = $this->db->query("select * from users where (first_name like '%".$search_data['k_search']."%' or last_name like '%".$search_data['k_search']."%'  or user_email like '%".$search_data['k_search']."%')");
        }  else {
            $query = $this->db->query("select * from users");    
        }
        $result = $query->result();
        return $result;
    }
    
}

?>
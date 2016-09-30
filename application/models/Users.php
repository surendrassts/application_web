<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model{
	
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
        $query = $this->db->query("select * from users where username='".$data['username']."' or email='".$data['username']."'");
        $result = $query->result();
        foreach ($result as $row){
            if($row->password == md5($data['password'])){
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
        $query = $this->db->query("select * from users where username='".$data['username']."' or email='".$data['email']."'");
        $result = $query->result();
        if(!empty ($result[0])){
            return $result[0];
        }else {
            return '';
        }
    }
    
    
}

?>
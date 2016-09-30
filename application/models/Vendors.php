<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    
    function getVendors($data){
         echo "select * from vendor_details where status=1 and company_name like '%".$data['company_name']."%'";
        $query = $this->db->query("select * from vendor_details where status=1 and company_name like '%".$data['company_name']."%'");
        $result = $query->result();
        return $result;
    }
    
    function getVendorDetailsByPagename($data){
        $query = $this->db->query("select * from vendor_details where page_name='".$data['page_name']."'");
        $result = $query->result();
        if(!empty ($result[0])){
            return $result[0];
        }else {
            return '';
        }
    }    
}

?>
<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class userm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('*')->from("userlist");
		 
		 
	 	//$this->db->like("nama_lengkap",$param['nama_lengkap']);
	  	
	   if(!empty($param['nama_user'])) {
	   		$this->db->where("nama_user",$param['nama_user']);
	   }
	 

	  	if($param['tipe_user'] != 'x') {
	  		$this->db->where("tipe_user",$param['tipe_user']);
	  	}
	  	 

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	
	
}

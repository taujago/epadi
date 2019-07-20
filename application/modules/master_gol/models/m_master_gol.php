<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_master_gol extends CI_Model {
  	var $table = 'master_gol';
  	var $column_order = array('','id_master_gol','master_gol','aktif');
  	var $column_search = array('master_gol','aktif'); 
  	var $order = array('id_master_gol' => 'DESC');
  	public function __construct(){
  	  parent::__construct();
  	}
	
  	private function get_data_query(){
   
           $this->db->from($this->table);

    	$i = 0;
  
	    foreach ($this->column_search as $item) {
	     	if($_POST['search']['value']) {
	        	if($i===0){
	          		$this->db->like($item, $_POST['search']['value']);
	        	}
	        else {
	         	$this->db->or_like($item, $_POST['search']['value']);
	        }

	        if(count($this->column_search) - 1 == $i);
	      
	      	}
	      	$i++;
	    }
    
	    if(isset($_POST['order'])) {
	      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	    } else if(isset($this->order)){
	      $order = $this->order;
	      $this->db->order_by(key($order), $order[key($order)]);
	    }

  	}

	function get_data(){
		$this->get_data_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	function get_by_id($id){
	   $this->db->from($this->table);
	   $this->db->where('id_master_gol',$id);
		
	   $query = $this->db->get();
	   return $query->row();
	}

	
}

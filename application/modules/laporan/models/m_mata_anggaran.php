<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_mata_anggaran extends CI_Model {
  	var $column_order = array('','id','kode','nama_anggaran','pagu');
  	var $column_search = array('kode','nama_anggaran','pagu'); 
  	var $order = array('kode' => 'ASC');
  	public function __construct(){
  	  parent::__construct();
  	}
	

	function tabel(){
		$set = $this->cm->setting();
		 $this->db->select('*,ag.`id_anggaran` AS id')->from('anggaran ag')
           		->join("rincianbiaya rc", "rc.id_anggaran = ag.id_anggaran", 'left')
                ->where("ag.tahun", $set->tahun_anggaran)
                ->group_by("ag.id_anggaran");

	}

  	private function get_data_query(){
   			$this->tabel();
          
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
		$this->tabel();
		return $this->db->count_all_results();
	}



	
}

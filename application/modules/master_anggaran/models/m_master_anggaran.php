<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_master_anggaran extends CI_Model {
  	var $table = 'anggaran';
  	var $column_order = array('','id_anggaran','nama_anggaran','id_program','kode','pagu');
  	var $column_search = array('nama_anggaran','id_program','kode','pagu'); 
  	var $order = array('id_anggaran' => 'ASC');
  	public function __construct(){
  	  parent::__construct();
  	}
	
	function tabel(){
		$set = $this->cm->setting();
		$this->db->where("tahun", $set->tahun_anggaran);
		// $this->db->join("program pa", 'pa.id_program = sd. id_program');
		$this->db->from($this->table);
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


	function get_by_id($id){
	   $this->tabel();
	   $this->db->where('id_anggaran',$id);
		
	   $query = $this->db->get();
	   return $query->row();
	}

	function get_arr_program(){
	  $arr=array();
	  $this->db->where("aktif", "Y");
	  $this->db->order_by("id_program");
	  $res = $this->db->get("program");
	  $arr[''] = 'Pilih Program';
	  foreach($res->result() as $row):
	    $arr[$row->id_program] =$row->kode." - ".$row->program;
	  endforeach;
	  return $arr;
	}

	
}

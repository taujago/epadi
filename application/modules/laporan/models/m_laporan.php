<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_laporan extends CI_Model {
  	var $column_order = array('','id_pegawai','master_gol','nama','jabatan','pangkat_pegawai');
  	var $column_search = array('master_gol','nama','jabatan','pangkat_pegawai'); 
  	var $order = array('nama' => 'ASC');
  	public function __construct(){
  	  parent::__construct();
  	}
	

	function tabel(){
		$set = $this->cm->setting();
		 $this->db->select('*,pg.pangkat as pangkat_pegawai')->from('pegawai pg')
           		->join("nppt_detail np", "np.id_pegawai = pg.id_pegawai")
           		->join("master_gol gl", "gl.id_master_gol = pg.id_master_gol")
           		->join("nppt sk", "sk.id_nppt = np.id_nppt")
                ->where("np.kwitansi" , 'Y')
                ->where("sk.tahun_anggaran", $set->tahun_anggaran)
                ->group_by("pg.id_pegawai");

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

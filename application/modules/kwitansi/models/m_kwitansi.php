<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kwitansi extends CI_Model {
  	var $table = 'tujuan';
  	var $column_order = array('','id_nppt_detail','tujuan','nama','no_sppd');
  	var $column_search = array('tujuan','nama','no_sppd'); 
  	var $order = array('tanggal_kwitansi' => 'DESC');
  	public function __construct(){
  	  parent::__construct();
  	}
	
	function tabel(){
		$set =  $this->cm->setting();
           $this->db->select('*')->from('nppt_detail nd')
           		->join("nppt np", "nd.id_nppt = np.id_nppt")
           		->join("pegawai pg", "pg.id_pegawai = nd.id_pegawai")
           		->join("tujuan tj", "tj.id_tujuan = np.id_tujuan")
           		->where("np.tahun_anggaran", $set->tahun_anggaran)
                ->where("nd.kwitansi" , 'Y');
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
	   $this->db->from($this->table);
	   $this->db->where('id_tujuan',$id);
		
	   $query = $this->db->get();
	   return $query->row();
	}

	
}

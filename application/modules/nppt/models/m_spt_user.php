<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_spt_user extends CI_Model {
  	var $table = 'nppt';
  	var $column_order = array('','id_nppt_detail','no_spt','maksud','tgl_pergi','tgl_kembali');
  	var $column_search = array('maksud','no_spt','tgl_pergi','tgl_kembali'); 
  	var $order = array('tgl_pergi' => 'DESC');
  	public function __construct(){
  	  parent::__construct();
  	}
	
	function tabel(){
		$set = $this->cm->setting();
           $this->db->select('*')->from('nppt_detail sd')
                ->join("pegawai sc" , 'sd.id_pegawai = sc.id_pegawai')
                ->join("nppt np" , 'sd.id_nppt = np.id_nppt')
                 ->where("np.tahun_anggaran", $set->tahun_anggaran)
                ->where("sc.nip", $this->session->userdata("operator_username"));
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
		// echo $this->db->last_query();
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
	   $this->db->where('id_nppt',$id);
		$this->db->select('*')->from('nppt sd')
                ->join("tujuan sc" , 'sd.id_tujuan = sc.id_tujuan');
	   $query = $this->db->get();
	   return $query->row();
	}

	
}

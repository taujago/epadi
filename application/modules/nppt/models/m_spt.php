<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_spt extends CI_Model {
  	var $table = 'nppt';
  	var $column_order = array('','id_nppt','tujuan','no_spt','maksud','tgl_pergi','dasar_hukum');
  	var $column_search = array('maksud','tujuan','no_spt','tgl_pergi','dasar_hukum'); 
  	var $order = array('no_spt' => 'DESC');
  	public function __construct(){
  	  parent::__construct();
  	}
	

	function tabel(){
		$set = $this->cm->setting();
        $this->db->select('*')->from('nppt sd')
                	->join("tujuan sc" , 'sd.id_tujuan = sc.id_tujuan')
                	->where("sd.tahun_anggaran" , $set->tahun_anggaran)
                	->where("status", 'Y');
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
		$this->tabel();
	   $query = $this->db->get();
	   return $query->row();
	}

	function get_arr_tujuan(){
	  $arr=array();
	  $this->db->order_by("id_tujuan");
	  $res = $this->db->get("tujuan");
	  $arr[''] = 'Pilih Tujuan Perjalanan';
	  foreach($res->result() as $row):
	    $arr[$row->id_tujuan] =$row->tujuan;
	  endforeach;
	  return $arr;
	}

	function get_arr_transportasi(){
	  $arr=array();
	  $this->db->order_by("id_transportasi");
	  $res = $this->db->get("transportasi");
	  $arr[''] = 'Pilih Transportasi';
	  foreach($res->result() as $row):
	    $arr[$row->id_transportasi] =$row->transportasi;
	  endforeach;
	  return $arr;
	}

	function get_arr_pegawai(){
	  $arr=array();
	  $this->db->order_by("id_pegawai");
	  $res = $this->db->get("pegawai");
	 
	  foreach($res->result() as $row):
	    $arr[$row->id_pegawai] =$row->nama;
	  endforeach;
	  return $arr;
	}

}

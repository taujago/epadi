<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_master_pegawai extends CI_Model {
  	var $table = 'pegawai';
  	var $column_order = array('','id_pegawai','nip','nama','pangkat','master_gol','unitkerja','username','password');
  	var $column_search = array('nip','nama','pangkat','master_gol','unitkerja','username','password'); 
  	var $order = array('nama' => 'ASC');
  	public function __construct(){
  	  parent::__construct();
  	}
	
  	private function get_data_query(){
   
           $this->db->select('*')->from('pegawai sd')
                ->join("master_gol sc" , 'sd.id_master_gol = sc.id_master_gol')
                ->join("golongan sk", 'sd.id_golongan = sk.id_golongan');



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
	   // $this->db->from($this->table);
	   $this->db->where('id_pegawai',$id);
		$this->db->select('*')->from('pegawai sd')
                 ->join("master_gol sc" , 'sd.id_master_gol = sc.id_master_gol')
                ->join("golongan sk", 'sd.id_golongan = sk.id_golongan');
	   $query = $this->db->get();
	   return $query->row();
	}

	function get_arr_master_gol(){
	  $arr=array();
	  $this->db->where("aktif", "Y");
	  $this->db->order_by("id_master_gol");
	  $res = $this->db->get("master_gol");
	  $arr[''] = 'Pilih Golongan';
	  foreach($res->result() as $row):
	    $arr[$row->id_master_gol] =$row->master_gol;
	  endforeach;
	  return $arr;
	}

	function get_arr_tingkat(){
	  $arr=array();
	  $this->db->where("aktif", "Y");
	  $this->db->order_by("id_golongan");
	  $res = $this->db->get("golongan");
	  $arr[''] = 'Pilih Tingkat';
	  foreach($res->result() as $row):
	    $arr[$row->id_golongan] =$row->golongan;
	  endforeach;
	  return $arr;
	}

}

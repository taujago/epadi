<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_sppd extends CI_Model {
  	var $table = 'nppt';
  	var $column_order = array('','id_nppt_detail','tujuan','no_sppd','maksud','tgl_pergi','tgl_kembali','kwitansi');
  	var $column_search = array('maksud','tujuan','no_sppd','tgl_pergi','tgl_kembali','kwitansi'); 
  	var $order = array('no_sppdx' => 'DESC');
  	public function __construct(){
  	  parent::__construct();
  	}
	
	function tabel(){
		$set = $this->cm->setting();
        $this->db->select('*')->from('nppt_detail sd')
                ->join("pegawai sc" , 'sd.id_pegawai = sc.id_pegawai')
                ->join("nppt np" , 'sd.id_nppt = np.id_nppt')
                ->join("tujuan tj" , 'np.id_tujuan = tj.id_tujuan')
                ->where("status_sppd", 'Y')
                ->where("np.tahun_anggaran" , $set->tahun_anggaran);
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

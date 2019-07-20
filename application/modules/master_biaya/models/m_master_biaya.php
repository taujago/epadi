<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_master_biaya extends CI_Model {
  	var $table = 'biaya';
  	var $column_order = array('','id_biaya','golongan','tujuan','lumpsum','penginapan','transportasi');
  	var $column_search = array('golongan','tujuan','lumpsum','penginapan','transportasi'); 
  	var $order = array('id_biaya' => 'DESC');
  	public function __construct(){
  	  parent::__construct();
  	}
	
  	private function get_data_query(){
   
           $this->db->select('*')->from('biaya sd')
                ->join("golongan sc" , 'sd.id_golongan = sc.id_golongan');
                // ->join("biaya_detail bd" , 'sd.id_biaya = bd.id_biaya')



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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	function get_by_id($id){
	   // $this->db->from($this->table);
	   $this->db->where('id_biaya',$id);
		$this->db->select('*')->from('biaya sd')
                ->join("golongan sc" , 'sd.id_golongan = sc.id_golongan');
	   $query = $this->db->get();
	   return $query->row();
	}

	function get_arr_tujuanx($id){
		$sql = "SELECT * FROM (`biaya` sd) JOIN `golongan` sc ON `sd`.`id_golongan` = `sc`.`id_golongan` JOIN `biaya_detail` sk ON `sd`.`id_biaya` = `sk`.`id_biaya` JOIN `tujuan` tj ON `sk`.`id_tujuan` = `tj`.`id_tujuan` WHERE `sd`.`id_biaya` = '".$id."'";
		
		// $this->db->select('*');
	 //    $this->db->from("tujuan");
	 //    $this->db->order_by("id_tujuan");

	    return $this->db->query($sql)->result_array();


	}

	function get_arr_golongan(){
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

	function get_arr_tujuan(){
	  $arr=array();
	  $this->db->order_by("id_tujuan");
	  $res = $this->db->get("tujuan");
	 
	  foreach($res->result() as $row):
	    $arr[$row->id_tujuan] =$row->tujuan;
	  endforeach;
	  return $arr;
	}

}

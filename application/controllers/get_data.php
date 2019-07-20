<?php 
class get_data extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('date');
		
	}

function get_datax(){
	$ret_arr = array();
	$data = $this->input->post();
	$this->db->where("id_master_bahan",$data['id_master_bahan']);
	$res = $this->db->get("master_bahan");
	if($res->num_rows() > 0 ){
		$ret_arr = $res->row_array();
	}
	else {
		$ret_arr = array();
	}
	echo json_encode($ret_arr);
}

function get_data_alat(){
	$ret_arr = array();
	$data = $this->input->post();
	$this->db->where("id_master_alat",$data['id_master_alat']);
	$res = $this->db->get("master_alat");
	if($res->num_rows() > 0 ){
		$ret_arr = $res->row_array();
	}
	else {
		$ret_arr = array();
	}
	echo json_encode($ret_arr);
}


function nama_bahan(){
	$data = $this->input->post();
	$this->db->order_by("nama_bahan");
	$data['nama_bahan'] = empty($data['nama_bahan'])?"qqqqq":$data['nama_bahan'];
	$this->db->like("nama_bahan",$data['nama_bahan']);
	$x['record']  = $this->db->get("master_bahan");
	$x['target']  = $data['target'];
	// echo $this->db->last_query();
	$this->load->view("search_bahan_table",$x);
}

function nama_alat(){
	$data = $this->input->post();
	$this->db->order_by("nama_alat");
	$data['nama_alat'] = empty($data['nama_alat'])?"qqqqq":$data['nama_alat'];
	$this->db->like("nama_alat",$data['nama_alat']);
	$x['record']  = $this->db->get("master_alat");
	$x['target']  = $data['target'];
	// echo $this->db->last_query();
	$this->load->view("search_alat_table",$x);
}	

function nama_upah(){
	$data = $this->input->post();
	$this->db->order_by("nama_upah");
	$data['nama_upah'] = empty($data['nama_upah'])?"qqqqq":$data['nama_upah'];
	$this->db->like("nama_upah",$data['nama_upah']);
	$x['record']  = $this->db->get("master_upah");
	$x['target']  = $data['target'];
	// echo $this->db->last_query();
	$this->load->view("search_upah_table",$x);
}

function get_data_upah(){
	$ret_arr = array();
	$data = $this->input->post();
	$this->db->where("id_master_upah",$data['id_master_upah']);
	$res = $this->db->get("master_upah");
	if($res->num_rows() > 0 ){
		$ret_arr = $res->row_array();
	}
	else {
		$ret_arr = array();
	}
	echo json_encode($ret_arr);
}


}

?>
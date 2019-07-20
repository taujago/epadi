<?php
class search_cari_tidak_mampu_nik extends CI_Controller {

	function __construct(){
		parent::__construct();
	}


	function index(){
		$data = $this->input->post();
		$this->db->order_by("nik");
		$data['nik'] = empty($data['nik'])?"zzzzzzzzzzzz":$data['nik'];
		$this->db->like("nik",$data['nik']);
		

		//$this->db->limit(10);
		$this->db->where("hidup_mati","1");
		$this->db->where("kaya_miskin","2");
		//$this->db->where("deleted","0");
		$this->db->where("status_kependudukan <> '3'",null,false);
		$x['record']  = $this->db->get("v_penduduk");
		$x['target']  = $data['target'];
		//echo $this->db->last_query();
		$this->load->view("search_table",$x);
	}

}

?>
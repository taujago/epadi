<?php
class core_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}
var $desa;

function setting(){
	$this->db->select('*')->from("setting");
	$res = $this->db->get();
	if(!$res) { 
	echo mysql_error();
	echo $this->db->last_query();
	}
	$this->desa = $res->row();
	return $this->desa;

}


function get_warna() {
	$this->db->select('*')->from('style ')
    ->where("id", "1");
    $rab = $this->db->get();
    $res = $rab->row_array();
    return $data['warna'] = $res['radio-topbar-color'];
}


function versi(){
	$versi = "V 1.1.1";
	return $versi;
}




}

?>
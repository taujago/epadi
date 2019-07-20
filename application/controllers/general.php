<?php 
class general extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->helper("tanggal");

	}


function generate_nomor($kode) {

	$sql = "SELECT MAX(SUBSTRING(no_npt,5,3)) AS up FROM nppt";
	$cek2 = $this->db->query($sql);
	$cek = $cek2->row_array();
	// echo  $this->db->last_query();
		$a = $cek["up"]+1;
		$b = date("m");
		$c = date("Y");
		$kode =  sprintf("%03s", $a);
		$no_npt = "094/".$kode.'/BKD/'.$c;
	
	echo $no_npt;


}

function generate_nomor_spt($kode) {

	$sql = "SELECT status, no_spt, MAX(SUBSTRING(no_spt,7,6)) AS up FROM nppt";
	$cek2 = $this->db->query($sql);
	$cek = $cek2->row_array();

		$a = $cek["up"]+1;
		$kode =  sprintf("%03s", $a);
		$no_spt = "875.1/".$kode;
		echo $no_spt;


}

}

?>

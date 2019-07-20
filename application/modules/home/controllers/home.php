<?php
class home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("stat_model","sm");
		$kode = $this->GetVolumeLabel()."1353590395393593";
		$register = md5($kode);
	}


	function index() {
		$this->load->view("home_view");
	}
	
	
	function GetVolumeLabel() {
	  // Try to grab the volume name
	  if (preg_match('#Volume Serial Number is (.*)\n#i', shell_exec('dir c:'), $m)) {
	    $volname = ' ('.$m[1].')';
	  } else {
	    $volname = '';
	  }
	//return $volname;
	$serial =  str_replace("(","",str_replace(")","",$volname));
	$serial = md5($serial);
	$serial = substr(preg_replace("/[^0-9]/", '', $serial),0,4);
	return $serial;
	}

}
?>
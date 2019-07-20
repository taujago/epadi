<?php
class op_controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("core_model","cm");
		
		 
		
		if($this->session->userdata('operator_login') == false ) {
			redirect('home/');
		} 
		
		
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


	function set_content($str) {
		$this->content['content'] = $str;
	}
	
	function set_title($str) {
		$this->content['title'] = $str;
	}
	
	function set_subtitle($str) {
		$this->content['subtitle'] = $str;
	}
	
	function render(){
		$arr = array();
		if ($this->session->userdata("operator_level")=="operator") {
			$this->load->view("operator_template",$this->content );
		} elseif ($this->session->userdata("operator_level")=="kabag") {
			$this->load->view("kabag_template",$this->content );
		} else {
			$this->load->view("user_template",$this->content );
		}		 
		
		
	}

}

?>
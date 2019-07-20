<?php
class op_login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function ceklogin(){
		$this->load->model("core_model","cm");
		$data=$this->input->post();
		$sql = "SELECT username, password, level FROM admins where username ='".$data["username"]."' and password='".$data["password"]."' UNION SELECT username, password , 'user' AS level FROM pegawai where username ='".$data["username"]."' and password='".$data["password"]."' ";
	
		$res = $this->db->query($sql);
		$rows = $res->row();
		// echo $this->db->last_query();
		if($res->num_rows() == 1 ) { // login berhasil
			 $this->session->set_userdata("operator_login",true);
			 $this->session->set_userdata("operator_username",$data['username']);
			 $this->session->set_userdata("operator_level",$rows->level);
			$ret = array("success"=>true,
						"pesan"=> "Login Berhasil",
						"operation" =>"insert");
			echo json_encode($ret);
		}
		else {
			$ret = array("success"=>false,
						"title" => "Gagal",
						"type" => "error",
						"pesan"=> "Login Gagal. Username dan password tidak diterima");
			echo json_encode($ret);
		}
	}

	function logout(){
		$this->session->unset_userdata("operator_login");
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("operator_level");
		redirect("home");
	}

}

?>
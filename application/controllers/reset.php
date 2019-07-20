<?php
class reset extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function simpan(){
    $data = $this->input->post();
    $this->load->library('form_validation');    
    $this->form_validation->set_rules('radio-topbar-color','Warna Bar Atas','required');
    $this->form_validation->set_message('required', ' %s Harus dipilih ');
    $this->form_validation->set_error_delimiters("* ", '');
    if($this->form_validation->run() == TRUE ) { 
    	$this->db->where("id" , "1");
        $resx  = $this->db->update("style",$data);
          if($resx) {   
          $ret = array("success"=>true,
                      "pesan"=>"Warna Berhasil Diganti",
                      "conf" => "Ok ",
                      "cancel" => false,
                      "confirm" => true,
                      "canceltext" => "tidak",
                      "operation" =>"insert");
          } else {
            $ret = array("success"=>false,
                       "pesan"=>" gagal " .mysql_error(),
                       "conf" => "OK",
                       "cancel" => true,
                       "confirm" => true,
                       "canceltext" => "tidak",
                       "operation" =>"insert");   
          }

    } else {
      $ret = array("success"=>false,
                    "pesan"=> "Silahkan Pilih Warna",
                    "conf" => "OK",
                    "cancel" => true,
                    "confirm" => true,
                    "canceltext" => "tidak",
                    "operation" =>"insert");
    }
    // echo $this->db->last_query();
    echo json_encode($ret);
  }


}

?>
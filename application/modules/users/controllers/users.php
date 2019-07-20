<?php 
class users extends  op_controller {
	 
	function __construct() {
		parent::__construct();
 
		$this->load->model("userm","dm");
    $this->load->helper("tanggal");
		 
		 
	}
 

function index()
    {
  	
	$data['controller'] = "user";
	$data['title'] = "Ganti Password ". ucfirst($this->session->userdata("operator_level"));
	 
	$data['active'] = "";  

   	$content = $this->load->view($data['controller']."_detail_view",$data,true);
	$this->set_title($data['title']);
	$this->set_content($content);
	$this->render();
}

function user_password()
    {
  	
	$data['controller'] = "user";
	$data['title'] = "Ganti Password ". ucfirst($this->session->userdata("operator_level"));
	 
	$data['active'] = "";  

   	$content = $this->load->view("user_pass",$data,true);
	$this->set_title($data['title']);
	$this->set_content($content);
	$this->render();
}

function user()
    {
	
	$this->db->where("nip",$this->session->userdata("operator_username"));
	$data = $this->db->get("pegawai")->row_array();
	$data['controller'] = "user";
	$data['title'] = ucfirst($this->session->userdata("operator_level"));
	 
	$data['active'] = "";  

	

   	$content = $this->load->view("users_form",$data,true);
	$this->set_title($data['title']);
	$this->set_content($content);
	$this->render();
}

 
function cek_pass_lama($pass) {

	$pass = $pass;
	$this->db->where("username",$this->session->userdata("operator_username"));
	$this->db->where("password",$pass);
	$x = $this->db->get("admins")->num_rows();
	if($x == 0) {
		$this->form_validation->set_message('cek_pass_lama', ' Password lama salah  ');
		return false;
	}
}

function cek_password($pass){
	$pass2 = $_POST['pass2'];
	if($pass <> $pass2) {
		$this->form_validation->set_message('cek_password', ' Password Baru dan Paassword Baru lagi tidak sama ');
		return false;
	}
}

function cek_pass_lama_user($pass) {

	$pass = $pass;
	$this->db->where("username",$this->session->userdata("operator_username"));
	$this->db->where("password",$pass);
	echo $this->db->last_query();
	$x = $this->db->get("pegawai")->num_rows();
	if($x == 0) {
		$this->form_validation->set_message('cek_pass_lama_user', ' Password lama salah  ');
		return false;
	}
}



 function save_detail(){
 	$ret = array();
 		$this->load->library('form_validation');
		$this->form_validation->set_rules('pass_lama','Password lama','callback_cek_pass_lama');

		$this->form_validation->set_rules('pass','Password  ','callback_cek_password');	
 		$this->form_validation->set_message('required', ' %s Harus diisi ');
		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
 		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
 		 	//unset($data['id_user']);
  		 	$this->db->where("username",$this->session->userdata("operator_username"));
 
  		 	$arrx['password'] = $data['pass'];
  		 	$res = $this->db->update("admins",$arrx);

 		 	if($res) {
 		 		$ret = array("success"=>true,
						"pesan"=> "Berhasil Disimpan",
						"operation" =>"insert");
 		 	}
 		 	else {
 		 		$ret = array("success"=>false,
						"pesan"=> "Berhasil Disimpan".mysql_error(),
						"operation" =>"insert");
 		 	}
		}
		 
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors(),
						"operation" =>"insert");
		}
		echo json_encode($ret);
 }

  function save_detail_user(){
 	$ret = array();
 		$this->load->library('form_validation');
		$this->form_validation->set_rules('pass_lama','Password lama','callback_cek_pass_lama_user');

		$this->form_validation->set_rules('pass','Password  ','callback_cek_password');	
 		$this->form_validation->set_message('required', ' %s Harus diisi ');
		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
 		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
 		 	//unset($data['id_user']);
  		 	$this->db->where("username",$this->session->userdata("operator_username"));
 
  		 	$arrx['password'] = $data['pass'];
  		 	$res = $this->db->update("pegawai",$arrx);

 		 	if($res) {
 		 		$ret = array("success"=>true,
						"pesan"=> "Berhasil Disimpan",
						"operation" =>"insert");
 		 	}
 		 	else {
 		 		$ret = array("success"=>false,
						"pesan"=> "Berhasil Disimpan".mysql_error(),
						"operation" =>"insert");
 		 	}
		}
		 
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors(),
						"operation" =>"insert");
		}
		echo json_encode($ret);
 }


 function update_profil(){
    $data = $this->input->post();
    unset($data['gambar']);
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nama','Nama','required');   
    $this->form_validation->set_message('required', ' %s Harus diisi ');
    $this->form_validation->set_error_delimiters('<br> ', ' ');
    if($this->form_validation->run() == TRUE ) { 

        if( isset($_FILES['gambar'])) {  
            $config['upload_path'] = './assets/pegawai/';
            // $config['upload_path'] = 'assets/gambar_user/';
            $config['allowed_types'] = 'gif|jpg|png|ico|jpeg|JPG|PNG|ICO|JPEG|GIF';
            $config['max_size'] = '1024';
            // $config['max_width']  = '1024';
            // $config['max_height']  = '768';

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar'))
            {   
                $error = array('error' => $this->upload->display_errors()); 
               // $error =  $this->upload->display_errors();
                
                $ret = array("success"=>false,
                      "pesan"=>$this->upload->display_errors(),
                       // "pesan"=>"File Excel Tidak Boleh Kosong",
                       "conf" => "OK",
                       "cancel" => true,
                       "confirm" => true,
                       "canceltext" => "Kembali",
                       "operation" =>"update");
                echo json_encode($ret);
            
                exit;
            

        
            } else {
                $fdata =   $this->upload->data();
                $data['gambar'] = $fdata['file_name'];
            }
        }
        $this->db->where("nip", $this->session->userdata("operator_username"));
    $res  = $this->db->update("pegawai",$data);
    // echo $this->db->last_query();
    if($res) {    
                $ret = array("success"=>true,
                            "pesan"=>"Data berhasil diupdate",
                            "conf" => "Ok",
                            "cancel" => true,
                            "confirm" => true,
                            "canceltext" => "Kembali",
                            "operation" =>"update");
                }
                else {
                 $ret = array("success"=>false,
                            "pesan"=>"Data berhasil diupdate" .mysql_error(),
                            "conf" => "OK",
                            "cancel" => true,
                            "confirm" => true,
                            "canceltext" => "Kembali",
                            "operation" =>"update");   
                }

    } else {
        $ret = array("success"=>false,
                      "pesan"=>validation_errors(),
                       "conf" => "OK",
                       "cancel" => true,
                       "confirm" => true,
                       "canceltext" => "Kembali",
                       "operation" =>"update");
    }
    echo json_encode($ret);
}

 
 
	
}


?>

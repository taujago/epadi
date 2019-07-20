<?php 
class operator_setting extends  op_controller {
	var $error;
	function __construct() {
		parent::__construct();
 
 		$this->load->model("core_model","cm");
        $this->load->model("core_model","cm");
        $this->load->helper("tanggal");
        
		 
		 
	}


	function index()
    {
    cek_session_akses('operator_setting',$this->session->userdata("operator_level"));
    
    $this->db->select('*')->from("setting");
    $res = $this->db->get();
    $data = $res->row_array();
    $data['title'] = "Setting Aplikasi";
    $data['active'] = "";
   
	$data['controller'] = "operator_setting";
 	
   	$content = $this->load->view("setting_lokasi_view",$data,true);
	$this->set_title($data['title']);
	$this->set_content($content);
	$this->render();
    }


    function kop() {
        $data['title'] = "Kop Surat";  
        $data['active'] = "";
        $data['controller'] = "operator_setting";
        $content = $this->load->view("info_view",$data,true);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }
  

    function save(){
        cek_session_akses('operator_setting',$this->session->userdata("operator_level"));

    	$data = $this->input->post();
            unset($data['logo']);
            if( isset($_FILES['logo'])) {  
            $config['upload_path'] = './assets/images/';
            // $config['upload_path'] = 'assets/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|ico|jpeg|JPG|PNG|ICO|JPEG|GIF';
            $config['max_size'] = '10240';
            // $config['max_width']  = '1024';
            // $config['max_height']  = '768';

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('logo'))
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
                $data['logo'] = $fdata['file_name'];
            }
        }

    	$res = $this->db->update("setting",$data);
    	if($res){

    		echo json_encode(array("success"=>true,"pesan"=>"Setting  berhasil disimpan. "));
    	}
        else {
            echo json_encode(array("success"=>false,"pesan"=>"Setting  tidak dapat disimpan"));
        }
    }

function kop_update(){
    $data = $this->input->post();
    unset($data['logo']);
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nama_aplikasi','Nama','required');   
    $this->form_validation->set_message('required', ' %s Harus diisi ');
    $this->form_validation->set_error_delimiters('<br> ', ' ');
    if($this->form_validation->run() == TRUE ) { 

        if( isset($_FILES['logo'])) {  
            $config['upload_path'] = './assets/images/';
            // $config['upload_path'] = 'assets/logo_user/';
            $config['allowed_types'] = 'gif|jpg|png|ico|jpeg|JPG|PNG|ICO|JPEG|GIF';
            $config['max_size'] = '1024';
            // $config['max_width']  = '1024';
            // $config['max_height']  = '768';

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('logo'))
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
                $data['logo'] = $fdata['file_name'];
            }
        }

    $res  = $this->db->update("setting",$data);
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
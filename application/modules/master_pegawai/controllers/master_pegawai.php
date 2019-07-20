<?php 
class master_pegawai extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_master_pegawai","dm");
		$this->load->helper("tanggal");
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        
	}
	function index(){
		$data['controller'] = get_class($this);
        $data['title'] = "Data Pegawai";
        $data['active'] = "List Data Pegawai";
        $data['arr_master_gol'] = $this->dm->get_arr_master_gol();
        $data['arr_tingkat'] = $this->dm->get_arr_tingkat();
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}

    function get_data(){    
        $list = $this->dm->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id_pegawai"] = $res->id_pegawai;
            $row["nama"] = $res->nama;
            $row["nip"] = $res->nip;
            $row["pangkat"] = $res->pangkat;
            $row["master_gol"] = $res->master_gol;
            $row["jabatan"] = $res->jabatan;
            $row["unit_kerja"] = $res->unitkerja;
            $row["username"] = $res->username;
            $row["password"] = $res->password;
          
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_pegawai.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->dm->count_all(),
                        "recordsFiltered" => $this->dm->count_filtered(),
                        "data" => $data,
                );
        // echo $this->db->last_query();
        echo json_encode($output);
    }


    function cek_nip($str) {
        $this->db->where("nip",$str);
        $res=$this->db->get("pegawai");
        // echo $this->db->last_query();
        if(empty($str)) {
            $this->form_validation->set_message('cek_nip', '%s Harus diisi');
        return false;
        }
        if($res->num_rows() > 0 ) {
        $this->form_validation->set_message('cek_nip', '%s Sudah Ada');
        return false;   }
    }


    function add(){
        cek_session_akses('master_pegawai',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama','required');    
        $this->form_validation->set_rules('nip','NIP','callback_cek_nip');   
        $this->form_validation->set_rules('pangkat','Pangkat','required');    
        $this->form_validation->set_rules('id_golongan','Golongan','required'); 
        $this->form_validation->set_rules('id_master_gol','Tingkat','required');   
        $this->form_validation->set_rules('jabatan','Jabatan','required'); 
        $this->form_validation->set_rules('unitkerja','Unit Kerja','required');   
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {

            $data['username'] = $data['nip'];  
            $data['password'] = $data['nip'];  

          
            $res = $this->db->insert("pegawai",$data);
                    if($res) {    
                    $ret = array("success"=>true,
                                "pesan"=>"Data berhasil disimpan",
                                "conf" => "Tambah Lagi ?",
                                "cancel" => true,
                                "confirm" => true,
                                "canceltext" => "tidak",
                                "operation" =>"insert");
                    }
                    else {
                     $ret = array("success"=>false,
                                "pesan"=>mysql_error(),
                                // "pesan"=>" Sudah Ada",
                                "conf" => "OK",
                                "cancel" => true,
                                "confirm" => true,
                                "canceltext" => "tidak",
                                "operation" =>"insert");   
                    }
        }
        else{
             $ret = array("success"=>false,
                        "pesan"=>validation_errors(),
                        "conf" => "OK",
                        "cancel" => true,
                        "confirm" => true,
                        "canceltext" => "tidak",
                        "operation" =>"insert");
        }
       echo json_encode($ret);
    }

    function edit($id){
        cek_session_akses('master_pegawai',$this->session->userdata("operator_level"));
        $data = $this->dm->get_by_id($id);
        echo json_encode($data);
    }

    function detail($id){
        $data = $this->dm->get_by_id($id);
        echo json_encode($data);
    }

    function update(){
        cek_session_akses('master_pegawai',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama','required');    
        $this->form_validation->set_rules('nip','NIP','required');   
        $this->form_validation->set_rules('pangkat','Pangkat','required');    
        $this->form_validation->set_rules('id_golongan','Golongan','required');   
        $this->form_validation->set_rules('id_master_gol','Tingkat','required'); 
        $this->form_validation->set_rules('jabatan','Jabatan','required'); 
        $this->form_validation->set_rules('unitkerja','Unit Kerja','required');   
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
            $data['username'] = $data['nip'];  
            $data['password'] = $data['nip'];  
            $this->db->where("id_pegawai",$data['id_pegawai']);
            $res  = $this->db->update("pegawai",$data);
                    if($res) {    
                    $ret = array("success"=>true,
                                "pesan"=>"Data berhasil diupdate",
                                "conf" => "OK",
                                "cancel" => true,
                                "confirm" => false,
                                "canceltext" => "Ok",
                                "operation" =>"insert");
                    }
                    else {
                     $ret = array("success"=>false,
                               "pesan"=>mysql_error(),
                                // "pesan"=>" Sudah Ada",
                                "conf" => "OK",
                                 "cancel" => true,
                                 "canceltext" => "ok",
                                 "confirm" => false,
                                 "operation" =>"insert");   
                    }
        }
        else{
             $ret = array("success"=>false,
                            "pesan"=>validation_errors(),
                            "conf" => "OK",
                            "cancel" => true,
                            "confirm" => false,
                            "canceltext" => "ok",
                            "operation" =>"insert");
        }
       echo json_encode($ret);
    }

    function hapus(){
        cek_session_akses('master_pegawai',$this->session->userdata("operator_level"));
        $list_id = $this->input->post('id');
            foreach ($list_id as $id) {
                $this->db->where("id_pegawai",$id);
                $this->db->delete("pegawai");
            }
        echo json_encode(array("status" => TRUE));
    } 

}
?>
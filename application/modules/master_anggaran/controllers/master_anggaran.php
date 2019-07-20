<?php 
class master_anggaran extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_master_anggaran","dm");
		$this->load->helper("tanggal");
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
	}
	function index(){
		$data['controller'] = get_class($this);
        $set = $this->cm->setting();
        $data["th"] = $set->tahun_anggaran;
        $data['title'] = "Data Anggaran Tahun Anggaran ". $set->tahun_anggaran;
        $data['active'] = "List Data Anggaran Tahun Anggaran ". $set->tahun_anggaran;
        $data['arr_program'] = $this->dm->get_arr_program();
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
            $row["id_anggaran"] = $res->id_anggaran;
            $row["nama_anggaran"] = $res->nama_anggaran;
            $sql = "select program from program where id_program =".$res->id_program." ";
            $x = $this->db->query($sql)->row_array();
            // echo $this->db->last_query();
            $row["program"] = $x["program"];
            $row["pagu"] = rupiah($res->pagu);
            $row["kode"] = $res->kode;
            
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_anggaran.'">';

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



    function add(){
        cek_session_akses('master_anggaran',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode','Kode Anggaran','required');    
        $this->form_validation->set_rules('nama_anggaran','Anggaran','required');   
        $this->form_validation->set_rules('pagu','Pagu Anggaran','required');     
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
          $set  = $this->cm->setting();
          $data["tahun"] = $set->tahun_anggaran;
          $data["pagu"] = str_replace(".", "", $data["pagu"]);
            $res = $this->db->insert("anggaran",$data);
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
        cek_session_akses('master_anggaran',$this->session->userdata("operator_level"));
        $data = $this->dm->get_by_id($id);
        echo json_encode($data);
    }

 
    function update(){
        cek_session_akses('master_anggaran',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode','Kode Anggaran','required');    
        $this->form_validation->set_rules('nama_anggaran','Anggaran','required');   
        $this->form_validation->set_rules('pagu','Pagu Anggaran','required'); 
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
            $data["pagu"] = str_replace(".", "", $data["pagu"]);
            $this->db->where("id_anggaran",$data['id_anggaran']);
            $res  = $this->db->update("anggaran",$data);
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
        cek_session_akses('master_anggaran',$this->session->userdata("operator_level"));
        $list_id = $this->input->post('id');
            foreach ($list_id as $id) {
                $this->db->where("id_anggaran",$id);
                $this->db->delete("anggaran");
            }
        echo json_encode(array("status" => TRUE));
    } 

}
?>
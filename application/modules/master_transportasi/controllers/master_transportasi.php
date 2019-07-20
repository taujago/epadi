<?php 
class master_transportasi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_master_transportasi","dm");
		$this->load->helper("tanggal");
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
	}
	function index(){
		$data['controller'] = get_class($this);
        $data['title'] = "Data Jenis Transportasi";
        $data['active'] = "List Data Jenis Transportasi";
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
            $row["id_transportasi"] = $res->id_transportasi;
            $row["transportasi"] = $res->transportasi;
           
          
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_transportasi.'">';

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
        cek_session_akses('master_transportasi',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('transportasi','transportasi','required');    
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
          
            $res = $this->db->insert("transportasi",$data);
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
        cek_session_akses('master_transportasi',$this->session->userdata("operator_level"));
        $data = $this->dm->get_by_id($id);
        echo json_encode($data);
    }

 
    function update(){
        cek_session_akses('master_transportasi',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('transportasi','transportasi','required'); 
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
          
            $this->db->where("id_transportasi",$data['id_transportasi']);
            $res  = $this->db->update("transportasi",$data);
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
        cek_session_akses('master_transportasi',$this->session->userdata("operator_level"));
        $list_id = $this->input->post('id');
            foreach ($list_id as $id) {
                $this->db->where("id_transportasi",$id);
                $this->db->delete("transportasi");
            }
        echo json_encode(array("status" => TRUE));
    } 

}
?>
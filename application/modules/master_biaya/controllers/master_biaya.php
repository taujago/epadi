<?php 
class master_biaya extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_master_biaya","dm");
		$this->load->helper("tanggal");
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
	}
	function index(){
		$data['controller'] = get_class($this);
        $data['title'] = "Data Biaya";
        $data['active'] = "List Data Biaya";
        $data['arr_tujuan'] = $this->dm->get_arr_tujuan();

        $data['arr_golongan'] = $this->dm->get_arr_golongan();
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
            $row["id_biaya"] = $res->id_biaya;
            $row["golongan"] = $res->golongan;
            $row["lumpsum"] = rupiah($res->lumpsum);
            $row["penginapan"] = rupiah($res->penginapan);
            $row["transportasi"] = rupiah($res->transportasi);
           
            
            $sql = "SELECT * FROM biaya_detail sd JOIN biaya sk ON sd.`id_biaya` = sk.`id_biaya` JOIN tujuan tj ON sd.`id_tujuan` = tj.`id_tujuan`";
            $ck = $this->db->query($sql);
            foreach ($ck->result() as $key) {
                $b = array();
                $b["biaya"] = $key->id_biaya;
                if ($row["id_biaya"] == $b["biaya"]) {
                    $row["tujuan"][] = $key->tujuan;
                }
               
            }
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_biaya.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->dm->count_all(),
                        "recordsFiltered" => $this->dm->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
    }


    function cek_nip($str) {
        $this->db->where("nip",$str);
        $res=$this->db->get("biaya");
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
        cek_session_akses('master_biaya',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_tujuan[]','Kota Tujuan','required');     
        $this->form_validation->set_rules('id_golongan','Golongan','required');    
        $this->form_validation->set_rules('lumpsum','Lumpsum','required');   
        $this->form_validation->set_rules('penginapan','Penginapan','required'); 
        $this->form_validation->set_rules('transportasi','Transportasi','required');   
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {

            $data['lumpsum'] = str_replace(".", "", $data['lumpsum']);  
            $data['penginapan'] = str_replace(".", "", $data['penginapan']);  
            $data['transportasi'] = str_replace(".", "", $data['transportasi']);  
            $data["id_biaya"] = md5(date("YmdHis"));

            $tujuan=count($data["id_tujuan"]);
            $id_tujuan=$data["id_tujuan"];
            for($i=0;$i<$tujuan;$i++){
                $datam = array('id_biaya' => $data["id_biaya"],
                              'id_tujuan'=>$id_tujuan[$i]);
                $this->db->insert('biaya_detail',$datam);
            }
            unset($data["id_tujuan"]);
            
            $res = $this->db->insert("biaya",$data);
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
        cek_session_akses('master_biaya',$this->session->userdata("operator_level"));
        $data = $this->dm->get_by_id($id);
        echo json_encode($data);
         
    }

    function load_edit($id) {
        $sql = "SELECT * FROM (`biaya` sd) JOIN `golongan` sc ON `sd`.`id_golongan` = `sc`.`id_golongan` JOIN `biaya_detail` sk ON `sd`.`id_biaya` = `sk`.`id_biaya` JOIN `tujuan` tj ON `sk`.`id_tujuan` = `tj`.`id_tujuan` WHERE `sd`.`id_biaya` = '".$id."'";
        $ck = $this->db->query($sql);
        if($ck->num_rows() > 0 ) {
            $ret = $ck->row_array();
          echo "<b>Kota Tujuan  ".$ret["golongan"]. " :</b>";
            foreach($ck->result() as $data) {?>
                 <div class="btn-group">
                  <button type="button" class="btn bg-olive btn-sm"><?php echo $data->tujuan ?></button>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm" style="color: white" onclick="hapus_kota('<?php echo $data->id_biaya_detail ?>')"><i class="fa fa-trash"></i></a>

                  
                </div>
                <?php
            }
            echo "<br><br>";
        }
    }

    function hapus_kota($id) {
        $this->db->where("id_biaya_detail",$id);
        $this->db->delete("biaya_detail");
    }

    function detail($id){
        $data = $this->dm->get_by_id($id);
        echo json_encode($data);
    }

    function update(){
        cek_session_akses('master_biaya',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('id_tujuan[]','Kota Tujuan','required');     
        $this->form_validation->set_rules('id_golongan','Golongan','required');    
        $this->form_validation->set_rules('lumpsum','Lumpsum','required');   
        $this->form_validation->set_rules('penginapan','Penginapan','required'); 
        $this->form_validation->set_rules('transportasi','Transportasi','required');   
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
            $data['lumpsum'] = str_replace(".", "", $data['lumpsum']);  
            $data['penginapan'] = str_replace(".", "", $data['penginapan']);  
            $data['transportasi'] = str_replace(".", "", $data['transportasi']);  

            if (empty($data["id_tujuan"])) {
                unset($data["id_tujuan"]);
                $this->db->where("id_biaya",$data['id_biaya']);
                $res  = $this->db->update("biaya",$data);
            } else {
                $tujuan=count($data["id_tujuan"]);
                $id_tujuan=$data["id_tujuan"];
                for($i=0;$i<$tujuan;$i++){
                    $datam = array('id_biaya' => $data["id_biaya"],
                                  'id_tujuan'=>$id_tujuan[$i]);
                    $this->db->where("id_biaya",$data['id_biaya']);
                   $res = $this->db->insert('biaya_detail',$datam);
                }
            }    
                    
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
        $list_id = $this->input->post('id');
            foreach ($list_id as $id) {
                $this->db->where("id_biaya",$id);
                $this->db->delete("biaya");
            }
            foreach ($list_id as $id) {
                $this->db->where("id_biaya",$id);
                $this->db->delete("biaya_detail");
            }

        echo json_encode(array("status" => TRUE));
    } 

}
?>
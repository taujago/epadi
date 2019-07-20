<?php 
class nppt extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_nppt","dm");
        $this->load->model("m_spt","sp");
        $this->load->model("m_sppd","sd");
        $this->load->model("m_spt_user","su");
        $this->load->model("m_laporan_user","mu");
        $this->load->model("m_laporan_sppd","ml");
        
		$this->load->helper("tanggal");
	}
	function index(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
		$data['controller'] = get_class($this);
        $data['title'] = "Nota Perjalanan Dinas";
        $data['active'] = "List Nota Perjalanan Dinas";
        $data['arr_pegawai'] = $this->dm->get_arr_pegawai();
        $data['arr_transportasi'] = $this->dm->get_arr_transportasi();
        $data['arr_tujuan'] = $this->dm->get_arr_tujuan();
        $data['arr_anggaran'] = $this->dm->get_arr_anggaran();
        $data['arr_sisa_anggaran'] = $this->dm->get_arr_sisa_anggaran();
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}


function get_detail_nppt($id_nppt_detail){
    $this->db->where("id_nppt_detail",$id_nppt_detail);
    $data = $this->db->get("nppt_detail")->row_array();
    echo json_encode($data);
}


function updatesppd(){


    $post  = $this->input->post();
    $this->db->where("id_nppt_detail",$post['sppd_id_nppt_detail']);
    $res = $this->db->update("nppt_detail",array("no_sppdx"=>$post['no_sppdx']));
    // echo $this->db->last_query();
    if($res){
        $ret['error'] = false;
        $ret['message'] = "Data berhasil  diupdate";
    }
    else {
        $ret['error'] = true;
        $ret['message'] = "Data gagal diupdate";
    }

    echo json_encode($ret);
}

    function spt(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data['controller'] = get_class($this);
        $data['title'] = "Surat Perintah Tugas";
        $data['active'] = "List Surat Perintah Tugas";
        $content = $this->load->view("spt_view",$data,true);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

     function spt_user(){
        cek_session_akses('spt_user',$this->session->userdata("operator_level"));
        $data['controller'] = get_class($this);
        $data['title'] = "Surat Perintah Tugas";
        $data['active'] = "List Surat Perintah Tugas";
        $content = $this->load->view("spt_user_view",$data,true);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function spt_user_laporan(){
        cek_session_akses('spt_user',$this->session->userdata("operator_level"));
        $data['controller'] = get_class($this);
        $data['title'] = "Laporan";
        $data['active'] = "List Laporan";
        $content = $this->load->view("spt_user_laporan_view",$data,true);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function sppd(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data['controller'] = get_class($this);
        $data['title'] = "Surat Perintah Perjalanan Dinas";
        $data['active'] = "List Surat Perjalanan Dinas";
        $content = $this->load->view("sppd_view",$data,true);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function laporan(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data['controller'] = get_class($this);
        $data['title'] = "Laporan Perjalanan Dinas";
        $data['active'] = "List Laporan Perjalanan Dinas";
        $content = $this->load->view("laporan_sppd",$data,true);
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
            $row["id_nppt"] = $res->id_nppt;
            $row["tujuan"] = $res->tujuan;
            $row["maksud"] = $res->maksud;
            $row["no_npt"] = $res->no_npt;
            if ($this->session->userdata('operator_level')=='kabag') {
                if ($res->status=="Y") {
                $row["status"] = "<small class='label bg-green'><i class='fa fa-check'></i></small>";
                } else {
                    $row["status"] = "<small class='label bg-red'>Menunggu Verifikasi</small>";
                }
            } else {
                if ($res->status=="Y") {
                $row["status"] = "<small class='label bg-green'><i class='fa fa-check'></i></small>";
                } else {
                    $row["status"] = "<small class='label bg-red'>Menunggu Verifikasi</small>";
                }
            }
            
            $row["tgl"] = flipdate($res->tgl_pergi)." s/d ". flipdate($res->tgl_kembali)."<br>Lama : ". lama($res->tgl_pergi,$res->tgl_kembali). " Hari" ;
            
            $sql = "SELECT * FROM nppt_detail sd JOIN nppt sk ON sd.`id_nppt` = sk.`id_nppt` JOIN pegawai tj ON sd.`id_pegawai` = tj.`id_pegawai` order by tj.nama ASC";
            $ck = $this->db->query($sql);
            $nox = "0";
            foreach ($ck->result() as $key) {
                
                $b = array();
                $b["nppt"] = $key->id_nppt;
                if ($row["id_nppt"] == $b["nppt"]) {
                    $nox++;
                    $row["nama"][] = " <small class='label bg-blue'>".$key->nama."</small>"   ;
                }
               
            }
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_nppt.'">';

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

    function get_data_spt(){    
        $list = $this->sp->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id_nppt"] = $res->id_nppt;
            $row["tujuan"] = $res->tujuan;
            $row["maksud"] = $res->maksud;
            $row["no_spt"] = $res->no_spt;
            $row["dasar_hukum"] = $res->dasar_hukum;
            // $row["status"] = $res->status_sppd;
         
                if ($res->status_sppd=="Y") {
                $row["status"] = "<small class='label bg-green'><i class='fa fa-check'></i></small>";
                } else {
                    $row["status"] = "<small class='label bg-red'>Belum Dibuat</small>";
                }
            

            
            $sql = "SELECT * FROM nppt_detail sd JOIN nppt sk ON sd.`id_nppt` = sk.`id_nppt` JOIN pegawai tj ON sd.`id_pegawai` = tj.`id_pegawai` join master_gol gl ON gl.id_master_gol = tj.id_master_gol order by tj.nama ASC";
            $ck = $this->db->query($sql);
            $nox = "0";
            foreach ($ck->result() as $key) {
                
                $b = array();
                $b["nppt"] = $key->id_nppt;
                if ($row["id_nppt"] == $b["nppt"]) {
                    $nox++;
                    $row["nama"][] = " <small class='label bg-blue'>".$key->nama."</small>"   ;
                    $row["golongan"][] = $key->master_gol   ;
                }
               
            }
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_nppt.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->sp->count_all(),
                        "recordsFiltered" => $this->sp->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
    }


    function get_data_spt_user(){    
        $list = $this->su->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id_nppt_detail"] = $res->id_nppt_detail;
            $row["maksud"] = $res->maksud;
            $row["no_spt"] = $res->no_spt;
            $row["hasil"] = $res->hasil;
            $row["nama"] = $res->nama;
            $row["tanggal_laporan"] = flipdate($res->tanggal_laporan);
            $row["tgl_pergi"] = flipdate($res->tgl_pergi);
            $row["tgl_kembali"] = flipdate($res->tgl_kembali);
            $row["lama"] = lama($res->tgl_pergi,$res->tgl_kembali). " hari";
            if ($res->laporan=="Y") {
                $row["lap"]= "<small class='label bg-green'><i class='fa fa-check'></i></small>";
            } else {
                $row["lap"]= "<small class='label bg-red'>Belum Dibuat</small>";
            }
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_nppt_detail.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->su->count_all(),
                        "recordsFiltered" => $this->su->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
    }

    function get_data_laporan_user(){    
        $list = $this->mu->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id_nppt_detail"] = $res->id_nppt_detail;
            $row["maksud"] = $res->maksud;
            $row["no_spt"] = $res->no_spt;
            $row["hasil"] = $res->hasil;
            $row["nama"] = $res->nama;
            $row["tanggal_laporan"] = flipdate($res->tanggal_laporan);
            $row["tgl_pergi"] = flipdate($res->tgl_pergi);
            $row["tgl_kembali"] = flipdate($res->tgl_kembali);
            $row["lama"] = lama($res->tgl_pergi,$res->tgl_kembali). " hari";
            if ($res->laporan=="Y") {
                $row["lap"]= "<small class='label bg-green'><i class='fa fa-check'></i></small>";
            } else {
                $row["lap"]= "<small class='label bg-red'>Belum Dibuat</small>";
            }
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_nppt_detail.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mu->count_all(),
                        "recordsFiltered" => $this->mu->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
    }



    function get_data_sppd(){    
        $list = $this->sd->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id_nppt_detail"] = $res->id_nppt_detail;
            $row["nama"] = $res->nama;
            $row["kode_sppd"] = $res->no_sppd;
            $row["no_sppd"] = $res->no_sppdx;
            $row["maksud"] = $res->maksud;
            $row["tujuan"] = $res->tujuan;
            $row["tgl"] = flipdate($res->tgl_pergi)." s/d ". flipdate($res->tgl_kembali);
            $row["tgl_pergi"] = flipdate($res->tgl_pergi);
         
                if ($res->kwitansi=="Y") {
                $row["status"] = "<small class='label bg-green'><i class='fa fa-check'></i></small>";
                } else {
                    $row["status"] = "<small class='label bg-red'>Belum Dibuat</small>";
                }
            
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_nppt_detail.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->sd->count_all(),
                        "recordsFiltered" => $this->sd->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
    }

    function get_data_laporan_sppd(){    
        $list = $this->ml->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id_nppt_detail"] = $res->id_nppt_detail;
            $row["maksud"] = $res->maksud;
            $row["no_spt"] = $res->no_spt;
            $row["hasil"] = $res->hasil;
            $row["nama"] = $res->nama;
            $row["tanggal_laporan"] = flipdate($res->tanggal_laporan);
            $row["tgl_pergi"] = flipdate($res->tgl_pergi);
            $row["tgl_kembali"] = flipdate($res->tgl_kembali);
            if ($res->laporan=="Y") {
                $row["lap"]= "<small class='label bg-green'><i class='fa fa-check'></i></small>";
            } else {
                $row["lap"]= "<small class='label bg-red'>Belum Dibuat</small>";
            }
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_nppt_detail.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ml->count_all(),
                        "recordsFiltered" => $this->ml->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
    }


    function add(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_pegawai[]','Pegawai','required');     
        $this->form_validation->set_rules('id_tujuan','Tujuan','required');    
        $this->form_validation->set_rules('id_anggaran','Anggaran','required');    
        $this->form_validation->set_rules('maksud','Maksud Perjalanan Dinas','required');  
        $this->form_validation->set_rules('id_transportasi','Transportasi','required');
        $this->form_validation->set_rules('tgl_pergi','Tanggal Berangkat','required');
        $this->form_validation->set_rules('tgl_kembali','Tanggal Kembali','required');   
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
            $set = $this->cm->setting();
            $data['tanggal'] = date("Y-m-d");
            $data["tgl_pergi"] = flipdate($data["tgl_pergi"]);
            $data["tgl_kembali"] = flipdate($data["tgl_kembali"]);
            $data["id_nppt"] = md5(date("YmdHis"));

            $data["tahun_anggaran"] = $set->tahun_anggaran;
            $data["kepala"] = $set->nama_kepala;
            $data["pangkat"] = $set->pangkat_kepala;
            $data["nip"] = $set->nip_kepala;

            $tujuan=count($data["id_pegawai"]);
            $id_pegawai=$data["id_pegawai"];



            for($i=0;$i<$tujuan;$i++){
                $datam = array('id_nppt' => $data["id_nppt"],
                              'id_pegawai'=>$id_pegawai[$i]);
                $this->db->insert('nppt_detail',$datam);
            }
            unset($data["id_pegawai"]);
            
            $res = $this->db->insert("nppt",$data);
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
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $set = $this->cm->setting();
        $this->db->where('id_nppt',$id);
        $this->db->where("sd.tahun_anggaran" , $set->tahun_anggaran);
        $this->db->select('*')->from('nppt sd')
                ->join("tujuan sc" , 'sd.id_tujuan = sc.id_tujuan')
                ->join("anggaran ac", 'ac.id_anggaran = sd.id_anggaran');
        $data = $this->db->get()->row_array();
        $data["tgl_pergi"] = flipdate($data["tgl_pergi"]);
        $data["tgl_kembali"] = flipdate($data["tgl_kembali"]);
        echo json_encode($data);         
    }

    function edit_ver($id){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $set = $this->cm->setting();
        $this->db->where('id_nppt',$id);
        $this->db->where("sd.tahun_anggaran" , $set->tahun_anggaran);
        $this->db->select('*')->from('nppt sd')
                ->join("tujuan sc" , 'sd.id_tujuan = sc.id_tujuan')
                ->join("anggaran ac", 'ac.id_anggaran = sd.id_anggaran');
        $data = $this->db->get()->row_array();
        $data["tgl_pergi"] = flipdate($data["tgl_pergi"]);
        $data["tgl_kembali"] = flipdate($data["tgl_kembali"]);
        echo json_encode($data);         
    }

    function buat_laporan($id){
        cek_session_akses('spt_user',$this->session->userdata("operator_level"));
        $this->db->where('id_nppt_detail',$id);
        $this->db->select('*')->from('nppt_detail sd')
                ->join("nppt sc" , 'sd.id_nppt = sc.id_nppt');
        $data = $this->db->get()->row_array();
        echo json_encode($data);
         
    }

    function buat_kwitansi($id){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $set = $this->cm->setting();

        $this->db->where("id_nppt_detail",$id);
        $x = $this->db->get("nppt_detail")->row_array();

        if ($x["kwitansi"]=="N") {
            $sql = " SELECT sc.`id_nppt_detail`, sc.`id_pegawai` AS id_pegawai_nppt,pg.`id_pegawai`, pg.`id_golongan` AS id_gol, bia.`id_golongan`, bia.`lumpsum`, bia.`penginapan`, bia.`transportasi`,
        tj.`tujuan`, (DATEDIFF(np.`tgl_kembali`,np.`tgl_pergi`) + 1) AS lamanya, gl.`golongan`, pg.`pangkat`, pg.`nama`,  np.`no_sppd`, np.`tanggal_sppd`, np.id_anggaran
        FROM nppt_detail sc, pegawai pg, golongan gl, biaya bia, biaya_detail bd, nppt np, tujuan tj
        WHERE sc.`id_pegawai` = pg.`id_pegawai`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND bia.`id_golongan` = pg.`id_golongan`
        AND bd.`id_biaya` = bia.`id_biaya`
        AND np.`id_tujuan` = bd.`id_tujuan`
        AND tj.`id_tujuan` = np.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt`
        and id_nppt_detail = ".$id." ";

            $data = $this->db->query($sql)->row_array();
            $data["id_anggaran"] = $data["id_anggaran"];    
            $data["uang_harian"] = $data["lumpsum"]*$data["lamanya"];
            $data["uang_penginapan"] = $data["penginapan"]*$data["lamanya"];
            $data["show_uang_harian"] = rupiah($data["lumpsum"])." x ".$data["lamanya"]. " hari";
            $data["show_uang_penginapan"] = rupiah($data["penginapan"])." x ".$data["lamanya"]. " hari";
            $data["uang_transportasi"] = $data["transportasi"]*1;
            $data["show_uang_transportasi"] = rupiah($data["transportasi"])." x 1 ";
            $data["asal"] = $set->tempat_surat;
            $data["aku"] = "Buat Kwitansi ".$data["nama"];

            echo json_encode($data);
        } else {
        $sql = "  SELECT rc.*, sc.`id_nppt_detail`, sc.`id_pegawai` AS id_pegawai_nppt,pg.`id_pegawai`, pg.`id_golongan` AS id_gol, bia.`id_golongan`, bia.`lumpsum`, bia.`penginapan`, bia.`transportasi`,
        tj.`tujuan`, (DATEDIFF(np.`tgl_kembali`,np.`tgl_pergi`) + 1) AS lamanya, gl.`golongan`, pg.`pangkat`, pg.`nama`,  np.`no_sppd`, np.`tanggal_sppd`, np.id_anggaran as id_anggarannya
        FROM rincianbiaya rc,nppt_detail sc, pegawai pg, golongan gl, biaya bia, biaya_detail bd, nppt np, tujuan tj
        WHERE sc.`id_pegawai` = pg.`id_pegawai`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND bia.`id_golongan` = pg.`id_golongan`
        AND bd.`id_biaya` = bia.`id_biaya`
        AND np.`id_tujuan` = bd.`id_tujuan`
        AND tj.`id_tujuan` = np.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt`
        AND rc.`id_nppt_detail` = sc.`id_nppt_detail`
        and sc.id_nppt_detail = ".$id." ";

            $data = $this->db->query($sql)->row_array();
            $data["id_anggaran"] = $data["id_anggarannya"];    
            $data["show_uang_harian"] = rupiah($data["lumpsum"])." x ".$data["lamanya"]. " hari";
            $data["show_uang_penginapan"] = rupiah($data["penginapan"])." x ".$data["lamanya"]. " hari";
            $data["show_uang_transportasi"] =rupiah($data["transportasi"])." x 1 ";
            $data["asal"] = $set->tempat_surat;
            $data["aku"] = "Edit Kwitansi ".$data["nama"];
            echo json_encode($data);
        }

         
    }


    function load_edit($id) {
        $sql = "SELECT * FROM (`nppt` sd) JOIN `nppt_detail` sk ON `sd`.`id_nppt` = `sk`.`id_nppt` join pegawai pg on pg.id_pegawai = sk.id_pegawai  WHERE `sd`.`id_nppt` = '".$id."'";
        $ck = $this->db->query($sql);
        if($ck->num_rows() > 0 ) {
            $ret = $ck->row_array();
            echo "Nama Pegawai : ";
            foreach($ck->result() as $data) {?>
                 <div class="btn-group">
                  <button type="button" class="btn bg-olive btn-sm"><?php echo $data->nama ?></button>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm" style="color: white" onclick="hapus_pegawai('<?php echo $data->id_nppt_detail ?>')"><i class="fa fa-trash"></i></a>

                  
                </div>
                <?php
            }
            echo "<br><br>";
        }
    }

    function load_ver($id) {
        $sql = "SELECT * FROM (`nppt` sd) JOIN `nppt_detail` sk ON `sd`.`id_nppt` = `sk`.`id_nppt` join pegawai pg on pg.id_pegawai = sk.id_pegawai  WHERE `sd`.`id_nppt` = '".$id."'";
        $ck = $this->db->query($sql);
        if($ck->num_rows() > 0 ) {
            $ret = $ck->row_array();
            echo "Nama Pegawai : ";
            foreach($ck->result() as $data) {?>
                 <div class="btn-group">
                  <button type="button" class="btn bg-olive btn-sm"><?php echo $data->nama ?></button>
                </div>
                <?php
            }
            echo "<br><br>";
        }
    }

    function load_b($id) {
        $sql = "SELECT *,(DATEDIFF(sd.`tgl_kembali`,sd.`tgl_pergi`) + 1) AS lamanya FROM (`nppt` sd) JOIN `nppt_detail` sk ON `sd`.`id_nppt` = `sk`.`id_nppt` join pegawai pg on pg.id_pegawai = sk.id_pegawai join golongan gl on gl.id_golongan=pg.id_golongan join biaya bia on bia.id_golongan=gl.id_golongan join biaya_detail bd on bd.id_biaya=bia.id_biaya  WHERE `sd`.`id_nppt` = '".$id."'";
        $ck = $this->db->query($sql);
        // echo $this->db->last_query();
        if($ck->num_rows() > 0 ) {
            $ret = $ck->row_array();?>
            <h4>Rencana Anggaran</h4>
            <div class="table-wrap">
                    <div class="table-responsive">
                        <table  class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Uang Harian</th>
                                    <th>Uang Penginapan</th>
                                    <th>Uang Transportasi</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <?php

                            foreach($ck->result() as $data) {?>
                            <tr>
                               
                                <td style="font-weight: bold;"><?php echo $data->nama; ?> </td>
                                <td><?php echo rupiah($data->lumpsum) ?> x <?php echo $data->lamanya; ?> Hari</td>
                                <td><?php echo rupiah($data->penginapan) ?> x <?php echo $data->lamanya; ?> Hari</td>
                                <td><?php echo rupiah($data->transportasi) ?> x 1 PP </td>
                                <td style="font-weight: bold;"><?php echo rupiah(($data->transportasi*1)+($data->lumpsum*$data->lamanya)+($data->penginapan*$data->lamanya)) ?> </td>
                            </tr>
                       
                    </div>
                </div>
                <?php
            }
           
        }

        $sqlx = "SELECT *,(DATEDIFF(sd.`tgl_kembali`,sd.`tgl_pergi`) + 1) AS lamanya, sum((bia.lumpsum*(DATEDIFF(sd.`tgl_kembali`,sd.`tgl_pergi`) + 1))+(bia.penginapan*(DATEDIFF(sd.`tgl_kembali`,sd.`tgl_pergi`) + 1))+(bia.transportasi*1)) as total FROM (`nppt` sd) JOIN `nppt_detail` sk ON `sd`.`id_nppt` = `sk`.`id_nppt` join pegawai pg on pg.id_pegawai = sk.id_pegawai join golongan gl on gl.id_golongan=pg.id_golongan join biaya bia on bia.id_golongan=gl.id_golongan join biaya_detail bd on bd.id_biaya=bia.id_biaya  WHERE `sd`.`id_nppt` = '".$id."'";

        $x = $this->db->query($sqlx)->row_array();?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="font-weight: bold;">Total</td>
            <td style="font-weight: bold;"><?php echo rupiah($x["total"]) ?> </td>
        </tr>

        <?php

        echo " </table>";

    }

    function hapus_pegawai($id) {
        $this->db->where("id_nppt_detail",$id);
        $this->db->delete("nppt_detail");
    }

    function detail($id){
        $data = $this->dm->get_by_id($id);
        $data["tgl_pergi"] = flipdate($data["tgl_pergi"]);
        echo json_encode($data);
    }

    function update(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');    
        $this->form_validation->set_rules('id_tujuan','Tujuan','required');    
        $this->form_validation->set_rules('maksud','Maksud Perjalanan Dinas','required');  
        $this->form_validation->set_rules('id_transportasi','Transportasi','required');
        $this->form_validation->set_rules('tgl_pergi','Tanggal Berangkat','required');
        $this->form_validation->set_rules('tgl_kembali','Tanggal Kembali','required');     
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
            $set = $this->cm->setting();
            $data["tgl_pergi"] = flipdate($data["tgl_pergi"]);
            $data["tgl_kembali"] = flipdate($data["tgl_kembali"]);
            $data["tahun_anggaran"] = $set->tahun_anggaran;
            $data["kepala"] = $set->nama_kepala;
            $data["pangkat"] = $set->pangkat_kepala;
            $data["nip"] = $set->nip_kepala;
            if (empty($data["id_pegawai"])) {
                unset($data["id_pegawai"]);
                $this->db->where("id_nppt",$data['id_nppt']);
                $res  = $this->db->update("nppt",$data);
            } else {
                $tujuan=count($data["id_pegawai"]);
                $id_pegawai=$data["id_pegawai"];
                for($i=0;$i<$tujuan;$i++){
                    $datam = array('id_nppt' => $data["id_nppt"],
                                  'id_pegawai'=>$id_pegawai[$i]);
                    $this->db->where("id_nppt",$data['id_nppt']);
                   $res = $this->db->insert('nppt_detail',$datam);
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

    function update_spt(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');     
        $this->form_validation->set_rules('no_spt','Nomor SPT','required');  
       
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
           
                $this->db->where("id_nppt",$data['id_nppt']);
                $res  = $this->db->update("nppt",$data);
            
                    
                    if($res) {    
                    $ret = array("success"=>true,
                                "pesan"=>"Berhasil di Update",
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

    function update_sppd(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');     
        $this->form_validation->set_rules('pejabat_perintah','Pejabat Pemberi Perintah','required');  
       
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
                $data["status_sppd"] = "Y";

                $data["no_sppd"] = "094";
                $data['tanggal_sppd'] = date("Y-m-d");
                
                $this->db->where("id_nppt",$data['id_nppt']);
                $res  = $this->db->update("nppt",$data);
            
                    
                    if($res) {   

                            $arr=array(); 
                            $this->db->where("id_nppt",$data['id_nppt']);
                            $x =  $this->db->get("nppt_detail");

                            $sql = "SELECT sppd_status FROM nppt_detail where id_nppt = '".$data['id_nppt']."' ";
                            $cek2 = $this->db->query($sql);
                            // echo $this->db->last_query();
                            $cek = $cek2->row_array();

                            if ($cek["sppd_status"]=="N") {
                                $sqla = "SELECT  MAX(no_sppdx) AS up FROM nppt_detail"; 
                                $cek3 = $this->db->query($sqla);
                                $ceka = $cek3->row_array();

                                $b = date("m");
                                $c = date("Y");
                                $no_sppd = $ceka["up"]+1;

                                foreach($x->result() as $row):
                                    $xx["sppd_status"] = "Y";
                                    $xx["no_sppdx"] = sprintf("%03s", $no_sppd++)."/BKD/SPPD/DD/".$b."/".$c;
                                    $this->db->where("id_nppt_detail",$row->id_nppt_detail);
                                    $this->db->update("nppt_detail",$xx);
                                endforeach;
                            }
                      
                    $ret = array("success"=>true,
                                "pesan"=>"SPPD berhasil Dibuat. Halaman akan menuju ke SPPD",
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


      function update_spt_user(){
        cek_session_akses('spt_user',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');     
        $this->form_validation->set_rules('hasil','Hasil','required');  
       
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {

                $data["laporan"] = "Y";
                $data['tanggal_laporan'] = date("Y-m-d");
                
                $this->db->where("id_nppt_detail",$data['id_nppt_detail']);
                $res  = $this->db->update("nppt_detail",$data);
            
                    
                    if($res) {    
                    $ret = array("success"=>true,
                                "pesan"=>"Laporan berhasil Dibuat",
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

    function update_kwitansi(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');     
        $this->form_validation->set_rules('dari','Sudah Terima Dari','required');  
       
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {

                $this->db->where("id_nppt_detail",$data['id_nppt_detail']);
                $x = $this->db->get("nppt_detail")->row_array();
                if ($x["kwitansi"] == "Y") {
                    $this->db->where("id_nppt_detail",$data['id_nppt_detail']);
                    $res  = $this->db->update("rincianbiaya",$data);
                } else {
                    $set = $this->cm->setting();
                    $x["kwitansi"] = "Y";
                    $x['tanggal_kwitansi'] = date("Y-m-d");

                    
                    $this->db->where("id_nppt_detail",$data['id_nppt_detail']);
                    $res  = $this->db->update("nppt_detail",$x);
                    if ($res) {
                        $ret = $this->db->insert("rincianbiaya", $data);
                    }
                }

                
            
                    
                    if($res) {    
                    $ret = array("success"=>true,
                                "pesan"=>"Kwitansi berhasil Dibuat",
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
                $this->db->where("id_nppt",$id);
                $this->db->delete("nppt");
            }
            

            foreach ($list_id as $id) {
                $this->db->where("id_nppt",$id);
                $rinc = $this->db->get("nppt_detail")->row_array();

                $this->db->where("id_nppt_detail", $rinc["id_nppt_detail"]);
                $res = $this->db->delete("rincianbiaya");
              
                    foreach ($list_id as $id) {
                        $this->db->where("id_nppt",$id);
                        $this->db->delete("nppt_detail");
                    }
                
            }


        echo json_encode(array("status" => TRUE));
    } 

    function hapus_laporan(){
        $list_id = $this->input->post('id');
            foreach ($list_id as $id) {
                $this->db->where("id_nppt_detail",$id);
                $data["laporan"] = "N";
                $data["tanggal_laporan"] = "";
                $data["hasil"] = "";
                $data["_wysihtml5_mode"] = "";

                $this->db->update("nppt_detail", $data);
            }
           

        echo json_encode(array("status" => TRUE));
    } 

    function ver(){
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');     
        $this->form_validation->set_rules('id_anggaran','Anggaran','required');  
       
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {


                $this->db->where("id_nppt", $data["id_nppt"]);
                $x = $this->db->get("nppt")->row_array();

              
                    if ($x["status"]=="Y") {
                    $this->db->where("id_nppt",$data['id_nppt']);
                    $res = $this->db->update("nppt",$data);
                    } else {
                        $data["status"] = "Y";
                        // $no_npt = $x["no_npt"];
                        // $ex = explode("/", $no_npt);
                        // $data["no_spt"] = "875.1".$ex[1];
                        $data['tanggal_spt'] = date("Y-m-d");
                        $this->db->where("id_nppt",$data['id_nppt']);
                        $res = $this->db->update("nppt",$data);
                    }
                    if($res) {    
                    $ret = array("success"=>true,
                                "pesan"=>"Berhasil Di verifikasi",
                                "conf" => "OK",
                                "cancel" => true,
                                "confirm" => false,
                                "canceltext" => "Ok",
                                "operation" =>"insert");
                    }
                    else {
                     $ret = array("success"=>false,
                               // "pesan"=>mysql_error(),
                                "pesan"=>" Sudah Ada",
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
        // echo $this->db->last_query();
       echo json_encode($ret);
    }

function pdf($id,$l) {
    $this->db->select('*')->from('nppt sp')
    ->join("tujuan tj", 'tj.id_tujuan = sp.id_tujuan')
    ->where("sp.id_nppt",$id);
    $data = $this->db->get();
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Permohonan SPPD";
    $data['title'] = $data['header'];

    // Bahan
    $this->db->select('*')->from('nppt_detail sd')
                ->where("sd.id_nppt", $id)
                ->join("pegawai sc" , 'sd.id_pegawai = sc.id_pegawai')
                ->join("master_gol gl" , 'sc.id_master_gol = gl.id_master_gol')
                ->order_by("sc.nama", "ASC");
    $res = $this->db->get();
    $data['record'] = $res;

    
        
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(25, 10, 25);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage($l);

 

         $html = $this->load->view("pdf/nppt_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
} 


function pdf_sek($id,$l) {
    $this->db->select('*')->from('nppt sp')
    ->join("tujuan tj", 'tj.id_tujuan = sp.id_tujuan')
    ->where("sp.id_nppt",$id);
    $data = $this->db->get();
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Surat Tugas";
    $data['title'] = $data['header'];

    // Bahan
    $this->db->select('*')->from('nppt_detail sd')
                ->where("sd.id_nppt", $id)
                ->join("pegawai sc" , 'sd.id_pegawai = sc.id_pegawai')
                ->join("master_gol gl" , 'sc.id_master_gol = gl.id_master_gol')
                ->order_by("sc.nama", "ASC");
    $res = $this->db->get();
    $data['record'] = $res;

    
        
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(20, 10, 20);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage($l);

 

         $html = $this->load->view("pdf/spt_sek_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
} 

function pdf_bupati($id,$l,$w) {
    $this->db->select('*')->from('nppt sp')
    ->join("tujuan tj", 'tj.id_tujuan = sp.id_tujuan')
    ->where("sp.id_nppt",$id);
    $data = $this->db->get();
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Surat Tugas";
    $data['title'] = $data['header'];

    // Bahan
   $this->db->select('*')->from('nppt_detail sd')
                ->where("sd.id_nppt", $id)
                ->join("pegawai sc" , 'sd.id_pegawai = sc.id_pegawai')
                ->join("master_gol gl" , 'sc.id_master_gol = gl.id_master_gol')
                ->order_by("sc.nama", "ASC");
    $res = $this->db->get();
    $data['record'] = $res;

    
        
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(20, 10, 20);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage($l);

 

         $html = $this->load->view("pdf/spt_sek_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}



function pdf_spt_asisten($id) {

    // echo "1 ". $this->uri->segment(3). '<Br />';
    // echo "2 ". $this->uri->segment(4). '<br />';

    $asisten  = $this->uri->segment(4);

    $this->db->select('*')->from('nppt sp')
    ->join("tujuan tj", 'tj.id_tujuan = sp.id_tujuan')
    ->where("sp.id_nppt",$id);
    $data = $this->db->get();
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Surat Tugas";
    $data['title'] = $data['header'];

    // Bahan
   $this->db->select('*')->from('nppt_detail sd')
                ->where("sd.id_nppt", $id)
                ->join("pegawai sc" , 'sd.id_pegawai = sc.id_pegawai')
                ->join("master_gol gl" , 'sc.id_master_gol = gl.id_master_gol')
                ->order_by("sc.nama", "ASC");
    $res = $this->db->get();
    $data['record'] = $res;


    $set = $this->cm->setting();
    // echo "<pre>"; print_r($set); exit;

    // [asisten_1_nama] => H. Amri Rahmansyah
    // [asisten_1_nip] => 1987 8 01 982  924284 
    // [asisten_1_pangkat] => Pembina Utama
    // [asisten_2_nama] => IR. Ryas Rasyee
    // [asisten_2_nip] => 1987 8 01 982  55555
    // [asisten_2_pangkat] => Pembina Utama
    // [asisten_3_nama] => Firmansyah, S.Kom
    // [asisten_3_nip] => 1987 8 01 982  44444
    // [asisten_3_pangkat] => Pembina Utama
    // [asisten_1_jabatan] => Asisten satu 
    // [asisten_2_jabatan] => Asisten dua 
    // [asisten_3_jabatan] => Asisten tiga 

    $data['set'] = $set;

    if($asisten==1){
         $ttd['nama'] = $set->asisten_1_nama;
         $ttd['nip']  = $set->asisten_1_nip;
         $ttd['pangkat'] = $set->asisten_1_pangkat;
         $ttd['jabatan'] = $set->asisten_1_jabatan;
    }

    else if($asisten==2) {
        $ttd['nama'] = $set->asisten_2_nama;
        $ttd['nip']  = $set->asisten_2_nip;
        $ttd['pangkat'] = $set->asisten_2_pangkat;
        $ttd['jabatan'] = $set->asisten_2_jabatan;
    }
    else {
        $ttd['nama'] = $set->asisten_3_nama;
        $ttd['nip']  = $set->asisten_3_nip;
        $ttd['pangkat'] = $set->asisten_3_pangkat;
        $ttd['jabatan'] = $set->asisten_3_jabatan;
    }

    $data['ttd'] = $ttd;



    
        
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(20, 10, 20);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage("P");

 

         $html = $this->load->view("pdf/spt_asisten_pdf_view",$data,true);
        // echo $html; exit;
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}

function pdf_sppd_sek($id,$l) {
 

    $sql = "SELECT sc.`id_nppt`,sc.no_sppdx,np.no_sppd, ag.kode, sc.`id_pegawai` AS id_pegawaiku, pg.`nama` AS nama_pegawai, pg.`nip` AS nip_pegawai, pg.`jabatan` AS jabatan_pegawai, pg.`pangkat` AS
        pangkat_pegawai, np.`id_nppt`, np.*, tj.tujuan AS nama_tujuan, gl.`golongan`, tr.`transportasi`, mg.master_gol 
        FROM nppt_detail sc, pegawai pg, nppt np, tujuan tj, golongan gl, transportasi tr, anggaran ag, master_gol mg
        WHERE sc.`id_pegawai` = pg.`id_pegawai` 
        AND np.`id_transportasi` = tr.`id_transportasi`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND np.`id_tujuan` = tj.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt` 
        and mg.id_master_gol = pg.id_master_gol
        and ag.id_anggaran = np.id_anggaran
        AND sc.`id_nppt_detail` = ".$id." ";
    $data = $this->db->query($sql);
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Surat Perjalanan Dinas";
    $data['title'] = $data['header'];

        
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage($l);

 

         $html = $this->load->view("pdf/sppd_sek_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}  

function pdf_sppd_bupati($id,$l,$w) {
 

  $sql = "SELECT sc.`id_nppt`,sc.no_sppdx,np.no_sppd, ag.kode, sc.`id_pegawai` AS id_pegawaiku, pg.`nama` AS nama_pegawai, pg.`nip` AS nip_pegawai, pg.`jabatan` AS jabatan_pegawai, pg.`pangkat` AS
        pangkat_pegawai, np.`id_nppt`, np.*, tj.tujuan AS nama_tujuan, gl.`golongan`, tr.`transportasi`, mg.master_gol 
        FROM nppt_detail sc, pegawai pg, nppt np, tujuan tj, golongan gl, transportasi tr, anggaran ag, master_gol mg
        WHERE sc.`id_pegawai` = pg.`id_pegawai` 
        AND np.`id_transportasi` = tr.`id_transportasi`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND np.`id_tujuan` = tj.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt` 
        and mg.id_master_gol = pg.id_master_gol
        and ag.id_anggaran = np.id_anggaran
        AND sc.`id_nppt_detail` = ".$id." ";
    $data = $this->db->query($sql);
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Surat Perjalanan Dinas";
    $data['title'] = $data['header'];

    // $data['wakil'] = $w;

 
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage($l);

 

         $html = $this->load->view("pdf/sppd_sek_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
} 



function pdf_sppd_asisten($id) {
 

 
$asisten = $this->uri->segment(4);

 

// exit('faaaaaakk.');

  $sql = "SELECT sc.`id_nppt`,sc.no_sppdx,np.no_sppd, ag.kode, sc.`id_pegawai` AS id_pegawaiku, pg.`nama` AS nama_pegawai, pg.`nip` AS nip_pegawai, pg.`jabatan` AS jabatan_pegawai, pg.`pangkat` AS
        pangkat_pegawai, np.`id_nppt`, np.*, tj.tujuan AS nama_tujuan, gl.`golongan`, tr.`transportasi`, mg.master_gol 
        FROM nppt_detail sc, pegawai pg, nppt np, tujuan tj, golongan gl, transportasi tr, anggaran ag, master_gol mg
        WHERE sc.`id_pegawai` = pg.`id_pegawai` 
        AND np.`id_transportasi` = tr.`id_transportasi`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND np.`id_tujuan` = tj.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt` 
        and mg.id_master_gol = pg.id_master_gol
        and ag.id_anggaran = np.id_anggaran
        AND sc.`id_nppt_detail` = ".$id." ";
    $data = $this->db->query($sql);
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Surat Perjalanan Dinas";
    $data['title'] = $data['header'];

    // $data['wakil'] = $w;

 
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage("P");
        $data['asisten'] = $asisten;

        // echo "<pre>"; print_r($data); exit;

 

         $html = $this->load->view("pdf/sppd_asisten_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
} 


function pdf_laporan($id,$l) {
 

    $sql = "SELECT sc.`id_nppt`,sc.tanggal_laporan, pg.unitkerja,sc.hasil, sc.`id_pegawai` AS id_pegawaiku, pg.`nama` AS nama_pegawai, pg.`nip` AS nip_pegawai, pg.`jabatan` AS jabatan_pegawai, pg.`pangkat` AS
        pangkat_pegawai, np.`id_nppt`, np.*, tj.tujuan AS nama_tujuan, gl.`golongan`, tr.`transportasi`
        FROM nppt_detail sc, pegawai pg, nppt np, tujuan tj, golongan gl, transportasi tr
        WHERE sc.`id_pegawai` = pg.`id_pegawai` 
        AND np.`id_transportasi` = tr.`id_transportasi`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND np.`id_tujuan` = tj.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt`
        AND sc.`laporan` = 'Y'
        AND sc.`id_nppt_detail` = ".$id." ";
    $data = $this->db->query($sql);
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Laporan Perjalanan Dinas";
    $data['title'] = $data['header'];

        
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(20, 10, 20);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage($l);

 

         $html = $this->load->view("pdf/laporan_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}  

}
?>
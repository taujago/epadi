<?php 
class kwitansi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_kwitansi","dm");
		$this->load->helper("tanggal");
        cek_session_akses('nppt',$this->session->userdata("operator_level"));
	}
	function index(){
		$data['controller'] = get_class($this);
        $data['title'] = "Data Kwitansi";
        $data['active'] = "List Data Kwitansi";
        $data['arr_jenis_tujuan'] = array("0"=>"Dalam Daerah","1"=>"Luar Daerah");
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
            $row["id_nppt_detail"] = $res->id_nppt_detail;
            $row["no_sppd"] = $res->no_sppd."/".$res->no_sppdx;
            $row["tujuan"] = $res->tujuan;
            $row["namax"] = $res->nama;
        
          
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id_nppt_detail.'">';

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
        cek_session_akses('kwitansi',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tujuan','tujuan','required');    
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
          
            $res = $this->db->insert("tujuan",$data);
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
        cek_session_akses('kwitansi',$this->session->userdata("operator_level"));
        $data = $this->dm->get_by_id($id);
        echo json_encode($data);
    }

 
    function update(){
        cek_session_akses('kwitansi',$this->session->userdata("operator_level"));
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tujuan','tujuan','required'); 
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');

        $this->form_validation->set_error_delimiters("* ", '');
        if($this->form_validation->run() == TRUE) {
          
            $this->db->where("id_tujuan",$data['id_tujuan']);
            $res  = $this->db->update("tujuan",$data);
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
        cek_session_akses('kwitansi',$this->session->userdata("operator_level"));
        $list_id = $this->input->post('id');
            foreach ($list_id as $id) {
                $this->db->where("id_tujuan",$id);
                $this->db->delete("tujuan");
            }
        echo json_encode(array("status" => TRUE));
    }

    function pdf_kw($id,$l) {
    $sql = "  SELECT rc.*, sc.`id_nppt_detail`, sc.`id_pegawai` AS id_pegawai_nppt,pg.`id_pegawai`, pg.`id_golongan` AS id_gol, bia.`id_golongan`, bia.`lumpsum`, bia.`penginapan`, bia.`transportasi`,
        tj.`tujuan`, (DATEDIFF(np.`tgl_kembali`,np.`tgl_pergi`) + 1) AS lamanya, gl.`golongan`,sc.tanggal_kwitansi, pg.`pangkat`, pg.`nama`,pg.nip, pg.jabatan, np.`no_sppd`, np.`tanggal_sppd`, sc.no_sppdx, ag.kode as kode_anggaran
        FROM rincianbiaya rc,nppt_detail sc, pegawai pg, golongan gl, biaya bia, biaya_detail bd, nppt np, tujuan tj, anggaran ag
        WHERE sc.`id_pegawai` = pg.`id_pegawai`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND bia.`id_golongan` = pg.`id_golongan`
        AND bd.`id_biaya` = bia.`id_biaya`
        AND np.`id_tujuan` = bd.`id_tujuan`
        AND tj.`id_tujuan` = np.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt`
        AND rc.`id_nppt_detail` = sc.`id_nppt_detail`
        and ag.id_anggaran = np.id_anggaran
        and sc.id_nppt_detail = ".$id." ";

            $data = $this->db->query($sql)->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Kwitansi";
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

 

         $html = $this->load->view("pdf/kw_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}

function pdf_kw_rincian($id,$l) {
    $sql = "  SELECT rc.*, sc.`id_nppt_detail`, sc.`id_pegawai` AS id_pegawai_nppt,pg.`id_pegawai`, pg.`id_golongan` AS id_gol, bia.`id_golongan`, bia.`lumpsum`, bia.`penginapan`, bia.`transportasi`,
        tj.`tujuan`, (DATEDIFF(np.`tgl_kembali`,np.`tgl_pergi`) + 1) AS lamanya, gl.`golongan`,sc.tanggal_kwitansi, pg.`pangkat`, pg.`nama`,pg.nip,  np.`no_sppd`, np.`tanggal_sppd`,sc.no_sppdx, ag.kode as kode_anggaran
        FROM rincianbiaya rc,nppt_detail sc, pegawai pg, golongan gl, biaya bia, biaya_detail bd, nppt np, tujuan tj, anggaran ag
        WHERE sc.`id_pegawai` = pg.`id_pegawai`
        AND pg.`id_golongan` = gl.`id_golongan`
        AND bia.`id_golongan` = pg.`id_golongan`
        AND bd.`id_biaya` = bia.`id_biaya`
        AND np.`id_tujuan` = bd.`id_tujuan`
        AND tj.`id_tujuan` = np.`id_tujuan`
        AND np.`id_nppt` = sc.`id_nppt`
        AND rc.`id_nppt_detail` = sc.`id_nppt_detail`
        and ag.id_anggaran = np.id_anggaran
        and sc.id_nppt_detail = ".$id." ";

            $data = $this->db->query($sql)->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Rincian Biaya";
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

 

         $html = $this->load->view("pdf/kw_rin_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}


}
?>
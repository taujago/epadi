<?php 
class laporan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("m_laporan","dm");
        $this->load->model("m_mata_anggaran", "ma");
		$this->load->helper("tanggal");
        cek_session_akses('laporan',$this->session->userdata("operator_level"));
	}

	function index(){
		$data['controller'] = get_class($this);
        $set = $this->cm->setting();
        $data['title'] = "Laporan Penggunaan Anggaran Th ". $set->tahun_anggaran;
        $data['active'] = "List Laporan Penggunaan Anggaran Th ". $set->tahun_anggaran;
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}

    function mata_anggaran(){
        $data['controller'] = get_class($this);
        $set = $this->cm->setting();
        $data['title'] = "Laporan Mata Anggaran Th ". $set->tahun_anggaran;
        $data['active'] = "List Laporan Mata Anggaran Th ". $set->tahun_anggaran;
        $content = $this->load->view($data['controller']."_mata_anggaran_view",$data,true);
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
            $row["jabatan"] = $res->jabatan;
            $row["pangkat"] = $res->pangkat_pegawai;
            
            $row["nama"] = $res->nama;
            $row["golongan"] = $res->master_gol;
        
          
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


    function get_data_anggaran(){    
        $list = $this->ma->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id"] = $res->id;
            $row["kode"] = $res->kode;
            $row["nama_anggaran"] = $res->nama_anggaran;
            $sql = "SELECT *, ag.`id_anggaran` AS id, SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum FROM anggaran ag LEFT JOIN rincianbiaya rc ON rc.`id_anggaran` = ag.`id_anggaran` where ag.id_anggaran = ".$row["id"]." ";
            $ck = $this->db->query($sql);

            foreach ($ck->result() as $key) {
                
                $b = array();
                $b["id"] = $key->id;
                if ($row["id"] == $b["id"]) {
                    $row["sisa"] = uang($res->pagu-$key->jum);
                    $row["terpakai"] = uang($key->jum);
                }

               
            }
            
            $row["pagu"] = uang($res->pagu);
            $row['cek'] = '<input type="checkbox" class="data-check" value="'.$res->id.'">';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ma->count_all(),
                        "recordsFiltered" => $this->ma->count_filtered(),
                        "data" => $data,
                );
        // echo $this->db->last_query();
        echo json_encode($output);
    }



    function lihat($id){
        cek_session_akses('laporan',$this->session->userdata("operator_level"));
        $set = $this->cm->setting();
        $sql = "  SELECT nd.`id_nppt_detail` AS id, nd.no_sppdx, rc.`id_nppt_detail`, rc.`uang_harian`, rc.`uang_penginapan`, rc.`uang_transportasi`, np.`id_nppt`
                , np.`no_sppd`, np.`tanggal_sppd`, pg.`nama`, (DATEDIFF(np.`tgl_kembali`,np.`tgl_pergi`) + 1) AS lamanya
                FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
                WHERE nd.`id_nppt` = np.`id_nppt`
                AND pg.`id_pegawai` = nd.`id_pegawai`
                AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
                AND nd.`kwitansi` = 'Y'
                AND pg.`id_pegawai` = ".$id."
                and np.tahun_anggaran = ".$set->tahun_anggaran." ";

        $list = $this->db->query($sql);
        $data = array();
        $no = 1;
        foreach ($list->result() as $res) {
            
            $row = array();
            $row["no"] = $no++;
            $row["id_nppt_detail"] = $res->id_nppt_detail;
            $row["nama"] = $res->nama;
            $row["no_sppd"] = $res->no_sppd;
            $row["no_sppdx"] = $res->no_sppdx;
            $row["tgl"] = tgl_indo(flipdate($res->tanggal_sppd));
            $row["duit"] = rupiah($res->uang_harian+$res->uang_penginapan+$res->uang_transportasi);
            $data[] = $row;
        }

        echo json_encode($data);
    }

    function lihat_mata_anggaran($id){
        cek_session_akses('laporan',$this->session->userdata("operator_level"));
        $set = $this->cm->setting();
        $sql = " SELECT *, ag.`id_anggaran` AS id FROM anggaran ag LEFT JOIN rincianbiaya rc ON rc.`id_anggaran` = ag.`id_anggaran`
JOIN nppt_detail nd ON nd.`id_nppt_detail` = rc.`id_nppt_detail` JOIN pegawai pg ON pg.`id_pegawai` = nd.`id_pegawai` JOIN nppt np ON np.`id_nppt` = nd.`id_nppt` where ag.id_anggaran = ".$id." and nd.kwitansi='Y' and ag.tahun = ".$set->tahun_anggaran." ";

        $list = $this->db->query($sql);
        $data = array();
        $no = 1;
        foreach ($list->result() as $res) {
            
            $row = array();
            $row["no"] = $no++;
            $row["id_anggaran"] = $res->id_anggaran;
            $row["nama_anggaran"] = $res->nama_anggaran;
            $row["nama_pegawai"] = $res->nama;
            $row["no_sppd"] = $res->no_sppd;
            $row["no_sppdx"] = $res->no_sppdx;
            $row["tgl"] = tgl_indo(flipdate($res->tanggal_sppd));
            $row["duit"] = rupiah($res->uang_harian+$res->uang_penginapan+$res->uang_transportasi);
            $data[] = $row;
        }

        echo json_encode($data);
    }

    function load_jum($id) {
       $sql = "  SELECT SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum
            FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
            WHERE nd.`id_nppt` = np.`id_nppt`
            AND pg.`id_pegawai` = nd.`id_pegawai`
            AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
            AND nd.`kwitansi` = 'Y'
            AND pg.`id_pegawai` = ".$id." ";
        $ck = $this->db->query($sql)->row_array();

        echo rupiah($ck["jum"]);
     // echo $this->db->last_query();
    }

    function load_jum_anggaran($id) {
        $set = $this->cm->setting();
       $sql = "  SELECT SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum
            FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
            WHERE nd.`id_nppt` = np.`id_nppt`
            AND pg.`id_pegawai` = nd.`id_pegawai`
            AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
            AND nd.`kwitansi` = 'Y'
            AND np.`id_anggaran` = ".$id." 
            and np.tahun_anggaran = ".$set->tahun_anggaran." ";
        $ck = $this->db->query($sql)->row_array();

        echo rupiah($ck["jum"]);
     // echo $this->db->last_query();
    }
 
  

    function pdf($id,$l) {
    $set = $this->cm->setting();
    $this->db->select('nama')->from('pegawai')->where("id_pegawai",$id);
    $data = $this->db->get();
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Laporan Penggunaan Anggaran";
    $data['title'] = $data['header'];

    $sql = "  SELECT nd.`id_nppt_detail` AS id, nd.no_sppdx, rc.`id_nppt_detail`, rc.`uang_harian`, rc.`uang_penginapan`, rc.`uang_transportasi`, np.`id_nppt`
                , np.`no_sppd`, np.`tanggal_sppd`, pg.`nama`, (DATEDIFF(np.`tgl_kembali`,np.`tgl_pergi`) + 1) AS lamanya
                FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
                WHERE nd.`id_nppt` = np.`id_nppt`
                AND pg.`id_pegawai` = nd.`id_pegawai`
                AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
                AND nd.`kwitansi` = 'Y'
                and np. tahun_anggaran = ".$set->tahun_anggaran."
                AND pg.`id_pegawai` = ".$id." ";

    $data["record"] = $this->db->query($sql);


    $sql = "  SELECT SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum
            FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
            WHERE nd.`id_nppt` = np.`id_nppt`
            AND pg.`id_pegawai` = nd.`id_pegawai`
            AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
            AND nd.`kwitansi` = 'Y'
            and np. tahun_anggaran = ".$set->tahun_anggaran."
            AND pg.`id_pegawai` = ".$id." ";
    $ck = $this->db->query($sql);
    $data["total"] = $ck->row_array();


    
        
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

function pdf_mata_anggaran($id,$l) {
    $set = $this->cm->setting();
    $this->db->where("tahun", $set->tahun_anggaran);
    $this->db->select('*')->from('anggaran')->where("id_anggaran",$id);
    $data = $this->db->get();
    $data = $data->row_array();

    $data['controller'] = get_class($this);

    $data['header'] = "Laporan Penggunaan Anggaran";
    $data['title'] = $data['header'];

     $sql = " SELECT *, ag.`id_anggaran` AS id FROM anggaran ag LEFT JOIN rincianbiaya rc ON rc.`id_anggaran` = ag.`id_anggaran`
JOIN nppt_detail nd ON nd.`id_nppt_detail` = rc.`id_nppt_detail` JOIN pegawai pg ON pg.`id_pegawai` = nd.`id_pegawai` JOIN nppt np ON np.`id_nppt` = nd.`id_nppt` where ag.id_anggaran = ".$id." and nd.kwitansi='Y' and ag.tahun = ".$set->tahun_anggaran." ";

    $data["record"] = $this->db->query($sql);

      $sql = "  SELECT SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum
            FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
            WHERE nd.`id_nppt` = np.`id_nppt`
            AND pg.`id_pegawai` = nd.`id_pegawai`
            AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
            AND nd.`kwitansi` = 'Y'
            AND np.`id_anggaran` = ".$id." 
            and np.tahun_anggaran = ".$set->tahun_anggaran." ";

    $ck = $this->db->query($sql);
    $data["total"] = $ck->row_array();


    
        
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

 

         $html = $this->load->view("pdf/laporan_mata_anggaran_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}

function pdf_semua($l) {
    $set = $this->cm->setting();
    $data['controller'] = get_class($this);

    $data['header'] = "Laporan Seluruh Penggunaan Anggaran";
    $data['title'] = $data['header'];

    $sql = "  SELECT nd.`id_nppt_detail` AS id, nd.no_sppdx, rc.`id_nppt_detail`, rc.`uang_harian`, rc.`uang_penginapan`, rc.`uang_transportasi`, np.`id_nppt`
                , np.`no_sppd`, np.`tanggal_sppd`, pg.`nama`, (DATEDIFF(np.`tgl_kembali`,np.`tgl_pergi`) + 1) AS lamanya
                FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
                WHERE nd.`id_nppt` = np.`id_nppt`
                AND pg.`id_pegawai` = nd.`id_pegawai`
                and np.tahun_anggaran = '".$set->tahun_anggaran."'
                AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
                AND nd.`kwitansi` = 'Y'
                ";

    $data["record"] = $this->db->query($sql);


    $sql = "  SELECT SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum
            FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
            WHERE nd.`id_nppt` = np.`id_nppt`
            AND pg.`id_pegawai` = nd.`id_pegawai`
            and np.tahun_anggaran = '".$set->tahun_anggaran."'
            AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
            AND nd.`kwitansi` = 'Y'
            ";
    $ck = $this->db->query($sql);
    $data["total"] = $ck->row_array();


    
        
        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 20);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD Onhacker.net');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

         // add a page
        $pdf->AddPage($l);

 

         $html = $this->load->view("pdf/laporan_rin_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}

function pdf_semua_mata_anggaran($l) {
    $set = $this->cm->setting();
    $data['controller'] = get_class($this);

    $data['header'] = "Laporan Seluruh Penggunaan Anggaran";
    $data['title'] = $data['header'];

    // $this->db->select('id_program as id, program, kode as kode_program')->from('program');
    $sql  = " select id_program as id, program, kode as kode_program from program " ;


    $data["pr"] = $this->db->query($sql);
    $ck = $this->db->query($sql)->row_array();

    $this->db->select('*,ag.`id_anggaran` AS id')->from('anggaran ag')
           ->join("rincianbiaya rc", "rc.id_anggaran = ag.id_anggaran", 'left')
           ->where("ag.tahun", $set->tahun_anggaran)
           // ->where("ag.id_program", $ck["id"])
           ->group_by("ag.id_anggaran");

    $data["record"] = $this->db->get();
    // echo $this->db->last_query();


    $sql = "  SELECT SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum
            FROM nppt_detail nd, rincianbiaya rc, nppt np, pegawai pg
            WHERE nd.`id_nppt` = np.`id_nppt`
            AND pg.`id_pegawai` = nd.`id_pegawai`
            and np.tahun_anggaran = '".$set->tahun_anggaran."'
            AND rc.`id_nppt_detail`= nd.`id_nppt_detail`
            AND nd.`kwitansi` = 'Y'
            ";
    $ck = $this->db->query($sql);
    $data["total"] = $ck->row_array();


    
        
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
        $pdf->AddPage("L");

 

         $html = $this->load->view("pdf/semua_mata_anggaran",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header'] .'.pdf', 'I');
}


}
?>
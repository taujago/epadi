<?php 
class operator_area extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("tujuan","dm");
		$this->load->helper("tanggal");
		cek_session_akses('operator_area',$this->session->userdata("operator_level"));

	}

	function index(){
		$data['controller'] = get_class($this);
		$data['title'] = "Dashboard ";	
		$data['active'] = "Dashboard";	
		$content = $this->load->view("operator_area_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}

	function load_sess(){
		// bikin bgini karena server lambat respon session baru
		$x = $this->session->userdata("operator_level");
		// echo json_encode($x);
		echo "Login Sebagai ". ucfirst($x) ;
	}



	function get_data(){    
        $list = $this->dm->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $res) {
            $no++;
            $row = array();
            $row["id_tujuan"] = $res->id_tujuan;
            // $row["jenis_tujuan"] = $res->jenis_tujuan;
            if ($res->tujuan == '0') {
            	 $row["jenis_tujuan"] = " Dalam Daerah";
            } else {
            	$row["jenis_tujuan"] = " Luar Daerah";
            }
            $row["tujuan"] = $res->tujuan;

           
            
            $sql = "SELECT count(id_tujuan) as jum from nppt where id_tujuan = ".$res->id_tujuan." ";
            $ck = $this->db->query($sql)->row_array();
           
             $row["fre"] = $ck["jum"]. " kali";
           

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->dm->count_all(),
                        "recordsFiltered" => $this->dm->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
        // echo $this->db->last_query();
    }

}
?>
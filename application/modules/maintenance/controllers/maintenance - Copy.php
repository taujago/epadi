<?php 
class maintenance extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array("tanggal","file"));
		$this->load->model("core_model","cm");
	}


	function backup(){

		$data['title'] = "BACKUP DATABASE";
		 
	   	$content = $this->load->view("backup_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}


	function export_index(){
		// $data = $this->db	>get("setting_service")->row_array();

		$data['title'] = "EXPORT DATA ";

		 
	   	$content = $this->load->view("export_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}
	function restore(){

		$data['title'] = "RESTORE DATABASE";
		 
	   	$content = $this->load->view("restore_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}
	
	function contact(){

		$data['title'] = "SMS CENTER - PUSAT KONSULTASI PEMERINTAHAN DAERAH";
		 
	   	$content = $this->load->view("contact_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}

	function dobackup(){

	$desa = $this->cm->data_desa();
	//$outfile="sikdes_lutar_".$desa->desa."_backupdb_".date("dmY_his").".sql";
	$outfile="simdeskel_backupdb_".str_replace("_","",$desa->id_desa)."_".str_replace(" ","",$desa->desa).".sql";
	//$outfile = str_replace(" ", "_", $outfile);

	$url = base_url()."backup/backup.php?outfile=$outfile";
	
	$x = file_get_contents($url); 
	 
	// if($x){
	// 	$this->load->helper('download');
	// 	$content = file_get_contents("./backup/tmp/$outfile"); 
	// 	force_download($outfile, $content);
	// 	unlink("./backup/tmp/$outfile");
	// }
	
	// $this->load->helper('download');
	// $name = $outfile;
	//copy("backup/tmp/$outfile",'foto');
	//copy("backup/tmp/simdeskel_backupdb_18082014_042027.sql",'foto');
	//exit;
		$file_path = "backup/tmp/$outfile";
 		$this->load->library('zip');
		$path = 'foto/';
		//echo $path;
		$this->zip->read_dir($path); 
		$this->zip->read_file($file_path); 
		$time = time();
		$backupfile="SIMDESKEL_BACKUP_".str_replace("_","",$desa->id_desa)."_".str_replace(" ","",$desa->desa)."_".date("dmY_his");
		$x = $result = $this->zip->download($backupfile); 
		
		if($x) {
			unlink($outfile);
		}
	 

	}


	function zip(){
		$this->load->library('zip');
		$path = 'foto/';
		//echo $path;
		$this->zip->read_dir($path); 
		$time = time();
		$x = $result = $this->zip->download('backup.'.$time.'.zip'); 
		//$x = $this->zip->archive('./backup/backup.zip');
		if($x) echo "berhasil buat"; else echo "gagal buat";
		//$this->zip->download('my_backup.zip'); 

	}


	function dorestore(){
		ini_set('max_execution_time', 0);
		$ret = array();
		//print_r($_FILES);
		//$tmp_name="tmp_backup_".date("dmyhis").".sql";
		if(empty($_FILES['backup']['tmp_name'])) {
			$ret = array("success"=>false,"pesan"=>"Tidak ada file yang diupload");
		}
		
		else {
			if(is_uploaded_file($_FILES['backup']['tmp_name'])){
				//echo "file terupload " ;
				
				
				$x = copy($_FILES['backup']['tmp_name'], "backup/tmp_restore/".$_FILES['backup']['name']);
				if($x) { 
					//echo "copy sukses";
				$ret = array("success"=>true,"pesan"=>"Data berhasil direstore ");
				//exit;
				}

				// extract semua file dan direxctory
				$zip = new ZipArchive;

				if ($zip->open("backup/tmp_restore/".$_FILES['backup']['name']) === TRUE) {
					$zip->extractTo('backup/tmp_restore/');
					$zip->close();
					//unlink(APPPATH.'/foto');
					$photo_source = realpath('backup/tmp_restore/foto/');
					$photo_path = realpath('foto/');
					//unlink($photo_path);
					// echo $photo_source . " ". $photo_path; exit;

					// proses foto 
					copyr($photo_source,$photo_path);
					// copyr
					// exit;

					// restore database. 
					//copy('backup/tmp_restore/foto','/');

					$tmp_file_name = explode("_", $_FILES['backup']['name']);
					//$xx = "simdeskel_backupdb_82_4_8_2003_AMASING_KALI.sql";
					$tmp_name = "simdeskel_backupdb_".$tmp_file_name[2]."_".$tmp_file_name[3].".sql";
					 
					 // echo "tmp nama " . $tmp_name . "<br />";
					$url = base_url()."backup/restore.php?tmp_file=$tmp_name";
					// echo "url $url"; 
					// exit;
					$y = @file_get_contents($url);
					//$tmp_name = ""

					$desa2 = $this->cm->data_desa(); 
					// show_array($desa2);
					$this->session->set_userdata("operator_id_desa",$desa2->id_desa);
			 		$this->session->set_userdata("id_desa",$desa2->id_desa);

					$ret = array("success"=>true,"pesan"=>"Data berhasil direstore. Silahkan Logout dan login kembali  ");
				}
				else {
					$ret = array("false"=>true,"pesan"=>"Gagal extract file ");
				}

				// extract filenya dan ambil 

				
				// $url = base_url()."backup/restore.php?tmp_file=$tmp_name";
				// $y = @file_get_contents($url);
				
				
				 
				
			}
		
		} 
		echo json_encode($ret);
	}



function export(){
	//$data = $this->input->post(); 
	$res = $this->db->get("penduduk");
	$arr_data = array();
	foreach($res->result_array() as $row) : 
		$arr_penduduk[] = $row;
	endforeach;


	$res = $this->db->get("kk");
	$arr_data = array();
	foreach($res->result_array() as $row) : 
		$arr_kk[] = $row;
	endforeach;

	$res = $this->db->get("kk_anggota");
	$arr_data = array();
	foreach($res->result_array() as $row) : 
		$arr_kk_anggota[] = $row;
	endforeach;

	$result = $arrayName = array('id_desa' => $this->session->userdata("operator_id_desa") , 

			"data_penduduk" => $arr_penduduk, 
			"data_kk" =>$arr_kk, 
			"data_kk_anggota" => $arr_kk_anggota

		);

	$json_data =   json_encode($result); 
	 

	$data = json_encode($result); 

	$url = "http://manggaraitimur.lpkpd.org/index.php/get_export";

	$ch = curl_init();

 	 


	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, array("json_data"=>$json_data));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 
	$result = curl_exec($ch);

 
	curl_close($ch);
	echo  $result;
}

}
?>
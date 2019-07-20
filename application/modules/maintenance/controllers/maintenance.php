<?php 
class maintenance extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array("tanggal","file"));
		$this->load->model("core_model","cm");
		cek_session_akses('maintenance',$this->session->userdata("operator_level"));
	}


	function backup(){
		$data['controller'] = get_class($this);
		$data['title'] = "BACKUP DATABASE";
        $data['active'] = ""; 
	   	$content = $this->load->view("backup_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}



	function restore(){

		$data['controller'] = get_class($this);
		$data['title'] = "RESTORE DATABASE";
        $data['active'] = ""; 
		 
	   	$content = $this->load->view("restore_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}
	
	
	function dobackup(){
        $this->load->dbutil();
        $aturan = array(    
                'format'      => 'zip',            
                'filename'    => 'my_db_backup.sql'
              );
 
        $backup =& $this->dbutil->backup($aturan);
 		$set = $this->cm->setting();
        $nama_database = 'backup-'.$set->instansi.'-'. date("Y_m_d_H_i_s") .'.zip';
        $simpan = 'backup'.$nama_database;
        $this->load->helper('file');
        write_file($simpan, $backup);
        $this->load->helper('download');
        force_download($nama_database, $backup);
        
	    
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
					// //unlink(APPPATH.'/foto');
					// $photo_source = realpath('backup/tmp_restore/assets/gambar/foto/');
					// $photo_path = realpath('assets/gambar/foto/');
					// //unlink($photo_path);
					// // echo $photo_source . " ". $photo_path; exit;

					// // proses foto 
					// copyr($photo_source,$photo_path);
					// // copyr
					// // exit;

					// restore database. 
					//copy('backup/tmp_restore/foto','/');

					$tmp_name = "my_db_backup.sql";
					$isi_file = file_get_contents('backup/tmp_restore/' . $tmp_name); 
					

					$string_query = rtrim( $isi_file, "\n;" );
					$ka = str_replace("&nbsp;",  " ", $string_query);
			          $array_query = explode(";", $ka);   //JALANKAN QUERY MERESTORE KEDATABASE
			              foreach($array_query as $query)
			              {
			                    $this->db->query($query);
			                    // echo $this->db->last_query();
			              }

					
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



}
?>
<?php

function flipdate($tanggal){
    if(empty($tanggal)) {
        return "";
    }

    $x = explode("-", $tanggal);
    $x[0] = isset($x[0])?$x[0]:"0";
    $x[1] = isset($x[1])?$x[1]:"0";
    $x[2] = isset($x[2])?$x[2]:"0";
    return $x[2]."-".$x[1]."-".$x[0];
}

function rupiah($x)
 {
    return "Rp ".number_format($x,0,',','.');
 }

 function uang($x)
 {
    return "".number_format($x,0,',','.');
 }

 function numb($x){
    return number_format($x, 2,",",".");
 }

  function numb_koe($x){
    return number_format($x, 3,",",".");
 }

 function tgl_indo($tgl){
    $tmp = explode("-", $tgl);
    $bln = intval($tmp[1]);

    $arr_bln = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober",
        "November","Desember");

    $ret = $tmp[0]." ".ucfirst($arr_bln[$bln])." ".$tmp[2];
    return $ret;

}

function lama($tgl1,$tgl2){
    $tgl1X = explode("-", $tgl1);
    $tgl2X =  explode("-", $tgl2);
    $date1 =  mktime(0, 0, 0, $tgl1X[1],$tgl1X[2],$tgl1X[0]);
    $date2 =  mktime(0, 0, 0, $tgl2X[1],$tgl2X[2],$tgl2X[0]);
    $interval =($date2 - $date1)/(3600*24)+1;
    return  $interval ;
}

function nama_hari($tanggal){
    
    $tgl=substr($tanggal,8,2);
    $bln=substr($tanggal,5,2);
    $thn=substr($tanggal,0,4);
 
    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
    
    switch($info){
        case '0': return "Minggu"; break;
        case '1': return "Senin"; break;
        case '2': return "Selasa"; break;
        case '3': return "Rabu"; break;
        case '4': return "Kamis"; break;
        case '5': return "Jumat"; break;
        case '6': return "Sabtu"; break;
    };
    
}


    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }

    
function cek_session_akses($link,$id_session){
        $ci = & get_instance();
        $session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id_session' AND modul.link='$link'")->num_rows();
        if ($session == '0' AND $ci->session->userdata('operator_level') != 'operator'){
            // redirect(site_url().'home');
            echo "<script type='text/javascript' language='javascript'>
                        alert('Maaf anda tidak dapat mengakses ini');
                     </script>
            <meta http-equiv='refresh' content='0; url=".site_url()."home'>";
        }
    }

   function cek_session_admin(){
        $ci = & get_instance();
        $session = $ci->session->userdata('operator_level');
        if ($session != 'admin'){
            // redirect(base_url());
            echo "<script type='text/javascript' language='javascript'>
                        alert('Maaf anda tidak dapat mengakses ini');
                     </script>
            <meta http-equiv='refresh' content='0; url=".site_url()."home'>";
        }
    }


?>
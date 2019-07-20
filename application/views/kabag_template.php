<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url()."assets/images/logo.png" ?>" type="image/x-icon">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin//bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/morris.js/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link href="<?php echo base_url() ?>/assets/admin/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

   <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
 
	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/raphael/raphael.min.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/admin/bower_components/morris.js/morris.min.js"></script> -->
	<!-- Sparkline -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/admin/bower_components/sweetalert/dist/sweetalert.min.js"></script>



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <?php 
      	$set = $this->cm->setting()
       ?>
      <span class="logo-lg"><b><?php echo $set->nama_aplikasi ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            	<i class="fa fa-bookmark"></i>
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo $set->instansi ?></span>
            </a>
          
          </li>
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
     <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url("assets/images/logo.png") ?>" class="img" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $set->ins ?> <?php echo $set->kota ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Kabag Online</a>
        </div>
      </div>
    <section class="sidebar">
   
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">APLIKASI</li>
        <?php 
          if ($this->uri->segment(1) == "operator_area") {
            $ck = "active";
          } else {
            $ck = "";
          }
        ?>

        <li class="<?php echo $ck ?>"><a href="<?php echo site_url("operator_area") ?>"><i class="fa fa-dashboard"></i>  <span>Dashboard</span></a></li>
         <?php 
          if ($this->uri->segment(2) == "spt" or $this->uri->segment(2) == "sppd" or $title == "Nota Perjalanan Dinas") {
            $cv = "treeview active";
          } else {
            $cv = "treeview ";
          }
        ?>
        


          <li class="<?php echo $cv ?>">
          <a href="#">
            <i class=" fa fa-file-text"></i>
            <span>Master Surat</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       

          <ul class="treeview-menu active">
            <li><a href="<?php echo site_url("nppt") ?>"><i class="fa fa-circle-o"></i> Nota Perjalanan Dinas</a></li>
            <li><a href="<?php echo site_url("nppt/spt") ?>"><i class="fa fa-circle-o"></i> Surat Perintah Tugas</a></li>
            <li><a href="<?php echo site_url("nppt/sppd") ?>"><i class="fa fa-circle-o"></i> Surat Perjalanan Dinas</a></li>
          </ul>
        </li>
         <?php 
          if ($this->uri->segment(2) == "laporan" or $this->uri->segment(1) == "laporan") {
            $xz = "treeview active";
          } else {
            $xz = "treeview ";
          }
        ?>
        <li class="<?php echo $xz ?>">
          <a href="#">
            <i class=" fa fa-file-pdf-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       

          <ul class="treeview-menu active">
            <li><a href="<?php echo site_url("nppt/laporan") ?>"><i class="fa fa-circle-o"></i>  Perjalanan Dinas</a></li>
            <li><a href="<?php echo site_url("laporan") ?>"><i class="fa fa-circle-o"></i> Penggunaan Anggaran</a></li>
             <li><a href="<?php echo site_url("laporan/mata_anggaran") ?>"><i class="fa fa-circle-o"></i> Anggaran Kegiatan</a></li>
           
          </ul>
        </li>
          <?php 
          if ($this->uri->segment(1) == "kwitansi") {
            $ckd = "active";
          } else {
            $ckd = "";
          }
        ?>
         <li class="<?php echo $ckd ?>"><a href="<?php echo site_url("kwitansi") ?>"><i class="fa fa-file-o"></i> Kwitansi</a></li>
      
        
        
        <?php 
          if ($this->uri->segment(1) == "master_pegawai" or $this->uri->segment(1) == "master_golongan" or $this->uri->segment(1) == "master_tujuan" or $this->uri->segment(1) == "master_biaya" or $this->uri->segment(1) == "program" or $this->uri->segment(1) == "master_gol"  or $this->uri->segment(1) == "master_transportasi" or $this->uri->segment(1) == "master_anggaran") {
            $ck = "treeview active";
          } else {
            $ck = "treeview ";
          }
        ?>

   
          <li class="<?php echo $ck ?>">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo site_url("program") ?>"><i class="fa fa-circle-o"></i> Program</a></li>
             <li><a href="<?php echo site_url("master_anggaran") ?>"><i class="fa fa-circle-o"></i> Data Anggaran</a></li>
            <li><a href="<?php echo site_url("master_pegawai") ?>"><i class="fa fa-circle-o"></i> Data Pegawai</a></li>
            <li><a href="<?php echo site_url("master_golongan") ?>"><i class="fa fa-circle-o"></i> Tingkat Perjalanan</a></li>
            <li><a href="<?php echo site_url("master_gol") ?>"><i class="fa fa-circle-o"></i> Golongan</a></li>
            <li><a href="<?php echo site_url("master_tujuan") ?>"><i class="fa fa-circle-o"></i> Kota Tujuan</a></li>
            <li><a href="<?php echo site_url("master_biaya") ?>"><i class="fa fa-circle-o"></i> Biaya Perjalanan</a></li>
            <li><a href="<?php echo site_url("master_transportasi") ?>"><i class="fa fa-circle-o"></i> Jenis Transportasi</a></li>
          
          </ul>
        </li>
    
       
         <?php 
          if ($this->uri->segment(1) == "users") {
            $ckx = "active";
          } else {
            $ckx = "";
          }
        ?>
      
        <li class="header">Kabag</li>

         <?php 
          if ($this->uri->segment(1) == "operator_setting") {
            $ck = "treeview active";
          } else {
            $ck = "treeview ";
          }
        ?>
      
        <li class="<?php echo $ckx ?>"><a href="<?php echo site_url("users") ?>"><i class="fa fa-lock"></i> <span>Ganti Password</span></a></li>
         <li><a href="<?php echo site_url("op_login/logout") ?>"><i class="fa  fa-power-off text-red"></i> <span>Keluar</span></a></li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url("$controller") ?>"><i class="fa fa-dashboard"></i> <?php echo $title ?></a></li>
        <li class="active"><?php echo $active ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <?php echo $content ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Develop By Onhacker</b> v. 1.0.0
    </div>
    <?php $set = $this->cm->setting() ?>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#"><?php echo $set->instansi ?></a></strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>

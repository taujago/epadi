<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Tiger Engine Administration -  <?php echo $title; ?>	</title>
		
	 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>
	 
	</head>
	
	
	
	<body>
		<div id="wrapper" style="min-height: 1000px;">
		
		<div id="header">
			
			
		</div>
			<!-- menu -->
		 
			<div style="background:#fafafa;padding:5px;width:948px;border:1px solid #ccc">
			<a href="<?php echo base_url(); ?>" class="easyui-linkbutton" plain="true" iconCls="icon-home">Home</a>  
	        <a href="#" class="easyui-menubutton" menu="#masterdata" iconCls="icon-master">Master data</a>
	       <a href="#" class="easyui-menubutton" menu="#menu-product" plain="true" iconCls="icon-products">Produk</a>
	        <a href="#" class="easyui-menubutton" menu="#menumember" iconCls="icon-members">Members</a>
	        <a href="#" class="easyui-menubutton" plain="true" menu="#menu-transaksi" iconCls="icon-jual">Transaksi</a>
	        <a href="#" class="easyui-menubutton" menu="#menu-laporan" iconCls="icon-laporan">Laporan</a>
	        <a href="#" class="easyui-menubutton" menu="#menu-setting" iconCls="icon-settings">Setting</a>
	        <a href="#" class="easyui-linkbutton" menu="#mm2"  plain="true" iconCls="icon-logout">Logout</a>
	       
	    	</div>
	    	
	    	<div id="menu-product" style="width:150px;">
	    		<div iconCls="icon-carabayar" href="<?php echo site_url("carabayar") ?>" >Cara Bayar</div>
	    		<div iconCls="icon-categories" href="<?php echo site_url("kategori") ?>" >Kategori</div>
	        	<div iconCls="icon-produk" href="<?php echo site_url("produk") ?>" >Produk</div> 
	    	</div>
	    	
	    <!--	<div id="menu-laporan" style="width:150px;">
	    		</div>
	    -->
	    	<div id="menumember" style="width:150px;">
	    	 <div iconCls="icon-members" href="<?php echo site_url("member") ?>">Member</div> 	
	        <div iconCls="icon-resellers"  href="<?php echo site_url("marketing") ?>">Marketing</div>
	       
	        <div iconCls="icon-percent" href="<?php echo site_url("komisi") ?>" >komisi</div>
		    </div>
		    
		      <!-- submenu master data -->
	       <div id="masterdata" style="width:100px;">
	       	<div><a  class="x-menu" href="<?php echo site_url("provinsi") ?>" >Provinsi</a></div>
	       	<div><a  class="x-menu" href="<?php echo site_url("kabupaten") ?>" >Kabupaten</a></div>
	       	<div><a  class="x-menu" href="<?php echo site_url("kota") ?>" >Kota </a></div>
	       	
	       </div>
	       <!-- end of submenu master data -->
		    
		    
		   
		    
			<div id="menu-setting" style="width:100px;">
		        <div href="<?php echo site_url("setting/rekening") ?>">Rekening Bank</div>
		        <div href="<?php echo site_url("setting/pesan") ?>">Balasan Email</div>
		        
		    </div>

		    <div id="menu-laporan" style="width: 150px;" >
		   		<div iconCls="icon-report-penjualan" href="<?php echo site_url("report/penjualan") ?>" >Penjualan</div>
				<div iconCls="icon-report-penjualan" href="<?php echo site_url("report/penjualan") ?>" >PEmbayaran Kredit</div>
	        	<div iconCls="icon-report-penjualan" href="<?php echo site_url("report/penjualan") ?>" >Rekapitulasi Royalti</div>
	        	<div iconCls="icon-report-penjualan" href="<?php echo site_url("report/penjualan") ?>" >Pembayaran Fee Marketing</div>
	        	<div iconCls="icon-report-penjualan" href="<?php echo site_url("report/penjualan") ?>" >Mutasi Pembayaran</div>
	    	
		    	
		    </div>

		    <div id="menu-transaksi" style="width: 150px;" >
		   		<div iconCls="icon-jual" href="<?php echo site_url("penjualan") ?>" >Penjualan</div>
				<div iconCls="icon-report-penjualan" href="<?php echo site_url("report/penjualan") ?>" >PEmbayaran Kredit</div>
	        	
	    	
		    	
		    </div>
		    
		    <!-- end of menu -->
		    
		    
		    <div id="middle">
		    <div id="content" style="height: 800px; ">
		    	<?php //echo $content; 
		    	for($i=0; $i<500; $i++) : ?> 
		    	 
		    		ini untu testing saja.. 
		    	 
		    	<?php endfor; ?>
		    </div>
		  
		   </div>
		  <!--  <div id="footer" style="width: 100%">
		    	Copyright to firmansyah. So prohibited to be copied. Please don't do that
		  </div> -->
		      <div style="clear: both;"></div>
		     
		</div> <!-- end of wrapper -->
	</body>
	</html>
	
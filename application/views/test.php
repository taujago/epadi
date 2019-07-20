<html>
	<head>
		
		<link rel="icon"  type="image/png"   href="<?php echo base_url()."assets/images/favicon.png" ?>" />
		
		<title>
			  <link rel="icon"  type="image/png"   href="<?php echo base_url()."assets/images/favicon.png" ?>" />

			Sistem Informasi Desa dan Kelurahan <?php echo $title; ?>
		</title>
	</head>


<style>
 
#header {
	height : 50px;
 }
#menu {
height : 30px;
 }
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>
	 
<body>

<div id="page">
	<div id="header">
		
	</div>
	<?php //if($this->session->userdata("login_admin")) { ?>
	<div id="menu">
		<div style="background:#fafafa;padding:5px;width:948px;border:1px solid #ccc">
			<a href="<?php echo base_url(); ?>" class="easyui-linkbutton" plain="true" iconCls="icon-home">Home</a>  
	        <a href="#" class="easyui-menubutton" menu="#masterdata" iconCls="icon-master">Master data</a>
	       <a href="#" class="easyui-menubutton" menu="#menu-product" plain="true" iconCls="icon-products">Data Kependudukan</a>
	        <a href="<?php echo site_url("operator")  ?>" class="easyui-linkbutton" menu="#menumember" plain="true" iconCls="icon-members">Operator</a>
	         
	        <a href="#" class="easyui-menubutton" menu="#menu-setting" iconCls="icon-settings">Setting</a>
	        <a href="<?php echo site_url("login/logout"); ?>" class="easyui-linkbutton" menu="#mm2"  plain="true" iconCls="icon-logout">Logout</a>
	       
	    	</div>
	    	
	    	<div id="menu-product" style="width:300px;">
	    		<div iconCls="icon-carabayar" href="<?php echo site_url("penduduk") ?>" >Data Penduduk</div>
	    		<div iconCls="icon-categories" href="<?php echo site_url("kk") ?>" >Kartu Keluarga</div>
	        	 
	    	</div>
	    	
	    <!--	<div id="menu-laporan" style="width:150px;">
	    		</div>
	    -->
	    	 
		    
		      <!-- submenu master data -->
	       <div id="masterdata" style="width:300px;">
	       	<div><a  class="x-menu" href="<?php echo site_url("provinsi") ?>" >Provinsi</a></div>
	       	<div><a  class="x-menu" href="<?php echo site_url("kota") ?>" >Kabupaten / Kota</a></div>
	       	<div><a  class="x-menu" href="<?php echo site_url("kecamatan") ?>" >Kecamatan</a></div>
	       	<div><a  class="x-menu" href="<?php echo site_url("desa") ?>" >Desa </a></div>
	       	<div><a  class="x-menu" href="<?php echo site_url("dusun") ?>" >Dusun </a></div>
	       	
	       </div>
	       <!-- end of submenu master data -->
		    
		    
		   
		    
			<div id="menu-setting" style="width:300px;">
				<div href="<?php echo site_url("setting/lokasi") ?>">Lokasi / Kabupaten</div>
		        <div href="<?php echo site_url("setting/gantipassword") ?>">Ganti Password</div>
 		        
		    </div>
 

		   
		   <?php //} ?>
		   <!-- end of menu  --> 
	</div>
	
	<!-- end of menu --> 
	<div id="content">   
	<?php echo $content; ?>
	</div>
	
	<div id="footer">
	  &copy itu dan ini  demi persatuan dan kesatuan negara republik indonesia 
	</div>
	
</div>


</body>
</html>
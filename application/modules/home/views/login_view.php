<html>
<head>
	<title>LOGIN SIKDES</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login-style.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>

 

</head>

<body>

	    <div id="win" class="easyui-window" title="LOGIN SIKDES" style="width:700px;height:250px"  
            data-options=" modal:true, closable:false, collapsible: false, minimizable:false, maximizable:false">  
       
        <div id="logo" >
        		<img src="<?php echo base_url()."assets/images/login_large.png" ?>" />
        </div>

        <div id="loginbox">
        <form action="<?php echo site_url("login/ceklogin") ?>" method="post" >

        	<table id="login">
        			<tr><td><strong>Username</strong>  </td><td>: <input type="text" name="nama_user" /></td></tr>
        			<tr><td><strong>Password</strong> </td><td>: <input type="password" name="pass" /></td></tr>
        			<tr><td>&nbsp;</td><td>&nbsp;&nbsp;<input type="submit" value="Login" /></td></tr>
        	</table>	

        </form>
    	</div>
    </div>  
</body>
</html>

<script type="text/javascript">
function go_login(){
			$('#frm').form('submit',{
				url: '<?php echo site_url("op_login/ceklogin"); ?>',				 
				success: function(result){
					console.log(result);
					result = result.replace(/\s+/g, " ");
					obj = $.parseJSON(result);
					console.log(obj.pesan);
					if (obj.success == false ){
						swal({   
							title: obj.title,   
				            text: obj.pesan,
				            type: obj.type,   
							confirmButtonColor: "#ffbf36",   
				        });
						return false;
					} else {
						location.href='<?php echo site_url("operator_area") ?>'

					}
				}
			});
			return false;
		}


</script>
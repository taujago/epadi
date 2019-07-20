<script type="text/javascript">
	$('#tanggal').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    }); 


</script>
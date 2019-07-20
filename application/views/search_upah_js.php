<script type="text/javascript">

function show_dialog_upah(target) {
  $("#kotak_pencarian_upah").html('');
  $("#target").val(target);
  $('#modal_upah').modal('show');
  $('.modal-title-cari').text('Cari Upah'); // Set Title to Bootstrap modal title

}  


function search_cari_upah(){
  $("#kotak_pencarian_upah").html('Sedang Mencari...');
  v_id_master_upah = $("#search_nama_table_upah").val();
  v_target = $("#target").val();
  console.log(" nama_upah " + v_id_master_upah);
       $.ajax({

        url : '<?php echo site_url("get_data/nama_upah"); ?>',
        type : "post",
        data : {nama_upah  : v_id_master_upah, target : v_target },
        success : function(html) {
          $("#kotak_pencarian_upah").html(html);
        }
       });
}

function pilih_upah(v_id_master_upah, v_id_master_upah, target) {
  console.log(v_id_master_upah + v_id_master_upah + target) ;
  $(target).val(v_id_master_upah);
  $('#modal_upah').modal('hide');
} 

</script>

<!-- end of searching  -->
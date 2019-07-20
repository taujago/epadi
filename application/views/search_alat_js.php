<script type="text/javascript">

function show_dialog_alat(target) {
  $("#kotak_pencarian_alat").html('');
  $("#target").val(target);
  $('#modal_alat').modal('show');
  $('.modal-title-cari').text('Cari Alat'); // Set Title to Bootstrap modal title

}  


function search_cari_alat(){
  $("#kotak_pencarian_alat").html('Sedang Mencari...');
  v_id_master_alat = $("#search_nama_table_alat").val();
  v_target = $("#target").val();
  console.log(" nama_alat " + v_id_master_alat);
       $.ajax({

        url : '<?php echo site_url("get_data/nama_alat"); ?>',
        type : "post",
        data : {nama_alat  : v_id_master_alat, target : v_target },
        success : function(html) {
          $("#kotak_pencarian_alat").html(html);
        }
       });
}

function pilih_alat(v_id_master_alat, v_id_master_alat, target) {
  console.log(v_id_master_alat + v_id_master_alat + target) ;
  $(target).val(v_id_master_alat);
  $('#modal_alat').modal('hide');
} 

</script>

<!-- end of searching  -->
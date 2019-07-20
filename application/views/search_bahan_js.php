<script type="text/javascript">

function show_dialog(target) {
  $("#kotak_pencarian").html('');
  $("#target").val(target);
  $('#modal_bahan').modal('show');
  $('.modal-title-cari').text('Cari Bahan'); // Set Title to Bootstrap modal title

}  


function search_cari(){
  $("#kotak_pencarian").html('Sedang Mencari...');
  v_id_master_bahan = $("#search_nama_table").val();
  v_target = $("#target").val();
  console.log(" nama_bahan " + v_id_master_bahan);
       $.ajax({

        url : '<?php echo site_url("get_data/nama_bahan"); ?>',
        type : "post",
        data : {nama_bahan  : v_id_master_bahan, target : v_target },
        success : function(html) {
          $("#kotak_pencarian").html(html);
        }
       });
}

function pilih(v_id_master_bahan, v_id_master_bahan, target) {
  console.log(v_id_master_bahan + v_id_master_bahan + target) ;
  $(target).val(v_id_master_bahan);
  $('#modal_bahan').modal('hide');
} 

</script>

<!-- end of searching  -->
<script>
var table;
  $(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };

     table = $('#datable_1').DataTable({
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        // lengthChange: false,
        // dom: 'B<"clear">lfrtip',
        // buttons: ['copy', 'excel', 'pdf', 'colvis'],
        initComplete: function() {
              var api = this.api();
              $('#datatable-buttons_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
                  });
              },
              oLanguage: {
              sProcessing: "Memuat Data...",
              sSearch: "<i class='ti-search'></i> Cari Data :",
              sZeroRecords:    "Maaf Data Tidak Ditemukan",
              sLengthMenu:     "Tampil _MENU_ Data",
              sEmptyTable:     "Data Tidak Ada",
              sInfo:           "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",
              sInfoEmpty:      "Tidak ada data ditampilkan",
              sInfoFiltered:   "(Filter dari _MAX_ total Data)",
              },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo site_url("$controller/get_data_spt")?>", "type": "POST"},
                  columns: [
                            {
                              "data": "cek",
                               "orderable": false
                            },
                            {
                              "data": "id_nppt",
                               "orderable": false
                            },
                            {"data": "no_spt"},
                            {"data": "nama"},
                            {"data": "golongan"},

                            {"data": "maksud"},
                            {"data": "dasar_hukum"},
                           
                            {
                              "data": "status",
                               "orderable": false
                            },
                            
                  ],
               "order": [],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              var index = page * length + (iDisplayIndex + 1);
              $('td:eq(1)', row).html(index); // masukkan index untuk menampilkan no urut
          }

    });
  });

$("#check-all").click(function () {
    $(".data-check").prop('checked', $(this).prop('checked'));
});

function hapus() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    { 
    	swal({   
            title: ''+list_id.length+' Data Akan dihapus',
          	text: 'Yakin Menghapus '+list_id.length+' data?, Anda tidak akan dapat mengembalikan ini!',  
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e6b034",   
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: 'Tidak, Batal!',   
            closeOnConfirm: false 
        }, function(){
          $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "<?php echo site_url("nppt/hapus")?>",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status){
                    	swal("Terhapus!", +list_id.length+ " Data Berhasil Dihapus.", "success"); 
                        reload_table();
                    }else{
                        alert('Failed.');
                    }
                     
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        });

    }
    else
    {
       swal({   
			title: "Peringatan",   
            type: "warning", 
			text: "Pilih salah satu data",
			confirmButtonColor: "#22af47",   
        });
    }
}

function ver() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    { 
      swal({   
            title: ''+list_id.length+' Data Akan diverifikasi',
            text: 'Yakin Menverifikasi '+list_id.length+' data?',  
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e6b034",   
            confirmButtonText: "Ya, Verifikasi!",
            cancelButtonText: 'Tidak, Batal!',   
            closeOnConfirm: false 
        }, function(){
          $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "<?php echo site_url("nppt/ver")?>",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status){
                      swal("Terhapus!", +list_id.length+ " Data Berhasil Diverifikasi.", "success"); 
                        reload_table();
                    }else{
                        alert('Failed.');
                    }
                     
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        });

    }
    else
    {
       swal({   
      title: "Peringatan",   
            type: "warning", 
      text: "Pilih  data",
      confirmButtonColor: "#22af47",   
        });
    }
}

function load_edit(id){
  $.ajax({
    url :'<?php echo site_url("nppt/load_edit") ?>/'+id,
    success : function(result) {
      $("#load_pegawai").html('').append(result);
    }
  });
}

function hapus_pegawai(id_nppt_detail){

      swal({   
            title: 'Data Akan dihapus',
            text: 'Yakin Menghapus data?',  
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e6b034",   
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: 'Tidak, Batal!',   
            closeOnConfirm: false 
        }, function(){
          $.ajax({
            url : '<?php echo site_url("nppt/hapus_pegawai") ?>/'+id_nppt_detail,
            data : {'id_nppt_detail':id_nppt_detail},
            type : "POST",
            success : function(result) {
               swal({   
                    title: "Terhapus!",   
                    type: "success", 
                    text: "Data Berhasil Dihapus",
                    confirmButtonColor: "#22af47",   
                    });
              reload_table();
              $('#modal_form').modal('hide'); 
            }
           });
        });

}

function cetak_sek()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1)
    { 
      var l = "L";
      var p = "P";
      window.open('<?php echo site_url("$controller/pdf_sek/") ?>/'+list_id+'/'+p);   

    }
    else if (list_id.length >= 2) {
        swal('Tidak dapat Mencetak '+list_id.length+' data sekaligus, Pilih satu data saja').catch(swal.noop);
    }
    else
    {
        swal('Silahkan Pilih Salah Satu Data').catch(swal.noop);
    }
}

function cetak_bupati()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1)
    { 
      var l = "L";
      var p = "P";
       var w = "bupati"
      window.open('<?php echo site_url("$controller/pdf_bupati/") ?>/'+list_id+'/'+p+'/'+w);   

    }
    else if (list_id.length >= 2) {
        swal('Tidak dapat Mencetak '+list_id.length+' data sekaligus, Pilih satu data saja').catch(swal.noop);
    }
    else
    {
        swal('Silahkan Pilih Salah Satu Data').catch(swal.noop);
    }
}

function cetak_wakil()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1)
    { 
      var l = "L";
      var p = "P";
      var w = "wakil"
      window.open('<?php echo site_url("$controller/pdf_bupati/") ?>/'+list_id+'/'+p+'/'+w);   

    }
    else if (list_id.length >= 2) {
        swal('Tidak dapat Mencetak '+list_id.length+' data sekaligus, Pilih satu data saja').catch(swal.noop);
    }
    else
    {
        swal('Silahkan Pilih Salah Satu Data').catch(swal.noop);
    }
}





function cetak_asisten(n)
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1)
    { 
      var l = "L";
      var p = "P";
      var w = "bupati";
      window.open('<?php echo site_url("$controller/pdf_spt_asisten/") ?>/'+list_id+'/'+n);   

    }
    else if (list_id.length >= 2) {
        swal('Tidak dapat Mencetak '+list_id.length+' data sekaligus, Pilih satu data saja').catch(swal.noop);
    }
    else
    {
        swal('Silahkan Pilih Salah Satu Data').catch(swal.noop);
    }
}




function edit() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1) { 
    save_method = 'update';
    $.ajax({
        url : "<?php echo site_url('nppt/edit')?>/" + list_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_nppt"]').val(data.id_nppt);
            $('[name="no_spt"]').val(data.no_spt);
            $('[name="dasar_hukum"]').val(data.dasar_hukum);
         
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit Data'); 
           

		},
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

    }
    else if (list_id.length >= 2) {
    	swal({   
			title: "Peringatan",   
            type: "warning", 
			text: "Tidak dapat mengedit " +list_id.length+ " data sekaligus, Pilih satu data saja",
			confirmButtonColor: "#22af47",   
        });
    } else {
    	swal({   
			title: "Peringatan",   
            type: "warning", 
			text: "Pilih salah satu data",
			confirmButtonColor: "#22af47",   
        });
    }
}


function buat_sppd() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1) { 
    save_method = 'update';
    $.ajax({
        url : "<?php echo site_url('nppt/edit')?>/" + list_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_nppt"]').val(data.id_nppt);
            $('[name="pejabat_perintah"]').val(data.pejabat_perintah);
            $('[name="mata_anggaran"]').val(data.kode);
             $('[name="ket_lain"]').val(data.ket_lain);
         
            $('#modal_sppd').modal('show'); 
            $('.modal-title').text('Buat SPPD untuk SPT '+data.no_spt); 

           

    },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

    }
    else if (list_id.length >= 2) {
      swal({   
      title: "Peringatan",   
            type: "warning", 
      text: "Tidak dapat mengedit " +list_id.length+ " data sekaligus, Pilih satu data saja",
      confirmButtonColor: "#22af47",   
        });
    } else {
      swal({   
      title: "Peringatan",   
            type: "warning", 
      text: "Pilih salah satu data",
      confirmButtonColor: "#22af47",   
        });
    }
}

function detail() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1) { 
    $('#detailx').html (""); 
    $.ajax({
        url : "<?php echo site_url('nppt/detail')?>/" + list_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          if (data.gambar=="") {
            foto = '<?php echo base_url() ?>assets/images/no.png';
          }else{
            foto = '<?php echo base_url() ?>assets/pegawai'+'/'+data.gambar+''; 
          };
          detailx = '<tr><td colspan = "3" align="center"><img width= "160px" height="200px" src="'+foto+'"></td></tr>'+
                    '<tr><td>NIP</td><td>:</td><td>'+data.nip+'</td></tr>'+
                    '<tr><td>Nama</td><td>:</td><td>'+data.nama+'</td></tr>'+
                    '<tr><td>Pangkat</td><td>:</td><td>'+data.pangkat+'</td></tr>'+
                    '<tr><td>Golongan</td><td>:</td><td>'+data.golongan+'</td></tr>'+
                    '<tr><td>Jabatan</td><td>:</td><td>'+data.jabatan+'</td></tr>'+
                    '<tr><td>Unit Kerja</td><td>:</td><td>'+data.unitkerja+'</td></tr>'
           
            $('#detail').modal('show'); 
            $('.modal-title').text('Detail Data Pegawai'); 
            $('#detailx').append(detailx);
    },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

    }
    else if (list_id.length >= 2) {
      swal({   
      title: "Peringatan",   
            type: "warning", 
      text: "Tidak dapat Menampilkan " +list_id.length+ " data sekaligus, Pilih satu data saja",
      confirmButtonColor: "#22af47",   
        });
    } else {
      swal({   
      title: "Peringatan",   
            type: "warning", 
      text: "Pilih salah satu data",
      confirmButtonColor: "#22af47",   
        });
    }
}



function reset(){ 
   	$('#form_kontributor')[0].reset(); 
}

function reload_table()
{
    table.ajax.reload(null,false); 
}

function add(){ 
    save_method = 'add';
    $('#form')[0].reset(); 
    $("#multi").val('').trigger('change');
    $('.form-group').removeClass('has-error');
    // $('.help-block').empty(); 
    $('#load_kota').empty(); 
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Tambah Data'); 
    $.ajax({
      url: '<?php echo  site_url("general/generate_nomor/x") ?>',
      success  : function(nomor) {
        $("#no_npt").val(nomor);
      }
    });

}

function simpan(){
   	var url;
   
        url = "<?php echo site_url('nppt/update_spt')?>";
   

    $('#form').form('submit',{
        url: url,
        onSubmit: function(){
          return $(this).form('validate');
        },
        dataType:'json',
        success: function(result){
           console.log(result);
            obj = $.parseJSON(result);
          // return false;
          	if (obj.success == false ){
	           swal(
	                {
	                    title: "Gagal",
	                    text: obj.pesan,
	                    type: "error",
	                    showCancelButton: false,
	                    allowOutsideClick: false,
	                    confirmButtonClass: "btn btn-success",
	                    cancelButtonClass: "btn btn-danger m-l-10",
	                    confirmButtonColor: "#22af47",  
	                }
	            )

          	} else {
                swal({   
			         title: "Berhasil",   
			         text: obj.pesan,   
			         type: "success",   
			         showCancelButton: obj.cancel,
                	showConfirmButton: obj.confirm,  
			         confirmButtonColor: "#f83f37",   
			        	confirmButtonText: obj.conf,
			         cancelButtonText: obj.canceltext,
			         closeOnConfirm: false,   
			         allowOutsideClick: false,
			         closeOnCancel: false 
			    }, function(isConfirm){   
			         if (isConfirm) {      
			 			swal.close();
			             add();
			         } else {    
			         	swal.close();
			            $("#modal_form").modal("hide");   
			         } 
			     });
            reload_table();
          }
        }
      });
    }
 

 function simpan_sppd(){
    var url;
   
        url = "<?php echo site_url('nppt/update_sppd')?>";
   

    $('#form_sppd').form('submit',{
        url: url,
        onSubmit: function(){
          return $(this).form('validate');
        },
        dataType:'json',
        success: function(result){
           console.log(result);
            obj = $.parseJSON(result);
          // return false;
            if (obj.success == false ){
             swal(
                  {
                      title: "Gagal",
                      text: obj.pesan,
                      type: "error",
                      showCancelButton: false,
                      allowOutsideClick: false,
                      confirmButtonClass: "btn btn-success",
                      cancelButtonClass: "btn btn-danger m-l-10",
                      confirmButtonColor: "#22af47",  
                  }
              )

            } else {
                swal({   
               title: "Berhasil",   
               text: obj.pesan,   
               type: "success",   
               showCancelButton: obj.cancel,
                  showConfirmButton: obj.confirm,  
               confirmButtonColor: "#f83f37",   
                confirmButtonText: obj.conf,
               cancelButtonText: obj.canceltext,
               closeOnConfirm: false,   
               allowOutsideClick: false,
               closeOnCancel: false 
          }, function(isConfirm){   
               if (isConfirm) {      
            swal.close();
                   add();
               } else {    
                swal.close();
                  $("#modal_sppd").modal("hide");   
                  window.location.href = "<?php echo site_url("nppt/sppd") ?>";
               } 
           });
            reload_table();
          }
        }
      });
    }

</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    })

    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',

    })


    
  })

</script>
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
              ajax: {"url": "<?php echo site_url("$controller/get_data")?>", "type": "POST"},
                  columns: [
                            {
                              "data": "cek",
                               "orderable": false
                            },
                            {
                              "data": "id_nppt",
                               "orderable": false
                            },
                            {"data": "no_npt"},
                            {"data": "nama"},
                            {"data": "tujuan"},

                            {"data": "maksud"},
                            {"data": "tgl"},
                            {"data": "status"}
                            
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

function verx() {
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
                      swal("Verifikasi!", +list_id.length+ " Data Berhasil Diverifikasi.", "success"); 
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


function ver() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1) { 
    save_method = 'update';
    $.ajax({
        url : "<?php echo site_url('nppt/edit_ver')?>/" + list_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_nppt"]').val(data.id_nppt);
            $('[name="id_anggaran"]').val(data.id_anggaran);
            $("#tujuan").text(data.tujuan);
           
            $('#modal_ver').modal('show'); 
            $('.modal-title').text('Verifikasi'); 
            $("#multi").val('').trigger('change');
            // load_ver(data.id_nppt);
            if(data.status=="Y"){
                $("#no_spt").val(data.no_spt);
            } else {
              $.ajax({
                url: '<?php echo  site_url("general/generate_nomor_spt/x") ?>',
                success  : function(nomor) {
                  $("#no_spt").val(nomor);
                }
              });
            }
            load_info(data.id_nppt);

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

function load_ver(id){
  $.ajax({
    url :'<?php echo site_url("nppt/load_ver") ?>/'+id,
    success : function(result) {
      $("#load_ver").html('').append(result);
    }
  });
}

function load_info(id){
  $.ajax({
    url :'<?php echo site_url("nppt/load_b") ?>/'+id,
    success : function(result) {
      $("#load_info").html('').append(result);
    }
  });
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

function cetak()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1)
    { 
      var l = "L";
      var p = "P";
      window.open('<?php echo site_url("$controller/pdf/") ?>/'+list_id+'/'+p);   

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
            $('[name="no_npt"]').val(data.no_npt);
            $('[name="maksud"]').val(data.maksud);
            $('[name="id_transportasi"]').val(data.id_transportasi);
            $('[name="id_anggaran"]').val(data.id_anggaran);
            $('[name="tgl_pergi"]').val(data.tgl_pergi);
            $('[name="tgl_kembali"]').val(data.tgl_kembali);
            $('[name="id_tujuan"]').val(data.id_tujuan);
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit Data'); 
            $("#multi").val('').trigger('change');
            load_edit(data.id_nppt);

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
   	$('#form')[0].reset(); 
    $('[name="id_nppt"]').val("");
}

function reload_table()
{
    table.ajax.reload(null,false); 
}

function add(){ 
    save_method = 'add';
    $('#form')[0].reset(); 
    reset();
    $("#multi").val('').trigger('change');
    $('.form-group').removeClass('has-error');
    // $('.help-block').empty(); 
    $('#load_pegawai').empty(); 
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
    if(save_method == 'add') {
        url = "<?php echo site_url('nppt/add')?>";
    } else {
        url = "<?php echo site_url('nppt/update')?>";
    }

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

function verifikasi(){
    var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('nppt/add')?>";
    } else {
        url = "<?php echo site_url('nppt/ver')?>";
    }

    $('#form_ver').form('submit',{
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
                  $("#modal_ver").modal("hide");   
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
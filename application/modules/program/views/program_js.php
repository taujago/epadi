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
                              "data": "id_program",
                               "orderable": false
                            },
                            {"data": "kode"},
                            {"data": "program"},
                            {"data": "aktif"}
                            
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
                url: "<?php echo site_url("program/hapus")?>",
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



function edit() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1) { 
    save_method = 'update';
    $.ajax({
        url : "<?php echo site_url('program/edit')?>/" + list_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_program"]').val(data.id_program);
            $('[name="program"]').val(data.program);
            $('[name="kode"]').val(data.kode);
            $('[name="aktif"]').val(data.aktif);
         

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
     $('[name="id_program"]').val("");
    $('.form-group').removeClass('has-error');
    $('.help-block').empty(); 
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Tambah Data'); 
}

function simpan(){
   	var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('program/add')?>";
    } else {
        url = "<?php echo site_url('program/update')?>";
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
    
</script>


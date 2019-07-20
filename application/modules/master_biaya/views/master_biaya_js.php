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
                              "data": "id_biaya",
                               "orderable": false
                            },
                            {"data": "tujuan"},
                            {"data": "golongan"},
                            {"data": "lumpsum"},
                            {"data": "penginapan"},
                            {"data": "transportasi"}
                            
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
                url: "<?php echo site_url("master_biaya/hapus")?>",
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

function load_edit(id){
  $.ajax({
    url :'<?php echo site_url("master_biaya/load_edit") ?>/'+id,
    success : function(result) {
      $("#load_kota").html('').append(result);
    }
  });
}

function hapus_kota(id_biaya_detail){

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
            url : '<?php echo site_url("master_biaya/hapus_kota") ?>/'+id_biaya_detail,
            data : {'id_biaya_detail':id_biaya_detail},
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

function edit() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1) { 
    save_method = 'update';
    $.ajax({
        url : "<?php echo site_url('master_biaya/edit')?>/" + list_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_biaya"]').val(data.id_biaya);
            $('[name="lumpsum"]').val(data.lumpsum);
            $('[name="penginapan"]').val(data.penginapan);
            $('[name="transportasi"]').val(data.transportasi);
            $('[name="id_golongan"]').val(data.id_golongan);
            $('[name="id_tujuan"]').val(data.id_tujuan);
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Edit Data'); 
            $("#multi").val('').trigger('change');

            load_edit(data.id_biaya);

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
        url : "<?php echo site_url('master_biaya/detail')?>/" + list_id,
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
    $('[name="id_biaya"]').val("");
    $("#multi").val('').trigger('change');
    $('.form-group').removeClass('has-error');
    $('.help-block').empty(); 
    $('#load_kota').empty(); 
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Tambah Data'); 
}

function simpan(){
   	var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('master_biaya/add')?>";
    } else {
        url = "<?php echo site_url('master_biaya/update')?>";
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

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    
  })

  function tandaPemisahTitik(b){
var _minus = false;
if (b<0) _minus = true;
b = b.toString();
b=b.replace(".","");
b=b.replace("-","");
c = "";
panjang = b.length;
j = 0;
for (i = panjang; i > 0; i--){
j = j + 1;
if (((j % 3) == 1) && (j != 1)){
c = b.substr(i-1,1) + "." + c;
} else {
c = b.substr(i-1,1) + c;
}
}
if (_minus) c = "-" + c ;
return c;
}

function numbersonly(ini, e){
if (e.keyCode>=49){
if(e.keyCode<=57){
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
ini.value = tandaPemisahTitik(b);
return false;
}
else if(e.keyCode<=105){
if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
return false; }
}else if (e.keyCode==48){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==95){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==8 || e.keycode==46){
a = ini.value.replace(".","");
b = a.replace(/[^\d]/g,"");
b = b.substr(0,b.length -1);
if (tandaPemisahTitik(b)!=""){
ini.value = tandaPemisahTitik(b);
} else {
ini.value = "";
}

return false;
} else if (e.keyCode==9){
return true;
} else if (e.keyCode==17){
return true;
} else {
//alert (e.keyCode);
return false;
}

}
</script>
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
                              "data": "id_pegawai",
                               "orderable": false
                            },
                           
                            {"data": "nama"},
                            {"data": "pangkat"},
                            {"data": "jabatan"},
                            {"data": "golongan"}
                            
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

function load_jum(id){
  $.ajax({
    url :'<?php echo site_url("laporan/load_jum") ?>/'+id,
    success : function(result) {
      $("#load_jum").html('').append(result);
    }
  });
}

function lihat() {
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    
    if(list_id.length == 1) { 
    save_method = 'update';
    $.ajax({
      'url':'<?php echo site_url() ?>laporan/lihat/'+list_id,
      'dataType': 'json',
      'type': 'get',
      'data':{},
      success: function(respose){
          $("#detail").empty();
          $.each(respose, function(i, item) {
              $('.modal-title').text("Penggunaan Anggaran "+item.nama); 
              $('#modal_form').modal('show');
               trHTML = 
               
                   ' <tr>'+
                    '<td>'+item.no+'</td>'+
                    '<td>'+item.tgl+'</td>'+
                    '<td>'+item.no_sppd+'/'+item.no_sppdx+'</td>'+
                    '<td>'+item.duit+'</td>'+

                   '</tr>'
                   
               
                                  ;     
              $("#detail").append(trHTML);
              
          });
          load_jum(list_id);
      },
      
      error: function(){
          
      }
  });

    }
    else if (list_id.length >= 2) {
    	swal({   
			title: "Peringatan",   
            type: "warning", 
			text: "Tidak dapat menampilkan " +list_id.length+ " data sekaligus, Pilih satu data saja",
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

function semua()
{
   
      var l = "L";
      var p = "P";
      window.open('<?php echo site_url("$controller/pdf_semua/") ?>/'+l);   

}


</script>


 <?php 
	$set = $this->cm->setting();
		if($this->session->userdata("operator_login") == true ) { 
?>
<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pt-0">
									<div class="row">
										<div class="col-md-12">
											<div class="item-big">
												<!-- START carousel-->
												<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
													
													<div role="listbox" class="carousel-inner">
													 
													<h3>Selamat Datang di  <?php echo $set->nama_aplikasi ?> <?php echo $set->instansi."<br> Tahun Anggaran ".$set->tahun_anggaran ?></h3>
													<!-- <h3 id="user">Load Session......</h3> -->

													</div>
												</div>
												<!-- END carousel-->
											</div>
										</div>
											
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pt-0">
									<div class="row">
										<div class="col-md-6">
											<div class="item-big">
												<!-- START carousel-->
												<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
													<div class="box box-primary">
            											<div class="box-header with-border">
													<h3 class="box-title">Sisa Anggaran</h3>
													</div>

													<div class="table-wrap">
														<div class="table-responsive">
															<table id="datable_1" class="table table-bordered table-striped" width="100%">
									                            <thead>
									                              <tr>
									                              
									                                <th width="5%" ><strong>No.</strong>	</th>
									                               
									                                <th width="20%"><strong>Kode</strong></th>
								                                   <th ><strong>Kegiatan</strong></th>
									                                <th ><strong>Anggaran</strong></th>
								                                 
								                                  <th ><strong>Sisa </strong></th>
									                              </tr>
									                            </thead>
									                            
									                          </table>
														
														</div>
													</div>
												
											</div>

												</div>
												<!-- END carousel-->
											</div>
										</div>

										<div class="col-md-6">
											<div class="item-big">
												<!-- START carousel-->
												<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
													<div class="box box-primary">
            											<div class="box-header with-border">
													<h3 class="box-title">Pemakaian SPPD</h3>
													</div>

													<div class="table-wrap">
														<div class="table-responsive">
															<table id="datable_2" class="table table-bordered table-striped" width="100%">
									                            <thead>
									                              <tr>
									                              
									                                <th width="5%" ><strong>No.</strong>	</th>
									                               
									                                <th width="20%"><strong>Kode</strong></th>
								                                   <th ><strong>Kegiatan</strong></th>
									                                <th ><strong>Anggaran</strong></th>
								                                 
								                                  <th ><strong>Terpakai </strong></th>
									                              </tr>
									                            </thead>
									                            
									                          </table>
														
														</div>
													</div>
												
											</div>

												</div>
												<!-- END carousel-->
											</div>
										</div>

										<div class="col-md-6">
											<div class="item-big">
												<!-- START carousel-->
												<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
													<div class="box box-primary">
            											<div class="box-header with-border">
													<h3 class="box-title">Pegawai yang memakai SPPD</h3>
													</div>

													<div class="table-wrap">
														<div class="table-responsive">
															<table id="datable_3" class="table table-bordered table-striped" width="100%">
									                            <thead>
									                              <tr>
									                              
									                                <th width="5%" ><strong>No.</strong>	</th>
									                               
									                                <th width="20%"><strong>Nama</strong></th>
								                                   <th ><strong>Pangkat</strong></th>
									                                <th ><strong>Jabatan</strong></th>
								                                 
								                                  <th ><strong>Golongan </strong></th>
									                              </tr>
									                            </thead>
									                            
									                          </table>
														
														</div>
													</div>
												
											</div>

												</div>
												<!-- END carousel-->
											</div>
										</div>

                      <div class="col-md-6">
                      <div class="item-big">
                        <!-- START carousel-->
                        <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
                          <div class="box box-primary">
                                  <div class="box-header with-border">
                          <h3 class="box-title">Lokasi Tujuan Pemakaian SPPD</h3>
                          </div>

                          <div class="table-wrap">
                            <div class="table-responsive">
                              <table id="datable_4" class="table table-bordered table-striped" width="100%">
                                              <thead>
                                                <tr>
                                                
                                                  <th width="5%" ><strong>No.</strong>  </th>
                                                 
                                                  <th width="20%"><strong>Tujuan</strong></th>
                                                   <th ><strong>Jenis Tujuan</strong></th>
                                                  <th ><strong>Frekuensi</strong></th>
                                                 
                                                  
                                                </tr>
                                              </thead>
                                              
                                            </table>
                            
                            </div>
                          </div>
                        
                      </div>

                        </div>
                        <!-- END carousel-->
                      </div>
                    </div>
                      
											
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Row -->
			
<?php } ?>

<script type="text/javascript">
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
              ajax: {"url": "<?php echo site_url("laporan/get_data_anggaran")?>", "type": "POST"},
                  columns: [
                           

                             {
                              "data": "id",
                               "orderable": false
                            },
                           
                            {"data": "kode"},
                            {"data": "nama_anggaran"},
                            {"data": "pagu"},
                            {"data": "sisa",
                           "orderable": false}
                            
                  ],
               "order": [],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              var index = page * length + (iDisplayIndex + 1);
              $('td:eq(0)', row).html(index); // masukkan index untuk menampilkan no urut
          }

    });
  });
// Kenapa Harus Panjang Lebar begini?? hahha
// bikin bgini karena server lambat respon session baru

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

     table = $('#datable_2').DataTable({
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
              ajax: {"url": "<?php echo site_url("laporan/get_data_anggaran")?>", "type": "POST"},
                  columns: [
                           

                             {
                              "data": "id",
                               "orderable": false
                            },
                           
                            {"data": "kode"},
                            {"data": "nama_anggaran"},
                            {"data": "pagu"},
                            {"data": "terpakai",
                           "orderable": false}
                            
                  ],
               "order": [],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              var index = page * length + (iDisplayIndex + 1);
              $('td:eq(0)', row).html(index); // masukkan index untuk menampilkan no urut
          }

    });
  });


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

     table = $('#datable_3').DataTable({
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
              ajax: {"url": "<?php echo site_url("laporan/get_data")?>", "type": "POST"},
                  columns: [
                           
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
              $('td:eq(0)', row).html(index); // masukkan index untuk menampilkan no urut
          }

    });
  });


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

     table = $('#datable_4').DataTable({
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
              ajax: {"url": "<?php echo site_url("operator_area/get_data")?>", "type": "POST"},
                  columns: [
                           
                             {
                              "data": "id_tujuan",
                               "orderable": false
                            },
                            {"data": "tujuan"},
                            {"data": "jenis_tujuan"},
                            {
                              "data": "fre",
                               "orderable": false
                            }
                            
                            
                  ],
               "order": [],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              var index = page * length + (iDisplayIndex + 1);
              $('td:eq(0)', row).html(index); // masukkan index untuk menampilkan no urut
          }

    });
  });


$( document ).ready(function() {
    // load_ses();
});

function load_ses(){
	  $.ajax({
	    url :'<?php echo site_url("$controller/load_sess") ?>',
	    success : function(result) {
	      $("#user").html('').append(result);
	    }
	  });
}
</script>
	 
 
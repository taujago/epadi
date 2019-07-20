<div class="modal fade bs-example-modal-lg" id="modal_upah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-cari mt-0" id="myLargeModalLabel">Large modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
             
                  <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="hidden" name="target" id="target" />
                        <input class="form-control" type="text" name="search_nama_table_upah"  id="search_nama_table_upah" >

                       
                      </div>
                </div>
               
                <div class="modal-footer">
                   <a href="javascript:search_cari_upah();" class="btn btn-primary" > Cari </a>  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div> 
                <a href="<?php echo site_url()."master_upah" ?>" target ="_BLANK" class="btn btn-info btn-xs" > Tambah Upah </a> 
                   <span class="help-block mt-10 mb-0"><small>Jika pencarian Upah tidak ditemukan, Silahkan klik Tambah Upah.</small></span>
                  <div id="kotak_pencarian_upah">

            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->       


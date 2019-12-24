<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon">
                <i class="flaticon-interface-5"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Form Monitoring Data Klaim
              </h3>
            </div>
          </div>
          <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <!-- <li class="m-portlet__nav-item">
              <a href="#" m-portlet-tool="remove" class="m-portlet__nav-link m-portlet__nav-link--icon">
                <i class="la la-power-off"></i>
              </a>
            </li> -->
            <li class="m-portlet__nav-item">
              
              <!-- <a href="/printnm" m-portlet-tool="Add" title="Print NM" class="m-portlet__nav-link m-portlet__nav-link--icon"> -->
                <!-- </a> -->
              </li>
              
              <li class="m-portlet__nav-item">
              <a href=""  m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon">
                <i class="la la-circle"></i>
              </a>
            </li>
            <li class="m-portlet__nav-item">
              <a href="#"  m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon">
                <i class="la la-expand"></i>
              </a>
            </li>
            <!-- <li class="m-portlet__nav-item">
              <a href=""  m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon">
                <i class="la la-angle-down"></i>
              </a>
            </li> -->
          </ul>
          </div>
        </div>
        <!--begin::Form-->
        <!-- @ -->
        <!-- <form class="m-form m-form--fit m-form--label-align-right" id="FormPenutupanSatuan" method="post" enctype="multipart/form-data" action> -->
        <div class="m-portlet__body">
          <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormKlaimUpload" method="post" enctype="multipart/form-data" action>
              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label class="">
                      Tanggal Periode Klaim
                    </label>
                    <div class="input-daterange datepicker-demo">
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalPeriodeAwal" name="tanggal_periode_awal" autocomplete="off" required/>
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="la la-ellipsis-h"></i>
                            </span>
                          </div>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalPeriodeAkhir" name="tanggal_periode_akhir" autocomplete="off" required/>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="la la-calendar-check-o"></i>
                        </span>
                      </div>
                    </div>
                </div>
              </div>
                <div class="col-lg-6">
                    <label class="">
                      Nama Asuransi
                    </label>
                    <select  class="form-control m-input m-input--air m-input--pill" id="jenisAsuransi" name="jenis_asuransi">
                      @if($user->posisi == 3)
                      @foreach($asuransi as $namaasuransi)
                      <option value="{{$namaasuransi->kode_asu}}">{{$namaasuransi->nama}}</option>
                      @endforeach
                      @else
                      <option value="all_asuransi">-Semua Asuransi-</option>
                      @foreach($asuransi as $namaasuransi)
                      <option value="{{$namaasuransi->kode_asu}}">{{$namaasuransi->nama}}</option>
                      @endforeach
                      @endif    
                    </select>
                </div>
               <div class="col-lg-6">  
                    <label class="">
                      Nama Bank
                    </label>
                    <select  class="form-control m-input m-input--air m-input--pill" id="jenisClient" name="jenis_client">
                      @if($user->posisi == 1 && count($client)>1)
                      <option value="all_client">-Semua Bank-</option>
                      @foreach($client as $namaclient)
                      <option value="{{$namaclient->kode_client}}">{{$namaclient->nama}}</option>
                      @endforeach
                      @elseif($user->posisi == 1 && count($client)==1)
                      @foreach($client as $namaclient)
                      <option value="{{$namaclient->kode_client}}">{{$namaclient->nama}}</option>
                      @endforeach
                      @else
                      <option value="all_client">-Semua Bank-</option>
                      @foreach($client as $namaclient)
                      <option value="{{$namaclient->kode_client}}">{{$namaclient->nama}}</option>
                      @endforeach
                      <!-- @endif -->
                    </select>
                </div>
                
                  <div class="col-lg-6">
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                      <div class="m-form__actions m-form__actions--solid">
                        <div class="col-lg-11 ml-lg-auto">
                        <button type="submit" id="CetakKlaim" name="CetakKlaim" class="btn btn-brand">
                          Laporan Klaim Asuransi
                        </button>
                      </div>

                      </div>
                    </div>
                  </div>
            </div>

    <div class="col-lg-12">
  <div id="data-tables">
      <!--Basic example-->
      <div class="panel panel-light">
        <div class="panel-body table-responsive">
            <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <th>No.</th>
                    <th>Keterangan</th>
                    <th>No. Sertifikat</th>
                    <th>Nama Asuransi</th>
                    <th>No. Pinjaman</th>
                    <th>Cabang Bank</th>
                    <th>Nama Debitur</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Tenor</th>
                    <th>Plafon</th>
                    <th>Rate</th>
                    <th>Premi</th>
                    <!-- <th>Umur</th> -->
                    <th>Tgl Akad Kredit</th>
                    <th>Tgl Akhir Kredit</th>
                    <th>Jenis Asuransi</th>
                    <th>Posisi</th>
                    <th>Tgl Akad</th>
                    <th>Tgl Kejadian</th>
                    <th>Tot Hari</th>
                    <th>Tgl Kejadian</th>
                    <th>Tgl Lapor</th>
                    <th>Tot Hari</th>
                    <th>Tgl Lapor</th>
                    <th>Tgl Dok. Lengkap</th>
                    <th>Tot Hari</th>
                  </tr>
              </thead>
              <tfoot>
                <tr>
                  <td colspan="10">Totals</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

                </tr>
              </tfoot>
              <tbody>

                <!-- Data Table Goes Here -->

            </table>
        </div>
      </div>
    </div>              
</form>                  <!--end::Form-->
                <!--end::Portlet-->
              </div>
            
      </div>
    </div>
</div>
<!-- <div class="m-portlet">
  <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
      <div class="m-portlet__head">
        <div class="m-portlet__head-tools">
          <button class="btn btn-accent">
            <i class="flaticon-paper-plane"></i>
            Akseptasi
          </button>
          <span class="m-portlet__head-icon">
            <i class="flaticon-file"></i>
          </span>
          <h3 class="m-portlet__head-text">
            Form Data Kumpulan
          </h3>
        </div>
      </div>

      <div id="data-tables">
      Basic example
      <div class="panel panel-light">
        <div class="panel-body table-responsive">
            <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th>
                    <th>Status</th>
                    <th>No. Sertifikat</th>
                    <th>Nama Asuransi</th>
                    <th>No. Pinjaman</th>
                    <th>Cabang Bank</th>
                    <th>Nama Debitur</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Tenor</th>
                    <th>Plafon</th>
                    <th>Rate</th>
                    <th>Premi</th>
                    <th>Umur</th>
                    <th>Tgl Akad Kredit</th>
                    <th>Tgl Akhir Kredit</th>
                    <th>Jenis Asuransi</th>
                    <th>Posisi</th>
                  </tr>
              </thead>
              <tbody>
 -->
                <!-- Data Table Goes Here -->

           <!--  </table>
        </div>
      </div>
    </div>
                  </form>

  </div>
</div> -->

<div class="modal fade" id="addEventModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Form Cetak Kwitansi Pembayaran</h3>
            </div>
            <div class="modal-body">
          <form class="m-form m-form--fit m-form--label-align-right" id="form-update-modal" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="m-portlet__body">
              <div class="col-mg-6" align="left">
                <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonCetakKwitansi" name="buttonCetakKwitansi">
                  Cetak Kwitansi  
                  <i class="flaticon-technology-2"></i>
                </button>
                <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonUpdateData" name="buttonUpdateData">
                  Update Data  
                  <i class="flaticon-edit-1"></i>
                </button>"
              </div>
            <div class="form-control-feedback">
              <label class="col-form-label col-lg-3 col-sm-12">
                No Kwitansi
              </label>
              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk"  readonly>
              <input type="text" class="form-control m-input m-input--air m-input--pill" id="noKwitansi" name="no_kwitansi"  readonly>
               <span class="m-form__help">
                  Example help text that remains unchanged.
                </span>
            </div>
            <div class="form-control-warning">
              <label class="col-form-label col-lg-3 col-sm-12">
                Debitur
              </label>
              <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur"  readonly>
               <span class="m-form__help">
                  Example help text that remains unchanged.
                </span>
            </div>
          </div>
          <!-- <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
              <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                  <button type="reset" class="btn btn-primary">
                    Submit
                    <i class="flaticon-technology-2"></i>
                  </button>
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                  </button>
                </div>
              </div>
            </div>
          </div> -->
        
          </form>
        </div>
</div>
<div class="modal fade" id="addEventModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Upload Form Klaim</h3>
                <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
          <form class="m-form m-form--fit m-form--label-align-right" id="form-upload-modal" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="m-portlet__body">
              
            <div class="form-control-feedback">
              <label class="col-form-label col-lg-3 col-sm-12">
                File
              </label>
              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk"  readonly>
              <input type="file" class="form-control m-input m-input--air m-input--pill" id="fileUpload" name="file_upload[]" multiple>
               <span class="m-form__help">
                  <!-- Example help text that remains unchanged. -->
                </span>
            </div>
            <!-- <div class="form-control-warning">
              <label class="col-form-label col-lg-3 col-sm-12">
                Debitur
              </label>
              <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur"  readonly>
               <span class="m-form__help">
                  Example help text that remains unchanged.
                </span>
            </div> -->
            <div class="col-mg-6" align="right">
                <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="uploadFile" name="uploadfile">
                  Upload  
                  <i class="flaticon-up-arrow-1"></i>
                </button>
                <!-- <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonUpdateData" name="buttonUpdateData">
                  Update Data  
                  <i class="flaticon-edit-1"></i>
                </button> -->
              </div>
          </div>
          <!-- <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
              <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                  <button type="reset" class="btn btn-primary">
                    Submit
                    <i class="flaticon-technology-2"></i>
                  </button>
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                  </button>
                </div>
              </div>
            </div>
          </div> -->
        
          </form>
        </div>
</div>
<!-- <script src="{{asset('assets/demo/default/custom/crud/forms/widgets/dropzone.js')}}" type="text/javascript"></script> -->
<script type="text/javascript">
    LobiAdmin.loadScript([
          'assets/app/dataTables/jquery.dataTables.min.js',
        'assets/vendors/custom/datatables/datatables.bundle.js',
        'js/plugin/select2/select2.min.js'
          // 'assets/vendors/custom/datatables/datatables.bundle.js',
          // 'assets/app/dataTables/jquery.dataTables.min.js',
          // 'assets/app/dataTables/dataTables.bootstrap.min.js',
          // 'js/plugin/fileinput/fileinput.min.js',
          // 'assets/app/dataTables/dataTables.responsive.min.js',
          ], function(){
          LobiAdmin.loadScript([
            'assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js',
            'js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js',
            'assets/demo/default/custom/components/portlets/tools.js',
            ],initPage);
          // LobiAdmin.loadScript([
          //   // 'assets/vendors/base/vendors.bundle.js',
          //   'assets/demo/default/base/scripts.bundle.js',
          //   'assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js',
          //   'assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js',
          //   'assets/vendors/custom/datatables/datatables.bundle.js',
          //   'assets/demo/default/custom/crud/datatables/basic/scrollable.js',
          // ],initPage);
  });

    function initPage(){
      $('.datepicker-demo').datepicker({
            format: 'yyyy-mm-dd'
        });

      $('#tanggalPeriodeAkhir').datepicker().on('changeDate', function (ev) {
          if ($('#tanggalPeriodeAkhir').val() != '' && $('#tanggalPeriodeAwal').val() != '') {
            var startDate = $('#tanggalPeriodeAwal').val().replace(/\//g, '');
            var endDate = $('#tanggalPeriodeAkhir').val().replace(/\//g, '');
            var asuransiId = $('#jenisAsuransi').val();
            var leasingId = $('#jenisClient').val();

            // alert(asuransiId);
            reloadTableByDate(startDate, endDate, asuransiId, leasingId);
          }else {
            alert('pilih tanggal periode mulai');
          }
        });

      $('#jenisAsuransi').on('change', function (ev) {
          if ($('#tanggalPeriodeAkhir').val() != '' && $('#tanggalPeriodeAwal').val() != null) {
            var startDate = $('#tanggalPeriodeAwal').val().replace(/\//g, '');
            var endDate = $('#tanggalPeriodeAkhir').val().replace(/\//g, '');
            var asuransiId = $('#jenisAsuransi').val();
            var leasingId = $('#jenisClient').val();

            // alert(asuransiId);
            reloadTableByDate(startDate, endDate, asuransiId, leasingId);
          }else {
            alert('pilih tanggal periode mulai');
          }
        });

      $('#jenisClient').on('change', function (ev) {
          if ($('#tanggalPeriodeAkhir').val() != '' && $('#tanggalPeriodeAwal').val() != null) {
            var startDate = $('#tanggalPeriodeAwal').val().replace(/\//g, '');
            var endDate = $('#tanggalPeriodeAkhir').val().replace(/\//g, '');
            var asuransiId = $('#jenisAsuransi').val();
            var leasingId = $('#jenisClient').val();

            // alert(asuransiId);
            reloadTableByDate(startDate, endDate, asuransiId, leasingId);
          }else {
            alert('pilih tanggal periode mulai');
          }
        });

      function reloadTableByDate(startDate, endDate, jenisAsu, jenisCli){
        var t = $('#data-table-example2').DataTable();
          t.destroy();
        var table = $('#data-table-example2').DataTable({
          // "responsive": true,
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./ViewerDokumenKlaimReport/reloadTableByDate/"+startDate+"/"+endDate+"/"+jenisAsu+"/"+jenisCli,
            "type": "GET"
          },
          "order": [[ 0, 'asc' ]],
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var colNumber = [10,12];
 
            var intVal = function (i) {
                return typeof i === 'string' ?
                        i.replace(/[, ₹]|(\.\d{2})/g, "") * 1 :
                        typeof i === 'number' ?
                        i : 0;
            };
            for (i = 0; i < colNumber.length; i++) {
                var colNo = colNumber[i];
                var total2 = api
                        .column(colNo,{ page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
              var numFormat = $.fn.dataTable.render.number( '.', ',', 0,'Rp. ').display;
                $(api.column(colNo).footer()).html(numFormat(total2));
            }
          },
          "columns" : [
            { "data": null},
            { "data": "ket_klaim"},
            { "data": "no_polis" },
            { "data": "nama" },
            { "data": "no_pk" },
            { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "plafon" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "rate" },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaprod" },
            { "data": "namaposisi" },
            // { "data": "premi_admin", "render": $.fn.dataTable.render.number( ',', '.', 0 ) },
            { "data": "tgl_awal" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_kejadian" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "x1" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_kejadian" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_lapor" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "x2" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_lapor" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_dok_lengkap" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "x3",
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            // { "data": "status_perpanjangan" ,
            //     "mRender": function (data, type, row) {
            //       var classLabel = '';
            //       if (data == "NEW"){
            //         classLabel = 'label-green';
            //       }else {
            //         classLabel = 'label-blue';
            //       }
            //         return "<span class='label "+ classLabel +"'>" + data + "</span>";
            //     } },

          ],

          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
      });
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        $('#data-table-example2').DataTable().ajax.reload();
      }
      
      var $addEventModal = $('#addEventModal');
      var $addEventModal2 = $('#addEventModal2');
      $addEventModal.appendTo('body');
      $addEventModal2.appendTo('body');

      var table = $('#data-table-example2').DataTable({
          // "responsive": true,
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./ViewerDokumenKlaimReport/reload",
            "type": "GET"
          },
          "order": [[ 0, 'asc' ]],
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var colNumber = [10,12];
 
            var intVal = function (i) {
                return typeof i === 'string' ?
                        i.replace(/[, ₹]|(\.\d{2})/g, "") * 1 :
                        typeof i === 'number' ?
                        i : 0;
            };
            for (i = 0; i < colNumber.length; i++) {
                var colNo = colNumber[i];
                var total2 = api
                        .column(colNo,{ page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
              var numFormat = $.fn.dataTable.render.number( '.', ',', 0,'Rp. ').display;
                $(api.column(colNo).footer()).html(numFormat(total2));
            }
          },
          "columns" : [
            { "data": null},
            { "data": "ket_klaim"},
            { "data": "no_polis" },
            { "data": "nama" },
            { "data": "no_pk" },
            { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "plafon" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "rate" },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaprod" },
            { "data": "namaposisi" },
            // { "data": "premi_admin", "render": $.fn.dataTable.render.number( ',', '.', 0 ) },
            { "data": "tgl_awal" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_kejadian" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "x1" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_kejadian" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_lapor" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "x2" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_lapor" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "tgl_dok_lengkap" ,
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            { "data": "x3",
            // { "data": "status_pinjaman",
                "mRender": function (data, type, row) {
                  var classLabel = '';
                    return "<div style='color:blue;'>" + data + "</div>";
                } },
            // { "data": "status_perpanjangan" ,
            //     "mRender": function (data, type, row) {
            //       var classLabel = '';
            //       if (data == "NEW"){
            //         classLabel = 'label-green';
            //       }else {
            //         classLabel = 'label-blue';
            //       }
            //         return "<span class='label "+ classLabel +"'>" + data + "</span>";
            //     } },

          ],
      });

      table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

      $('#example-select-all').on('click', function(){
          // Check/uncheck all checkboxes in the table
          var rows = table.rows({ 'search': 'applied' }).nodes();
          $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $('#example tbody').on('change', 'input[type="checkbox"]', function(){
          // If checkbox is not checked
          if(!this.checked){
             var el = $('#example-select-all').get(0);
             // If "Select all" control is checked and has 'indeterminate' property
             if(el && el.checked && ('indeterminate' in el)){
                // Set visual state of "Select all" control
                // as 'indeterminate'
                el.indeterminate = true;
             }
          }
        });

        $('#data-table-example2 tbody').on( 'click', 'td', function () {
          var valueIdx = table.row( this ).data();
          var visIdx = $(this).index();
          var dataIdx = table.column.index( 'fromVisible', visIdx );

          if (dataIdx != 0){
            // ... do something with `rowData`
            tableText(valueIdx['debitur'], valueIdx['no_pk']);
          }
        } );
        
        function tableText(tableCell, no_pk) {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                $(".modal-body").find("#Debitur").val(tableCell);
                $(".modal-body").find("#no_Pk").val(no_pk);
                // $(".modal-body").find("#cabang").val(dokumens[0].cabang);
                // $(".modal-body").find("#namaNasabah").val(dokumens[0].nama_nasabah);
                // $(".modal-body").find("#plafon").val(numberWithCommas(dokumens[0].plafon));
                // $(".modal-body").find("#tanggalBooking").val(dokumens[0].tgl_booking);
                // $(".modal-body").find("#merek").val(dokumens[0].merk);
                // $(".modal-body").find("#tipe").val(dokumens[0].tipe);
                // $(".modal-body").find("#kategori").val(dokumens[0].kategori);
                // $(".modal-body").find("#model").val(dokumens[0].jenis_asuransi);
                // $(".modal-body").find("#jenisKendaraan").val(dokumens[0].model_kend);
                // $(".modal-body").find("#noRangka").val(dokumens[0].no_rangka);
                // $(".modal-body").find("#noMesin").val(dokumens[0].no_mesin);
                // $(".modal-body").find("#noPolisi").val(dokumens[0].no_polisi);
                // $(".modal-body").find("#noBpkb").val(dokumens[0].no_bpkb);
                // $(".modal-body").find("#tahun").val(dokumens[0].tahun);
                // $(".modal-body").find("#tenor").val(dokumens[0].tenor);
                // $(".modal-body").find("#rate").val(dokumens[0].rate);
                // $(".modal-body").find("#premiPertahun").val(numberWithCommas(dokumens[0].premi));
                // $(".modal-body").find("#premiAdmin").val(numberWithCommas(dokumens[0].premi_admin));
                // if (dokumens[0].premi != dokumens[0].premi_admin){
                //   $('#premiPertahun').css({ background: "red", color:"white" });
                // }else{
                //   $('#premiPertahun').css({ background: "", color:"" });
                // }
                // $(".modal-body").find("#premiSekaligus").val(numberWithCommas(dokumens[0].premi_sekaligus));
                // $(".modal-body").find("#wilayah").val(dokumens[0].wilayah);

                // $addEventModal.modal('show');

        }
    };

    $(document).ready(function() {
      var $addEventModal = $('#FormKlaimUpload');

      var submitActor = null;
      var inputSubmitActor = null;
      var buttonSubmitActor = null;
      var $form = $('#FormKlaimUpload');
      var $submitActors = $form.find('button[type=submit]');
      var $inputSubmitActors = $form.find('input[type=submit]');
      var $form_modal = $('#form-update-modal');
      var $submitActorsModal = $form_modal.find('button[type=submit]');


      $form.submit( function (e) {
        e.preventDefault();
        if (null === submitActor) {
          // return first button if nothing else
          inputSubmitActor = $inputSubmitActors[0];
          submitActor = $submitActors[0];
        }

        var formData = new FormData(this);

        var buttonPressed = submitActor.name;
        console.log(inputSubmitActor.name);

        switch (buttonPressed) {
          case 'CetakKlaim':
          var tgl_awal = formData.get('tanggal_periode_awal');
          var tgl_akhir = formData.get('tanggal_periode_akhir');
          var jns_client = formData.get('jenis_client');
          var jns_asuransi = formData.get('jenis_asuransi');
          var jns_produksi = formData.get('jenis_produksi');
          // alert(jns_produksi);
          // var file = formData.get('file_excel');
          if(tgl_awal == '' || tgl_awal == null){
            alert('Isi Tanggal Periode Awal');
          }else if(tgl_akhir =='' || tgl_akhir ==null){
            alert('Isi Tanggal Periode Akhir');
          }else if(jns_asuransi =='' || jns_asuransi ==null){
            alert('Pilih Jenis Asuransi');
          }else{
              var win = window.open("./CetakKlaim/"+tgl_awal+"/"+tgl_akhir+"/"+jns_asuransi+"/"+jns_client);
            if (win) {
              //Browser has allowed it to be opened
              win.focus();
            } else {
              //Browser has blocked it
              alert('Please allow popups for this website');
            }
          }s  
            break;
            default:

          }
      });

      // $('#jenisAsuransi').on('change', function(e){
      //     e.preventDefault();
      //     var kategori = $("#FormKlaimUpload").find("#produkAsuransi").val();
      //     $("#FormAddRekanan").find("#kodeProd").val(kategori);
      //     // $("#FormKlaimUpload").find("#fileExcel").val('');
      //   });

      // $form_modal.submit( function (ev) {
      //   ev.preventDefault();
      //   if (null === buttonSubmitActor) {
      //     // return first button if nothing else
      //     buttonSubmitActor = $submitActorsModal[0];
      //     // submitActor = $submitActors[0];
      //   }

      //   var formData = new FormData(this);

      //   var buttonPressed = buttonSubmitActor.name;
      //   console.log(buttonPressed);
      //   alert(buttonPressed);
      //   switch (buttonPressed) {
      //     case 'ProsesSaveSatuan':
      //         $.ajax({
      //           type: 'POST',
      //           url : "./Dokumen/upload",
      //           enctype: 'multipart/form-data',
      //           data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      //           contentType: false,       // The content type used when sending data to the server.
      //           cache: false,             // To unable request pages to be cached
      //           processData:false,
      //           success : function (data) {

      //           }
      //         });
      //       break;
      //       default:

      //     }
      // });

      $submitActors.click(function(event) {
      submitActor = this;
      inputSubmitActor = this;
      });

      // $buttonSubmitActor.click(function(event) {
      // submitActorsModal = this;
      // });

      $("#buttonCetakKwitansi").on('click', function() {
            $("#form-update-modal").submit();
      });

      $('#form-update-modal').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]);
            }
            var no_pk = formData.get('no_pk');

            $.ajax({
              type: 'Get',
              url : "./UpdateNoKwitansi",
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'success'){
                  dokumens = data.dokumens;
                  // alert(dokumens);
                  // if(dokumens[0].no_kwitansi == null){
                  //   var no_kwitansi = parseInt("XYZ001");
                  //     alert(no_kwitansi);
                  //     $.ajax({
                  //       type: 'get',
                  //       url : "./UpdateNoKwitansi/" + no_pk,
                  //       data: formData,
                  //             no_kwitansi, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  //       contentType: false,       // The content type used when sending data to the server.
                  //       cache: false,             // To unable request pages to be cached
                  //       processData:false,
                  //       success : function(){

                  //       }
                  //     });

                  // }else{
                  //   var no_kwitansi = dokumens[0].no_kwitansi + 1;

                  //   $.ajax({
                  //       type: 'get',
                  //       url : "./UpdateNoKwitansi",
                  //       data: formData,
                  //             no_kwitansi, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  //       contentType: false,       // The content type used when sending data to the server.
                  //       cache: false,             // To unable request pages to be cached
                  //       processData:false,
                  //       success : function(){

                  //       }
                  //     });
                  // }
                  $(".modal-body").find("#noKwitansi").val(dokumens[0].no_pin);
                  // alert('Update Sukses');
                  // $addEventModal.modal('hide');
                  // reloadTable();

                }else {
                  alert('Cannot update data');
                }
              }
            });
        });

      $("#uploadForm").on('click', function(ev) {
          // addEventModal2.show();
        ev.preventDefault();
        $('#addEventModal2').modal('show');
          // $("#form-updatee-modal").submit();
        });
      $("#m_sweetalert_demo_6").click(function(e){
        swal({
          position:"top-right",type:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500})});
      
      $("#uploadFile").on('click', function(e) {
        e.preventDefault();
        $("#form-upload-modal").submit();
        // alert('ok');
      });

      $('#form-upload-modal').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        for (var pair of formData.entries()) {
          console.log(pair[0]+ ', ' + pair[1]);
        }
        // alert(no_pk);
        $.ajax({
          type: 'POST',
          url : "./uploadformklaim",
          enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              beforeSend: function() {
                  // setting a timeout
                  // $(placeholder).addClass('loading');
              },
              success : function (data) {
                if(data.status == 'start_number' || data.status == 'new_number'){
                  $(".modal-body").find("#noKwitansi").val(data.dokumens);
                  // alert(data.dokumens);
                  // $addEventModal.modal('hide');

                  // reloadTable();
                }else {
                  sweetalert();
                  alert(data.message);
                }
              }
            });
      });

      function sweetalert() {
        swal({
          position:"top-right",type:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500});
      }

    });
</script>
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
                Form Monitoring Data Asuransi Jiwa Kredit
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
                      Tanggal Periode Produksi
                    </label>
                    <div class="input-daterange input-group datepicker-demo">
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalPeriodeAwal" name="tanggal_periode_awal" required/>
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="la la-ellipsis-h"></i>
                            </span>
                          </div>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalPeriodeAkhir" name="tanggal_periode_akhir" required/>
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
                  <label>Jenis Penutupan</label>

                  <div class="m-radio-inline">
                    @if ($user->posisi == '3' || $user->posisi == '2' || $user->posisi == '1')
                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="jenis_produksi" value="rekapAsuransi" class="form-control m-input m-input--air m-input--pill" >
                          Rekap Asuransi
                          <span></span>
                      </label>

                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="jenis_produksi" value="rincianAsuransi">
                          Rincian Asuransi
                          <span></span>
                      </label>
                    @endif

                    @if ($user->posisi == '3' || $user->posisi == '2' || $user->posisi == '1')
                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="jenis_produksi" value="rekapClient">
                          Rekap Bank
                          <span></span>   
                      </label>

                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="jenis_produksi" value="rincianClient">
                          Rincian Bank
                          <span></span>
                      </label>
                    @endif

                    
                  </div>
                </div>
                  <div class="col-lg-6">
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                      <div class="m-form__actions m-form__actions--solid">
                        <div class="col-lg-6lg-11 ml-lg-auto">
                        <button type="submit" id="PrintLaporan" name="PrintLaporan" class="btn btn-brand">
                          Print Laporan
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
                    <th>Posisi Data</th>
                    <th>Cetak e-Cover</th>
                    <th>No. Sertifikat</th>
                    <th>Nama Asuransi</th>
                    <th>Jenis Produk</th>
                    <th>Okupasi</th>
                    <th>No. Pinjaman</th>
                    <th>Cabang Bank</th>
                    <th>Nama Debitur</th>
                    <th>Pekerjaan</th>
                    <th>Tgl Lahir</th>
                    <th>Umur</th>
                    <th>Tgl Akad Kredit</th>
                    <th>Tgl Akhir Kredit</th>
                    <th>Tenor</th>
                    <th>Rate</th>
                    <!-- <th>Umur</th> -->
                    <th>Plafon</th>
                    <th>Premi</th>
                    <!-- <th>Selisih</th> -->
                  </tr>
              </thead>

              <tfoot>
                <tr>
                  <td colspan="15">Totals</td>
                  <!-- <td></td> -->
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
                
                <h3 class="modal-title" id="myModalLabel">Form Cetak E-Polis Asuransi</h3>
                <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
          <form class="m-form m-form--fit m-form--label-align-right" id="form-polis" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="m-portlet__body">
              <div class="col-mg-6" align="left">
                <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonCetakPolis" name="buttonCetakPolis">
                  Cetak e-Polis  
                  <i class="flaticon-technology-2"></i>
                </button>
                <!-- <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonUpdateData" name="buttonUpdateData">
                  Update Data  
                  <i class="flaticon-edit-1"></i>
                </button>" -->
              </div>
            <div class="form-control-feedback">
              <label class="col-form-label col-lg-3 col-sm-12">
                No Sertifikat
              </label>
              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk">
              <input type="text" class="form-control m-input m-input--air m-input--pill" id="noPolis" name="no_polis">
               <span class="m-form__help">
                  <!-- Example help text that remains unchanged. -->
                </span>
            </div>
            <div class="form-control-warning">
              <label class="col-form-label col-lg-3 col-sm-12">
                Debitur
              </label>
              <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur"  readonly>
               <span class="m-form__help">
                  <!-- Example help text that remains unchanged. -->
                </span>
            </div>
          </div>
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

      // function reloadTableByDate(startDate, endDate, jenisAsu, jenisCli){
      //   // alert('ok');
      //   var t = $('#data-table-example2').DataTable();
      //     t.destroy();
      //   var table = $('#data-table-example2').DataTable({
      //     "scrollY": 250,
      //     "scrollX": true,
      //     // "processing": true,
      //     // "serverSide": true,
      //     "ajax": {
      //       "url": "./ViewerDokumenReport/reloadbydate/"+startDate+"/"+endDate+"/"+jenisAsu+"/"+jenisclient,
      //       "type": "GET"
      //     },
      //     'columnDefs': [{
      //         'targets': 0,
      //         'searchable':false,
      //         'orderable':false,
      //         'className': 'dt-body-center',
      //         'render': function (data, type, row){
      //             return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
      //                + $('<div/>').text(row['no_pk']).html() + '">';
      //              }
      //     },
      //     ],
      //     "order": [[ 0, 'asc' ]],
      //     "columns" : [
      //       { "data": null},
      //       { "data": "sts_asuransi"},
      //       { "data": "no_polis" },
      //       { "data": "kode_asu" },
      //       { "data": "no_pk" },
      //       { "data": "kode_client" },
      //       // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
      //       { "data": "no_debitur" },
      //       { "data": "tgl_lahir" },
      //       { "data": "umur" },
      //       { "data": "tenor" },
      //       { "data": "plafon" },
      //       { "data": "rate" },
      //       { "data": "premi" },
      //       { "data": "tgl_awal" },
      //       { "data": "tgl_akhir" },
      //       { "data": "asuransi_bank" },
      //       { "data": null },
      //     ],

      // });
      //     $('#data-table-example2').DataTable().ajax.reload();
      // }

      function reloadTableByDate(startDate, endDate, jenisAsu, jenisCli){
        var t = $('#data-table-example2').DataTable();
          t.destroy();
        var table = $('#data-table-example2').DataTable({
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./ViewerDokumenReport/reloadbydate/"+startDate+"/"+endDate+"/"+jenisAsu+"/"+jenisCli,
            "type": "GET"
          },
          "order": [[ 0, 'asc' ]],
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 17;
            while(j < nb_cols){
              var pageTotal = api
                    .column( j, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return Number(a) + Number(b);
                    }, 0 );
              // Update footer
              var numFormat = $.fn.dataTable.render.number( '.', ',', 0,'Rp. ').display;
              $( api.column( j ).footer() ).html(numFormat(pageTotal));
              j++;
            } 
          },
          "columns" : [
            { "data": null},
            { "data": "namaposisi" },
            // { "data": "sts_asuransi"},
            { "data": null},
            { "data": "no_polis" },
            { "data": "namaasuransi" },
            { "data": "namaprod" },
            { "data": "okupasi" },
            { "data": "no_pk" },
            { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "pekerjaan" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "tenor", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
	//{ "data": "tenor" },
            { "data": "rate" },
            { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            // { "data":  null },
            ],
            'columnDefs': [{
            'targets': 2,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
              if(data["no_polis"]!= null){
                  return '<button type="sumbit" class="btn btn-primary btn-sm" id="cetakPolis" name="cetakPolis" value="'+ data["no_polis"] +'"><i class=" flaticon-technology-2"></i> Cover Note</button>';
              }else{
                return 'File Tidak Ada';
              }
            }
            }],
          

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
      $addEventModal.appendTo('body');

      var table = $('#data-table-example2').DataTable({
          "decimal": ",",
          "thousands": ".",
         "scrollY": 250,
         "bDestroy": true,
          "scrollX": true,
          "decimal": ",",
           "thousands": ".",
    // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./ViewerDokumenReport/reload",
            "type": "GET"
          },
          "order": [[ 0, 'asc' ]],
          "paging" : false,
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 17;
            while(j < nb_cols){
              var pageTotal = api
                    .column( j, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return Number(a) + Number(b);
                    }, 0 );
              // Update footer
              var numFormat = $.fn.dataTable.render.number( '.', ',', 0,'Rp. ').display;
              $( api.column( j ).footer() ).html(numFormat(pageTotal));
              j++;
            } 
          },
          "columns" : [
            { "data": null},
            { "data": "namaposisi" },
            // { "data": "sts_asuransi"},
            { "data": null},
            { "data": "no_polis" },
            { "data": "namaasuransi" },
            { "data": "namaprod" },
            { "data": "okupasi" },
            { "data": "no_pk" },
            { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "pekerjaan" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "tenor", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
//{ "data": "tenor" },
            { "data": "rate" },
            { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            // { "data":  null },
            ],
            'columnDefs': [{
            'targets': 2,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
              if(data["no_polis"]!= null){
                  return '<button type="sumbit" class="btn btn-primary btn-sm" id="cetakPolis" name="cetakPolis" value="'+ data["no_polis"] +'"><i class=" flaticon-technology-2"></i> Cover Note</button>';
              }else{
                return 'File Tidak Ada';
              }
            }
            }],
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

        
        
        function tableText(valueIdx) {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                $(".modal-body").find("#Debitur").val(valueIdx['debitur']);
                $(".modal-body").find("#no_Pk").val(valueIdx['no_pk']);
                $(".modal-body").find("#noPolis").val(valueIdx['no_polis']);
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

                $addEventModal.modal('show');
                
        }
      //   function sweetalert() {
      //     // swal({
      //     //   position:"top-right",type:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500});

      // swal({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete it!"}).then(function(e){e.value&&swal("Deleted!","Your file has been deleted.","success")});
      // }
    };

$(document).ready(function() {
    var $addEventModal = $('#addEventModal');
        var $updateEventModal = $('#updateEventModal');

        var submitActor = null;
        var submitActorModall = null;
        var inputSubmitActor = null;
        var buttonSubmitActor = null;
        var $form = $('#FormKlaimUpload');
        var $form_modall = $('#FormKlaimUpload');
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
        // console.log(inputSubmitActor.name);

        switch (buttonPressed) {
          case 'PrintLaporan':
          // alert(buttonPressed);
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
            //   $.ajax({
            //   "url": "./CetakLaporan/"+tgl_awal+"/"+tgl_akhir+"/"+jns_asuransi+"/"+jns_client+"/"+jns_produksi,
            // "type": "GET",
            //     success : function (data) {
            //       // reloadtable2();
            //     }
            //   });
            // alert('masuk');
            var win = window.open("./CetakLaporan/"+tgl_awal+"/"+tgl_akhir+"/"+jns_asuransi+"/"+jns_client+"/"+jns_produksi);
            if (win) {
              //Browser has allowed it to be opened
              win.focus();
            } else {
              //Browser has blocked it
              alert('Please allow popups for this website');
            }
          }
          break;
          case 'kirimKeAsuransi':

          var table = $('#data-table-example2').DataTable();

          var formData = new FormData(this);
            // formData.set('id_asuransi', $("#Selectbox option:selected").attr("id"));

            // table.$('input[type="checkbox"]').each(function(){
            //  // If checkbox doesn't exist in DOM
            //  if(!$.contains(document, this)){
            //     // If checkbox is checked
            //     if(this.checked){
            //        // Create a hidden element
            //        $(formData).append(
            //           $('<input>')
            //              .attr('type', 'hidden')
            //              .attr('name', this.name)
            //              .val(this.value)
            //        );
            //     }
            //  }
            // });

            // Insert Checked Data to an Array
            var dokumenIDs = $("#data-tables input:checkbox:checked").map(function(){
              return $(this).val();
            }).get();
            // alert(dokumenIDs);

            formData.append('checklistData', dokumenIDs);
            alert(dokumenIDs);
            if(dokumenIDs == '' || dokumenIDs == null){
            // Output form data to a console                        
            alert('Data Belum Di Pilih');
          }
          else{
            for (var pair of formData.entries()) {
              console.log(pair[0]+ ', ' + pair[1]);
            }

            alert(formData);
            $.ajax({
              type: 'POST',
              url : "./kirimKeAsuransi/uploadkumpulan",
              enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  reloadtable2();
                }
              });
          }
          break;
          default:

        }
      });

        function reloadtable2(){
          $('#data-table-example2').DataTable().destroy();
          $('#data-table-example2 tbody').empty();
          var table2 = $('#data-table-example2').DataTable({
            "scrollY": 250,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./PenutupanKumpulan/reload/nosend",
            "type": "GET"
          },
          'columnDefs': [{
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                  // if(data["no_polis"] != null){
                    return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
                  }
                },
                ],
                "paging" : false,
                "order": [[ 1, 'asc' ]],
                "columns" : [
                { "data": null},
                { "data": "namaposisi" },
                // { "data": "sts_asuransi"},
                { "data": null},
                { "data": "no_polis" },
                { "data": "namaasuransi" },
                { "data": "namaprod" },
                { "data": "okupasi" },
                { "data": "no_pk" },
                { "data": "namaclient" },
                // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
                { "data": "debitur" },
                { "data": "pekerjaan" },
                { "data": "tgl_lahir" },
                { "data": "umur" },
                { "data": "tgl_awal" },
                { "data": "tgl_akhir" },
                { "data": "tenor", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
//{ "data": "tenor" },
                { "data": "rate" },
                { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
                { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
                // { "data":  null },
                ],

              });
          table2.ajax.reload();
        }
      // $form_modall.submit( function (e) {
      //   e.preventDefault();
      //   if (null === submitActorModall) {
      //     // return first button if nothing else
      //     // inputSubmitActor = $inputSubmitActors[0];
      //     submitActorModall = $submitActorsModall[0];
      //   }

      //   var formData = new FormData(this);

      //   var buttonPressed = submitActorModall.name;
      //   // console.log(inputSubmitActor.name);

      //   switch (buttonPressed) {
      //     case 'buttonCetakKwitansi':
      //         var no_pk = formData.get('no_pk');
      //         $.ajax({
      //           type: 'GET',
      //           url : "./UpdateNoKwitansi/" + no_pk,
      //           contentType: false,       // The content type used when sending data to the server.
      //           cache: false,             // To unable request pages to be cached
      //           processData:false,
      //           success : function (data) {

      //           }
      //         });
      //       break;
      //       case 'buttonCetakKwitansii':
      //         var no_pk = formData.get('no_pk');
      //         $.ajax({
      //           type: 'GET',
      //           url : "./UpdateNoKwitansi/" + no_pk,
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
      // $submitActorsModall.click(function(event) {
      // submitActorModall = this;
      // // inputSubmitActor = this;
      // });
      // $buttonSubmitActor.click(function(event) {
      // submitActorsModal = this;
      // });

      $('#data-table-example2 tbody').on( 'click', '#cetakPolis', function (e) {
        e.preventDefault();

        var data = $('#data-table-example2').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );

        var nopolis = data['no_polis'];

          if(nopolis == null || nopolis ==''){
              alert('No Sertifikat Belum Ada');
          }else{
            window.open("./CetakPolis/" + nopolis, '_blank');
          }
        });
      $('#FormKlaimUploadd').on('submit', function (e) {
        e.preventDefault();
        var table = $('#data-table-example2').DataTable();

        var formData = new FormData(this);
            // formData.set('id_asuransi', $("#Selectbox option:selected").attr("id"));

            // table.$('input[type="checkbox"]').each(function(){
            //  // If checkbox doesn't exist in DOM
            //  if(!$.contains(document, this)){
            //     // If checkbox is checked
            //     if(this.checked){
            //        // Create a hidden element
            //        $(formData).append(
            //           $('<input>')
            //              .attr('type', 'hidden')
            //              .attr('name', this.name)
            //              .val(this.value)
            //        );
            //     }
            //  }
            // });

            // Insert Checked Data to an Array
            var dokumenIDs = $("#data-tables input:checkbox:checked").map(function(){
              return $(this).val();
            }).get();
            formData.append('checklistData', dokumenIDs);
            // alert(dokumenIDs);
            if(dokumenIDs == '' || dokumenIDs == null){
            // Output form data to a console
            alert('Data Belum Di Pilih');
          }
          else{
            for (var pair of formData.entries()) {
              console.log(pair[0]+ ', ' + pair[1]);
            }

            // alert(formData);
            $.ajax({
              type: 'POST',
              url : "./kirimKeAsuransi/uploadkumpulan",
              enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  reloadtable2();
                  alert(data.messages);
                }
              });
          }
        });

      // $("#buttonCetakPolis").on('click', function(e) {
      //   e.preventDefault();
      //   $("#form-polis").submit();
      // });

      // $("#buttonUpdateData").on('click', function(ev) {
      //   ev.preventDefault();
      //   $('#updateEventModal').modal('show');
      //     // $("#form-updatee-modal").submit();
      //   });
      
      // $("#buttonUpdateNewData").on('click', function(ev) {
      //   ev.preventDefault();
      //   $("#form-updatee-modal").submit();
      // });

      // $('#form-polis').on('submit', function (event) {
      //   event.preventDefault();
      //   var formData = new FormData(this);

      //   for (var pair of formData.entries()) {
      //     console.log(pair[0]+ ', ' + pair[1]);
      //   }
      //   var no_pk = formData.get('no_polis');
      //   alert(no_pk);
      //   $.ajax({
      //     type: 'POST',
      //     url : "./PenutupanSatuan/update",
      //     enctype: 'multipart/form-data',
      //         data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      //         contentType: false,       // The content type used when sending data to the server.
      //         cache: false,             // To unable request pages to be cached
      //         processData:false,
      //         success : function (data) {
      //           if(data.status == 'start_number' || data.status == 'new_number'){
      //             $(".modal-body").find("#noKwitansi").val(data.dokumens);
      //             // alert(data.dokumens);
      //             // $addEventModal.modal('hide');

      //             // reloadTable();
      //           }else {
      //             alert(data.message);
      //           }
      //         }
      //       });
      // });

      $('#printNm').on('click', function(){
        window.open("./printNm", '_blank');
          // var win = 
        });
      $('#addData').on('click', function(){
        $("#FormKlaimUpload").find("#tanggalRegistrasi").val('');
        $("#FormKlaimUpload").find("#jenisAsuransi").val('');
        $("#FormKlaimUpload").find("#fileExcel").val('');

      });

      function sweetalert() {
        swal({
          position:"top-right",type:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500});
      }

      Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};
      

    });
</script>
<div class="m-content">
  <div class="">
    <!--begin::Portlet-->
    <div class="col-xl-12">
      <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon">
                <i class="flaticon-coins"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Form Rekonsiliasi Pembayaran Premi
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
          <div class="col-lg-12">
            <div class="m-section__content">
              <div class="m-demo"  data-code-preview="true" data-code-html="true" data-code-js="false">
                <div class="m-demo__preview" style="border-color: white;">
                  <div class="m-stack m-stack--ver m-stack--general m-stack--demo" >
                    <div class="m-stack__item m-stack__item--left" style="background-color: white;">
                      <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormRekonsiliasi" method="post" enctype="multipart/form-data" action>
                        <div class="form-group m-form__group row">
                          <div class="col-lg-6">
                            <label class="">
                              No Sertifikat:
                            </label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="noSertifikat" name="no_sertifikat" required aria-describedby="emailHelp"  placeholder="Enter No. Sertifikat" >
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              No Kredit:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="noKredit" name="no_kredit" aria-describedby="" placeholder="Enter No. Sertifikat" required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Debitur:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur" aria-describedby="emailHelp" placeholder="Enter nomor kredit" required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Tanggal Lahir
                            </label>
                            <div class="input-daterange input-group datepicker-demo">
                              <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalLahir" name="tanggal_lahir" placeholder="Enter Tanggal Lahir" required />
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="la la-calendar-check-o"></i>
                                </span>
                              </div>
                            </div>
                            <span class="m-form__help">
                              <!-- Please enter your contact number -->
                            </span>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Plafon Pinjaman
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="plafonPinjaman" name="plafon_pinjaman" aria-describedby="" placeholder="Enter nomor kredit" required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Masa Kredit
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="masaKredit" name="masa_kredit" aria-describedby="" placeholder="Enter nomor kredit" required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Premi
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="Premi" name="premi" aria-describedby="emailHelp" placeholder="Enter nomor kredit" required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Tanggal Akad Kredit
                            </label>
                            <div class="input-daterange input-group datepicker-demo">
                              <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalAkad" name="tanggal_akad" placeholder="Enter Tanggal Lahir" required />
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="la la-calendar-check-o"></i>
                                </span>
                              </div>
                            </div>
                            <span class="m-form__help">
                              Please enter your contact number
                            </span>
                          </div>
                          <div class="col-lg-6">
                            <button id="CopyPremi" name="CopyPremi" class="btn btn-primary"><i class="fa fa-copy"></i> Copy Premi</button>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Tanggal Bayar
                            </label>
                            <div class="input-daterange input-group datepicker-demo">
                              <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalBayar" name="tanggal_bayar" placeholder="Enter Bayar Premi" required>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="la la-calendar-check-o"></i>
                                </span>
                              </div>
                            </div>
                            <span class="m-form__help">
                              <!-- Please enter your contact number -->
                            </span>
                          </div>
                          <div class="col-lg-4">
                            <label class="">
                              Bayar Premi
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="bayarPremi" name="bayar_premi" aria-describedby="emailHelp" placeholder="Enter nomor kredit" required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <label class="">
                              Selisih
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="Selisih" name="selisih" aria-describedby="emailHelp" placeholder="Enter nomor kredit" readonly required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <label class="">
                              Status
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="Status" name="status" aria-describedby="emailHelp" placeholder="Enter nomor kredit" readonly  required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="">
                              Keterangan
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="Keterangan" name="keterangan" aria-describedby="emailHelp" placeholder="Enter nomor kredit" required>
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                              <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                  <button type="submit" id="ProsesRekon" name="ProsesRekon" class="btn btn-info">
                                    Proses Rekon
                                    <i class="flaticon-file-1"></i>
                                  </button>
                                  <div class="col-lg-12 m--align-right">
                            <!-- <button type="submit" id="kirimKeAsuransi" name="kirimKeAsuransi" class="btn btn-accent">
                            <i class="flaticon-paper-plane"></i>
                              Kirim Ke Asuransi
                            </button> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>                  <!--end::Form-->

            </div>
            <div class="m-stack__item m-stack__item--left" style="width: 30%; background-color: white;">
              <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormLaporanRekonsiliasi" method="post" enctype="multipart/form-data" action>
                <div class="form-group m-form__group row">
                  <h3>Laporan Rekon</h3>
                  <div class="col-lg-12">
                    <label class="">
                      Periode Produksi
                    </label>
                    <div class="input-daterange input-group datepicker-demo">
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalAkadAwal" name="tanggal_akad_awal" required/>
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="la la-ellipsis-h"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalAkadAkhir" name="tanggal_akad_akhir" required/>
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                          </span>
                        </div>
                      </div>

                    </div>
                    <span class="m-form__help">
                      <!-- Linked pickers for date range selection -->
                    </span>
                  </div>
                  <div class="col-lg-12">
                    <label>
                      Jenis Bank:
                    </label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control m-input m-input--air m-input--pill" id="jenisBank" name="jenis_bank" required>
                      <option value="all_bank">--Select--</option>
                      @foreach($jenis_bank as $jenis)
                      <option value="{{$jenis->kode_client}}">
                        {{$jenis->nama}}
                      </option>
                      @endforeach
                    </select>
                    <span class="m-form__help">
                      Please enter your full name
                    </span>
                  </div>

                  <div class="col-lg-6">
                    <label>Status</label>

                    <div class="m-radio-list">
                      <label class="m-radio m-radio--bold m-radio--state-success">
                        <input type="radio" name="status_rekon" value="LUNAS" class="form-control m-input m-input--air m-input--pill" >
                        Lunas
                        <span></span>
                      </label>

                      <label class="m-radio m-radio--bold m-radio--state-success">
                        <input type="radio" name="status_rekon" value="BELUM BAYAR">
                        Belum Bayar
                        <span></span>
                      </label>
                      <label class="m-radio m-radio--bold m-radio--state-success">
                        <input type="radio" name="status_rekon" value="KURANG BAYAR">
                        Kurang Bayar
                        <span></span>
                      </label>

                      <label class="m-radio m-radio--bold m-radio--state-success">
                        <input type="radio" name="status_rekon" value="LEBIH BAYAR">
                        Lebih Bayar
                        <span></span>
                      </label>
                      <label class="m-radio m-radio--bold m-radio--state-success">
                        <input type="radio" name="status_rekon" value="SEMUA">
                        Semua
                        <span></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                      <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                          <button type="submit" id="CetakLaporan" name="CetakLaporan" class="btn btn-info">
                            Print Laporan
                            <i class="flaticon-file-1"></i>
                          </button>
                          <div class="col-lg-12 m--align-right">
                            <!-- <button type="submit" id="kirimKeAsuransi" name="kirimKeAsuransi" class="btn btn-accent">
                            <i class="flaticon-paper-plane"></i>
                              Kirim Ke Asuransi
                            </button> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div id="data-tables" class="display select">
            <!--Basic example-->
            <div class="panel panel-light">
              <div class="panel-body table-responsive">
                <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Posisi Data</th>
                    <th>No. Sertifikat</th>
                    <th>Nama Asuransi</th>
                    <th>No. Pinjaman</th>
                    <th>Cabang Bank</th>
                    <th>Nama Debitur</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Tenor</th>
                    <th>Rate</th>
                    <!-- <th>Umur</th> -->
                    <th>Tgl Akad Kredit</th>
                    <th>Tgl Akhir Kredit</th>
                    <th>Jenis Asuransi</th>
                    <th>Plafon</th>
                    <th>Premi</th>
                    <th>Premi Bayar</th>
                    <th>Selisih</th>
                    <th>Status Bayar</th>
                  </tr>
              </thead>

              <tfoot>
                <tr>
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
                  <td>Totals</td>
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
            <!--end::Portlet-->
          </div>

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

      var $addEventModal = $('#addEventModal');
      $addEventModal.appendTo('body');

      var table = $('#data-table-example2').DataTable({
        "scrollY": 250,
        "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Rekonsiliasii/reload",
            "type": "GET"
          },
          "order": [[ 0, 'asc' ]],
          "paging" : false,
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 14;
            while(j < nb_cols){
              var pageTotal = api
                    .column( j, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return Number(a) + Number(b);
                    }, 0 );
              // Update footer
              var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
              $( api.column( j ).footer() ).html(numFormat(pageTotal));
              j++;
            } 
          },
          "columns" : [
            { "data": null},
            { "data": "namaposisi" },
            // { "data": "sts_asuransi"},
            { "data": "no_polis" },
            { "data": "namaasuransi" },
            { "data": "no_pk" },
            { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "rate" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaprod" },
            { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "bayar" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data":  "selisih" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "sts_bayar" },
            ],
      });

      table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } );
      $('#example-select-all').on('click', function(){
            // Check/uncheck all checkboxes in the table
            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);

            var rows, checked;
            rows = $('#example').find('tbody tr');
            // alert(rows);
            checked = $(this).prop('checked');
            alert(rows);
          }); 

      $('#data-table-example2 tbody').on( 'click', 'td', function () {
        var valueIdx = table.row( this ).data();
        var visIdx = $(this).index();
        var dataIdx = table.column.index( 'fromVisible', visIdx );

        if (dataIdx != 0){
            // ... do something with `rowData`
            tableText(valueIdx);
          }
        } );

      function tableText(valueIdx) {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                $("#FormRekonsiliasi").find("#noSertifikat").val(valueIdx['no_polis']);
                $("#FormRekonsiliasi").find("#noKredit").val(valueIdx['no_pk']);
                $("#FormRekonsiliasi").find("#Debitur").val(valueIdx['debitur']);
                $("#FormRekonsiliasi").find("#tanggalLahir").val(valueIdx['tgl_lahir']);
                $("#FormRekonsiliasi").find("#plafonPinjaman").val(valueIdx['plafon']);
                $("#FormRekonsiliasi").find("#masaKredit").val(valueIdx['tenor']);
                $("#FormRekonsiliasi").find("#Premi").val(valueIdx['premi']);
                $("#FormRekonsiliasi").find("#tanggalAkad").val(valueIdx['tgl_awal']);
                $("#FormRekonsiliasi").find("#tanggalBayar").val(valueIdx['tanggal_bayar']);
                $("#FormRekonsiliasi").find("#bayarPremi").val(valueIdx['masa_kredit']);
                // $addEventModal.modal('show');
              }

            };

            $(document).ready(function() {
              // $("#bayarPremi").on('keypress ', function(event) {
              //   event.preventDefault();
              //   if (event.keyCode === 13) {
              //     var premii = $("#FormRekonsiliasi").find('#Premi').val();
              //     var bayarpremii = $("#FormRekonsiliasi").find('#bayarPremi').val();
              //     var selisih = 0;
              //     if(premii >= bayarpremii){
              //       selisih = premii- bayarpremii;
              //     }else if(premii <= bayarpremii){
              //       selisih = bayarpremii-premii;
              //     }

              //     if(premii != 0 || premii != ''){
              //       if(selisih == 0){
              //         var status = 'Lunas';
              //       }else if(selisih > 0 && selisih < premii){
              //         var status = 'Kurang Bayar';
              //       }else if(selisih > premii){
              //         var status = 'Lebih Bayar';
              //       }
              //     }

              //   }
              //   $("#FormRekonsiliasi").find('#Selisih').val('');
              //   $("#FormRekonsiliasi").find('#Status').val('');
              //   $("#FormRekonsiliasi").find('#Selisih').val(selisih);
              //   $("#FormRekonsiliasi").find('#Status').val(status);
              // });

              $("#CopyPremi").on('click', function(e) {
                e.preventDefault();
                var premi = $("#FormRekonsiliasi").find('#Premi').val();
                $("#FormRekonsiliasi").find('#bayarPremi').val(premi);
                var bayarpremi = $("#FormRekonsiliasi").find('#bayarPremi').val();
                var selisih = 0;
                if(premi >= bayarpremi){
                  selisih = premi- bayarpremi;
                }else if(premi <= bayarpremi){
                  selisih = bayarpremi-premi;
                }

                if(premi != 0 || premi != ''){
                  if(selisih == 0){
                    var status = 'LUNAS';
                  }else if(selisih > 0 && selisih < premi){
                    var status = 'KURANG BAYAR';
                  }else if(selisih > premi){
                    var status = 'LEBIH BAYAR';
                  }
                }
                $("#FormRekonsiliasi").find('#Selisih').val(selisih);
                $("#FormRekonsiliasi").find('#Status').val(status);
              });

              $("#bayarPremi").on('change', function() {
                // ev.preventDefault();
                var premii = $("#FormRekonsiliasi").find('#Premi').val();
                var bayarpremii = $("#FormRekonsiliasi").find('#bayarPremi').val();
                var selisih = 0;
                if(premii >= bayarpremii){
                  selisih = premii- bayarpremii;
                }else if(premii <= bayarpremii){
                  selisih = bayarpremii-premii;
                }

                if(premii != 0 || premii != ''){
                  if(selisih == 0){
                    var status = 'LUNAS';
                  }else if(selisih > 0 && selisih < premii){
                    var status = 'KURANG BAYAR';
                  }else if(selisih > premii){
                    var status = 'LEBIH BAYAR';
                  }
                }
                $("#FormRekonsiliasi").find('#Selisih').val(selisih);
                $("#FormRekonsiliasi").find('#Status').val(status);
              });




              $("#ProsesRekon").on('click', function(e) {
                e.preventDefault();
                $("#FormRekonsiliasi").submit();
              });

              $('#FormRekonsiliasi').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);

                for (var pair of formData.entries()) {
                  console.log(pair[0]+ ', ' + pair[1]);
                }
                var premi = formData.get('premi');
            // alert(premi);
            $.ajax({
              type: 'POST',
              url : "./ProsesRekon",
              enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'success'){
                  reloadtable();
                  alert(data.messages);
                }else {
                  alert(data.messages);
                }
              }
            });
          });

              $("#CetakLaporan").on('click', function(e) {
                e.preventDefault();
                $("#FormLaporanRekonsiliasi").submit();
              });

              $('#FormLaporanRekonsiliasi').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);

                for (var pair of formData.entries()) {
                  console.log(pair[0]+ ', ' + pair[1]);
                }
                var premi = formData.get('premi');
                var tgl_awal = formData.get('tanggal_akad_awal');
          var tgl_akhir = formData.get('tanggal_akad_akhir');
          var jns_client = formData.get('jenis_bank');
          var sts_rekon = formData.get('status_rekon');
          // var jns_produksi = formData.get('jenis_produksi');
          // alert(jns_produksi);
          // var file = formData.get('file_excel');
          if(tgl_awal == '' || tgl_awal == null){
            alert('Isi Tanggal Periode Awal');
          }else if(tgl_akhir =='' || tgl_akhir ==null){
            alert('Isi Tanggal Periode Akhir');
          }else if(jns_client =='' || jns_client ==null){
            alert('Pilih Jenis Asuransi');
          }else if(sts_rekon =='' || sts_rekon ==null){
            alert('Pilih Status Rekon');
          }else{
            var win = window.open("./CetakLaporanRekon/"+tgl_awal+"/"+tgl_akhir+"/"+jns_client+"/"+sts_rekon);
            if (win) {
              //Browser has allowed it to be opened
              win.focus();
            } else {
              //Browser has blocked it
              alert('Please allow popups for this website');
            }
          }
          });

              function reloadtable(){
                $('#data-table-example2').DataTable();
                $('#data-table-example2 tbody').empty();
                $('#data-table-example2').DataTable().rows().clear().draw();
                var table = $('#data-table-example2').DataTable({
                  "scrollY": 250,
                  "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Rekonsiliasii/reload",
            "type": "GET"
          },
          "order": [[ 0, 'asc' ]],
          "paging" : false,
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 14;
            while(j < nb_cols){
              var pageTotal = api
                    .column( j, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return Number(a) + Number(b);
                    }, 0 );
              // Update footer
              var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
              $( api.column( j ).footer() ).html(numFormat(pageTotal));
              j++;
            } 
          },
          "columns" : [
            { "data": null},
            { "data": "namaposisi" },
            // { "data": "sts_asuransi"},
            { "data": "no_polis" },
            { "data": "namaasuransi" },
            { "data": "no_pk" },
            { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "rate" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaprod" },
            { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "bayar" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data":  "selisih" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "sts_bayar" },
            ],
      });

      table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } );
                table.ajax.reload();

                $('#example-select-all').on('click', function(){
            // Check/uncheck all checkboxes in the table
            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);

            var rows, checked;
            rows = $('#example').find('tbody tr');
            // alert(rows);
            checked = $(this).prop('checked');
            alert(rows);
          }); 

        //         $('#data-table-example2 tbody').on( 'click', 'td', function () {
        //           var valueIdx = table.row( this ).data();
        //           var visIdx = $(this).index();
        //           var dataIdx = table.column.index( 'fromVisible', visIdx );

        //           if (dataIdx != 0){
        //     // ... do something with `rowData`
        //     tableText(valueIdx);
        //   }
        // } );
              }

            });
          </script>
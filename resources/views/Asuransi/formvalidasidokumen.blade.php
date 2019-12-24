
<div class="m-content">
  <div class="row">

    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon">
                <i class="flaticon-edit"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Form Update Sertifikat Polis Asuransi
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
          <div class="m-section__content">
            <div class="m-demo__preview" style="border-color: white;">
              <div class="m-stack m-stack--ver m-stack--general m-stack--demo" >
                <div class="m-stack__item m-stack__item--left" style="background-color: white;">
                  <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormExport" method="post" enctype="multipart/form-data" action>
                    <div class="form-group m-form__group row">
                      <div class="col-lg-6">
                        <label class="">
                          Tanggal Akad Kredit
                        </label>
                        <div class="input-daterange input-group datepicker-demo">
                          <div class="input-daterange input-group datepicker-demo">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalAksepAWal" name="tanggal_aksep_awal" required autocomplete="off" />
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
                      <div class="col-lg-6">
                        <label class="">
                          Tanggal Akad Kredit
                        </label>
                        <div class="input-daterange input-group datepicker-demo">
                          <div class="input-daterange input-group datepicker-demo">
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalAksepAkhir" name="tanggal_aksep_akhir" autocomplete="off" required/>
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
                        <div class="col-lg-12" align="right">
                          <button type="submit" id="ExportExcel" name="export_excel" class="btn btn-info">
                            Download Data  
                            <i class="flaticon-download"></i>
                          </button>
                        </div>
                      </div>    
                    </div>
                  </form>
                </div>
                <div class="m-stack__item m-stack__item--left" style="width: 50%; background-color: white;">
                  <!-- <div class="m-portlet__head" style="background-color: #A9A9A9;"> -->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormExport2" method="post" enctype="multipart/form-data" action>
                      <div class="form-group m-form__group row">
                        <div class="col-lg-12">
                          <label class="">
                            File Upload Polis
                          </label>
                          <div>
                            <div>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="file" class="form-control m-input m-input--air m-input--pill" id="file_upload_polis" name="file_upload_polis" required/>
                              <div class="input-group-append">
                      <!-- <span class="input-group-text">
                          <i class="la la-ellipsis-h"></i>
                        </span> -->
                      </div>
                      <div class="input-group-append">
                      <!-- <span class="input-group-text">
                        <i class="la la-calendar-check-o"></i>
                      </span> -->
                    </div>

                  </div>
                  <span class="m-form__help">
                    <!-- Linked pickers for date range selection -->
                  </span>
                </div>
                <div class="col-lg-12" align="right">
                  <button type="submit" id="ExportExcel" name="export_excel" class="btn btn-info">
                    Upload Polis  
                    <i class="flaticon-up-arrow-1"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="col-lg-12">
   <div id="data-tables">
    <!--Basic example-->
    <div class="panel panel-light">
      <div class="panel-body table-responsive">
        <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
          <thead>
            <tr>
              <!-- <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th> -->
              <!-- <th>Status</th> -->
              <th>No.</th>
              <th>No. Sertifikat</th>
              <th>Nama Asuransi</th>
              <th>Jenis Produk</th>
              <th>No. Pinjaman</th>
              <th>Cabang Bank</th>
              <th>Nama Debitur</th>
              <th>Pekerjaan</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Tenor</th>
              <th>Rate</th>
              <!-- <th>Umur</th> -->
              <th>Tgl Akad Kredit</th>
              <th>Tgl Akhir Kredit</th>
              <th>Posisi</th>
              <th>Plafon</th>
              <th>Premi</th>
            </tr>
          </thead>
          <tfoot>
                <tr>
                  <td colspan='15'>Total</td>
                  
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

<div class="modal fade" id="addEventModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Update Sertifikat Polis Asuransi</h3>
      </div>
      <div class="modal-body">
        <form id="form-update-modal" method="post">
          <div class="form-group m-form__group row">
            <div class="col-lg-6">
              <div class="col-lg-12">
                <label >
                  No Kredit
                </label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk" readonly>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="noKredit" name="no_kredit"  >  
              </div>
              <div class="col-lg-12">
                <label >
                  Nama Debitur
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur"  >
              </div>
              <div class="col-lg-12">
                <label >
                  Tanggal Lahir
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="tglLahir" name="tgl_lahir"  >
              </div>
              <div class="col-lg-12">
                <label >
                  Umur
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="Umur" name="umur"  >
              </div>
              <div class="col-lg-12">
              </div>
              <div class="col-lg-12">
                <label >
                  Tanggal Awal
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="tglAwal" name="tgl_awal"  >
              </div>
              <div class="col-lg-12">
              </div>
              <div class="col-lg-12">
                <label >
                  Plafon Kredit
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="Plafon" name="plafon"  >
              </div>
              <div class="col-lg-12">
              </div>
              <div class="col-lg-12">
                <label >
                  Premi
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="Premi" name="premi"  >
              </div>
              <div class="col-lg-12">
              </div>
              <div class="col-lg-12">
                <div>
                  <span class="m-form__help">
                    <!-- Please upload file -->
                  </span>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="col-lg-12">
                <label class="">
                  Tanggal Sertifikat
                </label>
                <div class="input-daterange input-group datepicker-demo">
                  <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalSertifikat" name="tanggal_sertifikat" autocomplete="off"  placeholder="Enter Tanggal Lahir" />
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
              <div class="col-lg-12">
                <label >
                  Input No Sertifikat
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="noSertifikat" name="no_sertifikat"  >
                <span>

                </span>
              </div>
              <div class="col-lg-12">
                <span>

                </span>
              </div>
              <div class="form-group m-form__group row">
                <div class="col-lg-6" >
                </div>
                <div class="col-lg-6" >
                  <button type="submit" class="form-control m-input m-input--air m-input--pill btn btn-primary" id="updateSertifikat" name="updateSertifikat">
                    Update Sertifikat
                    <i class="flaticon-file-1"></i>
                  </button>
                </div>
              </div>
              <div class="col-lg-12">
                <label >
                  Isi Deskripsi Untuk Konfirmasi Data Yang Tidak Sesuai
                </label>
                <textarea class="form-control m-input m-input--air m-input--pill" id="Keterangan" name="keterangan"></textarea>
              </div>
              <div class="col-lg-12">
                <span>

                </span>
              </div>
              <div class="form-group m-form__group row">
                <div class="col-lg-6" >
                </div>
                <div class="col-lg-6" >
                  <button type="submit" class="form-control m-input m-input--air m-input--pill btn btn-primary" id="KonfirmasiData" name="KonfirmasiData">
                  Konfirm Data
                  <i class="flaticon-file-1"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
        

      </div>
    </div>
  </div>
</div>


<!-- <script src="{{asset('assets/demo/default/custom/crud/forms/widgets/dropzone.js')}}" type="text/javascript"></script> -->
<script src="{{asset('assets/demo/default/custom/components/base/toastr.js')}}" type="text/javascript"></script>
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

          });

  function initPage(){
    var $addEventModal = $('#addEventModal');
    $addEventModal.appendTo('body');

    $('.datepicker-demo').datepicker({
      format: 'dd-mm-yyyy'
    });
    $('#tanggalAksepAkhir').datepicker().on('changeDate', function (ev) {
      if ($('#tanggalAksepAkhir').val() != '' && $('#tanggalAksepAWal').val() != null) {
        var startDate = $('#tanggalAksepAWal').val().replace(/\//g, '');
        var endDate = $('#tanggalAksepAkhir').val().replace(/\//g, '');
            // alert(startDate);
            reloadTableByDate(startDate, endDate);
          }else {
            alert('pilih tanggal periode mulai');
          }
        });

    function reloadTableByDate(startDate, endDate){
      var t = $('#data-table-example2').DataTable();
        t.rows().clear().draw();
      var table = $('#data-table-example2').DataTable({

        "scrollY": 250,
        "scrollX": true,
        "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormValidasiDokumen/reloadby/"+ startDate +"/"+ endDate,
            "type": "GET"
          },
          // 'columnDefs': [{
          //   'targets': 0,
          //   'searchable':false,
          //   'orderable':false,
          //   'className': 'dt-body-center',
          //   'render': function (data, type, row){
          //     return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
          //     + $('<div/>').text(row['no_pk']).html() + '">';
          //   }
          // },
          // ],
          "order": [[ 0, 'asc' ]],
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 15;
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
          // { "data": null},
          { "data": null},
          // { "data": "sts_asuransi"},
          { "data": "no_polis" },
          { "data": "namaasuransi" },
          { "data": "namaprod" },
          { "data": "no_pk" },
          { "data": "namacabang" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "pekerjaan" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "rate" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaposisi" },
            { "data": "plafon", "render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            ],
          
        });

      table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
      $('#data-table-example2').DataTable().ajax.reload();
    }

    var table = $('#data-table-example2').DataTable({

      "scrollY": 250,
      "scrollX": true,
      "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormValidasiDokumen/reload",
            "type": "GET"
          },
          // 'columnDefs': [{
          //   'targets': 0,
          //   'searchable':false,
          //   'orderable':false,
          //   'className': 'dt-body-center',
          //   'render': function (data, type, row){
          //     return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
          //     + $('<div/>').text(row['no_pk']).html() + '">';
          //   }
          // },
          // ],
          "order": [[ 0, 'asc' ]],
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 15;
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
          // { "data": null},
          { "data": null},
          // { "data": "sts_asuransi"},
          { "data": "no_polis" },
          { "data": "namaasuransi" },
          { "data": "namaprod" },
          { "data": "no_pk" },
          { "data": "namacabang" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "pekerjaan" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "rate" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaposisi" },
            { "data": "plafon", "render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            // { "data": "premi_admin", "render": $.fn.dataTable.render.number( ',', '.', 0 ) },
            // { "data": "status_pinjaman",
            //     "mRender": function (data, type, row) {
            //       var classLabel = '';
            //       if (data == "ACTIVE"){
            //         classLabel = 'label-success';
            //       }
            //         return "<span class='label "+ classLabel +"'>" + data + "</span>";
            //     } },
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
          var x = $('#data-table-example2').DataTable();
          var valueIdx = x.row( this ).data();
          var visIdx = $(this).index();
          var dataIdx = x.column.index( 'fromVisible', visIdx );

          if (dataIdx != 0){
            // ... do something with `rowData`
            tableText(valueIdx);
          }
        });
        
        function tableText(valueIdx) {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                clear();
                $(".modal-body").find("#noKredit").val(valueIdx['no_pk']);
                $(".modal-body").find("#Debitur").val(valueIdx['debitur']);
                $(".modal-body").find("#no_Pk").val(valueIdx['no_pk']);
                $(".modal-body").find("#tglLahir").val(valueIdx['tgl_lahir']);
                $(".modal-body").find("#Umur").val(valueIdx['umur']);
                $(".modal-body").find("#tglAwal").val(valueIdx['tgl_awal']);
                $(".modal-body").find("#Plafon").val(valueIdx['plafon']);
                $(".modal-body").find("#Premi").val(valueIdx['premi']);
                $(".modal-body").find("#noSertifikat").val(valueIdx['no_polis']);

                $addEventModal.modal('show');
              }
        function clear() {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                $(".modal-body").find("#noKredit").val('');
                $(".modal-body").find("#Debitur").val('');
                $(".modal-body").find("#no_Pk").val('');
                $(".modal-body").find("#tglLahir").val('');
                $(".modal-body").find("#Umur").val('');
                $(".modal-body").find("#tglAwal").val('');
                $(".modal-body").find("#Plafon").val('');
                $(".modal-body").find("#Premi").val('');
                $(".modal-body").find("#noSertifikat").val('');

              }
            };

            $(document).ready(function() {
              var submitActor = null;
              var form = $('#FormKlaimUpload');
              var form_modal = $('#form-update-modal');
              var $submitActors = form_modal.find('button[type=submit]');

              var $addEventModal = $('#addEventModal');
              $addEventModal.appendTo('body');

              $('#FormExport').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                var startDate = formData.get('tanggal_aksep_awal').replace(/\//g, '');
                var endDate = formData.get('tanggal_aksep_akhir').replace(/\//g, '');
                $.ajax({
                type: 'GET',
                url : "./FormValidasiDokumen/cekexportexcel/" + startDate + "/" + endDate,
                enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  if(data.status == 'failed'){
                    alert(data.message)
                  }else{
                    var win = window.open("./FormValidasiDokumen/exportexcel/" + startDate + "/" + endDate, '_blank');
                  }
                  reloadtable();
                }
              });

                // if (win) {
                //         //Browser has allowed it to be opened
                //         win.focus();
                //       } else {
                //         //Browser has blocked it
                //         alert('Please allow popups for this website');
                //       }
                    });
                
                $('#FormExport2').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                // var startDate = formData.get('tanggal_aksep_awal').replace(/\//g, '');
                // var endDate = formData.get('tanggal_aksep_akhir').replace(/\//g, '');
                // var win = window.open("./FormValidasiDokumen/exportexcel/" + startDate + "/" + endDate, '_blank');
                $.ajax({
                type: 'POST',
                url : "./Dokumen/upload/sertifikat",
                enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  alert(data.message);
                  reloadtable();
                }
              });
      });

              form_modal.submit( function (e) {
                e.preventDefault();
                if (null === submitActor) {
          // return first button if nothing else
          submitActor = $submitActors[0];
        }

        var formData = new FormData(this);

        var buttonPressed = submitActor.name;
        // console.log(submitActor.name);

        switch (buttonPressed) {
          case 'updateSertifikat':
          var tgl_polis = formData.get('tanggal_sertifikat'); 
          var no_polis = formData.get('no_sertifikat');

          if(tgl_polis != '' && no_polis != ''){
            $.ajax({
              type: 'POST',
              url : "./UpdateSertifikat",
              enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  if(data.status == 'success'){
                  alert(data.messages);
                  reloadtable();
                  $addEventModal.modal('hide');
                  }else if(data.status == 'failed'){
                  alert(data.messages);
                  }
                }
              });
          }else if(tgl_polis == '' || tgl_polis == null){
            alert('Pilih Tanggal Sertifikat');
          }else if(no_polis == '' || no_polis == null){
            alert('Isi No Sertifikat');
          }
          break;

          case 'KonfirmasiData':

          var ket = formData.get('keterangan');
          alert(ket);
          if(ket == '' || ket == null){
            alert('Isi Keterangan Konfirmasi data ');
          }else if(ket != '' || ket != null){
            $.ajax({
              type: 'POST',
              url : "./KonfirmData",
              enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  // alert('sip');
                }
              });
          }
          break;
          default:

        }
      });

      
      


              $submitActors.click(function(event) {
                submitActor = this;
              });

    function reloadtable() {
      $('#data-table-example2').DataTable().destroy();
      $('#data-table-example2 tbody').empty();
      var table2 = $('#data-table-example2').DataTable({

      "scrollY": 250,
      "scrollX": true,
      "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormValidasiDokumen/reload",
            "type": "GET"
          },
          // 'columnDefs': [{
          //   'targets': 0,
          //   'searchable':false,
          //   'orderable':false,
          //   'className': 'dt-body-center',
          //   'render': function (data, type, row){
          //     return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
          //     + $('<div/>').text(row['no_pk']).html() + '">';
          //   }
          // },
          // ],
          "order": [[ 0, 'asc' ]],
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 15;
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
          // { "data": null},
          { "data": null},
          // { "data": "sts_asuransi"},
          { "data": "no_polis" },
          { "data": "namaasuransi" },
          { "data": "namaprod" },
          { "data": "no_pk" },
          { "data": "namacabang" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "pekerjaan" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "rate" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaposisi" },
            { "data": "plafon", "render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'Rp. ') },

            ],
          
        });

      table2.on( 'order.dt search.dt', function () {
            table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
           table2.ajax.reload();

      // body...
    }

            });
          </script>
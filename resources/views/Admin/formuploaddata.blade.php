<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon">
                <i class="flaticon-file"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Form Data Kumpulan
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
              <button type="submit" id="printNm" name="print_nm" class="btn btn-accent" title="Print Nm">
                <i class="la la-print"></i>
              </button>
              <!-- <a href="/printnm" m-portlet-tool="Add" title="Print NM" class="m-portlet__nav-link m-portlet__nav-link--icon"> -->
                <!-- </a> -->
              </li>
              <li class="m-portlet__nav-item">
                <button type="submit" id="addData" name="Add_data" class="btn btn-accent" title="Add Data Kumpulan">
                  <i class="la la-plus"></i>
                </button>
                <!-- <a href="#" m-portlet-tool="" title="Add Data Kumpulan" class="m-portlet__nav-link m-portlet__nav-link--icon"> -->
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
          <div class="m-portlet__body">
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormKlaimUpload" method="post" enctype="multipart/form-data" action>
              <div class="form-group m-form__group row">
                <div class="col-lg-12">
                  <label class="">
                    Tanggal Registrasi
                  </label>
                  <div class="input-daterange input-group datepicker-demo">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalRegistrasi" name="tanggal_registrasi" autocomplete="off"  placeholder="Enter Tanggal Lahir" />
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
                  <label>
                    Jenis Asuransi:
                  </label>
                  <select class="form-control m-input m-input--air m-input--pill" id="jenisAsuransi" name="jenis_asuransi" >
                    <option value="">--Select--</option>
                    @foreach($jenisasuransi as $jenis)
                    <option value="{{$jenis->kode_prod}}">
                      {{$jenis->nama}}
                    </option>
                    @endforeach
                  </select>
                  <span class="m-form__help">
                    <!-- Please choose jenis asuransi -->
                  </span>
                </div>
                <div class="col-lg-12">
                  <label class="">
                    File 
                  </label>
                  <input type="file" class="form-control m-input m-input--air m-input--pill" id="fileExcel" name="file_excel"  >
                  <div>
                    <span class="m-form__help">
                      <!-- Please upload file -->
                    </span>
                  </div>
                </div>
                
                <div class="col-lg-12">
                  <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                      <div class="row">
                        <button type="submit" id="ProsesSaveSatuan" name="ProsesSaveSatuan" class="btn btn-info">
                          Save
                          <i class="flaticon-file-1"></i>
                        </button>
                        <div class="col-lg-12 m--align-right">
                          <button type="submit" id="kirimKeAsuransi" name="kirimKeAsuransi" class="btn btn-accent">
                            <i class="flaticon-paper-plane"></i>
                            Kirim Ke Asuransi
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end::Form-->
              </form>
            </div>
            <!--end::Portlet-->
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="m-portlet">
  <!-- <div class="m-portlet__head">
    <div class="m-portlet__head-tools">
      <ul class="m-portlet__nav">
        <li class="m-portlet__nav-item">
          <button class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
            <i class="la la-send"></i>
            Kirim Ke Asuransi
          </button>
          <!-- <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air"> -->
        <!-- </li>
        <li class="m-portlet__nav-item"></li>
        <li class="m-portlet__nav-item">
          <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
            <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
              <i class="la la-ellipsis-h m--font-brand"></i>
            </a>
            <div class="m-dropdown__wrapper">
              <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
              <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                              <div class="m-dropdown__content">
                                <ul class="m-nav">
                                  <li class="m-nav__section m-nav__section--first">
                                    <span class="m-nav__section-text">
                                      Quick Actions
                                    </span>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-share"></i>
                                      <span class="m-nav__link-text">
                                        Create Post
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-chat-1"></i>
                                      <span class="m-nav__link-text">
                                        Send Messages
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                      <span class="m-nav__link-text">
                                        Upload File
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__section">
                                    <span class="m-nav__section-text">
                                      Useful Links
                                    </span>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-info"></i>
                                      <span class="m-nav__link-text">
                                        FAQ
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                      <span class="m-nav__link-text">
                                        Support
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                  <li class="m-nav__item m--hide">
                                    <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                      Submit
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> - -->
              <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                  <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormKlaimUploadd" method="post" enctype="multipart/form-data" action>
                    <div class="m-portlet__head">
                      <div class="m-portlet__head-tools">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" id="kirimKeAsuransi" name="kirimKeAsuransi" class="btn btn-accent">
                          <i class="flaticon-paper-plane"></i>
                          Kirim Ke Asuransi
                        </button>
                        <span class="m-portlet__head-icon">
                          <!-- <i class="flaticon-file"></i> -->
                        </span>
                        <h3 class="m-portlet__head-text">
                          <!-- Form Data Kumpulan -->
                        </h3>
                      </div>
                    </div>

                    <div id="data-tables">
                      <!--Basic example-->
                      <div class="panel panel-light">
                        <div class="panel-body table-responsive">
                          <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th>
                                <th>Status</th>
                                <th>No. Kwitansi</th>
                                <th>No. Pinjaman Kredit</th>
                                <th>Cabang Bank</th>
                                <th>Nama Debiturk</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
                                <th>Tenor</th>
                                <th>Tgl Akad Kredit</th>
                                <th>Tgl Akhir Kredit</th>
                                <th>Plafon</th>
                                <th>Rate</th>
                                <th>Premi</th>
                                <!-- <th>Umur</th> -->
                                <th>Jenis Asuransi</th>
                              </tr>
                            </thead>
                            <tbody>

                              <!-- Data Table Goes Here -->

                            </table>
                          </div>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>

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
  </div>

  <div class="modal fade" id="updateEventModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="myModalLabel">Form Update Data Satuan</h3>
        </div>
        <div class="modal-body">
          <form class="m-form m-form--fit m-form--label-align-right" id="form-updatee-modal" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
              <div class="col-md-12">
                <label >
                  Jenis Asuransi
                </label>
                <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk" readonly>
                <select class="form-control m-input m-input--air m-input--pill" id="jenisAsuransi" name="jenis_asuransi" required>
                  <option value="">--Select--</option>
                  @foreach($jenisasuransi as $jenis)
                  <option value="{{$jenis->kode_prod}}">
                    {{$jenis->nama}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <label >
                  No Kredit
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="noKredit" name="no_kredit"  >  
              </div>
              <div class="col-md-12">
                <label >
                  Nama Debitur
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur"  >
              </div>
              <div class="col-md-12">
                <label >
                  Tanggal Lahir
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="tglLahir" name="tgl_lahir"  >
              </div>
              <div class="col-md-12">
                <label >
                  Umur
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="Umur" name="umur"  >
              </div>
              <div class="col-md-12">
                <label >
                  Tanggal Akad Kredit
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="tglAwal" name="tgl_awal"  >
              </div>
              <div class="col-md-12">
                <label >
                  Plafon Kredit
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill" id="Plafon" name="plafon"  >
              </div>
              <div class="col-md-12">
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                      <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonUpdateNewData" name="buttonUpdateNewData">
                        Save Data
                        <i class="flaticon-file-1"></i>
                      </button>
                    </div>
                  </div>
                </div>
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
          });

    function initPage(){
      $('.datepicker-demo').datepicker({
        format: 'dd-mm-yyyy'
      });

      var $addEventModal = $('#addEventModal');
      $addEventModal.appendTo('body');

      var table = $('#data-table-example2').DataTable({
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
                { "data": "sts_asuransi"},
                { "data": "no_kwitansi" },
                { "data": "no_pk" },
                { "data": "kode_client" },
                { "data": "debitur" },
                { "data": "tgl_lahir" },
                { "data": "tenor" },
                { "data": "tgl_awal" },
                { "data": "tgl_akhir" },
                { "data": "plafon" },
                { "data": "rate" },
                { "data": "premi" },
                { "data": "umur" },
                { "data": "nama" },
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

      // table.on( 'order.dt search.dt', function () {
      //       table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
      //           cell.innerHTML = i+1;
      //       } );
      //   } ).draw();
      $('#data-table-example2 tbody')
      .on( 'mouseenter', 'td', function () {
        var colIdx = table.cell(this).index().column;
            // alert(colIdx);
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
          } );

      $('#data-table-example2 tbody').on( 'click', 'td', function () {
        var valueIdx = table.row( this ).data();
        var visIdx = $(this).index();
        var dataIdx = table.column.index( 'fromVisible', visIdx );
          // clearModal();
          if (dataIdx != 0){
            // ... do something with `rowData`
            tableText(valueIdx);
          }
        } );

      const numberWithCommas = (x) => {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      $('#example-select-all').on('click', function(){
            // Check/uncheck all checkboxes in the table
            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);

            var rows, checked;
            rows = $('#example').find('tbody tr');
            // alert(rows);
            checked = $(this).prop('checked');
            // alert(rows);
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

        

        function clearModal(){
          $(".modal-body").find("#Debitur").val('');
          $(".modal-body").find("#no_Pk").val('');
          $(".modal-body").find("#noKwitansi").val('');
        }
        
        function tableText(valueIdx) {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                //modal cetak 

                $(".modal-body").find("#Debitur").val(valueIdx['debitur']);
                $(".modal-body").find("#no_Pk").val(valueIdx['no_pk']);
                $(".modal-body").find("#jenisAsuransi").val(valueIdx['jenis_asuransi']);
                $(".modal-body").find("#tglLahir").val(valueIdx['tgl_lahir']);
                $(".modal-body").find("#Umur").val(valueIdx['umur']);
                $(".modal-body").find("#tglAwal").val(valueIdx['tgl_awal']);
                $(".modal-body").find("#Plafon").val(valueIdx['plafon']);

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
          //       if (dataIdx != 0){
          //         // ... do something with `rowData`
          //         tableText(valueIdx['no_pin']);
          // }

        }

        // function viewupdatemodal(){
        //   $updateEventModal.modal('show');
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
        var $form_modall = $('#form-update-modal');
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
          case 'ProsesSaveSatuan':
          alert(buttonPressed);
          var tgl_reg = formData.get('tanggal_registrasi');
          var jns_asuransi = formData.get('jenis_asuransi');
          var file = formData.get('file_excel');
          if(tgl_reg == '' || tgl_reg == null){
            alert('Input Tanggal Registrasi');
          }else if(jns_asuransi =='' || jns_asuransi ==null){
            alert('Pilih Jenis Asuransi');
          }else if(file =='' || file == null){
            alert('Upload file');
          }else{
            $.ajax({
              type: 'POST',
              url : "./Dokumen/upload",
              enctype: 'multipart/form-data',
                  data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  contentType: false,       // The content type used when sending data to the server.
                  cache: false,             // To unable request pages to be cached
                  processData:false,
                  success : function (data) {
                    alert(data.messages)
                  }
                });
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
                { "data": "sts_asuransi"},
                { "data": "no_kwitansi" },
                { "data": "no_pk" },
                { "data": "kode_client" },
                { "data": "debitur" },
                { "data": "tgl_lahir" },
                { "data": "tenor" },
                { "data": "tgl_awal" },
                { "data": "tgl_akhir" },
                { "data": "plafon" },
                { "data": "rate" },
                { "data": "premi" },
                { "data": "umur" },
                { "data": "nama" },
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

      $('#form-update-modal').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        for (var pair of formData.entries()) {
          console.log(pair[0]+ ', ' + pair[1]);
        }
        var no_pk = formData.get('no_pk');
        $.ajax({
          type: 'GET',
          url : "./UpdateNoKwitansi/" + no_pk,
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'start_number' || data.status == 'new_number'){
                  var setNoKwitansi = $(".modal-body").find("#noKwitansi").val(data.dokumens);
                  if(setNoKwitansi){
                    alert(setNoKwitansi);
                    window.open("./CetakKwitansi/" + no_pk, '_blank');
                  }
                  // if (win) {
                  //   //Browser has allowed it to be opened
                  //   win.focus();
                  // } else {
                  //   //Browser has blocked it
                  //   alert('Please allow popups for this website');
                  // }
                  // reloadTable();
                }else {
                  alert(data.message);
                }
              }
            });
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

      $("#buttonCetakKwitansi").on('click', function(e) {
        e.preventDefault();
        $("#form-update-modal").submit();
        alert('ok');
      });

      $("#buttonUpdateData").on('click', function(ev) {
        ev.preventDefault();
        $('#updateEventModal').modal('show');
          // $("#form-updatee-modal").submit();
        });

      $("#buttonUpdateNewData").on('click', function(ev) {
        ev.preventDefault();
        $("#form-updatee-modal").submit();
      });

      $('#form-updatee-modal').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        for (var pair of formData.entries()) {
          console.log(pair[0]+ ', ' + pair[1]);
        }
        var no_pk = formData.get('no_pk');
        // alert(no_pk);
        $.ajax({
          type: 'POST',
          url : "./PenutupanSatuan/update",
          enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'start_number' || data.status == 'new_number'){
                  $(".modal-body").find("#noKwitansi").val(data.dokumens);
                  // alert(data.dokumens);
                  // $addEventModal.modal('hide');

                  // reloadTable();
                }else {
                  alert(data.message);
                }
              }
            });
      });

      $('#printNm').on('click', function(){
        window.open("./printNm", '_blank');
          // var win = 
        });
      $('#addData').on('click', function(){
        $("#FormKlaimUpload").find("#tanggalRegistrasi").val('');
        $("#FormKlaimUpload").find("#jenisAsuransi").val('');
        $("#FormKlaimUpload").find("#fileExcel").val('');
      });


      

    });
  </script>
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
                  <label>Akses User</label>
                  <div class="m-radio-inline">
                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Lunas" class="form-control m-input m-input--air m-input--pill" >
                          Client/Bank
                          <span></span>
                      </label>

                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Belum Bayar">
                          Brokers
                          <span></span>
                      </label>
                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Kurang Bayar">
                          Asuransi
                          <span></span>
                      </label>
                </div>
              </div>
              <div class="col-lg-12">
                  <label>
                    Pilih Brokers
                  </label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <select class="form-control m-input m-input--air m-input--pill" id="jenisBank" name="jenis_bank" required>
                  <option value="">--Select--</option>
                    @foreach($broker as $jenis)
                    <option value="{{$jenis->kode_broker}}">
                    {{$jenis->nama}}
                    </option>
                    @endforeach
                  </select>
                  <span class="m-form__help">
                    Please enter your full name
                  </span>
                </div>
              <div class="col-lg-12">
                  <label>
                    Pilih Asuransi
                  </label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <select class="form-control m-input m-input--air m-input--pill" id="jenisBank" name="jenis_bank" required>
                  <option value="">--Select--</option>
                    @foreach($broker as $jenis)
                    <option value="{{$jenis->kode_broker}}">
                    {{$jenis->nama}}
                    </option>
                    @endforeach
                  </select>
                  <span class="m-form__help">
                    Please enter your full name
                  </span>
                </div>
              
              <div class="col-lg-12">
                  <label>
                    Pusat Client
                  </label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <select class="form-control m-input m-input--air m-input--pill" id="jenisBank" name="jenis_bank" required>
                  <option value="">--Select--</option>
                    @foreach($broker as $jenis)
                    <option value="{{$jenis->kode_broker}}">
                    {{$jenis->nama}}
                    </option>
                    @endforeach
                  </select>
                  <span class="m-form__help">
                    Please enter your full name
                  </span>
                </div>
              
                <div class="col-lg-12">
                    <label class="">
                      Nama User
                    </label>
                    <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaUser" name="username" aria-describedby="" placeholder="Enter No. Sertifikat" required>
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter credit number -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-12">
                    <label class="">
                      Password:
                    </label>
                    <input type="password" class="form-control m-input m-input--air m-input--pill" id="Password" name="password" aria-describedby="emailHelp" placeholder="Enter nomor kredit" required>
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
        <div class="m-stack__item m-stack__item--left" style="width: 40%; background-color: white;">
                                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormRekonsiliasi" method="post" enctype="multipart/form-data" action>
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
                  <option value="">--Select--</option>
                    
                  </select>
                  <span class="m-form__help">
                    Please enter your full name
                  </span>
                </div>
                
                 <div class="col-lg-6">
                  <label>Status</label>

                  <div class="m-radio-list">
                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Lunas" class="form-control m-input m-input--air m-input--pill" >
                          Lunas
                          <span></span>
                      </label>

                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Belum Bayar">
                          Belum Bayar
                          <span></span>
                      </label>
                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Kurang Bayar">
                          Kurang Bayar
                          <span></span>
                      </label>

                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Lebih Bayar">
                          Lebih Bayar
                          <span></span>
                      </label>
                      <label class="m-radio m-radio--bold m-radio--state-success">
                          <input type="radio" name="checkradio" value="Semua">
                          Semua
                          <span></span>
                      </label>
                </div>
              </div>
              <div class="col-lg-12">
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                      <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <button type="submit" id="ProsesSaveSatuan" name="ProsesSaveSatuan" class="btn btn-info">
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
                    <!-- <th>Umur</th> -->
                    <th>Tgl Akad Kredit</th>
                    <th>Tgl Akhir Kredit</th>
                    <th>Jenis Asuransi</th>
                    <th>Posisi</th>
                  </tr>
              </thead>
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

<div class="col-md-12 padding-bottom-15">
                <div id="treeview">
                    <input type="hidden" name="akses_user" id="akses_user">
                    <div id="jstree-demo2"></div>
                </div>
            </div>
<form action="#" method="post" id="formsubmit">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-md-6">
                <label class="control-label">Posisi</label>
                <select name="posisi" id="posisi" class="form-control" id="Selectbox">
                    <option value="0">-</option>
                    @foreach ($posisi as $row)
                        @if ($row->id == $data->posisi)
                        <option selected value="{{$row->id}}">{{$row->posisi}}</option>
                        @else
                        <option value="{{$row->id}}">{{$row->posisi}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="control-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{$data->nama_lengkap}}" />
            </div>
            <div class="col-md-6">
                <label class="control-label">Perusahaan</label>
                <select name="perusahaan" class="form-control" id="perusahaan">
                    <option value="0">-</option>
                    @foreach ($master_leasing as $row)
                        @if ($row->id_leasing == $data->perusahaan)
                        <option selected value="{{$row->id_leasing}}">{{$row->nama_leasing}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="control-label">Cabang</label>
                <select name="cabang" class="form-control" id="cabang">
                    <option value="0">-</option>
                    @foreach ($master_leasing_cabang as $row)
                        @if ($row->id_leasing_cabang == $data->cabang)
                        <option selected value="{{$row->id_leasing_cabang}}">{{$row->nama_ls_cabang}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="control-label">Nama User</label>
                <input type="text" name="name" class="form-control" value="{{$data->name}}"/>
            </div>
            <div class="col-md-6">
                <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control" value="{{$data->password}}"/>
            </div>
            <div class="col-md-6 col-md-offset-0">
                <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$data->email}}"/>
            </div>
            <div class="col-md-12 padding-bottom-15">
                <label class="control-label">Keterangan</label>
                <textarea name="keterangan" class="form-control">{{$data->keterangan}}</textarea>
            </div>
            <div class="col-md-12 padding-bottom-15">
                <div id="treeview">
                    <input type="hidden" name="akses_user" id="akses_user">
                    <div id="jstree-demo2"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input id="submit" type="submit" class="btn btn-info btn-pretty" value="Simpan" />
            </div>
        </div>
    </form>
<div < id="tree-container"></div>
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
            "url": "./PenutupanKumpulan/reload",
            "type": "GET"
          },
          'columnDefs': [{
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
            }
          }],
          "order": [[ 1, 'asc' ]],
          "columns" : [
            { "data": null},
            { "data": "sts_asuransi"},
            { "data": "no_polis" },
            { "data": "kode_asu" },
            { "data": "no_pk" },
            { "data": "kode_client" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "no_debitur" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "plafon" },
            { "data": "rate" },
            { "data": "premi" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "asuransi_bank" },
            { "data": null },
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

          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
      });
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
                $("#FormRekonsiliasi").find("#no_Pk").val(valueIdx['no_pk']);
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

        $('#tree-container').jstree({
      'plugins': ["wholerow", "checkbox"],
        'core' : {
            'data' : {
                "url" : "response.php",
                "plugins" : [ "wholerow", "checkbox" ],
                "dataType" : "json" // needed only if you do not supply JSON headers
            }
        }
    }) 
          
        $("#bayarPremi").on('keypress ', function(event) {
          event.preventDefault();
          if (event.keyCode === 13) {
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
                var status = 'Lunas';
              }else if(selisih > 0 && selisih < premii){
                var status = 'Kurang Bayar';
              }else if(selisih > premii){
                var status = 'Lebih Bayar';
              }
            }
            
        }
          $("#FormRekonsiliasi").find('#Selisih').val('');
            $("#FormRekonsiliasi").find('#Status').val('');
            $("#FormRekonsiliasi").find('#Selisih').val(selisih);
            $("#FormRekonsiliasi").find('#Status').val(status);
        });

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
              var status = 'Lunas';
            }else if(selisih > 0 && selisih < premi){
              var status = 'Kurang Bayar';
            }else if(selisih > premi){
              var status = 'Lebih Bayar';
            }
          }
          $("#FormRekonsiliasi").find('#Selisih').val(selisih);
          $("#FormRekonsiliasi").find('#Status').val(status);
        });

        $("#bayarPremi").on('change', function(ev) {
          ev.preventDefault();
          var premii = $("#FormRekonsiliasi").find('#Premi').val();
          var bayarpremii = $("#FormRekonsiliasi").find('#bayarPremi').val();
          var selisih = 0;
          if(premii >= bayarpremii){
            selisih = premii- bayarpremii;
          }else if(premii <= bayarpremi){
            selisih = bayarpremii-premii;
          }

          if(premii != 0 || premii != ''){
            if(selisih == 0){
              var status = 'Lunas';
            }else if(selisih > 0 && selisih < premii){
              var status = 'Kurang Bayar';
            }else if(selisih > premii){
              var status = 'Lebih Bayar';
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
                  alert(data.messages);
                }else {
                  alert(data.messages);
                }
              }
            });
        });

    });
</script>


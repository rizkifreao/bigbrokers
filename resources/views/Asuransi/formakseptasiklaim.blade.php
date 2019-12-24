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
                Form Kirim Klaim
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
          <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormAkseptasi" method="post" enctype="multipart/form-data" action>
              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label class="">
                      Tanggal Aksep
                    </label>
                      <div class="input-daterange input-group datepicker-demo">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalAksep" name="tanggal_aksep" autocomplete="off"  placeholder="Enter Tanggal Lahir" required />
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
                <div class="col-lg-6 ">
                  <button type="submit" id="ProsesAkseptasiAsuransi" name="ProsesAkseptasiAsuransi" class="btn btn-info">
                    Akseptasi Asuransi  
                    <i class="flaticon-up-arrow"></i>
                   </button>
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
                    <th>Tanggal Lapor</th>
                        <th>Tanggal Kejadian</th>
                        <th>Jenis Klaim</th>
                        <th>Nama Debitur</th>
                        <th>Nama Asuransi</th>
                        <th>Nilai Klaim</th>
                        <th>DiBayar</th>
                        <th>Status Klaim</th>
                        <th>Tanggar Bayar</th>
                        <th>Posisi</th>
                        <th>No Sertifikat</th>
                        <th>No Pinjaman Kredit</th>
                        <!-- <th>Umur</th> -->
                        <th>Cabang Bank</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Tenor</th>
                        <th>Plafon</th>
                        <th>Premi</th>
                        <!-- <th>Umur</th> -->
                        <th>Tanggal Akad Kredit</th>
                        <th>Tanggal Akhir Kredit</th>
                        <th>Jenis Asuransi</th>
                        <th>Kredit</th>
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
                  <td></td>
                  <td></td>
                  <td>Totals</td>
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
          "decimal": ",",
          "thousands": ".",
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormAkeptasiKlaim/reload",
            "type": "GET"
          },
          'columnDefs': [{ 
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" nopolis="'+ row['no_polis'] +'" kodeprod="'+ row['kode_prod'] +'" nopk="'+ row['no_pk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
            }
          },
          ],
          "paging" : false,
          "order": [[ 1, 'asc' ]],
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
              var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
              $( api.column( j ).footer() ).html(numFormat(pageTotal));
              j++;
            } 
          },
      "columns" : [
            { "data": null},
            { "data": "tgl_lapor"},
          { "data": "tgl_kejadian" },
          { "data": "jns_klaim" },
          { "data": "debitur" },
          { "data": "nama" },
          { "data": "nilai_klaim","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "dibayar","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "stsklaim"},
          { "data": "tglbayar"},
          { "data": "namaposisi"},
          { "data": "no_polis"},
          { "data": "no_pk"},
          { "data": "namaclient"},
          { "data": "tgl_lahir"},
          { "data": "umur"},
          { "data": "tenor"},
          { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "premi","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "tgl_awal"},
          { "data": "tgl_akhir"},
          { "data": "namaprod"},
          { "data": "nama"},
          ],

          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
      });

    //   Number.prototype.format = function(n, x, s, c) {
    // var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
    //     num = this.toFixed(Math.max(0, ~~n));
    
    // return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
// };
      $('#example-select-all').on('click', function(){
            // Check/uncheck all checkboxes in the table
            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
            // $('input[type="text"]', rows)..prop('disabled', this.disabled);

            var rows, checked, disabled;
            rows = $('#example').find('tbody tr');
            // alert(rows);
            checked = $(this).prop('checked');
            // disabled = $(this).prop('disabled');
            // if(checked == true){
            // // $('input[type="text"]', rows).prop('disabled', true);
            // disabled = $('input[type="text"]', rows).prop('disabled', false);
            // }else{
            // disabled = $('input[type="text"]', rows).prop('disabled', true);
            

            // }
            // alert(rows);
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
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // s
                // $addEventModal.modal('show');
        }

        

    };

    $(document).ready(function() {
      var $addEventModal = $('#addEventModal');

      $('#jenisAsuransi').on('change', function (ev) {
          if ($('#jenisAsuransi').val() != '') {
            var jeniscln = $('#jenisAsuransi').val();

            // alert(asuransiId);
            reloadTableByjnsCln(jeniscln);
          }else {
            alert('pilih tanggal periode mulai');
          }
        });

      function reloadTableByjnsCln(jenisClient){
        $('#data-table-example2').DataTable().destroy();
        $('#data-table-example2 tbody').empty();
           var table2 = $('#data-table-example2').DataTable({
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormAkeptasiKlaim/reloadby/"+jenisClient,
            "type": "GET"
          },
          'columnDefs': [{
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" nopolis="'+ row['no_polis'] +'" kodeprod="'+ row['kode_prod'] +'" nopk="'+ row['no_pk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
            }
          }],
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
            { "data": null},
            { "data": "sts_asuransi"},
            { "data": "nama"},
            { "data": "namacabang" },
            { "data": "no_pk" },
            { "data": "debitur" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "tgl_lahir" },
            { "data": "tenor" },
            { "data": "umur" },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "rate" },
            { "data": "premi","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },

          ],
          //  }
      });
           table2.ajax.reload();
           $('#example-select-all').prop('checked', false);
          $('#example-select-all').on('click', function(){
            // Check/uncheck all checkboxes in the table
            var rows = table2.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
            // $('input[type="text"]', rows).prop('disabled', true);

            // var rows, checked;
            // rows = $('#example').find('tbody tr');
            // // alert(rows);
            // checked = $(this).prop('checked');
            // alert(rows);
          });
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
        }

      

      $('#FormAkseptasi').on('submit', function (e) {
            e.preventDefault();
            //var form = this;
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
            //              .attr('type', 'text')
            //              .attr('name', this.name)
            //              .val(this.value)
            //        );
            //     }
            //  }
            // });

            // Insert Checked Data to an Array
            var dokumenIDs = $("#data-tables input:checkbox:checked").map(function(){
              return $(this).attr('nopk');
            }).get();
            var dokumenID2 = $("#data-tables input:checkbox:checked").map(function(){
              return $(this).attr('kodeprod');
            }).get();
            var dokumenID3 = $("#data-tables input:checkbox:checked").map(function(){
              return $(this).attr('nopolis');
            }).get();
            // var x = [];
            var d = $('#jenisAsuransi option:selected').attr('kode');
     
    // d.counter++;
 
    // table
    //     .row( this )
    //     .data( d )
    //     .draw();
            // alert(x);
            formData.append('kode_asu', d);
            formData.append('checklistData', dokumenIDs);
            formData.append('kode_prod', dokumenID2);
            formData.append('polis', dokumenID3);
            // alert(dokumenIDs);
            if(dokumenIDs == '' || dokumenIDs == null){
            // Output form data to a console
              alert('Data Belum Di Pilih');
            }
            else{
              for (var pair of formData.entries('kode_prod')) {
                console.log(pair[0]+ ', ' + pair[1]);
              }

            // alert(formData);
              $.ajax({
                type: 'POST',
                url : "./KlaimAkseptasiAsuransi",
                enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                    if(data.status == 'success'){
                    reloadtable2();
                      alert(data.message);
                    }
                    // else{
                    //   alert('akseptasi gagal');
                    // }
                }
              });
          }
        });

      function reloadtable2(){
        $('#data-table-example2').DataTable().destroy();
        $('#data-table-example2 tbody').empty();
           var table2 = $('#data-table-example2').DataTable({
          "decimal": ",",
          "thousands": ".",
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormAkeptasiKlaim/reload",
            "type": "GET"
          },
          'columnDefs': [{ 
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" nopolis="'+ row['no_polis'] +'" kodeprod="'+ row['kode_prod'] +'" nopk="'+ row['no_pk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
            }
          },
          ],
          "paging" : false,
          "order": [[ 1, 'asc' ]],
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
              var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
              $( api.column( j ).footer() ).html(numFormat(pageTotal));
              j++;
            } 
          },
      "columns" : [
            { "data": null},
            { "data": "tgl_lapor"},
          { "data": "tgl_kejadian" },
          { "data": "jns_klaim" },
          { "data": "debitur" },
          { "data": "nama" },
          { "data": "nilai_klaim","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "dibayar","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "stsklaim"},
          { "data": "tglbayar"},
          { "data": "namaposisi"},
          { "data": "no_polis"},
          { "data": "no_pk"},
          { "data": "namaclient"},
          { "data": "tgl_lahir"},
          { "data": "umur"},
          { "data": "tenor"},
          { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "premi","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "tgl_awal"},
          { "data": "tgl_akhir"},
          { "data": "namaprod"},
          { "data": "nama"},
          ],

          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
      });
      table2.ajax.reload();
      
           $('#example-select-all').prop('checked', false);
          $('#example-select-all').on('click', function(){
            // Check/uncheck all checkboxes in the table
            var rows = table2.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
            // $('input[type="text"]', rows).prop('disabled', true);

            // var rows, checked;
            // rows = $('#example').find('tbody tr');
            // // alert(rows);
            // checked = $(this).prop('checked');
            // alert(rows);
          });
      }

    });
</script>
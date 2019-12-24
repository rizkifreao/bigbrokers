<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon">
                <i class="flaticon-file-1"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Form Master User
              </h3>
            </div>
          </div>
          <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
              <!-- <li class="m-portlet__nav-item"> -->

               <li class="m-portlet__nav-item">
                <button type="submit" id="addData" name="Add_data" class="btn btn-accent" title="Data Baru">
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

      <div class="m-portlet__body">
        <div class="m-portlet__body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#m_tabs_1_1">
                Produk
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">
                Produk Asuransi Satuan
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
              <div class="row">
                <div class="col-md-6">
                  <h3>Input Satuan</h3>
                  <form class="m-form m-form--fit m-form--label-align-right" id="FormAddProduk" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="form-group m-form__group row">
                      <div class="col-lg-12">
                        <label class="">
                          Kode Produksi
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodeProduk" name="kode_prod">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Nama Produksi
                        </label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaProduk" name="nama"  >
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12" align="right">
                                <button  type="submit" id="SimpanProduksi" name="SimpanProduksi" class="btn btn-info">
                                  Simpan Produksi
                                  <i class="flaticon-file-1"></i>
                                </button>
                        <!-- </form> -->
                      </div>

                    </div>
                  </form>
                </div>
                <div class="col-md-5">
                  <h3>Upload Kumpulan</h3>
                  <form class="m-form m-form--fit m-form--label-align-right" id="FormAddProduk" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="form-group m-form__group row">
                      <div class="col-lg-12">
                        <label class="">
                          File Upload
                        </label>
                        <input type="file" class="form-control m-input m-input--air m-input--pill" id="fileUploadProduk" name="file_upload_produk">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12" align="right">
                                <button  type="submit" id="SimpanProduksi" name="SimpanProduksi" class="btn btn-info">
                                  Upload
                                  <i class="flaticon-file-1"></i>
                                </button>
                        <!-- </form> -->
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>
            
            <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
              <div class="row">
                <div class="col-md-5">
                  <div id="data-tables">
                    <!--Basic example-->
                    <div class="panel panel-light">
                      <div class="panel-body table-responsive">
                        <table id="data-table-example3" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                          <thead width="100%">
                            <tr>
                              <th>Kode </th>
                              <th>Tenor</th>
                              <th>Umur</th>
                              <th>Rate</th>
                              <th>Okupasi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <!-- Data Table Goes Here -->

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                  <h3>Input Satuan</h3>
                  <form class="m-form m-form--fit m-form--label-align-right" id="FormAddProdukAsuransi" method="post">
                    <div class="form-group m-form__group row">
                      <div class="col-lg-12">
                        <label class="">
                          Pilih Brokerr
                        </label>
                        <select class="form-control m-input m-input--air m-input--pill" id="Broker" name="broker" required>
                          <option value="">-Select-</option>
                          @foreach($broker as $brokers)
                          <option value="{{$brokers->kode_broker}}">{{$brokers->nama}}</option>
                          @endforeach
                        </select>
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Pilih Jenis Produk  
                        </label>
                        <select class="form-control m-input m-input--air m-input--pill" id="jenisProduk" name="jenis_produk" required>
                          <option value="">-Select-</option>
                          @foreach($jenis_produksi as $produks)
                          <option value="{{$produks->kode_prod}}">{{$produks->nama}}</option>
                          @endforeach
                        </select>
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Okupasi 
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Okupasi" name="okupasi"  >
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Umur  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Umur" name="umur"  >
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Rate  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Rate" name="rate"  >
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Tenor  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Tenor" name="tenor"  >
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <button  type="submit" id="SimpanProduksiAsuransi" name="SimpanProduksiAsuransi" class="btn btn-info">
                          Simpan Produksi
                          <i class="flaticon-file-1"></i>
                        </button>
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                </form>
                <div class="col-md-3">
                  <h3>Upload Kumpulan</h3>
                  <form class="m-form m-form--fit m-form--label-align-right" id="FormAddProdukAsuransi" method="post">
                    <div class="form-group m-form__group row">
                      <div class="col-lg-12">
                        <label class="">
                         Upload File
                        </label>
                        <input type="file" class="form-control m-input m-input--air m-input--pill" id="fileProdukAsuransi" name="file_produk_asuransi"  >
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12" align="right">
                                <button  type="submit" id="SimpanProduksiAsuransi" name="SimpanProduksiAsuransi" class="btn btn-info">
                                  Upload
                                  <i class="flaticon-file-1"></i>
                                </button>
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                </form>
                
                </div>

                <div>

                </div>


              </div>

            </div>

            

          </div>

        </div>

      </div>
    </div>

    <div class="col-xl-12">
      <div class="m-portlet">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Checkable Tree
              </h3>
            </div>
          </div>
        </div>
        <div class="m-portlet__body">
          <div id="m_tree_3" class="tree-demo"></div>
        </div>
      </div>
    </div>
    <script src="../../assets/demo/default/custom/components/base/treeview.js" type="text/javascript"></script>
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


        var table3 = $('#data-table-example3').DataTable({
          "scrollY": 450,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./PenutupanKumpulan/reload/nosend",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "sts_asuransi"},
          { "data": "no_kwitansi" },
          { "data": "no_pk" },
          { "data": "kode_client" },
          { "data": "debitur" },
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

        var table4 = $('#data-table-example4').DataTable({
          "scrollY": 450,
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
        var inputSubmitActor = null;
        var $form = $('#FormAddProduk');
        var $submitActors = $form.find('button[type=submit]');
        var $inputSubmitActors = $form.find('input[type=submit]');

      // var submitActor = null;
      // var inputSubmitActor = null;
      // var $form = $('#FormAddProdukAsuransi');
      // var $submitActors = $form.find('button[type=submit]');
      // var $inputSubmitActors = $form.find('input[type=submit]');



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
        // alert(buttonPressed);
        switch (buttonPressed) {
          case 'SimpanProduksi':

          $.ajax({
            type: 'POST',
            url : "./MasterUser/AddProduk",
            enctype: 'multipart/form-data',
                  data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  contentType: false,       // The content type used when sending data to the server.
                  cache: false,             // To unable request pages to be cached
                  processData:false,
                  success : function (data) {

                  }
                });

          break;
          default:

        }
      });

      


      $submitActors.click(function(event) {
        submitActor = this;
        inputSubmitActor = this;
      });
      

      $("#SimpanProduksiAsuransi").on('click', function(e) {
          e.preventDefault();
          $("#FormAddProdukAsuransi").submit();
        });
        
        $('#FormAddProdukAsuransi').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]);
            }
            var no_pk = formData.get('kode_broker');
            alert(no_pk);
            $.ajax({
              type: 'POST',
              url : "./MasterUser/AddProdukAsuransi",
              enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'success'){
                  reloadTable4();
                  alert(data.messages)
                }else {
                  alert(data.message);
                }
              }
            });
        });


      

    });
  </script>
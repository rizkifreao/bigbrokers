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
                Form Configuration
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
                      <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="formsubmit" method="post" enctype="multipart/form-data" action>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="idUser" >
                        
                        <div class="form-group m-form__group row">
                          <div class="col-lg-6">
                            <label>Akses User</label>
                            <div class="m-radio-inline">
                              <label class="m-radio m-radio--bold m-radio--state-success">
                                <input type="radio" id="Chk1" name="jenis" value="client" class="form-control m-input m-input--air m-input--pill" >
                                Client/Bank
                                <span></span>
                              </label>

                              <label class="m-radio m-radio--bold m-radio--state-success">
                                <input type="radio" id="Chk2" name="jenis" value="broker">
                                Brokers
                                <span></span>
                              </label>
                              <label class="m-radio m-radio--bold m-radio--state-success">
                                <input type="radio" id="Chk3" name="jenis" value="asuransi">
                                Asuransi
                                <span></span>
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-9">
                            <label>
                              Pilih Brokers
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="jenisBroker" name="jenis_broker" >
                              <option value="">--Select--</option>
                              @foreach($broker as $jenis)
                              <option value="{{$jenis->kode_broker}}">
                                {{$jenis->nama}}
                              </option>
                              @endforeach
                            </select>
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                          <div class="col-lg-3">
                            <label>
                              Kode
                            </label>
                            <input type="text" name="kode_broker" id="kodeBroker" class="form-control m-input m-input--air m-input--pill">
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                          <div class="col-lg-9">
                            <label>
                              Pilih Asuransi
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="jenisAsuransi" name="jenis_asuransi" >
                              <option value="">--Select--</option>
                              @foreach($asuransi as $jenis)
                              <option value="{{$jenis->kode_asu}}">
                                {{$jenis->nama}}
                              </option>
                              @endforeach
                            </select>
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                          <div class="col-lg-3">
                            <label>
                              Kode
                            </label>
                            <input type="text" name="kode_asuransi" id="kodeAsuransi" class="form-control m-input m-input--air m-input--pill">
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                          
                          <div class="col-lg-9">
                            <label>
                              Pusat Client
                            </label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <select class="form-control m-input m-input--air m-input--pill" id="jenisBank" name="jenis_bank" >
                              <option value="">--Select--</option>
                              @foreach($pusat as $jenis)
                              <option value="{{$jenis->kode_pusat}}">
                                {{$jenis->nama}}
                              </option>
                              @endforeach
                            </select>
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                          <div class="col-lg-3">
                            <label>
                              Kode
                            </label>
                            <input type="text" name="kode_bank" id="kodeBank" class="form-control m-input m-input--air m-input--pill">
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                         <div class="col-lg-9">
                            <label>
                              Client/Bank
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="jenisClient" name="jenis_client" >
                              <option value="">--Select--</option>
                              @foreach($client as $jenis)
                              <option value="{{$jenis->kode_client}}">
                                {{$jenis->nama}}
                              </option>
                              @endforeach
                            </select>
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                          <div class="col-lg-3">
                            <label>
                              Kode
                            </label>
                            <input type="text" name="kode_client" id="kodeClient" class="form-control m-input m-input--air m-input--pill">
                            <span class="m-form__help">
                              <!-- Please enter your full name -->
                            </span>
                          </div>
                         <div class="col-lg-12">
                            <label class="">
                              Nama User
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaUser" name="username" aria-describedby="" placeholder="Enter No. Sertifikat" >
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
                            <input type="password" class="form-control m-input m-input--air m-input--pill" id="Password" name="password" aria-describedby="emailHelp" placeholder="Enter nomor kredit" >
                            <div>
                              <span class="m-form__help">
                                <!-- Please enter credit number -->
                              </span>
                            </div>
                          </div>
                          <div id="treeview">
                            <input type="hidden" name="akses_user" id="akses_user">
                            <div id="treee"></div>
                          </div>
                          <div class="col-lg-12">
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                              <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                  <button type="submit" id="ProsesRekon" name="ProsesRekon" class="btn btn-info">
                                    Simpan User
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
            <div class="m-stack__item m-stack__item--left" style="width: 50%; background-color: white;">
              <div id="data-tables" class="display select">
                <!--Basic example-->
                <div class="panel panel-light">
                  <div class="panel-body table-responsive">
                    <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Password</th>
                          <th>kode_client</th>
                          <th>Kode Pusat</th>
                          <th>Kode Broker</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <!-- Data Table Goes Here -->

                      </table>
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

      <!--end::Portlet-->
    </div>

  </div>
</div>

</div>

</div>
<!--Author      : @arboshiki-->

<!-- <p>JSTree radiobutton behaviour example using checkbox plugin.</p>
Multiselect:<input type="checkbox" id="multiselect" />
<div id="tree">tree loading</div>
<div id="log"></div>
<ul id="root"></ul> -->

<!-- <div id="treee">
    
</div> -->
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
            "url": "./Configuration/reload",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 0, 'asc' ]],
          "columns" : [
            { "data": "username" },
            { "data": "password" },
            { "data": "kode_client" },
            { "data": "kode_pusat" },
            { "data": "kode_broker" },
            { "data": null },

            ],
            'columnDefs': [{
              'targets': 5,
              'searchable':false,
              'orderable':false,
              'render': function (data, type, row){
                    return '<a href="#cekUser/edit/'+data["id_user"]+'"><button class="btn glyphicon glyphicon-download">Update</button></a><a href="#cekUser/delete/'+data["id_user"]+'"><button class="btn glyphicon glyphicon-download">Delete</button></a>';
               }
             },],
        });

          $('#data-table-example2').DataTable().ajax.reload();

      var table = $('#data-table-example2').DataTable();
      $('#data-table-example2 tbody').on( 'click', 'td', function () {
          var valueIdx = table.row( this ).data();
          var visIdx = $(this).index();
          var dataIdx = table.column.index( 'fromVisible', visIdx );
          if (dataIdx != 0){
            // ... do something with `rowData`
            tableText(valueIdx['username']);

          }
          tableText(valueIdx);
          
        });

        function tableText(valueIdx){
          for (var i = 1; i <= 3; i++) {
          var xz =  $('#formsubmit').find('#Chk'+i).val();
            if (xz == valueIdx['jenis']) {
              $('#formsubmit').find('#Chk'+i).prop('checked',true);
            }
          }
          $('#formsubmit').find('#idUser').val(valueIdx['id_user']);
          $('#formsubmit').find('#jenisBroker').val(valueIdx['kode_broker']);
          $('#formsubmit').find('#jenisAsuransi').val(valueIdx['kode_asu']);
          $('#formsubmit').find('#jenisBank').val(valueIdx['kode_pusat']);
          $('#formsubmit').find('#jenisClient').val(valueIdx['kode_client']);
          $('#formsubmit').find('#namaUser').val(valueIdx['username']);
          $('#formsubmit').find('#Password').val(valueIdx['password']);
          // $('#formsubmit').find('#jenisBroker').val(valueIdx['kode_broker']);
          // x;
          $.ajax({
            type: 'GET',
            url : "./cekUser/" +valueIdx['id_user'],
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,
            success : function (dataa) {
             x = dataa['akses_user'];
              $("#treee").jstree(true).uncheck_all();
                  $('#treee').addClass('jstree-custom-checkboxes');
                    for (i = 0; i < x.length; i++) { 
                      // text += cars[i] + "<br>";
                    $('#treee').jstree('select_node','#'+x[i]['akses']);
                    }
             }
             
          });

        }
        
        
      };
      $(document).ready(function () {
        var x = null;
        if(x != null){
            alert(x);
        }

       $('#Chk1').on('change', function(e){
          e.preventDefault();
            $("#formsubmit").find("#jenisBroker").prop("disabled", false);
            $("#formsubmit").find("#jenisAsuransi").prop("disabled", false);
            $("#formsubmit").find("#jenisBank").prop("disabled", false);
            $("#formsubmit").find("#jenisClient").prop("disabled", false);
          $("#formsubmit").find("#kodeBank").prop("disabled", false);
          $("#formsubmit").find("#kodeAsuransi").prop("disabled", false);
          $("#formsubmit").find("#kodeClient").prop("disabled", false);

        });
        $('#Chk2').on('change', function(e){
          e.preventDefault();
            $("#formsubmit").find("#jenisBroker").prop("disabled", false);
            $("#formsubmit").find("#jenisAsuransi").prop("disabled", true);
            $("#formsubmit").find("#jenisBank").prop("disabled", true);
            $("#formsubmit").find("#jenisClient").prop("disabled", true);
            $("#formsubmit").find("#kodeAsuransi").val('');
            $("#formsubmit").find("#kodeAsuransi").prop("disabled", true);
            $("#formsubmit").find("#kodeBank").val('');
            $("#formsubmit").find("#kodeBank").prop("disabled", true);
            $("#formsubmit").find("#kodeClient").val('');
            $("#formsubmit").find("#kodeClient").prop("disabled", true);
            $("#formsubmit").find("#jenisClient").val('');
            $("#formsubmit").find("#jenisAsuransi").val('');
          $("#formsubmit").find("#jenisBank").val('');
          // $("#formsubmit").find("#jenisBroker").prop("disabled", true);
          var kategori = $("#FormAddClient").find("#kategoriClient").val();
          if(kategori == 'PUSAT'){
            $("#FormAddClient").find("#SelectPusat").prop("disabled", true);
            $("#FormAddClient").find("#inputPusat").show();
            $("#FormAddClient").find("#SelectPusat").hide();
            $("#FormAddClient").find("#kodeClient").prop("disabled", true);
            $("#FormAddClient").find("#namaInstansi").prop("disabled", true);
            $("#FormAddClient").find("#feeClient").prop("disabled", true);
            $("#FormAddClient").find("#PphClient").prop("disabled", true);
            $("#FormAddClient").find("#feePb").prop("disabled", true);
            $("#FormAddClient").find("#pphPb").prop("disabled", true);
            $("#FormAddClient").find("#noRekening").prop("disabled", true);
            $("#FormAddClient").find("#noPerjanjian").prop("disabled", false);
            $("#FormAddClient").find("#masaPks").prop("disabled", false);
            $("#FormAddClient").find("#kodePusat").val('');
            $("#FormAddClient").find("#SelectPusat").val('');
            $("#FormAddClient").find("#kodeClient").val('');
            $("#FormAddClient").find("#namaInstansi").val('');
          }else if(kategori == 'CABANG' || kategori =='PEMBANTU'){
            $("#FormAddClient").find("#inputPusat").prop("disabled", true);
            $("#FormAddClient").find("#SelectPusat").prop("disabled", false);
            $("#FormAddClient").find("#inputPusat").hide();
            $("#FormAddClient").find("#SelectPusat").show();
            $("#FormAddClient").find("#kodeClient").prop("disabled", false);
            $("#FormAddClient").find("#namaInstansi").prop("disabled", false);
            $("#FormAddClient").find("#feeClient").prop("disabled", false);
            $("#FormAddClient").find("#PphClient").prop("disabled", false);
            $("#FormAddClient").find("#feePb").prop("disabled", false);
            $("#FormAddClient").find("#pphPb").prop("disabled", false);
            $("#FormAddClient").find("#noRekening").prop("disabled", false);
            $("#FormAddClient").find("#noPerjanjian").prop("disabled", true);
            $("#FormAddClient").find("#masaPks").prop("disabled", true);
            $("#FormAddClient").find("#kodePusat").val('');
            $("#FormAddClient").find("#inputPusat").val('');
          }
          
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });
        $('#Chk3').on('change', function(e){
          e.preventDefault();
            $("#formsubmit").find("#jenisBroker").prop("disabled", false);
            $("#formsubmit").find("#jenisAsuransi").prop("disabled", false);
            $("#formsubmit").find("#jenisBank").prop("disabled", true);
            $("#formsubmit").find("#jenisClient").prop("disabled", true);
          $("#formsubmit").find("#kodeBank").val('');
          $("#formsubmit").find("#kodeClient").val('');
          $("#formsubmit").find("#jenisClient").val('');
          $("#formsubmit").find("#jenisBank").val('');
          $("#formsubmit").find("#kodeBank").prop("disabled", true);
          $("#formsubmit").find("#kodeClient").val('');
          $("#formsubmit").find("#kodeClient").prop("disabled", true);
          $("#formsubmit").find("#kodeAsuransi").prop("disabled", false);
        });

        $('#jenisBroker').on('change', function(e){
          e.preventDefault();
          var kode_Brok = $("#formsubmit").find("#jenisBroker").val();
          // alert(kode_Brok);
          $("#formsubmit").find("#kodeBroker").val(kode_Brok);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });
        $('#jenisBank').on('change', function(e){
          e.preventDefault();
          var kode_Brok = $("#formsubmit").find("#jenisBank").val();
          // alert(kode_Brok);
          $("#formsubmit").find("#kodeBank").val(kode_Brok);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });
        $('#jenisClient').on('change', function(e){
          e.preventDefault();
          var kode_Brok = $("#formsubmit").find("#jenisClient").val();
          // alert(kode_Brok);
          $("#formsubmit").find("#kodeClient").val(kode_Brok);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });
        $('#jenisAsuransi').on('change', function(e){
          e.preventDefault();
          var kode_Brok = $("#formsubmit").find("#jenisAsuransi").val();
          // alert(kode_Brok);
          $("#formsubmit").find("#kodeAsuransi").val(kode_Brok);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });
    //     var x = $('#formsubmit').find('#jenisBroker');
    //     x.on('change',function() {
    //       // e.preventDefault();
    //   alert('ok');
    // });
     // $('#' + $(this).attr('data-div-id')).text($(this).val());
    // });
//         var inputs = document.getElementById('idUser');
//         input.addEventListener('input', function()
// {
//     alert('ok');
// });
  // inputs.addEventListener('change', function(e){
  //   var value = e.target.value;
  //   e.target.nextElementSibling.innerHTML = value;
  // });
        // $('#formsubmit').find('#idUser').on('EventTarget', function (e) {
        //   e.preventDefault();
          
        //   alert('ok');
        // });
        
        $('#FormAddBroker').on('submit', function (event) {
          event.preventDefault();
          var formData = new FormData(this);

          for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
          }
            // var kode_asuransi = formData.get('kode_broker');
            var value_select = formData.get('kode_broker');
            var text_select = formData.get('nama');
            // alert(no_pk);
            $.ajax({
              type: 'POST',
              url : "./MasterUser/AddBroker",
              enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'success'){
                  reloadTable4();
                  var x = $('#FormAddAsuransi').find('#Select1Broker');
                  var y = $('#FormAddClient').find('#SelectBroker2');
                  var o = $('<option/>', {value:value_select}).text(text_select).prop('selected', i == 0);
                  o.appendTo(x);
                  var p = $('<option/>', {value:value_select}).text(text_select).prop('selected', this.selected);
                  p.appendTo(y);
                  alert(data.messages)
                }else {
                  alert(data.message);
                }
              }
            });
          });

        $('#formsubmit').on('submit', function (e) {
          e.preventDefault();
          var arr = [];
          var itung = 0;
          var selectedElmsIds = [];
          var selectedElms = $('#treee').jstree("get_selected", true);
          $.each(selectedElms, function() {
            arr[itung] = this.id;
            itung++;
                    // alert(this.id)
                  });
          $("#akses_user").val(arr.join());
	  var formData = new FormData(this);
          var tgl_awal = formData.get('kode_broker');
          var name_button = $('#ProsesRekon').attr('value');
          var id_user = formData.get('iduser');
          var jenis = formData.get('jenis');
          var jenis_broker = formData.get('jenis_broker');
          var username = formData.get('username');
          var password = formData.get('password');

          if(jenis==null){
              alert('Pilih akses user');
            }else if(jenis_broker==''){
              alert('Pilih jenis broker');
            }else if(username==''){
              alert('Isi username');
            }else if(password==''){
              alert('Isi password');
            }else if(arr.length == 0){
              alert('Pilih menu');
            } else{
              $.ajax({
                type: 'POST',
                url : "/MasterUser/Tambah",
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success : function (data) {
                  alert(data.messages);
                  location.reload();
                  // window.location.replace("#Configuration")
                  // reloadtabel();
                }
              });
            }
        });
//   var $tree = $('#tree');
//   var resetting = false;
//   $('#tree').jstree("get_selected", true);
//   $('#tree').jstree({
//     "core": {
//       "data": [
//                 { id: "1", text: "Unit 1", parent: "#", state: { "opened": true }},
//                 { id: "2", text: "Unit 2", parent: "1", state: { "opened": true }},
//                 { id: "3", text: "Unit 3", parent: "1", state: { "opened": true }},
//                 { id: "4", text: "Unit 4", parent: "1", state: { "opened": true }},
//                 { id: "5", text: "Unit 5", parent: "#", state: { "opened": true }},
//                 { id: "6", text: "Unit 6", parent: "5", state: { "opened": true }}
//             ]
//     },
//     'checkbox': {
//       three_state: false,
//       cascade: 'none'
//     },
//     "plugins": [
//       "themes",
//       "wholerow",
//       "checkbox" 
//     ]
//   });

//   $('#tree').on('changed.jstree', function (e, data) {
//     if (resetting) //ignoring the changed event
//     {
//       resetting = false;
//       return;
//     }
//     if (!$("#multiselect").is(':checked') && data.selected.length > 1) {
//       resetting = true; //ignore next changed event
//       data.instance.uncheck_all(); //will invoke the changed event once
//       var x = data.instance.check_node(data.node/*currently selected node*/);
//       return;
//     }
//     selectedId = [];
//     for(var i = 0; i < data.selected.length; i++) {
//       data.instance.uncheck_all();
//       selectedId.push(data.instance.get_node(data.selected[i]).id);
//     }
//     alert(selectedId);
//     $("#log").append("Selected nodes: " + selectedId.join(', ') + "<br />");
//   });


//   var data = {
//     id: 0,
//     title: "root - not displayed",
//     children: [{
//         id: 1,
//         title: "Option 1",
//         children: [{
//             id: 11,
//             title: "Option 11",
//             children: [{
//                 id: 111,
//                 title: "Option 111"
//             }, {
//                 id: 112,
//                 title: "Option 112"
//             }]
//         }, {
//             id: 12,
//             title: "Option 12"
//         }]
//     }, {
//         id: 2,
//         title: "Option 2",
//         children: [{
//             id: 21,
//             title: "Option 21"
//         }, {
//             id: 22,
//             title: "Option 22"
//         }]
//     }, {
//         id: 3,
//         title: "Option 3",
//         children: [{
//             id: 0,
//             title: "Option 31"
//         }, {
//             id: 0,
//             title: "Option 32"
//         }]
//     }]
// };

function addItem(parentUL, branch) {
  for (var key in branch.children) {
    var item = branch.children[key];
    $item = $('<li>', {
      id: "item" + item.id
    });
    $item.append($('<input>', {
      type: "checkbox",
      id: "item" + item.id,
      name: "item" + item.id
    }));
    $item.append($('<label>', {
      for: "item" + item.id,
        text: item.title
    }));
    parentUL.append($item);
    if (item.children) {
      var $ul = $('<ul>', {
        style: 'display: none'
      }).appendTo($item);
      addItem($ul, item);
    }
  }
}

$(function () {
  addItem($('#root'), data);
  $(':checkbox').change(function () {
    $(this).closest('li').children('ul').slideToggle();
  });
  $('label').click(function(){
    $(this).closest('li').find(':checkbox').trigger('click');
  });
});
});

$(function () {
  $("#treee").jstree({
    "checkbox": {
      "keep_selected_style": false
    },
    "plugins": ["checkbox"],
    "core": {
      'data' : [
      {
        id: '0',
        "text" : "Root",
        state: {
          opened: true
        },
        "children" : [
        {
          id: '2',
          text: 'Input Data',
          state: {
          expanded: true
        },
        children: [
          {
            text: 'Data Penutupan Satuan AJK',
            type: 'css',
            id: '6'
          },
          {
            text: 'Data Penutupan Kumpulan Ajk',
            type: 'css',
            id: '7'
          },
          {
            text: 'Data Penutupan Kumpulan BPD',
            type: 'css',
            id: '8'
          },
          ]
        },
        {
          id: '3',
          text: 'Data Klaim & Restitusi',
          children: [
          {
            text: 'Data Klaim',
            type: 'less',
            id: '31'
          },
          {
            text: 'Data Restitusi',
            type: 'less',
            id: '27'
          },
          ]
        },
        {
          id: '4',
          text: 'Proses Data Peserta',
          children: [
          {
            text: 'Kirim Data Peserta',
            type: 'less',
            id: '11'
          },
          {
            text: 'Kirim Data Klaim',
            type: 'less',
            id: '12'
          },
          {
            text: 'Kirim Data Restitusi',
            type: 'less',
            id: '34'
          },
          {
            text: 'Download Upload Data Polis',
            type: 'less',
            id: '35'
          }
          
          ]
        },
        {
          id: '5',
          text: 'Viewer',
          children: [
          {
            text: 'Report Data Peserta',
            type: 'svg',
            id: '13'
          },
          {
            text: 'Report Data Klaim',
            type: 'svg',
            id: '25'
          },
          {
            text: 'Report Data Restitusi',
            type: 'svg',
            id: '38'
          }
          ]
        },
        {
          id: '28',
          text: "Keuangan",
          children: [
          {
            text: 'Rekonsiliasi',
            type: 'js',
            id: '30'
          }
          ]
        },
        {
          id: '29',
          text: "Konfigurasi",
          children: [
          {
            text: 'Akses User',
            type: 'js',
            id: '14'
          },
          {
            text: 'Configuration',
            type: 'js',
            id: '15'
          },
          {
            text: 'Produk Asuransi',
            type: 'js',
            id: '32'
          }
          ]
        },
        ]
      }
      ]
    }
  });
  selectedId = [];

    // $("#treee").bind("changed.jstree",
    // function (e, data) {
    //     alert("Checked: " + data.node.id);
    //     alert("Parent: " + data.node.parent); 
    //     // alert(JSON.stringify(data));
    // });
    $('#treee').on('ready.jstree', function (e, data) {
      $(this).addClass('jstree-custom-checkboxes');
      @if($akses_user != null)
        @foreach ($akses_user as $row)
        $(this).jstree("select_node","#"+{{$row->akses}});
        @endforeach
      @endif
    })();


  });
</script>

</div>
</div>
</div>
</div>

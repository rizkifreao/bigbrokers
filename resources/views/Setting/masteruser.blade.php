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
                Master Broker
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">
                Master Asuransi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">
                Master Client/Bank
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#m_tabs_1_4">
                Rekanan
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
              <div class="row">
                <div class="col-md-6">
                  <form class="m-form m-form--fit m-form--label-align-right" id="FormAddBroker" method="post">
                    <div class="form-group m-form__group row">
                      <div class="col-lg-12">
                        <label class="">
                          Kode  
                        </label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodeBroker" name="kode_broker">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Nama  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Nama" name="nama">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Alamat  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Alamat" name="alamat">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          E-mail  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Email" name="email">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          No Akte Pendirian  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Akte" name="akte">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          No Telpon  
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="Telpon" name="tlp">
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Upload Logo  
                        </label>
                        <input type="file" class="form-control m-input m-input--air m-input--pill" id="Logo" name="logo"  >
                        <div>
                          <span class="m-form__help">
                            <!-- Please upload file -->
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12" align="right">
                        <button  type="submit" id="SimpanDataBroker" name="SimpanDataBroker" class="btn btn-info">
                          Simpan Data Broker
                          <i class="flaticon-file-1"></i>
                        </button>
                        <!-- </form> -->
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-6">
                  <div id="data-tables">
                    <!--Basic example-->
                    <div class="panel panel-light">
                      <div class="panel-body table-responsive">
                        <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Kode</th>
                              <th>Nama Broker</th>
                              <th>Alamat</th>
                              <th>No telepon</th>
                              <th>No Akte Pendirian</th>
                              <th>E-mail</th>
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
              <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                <div class="row">
                  <div class="col-md-6">
                    <form class="m-form m-form--fit m-form--label-align-right" id="FormAddAsuransi" method="post">
                      <div class="form-group m-form__group row">
                        <div class="col-lg-9">
                          <label class="">
                            Pilih Broker  
                          </label>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <select class="form-control m-input m-input--air m-input--pill" id="Select1Broker" >
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
                        <div class="col-lg-3">
                          <label class="">
                            Kode Broker  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="kode1Broker" name="kode_broker" >
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-9">
                          <label class="">
                            Pilih Jenis Produk  
                          </label>
                          <select class="form-control m-input m-input--air m-input--pill" id="kode1Prod">
                            <option value="">-Select-</option>
                            @foreach($produk as $produks)
                            <option value="{{$produks->kode_prod}}">{{$produks->nama}}</option>
                            @endforeach
                          </select>
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <label class="">
                            Kode Produk  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodeProd"  name="kode_prod" >
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Kode Asuransi  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodeAsu" name="kode_asu">
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Nama Asuransi 
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="NamaAsuransi" name="nama">
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Polis Induk  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="polisInduk" name="polis_induk">
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <label class="">
                            Diskon  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="Diskon" name="diskon">
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <label class="">
                            Ppn Premi  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="ppnPremi" name="ppn_premi">
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <label class="">
                            Pph Premi  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="pphPremi" name="pph_premi">
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            E-mail  
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="Email" name="email"  >
                          <div>
                            <span class="m-form__help">
                              <!-- Please upload file -->
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-12" align="right">
                          <button  type="submit" id="SimpanDataAsuransi" name="SimpanDataAsuransi" class="btn btn-info">
                            Simpan Data Asuransi
                            <i class="flaticon-file-1"></i>
                          </button>
                          <!-- </form> -->
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <div id="data-tables">
                      <!--Basic example-->
                      <div class="panel panel-light">
                        <div class="panel-body table-responsive">
                          <table id="data-table-example3" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>Nama Asuransi</th>
                                <th>Polis Induk</th>
                                <th>Produk</th>
                                <th>Diskon</th>
                                <th>E-mail</th>
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
                  
                  <div>
                    
                  </div>

                </div>
                <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                  <div class="row">
                    <div class="col-md-6">
                      <form class="m-form m-form--fit m-form--label-align-right" id="FormAddClient" method="post">
                        <div class="form-group m-form__group row">
                          <div class="col-lg-8">
                            <label class="">
                              Pilih Broker  
                            </label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <select class="form-control m-input m-input--air m-input--pill" id="SelectBroker2" name="kode_broker" required>
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
                          <div class="col-lg-4">
                            <label class="">
                              : 
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodeBroker"  placeholder="Kode Broker">
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="">
                              Kategori Client 
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="kategoriClient" name="kateg_client" required>
                              <option value="">-Select-</option>
                              <option >PUSAT</option>
                              <option >CABANG</option>
                              <option >CABANG PEMBANTU</option>
                            </select>
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <label class="">
                              Kantor Pusat 
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="inputPusat" name="nama" placeholder="Nama Bank Pusat">
                            <select class="form-control m-input m-input--air m-input--pill" id="SelectPusat" name="nama" required>
                              <option value="">-Select-</option>
                              @foreach($master_client as $pusats)
                              <option value="{{$pusats->kode_pusat}}">{{$pusats->nama}}</option>
                              @endforeach
                            </select>
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <label class="">
                              : 
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodePusat" name="kode_pusat"  placeholder="Kode Pusat">
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="">
                              Kode CLient 
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodeClient" name="kode_client"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="">
                              Nama Instansi  
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaInstansi" name="nama"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="">
                              Alamat Instansi
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="Alamat" name="alamat"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <label class="">
                              Fee Client  
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="feeClient" name="fee_client"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <label class="">
                              PPh  
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="PphClient" name="pph_client"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <label class="">
                              Fee PB  
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="feePb" name="fee_pb"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <label class="">
                              Pph PB  
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="pphPb" name="pph_pb"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="">
                              E-mail  
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="Email" name="email"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="">
                              No Rekening Premi  
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="noRekening" name="no_rek"  >
                            <div>
                              <span class="m-form__help">
                                <!-- Please upload file -->
                              </span>
                            </div>
                            <div class="col-lg-12">
                              <label class="">
                                No Perjanjian  
                              </label>
                              <input type="text" class="form-control m-input m-input--air m-input--pill" id="noPerjanjian" name="no_pks"  >
                              <div>
                                <span class="m-form__help">
                                  <!-- Please upload file -->
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <label class="">
                                Masa Kerjasama  
                              </label>
                              <input type="text" class="form-control m-input m-input--air m-input--pill" id="masaPks" name="masa_pks"  >
                              <div>
                                <span class="m-form__help">
                                  <!-- Please upload file -->
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-12" align="right">
                              <button  type="submit" id="SimpanDataBank" name="SimpanDataBank" class="btn btn-info">
                                Simpan Data Bank
                                <i class="flaticon-file-1"></i>
                              </button>
                              <!-- </form> -->
                            </div>
                          </div>

                        </div>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <div id="data-tables">
                        <!--Basic example-->
                        <div class="panel panel-light">
                          <div class="panel-body table-responsive">
                            <table id="data-table-example4" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th>Kode Bank</th>
                                  <th>Nama Bank</th>
                                  <th>Alamat Bank</th>
                                  <th>Email</th>
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
                    
                    <div>
                      
                    </div>                                              
                  </div>
                  <div class="tab-pane" id="m_tabs_1_4" role="tabpanel">
                    <div class="row">
                      <div class="col-md-6">
                        <form class="m-form m-form--fit m-form--label-align-right" id="FormAddRekanan" method="post">
                          <div class="form-group m-form__group row">
                            <div class="col-lg-8">
                              <label class="">
                                Kantor Pusat Client  
                              </label>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <select class="form-control m-input m-input--air m-input--pill" id="kantor1Pusat" required>
                                <option value="">-Select-</option>
                                @foreach($master_client as $pusat)
                                <option value="{{$pusat->kode_pusat}}">{{$pusat->nama}}</option>
                                @endforeach
                              </select>
                              <div>
                                <span class="m-form__help">
                                  <!-- Please upload file -->
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label class="">
                                Kode Pusat  
                              </label>
                              <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodePusat" name="id_mst_client"  placeholder="kode pusat">
                              <div>
                                <span class="m-form__help">
                                  <!-- Please upload file -->
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <label class="">
                                Produk Asuransi  
                              </label>
                              <select class="form-control m-input m-input--air m-input--pill" id="produkAsuransi" required>
                                <option value="">-Select-</option>
                                @foreach($produk as $produks)
                                <option value="{{$produks->kode_prod}}">{{$produks->nama}}</option>
                                @endforeach
                              </select>
                              <div>
                                <span class="m-form__help">
                                  <!-- Please upload file -->
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label class="">
                                Kode Asuransi  
                              </label>
                              <input type="text" class="form-control m-input m-input--air m-input--pill" id="kodeProd" name="id_prod"  value="kode asuransi">
                              <div>
                                <span class="m-form__help">
                                  <!-- Please upload file -->
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <button  type="submit" id="SimpanDataRekanan" name="SimpanDataRekanan" class="btn btn-info">
                                Simpan Data Rekanan
                                <i class="flaticon-file-1"></i>
                              </button>
                              <!-- </form> -->
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col-md-6">
                        <div id="data-tables">
                          <!--Basic example-->
                          <div class="panel panel-light">
                            <div class="panel-body table-responsive">
                              <table id="data-table-example5" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Nama Bank</th>
                                    <th>Produk Asuransi</th>
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
            </div>
          </div>
        </div>
        <!--end::Form-->
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

          var table = $('#data-table-example2').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/broker",
            "type": "GET"
          },
          
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "kode_broker"},
          { "data": "nama" },
          { "data": "alamat" },
          { "data": "tlp" },
          { "data": "akte" },
          { "data": "email" },
          ],

        });

          var table3 = $('#data-table-example3').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/asuransi",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "nama"},
          { "data": "polis_induk" },
          { "data": "kode_prod" },
          { "data": "diskon" },
          { "data": "email" },
          ],

        });

          var table4 = $('#data-table-example4').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/client",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "kode_client"},
          { "data": "nama" },
          { "data": "alamat" },
          { "data": "email" },
          ],

        });

          var table5 = $('#data-table-example5').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/rekanan",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "namapusat"},
          { "data": "namaproduk" },
          ],

        });

      // $('#data-table-example2 tbody')
      //   .on( 'mouseenter', 'td', function () {
      //       var colIdx = table.cell(this).index().column;
      //       // alert(colIdx);
      //       $( table.cells().nodes() ).removeClass( 'highlight' );
      //       $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
      //   } );

      // $('#data-table-example2 tbody').on( 'click', 'td', function () {
      //     var valueIdx = table.row( this ).data();
      //     var visIdx = $(this).index();
      //     var dataIdx = table.column.index( 'fromVisible', visIdx );
      //     // clearModal();
      //     if (dataIdx != 0){
      //       // ... do something with `rowData`
      //       tableText(valueIdx);
      //     }
      //   } );

      // const numberWithCommas = (x) => {
      //     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      //   }

      // $('#example-select-all').on('click', function(){
      //     // Check/uncheck all checkboxes in the table
      //     var rows = table.rows({ 'search': 'applied' }).nodes();
      //     $('input[type="checkbox"]', rows).prop('checked', this.checked);
      //   });

      //   // Handle click on checkbox to set state of "Select all" control
      //   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      //     // If checkbox is not checked
      //     if(!this.checked){
      //        var el = $('#example-select-all').get(0);
      //        // If "Select all" control is checked and has 'indeterminate' property
      //        if(el && el.checked && ('indeterminate' in el)){
      //           // Set visual state of "Select all" control
      //           // as 'indeterminate'
      //           el.indeterminate = true;
      //        }
      //     }
      //   });

      

      //   function clearModal(){
      //     $(".modal-body").find("#Debitur").val('');
      //     $(".modal-body").find("#no_Pk").val('');
      //     $(".modal-body").find("#noKwitansi").val('');
      //   }
      
      //   function tableText(valueIdx) {
      //           // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
      //           //modal cetak 

      //           $(".modal-body").find("#Debitur").val(valueIdx['debitur']);
      //           $(".modal-body").find("#no_Pk").val(valueIdx['no_pk']);
      //           $(".modal-body").find("#jenisAsuransi").val(valueIdx['jenis_asuransi']);
      //           $(".modal-body").find("#tglLahir").val(valueIdx['tgl_lahir']);
      //           $(".modal-body").find("#Umur").val(valueIdx['umur']);
      //           $(".modal-body").find("#tglAwal").val(valueIdx['tgl_awal']);
      //           $(".modal-body").find("#Plafon").val(valueIdx['plafon']);

      //           // $(".modal-body").find("#cabang").val(dokumens[0].cabang);
      //           // $(".modal-body").find("#namaNasabah").val(dokumens[0].nama_nasabah);
      //           // $(".modal-body").find("#plafon").val(numberWithCommas(dokumens[0].plafon));
      //           // $(".modal-body").find("#tanggalBooking").val(dokumens[0].tgl_booking);
      //           // $(".modal-body").find("#merek").val(dokumens[0].merk);
      //           // $(".modal-body").find("#tipe").val(dokumens[0].tipe);
      //           // $(".modal-body").find("#kategori").val(dokumens[0].kategori);
      //           // $(".modal-body").find("#model").val(dokumens[0].jenis_asuransi);
      //           // $(".modal-body").find("#jenisKendaraan").val(dokumens[0].model_kend);
      //           // $(".modal-body").find("#noRangka").val(dokumens[0].no_rangka);
      //           // $(".modal-body").find("#noMesin").val(dokumens[0].no_mesin);
      //           // $(".modal-body").find("#noPolisi").val(dokumens[0].no_polisi);
      //           // $(".modal-body").find("#noBpkb").val(dokumens[0].no_bpkb);
      //           // $(".modal-body").find("#tahun").val(dokumens[0].tahun);
      //           // $(".modal-body").find("#tenor").val(dokumens[0].tenor);
      //           // $(".modal-body").find("#rate").val(dokumens[0].rate);
      //           // $(".modal-body").find("#premiPertahun").val(numberWithCommas(dokumens[0].premi));
      //           // $(".modal-body").find("#premiAdmin").val(numberWithCommas(dokumens[0].premi_admin));
      //           // if (dokumens[0].premi != dokumens[0].premi_admin){
      //           //   $('#premiPertahun').css({ background: "red", color:"white" });
      //           // }else{
      //           //   $('#premiPertahun').css({ background: "", color:"" });
      //           // }
      //           // $(".modal-body").find("#premiSekaligus").val(numberWithCommas(dokumens[0].premi_sekaligus));
      //           // $(".modal-body").find("#wilayah").val(dokumens[0].wilayah);

      //           $addEventModal.modal('show');
      //     //       if (dataIdx != 0){
      //     //         // ... do something with `rowData`
      //     //         tableText(valueIdx['no_pin']);
      //     // }

      //   }

        // function viewupdatemodal(){
        //   $updateEventModal.modal('show');
        // }
      };

      $(document).ready(function() {
        
        $("#SimpanDataBroker").on('click', function(e) {
          e.preventDefault();
          $("#FormAddBroker").submit();
        });

        $("#SimpanDataAsuransi").on('click', function(e) {
          e.preventDefault();
          $("#FormAddAsuransi").submit();
        });

        
        
        // $('#FormAddBroker').on('submit', function (event) {
        //   event.preventDefault();
        //   var formData = new FormData(this);

        //   for (var pair of formData.entries()) {
        //     console.log(pair[0]+ ', ' + pair[1]);
        //   }
        //     // var kode_asuransi = formData.get('kode_broker');
        //     var value_select = formData.get('kode_broker');
        //     var text_select = formData.get('nama');
        //     // alert(no_pk);
        //     $.ajax({
        //       type: 'POST',
        //       url : "./MasterUser/AddBroker",
        //       enctype: 'multipart/form-data',
        //       data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        //       contentType: false,       // The content type used when sending data to the server.
        //       cache: false,             // To unable request pages to be cached
        //       processData:false,
        //       success : function (data) {
        //         if(data.status == 'success'){
        //           reloadTable4();
        //           var x = $('#FormAddAsuransi').find('#Select1Broker');
        //           var y = $('#FormAddClient').find('#SelectBroker2');
        //           var o = $('<option/>', {value:value_select}).text(text_select).prop('selected', i == 0);
        //           o.appendTo(x);
        //           var p = $('<option/>', {value:value_select}).text(text_select).prop('selected', this.selected);
        //           p.appendTo(y);
        //           alert(data.messages)
        //         }else {
        //           alert(data.message);
        //         }
        //       }
        //     });
        //   });

        $('#FormAddAsuransi').on('submit', function (event) {
          event.preventDefault();
          var formData = new FormData(this);

          for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
          }
          // var no_pk = formData.get('kode_broker');
          // alert(no_pk);
          $.ajax({
            type: 'POST',
            url : "./MasterUser/Tambah",
            enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'success'){
                  reloadTable3();
                  alert(data.messages)
                }else {
                  alert(data.message);
                }
              }
            });
        });

        $('#FormAddClient').on('submit', function (event) {
          event.preventDefault();
          var formData = new FormData(this);

          for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
          }
          var kodeg = formData.get('kateg_client');
          var nama = formData.get('nama');
          var kode = formData.get('kode_pusat');
          alert(nama);
          $.ajax({
            type: 'POST',
            url : "./MasterUser/AddClient",
            enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'success'){
                  reloadTable();
                  // alert(kodeg);
                  if(kodeg == 'PUSAT'){
                    var x = $('#FormAddClient').find('#SelectPusat');
                    var y = $('#FormAddRekanan').find('#kantor1Pusat');
                    var o = $('<option/>', {value:kode}).text(nama).prop('selected', this.selected);
                    var p = $('<option/>', {value:kode}).text(nama).prop('selected', this.selected);
                    o.appendTo(x);
                    p.appendTo(y);
                  }
                  alert(data.messages)
                }else {
                  alert(data.messages);
                }
              }
            });
        });

        $('#FormAddRekanan').on('submit', function (event) {
          event.preventDefault();
          var formData = new FormData(this);

          for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
          }
          var no_pk = formData.get('kode_broker');
          alert(no_pk);
          $.ajax({
            type: 'POST',
            url : "./MasterUser/AddRekanan",
            enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'success'){
                  reloadTable2();
                  alert(data.messages);
                }else {
                  alert(data.messages);
                }
              }
            });
        });
        // $('#printNm').on('click', function(){
        //   window.open("./printNm", '_blank');
        //   // var win = 
        // });
        $('#kategoriClient').on('change', function(e){
          e.preventDefault();
          var kategori = $("#FormAddClient").find("#kategoriClient").val();
          if(kategori == 'PUSAT'){
            $("#FormAddClient").find("#inputPusat").prop("disabled", false);
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

        $('#Select1Broker').on('change', function(e){
          e.preventDefault();
          var kode_Brok = $("#FormAddAsuransi").find("#Select1Broker").val();
          alert(kode_Brok);
          $("#FormAddAsuransi").find("#kode1Broker").val(kode_Brok);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });
        
        $('#kode1Prod').on('change', function(e){
          e.preventDefault();
          var kode_prod = $("#FormAddAsuransi").find("#kode1Prod").val();
          $("#FormAddAsuransi").find("#kodeProd").val(kode_prod);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });

        $('#SelectBroker2').on('change', function(e){
          e.preventDefault();
          var kategoribrok = $("#FormAddClient").find("#SelectBroker2").val();
          $("#FormAddClient").find("#kodeBroker").val(kategoribrok);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });

        $('#SelectPusat').on('change', function(e){
          e.preventDefault();
          var kategori = $("#FormAddClient").find("#SelectPusat").val();
          $("#FormAddClient").find("#kodePusat").val(kategori);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });

        $('#kantor1Pusat').on('change', function(e){
          e.preventDefault();
          var kategori = $("#FormAddRekanan").find("#kantor1Pusat").val();
          $("#FormAddRekanan").find("#kodePusat").val(kategori);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });

        $('#produkAsuransi').on('change', function(e){
          e.preventDefault();
          var kategori = $("#FormAddRekanan").find("#produkAsuransi").val();
          $("#FormAddRekanan").find("#kodeProd").val(kategori);
          // $("#FormKlaimUpload").find("#fileExcel").val('');
        });
        
        function reloadTable(){
          $('#data-table-example4').DataTable().destroy();
          $('#data-table-example4 tbody').empty();

          var table4 = $('#data-table-example4').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/client",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "kode_client"},
          { "data": "nama" },
          { "data": "alamat" },
          { "data": "email" },
          ],

        });
          table4.ajax.reload();
        }

        function reloadTable2(){
          $('#data-table-example5').DataTable().destroy();
          $('#data-table-example5 tbody').empty();

          var table5 = $('#data-table-example5').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/rekanan",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "namapusat"},
          { "data": "namaproduk" },
          ],

        });
          table5.ajax.reload();
        }

        function reloadTable3(){
          $('#data-table-example3').DataTable().destroy();
          $('#data-table-example3 tbody').empty();

          var table3 = $('#data-table-example3').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/asuransi",
            "type": "GET"
          },
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "nama"},
          { "data": "polis_induk" },
          { "data": "kode_prod" },
          { "data": "diskon" },
          { "data": "email" },
          ],

        });
          table3.ajax.reload();
        }

        function reloadTable4(){
          $('#data-table-example2').DataTable().destroy();
          $('#data-table-example2 tbody').empty();

          var table = $('#data-table-example2').DataTable({
            "scrollY": 450,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./MasterUser/reload/broker",
            "type": "GET"
          },
          
          "paging" : false,
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": "kode_broker"},
          { "data": "nama" },
          { "data": "alamat" },
          { "data": "tlp" },
          { "data": "akte" },
          { "data": "email" },
          ],

        });

          table.ajax.reload();
        }
      });
    </script>
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
                Form Data Satuan
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
                <button type="submit" id="addData" name="Add_data" class="btn btn-accent" title="Add Data Satuan">
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormPenutupanSatuan" method="post" enctype="multipart/form-data" action>
              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label class="">
                      Tanggal Registrasi
                    </label>
                      <div class="input-daterange input-group datepicker-demo">
                    <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalRegistrasi" name="tanggal_registrasi" placeholder="Enter Tanggal Lahir" autocomplete="off" />
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
                  <label>
                    Jenis Asuransi:
                  </label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <select class="form-control m-input m-input--air m-input--pill" id="jenisAsuransi" name="jenis_asuransi" >
                  <option value="">--Select--</option>
                    @foreach($jenisasuransi as $jenis)
                    <option value="{{$jenis->kode_prod}}">
                    {{$jenis->nama}}
                    </option>
                    @endforeach
                  </select>
                  <span class="m-form__help">
                    <!-- Please enter your full name -->
                  </span>
                </div>
                <div class="col-lg-6">
                    <label class="">
                      No. Kredit:
                    </label>
                    <input type="text" class="form-control m-input m-input--air m-input--pill" id="noKredit" name="no_kredit" aria-describedby="emailHelp" placeholder="Enter nomor kredit" >
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter credit number -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-6">
                    <label class="">
                      Debitur
                    </label>
                    <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur" aria-describedby="emailHelp" placeholder="Enter debitur" >
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter debitur -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-6">
                    <label class="">
                      Tanggal Lahir
                    </label>
                    <div class="input-daterange input-group datepicker-demo">
                    <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalLahir" name="tanggal_lahir" placeholder="Enter Tanggal Lahir" autocomplete="off" />
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
                      Tanggal Akad Kredit
                    </label>
                    <div class="input-daterange input-group datepicker-demo">
                      <div class="input-daterange input-group datepicker-demo">
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalAkadAwal" name="tanggal_akad_awal" autocomplete="off" />
                      <!-- <div class="input-group-append">
                      <span class="input-group-text">
                          <i class="la la-ellipsis-h"></i>
                      </span>
                      </div>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="tanggalAkadAkhir" name="tanggal_akad_akhir" /> -->
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
                      Masa Kredit
                    </label>
                    <input type="text" class="form-control m-input m-input--air m-input--pill" id="masaKredit" name="masa_kredit" aria-describedby="emailHelp" placeholder="Enter nomor kredit" >
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter credit number -->
                    </span>
                  </div>
                </div>
                <div class="col-lg-6">
                    <label class="">
                      Plafon Pinjaman
                    </label>
                    <input type="text" class="form-control m-input m-input--air m-input--pill" id="plafonPinjaman" name="plafon_pinjaman" aria-describedby="emailHelp" placeholder="Enter plafon pinjaman" >
                    <div>
                    <span class="m-form__help">
                      <!-- Please enter credit number -->
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label >
                    Upload File Spaj
                  </label>
                  <input type="file" class="form-control m-input m-input--air m-input--pill btn-sm" id="fileSpaj" name="file_spaj" >
                  <span class="m-form__help">
                    <!-- Please enter  -->
                  </span>

                </div> 
                <div class="col-lg-12">
                  <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                      <div class="row">
                        <button type="submit" id="ProsesSaveSatuan" name="ProsesSaveSatuan" class="btn btn-info">
                          Save
                        <i class="flaticon-file-1"></i>
                        </button>
                        <!-- <div class="col-lg-12 m--align-right">
                          <button type="submit" id="kirimKeAsuransi" name="kirimKeAsuransi" class="btn btn-accent">
                            <i class="flaticon-paper-plane"></i>
                            Kirim Ke Asuransi
                          </button>
                        </div> -->
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
                          {{$valuebutton}}
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
                                <th>No.</th>
                                <th>Cetak</th>
                                <!-- <th>File Spaj</th> -->
                                <th>File SPAJ</th>
                                <th>No. Kwitansi</th>
                                <th>No. Pinjaman Kredit</th>
                                <th>Cabang Bank</th>
                                <th>Nama Debiturk</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
                                <th>Tenor</th>
                                <th>Tgl Akad Kredit</th>
                                <th>Tgl Akhir Kredit</th>
                                <th>Rate</th>
                                <th>Plafon</th>
                                <th>Premi</th>
                                <!-- <th>Umur</th> -->
                                <!-- <th>Jenis Asuransi</th> -->
                              </tr>
                            </thead>
                            <tfoot>
                            <tr>
                              <td colspan='14'>Total</td>
                              <!-- <td></td>
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
                              <td></td> -->
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
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="tanggalRegistrasi" name="tanggal_registrasi"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="jenisAsuransi" name="jenis_asuransi"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="tanggalLahir" name="tanggal_lahir"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="masaKredit" name="masa_kredit"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="tanggalAkadAwal" name="tanggal_akad_awal"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="plafonPinjaman" name="plafon_pinjaman"  readonly>
                              <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="idProd" name="id_prod_ajk"  readonly>
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

  <div class="modal fade" id="updateEventModal" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="myModalLabel">Form Update Data Satuan</h3>
        </div>
        <div class="modal-body">
          <form class="m-form m-form--fit m-form--label-align-right" id="form-updatee-modal" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
              <div class="col-md-6">
                <label class="">
                      Tanggal Registrasi
                    </label>
                      <div class="input-daterange input-group datepicker-demo">
                    <input type="text" class="form-control  m-input m-input--air m-input--pill btn-sm" placeholder="Select date" id="tanggalRegistrasi" name="tanggal_registrasi" placeholder="Enter Tanggal Lahir" autocomplete="off" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="la la-calendar-check-o"></i>
                      </span>
                    </div>
                  </div>
                    <!-- <span class="m-form__help">
                      Please enter your contact number
                    </span> -->
              </div>
              <div class="col-md-6">
                <label >
                  Jenis Asuransi
                </label>
                <input type="hidden" class="form-control  m-input m-input--air m-input--pill btn-sm" id="idProd" name="id_prod_ajk" readonly>
                <select class="form-control form-control-sm m-input--air m-input--pill" id="jenisAsuransi" name="jenis_asuransi" required>
                  <option  value="">--Select--</option>
                  @foreach($jenisasuransi as $jenis)
                  <option value="{{$jenis->kode_prod}}">
                    {{$jenis->nama}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label >
                  No Kredit
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill btn-sm" id="noKredit" name="no_kredit"  >  
              </div>
              <div class="col-md-6">
                <label >
                  Nama Debitur
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill btn-sm" id="Debitur" name="debitur"  >
              </div>
              <div class="col-md-6">
                <label class="">
                      Tanggal Lahir
                    </label>
                    <div class="input-daterange input-group datepicker-demo">
                    <input type="text" class="form-control  m-input m-input--air m-input--pill btn-sm" placeholder="Select date" id="tanggalLahir" name="tanggal_lahir" placeholder="Enter Tanggal Lahir" autocomplete="off" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="la la-calendar-check-o"></i>
                      </span>
                    </div>
                  </div>
                    <!-- <span class="m-form__help">
                      Please enter your contact number
                    </span> -->
              </div>
              <div class="col-md-6">
                <label class="">
                      Tanggal Akad Kredit
                    </label>
                    <!-- <div class="input-daterange input-group datepicker-demo"> -->
                      <div class="input-daterange input-group datepicker-demo">
                      <input type="text" class="form-control m-input m-input--air m-input--pill btn-sm" id="tanggalAkadAwal" name="tanggal_akad_awal" autocomplete="off" />
                      <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="la la-calendar-check-o"></i>
                      </span>
                    </div>
                  </div>
                <!-- </div> -->
                   <!--  <span class="m-form__help">
                      Please enter your contact number
                    </span> -->
              </div>
              <div class="col-md-6">
                <label >
                  Masa Kredit
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill btn-sm" id="masaKredit" name="masa_kredit"  >
              </div>
              <div class="col-md-6">
                <label >
                  Plafon Pinjaman
                </label>
                <input type="text" class="form-control m-input m-input--air m-input--pill btn-sm" id="plafonPinjaman" name="plafon_pinjaman"  >
                  <span class="m-form__help">
                      <!-- Please enter  -->
                    </span>
              </div>
              <div class="col-md-6">
                  <label >
                    Upload File Spaj
                  </label>
                  <input type="file" class="form-control m-input m-input--air m-input--pill btn-sm" id="fileSpaj" name="file_spaj" >
                  <span class="m-form__help">
                    <!-- Please enter  -->
                  </span>

              </div>
              
              <div class="col-md-12">
                
                      <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air btn-sm" id="prosesUpdateSatuan" name="prosesUpdateSatuan">
                        <i class="flaticon-file-1"></i>
                        Update Data
                      </button>
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
</div>
<script type="text/javascript">
    LobiAdmin.loadScript([
        'assets/app/dataTables/jquery.dataTables.min.js',
        'js/plugin/select2/select2.min.js'
    ], function(){
            LobiAdmin.loadScript([
            'assets/vendors/custom/datatables/datatables.bundle.js',
            'assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js',
            'js/plugin/datatables/dataTables.select.min.js',
            'js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js',
            'assets/demo/default/custom/components/portlets/tools.js',
            ],initPage);
            });

    function initPage(){
      $('.datepicker-demo').datepicker({
            format: 'yyyy-mm-dd'
        });

      var $addEventModal = $('#addEventModal');
      $addEventModal.appendTo('body');
      var $updateEventModal = $('#updateEventModal');
      var table = $('#data-table-example2').DataTable({
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormAkeptasiDokumen/reload",
            "type": "GET"
          },
          "order": [[ 1, 'asc' ]],
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
            { "data": null},
            { "data": null},
            { "data": null},
            { "data": "no_kwitansi" },
            { "data": "no_pk" },
            // { "data": "nama_asuransi" },
            { "data": "namacabang" },
            { "data": "debitur" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "tgl_awal",  },
            { "data": "tgl_akhir", },
            { "data": "tenor" },
            // { "data": "rate" },
            { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          ],
          'columnDefs': [{
            'targets': 0,
            "paging" : false,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                  // if(data["no_polis"] != null){
                    return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
                  }
                },{
            'targets': 2,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
                  return '<button type="sumbit" class="btn btn-primary btn-sm" id="cetakKwitansi" name="cetakKwitansi" value="'+ data["id_prod_ajk"] +'"><i class=" flaticon-technology-2"></i> Kwitansi</button>';
              }
            },
            {
                  'targets': 3,
                  'searchable':false,
                  'orderable':false,
                  'render': function (data, type, row){
                    if(data["file_spaj"]!= null){
                      return '<button type="sumbit" class="btn btn-primary btn-sm" id="downloadSpaj" name="downloadSpaj" value="'+ data["id_prod_ajk"] +'"><i class=" flaticon-technology-2"></i> Download</button>';
                    }else{
                      return 'File Tidak Ada';
                    }
                  }
                },
          ],
      });

      table.on( 'order.dt search.dt', function () {
            table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        // const numberWithCommas = (x) => {
        //   return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        // }

        // 

       

        //   $('#data-table-example2 tbody').on( 'click', 'td', function () {
        // // e.preventDefault();
        // var valueIdx = table.row( this ).data();
        // var visIdx = $(this).index();
        // var dataIdx = table.column.index( 'fromVisible', visIdx );
        // clearModal();
        //   if (dataIdx >= 3 ){
        //     // ... do something with `rowData`
        //     tableText(valueIdx);
        //   }
          
        // } );

        
        

        function reloadtable22(){
          var t = $('#data-table-example2').DataTable();
        t.rows().clear().draw();
        // $('#data-table-example2').DataTable().clear();
        //   $('#data-table-example2 tbody').empty();
          var table;
          table = $('#data-table-example2').DataTable({
            "scrollY": 250,
            "scrollX": true,
        "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./PenutupanKumpulan/reload/nosend",
            "type": "GET"
          },
          
                "order": [[ 1, 'asc' ]],
                "columns" : [
                { "data": null},
                { "data": null},
                { "data": null},
                // { "data": null},
                { "data": "no_kwitansi" },
                { "data": "no_pk" },
                { "data": "namaclient" },
                { "data": "debitur" },
                { "data": "tgl_lahir" },
                { "data": "umur" },
                { "data": "tenor" },
                { "data": "tgl_awal" },
                { "data": "tgl_akhir" },
                { "data": "rate" },
                { "data": "plafon" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
                { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
                { "data": "nama" },
            

            ],  
            'columnDefs': [{
            'targets': 0,
            "paging" : false,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                  // if(data["no_polis"] != null){
                    return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
                  }
                },{
            'targets': 2,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
                  return '<button type="sumbit" class="btn btn-primary btn-sm" id="cetakKwitansi" name="cetakKwitansi" value="'+ data["id_prod_ajk"] +'"><i class=" flaticon-technology-2"></i> Kwitansi</button>';
              }
            },
            
                ],

              });
              table.on( 'order.dt search.dt', function () {
            table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
              $('#data-table-example2').DataTable().ajax.reload();
        }
    };

    $(document).ready(function() {

      var submitActor = null;
      var $form = $('#FormPenutupanSatuan');
      var $submitActors = $form.find('button[type=submit]');
      var $addEventModal = $('#addEventModal');
      $addEventModal.appendTo('body');
      var $updateEventModal = $('#updateEventModal');
      $updateEventModal.appendTo('body');
      var $form_modall = $('#form-update-modal');

      $form.submit( function (e) {
        e.preventDefault();
        if (null === submitActor) {
          // return first button if nothing else
          submitActor = $submitActors[0];
        }

        var formData = new FormData(this);

        var buttonPressed = submitActor.name;
        // console.log(submitActor.name);

        switch (buttonPressed) {
          case 'ProsesSaveSatuan':
          var nopk = formData.get('no_kredit');
          if(nopk =='' || nopk ==null){
             //alert('Isi Data');
             swal('Info', 'Isi Data', 'info');
          }else{
             swal({
                title: 'Apakah Kamu Yakin?',
                 text: "data sudah benar !",
                 type: 'success',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Iya, Lanjutkan..!',
                 showLoaderOnConfirm: true,
                 preConfirm: function() {
                    return new Promise(function(resolve) {
                      $.ajax({
                          type: 'POST',
                          url : "./PenutupanSatuan/update",
                          enctype: 'multipart/form-data',
                          data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                          contentType: false,       // The content type used when sending data to the server.
                          cache: false,             // To unable request pages to be cached
                          processData:false,
                        })
                        .done(function(response){
                          if(response.status == 'success'){
                            swal('Data has been saved', response.message, 'success');
                            reloadtable2();
                          }else{
                            swal('Info', response.message, 'info');
                          }
                        
                        })
                        .fail(function(){
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                      });
                    });
                 },
                 allowOutsideClick: false     
                 });
          }
            break;
            default:

          }
      });

      $submitActors.click(function(event) {
      submitActor = this;
      });

      $('#printNm').on('click', function(){
          window.open("./printNm", '_blank');
          // var win = 
        });
        $('#addData').on('click', function(){
          $("#FormPenutupanSatuan").find("#tanggalRegistrasi").val('');
          $("#FormPenutupanSatuan").find("#noKredit").val('');
          $("#FormPenutupanSatuan").find("#jenisAsuransi").val('');
          $("#FormPenutupanSatuan").find("#Debitur").val('');
          $("#FormPenutupanSatuan").find("#tanggalLahir").val('');
          $("#FormPenutupanSatuan").find("#tanggalAkadAwal").val('');
          $("#FormPenutupanSatuan").find("#tanggalAkadAkhir").val('');
          $("#FormPenutupanSatuan").find("#masaKredit").val('');
          $("#FormPenutupanSatuan").find("#plafonPinjaman").val('');
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
        
        $('#data-table-example2 tbody').on( 'click', '#cetakKwitansi', function (e) {
        e.preventDefault();

        var data = $('#data-table-example2').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );

        var no_pk = data['no_pk'];

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
                    // alert(setNoKwitansi);
                    reloadtable2();
                    window.open("./CetakKwitansi/" + no_pk, '_blank');
                  }
                  
                }else {
                  alert(data.message);
                }
              }
            });
        });

        $('#data-table-example2 tbody').on( 'click', '#downloadSpaj', function (e) {
          e.preventDefault();

          var data = $('#data-table-example2').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );

             var id_prod = data['id_prod_ajk'];


             var win = window.open("./downloadfilespaj/" + id_prod, '_blank');
             if (win) {
                   //Browser has allowed it to be opened
                   win.focus();
                 } else {
                   //Browser has blocked it
                   alert('Please allow popups for this website');
                 }
        });

        function reloadtable2(){
          var t = $('#data-table-example2').DataTable();
        t.rows().clear().draw();
        // $('#data-table-example2').DataTable().clear();
        //   $('#data-table-example2 tbody').empty();
          var table;
          var table = $('#data-table-example2').DataTable({
          "scrollY": 250,
          "scrollX": true,
        "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./FormAkeptasiDokumen/reload",
            "type": "GET"
          },
          "order": [[ 1, 'asc' ]],
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
            { "data": null},
            { "data": null},
            { "data": null},
            { "data": "no_kwitansi" },
            { "data": "no_pk" },
            // { "data": "nama_asuransi" },
            { "data": "namacabang" },
            { "data": "debitur" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "tgl_awal"},
            { "data": "tgl_akhir" },
            { "data": "tenor" },
            // { "data": "rate" },
            { "data": "plafon","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          ],
          'columnDefs': [
            {
            'targets': 0,
            "paging" : false,
            'searchable':false,
            'orderable':false,
            'className': 'dt-body-center',
            'render': function (data, type, row){
                  // if(data["no_polis"] != null){
                    return '<input type="checkbox" class="m-checkbox m-checkbox--solid m-checkbox--state-success" name="'+ row['id_prod_ajk'] +'" value="'
                    + $('<div/>').text(row['no_pk']).html() + '">';
                  }
            },{
            'targets': 2,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
                  return '<button type="sumbit" class="btn btn-primary btn-sm" id="cetakKwitansi" name="cetakKwitansi" value="'+ data["id_prod_ajk"] +'"><i class=" flaticon-technology-2"></i> Kwitansi</button>';
              }
            },
            {
                  'targets': 3,
                  'searchable':false,
                  'orderable':false,
                  'render': function (data, type, row){
                    if(data["file_spaj"]!= null){
                      return '<button type="sumbit" class="btn btn-primary btn-sm" id="downloadSpaj" name="downloadSpaj" value="'+ data["id_prod_ajk"] +'"><i class=" flaticon-technology-2"></i> Download</button>';
                    }else{
                      return 'File Tidak Ada';
                    }
                  }
                },
          ],
      });

      table.on( 'order.dt search.dt', function () {
            table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

          // table.ajax.reload();
          $('#data-table-example2').DataTable().ajax.reload();
        }

      //   $('#form-update-modal').on('submit', function (eventt) {
      //   eventt.preventDefault();
      //   var formData = new FormData(this);

      //   for (var pair of formData.entries()) {
      //     console.log(pair[0]+ ', ' + pair[1]);
      //   }
      //   var no_pk = formData.get('no_pk');
      //   $.ajax({
      //     type: 'GET',
      //     url : "./UpdateNoKwitansi/" + no_pk,
      //         contentType: false,       // The content type used when sending data to the server.
      //         cache: false,             // To unable request pages to be cached
      //         processData:false,
      //         success : function (data) {
      //           if(data.status == 'start_number' || data.status == 'new_number'){
      //             var setNoKwitansi = $(".modal-body").find("#noKwitansi").val(data.dokumens);
      //             if(setNoKwitansi){
      //               // alert(setNoKwitansi);
      //               reloadtable2();
      //               window.open("./CetakKwitansi/" + no_pk, '_blank');
      //             }
      //             // if (win) {
      //             //   //Browser has allowed it to be opened
      //             //   win.focus();
      //             // } else {
      //             //   //Browser has blocked it
      //             //   alert('Please allow popups for this website');
      //             // }
      //             // reloadTable();
      //           }else {
      //             alert(data.message);
      //           }
      //         }
      //       });
      // });

      // $("#buttonCetakKwitansi").on('click', function(event) {
      //     event.preventDefault();
      //     $("#form-update-modal").submit();
      //   });

    //   $("#buttonUpdateData").on('click', function(e) {
    //       e.preventDefault();
    //       var formData = new FormData(this);
    //       var no_pk = $('#form-update-modal').find('#no_Pk').val();
    //       var debitur = $('#form-update-modal').find('#Debitur').val();
    //       var jenis_asuransi = $('#form-update-modal').find('#jenisAsuransi').val();
    //       var tgl_lahir = $('#form-update-modal').find('#tanggalLahir').val();
    //       var tenor = $('#form-update-modal').find('#masaKredit').val();
    //       var plafon = $('#form-update-modal').find('#plafonPinjaman').val();
    //       var tgl_upload = $('#form-update-modal').find('#tanggalRegistrasi').val();
    //       var tgl_awal = $('#form-update-modal').find('#tanggalAkadAwal').val();
    //       var id_prod_ajk = $('#form-update-modal').find('#idProd').val();
    //       // alert(tenor);
    //       tableText(no_pk,debitur,jenis_asuransi,tgl_lahir, tenor, plafon, tgl_upload, tgl_awal, id_prod_ajk); 
    //     });
    // function tableText(no_pk,debitur,jenis_asuransi,tgl_lahir, tenor, plafon, tgl_upload, tgl_awal, id_prod_ajk) {
    //             // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
    //             //modal cetak 

    //             $(".modal-body").find("#Debitur").val(debitur);
    //             $(".modal-body").find("#noKredit").val(no_pk);
    //             $(".modal-body").find("#jenisAsuransi").val(jenis_asuransi);
    //             $(".modal-body").find("#tanggalLahir").val(tgl_lahir);
    //             $(".modal-body").find("#masaKredit").val(tenor);
    //             $(".modal-body").find("#plafonPinjaman").val(plafon);
    //             $(".modal-body").find("#tanggalRegistrasi").val(tgl_upload);
    //             $(".modal-body").find("#tanggalAkadAwal").val(tgl_awal);
    //             $(".modal-body").find("#idProd").val(id_prod_ajk);
    //             // $(".modal-body").find("#noKwitansi").val(no_kwitansi);

    //             // $(".modal-body").find("#cabang").val(dokumens[0].cabang);
    //             // $(".modal-body").find("#namaNasabah").val(dokumens[0].nama_nasabah);
    //             // $(".modal-body").find("#plafon").val(numberWithCommas(dokumens[0].plafon));
    //             // $(".modal-body").find("#tanggalBooking").val(dokumens[0].tgl_booking);
    //             // $(".modal-body").find("#merek").val(dokumens[0].merk);
    //             // $(".modal-body").find("#tipe").val(dokumens[0].tipe);
    //             // $(".modal-body").find("#kategori").val(dokumens[0].kategori);
    //             // $(".modal-body").find("#model").val(dokumens[0].jenis_asuransi);
    //             // $(".modal-body").find("#jenisKendaraan").val(dokumens[0].model_kend);
    //             // $(".modal-body").find("#noRangka").val(dokumens[0].no_rangka);
    //             // $(".modal-body").find("#noMesin").val(dokumens[0].no_mesin);
    //             // $(".modal-body").find("#noPolisi").val(dokumens[0].no_polisi);
    //             // $(".modal-body").find("#noBpkb").val(dokumens[0].no_bpkb);
    //             // $(".modal-body").find("#tahun").val(dokumens[0].tahun);
    //             // $(".modal-body").find("#tenor").val(dokumens[0].tenor);
    //             // $(".modal-body").find("#rate").val(dokumens[0].rate);
    //             // $(".modal-body").find("#premiPertahun").val(numberWithCommas(dokumens[0].premi));
    //             // $(".modal-body").find("#premiAdmin").val(numberWithCommas(dokumens[0].premi_admin));
    //             // if (dokumens[0].premi != dokumens[0].premi_admin){
    //             //   $('#premiPertahun').css({ background: "red", color:"white" });
    //             // }else{
    //             //   $('#premiPertahun').css({ background: "", color:"" });
    //             // }
    //             // $(".modal-body").find("#premiSekaligus").val(numberWithCommas(dokumens[0].premi_sekaligus));
    //             // $(".modal-body").find("#wilayah").val(dokumens[0].wilayah);

    //             $updateEventModal.modal('show');
    //             $addEventModal.modal('hide');
    //       //       if (dataIdx != 0){
    //       //         // ... do something with `rowData`
    //       //         tableText(valueIdx['no_pin']);
    //       // }

    //     }
    $("#prosesUpdateSatuan").on('click', function(er) {
          er.preventDefault();
          $("#form-updatee-modal").submit();
        });


    $('#form-updatee-modal').on('submit', function (er) {
        er.preventDefault();
        var formData = new FormData(this);

        for (var pair of formData.entries()) {
          console.log(pair[0]+ ', ' + pair[1]);
        }
        // var no_pk = formData.get('Debitur');
        var nopk = formData.get('no_kredit');
          if(nopk =='' || nopk ==null){
            alert('Isi Data');
             
          }else{
             $.ajax({
                type: 'POST',
                url : "./PenutupanSatuan/updatedata",
                enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                alert(data.message);
                reloadtable2();
                $updateEventModal.modal('hide');

                }
              });
          }
      });

      $('#data-table-example2 tbody').on( 'click', 'td', function () {
        // e.preventDefault();
        var table = $('#data-table-example2').DataTable();
        var valueIdx = table.row( this ).data();
        var visIdx = $(this).index();
        var dataIdx = table.column.index( 'fromVisible', visIdx );
        clearModal();
        if (dataIdx > 3 ){
            // ... do something with `rowData`
            tableText(valueIdx);
          }
          
        } );

        function clearModal() {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                //modal cetak 

                $(".modal-body").find("#noKwitansi").val('');
                $(".modal-body").find("#Debitur").val('');
                $(".modal-body").find("#no_Pk").val('');
                $(".modal-body").find("#jenisAsuransi").val('');
                $(".modal-body").find("#tglLahir").val('');
                $(".modal-body").find("#Umur").val('');
                $(".modal-body").find("#tglAwal").val('');
                $(".modal-body").find("#Plafon").val('');
                $(".modal-body").find("#masaKredit").val('');

        }

        function tableText(valueIdx) {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                //modal cetak 

                $(".modal-body").find("#Debitur").val(valueIdx['debitur']);
                $(".modal-body").find("#noKredit").val(valueIdx['no_pk']);
                $(".modal-body").find("#jenisAsuransi").val(valueIdx['kode_prod']);
                $(".modal-body").find("#tanggalLahir").val(valueIdx['tgl_lahir']);
                $(".modal-body").find("#Umur").val(valueIdx['umur']);
                $(".modal-body").find("#tanggalAkadAwal").val(valueIdx['tgl_awal']);
                $(".modal-body").find("#plafonPinjaman").val(parseInt(valueIdx['plafon']));
                $(".modal-body").find("#tanggalRegistrasi").val(valueIdx['tgl_upload']);
                $(".modal-body").find("#masaKredit").val(valueIdx['tenor']);
                $(".modal-body").find("#noKwitansi").val(valueIdx['no_kwitansi']);
                $(".modal-body").find("#idProd").val(valueIdx['id_prod_ajk']);
                $updateEventModal.modal('show');
                
               

        }

    });
</script>


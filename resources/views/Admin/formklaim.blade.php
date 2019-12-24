<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon m--hide">
                <i class="la la-gear"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Form Klaim Asuransi Jiwa
              </h3>
            </div>
          </div>
          <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
              @if($posisiuser == 2)
              <li class="m-portlet__nav-item">
                <button type="submit" id="uploadForm" name="uploadform" class="btn btn-accent" title="Upload Form Klaim">
                  <i class="la la-upload"> Upload Form Klaim</i>
                </button>
                <!-- <a href="/printnm" m-portlet-tool="Add" title="Print NM" class="m-portlet__nav-link m-portlet__nav-link--icon"> -->
                  <!-- </a> -->
                </li>
                @endif
                @if($posisiuser == 1)
                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                  <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn-sm  btn-info m-btn m-btn--pill">
                    Klaim NonPks
                  </a>
                  <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                      <div class="m-dropdown__body">
                        <div class="m-dropdown__content">
                          <ul class="m-nav">
                           <li class="m-nav__item">
                            <button type="button" id="BtnAddKlaim" name="BtnAddKlaim" class="btn btn-info btn-sm" style="border-color: white;">
                            Add
                            </button>
                           </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                  <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn-sm  btn-info m-btn m-btn--pill">
                    Dok Klaim
                  </a>
                  <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                      <div class="m-dropdown__body">
                        <div class="m-dropdown__content">
                          <ul class="m-nav">
                            <li class="m-nav__section m-nav__section--first">
                              <span class="m-nav__section-text">
                               Form Klaim
                             </span>
                           </li>
                           <li class="m-nav__item">
                            <a href="/formklaim" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-download"></i>
                              <span class="m-nav__link-text">
                                download
                              </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              
              <!-- <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn-sm  btn-info m-btn m-btn--pill">
                  Dok Asuransi
                </a>
                <div class="m-dropdown__wrapper">
                  <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                  <div class="m-dropdown__inner">
                    <div class="m-dropdown__body">
                      <div class="m-dropdown__content">
                        <ul class="m-nav">
                          <li class="m-nav__section m-nav__section--first">
                            <span class="m-nav__section-text">
                             Dari
                           </span>
                         </li>
                         <li class="m-nav__item">
                          <i class="flaticon-search-magnifier-interface-symbol"></i>
                          <button type="button" id="LihatAsuransi" name="LihatAsuransi" class="btn btn-secondary btn-sm" style="border-color: white;">
                            Asuransi
                          </button>
                        </li>
                        <li class="m-nav__item">
                          <button type="button" id="LihatAsuransii" name="LihatAsuransii" class="btn btn-info btn-sm" style="border-color: white;">
                            Kembali
                          </button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </li> -->
            @endif
          </ul>

        </div>
      </div>
      <!--begin::Form-->
      <div class="m-portlet__body">
        <div class="form-group m-form__group row">
        @if($posisiuser != 3)
        <div class="col-lg-6">
            <h3 align="center">
              Daftar Debitur
            </h3>
            <table id="data-table-example2" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <!-- <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th> -->
                  <th>No.</th>
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
            
          @endif
               @if($posisiuser == 3 )
               <div class="col-lg-12">
              <h3 align="center">
                Daftar Klaim
              </h3>
                <table id="data-table-example3" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <!-- <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th> -->
                    <th>No.</th>
                    <th>Download File</th>
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
                  <td colspan='18'>Total</td>
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
                @elseif($posisiuser == 2 )
               <div class="col-lg-6">
              <h3 align="center">
                Daftar Klaim
              </h3>
                <table id="data-table-example3" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <!-- <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th> -->
                    <th>No.</th>
                    <th>Download File</th>
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
                <tbody>

                  <!-- Data Table Goes Here -->

                </table>
                </div>
                @else
                <div class="col-lg-6">
              <h3 align="center">
                Daftar Klaim
              </h3>
              <table id="data-table-example3" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <!-- <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th> -->
                      <th>No.</th>
                      <th>Download File</th>
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
                  <tbody>

                    <!-- Data Table Goes Here -->

                  </table>
                </div>
                  @endif

              </div>
              <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FormDebitur" method="post" enctype="multipart/form-data" action>
                <div class="form-group m-form__group row">
                  <div class="col-lg-6">
                    <div class="col-lg-12">
                      <label class="">
                        No Sertifikat:
                      </label>
                      <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="idProd" name="id_prod"  readonly>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="noSertifikat" name="no_sertifikat" aria-describedby="emailHelp" placeholder="Enter No. Sertifikat" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label>
                        Jenis Kredit:
                      </label>
                      <select class="form-control m-input m-input--air m-input--pill" id="jenisKredit" name="jenis_kredit" >
                        <option value="">--Select--</option>
                        @foreach($jeniskredit as $jenis)
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
                        No Kredit:
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="noKredit" name="no_kredit" aria-describedby="">
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Debitur:
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur" aria-describedby="emailHelp" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Tanggal Lahir
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalLahir" name="tanggal_lahir" />
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
                      <label class="">
                        Tanggal Akad Kredit
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalAkad" name="tanggal_akad" />
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
                      <label class="">
                        Masa Kredit
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="masaKredit" name="masa_kredit" aria-describedby="">
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Plafon Pinjaman
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="plafonPinjaman" name="plafon_pinjaman" aria-describedby="" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Premi
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="Premi" name="premi" aria-describedby="" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="col-lg-12">
                      <label class="">
                        Tanggal Lapor
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="idProdAjk" name="id_prod_ajk" >
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalLapor" name="tgl_lapor" placeholder="isi tanggal lapor"  />
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
                      <label class="">
                        Tanggal Kejadian
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalKejadian" name="tgl_kejadian" />
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
                        Jenis Klaim
                      </label>
                      <select class="form-control m-input m-input--air m-input--pill" id="jenisKlaim" name="jenis_klaim" >
                        <option value="">--Select--</option>
                        <option>MENINGGAL NORMAL</option>
                        <option>MENINGGAL KECELAKAAN</option>
                        <option>MACET/PHK</option>
                        <option>PAW</option>
                      </select>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Nilai Klaim
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="nilaiKLaim" name="nilai_klaim" aria-describedby="" placeholder="isi nilai klaim" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Tanggal Dok. Lengkap
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalDokLengkap" name="tgl_dok_lengkap" />
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
                    @if($posisiuser == 3)
                    <div class="col-lg-12">
                      <label>
                        Status Klaim:
                      </label>
                      <select class="form-control m-input m-input--air m-input--pill" id="stsKlaim" name="sts_klaim" required>
                        <option value="">--Select--</option>
                        <option >ON PROSES</option>
                        <option >DITERIMA</option>
                        <option >DITOLAK</option>
                        <option >DIBAYAR</option>

                      </select>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12" id="fileUpload" style="display: none;">
                      <label>
                        Upload :
                      </label>
                      <input type="file" class="form-control m-input m-input--air m-input--pill" id="File" name="file[]" aria-describedby="" required>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Di Bayar
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="diBayar" name="dibayar" aria-describedby="emailHelp" placeholder="isi jumlah bayar" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Tanggal Bayar
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalBayar" name="tanggal_bayar" placeholder="isi tanggal bayar"  />
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
                      <label class="">
                        Keterangan
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="Keterangan" name="keterangan" aria-describedby="emailHelp" placeholder="isi keterangan" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                      @endif
                    </div>

                  </div>
                  <div class="form-group m-form__group row">
                    <div class="col-lg-4">
                      <div class="col-lg-12">
                        <label class="">
                          Dok 1:
                        </label>
                        <input type="checkbox" id="chkFile1" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok1" name="namafile1" aria-described1by="emailHelp" placeholder="isi nama dok. 1" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok1[]" id="Dok1"  multiple>
                        <!-- <input class="btn btn-primary m-btn m-btn--icon m-btn--pill m-btn--air" type="button" name="dok1" id="Dok1" value="download"> -->
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil1" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 2:
                        </label>
                        <input type="checkbox" id="chkFile2" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok2" name="namafile2" aria-described1by="emailHelp" placeholder="isi nama dok. 2" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok2[]" id="Dok2"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil2" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 3:
                        </label>
                        <input type="checkbox" id="chkFile3" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok3" name="namafile3" aria-described1by="emailHelp" placeholder="isi nama dok. 3" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok3[]" id="Dok3"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil3" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 4:
                        </label>
                        <input type="checkbox" id="chkFile4" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok4" name="namafile4" aria-described1by="emailHelp" placeholder="isi nama dok. 4" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok4[]" id="Dok4"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil4" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 5:
                        </label>
                        <input type="checkbox" id="chkFile5" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok5" name="namafile5" aria-described1by="emailHelp" placeholder="isi nama dok. 5" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok5[]" id="Dok5"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil5" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="col-lg-12">
                        <label class="">
                          Dok 6:
                        </label>
                        <input type="checkbox" id="chkFile6" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok6" name="namafile6" aria-described1by="emailHelp" placeholder="isi nama dok. 6" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok6[]" id="Dok6"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil6" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 7:
                        </label>
                        <input type="checkbox" id="chkFile7" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok7" name="namafile7" aria-described1by="emailHelp" placeholder="isi nama dok. 7" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok7[]" id="Dok7"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil7" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 8:
                        </label>
                        <input type="checkbox" id="chkFile8" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok8" name="namafile8" aria-described1by="emailHelp" placeholder="isi nama dok. 8" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok8[]" id="Dok8"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil8" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 9:
                        </label>
                        <input type="checkbox" id="chkFile9" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok9" name="namafile9" aria-described1by="emailHelp" placeholder="isi nama dok. 9" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok9[]" id="Dok9"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil9" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 10:
                        </label>
                        <input type="checkbox" id="chkFile10" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok10" name="namafile10" aria-described1by="emailHelp" placeholder="isi nama dok. 10" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok10[]" id="Dok10"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil10" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="col-lg-12">
                        <label class="">
                          Dok 11:
                        </label>
                        <input type="checkbox" id="chkFile11" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok11" name="namafile11" aria-described1by="emailHelp" placeholder="isi nama dok. 11" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok11[]" id="Dok11"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil11" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 12:
                        </label>
                        <input type="checkbox" id="chkFile12" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok12" name="namafile12" aria-described1by="emailHelp" placeholder="isi nama dok. 12" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok12[]" id="Dok12"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil12" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 13:
                        </label>
                        <input type="checkbox" id="chkFile13" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok13" name="namafile13" aria-described1by="emailHelp" placeholder="isi nama dok. 13" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok13[]" id="Dok13"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil13" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 14:
                        </label>
                        <input type="checkbox" id="chkFile14" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok14" name="namafile14" aria-described1by="emailHelp" placeholder="isi nama dok. 14" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok14[]" id="Dok14"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil14" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="col-lg-12">
                        <label class="">
                          Dok 15:
                        </label>
                        <input type="checkbox" id="chkFile15" >
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok15" name="namafile15" aria-described1by="emailHelp" placeholder="isi nama dok. 15" required>
                        <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok15[]" id="Dok15"  multiple>
                        <a href="#" class="btn btn-primary btn-sm m-btn m-btn--icon m-btn--pill m-btn--air" id="Pil15" style="display: none;">
                          <span>
                            <i class="fa flaticon-download"></i>
                            <span>
                              download
                            </span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-lg-6">
                        <button type="submit" id="ProsesSaveKlaim" name="ProsesSaveKlaim" class="btn btn-info">
                          Simpan
                          <i class="flaticon-file-1"></i>
                        </button>
                      </div>
                      <!-- @if($kode === 3 OR $kode === 2 )
                      <div class="col-lg-6">
                        <button type="submit" id="ProsesKirimKeAdmin" name="ProsesKirimKeAdmin" class="btn btn-info">
                          {{$valuebutton}}
                          <i class="flaticon-paper-plane"></i>
                        </button>
                      </div>
                      @endif -->
                    </div>
                  </form>


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
              <input type="text" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk"  readonly>
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
  <div class="modal fade" id="addEventModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Upload Form Klaim</h3>
          <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form class="m-form m-form--fit m-form--label-align-right" id="form-upload-modal" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="m-portlet__body">

              <div class="form-control-feedback">
                <label class="col-form-label col-lg-3 col-sm-12">
                 Pilih File
               </label>
               <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="no_Pk" name="no_pk"  readonly>
               <input type="file" class="form-control m-input m-input--air m-input--pill" id="fileUpload" name="file_upload[]" multiple>
               <span class="m-form__help">
                <!-- Example help text that remains unchanged. -->
              </span>
            </div>
            <!-- <div class="form-control-warning">
              <label class="col-form-label col-lg-3 col-sm-12">
                Debitur
              </label>
              <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur"  readonly>
               <span class="m-form__help">
                  Example help text that remains unchanged.
                </span>
              </div> -->
              <div class="col-mg-6" align="right">
                <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="uploadFile" name="uploadfile">
                  Upload  
                  <i class="flaticon-up-arrow-1"></i>
                </button>
                <!-- <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonUpdateData" name="buttonUpdateData">
                  Update Data  
                  <i class="flaticon-edit-1"></i>
                </button> -->
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
    <div class="modal fade" id="addNonPksEventModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Add Klaim Non Pks</h3>
          <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form class="m-form m-form--fit m-form--label-align-right" id="form-add-klaim-modal" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="m-portlet__body">

              <div class="form-group m-form__group row">
                  <div class="col-lg-6">
                    <div class="col-lg-12">
                      <label class="">
                        No Sertifikat:
                      </label>
                      <input type="hidden" class="form-control m-input m-input--air m-input--pill" id="idProd" name="id_prod"  readonly>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="noSertifikat" name="no_sertifikat" aria-describedby="emailHelp" placeholder="Enter No. Sertifikat" required>
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label>
                        Nama Asuransi & Broker:
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="jenisKredit" name="jenis_kredit" aria-describedby="Nama Asuransi" required>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        No Kredit:
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="noKredit" name="no_kredit" aria-describedby="" required>
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Debitur:
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="Debitur" name="debitur" aria-describedby="emailHelp" required>
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Tanggal Lahir
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalLahir" name="tanggal_lahir" required/>
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
                      <label class="">
                        Tanggal Akad Kredit
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalAkad" name="tanggal_akad" required/>
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
                      <label class="">
                        Masa Kredit
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="masaKredit" name="masa_kredit" aria-describedby="" required>
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Plafon Pinjaman
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="plafonPinjaman" name="plafon_pinjaman" aria-describedby="" required>
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Premi
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="Premi" name="premi" aria-describedby="" required>
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="col-lg-12">
                      <label class="">
                        Tanggal Lapor
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="idProdAjk" name="id_prod_ajk" >
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalLapor" name="tgl_lapor" placeholder="isi tanggal lapor" required />
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
                      <label class="">
                        Tanggal Kejadian
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalKejadian" name="tgl_kejadian" required/>
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
                        Jenis Klaim
                      </label>
                      <select class="form-control m-input m-input--air m-input--pill" id="jenisKlaim" name="jenis_klaim" required>
                        <option value="">--Select--</option>
                        <option>MENINGGAL NORMAL</option>
                        <option>MENINGGAL KECELAKAAN</option>
                        <option>MACET/PHK</option>
                        <option>PAW</option>
                      </select>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12">
                      <label>
                        Keterangan:
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="keterangan" name="keterangan" aria-describedby="Keterangan" required>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Nilai Klaim
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="nilaiKLaim" name="nilai_klaim" aria-describedby="" placeholder="isi nilai klaim" required>
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    
                    @if($posisiuser == 3)
                    <div class="col-lg-12">
                      <label>
                        Status Klaim:
                      </label>
                      <select class="form-control m-input m-input--air m-input--pill" id="stsKlaim" name="sts_klaim" required>
                        <option value="">--Select--</option>
                        <option >ON PROSES</option>
                        <option >DITERIMA</option>
                        <option >DITOLAK</option>
                        <option >DIBAYAR</option>

                      </select>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12" id="fileUpload" style="display: none;">
                      <label>
                        Upload :
                      </label>
                      <input type="file" class="form-control m-input m-input--air m-input--pill" id="File" name="file[]" aria-describedby="" required>
                      <span class="m-form__help">
                        <!-- Please choose jenis asuransi -->
                      </span>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Di Bayar
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="diBayar" name="dibayar" aria-describedby="emailHelp" placeholder="isi jumlah bayar" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="">
                        Tanggal Bayar
                      </label>
                      <div class="input-daterange input-group datepicker-demo">
                        <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalBayar" name="tanggal_bayar" placeholder="isi tanggal bayar"  />
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
                      <label class="">
                        Keterangan
                      </label>
                      <input type="text" class="form-control m-input m-input--air m-input--pill" id="Keterangan" name="keterangan" aria-describedby="emailHelp" placeholder="isi keterangan" >
                      <div>
                        <span class="m-form__help">
                          <!-- Please enter credit number -->
                        </span>
                      </div>
                      @endif
                    </div>
                    <div class="col-mg-12" align="right">
                    <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="uploadFile" name="uploadfile">
                        Save  
                        <i class="flaticon-up-arrow-1"></i>
                      </button>
                      <!-- <button type="sumbit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="buttonUpdateData" name="buttonUpdateData">
                        Update Data  
                        <i class="flaticon-edit-1"></i>
                      </button> -->
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
        var e = {!!$posisiasuransi!!};
        var f = {!!$posisiuser!!};
        var $addEventModal = $('#addEventModal');
        $addEventModal.appendTo('body');
        
        var $addNonPksEventModal = $('#addNonPksEventModal');
        $addNonPksEventModal.appendTo('body');
        
        $("#BtnAddKlaim").on('click', function(ev) {
  // addEventModal2.show();
  $addNonPksEventModal.modal('show');
    ev.preventDefault();
    // $("#form-updatee-modal").submit();
  });
        var table = $('#data-table-example2').DataTable({
          // "responsive": true,
          "scrollY": 250,
          "scrollX": true,
          "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Klaim/reload/polis",
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
          // }],
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": null},
          { "data": "sts_asuransi"},
          { "data": "no_polis" },
          { "data": "namaasuransi" },
          { "data": "no_pk" },
          { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "plafon" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "rate" },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaprod" },
            { "data": "posisidata" },
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
        table.on( 'order.dt search.dt', function () {
          table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();

        if(f == 3 ){
          var table2 = $('#data-table-example3').DataTable({
            // "responsive": true,
            "scrollY": 250,
            "scrollX": true,
            "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./DataKlaim/reload",
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
          // }],
          "order": [[ 1, 'asc' ]],
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 18;
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
          'columnDefs': [{
            'targets': 1,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
              var z = [];
              var cek = [
              "dok1", "dok2","dok3", "dok4",
              "dok5", "dok6", "dok7", "dok8",
              "dok9", "dok10", "dok11",
              "dok12", "dok13", "dok14", "dok15", ];
              var ket = [
              " Polis Sertifikat", " Form Klaim"," KTP", " SIM",
              " STNK", " Blokir STNK", " Inquiry", " Buku KIR",
              " Kunci Kontak", " Estimasi", " Laporan Polisi",
              " BAP", " Lapju", " STPL", " Surat Ket BB", 
              " Kartu Pengawas", " Surat Izin Usaha", " Trayek",
              " Tunggu Angka", " Foto Survey", " BPKB", " Faktur",
              " Sertifikat", " Blanko Kwitansi", " Subgrogasi",
              " Surat Dokumen Ke Cabang"];
              for (var j = 0; j < cek.length; j++) {
                var x = data[cek[j]];
                    // alert(x);
                    // statuschecked(cek[j], fieldArray[j]);
                    if(x != null){
                      // var x1 = JSON.parse(x);
                      z.push(cek[j]);
                    }
                  }  
                  if((data["dok1"] != null) || (data["dok2"] != null) || (data["dok3"] != null) || (data["dok4"] != null) || (data["dok5"] != null) || (data["dok6"] != null) || (data["dok7"] !=null) || (data["dok8"] !=null) || (data["dok9"] !=null) || (data["dok10"] !=null) || (data["dok11"] !=null) || (data["dok12"] !=null) || (data["dok13"] !=null) || (data["dok14"] !=null) || (data["dok15"] !=null)) {
                    return '<div class="m-dropdown m-dropdown--inline m-dropdown--inline m-dropdown--align-left" m-dropdown-toggle="hover"><button id="download-button" value="'+ data["id_klaim_ajk"] +'" alt="Unduh File" class="m-dropdown__toggle btn btn-accent dropdown-toggle"><i class="fa flaticon-download"> Dok.</i></button><div class="m-dropdown__wrapper"><div class="m-dropdown__inner"><div class="m-dropdown__body"><div class="m-dropdown__content"><ul class="m-nav"><li class="m-nav__section m-nav__section--first"><span class="m-nav__section-text">'+z+'</span></li></ul></div></div></div></div></div>';
                  }
                  else{
                    return 'no file';
                  }
                }
              },],
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


          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
        });

$('#data-table-example3 tbody').on( 'click', 'button', function (e) {
 e.preventDefault();

 var data = $('#data-table-example3').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );
            // var status_download = $('#statusDownload').val();
  // $.ajax({
  //           type: 'GET',
  //           url : "./downloadfileklaim/" + data['id_klaim_ajk'],
  //               contentType: false,       // The content type used when sending data to the server.
  //               cache: false,             // To unable request pages to be cached
  //               processData:false,
  //               success : function (data) {
  //                 if(data.status == 'success'){
  //                   alert(data.message);
  //                 }else{
  //                   alert('Data Klaim Gagal Dikirim');
  //                 }
  //               }
  //             });

  var win = window.open("./downloadfileklaim/" + data['id_klaim_ajk'], '_blank');
  if (win) {
                   //Browser has allowed it to be opened
                   win.focus();
                   $("#FormDataProgresKliem").find("#statusDownload").val('success');
                 } else {
                   //Browser has blocked it
                   alert('Please allow popups for this website');
                 }
               });
table2.on( 'order.dt search.dt', function () {
  table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  } );
} ).draw();

}else if(f == 2){
  var table2 = $('#data-table-example3').DataTable({
    // "responsive": true,
    "scrollY": 250,
    "scrollX": true,
    "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./DataKlaim/reload",
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
          // }],
          "order": [[ 1, 'asc' ]],
          // "footerCallback": function ( row, data, start, end, display ) {
          //   var api = this.api();
          //   nb_cols = api.columns().nodes().length;
          //   var j = 17;
          //   while(j < nb_cols){
          //     var pageTotal = api
          //           .column( j, { page: 'current'} )
          //           .data()
          //           .reduce( function (a, b) {
          //               return Number(a) + Number(b);
          //           }, 0 );
          //     // Update footer
          //     var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
          //     $( api.column( j ).footer() ).html(numFormat(pageTotal));
          //     j++;
          //   } 
          // },
          "columns" : [
          // { "data": null},
          { "data": null},
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
          'columnDefs': [{
            'targets': 1,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
              var z = [];
              var cek = [
              "dok1", "dok2","dok3", "dok4",
              "dok5", "dok6", "dok7", "dok8",
              "dok9", "dok10", "dok11",
              "dok12", "dok13", "dok14", "dok15", ];
              var ket = [
              " Polis Sertifikat", " Form Klaim"," KTP", " SIM",
              " STNK", " Blokir STNK", " Inquiry", " Buku KIR",
              " Kunci Kontak", " Estimasi", " Laporan Polisi",
              " BAP", " Lapju", " STPL", " Surat Ket BB", 
              " Kartu Pengawas", " Surat Izin Usaha", " Trayek",
              " Tunggu Angka", " Foto Survey", " BPKB", " Faktur",
              " Sertifikat", " Blanko Kwitansi", " Subgrogasi",
              " Surat Dokumen Ke Cabang"];
              for (var j = 0; j < cek.length; j++) {
                var x = data[cek[j]];
                    // alert(x);
                    // statuschecked(cek[j], fieldArray[j]);
                    if(x != null){
                      // var x1 = JSON.parse(x);
                      z.push(cek[j]);
                    }
                  }  
                  if((data["dok1"] != null) || (data["dok2"] != null) || (data["dok3"] != null) || (data["dok4"] != null) || (data["dok5"] != null) || (data["dok6"] != null) || (data["dok7"] !=null) || (data["dok8"] !=null) || (data["dok9"] !=null) || (data["dok10"] !=null) || (data["dok11"] !=null) || (data["dok12"] !=null) || (data["dok13"] !=null) || (data["dok14"] !=null) || (data["dok15"] !=null)) {
                    return '<div class="m-dropdown m-dropdown--inline m-dropdown--inline m-dropdown--align-left" m-dropdown-toggle="hover"><button id="download-button" value="'+ data["id_klaim_ajk"] +'" alt="Unduh File" class="m-dropdown__toggle btn btn-accent dropdown-toggle"><i class="fa flaticon-download"> Dok.</i></button><div class="m-dropdown__wrapper"><div class="m-dropdown__inner"><div class="m-dropdown__body"><div class="m-dropdown__content"><ul class="m-nav"><li class="m-nav__section m-nav__section--first"><span class="m-nav__section-text">'+z+'</span></li></ul></div></div></div></div></div>';
                  }
                  else{
                    return 'no file';
                  }
                }
              },],
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


          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
        });

$('#data-table-example3 tbody').on( 'click', 'button', function (e) {
 e.preventDefault();

 var data = $('#data-table-example3').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );
            // var status_download = $('#statusDownload').val();
  // $.ajax({
  //           type: 'GET',
  //           url : "./downloadfileklaim/" + data['id_klaim_ajk'],
  //               contentType: false,       // The content type used when sending data to the server.
  //               cache: false,             // To unable request pages to be cached
  //               processData:false,
  //               success : function (data) {
  //                 if(data.status == 'success'){
  //                   alert(data.message);
  //                 }else{
  //                   alert('Data Klaim Gagal Dikirim');
  //                 }
  //               }
  //             });

            // var win = window.open("./downloadfileklaim/" + data['id_klaim_ajk'], '_blank');
            // if (win) {
            //        //Browser has allowed it to be opened
            //        win.focus();
            //        $("#FormDataProgresKliem").find("#statusDownload").val('success');
            //      } else {
            //        //Browser has blocked it
            //        alert('Please allow popups for this website');
            //      }
          });
table2.on( 'order.dt search.dt', function () {
  table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  } );
} ).draw();

}else{
  var table2 = $('#data-table-example3').DataTable({
    // "responsive": true,
    "scrollY": 250,
    "scrollX": true,
    "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./DataKlaim/reload",
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
          // }],
          "order": [[ 1, 'asc' ]],
          // "footerCallback": function ( row, data, start, end, display ) {
          //   var api = this.api();
          //   nb_cols = api.columns().nodes().length;
          //   var j = 17;
          //   while(j < nb_cols){
          //     var pageTotal = api
          //           .column( j, { page: 'current'} )
          //           .data()
          //           .reduce( function (a, b) {
          //               return Number(a) + Number(b);
          //           }, 0 );
          //     // Update footer
          //     var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
          //     $( api.column( j ).footer() ).html(numFormat(pageTotal));
          //     j++;
          //   } 
          // },
          "columns" : [
          { "data": null},
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
          'columnDefs': [{
            'targets': 1,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
              var z = [];
              
              var cek = [
              "dok1", "dok2","dok3", "dok4",
              "dok5", "dok6", "dok7", "dok8",
              "dok9", "dok10", "dok11",
              "dok12", "dok13", "dok14", "dok15", ];
              var ket = [
              " Polis Sertifikat", " Form Klaim"," KTP", " SIM",
              " STNK", " Blokir STNK", " Inquiry", " Buku KIR",
              " Kunci Kontak", " Estimasi", " Laporan Polisi",
              " BAP", " Lapju", " STPL", " Surat Ket BB", 
              " Kartu Pengawas", " Surat Izin Usaha", " Trayek",
              " Tunggu Angka", " Foto Survey", " BPKB", " Faktur",
              " Sertifikat", " Blanko Kwitansi", " Subgrogasi",
              " Surat Dokumen Ke Cabang"];
              for (var j = 0; j < cek.length; j++) {
                var x = data[cek[j]];
                    // alert(x);
                    // statuschecked(cek[j], fieldArray[j]);
                    if(x != null){
                      // var x1 = JSON.parse(x);
                      z.push(cek[j]);
                    }
                  }  
                  if((data["dok1"] != null) || (data["dok2"] != null) || (data["dok3"] != null) || (data["dok4"] != null) || (data["dok5"] != null) || (data["dok6"] != null) || (data["dok7"] !=null) || (data["dok8"] !=null) || (data["dok9"] !=null) || (data["dok10"] !=null) || (data["dok11"] !=null) || (data["dok12"] !=null) || (data["dok13"] !=null) || (data["dok14"] !=null) || (data["dok15"] !=null)) {
                    return '<div class="m-dropdown m-dropdown--inline m-dropdown--inline m-dropdown--align-left" m-dropdown-toggle="hover"><button id="download-button" value="'+ data["id_klaim_ajk"] +'" alt="Unduh File" class="m-dropdown__toggle btn btn-accent dropdown-toggle"><i class="fa flaticon-download"> Dok.</i></button><div class="m-dropdown__wrapper"><div class="m-dropdown__inner"><div class="m-dropdown__body"><div class="m-dropdown__content"><ul class="m-nav"><li class="m-nav__section m-nav__section--first"><span class="m-nav__section-text">'+z+'</span></li></ul></div></div></div></div></div>';
                  }
                  else{
                    return 'no file';
                  }
                }
              },],
            });
$('#data-table-example3 tbody').on( 'click', 'button', function (e) {
 e.preventDefault();

 var data = $('#data-table-example3').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );
            // var status_download = $('#statusDownload').val();

            var win = window.open("./downloadfileklaim/" + data['id_klaim_ajk'], '_blank');
            if (win) {
                   //Browser has allowed it to be opened
                   win.focus();
                   $("#FormDataProgresKliem").find("#statusDownload").val('success');
                 } else {
                   //Browser has blocked it
                   alert('Please allow popups for this website');
                 }
               });
table2.on( 'order.dt search.dt', function () {
  table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  } );
} ).draw();
}

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
  clear();
  if (dataIdx != 0){
            // ... do something with `rowData`
            tableText(valueIdx);
          }
        } );

$('#data-table-example3 tbody').on( 'click', 'td', function () {
  var x = $('#data-table-example3').DataTable();
  var valueIdx = x.row( this ).data();
  var visIdx = $(this).index();
  var dataIdx = x.column.index( 'fromVisible', visIdx );
  clear();
  if (dataIdx != 0){
            // ... do something with `rowData`
            tableText2(valueIdx);
          // alert(valueIdx['nilai_kLaim']);

        }
          //   tableText2(valueIdx);
          // alert(valueIdx['no_pk']);
        } );

function tableText(valueIdx) {
  var current_datetime = new Date()
  var formatted_date = current_datetime.getDate() + "-" + (current_datetime.getMonth() ) + "-" + current_datetime.getFullYear()
                 // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                $("#FormDebitur").find("#idProd").val(valueIdx['id_prod_ajk']);
                $("#FormDebitur").find("#noSertifikat").val(valueIdx['no_polis']);
                $("#FormDebitur").find("#jenisKredit").val(valueIdx['kode_prod']);
                $("#FormDebitur").find("#noKredit").val(valueIdx['no_pk']);
                $("#FormDebitur").find("#Debitur").val(valueIdx['debitur']);
                $("#FormDebitur").find("#tanggalLahir").val(valueIdx['tgl_lahir']);
                $("#FormDebitur").find("#tanggalAkad").val(valueIdx['tgl_awal']);
                $("#FormDebitur").find("#masaKredit").val(valueIdx['tenor']);
                $("#FormDebitur").find("#plafonPinjaman").val(valueIdx['plafon']);
                $("#FormDebitur").find("#Premi").val(valueIdx['premi']);
                $("#FormDebitur").find("#idProdAjk").val(valueIdx['id_prod_ajk']);
                $("#FormDebitur").find("#jenisAsuransi").val(valueIdx['kode_prod']);
                // $("#FormDebitur").find("#tanggalLapor").val(valueIdx['tgl_lahir']);
                $("#FormDebitur").find("#tanggalLapor").val('');
                $("#FormDebitur").find("#tanggalKejadian").val('');
                $("#FormDebitur").find("#jenisKlaim").val('');
                $("#FormDebitur").find("#stsKlaim").val('');
                $("#FormDebitur").find("#nilaiKLaim").val('');
                $("#FormDebitur").find("#diBayar").val('');
                $("#FormDebitur").find("#tanggalBayar").val('');
                $("#FormDebitur").find("#Keterangan").val('');

                $("#FormDebitur").find("#tanggalLapor").datepicker('setDate', new Date());
                var fieldArray = [];
                var fieldArray2 = [];
                var cek = [
                "dok1", "dok2","dok3", "dok4",
                "dok5", "dok6", "dok7", "dok8",
                "dok9", "dok10", "dok11",
                "dok12", "dok13", "dok15"];
                var cek2 = [
                "#Dok1", "#Dok2","#Dok3", "#Dok4",
                "#Dok5", "#Dok6", "#Dok7", "#Dok8",
                "#Dok9", "#Dok10", "#Dok11",
                "#Dok12", "#Dok13", "#Dok14", "#Dok15", ];
                var namaFieldd = [
                "#namaDok1", "#namaDok2","#namaDok3", "#namaDok4",
                "#namaDok5", "#namaDok6", "#namaDok7", "#namaDok8",
                "#namaDok9", "#namaDok10", "#namaDok11",
                "#namaDok12", "#namaDok13", "#namaDok14", "#namaDok15"];

                for (var i =1; i<=15; i++){
                  fieldArray.push("#chkFile"+i);
                  fieldArray2.push("#Pil"+i);

                }
                  // var y = dokumensklaim[0].polis_sertifikat;
                  for (var j = 0; j < cek.length; j++) {
                    $("#FormDebitur").find(fieldArray[j]).prop("checked", false);
                    $("#FormDebitur").find(cek2[j]).show();
                    $("#FormDebitur").find(cek2[j]).val('');
                    $("#FormDebitur").find(cek2[j]).prop("disabled", true);
                    $(namaFieldd[j]).prop("disabled", true);
                    $(namaFieldd[j]).val('');
                    $(fieldArray2[j]).hide();
                  }
                // $addEventModal.modal('show');
              }

              function tableText2(valueIdx) {
                $.ajax({
                 type: 'POST',
                 dataType: 'json',
                 url : "./ClientDataKlaim/detail",
                 data: {
                   "_token": "{{ csrf_token() }}",
                   id_prod_ajk: valueIdx['id_prod_ajk'],
                 },
                 success : function (data) {
                  dokumens = data.dokumens;
                  dokumensklaim = data.dokumensklaim;
                  dok = data.dok;
                  file_spgr = data.dokumensklaim[0].file_spgr;
                  file_bukti_bayar = data.dokumensklaim[0].file_bukti_bayar;
                  file_surat_tolak = data.dokumensklaim[0].file_surat_tolak;
                  $("#FormDebitur").find("#idProd").val(dokumens[0].id_prod_ajk);
                  $("#FormDebitur").find("#noSertifikat").val(dokumens[0].no_polis);
                  $("#FormDebitur").find("#jenisKredit").val(dokumens[0].kode_prod);
                  $("#FormDebitur").find("#noKredit").val(dokumens[0].no_pk);
                  $("#FormDebitur").find("#Debitur").val(dokumens[0].debitur);
                  $("#FormDebitur").find("#tanggalLahir").val(dokumens[0].tgl_lahir);
                  $("#FormDebitur").find("#tanggalAkad").val(dokumens[0].tgl_awal);
                  $("#FormDebitur").find("#masaKredit").val(dokumens[0].tenor);
                  $("#FormDebitur").find("#plafonPinjaman").val(dokumens[0].plafon);
                  $("#FormDebitur").find("#Premi").val(dokumens[0].premi);
                  $("#FormDebitur").find("#idProdAjk").val(dokumens[0].id_prod_ajk);
                  $("#FormDebitur").find("#jenisAsuransi").val(dokumens[0].kode_prod);
                  $("#FormDebitur").find("#tanggalLapor").val(dokumensklaim[0].tgl_lapor);
                  $("#FormDebitur").find("#tanggalKejadian").val(dokumensklaim[0].tgl_kejadian);
                  $("#FormDebitur").find("#jenisKlaim").val(dokumensklaim[0].jns_klaim);
                  $("#FormDebitur").find("#stsKlaim").val(dokumensklaim[0].sts_klaim);
                  $("#FormDebitur").find("#nilaiKLaim").val(dokumensklaim[0].nilai_klaim);
                  $("#FormDebitur").find("#diBayar").val(dokumensklaim[0].dibayar);
                  $("#FormDebitur").find("#tanggalBayar").val(dokumensklaim[0].tglbayar);
                  $("#FormDebitur").find("#Keterangan").val(dokumensklaim[0].ket_klaim);

                  var fieldArray = [];
                  var fieldArray2 = [];
                  var cek = [
                  "dok1", "dok2","dok3", "dok4",
                  "dok5", "dok6", "dok7", "dok8",
                  "dok9", "dok10", "dok11",
                  "dok12", "dok13", "dok15"];
                  var cek2 = [
                  "#Dok1", "#Dok2","#Dok3", "#Dok4",
                  "#Dok5", "#Dok6", "#Dok7", "#Dok8",
                  "#Dok9", "#Dok10", "#Dok11",
                  "#Dok12", "#Dok13", "#Dok14", "#Dok15", ];
                  var namaFieldd = [
                  "#namaDok1", "#namaDok2","#namaDok3", "#namaDok4",
                  "#namaDok5", "#namaDok6", "#namaDok7", "#namaDok8",
                  "#namaDok9", "#namaDok10", "#namaDok11",
                  "#namaDok12", "#namaDok13", "#namaDok14", "#namaDok15"];

                  for (var i =1; i<=15; i++){
                    fieldArray.push("#chkFile"+i);
                    fieldArray2.push("#Pil"+i);
                    
                  }
                  // var y = dokumensklaim[0].polis_sertifikat;
                  for (var j = 0; j < cek.length; j++) {
                    var x = dok[0][cek[j]];
                    // alert(url);x
                    // statuschecked(cek[j], fieldArray[j]);
                    if(x != null){
                      $("#FormDebitur").find(fieldArray[j]).prop("checked", true);
                      $("#FormDebitur").find(cek2[j]).hide();
                      $(namaFieldd[j]).prop("disabled", false);
                      $(namaFieldd[j]).val(JSON.parse(x));
                      $(fieldArray2[j]).attr("href", "/filedok/"+dokumens[0].id_prod_ajk+"/"+JSON.parse(x)+"/"+cek[j]);
                      $(fieldArray2[j]).show();
                    }else{
                      $("#FormDebitur").find(cek2[j]).show();
                      $("#FormDebitur").find(cek2[j]).val('');
                      $("#FormDebitur").find(cek2[j]).prop("disabled", true);
                      $(namaFieldd[j]).prop("disabled", true);
                      $(namaFieldd[j]).val('');
                      $(fieldArray2[j]).hide();
                    }
                    // x
                  }
                }
              });
                // alert(valueIdx['dok1']);
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                
                // $("#FormDebitur").find("#noSertifikat").val(valueIdx['no_polis']);
                // $("#FormDebitur").find("#jenisKredit").val(valueIdx['kode_prod']);
                // $("#FormDebitur").find("#noKredit").val(valueIdx['no_pk']);
                // $("#FormDebitur").find("#Debitur").val(valueIdx['debitur']);
                // $("#FormDebitur").find("#tanggalLahir").val(valueIdx['tgl_lahir']);
                // $("#FormDebitur").find("#tanggalAkad").val(valueIdx['tanggal_awal']);
                // $("#FormDebitur").find("#masaKredit").val(valueIdx['tenor']);
                // $("#FormDebitur").find("#plafonPinjaman").val(valueIdx['plafon']);
                // $("#FormDebitur").find("#Premi").val(valueIdx['premi']);
                // $("#FormDebitur").find("#idProdAjk").val(valueIdx['id_prod_ajk']);
                // $("#FormDebitur").find("#jenisAsuransi").val(valueIdx['kode_prod']);
                // $("#FormDebitur").find("#tanggalLapor").val(valueIdx['tgl_lapor']);
                // $("#FormDebitur").find("#tanggalKejadian").val(valueIdx['tgl_kejadian']);
                // $("#FormDebitur").find("#jenisKlaim").val(valueIdx['jns_klaim']);
                // $("#FormDebitur").find("#stsKlaim").val(valueIdx['stsklaim']);
                // $("#FormDebitur").find("#nilaiKLaim").val(valueIdx['nilai_klaim']);
                // $("#FormDebitur").find("#diBayar").val(valueIdx['dibayar']);
                // $("#FormDebitur").find("#tanggalBayar").val(valueIdx['tglbayar']);
                // $("#FormDebitur").find("#Keterangan").val(valueIdx['ket_klaim']);
                // $addEventModal.modal('show');
              }
            //   var fieldId = [];
            // var fieldName = [];
            // var fieldIdFile = [];
            // for (var i =1; i<=15; i++){
            //   fieldId.push("#chkFile"+i);
            //   fieldName.push("#Dok"+i)
            //   fieldIdFile.push("#namaDok"+i)
            // }
            // for (var j = 0; j < cek.length; j++) {
            //   // alert(fieldId[j]);
            //   $('#chkFile'+j).attr("checked", true);
            //   $(fieldName[j]).prop("disabled", true);
            //   $(fieldIdFile[j]).prop("disabled", true);
            //   getEnabledChecklist(fieldId[i], fieldName[i]);
            // }
            function clear() {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                $("#FormDebitur").find("#idProd").val('');
                $("#FormDebitur").find("#noSertifikat").val('');
                $("#FormDebitur").find("#jenisKredit").val('');
                $("#FormDebitur").find("#noKredit").val('');
                $("#FormDebitur").find("#Debitur").val('');
                $("#FormDebitur").find("#tanggalLahir").val('');
                $("#FormDebitur").find("#tanggalAkad").val('');
                $("#FormDebitur").find("#masaKredit").val('');
                $("#FormDebitur").find("#plafonPinjaman").val('');
                $("#FormDebitur").find("#Premi").val('');
                $("#FormDebitur").find("#idProdAjk").val('');
                $("#FormDebitur").find("#jenisAsuransi").val('');
                $("#FormDebitur").find("#tanggalLapor").val('');
                $("#FormDebitur").find("#tanggalKejadian").val('');
                $("#FormDebitur").find("#jenisKlaim").val('');
                $("#FormDebitur").find("#stsKlaim").val('');
                $("#FormDebitur").find("#nilaiKLaim").val('');
                $("#FormDebitur").find("#diBayar").val('');
                $("#FormDebitur").find("#tanggalBayar").val('');
                $("#FormDebitur").find("#Keterangan").val('');
                // $addEventModal.modal('show');
              }
            //   var fieldId = [];
            // var fieldName = [];
            // var fieldIdFile = [];
            // for (var i =1; i<=15; i++){
            //   fieldId.push("#chkFile"+i);
            //   fieldName.push("#Dok"+i)
            //   fieldIdFile.push("#namaDok"+i)
            // }
            // for (var j = 0; j < cek.length; j++) {
            //   // alert(fieldId[j]);
            //   $('#chkFile'+j).attr("checked", true);
            //   $(fieldName[j]).prop("disabled", true);
            //   $(fieldIdFile[j]).prop("disabled", true);
            //   getEnabledChecklist(fieldId[i], fieldName[i]);
            // }
            if(e == 3){
              $("#FormDebitur").find("#noSertifikat").prop("disabled", true);
              $("#FormDebitur").find("#jenisKredit").prop("disabled", true);
              $("#FormDebitur").find("#noKredit").prop("disabled", true);
              $("#FormDebitur").find("#Debitur").prop("disabled", true);
              $("#FormDebitur").find("#tanggalLahir").prop("disabled", true);
              $("#FormDebitur").find("#tanggalAkad").prop("disabled", true);
              $("#FormDebitur").find("#masaKredit").prop("disabled", true);
              $("#FormDebitur").find("#plafonPinjaman").prop("disabled", true);
              $("#FormDebitur").find("#Premi").prop("disabled", true);
              $("#FormDebitur").find("#idProdAjk").prop("disabled", true);
              $("#FormDebitur").find("#jenisAsuransi").prop("disabled", true);
              $("#FormDebitur").find("#tanggalLapor").prop("disabled", true);
              $("#FormDebitur").find("#tanggalKejadian").prop("disabled", true);
              $("#FormDebitur").find("#jenisKlaim").prop("disabled", true);
              $("#FormDebitur").find("#nilaiKLaim").prop("disabled", true);
              $("#FormDebitur").find("#chkFile1").prop("disabled", true);
              $("#FormDebitur").find("#chkFile2").prop("disabled", true);
              $("#FormDebitur").find("#chkFile3").prop("disabled", true);
              $("#FormDebitur").find("#chkFile4").prop("disabled", true);
              $("#FormDebitur").find("#chkFile5").prop("disabled", true);
              $("#FormDebitur").find("#chkFile6").prop("disabled", true);
              $("#FormDebitur").find("#chkFile7").prop("disabled", true);
              $("#FormDebitur").find("#chkFile8").prop("disabled", true);
              $("#FormDebitur").find("#chkFile9").prop("disabled", true);
              $("#FormDebitur").find("#chkFile10").prop("disabled", true);
              $("#FormDebitur").find("#chkFile11").prop("disabled", true);
              $("#FormDebitur").find("#chkFile12").prop("disabled", true);
              $("#FormDebitur").find("#chkFile13").prop("disabled", true);
              $("#FormDebitur").find("#chkFile14").prop("disabled", true);
              $("#FormDebitur").find("#chkFile15").prop("disabled", true);
            }

          };

          $(document).ready(function() {
            var f = {!!$posisiuser!!};
            var $addEventModal = $('#addEventModal');
            var $addEventModal2 = $('#addEventModal2');
            $addEventModal.appendTo('body');
            $addEventModal2.appendTo('body');
            var $addNonPksEventModal = $('#addNonPksEventModal');
            $addNonPksEventModal.appendTo('body');
            
            var fieldId = [];
            var fieldName = [];
            var fieldIdFile = [];
            var filechoose = [];
            var cek = [
            "polis_sertifikat", "form_klaim","ktp", "sim",
            "stnk", "blokir_stnk", "inquiry", "buku_kir",
            "kunci_kontak", "estimasi", "laporan_polisi",
            "bap", "lapju", "stpl", "surat_ket_bb", 
            "kartu_pengawas", "surat_izin_usaha", "trayek",
            "tunggu_angka", "foto_survey", "bpkb", "faktur",
            "sertifikat", "blanko_kwitansi", "subgrogasi",
            "surat_dokumen_ke_cabang"];
            var namaField = [
            "#Dok1", "#Dok2","#Dok3", "#Dok4",
            "#Dok5", "#Dok6", "#Dok7", "#Dok8",
            "#Dok9", "#Dok10", "#Dok11",
            "#Dok12", "#Dok13", "#Dok14", "#Dok15"];

            for (var i =1; i<=15; i++){
              fieldId.push("#chkFile"+i);
              fieldName.push("#Dok"+i)
              fieldIdFile.push("#namaDok"+i)
              filechoose.push("#Pil"+i)
            }
            for (var j = 0; j < namaField.length; j++) {
              // alert(fieldId[j]);
              $('#chkFile'+j).attr("checked", false);
              $(fieldName[j]).prop("disabled", true);
              $(fieldIdFile[j]).prop("disabled", true);
              
            }

            for (var i = 0; i < fieldId.length; i++) {
              getEnabledChecklist(fieldId[i], fieldIdFile[i], fieldName[i], filechoose[i]);
            }

            function getEnabledChecklist(idField, namaField, fieldName, filechoose) {

              $(idField).on('change', function(e){
                e.preventDefault();
                var file1 =$(idField).is(":checked");
                if(file1 == false){ 
                  $(namaField).prop("disabled", true);
                  $(fieldName).prop("disabled", true);
                  $(namaField).val('');
                  $(fieldName).show();
                  $(filechoose).hide();
                }
                else if(file1 == true)
                {
                  $(namaField).prop("disabled", false);
                  $(fieldName).prop("disabled", false);
                  $(fieldName).show();
                  $(filechoose).hide();
                }
              });
            }

            var submitActor = null;
            var $form = $('#FormDebitur');
            var $submitActors = $form.find('button[type=submit]');

            $form.submit( function (e) {
              e.preventDefault();
              if (null === submitActor) {
          // return first button if nothing else
          submitActor = $submitActors[0];
        }

        var formData = new FormData(this);

        var buttonPressed = submitActor.name;
        
        switch (buttonPressed) {
          case 'ProsesSaveKlaim':
          if(f == 3){
            var statusklaim = $('#FormDebitur').find('#stsKlaim').val();
            var dibayar = $('#FormDebitur').find('#diBayar').val();
            var tglbayar = $('#FormDebitur').find('#tanggalBayar').val();
            var idprod = $('#FormDebitur').find('#idProd').val();
          if(idprod == ''){
            swal('Info', 'Pilih Data', 'info');
          }else if(statusklaim == 'DIBAYAR' && dibayar =='' && tglbayar ==''){
            swal('Info', 'Isi jumlah bayar dan pilih tanggal bayar', 'info');
          }else if(statusklaim == 'DIBAYAR' && dibayar !='' && tglbayar ==''){
            swal('Info', 'Pilih tanggal bayar', 'info');
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
                        url : "./Klaim",
                        enctype: 'multipart/form-data',
                            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            contentType: false,       // The content type used when sending data to the server.
                            cache: false,             // To unable request pages to be cached
                            processData:false,
                    })
                    .done(function(response){
                        if(response.status == 'success'){
                            reloadtable();
                            reloadtable4();
                            clear();
                            swal('Data has been saved', response.message, 'success');
                        }else{
                            swal('Info', 'Data Klaim Gagal DiSimpan', 'info');
                        }
                    
                    })
                    .fail(function(){
                    swal('Oops...', 'Something went wrong with network, repeat again !', 'error');
                    });
                });
                },
                allowOutsideClick: false     
                });
          }
        }else{
          var idprod = $('#FormDebitur').find('#idProd').val();
          if(idprod == ''){
            swal('Info', 'Pilih Data', 'info');
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
                      url : "./Klaim",
                      enctype: 'multipart/form-data',
                          data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                          contentType: false,       // The content type used when sending data to the server.
                          cache: false,             // To unable request pages to be cached
                          processData:false,
                  })
                  .done(function(response){
                      if(response.status == 'success'){
                          reloadtable();
                          reloadtable2();
                          swal('Data has been saved', response.message, 'success');
                      }else{
                          swal('Info', 'Data Klaim Gagal DiSimpan', 'info');
                      }
                  
                  })
                  .fail(function(){
                  swal('Oops...', 'Something went wrong with network, repeat again !', 'error');
                  });
              });
              },
              allowOutsideClick: false     
              });
          }
        }
        break;
        case 'ProsesKirimKeAdmin':
        $.ajax({
          type: 'POST',
          url : "./Klaim/Kirimkeadmin",
          enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  if(data.status == 'success'){
                    swal('Data has been send', data.message, 'success');
                    reloadtable();
                    reloadtable2();
                  }else{
                    swal('Data has not been send', 'Data Klaim Gagal Dikirim', 'info');
                  }
                }
              });
        break;
        default:

      }
    });

            $submitActors.click(function(event) {
              submitActor = this;
            });
            
            var submitActor3 = null;
            var $form3 = $('#form-add-klaim-modal');
            var $submitActors3 = $form3.find('button[type=submit]');

            $form3.submit( function (e) {
              e.preventDefault();
              if (null === submitActor) {
                // return first button if nothing else
                submitActor = $submitActors[0];
              }

              var formData = new FormData(this);

              var buttonPressed = submitActor.name;
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
                        url : "./KlaimNonPks",
                        enctype: 'multipart/form-data',
                        data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        contentType: false,       // The content type used when sending data to the server.
                        cache: false,             // To unable request pages to be cached
                        processData:false,
                    })
                    .done(function(response){
                        if(response.status == 'success'){
                            reloadtable();
                            reloadtable4();
                            clear();
                            swal('Data has been saved', response.message, 'success');
                            $addNonPksEventModal.modal('hide');
                        }else{
                            swal('Info', 'Data Klaim Gagal DiSimpan', 'info');
                        }
                    
                    })
                    .fail(function(){
                    swal('Oops...', 'Something went wrong with network, repeat again !', 'error');
                    });
                });
                },
                allowOutsideClick: false     
                });
            });

          $("#uploadForm").on('click', function(ev) {
            ev.preventDefault();
            $('#addEventModal2').modal('show');
            // $("#form-updatee-modal").submit();
          });
          
          $('#form-upload-modal').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            for (var pair of formData.entries()) {
              console.log(pair[0]+ ', ' + pair[1]);
            }
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
                      url : "./uploadformklaim",
                      enctype: 'multipart/form-data',
                        data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        contentType: false,       // The content type used when sending data to the server.
                        cache: false,             // To unable request pages to be cached
                        processData:false,
                    })
                    .done(function(response){
                      if(response.status == 'start_number' || response.status == 'new_number'){
                          $(".modal-body").find("#noKwitansi").val(data.dokumens);
                          // alert(data.dokumens);
                          $addEventModal2.modal('hide');
                        }else{
                          $addEventModal2.modal('hide');
                          swal('Info', response.message, 'info');
                        }
                    
                    })
                    .fail(function(){
                    swal('Oops...', 'Something went wrong with network, repeat again !', 'error');
                    });
                });
                },
                allowOutsideClick: false     
                });
          });

        function reloadtable(){
          var t = $('#data-table-example2').DataTable();
          t.rows().clear().draw();
          var table = $('#data-table-example2').DataTable({
            "scrollY": 250,
            "scrollX": true,
            "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Klaim/reload/polis",
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
          // }],
          "order": [[ 1, 'asc' ]],
          "columns" : [
          { "data": null},
          { "data": "sts_asuransi"},
          { "data": "no_polis" },
          { "data": "namaasuransi" },
          { "data": "no_pk" },
          { "data": "namaclient" },
            // { "data": "plafon", "render": $.fn.dataTable.render.number( ',', '.', 0 )},
            { "data": "debitur" },
            { "data": "tgl_lahir" },
            { "data": "umur" },
            { "data": "tenor" },
            { "data": "plafon" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "rate" },
            { "data": "premi" ,"render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
            { "data": "tgl_awal" },
            { "data": "tgl_akhir" },
            { "data": "namaprod" },
            { "data": "posisidata" },
            ],
        });
              table.ajax.reload();
              table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                  cell.innerHTML = i+1;
                } );
              } ).draw();

            }

            function reloadtable2(){
              var t = $('#data-table-example3').DataTable();
              t.rows().clear().draw();
              var table2 = $('#data-table-example3').DataTable({
                "scrollY": 250,
                "scrollX": true,
                "bDestroy": true,
                "ajax": {
                  "url": "./DataKlaim/reload",
                  "type": "GET"
                },
                "order": [[ 1, 'asc' ]],
                "columns" : [
                // { "data": null},
                { "data": null},
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
                'columnDefs': [{
                  'targets': 1,
                  'searchable':false,
                  'orderable':false,
                  'render': function (data, type, row){
                    var z = [];
                    var cek = [
                    "dok1", "dok2","dok3", "dok4",
                    "dok5", "dok6", "dok7", "dok8",
                    "dok9", "dok10", "dok11",
                    "dok12", "dok13", "dok14", "dok15", ];
                    var ket = [
                    " Polis Sertifikat", " Form Klaim"," KTP", " SIM",
                    " STNK", " Blokir STNK", " Inquiry", " Buku KIR",
                    " Kunci Kontak", " Estimasi", " Laporan Polisi",
                    " BAP", " Lapju", " STPL", " Surat Ket BB", 
                    " Kartu Pengawas", " Surat Izin Usaha", " Trayek",
                    " Tunggu Angka", " Foto Survey", " BPKB", " Faktur",
                    " Sertifikat", " Blanko Kwitansi", " Subgrogasi",
                    " Surat Dokumen Ke Cabang"];
              for (var j = 0; j < cek.length; j++) {
                var x = data[cek[j]];
                    if(x != null){
                      z.push(cek[j]);
                    }
                  }  
                  if((data["dok1"] != null) || (data["dok2"] != null) || (data["dok3"] != null) || (data["dok4"] != null) || (data["dok5"] != null) || (data["dok6"] != null) || (data["dok7"] !=null) || (data["dok8"] !=null) || (data["dok9"] !=null) || (data["dok10"] !=null) || (data["dok11"] !=null) || (data["dok12"] !=null) || (data["dok13"] !=null) || (data["dok14"] !=null) || (data["dok15"] !=null)) {
                    return '<div class="m-dropdown m-dropdown--inline m-dropdown--inline m-dropdown--align-left" m-dropdown-toggle="hover"><button id="download-button" value="'+ data["id_klaim_ajk"] +'" alt="Unduh File" class="m-dropdown__toggle btn btn-accent dropdown-toggle"><i class="fa flaticon-download"> Dok.</i></button><div class="m-dropdown__wrapper"><div class="m-dropdown__inner"><div class="m-dropdown__body"><div class="m-dropdown__content"><ul class="m-nav"><li class="m-nav__section m-nav__section--first"><span class="m-nav__section-text">'+z+'</span></li></ul></div></div></div></div></div>';
                  }
                  else{
                    return 'no file';
                  }
                }
              },],
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


          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
        });

$('#data-table-example3 tbody').on( 'click', 'button', function (e) {
 e.preventDefault();

 var data = $('#data-table-example3').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );
            // var status_download = $('#statusDownload').val();
  // $.ajax({
  //           type: 'GET',
  //           url : "./downloadfileklaim/" + data['id_klaim_ajk'],
  //               contentType: false,       // The content type used when sending data to the server.
  //               cache: false,             // To unable request pages to be cached
  //               processData:false,
  //               success : function (data) {
  //                 if(data.status == 'success'){
  //                   alert(data.message);
  //                 }else{
  //                   alert('Data Klaim Gagal Dikirim');
  //                 }
  //               }
  //             });

  var win = window.open("./downloadfileklaim/" + data['id_klaim_ajk'], '_blank');
  if (win) {
                   //Browser has allowed it to be opened
                   win.focus();
                   $("#FormDataProgresKliem").find("#statusDownload").val('success');
                 } else {
                   //Browser has blocked it
                   alert('Please allow popups for this website');
                 }
               });
table2.ajax.reload();
table2.on( 'order.dt search.dt', function () {
  table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  } );
} ).draw();

// $('#data-table-example2 tbody').on( 'click', 'td', function () {
//   var valueIdx = table.row( this ).data();
//   var visIdx = $(this).index();
//   var dataIdx = table.column.index( 'fromVisible', visIdx );
//   clear();
//   if (dataIdx != 0){
//             // ... do something with `rowData`
//             tableText(valueIdx);
//           }
//         } );

// $('#data-table-example3 tbody').on( 'click', 'td', function () {
//   var valueIdx = table.row( this ).data();
//   var visIdx = $(this).index();
//   var dataIdx = table.column.index( 'fromVisible', visIdx );
//   clear();
//   if (dataIdx != 0){
//             // ... do something with `rowData`
//             tableText2(valueIdx);
//           // alert(valueIdx['nilai_kLaim']);

//         }
//           //   tableText2(valueIdx);
//           // alert(valueIdx['no_pk']);
//         } );

}
function reloadtable4(){
  var t = $('#data-table-example3').DataTable();
  t.rows().clear().draw();
  var table2 = $('#data-table-example3').DataTable({
    // "responsive": true,
    "scrollY": 250,
    "scrollX": true,
    "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./DataKlaim/reload",
            // "url": "./DataKlaim/reloadlunas",
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
          // }],
          "order": [[ 1, 'asc' ]],
          // "footerCallback": function ( row, data, start, end, display ) {
          //   var api = this.api();
          //   nb_cols = api.columns().nodes().length;
          //   var j = 17;
          //   while(j < nb_cols){
          //     var pageTotal = api
          //           .column( j, { page: 'current'} )
          //           .data()
          //           .reduce( function (a, b) {
          //               return Number(a) + Number(b);
          //           }, 0 );
          //     // Update footer
          //     var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
          //     $( api.column( j ).footer() ).html(numFormat(pageTotal));
          //     j++;
          //   } 
          // },
          "columns" : [
          // { "data": null},
          { "data": null},
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
          'columnDefs': [{
            'targets': 1,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
              var z = [];
              var cek = [
              "dok1", "dok2","dok3", "dok4",
              "dok5", "dok6", "dok7", "dok8",
              "dok9", "dok10", "dok11",
              "dok12", "dok13", "dok14", "dok15", ];
              var ket = [
              " Polis Sertifikat", " Form Klaim"," KTP", " SIM",
              " STNK", " Blokir STNK", " Inquiry", " Buku KIR",
              " Kunci Kontak", " Estimasi", " Laporan Polisi",
              " BAP", " Lapju", " STPL", " Surat Ket BB", 
              " Kartu Pengawas", " Surat Izin Usaha", " Trayek",
              " Tunggu Angka", " Foto Survey", " BPKB", " Faktur",
              " Sertifikat", " Blanko Kwitansi", " Subgrogasi",
              " Surat Dokumen Ke Cabang"];
              for (var j = 0; j < cek.length; j++) {
                var x = data[cek[j]];
                    // alert(x);
                    // statuschecked(cek[j], fieldArray[j]);
                    if(x != null){
                      // var x1 = JSON.parse(x);
                      z.push(cek[j]);
                    }
                  }  
                  if((data["dok1"] != null) || (data["dok2"] != null) || (data["dok3"] != null) || (data["dok4"] != null) || (data["dok5"] != null) || (data["dok6"] != null) || (data["dok7"] !=null) || (data["dok8"] !=null) || (data["dok9"] !=null) || (data["dok10"] !=null) || (data["dok11"] !=null) || (data["dok12"] !=null) || (data["dok13"] !=null) || (data["dok14"] !=null) || (data["dok15"] !=null)) {
                    return '<div class="m-dropdown m-dropdown--inline m-dropdown--inline m-dropdown--align-left" m-dropdown-toggle="hover"><button id="download-button" value="'+ data["id_klaim_ajk"] +'" alt="Unduh File" class="m-dropdown__toggle btn btn-accent dropdown-toggle"><i class="fa flaticon-download"> Dok.</i></button><div class="m-dropdown__wrapper"><div class="m-dropdown__inner"><div class="m-dropdown__body"><div class="m-dropdown__content"><ul class="m-nav"><li class="m-nav__section m-nav__section--first"><span class="m-nav__section-text">'+z+'</span></li></ul></div></div></div></div></div>';
                  }
                  else{
                    return 'no file';
                  }
                }
              },],
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


          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
        });

        table2.ajax.reload();
        table2.on( 'order.dt search.dt', function () {
          table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();
$('#data-table-example3 tbody').on( 'click', 'button', function (e) {
 e.preventDefault();

 var data = $('#data-table-example3').DataTable().row( $(this).parents('tr') ).data();
  var win = window.open("./downloadfileklaim/" + data['id_klaim_ajk'], '_blank');
  if (win) {
                   //Browser has allowed it to be opened
                   win.focus();
                   $("#FormDataProgresKliem").find("#statusDownload").val('success');
                 } else {
                   //Browser has blocked it
                   alert('Please allow popups for this website');
                 }
               });


$('#data-table-example2 tbody').on( 'click', 'td', function () {
  var valueIdx = table.row( this ).data();
  var visIdx = $(this).index();
  var dataIdx = table.column.index( 'fromVisible', visIdx );
  clear();
  if (dataIdx != 0){
            // ... do something with `rowData`
            tableText(valueIdx);
          }
        } );
      
  //       $('#data-table-example3 tbody').on( 'click', 'td', function () {
  //         alert('ok');
  //         var x = $('#data-table-example3').DataTable()
  // var valueIdx = x.row( this ).data();
  // var visIdx = $(this).index();
  // var dataIdx = x.column.index( 'fromVisible', visIdx );
  // clear();
  // tableText2(valueIdx);
  
  // if (dataIdx != 0){
  //           tableText2(valueIdx);
  //       }
  //       } );
// 

}
// 
function tableText2(valueIdx) {
                $.ajax({
                 type: 'POST',
                 dataType: 'json',
                 url : "./ClientDataKlaim/detail",
                 data: {
                   "_token": "{{ csrf_token() }}",
                   id_prod_ajk: valueIdx['id_prod_ajk'],
                 },
                 success : function (data) {
                  dokumens = data.dokumens;
                  dokumensklaim = data.dokumensklaim;
                  dok = data.dok;
                  file_spgr = data.dokumensklaim[0].file_spgr;
                  file_bukti_bayar = data.dokumensklaim[0].file_bukti_bayar;
                  file_surat_tolak = data.dokumensklaim[0].file_surat_tolak;
                  $("#FormDebitur").find("#idProd").val(dokumens[0].id_prod_ajk);
                  $("#FormDebitur").find("#noSertifikat").val(dokumens[0].no_polis);
                  $("#FormDebitur").find("#jenisKredit").val(dokumens[0].kode_prod);
                  $("#FormDebitur").find("#noKredit").val(dokumens[0].no_pk);
                  $("#FormDebitur").find("#Debitur").val(dokumens[0].debitur);
                  $("#FormDebitur").find("#tanggalLahir").val(dokumens[0].tgl_lahir);
                  $("#FormDebitur").find("#tanggalAkad").val(dokumens[0].tgl_awal);
                  $("#FormDebitur").find("#masaKredit").val(dokumens[0].tenor);
                  $("#FormDebitur").find("#plafonPinjaman").val(dokumens[0].plafon);
                  $("#FormDebitur").find("#Premi").val(dokumens[0].premi);
                  $("#FormDebitur").find("#idProdAjk").val(dokumens[0].id_prod_ajk);
                  $("#FormDebitur").find("#jenisAsuransi").val(dokumens[0].kode_prod);
                  $("#FormDebitur").find("#tanggalLapor").val(dokumensklaim[0].tgl_lapor);
                  $("#FormDebitur").find("#tanggalKejadian").val(dokumensklaim[0].tgl_kejadian);
                  $("#FormDebitur").find("#jenisKlaim").val(dokumensklaim[0].jns_klaim);
                  $("#FormDebitur").find("#stsKlaim").val(dokumensklaim[0].sts_klaim);
                  $("#FormDebitur").find("#nilaiKLaim").val(dokumensklaim[0].nilai_klaim);
                  $("#FormDebitur").find("#diBayar").val(dokumensklaim[0].dibayar);
                  $("#FormDebitur").find("#tanggalBayar").val(dokumensklaim[0].tglbayar);
                  $("#FormDebitur").find("#Keterangan").val(dokumensklaim[0].ket_klaim);

                  var fieldArray = [];
                  var fieldArray2 = [];
                  var cek = [
                  "dok1", "dok2","dok3", "dok4",
                  "dok5", "dok6", "dok7", "dok8",
                  "dok9", "dok10", "dok11",
                  "dok12", "dok13", "dok15"];
                  var cek2 = [
                  "#Dok1", "#Dok2","#Dok3", "#Dok4",
                  "#Dok5", "#Dok6", "#Dok7", "#Dok8",
                  "#Dok9", "#Dok10", "#Dok11",
                  "#Dok12", "#Dok13", "#Dok14", "#Dok15", ];
                  var namaFieldd = [
                  "#namaDok1", "#namaDok2","#namaDok3", "#namaDok4",
                  "#namaDok5", "#namaDok6", "#namaDok7", "#namaDok8",
                  "#namaDok9", "#namaDok10", "#namaDok11",
                  "#namaDok12", "#namaDok13", "#namaDok14", "#namaDok15"];

                  for (var i =1; i<=15; i++){
                    fieldArray.push("#chkFile"+i);
                    fieldArray2.push("#Pil"+i);
                    
                  }
                  // var y = dokumensklaim[0].polis_sertifikat;
                  for (var j = 0; j < cek.length; j++) {
                    var x = dok[0][cek[j]];
                    // alert(url);x
                    // statuschecked(cek[j], fieldArray[j]);
                    if(x != null){
                      $("#FormDebitur").find(fieldArray[j]).prop("checked", true);
                      $("#FormDebitur").find(cek2[j]).hide();
                      $(namaFieldd[j]).prop("disabled", false);
                      $(namaFieldd[j]).val(JSON.parse(x));
                      $(fieldArray2[j]).attr("href", "/filedok/"+dokumens[0].id_prod_ajk+"/"+JSON.parse(x)+"/"+cek[j]);
                      $(fieldArray2[j]).show();
                    }else{
                      $("#FormDebitur").find(cek2[j]).show();
                      $("#FormDebitur").find(cek2[j]).val('');
                      $("#FormDebitur").find(cek2[j]).prop("disabled", true);
                      $(namaFieldd[j]).prop("disabled", true);
                      $(namaFieldd[j]).val('');
                      $(fieldArray2[j]).hide();
                    }
                    // x
                  }
                }
              });
            }

function reloadtable3(){
  var t = $('#data-table-example3').DataTable();
  t.rows().clear().draw();
  var tablee = $('#data-table-example3').DataTable({
          // "responsive": true,
          "scrollY": 250,
          "scrollX": true,
          "bDestroy": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./DataKlaim/reloadbyasuransi",
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
          // }],
          "order": [[ 1, 'asc' ]],
          // "footerCallback": function ( row, data, start, end, display ) {
          //   var api = this.api();
          //   nb_cols = api.columns().nodes().length;
          //   var j = 17;
          //   while(j < nb_cols){
          //     var pageTotal = api
          //           .column( j, { page: 'current'} )
          //           .data()
          //           .reduce( function (a, b) {
          //               return Number(a) + Number(b);
          //           }, 0 );
          //     // Update footer
          //     var numFormat = $.fn.dataTable.render.number( '.', ',', 2,'Rp. ').display;
          //     $( api.column( j ).footer() ).html(numFormat(pageTotal));
          //     j++;
          //   } 
          // },
          "columns" : [
          // { "data": null},
          { "data": null},
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
          'columnDefs': [{
            'targets': 1,
            'searchable':false,
            'orderable':false,
            'render': function (data, type, row){
              var z = [];
              var cek = [
              "file_spgr", "file_bukti_tolak","file_bukti_bayar"];
              var ket = [
              " FILE SPGR", " FILE SURAT TOLAK"," FILE BUKTI BAYAR"];
              for (var j = 0; j < cek.length; j++) {
                var x = data[cek[j]];
                    // alert(x);
                    // statuschecked(cek[j], fieldArray[j]);
                    if(x != null){
                      // var x1 = JSON.parse(x);
                      z.push(ket[j]);
                    }
                  }  
                  if((data["file_spgr"] != null) || (data["file_bukti_tolak"] != null) || (data["file_bukti_bayar"] != null)) {
                    return '<div class="m-dropdown m-dropdown--inline m-dropdown--inline m-dropdown--align-left" m-dropdown-toggle="hover"><button id="download-button" value="'+ data["id_klaim_ajk"] +'" alt="Unduh File" class="m-dropdown__toggle btn btn-accent dropdown-toggle"><i class="fa flaticon-download"> Dok.</i></button><div class="m-dropdown__wrapper"><div class="m-dropdown__inner"><div class="m-dropdown__body"><div class="m-dropdown__content"><ul class="m-nav"><li class="m-nav__section m-nav__section--first"><span class="m-nav__section-text">'+z+'</span></li></ul></div></div></div></div></div>';
                  }
                  else{
                    return 'no file';
                  }
                }
              },],
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


          // "createdRow" : function( row, data, index) {
          //    console.log( 'ROW ' + row);
          //    if (data["premi"] != data["premi_admin"]){
          //      $('td', row).eq(22).addClass('danger'); // 6 is index of column
          //    }
          //  }
        });

$('#data-table-example3 tbody').on( 'click', 'button', function (e) {
 e.preventDefault();

 var data = $('#data-table-example3').DataTable().row( $(this).parents('tr') ).data();
             // alert( data['no_pin'] +"'s" );
            // var status_download = $('#statusDownload').val();
  // $.ajax({
  //           type: 'GET',
  //           url : "./downloadfileklaim/" + data['id_klaim_ajk'],
  //               contentType: false,       // The content type used when sending data to the server.
  //               cache: false,             // To unable request pages to be cached
  //               processData:false,
  //               success : function (data) {
  //                 if(data.status == 'success'){
  //                   alert(data.message);
  //                 }else{
  //                   alert('Data Klaim Gagal Dikirim');
  //                 }
  //               }
  //             });

  var win = window.open("./downloadfileklaim/" + data['id_klaim_ajk'], '_blank');
  if (win) {
                   //Browser has allowed it to be opened
                   win.focus();
                   $("#FormDataProgresKliem").find("#statusDownload").val('success');
                 } else {
                   //Browser has blocked it
                   alert('Please allow popups for this website');
                 }
               });
tablee.ajax.reload();

tablee.on( 'order.dt search.dt', function () {
  tablee.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  } );
} );

}

for (var i = 1;i<=15; i++) {

  $('#FormDebitur').find('#Dok'+i).on('change', function(ev){
    ev.preventDefault();
    if(this.files[0].size > 1048576){
     alert("Maksimal Ukuran File 1 mb");
     this.value = "";
   }
 });
}


$('#stsKlaim').on('change', function(r){
  r.preventDefault();
  var value = $('#stsKlaim').val();
  if(value == 'ON PROSES' || value == '') {
    $("#fileUpload").hide();
    $("#File").prop('disabled', true);
  }else if(value == 'DITERIMA') {
    $("#fileUpload").show();
    $("#fileUpload label").html('Upload SPGR');
    $("#File").prop('disabled', false);
  }else if(value == 'DITOLAK') {
    $("#fileUpload").show();
    $("#fileUpload label").html('Upload Surat Tolak');
    $("#File").prop('disabled', false);
  }else{
    $("#fileUpload").show();
    $("#fileUpload label").html('Upload Bukti Bayar');
    $("#File").prop('disabled', false);
  }
  // var kode_Brok = $("#formsubmit").find("#jenisAsuransi").val();
  // // alert(kode_Brok);
  // $("#formsubmit").find("#kodeAsuransi").val(kode_Brok);
});
// $('#BtnAddKlaim').on('click', function(e){
//   e.preventDefault();
//   reloadtable3();
// });

$('#LihatAsuransi').on('click', function(e){
  e.preventDefault();
  reloadtable3();
});
$('#LihatAsuransii').on('click', function(e){
  e.preventDefault();
  reloadtable2();
});

function clear() {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                $("#FormDebitur").find("#idProd").val('');
                $("#FormDebitur").find("#noSertifikat").val('');
                $("#FormDebitur").find("#jenisKredit").val('');
                $("#FormDebitur").find("#noKredit").val('');
                $("#FormDebitur").find("#Debitur").val('');
                $("#FormDebitur").find("#tanggalLahir").val('');
                $("#FormDebitur").find("#tanggalAkad").val('');
                $("#FormDebitur").find("#masaKredit").val('');
                $("#FormDebitur").find("#plafonPinjaman").val('');
                $("#FormDebitur").find("#Premi").val('');
                $("#FormDebitur").find("#idProdAjk").val('');
                $("#FormDebitur").find("#jenisAsuransi").val('');
                $("#FormDebitur").find("#tanggalLapor").val('');
                $("#FormDebitur").find("#tanggalKejadian").val('');
                $("#FormDebitur").find("#jenisKlaim").val('');
                $("#FormDebitur").find("#stsKlaim").val('');
                $("#FormDebitur").find("#nilaiKLaim").val('');
                $("#FormDebitur").find("#diBayar").val('');
                $("#FormDebitur").find("#tanggalBayar").val('');
                $("#FormDebitur").find("#Keterangan").val('');
                // $addEventModal.modal('show');
              }
              var loadFile = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('output');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
              };

//   $('#Dok1').on('change', function(){
//   reloadtable3();
// });


});
</script>
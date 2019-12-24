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
                Form Refund Asuransi Jiwa
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
                    Download
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
              @endif
            </ul>

          </div>
        </div>
        <!--begin::Form-->
        <div class="m-portlet__body">
          <div class="form-group m-form__group row">
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
                  </tr>
                </thead>
                <tbody>

                  <!-- Data Table Goes Here -->

                </table>
              </div>
              <div class="col-lg-6">
                <h3 align="center">
                  Daftar Refund
                </h3>
                @if($posisiuser == 3 || $posisiuser == 2)
                <table id="data-table-example3" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <!-- <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th> -->
                      <th>No.</th>
                      <th>Tanggal Lapor</th>
                        <th>Tanggal Refund</th>
                        <th>Nama Debitur</th>
                        <th>Nama Asuransi</th>
                        <th>Nilai Refund</th>
                        <th>Status Refund</th>
                        <th>Tanggar Bayar</th>
                        <th>DiBayar</th>
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
                  @else
                  <table id="data-table-example3" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!-- <th><input name="select_all" value="1" id="example-select-all" type="checkbox"></th> -->
                        <th>No.</th>
                        <th>Tanggal Lapor</th>
                        <th>Tanggal Refund</th>
                        <th>Nama Debitur</th>
                        <th>Nama Asuransi</th>
                        <th>Nilai Refund</th>
                        <th>Status Refund</th>
                        <th>Tanggar Bayar</th>
                        <th>DiBayar</th>
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
                    @endif
                  </div>
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
                          <input type="hidden" id="tanggalAkadAkhir"/>
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
                          Palfon Pinjaman
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
                      @if($posisiuser == 2)
                      <div class="col-lg-12">
                        <label>
                          Jenis Pusat:
                        </label>
                        <select class="form-control m-input m-input--air m-input--pill" id="nilaiPersen" >
                          <option value="">--Select--</option>
                          @foreach($mstclient as $jenis)
                          <option value="{{$jenis->nilairefund}}">
                            {{$jenis->nama}}
                          </option>
                          @endforeach
                        </select>
                        <span class="m-form__help">
                          <!-- Please choose jenis asuransi -->
                        </span>
                      </div>
                      @endif
                      <div class="col-lg-12">
                        <label class="">
                          Tanggal Lapor
                        </label>
                        <div class="input-daterange input-group datepicker-demo">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" id="idProdAjk" name="id_prod_ajk" >
                          <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tanggalLapor" name="tgl_lapor_refund" placeholder="isi tanggal lapor" autocomplete="off" />
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
                          Tanggal Pelunasan
                        </label>
                        <div class="input-daterange input-group datepicker-demo">
                          <input type="text" class="form-control  m-input m-input--air m-input--pill" placeholder="Select date" id="tglPelunasan" name="tgl_pelunasan" placeholder="isi tanggal Lunas" autocomplete="off" />
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
                          Estimasi Refund
                        </label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" id="nilaiRefund" name="nilai_refund" aria-describedby="" placeholder="isi nilai klaim" >
                        <div>
                          <span class="m-form__help">
                            <!-- Please enter credit number -->
                          </span>
                        </div>
                      </div>
                      @if($posisiuser == 3)
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
                      </div>
                      
                        @endif
                    </div>
                    <!-- <div class="form-group m-form__group row">
                      <div class="col-lg-4">
                        <div class="col-lg-12">
                          <label class="">
                            Dok 1:
                          </label>
                          <input type="checkbox" id="chkFile1" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok1" name="namafile1" aria-described1by="emailHelp" placeholder="isi nama dok. 1" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok1[]" id="Dok1"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 2:
                          </label>
                          <input type="checkbox" id="chkFile2" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok2" name="namafile2" aria-described1by="emailHelp" placeholder="isi nama dok. 2" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok2[]" id="Dok2"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 3:
                          </label>
                          <input type="checkbox" id="chkFile3" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok3" name="namafile3" aria-described1by="emailHelp" placeholder="isi nama dok. 3" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok3[]" id="Dok3"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 4:
                          </label>
                          <input type="checkbox" id="chkFile4" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok4" name="namafile4" aria-described1by="emailHelp" placeholder="isi nama dok. 4" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok4[]" id="Dok4"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 5:
                          </label>
                          <input type="checkbox" id="chkFile5" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok5" name="namafile5" aria-described1by="emailHelp" placeholder="isi nama dok. 5" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok5[]" id="Dok5"  multiple>

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

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 7:
                          </label>
                          <input type="checkbox" id="chkFile7" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok7" name="namafile7" aria-described1by="emailHelp" placeholder="isi nama dok. 7" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok7[]" id="Dok7"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 8:
                          </label>
                          <input type="checkbox" id="chkFile8" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok8" name="namafile8" aria-described1by="emailHelp" placeholder="isi nama dok. 8" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok8[]" id="Dok8"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 9:
                          </label>
                          <input type="checkbox" id="chkFile9" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok9" name="namafile9" aria-described1by="emailHelp" placeholder="isi nama dok. 9" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok9[]" id="Dok9"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 10:
                          </label>
                          <input type="checkbox" id="chkFile10" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok10" name="namafile10" aria-described1by="emailHelp" placeholder="isi nama dok. 10" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok10[]" id="Dok10"  multiple>

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

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 12:
                          </label>
                          <input type="checkbox" id="chkFile12" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok12" name="namafile12" aria-described1by="emailHelp" placeholder="isi nama dok. 12" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok12[]" id="Dok12"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 13:
                          </label>
                          <input type="checkbox" id="chkFile13" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok13" name="namafile13" aria-described1by="emailHelp" placeholder="isi nama dok. 13" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok13[]" id="Dok13"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 14:
                          </label>
                          <input type="checkbox" id="chkFile14" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok14" name="namafile14" aria-described1by="emailHelp" placeholder="isi nama dok. 14" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok14[]" id="Dok14"  multiple>

                        </div>
                        <div class="col-lg-12">
                          <label class="">
                            Dok 15:
                          </label>
                          <input type="checkbox" id="chkFile15" >
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="namaDok15" name="namafile15" aria-described1by="emailHelp" placeholder="isi nama dok. 15" required>
                          <input class="form-control m-input m-input--air m-input--pill" type="file" name="dok15[]" id="Dok15"  multiple>

                        </div>
                      </div>-->
                      <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                          <button type="submit" id="ProsesSaveRefund" name="ProsesSaveRefund" class="btn btn-info">
                            Simpan
                            <i class="flaticon-file-1"></i>
                          </button>
                        </div>
                        @if($posisiuser == 2 OR $posisiuser == 1)
                        <div class="col-lg-6">
                          <button type="submit" id="ProsesKirimKeAdmin" name="ProsesKirimKeAdmin" class="btn btn-info">
                            {{$valuebutton}}
                            <i class="flaticon-paper-plane"></i>
                          </button>
                        </div>
                        @endif
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

        var table = $('#data-table-example2').DataTable({
          "responsive": true,
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Refunddebitur/reload",
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
          { "data": "nama" },
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

        if(f == 3 || f == 2){
          var table2 = $('#data-table-example3').DataTable({
            "responsive": true,
            "scrollY": 250,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Refund/reload",
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
          // { "data": null},
          { "data": null},
          { "data": "tgl_refund"},
          { "data": "tgl_lapor"},
          { "data": "debitur" },
          { "data": "nama" },
          { "data": "nilai_refund","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "stsrefund"},
          { "data": "tglbayar"},
          { "data": "dibayar","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
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

}else{
  var table2 = $('#data-table-example3').DataTable({
    "responsive": true,
    "scrollY": 250,
    "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Refund/reload",
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
          { "data": "tgl_lapor"},
          { "data": "tgl_refund"},
          { "data": "debitur" },
          { "data": "nama" },
          { "data": "nilai_refund","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "dibayar","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "stsrefund"},
          { "data": "tglbayar"},
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
            // alert(rows);
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
  var valueIdx = table2.row( this ).data();
  var visIdx = $(this).index();
  var dataIdx = table2.column.index( 'fromVisible', visIdx );
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
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                clear();
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
                // $("#FormDebitur").find("#jenisAsuransi").val(valueIdx['kode_prod']);
                // $("#FormDebitur").find("#tanggalLapor").val(valueIdx['tgl_lapor']);
                // $("#FormDebitur").find("#tglPelunasan").val(valueIdx['tgl_bayar']);
                // $("#FormDebitur").find("#jenisKlaim").val(valueIdx['jns_klaim']);
                // $("#FormDebitur").find("#stsKlaim").val(valueIdx['stsklaim']);
                // $("#FormDebitur").find("#nilaiRefund").val(valueIdx['nilai_refund']);
                // $("#FormDebitur").find("#diBayar").val(valueIdx['dibayar']);
                // $("#FormDebitur").find("#tanggalBayar").val(valueIdx['tglbayar']);
                // $("#FormDebitur").find("#Keterangan").val(valueIdx['ket_klaim']);
                $("#FormDebitur").find("#tanggalAkadAkhir").val(valueIdx['tgl_akhir']);
                // $addEventModal.modal('show');
              }

              function tableText2(valueIdx) {
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                // document.getElementById('noPin').innerHTML = 'Update Polis ' + tableCell.id;
                clear();
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
                // $("#FormDebitur").find("#jenisAsuransi").val(valueIdx['kode_prod']);
                $("#FormDebitur").find("#tanggalLapor").val(valueIdx['tgl_lapor']);
                $("#FormDebitur").find("#tglPelunasan").val(valueIdx['tgl_refund']);
                // $("#FormDebitur").find("#jenisKlaim").val(valueIdx['jns_klaim']);
                // $("#FormDebitur").find("#stsKlaim").val(valueIdx['stsklaim']);
                $("#FormDebitur").find("#nilaiRefund").val(valueIdx['nilai_refund']);
                $("#FormDebitur").find("#diBayar").val(valueIdx['dibayar']);
                $("#FormDebitur").find("#tanggalBayar").val(valueIdx['tglbayar']);
                // $("#FormDebitur").find("#Keterangan").val(valueIdx['ket_klaim']);
                $("#FormDebitur").find("#tanggalAkadAkhir").val(valueIdx['tgl_akhir']);
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
                $("#FormDebitur").find("#nilaiPersen").val('');
                $("#FormDebitur").find("#nilaiRefund").val('');
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
              $("#FormDebitur").find("#nilaiRefund").prop("disabled", true);
              $("#FormDebitur").find("#tglPelunasan").prop("disabled", true);
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

            var g = {!!$mstclient!!};
            var f = {!!$posisiuser!!};
            var $addEventModal = $('#addEventModal');
            var $addEventModal2 = $('#addEventModal2');
            $addEventModal.appendTo('body');
            $addEventModal2.appendTo('body');
            var fieldId = [];
            var fieldName = [];
            var fieldIdFile = [];
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
            }
            for (var j = 0; j < namaField.length; j++) {
              // alert(fieldId[j]);
              $('#chkFile'+j).attr("checked", false);
              $(fieldName[j]).prop("disabled", true);
              $(fieldIdFile[j]).prop("disabled", true);
            }

            for (var i = 0; i < fieldId.length; i++) {
              getEnabledChecklist(fieldId[i], fieldIdFile[i], fieldName[i]);
            }

            function getEnabledChecklist(idField, namaField, fieldName) {

              $(idField).on('change', function(e){
                e.preventDefault();
                var file1 =$(idField).is(":checked");
                if(file1 == false){ 
                  $(namaField).prop("disabled", true);
                  $(fieldName).prop("disabled", true);
                  $(namaField).val('');
                }
                else if(file1 == true)
                {
                  $(namaField).prop("disabled", false);
                  $(fieldName).prop("disabled", false);
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
        console.log(submitActor.name);
        // alert(buttonPressed);
        switch (buttonPressed) {
          case 'ProsesSaveRefund':
          if(f == 3 || f ==2){
          var statusklaim = $('#FormDebitur').find('#stsKlaim').val();
          var dibayar = $('#FormDebitur').find('#diBayar').val();
          var tglbayar = $('#FormDebitur').find('#tanggalBayar').val();
          var idprod = $('#FormDebitur').find('#idProd').val();
          // alert(idprod);
          if(idprod == ''){
            alert('Pilih Data');
          }else if(statusklaim == 'DIBAYAR' && dibayar =='' && tglbayar ==''){
            alert('Isi jumlah bayar dan pilih tanggal bayar');
          }else if(statusklaim == 'DIBAYAR' && dibayar !='' && tglbayar ==''){
            alert('Pilih tanggal bayar');
          }else{
          $.ajax({
            type: 'POST',
            url : "./refundClient",
            enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  if(data.status == 'success'){
                    reloadtable();
                    reloadtable2();
                    alert(data.message);
                  }else{
                    alert('Data Refund Gagal DiSimpan');
                  }
                }
              });
            }
          }else{
          var statusklaim = $('#FormDebitur').find('#stsKlaim').val();
          var dibayar = $('#FormDebitur').find('#diBayar').val();
          var tglbayar = $('#FormDebitur').find('#tanggalBayar').val();
          var idprod = $('#FormDebitur').find('#idProd').val();
          // alert(idprod);
          if(idprod == ''){
            alert('Pilih Data');
          }else if(statusklaim == 'DIBAYAR' && dibayar =='' && tglbayar ==''){
            alert('Isi jumlah bayar dan pilih tanggal bayar');
          }else if(statusklaim == 'DIBAYAR' && dibayar !='' && tglbayar ==''){
            alert('Pilih tanggal bayar');
          }else{
          $.ajax({
            type: 'POST',
            url : "./refundClient",
            enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  if(data.status == 'success'){
                    alert(data.message);
                    reloadtable();
                    reloadtable2();
                    clear();
                  }else{
                    alert('Data Refund Gagal DiSimpan');
                  }
                }
              });
          }
        }
          break;
          case 'ProsesKirimKeAdmin':
          $.ajax({
            type: 'POST',
            url : "./Refund/Kirimkeadmin",
            enctype: 'multipart/form-data',
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success : function (data) {
                  if(data.status == 'success'){
                    alert(data.message);
                    reloadtable2();
                    clear();
                  }else{
                    alert('Data Refund Gagal Dikirim');
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

            $("#uploadForm").on('click', function(ev) {
          // addEventModal2.show();
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
        // alert(no_pk);
        $.ajax({
          type: 'POST',
          url : "./uploadformklaim",
          enctype: 'multipart/form-data',
              data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success : function (data) {
                if(data.status == 'start_number' || data.status == 'new_number'){
                  $(".modal-body").find("#noKwitansi").val(data.dokumens);
                  // alert(data.dokumens);
                  $addEventModal2.modal('hide');

                  // reloadTable();
                }else {
                  alert(data.message);
                  $addEventModal2.modal('hide');

                }
              }
            });
      });

    function reloadtable(){
      $('#data-table-example2').DataTable().destroy();
      $('#data-table-example2 tbody').empty();
      var table = $('#data-table-example2').DataTable({
          "responsive": true,
          "scrollY": 250,
          "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Refunddebitur/reload",
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
          { "data": "nama" },
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
      table.ajax.reload();
        table.on( 'order.dt search.dt', function () {
  table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  });
}).draw();

    }

    function reloadtable2(){
      $('#data-table-example3').DataTable().destroy();
      $('#data-table-example3 tbody').empty();
          var table2 = $('#data-table-example3').DataTable({
            "responsive": true,
            "scrollY": 250,
            "scrollX": true,
          // "processing": true,
          // "serverSide": true,
          "ajax": {
            "url": "./Refund/reload",
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
          // { "data": null},
          { "data": null},
          { "data": "tgl_refund"},
          { "data": "tgl_lapor"},
          { "data": "debitur" },
          { "data": "nama" },
          { "data": "nilai_refund","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
          { "data": "sts_refund"},
          { "data": "tglbayar"},
          { "data": "dibayar","render": $.fn.dataTable.render.number( '.', ',', 2,'Rp. ') },
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
table2.on('order.dt search.dt', function () {
  table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    cell.innerHTML = i+1;
  });
}).draw();

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

$('#FormDebitur').find('#tglPelunasan').on('change', function (e) {
    var x = $('#FormDebitur').find('#tglPelunasan') .val();
    var nilaiplafon = $('#FormDebitur').find('#Plafon') .val();
    var nilaipremi = $('#FormDebitur').find('#Premi') .val();
    var tglakad = new Date($('#FormDebitur').find('#tanggalAkad').val());
    var tglakadakhir = new Date($('#FormDebitur').find('#tanggalAkadAkhir').val());
    var tgllunas = new Date($('#FormDebitur').find('#tglPelunasan').val());
    // var masakredit = parseInt($('#FormDebitur').find('#masaKredit').val());
    // var bulanakadawal = new Date(tglakad.addMonths(masakredit));
    // var tglakadakhir = bulanakadawal.getFullYear() + '-' + ('0'+bulanakadawal.getMonth()+1).slice(-2) + '-' +  ('0'+bulanakadawal.getDate()).slice(-2);
    // var x = parseInt(tglakadakhir - tglakad); 
    var selisih1 = parseInt((tgllunas-tglakad) / (1000 * 60 * 60 * 24)); 
    var selisihtotal = parseInt((tglakadakhir -tglakad) / (1000 * 60 * 60 * 24)); 
    if(f == 2){
      var nilai = parseInt($('#FormDebitur').find('#nilaiPersen').val());
    }else{
      var nilai = parseInt(g);
    }

    // var refund = (((40/100) * nilaipremi)/selisihtotal)*selisih1;
    var refund = (((nilai/100) * nilaipremi)/selisihtotal*selisih1).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    $('#FormDebitur').find('#nilaiRefund').val(refund);
    // refund =  
    // $('#FormDebitur').find('#nilaiRefund').val(y); 
});

Date.prototype.addMonths = function (value) {
    var n = this.getDate();
    this.setDate(1);
    this.setMonth(this.getMonth() + value);
    // this.setDate(Math.min(n, this.getDaysInMonth()));
    return this;
};


          });
        </script>
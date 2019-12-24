<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::group(['scheme' => 'https'], function () {
// Route::group(['middleware' =>['auth']], function(){
Route::get('/', 'Dashboard\DashboardController@template');

//Dashboard
Route::get('/dashboard', 'Dashboard\DashboardController@index');
Auth::routes();

// MENU Client
// ____Penutupan Satuan____
Route::get('/PenutupanSatuan', 'Client\penutupansatuanController@index');
Route::post('/PenutupanSatuan/upload', 'Client\penutupansatuanController@upload');
Route::post('/PenutupanSatuan/updatedata', 'Client\penutupankumpulanController@updatedata');
Route::post('/PenutupanSatuan/getRateValue', 'Client\penutupansatuanController@getRateValue');
Route::get('/printNm', 'Client\penutupansatuanController@printnm');

//client
Route::get('/PenutupanKumpulan', 'Client\penutupankumpulanController@index');
Route::post('/Dokumen/upload', ['uses' => 'Client\penutupankumpulanController@importExcel3', 'as' => 'upload.excel']);
Route::get('/PenutupanKumpulan/reload', 'Client\penutupankumpulanController@reload');
Route::get('/PenutupanKumpulan/reload/nosend', 'Client\penutupankumpulanController@reloadnosend');
Route::get('/PenutupanKumpulan/reload/{start}/{end}', 'Client\penutupankumpulanController@reloadby');
Route::get('/UpdateNoKwitansi/{nopk}', 'Client\penutupankumpulanController@noKwitansi');
Route::post('/PenutupanSatuan/update', 'Client\penutupankumpulanController@update');
Route::post('/kirimKeAsuransi/uploadkumpulan', 'Client\penutupankumpulanController@kirimkeasuransi');
Route::post('/UpdateSertifikat', 'Client\penutupankumpulanController@updatesertifikat');
Route::post('/KonfirmData', 'Client\penutupankumpulanController@konfirmdata');
Route::get('/downloadfilespaj/{nopk}', 'Client\penutupankumpulanController@downloadspaj');

//
Route::get('/PenutupanKumpulanBpd', 'Client\penutupankumpulanControllerBpd@index');
Route::post('/Dokumen/upload/bpd', ['uses' => 'Client\penutupankumpulanControllerBpd@importExcel2', 'as' => 'upload.excel']);
Route::post('/Dokumen/upload/sertifikat', ['uses' => 'Asuransi\AsuransiValidasiController@importExcel2', 'as' => 'upload.excel']);
Route::get('/CetakKwitansi/{nopk}', 'Client\penutupankumpulanController@cetakkwitansi');

//rekonsiliasi
Route::get('/Rekonsiliasi/reload', 'Client\RefundController@reload');
Route::get('/Rekonsiliasii/reload', 'Admin\RekonsiliasiController@reload');


Route::get('/FormAkeptasiDokumen', 'Asuransi\AsuransiAkseptasiController@index');
Route::post('/AkseptasiAsuransi', 'Asuransi\AsuransiAkseptasiController@akseptasi');
Route::get('/FormAkeptasiDokumen/reload', 'Asuransi\AsuransiAkseptasiController@reload');
Route::get('/FormAkeptasiDokumen/reloadby/{kode_prod}', 'Asuransi\AsuransiAkseptasiController@reloadbykodeprod');
Route::get('/FormValidasiDokumen', 'Asuransi\AsuransiValidasiController@index');
Route::get('/FormValidasiDokumen/reload', 'Asuransi\AsuransiValidasiController@reloadvalidasi');Route::post('/KlaimNonPks', 'Admin\KlaimController@addklaimnonpks');

Route::get('/FormValidasiDokumen/reloadby/{start}/{end}', 'Asuransi\AsuransiValidasiController@reloadvalidasiby');

Route::get('/FormValidasiDokumen/cekexportexcel/{tglawal}/{tglakhir}', 'Asuransi\AsuransiValidasiController@cekexportexcel');
Route::get('/FormValidasiDokumen/exportexcel/{tglawal}/{tglakhir}', 'Asuransi\AsuransiValidasiController@exportexcel');

//akseptasi klaim
Route::get('/FormAkseptasiKlaim', 'Asuransi\AsuransiAkseptasiController@klaim');
Route::post('/KlaimAkseptasiAsuransi', 'Asuransi\AsuransiAkseptasiController@akseptasiklaim');
Route::get('/FormAkeptasiKlaim/reload', 'Asuransi\AsuransiAkseptasiController@reloadklaim');
// Route::get('/FormAkeptasiDokumen/reloadby/{kode_prod}', 'Asuransi\AsuransiAkseptasiController@reloadbykodeprod');
Route::get('/FormValidasiDokumen/exportexcel/{tglawal}/{tglakhir}', 'Asuransi\AsuransiValidasiController@exportexcel');
//akseptasi Refund
Route::get('/FormAkseptasiRefund', 'Asuransi\AsuransiAkseptasiController@refund');
Route::post('/RefundAkseptasiAsuransi', 'Asuransi\AsuransiAkseptasiController@akseptasirefund');
Route::get('/FormAkeptasiRefund/reload', 'Asuransi\AsuransiAkseptasiController@reloadrefund');
// Route::get('/FormAkeptasiDokumen/reloadby/{kode_prod}', 'Asuransi\AsuransiAkseptasiController@reloadbykodeprod');
// Route::get('/FormValidasiDokumen/exportexcel/{tglawal}/{tglakhir}', 'Asuransi\AsuransiValidasiController@exportexcelrefund');
Route::get('/FormValidasiRefund', 'Asuransi\AsuransiValidasiController@refund');
Route::get('/FormValidasiRefund/reload', 'Asuransi\AsuransiValidasiController@reloadvalidasirefund');
Route::get('/FormValidasiRefund/reloadby/{start}/{end}', 'Asuransi\AsuransiValidasiController@reloadvalidasirefundby');
Route::get('/FormValidasiRefund/cekexportexcel/{tglawal}/{tglakhir}', 'Asuransi\AsuransiValidasiController@cekrefundexportexcel');
Route::get('/FormValidasiRefund/exportexcel/{tglawal}/{tglakhir}', 'Asuransi\AsuransiValidasiController@refundexportexcel');
Route::post('/Dokumen/upload/refund', ['uses' => 'Asuransi\AsuransiValidasiController@importExcelRefund', 'as' => 'upload.excel']);

//viewer
Route::get('/ViewerDokumenReport', 'Viewer\ViewerController@index');
Route::get('/ViewerDokumenReport/reloadbydate/{tgl_awal}/{tgl_akhir}/{jns_bank}/{jenis_produksi}', 'Viewer\ViewerController@reloadbydate');
Route::get('/ViewerDokumenReport/reload', 'Viewer\ViewerController@reload');
Route::get('/CetakPolis/{nopolis}', 'Viewer\ViewerController@cetakpolis');
Route::get('/CetakLaporan/{tgl_awal}/{tgl_akhir}/{jns_asuransi}/{jns_bank}/{jenis_produksi}', 'Viewer\ViewerController@cetaklaporan');
Route::get('/CetakKlaim/{tgl_awal}/{tgl_akhir}/{jns_asuransi}/{jns_bank}', 'Viewer\ViewerController@cetakklaim');
Route::get('/CetakRefund/{tgl_awal}/{tgl_akhir}/{jns_asuransi}/{jns_bank}', 'Viewer\ViewerController@Cetakrefund');

//Viewer sub klaim
Route::get('/ViewerDokumenKlaimReport', 'Viewer\ViewerController@klaim');
Route::get('/ViewerDokumenKlaimReport/reload', 'Viewer\ViewerController@reloadklaim');
Route::get('/ViewerDokumenKlaimReport/reloadTableByDate/{startDate}/{endDate}/{jnsasu}/{jnsclient}', 'Viewer\ViewerController@reloadKlaimByDate');
Route::get('/ViewerDokumenKlaimReport/reloadklaim', 'Viewer\ViewerController@reloadklaim');
Route::get('/Klaim/reload/polis', 'Admin\KlaimController@reloadklaimpolis');
//Viewer sub refund
Route::get('/ViewerDokumenRefundReport', 'Viewer\ViewerController@refund');
Route::get('/ViewerDokumenRefundReport/reload', 'Viewer\ViewerController@reloadrefund');
Route::get('/ViewerDokumenRefundReport/reloadTableByDate/{startDate}/{endDate}/{jnsasu}/{jnsclient}', 'Viewer\ViewerController@reloadRefundByDate');

//klaimjiwa
Route::get('/KlaimJiwa', 'Admin\KlaimController@index');
Route::post('/Klaim', 'Admin\KlaimController@addklaim');
Route::get('/DataKlaim/reload', 'Admin\KlaimController@reload');
Route::get('/DataKlaim/reloadlunas', 'Admin\KlaimController@reloadlunas');

Route::get('/DataKlaim/reloadbyasuransi', 'Admin\KlaimController@reloadbyasuransi');
Route::post('/uploadformklaim', 'Admin\KlaimController@uploadkeclient');
Route::get('/formklaim', 'Admin\KlaimController@downloadformklaim');
Route::get('/downloadfileklaim/{id}', 'Admin\KlaimController@downloadfileklaim');
Route::post('/Klaim/Kirimkeadmin', 'Admin\KlaimController@kirimkepusat');
Route::post('/Kirimkeadmin', 'Admin\KlaimController@kirimkepusat');
Route::post('/ClientDataKlaim/detail', 'Admin\KlaimController@detailklaim');
Route::get('/filedok/{id}/{no}/{namafolder}', 'Admin\KlaimController@downloadfile');

//Refund
Route::get('/Refund', 'Client\RefundController@index');
Route::post('/refundClient', 'Client\RefundController@refundclient');
Route::get('/Refund/Debitur/reload', 'Client\RefundController@reloaddebitur');
Route::get('/Refund/reload', 'Client\RefundController@reload');
Route::post('/Refund/Kirimkeadmin', 'Client\RefundController@kirimkepusat');
Route::get('/Refunddebitur/reload', 'Client\RefundController@reloaddebitur');

//rekonsiliasi
Route::get('/Rekonsiliasi', 'Admin\RekonsiliasiController@index');
Route::post('/ProsesRekon', 'Admin\RekonsiliasiController@prosesrekon');
Route::get('/CetakLaporanRekon/{tgl_awal}/{tgl_akhir}/{jns_bank}/{sts_rekon}', 'Viewer\ViewerController@cetaklaporanrekon');

//configuration
Route::get('/ProdukAsuransi', 'Admin\produkAsuransiController@index');
Route::get('/MasterUser/reload/broker', 'Setting\MasterUserController@reloadbroker');
Route::get('/MasterUser/reload/asuransi', 'Setting\MasterUserController@reloadasuransi');
Route::get('/MasterUser/reload/client', 'Setting\MasterUserController@reloadbank');
Route::get('/MasterUser/reload/rekanan', 'Setting\MasterUserController@reloadrekanan');
Route::post('/MasterUser/AddProduk', 'Setting\MasterUserController@saveproduk');
Route::post('/MasterUser/AddBroker', 'Setting\MasterUserController@savebroker');
Route::post('/MasterUser/AddAsuransi', 'Setting\MasterUserController@saveasuransi');
Route::post('/MasterUser/AddClient', 'Setting\MasterUserController@saveclient');
Route::post('/MasterUser/AddRekanan', 'Setting\MasterUserController@saverekanan');
Route::post('/MasterUser/AddProdukAsuransi', 'Setting\MasterUserController@saveprodukasuransii');
Route::get('/Configuration/reload', 'Setting\ConfigurationController@reloaduser');
Route::get('/cekUser/edit/{id}', 'Setting\ConfigurationController@cekuser');
Route::get('/cekUser/delete/{id_user}', 'Setting\ConfigurationController@cekuser');
Route::post('/MasterUser/Tambah', 'Setting\MasterUserController@tambah');
Route::get('/cekUser/{id_user}', 'Setting\ConfigurationController@cekuser');

Route::get('/user/Change/{id}', 'Setting\MasterUserController@changepassword');
Route::post('/ubah-password','Setting\MasterUserController@updatepassword');
// Route::get('/Configuration', 'Setting\AsuransiValidasiController@index');
Route::resource('/Configuration','Setting\ConfigurationController');
Route::resource('/settinguser','Setting\MasterUserController');
Route::resource('/user/{action}/{userid}','Setting\UserController');

    /* ----------
     Master
    -----------------------
		User
		----------------------- */
            Route::get('/user/index/{page?}', 'Master\UserController@index');
                Route::post('/user/index', 'Master\UserController@index');

// });

//});
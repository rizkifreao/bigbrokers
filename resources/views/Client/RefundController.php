<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use File;
use ZipArchive;    
use Chumper\Zipper\Facades\Zipper;
use Image;
class RefundController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  { 
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $valuebutton = "Kirim Ke Admin";                      
      $whereCondition = [
        ['client.kode_client', $kodeposisi],
      ]; 

    $nilaipersen = 0;
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $valuebutton = "Kirim Ke Admin";  
        $whereCondition = [
          ['client.kode_client', $kodeposisi],
        ];
        
        $mst_client = DB::table('mst_client')
        ->where('kode_pusat', $kodeposisi)
        ->select('nama','kode_pusat','nilairefund')
        ->first(); 

          $mst_client = DB::table('mst_client')
        ->where('kode_pusat', $kodeposisi)
        ->select('nama','kode_pusat','nilairefund')
        ->first();       
    $nilaipersen = $mst_client->nilairefund;
        

      }else{
        $valuebutton = "Kirim Ke Admin";   
        $whereCondition = [
          ['client.kode_client', $kodeposisi],
        ]; 

       
        $mst_client = DB::table('client')
        ->join('mst_client', 'client.kode_pusat','mst_client.kode_pusat')
        ->where('kode_client', $kodeposisi)
        ->first();       
    $nilaipersen = $mst_client->nilairefund;

      }

    }else{
      $valuebutton = "Kirim Ke Asuransi";  
      $whereCondition = [
        ['client.kode_client', $kodeposisi],
      ]; 

      $mst_client = DB::table('mst_client')
        ->where('kode_broker', $kodeposisi)
        ->select('nama','kode_pusat','nilairefund')
        ->get();
    $nilaipersen = $mst_client;
    }
    // dd($nilaipersen);
    $dokumens = DB::table('produksi_ajk')->get();
    $jenis_kredit = DB::table('jns_produksi')->get();
      // $jenis_rekanan = DB::table('asuransi')->get();
      // $jenis_asuransi = DB::table('asuransi')
      //                 ->leftJoin('jns_produksi', 'asuransi.kode_prod','jns_produksi.kode_prod')
      //                 ->select('jns_produksi.kode_prod','jns_produksi.nama')
      //                 ->get();
    $jenis_asuransi = DB::table('client')
    ->join('rekanan', 'client.kode_pusat','rekanan.id_mstclient')
    ->join('asuransi', 'rekanan.id_prod','asuransi.kode_prod')
    ->select('asuransi.nama','asuransi.kode_asu')
    ->where($whereCondition)
    ->get();
    
    return view ( 'Client/formrefund' ,[
      'dokumens' => $dokumens,
      'jenisasuransi' => $jenis_asuransi,
      'jeniskredit' => $jenis_kredit,
      'mstclient' => $nilaipersen,
      'valuebutton' => $valuebutton,
      'posisiuser' => $posisiuser,
      'posisiasuransi' => $posisiuser,
    ]);
  }

  //daftar refund
  public function reload()
  {   
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['produksi_ajk.kode_asu', $kodeposisi],
        ['produksi_ajk.sts_polis', 1],
        ['produksi_ajk.sts_klaim',0],
        ['produksi_ajk.sts_refund',1],
        ['produksi_ajk.posisi',1],
      ];                      

    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $whereCondition2 = [
          ['client.kode_pusat', $kodeposisi],
          ['produksi_ajk.sts_polis', 1],
          ['produksi_ajk.sts_klaim',0],
          ['produksi_ajk.sts_refund',1],
        ['produksi_ajk.posisi',1],
        ];   
      }else{
        $whereCondition2 = [
          ['produksi_ajk.kode_client', $kodeposisi],
          ['produksi_ajk.sts_polis', 1],
          ['produksi_ajk.sts_klaim',0],
          ['produksi_ajk.sts_refund',1],
        ['produksi_ajk.posisi',1],
        ];  
      }

    }else{
      $whereCondition2 = [
          ['produksi_ajk.sts_polis', 1],
        ['produksi_ajk.sts_klaim',0],
        ['produksi_ajk.sts_refund',1],
        ['produksi_ajk.posisi',1],
      ];                      
    }

    $refund = DB::table('refund')
    ->join('produksi_ajk', 'refund.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    ->select('refund.*','refund.sts_refund as stsrefund','refund.tgl_bayar as tglbayar','produksi_ajk.*')
    ->where($whereCondition2)
    ->get()->toArray();
    $t = $this->is_array_empty($refund);
    if($t == true){
      foreach ($refund as $key => $value) {
        $asuransi = DB::table('asuransi')->where('kode_asu', $value->kode_asu)->first();
        // $asuransis[] = $asuransi;
        $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $asuransi->kode_prod)->first();
        $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
        $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
        $dok = DB::table('dok_klaim')->where('id_klaim_ajk', $value->id_prod_ajk)->first();
          # code...
        $dokumen = [
          // $asuransi,
          'kode_broker' => $asuransi->kode_broker,
          'kode_prod' => $asuransi->kode_prod,
          'polis_induk' => $asuransi->polis_induk,
          'nama' => $asuransi->nama,
          'stsrefund' => $value->stsrefund,
          'tglbayar' => $value->tglbayar,
          'namaprod' => $jns_produksi->nama,
          'namaclient' => $client->nama,
          'namaposisi' => $posisi_data->nama,
        ];
        foreach ($value as $key2 => $value2) {
          $y[$key2] = $value2;
        }
        $refundd []= array_merge($y,$dokumen);
      }
      $view = $refundd;
    }else{
      $view = $refund;
    }
    // $klaim = DB::table('klaim_ajk')
    // ->join('produksi_ajk', 'klaim_ajk.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    // ->join('dok_klaim', 'klaim_ajk.id_prod_ajk', '=', 'dok_klaim.id_klaim_ajk')
    // ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
    // ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    // ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    // ->select('klaim_ajk.*','klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar as tglbayar','produksi_ajk.*','asuransi.*','jns_produksi.nama as namaprod','client.nama as namaclient', 'dok_klaim.*')
    // ->where($whereCondition2)
    //             // ->where('client.kode_client','KRH002')
    // ->get();
    // dd($view);
    return datatables($view)->toJson();
  }

  public function is_array_empty($arr){
  if(is_array($arr)){     
      foreach($arr as $key => $value){
          if(!empty($value) || $value != NULL || $value != ""){
              return true;
              break;//stop the process we have seen that at least 1 of the array has value so its not empty
          }
      }
      return false;
  }
}

  //daftar debitur
  public function reloaddebitur()
  {   
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['produksi_ajk.kode_asu', $kodeposisi],
        ['produksi_ajk.sts_polis', 1],
        ['produksi_ajk.sts_klaim',0],
        ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.sts_bayar','LUNAS'],
      ];                      

    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $whereCondition2 = [
          ['client.kode_pusat', $kodeposisi],
          ['produksi_ajk.sts_polis', 1],
          ['produksi_ajk.sts_klaim',0],
          ['produksi_ajk.sts_refund',0],
          ['produksi_ajk.sts_bayar','LUNAS'],
        ];   
      }else{
        $whereCondition2 = [
          ['produksi_ajk.kode_client', $kodeposisi],
          ['produksi_ajk.sts_polis', 1],
          ['produksi_ajk.sts_klaim',0],
          ['produksi_ajk.sts_refund',0],
          ['produksi_ajk.sts_bayar','LUNAS'],
        ];  
      }

    }else{
      $whereCondition2 = [
          ['produksi_ajk.sts_polis', 1],
        ['produksi_ajk.sts_klaim',0],
        ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.sts_bayar','LUNAS'],
      ];                      
    }

    $klaim = DB::table('produksi_ajk')
    ->where($whereCondition2)
    ->get()->toArray();
    // dd(count($klaim)>0);
    if(count($klaim)>0){
      foreach ($klaim as $key => $value) {
        $asuransi = DB::table('asuransi')->where('kode_asu', $value->kode_asu)->first();
        // $asuransis[] = $asuransi;
        $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $asuransi->kode_prod)->first();
        $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
        $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
        $dok = DB::table('dok_klaim')->where('id_klaim_ajk', $value->id_prod_ajk)->first();
          # code...
        $dokumen = [
          // $asuransi,
          'kode_broker' => $asuransi->kode_broker,
          'kode_prod' => $asuransi->kode_prod,
          'polis_induk' => $asuransi->polis_induk,
          'nama' => $asuransi->nama,
          'namaprod' => $jns_produksi->nama,
          'namaclient' => $client->nama,
          'namaposisi' => $posisi_data->nama,
        ];
        foreach ($value as $key2 => $value2) {
          $y[$key2] = $value2;
        }
        $klaimm []= array_merge($y,$dokumen);
      }
      $view = $klaimm;
    }else{
      $view = $klaim;
    }
    return datatables($view)->toJson();
  }



  public function reloadpolis()
  {   
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['produksi_ajk.kode_asu', $kodeposisi],
        ['produksi_ajk.no_polis','!=', null],
        ['produksi_ajk.sts_refund','!=', 1],
      ];                      

    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $whereCondition2 = [
          ['client.kode_pusat', $kodeposisi],
          ['produksi_ajk.no_polis','!=', null],
          ['produksi_ajk.sts_refund','!=', 1],
        ];   
      }else{
        $whereCondition2 = [
          ['produksi_ajk.kode_client', $kodeposisi],
          ['produksi_ajk.no_polis','!=', null],
          ['produksi_ajk.sts_refund','!=', 1],
        ];  
      }

    }else{
      $whereCondition2 = [
          ['produksi_ajk.no_polis','!=', null],
          ['produksi_ajk.sts_klaim','!=', 1],
      ];                      
    }

    $klaim = DB::table('produksi_ajk')
    ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
      ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
      ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
      ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
      ->select('produksi_ajk.*','asuransi.*','asuransi.nama as namaasuransi','jns_produksi.nama as namaprod','client.nama as namaclient','posisi_data.nama as posisidata')
    ->where($whereCondition2)
                // ->where('client.kode_client','KRH002')
    ->get();
    // dd($klaim);
    return datatables($klaim)->toJson();
  }

  
  public function refundclient(Request $request)
  // {
  //   $user = Auth::user();
  //   $kodeposisi = $user->perusahaan;
  //   $posisiuser = $user->posisi;
  //   if($posisiuser == 3){

  //     if(!empty($request)){

  //       $dataRefund = DB::table('refund')
  //       ->where('id_prod_ajk', $request->id_prod_ajk)->get();

  //   if (count($dataRefund)>0){
  //       // Update current row
  //     $dokumen = [
  //       'sts_refund' => 1,
  //       'tgl_pelunasan' => $request->tgl_pelunasan,
  //     ];
  //     $datarefund = [
  //       'id_prod_ajk' => $request->id_prod_ajk,
  //       'tgl_lapor' => $request->tgl_lapor_refund,
  //       'tgl_refund' => $request->tgl_pelunasan,
  //       'nilai_refund' => str_replace( ',', '', $request->nilai_refund),
  //       'sts_refund' => 'INPUT REFUND',
  //     ];

  //     $insert[] = $dokumen;
  //     DB::table('produksi_ajk')
  //     ->where('id_prod_ajk', $request->id_prod_ajk)
  //     ->update($dokumen);
  //     DB::table('refund')
  //     ->insert($datarefund);

  //     $response = array(
  //       'status' => 'success',
  //       'message' => 'Refund Berhasil Disimpan',
  //           //'$dokumens' =>$insert,
  //       // 'dokumens' => $request->all()
  //     );

  //       // Format Kirim Email Pemberitahuan
  //       // $data = array(
  //       //   'no_pin'=> $dokumen['no_pin'],
  //       //   'deskripsi' => $request->keterangan,
  //       //   'nama_nasabah' => $dokumen['nama_nasabah'],
  //       //   'premi' => $dokumen['premi'],
  //       //   'premi_admin' => $dokumen['premi_admin'],
  //       // );

  //     // $pesan = 'Pesan Terkirim';
  //     // $title = 'Approval Change Request No Pin '. $request->noPin;

  //     // $this->sendEmailUpdate($data,$pesan,$title);
  //   }

  //   return response()->json($response);

  // }

  { 
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    // dd($request->all());
    $id_prod =$request->id_prod;
    if($posisiuser == 3){

        $tgl = $request->tanggal_bayar;
        $jmlbyr = $request->dibayar;
      $dokumens = DB::table('refund')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
        if($request->tanggal_bayar == null){
          $tanggal_bayar = null;
        }else{
          $tanggal_bayar = date( 'Y-m-d', strtotime($request->tanggal_bayar));
        }
        if($request->nilai_refund == null){
          $nilai_refund = 0;
        }else{
          $nilai_refund = $request->nilai_refund;
        }
        if($request->dibayar == null){
          $nilai_bayar = 0;
        }else{
          $nilai_bayar = $jmlbyr;
        }
        if(($tgl == null || $tgl == '') && ($jmlbyr == null || $jmlbyr = '')){
          $status_refund = 1;
          $ket_status = 'INPUT REFUND';
        }else if(($tgl != null || $tgl != '') && ($jmlbyr == null || $jmlbyr == '')){
          $status_refund = 1;
          $ket_status = 'INPUT REFUND';
        }else if(($tgl == null || $tgl == '') && ($jmlbyr != null || $jmlbyr != '')){
          $status_refund = 1;
          $ket_status = 'INPUT REFUND';
        }else if(($tgl != null || $tgl != '') && ($jmlbyr != null || $jmlbyr != '')){
          $status_refund = 3;
          $ket_status = 'DITERIMA ASURANSI';
        }
      // dd($request->all(),$tgl,$jmlbyr, $status_refund, $id_prod_ajk);
        
        $dokumen = [
        'sts_refund' => $status_refund,
        'tgl_pelunasan' => $request->tgl_pelunasan,
        'posisi' => 1,
      ];
      // dd($nilai_refund);
      $datarefund = [
        'id_prod_ajk' => $id_prod,
        'sts_refund' => $ket_status,
        'tgl_bayar' => $tanggal_bayar,
        'dibayar' => $nilai_bayar,
      ];

          // DB::table('klaim_ajk')->insert($data_klaim);
          // $lastklaim = DB::table('klaim_ajk')
          //     ->max('id_klaim_ajk');
            // dd($edit);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($dokumen);
          DB::table('refund')->where('id_prod_ajk', '=', $id_prod)
          ->update($datarefund);
          // DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          // ->update([
          //   'sts_klaim'=>'1',
          // ]);
          $response = array(
            'status' => 'success',
            'message' => 'Data Berhasil Di Simpan',
          );
        return response()->json($response);

      //
    }else if($posisiuser == 1){
      $dokumens = DB::table('refund')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
      if($request->nilai_refund == null){
          $nilai_refund = 0;
        }else{
          $nilai_refund = $request->nilai_refund;
        }
      if(count($dokumens)>0){
            $dokumen = [
                    'sts_refund' => 1,
                    'tgl_pelunasan' => $request->tgl_pelunasan,
                    'posisi' => 1,

                    ];
      $datarefund = [
        'id_prod_ajk' => $request->id_prod_ajk,
        'tgl_lapor' => $request->tgl_lapor_refund,
        'tgl_refund' => $request->tgl_pelunasan,
        'nilai_refund' => str_replace( ',', '', $nilai_refund),
        'sts_refund' => 'INPUT DATA BARU',
      ];
      
      DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($dokumen);
          DB::table('refund')->where('id_prod_ajk', '=', $id_prod)
          ->update($datarefund);
          // DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          // ->update([
          //   'sts_klaim'=>'1',
          // ]);
          $response = array(
            'status' => 'success',
            'message' => 'Data Refund Berhasil Di Update',
          );
        return response()->json($response);
      }else{
        $dokumen = [
                    'sts_refund' => 1,
                    'tgl_pelunasan' => $request->tgl_pelunasan,
                    'posisi' => 1,
                    ];
      $datarefund = [
        'id_prod_ajk' => $request->id_prod_ajk,
        'tgl_lapor' => $request->tgl_lapor_refund,
        'tgl_refund' => $request->tgl_pelunasan,
        'nilai_refund' => str_replace( ',', '', $nilai_refund),
        'sts_refund' => 'INPUT DATA BARU',
      ];

          DB::table('refund')->insert($datarefund);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($dokumen);
          $response = array(
            'status' => 'success',
            'message' => 'Data Refund Berhasil Di Tambah',
          );
        return response()->json($response);
      }
    }else{
        $dokumens = DB::table('refund')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
      if($request->nilai_refund == null){
          $nilai_refund = 0;
        }else{
          $nilai_refund = $request->nilai_refund;
        }
      // dd($request->all());
      if(count($dokumens)>0){
            $dokumen = [
                    'sts_refund' => 1,
                    'tgl_pelunasan' => $request->tgl_pelunasan,
                    ];
      $datarefund = [
        'id_prod_ajk' => $request->id_prod_ajk,
        'tgl_lapor' => $request->tgl_lapor_refund,
        'tgl_refund' => $request->tgl_pelunasan,
        'nilai_refund' => str_replace( ',', '', $nilai_refund),
        'sts_refund' => 'INPUT DATA BARU',
      ];
      
      DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($dokumen);
          DB::table('refund')->where('id_prod_ajk', '=', $id_prod)
          ->update($datarefund);
          // DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          // ->update([
          //   'sts_klaim'=>'1',
          // ]);
          $response = array(
            'status' => 'success',
            'message' => 'Data Refund Berhasil Di Update',
          );
        return response()->json($response);
      }else{
        
        $dokumen = [
                    'sts_refund' => 1,
                    'tgl_pelunasan' => $request->tgl_pelunasan,
                    ];
      $datarefund = [
        'id_prod_ajk' => $request->id_prod_ajk,
        'tgl_lapor' => $request->tgl_lapor_refund,
        'tgl_refund' => $request->tgl_pelunasan,
        'nilai_refund' => str_replace( ',', '', $nilai_refund),
        'sts_refund' => 'INPUT DATA BARU',
      ];

          DB::table('refund')->insert($datarefund);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($dokumen);
          $response = array(
            'status' => 'success',
            'message' => 'Data Refund Berhasil Di Tambah',
          );
        return response()->json($response);
      }
    }
  }

  public function addklaim(Request $request)
  { 
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){

      if(!empty($request)){
      $dokumens = DB::table('klaim_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
      // dd($request->all());
         $sts_klaim = $request->sts_klaim;
         // dd($sts_klaim);
        if($sts_klaim == 'DITERIMA'){
          $namafileasuransi = 'file_spgr';
        }else if($sts_klaim == 'DITOLAK'){
          $namafileasuransi = 'file_bukti_tolak';
        }else if($sts_klaim == 'DIBAYAR'){
          $namafileasuransi = 'file_bukti_bayar';
        }

        if($request->tanggal_bayar == null){
          $tanggal_bayar = null;
        }else{
          $tanggal_bayar = date( 'Y-m-d', strtotime($request->tanggal_bayar));
        }
        
        $data_klaim = [
          // 'tgl_reg' => $request->tanggal_registrasi,
          // 'id_prod_ajk' => $request->id_prod_ajk,
          'sts_klaim' => $sts_klaim,
          'dibayar' => $request->dibayar,
          'tgl_bayar' => $tanggal_bayar,
          'ket_klaim' => $request->keterangan,
        ];

          // DB::table('klaim_ajk')->insert($data_klaim);
          // $lastklaim = DB::table('klaim_ajk')
          //     ->max('id_klaim_ajk');
        $nameinput = array('file');
        $namafiledok = array('namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
        $edit= $request->except('_token','sts_klaim','dibayar','tanggal_bayar','keterangan','file','id_prod');
          // dd();
        $id_prod = $request->id_prod;
        $edit['id_klaim_ajk'] = $id_prod;
        // dd(count($edit));
        if(count($edit)>0){
            if(($request->file('file') != null)){
              // $namafile = $namafiledok[$j];
              // $nama_dok = $request->$namafile;
              // $file_path = $edit[$key];
                // $file_name = json_decode($file_path);
                // foreach ($file_name as $key2 => $value2) {
                // $file_to = $path.'/'.$value2;
                // File::delete($file_to);
                // }
              $l = 1;
              $data = [];
              foreach($request->file('file') as $image)
              {
                $nama_dok = $image->getClientOriginalName();
                $path = storage_path('dataklaim/'.$id_prod.'/'.$namafileasuransi);
                $format= $image->getClientOriginalExtension();
                $nama = $nama_dok;
                $image->move($path, $nama_dok);  
                $data[] = $nama;
                $l++; 
              }
              $edit[$namafileasuransi] =json_encode($data);
              $data = null;
            }
            // dd($edit);
          DB::table('dok_klaim')->where('id_klaim_ajk', '=', $id_prod)
          ->update($edit);
          DB::table('klaim_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($data_klaim);
          // DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          // ->update([
          //   'sts_klaim'=>'1',
          // ]);
          $response = array(
            'status' => 'success',
            'message' => 'Data Berhasil Di Simpan',
          );
        }
      }
        return response()->json($response);

      //
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
      $sts_klaim = 'ON PROSES';
      }else{
      $sts_klaim = 'ON PROSES';
      }
      $sts_klaim = 'ON PROSES';
    }else{
      $sts_klaim = 'ON PROSES';

      if(!empty($request)){
      $dokumens = DB::table('klaim_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
      // dd($request->all());
      if(count($dokumens)>0){

        if($request->tgl_kejadian == null){
          $tgl_kejadian = null;
        }else{
          $tgl_kejadian = date( 'Y-m-d', strtotime($request->tgl_kejadian));
        }
        if($request->tanggal_bayar == null){
          $tanggal_bayar = null;
        }else{
          $tanggal_bayar = date( 'Y-m-d', strtotime($request->tanggal_bayar));

        }
        $data_klaim = [
          // 'tgl_reg' => $request->tanggal_registrasi,
          'id_prod_ajk' => $request->id_prod_ajk,
          'tgl_lapor' => $request->tgl_lapor,
          'tgl_kejadian' => $tgl_kejadian,
          'jns_Klaim' => $request->jenis_klaim,
          'sts_klaim' => $sts_klaim,
          'nilai_klaim' => $request->nilai_klaim, 
          'dibayar' => $request->dibayar,
          'tgl_bayar' =>$tanggal_bayar,
          'ket_klaim' => $request->keterangan,
        ];

          // DB::table('klaim_ajk')->insert($data_klaim);
          // $lastklaim = DB::table('klaim_ajk')
          //     ->max('id_klaim_ajk');
        $nameinput = array('dok1','dok2','dok3','dok4','dok5','dok6','dok7','dok8','dok9','dok10','dok11','dok12','dok13','dok14','dok15');
        $namafiledok = array('namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
        $edit= $request->except('no_sertifikat','id_prod','no_kredit', 'debitur','tanggal_lahir', 'tanggal_akad', 'masa_kredit','plafon_pinjaman','premi','_token','id_prod_ajk', 'tgl_lapor','jenis_kredit','jns_klaim','jenis_klaim','sts_klaim', 'nilai_klaim','dibayar', 'tanggal_bayar', 'keterangan', 'namafile1','namafile2','namafile3', 'tgl_kejadian','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
          // dd();
        $id_prod = $request->id_prod_ajk;
        $edit['id_klaim_ajk'] = $id_prod;

        if(count($edit)>0){
          foreach ($nameinput as $key) {
            $j = 0;
            if(($request->file($key) != null)){
              $namafile = $namafiledok[$j];
              $nama_dok = $request->$namafile;
              $file_path = $edit[$key];
              $path = storage_path('dataklaim/'.$id_prod.'/'.$nama_dok);
                // $file_name = json_decode($file_path);
                // foreach ($file_name as $key2 => $value2) {
                // $file_to = $path.'/'.$value2;
                // File::delete($file_to);
                // }
              $l = 1;
              foreach($request->file($key) as $image)
              {
                $format= $image->getClientOriginalExtension();
                $nama = $nama_dok.'('.$l.').'.$format;
                $image->move($path, $nama);  
                $data[] = $nama;
                $l++; 
              }
              $edit[$key] =json_encode($data);
              $data = null;
            }
            $j++;
          }
          DB::table('dok_klaim')->insert($edit);
          DB::table('klaim_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($data_klaim);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update([
            'sts_klaim'=>'1',
          ]);
          $response = array(
            'status' => 'success',
            'message' => 'Sukses Update Data',
          );

        }else{
          DB::table('dok_klaim')->insert($edit);
          DB::table('klaim_ajk')->insert($data_klaim);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update([
            'sts_klaim'=>'1',
          ]);
          $response = array(
            'status' => 'success',
            'message' => 'Sukses Update Data',
          );
        }
        return response()->json($response);
      }else{
        $data_klaim = [
          // 'tgl_reg' => $request->tanggal_registrasi,
          'id_prod_ajk' => $request->id_prod_ajk,
          'tgl_lapor' => $request->tgl_lapor,
          'tgl_kejadian' => date( 'Y-m-d', strtotime($request->tgl_kejadian)),
          'jns_Klaim' => $request->jenis_klaim,
          'sts_klaim' => $request->sts_klaim,
          'nilai_klaim' => $request->nilai_klaim, 
          'dibayar' => $request->dibayar,
          'tgl_bayar' =>date( 'Y-m-d', strtotime($request->tanggal_bayar)),
          'ket_klaim' => $request->keterangan,
        ];

          // DB::table('klaim_ajk')->insert($data_klaim);
          // $lastklaim = DB::table('klaim_ajk')
          //     ->max('id_klaim_ajk');
        $nameinput = array('dok1','dok2','dok3','dok4','dok5','dok6','dok7','dok8','dok9','dok10','dok11','dok12','dok13','dok14','dok15');
        $namafiledok = array('namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
        $edit= $request->except('no_sertifikat','no_kredit', 'debitur','tanggal_lahir', 'tanggal_akad', 'masa_kredit','plafon_pinjaman','premi','_token','id_prod_ajk', 'tgl_lapor', 'tgl_kejadian','jenis_kredit','jns_klaim','jenis_klaim','sts_klaim', 'nilai_klaim','dibayar', 'tanggal_bayar', 'keterangan', 'namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
          // dd();
        $id_prod = $request->id_prod_ajk;
        $edit['id_klaim_ajk'] = $id_prod;

        if(count($edit)>0){
          foreach ($nameinput as $key) {
            $j = 0;
            if(($request->file($key) != null)){
              $namafile = $namafiledok[$j];
              $nama_dok = $request->$namafile;
              $file_path = $edit[$key];
              $path = storage_path('dataklaim/'.$id_prod.'/'.$nama_dok);
                // $file_name = json_decode($file_path);
                // foreach ($file_name as $key2 => $value2) {
                // $file_to = $path.'/'.$value2;
                // File::delete($file_to);
                // }
              $l = 1;
              foreach($request->file($key) as $image)
              {
                $format= $image->getClientOriginalExtension();
                $nama = $nama_dok.'('.$l.').'.$format;
                $image->move($path, $nama);  
                $data[] = $nama;
                $l++; 
              }
              $edit[$key] =json_encode($data);
              $data = null;
            }
            $j++;
          }
          DB::table('dok_klaim')->insert($edit);
          DB::table('klaim_ajk')->insert($data_klaim);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
            ->update([
              'sts_klaim'=>'1',
          ]);
          $response = array(
            'status' => 'success',
            'message' => 'Sukses Tambah Data',
          );

        }else{
          DB::table('dok_klaim')->insert($edit);
          DB::table('klaim_ajk')->insert($data_klaim);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update([
            'sts_klaim'=>'1',
          ]);
          $response = array(
            'status' => 'success',
            'message' => 'Sukses Tambah Data',
          );
        }
        return response()->json($response);
      }

    }
      //
    }

    
    
  }

  public function update(Request $request) {

    $dataDokumen = DB::table('table_produksi')
    ->where('no_pin', $request->noPin)->get();

    if (!empty($request)){
        // Update current row
      $dokumen = [
        'no_pin' => $request->noPin,
        'cabang' => $request->cabang,
        'nama_nasabah' => $request->nama_nasabah,
        'plafon' => str_replace( ',', '', $request->plafon ),
        'tgl_booking' => date( 'Y-m-d', strtotime($request->tgl_booking)),
        'merk' => $request->merk,
        'tipe' => $request->tipe,
        'kategori' => $request->kategori,
        'jenis_asuransi' => $request->jenis_asuransi,
        'model_kend' => $request->model_kend,
        'no_rangka' => $request->no_rangka,
        'no_mesin' => $request->no_mesin,
        'no_polisi' => $request->no_polisi,
        'no_bpkb' => $request->no_bpkb,
        'tahun' => $request->tahun,
        'tenor' => $request->tenor,
        'rate' => $request->rate,
        'premi' => str_replace( ',', '', $request->premi ),
        'premi_admin' => str_replace( ',', '', $request->premi_admin ),
        'wilayah' => $request->wilayah,
      ];

      $insert[] = $dokumen;
      DB::table('table_produksi')
      ->where('no_pin', $request->noPin)
      ->update($dokumen);



      $response = array(
        'status' => 'success',
            //'$dokumens' =>$insert,
        'dokumens' => $request->all()
      );

        // Format Kirim Email Pemberitahuan
        // $data = array(
        //   'no_pin'=> $dokumen['no_pin'],
        //   'deskripsi' => $request->keterangan,
        //   'nama_nasabah' => $dokumen['nama_nasabah'],
        //   'premi' => $dokumen['premi'],
        //   'premi_admin' => $dokumen['premi_admin'],
        // );

      $pesan = 'Pesan Terkirim';
      $title = 'Approval Change Request No Pin '. $request->noPin;

      $this->sendEmailUpdate($data,$pesan,$title);

      return response()->json($response);
    }

      // Return error
    $response = array(
      'status' => 'failure',
          //'$dokumens' =>$insert,
      'message' => 'Failed update data'
    );

    return response()->json($response);

  }


  public function uploadkeclient(Request $request)
  {
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;

    // Storage::put('public/profile_images/'. $filenametostore, fopen($file, 'r+'));
    //         Storage::put('public/profile_images/thumbnail/'. $filenametostore, fopen($file, 'r+'));
 
    //         //Resize image here
    //         $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
    //         $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
    //             $constraint->aspectRatio();
    //         });
    //         $img->save($thumbnailpath);

            // $template_form = DB::table('templateform')->where('kode_asu', $posisiuser)->first();
            // dd($request->file('file_upload'));
      if($request->file_upload != null){
              // dd($request->file_upload);
        $file_pathh = DB::table('templateform')->where('id', 1)->first();
        $path = storage_path('form_klaim');

        if($file_pathh == null || $file_pathh == ''){

          foreach($request->file('file_upload') as $image)
        {
          // dd($image);
          $name= $image->getClientOriginalName();
          $extension = $image->getClientOriginalExtension();

          $image = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                $constraint->aspectRatio();
            });
          $image->move($path, $name);
          $data[] = $name;
        }
          $valuefile =json_encode($data);
              // File::delete('template/form_klaim_ksk/'.$filelama);
              // $name= 'update-'.$request->file($key)->getClientOriginalName();
              // $request->file($key)->move('template'.'\\'.$key, $name);
              // $update->$key =$name;
        $update = DB::table('templateform')->insert([
          'file' => $valuefile

        ]);

        $message = "Form Klaim Berhasil di Simpan";
        $status = "success";
        $response = array(
          'status' => $status,
          'message' =>$message);
        }else{
          $file_path = $file_pathh->file;
        if($file_path != null ){
          $file_name = json_decode($file_path, true);
          foreach ($file_name as $key2 => $value2) {
                // dd($value2);
            File::delete($path.'\\'.$file_path);
          }
        }

        foreach($request->file('file_upload') as $image)
        {
          $name= $image->getClientOriginalName();
          $extension = $image->getClientOriginalExtension();
          // dd($extension);
          $image->move($path, $image);
          $compress_images = $this->compressImage($path.'\\'.$name, $image);
          // $image = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
          //       $constraint->aspectRatio();
          //   });
          // dd($compress_images);
          $data[] = $name;
        }
        $valuefile =json_encode($data);
              // File::delete('template/form_klaim_ksk/'.$filelama);
              // $name= 'update-'.$request->file($key)->getClientOriginalName();
              // $request->file($key)->move('template'.'\\'.$key, $name);
              // $update->$key =$name;
        $update = DB::table('templateform')->where('id',1)->update([
          'file' => $valuefile
        ]);
        $message = "Form Klaim Berhasil di Update";
        $status = "success";
        $response = array(
          'status' => $status,
          'message' =>$message);

        }
        
        
              // $filelama = $update->$key;
        

        

      }else{
              // $valuefile = $request->file('file_upload');
        $message = "Form Klaim Tidak di Simpan";
        $status = "failed";
        $response = array(
          'status' => $status,
          'message' =>$message);
      }




    return response()->json($response);
  }

  public function kirimkeasuransi(Request $request)
    {
      $isFieldExist = !empty($request->checklistData);
      // dd($isFieldExist);
      if($isFieldExist){
            $checklistData = explode(',', $request->checklistData);
            // Update Flag Proses to Approve Status
            foreach ($checklistData as $value) {
                  DB::table('produksi_ajk')->where('no_pk', $value)->update([
                    'tgl_upload' => Carbon::now(),
                    'posisi' => 2,
                  ]);
          }
           $response = array(
              'status' => 'success',
              'messages' => 'Data berhasil dikirim',
          );
          return response()->json($response);

        }
    }

    public function kirimkepusat(Request $request)
    {
      // $isFieldExist = !empty($request->checklistData);
      // // dd($isFieldExist);
      // if($isFieldExist){
      //       $checklistData = explode(',', $request->checklistData);
      //       // Update Flag Proses to Approve Status
      //       foreach ($checklistData as $value) {
      $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;

      if($posisiuser == 3){
          $posisi = 2;
          
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $posisi = 2;  
          }else{
            $posisi = 2;  
          }

        }else{
            $posisi = 3;                     
        }

                  DB::table('produksi_ajk')->where('id_prod_ajk', $request->id_prod_ajk)->update([
                    'posisi' => $posisi,
                  ]);
          // }
           $response = array(
              'status' => 'success',
              'message' => 'Data berhasil dikirim',
          );
          return response()->json($response);

        // }
    }
    
  public function compressImage($source_image, $compress_image) {
                // dd($source_image);
                $image_info = $compress_image->getClientOriginalExtension();
                dd($image_info);
                if ($image_info['mimeType'] == 'image/jpeg') {
                $source_image = imagecreatefromjpeg($source_image);
                imagejpeg($source_image, $compress_image, 75);
                } elseif ($image_info['mime'] == 'image/gif') {
                $source_image = imagecreatefromgif($source_image);
                imagegif($source_image, $compress_image, 75);
                } elseif ($image_info['mime'] == 'image/png') {
                $source_image = imagecreatefrompng($source_image);
                imagepng($source_image, $compress_image, 6);
                }
                return $compress_image;
                }


  public function downloadformklaim() {
      $getname = DB::table('templateform')->where('id', 1)->first();
      $namafile = $getname->file;
      $file_name = json_decode($namafile);
      foreach ($file_name as $key => $value) {
      $x = response()->download(storage_path('template/'.$value));
        
      }
      
      return $x;

    }

  public function downloadfileklaim($id_klaim_ajk){
      $dokumens = DB::table('dok_klaim',$id_klaim_ajk)->first();
      // $pin = $dokumens->no_pin;
      $path = storage_path('dataklaim\\'.$id_klaim_ajk);
      Zipper::make($path.'.zip')->add($path)->close();
      return response()->download($path.'.zip');
    }

  public function sendEmailUpdate($data, $pesan, $title){
    $pesan = "Isi pesan";
  		// $body = array('name'=>"Sam Jose", "body" => "body nih");
    Mail::send(['html' => 'email.updaterequest'], $data, function($message) use ($pesan, $title){
      $message->to('juni.aldo@yahoo.co.id', 'Andrew')
      ->subject($title)
      ->setBody($pesan, 'text/plain');
      $message->from('mitrafinancesejahtera@gmail.com','Admin');
    });
  }

  public function sendEmailApprove($data, $pesan, $title){
    $pesan = "Isi pesan";
      // $body = array('name'=>"Sam Jose", "body" => "body nih");
    Mail::send(['html' => 'email.notifrequest'], $data, function($message) use ($pesan, $title){
      $message->to('juni.aldo@yahoo.co.id', 'Andrew')
      ->subject($title)
      ->setBody($pesan, 'text/plain');
      $message->from('mitrafinancesejahtera@gmail.com','Admin');
    });
  }
}

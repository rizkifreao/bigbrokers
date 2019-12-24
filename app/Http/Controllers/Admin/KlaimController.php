<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use File;
use ZipArchive;    
use Chumper\Zipper\Facades\Zipper;
use Image;
use Illuminate\Support\Facades\Storage;

class KlaimController extends Controller
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
      $kode = 1;
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $valuebutton = "Kirim Ke Admin";  
        $whereCondition = [
          ['client.kode_client', $kodeposisi],
        ];  
        $kode = 2;

      }else{
        $valuebutton = "Kirim Ke Admin";   
        $whereCondition = [
          ['client.kode_client', $kodeposisi],
        ]; 
        $kode = 3;

      }

    }else{
      $valuebutton = "Kirim Ke Asuransi";  
      $whereCondition = [
        ['client.kode_client', $kodeposisi],
      ]; 
      $kode = 4;

    }
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
    $client = DB::table('client')
    ->select('nama','kode_client')
    ->get();

    return view ( 'Admin/formklaim' ,[
      'dokumens' => $dokumens,
      'jenisasuransi' => $jenis_asuransi,
      'jeniskredit' => $jenis_kredit,
      'client' => $client,
      'valuebutton' => $valuebutton,
      'posisiuser' => $posisiuser,
      'posisiasuransi' => $posisiuser,
      'kode' => $kode,
    ]);
  }

  //daftar klaim
  public function reload()
  {   
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['b.kode_asu', $kodeposisi],
        ['b.sts_polis', 1],
        ['b.sts_klaim',1],
        ['b.sts_refund',0],
        ['b.posisi',3],
      ];                      
      $kode = 1;
    }else if($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $client = DB::table('client')->where('kode_pusat', $mst_client[0]->kode_pusat)->get();
        $kode_client = [];
        foreach ($client as $key => $value) {
          $kode_client[] = $value->kode_client;
        }

        $whereCondition2 = [
          // ['client.kode_pusat', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',1],
          ['b.sts_refund',0],
          ['b.posisi',1],
        ];   
        $kode = 2;
      }else{
        $whereCondition2 = [
          ['b.kode_client', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',1],
          ['b.sts_refund',0],
          ['b.posisi',1],
        ];  
      }

      $kode = 3;
    }else{
      $whereCondition2 = [
        ['b.sts_polis', 1],
        ['b.sts_klaim',1],
        ['b.sts_refund',0],
        ['b.posisi',1],
      ];                      
      $kode = 4;
    }

    if($kode == 2){
      $klaim = DB::table('klaim_ajk as a')
      ->select('a.*','b.*','a.sts_klaim as stsklaim','b.tgl_bayar as tglbayar','d.kode_broker','d.kode_prod','d.polis_induk','d.nama','e.nama as namaprod','f.nama as namaclient','g.nama as namaposisi','c.file_spgr','c.file_bukti_tolak','c.file_bukti_bayar','b.kode_asu as namaasuransi')
      ->leftjoin('produksi_ajk as b', 'b.id_prod_ajk', 'a.id_prod_ajk')
      ->leftjoin('dok_klaim as c', 'c.id_klaim_ajk','a.id_klaim_ajk')
      ->leftjoin('asuransi as d','d.kode_asu','b.kode_asu')
      ->leftjoin('jns_produksi as e','e.kode_prod','d.kode_prod')
      ->leftjoin('client as f','f.kode_client','b.kode_client')
      ->leftjoin('posisi_data as g','g.posisi','b.posisi')
      ->whereIn('a.kode_client', $kode_client)
    ->where($whereCondition2)
    ->get()->toArray();
    }else{
    $klaim = DB::table('klaim_ajk as a')
    ->select('a.*','b.*','a.sts_klaim as stsklaim','b.tgl_bayar as tglbayar','d.kode_broker','d.kode_prod','d.polis_induk','d.nama','e.nama as namaprod','f.nama as namaclient','g.nama as namaposisi','c.file_spgr','c.file_bukti_tolak','c.file_bukti_bayar','b.kode_asu as namaasuransi')
    ->leftjoin('produksi_ajk as b', 'b.id_prod_ajk', 'a.id_prod_ajk')
    ->leftjoin('dok_klaim as c', 'c.id_klaim_ajk','a.id_klaim_ajk')
    ->leftjoin('asuransi as d','d.kode_asu','b.kode_asu')
    ->leftjoin('jns_produksi as e','e.kode_prod','d.kode_prod')
    ->leftjoin('client as f','f.kode_client','b.kode_client')
    ->leftjoin('posisi_data as g','g.posisi','b.posisi')
    ->where($whereCondition2)
    ->get()->toArray();
    }
    if(count($klaim)>0){
      foreach ($klaim as $key => $value) {
        # code...
      if($klaim[$key]->nama == null){
        $klaim[$key]->nama= $klaim[$key]->namaasuransi;
      }
    }
  }
    return datatables($klaim)->toJson();
  }

  public function reloadlunas()
  {   
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['b.kode_asu', $kodeposisi],
        ['b.sts_polis', 1],
        ['b.sts_klaim',1],
        ['b.sts_refund',0],
        ['b.posisi',3],
        ['a.sts_klaim','!=','DIBAYAR'],
      ];                      
      $kode = 1;
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $client = DB::table('client')->where('kode_pusat', $mst_client[0]->kode_pusat)->get();
        $kode_client = [];
        foreach ($client as $key => $value) {
          $kode_client[] = $value->kode_client;
        }
        $whereCondition2 = [
          // ['client.kode_pusat', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',1],
          ['b.sts_refund',0],
          ['b.posisi',1],
        ];
        $kode = 2;   
      }else{
        $whereCondition2 = [
          ['b.kode_client', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',1],
          ['b.sts_refund',0],
          ['b.posisi',1],
        ];  
        $kode = 3;      
      }
    }else{
      $whereCondition2 = [
        ['b.sts_polis', 1],
        ['b.sts_klaim',1],
        ['b.sts_refund',0],
        ['b.posisi',1],
      ];                      
      $kode = 4;      
    }

    if($kode == 2){
      $klaim = DB::table('klaim_ajk as a')
      ->select('a.*','d.kode_broker','d.kode_prod','d.polis_induk','d.nama','e.nama as namaprod','f.nama as namaclient','g.nama as namaposisi','c.file_spgr','c.file_bukti_tolak','c.file_bukti_bayar')
      ->leftjoin('produksi_ajk as b', 'b.id_prod_ajk', 'a.id_prod_ajk')
      ->leftjoin('dok_klaim as c', 'c.id_klaim_ajk','a.id_klaim_ajk')
      ->leftjoin('asuransi as d','d.kode_asu','b.kode_asu')
      ->leftjoin('jns_produksi as e','e.kode_prod','d.kode_prod')
      ->leftjoin('client as f','f.kode_client','b.kode_client')
      ->leftjoin('posisi_data as g','g.posisi','b.posisi')
      ->whereIn('a.kode_client', $kode_client)
    ->where($whereCondition2)
    ->get()->toArray();
    }else{
    $klaim = DB::table('klaim_ajk as a')
    ->select('a.*','d.kode_broker','d.kode_prod','d.polis_induk','d.nama','e.nama as namaprod','f.nama as namaclient','g.nama as namaposisi','c.file_spgr','c.file_bukti_tolak','c.file_bukti_bayar')
    ->leftjoin('produksi_ajk as b', 'b.id_prod_ajk', 'a.id_prod_ajk')
    ->leftjoin('dok_klaim as c', 'c.id_klaim_ajk','a.id_klaim_ajk')
    ->leftjoin('asuransi as d','d.kode_asu','b.kode_asu')
    ->leftjoin('jns_produksi as e','e.kode_prod','d.kode_prod')
    ->leftjoin('client as f','f.kode_client','b.kode_client')
    ->leftjoin('posisi_data as g','g.posisi','b.posisi')
    ->where($whereCondition2)
    ->get()->toArray();
    }
    
    return datatables($klaim)->toJson();
  }

  public function reloadbyasuransi()
  {   
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    // dd($posisiuser);
    if($posisiuser == 3){
      $whereCondition2 = [
        ['produksi_ajk.kode_asu', $kodeposisi],
        ['produksi_ajk.sts_polis', 1],
        ['produksi_ajk.sts_klaim',1],
        ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.posisi',3],
      ];                      
    $kode = 1;
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $client = DB::table('client')->where('kode_pusat', $mst_client[0]->kode_pusat)->get();
        $kode_client = [];
        foreach ($client as $key => $value) {
          $kode_client[] = $value->kode_client;
        }
        $whereCondition2 = [
          ['produksi_ajk.sts_polis', 1],
          ['produksi_ajk.sts_klaim',1],
          ['produksi_ajk.sts_refund',0],
          ['produksi_ajk.posisi',3],
        ];   
    $kode = 2;  
    }else{
        $whereCondition2 = [
          ['produksi_ajk.kode_client', $kodeposisi],
          ['produksi_ajk.sts_polis', 1],
          ['produksi_ajk.sts_klaim',1],
          ['produksi_ajk.sts_refund',0],
          ['produksi_ajk.posisi',3],
        ];  
    $kode = 3;  
      }
    }else{
      $whereCondition2 = [
        ['produksi_ajk.sts_polis', 1],
        ['produksi_ajk.sts_klaim',1],
        ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.posisi',1],
      ];                      
    $kode = 4;  
    }

    if($kode == 2){
      $klaim = DB::table('klaim_ajk as a')
      ->select('a.*','d.kode_broker','d.kode_prod','d.polis_induk','d.nama','e.nama as namaprod','f.nama as namaclient','g.nama as namaposisi','c.file_spgr','c.file_bukti_tolak','c.file_bukti_bayar')
      ->leftjoin('produksi_ajk as b', 'b.id_prod_ajk', 'a.id_prod_ajk')
      ->leftjoin('dok_klaim as c', 'c.id_klaim_ajk','a.id_klaim_ajk')
      ->leftjoin('asuransi as d','d.kode_asu','b.kode_asu')
      ->leftjoin('jns_produksi as e','e.kode_prod','d.kode_prod')
      ->leftjoin('client as f','f.kode_client','b.kode_client')
      ->leftjoin('posisi_data as g','g.posisi','b.posisi')
      ->whereIn('a.kode_client', $kode_client)
    ->where($whereCondition2)
    ->get()->toArray();
    }else{
    $klaim = DB::table('klaim_ajk as a')
    ->select('a.*','d.kode_broker','d.kode_prod','d.polis_induk','d.nama','e.nama as namaprod','f.nama as namaclient','g.nama as namaposisi','c.file_spgr','c.file_bukti_tolak','c.file_bukti_bayar')
    ->leftjoin('produksi_ajk as b', 'b.id_prod_ajk', 'a.id_prod_ajk')
    ->leftjoin('dok_klaim as c', 'c.id_klaim_ajk','a.id_klaim_ajk')
    ->leftjoin('asuransi as d','d.kode_asu','b.kode_asu')
    ->leftjoin('jns_produksi as e','e.kode_prod','d.kode_prod')
    ->leftjoin('client as f','f.kode_client','b.kode_client')
    ->leftjoin('posisi_data as g','g.posisi','b.posisi')
    ->where($whereCondition2)
    ->get()->toArray();
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
    return datatables($klaim)->toJson();
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
      public function reloadklaimpolis()
      {   
        $user = Auth::user();
        $kodeposisi = $user->perusahaan;
        $posisiuser = $user->posisi;
        if($posisiuser == 3){
          $whereCondition2 = [
            ['a.kode_asu', $kodeposisi],
            ['a.sts_polis', 1],
            ['a.sts_klaim',0],
            ['a.sts_refund',0],
            // ['produksi_ajk.sts_bayar','LUNAS'],
          ];                      
          $kode =1;
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition2 = [
              ['f.kode_pusat', $kodeposisi],
              ['a.sts_polis', 1],
              ['a.sts_klaim',0],
              ['a.sts_refund',0],
              // ['produksi_ajk.sts_bayar','LUNAS'],
            ];   
            $kode =2;
          }else{
            $whereCondition2 = [
              ['a.kode_client', $kodeposisi],
              ['a.sts_polis', 1],
              ['a.sts_klaim',0],
              ['a.sts_refund',0],
              // ['produksi_ajk.sts_bayar','LUNAS'],
            ];  
          }
          $kode =3;
    
        }else{
          $whereCondition2 = [
              ['a.sts_polis', 1],
            ['a.sts_klaim',0],
            ['a.sts_refund',0],
            // ['produksi_ajk.sts_bayar','LUNAS'],
          ];                      
          $kode =4;
        }
    
        // $klaim = DB::table('produksi_ajk as a')
        // ->select('a.*','b.kode_broker','b.kode_prod','b.polis_induk','b.nama as nama','c.nama as namaprod','f.nama as namaclient','d.nama as namaposisi')
        // ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
        // ->leftjoin('jns_produksi as c','c.kode_prod','b.kode_prod')
        // ->leftjoin('posisi_data as d','d.posisi','a.posisi')
        // ->leftjoin('client as f','f.kode_client','a.kode_client')
        // ->where($whereCondition2)
        // ->get()->toArray();
        if($kode == 2){
          $klaim = DB::table('produksi_ajk as a')
          ->select('a.*','b.kode_broker','b.kode_prod','b.polis_induk','b.nama as namaasuransi','c.nama as namaprod','f.nama as namaclient','d.nama as posisidata')
          ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
          ->leftjoin('jns_produksi as c','c.kode_prod','b.kode_prod')
          ->leftjoin('posisi_data as d','d.posisi','a.posisi')
          ->leftjoin('client as f','f.kode_client','a.kode_client')
          ->whereIn('b.kode_client', $kode_client)
        ->where($whereCondition2)
        ->get()->toArray();
        }else{
        $klaim = DB::table('produksi_ajk as a')
        ->select('a.*','b.kode_broker','b.kode_prod','b.polis_induk','b.nama as namaasuransi','c.nama as namaprod','f.nama as namaclient','d.nama as posisidata')
        ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
        ->leftjoin('jns_produksi as c','c.kode_prod','b.kode_prod')
        ->leftjoin('posisi_data as d','d.posisi','a.posisi')
        ->leftjoin('client as f','f.kode_client','a.kode_client')
        ->where($whereCondition2)
        ->get()->toArray();
        }
        return datatables($klaim)->toJson();
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
            $dok = array('dok1','dok2','dok3','dok4','dok5','dok6','dok7','dok8','dok9','dok10','dok11','dok12','dok13','dok14','dok15');
            $namafiledok = array('namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
            $edit= $request->except('_token','sts_klaim','dibayar','tgl_dok_lengkap','tanggal_bayar','keterangan','file','id_prod', 'namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
          // dd();
            $id_prod = $request->id_prod;
            $edit['id_klaim_ajk'] = $id_prod;

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
                  $path = storage_path('dataklaim/'.$id_prod.'/'.$nama_dok);
                  $format= $image->getClientOriginalExtension();
                  $nama = $nama_dok;
                  $image->move($path, $nama_dok);  
                  $data[] = $nama;
                  $l++; 
                }
                $edit[$namafileasuransi] =json_encode($data);
                $data = null;
              }
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
        }else if($posisiuser == 1){
          
          $dokumens = DB::table('klaim_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
          if(count($dokumens)>0){
            $sts_klaim = 'ON PROSES';
      // dd($request->all());
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
            $edit= $request->except('no_sertifikat','id_prod','no_kredit','tgl_dok_lengkap', 'debitur','tanggal_lahir', 'tanggal_akad', 'masa_kredit','plafon_pinjaman','premi','_token','id_prod_ajk', 'tgl_lapor','jenis_kredit','jns_klaim','jenis_klaim','sts_klaim', 'nilai_klaim','dibayar', 'tanggal_bayar', 'keterangan', 'namafile1','namafile2','namafile3', 'tgl_kejadian','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
          // dd();
            $id_prod = $request->id_prod_ajk;
            $edit['id_klaim_ajk'] = $id_prod;

            if(count($edit)>1){
              $j = 0;
              foreach ($nameinput as $key) {
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
                    $nama = $nama_dok.'_'.$l.'.'.$format;
                    $image->move($path, $nama);  
                    $data[] = $nama;
                    $l++; 
                  }
                  $edit[$key] =json_encode($data);
                  $data = null;
                }
                $j++;
              }
          // dd($edit);
              $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
              if(count($dok)>0){
                DB::table('dok_klaim')->where('id_klaim_ajk', '=', $id_prod)->update($edit);
              }else{
                DB::table('dok_klaim')->insert($edit);
              }
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
             $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
             if(count($dok)>0){
              DB::table('dok_klaim')->where('id_klaim_ajk', '=', $id_prod)->update($edit);
            }else{
              DB::table('dok_klaim')->insert($edit);
            }
            DB::table('klaim_ajk')->where('id_prod_ajk', '=', $id_prod)->update($data_klaim);
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
          $sts_klaim = 'INPUT DATA KLAIM';

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
          $edit= $request->except('no_sertifikat','no_kredit', 'debitur','tanggal_lahir','tgl_dok_lengkap', 'tanggal_akad', 'masa_kredit','plafon_pinjaman','premi','_token','id_prod_ajk','id_prod', 'tgl_lapor', 'tgl_kejadian','jenis_kredit','jns_klaim','jenis_klaim','sts_klaim', 'nilai_klaim','dibayar', 'tanggal_bayar', 'keterangan', 'namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
          // dd();
          $id_prod = $request->id_prod_ajk;
          $edit['id_klaim_ajk'] = $id_prod;
        // dd(count($edit));
          if(count($edit)>1){
            $j = 0;
            foreach ($nameinput as $key) {
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
                  $nama = $nama_dok.'_'.$l.'.'.$format;
                  $image->move($path, $nama);  
                  $data[] = $nama;
                  $l++; 
                }
                $edit[$key] =json_encode($data);
                $data = null;
              }
              $j++;
            }

          // $klaimm = DB::table('klaim_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
          // if(count($klaimm)>0){
          //   DB::table('klaim_ajk')->where('id_prod_ajk', '=', $id_prod)->update($data_klaim);
          // }else{
            DB::table('klaim_ajk')->insert($data_klaim);
          // } 
            $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
            if(count($dok)>0){
              DB::table('dok_klaim')->where('id_klaim_ajk', '=', $id_prod)->update($edit);
            }else{
              DB::table('dok_klaim')->insert($edit);
            }
            DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
            ->update([
              'sts_klaim'=>'1',
              'posisi'=>1,
            ]);
            $response = array(
              'status' => 'success',
              'message' => 'Sukses Tambah Data',
            );

          }else{

           $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
           if(count($dok)>0){
            DB::table('dok_klaim')->where('id_prod_ajk', '=', $id_prod)->update($edit);
          }else{
            DB::table('dok_klaim')->insert($edit);
          }
          DB::table('klaim_ajk')->insert($data_klaim);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update([
            'sts_klaim'=>'1',
            'posisi'=>1,
          ]);

          $response = array(
            'status' => 'success',
            'message' => 'Suksesd Tambah Data',
          );
        }
        return response()->json($response);
      }

    }else if($posisiuser == 2){
      $dokumens = DB::table('klaim_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
      if(count($dokumens)>0){
        $sts_klaim = 'ON PROSES';
  // dd($request->all());
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
        $edit= $request->except('no_sertifikat','id_prod','no_kredit', 'tgl_dok_lengkap','debitur','tanggal_lahir', 'tanggal_akad', 'masa_kredit','plafon_pinjaman','premi','_token','id_prod_ajk', 'tgl_lapor','jenis_kredit','jns_klaim','jenis_klaim','sts_klaim', 'nilai_klaim','dibayar', 'tanggal_bayar', 'keterangan', 'namafile1','namafile2','namafile3', 'tgl_kejadian','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
        $id_prod = $request->id_prod_ajk;
        $edit['id_klaim_ajk'] = $id_prod;

        if(count($edit)>1){
          $j = 0;
          foreach ($nameinput as $key) {
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
                $nama = $nama_dok.'_'.$l.'.'.$format;
                $image->move($path, $nama);  
                $data[] = $nama;
                $l++; 
              }
              $edit[$key] =json_encode($data);
              $data = null;
            }
            $j++;
          }
      // dd($edit);
          $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
          if(count($dok)>0){
            DB::table('dok_klaim')->where('id_klaim_ajk', '=', $id_prod)->update($edit);
          }else{
            DB::table('dok_klaim')->insert($edit);
          }
          DB::table('klaim_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update($data_klaim);
          DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
          ->update([
            'sts_klaim'=>'1',
            'tgl_dok_lengkap'=>$request->tgl_dok_lengkap,
          ]);
          $response = array(
            'status' => 'success',
            'message' => 'Sukses Update Data',
          );

        }else{
         $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
         if(count($dok)>0){
          DB::table('dok_klaim')->where('id_klaim_ajk', '=', $id_prod)->update($edit);
        }else{
          DB::table('dok_klaim')->insert($edit);
        }
        DB::table('klaim_ajk')->where('id_prod_ajk', '=', $id_prod)->update($data_klaim);
        DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
        ->update([
          'sts_klaim'=>'1',
          'tgl_dok_lengkap'=>$request->tgl_dok_lengkap,
          ]);
        $response = array(
          'status' => 'success',
          'message' => 'Sukses Update Data',
        );
      }
      return response()->json($response);
    }else{
      $sts_klaim = 'ON PROSES';

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
      $edit= $request->except('no_sertifikat','no_kredit', 'debitur','tanggal_lahir', 'tanggal_akad', 'masa_kredit','plafon_pinjaman','premi','_token','id_prod_ajk','id_prod', 'tgl_lapor', 'tgl_kejadian','jenis_kredit','jns_klaim','jenis_klaim','sts_klaim', 'nilai_klaim','dibayar', 'tanggal_bayar', 'keterangan', 'namafile1','namafile2','namafile3','namafile4','namafile5','namafile6','namafile7','namafile8','namafile9','namafile10','namafile11','namafile12','namafile13','namafile14','namafile15');
      // dd();
      $id_prod = $request->id_prod_ajk;
      $edit['id_klaim_ajk'] = $id_prod;
    // dd(count($edit));
      if(count($edit)>1){
        $j = 0;
        foreach ($nameinput as $key) {
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
              $nama = $nama_dok.'_'.$l.'.'.$format;
              $image->move($path, $nama);  
              $data[] = $nama;
              $l++; 
            }
            $edit[$key] =json_encode($data);
            $data = null;
          }
          $j++;
        }

      // $klaimm = DB::table('klaim_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
      // if(count($klaimm)>0){
      //   DB::table('klaim_ajk')->where('id_prod_ajk', '=', $id_prod)->update($data_klaim);
      // }else{
        DB::table('klaim_ajk')->insert($data_klaim);
      // } 
        $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
        if(count($dok)>0){
          DB::table('dok_klaim')->where('id_klaim_ajk', '=', $id_prod)->update($edit);
        }else{
          DB::table('dok_klaim')->insert($edit);
        }
        DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
        ->update([
          'sts_klaim'=>'1',
          'posisi'=>1,
        ]);
        $response = array(
          'status' => 'success',
          'message' => 'Sukses Tambah Data',
        );

      }else{

       $dok = DB::table('dok_klaim')->where('id_klaim_ajk', '=', $request->id_prod_ajk)->get();
       if(count($dok)>0){
        DB::table('dok_klaim')->where('id_prod_ajk', '=', $id_prod)->update($edit);
      }else{
        DB::table('dok_klaim')->insert($edit);
      }
      DB::table('klaim_ajk')->insert($data_klaim);
      DB::table('produksi_ajk')->where('id_prod_ajk', '=', $id_prod)
      ->update([
        'sts_klaim'=>'1',
        'posisi'=>1,
      ]);

      $response = array(
        'status' => 'success',
        'message' => 'Suksesd Tambah Data',
      );
    }
    return response()->json($response);
  }

}
      //

  }
  
  public function addklaimnonpks(Request $request){
    $ceknopk = DB::table('produksi_ajk')->where('no_pk', $request->no_kredit)->first();
    $kode_client = Auth::user()->perusahaan;
    if($ceknopk == null){
      $idProduksi = DB::table('produksi_ajk')
      ->insertGetId([
        'no_polis'=>$request->no_sertifikat,
        'no_pk'=>$request->no_kredit,
        'kode_asu'=>$request->jenis_kredit,
        'kode_client'=>$kode_client,
        'debitur'=>$request->debitur,
        'tgl_lahir'=>date( 'Y-m-d', strtotime($request->tgl_lahir)),
        'tgl_awal'=>date( 'Y-m-d', strtotime($request->tgl_akad)),
        'tenor'=>$request->masa_kredit,
        'plafon'=>$request->plafon_pinjaman,
        'premi'=>$request->premi,
        'asuransi_bank'=>"NONAKTIF",
        'sts_polis'=>1,
        'sts_klaim'=>1,
        'sts_refund'=>0,
        'posisi'=>1,
      ]);
      
      $cekidprod = DB::table('produksi_ajk')->where('no_pk', $request->no_kredit)->first();
      DB::table('klaim_ajk')
      ->insert([
        'id_prod_ajk'=>$idProduksi,
        'tgl_lapor'=>date( 'Y-m-d', strtotime($request->tgl_lapor)),
        'tgl_kejadian'=>date( 'Y-m-d', strtotime($request->tgl_kejadian)),
        'jns_klaim'=>$request->jenis_klaim,
        'nilai_klaim'=>$request->nilai_klaim,
        'ket_klaim'=>$request->keterangan,
      ]);

      $response = array(
        'status' => 'success',
        'message' => 'Klaim Non Pks berhasil ditambahkan'
      );
      return response()->json($response);

    }else{
      $response = array(
        'status' => 'failed',
        'message' => 'No kredit Sudah Ada'
      );
      return response()->json($response);
      
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
          'posisi' => '1',
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
    $response = array(
      'status' => 'success',
      'message' => 'Data berhasil dikirim',
    );
    return response()->json($response);

  }

  public function compressImage($source_image, $compress_image) {
                // dd($source_image);
    $image_info = $compress_image->getClientOriginalExtension();
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
      $x = response()->download(storage_path('form_klaim/'.$value));

    }

    return $x;

  }

  public function downloadfileklaim($id_klaim_ajk){
    $dokumens = DB::table('dok_klaim',$id_klaim_ajk)->first();

      // $pin = $dokumens->no_pin;
    $path = storage_path('dataklaim\\'.$id_klaim_ajk);
    $contents = is_dir($path);
      // $contents = Storage::get($path);
    if($contents == true){
      Zipper::make($path.'.zip')->add($path)->close();
      return response()->download($path.'.zip');
    }else{
      $message = "Gagal Download File";
      $status = "failed";
      $response = array(
        'status' => $status,
        'message' =>$message);
      return response()->json($response);
    }

  }
  public function downloadfile($id_klaim_ajk, $namafile, $namafolder){
    $num_char=strlen($namafile);
    $cut_text = substr($namafile, 0, $num_char);
if ($namafile{$num_char - 1} != '') { // jika huruf ke 50 (50 - 1 karena index dimulai dari 0) buka  spasi
  $new_pos = strrpos($cut_text, '_'); // cari posisi spasi, pencarian dari huruf terakhir
  $cut_text = substr($namafile, 0, $new_pos);
}
      // dd($id_klaim_ajk, $namafile, $namafolder);
$dokumens = DB::table('dok_klaim',$id_klaim_ajk)->first();
      // $pin = $dokumens->no_pin;
$path=storage_path().'/dataklaim/'.$id_klaim_ajk.'/'.$cut_text;
// $file_path=storage_path().'dataklaim/'.$id_klaim_ajk.'/'.$cut_text.'/'.$namafile;
// $path= storage_path('dataklaim\\'.$id_klaim_ajk.'\\'.$cut_text);
      // $path = storage_path('dataklaim\\'.$id_klaim_ajk.'\\'.$cut_text.'\\');
$contents = is_dir($path);
      // dd($contents, $path);
      // $contents = Storage::get($path);
if($contents == true){
      // Zipper::make($path.'.zip')->add($path)->close();
  // $f = Storage::disk('dataklaim/'.$dataklaim.'/'.$cut_text)->url($namafile);
  // return Response::download($path, $namafile);
  return response()->download($path.'/'.$namafile);
}else{
  $message = "Gagal Download File";
  $status = "failed";
  $response = array(
    'status' => $status,
    'message' =>$message);
  return response()->json($response);
}

}

public function sendEmailUpdate($data, $pesan, $title){
  $pesan = "Isi pesan";
      // $body = array('name'=>"Sam Jose", "body" => "body nih");
  Mail::send(['html' => 'email.updaterequest'], $data, function($message) use ($pesan, $title){
    $message->to('juni.aldo@yahoo.co.id', 'Andrew')
    ->subject($title)
    ->setBody($pesan, 'text/plain');
    $message->from('junialdo017@gmail.com','Admin');
  });
}

public function sendEmailApprove($data, $pesan, $title){
  $pesan = "Isi pesan";
      // $body = array('name'=>"Sam Jose", "body" => "body nih");
  Mail::send(['html' => 'email.notifrequest'], $data, function($message) use ($pesan, $title){
    $message->to('juni.aldo@yahoo.co.id', 'Andrew')
    ->subject($title)
    ->setBody($pesan, 'text/plain');
    $message->from('junialdo017@gmail.com','Admin');
  });
}

public function detailklaim(Request $request){
  $idprod = $request->id_prod_ajk;
  $lastklaim = DB::table('klaim_ajk')->where('id_prod_ajk', $idprod)->get();
      // $postbyadmin = $lastklaim->tanggal_awal_laporan;
      // dd($lastklaim,$idprod);
  if(count($lastklaim)>0){
    $dokumensklaim = $lastklaim;
    $dokumens = DB::table('produksi_ajk')->where('id_prod_ajk', $idprod)->get();
    $cekdata = "ada"; 
    $status = true;
  }else{
    $dokumens = DB::table('produksi_ajk')->where('id_prod_ajk', $idprod)->get();
    $dokumensklaim =  "";
    $cekdata = "-"; 
    $status = true;

  }
  $asuransi = DB::table('asuransi')->where('kode_prod', $dokumens[0]->kode_prod)->get();
  $dok = DB::table('dok_klaim')->where('id_klaim_ajk', $idprod)->get();
  $dokumenfinancecabang = DB::table('client')->where('kode_client', $dokumens[0]->kode_client)->get();
      //$numday = new date($request->tgl_booking);
      //$tenorr = $dokumens->tenor;  
      // $tgl = $dokumens['tgl_booking'];  
      //$numdaydate = date('Y-m-d', strtotime("+3 months ", strtotime($numday)));

      //
      // $date = new Date($dokumens->tgl_booking);
      // $date->modify('+3 years');
      //$date = Carbon::createFromFormat('Y-m-d', $request->tgl_booking)->format('Y-m-d');
      // $tenor = (int)$dokumens[0]->tenor;
      // $enddate = date("Y-m-d", strtotime("+$tenor months", strtotime($dokumens[0]->tgl_booking))); 

  $response = array(
    'status' => $status,
    'cekdata' => $cekdata,
    'dokumens' => $dokumens,
    'dokumensklaim' => $dokumensklaim,
    'asuransie' => $asuransi,
    'dok' => $dok,
    'dokumenfinancecabangs' => $dokumenfinancecabang,
        // 'numdays' => $enddate,
  );
  return response()->json($response); 
}
}

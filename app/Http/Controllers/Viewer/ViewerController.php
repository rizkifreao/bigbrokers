<?php

namespace App\Http\Controllers\Viewer;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fpdf;
use Auth;
use App\TableProduksi;
use Excel;
use Redirect;
use View;
use Input;
use Carbon\Carbon;
use App\Klaim;
use DateTime;


class ViewerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function testing() {
    $data = Input::all();
    return $data;

  }

    // public function template(){
    //   // Set Page Size
    //   Fpdf::AddPage('L', 'A4');

    //   // Add Header Title
    //   $this->addHeaderDokumen("Rincian Daftar Peserta Asuransi Kredit" );

    //   // Add Periode Tanggal
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::SetFont('Arial', 'B', 6);
    //   Fpdf::Cell(0, 0, 'Periode : 07-02-2017 s/d 07-02-2018');
    //   Fpdf::Ln(2);

    //   Fpdf::Output('I',"S");
    // }


  public function index()
  {
    $user = Auth::user();
    $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
    $nama = $jenisuser->posisi;
    switch ($nama) {
      case 'Asuransi':
          // $broker = DB::table('broker')->where('kode_broker', $user->perusahaan)->get();
      $client = DB::table('client')->get();
      $mst_client = DB::table('mst_client')->get();
      $asuransi = DB::table('asuransi')->where('kode_asu',$user->perusahaan)->get();
      break;
      case 'Clients':
      $asuransi = DB::table('asuransi')->get();
      $mst_client = DB::table('mst_client')->where('kode_pusat',$user->perusahaan)->get();
      if(count($mst_client) >0 ){
        $client = DB::table('client')->where('kode_pusat',$user->perusahaan)->get();
      }else{
        $client = DB::table('client')->where('kode_client',$user->perusahaan)->get();
      }
          // if($user->kode_client == '' || $user->kode_client == null){
          // $client = DB::table('broker')->where('kode_broker', $user->perusahaan)->get();
              // $client = DB::table('client')->where('kode_pusat',$user->kode_pusat)->get();
          // }else{
          //     $client = DB::table('client')->where('kode_client',$user->kode_client)->get();
          // }
      break;
      default:
      $asuransi = DB::table('asuransi')->get();
          // $mst_client = DB::table('mst_client')->where('kode_pusat',$user->perusahaan)->get();
          // if(count($mst_client) >0 ){
          //   $client = DB::table('client')->where('kode_pusat',$user->perusahaan)->get();
          // }else{
          //   $client = DB::table('client')->where('kode_client',$user->perusahaan)->get();
          // }
          // dd($client);
      $client = DB::table('client')->get();
      $mst_client = DB::table('mst_client')->get();
      $broker = DB::table('broker')->where('kode_broker', $user->perusahaan)->get();
      break;
    }

      // $dokumens = DB::table('table_produksi')->get();
      // $leasing = DB::table('master_leasing')->get();
      // $leasing_cabang = DB::table('master_leasing_cabang')->get();
      // $clientpusat;
      // if(!empty($dokumens) && !empty($leasing)){
      // dd($user->posisi);
    return view ( 'Viewer/ViewerDokumenReport' ,[
          // 'dokumens' => $dokumens,
      'mst_client' => $mst_client,
      'asuransi' => $asuransi,
      'client' => $client,
      'user' => $user,
    ]
  );
      // }
      // return back();
  }

  public function reload(){
    $user = Auth::user();
    $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
    $posisiuser = $user->posisi;
    $kodeposisi = $user->perusahaan;

    if($posisiuser == 3){
      $whereCondition = [
        ['a.kode_asu', $kodeposisi],
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
        $whereCondition = [
          ['a.kode_client', 'KRH001'],
        ];
        $kode = 2;
      }else{
        $whereCondition = [
          ['a.kode_client', $kodeposisi],
        ];
        $kode = 3;
      }
    }else{
      $whereCondition = [
      ]; 
      $kode = 4;
    }

    if($kode == 2){
      $view = DB::table('produksi_ajk as a')
      ->select('a.*','b.nama as namaasuransi','c.nama as namaprod','d.nama as namaclient','e.nama as namaposisi','f.okupasi')
      ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
      ->leftjoin('jns_produksi as c','c.kode_prod','a.kode_prod')
      ->leftjoin('client as d','d.kode_client','a.kode_client')
      ->leftjoin('posisi_data as e','e.posisi','a.posisi')
      ->leftjoin('rate as f','f.kode_okup','a.kode_okup')
      ->whereIn('d.kode_client', $kode_client)
      ->get()->toArray();
    }else{
      $view = DB::table('produksi_ajk as a')
      ->select('a.*','b.nama as namaasuransi','c.nama as namaprod','d.nama as namaclient','e.nama as namaposisi','f.okupasi')
      ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
      ->leftjoin('jns_produksi as c','c.kode_prod','a.kode_prod')
      ->leftjoin('client as d','d.kode_client','a.kode_client')
      ->leftjoin('posisi_data as e','e.posisi','a.posisi')
      ->leftjoin('rate as f','f.kode_okup','a.kode_okup')
      ->where($whereCondition)
      ->get()->toArray();
    }
    
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

      public function reloadklaim()
      {
        // return datatables(DB::table('produksi_ajk'))
        //     // ->where('status_proses', 0))
        //     ->toJson();
        $user = Auth::user();
        $posisiuser = $user->posisi;
        $kodeposisi = $user->perusahaan;

        if($posisiuser == 3){
          $whereCondition = [
            ['produksi_ajk.kode_asu', $kodeposisi],
            ['produksi_ajk.sts_klaim', 1],
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
            $whereCondition = [
              ['produksi_ajk.sts_klaim', 1],
            ];
            $kode = 2;
          }else{
            $whereCondition = [
              ['produksi_ajk.kode_client', $kodeposisi],
              ['produksi_ajk.sts_klaim', 1],
            ];
            $kode = 3;
          }
        }else{
          $whereCondition = [
            ['produksi_ajk.sts_klaim', 1],
          ]; 
          $kode = 4;
        }


        if($kode == 2){
          $klaim = DB::table('klaim_ajk')
          ->select('klaim_ajk.*','produksi_ajk.*','klaim_ajk.tgl_bayar as tglbayar','asuransi.kode_asu','asuransi.kode_broker','jns_produksi.kode_prod','asuransi.polis_induk','asuransi.nama as nama',
          'klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar','jns_produksi.nama as namaprod','client.nama as namaclient','posisi_data.nama as namaposisi','produksi_ajk.kode_asu as namaasuransi')
          ->leftjoin('produksi_ajk', 'produksi_ajk.id_prod_ajk', '=', 'klaim_ajk.id_prod_ajk')
          ->leftJoin('asuransi', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
          ->leftJoin('jns_produksi', 'jns_produksi.kode_prod', '=', 'asuransi.kode_prod')
          ->leftJoin('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
          ->leftJoin('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
          ->whereIn('produksi_ajk.kode_client', $kode_client)
          ->where($whereCondition)
          ->get()->toArray();
        }else{
        // dd($whereCondition);
          $klaim = DB::table('klaim_ajk')
    // ->leftJoin('produksi_ajk', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
    // ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    // ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    // ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
          ->select('klaim_ajk.*','produksi_ajk.*','klaim_ajk.tgl_bayar as tglbayar','asuransi.kode_asu','asuransi.kode_broker','jns_produksi.kode_prod','asuransi.polis_induk','asuransi.nama as nama',
          'klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar','jns_produksi.nama as namaprod','client.nama as namaclient','posisi_data.nama as namaposisi', 'produksi_ajk.kode_asu as namaasuransi')
          ->leftjoin('produksi_ajk', 'produksi_ajk.id_prod_ajk', '=', 'klaim_ajk.id_prod_ajk')
          ->leftJoin('asuransi', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
          ->leftJoin('jns_produksi', 'jns_produksi.kode_prod', '=', 'asuransi.kode_prod')
          ->leftJoin('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
          ->leftJoin('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
          ->where($whereCondition)
          ->get();
        }
    if(is_array($klaim)){
        foreach ($klaim as $key => $value) {
        # code...
          $tAkad = $klaim[$key]->tgl_awal;
          $tKejadian = $klaim[$key]->tgl_kejadian;
          $tLapor = $klaim[$key]->tgl_lapor;
          $tDok = $klaim[$key]->tgl_dok_lengkap;
          if($tAkad == null || $tKejadian == null){
            $totalhari1 = '-';  
          }else{
            $totalhari1 = $this->hitung($tAkad, $tKejadian);  
          }
          if($tKejadian == null || $tLapor == null){
            $totalhari2 = '-';
          }else{
            $totalhari2 = $this->hitung($tKejadian, $tLapor);  
          }
          if($tLapor == null || $tDok == null){
            $totalhari3 = '-';
          }else{
            $totalhari3 = $this->hitung($tLapor, $tDok);  
        }

        if($klaim[$key]->nama == null){
          $klaim[$key]->nama= $klaim[$key]->namaasuransi;
        }
        // $totalhari4 = $this->hitung($tDok, $t);  
      // dd($totalhari1, $totalhari2, $totalhari3);
      // $dokumens = 
      // $y[$key2] = $value2;
      // dd($jns_produksi);
      $dokumen = [
        // $asuransi,
        'x1' => $totalhari1,
        'x1' => $totalhari1,
        'x2' => $totalhari2,
        'x3' => $totalhari3,
      ];
      foreach ($value as $key2 => $value2) {
        $y[$key2] = $value2;
      }
      $klaimm []= array_merge($y,$dokumen);
    }
  }else{
    $klaimm = $klaim;
  }
    return datatables($klaimm)->toJson();

  }

  public function getklaim($start, $end,$whereCondition)
  {
        // return datatables(DB::table('produksi_ajk'))
        //     // ->where('status_proses', 0))
        //     ->toJson();
    $user = Auth::user();
    $posisiuser = $user->posisi;
    $kodeposisi = $user->perusahaan;

    $klaim = DB::table('klaim_ajk')
    ->select('klaim_ajk.*','produksi_ajk.*','klaim_ajk.tgl_bayar as tglbayar','asuransi.kode_asu','asuransi.kode_broker','jns_produksi.kode_prod','asuransi.polis_induk','asuransi.nama as nama',
    'klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar','jns_produksi.nama as namaprod','client.nama as namaclient','posisi_data.nama as namaposisi', 'produksi_ajk.kode_asu as namaasuransi')
    ->leftjoin('produksi_ajk', 'produksi_ajk.id_prod_ajk', '=', 'klaim_ajk.id_prod_ajk')
    ->leftJoin('asuransi', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
    ->leftJoin('jns_produksi', 'jns_produksi.kode_prod', '=', 'asuransi.kode_prod')
    ->leftJoin('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    ->leftJoin('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->whereBetween('klaim_ajk.tgl_lapor', array($start, $end))
    ->where($whereCondition)
    ->get()->toArray();
    // dd($klaim);
    $t = $this->is_array_empty($klaim);
    if($t == true){

      foreach ($klaim as $key => $value) {
        # code...
        $tAkad = $klaim[$key]->tgl_awal;
        $tKejadian = $klaim[$key]->tgl_kejadian;
        $tLapor = $klaim[$key]->tgl_lapor;
        $tDok = $klaim[$key]->tgl_dok_lengkap;
        if($tAkad == null || $tKejadian == null){
          $totalhari1 = '-';  
        }else{
          $totalhari1 = $this->hitung($tAkad, $tKejadian);  
        }
        if($tKejadian == null || $tLapor == null){
          $totalhari2 = '-';
        }else{
          $totalhari2 = $this->hitung($tKejadian, $tLapor);  
        }
        if($tLapor == null || $tDok == null){
          $totalhari3 = '-';
        }else{
          $totalhari3 = $this->hitung($tLapor, $tDok);  
      }
      
      if($klaim[$key]->nama == null){
        $klaim[$key]->nama= $klaim[$key]->namaasuransi;
      }
      // $totalhari4 = $this->hitung($tDok, $t);  
      // dd($totalhari1, $totalhari2, $totalhari3);
      // $dokumens = 
      // $y[$key2] = $value2;
      // dd($jns_produksi);
      $dokumen = [
        // $asuransi,
        
        'x1' => $totalhari1,
        'x1' => $totalhari1,
        'x2' => $totalhari2,
        'x3' => $totalhari3,
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
  return $view;

}
public function getrefund($start, $end,$whereCondition)
{
  $user = Auth::user();
  $posisiuser = $user->posisi;
  $kodeposisi = $user->perusahaan;

  // $klaim = DB::table('refund')
  // ->select('produksi_ajk.*','refund.*','refund.sts_refund as stsrefund','refund.tgl_bayar as tglbayar',  'asuransi.*','jns_produksi.nama as namaprod','client.nama as namaclient','client.kode_pusat','posisi_data.nama as namaposisi')
  // ->leftJoin('produksi_ajk', 'produksi_ajk.id_prod_ajk', '=', 'refund.id_prod_ajk')
  //   ->leftJoin('asuransi', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
  //   ->leftJoin('jns_produksi', 'jns_produksi.kode_prod', '=', 'asuransi.kode_prod')
  //   ->leftjoin('posisi_data', 'posisi_data.posisi', '=', 'produksi_ajk.posisi')
  //   ->leftjoin('client', 'client.kode_client', '=', 'produksi_ajk.kode_client')
  // ->whereBetween('refund.tgl_lapor', array($start, $end))
  // ->where($whereCondition)
  // ->get()->toArray();

  $refund = DB::table('refund as a')
            ->select('a.id_refund','b.no_polis','c.nama as namaasuransi','d.nama as namaprod','b.kode_okup',
                    'b.no_pk','f.nama as namacabang','b.debitur','b.pekerjaan','b.tgl_lahir','b.umur','b.tgl_awal','b.tgl_akhir',
                    'b.tenor','b.rate','b.plafon','b.premi','a.tgl_lapor','b.tgl_pelunasan','a.nilai_refund','a.tgl_bayar','a.dibayar','a.keterangan'
                    ,'g.okupasi'
                    )
            ->leftJoin('produksi_ajk as b', 'b.id_prod_ajk', '=', 'a.id_prod_ajk')
            ->leftJoin('asuransi as c', 'c.kode_asu', '=', 'b.kode_asu')
            ->leftJoin('jns_produksi as d', 'd.kode_prod', '=', 'c.kode_prod')
            ->leftJoin('posisi_data as e', 'e.posisi', '=', 'b.posisi')
            ->leftJoin('client as f', 'f.kode_client', '=', 'b.kode_client')
            ->leftJoin('rate as g', 'g.kode_okup', '=', 'b.kode_okup')
            ->whereBetween('a.tgl_lapor', array($start, $end))
            ->where($whereCondition)
            // ->whereBetween('tgl_aksep', array($start, $end))
            ->get()->toArray();
  return $refund;

}

public function getklaimviewer($whereCondition, $start, $end)
{
        // return datatables(DB::table('produksi_ajk'))
        //     // ->where('status_proses', 0))
        //     ->toJson();
  $user = Auth::user();
  $posisiuser = $user->posisi;
  $kodeposisi = $user->perusahaan;

  $klaim = DB::table('klaim_ajk')
  ->select('klaim_ajk.*','produksi_ajk.*','klaim_ajk.tgl_bayar as tglbayar','asuransi.kode_asu','asuransi.kode_broker','jns_produksi.kode_prod','asuransi.polis_induk','asuransi.nama as nama',
    'klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar','jns_produksi.nama as namaprod','client.nama as namaclient','posisi_data.nama as namaposisi', 'produksi_ajk.kode_asu as namaasuransi')
    ->leftjoin('produksi_ajk', 'produksi_ajk.id_prod_ajk', '=', 'klaim_ajk.id_prod_ajk')
    ->leftJoin('asuransi', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
    ->leftJoin('jns_produksi', 'jns_produksi.kode_prod', '=', 'asuransi.kode_prod')
    ->leftJoin('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    ->leftJoin('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
  ->whereBetween('klaim_ajk.tgl_lapor', array($start, $end))
  ->where($whereCondition)
  ->get();

  if(count($klaim)>0){
  foreach ($klaim as $key => $value) {
    $tAkad = $klaim[$key]->tgl_awal;
    $tKejadian = $klaim[$key]->tgl_kejadian;
    $tLapor = $klaim[$key]->tgl_lapor;
    $tDok = $klaim[$key]->tgl_dok_lengkap;
    if($tAkad == null || $tKejadian == null){
      $totalhari1 = '-';  
    }else{
      $totalhari1 = $this->hitung($tAkad, $tKejadian);  
    }
    if($tKejadian == null || $tLapor == null){
      $totalhari2 = '-';
    }else{
      $totalhari2 = $this->hitung($tKejadian, $tLapor);  
    }
    if($tLapor == null || $tDok == null){
      $totalhari3 = '-';
    }else{
      $totalhari3 = $this->hitung($tLapor, $tDok);  
    }
    if($klaim[$key]->nama == null){
      $klaim[$key]->nama= $klaim[$key]->namaasuransi;
    }
    // $totalhari4 = $this->hitung($tDok, $t);  
      // dd($totalhari1, $totalhari2, $totalhari3);
      // $dokumens = 
      // $y[$key2] = $value2;
      // dd($jns_produksi);
      $dokumen = [
        // $asuransi,
        'x1' => $totalhari1,
        'x1' => $totalhari1,
        'x2' => $totalhari2,
        'x3' => $totalhari3,
      ];
      foreach ($value as $key2 => $value2) {
        $y[$key2] = $value2;
      }
      $klaimm []= array_merge($y,$dokumen);
    }

      return $klaimm;
    }else{
      return $x = [];
    }
  }

  public function getRefundviewer($whereCondition, $start, $end)
  {
        // return datatables(DB::table('produksi_ajk'))
        //     // ->where('status_proses', 0))
        //     ->toJson();
    $user = Auth::user();
    $posisiuser = $user->posisi;
    $kodeposisi = $user->perusahaan;

    $klaim = DB::table('refund')
    ->join('produksi_ajk', 'refund.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    // ->leftJoin('produksi_ajk', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
    // ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    // ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    // ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->select('refund.*','produksi_ajk.*','refund.sts_refund as stsrefund','refund.tgl_bayar as tglbayar')
    ->whereBetween('refund.tgl_lapor', array($start, $end))
    ->where($whereCondition)
    ->get();
    // dd($klaim);
    foreach ($klaim as $key => $value) {
      $asuransi = DB::table('asuransi')->where('kode_prod', $value->kode_prod)->first();
        // $asuransis[] = $asuransi;
        // dd($asuransi->kode_prod);
      $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $value->kode_prod)->first();
      $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
      $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
      // dd($client);
        # code...
      // $tAkad = $klaim[$key]->tgl_awal;
      // $tKejadian = $klaim[$key]->tgl_kejadian;
      // $tLapor = $klaim[$key]->tgl_lapor;
      // $tDok = $klaim[$key]->tgl_dok_lengkap;
      // if($tAkad == null || $tKejadian == null){
      // $totalhari1 = '-';  
      // }else{
      // $totalhari1 = $this->hitung($tAkad, $tKejadian);  
      // }
      // if($tKejadian == null || $tLapor == null){
      //   $totalhari2 = '-';
      // }else{
      // $totalhari2 = $this->hitung($tKejadian, $tLapor);  
      // }
      // if($tLapor == null || $tDok == null){
      // $totalhari3 = '-';
      // }else{
      // $totalhari3 = $this->hitung($tLapor, $tDok);  
      // }// $totalhari4 = $this->hitung($tDok, $t);  
      // dd($totalhari1, $totalhari2, $totalhari3);
      // $dokumens = 
      // $y[$key2] = $value2;
      // dd($jns_produksi);
      $dokumen = [
        // $asuransi,
        'kode_asu' => $asuransi->kode_asu,
        'kode_broker' => $asuransi->kode_broker,
        'kode_prod' => $asuransi->kode_prod,
        'polis_induk' => $asuransi->polis_induk,
        'nama' => $asuransi->nama,
        'stsrefund' => $value->stsrefund,
        'tglbayar' => $value->tgl_bayar,
        'namaprod' => $jns_produksi->nama,
        'namaclient' => $client->nama,
        'namaposisi' => $posisi_data->nama,
        'tglbayar' => $value->tglbayar,
        // 'x1' => $totalhari1,
        // 'x1' => $totalhari1,
        // 'x2' => $totalhari2,
        // 'x3' => $totalhari3,
      ];
      foreach ($value as $key2 => $value2) {
        $y[$key2] = $value2;
      }
      $klaimm []= array_merge($y,$dokumen);
    }

    return $klaimm;

  }

  public function hitung($tA, $tL) {
    if($tA != null || $tL != null){
      $start = new DateTime($tA);
      $end = new DateTime($tL);
      $interval = $start->diff($end);
      return $interval->days;
    }else{
      $interval = '-';
      return $interval;
    }  

    // list($day, $month, $year) = explode("-",$tanggal_lahir);
    // list($day2, $month2, $year2) = explode("-",$tanggal_akad);
    // return $year_diff  = $year2 - $year;
  }

  public function reloadbydate($tgl_awal, $tgl_akhir, $jns_asuransi, $jns_client)
  {
    $start = date( 'Y-m-d', strtotime($tgl_awal));
    $end = date( 'Y-m-d', strtotime($tgl_akhir));
    $whereCondition = $this->getWhereCondition($jns_asuransi, $jns_client);

    $produk = DB::table('produksi_ajk as a')
      ->select('a.*','b.nama','c.nama as namaprod','d.nama as namaclient','e.nama as namaposisi','a.tgl_bayar as tglbayar', 'a.sts_klaim as stsklaim','f.okupasi','b.nama as namaasuransi')
      ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
      ->leftjoin('jns_produksi as c','c.kode_prod','b.kode_prod')
      ->leftjoin('client as d','d.kode_client','a.kode_client')
      ->leftjoin('posisi_data as e','e.posisi','a.posisi')
      ->leftjoin('rate as f','f.kode_okup','a.kode_okup')
      ->whereBetween('a.tgl_upload', array($start, $end))
      ->where($whereCondition)
      ->get()->toArray();

      
    return datatables($produk)->toJson();
  }

  public function getWhereCondition($jns_asuransi, $jns_client){
    if($jns_asuransi == "all_asuransi" && $jns_client != "all_client"){
      $whereCondition = [
        ['a.kode_client', $jns_client],
      ];
    } elseif ($jns_asuransi != "all_asuransi" && $jns_client != "all_client"){
      $whereCondition = [
        ['a.kode_asu', $jns_asuransi],
        ['a.kode_client', $jns_client],
      ];
    } elseif ($jns_asuransi != "all_asuransi" && $jns_client == "all_client"){
      $whereCondition = [
        ['a.kode_asu', $jns_asuransi],
      ];
    } else {
      $whereCondition = [
      ];
    }
    return $whereCondition;
  }
  public function reloadKlaimByDate($tgl_awal, $tgl_akhir, $jns_asuransi, $jns_client)
  {
    $start = date( 'Y-m-d', strtotime($tgl_awal));
    $end = date( 'Y-m-d', strtotime($tgl_akhir));
    $whereCondition = $this->getWhereCondition2($jns_asuransi, $jns_client);
    $klaimm = $this->getklaim($start, $end,$whereCondition);

    return datatables($klaimm)->toJson();
  }

  public function reloadRefundByDate($tgl_awal, $tgl_akhir, $jns_asuransi, $jns_client)
  {
    $start = date( 'Y-m-d', strtotime($tgl_awal));
    $end = date( 'Y-m-d', strtotime($tgl_akhir));
    $whereCondition = $this->getWhereCondition3($jns_asuransi, $jns_client);
    $klaimm = $this->getrefund($start, $end,$whereCondition);

    return datatables($klaimm)->toJson();
  }
  

  public function getWhereCondition2($jns_asuransi, $jns_client){
    if($jns_asuransi == "-" && $jns_client != "all_client"){
      $whereCondition = [
        ['produksi_ajk.asuransi_bank', 'NONAKTIF'],
        ['produksi_ajk.kode_client', $jns_client],
        ['produksi_ajk.sts_klaim', 1],

      ];
    }elseif($jns_asuransi == "-" && $jns_client == "all_client"){
      $whereCondition = [
        ['produksi_ajk.asuransi_bank', 'NONAKTIF'],
        ['produksi_ajk.sts_klaim', 1],

      ];
    }elseif($jns_asuransi == "all_asuransi" && $jns_client != "all_client"){
      $whereCondition = [
        ['produksi_ajk.kode_client', $jns_client],
        ['produksi_ajk.sts_klaim', 1],

      ];
    } elseif ($jns_asuransi != "all_asuransi" && $jns_client != "all_client"){
      $whereCondition = [
        ['produksi_ajk.kode_asu', $jns_asuransi],
        ['produksi_ajk.kode_client', $jns_client],
        ['produksi_ajk.sts_klaim', 1],
      ];
    } elseif ($jns_asuransi != "all_asuransi" && $jns_client == "all_client"){
      $whereCondition = [
        ['produksi_ajk.kode_asu', $jns_asuransi],
        ['produksi_ajk.sts_klaim', 1],
      ];
    } else {
      $whereCondition = [
        ['produksi_ajk.sts_klaim', 1],
      ];
    }
    return $whereCondition;
  }
  public function getWhereCondition3($jns_asuransi, $jns_client){
    if($jns_asuransi == "all_asuransi" && $jns_client != "all_client"){
      $whereCondition = [
        ['b.kode_client', $jns_client],
        ['b.sts_refund', 1],

      ];
    } elseif ($jns_asuransi != "all_asuransi" && $jns_client != "all_client"){
      $whereCondition = [
        ['b.kode_asu', $jns_asuransi],
        ['b.kode_client', $jns_client],
        ['b.sts_refund', 1],
      ];
    } elseif ($jns_asuransi != "all_asuransi" && $jns_client == "all_client"){
      $whereCondition = [
        ['b.kode_asu', $jns_asuransi],
        ['b.sts_refund', 1],
      ];
    } else {
      $whereCondition = [
        ['b.sts_refund', 1],
      ];
    }

    return $whereCondition;
  }
    // public function reloadklaim(){
    //   // $cabang = DB::table('table_klaim')->get();
    //   // return datatables(DB::table('table_produksi')->where('no_pin', $cabang[0]->no_pin)->get())->toJson();

    //   $klaim = DB::table('table_klaim')
    //             ->join('table_produksi', 'table_klaim.no_pin', '=', 'table_produksi.no_pin')
    //             ->select('table_klaim.*','table_produksi.*')
    //             ->where([
    //                       ['tanggal_approve_klaim','!=', null],
    //                       ['tanggal_awal_laporan_ke_asuransi', '!=', null],
    //                     ])
    //             ->get();
    //   return datatables($klaim)->toJson();
    // }

  public function cetaklaporann($tgl_awal, $tgl_akhir, $jns_asuransi, $jns_bank, $jns_periode){

  }

    // public function reloadByDatee($startDate, $endDate, $id_asuransi, $id_leasing)
    // {
    //   $subsStartDate = substr_replace($startDate, '/', 2, 0);
    //   $subsStartDate2 = substr_replace($subsStartDate, '/', 5, 0);

    //   $subsEndDate = substr_replace($endDate, '/', 2, 0);
    //   $subsEndDate2 = substr_replace($subsEndDate, '/', 5, 0);

    //   $start = date( 'Y-m-d', strtotime($subsStartDate2) );
    //   $end = date( 'Y-m-d', strtotime($subsEndDate2) );

    //   if ( $id_asuransi != 'all_asuransi') {
    //     $data = TableProduksi::whereBetween('tgl_booking', array($start, $end))
    //     ->where([
    //       ['id_master_leasing' , $id_leasing],
    //       ['id_master_asuransi' , $id_asuransi],
    //     ])
    //     ->get()->toArray();
    //   } else {
    //     $data = TableProduksi::whereBetween('tgl_booking', array($start, $end))
    //     ->get()->toArray();
    //   }

    //   return datatables($data)->toJson();
    // }

    // public function reloadKlaimByDate($startDate, $endDate, $id_asuransi, $id_leasing)
    // {
    //   $subsStartDate = substr_replace($startDate, '/', 2, 0);
    //   $subsStartDate2 = substr_replace($subsStartDate, '/', 5, 0);

    //   $subsEndDate = substr_replace($endDate, '/', 2, 0);
    //   $subsEndDate2 = substr_replace($subsEndDate, '/', 5, 0);

    //   $start = date( 'Y-m-d', strtotime($subsStartDate2) );
    //   $end = date( 'Y-m-d', strtotime($subsEndDate2) );

    //   if($id_asuransi == "all_asuransi" && $id_leasing != "all_leasing"){
    //       $whereCondition = [
    //         ['id_master_leasing', $id_leasing],
    //         ['tanggal_approve_klaim','!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi','!=', null],
    //       ];
    //     } elseif ($id_asuransi != "all_asuransi" && $id_leasing == "all_leasing"){
    //       $whereCondition = [
    //         ['id_master_asuransi', $id_asuransi],
    //         ['tanggal_approve_klaim','!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi','!=', null],
    //       ];
    //     } elseif ($id_asuransi != "all_asuransi" && $id_leasing != "all_leasing"){
    //       $whereCondition = [
    //         ['id_master_asuransi', $id_asuransi],
    //         ['id_master_leasing', $id_leasing],
    //         ['tanggal_approve_klaim','!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi','!=', null],
    //       ];
    //     } else {
    //       $whereCondition = [
    //         ['tanggal_approve_klaim','!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi','!=', null],
    //       ];


    //     }

    //   $data = DB::table('table_klaim')
    //             ->join('table_produksi', 'table_klaim.no_pin', '=', 'table_produksi.no_pin')
    //             ->select('table_klaim.*','table_produksi.*')
    //             ->where($whereCondition)
    //             ->whereBetween('tanggal_awal_laporan_ke_asuransi', array($start, $end))
    //             ->get();

    //   return datatables($data)->toJson();
    //   // $whereData = 
    //   //             [
    //   //               ['tanggal_awal_laporan', '!=', null],
    //   //             ];
    //   // $klaim = Klaim::join('table_produksi', 'table_klaim.no_pin', '=', 'table_produksi.no_pin');
    //   // $dataawallapor = $klaim->where($whereData)->first();
    //   // return datatables($dataawallapor)->toJson();
    // }


   //  public function downloadExcel($type, $startDate, $endDate, $id_asuransi, $periode, $jenisPenutupan)
  	// {
   //    # code...
   //    $subsStartDate = substr_replace($startDate, '/', 2, 0);
   //    $subsStartDate2 = substr_replace($subsStartDate, '/', 5, 0);

   //    $subsEndDate = substr_replace($endDate, '/', 2, 0);
   //    $subsEndDate2 = substr_replace($subsEndDate, '/', 5, 0);

   //    $start = date( 'Y-m-d', strtotime($subsStartDate2) );
   //    $end = date( 'Y-m-d', strtotime($subsEndDate2) );

   //    $data = null;
   //    if ($periode == 'produksi' && $id_asuransi != "all_asuransi") {

   //      switch ($jenisPenutupan) {
   //        case 'rekapAsuransi':
   //          # code...
   //          break;
   //        case 'rekapLeasing':
   //          # code...
   //          break;
   //        case 'rincianAsuransi':
   //          # code...
   //          $data = TableProduksi::select(
   //            'id_prod','no_pin','cabang','nama_nasabah','plafon',
   //            'tgl_booking','merk','tipe','model_kend','no_rangka','no_mesin',
   //            'no_polisi','no_bpkb','warna', 'tahun','tenor',
   //            'rate','premi','jenis_kendaraan',
   //            'wilayah')
   //          ->where('id_master_asuransi', $id_asuransi)
   //          ->whereBetween('tgl_booking', array($start, $end))
   //          ->get()
   //          ->toArray();

   //          break;
   //        case 'rincianLeasing':
   //          # code...
   //          break;
   //        case 'rekapProduksi':
   //          # code...
   //          $data = TableProduksi::select(
   //            'id_prod','no_pin','cabang','nama_nasabah','plafon',
   //            'tgl_booking','merk','tipe','model_kend','no_rangka','no_mesin',
   //            'no_polisi','no_bpkb','warna', 'tahun','tenor',
   //            'rate','premi','jenis_kendaraan',
   //            'wilayah')
   //          ->where('id_master_asuransi', $id_asuransi)
   //          ->whereBetween('tgl_booking', array($start, $end))
   //          ->get()
   //          ->toArray();

   //          break;
   //        default:
   //          # code...
   //          break;
   //      }
   //    } else{
   //      $data = TableProduksi::select(
   //        'id_prod','no_pin','cabang','nama_nasabah','plafon',
   //        'tgl_booking','merk','tipe','model_kend','no_rangka','no_mesin',
   //        'no_polisi','no_bpkb','warna', 'tahun','tenor',
   //        'rate','premi','jenis_kendaraan',
   //        'wilayah')
   //      ->whereBetween('tgl_booking', array($start, $end))
   //      ->get()
   //      ->toArray();
   //    }

  	// 	return Excel::create('data-report-asuransi', function($excel) use ($data) {
  	// 		$excel->sheet('Sheet 1', function($sheet) use ($data)
  	//         {
  	// 			$sheet->fromArray($data);
  	//         });
  	// 	})->setFilename($subsStartDate2.' s/d '.$subsEndDate2)
   //    ->download($type);

  	// }

  public function array_group_by(array $arr, callable $key_selector) {
    $result = array();
    foreach ($arr as $i) {
      $key = call_user_func($key_selector, $i);
      $result[$key][] = $i;

    }  
    return $result;
  }

  public function cetaklaporan($tgl_awal, $tgl_akhir, $jns_asuransi, $jns_bank, $jenis_produksi)
  {
    $start = date( 'Y-m-d', strtotime($tgl_awal));
    $end = date( 'Y-m-d', strtotime($tgl_akhir));
    $whereCondition = $this->getWhereCondition($jns_asuransi, $jns_bank);


    // dd($produk, $asuransi_ls1, $asuransi_ls2);
      // dd($jns_asuransi, $jns_bank, $jenis_produksi);
          // dd($whereCondition);        
    switch ($jenis_produksi) {
      case 'rekapAsuransi':
            # code...
      $produk = DB::table('produksi_ajk as a')
      ->select('a.*','b.nama as namaprod' ,'d.nama as namaclient','e.nama_wilayah')
      ->leftjoin('asuransi as b', 'b.kode_asu','a.kode_asu')
      ->leftjoin('jns_produksi as c', 'c.kode_prod','b.kode_prod')
      ->leftjoin('client as d','d.kode_client','a.kode_client')
      ->leftjoin('wilayah as e','e.wil','d.wil')
      ->whereBetween('a.tgl_upload', array($start, $end))
      ->where($whereCondition)
      ->where('a.kode_asu',"!=", null)              
      ->get();
      // dd($produk);
      $grouped = array();
      if(!empty($produk)){
        foreach ($produk as $key => $value) {
            $grouped[$value->namaprod.'-'.$value->nama_wilayah][] = $value;
        }  
      }
        // $groupedd = $this->array_group_by($grouped, function($i){  return $i[]; }); 
        // foreach ($grouped as $key => $valure) {
        // $groupedd = $this->array_group_by($valure, function($i){  return $i[5]; });  

        //  } 
      // dd($groupedd);
      $header1 ="Summary Laporan PerAsuransi";
      $header2 ="Asuransi Jiwa Kredit";
      $nama  = "Nama Asuransi";
      $nama2  = "CABANG";
      $this->templateRekapAsuransi($grouped,$tgl_awal, $tgl_akhir, $header1, $header2, $nama, $nama2);
          // }else
          // {
          //   $response = array(
          //       'status' => 'maaf',
          //       'message' => 'data tidak ada',
          //   );
          //   return response()->json($response);
          // }
      break;

      case 'rekapLeasing':
            # code...
      break;
      case 'rincianAsuransi':
            # code...
       $produk = DB::table('produksi_ajk as a')
            ->select('a.*','b.nama as namaprod' ,'d.nama as namaclient','e.nama_wilayah')
            ->leftjoin('asuransi as b', 'b.kode_asu','a.kode_asu')
            ->leftjoin('jns_produksi as c', 'c.kode_prod','b.kode_prod')
            ->leftjoin('client as d','d.kode_client','a.kode_client')
            ->leftjoin('wilayah as e','e.wil','d.wil')
            ->whereBetween('a.tgl_upload', array($start, $end))
            ->where($whereCondition)              
            ->get();
      
        $grouped = array();
        if(!empty($produk)){
          foreach ($produk as $key => $value) {
              $grouped[$value->namaprod.'-'.$value->nama_wilayah][] = $value;
          }  
        } 
            
            $header1 = "Rincian Daftar Peserta Asuransi Kredit";
            $header2 = "PerAsuransi";
            $nama  = "Nama Asuransi";
            $nama2  = "BANK";
            $this->templateDokumen($grouped,$tgl_awal, $tgl_akhir, $header1, $header2, $nama, $nama2);
      break;
      case 'rincianClient':
            # code...
          // dd($whereCondition);
       $produk = DB::table('produksi_ajk as a')
          ->select('a.*','b.nama as namaprod' ,'d.nama as namaclient','e.nama_wilayah')
          ->leftjoin('asuransi as b', 'b.kode_asu','a.kode_asu')
          ->leftjoin('jns_produksi as c', 'c.kode_prod','b.kode_prod')
          ->leftjoin('client as d','d.kode_client','a.kode_client')
	  ->leftjoin('wilayah as e','e.wil','d.wil')
          ->whereBetween('a.tgl_upload', array($start, $end))
          ->where($whereCondition)
          ->get();
        
        $grouped = array();
        if(!empty($produk)){
          foreach ($produk as $key => $value) {
              $grouped[$value->namaclient.'-'.$value->nama_wilayah][] = $value;
          }  
        }

        $header1 = "Rincian Daftar Peserta Asuransi Kredit";
        $header2 = "PerBank";
        $nama  = "Nama Bank";
        $nama2  = "ASURANSI";
        $this->templateDokumen($grouped,$tgl_awal, $tgl_akhir, $header1, $header2, $nama, $nama2);
      break;
      case 'rekapClient':
            # code...
      $produk = DB::table('produksi_ajk as a')
      ->select('a.*','b.nama as namaprod' ,'d.nama as namaclient','e.nama_wilayah')
      ->leftjoin('asuransi as b', 'b.kode_asu','a.kode_asu')
      ->leftjoin('jns_produksi as c', 'c.kode_prod','b.kode_prod')
      ->leftjoin('client as d','d.kode_client','a.kode_client')
      ->leftjoin('wilayah as e','e.wil','d.wil')
      ->whereBetween('a.tgl_upload', array($start, $end))
      ->where($whereCondition) 
      ->where('a.kode_asu',"!=", null)             
      ->get();

      $grouped = array();
      if(!empty($produk)){
        foreach ($produk as $key => $value) {
            $grouped[$value->namaclient.'-'.$value->nama_wilayah][] = $value;
        }  
      }

      $header1 = "Sumary Laporan PerBank";
      $header2 = "Asuransi Jiwa Kredit";
      $nama  = "Nama Bank";
      $nama2  = "ASURANSI";
      
      $this->templateRekapAsuransi($grouped,$tgl_awal, $tgl_akhir, $header1, $header2, $nama, $nama2);
      break;
      default:
            # code...
      break;
    }
      // }

      // return back();

  }

  public function cetaklaporanrekon($tgl_awal, $tgl_akhir, $jns_bank, $sts_rekon)
  {
    $start = date( 'Y-m-d', strtotime($tgl_awal));
    $end = date( 'Y-m-d', strtotime($tgl_akhir));
    $whereCondition = $this->getWhereConditionRekon($jns_bank, $sts_rekon);

    $produk = DB::table('produksi_ajk')
  ->whereBetween('produksi_ajk.tgl_bayar', array($start, $end))
  ->where($whereCondition)
  ->get();
  // dd($produk);
    if(count($produk)>0){
  foreach ($produk as $key => $value) {
    $asuransi = DB::table('asuransi')->where('kode_prod', $value->kode_prod)->first();
      // $asuransis[] = $asuransi;
    $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $asuransi->kode_prod)->first();
    $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
    $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
      // dd($client);
        # code...
    $premi =0;
    $preminet = 0;
    $selisih = 0;
    $premi = $produk[$key]->premi;
    $bayar = $produk[$key]->bayar;
    $selisih = $premi - $bayar;
      $dokumen = [
        // $asuransi,
        'kode_asu' => $asuransi->kode_asu,
        'kode_broker' => $asuransi->kode_broker,
        'kode_prod' => $asuransi->kode_prod,
        'polis_induk' => $asuransi->polis_induk,
        'nama' => $asuransi->nama,
        // 'stsklaim' => $value->stsklaim,
        // 'tglbayar' => $value->tgl_bayar,
        'namaprod' => $jns_produksi->nama,
        'namaclient' => $client->nama,
        'namaposisi' => $posisi_data->nama,
        // 'tglbayar' => $value->tglbayar,
        'selisih' => $selisih,
        // 'x1' => $totalhari1,
        // 'x2' => $totalhari2,
        // 'x3' => $totalhari3,
      ];
      foreach ($value as $key2 => $value2) {
        $y[$key2] = $value2;
      }
      $klaimm []= array_merge($y,$dokumen);
    }

      $rekon =  $klaimm;
    }else{
      $rekon = [];
    }

    $this->RincianRekon($rekon, $start, $end, $jns_bank);

    
}

public function getWhereConditionRekon($jns_bank, $sts_rekon){
  if($jns_bank == "all_bank" && $sts_rekon == "BELUM BAYAR"){
    $whereCondition = [
      ['produksi_ajk.sts_bayar', $sts_rekon],
        // ['produksi_ajk.bayar', 0],
    ];
  } elseif ($jns_bank != "all_bank" && $sts_rekon == "BELUM BAYAR"){
    $whereCondition = [
      ['produksi_ajk.kode_client', $jns_bank],
      ['produksi_ajk.sts_bayar', $sts_rekon],
    ];
  }elseif ($jns_bank == "all_bank" && $sts_rekon == "KURANG BAYAR"){
    $whereCondition = [
      ['produksi_ajk.sts_bayar', $sts_rekon],
    ];
  } elseif ($jns_bank != "all_bank" && $sts_rekon == "KURANG BAYAR"){
    $whereCondition = [
      ['produksi_ajk.kode_client', $jns_bank],
      ['produksi_ajk.sts_bayar', $sts_rekon],
    ];
  }elseif ($jns_bank == "all_bank" && $sts_rekon == "LEBIH BAYAR"){
    $whereCondition = [
      ['produksi_ajk.sts_bayar', $sts_rekon],
    ];
  } elseif ($jns_bank != "all_bank" && $sts_rekon == "LEBIH BAYAR"){
    $whereCondition = [
      ['produksi_ajk.kode_client', $jns_bank],
      ['produksi_ajk.sts_bayar', $sts_rekon],
    ];
  }elseif ($jns_bank == "all_bank" && $sts_rekon == "LUNAS"){
    $whereCondition = [
      ['produksi_ajk.sts_bayar', $sts_rekon],
    ];
  } elseif ($jns_bank != "all_bank" && $sts_rekon == "LUNAS"){
    $whereCondition = [
      ['produksi_ajk.kode_client', $jns_bank],
      ['produksi_ajk.sts_bayar', $sts_rekon],
    ];
  }elseif ($jns_bank == "all_bank" && $sts_rekon == "SEMUA"){
    $whereCondition = [
    ];
  }elseif ($jns_bank != "all_bank" && $sts_rekon == "SEMUA"){
    $whereCondition = [
      ['produksi_ajk.kode_client', $jns_bank],
    ];
  }
  // dd($whereCondition);
  return $whereCondition;
}

public function CetakKlaim($tgl_awal, $tgl_akhir, $jns_asuransi, $jns_client)
{
  $start = date( 'Y-m-d', strtotime($tgl_awal));
  $end = date( 'Y-m-d', strtotime($tgl_akhir));
        // dd($jns_asuransi, $jns_bank);
        if($jns_asuransi == "-" && $jns_client != "all_client"){
          $whereCondition = [
            ['produksi_ajk.asuransi_bank', 'NONAKTIF'],
            ['produksi_ajk.kode_client', $jns_client],
            ['produksi_ajk.sts_klaim', 1],
    
          ];
        }elseif($jns_asuransi == "-" && $jns_client == "all_client"){
          $whereCondition = [
            ['produksi_ajk.asuransi_bank', 'NONAKTIF'],
            ['produksi_ajk.sts_klaim', 1],
    
          ];
        }elseif($jns_asuransi == "all_asuransi" && $jns_client != "all_client"){
          $whereCondition = [
            ['produksi_ajk.kode_client', $jns_client],
            ['produksi_ajk.sts_klaim', 1],
    
          ];
        } elseif ($jns_asuransi != "all_asuransi" && $jns_client != "all_client"){
          $whereCondition = [
            ['produksi_ajk.kode_asu', $jns_asuransi],
            ['produksi_ajk.kode_client', $jns_client],
            ['produksi_ajk.sts_klaim', 1],
          ];
        } elseif ($jns_asuransi != "all_asuransi" && $jns_client == "all_client"){
          $whereCondition = [
            ['produksi_ajk.kode_asu', $jns_asuransi],
            ['produksi_ajk.sts_klaim', 1],
          ];
        } else {
          $whereCondition = [
            ['produksi_ajk.sts_klaim', 1],
          ];
        }
  $dokumens = $this->getklaimviewer($whereCondition, $start, $end );
            // $dokumens = DB::table('klaim_ajk')
            //   ->leftjoin('produksi_ajk','klaim_ajk.id_prod_ajk','=','produksi_ajk.id_prod_ajk')
            //   ->leftjoin('asuransi','produksi_ajk.kode_asu','=','asuransi.kode_asu')
            //   ->whereBetween('tgl_lapor', array($start, $end))
            //   ->where($whereCondition)
            //   ->select('produksi_ajk.no_pk','produksi_ajk.no_polis','produksi_ajk.debitur', 'produksi_ajk.umur','produksi_ajk.plafon','klaim_ajk.*', 'klaim_ajk.sts_klaim as status_klaim','asuransi.*', 'asuransi.nama as namaasuransi')
            //   ->get();
  $client = DB::table('client')->get();
  $asuransi = DB::table('asuransi')->get();
  $this->RincianKlaim($dokumens, $start, $end, $jns_asuransi, $client);

          // $dokumens = DB::table('produksi_ajk')->where($whereCondition)
          //     ->whereBetween('tgl_aksep', array($start, $end))->get();
          //   $client = DB::table('client')->get();
          //   $asuransi = DB::table('asuransi')->get();
          //   // dd($dokumens);
          //   $this->templateDokumen3($dokumens, $start, $end, $jns_bank, $jenis_produksi, $asuransi, $client);
          //   break;

}

public function Cetakrefund($tgl_awal, $tgl_akhir, $jns_asuransi, $jns_bank)
{
      // dd($tgl_awal);
      # code...
      // $subsStartDate = substr_replace($tgl_awal, '/', 2, 0);
      // $subsStartDate2 = substr_replace($subsStartDate, '/', 5, 0);

      // $subsEndDate = substr_replace($tgl_akhir, '/', 2, 0);
      // $subsEndDate2 = substr_replace($subsEndDate, '/', 5, 0);

      // $start = date( 'Y-m-d', strtotime($subsStartDate2) );
      // $end = date( 'Y-m-d', strtotime($subsEndDate2) );
  $start = date( 'Y-m-d', strtotime($tgl_awal));
  $end = date( 'Y-m-d', strtotime($tgl_akhir));
        // dd($jns_asuransi, $jns_bank);
  if($jns_bank == 'all_client'){
    $jns_pusat = 'all_pusat';
  }else{
    $client = DB::table('client')->where('kode_client',$jns_bank)->first();
    $jns_pusat = $client->kode_pusat;
  }
  if($jns_asuransi == "all_asuransi" && $jns_pusat != "all_pusat" && $jns_bank != "all_client"){
    $whereCondition = [
      ['produksi_ajk.kode_client',$jns_bank],
    ];
  } elseif ($jns_asuransi != "all_asuransi" && $jns_pusat == "all_pusat" && $jns_bank != "all_client"){
    $whereCondition = [
      ['produksi_ajk.kode_asu',$jns_asuransi],
      ['produksi_ajk.kode_client',$jns_bank],
    ];
  } elseif ($jns_asuransi != "all_asuransi" && $jns_pusat != "all_pusat" && $jns_bank == "all_client"){
    $whereCondition = [
      ['produksi_ajk.kode_client',$jns_bank],
    ];
  } elseif ($jns_asuransi != "all_asuransi" && $jns_pusat != "all_pusat" && $jns_bank != "all_client"){
    $whereCondition = [
      ['produksi_ajk.kode_asu',$jns_asuransi],
      ['produksi_ajk.kode_client',$jns_bank],
    ];
  } elseif ($jns_asuransi != "all_asuransi" && $jns_pusat == "all_pusat" && $jns_bank == "all_client"){
    $whereCondition = [
      ['produksi_ajk.kode_asu',$jns_asuransi],
    ];
  } else {
    $whereCondition = [

    ];
  }
  $dokumens = $this->getRefundviewer($whereCondition, $start, $end );
        // dd($dokumens);
            // $dokumens = DB::table('klaim_ajk')
            //   ->leftjoin('produksi_ajk','klaim_ajk.id_prod_ajk','=','produksi_ajk.id_prod_ajk')
            //   ->leftjoin('asuransi','produksi_ajk.kode_asu','=','asuransi.kode_asu')
            //   ->whereBetween('tgl_lapor', array($start, $end))
            //   ->where($whereCondition)
            //   ->select('produksi_ajk.no_pk','produksi_ajk.no_polis','produksi_ajk.debitur', 'produksi_ajk.umur','produksi_ajk.plafon','klaim_ajk.*', 'klaim_ajk.sts_klaim as status_klaim','asuransi.*', 'asuransi.nama as namaasuransi')
            //   ->get();
  $client = DB::table('client')->get();
  $asuransi = DB::table('asuransi')->get();
  $this->RincianRefund($dokumens, $start, $end, $jns_asuransi, $client);

          // $dokumens = DB::table('produksi_ajk')->where($whereCondition)
          //     ->whereBetween('tgl_aksep', array($start, $end))->get();
          //   $client = DB::table('client')->get();
          //   $asuransi = DB::table('asuransi')->get();
          //   // dd($dokumens);
          //   $this->templateDokumen3($dokumens, $start, $end, $jns_bank, $jenis_produksi, $asuransi, $client);
          //   break;

}

public function cetakpolis($no_polis)
{
      // $no_pin = $request->no_pin;
  $data_sertifikat = DB::table('produksi_ajk')
  ->leftJoin('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
  ->leftJoin('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
  ->leftJoin('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
  ->leftJoin('mst_client', 'client.kode_pusat', '=', 'mst_client.kode_pusat')
  ->select('produksi_ajk.*','asuransi.*','asuransi.nama as namaasuransi','jns_produksi.nama as namaprod','client.nama as namaclient', 'mst_client.no_pks')
  ->where('produksi_ajk.no_polis',$no_polis)
                // ->where('client.kode_client','KRH002')
  ->first();
      // dd($data_sertifikat);
  $this->templateSertifikat($data_sertifikat, $data_sertifikat);

}

    // public function cetakReportKlaim($startDate, $endDate, $id_asuransi, $id_leasing)
    // {
    //   # code...
    //   $subsStartDate = substr_replace($startDate, '/', 2, 0);
    //   $subsStartDate2 = substr_replace($subsStartDate, '/', 5, 0);

    //   $subsEndDate = substr_replace($endDate, '/', 2, 0);
    //   $subsEndDate2 = substr_replace($subsEndDate, '/', 5, 0);

    //   $start = date( 'Y-m-d', strtotime($subsStartDate2) );
    //   $end = date( 'Y-m-d', strtotime($subsEndDate2) );

    //   $asuransi = DB::table('master_asuransi')->get();
    //   $leasing = DB::table('master_leasing')->get();
    //   $s = 0;
    //   // dd($subsEndDate);
    //   if($id_asuransi == "all_asuransi" && $id_leasing != "all_leasing"){
    //       $whereCondition = [
    //         ['id_master_leasing', $id_leasing],
    //         ['tanggal_approve_klaim', '!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi', '!=', null],
    //       ];
    //     } elseif ($id_asuransi != "all_asuransi" && $id_leasing == "all_leasing"){
    //       $whereCondition = [
    //         ['id_master_asuransi', $id_asuransi],
    //         ['tanggal_approve_klaim', '!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi', '!=', null],
    //       ];
    //     } elseif ($id_asuransi != "all_asuransi" && $id_leasing != "all_leasing"){
    //       $whereCondition = [
    //         ['id_master_asuransi', $id_asuransi],
    //         ['id_master_leasing', $id_leasing],
    //         ['tanggal_approve_klaim', '!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi', '!=', null],
    //       ];
    //     } else {
    //       $whereCondition = [
    //         ['tanggal_approve_klaim', '!=', null],
    //         ['tanggal_awal_laporan_ke_asuransi', '!=', null],
    //       ];


    //     }

    //   $dokumens = DB::table('table_klaim')
    //             ->join('table_produksi', 'table_klaim.no_pin', '=', 'table_produksi.no_pin')
    //             ->select('table_klaim.*','table_produksi.*')
    //             ->where($whereCondition)
    //             ->whereBetween('tanggal_awal_laporan_ke_asuransi', array($start, $end))
    //             ->get();

    //   $leasing = DB::table('master_leasing')
    //             ->select('id_leasing','nama_leasing')
    //             ->get()->toArray();
    //   $asuransi = DB::table('master_asuransi')
    //             ->select('id_asuransi','nama_asuransi')
    //             ->get()->toArray();          
    //   Fpdf::AddPage('L', 'A4');
    //   // Add Header Title
    //   $this->addHeaderDokumen("Rincian Data Klaim", '');
    //   $asuransi_ls1 = [];
    //   $asuransi_ls2 =[];
    //   $asuransi_ls3 =[];
    //   $asuransi_ls4 =[];
    //   $totalplafon1 = [];
    //   $totalplafon2 = [];
    //   $totalplafon3 = [];
    //   $totalplafon4 = [];
    //   foreach ($dokumens as $key => $valuee) {
    //     if($valuee->id_master_leasing == 'LS001'){
    //           $cc = $valuee;
    //         if($valuee->id_master_asuransi == 'AS001'){
    //           $asuransi_ls1[] = $valuee;
    //           $totalplafon1[] = $valuee->plafon;
    //           $idasuransi1 = 1;
    //         }
    //         else if($valuee->id_master_asuransi == 'AS002'){
    //           // $this->templateDokumen2($valuee, $asuransi, $start, $end, $id_asuransi);
    //           $asuransi_ls2[] = $valuee;
    //           $totalplafon2[] = $valuee->plafon;
    //           $idasuransi2 = 1;
    //        }
    //     }elseif($valuee->id_master_leasing == 'LS002'){

    //         if($valuee->id_master_asuransi == 'AS001'){
    //           $asuransi_ls3[] = $valuee;
    //           $totalplafon3[] = $valuee->plafon;
    //           $idasuransi1 = 1;
    //         }
    //         else if($valuee->id_master_asuransi == 'AS002'){
    //          $asuransi_ls4[] = $valuee;
    //           $totalplafon4[] = $valuee->plafon;
    //           $idasuransi2 = 1;
    //        }
    //     }


    //   }
    //   if($asuransi_ls1 != null ){
    //     $this->templateDokumen2($asuransi_ls1, $leasing, $asuransi, $start, $end, $id_asuransi);
    //   }
    //   if($asuransi_ls2 != null ){
    //     $this->templateDokumen2($asuransi_ls2, $leasing, $asuransi, $start, $end, $id_asuransi);
    //   }
    //   if($asuransi_ls3 != null ){
    //     $this->templateDokumen2($asuransi_ls3, $leasing, $asuransi, $start, $end, $id_asuransi);
    //   }
    //   if($asuransi_ls4 != null ){
    //     $this->templateDokumen2($asuransi_ls4, $leasing, $asuransi, $start, $end, $id_asuransi);
    //   }
    //   // $this->footerTanggalLapor();
    //   return Fpdf::Output('I','Report.pdf');
    //   exit;


    // }

public function addHeaderSertifikat($FirstTitleBold, $SecondTitleBold) {
  if ($FirstTitleBold != "" && $SecondTitleBold != ""){
      // Sub title Header BOLD
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial','B',12);
    Fpdf::Cell(0,0,$FirstTitleBold,0,1,'C');
    Fpdf::Ln(5);
      // Sub title Header BOLD
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial','B',12);
    Fpdf::Cell(0,0,$SecondTitleBold,0,1,'C');
  }

  Fpdf::SetLineWidth(0.2);
  Fpdf::Rect(10, 5, 190, 15);
  Fpdf::Rect(15, 80, 130, 35);
  Fpdf::Rect(10, 20, 190, 110);
  Fpdf::Rect(10, 140, 190, 15);
  Fpdf::Rect(10, 155, 190, 90);
  Fpdf::Ln(10);

}

    // function Footer($pageNumber, $totalPage)
    // {
    //   // Go to 1.5 cm from bottom
    //   Fpdf::SetY(-35);
    //   // Select Arial italic 8
    //   Fpdf::SetFont('Arial','I',8);
    //   // Print centered page number
    //   Fpdf::Cell(180,10,'Page '.$pageNumber.' of '. $totalPage,0,0,'R');
    // }

    // ######################
    // TEMPLATE REPORT VIEWER
    // ######################

    // ###### Report Rincian Asuransi
public function templateDokumen($dokumens, $tgl_awal, $tgl_akhir, $header1, $header2, $namajenis, $nama)
{
  $userlogin = Auth::user();
  $posisi = $userlogin->posisi;
      // Set Page Size
  Fpdf::AddPage('L', 'A4');
  $this->addHeaderDokumen($header1, $header2);
      // Add Periode Tanggal
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B', 8);
  Fpdf::Cell(0, 0, 'Periode : '.$tgl_awal.' s/d '. $tgl_akhir, 0, 'R', true);
  Fpdf::Ln(5);
  $totalPeserta = 0;
  $rowHeader = 5;
  $borderColumn = 1;
  $totalGrandPeserta = 0;
  $totalGrandPlafon = 0;
  $totalGrandPremi =0;
  $garisakhir = 0;
  // dd($dokumens);
  foreach ($dokumens as $key => $namaasuransi) {
    $namaasuransidanwilayah = explode('-',$key); 
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial', 'B', 8);
    if($posisi == 3 ){
      if($garisakhir == 0){
        Fpdf::Cell(0, 0, $namajenis.': '.$namaasuransidanwilayah[0]);
        Fpdf::Ln(5);
      }
    }else{
        Fpdf::Cell(0, 0, $namajenis.': '.$namaasuransidanwilayah[0]);
        Fpdf::Ln(5);
    }
    Fpdf::Cell(0, 0, 'Wilayah: '.$namaasuransidanwilayah[1]);
    Fpdf::Ln(5);

    Fpdf::SetTextColor(255,255,255);
    Fpdf::SetFont('Arial', 'B', 6);
    Fpdf::SetFillColor(51,153,255);
    Fpdf::Cell(6, $rowHeader, 'NO.',$borderColumn, 0, 'C', true);
    Fpdf::Cell(43, $rowHeader, $nama, $borderColumn, 0, 'C', true);
    Fpdf::Cell(20, $rowHeader, 'NO.SERTIFIKAT', $borderColumn, 0, 'C', true);
    Fpdf::Cell(22, $rowHeader, 'NO PIN', $borderColumn, 0, 'C', true);
    Fpdf::Cell(30, $rowHeader, 'NASABAH', $borderColumn, 0, 'C', true);
    Fpdf::Cell(17, $rowHeader, 'TGL LAHIR', $borderColumn, 0, 'C', true);
    Fpdf::Cell(13, $rowHeader, 'UMUR', $borderColumn, 0, 'C', true);
    Fpdf::Cell(20, $rowHeader, 'TGl AWAL', $borderColumn, 0, 'C', true);
    Fpdf::Cell(20,  $rowHeader, 'TGL AKHIR', $borderColumn, 0, 'C', true);
    Fpdf::Cell(19, $rowHeader, 'JANGKA WAKTU', $borderColumn, 0, 'C', true);
    Fpdf::Cell(13, $rowHeader, 'RATE', $borderColumn, 0, 'C', true);
    Fpdf::Cell(27, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
    Fpdf::Cell(27, $rowHeader, 'PREMI', $borderColumn, 0, 'C', true);

    Fpdf::Ln(5);
    if($nama == "BANK"){
      // $groupedClient = $this->array_group_by($namaasuransi, function($i){  return $i[54]; }); 
      $groupedClient = array();
      if(!empty($namaasuransi)){
        foreach ($namaasuransi as $key => $value) {
          $groupedClient[$value->namaprod][] = $value;
        }  
      } 
      
      $x= 1;
    }else{
      $groupedClient = array();
      if(!empty($namaasuransi)){
        foreach ($namaasuransi as $key => $value) {
          $groupedClient[$value->namaclient][] = $value;
        }  
      }$x= 2;
    }
    $row = 5;
    $x =0 ;
    $y =0 ;
    $z =0;
      // dd($namaasuransi);
    $totalPlafon = 0;
    $totalPeserta = 0;
    $premi = 0;
    $keyno = 0;
    $x = 0;
    $borderRow = 1;
    foreach ($groupedClient as $key2 => $valuee) {
    foreach ($valuee as $key4 => $value) {
        if($keyno % 2 === 0) {
          Fpdf::SetFillColor(255,255,255);
        }else {
          Fpdf::SetFillColor(220, 220, 220);
        }
        Fpdf::SetTextColor(0,0,0);
        Fpdf::SetFont('Arial', 'B' , 5);
        Fpdf::Cell(6, $row, $keyno += 1, $borderRow, 0, 'L', true);
        if($nama == "BANK"){
          Fpdf::Cell(43, $row, $value->namaclient, $borderRow, 0, 'C', true);
        }else{
          Fpdf::Cell(43, $row, $value->namaprod, $borderRow, 0, 'C', true);
        }
        Fpdf::Cell(20, $row, $value->no_polis, $borderRow, 0, 'C', true);
        Fpdf::Cell(22, $row, $value->no_pk, $borderRow, 0, 'C', true);
        Fpdf::Cell(30, $row, $value->debitur, $borderRow, 0, 'C', true);
        Fpdf::Cell(17, $row, $value->tgl_lahir, $borderRow, 0, 'C', true);
        Fpdf::Cell(13, $row, $value->umur, $borderRow, 0, 'C', true);
        Fpdf::Cell(20, $row, $value->tgl_awal, $borderRow, 0, 'C', true);
        Fpdf::Cell(20, $row, $value->tgl_akhir, $borderRow, 0, 'C', true);
        Fpdf::Cell(19, $row, $value->tenor, $borderRow, 0, 'C', true);
        Fpdf::Cell(13, $row, $value->rate, $borderRow, 0, 'C', true);
        Fpdf::Cell(27, $row, number_format($value->plafon), $borderRow, 0, 'R', true);
        Fpdf::Cell(27, $row, number_format($value->premi), $borderRow, 0, 'R', true);
        Fpdf::Ln(5);

        $totalPeserta += 1;
        $totalPlafon += $value->plafon;
        $premi += $value->premi;
              // $namaclient = $namaasuransi[$key2][2];
      }
          // dd($totalPlafon);
      $x += $totalPeserta;
      $y += $totalPlafon;
      $z += $premi;
          // $totalGrandPeserta = $totalPeserta;

      $totalPeserta = 0;
      $totalPlafon = 0;
      $premi = 0;
    }
    $totalGrandPeserta += $x;
    $totalGrandPlafon += $y;
    $totalGrandPremi += $z;
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial', 'B' , 5);
    Fpdf::SetFillColor(220, 220, 220);
    Fpdf::Cell(223, 5, "TOTAL", 1, 0, 'C', true);
    Fpdf::Cell(27, 5, number_format($y), $borderRow, 0, 'R', true);
    Fpdf::Cell(27, 5, number_format($z), $borderRow, 0, 'R', true);
    $jumlahbaris = count($dokumens)-1;
        // dd($jumlahbaris);
    if($garisakhir < $jumlahbaris){
      Fpdf::Ln(10);
    }else{
      Fpdf::Ln(5);
    }
    $garisakhir +=1;
    $x = 0;
    $y = 0;
    $z = 0;
  }
        // Fpdf::setX($xPosition);
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B' , 5);
  Fpdf::SetFillColor(220, 220, 220);
  Fpdf::Cell(223, 5, "GRAND TOTAL", 1, 0, 'C', true);
  Fpdf::Cell(27, 5, number_format($totalGrandPlafon), $borderRow, 0, 'R', true);
  Fpdf::Cell(27, 5, number_format($totalGrandPremi), $borderRow, 0, 'R', true);
  $ta = date('d-m-y', strtotime($tgl_awal));
  $tb = date('d-m-y', strtotime($tgl_akhir));
  Fpdf::Output('I',$header1.' '.$key.'/'.$ta.'/'.$tb.'.pdf');
  exit();
}

    // public function templateDokumen3($dokumens, $start, $end, $jns_bank, $jenisPenutupan, $asuransi, $client)
    // {
    //   // Set Page Size
    //   Fpdf::AddPage('L', 'A4');

    //   // Add Header Title
    //   $this->addHeaderDokumen("Rincian Daftar Peserta Bank", 'PerAsuransi');

    //   // Add Periode Tanggal
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::SetFont('Arial', 'B', 6);
    //   Fpdf::Cell(0, 0, 'Periode : '.$start.' s/d '. $end);
    //   Fpdf::SetX(235);
    //   foreach ($client as $x) {
    //     # code...
    //     if($x->kode_client == $jns_bank){
    //       Fpdf::Cell(0, 0, 'Nama Bank: '.$x->nama);
    //     }
    //   }
    //   Fpdf::Ln(2);

    //   // Cetak Header Column
    //   $rowHeader = 5;
    //   $borderColumn = 1;
    //   Fpdf::SetTextColor(255,255,255);
    //   Fpdf::SetFont('Arial', 'B', 5);
    //   Fpdf::SetFillColor(51,153,255);

    //   Fpdf::Cell(6, $rowHeader, 'NO.',$borderColumn, 0, 'C', true);
    //   Fpdf::Cell(30, $rowHeader, 'ASURANSI', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(30, $rowHeader, 'NO.SERTIFIKAT', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(25, $rowHeader, 'NO PIN', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(30, $rowHeader, 'NASABAH', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(17, $rowHeader, 'TGL LAHIR', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(13, $rowHeader, 'UMUR', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(20, $rowHeader, 'TGl AWAL', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(20,  $rowHeader, 'TGL AKHIR', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(17, $rowHeader, 'JANGKA WAKTU', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(15, $rowHeader, 'RATE', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(27, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(27, $rowHeader, 'PREMI', $borderColumn, 0, 'C', true);

    //   // For Rekap Produksi
    //   // if ($jenisPenutupan == 'rekapProduksi') {
    //   //
    //   //   Fpdf::Cell(13, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
    //   //   Fpdf::Cell(11, $rowHeader, 'PREM ADM', $borderColumn, 0, 'C', true);
    //   //
    //   // }

    //   Fpdf::Ln(5);

    //   // Cetak Data Dokumens
    //   $totalPlafon  = 0;
    //   $totalPremi = 0;
    //   $i = 1;
    //   // dd($dokumens);
    //   foreach ($dokumens as $key => $value) {
    //     // if($value->no_polis == ''){

    //       $row = 5;
    //       $borderRow = 1;
    //       Fpdf::SetTextColor(0,0,0);
    //       Fpdf::SetFont('Arial', '' , 5);
    //       if($key % 2 === 0) {
    //         Fpdf::SetFillColor(255,255,255);
    //       }else {
    //         Fpdf::SetFillColor(197,226,254);
    //       }
    //       Fpdf::Cell(6, $row, $i, $borderRow, 0, 'C', true);
    //       foreach ($asuransi as $value_asuransi) {
    //       if($value->kode_asu == $value_asuransi->kode_asu){
    //       Fpdf::Cell(30, $row, $value_asuransi->nama, $borderRow, 0, 'C', true);
    //       }
    //       }
    //       Fpdf::Cell(30, $row, $value->no_polis, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(25, $row, $value->no_pk, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(30, $row, $value->debitur, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(17, $row, $value->tgl_lahir, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(13, $row, $value->umur, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(20, $row, $value->tgl_awal, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(20, $row, $value->tgl_akhir, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(17, $row, $value->tenor, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(15, $row, $value->rate, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(27, $row, number_format($value->plafon), $borderRow, 0, 'C', true);
    //       Fpdf::Cell(27, $row, number_format($value->premi), $borderRow, 0, 'C', true);
    //       Fpdf::Ln(5);

    //       // Hitung Total Plafon dan Premi
    //       $totalPlafon = $totalPlafon + $value->plafon;
    //       $totalPremi = $totalPremi + $value->premi;

    //       $row += 5;
    //       $i++;
    //     }


    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::SetFont('Arial', 'B' , 5);
    //   Fpdf::SetFillColor(180,200,230);
    //   Fpdf::Cell(223, 5, "TOTAL", 1, 0, 'C', true);
    //   Fpdf::Cell(27, 5, number_format($totalPlafon), 1, 0, 'C', true);
    //   Fpdf::Cell(27, 5, number_format($totalPremi), 1, 0, 'C', true);

    //   Fpdf::Output('I','Report.pdf');
    //   exit();
    // }

public function RincianKlaim($dokumens, $start, $end, $jns_asuransi, $client)
{
      // Set Page Size
  Fpdf::AddPage('L', 'A4');

      // Add Header Title
  $this->addHeaderDokumen("LAPORAN DATA KLAIM", 'ASURANSI JIWA KREDIT');

      // Add Periode Tanggal
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B', 6);
  Fpdf::Cell(0, 0, 'Periode : '.$start.' s/d '. $end);
  Fpdf::SetX(235);
  
  Fpdf::Ln(2);
  
  $rowHeader = 5;
  $borderColumn = 1;
  

  // dd($dokumens);
  $data = [];
  foreach($dokumens as $index => $valuedok){
    $data[$valuedok['namaclient'].'*'.$valuedok['nama']][] = $valuedok;
  }
  if(!empty($data)){
  $totalPlafon = 0;
  $totalNilaiKlaim = 0;
  $totalBayar = 0;
  foreach ($data as $key => $valuedata) {
    $dataclientasuransi = explode('*', $key);
    $subtotalPlafon = 0;
    $subtotalNilaiKlaim = 0;
    $subtotalBayar = 0;
    $numberindex=0;
  
  Fpdf::SetFont('Arial', '', 5);
  Fpdf::Cell(0, 0, $dataclientasuransi[0]);
  Fpdf::Ln(2);
  Fpdf::Cell(0, 0, $dataclientasuransi[1]);
  Fpdf::Ln(2);
  Fpdf::SetTextColor(255,255,255);
  Fpdf::SetFont('Arial', 'B', 5);
  Fpdf::SetFillColor(51,153,255);
  Fpdf::Cell(6, $rowHeader, 'NO.',$borderColumn, 0, 'C', true);
  Fpdf::Cell(11, $rowHeader, 'TGL LAPOR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(20, $rowHeader, 'NO.PK', $borderColumn, 0, 'C', true);
  Fpdf::Cell(14, $rowHeader, 'NO POLIS', $borderColumn, 0, 'C', true);
  Fpdf::Cell(30, $rowHeader, 'NAMA DEBITUR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(6, $rowHeader, 'UMUR', $borderColumn, 0, 'C', true);
  // Fpdf::Cell(28, $rowHeader, 'NAMA BANK', $borderColumn, 0, 'C', true);
  Fpdf::Cell(11, $rowHeader, 'TGL AWAL', $borderColumn, 0, 'C', true);
  // Fpdf::Cell(28, $rowHeader, 'NAMA ASURANSI', $borderColumn, 0, 'C', true);
  Fpdf::Cell(14, $rowHeader, 'TGl KEJADIAN', $borderColumn, 0, 'C', true);
  Fpdf::Cell(24,  $rowHeader, 'JNS_KLAIM', $borderColumn, 0, 'C', true);
  Fpdf::Cell(18, $rowHeader, 'STATUS KLAIM', $borderColumn, 0, 'C', true);
  Fpdf::Cell(12, $rowHeader, 'TGL BAYAR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(30, $rowHeader, 'KETERANGAN', $borderColumn, 0, 'C', true);
  Fpdf::Cell(27, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
  Fpdf::Cell(27, $rowHeader, 'NILAI KLAIM', $borderColumn, 0, 'C', true);
  Fpdf::Cell(27, $rowHeader, 'DIBAYAR', $borderColumn, 0, 'C', true);

      // For Rekap Produksi
      // if ($jenisPenutupan == 'rekapProduksi') {
      //
      //   Fpdf::Cell(13, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
      //   Fpdf::Cell(11, $rowHeader, 'PREM ADM', $borderColumn, 0, 'C', true);
      //
      // }

  Fpdf::Ln(5);

      // Cetak Data Dokumens
  // $totalPlafon  = 0;
  // $totalPremi = 0;
  // $totalNilaiKlaim =0;
  // $totalBayar =0;
  $i = 1;
    foreach($valuedata as $key2 =>$value){
      // dd($value, $value['no_polis']);
      
    // if($value[$numberindex]['no_polis'] != '' || $value[$numberindex]['no_polis'] != null){
      $row = 5;
      $borderRow = 1;
      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial', '' , 5);
      if($key2 % 2 === 0) {
        Fpdf::SetFillColor(255,255,255);
      }else {
        Fpdf::SetFillColor(220, 220, 220);
      }
      Fpdf::Cell(6, $row, $i, $borderRow, 0, 'C', true);
          // foreach ($asuransi as $value_asuransi) {
          // if($value->kode_asu == $value_asuransi->kode_asu){
      Fpdf::Cell(11, $row, $value['tgl_lapor'], $borderRow, 0, 'C', true);
      Fpdf::Cell(20, $row, $value['no_pk'], $borderRow, 0, 'C', true);
      Fpdf::Cell(14, $row, $value['no_polis'], $borderRow, 0, 'C', true);
      Fpdf::Cell(30, $row, $value['debitur'], $borderRow, 0, 'C', true);
      Fpdf::Cell(6, $row, $value['umur'], $borderRow, 0, 'C', true);
      // Fpdf::Cell(28, $row, $value['namaclient'], $borderRow, 0, 'C', true);
      Fpdf::Cell(11, $row, $value['tgl_awal'], $borderRow, 0, 'C', true);
      // Fpdf::Cell(28, $row, $value['nama'], $borderRow, 0, 'C', true);
      Fpdf::Cell(14, $row, $value['tgl_kejadian'], $borderRow, 0, 'C', true);
      Fpdf::Cell(24, $row, $value['jns_klaim'], $borderRow, 0, 'C', true);
      Fpdf::Cell(18, $row, $value['stsklaim'], $borderRow, 0, 'C', true);
      Fpdf::Cell(12, $row, $value['tglbayar'], $borderRow, 0, 'C', true);
      Fpdf::Cell(30, $row, $value['ket_klaim'], $borderRow, 0, 'C', true);
      Fpdf::Cell(27, $row, number_format($value['plafon']), $borderRow, 0, 'R', true);
      Fpdf::Cell(27, $row, number_format($value['nilai_klaim']), $borderRow, 0, 'R', true);
      Fpdf::Cell(27, $row, number_format($value['dibayar']), $borderRow, 0, 'R', true);
      Fpdf::Ln(5);

          // Hitung Total Plafon dan Premi
      $subtotalPlafon = $subtotalPlafon + $value['plafon'];
      $subtotalNilaiKlaim = $subtotalNilaiKlaim + $value['nilai_klaim'];
      $subtotalBayar = $subtotalBayar + $value['dibayar'];

      $totalPlafon = $totalPlafon + $value['plafon'];
      $totalNilaiKlaim = $totalNilaiKlaim + $value['nilai_klaim'];
      $totalBayar = $totalBayar + $value['dibayar'];

      $row += 5;
      $i++;
    // }
    
    }
    Fpdf::SetFillColor(220, 220, 220);
    Fpdf::Cell(196, 5, "SUB TOTAL", 1, 0, 'C', true);
    Fpdf::Cell(27, 5, number_format($subtotalPlafon), $borderRow, 0, 'R', true);
    Fpdf::Cell(27, 5, number_format($subtotalNilaiKlaim), $borderRow, 0, 'R', true);
    Fpdf::Cell(27, 5, number_format($subtotalBayar), $borderRow, 0, 'R', true);
    if(end($valuedata)){
    Fpdf::Ln(6);
    }else{
    Fpdf::Ln(12);
    }
    $numberindex++;
  }


  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B' , 5);
  Fpdf::SetFillColor(220, 220, 220);
  Fpdf::Cell(196, 5, "TOTAL", 1, 0, 'C', true);
  Fpdf::Cell(27, 5, number_format($totalPlafon), 1, 0, 'R', true);
  Fpdf::Cell(27, 5, number_format($totalNilaiKlaim), 1, 0, 'R', true);
  Fpdf::Cell(27, 5, number_format($totalBayar), 1, 0, 'R', true);
  }
  Fpdf::Output('I','Report.pdf');
  exit();
}

public function RincianRekon($dokumens, $start, $end, $client)
{
      // Set Page Size
  Fpdf::AddPage('L', 'A4');

      // Add Header Title
  $this->addHeaderDokumen("REKAPITULASI LAPORAN REKONSILIASI", 'PREMI DENGAN REKENING KORAN');

      // Add Periode Tanggal
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B', 6);
  Fpdf::Cell(0, 0, 'Periode : '.$start.' s/d '. $end);
  Fpdf::SetX(235);
      // foreach ($client as $x) {
      //   # code...
      //   if($x->kode_client == $jns_bank){
      //     Fpdf::Cell(0, 0, 'Nama Bank: '.$x->nama);
      //   }
      // }
  Fpdf::Ln(2);
      // dd($dokumens);
      // Cetak Header Column
  $rowHeader = 5;
  $borderColumn = 1;
  Fpdf::SetTextColor(255,255,255);
  Fpdf::SetFont('Arial', 'B', 5);
  Fpdf::SetFillColor(51,153,255);

  Fpdf::Cell(6, $rowHeader, 'NO.',$borderColumn, 0, 'C', true);
  // Fpdf::Cell(12, $rowHeader, 'TGL LAPOR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(25, $rowHeader, 'NO.PK', $borderColumn, 0, 'C', true);
  // Fpdf::Cell(17, $rowHeader, 'NO POLIS', $borderColumn, 0, 'C', true);
  Fpdf::Cell(30, $rowHeader, 'NAMA DEBITUR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(28, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
  Fpdf::Cell(28, $rowHeader, 'PREMI', $borderColumn, 0, 'C', true);
  // Fpdf::Cell(14, $rowHeader, 'TGl KEJADIAN', $borderColumn, 0, 'C', true);
  // Fpdf::Cell(28,  $rowHeader, 'JNS_KLAIM', $borderColumn, 0, 'C', true);
  // Fpdf::Cell(18, $rowHeader, 'STATUS KLAIM', $borderColumn, 0, 'C', true);
  Fpdf::Cell(12, $rowHeader, 'TGL BAYAR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(28, $rowHeader, 'PREMI BAYAR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(28, $rowHeader, 'SELISIH  BAYAR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(18, $rowHeader, 'STATUS BAYAR', $borderColumn, 0, 'C', true);
  // Fpdf::Cell(18, $rowHeader, 'DIBAYAR', $borderColumn, 0, 'C', true);

      // For Rekap Produksi
      // if ($jenisPenutupan == 'rekapProduksi') {
      //
      //   Fpdf::Cell(13, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
      //   Fpdf::Cell(11, $rowHeader, 'PREM ADM', $borderColumn, 0, 'C', true);
      //
      // }

  Fpdf::Ln(5);

      // Cetak Data Dokumens
  $totalPlafon  = 0;
  $totalPremi = 0;
  $totalNilaiKlaim =0;
  $totalBayar =0;
  $totalSelisih =0;
  $i = 1;
      // dd($dokumens);
  foreach ($dokumens as $key => $value) {
    //   dd($value);
    // if($value['no_polis'] != '' || $value['no_polis'] != null){

      $row = 5;
      $borderRow = 1;
      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial', '' , 5);
      if($key % 2 === 0) {
        Fpdf::SetFillColor(255,255,255);
      }else {
        Fpdf::SetFillColor(220, 220, 220);
      }
      Fpdf::Cell(6, $row, $i, $borderRow, 0, 'C', true);
          // foreach ($asuransi as $value_asuransi) {
          // if($value->kode_asu == $value_asuransi->kode_asu){
      // Fpdf::Cell(12, $row, $value['tgl_lapor'], $borderRow, 0, 'C', true);
      Fpdf::Cell(25, $row, $value['no_pk'], $borderRow, 0, 'C', true);
      // Fpdf::Cell(17, $row, $value['no_polis'], $borderRow, 0, 'C', true);
      Fpdf::Cell(30, $row, $value['debitur'], $borderRow, 0, 'C', true);
      Fpdf::Cell(28, $row, number_format($value['plafon']), $borderRow, 0, 'R', true);
      Fpdf::Cell(28, $row, number_format($value['premi']), $borderRow, 0, 'R', true);
      // Fpdf::Cell(14, $row, $value['tgl_bayar'], $borderRow, 0, 'C', true);
      // Fpdf::Cell(28, $row, $value['jns_klaim'], $borderRow, 0, 'C', true);
      Fpdf::Cell(12, $row, $value['tgl_bayar'], $borderRow, 0, 'C', true);
      Fpdf::Cell(28, $row, number_format($value['bayar']), $borderRow, 0, 'R', true);
      Fpdf::Cell(28, $row, number_format($value['selisih']), $borderRow, 0, 'R', true);
      Fpdf::Cell(18, $row, $value['sts_bayar'], $borderRow, 0, 'C', true);
      // Fpdf::Cell(18, $row, number_format($value['dibayar']), $borderRow, 0, 'R', true);
      // Fpdf::Cell(18, $row, number_format($value['dibayar']), $borderRow, 0, 'R', true);
      Fpdf::Ln(5);

          // Hitung Total Plafon dan Premi
      $totalPlafon = $totalPlafon + $value['plafon'];
      $totalNilaiKlaim = $totalNilaiKlaim + $value['premi'];
      $totalBayar = $totalBayar + $value['bayar'];
      $totalSelisih = $totalSelisih + $value['selisih'];

      $row += 5;
      $i++;
    // }
  }


  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B' , 5);
  Fpdf::SetFillColor(220, 220, 220);
  Fpdf::Cell(61, 5, "TOTAL", 1, 0, 'C', true);
  Fpdf::Cell(28, 5, number_format($totalPlafon), 1, 0, 'R', true);
  Fpdf::Cell(28, 5, number_format($totalNilaiKlaim), 1, 0, 'R', true);
  Fpdf::Cell(12, 5, '', 1, 0, 'R', true);
  Fpdf::Cell(28, 5, number_format($totalBayar), 1, 0, 'R', true);
  Fpdf::Cell(28, 5, number_format($totalSelisih), 1, 0, 'R', true);
  Fpdf::Cell(18, 5, '', 1, 0, 'R', true);

  Fpdf::Output('I','Report.pdf');
  exit();
}

public function RincianRefundxyz($dokumens, $start, $end, $jns_asuransi, $client)
{

  $pdf = PDF::loadView('laporan.laporanrefund', ['tes'=>'tes']);
  
  return $pdf->stream();
  // return $pdf->download('laporanrefund.pdf');
      // Set Page Size
  
}
public function RincianRefund($dokumens, $start, $end, $jns_asuransi, $client)
{
      // Set Page Size
  Fpdf::AddPage('L', 'A4');

      // Add Header Title
  $this->addHeaderDokumen("LAPORAN DATA REFUND", 'ASURANSI JIWA KREDIT');

      // Add Periode Tanggal
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B', 6);
  Fpdf::Cell(0, 0, 'Periode : '.$start.' s/d '. $end);
  Fpdf::SetX(235);
      // foreach ($client as $x) {
      //   # code...
      //   if($x->kode_client == $jns_bank){
      //     Fpdf::Cell(0, 0, 'Nama Bank: '.$x->nama);
      //   }
      // }
  Fpdf::Ln(2);
      // dd($dokumens);
      // Cetak Header Column
  $rowHeader = 5;
  $borderColumn = 1;
  Fpdf::SetTextColor(255,255,255);
  Fpdf::SetFont('Arial', 'B', 5);
  Fpdf::SetFillColor(51,153,255);

  Fpdf::Cell(6, $rowHeader, 'NO.',$borderColumn, 0, 'C', true);
  Fpdf::Cell(12, $rowHeader, 'TGL LAPOR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(25, $rowHeader, 'NO.PK', $borderColumn, 0, 'C', true);
  Fpdf::Cell(17, $rowHeader, 'NO POLIS', $borderColumn, 0, 'C', true);
  Fpdf::Cell(30, $rowHeader, 'NAMA DEBITUR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(8, $rowHeader, 'UMUR', $borderColumn, 0, 'C', true);
  Fpdf::Cell(28, $rowHeader, 'NAMA ASURANSI', $borderColumn, 0, 'C', true);
  Fpdf::Cell(14, $rowHeader, 'TGl REFUND', $borderColumn, 0, 'C', true);
      // Fpdf::Cell(28,  $rowHeader, 'JNS_KLAIM', $borderColumn, 0, 'C', true);
  Fpdf::Cell(18, $rowHeader, 'STATUS REFUND', $borderColumn, 0, 'C', true);
  Fpdf::Cell(12, $rowHeader, 'TGL BAYAR', $borderColumn, 0, 'C', true);
      // Fpdf::Cell(25, $rowHeader, 'KETERANGAN', $borderColumn, 0, 'C', true);
  Fpdf::Cell(18, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
  Fpdf::Cell(18, $rowHeader, 'NILAI REFFUND', $borderColumn, 0, 'C', true);
  Fpdf::Cell(18, $rowHeader, 'DIBAYAR', $borderColumn, 0, 'C', true);

      // For Rekap Produksi
      // if ($jenisPenutupan == 'rekapProduksi') {
      //
      //   Fpdf::Cell(13, $rowHeader, 'PLAFON', $borderColumn, 0, 'C', true);
      //   Fpdf::Cell(11, $rowHeader, 'PREM ADM', $borderColumn, 0, 'C', true);
      //
      // }

  Fpdf::Ln(5);

      // Cetak Data Dokumens
  $totalPlafon  = 0;
  $totalPremi = 0;
  $totalNilaiKlaim =0;
  $totalBayar =0;
  $i = 1;
      // dd($dokumens);
  foreach ($dokumens as $key => $value) {
    if($value['no_polis'] != '' || $value['no_polis'] != null){

      $row = 5;
      $borderRow = 1;
      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial', '' , 5);
      if($key % 2 === 0) {
        Fpdf::SetFillColor(255,255,255);
      }else {
        Fpdf::SetFillColor(220, 220, 220);
      }
      Fpdf::Cell(6, $row, $i, $borderRow, 0, 'C', true);
          // foreach ($asuransi as $value_asuransi) {
          // if($value->kode_asu == $value_asuransi->kode_asu){
      Fpdf::Cell(12, $row, $value['tgl_lapor'], $borderRow, 0, 'C', true);
      Fpdf::Cell(25, $row, $value['no_pk'], $borderRow, 0, 'C', true);
      Fpdf::Cell(17, $row, $value['no_polis'], $borderRow, 0, 'C', true);
      Fpdf::Cell(30, $row, $value['debitur'], $borderRow, 0, 'C', true);
      Fpdf::Cell(8, $row, $value['umur'], $borderRow, 0, 'C', true);
      Fpdf::Cell(28, $row, $value['nama'], $borderRow, 0, 'C', true);
      Fpdf::Cell(14, $row, $value['tgl_refund'], $borderRow, 0, 'C', true);
          // Fpdf::Cell(28, $row, $value['jns_klaim'], $borderRow, 0, 'C', true);
      Fpdf::Cell(18, $row, $value['stsrefund'], $borderRow, 0, 'C', true);
      Fpdf::Cell(12, $row, $value['tglbayar'], $borderRow, 0, 'C', true);
          // Fpdf::Cell(25, $row, $value['ket_refund'], $borderRow, 0, 'C', true);
      Fpdf::Cell(18, $row, number_format($value['plafon']), $borderRow, 0, 'R', true);
      Fpdf::Cell(18, $row, number_format($value['nilai_refund']), $borderRow, 0, 'R', true);
      Fpdf::Cell(18, $row, number_format($value['dibayar']), $borderRow, 0, 'R', true);
      Fpdf::Ln(5);

          // Hitung Total Plafon dan Premi
      $totalPlafon = $totalPlafon + $value['plafon'];
      $totalNilaiKlaim = $totalNilaiKlaim + $value['nilai_refund'];
      $totalBayar = $totalBayar + $value['dibayar'];

      $row += 5;
      $i++;
    }
  }


  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B' , 5);
  Fpdf::SetFillColor(220, 220, 220);
  Fpdf::Cell(170, 5, "TOTAL", 1, 0, 'C', true);
  Fpdf::Cell(18, 5, number_format($totalPlafon), 1, 0, 'R', true);
  Fpdf::Cell(18, 5, number_format($totalNilaiKlaim), 1, 0, 'R', true);
  Fpdf::Cell(18, 5, number_format($totalBayar), 1, 0, 'R', true);

  Fpdf::Output('I','Report.pdf');
  exit();
}

    // public function footerTanggalLapor() {
    //     // Membuat posisi footer pada 15 mm dari bawah
    //     Fpdf::SetY(-5);
    //     // menentukan tulisan miring dan ukuran font 8
    //     Fpdf::SetFont('helvetica', 'I', 8);
    //     // menampilkan nomor halaman
    //     Fpdf::Cell(0, 10, 'Page ', 0, 0, 'C', false);
    //     // Fpdf::SetMargins(10, 25, 10);
    //     // Fpdf::SetFooterMargin(10);

    // }

    // ####### Rekap Asuransi
public function templateRekapAsuransi($dokumens, $tgl_awal, $tgl_akhir, $header1, $header2, $namajenis , $nama)
{ 
  $userlogin = Auth::user();
  $posisi = $userlogin->posisi;
      // Set Page Size
  Fpdf::AddPage('P', 'A4');

      // if($id_asuransi == 'AS001'){
      //   $logo = "img/report/ksklogo.JPG";
      // } else if($id_asuransi == 'AS002') {
      //   $logo = "img/report/maglogo.png";
      // } else {
      //   $logo = '';
      // }
      // dd($jns_asuransi);
      // Add Header Title
  $this->addHeaderDokumen($header1, $header2);

      // Add Periode Tanggal
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B', 8);
  Fpdf::Cell(0, 0, 'Periode : '.$tgl_awal.' s/d '. $tgl_akhir, 0, 'R', true);
  Fpdf::Ln(5);
        // dd($dokumens);
      // Cetak Header Column
      // dd($dokumens,$list_nama_cabang);

  $totalPeserta = 0;
  $rowHeader = 5;
  $borderColumn = 1;
  $totalGrandPeserta = 0;
  $totalGrandPlafon = 0;
  $totalGrandPremi =0;
  $garisakhir = 0;
  $borderRow = 1;
  foreach ($dokumens as $key => $namaasuransi) { 
   $namaasuransidanwilayah = explode('-',$key); 
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial', 'B', 8);
    if($posisi == 3 ){
      if($garisakhir == 0){
        Fpdf::Cell(0, 0, $namajenis.': '.$namaasuransidanwilayah[0]);
        Fpdf::Ln(5);
      }
    }else{
        Fpdf::Cell(0, 0, $namajenis.': '.$namaasuransidanwilayah[0]);
        Fpdf::Ln(5);
    }
    Fpdf::Cell(0, 0, 'Wilayah: '.$namaasuransidanwilayah[1]);
    Fpdf::Ln(5);


    Fpdf::SetTextColor(255,255,255);
    Fpdf::SetFont('Arial', 'B', 6);
    Fpdf::SetFillColor(51,153,255);
    Fpdf::Cell(6, $rowHeader, 'NO.',$borderColumn, 0, 'C', true);
    Fpdf::Cell(65, $rowHeader, $nama, $borderColumn, 0, 'C', true);
    Fpdf::Cell(20, $rowHeader, 'JML NASABAH', $borderColumn, 0, 'C', true);
    Fpdf::Cell(49, $rowHeader, 'TOTAL PLAFON', $borderColumn, 0, 'C', true);
    Fpdf::Cell(49, $rowHeader, 'PREMI', $borderColumn, 0, 'C', true);
    Fpdf::Ln(5);
    if($nama == "CABANG"){
      // $groupedClient = $this->array_group_by($namaasuransi, function($i){  return $i[55]; }); 
      $groupedClient = array();
      if(!empty($namaasuransi)){
        foreach ($namaasuransi as $key => $value) {
            $groupedClient[$value->namaclient][] = $value;
        }  
      }
    }else{
      // $groupedClient = $this->array_group_by($namaasuransi, function($i){  return $i[54]; }); 
      $groupedClient = array();
      if(!empty($namaasuransi)){
        foreach ($namaasuransi as $key => $value) {
            $groupedClient[$value->namaprod][] = $value;
        }  
      }
    }

    $row = 5;
    $borderRow = 1;
    $x =0 ;
    $y =0 ;
    $z =0;
      // dd($namaasuransi);
    $totalPlafon = 0;
    $totalPeserta = 0;
    $premi = 0;
    $keyno = 0;
    $x = 0;
    foreach ($groupedClient as $key2 => $valuee) {
      foreach ($valuee as $key4 => $value) {
        $totalPeserta += 1;
        $totalPlafon += $namaasuransi[$key4]->plafon;
        $premi += $namaasuransi[$key4]->premi;
              // $namaclient = $namaasuransi[$key2][2];
      }
          // dd($totalPlafon);
      $x += $totalPeserta;
      $y += $totalPlafon;
      $z += $premi;
          // $totalGrandPeserta = $totalPeserta;
      if($keyno % 2 === 0) {
        Fpdf::SetFillColor(255,255,255);
      }else {
        Fpdf::SetFillColor(220, 220, 220);
      }
      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial', 'B' , 5);
      Fpdf::Cell(6, $row, $keyno += 1, $borderRow, 0, 'L', true);
      // if($nama == "BANK"){
      // Fpdf::Cell(65, $row, $key2, $borderRow, 0, 'L', true);
      // }else{
        Fpdf::Cell(65, $row, $key2, $borderRow, 0, 'L', true);
      // }
      Fpdf::Cell(20, $row, $totalPeserta, $borderRow, 0, 'C', true);
      Fpdf::Cell(49, $row, number_format($totalPlafon), $borderRow, 0, 'R', true);
      Fpdf::Cell(49, $row, number_format($premi), $borderRow, 0, 'R', true);
      Fpdf::Ln(5);
      $totalPeserta = 0;
      $totalPlafon = 0;
      $premi = 0;
    }
    $totalGrandPeserta += $x;
    $totalGrandPlafon += $y;
    $totalGrandPremi += $z;
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial', 'B' , 5);
    Fpdf::SetFillColor(220, 220, 220);
    Fpdf::Cell(71, 5, "TOTAL", 1, 0, 'C', true);
    Fpdf::Cell(20, 5, $x, $borderRow, 0, 'C', true);
    Fpdf::Cell(49, 5, number_format($y), $borderRow, 0, 'R', true);
    Fpdf::Cell(49, 5, number_format($z), $borderRow, 0, 'R', true);
    $jumlahbaris = count($dokumens)-1;
        // dd($jumlahbaris);
    if($garisakhir < $jumlahbaris){
      Fpdf::Ln(10);
    }else{
      Fpdf::Ln(5);
    }
    $garisakhir +=1;
    $x = 0;
    $y = 0;
    $z = 0;

  }
        // Fpdf::setX($xPosition);
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial', 'B' , 5);
  Fpdf::SetFillColor(220, 220, 220);
  Fpdf::Cell(71, 5, "GRAND TOTAL", 1, 0, 'C', true);
  Fpdf::Cell(20, 5, $totalGrandPeserta, $borderRow, 0, 'C', true);
  Fpdf::Cell(49, 5, number_format($totalGrandPlafon), $borderRow, 0, 'R', true);
  Fpdf::Cell(49, 5, number_format($totalGrandPremi), $borderRow, 0, 'R', true);
  $ta = date('d-m-y', strtotime($tgl_awal));
  $tb = date('d-m-y', strtotime($tgl_akhir));
  Fpdf::Output('I',$header1.' '.$header2.'/'.$ta.'/'.$tb.'.pdf');
  exit();
      // return response()->download($x);
}

    // ####### Rekap Produksi
    // public function templateRekapProduksi($dokumens, $start, $end, $jns_bank, $jenisPenutupan, $list_nama_cabang){
    //   // Set Page Size
    //   Fpdf::AddPage('P', 'A4');

    //   // if($id_asuransi == 'AS001'){
    //   //   $logo = "img/report/ksklogo.JPG";
    //   // } else if($id_asuransi == 'AS002') {
    //   //   $logo = "img/report/maglogo.png";
    //   // } else {
    //   //   $logo = '';
    //   // }
    //   $this->addHeaderDokumen('Sumary Laporan PerBank','Asuransi Jiwa Kredit');
    //   // dd($dokumens);
    //   // Add Periode Tanggal
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::SetFont('Arial', 'B', 6);
    //   Fpdf::Cell(240, 0, 'Periode : '.$start.' s/d '. $end);
    //   // }
    //   // Cetak Header Column
    //   $rowHeader = 5;
    //   $borderColumn = 1;
    //   $xPosition = 15;
    //   Fpdf::SetTextColor(255,255,255);
    //   Fpdf::SetFont('Arial', 'B', 6);
    //   Fpdf::SetFillColor(51,153,255);

    //   foreach ($list_nama_cabang as $key => $valueListCabang) {
    //     $totalPlafon = 0;
    //     $premi = 0;
    //     $totalPeserta = 0;
    //     foreach ($dokumens as $key => $valuee) {
    //       // dd($valuee, $valueListCabang);
    //         // Parameter Hitung
    //         if ($valuee->kode_asu == $valueListCabang->kode_asu ){
    //           $totalPeserta += 1;
    //           $totalPlafon += $valuee->plafon;
    //           $premi += $valuee->premi;
    //         }
    //     }
    //     if($totalPlafon > 0){
    //       $insertDataReport[] = [
    //         $valueListCabang->nama,
    //         $totalPeserta,
    //         $totalPlafon,
    //         $premi,
    //       ];
    //     }

    //   }
    //   // dd($insertDataReport);
    //   // Cetak Data Dokumens
    //   $totalPlafon  = 0;
    //   $totalPeserta = 0;
    //   $total_A = 0;
    //   $total_B = 0;
    //   $total_C = 0;
    //   $total_D = 0;
    //   $total_E = 0;
    //   $total_F = 0;


    //   if ($insertDataReport != null){
    //     foreach ($insertDataReport as $key => $value) {
    //   Fpdf::setX(150);

    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::SetFont('Arial', 'B', 6);
    //   // foreach ($list_nama_cabang as $value) {
    //   //   # code...
    //   //   if($valuee->kode_client == $jns_bank->kode_client)
    //   // // if($jns_bank !='' ||$jns_bank != null){
    //   // Fpdf::Cell(0, 0, 'Nama Bank : '.$jns_bank->nama);
    //   // }
    //   Fpdf::Ln(5);
    //   Fpdf::setX(15);
    //   Fpdf::Cell(6, $rowHeader, 'NO.',$borderColumn, 0, 'C', true);
    //   Fpdf::Cell(65, $rowHeader, 'ASURANSI', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(20, $rowHeader, 'JML NASABAH', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(45, $rowHeader, 'TOTAL PLAFON', $borderColumn, 0, 'C', true);
    //   Fpdf::Cell(45, $rowHeader, 'PREMI', $borderColumn, 0, 'C', true);
    //   Fpdf::Ln(5);
    //   // dd($dokumens,$list_nama_cabang);

    //   Fpdf::setX($xPosition);
    //       $row = 5;
    //       $borderRow = 1;
    //       Fpdf::SetTextColor(0,0,0);
    //       Fpdf::SetFont('Arial', '' , 6);
    //       if($key % 2 === 0) {
    //         Fpdf::SetFillColor(255,255,255);
    //       }else {
    //         Fpdf::SetFillColor(197,226,254);
    //       }

    //       // Parameter Hitung
    //       $A = $value[3];
    //       $B = $A * 0.25;
    //       $C = $A - $B;
    //       $D = $B * 0.1;
    //       $E = $B * 0.02;
    //       $F = $B + $D - $E;


    //       Fpdf::Cell(6, $row, $key+1, $borderRow, 0, 'C', true);
    //       Fpdf::Cell(65, $row, $value[0], $borderRow, 0, 'L', true);
    //       Fpdf::Cell(20, $row, number_format($value[1]), $borderRow, 0, 'R', true);
    //       Fpdf::Cell(45, $row, number_format($value[2]), $borderRow, 0, 'R', true);
    //       Fpdf::Cell(45, $row, number_format($value[3]), $borderRow, 0, 'R', true);
    //       Fpdf::Ln(5);
    //       // Hitung Total Plafon dan Premi
    //       $totalPeserta += $value[1];
    //       $totalPlafon += $value[2];
    //       $total_A += $value[3];
    //       $total_B += $B;
    //       $total_C += $C;
    //       $total_D += $D;
    //       $total_E += $E;
    //       $total_F += $F;

    //       $row += 5;
    //       Fpdf::setX($xPosition);
    //     Fpdf::SetTextColor(0,0,0);
    //     Fpdf::SetFont('Arial', 'B' , 7);
    //     Fpdf::SetFillColor(180,200,230);
    //     Fpdf::Cell(71, 5, "TOTAL", 1, 0, 'C', true);
    //     Fpdf::Cell(20, 5, $value[1], $borderRow, 0, 'R', true);
    //     Fpdf::Cell(45, 5, number_format($value[2]), $borderRow, 0, 'R', true);
    //     Fpdf::Cell(45, 5, number_format( $value[3]), $borderRow, 0, 'R', true);
    //     Fpdf::Ln(5);
    //     }

    //     Fpdf::setX($xPosition);
    //     Fpdf::SetTextColor(0,0,0);
    //     Fpdf::SetFont('Arial', 'B' , 7);
    //     Fpdf::SetFillColor(180,200,230);
    //     Fpdf::Cell(71, 5, "TOTAL", 1, 0, 'C', true);
    //     Fpdf::Cell(20, 5, $totalPeserta, $borderRow, 0, 'R', true);
    //     Fpdf::Cell(45, 5, number_format($totalPlafon), $borderRow, 0, 'R', true);
    //     Fpdf::Cell(45, 5, number_format($total_A), $borderRow, 0, 'R', true);
    //   } else {
    //     # code...
    //     Fpdf::SetTextColor(0,0,0);
    //     Fpdf::SetFont('Arial', '' , 6);
    //     Fpdf::SetFillColor(255,255,255);
    //     Fpdf::setX($xPosition);
    //     Fpdf::Cell(266, 5, "No Data Result", 1, 0, 'C', true);
    //   }

    //   Fpdf::Output('I','Report.pdf');
    //   return exit();
    // }

public function addHeaderDokumen($titleHeader1, $titleHeader2) {
        // Title
  Fpdf::SetTextColor(51,153,255);
  Fpdf::SetFont('Arial','B',12);
  Fpdf::Cell(0,5,$titleHeader1,0,1,'C');
  Fpdf::Cell(0,5,$titleHeader2,0,1,'C');
  Fpdf::Ln(2);
}


    // ######################
    // TEMPLATE SERTIFIKAT
    // ######################
public function setRupiah($var) {
      if(!function_exists("setRupiah")) {
        $var   =  number_format($var,2,',','.');
  
          return $var;
      }
  }

public function templateSertifikat($data_sertifikat, $data_leasing){

      // Set Page Size
  Fpdf::AddPage('P', 'A4');

      // Add Header Title
  $TitlePolis = "SERTIFIKAT";
  $TitleIndukPolis = "(e-Polis)";
      // $TitleStatement = "Sertifikat ini merupakan bagian tak terpisahkan dari Polis Induk yang disebutkan di bawah ini dan merupakan ringkasan dari obyek yang dipertanggungkan. \nPersyaratan Polis Induk ini berlaku untuk obyek yang dipertanggungkan di bawah ini :";

  $this->addHeaderSertifikat($TitlePolis, $TitleIndukPolis);

      // Sub title Header BOLD
      // =========== TERTANGGUNG ================
      // Fpdf::SetTextColor(0,0,0);
      // Fpdf::SetFont('Arial','B',11);
      // Fpdf::Cell(100,0,"TERTANGGUNG",0,1,'L');
      // Fpdf::Ln(5);

  $firstRowName = ([
    'No.Polis',
    'Berdasarkan Pada Polis Induk',
    'Atas Nama Pemegang Polis',
    'Bersama ini dinyatakan bahwa',
    'Tanggal Lahir',
    'Adalah Peserta Asuransi Kumpulan Dengan',
    'Jenis Asuransi',
        // 'Jumlah Tempat Duduk',
    'Uang Asuransi Awal',
    'Premi',

        // 'Cubic Capacity',
        // 'Location',
  ]
);
  $firstRowValue = ([
    $data_sertifikat->no_polis,
    $data_sertifikat->no_pks,
    $data_sertifikat->namaclient,
    $data_sertifikat->debitur,
    $data_sertifikat->tgl_lahir,
    '',
    $data_sertifikat->namaasuransi,
    'Menurun Rp.'.$this->setRupiah($data_sertifikat->plafon),
    'Sekaligus Rp. '.$this->setRupiah($data_sertifikat->premi),
    $data_sertifikat->namaclient.'( Debitur )',
  ]
        // "2",
);
  for ($i=0; $i < count($firstRowName); $i++) {
        # code...
    if($i>5){
      $x1 = Fpdf::SetX(20);
    }else{
      $x1 = Fpdf::SetX(15);
    }
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"",11);
    $x1;
    Fpdf::Cell(0,5,$firstRowName[$i],0);

    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"",11);
    Fpdf::SetX(70);
    Fpdf::Cell(0,5,':',0);

    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"",11);
    Fpdf::SetX(73);
    Fpdf::MultiCell(120,5,$firstRowValue[$i],0);


  }
  Fpdf::Ln(5);
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial',"",11);
  Fpdf::Cell(0,5,'Yang Berhak Menerima Uang Asuransi :'.$data_sertifikat->namaclient.' ( Debitur )',0);
  Fpdf::Ln(5);

  $firstRowName = ([
    'Sertifikat ini diterbitkan untuk dan atas nama tertanggung sebagai bukti dari penutupan',
    'Asuransi Jiwa Kredit Kumpulan',
    'Atas Nama Pemegang Polis',
    'Sertifikat ini tunduk pada syarat-syarat umum, syarat-syarat khusus dan tambahan lain',
    'yang dilekatkan dan merupakan bagian mutlak yang tidak dapat dipisahkan-pisahkan dari ',
    'Adalah Peserta Asuransi Kumpulan Dengan',
    'Polis Induk',
  ]
);
  $date = Carbon::now();
  for ($i=0; $i < count($firstRowName); $i++) {
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"I",9);
    Fpdf::SetX(15);
    Fpdf::Cell(0,5,$firstRowName[$i],0);
    Fpdf::Ln(4);
  }
  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial',"",11);
  // Fpdf::SetX(155);
  Fpdf::Ln(5);
  Fpdf::Cell(0,5,$date->format('d-M-Y'),0,0,'R');
  // Fpdf::Cell(0,5,$date->format('d-M-Y'),0);
  Fpdf::Ln(10);
  // Fpdf::SetX(150);
  Fpdf::SetFont('Arial',"B",11);
  Fpdf::Cell(0,5,$data_sertifikat->namaasuransi,0,0,'R');
  // Fpdf::Cell(0,5,$data_sertifikat->namaasuransi,0);
  Fpdf::Ln(12);
  Fpdf::SetX(0);
  Fpdf::Cell(0,0,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ',0,0,'L');
  Fpdf::Ln(10);  

  $TitlePolis = 'KWITANSI';
  $TitleIndukPolis = 'Premi Asuransi Jiwa Kredit';
  $this->addHeaderSertifikat($TitlePolis, $TitleIndukPolis);
  $firstRowName = ([
    'Sudah terima dari',
    'Uang sejumlah',
        // 'Atas Nama Pemegang Polis',
    'Atas Pembayaran',
        // 'Jumlah Tempat Duduk',
        // 'Uang Asuransi Awal',
        // 'Premi',
        // 'Cubic Capacity',
        // 'Location',
  ]
);
  $terbilang = $this->terbilang((int)$data_sertifikat->premi);
  $firstRowValue = ([
    $data_sertifikat->debitur,
    $terbilang.' rupiah',
    'Asuransi Jiwa Kredit .'.$data_sertifikat->namaasuransi.' dengan U.P Rp.'. $this->setRupiah($data_sertifikat->plafon).' No. Polis Induk .'.$data_sertifikat->polis_induk.' No. Sertifikat .'.$data_sertifikat->no_polis,
  ]
);
  for ($i=0; $i < count($firstRowName); $i++) {
        # code...
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"",11);
    if($i == 0){
      Fpdf::Cell(0,5,$firstRowName[$i],0);
    }else{
      Fpdf::Cell(0,5,$firstRowName[$i],0);

    }

    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"",11);
    Fpdf::SetX(70);
    if($i == 0){
      Fpdf::Cell(0,5,':',0);
    }else{
      Fpdf::Cell(0,5,':',0);
    }
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"",11);
    Fpdf::SetX(73);
    if($i == 0){
      Fpdf::MultiCell(120,5,$firstRowValue[$i],0);
    }else{
      Fpdf::MultiCell(120,5,$firstRowValue[$i],0);
    }
  }
  Fpdf::Ln(10);
  $firstRowName = ([
    "Premi",
    "Extra Premi",
    "Biaya ADM",
    "Periode",
  ]
);
  $firstRowValue = ([
    "Rp. ".$this->setRupiah($data_sertifikat->premi),
    "Rp. 0",
    "Rp. 0",
    $data_sertifikat->tgl_awal." s/d ". $data_sertifikat->tgl_akhir,
  ]
);
  $geser = 15;
  for ($i=0; $i < count($firstRowName); $i++) {
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"B",11);
    Fpdf::SetX($geser);
    Fpdf::Cell(0,0,$firstRowName[$i],0);
    $geser +=30;
  }
  $geser2 = 15;
  Fpdf::Ln(10);
  for ($i=0; $i < count($firstRowValue); $i++) {
    Fpdf::SetTextColor(0,0,0);
    Fpdf::SetFont('Arial',"",11);
    Fpdf::SetX($geser2);
    Fpdf::Cell(0,0,$firstRowValue[$i],0);
    $geser2 +=30;
  }
  Fpdf::Ln(15);
      // TANDA TANGAN

  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial',"",11);
  // Fpdf::SetX(155);
  // Fpdf::Cell(0,5,$date->format('d-M-Y'),0);
  Fpdf::Cell(0,5,$date->format('d-M-Y'),0,0,'R');
  Fpdf::Ln(15);

  Fpdf::SetTextColor(0,0,0);
  Fpdf::SetFont('Arial',"B",11);
  // Fpdf::SetX(150);
  Fpdf::Cell(0,5,$data_sertifikat->namaasuransi,0,0,'R');
  // Fpdf::Cell(27, $rowHeader, 'DIBAYAR', $borderColumn, 0, 'C', true);
      // FOOTER
      // $this->Footer('1', '2');

  Fpdf::Output('I','e-polis-'.$data_sertifikat->debitur.'.pdf');
  exit();
}

public function klaim()
{
  $user = Auth::user();
  $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
  $nama = $jenisuser->id;
  switch ($nama) {
    case 3:
          // $broker =     DB::table('broker')->where('kode_broker', $user->perusahaan)->get();
    $client = DB::table('client')->get();
    $mst_client = DB::table('mst_client')->get();
    $asuransi = DB::table('asuransi')->where('kode_asu',$user->perusahaan)->get();
    break;
    case 1:
    $asuransi = DB::table('asuransi')->get();
    $mst_client = DB::table('mst_client')->where('kode_pusat',$user->perusahaan)->get();
    if(count($mst_client) >0 ){
      $client = DB::table('client')->where('kode_pusat',$user->perusahaan)->get();
    }else{
      $client = DB::table('client')->where('kode_client',$user->perusahaan)->get();
    }
    break;
    default:
    $asuransi = DB::table('asuransi')->get();
    $client = DB::table('client')
          // ->leftJoin('produksi_ajk','client.kode_client','=','produksi_ajk.kode_client')
          // ->select('kode_client','nama')
          // ->groupBy('kode_client')
    ->get();
          // $s

    $mst_client = DB::table('mst_client')->get();
    $broker = DB::table('broker')->where('kode_broker', $user->perusahaan)->get();
    break;
  }

      // dd($asuransi);
  return view ( 'Viewer/viewerdokumenklaimreport' ,[
    'asuransi' => $asuransi,
    'user' => $user,
    'client' => $client,
  ]
);
      // return back();
}
public function refund()
{
  $user = Auth::user();
  $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
  $nama = $jenisuser->id;
  switch ($nama) {
    case 3:
          // $broker =     DB::table('broker')->where('kode_broker', $user->perusahaan)->get();
    $client = DB::table('client')->get();
    $mst_client = DB::table('mst_client')->get();
    $asuransi = DB::table('asuransi')->where('kode_asu',$user->perusahaan)->get();
    break;
    case 1:
    $asuransi = DB::table('asuransi')->get();
    $mst_client = DB::table('mst_client')->where('kode_pusat',$user->perusahaan)->get();
    if(count($mst_client) >0 ){
      $client = DB::table('client')->where('kode_pusat',$user->perusahaan)->get();
    }else{
      $client = DB::table('client')->where('kode_client',$user->perusahaan)->get();
    }
    break;
    default:
    $asuransi = DB::table('asuransi')->get();
    $client = DB::table('client')
          // ->leftJoin('produksi_ajk','client.kode_client','=','produksi_ajk.kode_client')
          // ->select('kode_client','nama')
          // ->groupBy('kode_client')
    ->get();
          // $s

    $mst_client = DB::table('mst_client')->get();
    $broker = DB::table('broker')->where('kode_broker', $user->perusahaan)->get();
    break;
  }

      // dd($asuransi);
  return view ( 'Viewer/viewerdokumenrefundreport' ,[
    'asuransi' => $asuransi,
    'user' => $user,
    'client' => $client,
  ]
);
      // return back();
}

public function reloadrefund()
{
  
  $user = Auth::user();
  $posisiuser = $user->posisi;
  $kodeposisi = $user->perusahaan;

  if($posisiuser == 3){
    $whereCondition = [
      ['b.kode_asu', $kodeposisi],
      ['b.sts_refund', 1],
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
      $whereCondition = [
        ['b.sts_refund', 1],
      ];
      $kode = 2;
    }else{
      $whereCondition = [
        ['b.kode_client', $kodeposisi],
        ['b.sts_refund', 1],
      ];
      $kode = 3;
    }
  }else{
    $whereCondition = [
      ['b.sts_refund', 1],
    ]; 
    $kode = 4;
  }

  if($kode == 2){
    $refund = DB::table('refund as a')
    ->select('a.id_refund','b.no_polis','c.nama as namaasuransi','d.nama as namaprod','b.kode_okup',
            'b.no_pk','f.nama as namacabang','b.debitur','b.pekerjaan','b.tgl_lahir','b.umur','b.tgl_awal','b.tgl_akhir',
            'b.tenor','b.rate','b.plafon','b.premi','a.tgl_lapor','b.tgl_pelunasan','a.nilai_refund','a.tgl_bayar','a.dibayar','a.keterangan'
            ,'g.okupasi'
            )
    ->leftJoin('produksi_ajk as b', 'b.id_prod_ajk', '=', 'a.id_prod_ajk')
    ->leftJoin('asuransi as c', 'c.kode_asu', '=', 'b.kode_asu')
    ->leftJoin('jns_produksi as d', 'd.kode_prod', '=', 'c.kode_prod')
    ->leftJoin('posisi_data as e', 'e.posisi', '=', 'b.posisi')
    ->leftJoin('client as f', 'f.kode_client', '=', 'b.kode_client')
    ->leftJoin('rate as g', 'g.kode_okup', '=', 'b.kode_okup')
    ->whereIn('b.kode_client', $kode_client)
    ->where($whereCondition)
    // ->whereBetween('tgl_aksep', array($start, $end))
    ->get();
  }else{
        // dd($whereCondition);
        $refund = DB::table('refund as a')
        ->select('a.id_refund','b.no_polis','c.nama as namaasuransi','d.nama as namaprod','b.kode_okup',
                'b.no_pk','f.nama as namacabang','b.debitur','b.pekerjaan','b.tgl_lahir','b.umur','b.tgl_awal','b.tgl_akhir',
                'b.tenor','b.rate','b.plafon','b.premi','a.tgl_lapor','b.tgl_pelunasan','a.nilai_refund','a.tgl_bayar','a.dibayar','a.keterangan'
                ,'g.okupasi'
                )
        ->leftJoin('produksi_ajk as b', 'b.id_prod_ajk', '=', 'a.id_prod_ajk')
        ->leftJoin('asuransi as c', 'c.kode_asu', '=', 'b.kode_asu')
        ->leftJoin('jns_produksi as d', 'd.kode_prod', '=', 'c.kode_prod')
        ->leftJoin('posisi_data as e', 'e.posisi', '=', 'b.posisi')
        ->leftJoin('client as f', 'f.kode_client', '=', 'b.kode_client')
        ->leftJoin('rate as g', 'g.kode_okup', '=', 'b.kode_okup')
        ->where($whereCondition)
        // ->whereBetween('tgl_aksep', array($start, $end))
        ->get();
  }

  return datatables($refund)->toJson();

}

public function penyebut($nilai) {
    // $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " ". $huruf[$nilai];
  } else if ($nilai <20) {
    $temp = $this->penyebut($nilai - 10). " belas";
  } else if ($nilai < 100) {
    $temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . $this->penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . $this->penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
  }     
  return $temp;
}

public function terbilang($nilai) {
  $x = $this->penyebut($nilai);
  if($nilai<0) {
    $hasil = "minus ". trim($x);
  } else {
    $hasil = trim($x);
  }         
  return $hasil;
}
    // public function reloadklaim(){
    //   $user = Auth::user();

    //   $klaim = Klaim::join('table_produksi', 'table_klaim.no_pin', '=', 'table_produksi.no_pin')->get();
    //   return $klaim;

    // }

    // public function cetakKlaim($no_pin)
    // {
    //   // $no_pin = $request->no_pin;

    //   $data_sertifikat = DB::table('table_produksi')->where('no_pin', $no_pin)->get();
    //   $data_leasing = DB::table('master_leasing')->where('id_leasing', $data_sertifikat[0]->id_master_leasing)->get();

    //   $this->templateSertifikat($data_sertifikat[0], $data_leasing[0]);

    // }
}

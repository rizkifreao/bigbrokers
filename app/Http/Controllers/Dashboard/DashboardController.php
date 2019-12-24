<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function welcome()
    {
    return view ( 'welcome' );
        
    }
    
    public function index()
    {
      $user = Auth::user();
      
      $date = date('Y-m-d');
      $m = date('m',strtotime($date));
      $y = date('Y',strtotime($date));
      $dokumens = DB::table('produksi_ajk')
                  // ->whereYear('tgl_aksep', '=', date('Y'))
                  // ->whereMonth('tgl_aksep', '=', date('m'))
                  ->get();
      $dokumenklaims = DB::table('klaim_ajk')
                      ->join('produksi_ajk', 'klaim_ajk.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
                      ->select('klaim_ajk.*','produksi_ajk.*')
                      // ->whereYear('tgl_aksep', '=', date('Y'))
                      // ->whereMonth('tgl_aksep', '=', date('m'))
                      ->get();
      // dd($dokumens, $dokumenklaims);
      $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
      $posisiuser = $user->posisi;
      $kodeposisi = $user->perusahaan;

      if($posisiuser == 3){
          $whereCondition = [
                                ['produksi_ajk.kode_asu', $kodeposisi],
                            ];
          $whereCondition2 = [
                                ['produksi_ajk.kode_asu', $kodeposisi],
                                ['produksi_ajk.sts_klaim', 1],
                            ];                      

          $produk = DB::table('produksi_ajk')
      ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
      ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
      // ->select('produksi_ajk.*','asuransi.nama as namaprod' ,'client.nama as namaclient')
      ->select('produksi_ajk.*','client.nama as namaclient','asuransi.nama as namaprod')
      // ->whereYear('tgl_aksep', '=', date('Y'))
      // ->whereMonth('tgl_aksep', '=', date('m'))
      ->where($whereCondition)              
      ->get();

        $klaim = DB::table('klaim_ajk')
    ->join('produksi_ajk', 'klaim_ajk.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
    ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->select('klaim_ajk.*','klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar as tglbayar','produksi_ajk.*','asuransi.*','jns_produksi.nama as namaprod','client.kode_pusat','posisi_data.nama as namaposisi','client.nama as namaclient','asuransi.nama as namaasuransi')
    // ->whereYear('tgl_aksep', '=', date('Y'))
    // ->whereMonth('tgl_aksep', '=', date('m'))
    ->where($whereCondition)
    ->get();
        $x4 = "Total Peserta Bank";
        $arrayke1 = 4;
        }elseif($posisiuser == 1 ){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['client.kode_pusat', $kodeposisi],
                              ];
            $whereCondition2 = [
                                ['client.kode_pusat', $kodeposisi],
                                ['produksi_ajk.sts_klaim', 1],
                            ];   
          $produk = DB::table('produksi_ajk')
      ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
      ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
      ->select('produksi_ajk.*','client.nama as namaclient','asuransi.nama as namaprod')
      // ->select('produksi_ajk.*','asuransi.nama as namaprod', 'client.nama as namaclient')
      // ->whereYear('tgl_aksep', '=', date('Y'))
      // ->whereMonth('tgl_aksep', '=', date('m'))
      ->where($whereCondition)              
      ->get();
          $klaim = DB::table('klaim_ajk')
    ->join('produksi_ajk', 'klaim_ajk.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
    ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->select('klaim_ajk.*','klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar as tglbayar','produksi_ajk.*','asuransi.*','jns_produksi.nama as namaprod','client.kode_pusat','posisi_data.nama as namaposisi','asuransi.nama as namaasuransi','client.nama as namaclient')
    // ->whereYear('tgl_aksep', '=', date('Y'))
    // ->whereMonth('tgl_aksep', '=', date('m'))
    ->where($whereCondition2)
    ->get();
        $x4 = "Total Peserta Cabang Bank";
        $arrayke1 = 2;
          
          }else{
            $whereCondition = [
                                ['produksi_ajk.kode_client', $kodeposisi],
                              ];
            $whereCondition2 = [
                                ['produksi_ajk.kode_client', $kodeposisi],
                                ['produksi_ajk.sts_klaim', 1],
                            ];  
          $klaim = DB::table('klaim_ajk')
    ->join('produksi_ajk', 'klaim_ajk.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
    ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->select('klaim_ajk.*','klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar as tglbayar','produksi_ajk.*','asuransi.*','jns_produksi.nama as namaprod','client.kode_pusat','posisi_data.nama as namaposisi','client.nama as namaclient','asuransi.nama as namaasuransi')
    // ->whereYear('tgl_aksep', '=', date('Y'))
    // ->whereMonth('tgl_aksep', '=', date('m'))
    ->where($whereCondition2)
    ->get();                    
          $produk = DB::table('produksi_ajk')
      ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
      ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
      ->select('produksi_ajk.*','client.nama as namaclient','asuransi.nama as namaprod' )
      // ->whereYear('tgl_aksep', '=', date('Y'))
      // ->whereMonth('tgl_aksep', '=', date('m'))
      ->where($whereCondition)              
      ->get();
        $x4 = "Total Peserta Asuransi";
        $arrayke1 = 3;
        
    }
      
        

        }else{
          $whereCondition = [
                        ['produksi_ajk.kode_broker', $kodeposisi],
            
                            ];
            $whereCondition2 = [
              ['produksi_ajk.kode_broker', $kodeposisi],
              ['produksi_ajk.sts_klaim', 1],
                            ];                      
          $produk = DB::table('produksi_ajk')
      ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
      ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
      ->select('produksi_ajk.*','client.nama as namaclient','asuransi.nama as namaprod')
      // ->whereBetween('tgl_awal', array($start, $end))
      // ->whereYear('tgl_aksep', '=', date('Y'))
      // ->whereMonth('tgl_aksep', '=', date('m'))
      ->where($whereCondition)              
      ->get();

        $klaim = DB::table('klaim_ajk')
    ->join('produksi_ajk', 'klaim_ajk.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    ->join('asuransi', 'produksi_ajk.kode_asu', '=', 'asuransi.kode_asu')
    ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->select('klaim_ajk.*','klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar as tglbayar','produksi_ajk.*','asuransi.*','jns_produksi.nama as namaprod','client.nama as namaclient','client.kode_pusat','posisi_data.nama as namaposisi','asuransi.nama as namaasuransi','client.nama as namaclient')
    // ->whereYear('tgl_aksep', '=', date('Y'))
    //   ->whereMonth('tgl_aksep', '=', date('m'))
      ->where($whereCondition2)
    ->get();
        $x4 = "Total Peserta Bank";
        $arrayke1 = 5;
        }
        
    if(!empty($produk)){
      $grouped = $arrayke1 == 3 ? $this->grupby($produk, "namaprod") : $this->grupby($produk, "namaclient");
      // $grouped = ;
      $group_tgl_awal = array_keys($this->grupby($produk, "tgl_awal"));
    }

    //   foreach ($produk as $key => $value) {
    //     foreach ($value as $key2 => $valued) {
    //       # code...
    //       $result[$key][] = $valued;

    //     }
    //   }
      // dd($produk);
        // $grouped = $this->array_group_by($data, function($i){  return $i[0]; });
        $x = 0;
        $y = 0;
        $z = 0;
        $a = [];
        $b = [];
        $tc = [];
        $tz = [];
        $ta = [];
        $tcc = 0;
        $tzz = 0;
        $taa = 0;
        $totalGrandPeserta = 0;
        $totalGrandPlafon = 0;
        $totalGrandPremi = 0;
        $totalPeserta = 0;
        $totalPlafon = 0;
        $premi = 0;
        // $grouped = $this->array_group_by($result, function($i){  return $i[54]; });
        // dd($grouped, $arrayke1);
        // $group_tgl_awal = array_keys($this->array_group_by($result, function($i){  return $i[19]; }));
        $array_tahun = [];
        foreach ($group_tgl_awal as $key3 => $grouptahun) {
          # code...
            $tahun = (int)substr($grouptahun, 0, 4);
            if(!in_array($tahun, $array_tahun)){
            $array_tahun[] = $tahun;
            }

        }
        sort($array_tahun);
        for ($u=0; $u < count($array_tahun) ; $u++) { 
          # code...
          $arraytahun[] = $array_tahun[$u];
        }
        $arrayMonthValue = [0,0,0,0,0,0,0,0,0,0,0,0];
        $nama_client = array_keys($grouped);
        $nilai_tahunperbulan = array();
        foreach ($nama_client as $key_client => $value_client) {
          foreach ($arraytahun as $keywe => $valuewe) {
            # code...
            $nilai_tahunperbulan[$value_client][$valuewe] = $arrayMonthValue;
          }
        }
        $t_peserta = [];
        $t_premi = [];
        $t_klaim =[];

        foreach ($grouped as $key => $value) {
          $a[] = $key;
          // $groupedClient = $this->array_group_by($value, function($i){  return $i[54]; });
          if($arrayke1 == 3){
            $groupedClient = $this->grupby($value, "namaprod");
          }else{
            $groupedClient = $this->grupby($value, "namaclient");
          }
          foreach ($groupedClient as $key2 => $value2) {
            foreach ($value2 as $key3 => $value3) {
          // dd($value[$key3]);
              $totalPeserta += 1;
              $totalPlafon += $value[$key3]->plafon;
              $premi += $value[$key3]->premi;
              // $namaclient = $value[$key3][2];
              $namanya = $key2;
              // dd($namanya, $key2);
              $bulanke = (int)substr($value[$key3]->tgl_awal, 5, 2);
              $tahunke = (int)substr($value[$key3]->tgl_awal, 0, 4);
              $cv = $value[$key3]->premi;
              // $nilai_tahunperbulan[$namanya][$tahunke][$bulanke-1] =0;
              $nilai_tahunperbulan[$namanya][$tahunke][$bulanke-1] += (int)$cv;
            }
          // dd($totalPlafon);
          $x += $totalPeserta;
          $y += $totalPlafon;
          $z += $premi;
          $totalPeserta = 0;
          $totalPlafon = 0;
          $premi = 0;
        }
        $tc[] = $x;
        $tz[] = $y;
        $ta[] = $z;

        $t_peserta[] = $x;
        $t_premi[] = $y;
        $t_klaim[] = $z;
        
        $totalGrandPeserta += $x;
        $totalGrandPlafon += $y;
        $totalGrandPremi += $z;
        
        
        $x = 0;
        $y = 0;
        $z = 0;

      }
      // dd($x, $t_peserta);
        $vtotal = [$totalGrandPeserta,$totalGrandPlafon, $totalGrandPremi ];
        $x1 = json_encode($a);
        $x2 = json_encode($tc);
        $x3 = json_encode($tz);
        $y1 = json_encode($ta);

      // $resultklaim = array();
      // foreach ($klaim as $key11 => $valueklaim) {
      //   foreach ($valueklaim as $key2 => $valuedklaim) {
      //     # code...
      //     $resultklaim[$key11][] = $valuedklaim;

      //   }
      // }
      $groupedd = [];
      if(count($klaim)>0){
        if($arrayke1 == 1 || $arrayke1 == 5){
          $groupedd = $this->grupby($klaim, "namaasuransi");
          // $groupedd = $this->array_group_by($resultklaim, function($i){  return $i[63]; });
        }else if($arrayke1 == 3){
          $groupedd = $this->grupby($klaim, "namaasuransi");
          // $groupedd = $this->array_group_by($resultklaim, function($i){  return $i[74]; });
        // dd($groupedd);
        }else if($arrayke1 == 4){
          $groupedd = $this->grupby($klaim, "namaclient");
          // $groupedd = $this->array_group_by($resultklaim, function($i){  return $i[73]; });
        }else{
          $groupedd = $this->grupby($klaim, "namaclient");
          // $groupedd = $this->array_group_by($resultklaim, function($i){  return $i[71]; });
        } 
      } 
        // $grouped = $this->array_group_by($data, function($i){  return $i[0]; });
        $xklaim = 0;
        $yklaim = 0;
        $zz = 0;
        $aa = [];
        $bb = [];
        $tcklaim = [];
        $tzklaim = [];
        $taa2 = [];
        $tccc = 0;
        $tzzz = 0;
        $taaa = 0;
        $totalGrandPesertaa = 0;
        $totalGrandklaim = 0;
        $totalGrandPremii = 0;
        $totalPesertaklaim = 0;
        $nilaiklaim = 0;
        $premii = 0;


        if(count($groupedd)>0){
        foreach ($groupedd as $key12 => $valueklaimm) {
          if($arrayke1 == 1 || $arrayke1 == 5){
            $groupedClientt = $this->grupby($valueklaimm, "namaclient");
          }else if($arrayke1 == 3 ){
            $groupedClientt = $this->grupby($valueklaimm, "namaasuransi");
          }else{
            $groupedClientt = $this->grupby($valueklaimm, "namaclient");
          }
            foreach ($groupedClientt as $key2 => $value22) {
            foreach ($value22 as $key13 => $value33) {
              if($valueklaimm[$key13]->kode_asu !='' || $valueklaimm[$key13]->kode_asu != null){
                $totalPesertaklaim += 1;
                $nilaiklaim += $valueklaimm[$key13]->nilai_klaim;
              }
            }
          $xklaim += $totalPesertaklaim;
          $yklaim += $nilaiklaim;
          // $zz += $premii;
          $totalPesertaklaim = 0;
          $nilaiklaim = 0;
        }
          // dd($xx);
        if($yklaim != ''){
          $aa[] = $key12;
        $tcklaim[] = $xklaim;
        $tzklaim[] = $yklaim;
        }
        // $taa2[] = $zz;
            // dd($tzz2);

        $totalGrandPesertaa += $xklaim;
        $totalGrandklaim += $yklaim;
        // $totalGrandPremi += $zz;
        
        
        $xklaim = 0;
        $yklaim = 0;
        // $zz = 0;

      }
    }
      
      // dd($nilai_tahunperbulan);
      $number=0;
      $dataa = [];
      foreach ($nilai_tahunperbulan as $keydiagram => $valuediagram) {
        # code...
        // $xb = [0,0,0,0,0,0,0,0,0,0,0,0];
        // $xb = $valuediagram['2019'];
        // $dataa[$number]['datax'] = [0,0,0,0,0,0,0,0,0,0,0,0];
        // $dataa[$number]['datax'] =$valuediagram['2019'];
        foreach($valuediagram as $bn => $bc){
              $nilaibulan = 1;
            foreach($bc as $bcc => $bcd){
              $lastday =null;
              $lastday = date('t',strtotime($bn.'-'.$nilaibulan));
              $ttt = strtotime($bn.'-'.$bcc.'-'.$lastday);
              $ttt2 = (int)$ttt*1000;
              $bc[$bcc] = [$ttt2,$bcd];
              $nilaibulan++;
            }
            $dataa[$number] = array(
              'name'    =>    $keydiagram,
              'data'    =>   $bc,
              );
        }
        $number++;
        
      }
      $vtotall = [$totalGrandPesertaa,$totalGrandklaim];
        $xj1 = json_encode($aa);
        $xj2 = json_encode($tcklaim);
        $xj3 = json_encode($tzklaim);
        // $yj1 = json_encode($taa2);
        $xj4 = "Total Peserta Bank";
        $xj5 = $aa;
        $lastDate = "2017-07-20";
        
      return view ( 'dashboard', 
        ['user' => $user, 'dokumens' => $dokumens, 'nama_perusahaan' => $user->nama_lengkap, 'namapeserta' => $x1, 'namapeserta2' => $xj5, 'logo_pt' => 'xyz', 't_peserta' => $t_peserta, 't_premi' => $t_premi, 't_klaim' => $t_klaim, 'namapesertaklaim' => $xj1, 'totalpeserta' => $x2, 'totalplafon' => $y1, 'totalklaim' => $xj3, 'totalpremi' => $x3, 'totalgrand' => $vtotal, 'nama' => $x4, 'nilai_tahunperbulan' => json_encode($dataa)]
        // $dataDashboard 
      );

    if ($user != "") return view ( 'dashboard' );
    else return "<script>window.location.href = \"/\";</script>";
    }
    
    public function grupby($array, $namevariabel){
      foreach($array as $key2 => $valued){
        $grouped[$valued->$namevariabel][] = $valued;
      }
      return  $grouped;
    }

     public function array_group_by(array $arr, callable $key_selector) {
      $result = array();
      foreach ($arr as $i) {
        $key = call_user_func($key_selector, $i);
        $result[$key][] = $i;

      }  
      return $result;
    }
    public function getDataDashboard($dokumens,$dokumenklaims, $user) {

      $data = $this->hitungTotalPremi($dokumens, $dokumenklaims, $user);

      return $data;
    }

    // public function hitungTotalPremi($dokumens, $dokumenklaims, $user)
    // {
    //   $totalPremi = 0;
    //   $totalPremi1 = 0;
    //   $totalPremi2 = 0;
    //   $totalPremi3 = 0;

    //   $totalPeserta = 0;
    //   $totalPesertaKlaim = 0;
    //   $totalPeserta1 = 0;
    //   $totalPeserta2 = 0;
    //   $totalPeserta3 = 0;
    //   $totalPesertaKlaim1 = 0;
    //   $totalPesertaKlaim2 = 0;
    //   $totalPesertaKlaim3 = 0;

    //   $index = 0;
    //   $indexKlaim = 0;
    //   $arrayMonthValue = [0,0,0,0,0,0,0,0,0,0,0,0];
    //   $arrayMonthKlaimValue = [0,0,0,0,0,0,0,0,0,0,0,0];
    //   $arrayMonthValueKlaim = [0,0,0,0,0,0,0,0,0,0,0,0];
    //   // $user = Auth::user();
      
    //   $username = $user->name;
    //   $userArray = $user->toArray();
    //   // dd($userArray[0]);
      
    //   foreach ($userArray as $key => $value) {
    //     $x = $value[10];
    //   }
    //   for ($i=10; $i <count($userArray) ; $i++) { 

    //   }
    //   // dd($x);
    //   foreach ($dokumens as $key => $value) {
    //     // ___DEFINE GET DATA BY USER___
    //     if ($username == 'apf' || $username == 'bsm'){
    //       $idPeserta1 = 'AS001';
    //       $idPeserta2 = 'AS002';
    //       $idPeserta3 = 'AS003';
    //       $namaPeserta1 = 'KSK';
    //       $namaPeserta2 = 'MAG';
    //       $namaPeserta3 = 'VIDEI';
    //       $value_master = $value->id_master_asuransi;
    //     }
    //     else
    //     if ($username == 'ksk' || $username == 'mag' || $username == 'videi' ) {
    //       $idPeserta1 = 'LS001';
    //       $idPeserta2 = 'LS002';
    //       $idPeserta3 = 'LS003';
    //       $namaPeserta1 = 'BSM';
    //       $namaPeserta2 = 'APF';
    //       $namaPeserta3 = 'VIDEI';
    //       $value_master = $value->id_master_leasing;
    //     }
    //     else
    //     if ($username == 'superuser' || $username == 'admin') {
    //       if ($value->id_master_leasing == 'LS002' || $value->id_master_leasing == 'LS001'){
    //         $idPeserta1 = 'AS001';
    //         $idPeserta2 = 'AS002';
    //         $idPeserta3 = 'AS003';
    //         $namaPeserta1 = 'KSK';
    //         $namaPeserta2 = 'MAG';
    //         $namaPeserta3 = 'VIDEI';
    //         $value_master = $value->id_master_asuransi;
    //       }else
    //       if ($value->id_master_asuransi == 'AS001' || $value->id_master_asuransi == 'AS002' ) {
    //         $idPeserta1 = 'LS001';
    //         $idPeserta2 = 'LS002';
    //         $idPeserta3 = 'LS003';
    //         $namaPeserta1 = 'BSM';
    //         $namaPeserta2 = 'APF';
    //         $value_master = $value->id_master_leasing;
    //       }
    //     }
    //     // ___ TOTAL PREMI ___
    //     $totalPremi += $value->premi;
    //     if ($value_master == $idPeserta1) {
    //       $totalPremi1 += $value->premi;
    //     }elseif ($value_master == $idPeserta2) {
    //       $totalPremi2 += $value->premi;
    //     }elseif ($value_master == $idPeserta3) {
    //       $totalPremi3 += $value->premi;
    //     }

    //     // ___ TOTAL PESERTA ___
    //     $totalPeserta += 1;
    //     if ($value_master == $idPeserta1) {
    //       $totalPeserta1 += 1;
    //     }elseif ($value_master == $idPeserta2) {
    //       $totalPeserta2 += 1;
    //     }elseif ($value_master == $idPeserta3) {
    //       $totalPeserta3 += 1;
    //     }

    //     // ___ GET SORT BY DATE ___
    //     $month = (int)substr($value->tgl_booking, 5, 2);

    //     if(!empty($arrayMonthValue[$month-1])){
    //       $valueIndex = $arrayMonthValue[$month-1];
    //       $valueIndex += $value->premi;
    //     } else {
    //       # code...
    //       $valueIndex = $value->premi;
    //     }

    //     $arrayMonthValue[$month-1] = $valueIndex;

    //     $index++;
    //   }

    //   foreach ($dokumenklaims as $key => $value) {
    //     // ___DEFINE GET DATA BY USER___
    //     if ($username == 'apf' || $username == 'bsm'){
    //       $idPeserta1 = 'AS001';
    //       $idPeserta2 = 'AS002';
    //       $namaPeserta1 = 'KSK';
    //       $namaPeserta2 = 'MAG';
    //       $value_master = $value->id_master_asuransi;
    //     }
    //     elseif ($username == 'ksk' || $username == 'mag' || $username == 'videi' ) {
    //       $idPeserta1 = 'LS001';
    //       $idPeserta2 = 'LS002';
    //       $idPeserta3 = 'LS002';
    //       $namaPeserta1 = 'BSM';
    //       $namaPeserta3 = 'VIDEI';
    //       $value_master = $value->id_master_leasing;
    //     }
    //     elseif ($username == 'superuser' || $username == 'admin' ) {
    //       if ($value->id_master_leasing == 'LS002' || $value->id_master_leasing == 'LS001'){
    //         $idPeserta1 = 'AS001';
    //         $idPeserta2 = 'AS002';
    //         $idPeserta3 = 'AS003';
    //         $namaPeserta1 = 'KSK';
    //         $namaPeserta2 = 'MAG';
    //         $namaPeserta3 = 'VIDEI';
    //         $value_master = $value->id_master_asuransi;
    //       }
    //       elseif ($value->id_master_asuransi == 'AS001' || $value->id_master_asuransi == 'AS002' ) {
    //         $idPeserta1 = 'LS001';
    //         $idPeserta2 = 'LS002';
    //         $namaPeserta1 = 'BSM';
    //         $namaPeserta2 = 'APF';
    //         $value_master = $value->id_master_leasing;
    //       }
    //     }
    //     // ___ TOTAL PREMI ___
    //     $totalPremi += $value->premi;
    //     if ($value_master == $idPeserta1) {
    //       $totalPremi1 += $value->premi;
    //     }elseif ($value_master == $idPeserta2) {
    //       $totalPremi2 += $value->premi;
    //     }elseif ($value_master == $idPeserta3) {
    //       $totalPremi3 += $value->premi;
    //     }

    //     // ___ TOTAL PESERTA ___
    //     $totalPesertaKlaim += 1;
    //     if ($value_master == $idPeserta1) {
    //       $totalPesertaKlaim1 += 1;
    //     }elseif ($value_master == $idPeserta2) {
    //       $totalPesertaKlaim2 += 1;
    //     }elseif ($value_master == $idPeserta3) {
    //       $totalPesertaKlaim3 += 1;
    //     }

    //     // ___ GET SORT BY DATE ___
    //     if($value->tanggal_approve_klaim != null){
    //       $month = (int)substr($value->tanggal_approve_klaim, 5, 2);
    //     }

    //     if(!empty($arrayMonthValue[$month-1])){
    //       $valueIndex = $arrayMonthValueKlaim[$month-1];
    //       $valueIndex += $value->nilai_pengajuan_klaim;
    //     } else {
    //       # code...
    //       $valueIndex = $value->nilai_pengajuan_klaim;
    //     }

    //     $arrayMonthValueKlaim[$month-1] = $valueIndex;

    //     $index++;
    //   }


    //   $totalPembagianAsuransiKSK = round(($totalPeserta1 /$totalPeserta) * 100, 2);
    //   $totalPembagianAsuransiMAG = round(($totalPeserta2 /$totalPeserta) * 100, 2);
    //   $totalPembagianAsuransiVIDEI = round(($totalPeserta3 /$totalPeserta) * 100, 2);
    //   $totalPembagianKlaimKSK = round(($totalPesertaKlaim1 /$totalPesertaKlaim) * 100, 2);
    //   $totalPembagianKlaimMAG = round(($totalPesertaKlaim2 /$totalPesertaKlaim) * 100, 2);

    //   // dd($arrayMonthValueKlaim);
    //   $data = array(
    //     'user' => $userArray,
    //     'totalPremi' => number_format($totalPremi),
    //     'totalPremiKSK' => number_format($totalPremi1),
    //     'totalPremiMAG' => number_format($totalPremi2),
    //     'totalPremiVIDEI' => number_format($totalPremi3),
    //     'totalPeserta' => $totalPeserta,
    //     'totalPesertaKSK' => $totalPeserta1,
    //     'totalPesertaMAG' => $totalPeserta2,
    //     'totalPesertaVIDEI' => $totalPeserta3,
    //     'totalPesertaKlaimKSK' => $totalPesertaKlaim1,
    //     'totalPesertaKlaimMAG' => $totalPesertaKlaim2,
    //     'totalPesertaKlaimVIDEI' => $totalPesertaKlaim3,
    //     'totalPembagianAsuransiKSK' => $totalPembagianAsuransiKSK,
    //     'totalPembagianAsuransiMAG' => $totalPembagianAsuransiMAG,
    //     'totalPembagianAsuransiVIDEI' => $totalPembagianAsuransiVIDEI,
    //     'totalPembagianKlaimKSK' => number_format($totalPembagianKlaimKSK),
    //     'totalPembagianKlaimMAG' => number_format($totalPembagianKlaimMAG),
    //     'namaPeserta1' => $namaPeserta1,
    //     'namaPeserta2' => $namaPeserta2,
    //     'namaPeserta3' => $namaPeserta3,
    //     'month' => json_encode($arrayMonthValue),
    //     'monthKlaim' => json_encode($arrayMonthKlaimValue),
    //   );  

    //   // dd($arrayMonthKlaimValue);
    //   return $data;
    // }

    public function hitungDataByDate ($date) {

    }

    public function template()
    {
        $user = Auth::user();
        $akses_user = DB::table('akses')
            ->join('akses_user', 'akses.id', '=', 'akses_user.akses')
            ->select(
                'akses.id',
                'akses.icon',
                'akses.akses'
            )
            ->where('akses.parent', '=', '0')
            ->where('akses_user.name', '=', $user->name)
            ->get();
        $akses_user2 = DB::table('akses_user')
            ->join('akses', 'akses_user.akses', '=', 'akses.id')
            ->where('name', '=', $user->name)
            ->get();
        // dd($akses_user ,$akses_user2);
        return view('template.template', ['data' => $akses_user, 'akses_user2' => $akses_user2, 'nama_perusahaan' => $user->nama_lengkap, 'date' => $user->nama_lengkap]);
    }
}

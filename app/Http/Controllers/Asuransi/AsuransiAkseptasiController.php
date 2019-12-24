<?php

namespace App\Http\Controllers\Asuransi;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Markdown;
use DateTime;
class AsuransiAkseptasiController extends Controller
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
      $whereCondition2 = [
        ['a.kode_asu', $kodeposisi],
        ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',3],
      ];                      
      $whereCondition = [
        ['kode_client', $kodeposisi],
      ]; 
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $valuebutton = "Kirim Ke Admin";  
        $whereCondition2 = [
          ['b.kode_pusat', $kodeposisi],
          ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',2],
        ];   
        $whereCondition = [
          ['kode_client', $kodeposisi],
        ];  
      }else{
        $valuebutton = "Kirim Ke Pusat";   
        $whereCondition2 = [
          ['b.kode_client', $kodeposisi],
          ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',2],
        ];  
        $whereCondition = [
          ['kode_client', $kodeposisi],
        ];
      }

    }else{
      $valuebutton = "Kirim Ke Asuransi";  
      $whereCondition2 = [
          ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',2],
      ];        
      $whereCondition =[];              
    }
    // dd($whereCondition2);
    $dokumens = DB::table('produksi_ajk as a')
    ->select('a.*','d.okupasi','b.nama as namacabang','c.nama')
    ->leftJoin('client as b', 'a.kode_client','b.kode_client')
    ->leftJoin('asuransi as c', 'c.kode_asu','a.kode_asu')
    ->leftJoin('rate as d', 'd.kode_okup','a.kode_okup')
    ->where($whereCondition2)
    ->get();
      // $rekanan = DB::table('rekanan')
      //           ->select('id_prod')
      //           ->get();
      // $jenis_rekanan = DB::table('asuransi')
      //                 ->select('kode_prod','')
      //                 ->get();
    $asuransi = DB::table('asuransi')
    ->where($whereCondition)
    ->select('kode_asu','kode_prod','nama')
    ->get();
      // dd($jenis_asuransi);
    return view ( 'Asuransi/formakseptasidokumen' ,[
      'dokumens' => $dokumens,
      'jenis_rekanan' => $asuransi,
      'valuebutton' => $valuebutton,
    ]);
  }

  public function reload()
  { 
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['a.kode_asu', $kodeposisi],
        ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',3],
          ['a.asuransi_bank','AKTIF'],
      ];                      

    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $whereCondition2 = [
          ['b.kode_pusat', $kodeposisi],
          ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',1],
          ['a.asuransi_bank','AKTIF'],
        ];   
      }else{
        $whereCondition2 = [
          ['b.kode_client', $kodeposisi],
          ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',1],
          ['a.asuransi_bank','AKTIF'],
        ];  
      }

    }else{
      $whereCondition2 = [
          ['a.sts_polis', 0],
          ['a.sts_klaim',0],
          ['a.sts_refund',0],
          ['a.posisi',2],
          ['a.asuransi_bank','AKTIF'],
        ];                      
    }
    // dd($whereCondition2);
    $klaim = DB::table('produksi_ajk as a')
    ->select('a.*'
    // ,'d.okupasi'
    ,'b.nama as namacabang','c.nama'
    // ,'d.nama as posisi'
    ,'f.nama as nama_asuransi','g.file_spaj')
    ->leftJoin('client as b', 'a.kode_client','b.kode_client')
    ->leftJoin('jns_produksi as c', 'c.kode_prod','a.kode_prod')
    ->leftJoin('asuransi as f', 'f.kode_asu','a.kode_asu')
    // ->leftJoin('rate as d', 'd.kode_okup','a.kode_okup')
    ->leftJoin('posisi_data as e', 'e.posisi','a.posisi')
    ->leftJoin('spaj as g', 'g.id_prod_ajk', 'a.id_prod_ajk')
    ->where($whereCondition2)
    ->get();

    return datatables($klaim)->toJson();
  }
  public function reloadbykodeprod($kode_prod)
  {
    // dd($kode_prod);
    $klaim = DB::table('produksi_ajk')
    ->Join('jns_produksi', 'produksi_ajk.kode_prod', '=', 'jns_produksi.kode_prod')
    ->Join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->select('produksi_ajk.*','produksi_ajk.kode_prod as kodeprod','jns_produksi.*','client.nama as namacabang')
    ->where([
      ['produksi_ajk.sts_polis', 0],
      ['produksi_ajk.sts_klaim',0],
      ['produksi_ajk.sts_refund',0],
      ['produksi_ajk.posisi',2],
    ])
    ->where('produksi_ajk.kode_prod',$kode_prod)->get();
    // dd($klaim);
    return datatables($klaim)->toJson();
  }

  public function akseptasi(Request $request)
  {
      // Check field empty
      $user = Auth::user();
      $getdataemail = Auth::user();
      $asuransii = null;
    $isFieldExist = !empty($request->checklistData);
    if($isFieldExist){
      // $arraykodeprod = explode(',', $request->kode_prod);
      $checklistData = explode(',', $request->checklistData);
      $kodeprod = explode(',', $request->kode_prod);
      $tenor = explode(',', $request->tenordebitur);
            // Update Flag Proses to Approve Status
    // dd($isFieldExist, $request->checklistData, $checklistData);
    $i = 0;
      $totalpeserta =0;
      $jumlahplafon =0;
      $jumlahpremi =0;
      $produksi_all = [];
      $asuransii = DB::table('asuransi')->where([['kode_asu', $request->kode_asu]])->first();
      foreach ($checklistData as $key =>$value) {
        $asuransi = DB::table('asuransi')->where([['kode_asu', $request->kode_asu],['kode_prod', $kodeprod[$key]]])->first();
        $diskon_ass = $asuransi->diskon;
        $ppn = $asuransi->ppn_premi;
        $pph = $asuransi->pph_premi;

             DB::table('produksi_ajk')->where('no_pk', $value)->update([
          'tgl_aksep' => date( 'Y-m-d', strtotime($request->tanggal_aksep)),
          'kode_asu' => $request->kode_asu,
          'diskon_ass' => $diskon_ass,
          'ppn' => $ppn,
          'pph' => $pph,
          'posisi' => 3,
        ]);

        // $totalpeserta += 1;
        // $jumlahplafon += $getplafon;
        // $jumlahpremi += $premiasuransi;
        $produksiasuransi = DB::table('produksi_ajk')
            ->join('client', 'produksi_ajk.kode_client','client.kode_client')
            ->where([
            ['no_pk', $value],
            ['kode_asu', $request->kode_asu],
            // ['kode_prod', $kodeprod[1]],
          ])->first();
        $produksi_all[] = (array)$produksiasuransi;
      }
      if(!empty($produksi_all)){
        $response = array(
          'status' => 'success',
          'messages' => 'Akseptasi Berhasil'
        );

          if($asuransii != null){
            $data = array(
            'tgl' => $request->tanggal_aksep,
            'ket' => 'approval',
            'perintah' => 'diterbitkan polisnya',
                );
            $pesan = 'Pesan Terkirim';
            $title = 'Document Yang Telah Di Approve '. $request->noPin;

            $this->sendEmailApprove($data,$pesan,$title, $asuransi, $user);
          }
      }else{
        $response = array(
          'status' => 'failed',
          'messages' => 'Akseptasi Gagal'
        );
      }
      return response()->json($response);
      }
    }

  // public function update(Request $request) {

  //   $dataDokumen = DB::table('table_produksi')
  //   ->where('no_pin', $request->noPin)->get();

  //   if (!empty($request)){
  //       // Update current row
  //     $dokumen = [
  //       'no_pin' => $request->noPin,
  //       'cabang' => $request->cabang,
  //       'nama_nasabah' => $request->nama_nasabah,
  //       'plafon' => str_replace( ',', '', $request->plafon ),
  //       'tgl_booking' => date( 'Y-m-d', strtotime($request->tgl_booking)),
  //       'merk' => $request->merk,
  //       'tipe' => $request->tipe,
  //       'kategori' => $request->kategori,
  //       'jenis_asuransi' => $request->jenis_asuransi,
  //       'model_kend' => $request->model_kend,
  //       'no_rangka' => $request->no_rangka,
  //       'no_mesin' => $request->no_mesin,
  //       'no_polisi' => $request->no_polisi,
  //       'no_bpkb' => $request->no_bpkb,
  //       'tahun' => $request->tahun,
  //       'tenor' => $request->tenor,
  //       'rate' => $request->rate,
  //       'premi' => str_replace( ',', '', $request->premi ),
  //       'premi_admin' => str_replace( ',', '', $request->premi_admin ),
  //       'wilayah' => $request->wilayah,
  //     ];

  //     $insert[] = $dokumen;
  //     DB::table('table_produksi')
  //     ->where('no_pin', $request->noPin)
  //     ->update($dokumen);



  //     $response = array(
  //       'status' => 'success',
  //           //'$dokumens' =>$insert,
  //       'dokumens' => $request->all()
  //     );

  //       // Format Kirim Email Pemberitahuan
  //       // $data = array(
  //       //   'no_pin'=> $dokumen['no_pin'],
  //       //   'deskripsi' => $request->keterangan,
  //       //   'nama_nasabah' => $dokumen['nama_nasabah'],
  //       //   'premi' => $dokumen['premi'],
  //       //   'premi_admin' => $dokumen['premi_admin'],
  //       // );
  //     $tgl = date( 'Y', strtotime($request->tanggal_aksep));
  //     // dd($tgl);
  //     $pesan = 'Pesan Terkirim';
  //     $title = 'Mohon Dibuka Upload Sistem Untuk Pengajuan Pada Tanggal'. $tgl;

  //     $this->sendEmailUpdate($data,$pesan,$title);

  //     return response()->json($response);
  //   }

  //     // Return error
  //   $response = array(
  //     'status' => 'failure',
  //         //'$dokumens' =>$insert,
  //     'message' => 'Failed update data'
  //   );

  //   return response()->json($response);

  // }

  public function array_group_by(array $arr, callable $key_selector) {
      $result = array();
      foreach ($arr as $i) {
        $key = call_user_func($key_selector, $i);
        $result[$key][] = $i;

      }  
      return $result;
    }
   public function groupbank($databank) {
      $namabank = [];
      foreach ($databank as $key => $namaasuransi) {
        $namabank []=$key;
        $groupedClient = $this->array_group_by($namaasuransi, function($i){  return $i[2]; }); 
        // dd($groupedClient);
      $row = 5;
      $borderRow = 1;
      $x =0 ;
      $y =0 ;
      $z =0;
      // dd($namaasuransi);
      $totalPlafon = 0;
      $totalPeserta = 0;
      $totalGrandPeserta = 0;
      $totalGrandPlafon = 0;
      $totalGrandPremi = 0;
      $premi = 0;
      $keyno = 0;
      $x = 0;
        foreach ($groupedClient as $key2 => $valuee) {

          foreach ($valuee as $key4 => $value) {
            $totalPeserta += 1;
              $totalPlafon += $namaasuransi[$key4][25];
              $premi += $namaasuransi[$key4][32];
              // $namaclient = $namaasuransi[$key2][2];
          }
          // dd($totalPlafon);
          $x += $totalPeserta;
          $y += $totalPlafon;
          $z += $premi;
          $x1 []= $totalPeserta;
          $y1 []=number_format($totalPlafon,2,',','.');
          $z1 []=number_format($premi,2,',','.');
          // $totalGrandPeserta = $totalPeserta;
          $totalPeserta = 0;
          $totalPlafon = 0;
          $premi = 0;
        }
        $totalGrandPeserta += $x;
        $totalGrandPlafon += $y;
        $totalGrandPremi += $z;
        // dd($jumlahbaris);
        $x = 0;
        $y = 0;
        $z = 0;

      }
       $response = ([
                 $namabank,
                 $x1,
                 $y1,
                 $z1,
              ]
    );
    // dd($response);
    return $response;
    } 
  public function sendEmailUpdate($data, $pesan, $title){

    $pesan = "Isi pesan";
  		// $body = array('name'=>"Sam Jose", "body" => "body nih");
    Mail::send(['html' => 'email.updaterequest'], $data, function($message) use ($pesan, $title){
      $message->to('juni.aldo@yahoo.co.id', 'Andrew')
      ->cc('junialdo017@gmail.com')
      ->subject($title)
      ->setBody($pesan, 'text/plain');
      $message->from('junialdo017@gmail.com','Admin');
    });
  }

  public function sendEmailApprove($data, $pesan, $title, $getemail, $getemailbroker){
    $pesan = "Isi pesan";
    // $markdown = Container::getInstance()->make(Markdown::class);
      // $body = array('name'=>"Sam Jose", "body" => "body nih");
  // Config::set('mail.username', $getemailbroker->email);
  // Config::set('mail.password', 'qwerty1@234567');
    Mail::send(['html' => 'email.notifrequest'], $data, function($message) use ($pesan, $title, $getemail, $getemailbroker){
      $message->to($getemail->email, $getemail->nama)
      ->cc('bigbrokerbandung@gmail.com')
      ->subject($title)
      ->setBody($pesan, 'text/plain');
      $message->from("bigbrokerbandung@gmail.com",$getemailbroker->nama_lengkap);
    });
  }

  //klaim
  public function klaim()
  {
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $valuebutton = "Kirim Ke Admin";                      
      $whereCondition = [
        ['kode_client', $kodeposisi],
      ]; 
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $valuebutton = "Kirim Ke Admin";  
        $whereCondition = [
          ['kode_client', $kodeposisi],
        ];                     
      }else{
        $valuebutton = "Kirim Ke Pusat";   
        $whereCondition = [
          ['kode_client', $kodeposisi],
        ];                    
      }

    }else{
      $valuebutton = "Kirim Ke Asuransi";  
      $whereCondition = [
      ];                     
    }
    $dokumens = DB::table('produksi_ajk')
    ->where($whereCondition)->get();
      // $rekanan = DB::table('rekanan')
      //           ->select('id_prod')
      //           ->get();
      // $jenis_rekanan = DB::table('asuransi')
      //                 ->select('kode_prod','')
      //                 ->get();
    $asuransi = DB::table('asuransi')
    // ->where($whereCondition)
    ->select('kode_asu','kode_prod','nama')
    ->get();
      // dd($jenis_asuransi);
    return view ( 'Asuransi/formakseptasiklaim' ,[
      'dokumens' => $dokumens,
      'jenis_rekanan' => $asuransi,
      'valuebutton' => $valuebutton,
    ]);
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
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 1],
                                ['produksi_ajk.sts_refund', 0],
                                ['produksi_ajk.posisi', 2],
                            ];
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['client.kode_pusat', $kodeposisi],
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 1],
                                ['produksi_ajk.sts_refund', 0],
                                ['produksi_ajk.posisi', 2],
                              ];
          }else{
            $whereCondition = [
                                ['produksi_ajk.kode_client', $kodeposisi],
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 1],
                                ['produksi_ajk.sts_refund', 0],
                                ['produksi_ajk.posisi', 2],
                              ];
          }
        }else{
          $whereCondition = [
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 1],
                                ['produksi_ajk.sts_refund', 0],
                                ['produksi_ajk.posisi', 1],
                            ]; 
        }
        // dd($whereCondition);
        $klaim = DB::table('klaim_ajk')
    ->select('klaim_ajk.*','produksi_ajk.*','klaim_ajk.tgl_bayar as tglbayar','asuransi.kode_asu','asuransi.kode_broker','jns_produksi.kode_prod','asuransi.polis_induk','asuransi.nama as nama',
    'klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar','jns_produksi.nama as namaprod','client.nama as namaclient','posisi_data.nama as namaposisi')
    ->leftjoin('produksi_ajk', 'produksi_ajk.id_prod_ajk', '=', 'klaim_ajk.id_prod_ajk')
    ->leftJoin('asuransi', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
    ->leftJoin('jns_produksi', 'jns_produksi.kode_prod', '=', 'asuransi.kode_prod')
    ->leftJoin('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    ->leftJoin('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    // ->select('klaim_ajk.*','klaim_ajk.sts_klaim as stsklaim','klaim_ajk.tgl_bayar as tglbayar','produksi_ajk.*')
    ->where($whereCondition)
    ->get()->toArray();
    // dd($klaim);
    $t = $this->is_array_empty($klaim);
    if($t == true){
    foreach ($klaim as $key => $value) {
      
      $tAkad = $value->tgl_awal;
      $tKejadian = $value->tgl_kejadian;
      $tLapor = $value->tgl_lapor;
      $tDok = $value->tgl_dok_lengkap;
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
      }// $totalhari4 = $this->hitung($tDok, $t);  
      // dd($totalhari1, $totalhari2, $totalhari3);
      // $dokumens = 
      // $y[$key2] = $value2;
      // dd($jns_produksi);
      $dokumen = [
        // $asuransi,
        // 'kode_asu' => $asuransi->kode_asu,
        // 'kode_broker' => $asuransi->kode_broker,
        // 'kode_prod' => $asuransi->kode_prod,
        // 'polis_induk' => $asuransi->polis_induk,
        // 'nama' => $asuransi->nama,
        // 'stsklaim' => $value->stsklaim,
        // 'tglbayar' => $value->tglbayar,
        // 'namaprod' => $jns_produksi->nama,
        // 'namaclient' => $client->nama,
        // 'namaposisi' => $posisi_data->nama,
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
    return datatables($view)->toJson();

    }

  public function reloadrefund()
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
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 0],
                                ['produksi_ajk.sts_refund', 1],
                                ['produksi_ajk.posisi', 2],
                            ];
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['client.kode_pusat', $kodeposisi],
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 0],
                                ['produksi_ajk.sts_refund', 1],
                                ['produksi_ajk.posisi', 2],
                              ];
          }else{
            $whereCondition = [
                                ['produksi_ajk.kode_client', $kodeposisi],
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 0],
                                ['produksi_ajk.sts_refund', 1],
                                ['produksi_ajk.posisi', 2],
                              ];
          }
        }else{
          $whereCondition = [
                                ['produksi_ajk.sts_polis', 1],
                                ['produksi_ajk.sts_klaim', 0],
                                ['produksi_ajk.sts_refund', 1],
                                ['produksi_ajk.posisi', 2],
                            ]; 
        }
        $refund = DB::table('refund')
    ->join('produksi_ajk', 'refund.id_prod_ajk', '=', 'produksi_ajk.id_prod_ajk')
    // ->leftJoin('produksi_ajk', 'asuransi.kode_asu', '=', 'produksi_ajk.kode_asu')
    // ->join('jns_produksi', 'asuransi.kode_prod', '=', 'jns_produksi.kode_prod')
    // ->join('posisi_data', 'produksi_ajk.posisi', '=', 'posisi_data.posisi')
    // ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
    ->select('refund.*','refund.sts_refund as stsrefund','refund.tgl_bayar as tglbayar','produksi_ajk.*')
    ->where($whereCondition)
    ->get()->toArray();
    // dd($refund);
    $t = $this->is_array_empty($refund);
    if($t == true){
    foreach ($refund as $key => $value) {
      $asuransi = DB::table('asuransi')->where('kode_asu', $value->kode_asu)->first();
      // $asuransis[] = $asuransi;
      $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $asuransi->kode_prod)->first();
      $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
      $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
      // dd($client);
        # code...
      // $tAkad = $refund[$key]->tgl_awal;
      // $tKejadian = $refund[$key]->tgl_kejadian;
      // $tLapor = $refund[$key]->tgl_lapor;
      // $tDok = $refund[$key]->tgl_dok_lengkap;
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
      // // dd($totalhari1, $totalhari2, $totalhari3);
      // // $dokumens = 
      // // $y[$key2] = $value2;
      // // dd($jns_produksi);
      $dokumen = [
        // $asuransi,
        'kode_asu' => $asuransi->kode_asu,
        'kode_broker' => $asuransi->kode_broker,
        'kode_prod' => $asuransi->kode_prod,
        'polis_induk' => $asuransi->polis_induk,
        'nama' => $asuransi->nama,
        'stsklaim' => $value->stsrefund,
        'tglbayar' => $value->tglbayar,
        'namaprod' => $jns_produksi->nama,
        'namaclient' => $client->nama,
        'namaposisi' => $posisi_data->nama,
        // 'x1' => $totalhari1,
        // 'x1' => $totalhari1,
        // 'x2' => $totalhari2,
        // 'x3' => $totalhari3,
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

  public function akseptasiklaim(Request $request)
  {
      // Check field empty
    $isFieldExist = !empty($request->checklistData);
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
          $posisi = '2';
          
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $posisi = '2';  
          }else{
            $posisi = '2';  
          }

        }else{
            $posisi = '3';                     
        }
    // dd($posisi);
    if($isFieldExist){
      $checklistData = explode(',', $request->checklistData);
      $nopolis = explode(',', $request->polis);
            // Update Flag Proses to Approve Status
            foreach ($checklistData as $value) {
                # code...
              // dd($request->tanggal_aksep);
                  DB::table('produksi_ajk')->where('no_pk', $value)->update([
                    'tgl_aksep' => date( 'Y-m-d', strtotime($request->tanggal_aksep)),
                    'posisi' => '3',
                  ]);
          }

          //notif akseptasi dari masing2 user
            // if(empty($insertRowInvalid)){

                  // $response = array(
                  //   'status' => 'success',
                  //   'message' => 'Approve Berhasil'
                  // );

                  // $data = array(
                  // 'tgl' => $request->tanggal_aksep,
                  // 'ket' => 'approval',
                  // 'perintah' => 'diterbitkan polisnya',
                  //     );
                  // $pesan = 'Pesan Terkirim';
                  // $title = 'Document Yang Telah Di Approve '. $request->noPin;

                  // $this->sendEmailApprove($data,$pesan,$title, $emailygdituju, $user);
              
            // }else if(!empty($insertRowInvalid)){
            //   # code...
            //   $response = array(
            //     'status' => 'warning',
            //   );
            // }else {
            //   # code...
            //   $response = array(
            //     'status' => 'failure',
            //   );
            // }
    }
    return response()->json($response);
  }

  public function akseptasirefund(Request $request)
  {
      // Check field empty
    $isFieldExist = !empty($request->checklistData);
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
          $posisi = '2';
          
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $posisi = '2';  
          }else{
            $posisi = '2';  
          }

        }else{
            $posisi = '3';                     
        }
    if($isFieldExist){
      $checklistData = explode(',', $request->checklistData);
      $nopolis = explode(',', $request->polis);
            // Update Flag Proses to Approve Status
            foreach ($checklistData as $value) {
                # code...
              // dd($request->tanggal_aksep);
                  DB::table('produksi_ajk')->where('no_pk', $value)->update([
                    'tgl_aksep' => date( 'Y-m-d', strtotime($request->tanggal_aksep)),
                    'posisi' => '3',
                  ]);
          }

          //notif akseptasi dari masing2 user
            // if(empty($insertRowInvalid)){

                  $response = array(
                    'status' => 'success',
                    'message' => 'Approve Berhasill'
                  );

            //       $data = array(
            //       'tgl' => $request->tanggal_approve,
            //       'ket' => 'approval',
            //       'perintah' => 'diterbitkan polisnya',
            //           );
            //       $pesan = 'Pesan Terkirim';
            //       $title = 'Document Yang Telah Di Approve '. $request->noPin;

            //       $this->sendEmailApprove($data,$pesan,$title);
              
            // }else if(!empty($insertRowInvalid)){
            //   # code...
            //   $response = array(
            //     'status' => 'warning',
            //   );
            // }else {
            //   # code...
            //   $response = array(
            //     'status' => 'failure',
            //   );
            // }
    }
    return response()->json($response);
  }

  public function refund()
  {
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $valuebutton = "Kirim Ke Admin";                      
      $whereCondition = [
        ['kode_asu', $kodeposisi],
      ]; 
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $valuebutton = "Kirim Ke Admin";  
        $whereCondition = [
          ['kode_client', $kodeposisi],
        ];                     
      }else{
        $valuebutton = "Kirim Ke Pusat";   
        $whereCondition = [
          ['kode_client', $kodeposisi],
        ];                    
      }

    }else{
      $valuebutton = "Kirim Ke Asuransi";  
      $whereCondition = [
      ];                     
    }
    $dokumens = DB::table('produksi_ajk')
    ->where($whereCondition)->get();
      // $rekanan = DB::table('rekanan')
      //           ->select('id_prod')
      //           ->get();
      // $jenis_rekanan = DB::table('asuransi')
      //                 ->select('kode_prod','')
      //                 ->get();
    $asuransi = DB::table('asuransi')
    ->where($whereCondition)
    ->select('kode_asu','kode_prod','nama')
    ->get();
      // dd($jenis_asuransi);
    return view ( 'Asuransi/formakseptasirefund' ,[
      'dokumens' => $dokumens,
      'jenis_rekanan' => $asuransi,
      'valuebutton' => $valuebutton,
    ]);
  }
}

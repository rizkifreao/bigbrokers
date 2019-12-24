<?php

namespace App\Http\Controllers\Asuransi;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Excel;

class AsuransiValidasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $dokumens = DB::table('produksi_ajk')->get();
      $jenis_rekanan = DB::table('asuransi')->get();
      $jenis_asuransi = DB::table('asuransi')
                ->join('rekanan', 'asuransi.kode_prod', '=', 'rekanan.id_prod')
                ->select('rekanan.id_prod','asuransi.nama')
                ->get();
      return view ( 'Asuransi/formvalidasidokumen' ,[
        'dokumens' => $dokumens,
        'jenis_rekanan' => $jenis_rekanan,
      ]);
    }

    public function reload()
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
      return datatables(DB::table('produksi_ajk')->where($whereCondition)->get())->toJson();
    }
	
    public function refund()
    {
      $dokumens = DB::table('produksi_ajk')->get();
      $jenis_rekanan = DB::table('asuransi')->get();
      $jenis_asuransi = DB::table('asuransi')
                ->join('rekanan', 'asuransi.kode_prod', '=', 'rekanan.id_prod')
                ->select('rekanan.id_prod','asuransi.nama')
                ->get();
      return view ( 'Asuransi/formvalidasirefund',[
        'dokumens' => $dokumens,
        'jenis_rekanan' => $jenis_rekanan,
      ]);
    }

    public function reloadvalidasirefund()
      {
    
    
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['b.kode_asu', $kodeposisi],
        ['b.sts_polis', 1],
        ['b.sts_klaim',0],
        ['b.sts_refund',1],
        ['b.posisi',3],
      ];                      

    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $whereCondition2 = [
          ['f.kode_pusat', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
        ['b.posisi',2],
        ];   
      }else{
        $whereCondition2 = [
          ['b.kode_client', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
        ['b.posisi',2],
        ];  
      }

    }else{
      $whereCondition2 = [
          ['b.sts_polis', 1],
        ['b.sts_klaim',0],
        ['b.sts_refund',1],
        ['b.posisi',2],
      ];                      
    }
    $refund = DB::table('refund as a')
    ->select('a.*','a.sts_refund as stsrefund','a.tgl_bayar as tglbayar','b.*','c.nama as namaasuransi','d.nama as namaprod','f.nama as namacabang','e.nama as namaposisi')
    ->leftJoin('produksi_ajk as b', 'b.id_prod_ajk', '=', 'a.id_prod_ajk')
    ->leftJoin('asuransi as c', 'c.kode_asu', '=', 'b.kode_asu')
    ->leftJoin('jns_produksi as d', 'd.kode_prod', '=', 'c.kode_prod')
    ->leftJoin('posisi_data as e', 'e.posisi', '=', 'b.posisi')
    ->leftJoin('client as f', 'f.kode_client', '=', 'b.kode_client')
    ->where($whereCondition2)
    ->get()->toArray();
    
    return datatables($refund)->toJson();
  }
     public function reloadvalidasirefundby($startaksep, $endaksep)
  {
    $start = date( 'Y-m-d', strtotime($startaksep) );
        $end = date( 'Y-m-d', strtotime($endaksep) );
        $user = Auth::user();
      $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
      $posisiuser = $user->posisi;
      $kodeposisi = $user->perusahaan;
      if($posisiuser == 3){
        $whereCondition2 = [
          ['b.kode_asu', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
          ['b.posisi',3],
        ];                      
  
      }elseif($posisiuser == 1){
        $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
        if(count($mst_client)>0){
          $whereCondition2 = [
            ['f.kode_pusat', $kodeposisi],
            ['b.sts_polis', 1],
            ['b.sts_klaim',0],
            ['b.sts_refund',1],
          ['b.posisi',2],
          ];   
        }else{
          $whereCondition2 = [
            ['b.kode_client', $kodeposisi],
            ['b.sts_polis', 1],
            ['b.sts_klaim',0],
            ['b.sts_refund',1],
          ['b.posisi',2],
          ];  
        }
  
      }else{
        $whereCondition2 = [
            ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
          ['b.posisi',2],
        ];                      
      }
      $refund = DB::table('refund as a')
      ->select('a.*','a.sts_refund as stsrefund','a.tgl_bayar as tglbayar','b.*','c.nama as namaasuransi','d.nama as namaprod','f.nama as namacabang','e.nama as namaposisi')
      ->leftJoin('produksi_ajk as b', 'b.id_prod_ajk', '=', 'a.id_prod_ajk')
      ->leftJoin('asuransi as c', 'c.kode_asu', '=', 'b.kode_asu')
      ->leftJoin('jns_produksi as d', 'd.kode_prod', '=', 'c.kode_prod')
      ->leftJoin('posisi_data as e', 'e.posisi', '=', 'b.posisi')
      ->leftJoin('client as f', 'f.kode_client', '=', 'b.kode_client')
      ->where($whereCondition2)
      ->whereBetween('tgl_aksep', array($start, $end))
      ->get()->toArray();
	return datatables($refund)->toJson();
  }
  public function cekrefundexportexcel($tanggal_aksep_awal, $tanggal_aksep_akhir){
    $start = date( 'Y-m-d', strtotime($tanggal_aksep_awal) );
    $end = date( 'Y-m-d', strtotime($tanggal_aksep_akhir) );
    $user = Auth::user();
    $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
    $posisiuser = $user->posisi;
    $kodeposisi = $user->perusahaan;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['b.kode_asu', $kodeposisi],
        ['b.sts_polis', 1],
        ['b.sts_klaim',0],
        ['b.sts_refund',1],
        ['b.posisi',3],
      ];                      

    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $whereCondition2 = [
          ['f.kode_pusat', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
        ['b.posisi',2],
        ];   
      }else{
        $whereCondition2 = [
          ['b.kode_client', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
        ['b.posisi',2],
        ];  
      }

    }else{
      $whereCondition2 = [
          ['b.sts_polis', 1],
        ['b.sts_klaim',0],
        ['b.sts_refund',1],
        ['b.posisi',2],
      ];                      
    }
    $refund = DB::table('refund as a')
    ->select('a.*','a.sts_refund as stsrefund','a.tgl_bayar as tglbayar','b.*','c.nama as namaasuransi','d.nama as namaprod','f.nama as namacabang','e.nama as namaposisi')
    ->leftJoin('produksi_ajk as b', 'b.id_prod_ajk', '=', 'a.id_prod_ajk')
    ->leftJoin('asuransi as c', 'c.kode_asu', '=', 'b.kode_asu')
    ->leftJoin('jns_produksi as d', 'd.kode_prod', '=', 'c.kode_prod')
    ->leftJoin('posisi_data as e', 'e.posisi', '=', 'b.posisi')
    ->leftJoin('client as f', 'f.kode_client', '=', 'b.kode_client')
    ->where($whereCondition2)
    ->whereBetween('tgl_aksep', array($start, $end))
    ->get()->toArray();

      if(count($refund)>0){
        $response = array(
          'status' => 'success',
          'message' => '',
        );
        return response()->json($response); 
      }else{
          $response = array(
            'status' => 'failed',
            'message' => 'Tidak Ada Data Periode Tanggal Akad dari '.$tanggal_aksep_awal.' s/d '.$tanggal_aksep_akhir,
        );
        return response()->json($response);     
      }
  }
  public function refundexportexcel($tanggal_aksep_awal, $tanggal_aksep_akhir) {
    $start = date( 'Y-m-d', strtotime($tanggal_aksep_awal) );
    $end = date( 'Y-m-d', strtotime($tanggal_aksep_akhir) );
    // dd($start);
    $fieldTitleExcel = ['No.','No. Sertifikat', 'Nama Asuransi', 'Jenis Produk', 'Okupasi', 'No. Pinjaman', 'Cab Bank', 'Debitur', 'Pekerjaan', 'Tgl Lahir', 'Umur', 'Tgl Akad', 'Tgl Akhir','Tenor','Rate','Plafon','Premi','Tanggal Pelunasan','Estimasi Refund', 'Tanggal Bayar','Refund','Keterangan Refund'];
   
    $user = Auth::user();
    $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
    $posisiuser = $user->posisi;
    $kodeposisi = $user->perusahaan;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['b.kode_asu', $kodeposisi],
        ['b.sts_polis', 1],
        ['b.sts_klaim',0],
        ['b.sts_refund',1],
        ['b.posisi',3],
      ];                      

    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $whereCondition2 = [
          ['f.kode_pusat', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
        ['b.posisi',2],
        ];   
      }else{
        $whereCondition2 = [
          ['b.kode_client', $kodeposisi],
          ['b.sts_polis', 1],
          ['b.sts_klaim',0],
          ['b.sts_refund',1],
        ['b.posisi',2],
        ];  
      }

    }else{
      $whereCondition2 = [
          ['b.sts_polis', 1],
        ['b.sts_klaim',0],
        ['b.sts_refund',1],
        ['b.posisi',2],
      ];                      
    }
    $dataDokumen = DB::table('refund as a')
    ->select('a.id_refund','b.no_polis','c.nama as namaasuransi','d.nama as namaproduk','b.kode_okup',
            'b.no_pk','f.nama as namacabang','b.debitur','b.pekerjaan','b.tgl_lahir','b.umur','b.tgl_awal','b.tgl_akhir',
            'b.tenor','b.rate','b.plafon','b.premi','b.tgl_pelunasan','a.nilai_refund','a.tgl_bayar','a.dibayar','a.keterangan'
            )
    ->leftJoin('produksi_ajk as b', 'b.id_prod_ajk', '=', 'a.id_prod_ajk')
    ->leftJoin('asuransi as c', 'c.kode_asu', '=', 'b.kode_asu')
    ->leftJoin('jns_produksi as d', 'd.kode_prod', '=', 'c.kode_prod')
    ->leftJoin('posisi_data as e', 'e.posisi', '=', 'b.posisi')
    ->leftJoin('client as f', 'f.kode_client', '=', 'b.kode_client')
    ->where($whereCondition2)
    ->whereBetween('tgl_aksep', array($start, $end))
    ->get()->toArray();
    if(count($dataDokumen) > 0){
    for ($i='A'; $i < $z = 'Z'; $i++) { 
      $namevariabel[] = $i;
    }
    $jumlahbaris = count($fieldTitleExcel);
    // dd(count($dataDokumen));            
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    // $spreadsheet->getActiveSheet()->mergeCells('A1:'.$namevariabel[$jumlahbaris-1].'1');
    $no=1;
    foreach ($dataDokumen as $key2 => $valued) {
      // dd($dataDokumen, $valued);
      $values[$key2] = [];
      foreach ($valued as $key => $value) {
        $valued->id_refund = $no;
        $values[$key2][] = $value;
        $values[$key2][0] = $no;
      }
      $no++;
    }
    $onFieldTitle = [
                      ['Laporan Data Refund Dari '.$start.' Sampai '.$end,],
                      ['No.','No. Sertifikat', 'Nama Asuransi', 'Jenis Produk', 'Okupasi', 'No. Pinjaman', 'Cab Bank', 'Debitur', 'Pekerjaan', 'Tgl Lahir', 'Umur', 'Tgl Akad', 'Tgl Akhir','Tenor','Rate','Plafon','Premi','Tanggal Pelunasan','Estimasi Refund', 'Tanggal Bayar','Refund','Keterangan Refund'],
                    ];
    $endValues = array_merge($onFieldTitle, $values);
    // dd($endValues,$namevariabel, $dataDokumen);
    $jumlahkolom = count($endValues);
    // $spreadsheet->getActiveSheet()->mergeCells('A1:AV1')->createTextRun('PhpSpreadsheet:');
    $sheet->fromArray($endValues);
    $cell_st =[
               'font' =>['bold' => true],
               'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
               'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
              ];

    $cell_st2 =[
                  'font' => [
                      // 'bold' => true,
                  ],
                  // 'alignment' => [
                  //     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                  // ],
                  'borders' => [
                      'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '00000000'],
                    ],
                  ],
                  'fill' => [
                      // 'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                      // 'rotation' => 90,
                      // 'startColor' => [
                      //     'argb' => 'FFA0A0A0',
                      // ],
                      // 'endColor' => [
                      //     'argb' => 'FFFFFFFF',
                      // ],
                  ],
              ];

    // ; getRight(); getTop(); getBottom()
    foreach ($namevariabel as $width) {
      $sheet->getColumnDimension($width)->setAutoSize(true);
    }
    $sheet->mergeCells('A1:'.$namevariabel[$jumlahbaris-1].'1');
    $sheet->getStyle('A1:'.$namevariabel[$jumlahbaris-1].'1')->applyFromArray($cell_st);
    $sheet->getStyle('A1:'.$namevariabel[$jumlahbaris-1].$jumlahkolom)->applyFromArray($cell_st2);
    $sheet->setTitle('Rincian Bank'); //set a title for Worksheet
    // $sheet->setCellValue('A1', 'Hello World !');

    $writer = new Xlsx($spreadsheet);
    $name_file = 'Data Export Refund.xlsx';
    // $path = public_path().'/Laporan/'.$name_file;
    // $writer->save($path);

    // $name_file = $judul.'.xls';
    // $path = storage_path('Laporan\\'.$name_file);
    // $file_url       = "collection/temp";
    $path = public_path().'/'.$name_file;
    $writer->save($path);
    $contents = is_dir($path);
    // $headers = array('Content-Type' => File::mimeType($path));
    // dd($path.'/'.$name_file,$contents);
    $filename   = str_replace("@", "/", $path);
      # ---------------
      header("Cache-Control: public");
      header("Content-Description: File Transfer");
      header("Content-Disposition: attachment; filename=".$name_file);
      header("Content-Type: application/xlsx");
      header("Content-Transfer-Encoding: binary");
      # ---------------
      require "$filename";
      # ---------------
      exit;

    }
  }

    public function importExcelRefund(Request $request)
      {
        // Cek field should not empty
        // $asuransi = DB::table('asuransi')->where('kode_prod', $request->jenis_asuransi)->first();
        // $kode_prod = $request->jenis_asuransi;
        // $kode_asu = $asuransi->kode_asu;
        // $kode_broker = $asuransi->kode_broker;
        // $namaasuransi = $asuransi->nama;
        $isFieldExist = !empty($request->tanggal_upload);
        $file = $request->file('file_upload_polis');
        config(['excel.import.startRow' => 2 ]);
        $dataSheet = Excel::load($request->file('file_upload_polis'))->get();
        // $insert = array();

              $insertRowExist = array();
              $insert = array();
              foreach ($dataSheet as $key => $value) {
                if($value["no._sertifikat"] != null){
                  $cek = DB::table('produksi_ajk')->where([['debitur', $value["debitur"]],['no_polis',$value["no._sertifikat"]]])->first();
                  if($cek != null){
                    DB::table('refund')->where('id_prod_ajk', $cek->id_prod_ajk)->update([
                      "dibayar"=>$value["refund"],
                      'tgl_refund' =>  date('Y-m-d'),
                      'tgl_bayar' =>  date('Y-m-d', strtotime($value["tanggal_bayar"])),
                      'keterangan' =>  $value["keterangan_refund"],
                      // 'posisi' =>  4,
                      ]);
                  }
                  // DB::table('produksi_ajk')->where('debitur', $value["debitur"])->update([
                  //   "no_polis"=>$value["no._polis"],
                  //   'tgl_polis' =>  date('Y-m-d'),
                  //   'sts_polis' =>  1,
                  //   'posisi' =>  4,
                  //   ]);
                }
            }
            $response = array(
              'status' => 'success',
              'message' => 'Sukses Update Refund',
          );
          return response()->json($response);     
  }

     public function reloadvalidasi()
      {
        $user = Auth::user();
      $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
      $posisiuser = $user->posisi;
      $kodeposisi = $user->perusahaan;

      if($posisiuser == 3){
          $whereCondition = [
                                ['a.kode_asu', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ];
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['c.kode_pusat', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }else{
            $whereCondition = [
                                ['a.kode_client', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }
        }else{
          $whereCondition = [
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ]; 
        }

        $view = DB::table('produksi_ajk as a')
        ->select('a.*','b.kode_broker','b.kode_prod','b.polis_induk','b.nama as namaasuransi','d.nama as namaprod','c.nama as namacabang','f.nama as namaposisi','g.okupasi as pekerjaan')
        ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
        ->leftjoin('client as c','c.kode_client','a.kode_client')
        ->leftjoin('jns_produksi as d','d.kode_prod','a.kode_prod')
        ->leftjoin('posisi_data as f','f.posisi','a.posisi')
        ->leftjoin('rate as g','g.kode_okup','a.kode_okup')
    ->where($whereCondition)
    ->get()->toArray();
    // dd($klaim, $kodeposisi);
    // $t = $this->is_array_empty($klaim);
    // if($t == true){
    //   foreach ($klaim as $key => $value) {
    //     $asuransi = DB::table('asuransi')->where('kode_prod', $value->kode_prod)->first();
    //     // $asuransis[] = $asuransi;
    //     $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $value->kode_prod)->first();
    //     $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
    //     $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
    //     $dok = DB::table('dok_klaim')->where('id_klaim_ajk', $value->id_prod_ajk)->first();
    //       # code...
    //     $dokumen = [
    //       // $asuransi,
    //       'kode_broker' => $asuransi->kode_broker,
    //       'kode_prod' => $asuransi->kode_prod,
    //       'polis_induk' => $asuransi->polis_induk,
    //       'namaasuransi' => $asuransi->nama,
    //       'namaprod' => $jns_produksi->nama,
    //       'namacabang' => $client->nama,
    //       'namaposisi' => $posisi_data->nama,
    //     ];
    //     foreach ($value as $key2 => $value2) {
    //       $y[$key2] = $value2;
    //     }
    //     $klaimm []= array_merge($y,$dokumen);
    //   }
    //   $view = $klaimm;
    // // }else{
    // //   $view = $klaim;
    // }
    return datatables($view)->toJson();
  }

  public function reloadvalidasiby($startaksep, $endaksep)
      {
        $start = date( 'Y-m-d', strtotime($startaksep) );
        $end = date( 'Y-m-d', strtotime($endaksep) );
        $user = Auth::user();
      $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
      $posisiuser = $user->posisi;
      $kodeposisi = $user->perusahaan;
        if($posisiuser == 3){
          $whereCondition = [
                                ['a.kode_asu', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ];
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['c.kode_pusat', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }else{
            $whereCondition = [
                                ['a.kode_client', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }
        }else{
          $whereCondition = [
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ]; 
        }

        $view = DB::table('produksi_ajk as a')
        ->select('a.*','b.kode_broker','b.kode_prod','b.polis_induk','b.nama as namaasuransi','d.nama as namaprod','c.nama as namacabang','f.nama as namaposisi','g.okupasi as pekerjaan')
        ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
        ->leftjoin('client as c','c.kode_client','a.kode_client')
        ->leftjoin('jns_produksi as d','d.kode_prod','a.kode_prod')
        ->leftjoin('posisi_data as f','f.posisi','a.posisi')
        ->leftjoin('rate as g','g.kode_okup','a.kode_okup')
                  ->whereBetween('tgl_aksep', array($start, $end))
        ->where($whereCondition)
    ->get()->toArray();
        // $view = DB::table('produksi_ajk')
        //           ->whereBetween('tgl_aksep', array($start, $end))
        //           ->where($whereCondition)
        //           ->get()->toArray();
    // $t = $this->is_array_empty($klaim);
    // if($t == true){
    //   foreach ($klaim as $key => $value) {
    //     $asuransi = DB::table('asuransi')->where('kode_prod', $value->kode_prod)->first();
    //     // $asuransis[] = $asuransi;
    //     $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $value->kode_prod)->first();
    //     $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
    //     $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
    //     $dok = DB::table('dok_klaim')->where('id_klaim_ajk', $value->id_prod_ajk)->first();
    //       # code...
    //     $dokumen = [
    //       // $asuransi,
    //       'kode_broker' => $asuransi->kode_broker,
    //       'kode_prod' => $asuransi->kode_prod,
    //       'polis_induk' => $asuransi->polis_induk,
    //       'namaasuransi' => $asuransi->nama,
    //       'namaprod' => $jns_produksi->nama,
    //       'namacabang' => $client->nama,
    //       'namaposisi' => $posisi_data->nama,
    //     ];
    //     foreach ($value as $key2 => $value2) {
    //       $y[$key2] = $value2;
    //     }
    //     $klaimm []= array_merge($y,$dokumen);
    //   }
    //   $view = $klaimm;
    // }else{
    //   $view = $klaim;
    // }
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

    // public function approve(Request $request)
    // {
    //   // Check field empty
    //   $isFieldExist = !empty($request->tanggal_approve) && !empty($request->checkradio) && !empty($request->id_asuransi)
    //                   && !empty($request->checklistData);

    //   if($isFieldExist){
    //     if ($request->premi_admin == $request->premi){
    //       $insert[] = [
    //         'tgl_approve' => date( 'Y-m-d', strtotime($request->tanggal_approve) ),
    //         'id_master_asuransi' => $request->id_asuransi,
    //         'jenis_penutupan' => $request->checkradio,
    //         'status_proses' => 1,
    //       ];
    //     } else {
    //       # code...
    //     }

    //       if(!empty($insert)){
    //         $checklistData = explode(',', $request->checklistData);
    //         // Update Flag Proses to Approve Status
    //         foreach ($checklistData as $value) {
    //           $dataPremi = DB::table('table_produksi')->where('no_pin', $value)->pluck('premi');
    //           $dataPremiAdmin = DB::table('table_produksi')->where('no_pin', $value)->pluck('premi_admin');
    //           if ($dataPremi == $dataPremiAdmin){
    //             # code...
    //               DB::table('table_produksi')->where('no_pin', $value)->update([
    //                 'tgl_approve' => date( 'Y-m-d', strtotime($request->tanggal_approve) ),
    //                 'id_master_asuransi' => $request->id_asuransi,
    //                 'jenis_penutupan' => $request->checkradio,
    //                 'status_proses' => 1,
    //               ]);
    //           }else {
    //             # code...
    //             $insertRowInvalid[] = [
    //               $value
    //             ];

    //         }
    //       }

    //         if(empty($insertRowInvalid)){

    //               $response = array(
    //                 'status' => 'success',
    //                 'request' => $request->all()
    //               );

    //               $data = array(
    //               'tgl' => $request->tanggal_approve,
    //               'ket' => 'approval',
    //               'perintah' => 'diterbitkan polisnya',
    //                   );
    //               $pesan = 'Pesan Terkirim';
    //               $title = 'Document Yang Telah Di Approve '. $request->noPin;

    //               $this->sendEmailApprove($data,$pesan,$title);
              
    //         }else if(!empty($insertRowInvalid)){
    //           # code...
    //           $response = array(
    //             'status' => 'warning',
    //           );
    //         }else {
    //           # code...
    //           $response = array(
    //             'status' => 'failure',
    //           );
    //         }
              
    //       }

    //   }
    //         return response()->json($response);


    //   // Return error
    //   return back();
    // }

    // public function update(Request $request) {

    //   $dataDokumen = DB::table('table_produksi')
    //   ->where('no_pin', $request->noPin)->get();

    //   if (!empty($request)){
    //     // Update current row
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
    //         ->where('no_pin', $request->noPin)
    //         ->update($dokumen);



    //     $response = array(
    //         'status' => 'success',
    //         //'$dokumens' =>$insert,
    //         'dokumens' => $request->all()
    //     );

    //     // Format Kirim Email Pemberitahuan
    //     // $data = array(
    //     //   'no_pin'=> $dokumen['no_pin'],
    //     //   'deskripsi' => $request->keterangan,
    //     //   'nama_nasabah' => $dokumen['nama_nasabah'],
    //     //   'premi' => $dokumen['premi'],
    //     //   'premi_admin' => $dokumen['premi_admin'],
    //     // );

    //     $pesan = 'Pesan Terkirim';
    //     $title = 'Approval Change Request No Pin '. $request->noPin;

    //     $this->sendEmailUpdate($data,$pesan,$title);

    //     return response()->json($response);
    //   }

    //   // Return error
    //   $response = array(
    //       'status' => 'failure',
    //       //'$dokumens' =>$insert,
    //       'message' => 'Failed update data'
    //   );

    //   return response()->json($response);

    // }
    public function cekexportexcel($tanggal_aksep_awal, $tanggal_aksep_akhir){
      $start = date( 'Y-m-d', strtotime($tanggal_aksep_awal) );
      $end = date( 'Y-m-d', strtotime($tanggal_aksep_akhir) );
      $user = Auth::user();
      $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
      $posisiuser = $user->posisi;
      $kodeposisi = $user->perusahaan;
        if($posisiuser == 3){
          $whereCondition = [
                                ['a.kode_asu', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ];
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['c.kode_pusat', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }else{
            $whereCondition = [
                                ['a.kode_client', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }
        }else{
          $whereCondition = [
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ]; 
        }

        // $fieldTitleExcel = ['no_polis','asuransi_bank','debitur','tgl_lahir','umur',
        //             'tenor','tgl_awal','tgl_akhir','plafon','rate','premi',
        //             'sts_bayar'];
        $dataDokumen = DB::table('produksi_ajk as a')
        // ->select($fieldTitleExcel)
        // ->select('a.*','b.kode_broker','b.kode_prod','b.polis_induk','b.nama as namaasuransi','d.nama as namaprod','c.nama as namacabang','f.nama as namaposisi')
        ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
        ->leftjoin('client as c','c.kode_client','a.kode_client')
        ->leftjoin('jns_produksi as d','d.kode_prod','a.kode_prod')
        ->leftjoin('posisi_data as f','f.posisi','a.posisi')
                  ->whereBetween('a.tgl_aksep', array($start, $end))
        ->where($whereCondition)
    ->get();
        if(count($dataDokumen)>0){
          $response = array(
            'status' => 'success',
            'message' => '',
          );
          return response()->json($response); 
        }else{
            $response = array(
              'status' => 'failed',
              'message' => 'Tidak Ada Data Periode Tanggal Akad dari '.$tanggal_aksep_awal.' s/d '.$tanggal_aksep_akhir,
          );
          return response()->json($response);     
        }
    }

    public function exportexcel($tanggal_aksep_awal, $tanggal_aksep_akhir) {
      $start = date( 'Y-m-d', strtotime($tanggal_aksep_awal) );
      $end = date( 'Y-m-d', strtotime($tanggal_aksep_akhir) );
      // dd($start);
      $fieldTitleExcel = ['no_polis','asuransi_bank','debitur','tgl_lahir','umur',
                    'tenor','tgl_awal','tgl_akhir','plafon','rate','premi',
                    'sts_bayar'];
     
        $user = Auth::user();
      $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
      $posisiuser = $user->posisi;
      $kodeposisi = $user->perusahaan;
        if($posisiuser == 3){
          $whereCondition = [
                                ['a.kode_asu', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ];
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['c.kode_pusat', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }else{
            $whereCondition = [
                                ['a.kode_client', $kodeposisi],
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                              ];
          }
        }else{
          $whereCondition = [
                                ['a.posisi', 3],
                                ['a.sts_polis', 0],
                                ['a.sts_klaim',0],
                                ['a.sts_refund',0],
                            ]; 
        }

        $dataDokumen = DB::table('produksi_ajk as a')
        ->select($fieldTitleExcel)
        // ->select('a.*','b.kode_broker','b.kode_prod','b.polis_induk','b.nama as namaasuransi','d.nama as namaprod','c.nama as namacabang','f.nama as namaposisi')
        ->leftjoin('asuransi as b','b.kode_asu','a.kode_asu')
        ->leftjoin('client as c','c.kode_client','a.kode_client')
        ->leftjoin('jns_produksi as d','d.kode_prod','a.kode_prod')
        ->leftjoin('posisi_data as f','f.posisi','a.posisi')
        ->whereBetween('tgl_aksep', array($start, $end))
        ->where($whereCondition)
    ->get()->toArray();
      // $dataDokumen = DB::table('produksi_ajk')
      //             ->select($fieldTitleExcel)
      //             ->whereBetween('tgl_awal', array($start, $end))
      //             ->where($whereCondition)
      //             ->get()->toArray();
      // dd($dataDokumen,$start, $end);
      if(count($dataDokumen) > 0){
      for ($i='A'; $i < $z = 'Z'; $i++) { 
        $namevariabel[] = $i;
      }
      $jumlahbaris = count($fieldTitleExcel);
      // dd(count($dataDokumen));            
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      // $spreadsheet->getActiveSheet()->mergeCells('A1:'.$namevariabel[$jumlahbaris-1].'1');
      
      foreach ($dataDokumen as $key2 => $valued) {
        $values[$key2] = [];
        foreach ($valued as $key => $value) {
          $values[$key2][] = $value;
        }
      }
      $onFieldTitle = [
                        ['Laporan Data Debitur Dari '.$start.' Sampai '.$end,],
                        ['No. Polis', 'Asuransi Bank', 'Debitur', 'Tanggal Lahir', 'Umur', 'Tenor', 'Tanggal Awal', 'Tanggal AKhir', 'Plafon', 'Rate', 'Premi', 'Status Bayar'],
                      ];
      $endValues = array_merge($onFieldTitle, $values);
      $jumlahkolom = count($endValues);
      // $spreadsheet->getActiveSheet()->mergeCells('A1:AV1')->createTextRun('PhpSpreadsheet:');
      $sheet->fromArray($endValues);
      $cell_st =[
                 'font' =>['bold' => true],
                 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
                ];

      $cell_st2 =[
                    'font' => [
                        // 'bold' => true,
                    ],
                    // 'alignment' => [
                    //     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                    // ],
                    'borders' => [
                        'allBorders' => [
                      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                      'color' => ['argb' => '00000000'],
                      ],
                    ],
                    'fill' => [
                        // 'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        // 'rotation' => 90,
                        // 'startColor' => [
                        //     'argb' => 'FFA0A0A0',
                        // ],
                        // 'endColor' => [
                        //     'argb' => 'FFFFFFFF',
                        // ],
                    ],
                ];

      // ; getRight(); getTop(); getBottom()
      foreach ($namevariabel as $width) {
        $sheet->getColumnDimension($width)->setWidth(16);
      }
      $sheet->mergeCells('A1:'.$namevariabel[$jumlahbaris-1].'1');
      $sheet->getStyle('A1:'.$namevariabel[$jumlahbaris-1].'1')->applyFromArray($cell_st);
      $sheet->getStyle('A1:'.$namevariabel[$jumlahbaris-1].$jumlahkolom)->applyFromArray($cell_st2);
      $sheet->setTitle('Rincian Bank'); //set a title for Worksheet
      // $sheet->setCellValue('A1', 'Hello World !');

      $writer = new Xlsx($spreadsheet);
      $name_file = 'Data Export Asuransi.xlsx';
      // $path = public_path().'/Laporan/'.$name_file;
      // $writer->save($path);

      // $name_file = $judul.'.xls';
      // $path = storage_path('Laporan\\'.$name_file);
      // $file_url       = "collection/temp";
      $path = public_path().'/'.$name_file;
      $writer->save($path);
      $contents = is_dir($path);
      // $headers = array('Content-Type' => File::mimeType($path));
      // dd($path.'/'.$name_file,$contents);
      $filename   = str_replace("@", "/", $path);
        # ---------------
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=".$name_file);
        header("Content-Type: application/xlsx");
        header("Content-Transfer-Encoding: binary");
        # ---------------
        require "$filename";
        # ---------------
        exit;

      // $name_file = 'Rincian Bank.xls';
      // $path = public_path($name_file);
      // $filename   = str_replace("@", "/", $path);
      // # ---------------
      // header("Cache-Control: public");
      // header("Content-Description: File Transfer");
      // header("Content-Disposition: attachment; filename=".$name_file);
      // header("Content-Type: application/xls");
      // header("Content-Transfer-Encoding: binary");
      // # ---------------
      // require "$filename";
      // # ---------------
      // exit;
      // return response()->download($path);
      }
    }

    public function importExcel2(Request $request)
      {
        // Cek field should not empty
        $asuransi = DB::table('asuransi')->where('kode_prod', $request->jenis_asuransi)->first();
        // $kode_prod = $request->jenis_asuransi;
        // $kode_asu = $asuransi->kode_asu;
        // $kode_broker = $asuransi->kode_broker;
        // $namaasuransi = $asuransi->nama;
        $isFieldExist = !empty($request->tanggal_upload);
        $file = $request->file('file_upload_polis');
        config(['excel.import.startRow' => 2 ]);
        $dataSheet = Excel::load($request->file('file_upload_polis'))->get();
        // $insert = array();

              $insertRowExist = array();
              $insert = array();
              foreach ($dataSheet as $key => $value) {
                if($value["no._polis"] != null){
                  DB::table('produksi_ajk')->where('debitur', $value["debitur"])->update([
                    "no_polis"=>$value["no._polis"],
                    'tgl_polis' =>  date('Y-m-d'),
                    'sts_polis' =>  1,
                    'posisi' =>  4,
                    ]);
                }
            }
            $response = array(
              'status' => 'success',
              'message' => 'Sukses Update Polis',
          );
          return response()->json($response);     
    	}
    public function format_excel()
    {
//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();

//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', 'Domain')
 ->setCellValue('B1', 'Category')
 ->setCellValue('C1', 'Nr. Pages');


$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A2', 'CoursesWeb.net')
 ->setCellValue('B2', 'Web Development')
 ->setCellValue('C2', '4000');

$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A3', 'MarPlo.net')
 ->setCellValue('B3', 'Courses & Games')
 ->setCellValue('C3', '15000');

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);  
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

//make object of the Xlsx class to save the excel file
$writer = new Xlsx($spreadsheet);
$fxls ='excel-file_1.xls';
$writer->save($fxls);
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
}

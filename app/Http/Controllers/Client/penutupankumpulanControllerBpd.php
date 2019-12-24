<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use Input;
use DateTime;
use App\TableProduksi;
use Yajra\Datatables\Facades\Datatables;
use Auth;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class penutupankumpulanControllerBpd extends Controller
{

      // public function testing(Request $request) {
      //   $path = $request->file('import_file')->getRealPath();
      //   $dataSheet = Excel::load($path, function($reader) {})->get();

      //   $response = array(
      //       'insert' => $dataSheet,
      //   );
      //   return response()->json($response);
      // }

      public function __construct()
      {
        $this->middleware('auth');
      } 

      public function index()
      {

        $dokumens = DB::table('produksi_ajk')->where('posisi', 0)->get();
        $leasing = DB::table('mst_client')->get();
        $jenisasuransi = DB::table('jns_produksi')->get();
        if(!empty($dokumens) && !empty($leasing)){
          return view ( 'Admin/formuploaddatabpd' ,[
            'dokumens' => $dokumens,
            'jenisasuransi' => $jenisasuransi,
            'leasings' => $leasing,
            ]
          );
        }
        return back();
      }

      public function clearTable() {

        DB::table('table_produksi')->truncate();
        $response = array(
            'status' => 'success',
            'message' => 'Clear table success',
        );
        return response()->json($response);
      }

      public function reload()
      {
        return datatables(DB::table('produksi_ajk'))
        		// ->where('status_proses', 0))
        		->toJson();
      }
      public function noKwitansi($nopk)
      {
        // $dokumens = DB::table('produksi_ajk')
        // 			->max('no_kwitansi');
        // // $no_kwitansi = $dokumens->no_kwitansi;
        // // dd($no_kwitansi);
        // // $x = ("%3s",$no_urut);
        // // dd($dokumens);
        // if($dokumens != "" || $dokumens != null){
		      // $no_urut = substr($dokumens, 3, 3);
        //    $no_kwitansi = (int)$no_urut;
        //    $no_kwitansi = $no_kwitansi+1;

        //    // dd($no_kwitansi);
        //   $response = array(
        //     'dokumens' => $dokumens,
        //     'status' => 'success',
        //       );
        //   return response()->json($response);
        // }
        return 'okupasi';
      }
    	// public function downloadExcel($type)
    	// {
    	// 	$data = TableProduksi::where('status_proses', 1)->get()->toArray();
    	// 	return Excel::create('data-pengajuan-asuransi', function($excel) use ($data) {
    	// 		$excel->sheet('Sheet 1', function($sheet) use ($data)
    	//         {
    	// 			$sheet->fromArray($data);
    	//         });
    	// 	})->download($type);
    	// }

    	public function importExcel3(Request $request)
    	{
        // Cek field should not empty
    	$user = Auth::user();
        $isFieldExist = !empty($request->jenis_asuransi) && !empty($request->tanggal_registrasi);
        $file = $request->file('file_excel');
        $name = [];
        if($request->file('file_excel') && $isFieldExist){
          $path = $request->file('file_excel')->getClientOriginalName();
          $extension = $request->file('file_excel')->getClientOriginalExtension();
          $folder_to = public_path().'/uploads/';
          $file->move($folder_to,$path);

          $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          if('csv' == $extension){
          	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
          }else if('xlsx' == $extension){
          	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
          }
          

          $spreadsheet = $reader->load(public_path().'/uploads/'.$path);
          $sheetData = $spreadsheet->getActiveSheet()->toArray();

          // $dataSheet = (new FastExcel)->sheet(1)->import($folder_to.'/'.$path);
        // if($request->file('import_file') && $isFieldExist){
          // $path = public_path('format-upload.xlsx');
        //   $users = (new FastExcel)->import($path, function ($line) {
        //     $name = $line["NO"];
        // });
          // $workbook->easy_LoadXLSXFile(public_path().'/uploads/'.$path);
          // Get the table of data for the second worksheet
    	  // $xlsSecondTable = $workbook->easy_getSheet("Second tab")->easy_getExcelTable();
       //    // Write some data to the second sheet
       //   $xlsSecondTable->easy_getCell_2("A1")->setValue("Data added by Tutorial37");
       //   dd($xlsSecondTable);
        
		// $keys = array_shift($csv[6]);
		// dd($keys);
		// foreach ($csv as $i=>$row) {
		//     $csv[$i] = array_combine($keys, $row);
		// }

		//    $row = fgetcsv($handle, 4096,",");
		//    foreach ($row as $key => $value) {
		//    	dd($row);
		//    }
		  
		// }
          // $pathh = fopen($path, "r");
          // while(($cc = fgets($pathh, 10000)) !== FALSE){
          //   $line = explode(';', $cc);
          //   $vv = $line[5];
          // }
          // $dataSheet = $path->download($path, 'vouchers.xlsx');
          // $dataSheet = Excel::load($path, function($reader) {})->get();
          if(!empty($sheetData) && count($sheetData)){
          	$i = 0;
            foreach ($sheetData as $key => $dataasuransi) {
             $data_dokumen = null;
             if ($key > 4) { 
            	if ($dataasuransi[1] != null){
            		// dd($dataasuransi);
              // Hitung Premi Admin
              	  // $tgl_awal = strtotime($dataasuransi[5]);
            	  // $convert_date = new DateTime(); 
                  // $tgl_akhir = convert_date($dataasuransi[5]);
                  $kode_prod = $request->jenis_asuransi;
                  $getkdbroker = DB::table('jns_produksi')
                                ->select('kode_broker')
                                ->where([
                                              ['kode_prod',$kode_prod],
                                            ])
                                ->first();
                if($getkdbroker !=null){
    			  $kd_broker = $getkdbroker->kode_broker;
                  // $data_asuransi = $this->setdataasuransi($dataasuransi, $kode_prod, $kd_broker);
                  $kode_client = $user->kode_client;
          //         $plafon_ = $data_asuransi['plafon'];
          //         $tgl_lahir=$data_asuransi['tgl_lahir'];
		        // $tgl_awal=$data_asuransi['tgl_awal'];
		        // $tgl_akhir=$data_asuransi['tgl_akhir'];
		        // $debitur=$data_asuransi['debitur'];
		        // $kd_asu=$data_asuransi['kd_asu'];
		        // $rate=$data_asuransi['rate'];
		        // $tenorperbulan=$data_asuransi['tenorperbulan'];
		        // $premi=$data_asuransi['premi'];
		        // $plafon=$data_asuransi['plafon'];
                 //  $kd_broker = $getkdbroker->kode_broker;, 5
                  // 
                  
                  	if($dataasuransi[3] != null){
                  		$tgl_lahirr = str_replace('/','-', $dataasuransi[3]);
              	  		$tgl_lahir = date( 'Y-m-d', strtotime($tgl_lahirr));
                  	}else{
                  		$tgl_lahir = null;
                  	}
                  	if($dataasuransi[5] != null){
                  		$tgl_awall = str_replace('/','-', $dataasuransi[5]);
              	  		$tgl_awal = date( 'Y-m-d', strtotime($tgl_awall));
                  	}else{
                  		$tgl_awal = null;
                  	}
                  	if($dataasuransi[7] != null){
						$tgl_akhirr = str_replace('/','-', $dataasuransi[7]);
              	  		$tgl_akhir = date( 'Y-m-d', strtotime($tgl_akhirr));
                  	}else if($dataasuransi[7] == ""){
                  		$tgl_akhirr = null;
                  		$tgl_akhir = null;
                  	}
                  	if($dataasuransi[9] != null){
                  		$rate__ = $this->tofloat($dataasuransi[9]);
                  		$rate = ((double)$rate__);
                  		// dd($rate);
                  	}else{
                  		$rate = 0;
                  	}
              	  	if($dataasuransi[4] != null){
                  		$tenorperbulan = (float)$dataasuransi[4];
                  	}else{
                  		$tenorperbulan = 0;
                  	}
                  	if($dataasuransi[11] != null){
                  		$cover = $dataasuransi[11];
                  	}else{
                  		$cover = 0;
                  	}
              	  	if($dataasuransi[6] != null){
                  		$change_koma = str_replace(',','', $dataasuransi[6]);
                  		$plafon = (float)$change_koma;
                  	}else{
                  		$plafon = 0;
                  	}
                  	if($dataasuransi[10] != null){
                  		$change_koma_ = str_replace(',','', $dataasuransi[10]);
                  		$premi = (float)$change_koma_;
                  	}else{
                  		$premi = 0;
                  	}
                  	if($dataasuransi[2] != null){
                  		$debitur = $dataasuransi[2];
                  	}else{
                  		$debitur = null;
                  	}
                  	if($dataasuransi[8] != null){
                  		$umur = $dataasuransi[8];
                  	}else{
                  		$umur = 0;
                  	}// $tgl_awall = null;
              	  	// unset($tgl_awal);
                  // $tenorpertahun = $dataasuransi[3]);
                  
                  
                  // dd($tgl_lahir);
                  
                  $kode_client = $user->kode_client;
                  $getkdasu = DB::table('asuransi')
                                ->select('kode_asu')
                                ->where([
                                              ['kode_prod',$kode_prod],
                                              ['kode_broker',$kd_broker],

                                            ])
                                ->first();

                  $kd_asu = $getkdasu->kode_asu;
                 //  // $plafon_pinjaman = $request->plafon_pinjaman;
                  // dd($plafon);
                  // $valuePremi = $this->hitungPremi($dataasuransi[5], $value->model, $value->wilayah, "TLO");

                  // Hitung Nilai Depresiasi
                  // $listPremiDepresiasi = $this->hitungDepresiasi($value->premi, $value->tnr, $request->id_leasing);
                  // $premi_pertahun = $listPremiDepresiasi[0];
                  // $premi_sekaligus = $listPremiDepresiasi[1];

                  // Set Kategori Value
                  // $valueKategori = $this->setDataKategori($value->harga, $value->model);

                  // Set Value Cabang
                  // $valueCabang = $this->setDataCabang($value->cabang);
// dd($dataasuransi[10]);
                  $data_dokumen = (array)[
                    'kode_prod' => $kode_prod,
                    'kode_asu' => $kd_asu,
                    'kode_broker' => $kd_broker,
                    'kode_client' => $user->kode_client,
                    'asuransi_bank' => "",
                    'sts_klaim' => 0,
                    'id_rekon_ajk' => null,
                    'id_refund_ajk' =>null,
                    'no_polis' => null,
                    'tgl_polis' => null,
                    'no_debitur' => "",
                    'no_pk' => $dataasuransi[1],
                    'no_kwitansi' => "",
                    'tgl_kwitansi' => null,
                    'debitur' => $debitur,
                    'tmp_lahir' => "",
                    'noktp' => "",
                    'tgl_lahir' => $tgl_lahir,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'tenor' => $tenorperbulan,
                    'plafon' => $plafon,
                    'umur' => $umur,
                    'jaminan' => "",
                    'okupasi' => 0,
                    'rate' => $rate,
                    'ratenet' => 0,
                    'premi' => $premi,
                    'bayar' => 0,
                    'tgl_bayar' =>null,
                    'sts_bayar' => "",
                    'ket_bayar' => "",
                    'diskon_ass' => 0,
                    'fee_client' => 0,
                    'fee_pb' => 0,
                    'ppn' =>0,
                    'pph' => 0,
                    'pph_pb' => 0,
                    'tgl_upload' => null,
                    'tgl_aksep' => null,
                    'sts_polis' => 1,
                    'posisi' => 1,
                    'tot_cover' => 1,
                    'keterangan' => "",
                    'sts_asuransi' => "",
                    'createdate' => $request->tanggal_registrasi,
                    'createby' => $user->username,
                  ];
                  // dd($data_dokumen);
                  $rowExist = DB::table('produksi_ajk')
                              ->where([
                                        ['kode_prod','=', $kode_prod],
                                        ['kode_asu','=', $kd_asu],
                                        ['kode_broker','=', $kd_broker],
                                        ['kode_client','=', $kode_client],
                                      ])
                              ->get();
                 }
              	if(count($rowExist) > 0) {
                    // Update Perpanjangan Data
                    $tgl_reg_baru = strtotime($request->tanggal_registrasi);
                    $tgl_reg_lama = strtotime($rowExist[0]->createdate);
                    if($tgl_reg_baru > $tgl_reg_lama){
                      $insertRowUpdated[] = ([
                                              ['kode_prod','=', $kode_prod],
                                              ['kode_asu','=', $kd_asu],
                                              ['kode_broker','=', $getkdbroker->kode_broker],
                                              ['kode_client','=', $kode_client],
                                            ]);
                    // dd($tgl_reg_baru, $tgl_reg_lama);
                      // dd($insertRowUpdated);
                      // Backup data to table prod history
                      foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }
                      // Set Status Data baru/perpanjangan
                      // $status_perpanjangan = $this->checkDataPerpanjangan($value->tgl_booking, $value->tnr, $rowExist[0]);
                      // dd($arrayUpdateRow);
                      // Update current row
                      DB::table('produksi_ajk')->where([
                                                          ['kode_prod', $kode_prod],
                                                          ['kode_asu', $kd_asu],
                                                          ['kode_broker', $getkdbroker->kode_broker],
                                                          ['kode_client', $kode_client],
                                                        ])->update([
                          'createdate'=>date( 'Y-m-d', strtotime($request->tanggal_registrasi)),
                          // 'status_perpanjangan' => $status_perpanjangan,
                        ]);
                    }else {

                        // Row Existing
                        $insertRowExist[] = $dataasuransi[1];
                    }
                }else {
                    $insert[] = $data_dokumen;
                }
            	// dd($data_dokumen);


            	}
            		// continue; 
            }
            $tgl_akhirr = null; $tgl_akhir = null;
           	}
                  // dd($insert);
           	// dd($insertRowExist);
            if(!empty($insert) && empty($insertRowExist)){
              DB::table('produksi_ajk')->insert($insert);
              $response = array(
                  'status' => 'success',
                  'message' => 'Sukses Upload Data',
              );
              return response()->json($response);
    		}elseif(!empty($insert) && !empty($insertRowExist)){
              DB::table('produksi_ajk')->insert($insert);
              $response = array(
                  'status' => 'warning',
                  'message' => 'Error, file yang sudah ada tidak dapat di upload',
                  'rowexist' => $insertRowExist,
              );
              return response()->json($response);
            }elseif(!empty($arrayUpdateRow)){
              // Insert backup data to table produksi history
              $f = DB::table('history')
                ->insert(
                [
                  'username' => $user->username,
                  'tgl_create' => Carbon::now(),
                  'isi' => 'Update Data an '.$debitur.' Berhasil',
                ]
                // $arrayUpdateRow
                );
              $response = array(
                  'status' => 'update',
                  'message' => 'Sukses update data',
                  'rowupdated' => $insertRowUpdated,
              );
              return response()->json($response);
            }
            // else{
            //   $response = array(
            //       'status' => 'failure',
            //       'message' => 'Gagal Upload File, Terjadi kesalahan Upload',
            //       'rowexist' => $insertRowExist,
            //   );
            //   return response()->json($response);
            // }
    		}
    	}
        // Return error
        $response = array(
            'status' => 'failure',
            'message' => 'Gagal Upload File, Terjadi kesalahan Upload',
        );
        return response()->json($response);
    		//return back();
    	}

    public function tofloat($num) {
    $dotPos = strrpos($num, '.');
    $commaPos = strrpos($num, ',');
    // $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos : 
    //     ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);
   
    // if (!$sep) {
        // return floatval(preg_replace("/[^0-9]/", "", $num));

    return floatval(
        preg_replace("/[^0-9]/", "", substr($num, 0, $dotPos)) . '.' .
        preg_replace("/[^0-9]/", "", substr($num, $dotPos+1, strlen($num)))
    );
}

    public function setdataasuransi($dataasuransi, $kode_prod, $kd_broker)
    {
    	$tgl_lahirr = str_replace('/','-', $dataasuransi[3]);
        $tgl_lahir = date( 'Y-m-d', strtotime($tgl_lahirr));
        $tgl_awall = str_replace('/','-', $dataasuransi[5]);
        $tgl_awal = date( 'Y-m-d', strtotime($tgl_awall));
        $tgl_akhirr = str_replace('/','-', $dataasuransi[7]);
        $tgl_akhir = date( 'Y-m-d', strtotime($tgl_akhirr));
         // dd($tgl_lahir);
         $debitur = $dataasuransi[2];
         // $kd_asu = $dataasuransi[10];
         $getkdasu = DB::table('asuransi')
                       ->select('kode_asu')
                       ->where([
                                     ['kode_prod',$kode_prod],
                                     ['kode_broker',$kd_broker],

                                   ])
                       ->first();

         $kd_asu = $getkdasu->kode_asu;
         // $plafon_pinjaman = $request->plafon_pinjaman;
         $rate = $dataasuransi[9];
         // $tenorpertahun = $dataasuransi[3]);
         $tenorperbulan = $dataasuransi[4];
         // $premi = $dataasuransi[11];
         $change_koma = str_replace(',','', $dataasuransi[6]);
         $plafon = (float)$change_koma;
         $change_koma_ = str_replace(',','', $dataasuransi[10]);
         $premi = (float)$change_koma_;

      return $response = array(
        'status' => 'test',
        'tgl_lahir'=>$tgl_lahir,
        'tgl_awal'=>$tgl_awal,
        'tgl_akhir'=>$tgl_akhir,
        'debitur'=>$debitur,
        'kd_asu'=>$kd_asu,
        'rate'=>$rate,
        'tenorperbulan'=>$tenorperbulan,
        'premi'=>$premi,
        'plafon'=>$plafon,
        // 'premi_sekaligus'=>$premi_sekaligus,
      );
    }

public function importExcel2(Request $request)
      {
        // Cek field should not empty
        $asuransi = DB::table('asuransi')->where('kode_prod', $request->jenis_asuransi)->first();
        
        $isFieldExist = !empty($request->tanggal_upload);
        $file = $request->file('file_excel_bpd');
        $user = Auth::user();
        $data_dokumen = array();
        $insert = array();
        $insertRowUpdated = array();
        if($request->file('file_excel_bpd') && $isFieldExist){
        $dataSheet = Excel::load($request->file('file_excel_bpd'))->get();
        // $insert = array();

            if(!empty($dataSheet) && count($dataSheet)){
              $insertRowExist = array();
              $insert = array();
              foreach ($dataSheet as $key => $value) {
              foreach($value as $dataasuransi){
                $rowExist = array();
                // if ($value->nopin != null){
              // Hitung Premi Admin
                  $tgl_awal = date( 'Y-m-d', strtotime($dataasuransi['mulai_kreditmm_dd_yyyy']));
                  // $tgl_akhir = date( 'Y-m-d', strtotime($dataasuransi[5]));
                  $tgl_lahir = date( 'Y-m-d', strtotime($dataasuransi['tgl_lahirmm_dd_yyyy']));
                  $tenor = $dataasuransi['tenorbulan'];
                  $tgl_akhir = date('Y-m-d', strtotime($tgl_awal. ' + '.$tenor.' months'));
                  // $tgl_akhir = date( 'Y-m-d', strtotime($dataasuransi['jatuh_tempo']));
                  $no_pk = $dataasuransi['referensi_kredit'];
                  $nama_debitur = $dataasuransi['nama_debitur'];
                  // $no_debitur = $dataasuransi['no_debitur'];
                  // $no_ktp = $dataasuransi['no_ktp'];
                  $okupasi = $dataasuransi['loantype'];
                  // $rate = $dataasuransi['rate'];
                  $nominal_premi = $dataasuransi['nominal_premi'];
                  $pekerjaan = $dataasuransi['pekerjaan_debitur'];
                  $plafon = $dataasuransi['plafond_kredit'];
                  $kode_client = $dataasuransi['kode_cabang'];
                  $tahunlahir = date('Y', strtotime($tgl_lahir));
                  $tahunsekarang = date('Y');
                  $umur = $tahunsekarang-$tahunlahir;
                  $kode_asu = null;
                  $kode_broker = $dataasuransi['kodebroker'];
                  $fee_client = null;
                  $pph_pb = null;
                  $fee_pb = null;
                  $jenis_produksi = DB::table('rate')->where('kode_okup',$okupasi)->first();
                  $client = DB::table('client')->where('kode_client',$kode_client)->first();
                  if($client != null){
                    $kode_client = $client->kode_client;
                    $kode_broker = $client->kode_broker;
                    $fee_client = $client->fee_client;
                    $fee_pb = $client->fee_pb;
                    $pph_pb = $client->pph_pb;
                  }else{
                    $kode_client =$kode_client;
                    $kode_broker =$kode_broker;
                    $fee_client =$fee_client;
                    $fee_pb =$fee_pb;
                    $pph_pb =$pph_pb;
                  }
                  $kode_prod = '';
                  $rate = 0;
                  $premi = 0;
                  if($jenis_produksi != null){
                    $kode_prod = $jenis_produksi->kode_prod;
                    $rate =  $jenis_produksi->rate;
                  }
                  
                  $selisih = $tenor/12;
                  $selisih = ceil($selisih);
                  $premi = ($rate*$selisih*$plafon)/1000;
                  // if($selisih >)
                  // $kd_asu = $dataasuransi[''];
                  // $kode_prod = $dataasuransi[9];
                  $posisi = $user->posisi;
                  $data_dokumen = [
                    'kode_prod' => $kode_prod,
                    'kode_asu' => null,
                    'kode_broker' => $kode_broker,
                    'kode_client' => $kode_client,
                    'asuransi_bank' => "AKTIF",
                    'pekerjaan' => $pekerjaan,
                    'sts_klaim' => 0,
                    'id_rekon_ajk' => null,
                    'id_refund_ajk' =>null,
                    'no_polis' => null,
                    'tgl_polis' => null,
                    'no_debitur' => null,
                    'no_pk' => $no_pk,
                    'no_kwitansi' => "",
                    'debitur' => $nama_debitur
                    ,
                    'tmp_lahir' => null,
                    'noktp' => null,
                    'tgl_lahir' => $tgl_lahir,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'tgl_pelunasan' => null,
                    'tgl_dok_lengkap' => null,
                    'tgl_kwitansi' => null,
                    'tenor' => $tenor,
                    'plafon' => $plafon,
                    'umur' => $umur,
                    'jaminan' => "",
                    'kode_okup' => $okupasi,
                    'rate' => $rate,
                    'ratenet' => 0,
                    'premi' => $premi,
                    'nominal_premi' => $nominal_premi,
                    'bayar' => 0,
                    'tgl_bayar' =>null,
                    'tgl_upload' =>$request->tanggal_upload,
                    'tgl_aksep' =>null,
                    'sts_refund' => 0,
                    'sts_bayar' => 0,
                    'sts_asuransi' => null,
                    'ket_bayar' => "",
                    'diskon_ass' => 0,
                    'fee_client' => $fee_client,
                    'fee_pb' => $fee_pb,
                    'ppn' =>0,
                    'pph' => 0,
                    'pph_pb' => $pph_pb,
                    'sts_polis' => 0,
                    'posisi' => 2,
                    'tot_cover' => 1,
                    'keterangan' => "",
                    'sts_asuransi' => "",
                    'createdate' => Carbon::now(),
                    'createby' => $user->name,
                  ];
                                
                  $rowExist = DB::table('produksi_ajk')
                              ->where([
                                        ['no_pk','=', $no_pk],
                                      ])
                              ->first();
                    if($rowExist != null) {
                    // Update Perpanjangan Data
                      $insertRowUpdated[] = 
                                              [
                                                'no_pk'=> $no_pk
                                              ]
                                          ;
                      // Backup data to table prod history
                      foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }
                      // Set Status Data baru/perpanjangan
                      // $status_perpanjangan = $this->checkDataPerpanjangan($value->tgl_booking, $value->tnr, $rowExist[0]);
                      // Update current row
                      DB::table('produksi_ajk')->where([
                                                          ['no_pk', $no_pk],
                                                        ])->update($data_dokumen);
                    
                    // }
                  }else{
                    $insert[] = $data_dokumen;
                  }
                }
              }
            }

            if(!empty($insert) && empty($insertRowUpdated)){
              DB::table('produksi_ajk')->insert($insert);
              $response = array(
                  'status' => 'success',
                  'message' => 'Sukses Upload Data',
              );
              return response()->json($response);
    		    }elseif(!empty($insert) && !empty($insertRowUpdated)){
              DB::table('produksi_ajk')->insert($insert);
              $response = array(
                  'status' => 'success',
                  'message' => 'Sukses Add Data dan Update Data',
                  'rowexist' => $insertRowUpdated,
              );
              return response()->json($response);
            }elseif(empty($insert) && !empty($insertRowUpdated)){
              $response = array(
                  'status' => 'success',
                  'message' => 'Sukses Add Data dan Update Data',
                  'rowexist' => $insertRowUpdated,
              );
              return response()->json($response);
            }
    		}else{
              $response = array(
                  'status' => 'failure',
                  'message' => 'Gagal Upload File, Terjadi kesalahan Upload',
                  'rowexist' => $insertRowExist,
              );
              return response()->json($response);
        }
    	}
      public function importExcel22(Request $request)
      {
        // Cek field should not empty
        $asuransi = DB::table('asuransi')->where('kode_prod', $request->jenis_asuransi)->first();
        // $kode_prod = $request->jenis_asuransi;
        // $kode_asu = $asuransi->kode_asu;
        // $kode_broker = $asuransi->kode_broker;
        // $namaasuransi = $asuransi->nama;
        $isFieldExist = !empty($request->tanggal_upload);
        $file = $request->file('file_excel_bpd');
        $user = Auth::user();
        $data_dokumen = array();
        $insert = array();
        $insertRowUpdated = array();
        if($request->file('file_excel_bpd') && $isFieldExist){
        $dataSheet = Excel::load($request->file('file_excel_bpd'))->get();
        // $insert = array();

            if(!empty($dataSheet) && count($dataSheet)){
              $insertRowExist = array();
              $insert = array();
              foreach ($dataSheet as $key => $value) {
              foreach($value as $dataasuransi){
                $rowExist = array();
                
                // if ($value->nopin != null){
              // Hitung Premi Admin
                  $tgl_awal = date( 'Y-m-d', strtotime($dataasuransi['tgl_akad']));
                  // $tgl_akhir = date( 'Y-m-d', strtotime($dataasuransi[5]));
                  $tgl_lahir = date( 'Y-m-d', strtotime($dataasuransi['tgl_lahir']));
                  $tgl_akhir = date( 'Y-m-d', strtotime($dataasuransi['jatuh_tempo']));
                  $no_pk = $dataasuransi['no_akad'];
                  $nama_debitur = $dataasuransi['nasabah'];
                  $no_debitur = $dataasuransi['no_debitur'];
                  $no_ktp = $dataasuransi['no_ktp'];
                  $okupasi = $dataasuransi['kode_okup'];
                  $rate = $dataasuransi['rate'];
                  $premi = $dataasuransi['premi'];
                  $pekerjaan = $dataasuransi['pekerjaan'];
                  $tenor = $dataasuransi['tenor'];
                  $plafon = $dataasuransi['plafon'];
                  $kode_client = $dataasuransi['kode_cab'];
                  $tahunlahir = date('Y', strtotime($tgl_lahir));
                  $tahunsekarang = date('Y');
                  $umur = $tahunsekarang-$tahunlahir;
                  $kode_asu = null;
                  $kode_broker = null;
                  $fee_client = null;
                  $pph_pb = null;
                  $fee_pb = null;
                  $jenis_produksi = DB::table('rate')->where('kode_okup',$okupasi)->first();
                  $client = DB::table('client')->where('kode_client',$kode_client)->first();
                  if($client != null){
                    $kode_client = $client->kode_client;
                    $kode_broker = $client->kode_broker;
                    $fee_client = $client->fee_client;
                    $fee_pb = $client->fee_pb;
                    $pph_pb = $client->pph_pb;
                  }else{
                    $kode_client =$kode_client;
                    $kode_broker =$kode_broker;
                    $fee_client =$fee_client;
                    $fee_pb =$fee_pb;
                    $pph_pb =$pph_pb;
                  }
                  $kode_prod = '';
                  $rate = 0;
                  $premi = 0;
                  if($jenis_produksi != null){
                    $kode_prod = $jenis_produksi->kode_prod;
                    $rate =  $jenis_produksi->rate;
                  }
                  $selisih = $tenor/12;
                  $selisih = ceil($selisih);
                  $premi = ($rate*$selisih*$plafon)/1000;
                  // if($selisih >)
                  // $kd_asu = $dataasuransi[''];
                  // $kode_prod = $dataasuransi[9];
                  $posisi = $user->posisi;
                  $data_dokumen = [
                    'kode_prod' => $kode_prod,
                    'kode_asu' => null,
                    'kode_broker' => $kode_broker,
                    'kode_client' => $kode_client,
                    'asuransi_bank' => "AKTIF",
                    'pekerjaan' => $pekerjaan,
                    'sts_klaim' => 0,
                    'id_rekon_ajk' => null,
                    'id_refund_ajk' =>null,
                    'no_polis' => null,
                    'tgl_polis' => null,
                    'no_debitur' => $no_debitur,
                    'no_pk' => $no_pk,
                    'no_kwitansi' => "",
                    'debitur' => $nama_debitur
                    ,
                    'tmp_lahir' => "",
                    'noktp' => $no_ktp,
                    'tgl_lahir' => $tgl_lahir,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'tgl_pelunasan' => null,
                    'tgl_dok_lengkap' => null,
                    'tgl_kwitansi' => null,
                    'tenor' => $tenor,
                    'plafon' => $plafon,
                    'umur' => $umur,
                    'jaminan' => "",
                    'kode_okup' => $okupasi,
                    'rate' => $rate,
                    'ratenet' => 0,
                    'premi' => $premi,
                    'bayar' => 0,
                    'tgl_bayar' =>null,
                    'tgl_upload' =>$request->tanggal_upload,
                    'tgl_aksep' =>null,
                    'sts_refund' => 0,
                    'sts_bayar' => 0,
                    'sts_asuransi' => null,
                    'ket_bayar' => "",
                    'diskon_ass' => 0,
                    'fee_client' => $fee_client,
                    'fee_pb' => $fee_pb,
                    'ppn' =>0,
                    'pph' => 0,
                    'pph_pb' => $pph_pb,
                    'sts_polis' => 0,
                    'posisi' => 2,
                    'tot_cover' => 1,
                    'keterangan' => "",
                    'sts_asuransi' => "",
                    'createdate' => Carbon::now(),
                    'createby' => $user->name,
                  ];
                                
                  $rowExist = DB::table('produksi_ajk')
                              ->where([
                                        ['no_pk','=', $no_pk],
                                      ])
                              ->first();
                    if($rowExist != null) {
                    // Update Perpanjangan Data
                      $insertRowUpdated[] = 
                                              [
                                                'no_pk'=> $no_pk
                                              ]
                                          ;
                      // Backup data to table prod history
                      foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }
                      // Set Status Data baru/perpanjangan
                      // $status_perpanjangan = $this->checkDataPerpanjangan($value->tgl_booking, $value->tnr, $rowExist[0]);
                      // Update current row
                      DB::table('produksi_ajk')->where([
                                                          ['no_pk', $no_pk],
                                                        ])->update($data_dokumen);
                    
                    // }
                  }else{
                    $insert[] = $data_dokumen;
                  }
                }
              }
            }

              if(!empty($insert) && empty($insertRowUpdated)){
              DB::table('produksi_ajk')->insert($insert);
              $response = array(
                  'status' => 'success',
                  'message' => 'Sukses Upload Data',
              );
              return response()->json($response);
    		    }elseif(!empty($insert) && !empty($insertRowUpdated)){
              DB::table('produksi_ajk')->insert($insert);
              $response = array(
                  'status' => 'success',
                  'message' => 'Sukses Add Data dan Update Data',
                  'rowexist' => $insertRowUpdated,
              );
              return response()->json($response);
            }elseif(empty($insert) && !empty($insertRowUpdated)){
              $response = array(
                  'status' => 'success',
                  'message' => 'Sukses Add Data dan Update Data',
                  'rowexist' => $insertRowUpdated,
              );
              return response()->json($response);
            }
    		}else{
              $response = array(
                  'status' => 'failure',
                  'message' => 'Gagal Upload File, Terjadi kesalahan Upload',
                  'rowexist' => $insertRowExist,
              );
              return response()->json($response);
        }
    	}


      public function setvalueasuransi($v){
        $i =0;

        foreach ($v as $key2 => $value) {
                $dataasuransi[$i] = $value;
                // dd($sheetValue->count());
                  $i++;
              }
              return $dataasuransi;
      }
      function hitung_umur($tanggal_lahir, $tanggal_akad) {
        list($year,$month,$day) = explode("-",$tanggal_lahir);
        list($year2,$month2,$day2) = explode("-",$tanggal_akad);
        return $year_diff  = $year2 - $year;
      }
      // public function rename_key_array(){
      //   $tags = array_map(function($tag) {
      //   return array(
      //     'name' => $tag['name'],
      //     'value' => $tag['url']
      //     );
      //   }, $tags);
      // }

      
      // public function setDataCabang($cabang){

      //   $data_cabang = DB::table('master_leasing_cabang')->where('nama_ls_cabang', '=', $cabang)->get();

      //   return $data_cabang[0]->id_leasing_cabang;

      // }

      // public function setDataKategori($plafon, $model) {

      //   if ($model == 'TRUCK' || $model == 'PICK UP' || $model == 'PICKUP') {
      //     return '6';
      //   }else if($model == 'BUS' || $model == 'MIKROBUS' || $model == 'MIKRO BUS' || $model == 'MICRO BUS' || $model == 'MICROBUS') {
      //     return '7';
      //   }else {
      //     if ($plafon > 0 && $plafon <= 125000000){
      //       return '1';
      //     }else if($plafon > 125000000 && $plafon <= 200000000){
      //       return '2';
      //     }else if($plafon > 200000000 && $plafon <= 400000000){
      //       return '3';
      //     }else if($plafon > 400000000 && $plafon <= 800000000){
      //       return '4';
      //     }else if($plafon > 800000000){
      //       return '5';
      //     }
      //   }

      //   return '0';

      // }

      // public function checkDataPerpanjangan($tgl_booking, $tenor, $data){

      //   //$data = DB::table('table_produksi')->where('no_pin', $no_pin)->get();

      //   $jumlah_tenor = round($tenor / 12, 1);

      //   if($jumlah_tenor > 1 && strtotime($tgl_booking)>strtotime($data->tgl_booking) ){
      //       // Set Tahun
      //       if($data->status_perpanjangan == "NEW"){
      //         return 'TAHUN2';
      //       }elseif(substr($data->status_perpanjangan, 5) <= $jumlah_tenor){
      //         $tahun = substr($data->status_perpanjangan, 5);
      //         return 'TAHUN' . $tahun+=1;
      //       }else {
      //         return 'OVER';
      //       }
      //   }else {
      //     return 'NEW';
      //   }

      // }

      // public function hitungDepresiasi($nilai_premi, $tenor, $id_leasing) {
      //   $depresiasi_leasing = DB::table('master_leasing_depresiasi')->where('id_leasing', $id_leasing)->first();
      //   $depresiasi_leasing_persen = explode(',', $depresiasi_leasing->persen_depres);

      //   $jumlah_tenor = round($tenor / 12, 1);
      //   $premi_sekaligus = 0;
      //   $array_nilai_premi = array();
      //   for ($x = 0; $x < $jumlah_tenor; $x++) {

      //     $nilai_premi_depres = (($nilai_premi * $depresiasi_leasing_persen[$x])/100);
      //     $array_nilai_premi[] = round($nilai_premi_depres,0);
      //     $premi_sekaligus += $nilai_premi_depres;

      //   }

      //   $arrayPremi = implode(',', $array_nilai_premi);

      //   $response = array(
      //         $arrayPremi,
      //         $premi_sekaligus,
      //   );
      //   return $response;

      // }

      // public function hitungPremi( $plafon, $modelKend, $wilayah, $jenis_asuransi) { // $plafon, $modelKend, $platNomor, $jenis_asuransi
      //   // Define Jenis Asuransi
      //   if ($jenis_asuransi == "TLO") {
      //     $table_rate = 'master_rate_tlo';
      //   }else {
      //     $table_rate = 'master_rate_allrisk';
      //   }

      //   if ($modelKend == "PICK UP" || $modelKend == "PICKUP" || $modelKend == "TRUCK") {
      //     $kelasModel = 'C';
      //   }else if($modelKend == "BUS" || $modelKend == "MIKRO BUS" || $modelKend == "MIKROBUS" || $modelKend == 'MICRO BUS' || $modelKend == 'MICROBUS'){
      //     $kelasModel = 'B';
      //   }else {
      //     $kelasModel = 'A';
      //   }

      //   //$platWilayah = $this->getWilayahPlatNomor($platNomor);

      //   $resultRate = $this->getKategori($plafon, $wilayah, $kelasModel, $table_rate );

      //   if(!empty($resultRate)){

      //     return $resultRate;

      //   }


      //   // Return error
      //   return "error";
      // }


      // public function getWilayahPlatNomor($platNomor){
      //   //$platNomor = $request->platNomor;
      //   $kodePlatNomor = substr($platNomor, 0, 2);
      //   if(!empty($kodePlatNomor)){
      //     $platWilayah = DB::table('master_kode_plat')->where('kode_plat', $kodePlatNomor)->first();

      //     if(!empty($platWilayah)){
      //       return $platWilayah->wilayah;
      //     }
      //   }
      //   // Return error
      //   return "error";
      // }

      // public function getKategori($plafon, $wilayah, $kelasModel, $table_rate){
      //   $rangeKategori = '';

      //   // Hitung Range Plafon
      //   if ($kelasModel == 'A') {
      //     if ($plafon > 0 && $plafon <= 125000000){
      //       $rangeKategori = '0TO125';
      //     }else if($plafon > 125000000 && $plafon <= 200000000){
      //       $rangeKategori ='125TO200';
      //     }else if($plafon > 200000000 && $plafon <= 400000000){
      //       $rangeKategori = '200TO400';
      //     }else if($plafon > 400000000 && $plafon <= 800000000){
      //       $rangeKategori = '400TO800';
      //     }else if($plafon > 800000000){
      //       $rangeKategori = 'UPTO800';
      //     }
      //   }else {
      //       $rangeKategori = 'NO RANGE';
      //   }

      //   // Get Rate
      //   $dataRate = DB::table($table_rate)->where([
      //     ['range', '=', $rangeKategori],
      //     ['kelas', '=', $kelasModel],
      //   ])->first();

      //   if (!empty($dataRate)){
      //     switch ($wilayah) {
      //       case 'WILAYAH 1':
      //         # code...
      //         return $dataRate->rate_wilayah_1;
      //         break;

      //       case 'WILAYAH 2':
      //         # code...
      //         return $dataRate->rate_wilayah_2;
      //         break;

      //       case 'WILAYAH 3':
      //         # code...
      //         return $dataRate->rate_wilayah_3;
      //         break;
      //       default :
      //         # code...
      //         return "Model dan plafon tidak sama";
      //         break;
      //     }
      //   }
      //   return "error";
      // }

  }

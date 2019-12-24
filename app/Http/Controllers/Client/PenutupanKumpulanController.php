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
use Fpdf;
use RealRashid\SweetAlert\Facades\Alert;

class penutupankumpulanController extends Controller
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
        $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $valuebutton = "Kirim Ke Admin";                      
     
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $valuebutton = "Kirim Ke Admin";  
       

      }else{
        $valuebutton = "Kirim Ke Admin";   
        

      }

    }else{
      $valuebutton = "Kirim Ke Asuransi";  
     

    }
        // $dokumens = DB::table('table_produksi')->where('status_proses', 0)->get();
        // $leasing = DB::table('master_leasing')->get();
        $jenisasuransi = DB::table('asuransi')
                      ->leftJoin('jns_produksi', 'asuransi.kode_prod','jns_produksi.kode_prod')
                      ->select('jns_produksi.kode_prod','jns_produksi.nama')
                      ->get();
        // if(!empty($dokumens) && !empty($leasing)){
          return view ( 'Admin/formuploaddata' ,[
            // 'dokumens' => $dokumens,
            'jenisasuransi' => $jenisasuransi,
            'valuebutton' => $valuebutton,
            ]
          );
        // }
        // return back();
      }

      // public function clearTable() {

      //   DB::table('table_produksi')->truncate();
      //   $response = array(
      //       'status' => 'success',
      //       'message' => 'Clear table success',
      //   );
      //   return response()->json($response);
      // }

      public function reload()
      {
        return datatables(DB::table('produksi_ajk as a')
            ->select('a.*','d.okupasi','b.nama as nama_cabang','c.nama as nama_asuransi')
            ->leftJoin('client as b', 'a.kode_client','b.kode_client')
            ->leftJoin('asuransi as c', 'c.kode_asu','a.kode_asu')
            ->leftJoin('rate as d', 'd.kode_okup','a.kode_okup')
        		->where('posisi', 1))
        		->toJson();
      }
      
      public function reloadnosend()
      {
        $user = Auth::user();
      $jenisuser = DB::table('posisi')->where('id', $user->posisi)->first();
      $posisiuser = $user->posisi;
      $kodeposisi = $user->perusahaan;
      if($posisiuser == 3){
          $whereCondition = [
                                ['produksi_ajk.kode_asu', $kodeposisi],
                                ['produksi_ajk.posisi', 1],
                                ['produksi_ajk.sts_polis', 0],
                                ['produksi_ajk.sts_klaim',0],
                                ['produksi_ajk.sts_refund',0],
                            ];
        }elseif($posisiuser == 1){
          $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
          if(count($mst_client)>0){
            $whereCondition = [
                                ['client.kode_pusat', $kodeposisi],
                                ['produksi_ajk.posisi', 1],
                                ['produksi_ajk.sts_polis', 0],
                                ['produksi_ajk.sts_klaim',0],
                                ['produksi_ajk.sts_refund',0],
                              ];
          }else{
            $whereCondition = [
                                ['produksi_ajk.kode_client', $kodeposisi],
                                ['produksi_ajk.posisi', 1],
                                ['produksi_ajk.sts_polis', 0],
                                ['produksi_ajk.sts_klaim',0],
                                ['produksi_ajk.sts_refund',0],
                              ];
          }
        }else{
          $whereCondition = [
                                ['produksi_ajk.posisi', 1],
                                ['produksi_ajk.sts_polis', 0],
                                ['produksi_ajk.sts_klaim',0],
                                ['produksi_ajk.sts_refund',0],
                            ]; 
        }

        $klaim = DB::table('produksi_ajk')
                ->join('jns_produksi', 'produksi_ajk.kode_prod', '=', 'jns_produksi.kode_prod')
                ->join('client', 'produksi_ajk.kode_client', '=', 'client.kode_client')
                ->select('produksi_ajk.*','jns_produksi.*', 'client.nama as namaclient')
                ->where($whereCondition)
                ->get();
      return datatables($klaim)->toJson();
      }
      
      public function reloadby($startaksep, $endaksep)
      {
        $start = date( 'Y-m-d', strtotime($startaksep) );
        $end = date( 'Y-m-d', strtotime($endaksep) );
        // dd($start);
        return datatables(DB::table('produksi_ajk')
                  ->whereBetween('tgl_awal', array($start, $end))->get())
                  ->toJson();
      }
      public function nokwitansi($no_pk)
      {
        $getNoKwitansi =  DB::table('produksi_ajk')
                      ->select('no_pk', 'no_kwitansi')
                      ->where('no_pk', $no_pk)
                      ->first();
        $noKwitansi = $getNoKwitansi->no_kwitansi;
        if($noKwitansi == "" || $noKwitansi == null){
          $dokumens = DB::table('produksi_ajk')
              ->max('no_kwitansi');
          if($dokumens != ""){
            //.
            $no_urut = substr($dokumens, 4, 4);
            $intNo = (int)$no_urut;
            $plusNo = $intNo+1;
            $char = "KWT";
            $no_kwitansi = $char . sprintf("%04s", $plusNo);
            DB::table('produksi_ajk')->where('no_pk', $no_pk)->update([
              'no_kwitansi' =>  $no_kwitansi,
            ]);
            $response = array(
              'dokumens' => $no_kwitansi,
              'status' => 'new_number',
              );
            return response()->json($response);

            //...
          }else{
            //.
            $no_kwitansi = 'KWT0001';
            DB::table('produksi_ajk')->where('no_pk', $no_pk)->update([
              'no_kwitansi' =>  $no_kwitansi,
            ]);
            $response = array(
              'dokumens' => $no_kwitansi,
              'status' => 'start_number',
              );
            return response()->json($response);

            //...
          }

        }else{
          $no_kwitansi = $noKwitansi;
          $response = array(
              'dokumens' => $no_kwitansi,
              'status' => 'start_number',
              );
            return response()->json($response);
        }
        // $dokumens = DB::table('produksi_ajk')
        // 			->max('no_kwitansi');
        // // $no_kwitansi = $dokumens->no_kwitansi;
        // // dd($no_kwitansi);
        // // $x = ("%3s",$no_urut);
        // if($dokumens != "" ){
		      // $no_urut = substr($dokumens, 3, 3);
        //    $no_kwitansi = (int)$no_urut;
        //    $no_kwitansi = $no_kwitansi+1;
        //    dd($no_kwitansi);
        //   $response = array(
        //     'dokumens' => $dokumens,
        //     'status' => 'new_number',
        //       );
        //   // return response()->json($response);
        // }else{
        //   $no_urut = 'KSK001';
        //    $response = array(
        //     'dokumens' => $no_urut,
        //     'status' => 'start_number',
        //       );
        //   return response()->json($response);
        // }
      }


    	public function updatesertifikat(Request $request)
    	{
    		$getNoPk =  DB::table('produksi_ajk')
                      ->where('no_polis', $request->no_sertifikat)
                      ->first();
        $noPk = $request->no_kredit;
        if($getNoPk == "" || $getNoPk == null){
          
            DB::table('produksi_ajk')->where('no_pk', $noPk)->update([
              'tgl_polis' =>  date( 'Y-m-d', strtotime($request->tanggal_sertifikat)),
              'no_polis' =>  $request->no_sertifikat,
              'sts_polis' =>  1,
              'posisi' =>  4,
            ]);
            $response = array(
              'status' => 'success',
              'messages' => 'Update No Polis Berhasil',
              );
          return response()->json($response);
        }else{
          $response = array(
              'messages' => 'Maaf No sertifikat Sudah Terdaftar',
              'status' => 'failed',
              );
          return response()->json($response);
        }
    	}

      public function konfirmdata(Request $request)
      {
        $getNoPk =  DB::table('produksi_ajk')
                      ->where('no_pk', $request->no_pk)
                      ->first();
        $noPk = $getNoPk->no_pk;
        if($noPk != "" || $noPk != null){
          
            DB::table('produksi_ajk')->where('no_pk', $noPk)->update([
              'keterangan' =>  $request->keterangan,
            ]);
            $response = array(
              'status' => 'success',
              'messages' => 'Konfirmasi Data Berhasil',
              );

          alert()->success('Post Created', 'Successfully');
          Alert::success('Success Title', 'Success Message');
          return response()->json($response);
        }else{
          $response = array(
              'messages' => 'Konfirmasi Data Gagal',
              'status' => 'failed',
              );

          return response()->json($response);
        }
      }

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
                    $tgl_reg = date( 'Y-m-d', strtotime($request->tanggal_registrasi));
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
                    'kode_okup' => 0,
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
                    'createdate' =>  $tgl_reg,
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
	dd($request->all());
        $isFieldExist = !empty($request->jenis_asuransi) && !empty($request->tanggal_registrasi);
        $file = $request->file('file_excel');
        $name = [];
        if($request->file('file_excel') && $isFieldExist){
          $path = $request->file('file_excel')->getClientOriginalName();
          $folder_to = public_path().'/uploads/';
          $file->move($folder_to,$path);
          // $dataSheet = (new FastExcel)->sheet(1)->import($folder_to.'/'.$path);
        // if($request->file('import_file') && $isFieldExist){
          // $path = public_path('format-upload.xlsx');
        //   $users = (new FastExcel)->import($path, function ($line) {
        //     $name = $line["NO"];
        // });
        if (($handle = fopen($folder_to.'/'.$path, 'r')) !== FALSE)
		{
			while (($dataSheet[] = fgetcsv($handle, 1000, ',')) !== FALSE) {}
    		// fclose($handle);
		}
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
          if(!empty($dataSheet) && count($dataSheet)){
            foreach ($dataSheet as $dataasuransi) {
            	// if ($value->nopin != null){
              // Hitung Premi Admin
              $tgl_awal = date( 'Y-m-d', strtotime($dataasuransi[1]));
                  $tgl_akhir = date( 'Y-m-d', strtotime($dataasuransi[5]));
                  $tgl_lahir = date( 'Y-m-d', strtotime($dataasuransi[3]));
                  $nama_debitur = $dataasuransi[2];
                  $kode_client = $dataasuransi[8];
                  $kd_asu = $dataasuransi[10];
                  $kode_prod = $dataasuransi[9];
                  $getkdbroker = DB::table('client')
                                ->select('kode_broker')
                                ->where([
                                              ['kode_client',$kode_client],
                                            ])
                                ->first();
                  if($getkdbroker !=null){
                  $kd_broker = $getkdbroker->kode_broker;
                  // dd($kd_broker);
                  // $plafon_pinjaman = $request->plafon_pinjaman;
                  $umur = $this->hitung_umur( $tgl_lahir , $tgl_akhir );
                  $tenorpertahun = $this->hitung_umur( $tgl_awal , $tgl_akhir );
                  $tenorperbulan = $tenorpertahun*12;
                  $premi = ($dataasuransi[4] * $dataasuransi[7])/1000;
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
                  $data_dokumen = [
                    'kode_prod' => $kode_prod,
                    'kode_asu' => $dataasuransi[10],
                    'kode_broker' => $kd_broker,
                    'kode_client' => $kode_client,
                    'asuransi_bank' => "",
                    'sts_klaim' => $dataasuransi[13],
                    'id_rekon_ajk' => null,
                    'id_refund_ajk' =>null,
                    'no_polis' => null,
                    'tgl_polis' => null,
                    'no_debitur' => "",
                    'no_pk' => $dataasuransi[0],
                    'no_kwitansi' => "",
                    'tgl_kwitansi' => null,
                    'debitur' => $dataasuransi[2]
                    ,
                    'tmp_lahir' => "",
                    'noktp' => $dataasuransi[12],
                    'tgl_lahir' => $tgl_lahir,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'tenor' => $tenorperbulan,
                    'plafon' => $dataasuransi[4],
                    'umur' => 1,
                    'jaminan' => "",
                    'kode_okup' => $dataasuransi[6],
                    'rate' => $dataasuransi[7],
                    'ratenet' => 0,
                    'premi' => 0,
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
                    'createdate' => Carbon::now(),
                    'createby' => "",
                  ];

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
                      $insertRowExist = array(
                                                  'kode_prod' => $kode_prod,
                                                  'kode_asu' => $kd_asu,
                                                  'kode_broker' => $kd_broker,
                                                  'kode_client' => $kode_client,
                                              );
                                            //   ['kode_prod', $kode_prod],
                                            //   ['kode_asu', $kd_asu],
                                            //   ['kode_broker', $kd_broker],
                                            //   ['kode_client', $kode_client]
                                            // ;

                        // Row Existing
                        // $insertRowExist[] = $value->nopin;
                    }
                  }else {
                    $insert[] = $data_dokumen;
                  }
            }
                  // dd($arrayUpdateRow);


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
                  'isi' => 'Update Data an '.$nama_debitur.' Berhasil',
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

      public function cetakkwitansi($nopk){
      // $no_pin = $request->no_pin;

      $data_kwitansi = DB::table('produksi_ajk')
        ->leftJoin('client','produksi_ajk.kode_client', 'client.kode_client')
        ->select('produksi_ajk.*', 'client.nama as namacabang')
      ->where('no_pk', $nopk)->first();
      // $data_leasing = DB::table('master_leasing')->where('id_leasing', $data_sertifikat[0]->id_master_leasing)->get();

      $this->templateSertifikat($data_kwitansi);
      }

      public function templateSertifikat($data_kwitansi){

      // Set Page Size
      Fpdf::AddPage('P', 'A4');

      // Add Header Title
      for ($j=0; $j <3 ; $j++) { 
      // Sub title Header BOLD
      // =========== TERTANGGUNG ================
      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial','B',15);
      Fpdf::Cell(0,0,"KWITANSI",0,1,'C');
      Fpdf::Ln(5);
      Fpdf::SetX(150);
      Fpdf::SetLineWidth(0.1);
      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial', 'I', 15);
      Fpdf::SetFillColor(255,255,255);
      if($j == 0){
          $ket = 'ASLI';
      }else if($j == 1){
          $ket = 'Copy 1';
      }else{
          $ket = 'Copy 2';
      }
      Fpdf::Cell(30, 10, $ket,1, 0, 'C');
      // Sub title Header BOLD
      // =========== PERTANGGUNGAN ASURANSI ================
      $firstRowName = ([
        "No. Pengajuan Kredit",
        "No. Registasi",
        "Sudah terima dari",
        "Atas Pembayaran",
        "Periode",
        "Tenor",
        "Plafon Pinjaman",
        "Premi"]
      );
      // $firstRowValue = ([
      //   $data_kwitansi->no_kwitansi. " QQ ". $data_kwitansi->no_debitur,
      //   $data_kwitansi->tgl_lahir,
      //   "35-01354-05-65420 / ".$data_kwitansi->tenor." Bulan"]
      // );
      // for ($i=0; $i < count($firstRowName); $i++) {
      //   # code...
      //   Fpdf::SetTextColor(0,0,0);
      //   Fpdf::SetFont('Arial',"",11);
      //   Fpdf::SetX(15);
      //   Fpdf::Cell(0,5,$firstRowName[$i],0);

      //   Fpdf::SetTextColor(0,0,0);
      //   Fpdf::SetFont('Arial',"",11);
      //   Fpdf::SetX(60);
      //   Fpdf::Cell(0,5,':',0);

      //   Fpdf::SetTextColor(0,0,0);
      //   Fpdf::SetFont('Arial',"",11);
      //   Fpdf::SetX(65);
      //   Fpdf::MultiCell(120,5,'$firstRowValue[$i]',0);
      // }
      // Fpdf::Ln(5);


      // // Sub title Header BOLD
      // // =========== OBYEK PERTANGGUNGAN ================
      // Fpdf::SetTextColor(0,0,0);
      // Fpdf::SetFont('Arial','B',11);
      // Fpdf::Cell(100,0,"OBYEK PERTANGGUNGAN",0,1,'L');
      // Fpdf::Ln(5);

      $firstRowValue = ([
        $data_kwitansi->no_pk,
        $data_kwitansi->no_kwitansi,
        $data_kwitansi->debitur,
        'Asuransi Jiwa Kredit',
        $data_kwitansi->tgl_awal.' s/d '. $data_kwitansi->tgl_akhir,
        $data_kwitansi->tenor.' /bln',
        'Rp. '.$data_kwitansi->plafon,
        'Rp. '.$data_kwitansi->premi,
        ]
      );
      for ($i=0; $i < count($firstRowName); $i++) {
          if($i == 5) {
            Fpdf::SetTextColor(0,0,0);
            Fpdf::SetFont('Arial',"",11);
            Fpdf::SetX(95);
            Fpdf::Cell(0,5,$firstRowName[$i],0);

            Fpdf::SetTextColor(0,0,0);
            Fpdf::SetFont('Arial',"",11);
            Fpdf::SetX(140);
            Fpdf::Cell(0,5,':',0);

            Fpdf::SetTextColor(0,0,0);
            Fpdf::SetFont('Arial',"",11);
            Fpdf::SetX(145);
            Fpdf::Cell(40,5,$firstRowValue[$i],0);
          } else {
            

            Fpdf::SetTextColor(0,0,0);
            Fpdf::SetFont('Arial',"",11);
            Fpdf::SetX(15);
            Fpdf::Cell(0,5,$firstRowName[$i],0);

            Fpdf::SetTextColor(0,0,0);
            Fpdf::SetFont('Arial',"",11);
            Fpdf::SetX(60);
            Fpdf::Cell(0,5,':',0);

            Fpdf::SetTextColor(0,0,0);
            Fpdf::SetFont('Arial',"",11);
            Fpdf::SetX(65);
            Fpdf::Cell(40,5,$firstRowValue[$i],0);
            Fpdf::Ln(5);
          }
      }
      // }
      $date = Carbon::now();
      Fpdf::Ln(3);
      Fpdf::SetX(18);
      Fpdf::Cell(0,5,'( '.$data_kwitansi->namacabang.' )',0);
      Fpdf::Ln(5);
      Fpdf::SetX(135);
      Fpdf::Cell(0,5,'Bandung, '.$date->format('d-M-Y'),0);
      Fpdf::Ln(5);
      $rowHeader = 20;
      $borderColumn = 1;
      Fpdf::SetX(27);
      Fpdf::SetLineWidth(0.5);
      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial', 'I', 8);
      Fpdf::SetFillColor(255,255,255);

      Fpdf::Cell(50, $rowHeader, '',$borderColumn, 0, 'L');
      Fpdf::Ln(5);
      Fpdf::SetX(30);
      Fpdf::Cell(0,0,"Note :",0,1,'L');
      Fpdf::Ln(3);
      Fpdf::SetX(30);
      Fpdf::Cell(0,0,"Kwitansi dianggap valid apabila",0,1,'L');
      Fpdf::Ln(3);
      Fpdf::SetX(30);
      Fpdf::Cell(0,0,"Dana telah efektif diterbitkan",0,1,'L');
      Fpdf::Ln(10);
      Fpdf::SetX(130);
      Fpdf::SetFont('Arial', '', 11);
      Fpdf::Cell(0,0,"(................................................)",0,1,'L');
      Fpdf::Ln(5);
      if($j <2){
      Fpdf::SetX(0);
      Fpdf::SetFont('Arial', '', 10);
      Fpdf::Cell(0,0,"- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -",0,1,'L');
      }
      Fpdf::Ln(5);
      }
      
      

     Fpdf::Output('I','Kwitansi'.$data_kwitansi->no_kwitansi.'.pdf');
     exit();

    }

    public function kirimkeasuransi(Request $request)
    {
      $isFieldExist = !empty($request->checklistData);
      if($isFieldExist){
            $checklistData = explode(',', $request->checklistData);
            // Update Flag Proses to Approve Status
            foreach ($checklistData as $value) {
                  DB::table('produksi_ajk')->where('no_pk', $value)->update([
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
            $posisi = 1;  
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
    public function update(Request $request){

    $user = Auth::user();
    if (!empty($request)){
      $ceknopk = DB::table('produksi_ajk')->where('no_pk',$request->no_kredit)->first();
      if($ceknopk == null){
      $tgl_akad = null;
      $plafon_pinjaman = 0;
      $umur = 0;
      $premi = 0;
      
      $tgl_lahir = $request->tanggal_lahir;
      $tgl_akad = $request->tanggal_akad_awal;
      $masa_kredit = (int)$request->masa_kredit;
      // $tgl_akad_akhir = $this->hitung_akad_terakhir( $tgl_akad , $masa_kredit );
      $tgl_akad_akhir = date('Y-m-d', strtotime($tgl_akad. ' + '.$masa_kredit.' months'));
      $plafon_pinjaman = $request->plafon_pinjaman;
      $kode_prod = $request->jenis_asuransi;
      $umur = $this->hitung_umur( $tgl_lahir , $tgl_akad );
        // dd($umur);
      $kode_okup = null;
      // dd($request->jenis_asuransi);
      $rate = DB::table('rate')
      ->select('rate','kode_okup')
      ->where([
        ['kode_prod','=', $request->jenis_asuransi],
        ['tenor', '=', $request->masa_kredit],
      ])
      ->first();

          # code...
          $nama_dok = null;
          if(($request->file('file_spaj') != null)){
            $image = $request->file('file_spaj');
            $nama_dok = $image->getClientOriginalName();
            $path = storage_path('file_spaj/'.$request->no_kredit);
            $format= $image->getClientOriginalExtension();
            $image->move($path, $nama_dok);  
          }
       
      $dok_spaj = [
                  "file_spaj"=> $nama_dok,
                  ];
                  
      if($rate != null){
      $kode_okup = $rate->kode_okup;
      $getkdbroker = DB::table('jns_produksi')
      ->select('kode_broker')
      ->where([
        ['kode_prod',$request->jenis_asuransi],
      ])
      ->first();
      $kd_broker = $getkdbroker->kode_broker;
      $fee_client = null;
      $fee_pb = null;
      $pph_pb = null;
      $kode_client = $user->perusahaan;
      $client = DB::table('client')->where('kode_client',$kode_client)->first();
      if($client != null){
        $kode_client = $client->kode_client;
        $kode_broker = $client->kode_broker;
        $fee_client = $client->fee_client;
        $fee_pb = $client->fee_pb;
        $pph_pb = $client->pph_pb;
      }else{
        $kode_client =$kode_client;
        $kode_broker =$kd_broker;
        $fee_client =$fee_client;
        $fee_pb =$fee_pb;
        $pph_pb =$pph_pb;
      }


      if($rate == null){
        $rate_ = 0;
      }else{
        $rate_ = $rate->rate;
      }
      $tenor = $masa_kredit/12;
      $tenor = ceil($tenor);
      $premi = ($plafon_pinjaman*$rate_*$tenor)/1000;
      	// $rate_desimal = (float)$rate;
        // // Set Value Cabang
        // $valueCabang = $this->setDataCabang($request->cabang);
        // $umur = $request->tanggal_lahir - $tanggal_akad_awal;
      $data_dokumen = [
          // 'tgl_reg' => $request->tanggal_registrasi,
        'kode_prod' => $request->jenis_asuransi,
        'kode_asu' => null,
        'kode_broker' => $kd_broker,
        'kode_client' => $kode_client,
        'asuransi_bank' => 'AKTIF',
        'sts_klaim' => 0,
        'sts_refund' => 0,
        'id_rekon_ajk' => null,
        'id_refund_ajk' =>null,
        'no_polis' => null,
        'tgl_polis' => null,
        'no_debitur' => null,
        'no_pk' => $request->no_kredit,
        'no_kwitansi' => null,
        'tgl_kwitansi' => null,
        'debitur' => $request->debitur,
        'tmp_lahir' => null,
        'noktp' => null,
        'tgl_lahir' => date( 'Y-m-d', strtotime($request->tanggal_lahir)),
        'tgl_awal' => date( 'Y-m-d', strtotime($tgl_akad)),
        'tgl_akhir' => date( 'Y-m-d', strtotime($tgl_akad_akhir)),
        'tenor' => $masa_kredit,
        'plafon' => $plafon_pinjaman,
        'umur' => $umur,
        'jaminan' => null,
        'kode_okup' => $kode_okup,
        'rate' => $rate_,
        'ratenet' => 0,
        'premi' => $premi,
        'bayar' => 0,
        'tgl_bayar' =>null,
        'sts_bayar' => "OUTSTANDING",
        'ket_bayar' => null,
        'diskon_ass' => 0,
        'fee_client' => $fee_client,
        'fee_pb' => $fee_pb,
        'ppn' =>0,
        'pph' => 0,
        'pph_pb' => $pph_pb,
        'tgl_upload' => Carbon::now(),
        'tgl_aksep' => null,
        'sts_polis' => 0,
        'posisi' => 1,
        'tot_cover' => 0,
        'keterangan' => null,
        'sts_asuransi' => null,
        'createdate' => date( 'Y-m-d', strtotime($request->tanggal_registrasi)),
        'createby' => $user->name,
      ];
      $rowExist = DB::table('produksi_ajk')->where('debitur', '=', $request->debitur)->get();
                // dd(count($rowExist));

      if(count($rowExist) > 0) {
        $insertRowUpdated[] = $request->debitur;

        foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }
            // Update current row
        DB::table('produksi_ajk')->where('debitur', '=', $request->debitur)->update(
          $data_dokumen
        );
      }else {
        $insert = $data_dokumen;
      }
        if(!empty($insert) && empty($insertRowUpdated)){

        $id = DB::table('produksi_ajk')->insertGetId($insert);
        $dok_spaj =
                [
                  "file_spaj"=> $nama_dok,
                  'id_prod_ajk'=> $id,
                ];
        DB::table('spaj')->insert($dok_spaj);
        $response = array(
          'status' => 'success',
          'message' => 'Sukses Tambah Data',
        );
        return response()->json($response);
      }elseif(empty($insert) && !empty($insertRowUpdated)){
          // DB::table('history')->insert($insertRowUpdated);
        $response = array(
          'status' => 'update',
          'message' => 'sukses update data',
          'rowupdated' => $insertRowUpdated,
        );
        return response()->json($response);
      }elseif(!empty($insert) && !empty($arrayUpdateRow)){
        DB::table('produksi_ajk')->insert($insert);
        $response = array(
          'status' => 'success',
          'message' => 'Sukses add dan update data',
          'rowupdated' => $insertRowUpdated,
        );
        return response()->json($response);
      }
    }else{
      $rate = DB::table('jns_produksi')->select('nama')->where([
        ['kode_prod','=', $request->jenis_asuransi],
      ])
      ->first();
      $response = array(
        'status' => 'failed',
        'message' => 'Rate dari Jenis Produk '.$rate->nama.' dengan tenor '.$request->masa_kredit.' Tidak Ada',
      );
      return response()->json($response);
    }
  }else{
    $response = array(
      'status' => 'failed',
      'message' => 'No Kredit Sudah Ada',
    );
    return response()->json($response);
  }
    
    }
    $response = array(
      'status' => 'failed',
      'message' => 'Data Tidak Lengkap',
    );
    return response()->json($response);
  }

      public function hitung_akad_terakhir($tanggal_akad, $masa) {
        list($day, $month, $year) = explode("-",$tanggal_akad);
        $masa = $masa/12;
        // list($year2,$month2,$day2) = explode("-",$tanggal_akad);
        return $year_diff  = $year + $masa.'-'.$month.'-'.$day;
    
      }

    public function updatedata(Request $request){
        $user = Auth::user();
        if (!empty($request)){
          $ceknopk = DB::table('produksi_ajk')->where('no_pk',$request->no_kredit)->first();
          $spaj = DB::table('spaj')->where('id_prod_ajk',$ceknopk->id_prod_ajk)->first();
          $tgl_akad = null;
          $plafon_pinjaman = 0;
          $umur = 0;
          $premi = 0;
          $tgl_lahir = $request->tanggal_lahir;
          $tgl_akad = $request->tanggal_akad_awal;
          $masa_kredit = (int)$request->masa_kredit;
          // $tgl_akad_akhir = $this->hitung_akad_terakhir( date( 'Y-m-d', strtotime($tgl_akad)) , $masa_kredit );
          $tgl_akad_akhir = date('Y-m-d', strtotime($tgl_akad. ' + '.$masa_kredit.' months'));
          $plafon_pinjaman = $request->plafon_pinjaman;
          $kode_prod = $request->jenis_asuransi;
          $umur = $this->hitung_umur( $tgl_lahir , $tgl_akad );
          $kode_okup = null;
          $rate = DB::table('rate')
          ->select('rate','kode_okup')
          ->where([
            ['kode_prod','=', $request->jenis_asuransi],
            ['tenor', '=', $request->masa_kredit],
          ])
          ->first();
    
              # code...
              $nama_dok = null;
              if(($request->file('file_spaj') != null)){
                $image = $request->file('file_spaj');
                $nama_dok = $image->getClientOriginalName();
                $path = storage_path('file_spaj/'.$request->no_kredit);
                $format= $image->getClientOriginalExtension();
                $image->move($path, $nama_dok);  
              }else{
                $nama_dok = $spaj->file_spaj;
              }
          if($rate != null){
          $kode_okup = $rate->kode_okup;
          $getkdbroker = DB::table('jns_produksi')
          ->select('kode_broker')
          ->where([
            ['kode_prod',$request->jenis_asuransi],
          ])
          ->first();
          $kd_broker = $getkdbroker->kode_broker;
          $fee_client = null;
          $fee_pb = null;
          $pph_pb = null;
          $kode_client = $user->perusahaan;
          $client = DB::table('client')->where('kode_client',$kode_client)->first();
          if($client != null){
            $kode_client = $client->kode_client;
            $kode_broker = $client->kode_broker;
            $fee_client = $client->fee_client;
            $fee_pb = $client->fee_pb;
            $pph_pb = $client->pph_pb;
          }else{
            $kode_client =$kode_client;
            $kode_broker =$kd_broker;
            $fee_client =$fee_client;
            $fee_pb =$fee_pb;
            $pph_pb =$pph_pb;
          }
    
    
          if($rate == null){
            $rate_ = 0;
          }else{
            $rate_ = $rate->rate;
          }
          $tenor = $masa_kredit/12;
          $tenor = ceil($tenor);
          $premi = ($plafon_pinjaman*$rate_*$tenor)/1000;
            // $rate_desimal = (float)$rate;
            // // Set Value Cabang
            // $valueCabang = $this->setDataCabang($request->cabang);
            // $umur = $request->tanggal_lahir - $tanggal_akad_awal;
          $data_dokumen = [
              // 'tgl_reg' => $request->tanggal_registrasi,
            'kode_prod' => $request->jenis_asuransi,
            'kode_asu' => null,
            'kode_broker' => $kd_broker,
            'kode_client' => $kode_client,
            'asuransi_bank' => 'AKTIF',
            'sts_klaim' => 0,
            'sts_refund' => 0,
            'id_rekon_ajk' => null,
            'id_refund_ajk' =>null,
            'no_polis' => null,
            'tgl_polis' => null,
            'no_debitur' => null,
            'no_pk' => $request->no_kredit,
            'no_kwitansi' => null,
            'tgl_kwitansi' => null,
            'debitur' => $request->debitur,
            'tmp_lahir' => null,
            'noktp' => null,
            'tgl_lahir' => date( 'Y-m-d', strtotime($request->tanggal_lahir)),
            'tgl_awal' => date( 'Y-m-d', strtotime($tgl_akad)),
            'tgl_akhir' => date( 'Y-m-d', strtotime($tgl_akad_akhir)),
            'tenor' => $masa_kredit,
            'plafon' => $plafon_pinjaman,
            'umur' => $umur,
            'jaminan' => null,
            'kode_okup' => $kode_okup,
            'rate' => $rate_,
            'ratenet' => 0,
            'premi' => $premi,
            'bayar' => 0,
            'tgl_bayar' =>null,
            'sts_bayar' => "OUTSTANDING",
            'ket_bayar' => null,
            'diskon_ass' => 0,
            'fee_client' => $fee_client,
            'fee_pb' => $fee_pb,
            'ppn' =>0,
            'pph' => 0,
            'pph_pb' => $pph_pb,
            'tgl_upload' => Carbon::now(),
            'tgl_aksep' => null,
            'sts_polis' => 0,
            'posisi' => 1,
            'tot_cover' => 0,
            'keterangan' => null,
            'sts_asuransi' => null,
            'createdate' => date( 'Y-m-d', strtotime($request->tanggal_registrasi)),
            'createby' => $user->name,
          ];
          $rowExist = DB::table('produksi_ajk')->where('no_pk', '=', $request->no_kredit)->get();
                    // dd(count($rowExist));
    
          if(count($rowExist) > 0) {
            $insertRowUpdated[] = $request->debitur;
    
            foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }
                // Update current row
            DB::table('produksi_ajk')->where('no_pk', '=', $request->no_kredit)->update(
              $data_dokumen
            );
            $dok_spaj =
                    [
                      "file_spaj"=> $nama_dok,
                      'id_prod_ajk'=> $request->id_prod_ajk,
                    ];
            DB::table('spaj')->where('id_prod_ajk', '=', $request->id_prod_ajk)->update($dok_spaj);
                    
          }else {
            $insert = $data_dokumen;
          }
            if(!empty($insert) && empty($insertRowUpdated)){
    
            $id = DB::table('produksi_ajk')->insertGetId($insert);
            $dok_spaj =
                    [
                      "file_spaj"=> $nama_dok,
                      'id_prod_ajk'=> $id,
                    ];
            DB::table('spaj')->insert($dok_spaj);
            $response = array(
              'status' => 'success',
              'message' => 'Sukses Tambah Data',
            );
            return response()->json($response);
          }elseif(empty($insert) && !empty($insertRowUpdated)){
              // DB::table('history')->insert($insertRowUpdated);
            $response = array(
              'status' => 'update',
              'message' => 'sukses update data',
              'rowupdated' => $insertRowUpdated,
            );
            return response()->json($response);
          }elseif(!empty($insert) && !empty($arrayUpdateRow)){
            DB::table('produksi_ajk')->insert($insert);
            $response = array(
              'status' => 'success',
              'message' => 'Sukses add dan update data',
              'rowupdated' => $insertRowUpdated,
            );
            return response()->json($response);
          }
        }else{
          $rate = DB::table('jns_produksi')->select('nama')->where([
            ['kode_prod','=', $request->jenis_asuransi],
          ])
          ->first();
          $response = array(
            'status' => 'failed',
            'message' => 'Rate dari Jenis Produk '.$rate->nama.' dengan tenor '.$request->masa_kredit.' Tidak Ada',
          );
          return response()->json($response);
        }
      
      }
      $response = array(
        'status' => 'failed',
        'message' => 'Data Tidak Lengkap',
      );
      return response()->json($response);
    }

    public function downloadspaj($id){
      $dokumens = DB::table('spaj')
      ->join('produksi_ajk','spaj.id_prod_ajk','produksi_ajk.id_prod_ajk')
      ->select('produksi_ajk.no_pk','spaj.*')
      ->where('spaj.id_prod_ajk',$id)->first();
    
          // $pin = $dokumens->no_pin;
      $path=storage_path().'/file_spaj/'.$dokumens->no_pk;
      $contents = is_dir($path);
      if($contents == true){
        return response()->download($path.'/'.$dokumens->file_spaj);
      }
    }
  }

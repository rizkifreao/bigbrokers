<?php

namespace App\Http\Controllers\DataHelper;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
// use Excel;
use Input;
use DateTime;
use App\TableProduksi;
use Yajra\Datatables\Facades\Datatables;
use Mail;
class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function downloadExcel($type)
    {
      $data = TableProduksi::where('status_proses', 1)->get()->toArray();
      return Excel::create('data-pengajuan-asuransi', function($excel) use ($data) {
        $excel->sheet('Sheet 1', function($sheet) use ($data)
            {
          $sheet->fromArray($data);
            });
      })->download($type);
    }

    public function importExcel(Request $request)
    {
      // Cek field should not empty
      $isFieldExist = !empty($request->id_leasing) && !empty($request->tanggal_registrasi);

      if($request->file('file_excel') && $isFieldExist){
        $path = $request->file('file_excel')->getRealPath();
        $dataSheet = Excel::load($path, function($reader) {})->get();
        // dd($path);
        if(!empty($dataSheet) && $dataSheet->count()){
          foreach ($dataSheet as $sheetValue) {
            foreach ($sheetValue as $value) {
                // Hitung Premi Admin
                $valuePremiAdmin = $this->hitungPremi($value->harga, $value->model, $value->wilayah, "TLO");

                // Hitung Nilai Depresiasi
                $listPremiDepresiasi = $this->hitungDepresiasi($value->premi, $value->tnr, $request->id_leasing);
                $premi_pertahun = $listPremiDepresiasi[0];
                $premi_sekaligus = $listPremiDepresiasi[1];

                // Set Kategori Value
                $valueKategori = $this->setDataKategori($value->harga, $value->model);

                // Set Value Cabang
                $valueCabang = $this->setDataCabang($value->cabang);

                $data_dokumen = [
                  'id_master_asuransi' => $value->asuransi,
                  'no_pin' => $value->nopin,
                  'cabang' => $value->cabang,
                  'nama_nasabah' => $value->nama_nasabah,
                  'plafon' => $value->harga,
                  'tgl_booking' => $value->tgl_booking,
                  'merk' => $value->merk,
                  'tipe' => $value->tipe,
                  'kategori' => $valueKategori,
                  'warna' =>$value->warna,
                  'jenis_asuransi' => 'TLO',
                  'model_kend' => $value->model,
                  'no_rangka' => $value->no_rangka,
                  'no_mesin' => $value->no_mesin,
                  'no_polisi' => $value->no_polisi,
                  'no_bpkb' => $value->no_bpkb,
                  'tahun' => $value->thn,
                  'tenor' => $value->tnr,
                  'rate' => round($value->rate * 100, 2),
                  'premi' => $value->premi,
                  'jenis_kendaraan' => $value->jenis_kendaraan,
                  'wilayah' => $value->wilayah,
                  'tgl_upload' => date( 'Y-m-d', strtotime($request->tanggal_upload) ),
                  'status_proses' => 0,
                  'status_produksi' => 1,
                  'status_pinjaman' => 'ACTIVE',
                  'status_perpanjangan' => 'NEW',
                  'id_master_leasing' => $request->id_leasing,
                  'id_master_leasing_cabang' => $valueCabang,
                  'premi_admin' => ($value->harga * $valuePremiAdmin)/100,
                  'premi_pertahun' => $premi_pertahun,
                  'premi_sekaligus' => $premi_sekaligus,
                ];

                $rowExist = DB::table('table_produksi')->where('no_pin', '=', $value->nopin)->get();

                if(count($rowExist) > 0) {
                  // Update Perpanjangan Data
                  if(strtotime($value->tgl_booking) > strtotime($rowExist[0]->tgl_booking)){
                    $insertRowUpdated[] = $value->nopin;
                    // Backup data to table prod history
                    foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }

                    // Set Status Data baru/perpanjangan
                    $status_perpanjangan = $this->checkDataPerpanjangan($value->tgl_booking, $value->tnr, $rowExist[0]);

                    // Update current row
                    DB::table('table_produksi')->where('no_pin', '=', $value->nopin)->update([
                        'tgl_booking'=>$value->tgl_booking,
                        'status_perpanjangan' => $status_perpanjangan,
                      ]);
                  }else {
                      // Row Existing
                      $insertRowExist[] = $value->nopin;
                  }
                }else {
                  $insert[] = $data_dokumen;
                }
            }
          }


          if(!empty($insert) && empty($insertRowExist)){
            DB::table('table_produksi')->insert($insert);
            $response = array(
                'status' => 'success',
                'message' => 'Sukses Upload Data',
            );

            $data = array(
                      'tgl'=>  $request->tanggal_upload,
                      'ket' => 'upload',
                      'perintah' => 'proses approvalnya.',
                      );
                      $pesan = 'Pesan Terkirim';
                      $title = 'Document Yang Telah Di Upload '. $request->noPin;

                      $this->sendEmailNotif($data,$pesan,$title);
                      
            return response()->json($response);
          }elseif(!empty($insert) && !empty($insertRowExist)){
            DB::table('table_produksi')->insert($insert);
            $response = array(
                'status' => 'warning',
                'message' => 'Error, file yang sudah ada tidak dapat di upload',
                'rowexist' => $insertRowExist,
            );
            return response()->json($response);
          }elseif(!empty($arrayUpdateRow)){
            // Insert backup data to table produksi history
            DB::table('table_produksi_history')->insert($arrayUpdateRow);
            $response = array(
                'status' => 'update',
                'message' => 'Sukses update data',
                'rowupdated' => $insertRowUpdated,
            );
            return response()->json($response);
          }else{
            $response = array(
                'status' => 'failure',
                'message' => 'Gagal Upload File, Terjadi kesalahan Upload',
                'rowexist' => $insertRowExist,
            );
            return response()->json($response);
          }
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

    public function sendEmailNotif($data, $pesan, $title){
      $pesan = "Isi pesan";
      // $body = array('name'=>"Sam Jose", "body" => "body nih");
      $usermail = array('denis.tarigan@mitrafin.co.id', 'stefanus.ribon@mitrafin.co.id');
      $username = array('denis', 'ribon');
      $i =0;
      foreach ($usermail as $value) {
        Mail::send(['html' => 'email.updaterequest'], $data, function($message) use ($pesan, $title){
              $message->to($value, $username[$i])
                      ->subject($title)
                      ->setBody($pesan, 'text/plain');
              $message->from('mitrafinancesejahtera@gmail.com','Admin');
          }); 
        $i++;
      }
    }
    public function setDataCabang($cabang){

      $data_cabang = DB::table('master_leasing_cabang')->where('nama_ls_cabang', '=', $cabang)->get();

      return $data_cabang[0]->id_leasing_cabang;

    }

    public function setDataKategori($plafon, $model) {

      if ($model == 'TRUCK' || $model == 'PICK UP' || $model == 'PICKUP') {
        return '6';
      }else if($model == 'BUS' || $model == 'MIKROBUS' || $model == 'MIKRO BUS' || $model == 'MICRO BUS' || $model == 'MICROBUS') {
        return '7';
      }else {
        if ($plafon > 0 && $plafon <= 125000000){
          return '1';
        }else if($plafon > 125000000 && $plafon <= 200000000){
          return '2';
        }else if($plafon > 200000000 && $plafon <= 400000000){
          return '3';
        }else if($plafon > 400000000 && $plafon <= 800000000){
          return '4';
        }else if($plafon > 800000000){
          return '5';
        }
      }

      return '0';

    }

    public function checkDataPerpanjangan($tgl_booking, $tenor, $data){

      //$data = DB::table('table_produksi')->where('no_pin', $no_pin)->get();

      $jumlah_tenor = round($tenor / 12, 1);

      if($jumlah_tenor > 1 && strtotime($tgl_booking)>strtotime($data->tgl_booking) ){
          // Set Tahun
          if($data->status_perpanjangan == "NEW"){
            return 'TAHUN2';
          }elseif(substr($data->status_perpanjangan, 5) <= $jumlah_tenor){
            $tahun = substr($data->status_perpanjangan, 5);
            return 'TAHUN' . $tahun+=1;
          }else {
            return 'OVER';
          }
      }else {
        return 'NEW';
      }

    }

    public function hitungDepresiasi($nilai_premi, $tenor, $id_leasing) {
      $depresiasi_leasing = DB::table('master_leasing_depresiasi')->where('id_leasing', $id_leasing)->first();
      $depresiasi_leasing_persen = explode(',', $depresiasi_leasing->persen_depres);

      $jumlah_tenor = round($tenor / 12, 1);
      $premi_sekaligus = 0;
      $array_nilai_premi = array();
      for ($x = 0; $x < $jumlah_tenor; $x++) {

        $nilai_premi_depres = (($nilai_premi * $depresiasi_leasing_persen[$x])/100);
        $array_nilai_premi[] = round($nilai_premi_depres,0);
        $premi_sekaligus += $nilai_premi_depres;

      }

      $arrayPremi = implode(',', $array_nilai_premi);

      $response = array(
            $arrayPremi,
            $premi_sekaligus,
      );
      return $response;

    }

    public function hitungPremi( $plafon, $modelKend, $wilayah, $jenis_asuransi) { // $plafon, $modelKend, $platNomor, $jenis_asuransi
      // Define Jenis Asuransi
      if ($jenis_asuransi == "TLO") {
        $table_rate = 'master_rate_tlo';
      }else {
        $table_rate = 'master_rate_allrisk';
      }

      if ($modelKend == "PICK UP" || $modelKend == "PICKUP" || $modelKend == "TRUCK") {
        $kelasModel = 'C';
      }else if($modelKend == "BUS" || $modelKend == "MIKRO BUS" || $modelKend == "MIKROBUS" || $modelKend == 'MICRO BUS' || $modelKend == 'MICROBUS'){
        $kelasModel = 'B';
      }else {
        $kelasModel = 'A';
      }

      //$platWilayah = $this->getWilayahPlatNomor($platNomor);

      $resultRate = $this->getKategori($plafon, $wilayah, $kelasModel, $table_rate );

      if(!empty($resultRate)){

        return $resultRate;

      }


      // Return error
      return "error";
    }


    public function getWilayahPlatNomor($platNomor){
      //$platNomor = $request->platNomor;
      $kodePlatNomor = substr($platNomor, 0, 2);
      if(!empty($kodePlatNomor)){
        $platWilayah = DB::table('master_kode_plat')->where('kode_plat', $kodePlatNomor)->first();

        if(!empty($platWilayah)){
          return $platWilayah->wilayah;
        }
      }
      // Return error
      return "error";
    }

    public function getKategori($plafon, $wilayah, $kelasModel, $table_rate){
      $rangeKategori = '';

      // Hitung Range Plafon
      if ($kelasModel == 'A') {
        if ($plafon > 0 && $plafon <= 125000000){
          $rangeKategori = '0TO125';
        }else if($plafon > 125000000 && $plafon <= 200000000){
          $rangeKategori ='125TO200';
        }else if($plafon > 200000000 && $plafon <= 400000000){
          $rangeKategori = '200TO400';
        }else if($plafon > 400000000 && $plafon <= 800000000){
          $rangeKategori = '400TO800';
        }else if($plafon > 800000000){
          $rangeKategori = 'UPTO800';
        }
      }else {
          $rangeKategori = 'NO RANGE';
      }

      // Get Rate
      $dataRate = DB::table($table_rate)->where([
        ['range', '=', $rangeKategori],
        ['kelas', '=', $kelasModel],
      ])->first();

      if (!empty($dataRate)){
        switch ($wilayah) {
          case 'WILAYAH 1':
            # code...
            return $dataRate->rate_wilayah_1;
            break;

          case 'WILAYAH 2':
            # code...
            return $dataRate->rate_wilayah_2;
            break;

          case 'WILAYAH 3':
            # code...
            return $dataRate->rate_wilayah_3;
            break;
          default :
            # code...
            return "Model dan plafon tidak sama";
            break;
        }
      }
      return "error";
    }
}

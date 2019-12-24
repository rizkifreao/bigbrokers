<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use DateTime;
use Fpdf;

class penutupansatuanController extends Controller
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
      // $cabang = DB::table('master_leasing_cabang')->get();
    $jenisasuransii = DB::table('asuransi')
    ->leftJoin('jns_produksi', 'asuransi.kode_prod','jns_produksi.kode_prod')
    ->select('jns_produksi.kode_prod','jns_produksi.nama')
    ->get();
    $jenisasuransi = DB::table('jns_produksi')
    ->get();
    $user = Auth::user();
      // $name = $user->
      // if(!empty($cabang)){
    return view ( 'Client/clientpenutupansatuan' ,[
          // 'cabang' => $cabang,
      'jenisasuransi' => $jenisasuransi,
      'user' => $user,
      'valuebutton' => $valuebutton,
    ]
  );
      // }
  }

  public function testing(Request $request){
    return response()->json($request);
  }

  public function upload(Request $request){

    $user = Auth::user();

      // Cek field should not empty
      //$isFieldExist = !empty($request->no_pin);

    if (!empty($request)){
      $tgl_akad = null;
      $plafon_pinjaman = 0;
      $umur = 0;
      $premi = 0;
      // Hitung Premi Admin
        // $valuePremiAdmin = $this->hitungPremi($request->plafon_pinjaman, $request->model, $request->no_polisi, "TLO");

        // Hitung Nilai Depresiasi
        // $listPremiDepresiasi = $this->hitungDepresiasi($request->premi, $request->tenor, $user->perusahaan);
        // $premi_pertahun = $listPremiDepresiasi[0];
        // $premi_sekaligus = $listPremiDepresiasi[1];

        // Set Kategori Value
        // $valueKategori = $this->setDataKategori($request->plafon, $request->model);
      $tgl_lahir = $request->tanggal_lahir;
      $tgl_akad = $request->tanggal_akad_awal;
      $masa_kredit = $request->masa_kredit;
      $tgl_akad_akhir = $this->hitung_akad_terakhir( $tgl_akad , $masa_kredit );
      $plafon_pinjaman = $request->plafon_pinjaman;
      $umur = $this->hitung_umur( $tgl_lahir , $tgl_akad );
        // dd($umur);
      $rate = DB::table('rate')
      ->select('rate')
      ->where([
        ['kode_prod','=', $request->jenis_asuransi],
        ['tenor', '=', $request->masa_kredit],
      ])
      ->first();
      $rate = DB::table('rate')
      ->where([
        ['kode_prod','=', $request->jenis_asuransi],
        ['tenor', '=', $request->masa_kredit],
      ])
      ->first();
      $getkdbroker = DB::table('jns_produksi')
      ->select('kode_broker')
      ->where([
        ['kode_prod',$request->jenis_asuransi],
      ])
      ->first();
      $kd_broker = $getkdbroker->kode_broker;
      $kode_client = $user->perusahaan;

      if($rate == null){
        $rate_ = 0;
      }else{
        $rate_ = $rate->rate;
      }
      $premi = ($plafon_pinjaman*$rate_)/1000;
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
        'asuransi_bank' => 'NONPKS',
        'sts_klaim' => 0,
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
        'okupasi' => null,
        'rate' => $rate_,
        'ratenet' => 0,
        'premi' => $premi,
        'bayar' => 0,
        'tgl_bayar' =>null,
        'sts_bayar' => "OUTSTANDING",
        'ket_bayar' => null,
        'diskon_ass' => 0,
        'fee_client' => 0,
        'fee_pb' => 0,
        'ppn' =>0,
        'pph' => 0,
        'pph_pb' => 0,
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
        $insert[] = $data_dokumen;
      }
      if(!empty($insert) && empty($insertRowUpdated)){

        DB::table('produksi_ajk')->insert($insert);
        $response = array(
          'status' => 'success',
          'message' => 'Sukses Tambah Data',
        );
        return response()->json($response);
      }elseif(empty($insert) && !empty($insertRowUpdated)){
          // DB::table('history')->insert($insertRowUpdated);
        $response = array(
          'status' => 'update',
          'message' => 'Sukses update data',
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
    }
    $response = array(
      'status' => 'failure',
      'message' => 'Terjadi Kesalahan',
    );
    return response()->json($response);
  }

  // public function update(Request $request){

  //   $user = Auth::user();

  //     // dd($user);
  //     // Cek field should not empty
  //     //$isFieldExist = !empty($request->no_pin);

  //   if (!empty($request)){
  //     $tgl_akad = null;
  //     $plafon_pinjaman = 0;
  //     $umur = 0;
  //     $premi = 0;
  //     // Hitung Premi Admin
  //       // $valuePremiAdmin = $this->hitungPremi($request->plafon_pinjaman, $request->model, $request->no_polisi, "TLO");

  //       // Hitung Nilai Depresiasi
  //       // $listPremiDepresiasi = $this->hitungDepresiasi($request->premi, $request->tenor, $user->perusahaan);
  //       // $premi_pertahun = $listPremiDepresiasi[0];
  //       // $premi_sekaligus = $listPremiDepresiasi[1];

  //       // Set Kategori Value
  //       // $valueKategori = $this->setDataKategori($request->plafon, $request->model);
  //     $tgl_lahir = $request->tanggal_lahir;
  //     $tgl_akad = $request->tanggal_akad_awal;
  //     $plafon_pinjaman = $request->plafon_pinjaman;
  //     $umur = $this->hitung_umur( $tgl_lahir , $tgl_akad );
  //     $rate = DB::table('rate')
  //     ->select('rate')
  //     ->where([
  //       ['kode_prod','=', $request->jenis_asuransi],
  //       ['tenor', '=', $request->masa_kredit],
  //     ])
  //     ->first();
  //     $getkdbroker = DB::table('jns_produksi')
  //     ->select('kode_broker')
  //     ->where([
  //       ['kode_prod',$request->jenis_asuransi],
  //     ])
  //     ->first();
  //     $kd_broker = $getkdbroker->kode_broker;
  //     $kode_client = $user->kode_client;
  //     $getkdasu = DB::table('asuransi')
  //     ->select('kode_asu')
  //     ->where([
  //       ['kode_prod',$kode_prod],
  //       ['kode_broker',$kd_broker],

  //     ])
  //     ->first();

  //     $kd_asu = $getkdasu->kode_asu;
  //       // dd($umur);
  //     if($rate == null){
  //       $rate_ = 0;
  //     }else{
  //       $rate_ = $rate->rate;
  //     }
  //     $premi = ($plafon_pinjaman*$rate_)/1000;
  //       // $rate_desimal = (float)$rate;
  //       // // Set Value Cabang
  //       // $valueCabang = $this->setDataCabang($request->cabang);
  //       // $umur = $request->tanggal_lahir - $tanggal_akad_awal;
  //     $data_dokumen = [
  //         // 'tgl_reg' => $request->tanggal_registrasi,
  //       'kode_prod' => $request->jenis_asuransi,
  //       'kode_asu' => $kode_asu,
  //       'kode_broker' => $kd_broker,
  //       'kode_client' => "",
  //       'asuransi_bank' => "",
  //       'sts_klaim' => 1,
  //       'id_rekon_ajk' => 1,
  //       'id_refund_ajk' =>1,
  //       'no_polis' => null,
  //       'tgl_polis' => null,
  //       'no_debitur' => "",
  //       'no_pk' => "",
  //       'no_kwitansi' => "",
  //       'tgl_kwitansi' => null,
  //       'debitur' => $request->debitur,
  //       'tmp_lahir' => "",
  //       'noktp' => "",
  //       'tgl_lahir' => date( 'Y-m-d', strtotime($request->tanggal_lahir)),
  //       'tgl_awal' => date( 'Y-m-d', strtotime($request->tanggal_akad_awal)),
  //       'tgl_akhir' => date( 'Y-m-d', strtotime($tgl_akad)),
  //       'tenor' => $request->masa_kredit,
  //       'plafon' => $request->plafon_pinjaman,
  //       'umur' => 1,
  //       'jaminan' => "",
  //       'okupasi' => "",
  //       'rate' => $rate_,
  //       'ratenet' => 0,
  //       'premi' => 0,
  //       'bayar' => 0,
  //       'tgl_bayar' =>null,
  //       'sts_bayar' => "",
  //       'ket_bayar' => "",
  //       'diskon_ass' => 0,
  //       'fee_client' => 0,
  //       'fee_pb' => 0,
  //       'ppn' =>0,
  //       'pph' => 0,
  //       'pph_pb' => 0,
  //       'tgl_upload' => null,
  //       'tgl_aksep' => null,
  //       'sts_polis' => 1,
  //       'posisi' => 1,
  //       'tot_cover' => 1,
  //       'keterangan' => "",
  //       'sts_asuransi' => "",
  //       'createdate' => Carbon::now(),
  //       'createby' => "",
  //     ];

  //     $rowExist = DB::table('table_produksi')->where('no_pin', '=', $request->no_pin)->get();

  //     if(count($rowExist) > 0) {
  //         // Update Perpanjangan Data
  //       if(strtotime($request->tgl_booking) > strtotime($rowExist[0]->tgl_booking)){
  //         $insertRowUpdated[] = $request->no_pin;
  //           // Backup data to table prod history
  //         foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }

  //           // Set Status Data baru/perpanjangan
  //         $status_perpanjangan = $this->checkDataPerpanjangan($request->tgl_booking, $request->tenor, $rowExist[0]);

  //           // Update current row
  //         DB::table('table_produksi')->where('no_pin', '=', $request->no_pin)->update([
  //           'tgl_booking'=>$request->tgl_booking,
  //           'status_perpanjangan' => $status_perpanjangan,
  //         ]);
  //       }else {
  //             // Row Existing
  //         $insertRowExist[] = $request->no_pin;
  //       }
  //     }else {
  //       $insert[] = $data_dokumen;
  //     }

  //     if(!empty($insert) && empty($insertRowExist)){
  //         // dd($insert);
  //       // $tenor = (int)$dokumens[0]->tenor;
  //       // $enddate = new DateTime("2016-12-02");
  //       // $skrng = new DateTime();
  //       // $beda = $enddate->diff($skrng);
  //       $umur = $this->hitung_umur("1988-12-02", "2000-12-02");

  //       DB::table('produksi_ajk')->insert($insert);
  //       $response = array(
  //         'status' => 'success',
  //         'message' => 'Sukses Upload Data',
  //       );
  //       return response()->json($response);
  //     }elseif(!empty($insert) && !empty($insertRowExist)){
  //       DB::table('table_produksi')->insert($insert);
  //       $response = array(
  //         'status' => 'warning',
  //         'message' => 'Error, file yang sudah ada tidak dapat di upload',
  //         'rowexist' => $insertRowExist,
  //       );
  //       return response()->json($response);
  //     }elseif(!empty($arrayUpdateRow)){
  //         // Insert backup data to table produksi history
  //       DB::table('table_produksi_history')->insert($arrayUpdateRow);
  //       $response = array(
  //         'status' => 'update',
  //         'message' => 'Sukses update data',
  //         'rowupdated' => $insertRowUpdated,
  //       );
  //       return response()->json($response);
  //     }else{
  //       $response = array(
  //         'status' => 'failure',
  //         'message' => 'Gagal Upload dokumen, terdapat file yang sama',
  //         'rowexist' => $insertRowExist,
  //       );
  //       return response()->json($response);
  //     }
  //   }
  //   $response = array(
  //     'status' => 'failure',
  //     'message' => 'Terjadi Kesalahan',
  //   );
  //   return response()->json($response);
  // }
  
  public function updatedata(Request $request){

    $user = Auth::user();

      // dd($user);
      // Cek field should not empty
      //$isFieldExist = !empty($request->no_pin);

    if (!empty($request)){
      $tgl_akad = null;
      $plafon_pinjaman = 0;
      $umur = 0;
      $premi = 0;
      // Hitung Premi Admin
        // $valuePremiAdmin = $this->hitungPremi($request->plafon_pinjaman, $request->model, $request->no_polisi, "TLO");

        // Hitung Nilai Depresiasi
        // $listPremiDepresiasi = $this->hitungDepresiasi($request->premi, $request->tenor, $user->perusahaan);
        // $premi_pertahun = $listPremiDepresiasi[0];
        // $premi_sekaligus = $listPremiDepresiasi[1];

        // Set Kategori Value
        // $valueKategori = $this->setDataKategori($request->plafon, $request->model);
      $tgl_lahir = $request->tanggal_lahir;
      $tgl_akad = $request->tanggal_akad_awal;
      $masa_kredit = $request->masa_kredit;
      $tgl_akad_akhir = $this->hitung_akad_terakhir( $tgl_akad , $masa_kredit );
      $plafon_pinjaman = $request->plafon_pinjaman;
      $umur = $this->hitung_umur( $tgl_lahir , $tgl_akad );
        // dd($umur);
      $rate = DB::table('rate')
      ->select('rate')
      ->where([
        ['kode_prod','=', $request->jenis_asuransi],
        ['tenor', '=', $request->masa_kredit],
      ])
      ->first();
      $rate = DB::table('rate')
      ->where([
        ['kode_prod','=', $request->jenis_asuransi],
        ['tenor', '=', $request->masa_kredit],
      ])
      ->first();
      $getkdbroker = DB::table('jns_produksi')
      ->select('kode_broker')
      ->where([
        ['kode_prod',$request->jenis_asuransi],
      ])
      ->first();
      $kd_broker = $getkdbroker->kode_broker;
      $kode_client = $user->perusahaan;

      if($rate == null){
        $rate_ = 0;
      }else{
        $rate_ = $rate->rate;
      }
      $premi = ($plafon_pinjaman*$rate_)/1000;
        // $rate_desimal = (float)$rate;
        // // Set Value Cabang
        // $valueCabang = $this->setDataCabang($request->cabang);
        // $umur = $request->tanggal_lahir - $tanggal_akad_awal;
      $data_dokumen = [
          'tgl_upload' => date( 'Y-m-d', strtotime($request->tanggal_registrasi)),
        'kode_prod' => $request->jenis_asuransi,
        // 'kode_asu' => $kode_asu,
        'kode_broker' => $kd_broker,
        'debitur' => $request->debitur,
        'tgl_lahir' => date( 'Y-m-d', strtotime($request->tanggal_lahir)),
        'tgl_awal' => date( 'Y-m-d', strtotime($request->tanggal_akad_awal)),
        'tgl_akhir' => date( 'Y-m-d', strtotime($tgl_akad)),
        'tenor' => $masa_kredit,
        'plafon' => $plafon_pinjaman,
        'umur' => $umur,
        
      ];

      $rowExist = DB::table('produksi_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->get();
                // dd(count($rowExist));

      if(count($rowExist) > 0) {
        $insertRowUpdated[] = $request->debitur;

        foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }
            // Update current row
        DB::table('produksi_ajk')->where('id_prod_ajk', '=', $request->id_prod_ajk)->update(
          $data_dokumen
        );
      }else {
        $insert[] = $data_dokumen;
      }
      if(!empty($insert) && empty($insertRowUpdated)){

        DB::table('produksi_ajk')->insert($insert);
        $response = array(
          'status' => 'success',
          'message' => 'Sukses Tambah Data',
        );
        return response()->json($response);
      }elseif(empty($insert) && !empty($insertRowUpdated)){
          // DB::table('history')->insert($insertRowUpdated);
        $response = array(
          'status' => 'update',
          'message' => 'Sukses update data',
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
    }
    $response = array(
      'status' => 'failure',
      'message' => 'Terjadi Kesalahan',
    );
    return response()->json($response);
  }

  public function hitung_umur($tanggal_lahir, $tanggal_akad) {
    list($day, $month, $year) = explode("-",$tanggal_lahir);
    list($day2, $month2, $year2) = explode("-",$tanggal_akad);
    return $year_diff  = $year2 - $year;
  }

  public function hitung_akad_terakhir($tanggal_akad, $masa) {
    list($day, $month, $year) = explode("-",$tanggal_akad);
    $masa = $masa/12;
    // list($year2,$month2,$day2) = explode("-",$tanggal_akad);
    return $year_diff  = $year + $masa.'-'.$month.'-'.$day;

  }

  public function printnm(){
    {

      // Set Page Size
      Fpdf::AddPage('P', 'A4');

      // Add Header Title
      $TitlePolis = "Surat Keterangan Kesehatan Tertanggung";
      $TitleIndukPolis = "(SKKT)";
      // $TitleStatement = "Sertifikat ini merupakan bagian tak terpisahkan dari Polis Induk yang disebutkan di bawah ini dan merupakan ringkasan dari obyek yang dipertanggungkan. \nPersyaratan Polis Induk ini berlaku untuk obyek yang dipertanggungkan di bawah ini :";

      Fpdf::SetTextColor(0,0,0);
      Fpdf::SetFont('Arial','B',12);
      Fpdf::Cell(0,0,$TitlePolis,0,1,'C');
      Fpdf::Ln(5);
      Fpdf::Cell(0,0,$TitleIndukPolis,0,1,'C');
      Fpdf::Ln(5);
      // }

      Fpdf::SetLineWidth(0.6);
      Fpdf::Line(10, 20, 200, 20);
      Fpdf::Ln(5);

      // Sub title Header BOLD
      // =========== TERTANGGUNG ================
      // Fpdf::SetTextColor(0,0,0);
      // Fpdf::SetFont('Arial','B',11);
      // Fpdf::Cell(100,0,"TERTANGGUNG",0,1,'L');
      // Fpdf::Ln(5);

      $firstRowName = ([
        'Yang bertanda tangan di bawah ini,',
        '1. Nama Lengkap',
        '2. Jenis Kelamin',
        '3. Tempat/Tgl Lahir',
        '4. Alamat',
        '5. No. Telp Rumah/HP',
        '6. Pekerjaan Sekarang',
        // 'Jumlah Tempat Duduk',
        '7. Telah mengambil kredit dari',
        '- Nama Bank',
        '- Besar  Kredit',
        'Dengan ini menyatakan bahwa',
        'KETERANGAN KESEHATAN TERTANGGUNG',
        
        // 'Cubic Capacity',
        // 'Location',
      ]
    );
      $firstRowValue = ([
        'Apakah Anda dalam keadaan sehat/tidak ?',
        'a. pada saat ini dalam keadaan',
        'b. Biasanya dalam keadaan',
        'a. Dalam jangka waktu 2 tahun terakhir ini, apakah anda',
        '1. Menderita Penyakit Malaria',
        '2. Menderita Penyakit Kanker',
        '3. Menderita Penyakit TBC',
        '4. Menderita Penyakit Kencing Manis',
        '5. Menderita Penyakit Haid',
        '6. Menderita Penyakit Ginjal',
        '7. Menderita Penyakit Jantung',
        '8. Menderita Penyakit Ayan',
        '9. Menderita Penyakit Lumpuh',
        '10. Mederita Penyakit Syaraf',
        '11. Menderita Penyakit Tekanan Darah Tingggi',
        '12. Menderita Penyakit Tekanan Darah Rendah',
        '13. Menderita Penyakit Kelamin',
        '14. Dirawat di Rumah Sakit',
        'b. Jika pernah dirawat di Rumah Sakit, sebutkan nama dan alamat Rumah Sakit yang merawat Anda',
        'a. Dalam jangka waktu 12 bulan terakhir ini pernah/tidak pernah dirawat dokter',
        'b. Nama dan alamat dokter',
        'Hanya untuk wanita',
        'Saat ini dalam keadaaan',
      ]
    );

      $nama = array( 
        "Apakah Anda dalam keadaan sehat/tidak ?" 
            => array ("a. pada saat ini dalam keadaan","b. Biasanya dalam keadaan"),
        "a. Dalam jangka waktu 2 tahun terakhir ini, apakah anda" 
            => array ("1. Menderita Penyakit Malaria", "2. Menderita Penyakit Kanker", "3. Menderita Penyakit TBC", "4. Menderita Penyakit Kencing Manis", "5. Menderita Penyakit Haid", "6. Menderita Penyakit Ginjal", "7. Menderita Penyakit Jantung", "8. Menderita Penyakit Ayan", "9. Menderita Penyakit Lumpuh", "10. Mederita Penyakit Syaraf", "11. Menderita Penyakit Tekanan Darah Tinggi", "12. Menderita Penyakit Tekanan Darah Rendah", "13. Menderita Penyakit Kelamin", "14. Dirawat di Rumah Sakit","b. Jika pernah dirawat di Rumah Sakit, sebutkan nama dan alamat Rumah Sakit yang merawat Anda"),
        "a. Dalam jangka waktu 12 bulan terakhir ini pernah/tidak pernah dirawat dokter" 
            => array ("b. Nama dan alamat dokter"),
        "Hanya untuk wanita" 
            => array ("Saat ini dalam Keadaan" )
      );
// dd($nama);
      for ($i=0; $i < count($firstRowName); $i++) {
        # code...
        if($i>7){
          $x1 = Fpdf::SetX(12);
        }else{
          $x1 = Fpdf::SetX(10);
        }
        Fpdf::SetTextColor(0,0,0);
        Fpdf::SetFont('Arial',"",11);
        $x1;
        Fpdf::Cell(0,5,$firstRowName[$i],0);

        if($i != 0){
          Fpdf::SetTextColor(0,0,0);
          Fpdf::SetFont('Arial',"",11);
          Fpdf::SetX(70);
          Fpdf::Cell(0,5,':',0);
        }
        // Fpdf::SetTextColor(0,0,0);
        // Fpdf::SetFont('Arial',"",11);
        // Fpdf::SetX(73);
        // Fpdf::MultiCell(120,5,$firstRowValue[$i],0);
        Fpdf::Ln(5);
      }
      $rowHeader = 5;
      $rowHeader2 = 7;
      $borderColumn = 1;
      Fpdf::SetFont('Arial', '', 9);
      Fpdf::SetFillColor(255,255,255);
      Fpdf::SetLineWidth(0.1);
      $no = 1;
      // dd($nama);
      foreach ($nama as $key =>$value) {
        if($no == 1){
          Fpdf::Cell(6, $rowHeader,$no++ ,$borderColumn, 0, 'C', true);
          Fpdf::Cell(125, $rowHeader, $key,$borderColumn, 0, 'L', true);
          Fpdf::Cell(30, $rowHeader, 'Sehat', $borderColumn, 0, 'C', true);
          Fpdf::Cell(30, $rowHeader, 'Tidak Sehat', $borderColumn, 0, 'C', true);
          Fpdf::Ln(5);
        }else if($no == 4){
          Fpdf::Cell(6, $rowHeader,$no++ ,$borderColumn, 0, 'C', true);
          Fpdf::Cell(125, $rowHeader, $key,$borderColumn, 0, 'L', true);
          Fpdf::Cell(30, $rowHeader, 'Hamil', $borderColumn, 0, 'C', true);
          Fpdf::Cell(30, $rowHeader, 'Tidak Hamil', $borderColumn, 0, 'C', true);
          Fpdf::Ln(5);
        }else{
          Fpdf::Cell(6, $rowHeader,$no++ ,$borderColumn, 0, 'C', true);
          Fpdf::Cell(125, $rowHeader, $key,$borderColumn, 0, 'L', true);
          Fpdf::Cell(30, $rowHeader, '', $borderColumn, 0, 'C', true);
          Fpdf::Cell(30, $rowHeader, '', $borderColumn, 0, 'C', true);
          Fpdf::Ln(5);  
        }
        foreach ($value as $key2 =>$value2) {
          Fpdf::Cell(6, $rowHeader, '',$borderColumn, 0, 'C', true);
          Fpdf::Cell(125, $rowHeader, $value2,$borderColumn, 0, 'L', true);
          Fpdf::Cell(30, $rowHeader, '', $borderColumn, 0, 'C', true);
          Fpdf::Cell(30, $rowHeader, '', $borderColumn, 0, 'C', true);
          Fpdf::Ln(5);
        }
      }
          Fpdf::Ln(5);
          Fpdf::SetFont('Arial',"",11);
          Fpdf::SetX(12);
        Fpdf::MultiCell(190,5,'Pernyataan-pernyataan tersebut diatas saya jawab dengan jujur sesuai dengan keadaan yang sebenarnya dan jika ada suatu hal  yang saya ketahui dan tidak  diberitahukan atau saya  dengan sengaja menjawab tidak jujur/tidak benar, maka Perusahaan Asuransi ber hak membatalkan atau menolak pembayaran klaim Asuransi kumpulan ini.',0);
        Fpdf::SetFont('Arial',"",11);
          Fpdf::SetX(12);
          Fpdf::MultiCell(190,5,'Selanjutnya saya dengan ini memberi kuasa penuh kepada Pemegang Polis dan Dokter-dokter yang akan atau telah memeriksa atau mengobati saya untuk memberi keterangan-keterangan yang diminta oleh Perusahaan Asuransi mengenai segala sesuatu yang diperlukan dalam hubungannya dengan penutupan asuransi ini',0);
          Fpdf::Ln(5);
          Fpdf::SetX(15);
          Fpdf::Cell(0,0,'Mengetahui,',0,1,'L');
          Fpdf::SetX(140);
          Fpdf::Cell(0,0,'....................................................',0,1,'L');
          Fpdf::Ln(5);

          Fpdf::SetX(25);
          Fpdf::Cell(0,0,'Pejabat Bank',0,1,'L');
          Fpdf::SetX(100);
          Fpdf::Cell(0,0,'Yang Membuat Pertanyaan',0,1,'L');
          Fpdf::SetX(160);
          Fpdf::Cell(0,0,'Ahli Waris',0,1,'L');
          Fpdf::Ln(20);

          Fpdf::SetX(15);
          Fpdf::Cell(0,0,'..........................................',0,1,'L');
          Fpdf::SetX(105);
          Fpdf::Cell(0,0,'................................',0,1,'L');
          Fpdf::SetX(155);
          Fpdf::Cell(0,0,'..................................',0,1,'L');
          Fpdf::Ln(5);

      // for ($i=0; $i <20 ; $i++) { 
      // Fpdf::Cell(6, $rowHeader, $firstRowValue,$borderColumn, 0, 'C', true);
      // Fpdf::Cell(100, $rowHeader, $firstRowValue,$borderColumn, 0, 'C', true);
      // Fpdf::Cell(30, $rowHeader, $firstRowValue, $borderColumn, 0, 'C', true);
      // Fpdf::Cell(30, $rowHeader, $firstRowValue, $borderColumn, 0, 'C', true);
      // Fpdf::Ln(5);
      // }

      
      // $firstRowName = ([
      //   'Sertifikat ini diterbitkan untuk dan atas nama tertanggung sebagai bukti dari penutupan',
      //   'Asuransi Jiwa Kredit Kumpulan',
      //   'Atas Nama Pemegang Polis',
      //   'Sertifikat ini tunduk pada syarat-syarat umum, syarat-syarat khusus dan tambahan lain',
      //   'yang dilekatkan dan merupakan bagian mutlak yang tidak dapat dipisahkan-pisahkan dari ',
      //   'Adalah Peserta Asuransi Kumpulan Dengan',
      //   'Polis Induk',
      // ]
      // );
      // // $date = Carbon::now();
      // // for ($i=0; $i < count($firstRowName); $i++) {
      // // Fpdf::SetTextColor(0,0,0);
      // // Fpdf::SetFont('Arial',"I",9);
      // // Fpdf::SetX(15);
      // // Fpdf::Cell(0,5,$firstRowName[$i],0);
      // // Fpdf::Ln(4);
      // // }
      // // Fpdf::SetTextColor(0,0,0);
      // // Fpdf::SetFont('Arial',"",11);
      // // Fpdf::SetX(155);
      // // Fpdf::Cell(0,5,$date->format('d-M-Y'),0);
      // // Fpdf::Ln(15);
      // // Fpdf::SetX(150);
      // // Fpdf::SetFont('Arial',"B",11);
      // // Fpdf::Cell(0,5,$data_sertifikat->namaasuransi,0);
      // // Fpdf::Ln(12);
      // // Fpdf::SetX(0);
      // // Fpdf::Cell(0,0,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ',0,0,'L');
      // // Fpdf::Ln(10);  
      
      // // $TitlePolis = 'KWITANSI';
      // // $TitleIndukPolis = 'Premi Asuransi Jiwa Kredit';
      // // $this->addHeaderSertifikat($TitlePolis, $TitleIndukPolis);
      // // $firstRowName = ([
      // //   'Sudah terima dari',
      // //   'Uang sejumlah',
      // //   // 'Atas Nama Pemegang Polis',
      // //   'Atas Pembayaran',
      // //   // 'Jumlah Tempat Duduk',
      // //   // 'Uang Asuransi Awal',
      // //   // 'Premi',
      // //   // 'Cubic Capacity',
      // //   // 'Location',
      // // ]
      // // );
      // $terbilang = $this->terbilang((int)$data_sertifikat->premi);
      // $firstRowValue = ([
      //   $data_sertifikat->debitur,
      //   $terbilang.' rupiah',
      //   'Asuransi Jiwa Kredit .'.$data_sertifikat->namaasuransi.' dengan U.P Rp.'. $data_sertifikat->plafon.' No. Polis Induk .'.$data_sertifikat->polis_induk.' No. Sertifikat .'.$data_sertifikat->no_polis,
      // ]
      // );
      // for ($i=0; $i < count($firstRowName); $i++) {
      //   # code...
      //   Fpdf::SetTextColor(0,0,0);
      //   Fpdf::SetFont('Arial',"",11);
      //   if($i == 0){
      //   Fpdf::Cell(0,5,$firstRowName[$i],0);
      //   }else{
      //   Fpdf::Cell(0,10,$firstRowName[$i],0);

      //   }

      //   Fpdf::SetTextColor(0,0,0);
      //   Fpdf::SetFont('Arial',"",11);
      //   Fpdf::SetX(70);
      //   if($i == 0){
      //   Fpdf::Cell(0,5,':',0);
      //   }else{
      //   Fpdf::Cell(0,10,':',0);
      //   }
      //   Fpdf::SetTextColor(0,0,0);
      //   Fpdf::SetFont('Arial',"",11);
      //   Fpdf::SetX(73);
      //   if($i == 0){
      //   Fpdf::MultiCell(120,5,$firstRowValue[$i],0);
      //   }else{
      //   Fpdf::MultiCell(120,10,$firstRowValue[$i],0);
      //   }
      // }
      // Fpdf::Ln(10);
      // $firstRowName = ([
      //   "Premi",
      //   "Extra Premi",
      //   "Biaya ADM",
      //   "Periode",
      // ]
      // );
      // $firstRowValue = ([
      //   "Rp. ".$data_sertifikat->premi,
      //   "Rp. 0",
      //   "Rp. 0",
      //   $data_sertifikat->tgl_awal." s/d ". $data_sertifikat->tgl_akhir,
      // ]
      // );
      // $geser = 15;
      // for ($i=0; $i < count($firstRowName); $i++) {
      //       Fpdf::SetTextColor(0,0,0);
      //       Fpdf::SetFont('Arial',"B",11);
      //       Fpdf::SetX($geser);
      //       Fpdf::Cell(0,5,$firstRowName[$i],0);
      // $geser +=30;
      // }
      // $geser2 = 15;
      // Fpdf::Ln(10);
      // for ($i=0; $i < count($firstRowValue); $i++) {
      // Fpdf::SetTextColor(0,0,0);
      // Fpdf::SetFont('Arial',"",11);
      // Fpdf::SetX($geser2);
      // Fpdf::Cell(0,5,$firstRowValue[$i],0);
      // $geser2 +=30;
    }
    Fpdf::Ln(15);
      // TANDA TANGAN



      // FOOTER
      // $this->Footer('1', '2');

    Fpdf::Output('I','NM.pdf');
    exit();
  }

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



  // }
}

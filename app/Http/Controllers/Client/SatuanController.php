 <?php

  namespace App\Http\Controllers\Client;

  use DB;
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Excel;
  use Input;
  use DateTime;
  use App\TableProduksi;
  use Yajra\Datatables\Facades\Datatables;
  use Auth;
  use Rap2hpoutre\FastExcel\FastExcel;
  use Carbon\Carbon;

  class SatuanController extends Controller
  {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

      $cabang = DB::table('master_leasing_cabang')->get();
      $jenisasuransi = DB::table('jns_produksi')->get();
      $user = Auth::user();
      // $name = $user->
      if(!empty($cabang)){
        return view ( 'Client/clientpenutupansatuan' ,[
          'cabang' => $cabang,
          'jenisasuransi' => $jenisasuransi,
          'user' => $user,
          ]
        );
      }
    }

    public function testing(Request $request){
      return response()->json($request);
    }

    public function upload(Request $request){

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
        $plafon_pinjaman = $request->plafon_pinjaman;
        $umur = $this->hitung_umur( $tgl_lahir , $tgl_akad );
      	$rate = DB::table('rate')
      			->select('rate')
      			->where([
                          ['kode_prod','=', $request->jenis_asuransi],
                          ['tenor', '=', $request->masa_kredit],
                        ])
      			->first();
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
          'kode_asu' => "",
          'kode_broker' => "",
          'kode_client' => "",
          'asuransi_bank' => "",
          'sts_klaim' => 1,
          'id_rekon_ajk' => 1,
          'id_refund_ajk' =>1,
          'no_polis' => null,
          'tgl_polis' => null,
          'no_debitur' => "",
          'no_pk' => "",
          'no_kwitansi' => "",
          'tgl_kwitansi' => null,
          'debitur' => $request->debitur,
          'tmp_lahir' => "",
          'noktp' => "",
          'tgl_lahir' => date( 'Y-m-d', strtotime($request->tanggal_lahir)),
          'tgl_awal' => date( 'Y-m-d', strtotime($request->tanggal_akad_awal)),
          'tgl_akhir' => date( 'Y-m-d', strtotime($tgl_akad)),
          'tenor' => $request->masa_kredit,
          'plafon' => $request->plafon_pinjaman,
          'umur' => 1,
          'jaminan' => "",
          'okupasi' => "",
          'rate' => $rate_,
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

        $rowExist = DB::table('table_produksi')->where('no_pin', '=', $request->no_pin)->get();

        if(count($rowExist) > 0) {
          // Update Perpanjangan Data
          if(strtotime($request->tgl_booking) > strtotime($rowExist[0]->tgl_booking)){
            $insertRowUpdated[] = $request->no_pin;
            // Backup data to table prod history
            foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }

            // Set Status Data baru/perpanjangan
            $status_perpanjangan = $this->checkDataPerpanjangan($request->tgl_booking, $request->tenor, $rowExist[0]);

            // Update current row
            DB::table('table_produksi')->where('no_pin', '=', $request->no_pin)->update([
                'tgl_booking'=>$request->tgl_booking,
                'status_perpanjangan' => $status_perpanjangan,
              ]);
          }else {
              // Row Existing
              $insertRowExist[] = $request->no_pin;
          }
        }else {
          $insert[] = $data_dokumen;
        }

        if(!empty($insert) && empty($insertRowExist)){
        	// dd($insert);
        // $tenor = (int)$dokumens[0]->tenor;
        // $enddate = new DateTime("2016-12-02");
        // $skrng = new DateTime();
        // $beda = $enddate->diff($skrng);
        	$umur = $this->hitung_umur("1988-12-02", "2000-12-02");

          DB::table('produksi_ajk')->insert($insert);
          $response = array(
              'status' => 'success',
              'message' => 'Sukses Upload Data',
          );
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
              'message' => 'Gagal Upload dokumen, terdapat file yang sama',
              'rowexist' => $insertRowExist,
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

    function hitung_umur($tanggal_lahir, $tanggal_akad) {
    list($year,$month,$day) = explode("-",$tanggal_lahir);
    list($year2,$month2,$day2) = explode("-",$tanggal_akad);
    return $year_diff  = $year2 - $year;
	}

}

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DateTime;

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

      $cabang = DB::table('master_leasing_cabang')->get();
      $jenisasuransi = DB::table('jns_produksi')->get();
      $user = Auth::user();
      // $name = $user->
      if(!empty($cabang)){
        return view ( 'Client/clientpenutupansatuan' ,[
          'cabang' => $cabang,
          'jenisasuransi' => $jenisasuransi,
          'user' => $user,
          ]
        );
      }
    }

    public function testing(Request $request){
      return response()->json($request);
    }

    public function upload(Request $request){

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
        $plafon_pinjaman = $request->plafon_pinjaman;
        $umur = $this->hitung_umur( $tgl_lahir , $tgl_akad );
      	$rate = DB::table('rate')
      			->select('rate')
      			->where([
                          ['kode_prod','=', $request->jenis_asuransi],
                          ['tenor', '=', $request->masa_kredit],
                        ])
      			->first();
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
          'kode_asu' => "",
          'kode_broker' => "",
          'kode_client' => "",
          'asuransi_bank' => "",
          'sts_klaim' => 1,
          'id_rekon_ajk' => 1,
          'id_refund_ajk' =>1,
          'no_polis' => null,
          'tgl_polis' => null,
          'no_debitur' => "",
          'no_pk' => "",
          'no_kwitansi' => "",
          'tgl_kwitansi' => null,
          'debitur' => $request->debitur,
          'tmp_lahir' => "",
          'noktp' => "",
          'tgl_lahir' => date( 'Y-m-d', strtotime($request->tanggal_lahir)),
          'tgl_awal' => date( 'Y-m-d', strtotime($request->tanggal_akad_awal)),
          'tgl_akhir' => date( 'Y-m-d', strtotime($tgl_akad)),
          'tenor' => $request->masa_kredit,
          'plafon' => $request->plafon_pinjaman,
          'umur' => 1,
          'jaminan' => "",
          'okupasi' => "",
          'rate' => $rate_,
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

        $rowExist = DB::table('table_produksi')->where('no_pin', '=', $request->no_pin)->get();

        if(count($rowExist) > 0) {
          // Update Perpanjangan Data
          if(strtotime($request->tgl_booking) > strtotime($rowExist[0]->tgl_booking)){
            $insertRowUpdated[] = $request->no_pin;
            // Backup data to table prod history
            foreach($rowExist as $object) { $arrayUpdateRow[] = (array)$object; }

            // Set Status Data baru/perpanjangan
            $status_perpanjangan = $this->checkDataPerpanjangan($request->tgl_booking, $request->tenor, $rowExist[0]);

            // Update current row
            DB::table('table_produksi')->where('no_pin', '=', $request->no_pin)->update([
                'tgl_booking'=>$request->tgl_booking,
                'status_perpanjangan' => $status_perpanjangan,
              ]);
          }else {
              // Row Existing
              $insertRowExist[] = $request->no_pin;
          }
        }else {
          $insert[] = $data_dokumen;
        }

        if(!empty($insert) && empty($insertRowExist)){
        	// dd($insert);
        // $tenor = (int)$dokumens[0]->tenor;
        // $enddate = new DateTime("2016-12-02");
        // $skrng = new DateTime();
        // $beda = $enddate->diff($skrng);
        	$umur = $this->hitung_umur("1988-12-02", "2000-12-02");

          DB::table('produksi_ajk')->insert($insert);
          $response = array(
              'status' => 'success',
              'message' => 'Sukses Upload Data',
          );
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
              'message' => 'Gagal Upload dokumen, terdapat file yang sama',
              'rowexist' => $insertRowExist,
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

    function hitung_umur($tanggal_lahir, $tanggal_akad) {
    list($year,$month,$day) = explode("-",$tanggal_lahir);
    list($year2,$month2,$day2) = explode("-",$tanggal_akad);
    return $year_diff  = $year2 - $year;
	}
}
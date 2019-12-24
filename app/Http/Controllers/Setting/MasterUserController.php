<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class MasterUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   

        // $data =  DB::table('master_user')
        //     ->leftjoin('posisi', 'master_user.posisi', '=', 'posisi.id')
        //     ->leftjoin('master_leasing', 'master_leasing.id_leasing', '=', 'master_user.perusahaan')
        //     ->leftJoin('master_leasing_cabang', function($join) {
        //       $join->on('master_leasing_cabang.id_leasing', '=', 'master_leasing.id_leasing')
        //             ->on('master_user.cabang','=','master_leasing_cabang.id_leasing_cabang');
        //     })
        //     ->leftjoin('master_asuransi', 'master_asuransi.id_asuransi', '=', 'master_user.perusahaan')
        //     ->leftJoin('master_asuransi_cabang', function($join) {
        //       $join->on('master_asuransi_cabang.id_asuransi', '=', 'master_user.perusahaan')
        //             ->on('master_user.cabang','=','master_asuransi_cabang.id_asuransi_cabang');
        //     })
        //     ->select(
        //         'master_user.nama_lengkap',
        //         'master_user.name',
        //         'posisi.posisi',
        //         DB::raw('(CASE WHEN master_leasing.nama_leasing IS NULL THEN master_asuransi.nama_asuransi ELSE master_leasing.nama_leasing END) AS perusahaan'),
        //         DB::raw('(CASE WHEN master_leasing_cabang.nama_ls_cabang IS NULL THEN master_asuransi_cabang.nama_as_cabang ELSE master_leasing_cabang.nama_ls_cabang END) AS cabang'),
        //         'master_user.email',
        //         'master_user.akses_user',
        //         'master_user.keterangan'
        //     )
        //     ->get();

        $broker = DB::table('broker')->select('kode_broker','nama')->get();
        $master_client = DB::table('mst_client')->select('kode_pusat','nama')->get();
        $client = DB::table('client')->select('kode_client','nama')->get();
        $produk = DB::table('jns_produksi')->select('kode_prod','nama')->get();
        $rekanan = DB::table('rekanan')->select('id_mstclient','id_prod')->get();
        // dd($data);

        return view('Setting.masteruser', [
            // 'data' => $data,
            'broker' => $broker,
            'master_client' => $master_client,
            'client' => $client,
            'produk' => $produk,
        ]);
    }

    public function changepassword($id){
        return view('Setting.change');
    }

     public function updatepassword(Request $request)
    {
        // $this->validate($request, [
        //     'password'=>'required|min:6|confirmed',
        //     'password_lama' => 'required'
        // ]); 
        
        $user_password = Auth::user()->password;
        $old_password = request('password_lama');
        $password = request('password_baru');
       
    if (Hash::check($old_password, $user_password)) {


        Auth::user()->update([
            'password' => bcrypt($password)
        ]);

        $response = array(
              'message' => 'Password Anda Telah di rubah.',
              'status' => 'success',
              );

        
        } else {
        $response = array(
              'message' => 'Pastikan Password lama anda benar.',
              'status' => 'failed',
              );
        
        }
            return response()->json($response);



    }
    // public function store(Request $request, $action = "", $userid = "")
    // {
    //     return $request->all();
    // }

    public function tambah(Request $request){
        // dd($request->all());
        DB::table('akses_user')->where("name", "=", $request->input('jenis'))->delete();
            $tags = explode(',', $request->input('akses_user'));
            // $tag_parent = explode('', $tags);
            // dd($tags,$tag_parent);

            $l1 = in_array('2', $tags); //mencari teks 20 dalam array
            $j1 = in_array('7', $tags); //mencari teks 20 dalam array
            $j2 = in_array('8', $tags); //mencari teks 20 dalam array
            $j3 = in_array('6', $tags); //mencari teks 20 dalam array
            // dd($j3);
            $l2 = in_array('3', $tags); //mencari teks 20 dalam array
            $j4 = in_array('27', $tags); //mencari teks 20 dalam array
            $j5 = in_array('31', $tags); //mencari teks 20 dalam array

            $l3 = in_array('4', $tags); //mencari teks 20 dalam array
            $j6 = in_array('11', $tags); //mencari teks 20 dalam array
            $j7 = in_array('12', $tags); //mencari teks 20 dalam array
            $j8 = in_array('34', $tags); //mencari teks 20 dalam array
            $j9 = in_array('35', $tags); //mencari teks 20 dalam array
            
            $l4 = in_array('5', $tags); //mencari teks 20 dalam array
            $j10 = in_array('13', $tags); //mencari teks 20 dalam array
            $j11 = in_array('25', $tags); //mencari teks 20 dalam array
            $j12 = in_array('38', $tags); //mencari teks 20 dalam array
            
            $l5 = in_array('28', $tags); //mencari teks 20 dalam array
            $j13 = in_array('30', $tags); //mencari teks 20 dalam array

            $l6 = in_array('29', $tags); //mencari teks 20 dalam array
            $j14 = in_array('14', $tags); //mencari teks 20 dalam array
            $j15 = in_array('15', $tags); //mencari teks 20 dalam array
            $j16 = in_array('32', $tags); //mencari teks 20 dalam array
            
            // dd($tags,$l1,$j1, $j2, $j3);
            if($l6 == false && ($j14 !=false || $j15 !=false || $j16 !=false) ){
                // $tags[] = '29';
                array_unshift($tags,'29');
            }

            if($l5 == false && $j13 !=false ){
                // $tags[] = '28';
                array_unshift($tags,'28');
            }
            if($l4 == false && ($j10 !=false || $j10 !=false || $j11 !=false || $j12 !=false)){
                // $tags[] = '5';
                array_unshift($tags,'5');
            }
            if($l3 == false && ($j6 !=false || $j7 !=false || $j8 !=false || $j9 !=false)){
                // $tags[] = '4';
                array_unshift($tags,'4');
            }
            if($l2 == false && ($j4 !=false || $j5 != false)){
                // if($j4 ==0){
                // $tags[] = '3';
                array_unshift($tags,'3');
                // }
            }
            if($l1 == false && ($j1 !=false || $j2 !=false || $j3 !=false)){
                // $tags[] = '2';
                array_unshift($tags,'2');      
            }
            sort($tags);
            // $l6 = array_search('29', $tags); //mencari teks 20 dalam array
            // $j10 = array_search('30', $tags); //mencari teks 20 dalam array
            // $j10 = array_search('30', $tags); //mencari teks 20 dalam array
            // $j10 = array_search('30', $tags); //mencari teks 20 dalam array
            // $index3 = array_search('20', $bil, true)
            foreach($tags as $key) {
                // dd($key);
                DB::table('akses_user')->insert(
                    ['akses' => $key, 'name' => $request->input('username')]
                );
            }


                // if(($request->input('jenis')) == 'broker')
            if(($request->input('jenis')) == 'broker'){
                $posisi = '2';
                $namaposisi = 'broker';
                // $getnameposisi = DB::table('posisi')->where('id', $posisi)->first();
                $getnamebroker = DB::table('broker')->where('kode_broker', $request->input('jenis_broker'))->first();
                $perusahaan = $request->input('kode_broker');
                $namacleint = $getnamebroker->nama;
                $cabang = 0;
                $email = $getnamebroker->email;
            }
            else if($request->input('jenis') == 'client'){
                $posisi = '1';
                // $getnameposisi = DB::table('posisi')->where('id', $posisi)->first();
                if($request->input('jenis_client') != null || $request->input('jenis_client') != ''){
                $namaposisi = 'client';
                $getnameclient = DB::table('client')->where('kode_client', $request->input('jenis_client'))->first();
                $namacleint = $getnameclient->nama;
                $perusahaan = $request->input('kode_client');
                $cabang = 0;
                $email = $getnameclient->email;

                }else{
                // $getnameposisi = DB::table('posisi')->where('id', $posisi)->first();
                $namaposisi = 'client';
                $getnamebank = DB::table('mst_client')->where('kode_pusat', $request->input('jenis_bank'))->first();
                $namacleint = $getnamebank->nama;
                $perusahaan = $request->input('kode_bank');
                $cabang = 0;
                $email = $getnamebank->email;

                }
            }else{
                $posisi = '3';
                // $getnameposisi = DB::table('posisi')->where('id', $posisi)->first();
                $namaposisi = 'asuransi';
                $getnameasuransi = DB::table('asuransi')->where('kode_asu', $request->input('jenis_asuransi'))->first();
                $perusahaan = $request->input('kode_asuransi');
                $namacleint = $getnameasuransi->nama;
                $cabang = 0;
                $email = $getnameasuransi->email;

            }
            // dd($posisi);

            DB::table('master_user')->insert(
                ['name' => $request->input('username'),
                 'nama_lengkap' => $namacleint,
                 'posisi' => $posisi,
                 'perusahaan' => $perusahaan,
                 'cabang' => $cabang,
                 'password' => Hash::make($request->input('password')),
                 'keterangan' => null,
                 'email' => $email
                ]
            );

            DB::table('user')->insert(
                ['jenis' => $namaposisi,
                 'username' => $request->input('username'),
                 'password' => $request->input('password'),
                 // 'kode_pusat' => $perusahaan,
                 // 'cabang' => $cabang,
                 // 'keterangan' => null,
                 // 'email' => $email
                ]
            );

            $response = array(
            'status' => 'success',
            'messages' => 'User Berhasil Disimpan',
        );
        return response()->json($response);
    }
    public function reloadbroker()
    {
      return datatables(DB::table('broker')->get())->toJson();
    }

    public function reloadasuransi()
    {
      return datatables(DB::table('asuransi')->get())->toJson();
    }

    public function reloadbank()
    {
      return datatables(DB::table('client')->get())->toJson();
    }

    public function reloadrekanan()
    {
    $rekanan = DB::table('rekanan')
                      ->leftJoin('mst_client', 'rekanan.id_mstclient','mst_client.kode_pusat')
                      ->leftJoin('jns_produksi', 'rekanan.id_prod','jns_produksi.kode_prod')
                      ->select('mst_client.nama as namapusat','jns_produksi.nama as namaproduk')
                      ->get();

      return datatables($rekanan)->toJson();
    }

    public function saveproduk(Request $request)
    {
      if(!empty($request)){
        DB::table('det_produksi')->insert($request->except('_token'));

        $response = array(
            'status' => 'success',
            'messages' => 'Produk Berhasil DiSimpan',
        );
        return response()->json($response);
      }else{
        $response = array(
            'status' => 'failed',
            'messages' => 'Produk Gagal Disimpan',
        );
        return response()->json($response);
      }
    }

    public function savebroker(Request $request)
    {
      if(!empty($request)){
        DB::table('broker')->insert($request->except('_token'));
        $response = array(
            'status' => 'success',
            'messages' => 'Broker Berhasil DiSimpan',
        );
        return response()->json($response);
      }else{
        $response = array(
            'status' => 'failed',
            'messages' => 'Broker Gagal Disimpan',
        );
        return response()->json($response);
      }
    }

    public function saveclient(Request $request)
    {
      if(!empty($request)){
        if($request->kateg_client =='PUSAT'){
            $cek_pusat = DB::table('mst_client')->where('kode_pusat', $request->kode_pusat)->get();
            if(count($cek_pusat)>0){
                $response = array(
                    'status' => 'failed',
                    'messages' => 'Maaf, Bank Pusat Sudah Terdaftar',
                );
                return response()->json($response);
            }else{
                DB::table('mst_client')->insert($request->except('_token', 'kateg_client'));

                $response = array(
                    'status' => 'success',
                    'messages' => 'Bank Pusat Berhasil DiSimpan',
                );
                return response()->json($response);
            }
            
        }else{
            $cek_client = DB::table('client')->where('kode_client', $request->kode_client)->get();
            if(count($cek_client)>0){
                $response = array(
                'status' => 'failed',
                'messages' => 'Maaf, Bank Client Sudah Terdaftar',
                );
                return response()->json($response);
            }else{
                DB::table('client')->insert($request->except('_token'));

                $response = array(
                    'status' => 'success',
                    'messages' => 'Bank Client Berhasil DiSimpan',
                );
                return response()->json($response);
            }
        }
      }else{
        $response = array(
            'status' => 'failed',
            'messages' => 'Broker Gagal Disimpan',
        );
        return response()->json($response);
      }
    }

    public function saveasuransi(Request $request)
    {
      if(!empty($request)){
        DB::table('asuransi')->insert($request->except('_token'));

        $response = array(
            'status' => 'success',
            'messages' => 'Asuransi Berhasil DiSimpan',
        );
        return response()->json($response);
      }else{
        $response = array(
            'status' => 'failed',
            'messages' => 'Asuransi Gagal Disimpan',
        );
        return response()->json($response);
      }
    }

    public function saverekanan(Request $request)
    {
      if(!empty($request)){
        DB::table('rekanan')->insert($request->except('_token'));

        $response = array(
            'status' => 'success',
            'messages' => 'Rekanan Berhasil DiSimpan',
        );
        return response()->json($response);
      }else{
        $response = array(
            'status' => 'failed',
            'messages' => 'Rekanan Gagal Disimpan',
        );
        return response()->json($response);
      }
    }

    public function saveprodukasuransi(Request $request)
    {
      if(!empty($request)){
        $dokumen = [
          'kode_prod' => $request->kode_prod,
          'nama' => $request->nama,
        ];
        DB::table('det_produksi')->insert($request->except('_token'));

        $response = array(
            'status' => 'success',
            'messages' => 'Produk Berhasil DiSimpan',
        );
        return response()->json($response);
      }else{
        $response = array(
            'status' => 'failed',
            'messages' => 'Produk Gagal Disimpan',
        );
        return response()->json($response);
      }
    }

    public function saveprodukasuransii(Request $request)
    {
      if(!empty($request)){
        DB::table('rate')->insert($request->except('_token'));

        $response = array(
            'status' => 'success',
            'messages' => 'Produk Asuransi Berhasil DiSimpan',
        );
        return response()->json($response);
      }else{
        $response = array(
            'status' => 'failed',
            'messages' => 'Produk Asuransi Gagal Disimpan',
        );
        return response()->json($response);
      }
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
            
          }else{
            //.
            $no_kwitansi = 'KWT0001';
          }
        }else{
          $no_kwitansi = $noKwitansi;
          
        }
        return $no_kwitansi; 
      }

}

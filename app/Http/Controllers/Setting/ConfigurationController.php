<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Auth;
use stdClass;

class ConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$userid = Auth::user()->name;
    	// dd($userid);
    	$posisi =  DB::table('posisi')
            ->get();
        // $master_leasing =  DB::table('master_leasing')
        //     ->get();
        // $master_leasing_cabang =  DB::table('master_leasing_cabang')
        //     ->get();
        $akses_user = null;
        // DB::table('akses_user')
        //     ->where('name', '=', $userid)
        //     ->get()->toArray();
        $broker = DB::table('broker')->select('kode_broker','nama')->get();
        $master_client = DB::table('mst_client')->select('kode_pusat','nama')->get();
        $client = DB::table('client')->select('kode_client','nama')->get();
        $produk = DB::table('jns_produksi')->select('kode_prod','nama')->get();
        $asuransi = DB::table('asuransi')->select('kode_asu','nama')->get();
        // $rekanan = DB::table('rekanan')->select('id_mst_client','id_prod')->get();
        // Ubah User
        // if ($action == "ubah") {
        //     $data = DB::table('master_user')
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
        //         'master_user.posisi',
        //         'master_user.perusahaan',
        //         'master_user.cabang',
        //         'master_user.email',
        //         'master_user.akses_user',
        //         'master_user.keterangan'
        //     )
        //     ->where("name", "=", $userid)
        //     ->first();

        //     $master_leasing =  DB::table('master_asuransi')
        //         ->select(
        //             'master_asuransi.id_asuransi as id_leasing',
        //             'master_asuransi.nama_asuransi'
        //         )
        //         ->get();
        //     $master_leasing_cabang =  DB::table('master_asuransi_cabang')
        //         ->select(
        //             'master_asuransi_cabang.id_asuransi_cabang as id_leasing_cabang',
        //             'master_asuransi_cabang.nama_as_cabang'
        //         )
        //         ->get();

        //     $data->password = "";
        //     return view('Setting.userakses', ['data' => $data, 'posisi' => $posisi, 'master_leasing' => $master_leasing, 'master_leasing_cabang' => $master_leasing_cabang, 'action' => $action, 'user' => $userid, 'akses_user' => $akses_user]);
        // // Hapus User
        // }elseif ($action == "hapus") {
        //     DB::table('master_user')->where("name", "=", $userid)->delete();
        //     $data =  DB::table('master_user')
        //     ->join('posisi', 'master_user.posisi', '=', 'posisi.id')
        //     ->join('master_leasing', 'master_leasing.id_leasing', '=', 'master_user.perusahaan')
        //     ->join('master_leasing_cabang', 'master_leasing_cabang.id_leasing', '=', 'master_leasing.id_leasing')
        //     ->get();

        //     return view('Setting.masteruser', ['data' => $data]);
        // }else {
            // $akses_user =  DB::table('akses_user')
            // ->where('name','admin')->get();

            // $data = new stdClass();
            // $data->id = "";
            // $data->id_leasing = "";
            // $data->id_leasing_cabang = "";
            // $data->nama = "";
            // $data->posisi = "";
            // $data->nama_lengkap = "";
            // $data->perusahaan = "";
            // $data->cabang = "";
            // $data->password = "";
            // $data->name = "";
            // $data->email = "";
            // $data->keterangan = "";
            // $master_leasing = new stdClass();
            // $master_leasing_cabang = new stdClass();

     //    return view('Setting.configuration',  ['data' => $data, 'posisi' => $posisi, 'master_leasing' => $master_leasing, 'master_leasing_cabang' => $master_leasing_cabang, 'action' => 0,
     //     'user' => $userid, 
     //     'akses_user' => $akses_user,
     //     'broker' => $broker,
     //        'master_client' => $master_client,
     //        'client' => $client,
     //        'produk' => $produk,
     // ]);
         return view('Setting.configuration', ['posisi' => $posisi, 'action' => 0, 'user' => $userid, 'akses_user' => $akses_user,
         	'broker' => $broker,
            // 'master_client' => $master_client,
            'pusat' => $master_client,
            'client' => $client,
            'produk' => $produk,
            'asuransi' => $asuransi,
     ]);

    }	

    public function reloaduser(){
        return datatables(DB::table('user')->get())->toJson();
         
    }

    public function cekuser($id_user)
    {   
        $userid = Auth::user()->name;
        // dd($userid);
        $posisi =  DB::table('user')->where('id_user', $id_user)->first();
        
        if($posisi->jenis == 'broker'){
            $nameuser = $posisi->username;
        }else{
            $nameuser = $posisi->username;
        }
        // $master_leasing =  DB::table('master_leasing')
            // ->get();
        // $master_leasing_cabang =  DB::table('master_leasing_cabang')
        //     ->get();
        $user = DB::table('master_user')->where('id', $id_user)->first();
        // dd($user);
        $akses_user = DB::table('akses_user')
            ->where('name', '=', $nameuser)
            ->get()->toArray();
        $broker = DB::table('broker')->select('kode_broker','nama')->get();
        $master_client = DB::table('mst_client')->select('kode_pusat','nama')->get();
        $client = DB::table('client')->select('kode_client','nama')->get();
        $produk = DB::table('jns_produksi')->select('kode_prod','nama')->get();
        $asuransi = DB::table('asuransi')->select('kode_asu','nama')->get();
        $rekanan = DB::table('rekanan')->select('id_mstclient','id_prod')->get();
        // Ubah User
        // if ($action == "ubah") {
        //     $data = DB::table('master_user')
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
        //         'master_user.posisi',
        //         'master_user.perusahaan',
        //         'master_user.cabang',
        //         'master_user.email',
        //         'master_user.akses_user',
        //         'master_user.keterangan'
        //     )
        //     ->where("name", "=", $userid)
        //     ->first();

        //     $master_leasing =  DB::table('master_asuransi')
        //         ->select(
        //             'master_asuransi.id_asuransi as id_leasing',
        //             'master_asuransi.nama_asuransi'
        //         )
        //         ->get();
        //     $master_leasing_cabang =  DB::table('master_asuransi_cabang')
        //         ->select(
        //             'master_asuransi_cabang.id_asuransi_cabang as id_leasing_cabang',
        //             'master_asuransi_cabang.nama_as_cabang'
        //         )
        //         ->get();

        //     $data->password = "";
        //     return view('Setting.userakses', ['data' => $data, 'posisi' => $posisi, 'master_leasing' => $master_leasing, 'master_leasing_cabang' => $master_leasing_cabang, 'action' => $action, 'user' => $userid, 'akses_user' => $akses_user]);
        // // Hapus User
        // }elseif ($action == "hapus") {
        //     DB::table('master_user')->where("name", "=", $userid)->delete();
        //     $data =  DB::table('master_user')
        //     ->join('posisi', 'master_user.posisi', '=', 'posisi.id')
        //     ->join('master_leasing', 'master_leasing.id_leasing', '=', 'master_user.perusahaan')
        //     ->join('master_leasing_cabang', 'master_leasing_cabang.id_leasing', '=', 'master_leasing.id_leasing')
        //     ->get();

        //     return view('Setting.masteruser', ['data' => $data]);
        // }else {
            // $akses_user =  DB::table('akses_user')
            // ->where('name','admin')->get();

            // $data = new stdClass();
            // $data->id = "";
            // $data->id_leasing = "";
            // $data->id_leasing_cabang = "";
            // $data->nama = "";
            // $data->posisi = "";
            // $data->nama_lengkap = "";
            // $data->perusahaan = "";
            // $data->cabang = "";
            // $data->password = "";
            // $data->name = "";
            // $data->email = "";
            // $data->keterangan = "";
            // $master_leasing = new stdClass();
            // $master_leasing_cabang = new stdClass();

     $response = ['posisi' => $posisi, 'action' => 0, 'user' => $userid, 'akses_user' => $akses_user,
     'broker' => $broker,
    // 'master_client' => $master_client,
    'pusat' => $master_client,
    'client' => $client,
    'produk' => $produk,
    'asuransi' => $asuransi,
    
];
//  $response = array(
//     'status' => 'success',
//     'message' => 'Sukses Tambah Data',
//   );
return response()->json($response);

    }


}

<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use DB;
use stdClass;
use Hash;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $action = "", $userid = "")
    {
        $posisi =  DB::table('posisi')
            ->get();
        // $master_leasing =  DB::table('master_leasing')
        //     ->get();
        // $master_leasing_cabang =  DB::table('master_leasing_cabang')
        //     ->get();
        // $akses_user =  DB::table('akses_user')
        //     ->where('name', '=', $userid)
        //     ->get();

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
        //     $akses_user =  DB::table('akses_user')
        //     ->where('name', '=', 'ga ada')
        //     ->get();

        //     $data = new stdClass();
        //     $data->id = "";
        //     $data->id_leasing = "";
        //     $data->id_leasing_cabang = "";
        //     $data->nama = "";
        //     $data->posisi = "";
        //     $data->nama_lengkap = "";
        //     $data->perusahaan = "";
        //     $data->cabang = "";
        //     $data->password = "";
        //     $data->name = "";
        //     $data->email = "";
        //     $data->keterangan = "";
        //     $master_leasing = new stdClass();
        //     $master_leasing_cabang = new stdClass();


        //     return view('Setting.userakses', ['data' => $data, 'posisi' => $posisi, 'master_leasing' => $master_leasing, 'master_leasing_cabang' => $master_leasing_cabang, 'action' => $action, 'user' => $userid, 'akses_user' => $akses_user]);
        // }
    }

    public function create()
    {
        // return view('kunjungancolls.create');
    }

    // public function store(Request $request, $action = "", $userid = "")
    // {
    //   // Ubah User
    //     if ($action == "ubah") {
    //         DB::table('akses_user')->where("name", "=", $request->input('name'))->delete();
    //         $tags = explode(',', $request->input('akses_user'));

    //         foreach($tags as $key) {
    //             DB::table('akses_user')->insert(
    //                 ['akses' => $key, 'name' => $request->input('name')]
    //             );
    //         }

    //         if ($request->input('password') == "")
    //             DB::table('master_user')
    //                 ->where('name', '=', $userid)
    //                 ->update(
    //                     ['name' => $request->input('name'),
    //                      'nama_lengkap' => $request->input('nama_lengkap'),
    //                      'posisi' => $request->input('posisi'),
    //                      'perusahaan' => $request->input('perusahaan'),
    //                      'cabang' => $request->input('cabang'),
    //                      'keterangan' => $request->input('keterangan'),
    //                      'email' => $request->input('email')
    //                     ]
    //                 );
    //         else
    //             DB::table('master_user')
    //                 ->where('name', '=', $userid)
    //                 ->update(
    //                     ['name' => $request->input('name'),
    //                      'nama_lengkap' => $request->input('nama_lengkap'),
    //                      'posisi' => $request->input('posisi'),
    //                      'perusahaan' => $request->input('perusahaan'),
    //                      'cabang' => $request->input('cabang'),
    //                      'password' => Hash::make($request->input('password')),
    //                      'keterangan' => $request->input('keterangan'),
    //                      'email' => $request->input('email')
    //                     ]
    //                 );

    //     // Tambah User
    //     }elseif ($action == "tambah") {
    //         DB::table('akses_user')->where("name", "=", $request->input('name'))->delete();
    //         $tags = explode(',', $request->input('akses_user'));

    //         foreach($tags as $key) {
    //             DB::table('akses_user')->insert(
    //                 ['akses' => $key, 'name' => $request->input('name')]
    //             );
    //         }

    //         DB::table('master_user')->insert(
    //             ['name' => $request->input('name'),
    //              'nama_lengkap' => $request->input('nama_lengkap'),
    //              'posisi' => $request->input('posisi'),
    //              'perusahaan' => $request->input('perusahaan'),
    //              'cabang' => $request->input('cabang'),
    //              'password' => Hash::make($request->input('password')),
    //              'keterangan' => $request->input('keterangan'),
    //              'email' => $request->input('email')
    //             ]
    //         );
    //     }
    // }

    public function edit($id)
    {
        return "ok";
    }

}

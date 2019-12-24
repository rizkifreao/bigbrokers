<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class JsonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	// return "ok";
    	$action =  $request->nama;
    	$jenis =  $request->jenis;
    	if ($jenis == "leasing"){
    		if ($action == "1"){
	    		return DB::table('master_leasing')->select('id_leasing as list','nama_leasing')->get();
	    	}elseif ($action == "3"){
	    		return DB::table('master_asuransi')->select('id_asuransi as list','nama_asuransi')->get();
	    	}else {
	    		return "";
	    	}
    	}else {
    		$posisi =  $request->posisi;
    		if ($posisi == "1"){
    			return DB::table('master_leasing_cabang')->select('id_leasing_cabang as id','nama_ls_cabang')->where('id_leasing', $action)->get();
    		}elseif ($posisi == "3"){
    			return DB::table('master_asuransi_cabang')->select('id_asuransi_cabang as id','nama_as_cabang')->where('id_asuransi', $action)->get();
    		}
    		// return $action;
    	}
    }
}

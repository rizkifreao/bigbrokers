<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

class RekonsiliasiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dokumens = DB::table('produksi_ajk')->get();
      // $jenis_rekanan = DB::table('asuransi')->get();
    $jenis_asuransi = DB::table('asuransi')
    ->leftJoin('jns_produksi', 'asuransi.kode_prod','jns_produksi.kode_prod')
    ->select('jns_produksi.kode_prod','jns_produksi.nama')
    ->get();
    $jenis_bank = DB::table('client')
    ->select('kode_client','nama')
    ->get();

    return view ( 'Admin/formrekonsiliasi' ,[
      'dokumens' => $dokumens,
      'jenisasuransi' => $jenis_asuransi,
      'jenis_bank' => $jenis_bank,
    ]);
  }

  public function reload()
  {
    $user = Auth::user();
    $kodeposisi = $user->perusahaan;
    $posisiuser = $user->posisi;
    if($posisiuser == 3){
      $whereCondition2 = [
        ['produksi_ajk.kode_asu', $kodeposisi],
          ['produksi_ajk.posisi', '!=', 1],
        ['produksi_ajk.sts_klaim',0],
        ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.sts_bayar','!=', 'LUNAS'],
      ];                      
      $kode = 1;
    }elseif($posisiuser == 1){
      $mst_client = DB::table('mst_client')->where('kode_pusat', $kodeposisi)->get();
      if(count($mst_client)>0){
        $client = DB::table('client')->where('kode_pusat', $mst_client[0]->kode_pusat)->get();
        $kode_client = [];
        foreach ($client as $key => $value) {
          $kode_client[] = $value->kode_client;
        }
        $whereCondition2 = [
          // ['client.kode_pusat', $kodeposisi],
          ['produksi_ajk.posisi', '!=', 1],
          ['produksi_ajk.sts_klaim',0],
          ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.sts_bayar','!=', 'LUNAS'],
        ];  
        $kode = 2; 
      }else{
        $whereCondition2 = [
          ['produksi_ajk.kode_client', $kodeposisi],
          ['produksi_ajk.posisi', '!=', 1],
          ['produksi_ajk.sts_klaim',0],
          ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.sts_bayar','!=', 'LUNAS'],
        ];  
        $kode =3;
      }
    }else{
      $whereCondition2 = [
        ['produksi_ajk.posisi', '!=', 1],
        ['produksi_ajk.sts_klaim',0],
        ['produksi_ajk.sts_refund',0],
        ['produksi_ajk.sts_bayar','!=', 'LUNAS'],
      ]; 
      $kode = 4;                     
    }

    if($kode == 2){
      $rekon = DB::table('produksi_ajk')
      ->whereIn('produksi_ajk.kode_client', $kode_client)
      ->where($whereCondition2)
      ->get()->toArray();
    }else{
      $rekon = DB::table('produksi_ajk')
      ->where($whereCondition2)
      ->get()->toArray();
    }
    // dd($whereCondition2);
    
    $t = $this->is_array_empty($rekon);
    if($t == true){
      foreach ($rekon as $key => $value) {
        $asuransi = DB::table('asuransi')->where('kode_prod', $value->kode_prod)->first();
        // $asuransis[] = $asuransi;
        $jns_produksi = DB::table('jns_produksi')->where('kode_prod', $value->kode_prod)->first();
        $posisi_data = DB::table('posisi_data')->where('posisi', $value->posisi)->first();
        $client = DB::table('client')->where('kode_client', $value->kode_client)->first();
        $tAkad = $rekon[$key]->tgl_awal;
          $premi = $rekon[$key]->premi;
          $bayar = $rekon[$key]->bayar;
          $selisih = $premi-$bayar;
          # code...
        $dokumen = [
          // $asuransi,
          'kode_broker' => $asuransi->kode_broker,
          'kode_prod' => $asuransi->kode_prod,
          'polis_induk' => $asuransi->polis_induk,
          'namaasuransi' => $asuransi->nama,
          'namaprod' => $jns_produksi->nama,
          'kode_pusat' => $client->kode_pusat,
          'namaclient' => $client->nama,
          'namaposisi' => $posisi_data->nama,
          'selisih' => $selisih,
        ];
        foreach ($value as $key2 => $value2) {
          $y[$key2] = $value2;
        }
        $rekonn []= array_merge($y,$dokumen);
      }
      $view = $rekonn;
    }else{
      $view = $rekonn;
    }
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

  public function prosesrekon(Request $request)
  {
      // dd($request->all());s
    if(!empty($request)){
      DB::table('produksi_ajk')->where('no_pk', $request->no_kredit)->update([
        'tgl_bayar' => date( 'Y-m-d', strtotime($request->tanggal_bayar) ),
        'bayar' => $request->bayar_premi,
        'sts_bayar' => $request->status,
        'ket_bayar' => $request->keterangan,
      ]);

      $response = array(
        'status' => 'success',
        'messages' => 'Proses Rekon Berhasil',
      );
      return response()->json($response);
    }else{
      $response = array(
        'status' => 'failed',
        'messages' => 'Proses Rekon Gagal',
      );
      return response()->json($response);
    }

  }

  public function akseptasi(Request $request)
  {
      // Check field empty
    $isFieldExist = !empty($request->tanggal_registrasi) && !empty($request->checklistData);
      // dd($isFieldExist);
    if($isFieldExist){
      $checklistData = explode(',', $request->checklistData);
            // Update Flag Proses to Approve Status
      foreach ($checklistData as $value) {
        $dataPremi = DB::table('table_produksi')->where('no_pin', $value)->pluck('premi');
        $dataPremiAdmin = DB::table('table_produksi')->where('no_pin', $value)->pluck('premi_admin');
        if ($dataPremi == $dataPremiAdmin){
                # code...
          DB::table('produksi_ajk')->where('no_pk', $value)->update([
            'tgl_aksep' => date( 'Y-m-d', strtotime($request->tanggal_registrasi) ),
            'id_master_asuransi' => $request->id_asuransi,
            'jenis_penutupan' => $request->checkradio,
            'status_proses' => 1,
          ]);
        }else {
                # code...
          $insertRowInvalid[] = [
            $value
          ];

        }
      }

    }

    return response()->json($response);


      // Return error
    return back();
  }

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


    // public function sendEmailUpdate($data, $pesan, $title){
    //   $pesan = "Isi pesan";
  		// // $body = array('name'=>"Sam Jose", "body" => "body nih");
  		// Mail::send(['html' => 'email.updaterequest'], $data, function($message) use ($pesan, $title){
    //           $message->to('juni.aldo@yahoo.co.id', 'Andrew')
    //                   ->subject($title)
    //                   ->setBody($pesan, 'text/plain');
    //           $message->from('mitrafinancesejahtera@gmail.com','Admin');
    //       });
    // }

    // public function sendEmailApprove($data, $pesan, $title){
    //   $pesan = "Isi pesan";
    //   // $body = array('name'=>"Sam Jose", "body" => "body nih");
    //   Mail::send(['html' => 'email.notifrequest'], $data, function($message) use ($pesan, $title){
    //           $message->to('juni.aldo@yahoo.co.id', 'Andrew')
    //                   ->subject($title)
    //                   ->setBody($pesan, 'text/plain');
    //           $message->from('mitrafinancesejahtera@gmail.com','Admin');
    //       });
    // }
}

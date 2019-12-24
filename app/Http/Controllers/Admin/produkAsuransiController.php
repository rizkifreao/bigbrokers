<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

class produkAsuransiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $jenis_produksi = DB::table('jns_produksi')->get();
      $broker = DB::table('broker')->select('kode_broker','nama')->get();
      // $jenis_rekanan = DB::table('asuransi')->get();

      return view ( 'Setting/produkasuransi' ,[
        'broker' => $broker,
        'jenis_produksi' => $jenis_produksi,
      ]);
    }

    public function reload()
    {
      return datatables(DB::table('table_produksi')->where('status_proses', 0)->get())->toJson();
    }

    public function prosesrekon(Request $request)
    {
      if(!empty($request)){
        DB::table('produksi_ajk')->where('no_pk', $request->no_pk)->update([
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

    public function update(Request $request) {

      $dataDokumen = DB::table('table_produksi')
      ->where('no_pin', $request->noPin)->get();

      if (!empty($request)){
        // Update current row
        $dokumen = [
          'no_pin' => $request->noPin,
          'cabang' => $request->cabang,
          'nama_nasabah' => $request->nama_nasabah,
          'plafon' => str_replace( ',', '', $request->plafon ),
          'tgl_booking' => date( 'Y-m-d', strtotime($request->tgl_booking)),
          'merk' => $request->merk,
          'tipe' => $request->tipe,
          'kategori' => $request->kategori,
          'jenis_asuransi' => $request->jenis_asuransi,
          'model_kend' => $request->model_kend,
          'no_rangka' => $request->no_rangka,
          'no_mesin' => $request->no_mesin,
          'no_polisi' => $request->no_polisi,
          'no_bpkb' => $request->no_bpkb,
          'tahun' => $request->tahun,
          'tenor' => $request->tenor,
          'rate' => $request->rate,
          'premi' => str_replace( ',', '', $request->premi ),
          'premi_admin' => str_replace( ',', '', $request->premi_admin ),
          'wilayah' => $request->wilayah,
        ];

        $insert[] = $dokumen;
        DB::table('table_produksi')
            ->where('no_pin', $request->noPin)
            ->update($dokumen);



        $response = array(
            'status' => 'success',
            //'$dokumens' =>$insert,
            'dokumens' => $request->all()
        );

        // Format Kirim Email Pemberitahuan
        // $data = array(
        //   'no_pin'=> $dokumen['no_pin'],
        //   'deskripsi' => $request->keterangan,
        //   'nama_nasabah' => $dokumen['nama_nasabah'],
        //   'premi' => $dokumen['premi'],
        //   'premi_admin' => $dokumen['premi_admin'],
        // );

        $pesan = 'Pesan Terkirim';
        $title = 'Approval Change Request No Pin '. $request->noPin;

        $this->sendEmailUpdate($data,$pesan,$title);

        return response()->json($response);
      }

      // Return error
      $response = array(
          'status' => 'failure',
          //'$dokumens' =>$insert,
          'message' => 'Failed update data'
      );

      return response()->json($response);

    }


    public function sendEmailUpdate($data, $pesan, $title){
      $pesan = "Isi pesan";
  		// $body = array('name'=>"Sam Jose", "body" => "body nih");
  		Mail::send(['html' => 'email.updaterequest'], $data, function($message) use ($pesan, $title){
              $message->to('juni.aldo@yahoo.co.id', 'Andrew')
                      ->subject($title)
                      ->setBody($pesan, 'text/plain');
              $message->from('mitrafinancesejahtera@gmail.com','Admin');
          });
    }

    public function sendEmailApprove($data, $pesan, $title){
      $pesan = "Isi pesan";
      // $body = array('name'=>"Sam Jose", "body" => "body nih");
      Mail::send(['html' => 'email.notifrequest'], $data, function($message) use ($pesan, $title){
              $message->to('juni.aldo@yahoo.co.id', 'Andrew')
                      ->subject($title)
                      ->setBody($pesan, 'text/plain');
              $message->from('mitrafinancesejahtera@gmail.com','Admin');
          });
    }
}

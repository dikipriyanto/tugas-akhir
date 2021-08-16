<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\masalah;
use App\Models\masalah_pesanan;
use App\Models\Pemesanan;
use App\Models\bengkelservice;
use App\Models\jenis_pesanan;
use App\Models\merek_pesanan;
use App\Models\status_service;
use App\Models\pelanggan;
use Validator;
use Redirect;
use App\Events\notif;


class PesananController extends Controller
{
    public function buatPesanan(Request $request){
        $bengkelservice = bengkelservice::findOrFail($request->bengkel_id);
        $pelanggan = pelanggan::findOrFail($request->pelanggan_id);
        
        $rules = [
            'nama_pemesan'=> 'required|regex:/^[\pL\s\-]+$/u',
            // 'no_wa'=> 'required|numeric|min:10|max:13',
            'no_wa'=> 'digits_between:10,13|required|numeric',
            'tanggal_pemesanan'=> 'required|date|date_format:Y-m-d',
            'kecamatan'=> 'required',
            'kelurahan'=> 'required',
            'masalah' => 'required',
            'jenis' => 'required',
            'merek' => 'required',
            'alamat'=> 'required',
            'informasi_tambahan'=> 'max:255|nullable',
        ];

        $message = [
            'required' => 'Form :attribute tidak boleh kosong!',
            'email' => 'Format email salah',
            'min' => ':attribute harus :max karakter',
            'numeric' => 'Masukan :attribute/Hp dengan angka!',
            'regex' => 'Masukan :attribute dengan huruf',
            'max' => ':attribute harus 13 karakter',
            'digits_between' => 'No.Hp/Whatsapp harus minimal 10 karakter dan maksimal 13 karakter',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){
            
            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
        }

        $pesanan = Pemesanan::create([
            'kode_pemesanan' => $request->kode_pemesanan = mt_rand(1111, 9999),
            'nama_pemesan' => $request->nama_pemesan,
            'no_wa' => $request->no_wa,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'id_bengkel_service' => $bengkelservice->id,
            'id_pelanggan' => $pelanggan->id,
            'informasi_tambahan' => $request->informasi_tambahan,
        ]);

        event(new notif($pesanan));
        

        foreach ($request ->masalah as $masalah){
            masalah_pesanan::create([
                'nama_masalah' => $masalah,
                'id_pesanan' => $pesanan->id,
            ]);
        }

        foreach ($request -> jenis as $jenis){
            jenis_pesanan::create([
                'nama_jenis' => $jenis,
                'id_pesanan' => $pesanan->id,
            ]);
        }

        foreach ($request -> merek as $merek){
            merek_pesanan::create([
                'nama_merek' => $merek,
                'id_pesanan' => $pesanan->id,
            ]);
        }

        return redirect ('/status')->with('success', '#') ;

    }
}
